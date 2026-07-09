<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
            'role' => 'required|string|in:agent,buyer', // Ensures role is valid
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()      // Requires at least one letter
                    ->mixedCase()    // Requires both uppercase and lowercase letters
                    ->numbers()      // Requires at least one number
                    ->symbols(),      // Requires at least one special character (!, @, #, $, etc.)
            ], // Automatically checks password_confirmation
            'agree_terms' => 'required|accepted', // Ensures they checked the terms box
        ]);
    $user = User::create([
        'first_name' => $validated['first_name'],
        'last_name' => $validated['last_name'],
        'email' => $validated['email'],
        'role' => $validated['role'], // Saves 'agent' or 'client' dynamically
        'password' => Hash::make($validated['password']), // Always hash the password!
        'newsletter' => $request['newsletter'],
    ],[
         'email.unique' => 'This email address is already registered. Please try logging in instead.',
    ]);

      Auth::login($user);
      


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
