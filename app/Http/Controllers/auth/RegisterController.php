<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'role'       => 'required|string|in:agent,buyer', 
           'first_name' => 'required|string|regex:/^\D/|max:255',
           'last_name' => 'required|string|regex:/^\D/|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email',
           'password'   => [
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
        ],[
           'first_name'=>'The First Name starts with the letter',
           'last_name'=>'The Last Name starts with the letter',
        ]);

        // 1. Create User
        $user = User::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'role'       => $validated['role'], 
            'password'   => Hash::make($validated['password']), 
            'newsletter' => $request->has('newsletter'),
        ]);

        // 2. AUTOMATICALLY CREATE AGENT RECORD IF ROLE IS AGENT
        if ($user->role === 'agent') {
            $user->agent()->create([
                'license_no'       => 'LIC-' . strtoupper(Str::random(8)), // Auto-generate temporary license number
                'years_experience' => 0,
                'approval_status'  => 'pending',
                'rating'           => 0.00,
            ]);
        }

        // 3. Create OTP
        $otpCode = (string) random_int(100000, 999999);
        $user->otp()->create([
            'otp'  => $otpCode,
            'used' => 0, 
        ]);

        Auth::login($user);
        $user->notify(new SendOtpNotification($otpCode));

        return redirect()->route('otp.index')->with('success', 'OTP has been sent to your email'); 
    }

  public function updatePassword(Request $request){
    $password=Auth::user()->password; 

    if(Hash::check($request->current_password,$password)){
        $request->validate([
             'password'   => [
                'required',
                'string',
                'confirmed',
                Password::min(8)
                    ->letters()      
                    ->mixedCase()    
                    ->numbers()      
                    ->symbols(),      
            ], 
        ]);
        Auth::user()->update(['password'=>Hash::make($request->password)],);
        return redirect()->back()->with('success','Password Updated');
        }

        else{
            
            return redirect()->back()->with('error','Wrong Password');
    }

  }
    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request)
{

    /** @var \App\Models\User $user */
    $user = Auth::user();

    $validatedData = $request->validate([
        'first_name' => 'required|string|regex:/^\D/|max:255',
        'last_name' => 'nullable|required|string|regex:/^\D/|max:255',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'bio'             => 'nullable|string',
        'phone'           => 'nullable|string|max:20', // Changed from numeric|digits:11 to allow flexible phone inputs
        'license_number'  => [
            'nullable',
            'string',
            'max:100',
            Rule::unique('agents', 'license_no')->ignore($user->agent?->id),
        ],
        'experience'      => 'nullable|integer|min:0',
        'agent_type'      => 'nullable|string|in:agent,rental_specialist,luxury_agent,commercial_agent,residential_agent,land_specialist,new_construction,property_manager',
        'facebook'        => 'nullable|url',
        'instagram'       => 'nullable|url',
        'linkedin'        => 'nullable|url',
        'twitter'         => 'nullable|url',
    ],[
        'first_name'=>'The First Name starts with the letter',
        'last_name'=>'The Last Name starts with the letter',
    ]);

    // Profile Picture Upload
    if ($request->hasFile('profile_picture')) {
        if ($user->avatar && Storage::disk('public')->exists($user->avatar) && $user->avatar!='avatars/default.png') {
            Storage::disk('public')->delete($user->avatar);
        }
        $extension = $request->file('profile_picture')->getClientOriginalExtension();
        $fileName  = 'user_' . $user->id . '_' . time() . '.' . $extension;
        $path = $request->file('profile_picture')->storeAs('avatars', $fileName, 'public');
        $user->avatar = $path;
    }

    // Update User
    $user->first_name = $validatedData['first_name'];
    if (isset($validatedData['last_name'])) {
        $user->last_name = $validatedData['last_name'];
    }
    $user->phone = $validatedData['phone'] ?? $user->phone;
    $user->save();

    // Update Agent Profile
    if ($user->role === 'agent') {
        $licenseNo = $validatedData['license_number'] ?? $user->agent?->license_no;

        if (empty($licenseNo)) {
            $licenseNo = 'LIC-' . strtoupper(Str::random(8));
        }

        $user->agent()->updateOrCreate(
            ['user_id' => $user->id],
            [
                'bio'              => $validatedData['bio'] ?? null,
                'license_no'       => $licenseNo,
                'years_experience' => $validatedData['experience'] ?? 0,
                'agent_type'       => $validatedData['agent_type'] ?? $user->agent?->agent_type ?? 'agent',
                'facebook'         => $validatedData['facebook'] ?? null,
                'instagram'        => $validatedData['instagram'] ?? null,
                'linkedin'         => $validatedData['linkedin'] ?? null,
                'twitter'          => $validatedData['twitter'] ?? null,
            ]
        );
    }

    return redirect()->back()->with('success', 'Profile updated successfully!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}