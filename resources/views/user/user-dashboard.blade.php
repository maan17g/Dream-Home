@include('user.layout.header',['title'=>'My Dashboard | Dream Home'])
  

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="user-dashboard.html">Home</a> / <span class="current">Dashboard</span></div>
      <div class="dash-page-head">
        <div><h1 class="dash-page-title">Welcome back, John 👋</h1><p class="dash-page-desc">Here's what's new since your last visit.</p></div>
        <div class="dash-head-actions"><a href="../../properties.html" class="dash-btn-primary"><i class="bi bi-search"></i> Browse Properties</a></div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-heart-fill"></i></div><div><div class="stat-label">Saved Properties</div><div class="stat-value">12</div></div></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-calendar-check-fill"></i></div><div><div class="stat-label">Appointments</div><div class="stat-value">3</div></div></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-chat-dots-fill"></i></div><div><div class="stat-label">Active Inquiries</div><div class="stat-value">2</div></div></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-eye-fill"></i></div><div><div class="stat-label">Recently Viewed</div><div class="stat-value">24</div></div></div></div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-lg-8">
          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Recommended For You</div><a href="../../properties.html" class="dash-link">View All</a></div>
            <div class="row g-3">
              <div class="col-md-6">
                <div class="agent-prop-card">
                  <div class="agent-prop-thumb"><img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=400&q=60" alt=""><span class="badge-custom position-absolute" style="top:10px;left:10px;">For Sale</span><button class="card-fav-btn position-absolute" style="top:10px;right:10px;"><i class="bi bi-heart"></i></button></div>
                  <div class="agent-prop-body"><div class="dash-row-title">Modern Villa in Miami</div><div class="dash-row-sub">Miami, Florida · $850,000</div></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="agent-prop-card">
                  <div class="agent-prop-thumb"><img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=400&q=60" alt=""><span class="badge-custom position-absolute" style="top:10px;left:10px;">For Rent</span><button class="card-fav-btn active position-absolute" style="top:10px;right:10px;"><i class="bi bi-heart-fill"></i></button></div>
                  <div class="agent-prop-body"><div class="dash-row-title">Luxury Apartment in LA</div><div class="dash-row-sub">Los Angeles, CA · $2,500/mo</div></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Recent Activity</div></div>
            <div style="display:flex;flex-direction:column;gap:1rem;">
              <div class="d-flex gap-2"><div class="notif-icon inquiry"><i class="bi bi-heart"></i></div><div><div class="notif-text">You saved <strong>Beach House in Florida</strong></div><div class="notif-time">2 hours ago</div></div></div>
              <div class="d-flex gap-2"><div class="notif-icon appointment"><i class="bi bi-calendar-check"></i></div><div><div class="notif-text">Appointment confirmed for <strong>Modern Villa</strong></div><div class="notif-time">Yesterday</div></div></div>
              <div class="d-flex gap-2"><div class="notif-icon system"><i class="bi bi-chat-dots"></i></div><div><div class="notif-text">Agent replied to your inquiry</div><div class="notif-time">2 days ago</div></div></div>
            </div>
          </div>
        </div>
      </div>

      <div class="dash-panel">
        <div class="dash-panel-head"><div class="dash-panel-title">Upcoming Appointments</div><a href="user-appointments.html" class="dash-link">View All</a></div>
        <div class="appointment-card">
          <div class="appt-date-box"><div class="d">11</div><div class="m">Jun</div></div>
          <div class="flex-fill"><div class="dash-row-title" style="font-size:.85rem;">Modern Villa in Miami</div><div class="dash-row-sub">11:00 AM with John Doe</div></div>
          <span class="status-pill success"><i class="bi bi-circle-fill"></i>Confirmed</span>
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
</script>
</body>
</html>
