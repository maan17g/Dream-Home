

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dream Home - Find your perfect property with verified listings and expert guidance">
    <meta name="keywords" content="real estate, property, homes, apartments, villas">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Agent profile</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script>
        window.Laravel = {
            isLoggedIn: <?php echo e(Auth::check() ? 'true' : 'false'); ?>

        };
    </script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/assets/css/dashboard.css')); ?>">
</head>

<body data-theme="dark">

    <div class="dash-main">
        <div class="text-decoration-none flex-inline">
            <a href="<?php echo e(url()->previous()); ?>" class="page-link mt-5 ms-4 align-text-center p-2" style=" width:100px !important;">
                <svg xmlns="http://w3.org" fill="none" height='10' viewBox="0 0 24 24" stroke-width="2"
                    stroke="currentColor" class="icon-arrow">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                  </svg>
                  Go Back
            </a>
        </div>
        <main class="dash-content">

            <div class="dash-page-head">

                <div class="dash-head-actions">
                </div>
            </div>

            <div class="row g-3">
                <div class="col-lg-4">
                    <div class="dash-panel text-center mb-3">
                        <img src="<?php echo e(asset('storage/'. $agent->user->avatar)); ?>"
                            style="width:96px;height:96px;border-radius:50%;object-fit:cover;border:3px solid var(--primary);"
                            class="mb-2">
                        <h6 class="mb-0"><?php echo e($agent->user->first_name .' '. $agent->user->last_name); ?></h6>
                        <div class="dash-row-sub mb-2"><?php echo e($agent->user->email); ?></div>
                        <span class="verified-badge" style="position:static;display:inline-flex;"><i
                                class="bi bi-patch-check-fill"></i>Verified</span>
                        <div class="rating-stars mt-2">★★★★★ <span class="text-muted-custom"><?php echo e($agent->review->sum('rating')); ?></span>
                        </div>
                    </div>
                    <div class="dash-panel">
                        <div class="dash-panel-head">
                            <div class="dash-panel-title">Contact Info</div>
                        </div>
                        <div class="d-flex justify-content-between mb-2"><span class="dash-row-sub">Phone</span><strong
                                style="font-size:.82rem;"><?php echo e($agent->user->phone?$agent->user->phone:'#'); ?></strong></div>
                        <div class="d-flex justify-content-between mb-2"><span class="dash-row-sub">License
                                No.</span><strong style="font-size:.82rem;"><?php echo e($agent->license_no); ?></strong></div>
                        
                        <div class="d-flex justify-content-between"><span class="dash-row-sub">Joined</span><strong
                                style="font-size:.82rem;"><?php echo e($agent->user->created_at->format('Y-m-d')); ?></strong></div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row g-3 mb-3">
                        <div class="col-6 col-md-6">
                            <div class="stat-card">
                                <div class="stat-icon"><i class="bi bi-buildings-fill"></i></div>
                                <div>
                                    <div class="stat-label">Listings</div>
                                    <div class="stat-value"><?php echo e($agent->properties->count()); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="stat-card">
                                <div class="stat-icon"><i class="bi bi-person-lines-fill"></i></div>
                                <div>
                                    <div class="stat-label">Views</div>
                                    <div class="stat-value"><?php echo e($agent->properties->sum('views')); ?></div>
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <div class="dash-panel mb-3">
    <div class="dash-panel-head">
        <div class="dash-panel-title">Active Listings</div>
    </div>
    <div class="dash-table-wrap">
        <table class="dash-table">
            <thead>
                <tr>
                    <th>Property</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Views</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="d-flex align-items-center gap-2">
                            <!-- Optional fallback if you have property images, otherwise using standard placeholder -->
                            <img class="dash-row-thumb" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=100&q=60">
                            <span class="dash-row-title"><?php echo e($property->title); ?></span>
                        </td>
                        <td>$<?php echo e(number_format($property->price)); ?></td>
                        <td>
                            <span class="status-pill <?php echo e($property->verified === 'approved' ? 'success' : 'warning'); ?>">
                                <i class="bi bi-circle-fill"></i>
                                <?php echo e(ucfirst($property->verified)); ?>

                            </span>
                        </td>
                        <td><?php echo e(number_format($property->views)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">No properties listed yet.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap Pagination Navigation Links -->
    <div class="mt-3 d-flex justify-content-center">
        <?php echo e($properties->links('pagination::bootstrap-5')); ?>

    </div>
</div>

                    <div class="dash-panel">
                        <div class="dash-panel-title" ">Socials</div>
                    <div class="footer-socials">
                        <a href="<?php echo e($agent->facebook ?? '#'); ?>" class="footer-social-icon"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo e($agent->instagram ?? '#'); ?>" class="footer-social-icon"><i
                                class="fab fa-instagram"></i></a>
                        <a href="<?php echo e($agent->twitter ?? '#'); ?>" class="footer-social-icon"><i
                                class="fab fa-x"></i></a>
                        <a href="<?php echo e($agent->linkedin ?? '#'); ?>" class="footer-social-icon"><i
                                class="fab fa-linkedin-in"></i></a>
                
                    </div>
                </div>
            </div>
    </main>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    document.getElementById('burgerBtn').addEventListener('click', () => {
        if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open');
        else sidebar.classList.toggle('collapsed');
    });
    const themeBtn = document.getElementById('themeToggle');
    const root = document.documentElement;
    themeBtn.addEventListener('click', () => {
        const isLight = root.getAttribute('data-theme') === 'light';
        root.setAttribute('data-theme', isLight ? 'dark' : 'light');
        themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' :
            '<i class="bi bi-sun-fill"></i>';
    });
</script>
</body>

</html>
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate - Copy\resources\views/frontend/agent-view.blade.php ENDPATH**/ ?>