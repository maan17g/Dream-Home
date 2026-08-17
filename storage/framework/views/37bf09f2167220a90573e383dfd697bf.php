<?php echo $__env->make('admin.layout.header',['title'=>'Add Property | Dream Home Admin'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <a href="property-management.html">Properties</a> / <span class="current">Add Property</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Add New Property</h1>
          <p class="dash-page-desc">Fill in the details below. You can save as draft and finish later.</p>
        </div>
        <div class="dash-head-actions">
          <button class="dash-btn-secondary"><i class="bi bi-eye"></i> Preview</button>
          <button class="dash-btn-secondary"><i class="bi bi-save"></i> Save Draft</button>
          <button class="dash-btn-primary" onclick="showToast()"><i class="bi bi-check-lg"></i> Publish</button>
        </div>
      </div>

      <div class="row g-3">
        <!-- Step sidebar -->
        <div class="col-lg-3">
          <div class="form-steps-sidebar">
            <div class="form-step-item done"><span class="step-circle"><i class="bi bi-check"></i></span> Basic Information</div>
            <div class="form-step-item done"><span class="step-circle"><i class="bi bi-check"></i></span> Pricing & Details</div>
            <div class="form-step-item"><span class="step-circle">3</span> Media & Gallery</div>
            <div class="form-step-item"><span class="step-circle">4</span> Location</div>
            <div class="form-step-item"><span class="step-circle">5</span> Amenities</div>
            <div class="form-step-item"><span class="step-circle">6</span> SEO & Publish</div>
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
                  <input type="text" class="dash-input" placeholder="e.g. Modern Villa in Miami">
                </div>
                <div class="col-md-4">
                  <label class="dash-form-label">Property ID</label>
                  <input type="text" class="dash-input" placeholder="Auto-generated" disabled>
                </div>
                <div class="col-md-4">
                  <label class="dash-form-label">Type <span class="req">*</span></label>
                  <select class="dash-select"><option>Villa</option><option>Apartment</option><option>Townhouse</option><option>Condo</option><option>Commercial</option></select>
                </div>
                <div class="col-md-4">
                  <label class="dash-form-label">Purpose <span class="req">*</span></label>
                  <select class="dash-select"><option>For Sale</option><option>For Rent</option></select>
                </div>
                <div class="col-md-4">
                  <label class="dash-form-label">Assign Agent <span class="req">*</span></label>
                  <select class="dash-select"><option>John Doe</option><option>Sarah Smith</option><option>Michael Brown</option></select>
                </div>
                <div class="col-12">
                  <label class="dash-form-label">Description</label>
                  <textarea class="dash-input" rows="5" placeholder="Describe the property..."></textarea>
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
                <div class="col-md-4"><label class="dash-form-label">Price <span class="req">*</span></label><input type="text" class="dash-input" placeholder="$ 850,000"></div>
                <div class="col-md-4"><label class="dash-form-label">Price Type</label><select class="dash-select"><option>Fixed</option><option>Negotiable</option><option>Starting From</option></select></div>
                <div class="col-md-4"><label class="dash-form-label">Bedrooms</label><input type="number" class="dash-input" placeholder="5"></div>
                <div class="col-md-4"><label class="dash-form-label">Bathrooms</label><input type="number" class="dash-input" placeholder="4"></div>
                <div class="col-md-4"><label class="dash-form-label">Garages</label><input type="number" class="dash-input" placeholder="2"></div>
                <div class="col-md-4"><label class="dash-form-label">Area (sqft)</label><input type="number" class="dash-input" placeholder="4500"></div>
              </div>
            </div>

            <!-- MEDIA -->
            <div class="dash-tab-pane" id="tab-media">
              <label class="dash-form-label">Featured Image</label>
              <div class="dash-dropzone mb-3">
                <i class="bi bi-cloud-arrow-up"></i>
                <div><strong>Drag & drop an image</strong> or <span class="text-primary-custom">browse files</span></div>
                <div class="dash-form-hint">Recommended size: 1200×800px, JPG or PNG</div>
              </div>
              <label class="dash-form-label">Gallery (multiple images)</label>
              <div class="dash-dropzone mb-3"><i class="bi bi-images"></i><div><strong>Drag & drop images</strong> or <span class="text-primary-custom">browse files</span></div></div>
              <label class="dash-form-label">Video Tour (optional)</label>
              <input type="text" class="dash-input" placeholder="YouTube / Vimeo URL">
            </div>

            <!-- LOCATION -->
            <div class="dash-tab-pane" id="tab-location">
              <div class="row g-3">
                <div class="col-md-6"><label class="dash-form-label">Address <span class="req">*</span></label><input type="text" class="dash-input" placeholder="Street address"></div>
                <div class="col-md-3"><label class="dash-form-label">City</label><input type="text" class="dash-input" placeholder="Miami"></div>
                <div class="col-md-3"><label class="dash-form-label">State</label><input type="text" class="dash-input" placeholder="Florida"></div>
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
                <div class="col-12"><label class="dash-form-label">Meta Title</label><input type="text" class="dash-input" placeholder="Modern Villa in Miami | Dream Home"></div>
                <div class="col-12"><label class="dash-form-label">Meta Description</label><textarea class="dash-input" rows="3" placeholder="Short SEO description..."></textarea></div>
                <div class="col-12"><label class="dash-form-label">URL Slug</label><input type="text" class="dash-input" value="modern-villa-in-miami"></div>
                <div class="col-12">
                  <label class="dash-form-label">Status</label>
                  <select class="dash-select" style="max-width:220px;"><option>Draft</option><option>Published</option><option>Pending Review</option></select>
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

<div class="dash-toast" id="successToast"><i class="bi bi-check-circle-fill"></i><span>Property published successfully.</span></div>

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
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/admin/add-edit-property.blade.php ENDPATH**/ ?>