<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\User;
use App\Models\Agent;
use App\Models\Property;

use Illuminate\Support\Facades\Auth;

class agentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('agent.agent-dashboard');
    }
    public function properties(){
        $id=Auth::user()->id;
     $properties = Property::with(['images', 'amenities','city'])
    ->where('agent_id', $id)
    ->get();
        return view('agent.agent-properties',['properties'=>$properties]);
    }
    public function appointments(){
        return view('agent.agent-appointments');
    }
    public function messages(){
        return view('agent.agent-messages');
    }
    public function profile(){
                $agent = Auth::user()->agent;

        return view('agent.agent-profile');
    }
    /**
     * Show the form for creating a new resource.
     */
       public function create()
{
    // Fetch all amenities from DB to render in the form checkboxes
    $amenities = Amenity::all();
    // Return the Blade view template and pass the $amenities variable
    return view('agent.agent-add-property', compact('amenities'));
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
