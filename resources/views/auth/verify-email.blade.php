
@include('auth.layout.header', ['title' => 'Verify Email - Dream Home'])

<body data-theme="dark">

  <div class="auth-page">

    <!-- LEFT: IMAGE PANEL -->
    <div class="auth-image-panel">
      <div class="auth-image-overlay"></div>
      <a href="index.html" class="auth-image-logo">
        <i class="bi bi-house-door-fill"></i> Real Estate
      </a>
      <div class="auth-image-content">
        <div class="auth-stat-row">
          <div class="auth-stat"><strong>500+</strong><span>Active Listings</span></div>
          <div class="auth-stat"><strong>15K+</strong><span>Happy Clients</span></div>
          <div class="auth-stat"><strong>98%</strong><span>Satisfaction</span></div>
        </div>
        <div class="auth-testimonial">
          <p>"Dream Home made finding our perfect villa completely effortless. The platform is beautiful and the team is incredible."</p>
          <div class="auth-testimonial-author">
            <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=100&h=100&fit=crop" alt="Jessica">
            <div>
              <strong>Jessica Sterling</strong>
              <span>Homeowner, Beverly Hills</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT: FORM PANEL -->
    <div class="auth-form-panel">

      <!-- Mobile Logo -->
      <a href="index.html" class="d-flex d-lg-none align-items-center gap-2 text-decoration-none mb-4" style="font-size:1.2rem;font-weight:700;color:var(--text-main);">
        <i class="bi bi-house-door-fill" style="color:var(--primary);font-size:1.4rem;"></i> Real Estate
      </a>

      <!-- STEP 1: Enter code -->
      <div id="verifyStep">
        <div class="auth-form-header text-center">
          <div class="success-icon-circle"><i class="bi bi-envelope-paper-fill"></i></div>
          <h2 class="auth-welcome">Verify Your Email</h2>
          <p class="auth-subtitle">
            We've sent a 6-digit verification code to<br>
            <strong id="userEmail" style="color:var(--text-main);">{{Auth::user()->email}}</strong>
          </p>
        </div>

        <form id="verifyForm" action="{{ route('otp.verify') }}" method="POST" novalidate>
          @csrf
          <div class="otp-row">
            <input type="text" inputmode="numeric" maxlength="6" name='otp' class="otp-box" >
    
          </div>
          @error('otp')
            <div class="error-msg fs-6">
            <i class="bi bi-exclamation-circle-fill me-1 text-danger"></i> {{ $message }}
        </div>
          @enderror
         
          <button type="submit" class="btn-auth-submit" id="verifyBtn">
            <div class="btn-spinner" id="verifySpinner"></div>
            <i class="bi bi-check2-circle" id="verifyIcon"></i>
            <span id="verifyBtnText">Verify Email</span>
          </button>
        </form>

        <div class="resend-row">
          Didn't receive the code?
   <form method="post" action={{ route('otp.resend') }}>
    @csrf

     <button type="submit" class="resend-link" id="resendBtn">Resend Code</button>
     <span id="resendTimer" class="d-none">Resend in <strong id="timerCount">60</strong>s</span>
    </div>
  </form>

        <div class="auth-switch">
          <a href="{{ route('register.index') }}">← Back to Register</a>
        </div>
      </div>

      <!-- STEP 2: Success -->
    

    </div><!-- /auth-form-panel -->
  </div><!-- /auth-page -->

  <!-- Toast -->
 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  
  </script>
@include('auth.layout.Notification')

</body>
</html>
