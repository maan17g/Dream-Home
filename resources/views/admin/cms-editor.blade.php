@include('admin.layout.header',['title'=>'CMS edit | Dream Home Admin'])

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <a href="cms.html">CMS Pages</a> / <span class="current" id="crumbTitle">About Us</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title" id="pageTitleHead">Edit Page: About Us</h1>
          <p class="dash-page-desc">/about-us · Last updated May 20, 2024</p>
        </div>
        <div class="dash-head-actions">
          <button class="dash-btn-secondary"><i class="bi bi-eye"></i> Preview</button>
          <button class="dash-btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i> Delete</button>
          <button class="dash-btn-primary" onclick="showToast()"><i class="bi bi-check-lg"></i> Save & Publish</button>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-lg-8">
          <div class="dash-panel mb-3">
            <label class="dash-form-label">Page Title <span class="req">*</span></label>
            <input type="text" class="dash-input mb-3" value="About Us" id="titleInput">
            <label class="dash-form-label">URL Slug</label>
            <input type="text" class="dash-input" value="about-us">
          </div>

          <div class="dash-panel">
            <div class="dash-panel-head">
              <div><div class="dash-panel-title">Page Content Blocks</div><div class="dash-panel-sub">Drag to reorder, click to edit each block</div></div>
              <button class="dash-btn-secondary" style="padding:.5rem 1rem;font-size:.8rem;"><i class="bi bi-plus-lg"></i> Add Block</button>
            </div>

            <div class="cms-section-item">
              <i class="bi bi-grip-vertical cms-drag-handle"></i>
              <div class="cms-section-icon"><i class="bi bi-image"></i></div>
              <div class="flex-fill">
                <div class="dash-row-title">Page Header</div>
                <div class="dash-row-sub">"We Are More Than Just Real Estate"</div>
              </div>
              <label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label>
              <button class="row-action-btn ms-2"><i class="bi bi-pencil"></i></button>
            </div>
            <div class="cms-section-item">
              <i class="bi bi-grip-vertical cms-drag-handle"></i>
              <div class="cms-section-icon"><i class="bi bi-bullseye"></i></div>
              <div class="flex-fill">
                <div class="dash-row-title">Mission, Vision & Promise</div>
                <div class="dash-row-sub">6 feature cards</div>
              </div>
              <label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label>
              <button class="row-action-btn ms-2"><i class="bi bi-pencil"></i></button>
            </div>
            <div class="cms-section-item">
              <i class="bi bi-grip-vertical cms-drag-handle"></i>
              <div class="cms-section-icon"><i class="bi bi-clock-history"></i></div>
              <div class="flex-fill">
                <div class="dash-row-title">Our Journey (Timeline)</div>
                <div class="dash-row-sub">5 milestones, 2010–2025</div>
              </div>
              <label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label>
              <button class="row-action-btn ms-2"><i class="bi bi-pencil"></i></button>
            </div>
            <div class="cms-section-item">
              <i class="bi bi-grip-vertical cms-drag-handle"></i>
              <div class="cms-section-icon"><i class="bi bi-people"></i></div>
              <div class="flex-fill">
                <div class="dash-row-title">Meet Our Expert Team</div>
                <div class="dash-row-sub">4 team member cards</div>
              </div>
              <label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label>
              <button class="row-action-btn ms-2"><i class="bi bi-pencil"></i></button>
            </div>
            <div class="cms-section-item">
              <i class="bi bi-grip-vertical cms-drag-handle"></i>
              <div class="cms-section-icon"><i class="bi bi-chat-quote"></i></div>
              <div class="flex-fill">
                <div class="dash-row-title">Client Testimonials</div>
                <div class="dash-row-sub">3 testimonial cards</div>
              </div>
              <label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label>
              <button class="row-action-btn ms-2"><i class="bi bi-pencil"></i></button>
            </div>
            <div class="cms-section-item">
              <i class="bi bi-grip-vertical cms-drag-handle"></i>
              <div class="cms-section-icon"><i class="bi bi-megaphone"></i></div>
              <div class="flex-fill">
                <div class="dash-row-title">CTA — "Let's Find Your Dream Home"</div>
                <div class="dash-row-sub">Call-to-action banner</div>
              </div>
              <label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label>
              <button class="row-action-btn ms-2"><i class="bi bi-pencil"></i></button>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="dash-panel mb-3">
            <div class="dash-panel-head"><div class="dash-panel-title">Publish Settings</div></div>
            <label class="dash-form-label">Status</label>
            <select class="dash-select mb-3"><option>Draft</option><option selected>Published</option></select>
            <label class="dash-form-label">Visible In Navigation</label>
            <div class="d-flex align-items-center gap-2 mt-1"><label class="dash-toggle"><input type="checkbox" checked><span class="dash-toggle-slider"></span></label><span class="dash-form-hint mb-0">Show in main menu</span></div>
          </div>

          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">SEO</div></div>
            <label class="dash-form-label">Meta Title</label>
            <input type="text" class="dash-input mb-3" value="About Us | Dream Home Real Estate">
            <label class="dash-form-label">Meta Description</label>
            <textarea class="dash-input" rows="3">Learn about Dream Home's mission, our journey since 2010, and the team helping thousands find their perfect property.</textarea>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<div class="dash-toast" id="successToast"><i class="bi bi-check-circle-fill"></i><span>Page saved and published.</span></div>

<div class="modal fade dash-modal danger" id="deleteModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-3">
      <div class="modal-body">
        <div class="stat-icon-lg mx-auto mb-3"><i class="bi bi-trash"></i></div>
        <h5 class="mb-2">Delete this page?</h5>
        <p class="text-muted-custom" style="font-size:.85rem;">This action can't be undone. The page will be removed from your site.</p>
      </div>
      <div class="modal-footer justify-content-center border-0 pt-0"><button class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button><a href="cms.html" class="dash-btn-danger">Delete Page</a></div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; });
  function showToast(){ const t=document.getElementById('successToast'); t.classList.add('show'); setTimeout(()=>t.classList.remove('show'),3000); }
  document.getElementById('titleInput').addEventListener('input', function(){
    document.getElementById('pageTitleHead').textContent = 'Edit Page: ' + this.value;
    document.getElementById('crumbTitle').textContent = this.value;
  });
</script>
</body>
</html>
