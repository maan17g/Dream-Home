<?php

namespace App\Http\Controllers\Dashboards;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\City;
use App\Models\Property;
use App\Models\Review;
use App\Models\Appointment as Schedule;
use App\Models\User;
use Illuminate\Http\Request;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Stat Cards Data
        $totalUsers = User::where('role', 'buyer')->count();
        $totalAgents = User::where('role', 'agent')->count();
        $totalProperties = Property::count();
        $totalBookings = Schedule::count();
        
        // 2. Property Status Chart Breakdown
        $forSaleCount = Property::where('purpose', 'sale')->count();
        $forRentCount = Property::where('purpose', 'rent')->count();
      

        // 3. Recent Bookings List
        $recentBookings = Schedule::with(['property','property.images', 'user'])
            ->latest()
            ->take(5)
            ->get();

        // 4. Monthly Chart Data (Current Year vs Last Year)
        $currentYearBookings = Schedule::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $lastYearBookings = Schedule::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y') - 1)
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Map array values across 12 months (default to 0 if no records exist)
        $chartDataCurrentYear = array_map(fn($m) => $currentYearBookings[$m] ?? 0, range(1, 12));
        $chartDataLastYear    = array_map(fn($m) => $lastYearBookings[$m] ?? 0, range(1, 12));
//  
        return view('admin.admin-dashboard', compact(
            'totalUsers',
            'totalAgents',
            'totalProperties',
            'totalBookings',
            'forSaleCount',
            'forRentCount',        
            'recentBookings',
            'chartDataCurrentYear',
            'chartDataLastYear'
        ));
    }

    public function users(Request $request)
    {

        $user = User::query();

        if ($request->filled('sort')) {
            if ($request->sort == 'newest') {
                $user->orderBy('created_at', 'asc');
            } else {
                $user->orderBy('created_at', 'desc');
            }
        }
        if ($request->filled('status')) {
            if ($request->status == 'verified') {
                $user->where('is_verified', 1);
            } elseif ($request->status == 'unverified') {
                $user->where('is_verified', 0);
            }

        }

        $users = $user->paginate(15);

        return view('admin.customers', compact('users'));
    }
    public function profile(){
        return view('admin.admin');
    }
    public function toggleStatus($id)
    {

        $user = User::findOrFail($id);
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();

        return back()->with('success', 'User status updated!');
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:buyer,admin',
        ]);

        // Update user role
        User::where('id', $id)->update([
            'role' => $request->role,
        ]);

        return back()->with('success', 'User role updated successfully!');
    }

    public function agents()
    {
        $agents = Agent::with('user', 'review')->orderBy('is_featured','desc')->paginate(6);
        $totalRatingSum = Review::sum('rating');
        $totalReviewsCount = Review::count();  // Prevent division by zero if there are no reviews yet
        $globalAvgRating = $totalReviewsCount > 0 ? number_format(($totalRatingSum / $totalReviewsCount),2) : 0;

        return view('admin.agents', compact('agents', 'globalAvgRating'));
    }

    public function property(Request $request)
    {
        $query = Property::with(['images', 'city', 'agent']);

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%')
                ->orWhere('id', $request->search);
        }

        if ($request->filled('status')) {
            $query->where('verified', $request->status);
        }

        if ($request->filled('purpose')) {
            $query->where('purpose', $request->purpose);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->city_id);
        }

        $properties = $query->latest()->paginate(10);
        $cities = City::all();

        return view('admin.property-management', compact('properties', 'cities'));
    }

    public function cms()
    {
     $reviews = Review::with(['appointment','agent','property','appointment.user'])->get();
        return view('admin.cms', compact('reviews'));
    }

    public function blogcms()
    {
        return view('admin.blog-cms');
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
  
    

    // Toggle Featured Status (Standard POST Request)
    public function toggleReview($id)
    {
        $review=Review::where('id',$id)->firstOrFail();
        
        if($review->featured || Review::where('featured',1)->count()<3){
        $review = Review::findOrFail($id);
        // Toggle 1 to 0 OR 0 to 1
        $review->featured = $review->featured ? 0 : 1;
        $review->save();
        
        return redirect()->back()->with('success', 'Review featured status updated successfully!');
        }
        else{
            return redirect()->back()->with('error', 'Only 3 Reviews Can be featured at a time!');

        }
    }

    // Delete Review
    public function destroyReview($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully!');
    }
    public function  statusApprove($id){
          Review::where('id',$id)->update([
            'status'=>true,
          ]);
          return redirect()->back()->with('success','Review Status updated Succesfully');
    }

 
}
