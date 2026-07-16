@include('agent.layout.header',['title'=>'My Profile | Dream Home Agent'])

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="agent-dashboard.html">Agent</a> / <span class="current">Profile</span></div>
      <div class="dash-page-head"><div><h1 class="dash-page-title">My Profile</h1><p class="dash-page-desc">Manage your personal info, agency details, and account security.</p></div></div>

      <div class="row g-3">
        <div class="col-lg-3">
          <div class="dash-panel text-center">
            <div class="avatar-upload"><img src="https://i.pravatar.cc/150?img=11" alt=""><div class="avatar-upload-btn"><i class="bi bi-camera-fill"></i></div></div>
            <h6 class="mt-3 mb-0">John Doe</h6>
            <div class="dash-row-sub mb-2">Premium Agent</div>
            <span class="verified-badge" style="position:static;display:inline-flex;"><i class="bi bi-patch-check-fill"></i>Verified</span>
            <div class="text-start mt-4">
              <div class="d-flex justify-content-between dash-row-sub mb-1"><span>Profile Completeness</span><span>85%</span></div>
              <div class="dash-progress"><div class="dash-progress-fill" style="width:85%;"></div></div>
            </div>
          </div>
        </div>

        <div class="col-lg-9">
          <div class="dash-panel">
            <div class="dash-tabs">
              <button class="dash-tab active" data-tab="personal">Personal</button>
              <button class="dash-tab" data-tab="agency">Agency</button>
              <button class="dash-tab" data-tab="verification">Verification</button>
              <button class="dash-tab" data-tab="documents">Documents</button>
              <button class="dash-tab" data-tab="password">Password</button>
            </div>

            <div class="dash-tab-pane active" id="tab-personal">
              <div class="row g-3">
                <div class="col-md-6"><label class="dash-form-label">Full Name</label><input type="text" class="dash-input" value="John Doe"></div>
                <div class="col-md-6"><label class="dash-form-label">Email</label><input type="text" class="dash-input" value="john.doe@dreamhome.com"></div>
                <div class="col-md-6"><label class="dash-form-label">Phone</label><input type="text" class="dash-input" value="+1 (555) 123-4567"></div>
                <div class="col-md-6"><label class="dash-form-label">Location</label><input type="text" class="dash-input" value="Miami, FL"></div>
                <div class="col-12"><label class="dash-form-label">Bio</label><textarea class="dash-input" rows="4">15+ years helping families find their dream homes across South Florida.</textarea></div>
              </div>
              <button class="dash-btn-primary mt-3" onclick="showToast()"><i class="bi bi-check-lg"></i> Save Changes</button>
            </div>

            <div class="dash-tab-pane" id="tab-agency">
              <div class="row g-3">
                <div class="col-md-6"><label class="dash-form-label">Agency Name</label><input type="text" class="dash-input" value="Beverly Hills Realty"></div>
                <div class="col-md-6"><label class="dash-form-label">License Number</label><input type="text" class="dash-input" value="RE-2019-88213"></div>
                <div class="col-md-6"><label class="dash-form-label">Years of Experience</label><input type="text" class="dash-input" value="15"></div>
                <div class="col-md-6"><label class="dash-form-label">Specialization</label><select class="dash-select"><option>Luxury Homes</option><option>Residential</option><option>Commercial</option></select></div>
              </div>
              <button class="dash-btn-primary mt-3" onclick="showToast()"><i class="bi bi-check-lg"></i> Save Changes</button>
            </div>

            <div class="dash-tab-pane" id="tab-verification">
              <div class="dash-empty" style="padding:1.5rem;">
                <i class="bi bi-patch-check"></i>
                <h6>You're verified ✓</h6>
                <p>Your license and identity were verified on Feb 12, 2024. Verified agents get 3× more visibility.</p>
              </div>
            </div>

            <div class="dash-tab-pane" id="tab-documents">
              <div class="doc-item"><div class="doc-icon"><i class="bi bi-file-earmark-pdf"></i></div><div class="flex-fill"><div class="dash-row-title" style="font-size:.85rem;">Real Estate License.pdf</div><div class="dash-row-sub">Uploaded Feb 12, 2024</div></div><span class="status-pill success"><i class="bi bi-circle-fill"></i>Verified</span></div>
              <div class="doc-item"><div class="doc-icon"><i class="bi bi-file-earmark-image"></i></div><div class="flex-fill"><div class="dash-row-title" style="font-size:.85rem;">Government ID.jpg</div><div class="dash-row-sub">Uploaded Feb 12, 2024</div></div><span class="status-pill success"><i class="bi bi-circle-fill"></i>Verified</span></div>
              <div class="dash-dropzone mt-3"><i class="bi bi-cloud-arrow-up"></i><div><strong>Upload a new document</strong></div></div>
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
    tabs.forEach(x => x.classList.remove('active'));
    t.classList.add('active');
    panes.forEach(p => p.classList.toggle('active', p.id === 'tab-' + t.dataset.tab));
  }));
</script>
</body>
</html>
