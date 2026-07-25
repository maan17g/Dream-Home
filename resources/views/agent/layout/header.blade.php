<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $title }}</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
<link rel="stylesheet" href="{{asset('dashboard/assets/css/dashboard.css')}}">
</head>
<body>
  <div class="dash-body">
  <aside class="dash-sidebar" id="sidebar">
    <a href="{{ route('agent.index') }}" class="dash-logo"><i class="bi bi-house-door-fill"></i><span class="dash-logo-text">Dream Home<span class="dash-logo-sub">Agent Panel</span></span></a>
    <div class="dash-nav-label">Overview</div>
    <ul class="dash-nav"><li><a href="{{ route('agent.index') }}" class="dash-nav-link  {{ request()->routeIs('agent.index') ? 'active' : '' }}"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a></li></ul>
    <div class="dash-nav-label">Workspace</div>
    <ul class="dash-nav">
      <li><a href="{{ route('agent.properties') }}" class="dash-nav-link  {{ request()->routeIs('agent.properties') ? 'active' : '' }}"><i class="bi bi-buildings-fill"></i><span>My Properties</span></a></li>
      <li><a href="{{ route('agent.appointments') }}" class="dash-nav-link  {{ request()->routeIs('agent.appointments') ? 'active' : '' }}"><i class="bi bi-calendar-check-fill"></i><span>Appointments</span><span class="dash-nav-badge">4</span></a></li>
      <li><a href="{{ route('agent.messages') }}" class="dash-nav-link  {{ request()->routeIs('agent.messages') ? 'active' : '' }}"><i class="bi bi-chat-dots-fill"></i><span>Messages</span><span class="dash-nav-badge">3</span></a></li>
    </ul>
    <div class="dash-nav-label">Account</div>
    <ul class="dash-nav"><li><a href="{{ route('agent.profile') }}" class="dash-nav-link  {{ request()->routeIs('agent.profile') ? 'active' : '' }}"><i class="bi bi-person-fill"></i><span>Profile</span></a></li></ul>
    <div class="dash-sidebar-footer"><ul class="dash-nav"><li><a href="#" class="dash-nav-link"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a></li></ul></div>
  </aside>

  <div class="dash-main">
    <header class="dash-topbar">
      <button class="dash-burger" id="burgerBtn"><i class="bi bi-list"></i></button>
      <div class="dash-search"><i class="bi bi-search"></i><input type="text" placeholder="Search your listings..."></div>
      <div class="dash-topbar-right">
        <button class="dash-icon-btn" id="themeToggle"><i class="bi bi-moon-stars-fill"></i></button>
        <div class="dropdown">
          <button class="dash-profile border-0" data-bs-toggle="dropdown">
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Agent">
            <span class="dash-profile-info d-none d-sm-block"><span class="dash-profile-name d-block">{{Auth::user()->first_name ." ". Auth::user()->last_name}}</span><span class="dash-profile-role">Agent</span></span>
            <i class="bi bi-chevron-down text-muted-custom" style="font-size:.7rem;"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end dash-dropdown-menu">
            <a class="dropdown-item" href="{{ route('agent.profile') }}"><i class="bi bi-person"></i> My Profile</a>
            <a class="dropdown-item" href="#" style="color:#e5484d"><i class="bi bi-box-arrow-right"></i> Logout</a>
          </div>
        </div>
      </div>
    </header>