@include('user.layout.header',['title'=>'My Profile | Dream Home'])
    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="user-dashboard.html">Home</a> / <span class="current">Profile</span></div>
      <div class="dash-page-head"><div><h1 class="dash-page-title">My Profile</h1><p class="dash-page-desc">Manage your personal info, security, and preferences.</p></div></div>

      <div class="row g-3">
        <div class="col-lg-3">
          <div class="dash-panel text-center">
            <div class="avatar-upload"><img src="https://i.pravatar.cc/150?img=68" alt=""><div class="avatar-upload-btn"><i class="bi bi-camera-fill"></i></div></div>
            <h6 class="mt-3 mb-0">John Smith</h6>
            <div class="dash-row-sub">Member since Feb 2024</div>
          </div>
        </div>

        <div class="col-lg-9">
          <div class="dash-panel">
            <div class="dash-tabs">
              <button class="dash-tab active" data-tab="personal">Personal</button>
              <button class="dash-tab" data-tab="security">Security</button>
              <button class="dash-tab" data-tab="preferences">Preferences</button>
              <button class="dash-tab" data-tab="searches">Saved Searches</button>
              <button class="dash-tab" data-tab="password">Password</button>
            </div>

            <div class="dash-tab-pane active" id="tab-personal">
              <div class="row g-3">
                <div class="col-md-6"><label class="dash-form-label">Full Name</label><input type="text" class="dash-input" value="John Smith"></div>
                <div class="col-md-6"><label class="dash-form-label">Email</label><input type="text" class="dash-input" value="john.smith@email.com"></div>
                <div class="col-md-6"><label class="dash-form-label">Phone</label><input type="text" class="dash-input" placeholder="+1 (555) 000-0000"></div>
                <div class="col-md-6"><label class="dash-form-label">Location</label><input type="text" class="dash-input" placeholder="City, State"></div>
              </div>
              <button class="dash-btn-primary mt-3" onclick="showToast()"><i class="bi bi-check-lg"></i> Save Changes</button>
            </div>

            <div class="dash-tab-pane" id="tab-security">
              <div class="d-flex align-items-center justify-content-between p-3 mb-2" style="background:var(--form-input-bg);border:1px solid var(--border-color);border-radius:12px;">
                <div><div class="dash-row-title" style="font-size:.85rem;">Two-Factor Authentication</div><div class="dash-row-sub">Add an extra layer of security to your account</div></div>
                <label class="dash-toggle"><input type="checkbox"><span class="dash-toggle-slider"></span></label>
              </div>
              <div class="d-flex align-items-center justify-content-between p-3" style="background:var(--form-input-bg);border:1px solid var(--border-color);border-radius:12px;">
                <div><div class="dash-row-title" style="font-size:.85rem;">Email Alerts on New Login</div><div class="dash-row-sub">Get notified when your account is accessed</div></div>
                <label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label>
              </div>
            </div>

            <div class="dash-tab-pane" id="tab-preferences">
              <div class="row g-3">
                <div class="col-md-6"><label class="dash-form-label">Preferred Property Type</label><select class="dash-select"><option>Any</option><option>Villa</option><option>Apartment</option><option>Townhouse</option></select></div>
                <div class="col-md-6"><label class="dash-form-label">Budget Range</label><select class="dash-select"><option>Any</option><option>Under $500K</option><option>$500K - $1M</option><option>$1M+</option></select></div>
                <div class="col-12 d-flex align-items-center gap-2 mt-2"><label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label><span class="dash-form-label mb-0">Email me new property alerts</span></div>
              </div>
              <button class="dash-btn-primary mt-3" onclick="showToast()"><i class="bi bi-check-lg"></i> Save Preferences</button>
            </div>

            <div class="dash-tab-pane" id="tab-searches">
              <div class="d-flex align-items-center justify-content-between p-3 mb-2" style="background:var(--form-input-bg);border:1px solid var(--border-color);border-radius:12px;">
                <div><div class="dash-row-title" style="font-size:.85rem;">Villas in Miami, $500K–$900K</div><div class="dash-row-sub">3 new matches this week</div></div>
                <div class="row-actions"><button class="row-action-btn"><i class="bi bi-search"></i></button><button class="row-action-btn danger"><i class="bi bi-trash"></i></button></div>
              </div>
              <div class="d-flex align-items-center justify-content-between p-3" style="background:var(--form-input-bg);border:1px solid var(--border-color);border-radius:12px;">
                <div><div class="dash-row-title" style="font-size:.85rem;">Apartments for rent in LA</div><div class="dash-row-sub">No new matches</div></div>
                <div class="row-actions"><button class="row-action-btn"><i class="bi bi-search"></i></button><button class="row-action-btn danger"><i class="bi bi-trash"></i></button></div>
              </div>
            </div>

            <div class="dash-tab-pane" id="tab-password">
              <div class="row g-3">
                <div class="col-md-6"><label class="dash-form-label">Current Password</label><input type="password" class="dash-input" placeholder="••••••••"></div>
                <div class="col-md-6"></div>
                <div class="col-md-6"><label class="dash-form-label">New Password</label><input type="password" class="dash-input" placeholder="••••••••"></div>
                <div class="col-md-6"><label class="dash-form-label">Confirm New Password</label><input type="password" class="dash-input" placeholder="••••••••"></div>
              </div>
              <button class="dash-btn-primary mt-3" onclick="showToast()"><i class="bi bi-check-lg"></i> Update Password</button>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<div class="dash-toast" id="successToast"><i class="bi bi-check-circle-fill"></i><span>Changes saved successfully.</span></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; });
  function showToast(){ const t=document.getElementById('successToast'); t.classList.add('show'); setTimeout(()=>t.classList.remove('show'),3000); }

  const tabs = document.querySelectorAll('.dash-tab');
  const panes = document.querySelectorAll('.dash-tab-pane');
  tabs.forEach(t => t.addEventListener('click', () => {
    tabs.forEach(x => x.classList.remove('active')); t.classList.add('active');
    panes.forEach(p => p.classList.toggle('active', p.id === 'tab-' + t.dataset.tab));
  }));
</script>
</body>
</html>
