<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CMS Pages | Dream Home Admin</title>
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
      <li><a href="cms.html" class="dash-nav-link active"><i class="bi bi-layout-text-window-reverse"></i><span>CMS Pages</span></a></li>
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
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <span class="current">CMS Pages</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">CMS Pages</h1>
          <p class="dash-page-desc">Manage your homepage sections and static pages without touching code.</p>
        </div>
        <div class="dash-head-actions"><button class="dash-btn-primary" data-bs-toggle="modal" data-bs-target="#addPageModal"><i class="bi bi-plus-lg"></i> Add Page</button></div>
      </div>

      <div class="row g-3">
        <div class="col-lg-6">
          <div class="dash-panel">
            <div class="dash-panel-head">
              <div><div class="dash-panel-title">Homepage Sections</div><div class="dash-panel-sub">Drag to reorder how they appear on your homepage</div></div>
            </div>
            <div class="cms-section-item"><i class="bi bi-grip-vertical cms-drag-handle"></i><div class="cms-section-icon"><i class="bi bi-image"></i></div><div class="flex-fill"><div class="dash-row-title">Hero Section</div><div class="dash-row-sub">Headline, search bar, background</div></div><label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label><a href="cms-editor.html" class="row-action-btn ms-2"><i class="bi bi-pencil"></i></a></div>
            <div class="cms-section-item"><i class="bi bi-grip-vertical cms-drag-handle"></i><div class="cms-section-icon"><i class="bi bi-info-circle"></i></div><div class="flex-fill"><div class="dash-row-title">About / Why Us</div><div class="dash-row-sub">Mission, features, stats</div></div><label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label><a href="cms-editor.html" class="row-action-btn ms-2"><i class="bi bi-pencil"></i></a></div>
            <div class="cms-section-item"><i class="bi bi-grip-vertical cms-drag-handle"></i><div class="cms-section-icon"><i class="bi bi-buildings"></i></div><div class="flex-fill"><div class="dash-row-title">Featured Listings</div><div class="dash-row-sub">Auto-pulled from Properties</div></div><label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label><a href="cms-editor.html" class="row-action-btn ms-2"><i class="bi bi-pencil"></i></a></div>
            <div class="cms-section-item"><i class="bi bi-grip-vertical cms-drag-handle"></i><div class="cms-section-icon"><i class="bi bi-chat-quote"></i></div><div class="flex-fill"><div class="dash-row-title">Testimonials</div><div class="dash-row-sub">Client quotes and ratings</div></div><label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label><a href="cms-editor.html" class="row-action-btn ms-2"><i class="bi bi-pencil"></i></a></div>
            <div class="cms-section-item"><i class="bi bi-grip-vertical cms-drag-handle"></i><div class="cms-section-icon"><i class="bi bi-question-circle"></i></div><div class="flex-fill"><div class="dash-row-title">FAQ</div><div class="dash-row-sub">Common questions</div></div><label class="dash-toggle"><input type="checkbox"><span class="dash-toggle-slider"></span></label><a href="cms-editor.html" class="row-action-btn ms-2"><i class="bi bi-pencil"></i></a></div>
            <div class="cms-section-item"><i class="bi bi-grip-vertical cms-drag-handle"></i><div class="cms-section-icon"><i class="bi bi-layout-three-columns"></i></div><div class="flex-fill"><div class="dash-row-title">Footer</div><div class="dash-row-sub">Links, contact, newsletter</div></div><label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label><a href="cms-editor.html" class="row-action-btn ms-2"><i class="bi bi-pencil"></i></a></div>
          </div>
        </div>

        <div class="col-lg-6">
          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Static Pages</div><a href="#" class="dash-link">View All</a></div>
            <div class="dash-table-wrap">
              <table class="dash-table">
                <thead><tr><th>Title</th><th>Status</th><th>Updated</th><th>Actions</th></tr></thead>
                <tbody>
                  <tr><td class="dash-row-title">About Us</td><td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td><td>May 20, 2024</td><td><div class="row-actions"><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger"><i class="bi bi-trash"></i></button></div></td></tr>
                  <tr><td class="dash-row-title">Our Services</td><td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td><td>May 19, 2024</td><td><div class="row-actions"><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger"><i class="bi bi-trash"></i></button></div></td></tr>
                  <tr><td class="dash-row-title">How It Works</td><td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td><td>May 18, 2024</td><td><div class="row-actions"><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger"><i class="bi bi-trash"></i></button></div></td></tr>
                  <tr><td class="dash-row-title">FAQs</td><td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td><td>May 18, 2024</td><td><div class="row-actions"><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger"><i class="bi bi-trash"></i></button></div></td></tr>
                  <tr><td class="dash-row-title">Terms & Conditions</td><td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td><td>May 17, 2024</td><td><div class="row-actions"><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger"><i class="bi bi-trash"></i></button></div></td></tr>
                  <tr><td class="dash-row-title">Contact Us</td><td><span class="status-pill danger"><i class="bi bi-circle-fill"></i>Draft</span></td><td>May 16, 2024</td><td><div class="row-actions"><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="cms-editor.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger"><i class="bi bi-trash"></i></button></div></td></tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<div class="modal fade dash-modal" id="addPageModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Add New Page</h5><button class="btn-close" data-bs-dismiss="modal"></button></div>
      <div class="modal-body">
        <label class="dash-form-label">Page Title</label>
        <input type="text" class="dash-input mb-3" placeholder="e.g. Careers">
        <label class="dash-form-label">URL Slug</label>
        <input type="text" class="dash-input" placeholder="careers">
      </div>
      <div class="modal-footer"><button class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button><a href="cms-editor.html" class="dash-btn-primary">Create Page</a></div>
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
