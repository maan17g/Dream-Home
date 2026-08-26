<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenity;
use App\Models\City;
use App\Models\Property;

class CityAmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::all();
        $cities = City::orderBy('id', 'desc')->get();
        
        return view('admin.cms-AmenityCity', compact('amenities', 'cities'));
    }

    /* ================= AMENITIES ================= */

    public function storeAmenity(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:amenities,name',
            'icon' => 'nullable|string|max:100',
        ]);

        Amenity::create($validated);

        return redirect()->route('amenities.index')
            ->with('success', 'Amenity added successfully.');
    }

    public function updateAmenity(Request $request, Amenity $amenity)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:amenities,name,' . $amenity->id,
            'icon' => 'nullable|string|max:100',
        ]);

        $amenity->update($validated);

        return redirect()->route('amenities.index')
            ->with('success', 'Amenity updated successfully.');
    }

    public function destroyAmenity(Amenity $amenity)
    {
        if ($amenity->properties()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete amenity because it is attached to active properties.');
        }

        $amenity->delete();

        return redirect()->route('amenities.index')
            ->with('success', 'Amenity removed successfully.');
    }

    /* ================= CITIES ================= */

    public function storeCity(Request $request)
    {
        $validated = $request->validate([
            'city' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    $exists = City::where('city', $value)->exists();
                    if ($exists) {
                        $fail('The city name has already been taken.');
                    }
                }
            ],
            'state' => 'nullable|string|max:255',
          
        ]);

        City::create([...$validated,
        'address_line'=>'',]);

        return redirect()->to(route('amenities.index') . '#cities-panel')
            ->with('success', 'City added successfully.');
    }

    public function destroyCity(City $city)
    {
        $cityExist = Property::where('city_id', $city->id)->exists();

        if ($cityExist) {
            return redirect()->back()->with('error', 'City is used by a property and cannot be deleted.');
        }

        $city->delete();

        return redirect()->to(route('amenities.index') . '#cities-panel')
            ->with('success', 'City removed successfully.');
    }
}