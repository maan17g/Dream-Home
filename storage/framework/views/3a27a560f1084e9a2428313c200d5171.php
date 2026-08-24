<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <script>
        window.Laravel = {
            isLoggedIn: <?php echo e(Auth::check() ? 'true' : 'false'); ?>

        };
    </script>
    <link rel="stylesheet" href="<?php echo e(asset('asset/css/style.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('dashboard/assets/css/dashboard.css')); ?>">
</head>

<body>
    <div class="dash-body">

        <aside class="dash-sidebar" id="sidebar">
            <a href="<?php echo e(route('page.index')); ?>" class="dash-logo"><i class="bi bi-house-door-fill"></i><span
                    class="dash-logo-text">Dream Home<span class="dash-logo-sub">My Account</span></span></a>
            <div class="dash-nav-label">Overview</div>
            <ul class="dash-nav">
                <li><a href="<?php echo e(route('user.index')); ?>"
                        class="dash-nav-link <?php echo e(request()->routeIs('user.index') ? 'active' : ''); ?>"><i
                            class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a></li>
            </ul>
            <div class="dash-nav-label">My Activity</div>
            <ul class="dash-nav">
                <li><a href="<?php echo e(route('user.saved')); ?>"
                        class="dash-nav-link <?php echo e(request()->routeIs('user.saved') ? 'active' : ''); ?>"><i
                            class="bi bi-heart-fill"></i><span>Saved Properties</span><span
                            class="dash-nav-badge"><?php echo e(Auth::user()->savedProperties()->count()); ?></span></a></li>
                <li><a href="<?php echo e(route('user.appointments')); ?>"
                        class="dash-nav-link <?php echo e(request()->routeIs('user.appointments') ? 'active' : ''); ?>"><i
                            class="bi bi-calendar-check-fill"></i><span>My Appointments</span><span
                            class="dash-nav-badge"><?php echo e(Auth::user()->appointments->count()); ?></span></a></li>
           
            </ul>
            <div class="dash-nav-label">Account</div>
            <ul class="dash-nav">
                <li><a href="<?php echo e(route('user.profile')); ?>"
                        class="dash-nav-link <?php echo e(request()->routeIs('user.profile') ? 'active' : ''); ?>"><i
                            class="bi bi-person-fill"></i><span>Profile</span></a></li>
            </ul>
            <div class="dash-sidebar-footer">
                <ul class="dash-nav">
                    <li><a href="<?php echo e(route('user.destroy')); ?>" class="dash-nav-link"><i
                                class="bi bi-box-arrow-right"></i><span>Logout</span></a></li>
                </ul>
            </div>
        </aside>

        <div class="dash-main">
            <header class="dash-topbar">
                <button class="dash-burger" id="burgerBtn"><i class="bi bi-list"></i></button>
             
                <div class="dash-topbar-right">
             
                    <div class="dropdown">
                        <button class="dash-profile border-0" data-bs-toggle="dropdown">
                            <?php if(Auth::user()->avatar): ?>
                                <img id="avatar-preview" class="avatar-preview"
                                    src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt="Profile Picture">
                         
                            <?php endif; ?>
                            <span class="dash-profile-info d-none d-sm-block"><span
                                    class="dash-profile-name d-block"><?php echo e(Auth::user()->first_name . ' ' . Auth::user()->last_name); ?></span><span
                                    class="dash-profile-role">Homebuyer</span></span>
                            <i class="bi bi-chevron-down text-muted-custom" style="font-size:.7rem;"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end dash-dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>"><i class="bi bi-person"></i> My
                                Profile</a>
                            <form action="<?php echo e(route('user.destroy')); ?>" method="GEt" class="m-0 p-0">
                                <?php echo csrf_field(); ?>
                               
                                <button type="submit" class="dropdown-item d-flex align-items-center"
                                    style="color:#e5484d; background: none; border: none; width: 100%;">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate - Copy\resources\views/user/layout/header.blade.php ENDPATH**/ ?>