<?php echo $__env->make('auth.layout.header', ['title' => 'Login - Dream Home'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<body data-theme="dark">

    <div class="auth-page">

        <!-- LEFT: IMAGE PANEL -->
        <div class="auth-image-panel">
            <div class="auth-image-overlay"></div>
            <a href="<?php echo e(route('page.index')); ?>" class="auth-image-logo">
                <i class="bi bi-house-door-fill"></i> Real Estate
            </a>
            <div class="auth-image-content">
                <div class="auth-stat-row">
                    <div class="auth-stat"><strong>500+</strong><span>Active Listings</span></div>
                    <div class="auth-stat"><strong>15K+</strong><span>Happy Clients</span></div>
                    <div class="auth-stat"><strong>98%</strong><span>Satisfaction</span></div>
                </div>
                <div class="auth-testimonial">
                    <p>"Dream Home made finding our perfect villa completely effortless. The platform is beautiful and
                        the team is incredible."</p>
                    <div class="auth-testimonial-author">
                        <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?q=80&w=100&h=100&fit=crop"
                            alt="Jessica">
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
            <a href="<?php echo e(route('page.index')); ?>" class="d-flex d-lg-none align-items-center gap-2 text-decoration-none mb-4"
                style="font-size:1.2rem;font-weight:700;color:var(--text-main);">
                <i class="bi bi-house-door-fill" style="color:var(--primary);font-size:1.4rem;"></i> Real Estate
            </a>

            <div class="auth-form-header">
                <a href="<?php echo e(route('page.index')); ?>" class="back-link"><i class="bi bi-arrow-left"></i> Back to Home</a>
                <h2 class="auth-welcome">Welcome Back 👋</h2>
                <p class="auth-subtitle">Sign in to access your saved properties, viewings, and personalized dashboard.
                </p>
            </div>

            <!-- Social Login -->
            <button class="social-login-btn btn-google" onclick="socialLogin('Google')">
                <img src="https://www.google.com/favicon.ico" width="18" height="18" alt="Google"> Continue
                with Google
            </button>
            <button class="social-login-btn btn-facebook" onclick="socialLogin('Facebook')">
                <i class="fab fa-facebook-f" style="color:#1877f2;"></i> Continue with Facebook
            </button>

            <div class="auth-divider">or sign in with email</div>

            <!-- Login Form -->
            <form id="loginForm" novalidate method="POST" action=<?php echo e(route('login.store')); ?>>
                <!-- Email -->
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <div class="input-icon-wrap">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="email" class="form-control" id="loginEmail" placeholder="john@example.com"
                            name=email required>
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
                </div>

                <!-- Password -->
                <div class="mb-2">
                    <label class="form-label">Password</label>
                    <div class="input-icon-wrap">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password" class="form-control" name=password id="loginPassword"
                            placeholder="Enter your password" style="padding-right:2.6rem;" required>
                        <button type="button" class="input-toggle-pass" onclick="togglePass('loginPassword', this)">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error-msg"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Remember + Forgot -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="rememberMe">
                        <label class="form-check-label" name=remember for="remember">Remember me</label>
                    </div>

                </div>

                <!-- Submit -->
                <button type="submit" class="btn-auth-submit" id="loginBtn">
                    <div class="btn-spinner" id="loginSpinner"></div>
                    <i class="bi bi-box-arrow-in-right" id="loginIcon"></i>
                    <span id="loginBtnText">Sign In</span>
                </button>
            </form>

            <div class="auth-switch">
                Don't have an account? <a href="<?php echo e(route('register.index')); ?>">Create one free →</a>
            </div>

            <!-- Terms note -->
         

        </div><!-- /auth-form-panel -->
    </div><!-- /auth-page -->

 
      <!-- Bootstrap Bundle script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    
        // ── Toggle Password Visibility ──
        function togglePass(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye';
            }
        }
    </script>
<?php echo $__env->make('layout.Notification', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate - Copy\resources\views/auth/login.blade.php ENDPATH**/ ?>