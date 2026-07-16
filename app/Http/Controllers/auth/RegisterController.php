<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller; // Clean import layout
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Notifications\SendOtpNotification;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.register');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role' => 'required|string|in:agent,buyer', 
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()      
                    ->mixedCase()    
                    ->numbers()      
                    ->symbols(),      
            ], 
            'agree_terms' => 'required|accepted', 
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'role' => $validated['role'], 
            'password' => Hash::make($validated['password']), 
            'newsletter' => $request->has('newsletter'), // Safely evaluates boolean checkboxes
        ]);
          $otpCode = (string) random_int(100000, 999999);
          $user->otp()->create([
             'otp' => $otpCode,
            'used' => 0, 
          ]);
          Auth::login($user);
            $user->notify(new SendOtpNotification($otpCode));
         return redirect()->route('otp.index')->with('success','Otp has been Send to Your mail'); 

        // Redirecting users to dashboard after registration
     
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
