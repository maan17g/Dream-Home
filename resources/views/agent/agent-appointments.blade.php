@include('agent.layout.header',['title'=>'Appointments | Dream Home Agent'])

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="agent-dashboard.html">Agent</a> / <span class="current">Appointments</span></div>
      <div class="dash-page-head">
        <div><h1 class="dash-page-title">Appointments</h1><p class="dash-page-desc">4 upcoming viewings this week.</p></div>
        <div class="dash-head-actions"><button class="dash-btn-primary"><i class="bi bi-plus-lg"></i> New Appointment</button></div>
      </div>

      <div class="row g-3">
        <div class="col-lg-8">
          <div class="dash-tabs">
            <button class="dash-tab active" data-tab="upcoming">Upcoming (4)</button>
            <button class="dash-tab" data-tab="completed">Completed (16)</button>
            <button class="dash-tab" data-tab="cancelled">Cancelled (2)</button>
          </div>

          <div class="appt-pane" id="pane-upcoming">
            <div class="appointment-card">
              <div class="appt-date-box"><div class="d">11</div><div class="m">Jun</div></div>
              <div class="customer-card flex-fill"><img src="https://i.pravatar.cc/100?img=47" alt=""><div><div class="dash-row-title" style="font-size:.85rem;">John Smith</div><div class="dash-row-sub">Modern Villa in Miami · 11:00 AM · In-person</div></div></div>
              <span class="status-pill success"><i class="bi bi-circle-fill"></i>Confirmed</span>
              <div class="row-actions ms-2"><button class="row-action-btn"><i class="bi bi-chat"></i></button><button class="row-action-btn danger"><i class="bi bi-x-lg"></i></button></div>
            </div>
            <div class="appointment-card">
              <div class="appt-date-box"><div class="d">15</div><div class="m">Jun</div></div>
              <div class="customer-card flex-fill"><img src="https://i.pravatar.cc/100?img=32" alt=""><div><div class="dash-row-title" style="font-size:.85rem;">Amanda Lee</div><div class="dash-row-sub">Luxury Apartment in LA · 2:30 PM · Video call</div></div></div>
              <span class="status-pill warning"><i class="bi bi-circle-fill"></i>Pending</span>
              <div class="row-actions ms-2"><button class="row-action-btn"><i class="bi bi-chat"></i></button><button class="row-action-btn danger"><i class="bi bi-x-lg"></i></button></div>
            </div>
            <div class="appointment-card">
              <div class="appt-date-box"><div class="d">18</div><div class="m">Jun</div></div>
              <div class="customer-card flex-fill"><img src="https://i.pravatar.cc/100?img=15" alt=""><div><div class="dash-row-title" style="font-size:.85rem;">Carlos Diaz</div><div class="dash-row-sub">Downtown Loft · 10:00 AM · In-person</div></div></div>
              <span class="status-pill success"><i class="bi bi-circle-fill"></i>Confirmed</span>
              <div class="row-actions ms-2"><button class="row-action-btn"><i class="bi bi-chat"></i></button><button class="row-action-btn danger"><i class="bi bi-x-lg"></i></button></div>
            </div>
          </div>

          <div class="appt-pane d-none" id="pane-completed">
            <div class="dash-empty"><i class="bi bi-check2-circle"></i><h6>16 completed viewings</h6><p>Your appointment history will show up here.</p></div>
          </div>
          <div class="appt-pane d-none" id="pane-cancelled">
            <div class="dash-empty"><i class="bi bi-calendar-x"></i><h6>2 cancelled appointments</h6><p>Cancelled meetings will show up here.</p></div>
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
              <div class="day muted">31</div><div class="day">1</div><div class="day">2</div><div class="day">3</div><div class="day">4</div><div class="day">5</div><div class="day">6</div>
              <div class="day">7</div><div class="day">8</div><div class="day">9</div><div class="day">10</div><div class="day active has-event">11</div><div class="day">12</div><div class="day">13</div>
              <div class="day">14</div><div class="day has-event">15</div><div class="day">16</div><div class="day">17</div><div class="day has-event">18</div><div class="day">19</div><div class="day">20</div>
            </div>
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

  const tabs = document.querySelectorAll('.dash-tab');
  tabs.forEach(t => t.addEventListener('click', () => {
    tabs.forEach(x => x.classList.remove('active'));
    t.classList.add('active');
    document.querySelectorAll('.appt-pane').forEach(p => p.classList.add('d-none'));
    document.getElementById('pane-' + t.dataset.tab).classList.remove('d-none');
  }));
</script>
</body>
</html>
