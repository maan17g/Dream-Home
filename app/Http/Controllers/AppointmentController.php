<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Property;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display appointments for the authenticated buyer (User view).
     */
    public function appointments()
    {
        $userId = Auth::id();

        $upcoming = Appointment::with(['property', 'agent.user'])
            ->where('user_id', $userId)
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        $history = Appointment::with(['property', 'agent.user'])
            ->where('user_id', $userId)
            ->whereIn('status', ['completed', 'cancelled'])
            ->orderBy('scheduled_at', 'desc')
            ->get();

        return view('user.user-appointments', compact('upcoming', 'history'));
    }

    /**
     * Display appointments for the authenticated agent (Agent view).
     */
    public function agentAppointments()
    {
        $agent = Auth::user()->agent;

        if (!$agent) {
            return redirect()->back()->with('error', 'Agent profile not found.');
        }

        $upcoming = Appointment::with(['property', 'user'])
            ->where('agent_id', $agent->id)
            ->whereIn('status', ['pending', 'confirmed'])
            ->orderBy('scheduled_at', 'asc')
            ->get();

        $completed = Appointment::with(['property', 'user'])
            ->where('agent_id', $agent->id)
            ->where('status', 'completed')
            ->orderBy('scheduled_at', 'desc')
            ->get();

        $cancelled = Appointment::with(['property', 'user'])
            ->where('agent_id', $agent->id)
            ->where('status', 'cancelled')
            ->orderBy('scheduled_at', 'desc')
            ->get();

        return view('agent.agent-appointments', compact('upcoming', 'completed', 'cancelled'));
    }

    /**
     * Render the booking form page.
     */
    public function addAppointment($id)
    {
        $property = Property::findOrFail($id);
        return view('user.appointment-add', compact('property'));
    }

    /**
     * Store a new appointment.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'property_id' => 'required|exists:properties,id',
            'visit_date'  => 'required|date|after_or_equal:today',
            'visit_time'  => 'required|in:10:00,12:00,14:00,16:00',
            'notes'       => 'nullable|string|max:1000',
            'action'      => 'required|string|in:schedule',
        ]);
        

        $hasAppointment = Appointment::where('user_id', Auth::id())
            ->where('property_id', $validated['property_id'])
            ->whereIn('status', ['pending', 'confirmed'])
            ->exists();

        if ($hasAppointment) {
            return redirect()->route('user.addAppointment', $validated['property_id'])
                ->with('error', 'You already have an active appointment for this property.');
        }

        $property = Property::findOrFail($validated['property_id']);

        Appointment::create([
            'property_id'  => $validated['property_id'],
            'user_id'      => Auth::id(),
            'agent_id'     => $property->agent_id,
            'scheduled_at' => Carbon::parse($validated['visit_date'] . ' ' . $validated['visit_time']),
            'notes'        => $validated['notes'],
            'status'       => 'pending',
        ]);
        

        return redirect()->route('user.appointments')->with('success', 'Property viewing scheduled successfully.');
    }

    /**
     * Update appointment status (Shared by User and Agent).
     */
    public function updateStatus(Request $request, Appointment $appointment)
    {
        $request->validate([
            'status' => ['required', 'in:pending,confirmed,completed,cancelled'],
        ]);
        $appointment->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Appointment status updated successfully.');
    }
    public function delete($id){
      $res=Appointment::destroy($id);
      if($res){
        return back()->with('success','Delete Successfully');
      }
    }
}