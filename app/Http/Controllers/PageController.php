<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Property;
use App\Models\Agent;
use App\Models\Review;


class PageController extends Controller
{
    public function index()
    {
        $properties = Property::with(['images', 'amenities', 'city', 'agent.user'])->where('featured',1)->where('verified','approved')->get();
        $cities = City::all()->unique('city')->pluck('city');
        $reviews=Review::with(['appointment.user'])->where('featured',1)->get();
        $agents=Agent::with(['user'])->where('is_featured',1)->get();
      

        return view('frontend.index', compact('cities','properties','reviews','agents'));
    }

    public function contact()
    {
        
        return view('frontend.contact-us');
    }

    public function about()
    {
           $reviews=Review::with(['appointment.user'])->where('featured',1)->get();
        $agents=Agent::with(['user'])->where('is_featured',1)->get();
        $cities=City::distinct('city')->count();

        return view('frontend.about',compact('agents','reviews','cities'));
    }
}
