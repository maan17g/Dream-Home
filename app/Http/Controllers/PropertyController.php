<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Amenity;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        return view('frontend.property');
    }



    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'property_title'       => 'required|string|max:255',
            'property_type'        => 'required|in:house,apartment,office,villa,land',
            'property_purpose'     => 'required|in:sale,rent',
            'property_description' => 'nullable|string',
            'property_price'       => 'required|numeric|min:0',
            'property_area'        => 'nullable|integer|min:0',
            'property_floors'      => 'nullable|integer|min:0',
            'property_bedrooms'    => 'nullable|integer|min:0',
            'property_bathrooms'   => 'nullable|integer|min:0',
            'property_garages'     => 'nullable|integer|min:0',
            'year_built'           => 'nullable|integer|digits:4|max:' . date('Y'),
            
            // Location
            'property_address'     => 'required|string|max:255',
            'property_city'        => 'required|string|max:255',
            'property_state'       => 'required|string|max:255',
            
            // Amenities
            'amenities'            => 'nullable|array',
            'amenities.*'          => 'exists:amenities,id',

            // Media
            'property_f_image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
            'property_all_images'   => 'nullable|array',
            'property_all_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:3072',
            
            'slug'                 => 'nullable|string|max:200|unique:properties,slug',
        ]);

        DB::beginTransaction();

        try {
            // Location processing
            $city = City::firstOrCreate(
                [
                    'city'         => $request->property_city,
                    'state'        => $request->property_state,
                    'address_line' => $request->property_address,
                ],
                [
                    'country' => 'Pakistan'
                ]
            );

            // Slug generation
            $slug = $request->filled('slug') 
                ? Str::slug($request->slug) 
                : Str::slug($request->property_title) . '-' . time();

            // Create property record
            $property = Property::create([
                'agent_id'    => Auth::id() ?? 1, // Fallback to 1 if testing without auth
                'title'       => $request->property_title,
                'slug'        => $slug,
                'description' => $request->property_description,
                'purpose'     => $request->property_purpose,
                'type'        => $request->property_type,
                'city_id'     => $city->id,
                'price'       => $request->property_price,
                'area'        => $request->property_area ?? 0,
                'bedrooms'    => $request->property_bedrooms ?? 0,
                'bathrooms'   => $request->property_bathrooms ?? 0,
                'garages'     => $request->property_garages ?? 0,
                'floors'      => $request->property_floors ?? 1,
                'year_built'  => $request->year_built ?? date('Y'),
                'featured'    => 0,
                'views'       => 0,
            ]);

            // Featured Image Upload
            if ($request->hasFile('property_f_image')) {
                $featuredPath = $request->file('property_f_image')->store('properties/featured', 'public');
                PropertyImage::create([
                    'property_id'  => $property->id,
                    'image'        => $featuredPath,
                    'is_thumbnail' => 1,
                    'sort_order'   => 0
                ]);
            }

            // Gallery Images Upload
            if ($request->hasFile('property_all_images')) {
                foreach ($request->file('property_all_images') as $index => $file) {
                    $path = $file->store('properties/gallery', 'public');
                    PropertyImage::create([
                        'property_id'  => $property->id,
                        'image'        => $path,
                        'is_thumbnail' => 0,
                        'sort_order'   => $index + 1
                    ]);
                }
            }

            // Attach Selected Amenities
            if ($request->filled('amenities')) {
                $property->amenities()->sync($request->amenities);
            }

            DB::commit();
            return redirect()->back()->with('success', 'Property successfully published!');

        } catch (\Exception $e) {
        
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Error creating property: ' . $e->getMessage());
        }
    }

  public function show($id)
{
    $property = Property::with(['images', 'amenities', 'city'])
        ->findOrFail($id);

    return view('frontend.properties-detail', compact('property'));
}
}