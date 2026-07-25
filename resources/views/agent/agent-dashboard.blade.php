
@include('agent.layout.header',['title'=>'Agent Dashboard | Dream Home'])
 {{-- {{ Auth::user() }} --}}
    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="agent-dashboard.html">Agent</a> / <span class="current">Dashboard</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Welcome back, John 👋</h1>
          <p class="dash-page-desc">Here's how your listings are performing this week.</p>
        </div>
        <div class="dash-head-actions"><a href="{{ route('agent.create') }}" class="dash-btn-primary"><i class="bi bi-plus-lg"></i> Add Listing</a></div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-buildings-fill"></i></div><div><div class="stat-label">My Listings</div><div class="stat-value">28</div><div class="stat-delta up"><i class="bi bi-arrow-up-short"></i> 3 new</div></div></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-eye-fill"></i></div><div><div class="stat-label">Total Views</div><div class="stat-value">12.4K</div><div class="stat-delta up"><i class="bi bi-arrow-up-short"></i> 18.2%</div></div></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-person-lines-fill"></i></div><div><div class="stat-label">Leads</div><div class="stat-value">142</div><div class="stat-delta up"><i class="bi bi-arrow-up-short"></i> 9 this week</div></div></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-calendar-check-fill"></i></div><div><div class="stat-label">Appointments</div><div class="stat-value">4</div><div class="stat-delta up"><i class="bi bi-arrow-up-short"></i> Upcoming</div></div></div></div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-lg-8">
          <div class="dash-panel">
            <div class="dash-panel-head"><div><div class="dash-panel-title">Performance</div><div class="dash-panel-sub">Views vs Leads, last 6 months</div></div></div>
            <canvas id="perfChart" height="110"></canvas>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="dash-panel mini-calendar">
            <div class="mini-calendar-head">
              <div class="dash-panel-title" style="font-size:.92rem;">June 2026</div>
              <div class="mini-calendar-nav"><button class="row-action-btn"><i class="bi bi-chevron-left"></i></button><button class="row-action-btn"><i class="bi bi-chevron-right"></i></button></div>
            </div>
            <div class="mini-calendar-grid">
              <div class="dow">S</div><div class="dow">M</div><div class="dow">T</div><div class="dow">W</div><div class="dow">T</div><div class="dow">F</div><div class="dow">S</div>
              <div class="day muted">31</div><div class="day">1</div><div class="day">2</div><div class="day has-event">3</div><div class="day">4</div><div class="day">5</div><div class="day">6</div>
              <div class="day">7</div><div class="day">8</div><div class="day has-event">9</div><div class="day">10</div><div class="day active has-event">11</div><div class="day">12</div><div class="day">13</div>
              <div class="day">14</div><div class="day has-event">15</div><div class="day">16</div><div class="day">17</div><div class="day">18</div><div class="day">19</div><div class="day">20</div>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-lg-7">
          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Recent Messages</div><a href="agent-messages.html" class="dash-link">View All</a></div>
            <div class="inquiry-list">
              <div class="inquiry-item unread">
                <img class="inquiry-avatar" src="https://i.pravatar.cc/100?img=47" alt="">
                <div class="inquiry-main"><div class="inquiry-name">John Smith</div><div class="inquiry-snippet">Is the Modern Villa still available this weekend?</div></div>
                <div class="inquiry-meta">2h ago</div>
              </div>
              <div class="inquiry-item">
                <img class="inquiry-avatar" src="https://i.pravatar.cc/100?img=32" alt="">
                <div class="inquiry-main"><div class="inquiry-name">Amanda Lee</div><div class="inquiry-snippet">Can you send more photos of the kitchen?</div></div>
                <div class="inquiry-meta">5h ago</div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Upcoming Appointments</div><a href="agent-appointments.html" class="dash-link">View All</a></div>
            <div class="appointment-card">
              <div class="appt-date-box"><div class="d">11</div><div class="m">Jun</div></div>
              <div class="flex-fill">
                <div class="customer-card"><img src="https://i.pravatar.cc/100?img=47" alt=""><div><div class="dash-row-title" style="font-size:.82rem;">John Smith</div><div class="dash-row-sub">Modern Villa in Miami · 11:00 AM</div></div></div>
              </div>
              <span class="status-pill success"><i class="bi bi-circle-fill"></i>Confirmed</span>
            </div>
            <div class="appointment-card">
              <div class="appt-date-box"><div class="d">15</div><div class="m">Jun</div></div>
              <div class="flex-fill">
                <div class="customer-card"><img src="https://i.pravatar.cc/100?img=32" alt=""><div><div class="dash-row-title" style="font-size:.82rem;">Amanda Lee</div><div class="dash-row-sub">Luxury Apartment · 2:30 PM</div></div></div>
              </div>
              <span class="status-pill warning"><i class="bi bi-circle-fill"></i>Pending</span>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
{{ Auth::user()->properties}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; drawChart(); });

  let perfChart;
  function drawChart() {
    const textMuted = getComputedStyle(root).getPropertyValue('--text-muted').trim();
    const gridColor = getComputedStyle(root).getPropertyValue('--border-color').trim();
    const primary = getComputedStyle(root).getPropertyValue('--primary').trim();
    if (perfChart) perfChart.destroy();
    perfChart = new Chart(document.getElementById('perfChart'), {
      type: 'bar',
      data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun'],
        datasets: [
          { label: 'Views', data: [1200,1900,1500,2200,2600,2400], backgroundColor: primary, borderRadius: 6 },
          { label: 'Leads', data: [18,24,20,30,34,28], backgroundColor: gridColor, borderRadius: 6 }
        ]
      },
      options: {
        plugins: { legend: { labels: { color: textMuted } } },
        scales: { x: { ticks: { color: textMuted }, grid: { display:false } }, y: { ticks: { color: textMuted }, grid: { color: gridColor } } }
      }
    });
  }
  drawChart();
</script>
</body>
</html>
