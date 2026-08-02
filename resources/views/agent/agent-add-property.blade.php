@php
    $isEdit = isset($property) && $property->exists;
    $title = $isEdit ? 'Edit Listing' : 'Add Listing';
@endphp

@include('agent.layout.header', ['title' => $title . ' | Dream Home Agent'])

<main class="dash-content">
    <div class="dash-breadcrumb">
        <a href="agent-dashboard.html">Agent</a> / 
        <a href="agent-properties.html">My Properties</a> / 
        <span class="current">{{ $title }}</span>
    </div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ $isEdit ? route('property.update', $property->id) : route('properties.store') }}" 
          method="POST" 
          enctype="multipart/form-data">
        
        @csrf
        @if($isEdit)
       
            @method('PUT')
        @endif

        <div class="dash-page-head">
            <div>
                <h1 class="dash-page-title">{{ $isEdit ? 'Edit Listing' : 'Add New Listing' }}</h1>
                <p class="dash-page-desc">
                    {{ $isEdit ? 'Update your property details below.' : 'Fill in the details below. You can save as draft and finish later.' }}
                </p>
            </div>
            <div class="dash-head-actions">
                <button type="button" class="dash-btn-secondary"><i class="bi bi-eye"></i> Preview</button>
                <button type="submit" class="dash-btn-primary">
                    <i class="bi bi-check-lg"></i> {{ $isEdit ? 'Update Listing' : 'Publish' }}
                </button>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-lg-12">
                <div class="dash-panel">
                    
                    <!-- Navigation Tabs -->
                    <div class="dash-tabs mb-4">
                        <button type="button" class="dash-tab property-tab active" data-tab="basic">Basic Info</button>
                        <button type="button" class="dash-tab property-tab" data-tab="pricing">Pricing</button>
                        <button type="button" class="dash-tab property-tab" data-tab="media">Media</button>
                        <button type="button" class="dash-tab property-tab" data-tab="location">Location</button>
                        <button type="button" class="dash-tab property-tab" data-tab="features">Features</button>
                        <button type="button" class="dash-tab property-tab" data-tab="seo">SEO</button>
                    </div>

                    <!-- Tab 1: Basic Info -->
                    <div class="dash-tab-pane property-tab-pane active" id="tab-basic">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="dash-form-label">Property Title <span class="req">*</span></label>
                                <input type="text" class="dash-input @error('property_title') is-invalid @enderror" name="property_title" value="{{ old('property_title', $property->title ?? '') }}" placeholder="e.g. Modern Villa in Miami">
                                @error('property_title') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="dash-form-label">Type <span class="req">*</span></label>
                                <select class="dash-select @error('property_type') is-invalid @enderror" name="property_type">
                                    @php $currentType = old('property_type', $property->type ?? ''); @endphp
                                    <option value="house" {{ $currentType == 'house' ? 'selected' : '' }}>House</option>
                                    <option value="villa" {{ $currentType == 'villa' ? 'selected' : '' }}>Villa</option>
                                    <option value="apartment" {{ $currentType == 'apartment' ? 'selected' : '' }}>Apartment</option>
                                    <option value="office" {{ $currentType == 'office' ? 'selected' : '' }}>Office</option>
                                    <option value="land" {{ $currentType == 'land' ? 'selected' : '' }}>Land</option>
                                </select>
                                @error('property_type') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="dash-form-label">Purpose <span class="req">*</span></label>
                                <select class="dash-select @error('property_purpose') is-invalid @enderror" name="property_purpose">
                                    @php $currentPurpose = old('property_purpose', $property->purpose ?? ''); @endphp
                                    <option value="sale" {{ $currentPurpose == 'sale' ? 'selected' : '' }}>For Sale</option>
                                    <option value="rent" {{ $currentPurpose == 'rent' ? 'selected' : '' }}>For Rent</option>
                                </select>
                                @error('property_purpose') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="dash-form-label">Listed By</label>
                                <input type="text" class="dash-input" value="{{ $isEdit && isset($property->agent->user) ? $property->agent->user->first_name . ' ' . $property->agent->user->last_name : Auth::user()->first_name . ' ' . Auth::user()->last_name }}" disabled>
                            </div>

                            <div class="col-12">
                                <label class="dash-form-label">Description</label>
                                <textarea class="dash-input @error('property_description') is-invalid @enderror" name="property_description" rows="5" placeholder="Describe the property...">{{ old('property_description', $property->description ?? '') }}</textarea>
                                @error('property_description') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Tab 2: Pricing & Details -->
                    <div class="dash-tab-pane property-tab-pane d-none" id="tab-pricing">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="dash-form-label">Price ($) <span class="req">*</span></label>
                                <input type="number" step="0.01" class="dash-input @error('property_price') is-invalid @enderror" name="property_price" value="{{ old('property_price', $property->price ?? '') }}" placeholder="850000">
                                @error('property_price') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Floors</label>
                                <input type="number" name="property_floors" class="dash-input" value="{{ old('property_floors', $property->floors ?? 1) }}" placeholder="1">
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Bedrooms</label>
                                <input type="number" name="property_bedrooms" class="dash-input" value="{{ old('property_bedrooms', $property->bedrooms ?? 0) }}" placeholder="0">
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Bathrooms</label>
                                <input type="number" name="property_bathrooms" class="dash-input" value="{{ old('property_bathrooms', $property->bathrooms ?? 0) }}" placeholder="0">
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Garages</label>
                                <input type="number" name="property_garages" class="dash-input" value="{{ old('property_garages', $property->garages ?? 0) }}" placeholder="0">
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Area (sqft)</label>
                                <input type="number" name="property_area" class="dash-input" value="{{ old('property_area', $property->area ?? '') }}" placeholder="4500">
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Year Built</label>
                                <input type="number" name="year_built" class="dash-input" value="{{ old('year_built', $property->year_built ?? date('Y')) }}" placeholder="2024">
                                @error('year') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                                
                            </div>
                        </div>
                    </div>

                    <!-- Tab 3: Media -->
                    <div class="dash-tab-pane property-tab-pane d-none" id="tab-media">
                        @php
                            $featuredImage = $isEdit && $property->images ? $property->images->firstWhere('is_thumbnail', 1) : null;
                            $galleryImages = $isEdit && $property->images ? $property->images->where('is_thumbnail', 0) : collect();
                        @endphp

                        <!-- Featured Image -->
                        <div class="mb-4">
                            <label class="dash-form-label">Featured Cover Image @if(!$isEdit)<span class="req">*</span>@endif</label>
                            <div class="dash-dropzone position-relative text-center p-4 border rounded @error('property_f_image') border-danger @enderror" id="featuredDropzone">
                                <i class="bi bi-cloud-arrow-up fs-1 text-primary"></i>
                                <div><strong>Click or drag cover image here</strong></div>
                                <span class="text-muted small">(JPG, PNG, WEBP - Max 3MB)</span>
                                
                                <input type="file" name="property_f_image" id="property_f_image" class="opacity-0 position-absolute w-100 h-100 top-0 start-0 pointer-cursor" accept="image/*">
                                
                                <div id="featuredPreview" class="mt-3 {{ $featuredImage ? '' : 'd-none' }}">
                                    <img src="{{ $featuredImage ? asset('storage/' . $featuredImage->image) : '' }}" id="featuredPreviewImg" class="img-thumbnail" style="max-height: 180px; object-fit: cover;">
                                </div>
                            </div>
                            @error('property_f_image') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <!-- Gallery Images -->
                        <div class="mb-3">
                            <label class="dash-form-label">Gallery Images (Multiple)</label>
                            <div class="dash-dropzone position-relative text-center p-4 border rounded @error('property_all_images.*') border-danger @enderror" id="galleryDropzone">
                                <i class="bi bi-images fs-1 text-primary"></i>
                                <div><strong>Click or drag gallery photos here</strong></div>
                                <span class="text-muted small">You can select multiple photos</span>
                                
                                <input type="file" name="property_all_images[]" id="property_all_images" class="opacity-0 position-absolute w-100 h-100 top-0 start-0 pointer-cursor" accept="image/*" multiple>
                            </div>
                            @error('property_all_images.*') <div class="text-danger small mt-1">{{ $message }}</div> @enderror

                            <!-- Gallery Preview Container -->
                            <div id="galleryPreview" class="row g-2 mt-3">
                                @foreach($galleryImages as $gImg)
                                    <div class="col-auto">
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $gImg->image) }}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Tab 4: Location -->
                    <div class="dash-tab-pane property-tab-pane d-none" id="tab-location">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="dash-form-label">Address <span class="req">*</span></label>
                                <input type="text" class="dash-input @error('property_address') is-invalid @enderror" name="property_address" value="{{ old('property_address', $property->city->address_line ?? '') }}" placeholder="Street address">
                                @error('property_address') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="dash-form-label">City <span class="req">*</span></label>
                                <input type="text" name="property_city" class="dash-input @error('property_city') is-invalid @enderror" value="{{ old('property_city', $property->city->city ?? '') }}" placeholder="Miami">
                                @error('property_city') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="dash-form-label">State <span class="req">*</span></label>
                                <input type="text" name="property_state" class="dash-input @error('property_state') is-invalid @enderror" value="{{ old('property_state', $property->city->state ?? '') }}" placeholder="Florida">
                                @error('property_state') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Tab 5: Features & Amenities -->
                    <div class="dash-tab-pane property-tab-pane d-none" id="tab-features">
                        <label class="dash-form-label">Amenities</label>
                        <div class="chip-select">
                            @if(isset($amenities) && count($amenities) > 0)
                                @php
                                    $selectedAmenities = old('amenities', $isEdit && $property->amenities ? $property->amenities->pluck('id')->toArray() : []);
                                @endphp
                                @foreach($amenities as $amenity)
                                    <input type="checkbox" name="amenities[]" value="{{ $amenity->id }}" id="am{{ $amenity->id }}" {{ in_array($amenity->id, $selectedAmenities) ? 'checked' : '' }}>
                                    <label for="am{{ $amenity->id }}"><i class="{{ $amenity->icon }}"></i> {{ $amenity->name }}</label>
                                @endforeach
                            @else
                                <p class="text-muted">No amenities found in database.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Tab 6: SEO -->
                    <div class="dash-tab-pane property-tab-pane d-none" id="tab-seo">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="dash-form-label">URL Slug (Auto-generated if left blank)</label>
                                <input type="text" class="dash-input @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $property->slug ?? '') }}" placeholder="modern-villa-in-miami">
                                @error('slug') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between mt-4 pt-3" style="border-top:1px solid var(--border-color);">
                        <button type="button" class="dash-btn-secondary" id="prevTabBtn"><i class="bi bi-arrow-left"></i> Previous</button>
                        <button type="button" class="dash-btn-primary" id="nextTabBtn">Next <i class="bi bi-arrow-right"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</main>

@include('layout.Notification')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('dashboard/assets/js/script.js') }}"></script>