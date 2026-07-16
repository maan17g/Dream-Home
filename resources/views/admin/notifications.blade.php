<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Notifications | Dream Home Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="../assets/style.css">
<link rel="stylesheet" href="../assets/dashboard.css">
</head>
<body>
<div class="dash-body">
  <aside class="dash-sidebar" id="sidebar">
    <a href="admin-dashboard.html" class="dash-logo"><i class="bi bi-house-door-fill"></i><span class="dash-logo-text">Dream Home<span class="dash-logo-sub">Admin Panel</span></span></a>
    <div class="dash-nav-label">Overview</div>
    <ul class="dash-nav"><li><a href="admin-dashboard.html" class="dash-nav-link"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a></li></ul>
    <div class="dash-nav-label">Management</div>
    <ul class="dash-nav">
      <li><a href="customers.html" class="dash-nav-link"><i class="bi bi-people-fill"></i><span>Users</span></a></li>
      <li><a href="agents.html" class="dash-nav-link"><i class="bi bi-person-badge-fill"></i><span>Agents</span></a></li>
      <li><a href="property-management.html" class="dash-nav-link"><i class="bi bi-buildings-fill"></i><span>Properties</span></a></li>
      <li><a href="#" class="dash-nav-link"><i class="bi bi-calendar-check-fill"></i><span>Bookings</span><span class="dash-nav-badge">12</span></a></li>
      <li><a href="inquiries.html" class="dash-nav-link"><i class="bi bi-chat-dots-fill"></i><span>Inquiries</span><span class="dash-nav-badge">5</span></a></li>
    </ul>
    <div class="dash-nav-label">Content</div>
    <ul class="dash-nav">
      <li><a href="cms.html" class="dash-nav-link"><i class="bi bi-layout-text-window-reverse"></i><span>CMS Pages</span></a></li>
      <li><a href="blog-cms.html" class="dash-nav-link"><i class="bi bi-file-earmark-post-fill"></i><span>Blog</span></a></li>
      <li><a href="notifications.html" class="dash-nav-link active"><i class="bi bi-bell-fill"></i><span>Notifications</span></a></li>
    </ul>
    <div class="dash-sidebar-footer"><ul class="dash-nav"><li><a href="#" class="dash-nav-link"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a></li></ul></div>
  </aside>

  <div class="dash-main">
    <header class="dash-topbar">
      <button class="dash-burger" id="burgerBtn"><i class="bi bi-list"></i></button>
      <div class="dash-search"><i class="bi bi-search"></i><input type="text" placeholder="Search properties, agents, users..."></div>
      <div class="dash-topbar-right">
        <button class="dash-icon-btn" id="themeToggle"><i class="bi bi-moon-stars-fill"></i></button>
        <button class="dash-icon-btn"><i class="bi bi-bell-fill"></i><span class="dash-icon-dot"></span></button>
        <div class="dropdown">
          <button class="dash-profile border-0" data-bs-toggle="dropdown">
            <img src="https://i.pravatar.cc/64?img=12" alt="Admin">
            <span class="dash-profile-info d-none d-sm-block"><span class="dash-profile-name d-block">Admin User</span><span class="dash-profile-role">Super Admin</span></span>
            <i class="bi bi-chevron-down text-muted-custom" style="font-size:.7rem;"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end dash-dropdown-menu">
            <a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Profile</a>
            <a class="dropdown-item" href="#" style="color:#e5484d"><i class="bi bi-box-arrow-right"></i> Logout</a>
          </div>
        </div>
      </div>
    </header>

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <span class="current">Notifications</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Notifications</h1>
          <p class="dash-page-desc">Stay on top of system, inquiry, and appointment updates.</p>
        </div>
        <div class="dash-head-actions"><button class="dash-btn-secondary"><i class="bi bi-check2-all"></i> Mark All as Read</button></div>
      </div>

      <div class="dash-panel" style="padding:0;">
        <div class="dash-tabs" style="padding:0 1.5rem;margin-bottom:0;">
          <button class="dash-tab active">All</button>
          <button class="dash-tab">Unread (4)</button>
          <button class="dash-tab">System</button>
          <button class="dash-tab">Inquiries</button>
          <button class="dash-tab">Appointments</button>
        </div>

        <div class="notif-item unread">
          <div class="notif-icon inquiry"><i class="bi bi-person-plus"></i></div>
          <div class="flex-fill">
            <div class="notif-text"><strong>New agent application</strong> — Priya Sharma applied to join as an agent.</div>
            <div class="notif-time">10 minutes ago</div>
          </div>
          <div class="row-actions"><button class="row-action-btn" title="Mark read"><i class="bi bi-check2"></i></button><button class="row-action-btn danger" title="Delete"><i class="bi bi-trash"></i></button></div>
        </div>
        <div class="notif-item unread">
          <div class="notif-icon appointment"><i class="bi bi-calendar-check"></i></div>
          <div class="flex-fill">
            <div class="notif-text"><strong>Booking confirmed</strong> — Modern Villa in Miami, viewing on Saturday 11 AM.</div>
            <div class="notif-time">1 hour ago</div>
          </div>
          <div class="row-actions"><button class="row-action-btn" title="Mark read"><i class="bi bi-check2"></i></button><button class="row-action-btn danger" title="Delete"><i class="bi bi-trash"></i></button></div>
        </div>
        <div class="notif-item unread">
          <div class="notif-icon system"><i class="bi bi-exclamation-circle"></i></div>
          <div class="flex-fill">
            <div class="notif-text"><strong>Listing pending approval</strong> — "Family House in Texas" needs review.</div>
            <div class="notif-time">3 hours ago</div>
          </div>
          <div class="row-actions"><button class="row-action-btn" title="Mark read"><i class="bi bi-check2"></i></button><button class="row-action-btn danger" title="Delete"><i class="bi bi-trash"></i></button></div>
        </div>
        <div class="notif-item unread">
          <div class="notif-icon inquiry"><i class="bi bi-chat-dots"></i></div>
          <div class="flex-fill">
            <div class="notif-text"><strong>New inquiry</strong> — John Smith asked about Modern Villa in Miami.</div>
            <div class="notif-time">5 hours ago</div>
          </div>
          <div class="row-actions"><button class="row-action-btn" title="Mark read"><i class="bi bi-check2"></i></button><button class="row-action-btn danger" title="Delete"><i class="bi bi-trash"></i></button></div>
        </div>
        <div class="notif-item">
          <div class="notif-icon system"><i class="bi bi-shield-check"></i></div>
          <div class="flex-fill">
            <div class="notif-text">Weekly backup completed successfully.</div>
            <div class="notif-time">Yesterday</div>
          </div>
          <div class="row-actions"><button class="row-action-btn danger" title="Delete"><i class="bi bi-trash"></i></button></div>
        </div>
        <div class="notif-item">
          <div class="notif-icon appointment"><i class="bi bi-calendar-x"></i></div>
          <div class="flex-fill">
            <div class="notif-text">Appointment cancelled — Beach House in Florida, May 15.</div>
            <div class="notif-time">2 days ago</div>
          </div>
          <div class="row-actions"><button class="row-action-btn danger" title="Delete"><i class="bi bi-trash"></i></button></div>
        </div>
      </div>
    </main>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; });
</script>
</body>
</html>
