<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Agents | Dream Home Admin</title>
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
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <span class="current">Agents</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Agents</h1>
          <p class="dash-page-desc">86 agents on your platform — manage verification, performance, and approvals.</p>
        </div>
        <div class="dash-head-actions">
          <button class="dash-btn-primary" data-bs-toggle="modal" data-bs-target="#addAgentModal"><i class="bi bi-plus-lg"></i> Add Agent</button>
        </div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-person-badge-fill"></i></div><div><div class="stat-label">Total Agents</div><div class="stat-value">86</div></div></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-patch-check-fill"></i></div><div><div class="stat-label">Verified</div><div class="stat-value">71</div></div></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-hourglass-split"></i></div><div><div class="stat-label">Pending Approval</div><div class="stat-value">6</div></div></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-star-fill"></i></div><div><div class="stat-label">Avg. Rating</div><div class="stat-value">4.7</div></div></div></div>
      </div>

      <div class="dash-filter-bar">
        <div class="row g-3 align-items-end">
          <div class="col-lg-4 col-6"><label class="dash-filter-label">Search</label><div class="dash-input-icon"><i class="bi bi-search"></i><input type="text" class="dash-input" placeholder="Search agents..."></div></div>
          <div class="col-lg-3 col-6"><label class="dash-filter-label">Status</label><select class="dash-select"><option>All</option><option>Active</option><option>Inactive</option><option>Pending</option></select></div>
          <div class="col-lg-3 col-6"><label class="dash-filter-label">Sort By</label><select class="dash-select"><option>Top Rated</option><option>Most Listings</option><option>Newest</option></select></div>
          <div class="col-lg-2 col-6 d-flex gap-2">
            <button class="dash-icon-btn" title="Grid view"><i class="bi bi-grid-3x3-gap"></i></button>
            <button class="dash-icon-btn" title="Table view"><i class="bi bi-list-ul"></i></button>
          </div>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-md-6 col-lg-4">
          <div class="agent-card position-relative">
            <span class="verified-badge"><i class="bi bi-patch-check-fill"></i>Verified</span>
            <img src="https://i.pravatar.cc/150?img=11" alt="">
            <h6>John Doe</h6>
            <div class="agent-role">Premium Agent · Miami, FL</div>
            <div class="rating-stars mb-2">★★★★★ <span class="text-muted-custom">4.9</span></div>
            <div class="agent-stats-row">
              <div><strong>28</strong><span>Listings</span></div>
              <div><strong>142</strong><span>Leads</span></div>
              <div><strong>96%</strong><span>Response</span></div>
            </div>
            <div class="d-flex gap-2 mt-3">
              <a href="agent-view.html" class="dash-btn-secondary flex-fill" style="padding:.5rem;font-size:.78rem;text-align:center;"><i class="bi bi-eye"></i> View</a>
              <button class="dash-btn-secondary flex-fill" style="padding:.5rem;font-size:.78rem;"><i class="bi bi-envelope"></i> Message</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="agent-card position-relative">
            <span class="verified-badge"><i class="bi bi-patch-check-fill"></i>Verified</span>
            <img src="https://i.pravatar.cc/150?img=5" alt="">
            <h6>Sarah Smith</h6>
            <div class="agent-role">Luxury Specialist · Los Angeles, CA</div>
            <div class="rating-stars mb-2">★★★★★ <span class="text-muted-custom">4.8</span></div>
            <div class="agent-stats-row">
              <div><strong>16</strong><span>Listings</span></div>
              <div><strong>89</strong><span>Leads</span></div>
              <div><strong>91%</strong><span>Response</span></div>
            </div>
            <div class="d-flex gap-2 mt-3">
              <a href="agent-view.html" class="dash-btn-secondary flex-fill" style="padding:.5rem;font-size:.78rem;text-align:center;"><i class="bi bi-eye"></i> View</a>
              <button class="dash-btn-secondary flex-fill" style="padding:.5rem;font-size:.78rem;"><i class="bi bi-envelope"></i> Message</button>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="agent-card position-relative">
            <span class="verified-badge" style="background:rgba(245,166,35,.15);color:#f5a623;"><i class="bi bi-hourglass-split"></i>Pending</span>
            <img src="https://i.pravatar.cc/150?img=33" alt="">
            <h6>Michael Brown</h6>
            <div class="agent-role">Rental Expert · Chicago, IL</div>
            <div class="rating-stars mb-2">★★★★☆ <span class="text-muted-custom">4.2</span></div>
            <div class="agent-stats-row">
              <div><strong>22</strong><span>Listings</span></div>
              <div><strong>64</strong><span>Leads</span></div>
              <div><strong>88%</strong><span>Response</span></div>
            </div>
            <div class="d-flex gap-2 mt-3">
              <button class="dash-btn-primary flex-fill" style="padding:.5rem;font-size:.78rem;" data-bs-toggle="modal" data-bs-target="#addAgentModal"><i class="bi bi-check-lg"></i> Approve</button>
              <a href="agent-view.html" class="dash-btn-secondary flex-fill" style="padding:.5rem;font-size:.78rem;text-align:center;"><i class="bi bi-eye"></i> View</a>
            </div>
          </div>
        </div>
      </div>

      <div class="dash-pagination-bar">
        <span>Showing 1 to 6 of 86 entries</span>
        <ul class="dash-pagination">
          <li class="page-link"><i class="bi bi-chevron-left"></i></li>
          <li class="page-link" style="background:var(--primary);color:#fff;border-color:var(--primary);">1</li>
          <li class="page-link">2</li>
          <li class="page-link">3</li>
          <li class="page-link"><i class="bi bi-chevron-right"></i></li>
        </ul>
      </div>
    </main>
  </div>
</div>

<div class="modal fade dash-modal" id="addAgentModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Add / Approve Agent</h5><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <label class="dash-form-label">Full Name</label>
        <input type="text" class="dash-input mb-3" placeholder="Agent name">
        <label class="dash-form-label">Email</label>
        <input type="text" class="dash-input mb-3" placeholder="agent@email.com">
        <label class="dash-form-label">Agency / Region</label>
        <input type="text" class="dash-input" placeholder="e.g. Beverly Hills Realty">
      </div>
      <div class="modal-footer"><button class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button><button class="dash-btn-primary" data-bs-dismiss="modal">Save</button></div>
    </div>
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
