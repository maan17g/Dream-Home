<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verify Email - Dream Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="public/css/style.css">
  <style>
    body { overflow-x: hidden; }

    /* ── SPLIT LAYOUT (same pattern as login/register) ── */
    .auth-page { min-height: 100vh; display: flex; }

    .auth-image-panel {
      flex: 1;
      position: relative;
      display: none;
      background-image: url('https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=80');
      background-size: cover;
      background-position: center;
    }
    @media (min-width: 992px) { .auth-image-panel { display: block; } }

    .auth-image-overlay {
      position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(10,26,18,0.85), rgba(60,181,124,0.3));
    }
    .auth-image-content { position: absolute; bottom: 0; left: 0; right: 0; padding: 3rem; color: #fff; }
    .auth-image-logo {
      position: absolute; top: 2rem; left: 2rem;
      display: flex; align-items: center; gap: 10px;
      font-size: 1.4rem; font-weight: 700; color: #fff;
      text-decoration: none;
    }
    .auth-image-logo i { color: var(--primary); font-size: 1.6rem; }

    .auth-stat-row { display: flex; gap: 2rem; margin-bottom: 2rem; }
    .auth-stat strong { display: block; font-size: 1.8rem; font-weight: 700; color: #fff; }
    .auth-stat span { font-size: 0.8rem; color: rgba(255,255,255,0.7); }

    .auth-testimonial {
      background: rgba(255,255,255,0.08);
      backdrop-filter: blur(8px);
      border: 1px solid rgba(255,255,255,0.15);
      border-radius: 16px;
      padding: 1.5rem;
    }
    .auth-testimonial p { font-size: 0.92rem; color: rgba(255,255,255,0.9); line-height: 1.7; margin-bottom: 1rem; font-style: italic; }
    .auth-testimonial-author { display: flex; align-items: center; gap: 12px; }
    .auth-testimonial-author img { width: 42px; height: 42px; border-radius: 50%; object-fit: cover; border: 2px solid var(--primary); }
    .auth-testimonial-author strong { display: block; font-size: 0.88rem; color: #fff; }
    .auth-testimonial-author span { font-size: 0.75rem; color: rgba(255,255,255,0.6); }

    /* RIGHT FORM PANEL */
    .auth-form-panel {
      width: 100%; max-width: 520px;
      display: flex; flex-direction: column; justify-content: center;
      padding: 2.5rem 2rem;
      background-color: var(--bg-body);
      overflow-y: auto;
    }
    @media (min-width: 992px) { .auth-form-panel { padding: 3rem 3.5rem; } }

    .auth-form-header { margin-bottom: 2rem; }
    .auth-form-header .back-link {
      display: inline-flex; align-items: center; gap: 6px;
      color: var(--text-muted); font-size: 0.85rem;
      text-decoration: none; margin-bottom: 1.5rem;
      transition: color 0.2s;
    }
    .auth-form-header .back-link:hover { color: var(--primary); }
    .auth-welcome { font-size: 1.85rem; font-weight: 700; margin-bottom: 0.4rem; }
    .auth-subtitle { color: var(--text-muted); font-size: 0.9rem; }

    .btn-auth-submit {
      background: var(--primary); color: #fff;
      border: none; width: 100%; padding: 13px;
      border-radius: 10px; font-weight: 700;
      font-size: 0.95rem; cursor: pointer;
      transition: background 0.2s; margin-top: 0.5rem;
      display: flex; align-items: center; justify-content: center; gap: 8px;
    }
    .btn-auth-submit:hover { background: var(--primary-hover); }
    .btn-auth-submit:disabled { opacity: 0.6; cursor: not-allowed; }

    .auth-switch { text-align: center; margin-top: 1.5rem; font-size: 0.88rem; color: var(--text-muted); }
    .auth-switch a { color: var(--primary); font-weight: 600; text-decoration: none; }
    .auth-switch a:hover { text-decoration: underline; }

    .field-error { font-size: 0.75rem; color: #e74c3c; margin-top: 4px; display: none; text-align: center; }

    .btn-spinner { display: none; width: 18px; height: 18px; border: 2px solid rgba(255,255,255,0.4); border-top-color: #fff; border-radius: 50%; animation: spin 0.7s linear infinite; }
    @keyframes spin { to { transform: rotate(360deg); } }

    .success-icon-circle {
      width: 72px; height: 72px; border-radius: 50%;
      background-color: rgba(60, 181, 124, 0.12);
      color: var(--primary);
      display: flex; align-items: center; justify-content: center;
      font-size: 2rem; margin: 0 auto 1.25rem;
    }

    /* ── New for this page: OTP boxes + resend timer ── */
    .otp-row { display: flex; gap: 0.65rem; justify-content: center; margin: 1.5rem 0 0.5rem; }
    .otp-box {
      width: 52px; height: 58px;
      text-align: center; font-size: 1.4rem; font-weight: 700;
      background-color: var(--form-input-bg, var(--bg-card));
      border: 1px solid var(--border-color);
      border-radius: 10px; color: var(--text-main);
    }
    .otp-box:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(60,181,124,0.15); }

    .resend-row { text-align: center; font-size: 0.85rem; color: var(--text-muted); margin-top: 1.25rem; }
    .resend-link { color: var(--primary); font-weight: 600; text-decoration: none; background: none; border: none; padding: 0; }
    .resend-link:disabled { color: var(--text-muted); cursor: not-allowed; text-decoration: none; }
  </style>
</head>
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
            <strong id="userEmail" style="color:var(--text-main);">john@example.com</strong>
          </p>
        </div>

        <form id="verifyForm" novalidate>
          <div class="otp-row">
            <input type="text" inputmode="numeric" maxlength="1" class="otp-box" data-otp>
            <input type="text" inputmode="numeric" maxlength="1" class="otp-box" data-otp>
            <input type="text" inputmode="numeric" maxlength="1" class="otp-box" data-otp>
            <input type="text" inputmode="numeric" maxlength="1" class="otp-box" data-otp>
            <input type="text" inputmode="numeric" maxlength="1" class="otp-box" data-otp>
            <input type="text" inputmode="numeric" maxlength="1" class="otp-box" data-otp>
          </div>
          <div class="field-error" id="otpError">Please enter the full 6-digit code.</div>

          <button type="submit" class="btn-auth-submit" id="verifyBtn">
            <div class="btn-spinner" id="verifySpinner"></div>
            <i class="bi bi-check2-circle" id="verifyIcon"></i>
            <span id="verifyBtnText">Verify Email</span>
          </button>
        </form>

        <div class="resend-row">
          Didn't receive the code?
          <button type="button" class="resend-link" id="resendBtn" onclick="resendCode()">Resend Code</button>
          <span id="resendTimer" class="d-none">Resend in <strong id="timerCount">60</strong>s</span>
        </div>

        <div class="auth-switch">
          <a href="login.html">← Back to Login</a>
        </div>
      </div>

      <!-- STEP 2: Success -->
      <div id="successStep" class="d-none text-center">
        <div class="success-icon-circle"><i class="bi bi-patch-check-fill"></i></div>
        <h2 class="auth-welcome">Email Verified!</h2>
        <p class="auth-subtitle mb-4">Your email has been successfully verified. You can now access your Dream Home account.</p>
        <a href="login.html" class="btn-auth-submit text-decoration-none">
          <i class="bi bi-box-arrow-in-right"></i> Continue to Login
        </a>
      </div>

    </div><!-- /auth-form-panel -->
  </div><!-- /auth-page -->

  <!-- Toast -->
  <div id="toast" style="position:fixed;bottom:2rem;right:2rem;z-index:9999;background:var(--primary);color:#fff;padding:1rem 1.5rem;border-radius:14px;box-shadow:0 10px 30px rgba(0,0,0,0.3);display:flex;align-items:center;gap:0.75rem;font-size:0.95rem;font-weight:500;transform:translateY(100px);opacity:0;transition:all 0.4s ease;font-family:var(--font-family);">
    <i class="bi bi-check-circle-fill"></i> <span id="toastMsg">Done!</span>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function showToast(msg, success = true) {
      const toast = document.getElementById('toast');
      toast.style.background = success ? 'var(--primary)' : '#e74c3c';
      document.getElementById('toastMsg').textContent = msg;
      toast.style.transform = 'translateY(0)';
      toast.style.opacity = '1';
      setTimeout(() => { toast.style.transform = 'translateY(100px)'; toast.style.opacity = '0'; }, 3500);
    }

    // ── OTP box auto-advance ──
    const otpBoxes = document.querySelectorAll('[data-otp]');
    otpBoxes.forEach((box, i) => {
      box.addEventListener('input', () => {
        box.value = box.value.replace(/[^0-9]/g, '');
        if (box.value && i < otpBoxes.length - 1) otpBoxes[i + 1].focus();
      });
      box.addEventListener('keydown', (e) => {
        if (e.key === 'Backspace' && !box.value && i > 0) otpBoxes[i - 1].focus();
      });
      box.addEventListener('paste', (e) => {
        e.preventDefault();
        const digits = (e.clipboardData.getData('text') || '').replace(/[^0-9]/g, '').split('');
        otpBoxes.forEach((b, idx) => { b.value = digits[idx] || ''; });
        const next = Math.min(digits.length, otpBoxes.length - 1);
        otpBoxes[next].focus();
      });
    });

    // ── Resend timer ──
    let secondsLeft = 60;
    let timerInterval = null;
    function startResendTimer() {
      const resendBtn = document.getElementById('resendBtn');
      const resendTimer = document.getElementById('resendTimer');
      const timerCount = document.getElementById('timerCount');
      secondsLeft = 60;
      resendBtn.classList.add('d-none');
      resendTimer.classList.remove('d-none');
      timerCount.textContent = secondsLeft;
      clearInterval(timerInterval);
      timerInterval = setInterval(() => {
        secondsLeft--;
        timerCount.textContent = secondsLeft;
        if (secondsLeft <= 0) {
          clearInterval(timerInterval);
          resendTimer.classList.add('d-none');
          resendBtn.classList.remove('d-none');
        }
      }, 1000);
    }
    startResendTimer();

    function resendCode() {
      showToast('Verification code resent!');
      startResendTimer();
    }

    // ── Submit ──
    document.getElementById('verifyForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const code = Array.from(otpBoxes).map(b => b.value).join('');
      const otpErr = document.getElementById('otpError');

      if (code.length !== 6) {
        otpErr.style.display = 'block';
        return;
      }
      otpErr.style.display = 'none';

      const btn = document.getElementById('verifyBtn');
      const spinner = document.getElementById('verifySpinner');
      const icon = document.getElementById('verifyIcon');
      const text = document.getElementById('verifyBtnText');
      btn.disabled = true;
      spinner.style.display = 'block';
      icon.style.display = 'none';
      text.textContent = 'Verifying...';

      setTimeout(() => {
        btn.disabled = false;
        spinner.style.display = 'none';
        icon.style.display = 'inline';
        text.textContent = 'Verify Email';
        clearInterval(timerInterval);

        document.getElementById('verifyStep').classList.add('d-none');
        document.getElementById('successStep').classList.remove('d-none');
      }, 1500);
    });
  </script>
</body>
</html>
