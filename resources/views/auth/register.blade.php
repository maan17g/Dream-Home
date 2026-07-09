<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account - Dream Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
  <style>
    

    .auth-page { min-height: 100vh; display: flex; }

    /* LEFT PANEL */
    .auth-image-panel {
      flex: 1; position: relative; display: none;
      background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=1200&q=80');
      background-size: cover; background-position: center;
    }
    @media (min-width: 992px) { .auth-image-panel { display: block; } }
    .auth-image-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(10,26,18,0.88), rgba(60,181,124,0.25));
    }
    .auth-image-logo {
      position: absolute; top: 2rem; left: 2rem;
      display: flex; align-items: center; gap: 10px;
      font-size: 1.4rem; font-weight: 700; color: #fff; text-decoration: none;
    }
    .auth-image-logo i { color: var(--primary); font-size: 1.6rem; }
    .auth-image-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 3rem; color: #fff; }
    .auth-steps { display: flex; flex-direction: column; gap: 1rem; }
    .auth-step {
      display: flex; align-items: flex-start; gap: 1rem;
      background: rgba(255,255,255,0.06); backdrop-filter: blur(6px);
      border: 1px solid rgba(255,255,255,0.12);
      border-radius: 14px; padding: 1rem 1.25rem;
    }
    .auth-step-num {
      width: 32px; height: 32px; border-radius: 50%;
      background: var(--primary); color: #fff;
      display: flex; align-items: center; justify-content: center;
      font-weight: 700; font-size: 0.85rem; flex-shrink: 0;
    }
    .auth-step strong { display: block; font-size: 0.9rem; color: #fff; margin-bottom: 2px; }
    .auth-step span { font-size: 0.78rem; color: rgba(255,255,255,0.65); }

    /* RIGHT FORM PANEL */
    .auth-form-panel {
      width: 100%; max-width: 560px;
      display: flex; flex-direction: column; justify-content: center;
      padding: 2.5rem 2rem;
      background-color: var(--bg-body); overflow-y: auto;
    }
    @media (min-width: 992px) { .auth-form-panel { padding: 2.5rem 3.5rem; } }

    .auth-form-header { margin-bottom: 1.5rem; }
    .back-link {
      display: inline-flex; align-items: center; gap: 6px;
      color: var(--text-muted); font-size: 0.85rem; text-decoration: none;
      margin-bottom: 1.2rem; transition: color 0.2s;
    }
    .back-link:hover { color: var(--primary); }
    .auth-welcome { font-size: 1.7rem; font-weight: 700; margin-bottom: 0.3rem; }
    .auth-subtitle { color: var(--text-muted); font-size: 0.88rem; }

    /* Role selector */
    .role-grid { display: grid; grid-template-columns: repeat(2,1fr); gap: 0.6rem; margin-bottom: 1rem; }
    .role-option input { display: none; }
    .role-label {
      display: flex; flex-direction: column; align-items: center;
      justify-content: center; gap: 6px;
      border: 1px solid var(--border-color);
      background: var(--form-input-bg);
      border-radius: 12px; padding: 0.9rem 0.5rem;
      cursor: pointer; transition: all 0.2s;
      font-size: 0.82rem; color: var(--text-muted); font-weight: 500;
    }
    .role-label i { font-size: 1.4rem; color: var(--text-muted); transition: color 0.2s; }
    .role-option input:checked + .role-label {
      border-color: var(--primary); background: rgba(60,181,124,0.1);
      color: var(--primary);
    }
    .role-option input:checked + .role-label i { color: var(--primary); }
    .role-label:hover { border-color: var(--primary); }

    /* Input icons */
    .form-label { font-size: 0.83rem; font-weight: 500; color: var(--text-main); margin-bottom: 4px; }
    .input-icon-wrap { position: relative; }
    .input-icon-wrap .form-control { padding-left: 2.5rem; }
    .input-icon-wrap .input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: var(--text-muted); font-size: 0.95rem; }

    /* Terms */
    .form-check-input { background-color: var(--form-input-bg); border-color: var(--border-color); }
    .form-check-input:checked { background-color: var(--primary); border-color: var(--primary); }
    .form-check-label { font-size: 0.81rem; color: var(--text-muted); }
    .form-check-label a { color: var(--primary); text-decoration: none; }

    /* Submit button */
    .btn-auth-submit {
      background: var(--primary); color: #fff; border: none;
      width: 100%; padding: 13px; border-radius: 10px;
      font-weight: 700; font-size: 0.95rem; cursor: pointer;
      transition: background 0.2s; margin-top: 0.5rem;
      display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .btn-auth-submit:hover { background: var(--primary-hover); }

    /* Social login */
    .social-login-btn {
      width: 100%; padding: 10px; border-radius: 10px;
      font-size: 0.88rem; font-weight: 600; cursor: pointer;
      transition: all 0.2s; display: flex; align-items: center;
      justify-content: center; gap: 10px; margin-bottom: 0.55rem;
      text-decoration: none;
    }
    .btn-google { background: transparent; border: 1px solid var(--border-color); color: var(--text-main); }
    .btn-google:hover { border-color: #ea4335; color: #ea4335; }

    .auth-divider { display: flex; align-items: center; gap: 1rem; margin: 1rem 0; color: var(--text-muted); font-size: 0.8rem; }
    .auth-divider::before, .auth-divider::after { content: ''; flex: 1; height: 1px; background: var(--border-color); }

    .auth-switch { text-align: center; margin-top: 1.25rem; font-size: 0.87rem; color: var(--text-muted); }
    .auth-switch a { color: var(--primary); font-weight: 600; text-decoration: none; }
  </style>
</head>
<body data-theme="dark">

  <div class="auth-page">

    <div class="auth-image-panel">
      <div class="auth-image-overlay"></div>
      <a href="index.html" class="auth-image-logo">
        <i class="bi bi-house-door-fill"></i> Real Estate
      </a>
      <div class="auth-image-content">
        <h3 class="fw-bold mb-1" style="color:#fff;">Start your journey in 3 easy steps</h3>
        <p style="color:rgba(255,255,255,0.65);font-size:0.85rem;margin-bottom:1.5rem;">Join 15,000+ clients who found their dream property with us.</p>
        <div class="auth-steps">
          <div class="auth-step">
            <div class="auth-step-num">1</div>
            <div><strong>Create Your Account</strong><span>Fill in your details and choose your role as buyer, seller, or agent.</span></div>
          </div>
          <div class="auth-step">
            <div class="auth-step-num">2</div>
            <div><strong>Browse & Save Properties</strong><span>Explore verified listings and save your favorites for easy comparison.</span></div>
          </div>
          <div class="auth-step">
            <div class="auth-step-num">3</div>
            <div><strong>Book a Viewing</strong><span>Schedule a visit directly through the platform and connect with an agent.</span></div>
          </div>
        </div>
      </div>
    </div>

    <div class="auth-form-panel">

      <a href="index.html" class="d-flex d-lg-none align-items-center gap-2 text-decoration-none mb-4" style="font-size:1.2rem;font-weight:700;color:var(--text-main);">
        <i class="bi bi-house-door-fill" style="color:var(--primary);font-size:1.4rem;"></i> Real Estate
      </a>

      <div class="auth-form-header">
        <a href="login.html" class="back-link"><i class="bi bi-arrow-left"></i> Back to Login</a>
        <h2 class="auth-welcome">Create Your Account</h2>
        <p class="auth-subtitle">Join Dream Home and start finding your perfect property today.</p>
      </div>

      <a href="/auth/google" class="social-login-btn btn-google">
        <img src="https://www.google.com/favicon.ico" width="17" height="17" alt="Google"> Sign up with Google
      </a>

      <div class="auth-divider">or register with email</div>

      <form id="registerForm" action="{{route('register.store')}}"  method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label">I am a:</label>
          <div class="role-grid">
            <div class="role-option">
              <input type="radio" name="role" id="roleBuyer" value="buyer" checked>
              <label class="role-label" for="roleBuyer"><i class="bi bi-house-heart"></i> Buyer</label>
            </div>
          
            <div class="role-option">
              <input type="radio" name="role" id="roleAgent" value="agent">
              <label class="role-label" for="roleAgent"><i class="bi bi-person-badge"></i> Agent</label>
            </div>
          </div>
        </div>
          @error('role')
            <div class="error-msg">{{$message}}</div>
          @enderror

        <div class="row g-2 mb-2">
          <div class="col-6">
            <label class="form-label">First Name *</label>
            <div class="input-icon-wrap">
              <i class="bi bi-person input-icon"></i>
              <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" id="firstName" placeholder="John" required>
            </div>
          </div>
          @error('first_name')
            <div class="error-msg">{{$message}}</div>
          @enderror
          <div class="col-6">
            <label class="form-label">Last Name *</label>
            <div class="input-icon-wrap">
              <i class="bi bi-person input-icon"></i>
              <input type="text" class="form-control" name="last_name" id="lastName" value="{{ old('last_name') }}" placeholder="Smith" required>
            </div>
          </div>
        </div>
          @error('last_name')
            <div class="error-msg">{{$message}}</div>
          @enderror

        <div class="mb-2">
          <label class="form-label">Email Address *</label>
          <div class="input-icon-wrap">
            <i class="bi bi-envelope input-icon"></i>
            <input type="email" class="form-control" name="email" id="regEmail" value="{{ old('email') }}" placeholder="john@example.com" required>
          </div>
        </div>
  @error('email')
            <div class="error-msg">{{$message}}</div>
          @enderror
       

        <div class="mb-2">
          <label class="form-label">Password *</label>
          <div class="input-icon-wrap">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" class="form-control" name="password" id="regPassword" placeholder="Min. 8 characters" required>
          </div>
        </div>  @error('password')
            <div class="error-msg">{{$message}}</div>
          @enderror

        <div class="mb-3">
          <label class="form-label">Confirm Password *</label>
          <div class="input-icon-wrap">
            <i class="bi bi-lock-fill input-icon"></i>
            <input type="password" class="form-control" name="password_confirmation" id="regConfirm" placeholder="Repeat your password" required>
          </div>
        </div>  @error('password_confirmation')
            <div class="error-msg">{{$message}}</div>
          @enderror

        <div class="form-check mb-2">
          <input class="form-check-input" type="checkbox" name="agree_terms" id="agreeTerms" required>
          <label class="form-check-label" for="agreeTerms">
            I agree to the <a href="terms-conditions.html">Terms & Conditions</a> and <a href="privacy-policy.html">Privacy Policy</a> *
          </label>
        </div>
        <div class="form-check mb-3">
          <input class="form-check-input" type="checkbox" name="newsletter" id="newsletter" value="1">
          <label class="form-check-label" for="newsletter">Subscribe to property alerts and newsletter (optional)</label>
        </div>

        <button type="submit" class="btn-auth-submit" id="regBtn">
          <i class="bi bi-person-plus-fill"></i>
          <span>Create My Account</span>
        </button>
      </form>

      <div class="auth-switch">
        Already have an account? <a href="login.html">Sign in →</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>