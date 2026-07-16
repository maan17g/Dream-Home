<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agent Profile | Dream Home Admin</title>
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
      <li><a href="agents.html" class="dash-nav-link active"><i class="bi bi-person-badge-fill"></i><span>Agents</span></a></li>
      <li><a href="property-management.html" class="dash-nav-link"><i class="bi bi-buildings-fill"></i><span>Properties</span></a></li>
      <li><a href="#" class="dash-nav-link"><i class="bi bi-calendar-check-fill"></i><span>Bookings</span><span class="dash-nav-badge">12</span></a></li>
      <li><a href="inquiries.html" class="dash-nav-link"><i class="bi bi-chat-dots-fill"></i><span>Inquiries</span><span class="dash-nav-badge">5</span></a></li>
    </ul>
    <div class="dash-nav-label">Content</div>
    <ul class="dash-nav">
      <li><a href="cms.html" class="dash-nav-link"><i class="bi bi-layout-text-window-reverse"></i><span>CMS Pages</span></a></li>
      <li><a href="blog-cms.html" class="dash-nav-link"><i class="bi bi-file-earmark-post-fill"></i><span>Blog</span></a></li>
      <li><a href="notifications.html" class="dash-nav-link"><i class="bi bi-bell-fill"></i><span>Notifications</span></a></li>
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
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <a href="agents.html">Agents</a> / <span class="current">John Doe</span></div>
      <div class="dash-page-head">
        <div><h1 class="dash-page-title">John Doe</h1><p class="dash-page-desc">Premium Agent · Miami, FL · Agent ID: AGT-001</p></div>
        <div class="dash-head-actions">
          <button class="dash-btn-secondary"><i class="bi bi-envelope"></i> Message</button>
          <button class="dash-btn-danger"><i class="bi bi-slash-circle"></i> Suspend</button>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-lg-4">
          <div class="dash-panel text-center mb-3">
            <img src="https://i.pravatar.cc/150?img=11" style="width:96px;height:96px;border-radius:50%;object-fit:cover;border:3px solid var(--primary);" class="mb-2">
            <h6 class="mb-0">John Doe</h6>
            <div class="dash-row-sub mb-2">john.doe@dreamhome.com</div>
            <span class="verified-badge" style="position:static;display:inline-flex;"><i class="bi bi-patch-check-fill"></i>Verified</span>
            <div class="rating-stars mt-2">★★★★★ <span class="text-muted-custom">4.9 (128 reviews)</span></div>
          </div>
          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Contact Info</div></div>
            <div class="d-flex justify-content-between mb-2"><span class="dash-row-sub">Phone</span><strong style="font-size:.82rem;">+1 (555) 123-4567</strong></div>
            <div class="d-flex justify-content-between mb-2"><span class="dash-row-sub">License No.</span><strong style="font-size:.82rem;">RE-2019-88213</strong></div>
            <div class="d-flex justify-content-between mb-2"><span class="dash-row-sub">Agency</span><strong style="font-size:.82rem;">Beverly Hills Realty</strong></div>
            <div class="d-flex justify-content-between"><span class="dash-row-sub">Joined</span><strong style="font-size:.82rem;">May 12, 2024</strong></div>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="row g-3 mb-3">
            <div class="col-6 col-md-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-buildings-fill"></i></div><div><div class="stat-label">Listings</div><div class="stat-value">28</div></div></div></div>
            <div class="col-6 col-md-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-person-lines-fill"></i></div><div><div class="stat-label">Leads</div><div class="stat-value">142</div></div></div></div>
            <div class="col-6 col-md-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-check2-circle"></i></div><div><div class="stat-label">Closed Deals</div><div class="stat-value">19</div></div></div></div>
            <div class="col-6 col-md-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-lightning-charge-fill"></i></div><div><div class="stat-label">Response Rate</div><div class="stat-value">96%</div></div></div></div>
          </div>

          <div class="dash-panel mb-3">
            <div class="dash-panel-head"><div class="dash-panel-title">Active Listings</div><a href="property-management.html" class="dash-link">View All</a></div>
            <div class="dash-table-wrap">
              <table class="dash-table">
                <thead><tr><th>Property</th><th>Price</th><th>Status</th><th>Views</th></tr></thead>
                <tbody>
                  <tr><td class="d-flex align-items-center gap-2"><img class="dash-row-thumb" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=100&q=60"><span class="dash-row-title">Modern Villa in Miami</span></td><td>$850,000</td><td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td><td>1,204</td></tr>
                  <tr><td class="d-flex align-items-center gap-2"><img class="dash-row-thumb" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=100&q=60"><span class="dash-row-title">Beach House in Florida</span></td><td>$650,000</td><td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td><td>2,310</td></tr>
                </tbody>
              </table>
            </div>
          </div>

          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Recent Activity</div></div>
            <div class="activity-timeline">
              <div class="activity-timeline-item"><div class="dash-row-title" style="font-size:.85rem;">Closed deal on Beach House in Florida</div><div class="activity-time">2 days ago</div></div>
              <div class="activity-timeline-item"><div class="dash-row-title" style="font-size:.85rem;">Added new listing: Modern Villa in Miami</div><div class="activity-time">May 20, 2024</div></div>
              <div class="activity-timeline-item"><div class="dash-row-title" style="font-size:.85rem;">Verified identity and license</div><div class="activity-time">May 12, 2024</div></div>
            </div>
          </div>
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
