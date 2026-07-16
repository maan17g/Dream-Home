<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Property Management | Dream Home Admin</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

<link rel="stylesheet" href="../assets/style.css">
<link rel="stylesheet" href="../assets/dashboard.css">
</head>
<body>

<div class="dash-body">

  <!-- ============ SIDEBAR ============ -->
  <aside class="dash-sidebar" id="sidebar">
    <a href="admin-dashboard.html" class="dash-logo">
      <i class="bi bi-house-door-fill"></i>
      <span class="dash-logo-text">Dream Home<span class="dash-logo-sub">Admin Panel</span></span>
    </a>

    <div class="dash-nav-label">Overview</div>
    <ul class="dash-nav">
      <li><a href="admin-dashboard.html" class="dash-nav-link"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a></li>
    </ul>

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

    <div class="dash-sidebar-footer">
      <ul class="dash-nav">
        <li><a href="#" class="dash-nav-link"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a></li>
      </ul>
    </div>
  </aside>

  <!-- ============ MAIN ============ -->
  <div class="dash-main">

    <!-- TOPBAR -->
    <header class="dash-topbar">
      <button class="dash-burger" id="burgerBtn"><i class="bi bi-list"></i></button>
      <div class="dash-search">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Search properties, agents, users...">
      </div>
      <div class="dash-topbar-right">
        <button class="dash-icon-btn" id="themeToggle" title="Toggle theme"><i class="bi bi-moon-stars-fill"></i></button>
        <button class="dash-icon-btn"><i class="bi bi-bell-fill"></i><span class="dash-icon-dot"></span></button>
        <div class="dropdown">
          <button class="dash-profile border-0" data-bs-toggle="dropdown">
            <img src="https://i.pravatar.cc/64?img=12" alt="Admin">
            <span class="dash-profile-info d-none d-sm-block">
              <span class="dash-profile-name d-block">Admin User</span>
              <span class="dash-profile-role">Super Admin</span>
            </span>
            <i class="bi bi-chevron-down text-muted-custom" style="font-size:.7rem;"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end dash-dropdown-menu">
            <a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Profile</a>
            <a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Account Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" style="color:#e5484d"><i class="bi bi-box-arrow-right"></i> Logout</a>
          </div>
        </div>
      </div>
    </header>

    <!-- CONTENT -->
    <main class="dash-content">

      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <span class="current">Properties</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Property Management</h1>
          <p class="dash-page-desc">542 listings across your platform — search, filter, and manage them here.</p>
        </div>
        <div class="dash-head-actions">
          <button class="dash-btn-secondary"><i class="bi bi-download"></i> Export</button>
          <button class="dash-btn-primary" data-bs-toggle="modal" data-bs-target="#addPropertyModal"><i class="bi bi-plus-lg"></i> Add Property</button>
        </div>
      </div>

      <!-- FILTER BAR -->
      <div class="dash-filter-bar">
        <div class="row g-3 align-items-end">
          <div class="col-lg-3 col-6">
            <label class="dash-filter-label">Search</label>
            <div class="dash-input-icon">
              <i class="bi bi-search"></i>
              <input type="text" class="dash-input" placeholder="Search by title or ID...">
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <label class="dash-filter-label">Status</label>
            <select class="dash-select">
              <option>All Status</option>
              <option>Published</option>
              <option>Draft</option>
              <option>Pending</option>
            </select>
          </div>
          <div class="col-lg-2 col-6">
            <label class="dash-filter-label">Purpose</label>
            <select class="dash-select">
              <option>All</option>
              <option>For Sale</option>
              <option>For Rent</option>
            </select>
          </div>
          <div class="col-lg-2 col-6">
            <label class="dash-filter-label">Category</label>
            <select class="dash-select">
              <option>All Types</option>
              <option>Villa</option>
              <option>Apartment</option>
              <option>Townhouse</option>
              <option>Condo</option>
            </select>
          </div>
          <div class="col-lg-3 col-12">
            <label class="dash-filter-label">Location</label>
            <select class="dash-select">
              <option>All Locations</option>
              <option>Miami, FL</option>
              <option>Los Angeles, CA</option>
              <option>Chicago, IL</option>
              <option>Austin, TX</option>
            </select>
          </div>
        </div>
      </div>

      <!-- BULK ACTIONS (shown once rows are selected) -->
      <div class="bulk-actions-bar" id="bulkBar" style="display:none;">
        <span><strong id="selCount">0</strong> selected</span>
        <button class="dash-btn-secondary"><i class="bi bi-star"></i> Mark Featured</button>
        <button class="dash-btn-secondary"><i class="bi bi-eye"></i> Publish</button>
        <button class="dash-btn-danger"><i class="bi bi-trash"></i> Delete</button>
      </div>

      <!-- TABLE -->
      <div class="dash-panel">
        <div class="dash-table-wrap">
          <table class="dash-table">
            <thead>
              <tr>
                <th><input type="checkbox" class="dash-checkbox" id="checkAll"></th>
                <th>Property</th>
                <th>Price</th>
                <th>Purpose</th>
                <th>Category</th>
                <th>Agent</th>
                <th>Status</th>
                <th>Views</th>
                <th>Listed On</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody id="propTableBody">
              <tr>
                <td><input type="checkbox" class="dash-checkbox row-check"></td>
                <td class="d-flex align-items-center gap-2">
                  <img class="dash-row-thumb" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=100&q=60" alt="">
                  <div>
                    <div class="dash-row-title">Modern Villa in Miami <span class="badge-featured ms-1"><i class="bi bi-star-fill"></i>Featured</span></div>
                    <div class="dash-row-sub">Miami, Florida · PROP-001</div>
                  </div>
                </td>
                <td>$850,000</td>
                <td><span class="badge-purpose badge-purpose-sale">For Sale</span></td>
                <td>Villa</td>
                <td>John Doe</td>
                <td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td>
                <td>1,204</td>
                <td>May 20, 2024</td>
                <td>
                  <div class="row-actions">
                    <a href="property-view.html" class="row-action-btn" title="View"><i class="bi bi-eye"></i></a>
                    <a href="edit-property.html" class="row-action-btn" title="Edit"><i class="bi bi-pencil"></i></a>
                    <button class="row-action-btn danger" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="dash-checkbox row-check"></td>
                <td class="d-flex align-items-center gap-2">
                  <img class="dash-row-thumb" src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=100&q=60" alt="">
                  <div><div class="dash-row-title">Luxury Apartment in LA</div><div class="dash-row-sub">Los Angeles, CA · PROP-002</div></div>
                </td>
                <td>$2,500/mo</td>
                <td><span class="badge-purpose badge-purpose-rent">For Rent</span></td>
                <td>Apartment</td>
                <td>Sarah Smith</td>
                <td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td>
                <td>876</td>
                <td>May 19, 2024</td>
                <td>
                  <div class="row-actions">
                    <a href="property-view.html" class="row-action-btn" title="View"><i class="bi bi-eye"></i></a>
                    <a href="edit-property.html" class="row-action-btn" title="Edit"><i class="bi bi-pencil"></i></a>
                    <button class="row-action-btn danger" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="dash-checkbox row-check"></td>
                <td class="d-flex align-items-center gap-2">
                  <img class="dash-row-thumb" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=100&q=60" alt="">
                  <div><div class="dash-row-title">Beach House in Florida</div><div class="dash-row-sub">Miami, Florida · PROP-003</div></div>
                </td>
                <td>$650,000</td>
                <td><span class="badge-purpose badge-purpose-sale">For Sale</span></td>
                <td>Villa</td>
                <td>Michael Brown</td>
                <td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td>
                <td>2,310</td>
                <td>May 18, 2024</td>
                <td>
                  <div class="row-actions">
                    <a href="property-view.html" class="row-action-btn" title="View"><i class="bi bi-eye"></i></a>
                    <a href="edit-property.html" class="row-action-btn" title="Edit"><i class="bi bi-pencil"></i></a>
                    <button class="row-action-btn danger" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="dash-checkbox row-check"></td>
                <td class="d-flex align-items-center gap-2">
                  <div class="dash-row-thumb d-flex align-items-center justify-content-center" style="background:var(--form-input-bg);color:var(--text-muted);"><i class="bi bi-image"></i></div>
                  <div><div class="dash-row-title">Downtown Condo</div><div class="dash-row-sub">Chicago, Illinois · PROP-004</div></div>
                </td>
                <td>$1,200/mo</td>
                <td><span class="badge-purpose badge-purpose-rent">For Rent</span></td>
                <td>Condo</td>
                <td>David Wilson</td>
                <td><span class="status-pill warning"><i class="bi bi-circle-fill"></i>Pending</span></td>
                <td>412</td>
                <td>May 17, 2024</td>
                <td>
                  <div class="row-actions">
                    <a href="property-view.html" class="row-action-btn" title="View"><i class="bi bi-eye"></i></a>
                    <a href="edit-property.html" class="row-action-btn" title="Edit"><i class="bi bi-pencil"></i></a>
                    <button class="row-action-btn danger" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
              <tr>
                <td><input type="checkbox" class="dash-checkbox row-check"></td>
                <td class="d-flex align-items-center gap-2">
                  <div class="dash-row-thumb d-flex align-items-center justify-content-center" style="background:var(--form-input-bg);color:var(--text-muted);"><i class="bi bi-image"></i></div>
                  <div><div class="dash-row-title">Family House in Texas</div><div class="dash-row-sub">Austin, Texas · PROP-005</div></div>
                </td>
                <td>$450,000</td>
                <td><span class="badge-purpose badge-purpose-sale">For Sale</span></td>
                <td>Townhouse</td>
                <td>Emily Johnson</td>
                <td><span class="status-pill danger"><i class="bi bi-circle-fill"></i>Draft</span></td>
                <td>58</td>
                <td>May 16, 2024</td>
                <td>
                  <div class="row-actions">
                    <a href="property-view.html" class="row-action-btn" title="View"><i class="bi bi-eye"></i></a>
                    <a href="edit-property.html" class="row-action-btn" title="Edit"><i class="bi bi-pencil"></i></a>
                    <button class="row-action-btn danger" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="dash-pagination-bar">
          <span>Showing 1 to 5 of 542 entries</span>
          <ul class="dash-pagination">
            <li class="page-link"><i class="bi bi-chevron-left"></i></li>
            <li class="page-link" style="background:var(--primary);color:#fff;border-color:var(--primary);">1</li>
            <li class="page-link">2</li>
            <li class="page-link">3</li>
            <li class="page-link">4</li>
            <li class="page-link"><i class="bi bi-chevron-right"></i></li>
          </ul>
        </div>
      </div>

    </main>
  </div>
</div>

<!-- ADD PROPERTY MODAL -->
<div class="modal fade dash-modal" id="addPropertyModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Property</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="text-muted-custom" style="font-size:.85rem;">This links to the full Add/Edit Property page (the next one I'll build) — with tabs for basic info, pricing, gallery, location, amenities, and SEO.</p>
      </div>
      <div class="modal-footer">
        <button class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="add-edit-property.html" class="dash-btn-primary">Continue</a>
      </div>
    </div>
  </div>
</div>

<!-- DELETE CONFIRMATION MODAL -->
<div class="modal fade dash-modal danger" id="deleteModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-3">
      <div class="modal-body">
        <div class="stat-icon-lg mx-auto mb-3"><i class="bi bi-trash"></i></div>
        <h5 class="mb-2">Delete this property?</h5>
        <p class="text-muted-custom" style="font-size:.85rem;">This action can't be undone. The listing will be permanently removed.</p>
      </div>
      <div class="modal-footer justify-content-center border-0 pt-0">
        <button class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="dash-btn-danger" data-bs-dismiss="modal">Delete Property</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => {
    if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open');
    else sidebar.classList.toggle('collapsed');
  });

  const themeBtn = document.getElementById('themeToggle');
  const root = document.documentElement;
  themeBtn.addEventListener('click', () => {
    const isLight = root.getAttribute('data-theme') === 'light';
    root.setAttribute('data-theme', isLight ? 'dark' : 'light');
    themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>';
  });

  // Select-all + bulk action bar
  const checkAll = document.getElementById('checkAll');
  const rowChecks = document.querySelectorAll('.row-check');
  const bulkBar = document.getElementById('bulkBar');
  const selCount = document.getElementById('selCount');

  function updateBulkBar() {
    const checked = document.querySelectorAll('.row-check:checked').length;
    selCount.textContent = checked;
    bulkBar.style.display = checked > 0 ? 'flex' : 'none';
  }
  checkAll.addEventListener('change', () => {
    rowChecks.forEach(cb => cb.checked = checkAll.checked);
    updateBulkBar();
  });
  rowChecks.forEach(cb => cb.addEventListener('change', updateBulkBar));
</script>
</body>
</html>
