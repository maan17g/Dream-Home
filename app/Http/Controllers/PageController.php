<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Property;
use App\Models\Agent;
use App\Models\User;
use App\Models\Review;


class PageController extends Controller
{
    public function index()
    {
        $properties = Property::with(['images', 'amenities', 'city', 'agent.user'])->where('featured',1)->where('verified','approved')->get();
       $listing=Property::count();
       $customers=User::count();
        $cities = City::all()->unique('city')->pluck('city');
        $reviews=Review::with(['appointment.user'])->where('featured',1)->where('status',1)->get();
        $agents=Agent::with(['user'])->where('is_featured',1)->get();
      

        return view('frontend.index', compact('cities','properties','reviews','agents','listing','customers'));
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
    public function reviews(){
        $reviews = Review::with(['appointment.user', 'property'])
            ->where('status', 1) // Only fetch approved/active reviews
            ->latest()
            ->paginate(9); // 9 items per page for a 3-column grid
        $reviewsCount=Review::where('status',1)->count();
        $avgRating=Review::sum('rating')>0? Review::sum('rating')/$reviewsCount :0;
        return view('frontend.reviews', compact('reviews','reviewsCount','avgRating'));
    }
    public function termsandconditions(){
        return view('frontend.temsandconditions');
    }
    public function privacyPolicy(){
        return view('frontend.privacyPolicy');
    }
}
