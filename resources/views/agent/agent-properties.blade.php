@include('agent.layout.header',['title'=>'My Properties | Dream Home Agent'])

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="agent-dashboard.html">Agent</a> / <span class="current">My Properties</span></div>
      <div class="dash-page-head">
        <div><h1 class="dash-page-title">My Properties</h1><p class="dash-page-desc">28 listings under your name.</p></div>
        <div class="dash-head-actions"><a href="{{ route('agent.create') }}" class="dash-btn-primary"><i class="bi bi-plus-lg"></i> Add Listing</a></div>
      </div>

      <div class="dash-filter-bar">
        <div class="row g-3 align-items-end">
          <div class="col-lg-5 col-6"><label class="dash-filter-label">Search</label><div class="dash-input-icon"><i class="bi bi-search"></i><input type="text" class="dash-input" placeholder="Search your properties..."></div></div>
          <div class="col-lg-3 col-6"><label class="dash-filter-label">Status</label><select class="dash-select"><option>All</option><option>Published</option><option>Pending</option><option>Draft</option></select></div>
          <div class="col-lg-2 col-6"><label class="dash-filter-label">Sort</label><select class="dash-select"><option>Newest</option><option>Most Viewed</option></select></div>
          <div class="col-lg-2 col-6">
            <label class="dash-filter-label">View</label>
            <div class="view-toggle"><button class="active" id="gridBtn"><i class="bi bi-grid-3x3-gap"></i></button><button id="tableBtn"><i class="bi bi-list-ul"></i></button></div>
          </div>
        </div>
      </div>

      <!-- GRID VIEW -->
      <div class="row g-3" id="gridView">
        <div class="col-md-6 col-lg-4">
          <div class="agent-prop-card">
            <div class="agent-prop-thumb">
              <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=400&q=60" alt="">
              <span class="badge-custom position-absolute" style="top:10px;left:10px;">For Sale</span>
              <button class="card-fav-btn active position-absolute" style="top:10px;right:10px;"><i class="bi bi-heart-fill"></i></button>
            </div>
            <div class="agent-prop-body">
              <div class="d-flex justify-content-between align-items-start">
                <div class="dash-row-title">Modern Villa in Miami</div>
                <span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span>
              </div>
              <div class="dash-row-sub mb-2">Miami, Florida · $850,000</div>
              <div class="agent-prop-stats">
                <span><i class="bi bi-eye"></i> 1,204 views</span>
                <span><i class="bi bi-heart"></i> 46 saved</span>
              </div>
              <div class="row-actions mt-3"><a href="../admin/property-view.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="agent-add-property.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="agent-prop-card">
            <div class="agent-prop-thumb">
              <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=400&q=60" alt="">
              <span class="badge-custom position-absolute" style="top:10px;left:10px;">For Rent</span>
              <button class="card-fav-btn position-absolute" style="top:10px;right:10px;"><i class="bi bi-heart"></i></button>
            </div>
            <div class="agent-prop-body">
              <div class="d-flex justify-content-between align-items-start">
                <div class="dash-row-title">Downtown Loft</div>
                <span class="status-pill warning"><i class="bi bi-circle-fill"></i>Pending</span>
              </div>
              <div class="dash-row-sub mb-2">Chicago, IL · $1,200/mo</div>
              <div class="agent-prop-stats"><span><i class="bi bi-eye"></i> 412 views</span><span><i class="bi bi-heart"></i> 12 saved</span></div>
              <div class="row-actions mt-3"><a href="../admin/property-view.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="agent-add-property.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="agent-prop-card">
            <div class="agent-prop-thumb">
              <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=400&q=60" alt="">
              <span class="badge-custom position-absolute" style="top:10px;left:10px;">For Sale</span>
              <button class="card-fav-btn position-absolute" style="top:10px;right:10px;"><i class="bi bi-heart"></i></button>
            </div>
            <div class="agent-prop-body">
              <div class="d-flex justify-content-between align-items-start">
                <div class="dash-row-title">Beach House in Florida</div>
                <span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span>
              </div>
              <div class="dash-row-sub mb-2">Miami, Florida · $650,000</div>
              <div class="agent-prop-stats"><span><i class="bi bi-eye"></i> 2,310 views</span><span><i class="bi bi-heart"></i> 88 saved</span></div>
              <div class="row-actions mt-3"><a href="../admin/property-view.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="agent-add-property.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button></div>
            </div>
          </div>
        </div>
      </div>

      <!-- TABLE VIEW -->
      <div class="dash-panel" id="tableView" style="display:none;">
        <div class="dash-table-wrap">
          <table class="dash-table">
            <thead><tr><th>Property</th><th>Price</th><th>Status</th><th>Views</th><th>Saved</th><th>Actions</th></tr></thead>
            <tbody>
              <tr>
                <td class="d-flex align-items-center gap-2"><img class="dash-row-thumb" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=100&q=60" alt=""><div><div class="dash-row-title">Modern Villa in Miami</div><div class="dash-row-sub">Miami, Florida</div></div></td>
                <td>$850,000</td><td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Published</span></td><td>1,204</td><td>46</td>
                <td><div class="row-actions"><a href="../admin/property-view.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="agent-add-property.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button></div></td>
              </tr>
              <tr>
                <td class="d-flex align-items-center gap-2"><img class="dash-row-thumb" src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=100&q=60" alt=""><div><div class="dash-row-title">Downtown Loft</div><div class="dash-row-sub">Chicago, IL</div></div></td>
                <td>$1,200/mo</td><td><span class="status-pill warning"><i class="bi bi-circle-fill"></i>Pending</span></td><td>412</td><td>12</td>
                <td><div class="row-actions"><a href="../admin/property-view.html" class="row-action-btn"><i class="bi bi-eye"></i></a><a href="agent-add-property.html" class="row-action-btn"><i class="bi bi-pencil"></i></a><button class="row-action-btn danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="bi bi-trash"></i></button></div></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="dash-pagination-bar">
        <span>Showing 1 to 3 of 28 entries</span>
        <ul class="dash-pagination"><li class="page-link"><i class="bi bi-chevron-left"></i></li><li class="page-link" style="background:var(--primary);color:#fff;border-color:var(--primary);">1</li><li class="page-link">2</li><li class="page-link"><i class="bi bi-chevron-right"></i></li></ul>
      </div>
    </main>
  </div>
</div>

<div class="modal fade dash-modal danger" id="deleteModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-3">
      <div class="modal-body">
        <div class="stat-icon-lg mx-auto mb-3"><i class="bi bi-trash"></i></div>
        <h5 class="mb-2">Delete this listing?</h5>
        <p class="text-muted-custom" style="font-size:.85rem;">This action can't be undone.</p>
      </div>
      <div class="modal-footer justify-content-center border-0 pt-0"><button class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button><button class="dash-btn-danger" data-bs-dismiss="modal">Delete</button></div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; });

  const gridBtn = document.getElementById('gridBtn'), tableBtn = document.getElementById('tableBtn');
  const gridView = document.getElementById('gridView'), tableView = document.getElementById('tableView');
  gridBtn.addEventListener('click', () => { gridBtn.classList.add('active'); tableBtn.classList.remove('active'); gridView.style.display='flex'; tableView.style.display='none'; });
  tableBtn.addEventListener('click', () => { tableBtn.classList.add('active'); gridBtn.classList.remove('active'); tableView.style.display='block'; gridView.style.display='none'; });
</script>
</body>
</html>
