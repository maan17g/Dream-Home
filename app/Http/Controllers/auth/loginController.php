<?php

namespace App\Http\Controllers\auth; // Declares the folder location
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use App\Http\Controllers\Controller; // Imports the base controller
use Illuminate\Http\Request;
use App\Models\User;

// Imported for future use in store()

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
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
        // return $request;
        $verify = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => [
                'required',
                'string',
                Password::min(8)
                    ],
           'remember' => 'nullable', 
        ]);

        $user=User::where('email', $verify['email'])->first();
        if($user){
        $chkPass=Hash::check($verify['password'],$user->password);
        if($chkPass){
             $remember = $request->has('remember');
            //  return $remember;
            Auth::login($user,$remember);
             $request->session()->regenerate();
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
            }else{
             return redirect()->route('login.index')->with('error','Your Password is Incorrect');
         }
        }
        else{
            return redirect()->route('login.index')->with('error','Password or Email is Incorrect');
        }
        
        
       
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
