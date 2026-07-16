<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Property | Dream Home Admin</title>
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
      <li><a href="property-management.html" class="dash-nav-link active"><i class="bi bi-buildings-fill"></i><span>Properties</span></a></li>
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
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <a href="property-management.html">Properties</a> / <span class="current">Modern Villa in Miami</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Modern Villa in Miami <span class="badge-featured ms-2"><i class="bi bi-star-fill"></i>Featured</span></h1>
          <p class="dash-page-desc"><i class="bi bi-geo-alt"></i> 4210 Ocean Drive, Miami, Florida · PROP-001</p>
        </div>
        <div class="dash-head-actions">
          <a href="edit-property.html" class="dash-btn-secondary"><i class="bi bi-pencil"></i> Edit</a>
          <button class="dash-btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i> Delete</button>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-lg-8">
          <div class="prop-view-main-img"><img id="mainImg" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1000&q=70" alt=""></div>
          <div class="prop-view-thumbs mb-4">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=200&q=60" class="active" onclick="setMain(this)">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=200&q=60" onclick="setMain(this)">
            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=200&q=60" onclick="setMain(this)">
          </div>

          <div class="dash-panel mb-3">
            <div class="dash-panel-head"><div class="dash-panel-title">Overview</div></div>
            <div class="row g-2 mb-3">
              <div class="col-3"><div class="prop-view-spec"><i class="bi bi-door-closed"></i><strong>5</strong><span>Bedrooms</span></div></div>
              <div class="col-3"><div class="prop-view-spec"><i class="bi bi-droplet"></i><strong>4</strong><span>Bathrooms</span></div></div>
              <div class="col-3"><div class="prop-view-spec"><i class="bi bi-p-square"></i><strong>2</strong><span>Garages</span></div></div>
              <div class="col-3"><div class="prop-view-spec"><i class="bi bi-arrows-fullscreen"></i><strong>4,500</strong><span>Sqft</span></div></div>
            </div>
            <p class="dash-row-sub" style="font-size:.85rem;line-height:1.8;">Stunning modern villa featuring 5 bedrooms, 4 bathrooms, an open-concept living area, and a private pool. Located minutes from Miami's best beaches and restaurants.</p>
          </div>

          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Amenities</div></div>
            <div class="chip-select">
              <span class="badge-purpose" style="background:var(--form-input-bg);color:var(--text-main);border:1px solid var(--border-color);"><i class="bi bi-check-circle-fill text-primary-custom"></i> Swimming Pool</span>
              <span class="badge-purpose" style="background:var(--form-input-bg);color:var(--text-main);border:1px solid var(--border-color);"><i class="bi bi-check-circle-fill text-primary-custom"></i> Gym</span>
              <span class="badge-purpose" style="background:var(--form-input-bg);color:var(--text-main);border:1px solid var(--border-color);"><i class="bi bi-check-circle-fill text-primary-custom"></i> Parking</span>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="dash-panel mb-3 text-center">
            <div class="stat-value" style="font-size:2rem;">$850,000</div>
            <div class="dash-row-sub mb-3">Fixed Price</div>
            <span class="status-pill success" style="width:100%;justify-content:center;padding:.5rem;"><i class="bi bi-circle-fill"></i>Published</span>
          </div>

          <div class="dash-panel mb-3">
            <div class="dash-panel-head"><div class="dash-panel-title">Listing Agent</div></div>
            <div class="customer-card">
              <img src="https://i.pravatar.cc/100?img=11" alt="">
              <div><div class="dash-row-title" style="font-size:.85rem;">John Doe</div><div class="dash-row-sub">Premium Agent · Miami, FL</div></div>
            </div>
          </div>

          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Performance</div></div>
            <div class="d-flex justify-content-between mb-2"><span class="dash-row-sub">Views</span><strong>1,204</strong></div>
            <div class="d-flex justify-content-between mb-2"><span class="dash-row-sub">Saved</span><strong>46</strong></div>
            <div class="d-flex justify-content-between mb-2"><span class="dash-row-sub">Inquiries</span><strong>9</strong></div>
            <div class="d-flex justify-content-between"><span class="dash-row-sub">Listed On</span><strong>May 20, 2024</strong></div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<div class="modal fade dash-modal danger" id="deleteModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-3">
      <div class="modal-body">
        <div class="stat-icon-lg mx-auto mb-3"><i class="bi bi-trash"></i></div>
        <h5 class="mb-2">Delete "Modern Villa in Miami"?</h5>
        <p class="text-muted-custom" style="font-size:.85rem;">This action can't be undone.</p>
      </div>
      <div class="modal-footer justify-content-center border-0 pt-0"><button class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button><a href="property-management.html" class="dash-btn-danger">Delete</a></div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; });
  function setMain(el) {
    document.getElementById('mainImg').src = el.src.replace('w=200','w=1000');
    document.querySelectorAll('.prop-view-thumbs img').forEach(i => i.classList.remove('active'));
    el.classList.add('active');
  }
</script>
</body>
</html>
