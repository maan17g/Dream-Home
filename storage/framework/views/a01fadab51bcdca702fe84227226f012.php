<?php echo $__env->make('auth.layout.header', ['title' => 'Create Account - Dream Home'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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
        <a href="<?php echo e(route('login.index')); ?>" class="back-link"><i class="bi bi-arrow-left"></i> Back to Login</a>
        <h2 class="auth-welcome">Create Your Account</h2>
        <p class="auth-subtitle">Join Dream Home and start finding your perfect property today.</p>
      </div>

      <a href="/auth/google" class="social-login-btn btn-google">
        <img src="https://www.google.com/favicon.ico" width="17" height="17" alt="Google"> Sign up with Google
      </a>

      <div class="auth-divider">or register with email</div>

      <form id="registerForm" action="<?php echo e(route('register.store')); ?>"  method="POST">
        <?php echo csrf_field(); ?>

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
          <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-msg"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <div class="row g-2 mb-2">
          <div class="col-6">
            <label class="form-label">First Name *</label>
            <div class="input-icon-wrap">
              <i class="bi bi-person input-icon"></i>
              <input type="text" class="form-control" name="first_name" value="<?php echo e(old('first_name')); ?>" id="firstName" placeholder="John" required>
            </div>
          </div>
          <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-msg"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          <div class="col-6">
            <label class="form-label">Last Name *</label>
            <div class="input-icon-wrap">
              <i class="bi bi-person input-icon"></i>
              <input type="text" class="form-control" name="last_name" id="lastName" value="<?php echo e(old('last_name')); ?>" placeholder="Smith" required>
            </div>
          </div>
        </div>
          <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-msg"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <div class="mb-2">
          <label class="form-label">Email Address *</label>
          <div class="input-icon-wrap">
            <i class="bi bi-envelope input-icon"></i>
            <input type="email" class="form-control" name="email" id="regEmail" value="<?php echo e(old('email')); ?>" placeholder="john@example.com" required>
          </div>
        </div>
  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-msg"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
       

        <div class="mb-2">
          <label class="form-label">Password *</label>
          <div class="input-icon-wrap">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" class="form-control" name="password" id="regPassword" placeholder="Min. 8 characters" required>
          </div>
        </div>  <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-msg"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <div class="mb-3">
          <label class="form-label">Confirm Password *</label>
          <div class="input-icon-wrap">
            <i class="bi bi-lock-fill input-icon"></i>
            <input type="password" class="form-control" name="password_confirmation" id="regConfirm" placeholder="Repeat your password" required>
          </div>
        </div>  <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="error-msg"><?php echo e($message); ?></div>
          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

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
        Already have an account? <a href="<?php echo e(route('login.index')); ?>">Sign in →</a>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <?php echo $__env->make('layout.Notification', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>
</html><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/auth/register.blade.php ENDPATH**/ ?>