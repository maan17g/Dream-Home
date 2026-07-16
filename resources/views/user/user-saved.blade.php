@include('user.layout.header',['title'=>'Saved Properties | Dream Home'])

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="user-dashboard.html">Home</a> / <span class="current">Saved Properties</span></div>
      <div class="dash-page-head">
        <div><h1 class="dash-page-title">Saved Properties</h1><p class="dash-page-desc">12 properties you've bookmarked.</p></div>
        <div class="dash-head-actions">
          <span id="compareBar" class="dash-btn-secondary" style="display:none;"><i class="bi bi-columns-gap"></i> Compare (<span id="compareCount">0</span>)</span>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-md-6 col-lg-4">
          <div class="agent-prop-card">
            <div class="agent-prop-thumb">
              <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=400&q=60" alt="">
              <span class="badge-custom position-absolute" style="top:10px;left:10px;">For Sale</span>
              <button class="card-fav-btn active position-absolute" style="top:10px;right:10px;"><i class="bi bi-heart-fill"></i></button>
            </div>
            <div class="agent-prop-body">
              <div class="dash-row-title">Modern Villa in Miami</div>
              <div class="dash-row-sub mb-3">Miami, Florida · $850,000</div>
              <div class="d-flex gap-2">
                <label class="dash-input-icon flex-fill" style="display:flex;align-items:center;gap:6px;font-size:.78rem;color:var(--text-muted);"><input type="checkbox" class="dash-checkbox compare-check"> Compare</label>
              </div>
              <div class="d-flex gap-2 mt-2">
                <button class="dash-btn-primary flex-fill" style="padding:.5rem;font-size:.78rem;"><i class="bi bi-calendar-plus"></i> Schedule Visit</button>
                <button class="row-action-btn danger"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="agent-prop-card">
            <div class="agent-prop-thumb">
              <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=400&q=60" alt="">
              <span class="badge-custom position-absolute" style="top:10px;left:10px;">For Rent</span>
              <button class="card-fav-btn active position-absolute" style="top:10px;right:10px;"><i class="bi bi-heart-fill"></i></button>
            </div>
            <div class="agent-prop-body">
              <div class="dash-row-title">Luxury Apartment in LA</div>
              <div class="dash-row-sub mb-3">Los Angeles, CA · $2,500/mo</div>
              <div class="d-flex gap-2">
                <label class="dash-input-icon flex-fill" style="display:flex;align-items:center;gap:6px;font-size:.78rem;color:var(--text-muted);"><input type="checkbox" class="dash-checkbox compare-check"> Compare</label>
              </div>
              <div class="d-flex gap-2 mt-2">
                <button class="dash-btn-primary flex-fill" style="padding:.5rem;font-size:.78rem;"><i class="bi bi-calendar-plus"></i> Schedule Visit</button>
                <button class="row-action-btn danger"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="agent-prop-card">
            <div class="agent-prop-thumb">
              <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=400&q=60" alt="">
              <span class="badge-custom position-absolute" style="top:10px;left:10px;">For Sale</span>
              <button class="card-fav-btn active position-absolute" style="top:10px;right:10px;"><i class="bi bi-heart-fill"></i></button>
            </div>
            <div class="agent-prop-body">
              <div class="dash-row-title">Beach House in Florida</div>
              <div class="dash-row-sub mb-3">Miami, Florida · $650,000</div>
              <div class="d-flex gap-2">
                <label class="dash-input-icon flex-fill" style="display:flex;align-items:center;gap:6px;font-size:.78rem;color:var(--text-muted);"><input type="checkbox" class="dash-checkbox compare-check"> Compare</label>
              </div>
              <div class="d-flex gap-2 mt-2">
                <button class="dash-btn-primary flex-fill" style="padding:.5rem;font-size:.78rem;"><i class="bi bi-calendar-plus"></i> Schedule Visit</button>
                <button class="row-action-btn danger"><i class="bi bi-trash"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="dash-pagination-bar">
        <span>Showing 1 to 3 of 12 entries</span>
        <ul class="dash-pagination"><li class="page-link"><i class="bi bi-chevron-left"></i></li><li class="page-link" style="background:var(--primary);color:#fff;border-color:var(--primary);">1</li><li class="page-link">2</li><li class="page-link"><i class="bi bi-chevron-right"></i></li></ul>
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

  const checks = document.querySelectorAll('.compare-check');
  const bar = document.getElementById('compareBar'), count = document.getElementById('compareCount');
  checks.forEach(c => c.addEventListener('change', () => {
    const n = document.querySelectorAll('.compare-check:checked').length;
    count.textContent = n; bar.style.display = n > 0 ? 'inline-flex' : 'none';
  }));
</script>
</body>
</html>
