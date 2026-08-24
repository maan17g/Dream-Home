<?php echo $__env->make('agent.layout.header', ['title' => 'My Profile | Dream Home Agent'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dash-content">
    <div class="dash-breadcrumb"><a href="<?php echo e(route('agent.index')); ?>">Agent</a> / <span class="current">Profile</span>
    </div>

    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">My Profile</h1>
            <p class="dash-page-desc">Manage your personal info, professional details, security, and social channels.</p>
        </div>
    </div>

    <div class="row g-3">
        <!-- Sidebar Profile Card -->
        <div class="col-lg-3">
            <div class="dash-panel text-center">
                <div class="avatar-upload">
                    <div class="avatar-wrapper">
                        <?php if(Auth::user()->avatar): ?>
                            <img id="avatar-preview" class="avatar-preview"
                                src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt="Profile Picture">
                        <?php endif; ?>

                        <label for="profile_picture" class="avatar-upload-btn">
                            <i class="bi bi-camera-fill"></i>
                        </label>
                    </div>

                    <?php $__errorArgs = ['profile_picture'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div style="color: red; font-size: 0.8rem; text-align: center; margin-top: 5px;">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <h6 class="mt-3 mb-0"><?php echo e(Auth::user()->first_name); ?> <?php echo e(Auth::user()->last_name); ?></h6>
                <div class="dash-row-sub mb-2">Agent Account</div>
                <div class="dash-row-sub">Member since <?php echo e(Auth::user()->created_at->format('F Y')); ?></div>
            </div>
        </div>

        <!-- Main Form Area -->
        <div class="col-lg-9">
            <div class="dash-panel">
                <!-- Navigation Tabs -->
                <div class="dash-tabs mb-4">
                    <button type="button" class="dash-tab active" data-tab="personal">Personal</button>
                    <button type="button" class="dash-tab" data-tab="professional">Professional</button>
                    <button type="button" class="dash-tab" data-tab="security">Security</button>
                    <button type="button" class="dash-tab" data-tab="social">Social</button>
                </div>

                <!-- 1. Personal Info Tab -->
                <div class="dash-tab-pane active" id="tab-personal">
                    <form action="<?php echo e(route('register.update')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        
                        <input type="file" name="profile_picture" id="profile_picture" class="d-none" accept="image/*">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="dash-form-label">First Name</label>
                                <input type="text" name="first_name" class="dash-input"
                                    value="<?php echo e(old('first_name', Auth::user()->first_name)); ?>">
                                <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6">
                                <label class="dash-form-label">Last Name</label>
                                <input type="text" name="last_name" class="dash-input"
                                    value="<?php echo e(old('last_name', Auth::user()->last_name)); ?>">
                                <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Email</label>
                                <input type="email" class="dash-input" value="<?php echo e(Auth::user()->email); ?>" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Phone</label>
                                <input type="text" name="phone" class="dash-input"
                                    value="<?php echo e(old('phone', Auth::user()->phone)); ?>">
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-12">
                                <label class="dash-form-label">Bio</label>
                                <textarea name="bio" class="dash-input" rows="4"><?php echo e(old('bio', Auth::user()->agent['bio'] ?? '')); ?></textarea>
                                <?php $__errorArgs = ['bio'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <button type="submit" class="dash-btn-primary mt-3">
                            <i class="bi bi-check-lg"></i> Save Personal Details
                        </button>
                    </form>
                </div>

                <!-- 2. Professional Tab -->
                <div class="dash-tab-pane d-none" id="tab-professional">
                    <form action="<?php echo e(route('register.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="dash-form-label">License Number</label>
                                <input type="text" name="license_number" class="dash-input" disabled
                                    value="<?php echo e(Auth::user()->agent['license_no'] ?? ''); ?>">
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Years of Experience</label>
                                <input type="number" name="experience" class="dash-input"
                                    value="<?php echo e(old('experience', Auth::user()->agent['years_experience'] ?? '')); ?>">
                                <?php $__errorArgs = ['experience'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-6">
                                <label class="dash-form-label">Agent Type</label>
                                <select name="agent_type" class="dash-input">
                                    <option value="agent"
                                        <?php echo e(old('agent_type', Auth::user()->agent?->agent_type) == 'agent' ? 'selected' : ''); ?>>
                                        Agent</option>
                                    <option value="rental_specialist"
                                        <?php echo e(old('agent_type', Auth::user()->agent?->agent_type) == 'rental_specialist' ? 'selected' : ''); ?>>
                                        Rental Specialist</option>
                                    <option value="luxury_agent"
                                        <?php echo e(old('agent_type', Auth::user()->agent?->agent_type) == 'luxury_agent' ? 'selected' : ''); ?>>
                                        Luxury Specialist</option>
                                    <option value="commercial_agent"
                                        <?php echo e(old('agent_type', Auth::user()->agent?->agent_type) == 'commercial_agent' ? 'selected' : ''); ?>>
                                        Commercial Agent</option>
                                    <option value="residential_agent"
                                        <?php echo e(old('agent_type', Auth::user()->agent?->agent_type) == 'residential_agent' ? 'selected' : ''); ?>>
                                        Residential Agent</option>
                                    <option value="land_specialist"
                                        <?php echo e(old('agent_type', Auth::user()->agent?->agent_type) == 'land_specialist' ? 'selected' : ''); ?>>
                                        Land Specialist</option>
                                    <option value="new_construction"
                                        <?php echo e(old('agent_type', Auth::user()->agent?->agent_type) == 'new_construction' ? 'selected' : ''); ?>>
                                        New Construction Specialist</option>
                                    <option value="property_manager"
                                        <?php echo e(old('agent_type', Auth::user()->agent?->agent_type) == 'property_manager' ? 'selected' : ''); ?>>
                                        Property Manager</option>
                                </select>
                                <?php $__errorArgs = ['agent_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <button type="submit" class="dash-btn-primary mt-3">
                            <i class="bi bi-check-lg"></i> Save Professional Info
                        </button>
                    </form>
                </div>

                <!-- 3. Security Tab -->
                <div class="dash-tab-pane d-none" id="tab-security">
                    <form action="<?php echo e(route('register.update.password')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="dash-form-label">Current Password</label>
                                <input type="password" name="current_password" class="dash-input form-control"
                                    placeholder="••••••••" required>
                                <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4">
                                <label class="dash-form-label">New Password</label>
                                <input type="password" name="password" class="dash-input form-control"
                                    placeholder="••••••••" required>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4">
                                <label class="dash-form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="dash-input form-control"
                                    placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" class="dash-btn-primary btn btn-primary mt-4">
                            <i class="bi bi-shield-check me-1"></i> Update Password
                        </button>
                    </form>
                </div>

                <!-- 4. Social Links Tab -->
                <div class="dash-tab-pane d-none" id="tab-social">
                    <form action="<?php echo e(route('register.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="dash-form-label">Instagram Profile</label>
                                <input type="url" name="instagram" class="dash-input"
                                    value="<?php echo e(old('instagram', Auth::user()->agent['instagram'] ?? '')); ?>"
                                    placeholder="https://instagram.com/username">
                                <?php $__errorArgs = ['instagram'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">LinkedIn Profile</label>
                                <input type="url" name="linkedin" class="dash-input"
                                    value="<?php echo e(old('linkedin', Auth::user()->agent['linkedin'] ?? '')); ?>"
                                    placeholder="https://linkedin.com/in/username">
                                <?php $__errorArgs = ['linkedin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Twitter / X Profile</label>
                                <input type="url" name="twitter" class="dash-input"
                                    value="<?php echo e(old('twitter', Auth::user()->agent['twitter'] ?? '')); ?>"
                                    placeholder="https://x.com/username">
                                <?php $__errorArgs = ['twitter'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Facebook Profile</label>
                                <input type="url" name="facebook" class="dash-input"
                                    value="<?php echo e(old('facebook', Auth::user()->agent['facebook'] ?? '')); ?>"
                                    placeholder="https://facebook.com/username">
                                <?php $__errorArgs = ['facebook'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>

                        <button type="submit" class="dash-btn-primary mt-3">
                            <i class="bi bi-check-lg"></i> Save Social Links
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>

<div class="dash-toast" id="successToast">
    <i class="bi bi-check-circle-fill"></i>
    <span>Changes saved successfully.</span>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Auto-switch to security tab if password validation fails
    <?php if($errors->has('current_password') || $errors->has('password')): ?>
        document.querySelector('[data-tab="security"]')?.click();
    <?php endif; ?>

    // Live Avatar Preview Functionality
    const fileInput = document.getElementById('profile_picture');
    if (fileInput) {
        fileInput.addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const allAvatars = document.getElementsByClassName('avatar-preview');
                    Array.from(allAvatars).forEach(img => {
                        img.src = e.target.result;
                    });
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Profile Tabs Switcher (Personal, Professional, Security, Social)
    const agentTabs = document.querySelectorAll('.dash-tabs .dash-tab');
    const agentPanes = document.querySelectorAll('.dash-tab-pane');

    agentTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const targetId = 'tab-' + tab.dataset.tab;

            agentTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            agentPanes.forEach(pane => {
                if (pane.id === targetId) {
                    pane.classList.remove('d-none');
                    pane.classList.add('active');
                } else {
                    pane.classList.add('d-none');
                    pane.classList.remove('active');
                }
            });
        });
    });

    // Sidebar & Theme Toggle Handlers
    const sidebar = document.getElementById('sidebar');
    const burgerBtn = document.getElementById('burgerBtn');
    if (burgerBtn && sidebar) {
        burgerBtn.addEventListener('click', () => {
            if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open');
            else sidebar.classList.toggle('collapsed');
        });
    }
</script>
<?php echo $__env->make('layout.Notification', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/agent/agent-profile.blade.php ENDPATH**/ ?>