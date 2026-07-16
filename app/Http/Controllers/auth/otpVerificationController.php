<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Otp;
use Illuminate\Http\Request;
use App\Notifications\SendOtpNotification;


class otpVerificationController extends Controller
{
    /**
     * Display the OTP verification view.
     */
    public function index()
    {
       if(Auth::check()){  
         $email=Auth::user()->email;
              // Optional: Redirect back to registration if no session email exists
        if (!$email) {
            return redirect()->route('register.index')->withErrors(['email' => 'Please register first.']);
        }
        return view('auth.verify-email');
    }else{
        return redirect()->route('register.index');
    }

    }
    public function verify(Request $request){
        
        $verify=$request->validate([
            'otp'=>'required|size:6|regex:/^[0-9]+$/',
        ]);
        $id=Auth::user()->id;
        $otp=Otp::where('user_id',$id)->first();
      
        if($otp['otp']==$verify['otp'])
        {
            $otp->used=1;
            $otp->save();
            Auth::user()->is_verified=1;
            Auth::user()->save();
            $role = Auth::user()->role; // Calls your dynamic role method

            if ($role === 'admin') {
                return redirect()->route('admin.index')->with('success', 'Welcome to Admin Dashboard');
            } 
            
            if ($role === 'agent') {
                return redirect()->route('agent.index')->with('success', 'Welcome to Agent Dashboard');
            } 
            
            if ($role === 'buyer') {
                return redirect()->route('user.index')->with('success', 'Welcome to User Dashboard');
            }
           
          
        }
        else{
         return redirect()->route('otp.index')->with('error','Otp is Wrong');}

    }
    public function resend(Request $request){
    
        $otpCode = (string) random_int(100000, 999999);
          Auth::user()->otp()->update([
             'otp' => $otpCode,
          ]);
          Auth::user()->notify(new SendOtpNotification($otpCode));
        //    return $otpCode;
         return redirect()->route('otp.index')->with('success','Otp has been Resend to Your mail'); 
          
           

    }
}
