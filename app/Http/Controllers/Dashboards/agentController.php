<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('agent.agent-properties');
    }
    public function appointments(){
        return view('agent.agent-appointments');
    }
    public function messages(){
        return view('agent.agent-messages');
    }
    public function profile(){
        return view('agent.agent-profile');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('agent.agent-add-property'); 
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
