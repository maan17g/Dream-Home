@include('frontend.layout.header', ['title' => 'Customer Reviews & Testimonials - Dream Home'])

<main>
    {{-- PAGE HERO SECTION --}}
  <section class="hero-section">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="container hero-content">
            <div class="col-lg-8">
                <div class="trust-badge">
                    <span class="trust-dot"></span> Verified Client Experiences
                </div>
                <h1 class="hero-title mb-3">
                    What Our Clients <br><span>Say About Us</span>
                </h1>
                <p class="hero-desc mb-4">
                    Read authentic feedback and reviews from home buyers, sellers, and renters who found their perfect properties with Dream Home.
                </p>
                <div class="d-flex flex-wrap gap-4 hero-proof-row">
                    <div class="hero-proof-item">
                        <strong>{{ $reviewsCount }}+</strong>
                        <span>Client Reviews</span>
                    </div>
                    <div class="hero-proof-divider"></div>
                    <div class="hero-proof-item">
                        <strong>{{ number_format($avgRating, 1) }} ★</strong>
                        <span>Average Rating</span>
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

    {{-- REVIEWS & TESTIMONIALS GRID SECTION --}}
    <section class="testimonial-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Client Feedback</h6>
                <h2 class="display-6 fw-bold">Stories From Homeowners</h2>
            </div>

            <div class="row g-4">
                @forelse($reviews as $review)
                    @php
                        $user = $review->appointment?->user;
                        $property = $review->property;
                    @endphp
                    <div class="col-lg-4 col-md-6">
                        <div class="sleek-card h-100 d-flex flex-column justify-content-between p-4">
                            <div>
                                {{-- TOP META & RATING --}}
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="text-warning fs-6">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="bi bi-star{{ $i <= $review->rating ? '-fill' : '' }}"></i>
                                        @endfor
                                    </div>
                            
                                </div>

                                {{-- COMMENT CONTENT --}}
                                <p class="quote-content mb-4" style="font-size: 0.975rem; line-height: 1.6; color: var(--text-main, #2b3445);">
                                    @if ($review->comment)
                                        "{{ $review->comment }}"
                                    @else
                                        <i class="text-muted">No detailed comment provided with this rating.</i>
                                    @endif
                                </p>
                            </div>

                            {{-- FOOTER / AUTHOR & PROPERTY INFO --}}
                            <div>
                                @if($property)
                                    <div class="property-tag p-2 mb-3 rounded" style="background: var(--bg-light, #f8f9fa); border: 1px dashed var(--border-color, #eef2f6);">
                                        <div class="text-muted small text-truncate">
                                            <i class="bi bi-house-door me-1 text-primary-custom"></i>
                                            <strong>Property:</strong> {{ $property->title }}
                                        </div>
                                    </div>
                                @endif

                                <div class="author-wrap d-flex align-items-center">
                                    @if ($user?->avatar)
                                        <img src="{{ asset('storage/' . $user->avatar) }}" 
                                             class="author-img rounded-circle object-fit-cover" 
                                             width="48" 
                                             height="48" 
                                             alt="{{ $user->first_name }} {{ $user->last_name }}">
                                    @else
                                        <div class="author-img-placeholder rounded-circle bg-light d-flex align-items-center justify-content-center text-primary-custom fw-bold border" 
                                             style="width: 48px; height: 48px; font-size: 1.1rem;">
                                            {{ strtoupper(substr($user?->first_name ?? 'U', 0, 1)) }}
                                        </div>
                                    @endif
                                    
                                    <div class="ms-3">
                                        <h6 class="author-name mb-0 fw-bold">
                                            {{ $user?->first_name ?? 'Verified' }} {{ $user?->last_name ?? 'User' }}
                                        </h6>
                                        <span class="author-label text-muted small text-capitalize">
                                            Verified {{ $user?->role ?? 'Buyer' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="p-5 rounded" style="background: var(--bg-light, #f8f9fa);">
                            <i class="bi bi-chat-square-quote display-4 text-muted mb-3 d-block"></i>
                            <h5 class="fw-bold">No Reviews Published Yet</h5>
                            <p class="text-muted mb-0">Check back later to see what our clients have to say.</p>
                        </div>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION LINKS --}}
            @if(method_exists($reviews, 'links'))
                <div class="d-flex justify-content-center mt-5">
                    {{ $reviews->links() }}
                </div>
            @endif
        </div>
    </section>

    {{-- BOTTOM CALL TO ACTION --}}
    <section class="cta-section">
        <div class="container">
            <div class="cta-box text-center">
                <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Ready to Experience Exceptional Service?</h6>
                <h2 class="display-6 fw-bold mb-3">Let's Find Your Dream Home Together</h2>
                <p class="text-muted-custom mb-4 mx-auto" style="max-width: 520px;">
                    Join thousands of satisfied homeowners who found their perfect property with our expert guidance.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="{{ route('property.index') }}" class="btn btn-search px-4" style="width:auto;">Browse Properties</a>
                </div>
            </div>
        </div>
    </section>
</main>

@include('frontend.layout.footer')