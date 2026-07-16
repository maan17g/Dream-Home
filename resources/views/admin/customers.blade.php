<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customers | Dream Home Admin</title>
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
      <li><a href="customers.html" class="dash-nav-link active"><i class="bi bi-people-fill"></i><span>Users</span></a></li>
      <li><a href="agents.html" class="dash-nav-link"><i class="bi bi-person-badge-fill"></i><span>Agents</span></a></li>
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
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <span class="current">Customers</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Customers</h1>
          <p class="dash-page-desc">1,248 registered users — track activity, saved properties, and inquiries.</p>
        </div>
        <div class="dash-head-actions"><button class="dash-btn-primary"><i class="bi bi-plus-lg"></i> Add User</button></div>
      </div>

      <div class="dash-filter-bar">
        <div class="row g-3 align-items-end">
          <div class="col-lg-5 col-6"><label class="dash-filter-label">Search</label><div class="dash-input-icon"><i class="bi bi-search"></i><input type="text" class="dash-input" placeholder="Search by name or email..."></div></div>
          <div class="col-lg-3 col-6"><label class="dash-filter-label">Status</label><select class="dash-select"><option>All</option><option>Active</option><option>Inactive</option></select></div>
          <div class="col-lg-4 col-12"><label class="dash-filter-label">Sort By</label><select class="dash-select"><option>Newest</option><option>Most Active</option><option>Most Saved Properties</option></select></div>
        </div>
      </div>

      <div class="dash-panel">
        <div class="dash-table-wrap">
          <table class="dash-table">
            <thead><tr><th>Customer</th><th>Saved</th><th>Appointments</th><th>Inquiries</th><th>Status</th><th>Joined</th><th>Actions</th></tr></thead>
            <tbody>
              <tr>
                <td class="d-flex align-items-center gap-2">
                  <img class="dash-row-thumb" style="border-radius:50%;" src="https://i.pravatar.cc/100?img=47" alt="">
                  <div><div class="dash-row-title">John Smith</div><div class="dash-row-sub">john.smith@email.com</div></div>
                </td>
                <td>12</td>
                <td>3</td>
                <td>8</td>
                <td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Active</span></td>
                <td>Feb 12, 2024</td>
                <td>
                  <div class="row-actions">
                    <a href="customer-view.html" class="row-action-btn" title="View"><i class="bi bi-eye"></i></a>
                    <button class="row-action-btn" title="Message"><i class="bi bi-envelope"></i></button>
                    <button class="row-action-btn danger" title="Suspend"><i class="bi bi-slash-circle"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="d-flex align-items-center gap-2">
                  <img class="dash-row-thumb" style="border-radius:50%;" src="https://i.pravatar.cc/100?img=32" alt="">
                  <div><div class="dash-row-title">Amanda Lee</div><div class="dash-row-sub">amanda.lee@email.com</div></div>
                </td>
                <td>7</td>
                <td>1</td>
                <td>4</td>
                <td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Active</span></td>
                <td>Jan 28, 2024</td>
                <td>
                  <div class="row-actions">
                    <a href="customer-view.html" class="row-action-btn" title="View"><i class="bi bi-eye"></i></a>
                    <button class="row-action-btn" title="Message"><i class="bi bi-envelope"></i></button>
                    <button class="row-action-btn danger" title="Suspend"><i class="bi bi-slash-circle"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="d-flex align-items-center gap-2">
                  <img class="dash-row-thumb" style="border-radius:50%;" src="https://i.pravatar.cc/100?img=15" alt="">
                  <div><div class="dash-row-title">Carlos Diaz</div><div class="dash-row-sub">carlos.diaz@email.com</div></div>
                </td>
                <td>3</td>
                <td>0</td>
                <td>1</td>
                <td><span class="status-pill danger"><i class="bi bi-circle-fill"></i>Inactive</span></td>
                <td>Dec 03, 2023</td>
                <td>
                  <div class="row-actions">
                    <a href="customer-view.html" class="row-action-btn" title="View"><i class="bi bi-eye"></i></a>
                    <button class="row-action-btn" title="Message"><i class="bi bi-envelope"></i></button>
                    <button class="row-action-btn danger" title="Suspend"><i class="bi bi-slash-circle"></i></button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="dash-pagination-bar">
          <span>Showing 1 to 3 of 1,248 entries</span>
          <ul class="dash-pagination">
            <li class="page-link"><i class="bi bi-chevron-left"></i></li>
            <li class="page-link" style="background:var(--primary);color:#fff;border-color:var(--primary);">1</li>
            <li class="page-link">2</li>
            <li class="page-link">3</li>
            <li class="page-link"><i class="bi bi-chevron-right"></i></li>
          </ul>
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
