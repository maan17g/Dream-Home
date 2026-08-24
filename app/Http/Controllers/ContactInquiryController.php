<?php

namespace App\Http\Controllers;

use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class ContactInquiryController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([            
           'full_name' => 'required|string|regex:/^\D/|max:255',
            'email'     => 'required|email|max:255',
            'phone'     => 'nullable|string|max:20',
            'message'   => 'required|string',
        ]);

        ContactInquiry::create($validated);

        return back()->with('success', 'Your message has been sent successfully!');
    }

    public function index()
    {
        $inquiries = ContactInquiry::latest()->paginate(15);
       
        return view('admin.contacts', compact('inquiries'));
    }
}