<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Property | Dream Home Admin</title>
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
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <a href="property-management.html">Properties</a> / <span class="current">Edit Property</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Edit Property <span class="badge-purpose badge-purpose-sale ms-2">PROP-001</span></h1>
          <p class="dash-page-desc">Editing "Modern Villa in Miami". Changes go live immediately after saving.</p>
        </div>
        <div class="dash-head-actions">
          <button class="dash-btn-secondary"><i class="bi bi-eye"></i> Preview</button>
          <button class="dash-btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i> Delete</button>
          <button class="dash-btn-primary" onclick="showToast()"><i class="bi bi-check-lg"></i> Update Property</button>
        </div>
      </div>

      <div class="row g-3">
        <!-- Step sidebar -->
        <div class="col-lg-3">
          <div class="form-steps-sidebar">
            <div class="form-step-item done"><span class="step-circle"><i class="bi bi-check"></i></span> Basic Information</div>
            <div class="form-step-item done"><span class="step-circle"><i class="bi bi-check"></i></span> Pricing & Details</div>
            <div class="form-step-item done"><span class="step-circle"><i class="bi bi-check"></i></span> Media & Gallery</div>
            <div class="form-step-item done"><span class="step-circle"><i class="bi bi-check"></i></span> Location</div>
            <div class="form-step-item done"><span class="step-circle"><i class="bi bi-check"></i></span> Amenities</div>
            <div class="form-step-item done"><span class="step-circle"><i class="bi bi-check"></i></span> SEO & Publish</div>
          </div>
        </div>

        <!-- Form -->
        <div class="col-lg-9">
          <div class="dash-panel">
            <div class="dash-tabs">
              <button class="dash-tab active" data-tab="basic">Basic Info</button>
              <button class="dash-tab" data-tab="pricing">Pricing</button>
              <button class="dash-tab" data-tab="media">Media</button>
              <button class="dash-tab" data-tab="location">Location</button>
              <button class="dash-tab" data-tab="features">Features</button>
              <button class="dash-tab" data-tab="seo">SEO</button>
            </div>

            <!-- BASIC INFO -->
            <div class="dash-tab-pane active" id="tab-basic">
              <div class="row g-3">
                <div class="col-md-8">
                  <label class="dash-form-label">Property Title <span class="req">*</span></label>
                  <input type="text" class="dash-input" value="Modern Villa in Miami">
                </div>
                <div class="col-md-4">
                  <label class="dash-form-label">Property ID</label>
                  <input type="text" class="dash-input" value="PROP-001" disabled>
                </div>
                <div class="col-md-4">
                  <label class="dash-form-label">Type <span class="req">*</span></label>
                  <select class="dash-select"><option selected>Villa</option><option>Apartment</option><option>Townhouse</option><option>Condo</option><option>Commercial</option></select>
                </div>
                <div class="col-md-4">
                  <label class="dash-form-label">Purpose <span class="req">*</span></label>
                  <select class="dash-select"><option selected>For Sale</option><option>For Rent</option></select>
                </div>
                <div class="col-md-4">
                  <label class="dash-form-label">Assign Agent <span class="req">*</span></label>
                  <select class="dash-select"><option selected>John Doe</option><option>Sarah Smith</option><option>Michael Brown</option></select>
                </div>
                <div class="col-12">
                  <label class="dash-form-label">Description</label>
                  <textarea class="dash-input" rows="5">Stunning modern villa featuring 5 bedrooms, 4 bathrooms, an open-concept living area, and a private pool. Located minutes from Miami's best beaches and restaurants.</textarea>
                  <div class="dash-form-hint">Minimum 100 characters recommended for better search visibility.</div>
                </div>
                <div class="col-md-4 d-flex align-items-center gap-2 mt-2">
                  <label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label>
                  <span class="dash-form-label mb-0">Featured Listing</span>
                </div>
              </div>
            </div>

            <!-- PRICING -->
            <div class="dash-tab-pane" id="tab-pricing">
              <div class="row g-3">
                <div class="col-md-4"><label class="dash-form-label">Price <span class="req">*</span></label><input type="text" class="dash-input" value="$ 850,000"></div>
                <div class="col-md-4"><label class="dash-form-label">Price Type</label><select class="dash-select"><option>Fixed</option><option>Negotiable</option><option>Starting From</option></select></div>
                <div class="col-md-4"><label class="dash-form-label">Bedrooms</label><input type="number" class="dash-input" value="5"></div>
                <div class="col-md-4"><label class="dash-form-label">Bathrooms</label><input type="number" class="dash-input" value="4"></div>
                <div class="col-md-4"><label class="dash-form-label">Garages</label><input type="number" class="dash-input" value="2"></div>
                <div class="col-md-4"><label class="dash-form-label">Area (sqft)</label><input type="number" class="dash-input" value="4500"></div>
              </div>
            </div>

            <!-- MEDIA -->
            <div class="dash-tab-pane" id="tab-media">
              <label class="dash-form-label">Featured Image</label>
              <div class="d-flex gap-3 align-items-center mb-3">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=200&q=60" style="width:120px;height:90px;border-radius:12px;object-fit:cover;">
                <button class="dash-btn-secondary"><i class="bi bi-arrow-repeat"></i> Replace Image</button>
              </div>
              <label class="dash-form-label">Gallery (5 images)</label>
              <div class="d-flex gap-2 mb-3 flex-wrap">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=150&q=60" style="width:90px;height:70px;border-radius:10px;object-fit:cover;">
                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=150&q=60" style="width:90px;height:70px;border-radius:10px;object-fit:cover;">
                <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=150&q=60" style="width:90px;height:70px;border-radius:10px;object-fit:cover;">
                <div class="dash-dropzone" style="width:90px;height:70px;padding:0;display:flex;align-items:center;justify-content:center;"><i class="bi bi-plus-lg" style="margin:0;font-size:1.2rem;"></i></div>
              </div>
              <label class="dash-form-label">Video Tour (optional)</label>
              <input type="text" class="dash-input" placeholder="YouTube / Vimeo URL">
            </div>

            <!-- LOCATION -->
            <div class="dash-tab-pane" id="tab-location">
              <div class="row g-3">
                <div class="col-md-6"><label class="dash-form-label">Address <span class="req">*</span></label><input type="text" class="dash-input" value="4210 Ocean Drive"></div>
                <div class="col-md-3"><label class="dash-form-label">City</label><input type="text" class="dash-input" value="Miami"></div>
                <div class="col-md-3"><label class="dash-form-label">State</label><input type="text" class="dash-input" value="Florida"></div>
                <div class="col-12">
                  <label class="dash-form-label">Pin on Map</label>
                  <div style="height:220px;border-radius:14px;border:1px solid var(--border-color);background:var(--form-input-bg);display:flex;align-items:center;justify-content:center;color:var(--text-muted);font-size:.85rem;">
                    <i class="bi bi-geo-alt me-2"></i> Interactive map picker
                  </div>
                </div>
                <div class="col-12">
                  <label class="dash-form-label">Nearby Places</label>
                  <div class="chip-select">
                    <input type="checkbox" id="np1" checked><label for="np1">School</label>
                    <input type="checkbox" id="np2"><label for="np2">Hospital</label>
                    <input type="checkbox" id="np3" checked><label for="np3">Metro Station</label>
                    <input type="checkbox" id="np4"><label for="np4">Shopping Mall</label>
                    <input type="checkbox" id="np5"><label for="np5">Park</label>
                  </div>
                </div>
              </div>
            </div>

            <!-- FEATURES -->
            <div class="dash-tab-pane" id="tab-features">
              <label class="dash-form-label">Amenities</label>
              <div class="chip-select">
                <input type="checkbox" id="am1" checked><label for="am1">Swimming Pool</label>
                <input type="checkbox" id="am2" checked><label for="am2">Gym</label>
                <input type="checkbox" id="am3"><label for="am3">Garden</label>
                <input type="checkbox" id="am4"><label for="am4">Security</label>
                <input type="checkbox" id="am5" checked><label for="am5">Parking</label>
                <input type="checkbox" id="am6"><label for="am6">Elevator</label>
                <input type="checkbox" id="am7"><label for="am7">Balcony</label>
                <input type="checkbox" id="am8"><label for="am8">Pet Friendly</label>
              </div>
            </div>

            <!-- SEO -->
            <div class="dash-tab-pane" id="tab-seo">
              <div class="row g-3">
                <div class="col-12"><label class="dash-form-label">Meta Title</label><input type="text" class="dash-input" value="Modern Villa in Miami | Dream Home"></div>
                <div class="col-12"><label class="dash-form-label">Meta Description</label><textarea class="dash-input" rows="3">Stunning 5-bed modern villa in Miami with private pool, minutes from the beach.</textarea></div>
                <div class="col-12"><label class="dash-form-label">URL Slug</label><input type="text" class="dash-input" value="modern-villa-in-miami"></div>
                <div class="col-12">
                  <label class="dash-form-label">Status</label>
                  <select class="dash-select" style="max-width:220px;"><option>Draft</option><option selected>Published</option><option>Pending Review</option></select>
                </div>
              </div>
            </div>

            <div class="d-flex justify-content-between mt-4 pt-3" style="border-top:1px solid var(--border-color);">
              <button class="dash-btn-secondary" id="prevTabBtn"><i class="bi bi-arrow-left"></i> Previous</button>
              <button class="dash-btn-primary" id="nextTabBtn">Next <i class="bi bi-arrow-right"></i></button>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<div class="dash-toast" id="successToast"><i class="bi bi-check-circle-fill"></i><span>Property updated successfully.</span></div>

<div class="modal fade dash-modal danger" id="deleteModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-3">
      <div class="modal-body">
        <div class="stat-icon-lg mx-auto mb-3"><i class="bi bi-trash"></i></div>
        <h5 class="mb-2">Delete "Modern Villa in Miami"?</h5>
        <p class="text-muted-custom" style="font-size:.85rem;">This action can't be undone. The listing will be permanently removed.</p>
      </div>
      <div class="modal-footer justify-content-center border-0 pt-0">
        <button class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="property-management.html" class="dash-btn-danger">Delete Property</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => {
    if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed');
  });
  const themeBtn = document.getElementById('themeToggle');
  const root = document.documentElement;
  themeBtn.addEventListener('click', () => {
    const isLight = root.getAttribute('data-theme') === 'light';
    root.setAttribute('data-theme', isLight ? 'dark' : 'light');
    themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>';
  });
  function showToast(){ const t=document.getElementById('successToast'); t.classList.add('show'); setTimeout(()=>t.classList.remove('show'),3000); }

  // Tabs
  const tabs = document.querySelectorAll('.dash-tab');
  const panes = document.querySelectorAll('.dash-tab-pane');
  function activateTab(name) {
    tabs.forEach(t => t.classList.toggle('active', t.dataset.tab === name));
    panes.forEach(p => p.classList.toggle('active', p.id === 'tab-' + name));
  }
  tabs.forEach(t => t.addEventListener('click', () => activateTab(t.dataset.tab)));

  const order = ['basic','pricing','media','location','features','seo'];
  document.getElementById('nextTabBtn').addEventListener('click', () => {
    const current = document.querySelector('.dash-tab.active').dataset.tab;
    const idx = order.indexOf(current);
    if (idx < order.length - 1) activateTab(order[idx+1]);
  });
  document.getElementById('prevTabBtn').addEventListener('click', () => {
    const current = document.querySelector('.dash-tab.active').dataset.tab;
    const idx = order.indexOf(current);
    if (idx > 0) activateTab(order[idx-1]);
  });
</script>
</body>
</html>
