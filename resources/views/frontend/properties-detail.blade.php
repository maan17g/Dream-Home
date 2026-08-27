@include('frontend.layout.header', ['title' => $property->title . ' - Dream Home'])

<div class="breadcrumb-wrap">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('property.index') }}">Properties</a></li>
                <li class="breadcrumb-item crumb-active">{{ $property->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<main>
    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <div class="row g-3">
                @php
                    $mainImage = $property->images->where('is_thumbnail', 1)->first() ?? $property->images->first();
                    $galleryImages = $property->images->where('id', '!=', optional($mainImage)->id);
                @endphp

                <div class="col-lg-8">
                    <div class="gallery-main" onclick="openLightbox(0)">
                        <img id="mainGalleryImg"
                            src="{{ $mainImage ? asset('storage/' . $mainImage->image) : asset('images/default-property.jpg') }}"
                            alt="{{ $property->title }}">
                        <span class="gallery-count-badge">
                            <i class="bi bi-images me-1"></i> {{ $property->images->count() }} Photos
                        </span>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="gallery-thumbs">
                        @foreach ($galleryImages->take(4) as $index => $img)
                            <div class="gallery-thumb {{ $loop->last && $galleryImages->count() > 4 ? 'last-thumb' : '' }}"
                                @if ($loop->last && $galleryImages->count() > 4) data-more="{{ $galleryImages->count() - 4 }}" @endif
                                onclick="openLightbox({{ $loop->index + 1 }})">
                                <img src="{{ asset('storage/' . $img->image) }}" alt="{{ $property->title }}">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Detail Section -->
    <section class="detail-section">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-8">


                    <h1 class="prop-title">{{ $property->title }}</h1>
                    <p class="prop-location">
                        <i class="bi bi-geo-alt-fill"></i>
                        {{ implode(', ', array_filter([$property->city->address_line ?? null, $property->city->city ?? null, $property->city->state ?? null])) ?: 'Location unavailable' }}
                    </p>

                    <div class="prop-badges">
                        <span class="prop-badge {{ $property->purpose == 'sale' ? 'sale' : 'rent' }}">
                            <i class="bi bi-tag me-1"></i>For {{ ucfirst($property->purpose) }}
                        </span>
                        @if ($property->featured)
                            <span class="prop-badge featured"><i class="bi bi-star me-1"></i>Featured</span>
                        @endif
                        <span class="prop-badge verified"><i class="bi bi-patch-check me-1"></i>Verified</span>
                    </div>

                    <!-- Quick Stats -->
                    <div class="quick-stats">
                        <div class="stat-box"><i
                                class="bi bi-door-open"></i><strong>{{ $property->bedrooms }}</strong><span>Bedrooms</span>
                        </div>
                        <div class="stat-box"><i
                                class="bi bi-droplet-half"></i><strong>{{ $property->bathrooms }}</strong><span>Bathrooms</span>
                        </div>
                        <div class="stat-box"><i
                                class="bi bi-arrows-fullscreen"></i><strong>{{ number_format($property->area) }}</strong><span>Sq
                                Ft</span></div>
                        <div class="stat-box"><i
                                class="bi bi-car-front"></i><strong>{{ $property->garages }}</strong><span>Parking</span>
                        </div>
                        <div class="stat-box"><i
                                class="bi bi-building"></i><strong>{{ $property->floors }}</strong><span>Floors</span>
                        </div>
                        <div class="stat-box"><i
                                class="bi bi-calendar3"></i><strong>{{ $property->year_built }}</strong><span>Year
                                Built</span></div>
                    </div>

                    <!-- Description -->
                    <h5 class="detail-heading"><i class="bi bi-file-text"></i> Description</h5>
                    <p class="desc-text" id="descText">
                        {{ Str::limit($property->description, 250, '') }}
                        @if (strlen($property->description) > 250)
                            <span id="descMore" style="display:none;">{{ substr($property->description, 250) }}</span>
                        @endif
                    </p>
                    @if (strlen($property->description) > 250)
                        <button class="read-more-btn" id="readMoreBtn" onclick="toggleDesc()">Read More <i
                                class="bi bi-chevron-down"></i></button>
                    @endif

                    <!-- Details Grid -->
                    <h5 class="detail-heading mt-4"><i class="bi bi-list-check"></i> Property Details</h5>
                    <div class="prop-details-grid">
                        <div class="prop-detail-item"><i class="bi bi-house"></i>
                            <div><span class="detail-label">Property Type</span><span
                                    class="detail-val">{{ ucfirst($property->type) }}</span></div>
                        </div>
                        <div class="prop-detail-item"><i class="bi bi-rulers"></i>
                            <div><span class="detail-label">Property Size</span><span
                                    class="detail-val">{{ number_format($property->area) }} sqft</span></div>
                        </div>
                        <div class="prop-detail-item"><i class="bi bi-calendar3"></i>
                            <div><span class="detail-label">Year Built</span><span
                                    class="detail-val">{{ $property->year_built }}</span></div>
                        </div>
                        <div class="prop-detail-item"><i class="bi bi-layers"></i>
                            <div><span class="detail-label">Total Floors</span><span
                                    class="detail-val">{{ $property->floors }}
                                    {{ Str::plural('Floor', $property->floors) }}</span></div>
                        </div>
                        <div class="prop-detail-item"><i class="bi bi-car-front"></i>
                            <div><span class="detail-label">Parking Spaces</span><span
                                    class="detail-val">{{ $property->garages }}</span></div>
                        </div>
                        <div class="prop-detail-item"><i class="bi bi-eye"></i>
                            <div><span class="detail-label">Views</span><span
                                    class="detail-val">{{ $property->views }}</span></div>
                        </div>
                    </div>

                    <!-- Amenities -->
                    @if ($property->amenities->isNotEmpty())
                        <h5 class="detail-heading mt-4"><i class="bi bi-stars"></i> Amenities</h5>
                        <div class="amenities-grid">
                            @foreach ($property->amenities as $amenity)
                                <div class="amenity-item">
                                    <i class="bi {{ $amenity->icon ?? 'bi-check-circle' }}"></i> {{ $amenity->name }}
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="price-card">
                        <div class="price-main">${{ number_format($property->price, 2) }}</div>
                        <div class="price-label">For {{ ucfirst($property->purpose) }} &nbsp;·&nbsp; Created
                            {{ $property->created_at->diffForHumans() }}</div>

                        @if (Auth::check() && Auth::user()->role == 'buyer')
                            <!-- Logged in Buyers: Can book directly without alerts -->
                            <a class="btn-book-viewing text-decoration-none"
                                href="{{ route('user.addAppointment', $property->id) }}">
                                <i class="bi bi-calendar-check"></i> Book a Viewing
                            </a>

                            <!-- Action 1: Save Listing -->
                            <button type="button" class="btn-save-prop js-fav-btn" data-id="{{ $property->id }}"
                                data-url="{{ route('properties.save', $property->id) }}">
                                <i
                                    class="bi {{ $property->savedProperties->contains('user_id', auth()->id()) ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                                <span>
                                    {{ $property->savedProperties->contains('user_id', auth()->id()) ? 'Saved Property' : 'Save Property' }}
                                </span>
                            </button>
                            @elseif (!Auth::check())
                            <!-- Guests: Prompts them to log in -->
                            <a class="btn-book-viewing text-decoration-none" href="{{ route('login.index') }}"
                            onclick="alert('Login to get Appointment')">
                            <i class="bi bi-calendar-check"></i> Book a Viewing
                        </a>
                        <button type="button" class="btn-save-prop js-fav-btn" data-id="{{ $property->id }}"
                            data-url="{{ route('properties.save', $property->id) }}">
                            <i
                                class="bi {{ $property->savedProperties->contains('user_id', auth()->id()) ? 'bi-heart-fill' : 'bi-heart' }}"></i>
                            <span>
                                {{ $property->savedProperties->contains('user_id', auth()->id()) ? 'Saved Property' : 'Save Property' }}
                            </span>
                        </button>
                        @endif
                        @if ($property->agent?->user)
                            <a href="{{ route('agent.show', $property->agent->id) }}"
                                class="d-flex align-items-center gap-3 mt-3 p-3 rounded-3 text-decoration-none border">

                                <img src="{{ asset('storage/' . ($property->agent->user->avatar ?? 'avatars/default.png')) }}"
                                    alt="Agent Avatar" class="rounded-circle object-fit-cover" width="50"
                                    height="50">

                                <div class="flex-grow-1">
                                    <strong class="d-block text-white">
                                        {{ $property->agent->user->first_name }}
                                        {{ $property->agent->user->last_name }}
                                    </strong>

                                    <span class="small text-muted-custom">
                                        View Agent Profile
                                    </span>
                                </div>

                                <i class="bi bi-chevron-right fs-5 text-success"></i>

                            </a>
                        @endif
                        <div class="price-meta">
                            <div class="price-meta-item">
                                <span>Price per sqft</span>
                                <strong>${{ $property->area > 0 ? number_format($property->price / $property->area, 2) : 'N/A' }}</strong>
                            </div>
                            <div class="price-meta-item">
                                <span>Listed</span><strong>{{ $property->created_at->diffForHumans() }}</strong>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
</main>

<!-- Lightbox Overlay -->
<div class="lightbox-overlay" id="lightbox">
    <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
    <button class="lightbox-prev" onclick="lightboxNav(-1)"><i class="bi bi-chevron-left"></i></button>
    <img class="lightbox-img" id="lightboxImg" src="" alt="Gallery">
    <button class="lightbox-next" onclick="lightboxNav(1)"><i class="bi bi-chevron-right"></i></button>
</div>

<script>
    // JS Array generated dynamically from Blade
    const galleryImages = [
        @foreach ($property->images as $img)
            "{{ asset('storage/' . $img->image) }}",
        @endforeach
    ];

    let currentLightboxIndex = 0;

    function openLightbox(index) {
        if (!galleryImages.length) return;
        currentLightboxIndex = index;
        document.getElementById('lightboxImg').src = galleryImages[index];
        document.getElementById('lightbox').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('active');
        document.body.style.overflow = '';
    }

    function lightboxNav(dir) {
        if (!galleryImages.length) return;
        currentLightboxIndex = (currentLightboxIndex + dir + galleryImages.length) % galleryImages.length;
        document.getElementById('lightboxImg').src = galleryImages[currentLightboxIndex];
    }

    function toggleDesc() {
        const more = document.getElementById('descMore');
        const btn = document.getElementById('readMoreBtn');
        if (more.style.display === 'none') {
            more.style.display = 'inline';
            btn.innerHTML = 'Read Less <i class="bi bi-chevron-up"></i>';
        } else {
            more.style.display = 'none';
            btn.innerHTML = 'Read More <i class="bi bi-chevron-down"></i>';
        }
    }
</script>
<script src='{{ asset('asset/js/script.js') }}'></script>
