@include('frontend.layout.header', ['title' => 'Terms & Conditions - Dream Home'])

<main>

  <!-- HERO -->
  <section class="hero-section">
    <div class="hero-bg-about"></div>
    <div class="hero-overlay"></div>
    <div class="container hero-content">
      <div class="col-lg-8">
        <div class="trust-badge"><span class="trust-dot"></span> Official Guidelines & Policies</div>
        <h1 class="hero-title mb-3">Terms & <br><span>Conditions</span></h1>
        <p class="hero-desc">Clear rules and fair policies designed to ensure a safe, honest, and reliable real estate marketplace for everyone.</p>
      </div>
    </div>
  </section>

  <!-- TERMS CARDS -->
  <section class="mission-section">
    <div class="container">
      <div class="text-start mb-5">
        <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Platform Rules</h6>
        <h2 class="display-6 fw-bold">Terms Of Service Overview</h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="mission-card h-100">
            <div class="mission-icon"><i class="fas fa-file-contract"></i></div>
            <h5 class="fw-bold mb-3">Acceptance of Terms</h5>
            <p class="text-muted-custom mb-0" style="font-size:0.92rem;line-height:1.8;">By viewing properties or registering an account on Dream Home, you agree to comply with all platform rules and standard operational policies.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="mission-card h-100">
            <div class="mission-icon"><i class="fas fa-home"></i></div>
            <h5 class="fw-bold mb-3">Listing Accuracy</h5>
            <p class="text-muted-custom mb-0" style="font-size:0.92rem;line-height:1.8;">Property data, photos, and valuations are updated regularly. However, final prices, availability, and specs must be verified with listing agents.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="mission-card h-100">
            <div class="mission-icon"><i class="fas fa-user-check"></i></div>
            <h5 class="fw-bold mb-3">User Conduct</h5>
            <p class="text-muted-custom mb-0" style="font-size:0.92rem;line-height:1.8;">Users agree to provide genuine details when making inquiries and to refrain from scraping or interfering with application database services.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- TERMS DETAILS -->
  <section class="values-section">
    <div class="container">
      <div class="row align-items-center gy-5">
        <div class="col-lg-5">
          <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Our Obligations</h6>
          <h2 class="display-6 fw-bold mb-3">Platform Guidelines</h2>
          <p class="text-muted-custom" style="line-height:1.9;">These rules ensure that buyers, sellers, and agents operate in a fair and transparent environment.</p>
        </div>
        <div class="col-lg-7">
          <div class="value-item">
            <div class="value-num">01</div>
            <div>
              <div class="value-title">Property Listings Responsibility</div>
              <p class="value-desc">All listings must undergo verification before going live. We reserve the right to remove non-compliant listings or suspend accounts violating quality guidelines.</p>
            </div>
          </div>
          <div class="value-item">
            <div class="value-num">02</div>
            <div>
              <div class="value-title">Limitation of Liability</div>
              <p class="value-desc">Dream Home provides listing distribution and agent tools. We are not liable for direct contractual disputes arising between independent agents and clients.</p>
            </div>
          </div>
          <div class="value-item">
            <div class="value-num">03</div>
            <div>
              <div class="value-title">Policy Revisions</div>
              <p class="value-desc">We periodically update platform terms to keep pace with operational improvements and legal standards. Continued usage signifies agreement to the updated terms.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="cta-section">
    <div class="container">
      <div class="cta-box">
        <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold mb-3">Ready to Continue?</h6>
        <h2 class="display-5 fw-bold mb-4">Start Browsing Verified Homes</h2>
        <p class="text-muted-custom mb-5 mx-auto" style="max-width:550px;font-size:1rem;line-height:1.8;">Explore hundreds of verified houses, apartments, and commercial spaces tailored to your location and budget.</p>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
          <a href="{{ route('property.index') }}" class="btn btn-consult px-4 py-3 shadow-sm" style="font-size:1rem;"><i class="bi bi-house-door me-2"></i> Browse Properties</a>
        </div>
      </div>
    </div>
  </section>

</main>

@include('frontend.layout.footer')