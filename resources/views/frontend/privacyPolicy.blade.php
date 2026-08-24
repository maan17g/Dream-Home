@include('frontend.layout.header', ['title' => 'Privacy Policy - Dream Home'])

<main>

  <!-- HERO -->
  <section class="hero-section">
    <div class="hero-bg-about"></div>
    <div class="hero-overlay"></div>
    <div class="container hero-content">
      <div class="col-lg-8">
        <div class="trust-badge"><span class="trust-dot"></span> User Data Protection & Privacy</div>
        <h1 class="hero-title mb-3">Our Commitment To <br><span>Your Privacy</span></h1>
        <p class="hero-desc">We respect your data and maintain strict security protocols to keep your property search safe, secure, and private.</p>
      </div>
    </div>
  </section>

  <!-- PRIVACY OVERVIEW / CARDS -->
  <section class="mission-section">
    <div class="container">
      <div class="text-start mb-5">
        <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Data Management</h6>
        <h2 class="display-6 fw-bold">How We Protect & Process Data</h2>
      </div>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="mission-card h-100">
            <div class="mission-icon"><i class="fas fa-user-shield"></i></div>
            <h5 class="fw-bold mb-3">Information Collection</h5>
            <p class="text-muted-custom mb-0" style="font-size:0.92rem;line-height:1.8;">We collect personal details such as your name, email address, phone number, and preferences when you submit inquiries or register an account with us.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="mission-card h-100">
            <div class="mission-icon"><i class="fas fa-cogs"></i></div>
            <h5 class="fw-bold mb-3">Data Usage</h5>
            <p class="text-muted-custom mb-0" style="font-size:0.92rem;line-height:1.8;">Your information is used to schedule property tours, connect you with verified real estate agents, deliver alerts, and enhance application performance.</p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="mission-card h-100">
            <div class="mission-icon"><i class="fas fa-lock"></i></div>
            <h5 class="fw-bold mb-3">Security Standards</h5>
            <p class="text-muted-custom mb-0" style="font-size:0.92rem;line-height:1.8;">We store data using industry-standard encryption protocols. We do not sell, rent, or distribute personal information to third-party advertisers.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- DETAILED ARTICLES -->
  <section class="values-section">
    <div class="container">
      <div class="row align-items-center gy-5">
        <div class="col-lg-5">
          <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Transparency</h6>
          <h2 class="display-6 fw-bold mb-3">Our Core Privacy Rules</h2>
          <p class="text-muted-custom" style="line-height:1.9;">Understanding how your information flows through our platform helps ensure a safe, efficient home search experience.</p>
        </div>
        <div class="col-lg-7">
          <div class="value-item">
            <div class="value-num">01</div>
            <div>
              <div class="value-title">Cookies & Session Tracking</div>
              <p class="value-desc">We use browser cookies and local storage tokens to preserve session states, save filter preferences, and keep you securely logged in.</p>
            </div>
          </div>
          <div class="value-item">
            <div class="value-num">02</div>
            <div>
              <div class="value-title">Agent Communications</div>
              <p class="value-desc">When you request an inquiry on a listing, your contact details are shared exclusively with the assigned listing agent to fulfill your request.</p>
            </div>
          </div>
          <div class="value-item">
            <div class="value-num">03</div>
            <div>
              <div class="value-title">Your Data Rights</div>
              <p class="value-desc">You hold full control over your personal information. You can request a copy of your saved data or ask for profile deletion at any time.</p>
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
        <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold mb-3">Have Questions?</h6>
        <h2 class="display-5 fw-bold mb-4">We're Here To Help You</h2>
        <p class="text-muted-custom mb-5 mx-auto" style="max-width:550px;font-size:1rem;line-height:1.8;">If you have any questions or data removal requests regarding our privacy policy, feel free to reach out to our team.</p>
        <div class="d-flex flex-wrap gap-3 justify-content-center">
          <a href="{{ route('property.index') }}" class="btn btn-consult px-4 py-3 shadow-sm" style="font-size:1rem;"><i class="bi bi-house-door me-2"></i> Return To Listings</a>
        </div>
      </div>
    </div>
  </section>

</main>

@include('frontend.layout.footer')