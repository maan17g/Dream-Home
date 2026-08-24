<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\User;
use App\Models\Agent;
use App\Models\Appointment;
use App\Models\Property;

use Illuminate\Support\Facades\Auth;

class agentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $properties=Property::with(['appointments','images'])->where('agent_id',Auth::user()->agent->id)->orderBy('views','desc')->take(3)->get();     
        $appointments=Appointment::where('agent_id',Auth::user()->agent->id)->latest()->take(2)->get();
       return view('agent.agent-dashboard',compact('properties','appointments'));
    }
    public function properties(){
        $id=Auth::user()->agent->id;
     $properties = Property::with(['images', 'amenities','city'])
    ->where('agent_id', $id)
    ->get();  
        return view('agent.agent-properties',['properties'=>$properties]);
    }
  
    public function profile(){
                // $agent = Auth::user()->agent;
        return view('agent.agent-profile');
    }
    /**
     * Show the form for creating a new resource.
     */
       public function create()
{
    // Fetch all amenities from DB to render in the form checkboxes
    
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
      $agent=Agent::with(['user','review'])->findOrFail($id);
      $properties=$agent->properties()->paginate(3);
    
       return view('frontend.agent-view',compact('agent','properties'));
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
    public function toggleFeature(Agent $agent)
    {
        if(Agent::where('is_featured',1)->count()<4){
            $agent->is_featured = !$agent->is_featured;
            $agent->save();
            $status = $agent->is_featured ? 'featured' : 'unfeatured';
            return redirect()->back()->with('success', "Agent status updated to {$status} successfully.");
            }
            else{
        return redirect()->back()->with('error', "Only 4 Agent can be featured at a time");
        
    }
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
