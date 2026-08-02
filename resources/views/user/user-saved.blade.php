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
       @forelse ($properties as $property)
    <x-property :property="$property" />
@empty
    <a href="{{ route('property.index') }}" class="text-decoration-none text-primary-custom text-center fs-2 fw-bold">Browse Properties</a>
@endforelse
      </div>

      <div class="dash-pagination-bar">
    <!-- Dynamic counters that update automatically -->
    <span>
        Showing {{ $properties->firstItem() }} 
        to {{ $properties->lastItem() }} 
        of {{ $properties->total() }} entries
    </span>
    
    <!-- Dynamic paginatio  n buttons -->
    {{ $properties->links() }}
</div>

    </main>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src='{{ asset('asset/js/script.js') }}'></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; });

</script>
</body>
</html>
sc
