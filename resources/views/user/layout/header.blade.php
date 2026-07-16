<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{$title}}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('dashboard/assets/dashboard.css') }}">
</head>
<body>
<div class="dash-body">
    
  <aside class="dash-sidebar" id="sidebar">
    <a href="{{ route('page.index') }}" class="dash-logo"><i class="bi bi-house-door-fill"></i><span class="dash-logo-text">Dream Home<span class="dash-logo-sub">My Account</span></span></a>
    <div class="dash-nav-label">Overview</div>
    <ul class="dash-nav"><li><a href="{{ route('user.index') }}" class="dash-nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a></li></ul>
    <div class="dash-nav-label">My Activity</div>
    <ul class="dash-nav">
      <li><a href="{{ route('user.saved') }}" class="dash-nav-link {{ request()->routeIs('user.saved') ? 'active' : '' }}"><i class="bi bi-heart-fill"></i><span>Saved Properties</span><span class="dash-nav-badge">12</span></a></li>
      <li><a href="{{ route('user.appointments') }}" class="dash-nav-link {{ request()->routeIs('user.appointments') ? 'active' : '' }}"><i class="bi bi-calendar-check-fill"></i><span>My Appointments</span><span class="dash-nav-badge">3</span></a></li>
      <li><a href="{{ route('user.inquiries') }}" class="dash-nav-link {{ request()->routeIs('user.inquiries') ? 'active' : '' }}"><i class="bi bi-chat-dots-fill"></i><span>Inquiries</span><span class="dash-nav-badge">2</span></a></li>
    </ul>
    <div class="dash-nav-label">Account</div>
    <ul class="dash-nav"><li><a href="{{ route('user.profile') }}" class="dash-nav-link {{ request()->routeIs('user.profile') ? 'active' : '' }}"><i class="bi bi-person-fill"></i><span>Profile</span></a></li></ul>
    <div class="dash-sidebar-footer"><ul class="dash-nav"><li><a href="{{ route('user.destroy') }}" class="dash-nav-link"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a></li></ul></div>
  </aside>

  <div class="dash-main">
    <header class="dash-topbar">
      <button class="dash-burger" id="burgerBtn"><i class="bi bi-list"></i></button>
      <div class="dash-search"><i class="bi bi-search"></i><input type="text" placeholder="Search properties..."></div>
      <div class="dash-topbar-right">
        <button class="dash-icon-btn" id="themeToggle"><i class="bi bi-moon-stars-fill"></i></button>
        <button class="dash-icon-btn"><i class="bi bi-bell-fill"></i><span class="dash-icon-dot"></span></button>
        <div class="dropdown">
          <button class="dash-profile border-0" data-bs-toggle="dropdown">
            <img src="https://i.pravatar.cc/64?img=68" alt="User">
            <span class="dash-profile-info d-none d-sm-block"><span class="dash-profile-name d-block">John Smith</span><span class="dash-profile-role">Homebuyer</span></span>
            <i class="bi bi-chevron-down text-muted-custom" style="font-size:.7rem;"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end dash-dropdown-menu">
            <a class="dropdown-item" href="user-profile.html"><i class="bi bi-person"></i> My Profile</a>
            <a class="dropdown-item" href="#" style="color:#e5484d"><i class="bi bi-box-arrow-right"></i> Logout</a>
          </div>
        </div>
      </div>
    </header>