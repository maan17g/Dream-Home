@include('frontend.layout.header', ['title' => 'Dream Home - Find Your Perfect Place'])


<main>
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="container hero-content">
            <div class="col-lg-8">
                <div class="trust-badge">
                    <span class="trust-dot"></span> Trusted by 10,000+ Happy Homeowners
                </div>
                <h1 class="hero-title mb-3">Find your Perfect <br><span>Dream Home</span></h1>
                <p class="hero-desc mb-4">
                    Explore verified listings, get expert guidance, and find the property that fits your lifestyle
                    perfectly.
                </p>
                <div class="d-flex flex-wrap gap-4 hero-proof-row">
                    <div class="hero-proof-item">
                        <strong>10K+</strong>
                        <span>Happy Clients</span>
                    </div>
                    <div class="hero-proof-divider"></div>
                    <div class="hero-proof-item">
                        <strong>500+</strong>
                        <span>Premium Listings</span>
                    </div>
                    <div class="hero-proof-divider"></div>
                    <div class="hero-proof-item">
                        <strong>99%</strong>
                        <span>Client Satisfaction</span>
                    </div>
                    <div class="hero-proof-divider"></div>
                    <div class="hero-proof-item">
                        <strong>24/7</strong>
                        <span>Support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search Form (Overlapping) -->
    <section class="search-container">
        <div class="container">
            <form class="hero-form" action="{{ route('property.search') }}" method="GET">
                <div class="row g-3 align-items-end">
                    <div class="col-12 col-md-4">
                        <label class="form-label text-muted-custom small">Type</label>
                        <select name="type" class="form-select @error('type') is-invalid @enderror"
                            id="propertyType">
                            <option value="">All Types</option>
                            <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Apartment
                            </option>
                            <option value="villa" {{ request('type') == 'villa' ? 'selected' : '' }}>Villa</option>
                            <option value="house" {{ request('type') == 'house' ? 'selected' : '' }}>House</option>
                            <option value="land" {{ request('type') == 'land' ? 'selected' : '' }}>Land</option>
                            <option value="office" {{ request('type') == 'office' ? 'selected' : '' }}>Office</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-4">
                        <label class="form-label text-muted-custom small">Location</label>
                        <select class="form-select" name="city">
                            <option value="">All Locations</option>
                            @foreach ($cities as $city)
                                <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                                    {{ $city }}
                                </option>
                            @endforeach
                        </select>
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 col-md-4">
                        <button type="submit" class="btn-search">
                            <i class="bi bi-search"></i> Search Now
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <!-- Trusted By Brands -->
    <section class="brand-strip">
        <div class="container">
            <p class="brand-strip-label">Trusted by leading brands</p>
            <div class="brand-strip-row">
                <span class="brand-strip-item">Forbes</span>
                <span class="brand-strip-item"><i class="bi bi-house-fill me-1"></i>Zillow</span>
                <span class="brand-strip-item">realtor.com</span>
                <span class="brand-strip-item">Homes.com</span>
                <span class="brand-strip-item">Trulia</span>
                <span class="brand-strip-item">The New York Times</span>
            </div>
        </div>
    </section>

    <!-- Feature Property Section -->
    <section class="feature-property">
        <div class="container" id="container-prop">
            <!-- Section Header -->
            <div class="d-flex justify-content-between align-items-end mb-3 flex-wrap gap-3">
                <div class="text-start">
                    <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Featured Listings</h6>
                    <h2 class="display-6 fw-bold mb-0">Recently Added Luxury Homes</h2>
                </div>
                <a href="{{ route('property.index') }}" class="btn-view-all">View All Properties <i
                        class="bi bi-arrow-right ms-1"></i></a>
            </div>
            <div class="row g-4 justify-content-center cont-prop">
                @forelse ($properties as $property)
                    <x-property :property="$property" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- Explore By City -->
    {{-- <section class="city-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-3">
                <div class="text-start">
                    <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Explore By City</h6>
                    <h2 class="display-6 fw-bold mb-0">Find Properties in Top Locations</h2>
                </div>
                <a href="property.html" class="btn-view-all">View All Cities <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
            <div class="city-scroll-row">
                <div class="city-card">
                    <img src="https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?auto=format&fit=crop&w=500&q=80"
                        alt="New York" loading="lazy">
                    <div class="city-card-overlay">
                        <span class="city-card-name">New York</span>
                        <span class="city-card-count">245 Properties</span>
                    </div>
                </div>
                <div class="city-card">
                    <img src="https://images.unsplash.com/photo-1535498730771-e735b998cd64?auto=format&fit=crop&w=500&q=80"
                        alt="Miami" loading="lazy">
                    <div class="city-card-overlay">
                        <span class="city-card-name">Miami</span>
                        <span class="city-card-count">112 Properties</span>
                    </div>
                </div>
                <div class="city-card">
                    <img src="https://images.unsplash.com/photo-1580655653885-65763b2597d0?auto=format&fit=crop&w=500&q=80"
                        alt="Los Angeles" loading="lazy">
                    <div class="city-card-overlay">
                        <span class="city-card-name">Los Angeles</span>
                        <span class="city-card-count">310 Properties</span>
                    </div>
                </div>
                <div class="city-card">
                    <img src="https://images.unsplash.com/photo-1518684079-3c830dcef090?auto=format&fit=crop&w=500&q=80"
                        alt="Dubai" loading="lazy">
                    <div class="city-card-overlay">
                        <span class="city-card-name">Dubai</span>
                        <span class="city-card-count">89 Properties</span>
                    </div>
                </div>
                <div class="city-card">
                    <img src="https://images.unsplash.com/photo-1531218150217-54595bc2b934?auto=format&fit=crop&w=500&q=80"
                        alt="Austin" loading="lazy">
                    <div class="city-card-overlay">
                        <span class="city-card-name">Austin</span>
                        <span class="city-card-count">76 Properties</span>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Browse By Category -->
    <section class="category-section mt-5">
        <div class="container">
            <div class="text-start mb-4">
                <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Browse By Category</h6>
                <h2 class="display-6 fw-bold mb-0">Explore Property Types</h2>
            </div>
            <div class="row g-3">
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-buildings"></i></div>
                        <div class="category-name">Apartments</div>
                        <div class="category-count">320+ Properties</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-house-door"></i></div>
                        <div class="category-name">Villas</div>
                        <div class="category-count">150+ Properties</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-house"></i></div>
                        <div class="category-name">Townhouses</div>
                        <div class="category-count">200+ Properties</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-building"></i></div>
                        <div class="category-name">Penthouses</div>
                        <div class="category-count">80+ Properties</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-house-heart"></i></div>
                        <div class="category-name">Luxury Homes</div>
                        <div class="category-count">120+ Properties</div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="category-card">
                        <div class="category-icon"><i class="bi bi-building-fill-gear"></i></div>
                        <div class="category-name">Commercial</div>
                        <div class="category-count">60+ Properties</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About / Features Section -->
    <section class="about-section">
        <div class="container">
            <div class="row align-items-center gy-5">

                <!-- Text Content -->
                <div class="col-lg-6">
                    <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Who are we</h6>
                    <h2 class="display-6 fw-bold mb-4">Assisting individuals in locating the appropriate Real Estate
                    </h2>
                    <p class="text-muted-custom mb-4">
                        We guide you through every step of your home-finding journey, offering trusted insights,
                        verified listings, and a smooth decision-making experience.
                    </p>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="feature-box">
                                <div class="icon-box"><i class="fas fa-home fa-2x"></i></div>
                                <h5 class="fw-bold mb-2">Smart Matching</h5>
                                <p class="small text-muted-custom mb-0">We analyze your needs and match you with homes
                                    that fit your lifestyle.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-box">
                                <div class="icon-box"><i class="fas fa-certificate fa-2x"></i></div>
                                <h5 class="fw-bold mb-2">Expert Guidance</h5>
                                <p class="small text-muted-custom mb-0">Clear advice, real-time support, and
                                    transparency for every property.</p>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="row gap-0 gap-md-5 justify-content-between px-2 my-5 align-items-center">
                            <div class="col-3 count justify-content-center d-flex align-items-center flex-column">
                                <h2 class="m-0 counter" data-bs-start="0" data-bs-end="500" data-bs-sign="+">500+
                                </h2>
                                <span class="text-muted-custom text-center">Properties Listed</span>
                            </div>
                            <div class="col-3 count p-3 d-flex align-items-center flex-column">
                                <h2 class="counter" data-bs-start="0" data-bs-end="150" data-bs-sign="+">150+</h2>
                                <span class="text-muted-custom text-center">Satisfied Client</span>
                            </div>
                            <div class="col-3 count p-3 d-flex align-items-center flex-column">
                                <h2 class="counter" data-bs-start="0" data-bs-end="98" data-bs-sign="%">98%</h2>
                                <span class="text-muted-custom text-center">Client Satisfaction</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image Composition -->
                <div class="col-lg-6">
                    <div class="image-stack">
                        <div class="img-blob-1">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80"
                                class="img-cover" alt="Modern House">
                        </div>
                        <div class="img-blob-2">
                            <img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=400&q=80"
                                class="img-cover" alt="Real Estate Agent">
                        </div>
                        <div class="promise-badge">
                            <strong>10,000+</strong>
                            <span>Happy Homeowners</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Simple Steps -->
    <section class="steps-section">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">How It Works</h6>
                <h2 class="display-6 fw-bold mb-0">Simple Steps to Your Dream Home</h2>
            </div>
            <div class="row g-4">
                <div class="col-md-3">
                    <div class="step-item" data-reveal>
                        <div class="step-icon"><i class="bi bi-search"></i></div>
                        <span class="step-num">STEP 01</span>
                        <div class="step-title">Search Properties</div>
                        <p class="step-desc mb-0">Browse listings that fit your needs and budget.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="step-item" data-reveal>
                        <div class="step-icon"><i class="bi bi-calendar-check"></i></div>
                        <span class="step-num">STEP 02</span>
                        <div class="step-title">Book a Visit</div>
                        <p class="step-desc mb-0">Schedule a tour or virtual walkthrough with our team.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="step-item" data-reveal>
                        <div class="step-icon"><i class="bi bi-file-earmark-check"></i></div>
                        <span class="step-num">STEP 03</span>
                        <div class="step-title">Make an Offer</div>
                        <p class="step-desc mb-0">Submit an offer and negotiate the best deal with confidence.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="step-item" data-reveal>
                        <div class="step-icon"><i class="bi bi-key"></i></div>
                        <span class="step-num">STEP 04</span>
                        <div class="step-title">Move In</div>
                        <p class="step-desc mb-0">Close the deal and move into your new dream home.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonial-section">
        <div class="container">
            <div class="row align-items-end mb-5">
                <div class="col-lg-7">
                    <span class="text-uppercase small fw-medium text-primary-custom" style="letter-spacing: 3px;">
                        <span class="section-line"></span>Perspectives
                    </span>
                    <h2 class="editorial-title">What it feels like to <br><i
                            style="font-weight: normal; opacity: 0.8;">finally</i> be home.</h2>
                </div>
                <div class="col-lg-5 text-lg-end">
                    <p class="text-muted-custom mb-4" style="max-width: 400px; margin-left: auto;">
                        A collection of experiences from the homeowners who redefined their lifestyle with Real Estate.
                    </p>
                </div>
            </div>

            <div class="row g-4">
                @forelse($reviews as $review)
                    @php
                        $user = $review->appointment?->user;
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="sleek-card h-100 d-flex flex-column justify-content-between">
                            <div>
                                {{-- STAR RATING --}}
                                <div class="text-warning mb-3">
                                    {{-- @for ($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star{{ $i <= $review->rating ? '-fill' : '' }}"></i>
                                @endfor --}}
                                </div>

                                {{-- COMMENT CONTENT --}}
                                <p class="quote-content">
                                    @if ($review->comment)
                                        "{{ $review->comment }}"
                                    @else
                                        <i class="text-muted">No comment provided with this rating.</i>
                                    @endif
                                </p>
                            </div>

                            {{-- AUTHOR INFO --}}
                            <div class="author-wrap mt-4">
                                @if ($user?->avatar)
                                    <img src="{{ asset('storage/' . $user->avatar) }}" class="author-img"
                                        alt="{{ $user->first_name }} {{ $user->last_name }}">
                                @else
                                    <div class="author-img-placeholder rounded-circle bg-light d-flex align-items-center justify-content-center text-primary fw-bold"
                                        style="width: 48px; height: 48px; font-size: 1.1rem;">
                                        {{ strtoupper(substr($user?->first_name ?? 'U', 0, 1)) }}
                                    </div>
                                @endif

                                <div class="ms-3">
                                    <h6 class="author-name mb-0">
                                        {{ $user?->first_name ?? 'Anonymous' }} {{ $user?->last_name }}
                                    </h6>
                                    <span class="author-label text-muted small">Verified Buyer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p class="text-muted">No featured testimonials available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <section class="team-section">
        <div class="container">
            <div class="text-start mb-5">
                <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Meet Our Agents</h6>
                <h2 class="display-6 fw-bold">Experienced. Trusted. Dedicated.</h2>
            </div>
            <div class="row g-4">
                @forelse($agents as $agent)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-card">
                            <div class="team-img-wrapper">
                                <img src="{{ $agent->user->avatar ? asset('storage/' . $agent->user->avatar) : asset('avatars/default.png') }}"
                                    alt="{{ $agent->user->first_name }} {{ $agent->user->last_name }}">

                                <div class="team-overlay">
                                    <div class="team-social d-flex gap-2">
                                        @if ($agent->linkedin)
                                            <a href="{{ $agent->linkedin }}" target="_blank"
                                                rel="noopener noreferrer"><i class="fab fa-linkedin-in"></i></a>
                                        @endif
                                        @if ($agent->twitter)
                                            <a href="{{ $agent->twitter }}" target="_blank"
                                                rel="noopener noreferrer"><i class="fab fa-twitter"></i></a>
                                        @endif
                                        @if ($agent->facebook)
                                            <a href="{{ $agent->facebook }}" target="_blank"
                                                rel="noopener noreferrer"><i class="fab fa-facebook-f"></i></a>
                                        @endif
                                        @if ($agent->instagram)
                                            <a href="{{ $agent->instagram }}" target="_blank"
                                                rel="noopener noreferrer"><i class="fab fa-instagram"></i></a>
                                        @endif
                                        @if ($agent->user->email)
                                            <a href="mailto:{{ $agent->user->email }}"><i
                                                    class="bi bi-envelope-fill"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="team-body">
                                <div class="team-name">{{ $agent->user->first_name }} {{ $agent->user->last_name }}
                                </div>
                                <div class="team-role text-capitalize">{{ str_replace('_', ' ', $agent->agent_type) }}
                                </div>
                                <div class="team-stat">
                                    <i class="bi bi-award-fill"></i>
                                    {{ $agent->years_experience }} Years Experience
                                    @if ($agent->rating > 0)
                                        &nbsp;•&nbsp; {{ number_format($agent->rating, 1) }} ★
                                    @endif
                                </div>
                                <p class="team-bio">
                                    {{ $agent->bio ?? 'Dedicated agent committed to helping you find your perfect property.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-4">
                        <p class="text-muted">No agents available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Blog Section -->
    {{-- <section class="blog-section">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-3">
                <div class="text-start">
                    <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Latest From Our Blog</h6>
                    <h2 class="display-6 fw-bold mb-0">Insights, Tips & Market Trends</h2>
                </div>
                <a href="#" class="btn-view-all">View All Articles <i class="bi bi-arrow-right ms-1"></i></a>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card" data-reveal>
                        <div class="blog-img-wrap">
                            <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=600&q=80"
                                alt="First-time home buyers" loading="lazy">
                        </div>
                        <div class="blog-body">
                            <div class="blog-meta"><span><i class="bi bi-calendar3 me-1"></i>May 12,
                                    2026</span><span><i class="bi bi-person me-1"></i>Admin</span></div>
                            <div class="blog-title">10 Tips for First-Time Home Buyers</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card" data-reveal>
                        <div class="blog-img-wrap">
                            <img src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=600&q=80"
                                alt="Luxury market trends" loading="lazy">
                        </div>
                        <div class="blog-body">
                            <div class="blog-meta"><span><i class="bi bi-calendar3 me-1"></i>May 10,
                                    2026</span><span><i class="bi bi-person me-1"></i>Admin</span></div>
                            <div class="blog-title">Luxury Real Estate Market Trends in 2026</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="blog-card" data-reveal>
                        <div class="blog-img-wrap">
                            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=600&q=80"
                                alt="Increase property value" loading="lazy">
                        </div>
                        <div class="blog-body">
                            <div class="blog-meta"><span><i class="bi bi-calendar3 me-1"></i>May 9,
                                    2026</span><span><i class="bi bi-person me-1"></i>Admin</span></div>
                            <div class="blog-title">How to Increase Property Value Before Selling</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Partners -->
    <section class="partners-section">
        <div class="container">
            <div class="text-center mb-4">
                <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold mb-0">Our Partners</h6>
                <h2 class="display-6 fw-bold">Trusted by Industry Leaders</h2>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-6 col-md-2">
                    <div class="partner-logo">CHASE</div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="partner-logo">Bank of America</div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="partner-logo">WELLS FARGO</div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="partner-logo">Allstate</div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="partner-logo">loanDepot</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-box">
                <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Ready to Find Your Dream Home?
                </h6>
                <h2 class="display-6 fw-bold mb-3">Let's Make It Happen Together</h2>
                <p class="text-muted-custom mb-4 mx-auto" style="max-width: 520px;">Join thousands of satisfied
                    homeowners who found their perfect property with our expert guidance.</p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="property.html" class="btn btn-search px-4" style="width:auto;">Browse Properties</a>
                    <a href="contact-us.html" class="btn cta-hvr-btn px-4"
                        style="width:auto; border:1px solid var(--border-color); color:var(--text-main); border-radius:8px; display:flex; align-items:center;">Contact
                        an Agent</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section mb-3 p-4">
        <div class="container">
            <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Get In Touch</h6>
            <h2 class="display-6 fw-bold mb-4">Have Questions? Reach Out to Us</h2>
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="contact-info-card">
                                <i class="bi bi-geo-alt-fill"></i>
                                <h5>Visit Us</h5>
                                <p>9876 Wilshire Boulevard, Suite 500<br>Beverly Hills, CA 90210</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-info-card">
                                <i class="bi bi-telephone-fill"></i>
                                <h5>Call Us</h5>
                                <p>(310) 555-0100<br><span class="text-primary-custom">Mon-Fri 9am-6pm</span></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-info-card">
                                <i class="bi bi-envelope-fill"></i>
                                <h5>Email Us</h5>
                                <p>info@greenvistarealty.com<br><span class="small opacity-75">We respond within 24
                                        hours</span></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="contact-info-card">
                                <i class="bi bi-clock-fill"></i>
                                <h5>Office Hours</h5>
                                <p>Mon-Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 4:00 PM</p>
                            </div>
                        </div>
                    </div>

                    <div class="map-wrapper mt-4">
                        <div class="ratio ratio-16x9 map-ratio">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.4929947820883!2d71.47017897440747!3d30.223014874834096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b33854e735d97%3A0xac35e804dff3bf59!2sDevelopers%20Point%20(Pvt)%20Ltd!5e0!3m2!1sen!2s!4v1769175404698!5m2!1sen!2s"
                                loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-lg-7 align-self-center">
                    <div class="contact-form-wrapper p-4 p-md-5">
                        <h2 class="display-6 fw-bold mb-4">Send Us a Message</h2>
                    

                        <form action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small">Full Name *</label>
                                    <input type="text" name="full_name"
                                        class="form-control @error('full_name') is-invalid @enderror"
                                        value="{{ old('full_name') }}" placeholder="John Smith">
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small">Email Address *</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="john@example.com">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label small">Phone Number</label>
                                    <input type="tel" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}" placeholder="(555) 555-5555">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label class="form-label small">Message *</label>
                                    <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="5"
                                        placeholder="Tell us about your real estate needs...">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 mt-4">
                                    <button type="submit" class="btn btn-search w-100 py-3">
                                        <i class="bi bi-send me-2"></i> Send Message
                                    </button>
                                    <p class="small text-muted-custom mt-3 text-center">
                                        By submitting this form, you agree to our privacy policy and consent to being
                                        contacted regarding your inquiry.
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<!-- Footer -->
@include('frontend.layout.footer')
