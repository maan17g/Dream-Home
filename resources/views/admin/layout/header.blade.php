<!DOCTYPE html>
<html lang="en" data-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Dream Home</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets/css/dashboard.css') }}">
</head>

<body>

    <div class="dash-body">

        <!-- ============ SIDEBAR ============ -->
        <aside class="dash-sidebar" id="sidebar">
            <a href="{{ route('page.index') }}" class="dash-logo">
                <i class="bi bi-house-door-fill"></i>
                <span class="dash-logo-text">Dream Home<span class="dash-logo-sub">Admin Panel</span></span>
            </a>

            <div class="dash-nav-label">Overview</div>
            <ul class="dash-nav">
                <li>
                    <a href="{{ route('admin.index') }}"
                        class="dash-nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span>
                    </a>
                </li>
            </ul>

            <div class="dash-nav-label">Management</div>
            <ul class="dash-nav">
                <li>
                    <a href="{{ route('admin.users') }}"
                        class="dash-nav-link {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i><span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.agents') }}"
                        class="dash-nav-link {{ request()->routeIs('admin.agents') ? 'active' : '' }}">
                        <i class="bi bi-person-badge-fill"></i><span>Agents</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.property') }}"
                        class="dash-nav-link {{ request()->routeIs('admin.property*') ? 'active' : '' }}">
                        <i class="bi bi-buildings-fill"></i><span>Properties</span>
                    </a>
                </li>
            </ul>

            <div class="dash-nav-label">Content</div>
            <ul class="dash-nav">
                <li>
                    <a href="{{ route('admin.cms') }}"
                        class="dash-nav-link {{ request()->routeIs('admin.cms*') ? 'active' : '' }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Reviews</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('amenities.index') }}"
                        class="dash-nav-link {{ request()->routeIs('amenities.index*') ? 'active' : '' }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Amenities</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.appointment') }}"
                        class="dash-nav-link {{ request()->routeIs('admin.appointment*') ? 'active' : '' }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Appointments</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.inquiries.index') }}"
                        class="dash-nav-link {{ request()->routeIs('admin.inquiries.index*') ? 'active' : '' }}">
                        <i class="bi bi-layout-text-window-reverse"></i><span>Inquiries</span>
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.blogcms') }}" class="dash-nav-link {{ request()->routeIs('admin.blogcms*') ? 'active' : '' }}">
          <i class="bi bi-file-earmark-post-fill"></i><span>Blog</span>
        </a>
                </li> --}}
            </ul>

            <div class="dash-sidebar-footer">
                <ul class="dash-nav">
                    <li><a href="{{ route('user.destroy') }}" class="dash-nav-link"><i
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
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Admin">
                            <span class="dash-profile-info d-none d-sm-block"><span
                                    class="dash-profile-name d-block">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span><span
                                    class="dash-profile-role">Super Admin</span></span>
                            {{-- <i class="bi bi-chevron-down text-muted-custom" style="font-size:.7rem;"></i> --}}
                        </button>

                    </div>
                </div>
            </header>
            @include('layout.Notification')
