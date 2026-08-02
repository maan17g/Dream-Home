<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\savedProperties;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $record=User::with(['savedProperties'])->where('sid',Auth::user()->id)->count();

        return view('user.user-dashboard');
    }

    public function saved()
    {
        
        $record = savedProperties::where('user_id', Auth::user()->id)->pluck('property_id');
        $properties = Property::with(['images', 'agent.user', 'city'])->whereIn('id', $record)->paginate(3);

        return view('user.user-saved', compact('properties'));
    }

    
    public function profile()
    {
        return view('user.user-profile');
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
        //
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
    public function destroy(Request $request)
    {

        Auth::logout();

        // 2. Clear all data out of the current session
        $request->session()->invalidate();

        // 3. Force regenerate a brand new CSRF token to prevent session hijacking
        $request->session()->regenerateToken();

        // 4. Send the user back to the homepage or login screen
        return redirect()->route('page.index');

    }
}
