<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Dream Home - Find your perfect property with verified listings and expert guidance">
    <meta name="keywords" content="real estate, property, homes, apartments, villas">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($title); ?></title>

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
</head>

<body data-theme="dark">

    <!-- Header / Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="<?php echo e(route('page.index')); ?>">
                    <i class="bi bi-house-door-fill"></i> Real Estate
                </a>

                <!-- Mobile Toggle for Menu -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-4">
                        <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('page.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('page.index')); ?>">Home</a></li>
                        <li class="nav-item"><a
                                class="nav-link <?php echo e(request()->routeIs('property.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('property.index')); ?>">Properties</a></li>
                        <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('page.about') ? 'active' : ''); ?>"
                                href="<?php echo e(route('page.about')); ?>">About Us</a></li>
                        <li class="nav-item"><a class="nav-link <?php echo e(request()->routeIs('blog.index') ? 'active' : ''); ?>"
                                href="<?php echo e(route('blog.index')); ?>">Blogs</a></li>
                        <li class="nav-item"><a
                                class="nav-link <?php echo e(request()->routeIs('page.contact') ? 'active' : ''); ?>"
                                href="<?php echo e(route('page.contact')); ?>">Contact</a></li>
                    </ul>

                    <div class="d-flex align-items-center gap-3 flex-column flex-lg-row mt-3 mt-lg-0">
                        <!-- Theme Toggle Button -->
                        
                        <?php if(Auth::check()): ?>
                            <?php if(Auth::user()->role == 'admin'): ?>
                                <a href="<?php echo e(route('admin.index')); ?>" class="nav-link fw-bold"><i
                                        class="bi bi-person-circle" style="font-size: 2rem;"></i>
                                </a>
                            <?php elseif(Auth::user()->role == 'agent'): ?>
                                <a href="<?php echo e(route('agent.index')); ?>" class="nav-link fw-bold">
                                    <img src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt=""
                                        width="30" height="30" class="rounded-circle img"> <!-- <i
                                        class="bi bi-person-circle" style="font-size: 2rem;"></i> -->
                                </a>
                            <?php else: ?>
                                <a href="<?php echo e(route('user.index')); ?>" class="nav-link fw-bold">
                                    <img src="<?php echo e(asset('storage/' . Auth::user()->avatar)); ?>" alt=""
                                        width="30" height="30" class="rounded-circle img"> 
                                    </a>
<?php endif; ?>
<?php else: ?>
<a href="<?php echo e(route('login.index')); ?>" class="nav-link fw-bold">Login</a>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </nav>
    </header>
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/frontend/layout/header.blade.php ENDPATH**/ ?>