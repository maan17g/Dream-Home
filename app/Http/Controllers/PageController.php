<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('frontend.index');
    }
    public function contact(){
        return view('frontend.contact-us');
    }
    public function about(){
        return view('frontend.about');
    }
   
}
