@include('user.layout.header',['title'=>'My Appointments | Dream Home'])
{{-- {{ Auth::user()- }} --}}
    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="user-dashboard.html">Home</a> / <span class="current">My Appointments</span></div>
      <div class="dash-page-head"><div><h1 class="dash-page-title">My Appointments</h1><p class="dash-page-desc">Track your scheduled property viewings.</p></div></div>

      <div class="dash-tabs">
        <button class="dash-tab active" data-tab="upcoming">Upcoming (3)</button>
        <button class="dash-tab" data-tab="history">History (7)</button>
      </div>

      <div id="pane-upcoming">
        <div class="appointment-card">
          <div class="appt-date-box"><div class="d">11</div><div class="m">Jun</div></div>
          <div class="flex-fill">
            <div class="dash-row-title" style="font-size:.85rem;">Modern Villa in Miami</div>
            <div class="dash-row-sub">11:00 AM · with John Doe (Agent)</div>
          </div>
          <span class="status-pill success"><i class="bi bi-circle-fill"></i>Confirmed</span>
          <div class="row-actions ms-2"><button class="dash-btn-secondary" style="padding:.4rem .8rem;font-size:.78rem;">Reschedule</button><button class="row-action-btn danger"><i class="bi bi-x-lg"></i></button></div>
        </div>
        <div class="appointment-card">
          <div class="appt-date-box"><div class="d">15</div><div class="m">Jun</div></div>
          <div class="flex-fill">
            <div class="dash-row-title" style="font-size:.85rem;">Luxury Apartment in LA</div>
            <div class="dash-row-sub">2:30 PM · with Sarah Smith (Agent)</div>
          </div>
          <span class="status-pill warning"><i class="bi bi-circle-fill"></i>Pending</span>
          <div class="row-actions ms-2"><button class="dash-btn-secondary" style="padding:.4rem .8rem;font-size:.78rem;">Reschedule</button><button class="row-action-btn danger"><i class="bi bi-x-lg"></i></button></div>
        </div>
      </div>
      <div id="pane-history" class="d-none">
        <div class="dash-panel">
          <div class="dash-table-wrap">
            <table class="dash-table">
              <thead><tr><th>Property</th><th>Date</th><th>Agent</th><th>Status</th></tr></thead>
              <tbody>
                <tr><td class="dash-row-title">Beach House in Florida</td><td>May 15, 2024</td><td>Michael Brown</td><td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Completed</span></td></tr>
                <tr><td class="dash-row-title">Downtown Condo</td><td>May 02, 2024</td><td>David Wilson</td><td><span class="status-pill danger"><i class="bi bi-circle-fill"></i>Cancelled</span></td></tr>
              </tbody>
            </table>
          </div>
        </div>
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
  document.querySelectorAll('.dash-tab').forEach(t => t.addEventListener('click', () => {
    document.querySelectorAll('.dash-tab').forEach(x => x.classList.remove('active')); t.classList.add('active');
    document.getElementById('pane-upcoming').classList.toggle('d-none', t.dataset.tab !== 'upcoming');
    document.getElementById('pane-history').classList.toggle('d-none', t.dataset.tab !== 'history');
  }));
</script>
</body>
</html>
