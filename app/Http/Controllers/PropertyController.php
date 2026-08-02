<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Models\City;
use App\Models\Property;
use App\Models\PropertyImage;
use App\Models\savedProperties;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PropertyController extends Controller
{
    public function create()
    {
        $amenities = Amenity::all();

        // Return the Blade view template and pass the $amenities variable
        return view('agent.agent-add-property', compact('amenities'));
    }

    public function index()
    {
        $properties = Property::with(['images', 'amenities', 'city', 'agent.user'])->get();

        return view('frontend.property', compact('properties'));
    }

    public function edit($id)
    {
        $property = Property::with(['images', 'agent.user', 'city', 'amenities'])->findOrFail($id);
        $amenities = Amenity::all();

        return view('agent.agent-add-property', compact('property', 'amenities'));
    }

    public function update(Request $request, $id)
    {
        // 1. Fetch the Property record with relations
        $property = Property::with(['images', 'city', 'amenities'])->findOrFail($id);

        // 2. Validate Request Data (FIXED)
        $validated = $request->validate([
            'property_title' => ['required', 'string', 'max:255'],
            'property_type' => ['required', 'string', Rule::in(['house', 'villa', 'apartment', 'office', 'land'])],
            'property_purpose' => ['required', 'string', Rule::in(['sale', 'rent'])],
            'property_description' => ['nullable', 'string'],
            'property_price' => ['required', 'numeric', 'min:0'],
            'property_floors' => ['nullable', 'integer', 'min:0'],
            'property_bedrooms' => ['nullable', 'integer', 'min:0'],
            'property_bathrooms' => ['nullable', 'integer', 'min:0'],
            'property_garages' => ['nullable', 'integer', 'min:0'],
            'property_area' => ['nullable', 'numeric', 'min:0'],
            'year_built' => ['nullable', 'integer', 'digits:4'],
            'property_address' => ['required', 'string', 'max:255'],
            'property_city' => ['required', 'string', 'max:100'],
            'property_state' => ['required', 'string', 'max:100'],
            'amenities' => ['nullable', 'array'],
            'amenities.*' => ['integer', 'exists:amenities,id'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('properties', 'slug')->ignore($property->id)],
            'property_f_image' => ['nullable', 'image', 'mimes:jpeg,jpg,png,webp', 'max:3072'],
            'property_all_images' => ['nullable', 'array'],
            'property_all_images.*' => ['image', 'mimes:jpeg,jpg,png,webp', 'max:3072'],
        ]);

        // 3. Update or Create Location / City Record
        if ($property->city) {
            $property->city->update([
                'address_line' => $request->property_address,
                'city' => $request->property_city,
                'state' => $request->property_state,
            ]);
            $cityId = $property->city->id;
        } else {
            $city = City::create([
                'address_line' => $request->property_address,
                'city' => $request->property_city,
                'state' => $request->property_state,
                'country' => 'Pakistan',
            ]);
            $cityId = $city->id;
        }

        // 4. Update Core Property Record
        $slug = $request->filled('slug')
            ? Str::slug($request->slug)
            : Str::slug($request->property_title).'-'.time();

        $property->update([
            'title' => $request->property_title,
            'slug' => $slug,
            'description' => $request->property_description,
            'purpose' => $request->property_purpose,
            'type' => $request->property_type,
            'city_id' => $cityId,
            'price' => $request->property_price,
            'area' => $request->property_area,
            'bedrooms' => $request->property_bedrooms ?? 0,
            'bathrooms' => $request->property_bathrooms ?? 0,
            'garages' => $request->property_garages ?? 0,
            'floors' => $request->property_floors ?? 1,
            'year_built' => $request->year_built,
        ]);

        // 5. Sync Amenities (Pivot Table)
        $property->amenities()->sync($request->input('amenities', []));

        // 6. Handle Featured Cover Image Upload (Replace old one if new provided)
        if ($request->hasFile('property_f_image')) {
            $oldFeatured = $property->images()->where('is_thumbnail', 1)->first();

            if ($oldFeatured) {
                Storage::disk('public')->delete($oldFeatured->image);
                $oldFeatured->delete();
            }

            $fImagePath = $request->file('property_f_image')->store('properties/featured', 'public');

            PropertyImage::create([
                'property_id' => $property->id,
                'image' => $fImagePath,
                'is_thumbnail' => 1,
                'sort_order' => 0,
            ]);
        }

        // 7. Handle Additional Gallery Images Upload
        if ($request->hasFile('property_all_images')) {
            $maxSortOrder = $property->images()->max('sort_order') ?? 0;

            foreach ($request->file('property_all_images') as $galleryFile) {
                $maxSortOrder++;
                $gPath = $galleryFile->store('properties/gallery', 'public');

                PropertyImage::create([
                    'property_id' => $property->id,
                    'image' => $gPath,
                    'is_thumbnail' => 0,
                    'sort_order' => $maxSortOrder,
                ]);
            }
        }

        return redirect()->route('property.create')->with('success', 'Property updated successfully!');
    }

    public function search(Request $request)
    {
        $validated = $request->validate([
            'search' => 'nullable|string|max:100',
            'type' => 'nullable|string|in:apartment,villa,house,appartment,land,office',
            'bedrooms' => 'nullable|integer|min:1|max:10',
            'bathrooms' => 'nullable|integer|min:1|max:10',
            'min_area' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'purpose' => 'nullable|array',
            'purpose.*' => 'in:sale,rent',
            'sort' => 'nullable|string|in:featured,price-low,price-high,newest,beds',
        ]);
        try {
            // 2. Base query for active/approved listings

            $query = Property::with('city')->where('verified', 'approved');

            // Search filter
            if (! empty($validated['search'])) {
                $search = $validated['search'];

                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                      // Use 'city' instead of 'name' here
                        ->orWhereHas('city', function ($cityQuery) use ($search) {
                            $cityQuery->where('city', 'like', "%{$search}%");
                        });
                });
            }

            // Type filter
            if (! empty($validated['type'])) {
                $query->where('type', $validated['type']);
            }

            // Bedrooms filter (Minimum)
            if (! empty($validated['bedrooms'])) {
                $query->where('bedrooms', '>=', $validated['bedrooms']);
            }

            // Bathrooms filter (Minimum)
            if (! empty($validated['bathrooms'])) {
                $query->where('bathrooms', '>=', $validated['bathrooms']);
            }

            // Min Area filter
            if (! empty($validated['min_area'])) {
                $query->where('area', '>=', $validated['min_area']);
            }

            // Purpose filter (Sale / Rent)
            if (! empty($validated['purpose'])) {
                $query->whereIn('purpose', $validated['purpose']);
            }

            // Max Price filter
            if (! empty($validated['max_price'])) {
                $query->where('price', '<=', $validated['max_price']);
            }

            // Sorting
            $sort = $validated['sort'] ?? 'featured';
            switch ($sort) {
                case 'price-low':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price-high':
                    $query->orderBy('price', 'desc');
                    break;
                case 'newest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'beds':
                    $query->orderBy('bedrooms', 'desc');
                    break;
                case 'featured':
                default:
                    $query->orderBy('featured', 'desc')->orderBy('created_at', 'desc');
                    break;
            }

            // Paginate and retain active query params
            $properties = $query->paginate(12)->withQueryString();

            return view('frontend.property', compact('properties'));

        } catch (\Exception $e) {
            // Return back with error alert if a query or database issue occurs
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function propsearch(Request $request)
    {
        // 1. Get the agent ID safely

        $agentId = Auth::user()->agent?->id;
        if (! $agentId) {
            return redirect()->back()->with('error', 'Agent profile not found.');
        }

        // 2. Enforce agent_id scope on the base query
        $query = Property::where('agent_id', $agentId);

        // 3. Search filter
        if ($request->filled('search')) {
            $searchTerm = $request->search;
            // Grouping the search clause prevents OR precedence issues if expanded later
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%'.$searchTerm.'%');
            });
        }

        // 4. Status filter (FIXED)
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('verified', $request->status);
        }

        // 5. Sorting
        $sortColumn = $request->input('sort') === 'most_viewed' ? 'views' : 'created_at';
        $query->orderBy($sortColumn, 'desc');

        // 6. Paginate and keep query string parameters in pagination links
        $properties = $query->paginate(9)->withQueryString();

        return view('agent.agent-properties', compact('properties'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'property_title' => 'required|string|max:255',
            'property_type' => 'required|in:house,apartment,office,villa,land',
            'property_purpose' => 'required|in:sale,rent',
            'property_description' => 'nullable|string',
            'property_price' => 'required|numeric|min:0',
            'property_area' => 'nullable|integer|min:0',
            'property_floors' => 'nullable|integer|min:0',
            'property_bedrooms' => 'nullable|integer|min:0',
            'property_bathrooms' => 'nullable|integer|min:0',
            'property_garages' => 'nullable|integer|min:0',
            'year_built' => 'nullable|integer|digits:4|max:'.date('Y'),
            // Location
            'property_address' => 'required|string|max:255',
            'property_city' => 'required|string|max:255',
            'property_state' => 'required|string|max:255',

            // Amenities
            'amenities' => 'nullable|array',
            'amenities.*' => 'exists:amenities,id',

            // Media
            'property_f_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:3072',
            'property_all_images' => 'nullable|array',
            'property_all_images.*' => 'image|mimes:jpg,jpeg,png,webp|max:3072',

            'slug' => 'nullable|string|max:200|unique:properties,slug',
        ]);

        DB::beginTransaction();

        try {
            // Location processing
            $city = City::firstOrCreate(
                [
                    'city' => $request->property_city,
                    'state' => $request->property_state,
                    'address_line' => $request->property_address,
                ],
                [
                    'country' => 'Pakistan',
                ]
            );

            $user = Auth::user();
            // Slug generation
            $slug = $request->filled('slug')
                ? Str::slug($request->slug)
                : Str::slug($request->property_title).'-'.time();

            // Create property record
            $property = Property::create([
                'agent_id' => $user->agent->id, // Fallback to 1 if testing without auth
                'title' => $request->property_title,
                'slug' => $slug,
                'description' => $request->property_description,
                'purpose' => $request->property_purpose,
                'type' => $request->property_type,
                'city_id' => $city->id,
                'price' => $request->property_price,
                'area' => $request->property_area ?? 0,
                'bedrooms' => $request->property_bedrooms ?? 0,
                'bathrooms' => $request->property_bathrooms ?? 0,
                'garages' => $request->property_garages ?? 0,
                'floors' => $request->property_floors ?? 1,
                'year_built' => $request->year_built ?? date('Y'),
                'featured' => 0,
                'views' => 0,
            ]);

            // Featured Image Upload
            if ($request->hasFile('property_f_image')) {
                $featuredPath = $request->file('property_f_image')->store('properties/featured', 'public');
                PropertyImage::create([
                    'property_id' => $property->id,
                    'image' => $featuredPath,
                    'is_thumbnail' => 1,
                    'sort_order' => 0,
                ]);
            }

            // Gallery Images Upload
            if ($request->hasFile('property_all_images')) {
                foreach ($request->file('property_all_images') as $index => $file) {
                    $path = $file->store('properties/gallery', 'public');
                    PropertyImage::create([
                        'property_id' => $property->id,
                        'image' => $path,
                        'is_thumbnail' => 0,
                        'sort_order' => $index + 1,
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

            return redirect()->back()->withInput()->with('error', 'Error creating property: '.$e->getMessage());
        }
    }

    public function show(Request $request, $id)
    {

        $property = Property::findOrFail($id);

        // Get the existing array of viewed properties, default to empty array
        $viewed = $request->session()->get('viewed_properties', []);

        // Check if this property ID is already in the array
        if (! collect($viewed)->contains($property->id)) {

            $property->increment('views');

            // Push the new ID into the array and save it back to the session
            $request->session()->put('viewed_properties', $property->id);
        }
        $property = Property::with(['images', 'amenities', 'city'])
            ->findOrFail($id);

        return view('frontend.properties-detail', compact('property'));
    }

    public function destroy($id)
    {
        $property = Property::with(['images'])->findOrFail($id);

        $images = $property->images;
        foreach ($images as $image) {
            if (Storage::disk('public')->exists($image['image'])) {
                Storage::disk('public')->delete($image['image']);
            }
        }
        $isdeleted = Property::destroy($id);

        if ($isdeleted) {
            return redirect()->back()->with('success', 'Property deleted Successfully');
        }
    }

    public function toggle($id)
    {
        $saved = savedProperties::where('user_id', Auth::id())
            ->where('property_id', $id)
            ->first();

        if ($saved) {

            savedProperties::where('user_id', Auth::id())
                ->where('property_id', $id)
                ->delete();

            return response()->json([
                'success' => true,
                'is_favorited' => false,
            ]);
        }

        savedProperties::create([
            'user_id' => Auth::id(),
            'property_id' => $id,
        ]);

        return response()->json([
            'success' => true,
            'is_favorited' => true,
        ]);
    }
}
