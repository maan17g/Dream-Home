@include('admin.layout.header',['title'=>'Write Post | Dream Home Admin'])

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <a href="blog-cms.html">Blog</a> / <span class="current">Write Post</span></div>
      <div class="dash-page-head">
        <div><h1 class="dash-page-title">Write New Post</h1><p class="dash-page-desc">Share market insights, tips, and news with your audience.</p></div>
        <div class="dash-head-actions">
          <button class="dash-btn-secondary"><i class="bi bi-eye"></i> Preview</button>
          <button class="dash-btn-secondary"><i class="bi bi-save"></i> Save Draft</button>
          <button class="dash-btn-primary" onclick="showToast()"><i class="bi bi-check-lg"></i> Publish</button>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-lg-8">
          <div class="dash-panel">
            <label class="dash-form-label">Post Title <span class="req">*</span></label>
            <input type="text" class="dash-input mb-3" placeholder="e.g. 10 Tips for First-Time Home Buyers" style="font-size:1.1rem;height:52px;">

            <label class="dash-form-label">Content</label>
            <div class="editor-toolbar">
              <button title="Bold"><i class="bi bi-type-bold"></i></button>
              <button title="Italic"><i class="bi bi-type-italic"></i></button>
              <button title="Underline"><i class="bi bi-type-underline"></i></button>
              <button title="Link"><i class="bi bi-link-45deg"></i></button>
              <button title="Bullet list"><i class="bi bi-list-ul"></i></button>
              <button title="Numbered list"><i class="bi bi-list-ol"></i></button>
              <button title="Quote"><i class="bi bi-quote"></i></button>
              <button title="Image"><i class="bi bi-image"></i></button>
              <button title="Align left"><i class="bi bi-text-left"></i></button>
            </div>
            <div class="editor-body" contenteditable="true">Write your post content here...</div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="dash-panel mb-3">
            <div class="dash-panel-head"><div class="dash-panel-title">Publish Settings</div></div>
            <label class="dash-form-label">Status</label>
            <select class="dash-select mb-3"><option>Draft</option><option>Published</option><option>Scheduled</option></select>
            <label class="dash-form-label">Publish Date</label>
            <input type="date" class="dash-input mb-3">
            <label class="dash-form-label">Category</label>
            <select class="dash-select mb-3"><option>Buying Tips</option><option>Market Trends</option><option>Selling</option><option>Investing</option></select>
            <label class="dash-form-label">Tags</label>
            <input type="text" class="dash-input" placeholder="e.g. first-time buyer, mortgage">
          </div>

          <div class="dash-panel mb-3">
            <div class="dash-panel-head"><div class="dash-panel-title">Featured Image</div></div>
            <div class="dash-dropzone"><i class="bi bi-cloud-arrow-up"></i><div><strong>Drag & drop</strong> or <span class="text-primary-custom">browse</span></div></div>
          </div>

          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">SEO</div></div>
            <label class="dash-form-label">Meta Title</label>
            <input type="text" class="dash-input mb-3" placeholder="SEO title">
            <label class="dash-form-label">Meta Description</label>
            <textarea class="dash-input" rows="3" placeholder="Short SEO description..."></textarea>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<div class="dash-toast" id="successToast"><i class="bi bi-check-circle-fill"></i><span>Post published successfully.</span></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; });
  function showToast(){ const t=document.getElementById('successToast'); t.classList.add('show'); setTimeout(()=>t.classList.remove('show'),3000); }
</script>
</body>
</html>
