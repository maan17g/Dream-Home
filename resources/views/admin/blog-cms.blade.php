@include('admin.layout.header',['title'=>'Blog | Dream Home Admin'])


    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <span class="current">Blog</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Blog</h1>
          <p class="dash-page-desc">Write and manage market insights, tips, and news articles.</p>
        </div>
        <div class="dash-head-actions"><a href="blog-editor.html" class="dash-btn-primary"><i class="bi bi-pencil-square"></i> Write New Post</a></div>
      </div>

      <div class="dash-filter-bar">
        <div class="row g-3 align-items-end">
          <div class="col-lg-4 col-6"><label class="dash-filter-label">Search</label><div class="dash-input-icon"><i class="bi bi-search"></i><input type="text" class="dash-input" placeholder="Search posts..."></div></div>
          <div class="col-lg-3 col-6"><label class="dash-filter-label">Category</label><select class="dash-select"><option>All Categories</option><option>Buying Tips</option><option>Market Trends</option><option>Selling</option></select></div>
          <div class="col-lg-3 col-6"><label class="dash-filter-label">Status</label><select class="dash-select"><option>All</option><option>Published</option><option>Scheduled</option><option>Draft</option></select></div>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-md-6 col-lg-4">
          <div class="blog-admin-card">
            <div class="blog-admin-thumb"><img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=400&q=60" alt=""></div>
            <div class="blog-admin-body">
              <div class="d-flex justify-content-between align-items-center mb-2"><span class="badge-purpose badge-purpose-sale">Buying Tips</span><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></div>
              <div class="dash-row-title mb-1">10 Tips for First-Time Home Buyers</div>
              <div class="dash-row-sub mb-3">May 20, 2024 · 6 min read</div>
              <div class="row-actions"><button class="row-action-btn" title="Preview"><i class="bi bi-eye"></i></button><a href="blog-editor.html" class="row-action-btn" title="Edit"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger" title="Delete"><i class="bi bi-trash"></i></button></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="blog-admin-card">
            <div class="blog-admin-thumb"><img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=400&q=60" alt=""></div>
            <div class="blog-admin-body">
              <div class="d-flex justify-content-between align-items-center mb-2"><span class="badge-purpose badge-purpose-rent">Market Trends</span><span class="status-pill warning"><i class="bi bi-circle-fill"></i>Scheduled</span></div>
              <div class="dash-row-title mb-1">Luxury Real Estate Market Trends in 2026</div>
              <div class="dash-row-sub mb-3">Scheduled for May 25, 2024</div>
              <div class="row-actions"><button class="row-action-btn" title="Preview"><i class="bi bi-eye"></i></button><a href="blog-editor.html" class="row-action-btn" title="Edit"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger" title="Delete"><i class="bi bi-trash"></i></button></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="blog-admin-card">
            <div class="blog-admin-thumb"><img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=400&q=60" alt=""></div>
            <div class="blog-admin-body">
              <div class="d-flex justify-content-between align-items-center mb-2"><span class="badge-purpose" style="background:rgba(90,169,230,.15);color:#5aa9e6;">Selling</span><span class="status-pill danger"><i class="bi bi-circle-fill"></i>Draft</span></div>
              <div class="dash-row-title mb-1">How to Increase Property Value Before Selling</div>
              <div class="dash-row-sub mb-3">Last edited May 15, 2024</div>
              <div class="row-actions"><button class="row-action-btn" title="Preview"><i class="bi bi-eye"></i></button><a href="blog-editor.html" class="row-action-btn" title="Edit"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger" title="Delete"><i class="bi bi-trash"></i></button></div>
            </div>
          </div>
        </div>
      </div>

      <div class="dash-pagination-bar">
        <span>Showing 1 to 3 of 18 posts</span>
        <ul class="dash-pagination">
          <li class="page-link"><i class="bi bi-chevron-left"></i></li>
          <li class="page-link" style="background:var(--primary);color:#fff;border-color:var(--primary);">1</li>
          <li class="page-link">2</li>
          <li class="page-link"><i class="bi bi-chevron-right"></i></li>
        </ul>
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
