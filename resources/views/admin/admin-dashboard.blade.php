@include('admin.layout.header',['title'=>'Admin Dashboard | Dream Home'])

  <!-- ============ MAIN ============ -->
  <div class="dash-main">

    <!-- TOPBAR -->
    <header class="dash-topbar">
      <button class="dash-burger" id="burgerBtn"><i class="bi bi-list"></i></button>

      <div class="dash-search">
        <i class="bi bi-search"></i>
        <input type="text" placeholder="Search properties, agents, users...">
      </div>

      <div class="dash-topbar-right">
        <button class="dash-icon-btn" id="themeToggle" title="Toggle theme">
          <i class="bi bi-moon-stars-fill"></i>
        </button>

        <div class="dropdown">
          <button class="dash-icon-btn" data-bs-toggle="dropdown">
            <i class="bi bi-envelope-fill"></i>
            <span class="dash-icon-dot"></span>
          </button>
          <div class="dropdown-menu dropdown-menu-end dash-dropdown-menu">
            <span class="dropdown-item-text text-muted-custom" style="font-size:.78rem;">3 new messages</span>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="bi bi-chat-left-text"></i> Sarah Smith — new inquiry</a>
            <a class="dropdown-item" href="#"><i class="bi bi-chat-left-text"></i> Michael Brown — reply needed</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item dash-link px-2" href="#">View all messages</a>
          </div>
        </div>

        <div class="dropdown">
          <button class="dash-icon-btn" data-bs-toggle="dropdown">
            <i class="bi bi-bell-fill"></i>
            <span class="dash-icon-dot"></span>
          </button>
          <div class="dropdown-menu dropdown-menu-end dash-dropdown-menu">
            <span class="dropdown-item-text text-muted-custom" style="font-size:.78rem;">Notifications</span>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><i class="bi bi-person-plus"></i> New agent application</a>
            <a class="dropdown-item" href="#"><i class="bi bi-calendar-plus"></i> Booking confirmed — Miami Villa</a>
            <a class="dropdown-item" href="#"><i class="bi bi-exclamation-circle"></i> Listing pending approval</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item dash-link px-2" href="#">View all notifications</a>
          </div>
        </div>

        <div class="dropdown">
          <button class="dash-profile border-0" data-bs-toggle="dropdown">
            <img src="https://i.pravatar.cc/64?img=12" alt="Admin">
            <span class="dash-profile-info d-none d-sm-block">
              <span class="dash-profile-name d-block">Admin User</span>
              <span class="dash-profile-role">Super Admin</span>
            </span>
            <i class="bi bi-chevron-down text-muted-custom" style="font-size:.7rem;"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end dash-dropdown-menu">
            <a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Profile</a>
            <a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Account Settings</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" style="color:#e5484d" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="bi bi-box-arrow-right"></i> Logout</a>
          </div>
        </div>
      </div>
    </header>

    <!-- CONTENT -->
    <main class="dash-content">

      <div class="dash-breadcrumb"><a href="#">Admin</a> / <span class="current">Dashboard</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Welcome back, Admin 👋</h1>
          <p class="dash-page-desc">Here's what's happening across your listings today.</p>
        </div>
        <div class="dash-head-actions">
          <button class="dash-btn-secondary"><i class="bi bi-download"></i> Export Report</button>
          <button class="dash-btn-primary" data-bs-toggle="modal" data-bs-target="#addPropertyModal"><i class="bi bi-plus-lg"></i> Add Property</button>
        </div>
      </div>

      <!-- STAT CARDS -->
      <div class="row g-3 mb-3">
        <div class="col-6 col-lg-3">
          <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
            <div>
              <div class="stat-label">Total Users</div>
              <div class="stat-value">1,248</div>
              <div class="stat-delta up"><i class="bi bi-arrow-up-short"></i> 12.5% this month</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-person-badge-fill"></i></div>
            <div>
              <div class="stat-label">Total Agents</div>
              <div class="stat-value">86</div>
              <div class="stat-delta up"><i class="bi bi-arrow-up-short"></i> 8.4% this month</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-buildings-fill"></i></div>
            <div>
              <div class="stat-label">Total Properties</div>
              <div class="stat-value">542</div>
              <div class="stat-delta up"><i class="bi bi-arrow-up-short"></i> 14.6% this month</div>
            </div>
          </div>
        </div>
        <div class="col-6 col-lg-3">
          <div class="stat-card">
            <div class="stat-icon"><i class="bi bi-calendar-check-fill"></i></div>
            <div>
              <div class="stat-label">Total Bookings</div>
              <div class="stat-value">1,325</div>
              <div class="stat-delta up"><i class="bi bi-arrow-up-short"></i> 10.2% this month</div>
            </div>
          </div>
        </div>
      </div>

      <!-- CHARTS -->
      <div class="row g-3 mb-3">
        <div class="col-lg-8">
          <div class="dash-panel">
            <div class="dash-panel-head">
              <div>
                <div class="dash-panel-title">Bookings Overview</div>
                <div class="dash-panel-sub">Monthly comparison, this year vs last year</div>
              </div>
              <div style="font-size:.78rem;" class="text-muted-custom">
                <span class="legend-dot" style="background:var(--primary)"></span>This Year
                <span class="legend-dot ms-3" style="background:var(--border-color)"></span>Last Year
              </div>
            </div>
            <canvas id="bookingsChart" height="110"></canvas>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="dash-panel">
            <div class="dash-panel-head">
              <div>
                <div class="dash-panel-title">Property Status</div>
                <div class="dash-panel-sub">542 total listings</div>
              </div>
            </div>
            <canvas id="statusChart" height="180"></canvas>
            <div class="d-flex justify-content-between mt-3" style="font-size:.8rem;">
              <div><span class="legend-dot" style="background:#3cb57c"></span>For Sale <strong>262</strong></div>
              <div><span class="legend-dot" style="background:#5aa9e6"></span>For Rent <strong>198</strong></div>
              <div><span class="legend-dot" style="background:#f5a623"></span>Sold <strong>82</strong></div>
            </div>
          </div>
        </div>
      </div>

      <!-- RECENT BOOKINGS + QUICK LINKS -->
      <div class="row g-3">
        <div class="col-lg-8">
          <div class="dash-panel">
            <div class="dash-panel-head">
              <div class="dash-panel-title">Recent Bookings</div>
              <a href="#" class="dash-link">View All</a>
            </div>
            <div class="dash-table-wrap">
              <table class="dash-table">
                <thead>
                  <tr><th>Property</th><th>Date</th><th>Price</th><th>Status</th></tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="d-flex align-items-center gap-2">
                      <img class="dash-row-thumb" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=100&q=60" alt="">
                      <div><div class="dash-row-title">Modern Villa in Miami</div><div class="dash-row-sub">Miami, Florida</div></div>
                    </td>
                    <td>May 20, 2024</td>
                    <td>$850,000</td>
                    <td><span class="status-pill success"><i class="bi bi-circle-fill"></i>Confirmed</span></td>
                  </tr>
                  <tr>
                    <td class="d-flex align-items-center gap-2">
                      <img class="dash-row-thumb" src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=100&q=60" alt="">
                      <div><div class="dash-row-title">Luxury Apartment in LA</div><div class="dash-row-sub">Los Angeles, CA</div></div>
                    </td>
                    <td>May 18, 2024</td>
                    <td>$2,500/mo</td>
                    <td><span class="status-pill warning"><i class="bi bi-circle-fill"></i>Pending</span></td>
                  </tr>
                  <tr>
                    <td class="d-flex align-items-center gap-2">
                      <img class="dash-row-thumb" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=100&q=60" alt="">
                      <div><div class="dash-row-title">Beach House in Florida</div><div class="dash-row-sub">Miami, Florida</div></div>
                    </td>
                    <td>May 15, 2024</td>
                    <td>$650,000</td>
                    <td><span class="status-pill danger"><i class="bi bi-circle-fill"></i>Cancelled</span></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Quick Links</div></div>
            <div class="row g-2">
              <div class="col-6"><a href="add-edit-property.html" class="quick-link"><i class="bi bi-plus-circle"></i>Add Property</a></div>
              <div class="col-6"><a href="#" class="quick-link"><i class="bi bi-person-plus"></i>Add Agent</a></div>
              <div class="col-6"><a href="#" class="quick-link"><i class="bi bi-person-add"></i>Add User</a></div>
              <div class="col-6"><a href="#" class="quick-link"><i class="bi bi-file-earmark-plus"></i>Create Page</a></div>
              <div class="col-6"><a href="#" class="quick-link"><i class="bi bi-pencil-square"></i>Write Blog</a></div>
              <div class="col-6"><a href="#" class="quick-link"><i class="bi bi-chat-dots"></i>View Contacts</a></div>
            </div>
          </div>
        </div>
      </div>

      <!-- EMPTY STATE EXAMPLE -->
      <div class="row g-3 mt-1">
        <div class="col-lg-6">
          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Pending Approvals</div></div>
            <div class="dash-empty">
              <i class="bi bi-inbox"></i>
              <h6>Nothing to approve</h6>
              <p>New agent and listing submissions will show up here.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Loading state (example)</div></div>
            <div class="d-flex flex-column gap-2">
              <div class="skeleton" style="height:16px;width:70%;"></div>
              <div class="skeleton" style="height:16px;width:90%;"></div>
              <div class="skeleton" style="height:16px;width:50%;"></div>
            </div>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

<!-- TOAST -->
<div class="dash-toast" id="successToast">
  <i class="bi bi-check-circle-fill"></i>
  <span>Property added successfully.</span>
</div>

<!-- ADD PROPERTY MODAL -->
<div class="modal fade dash-modal" id="addPropertyModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New Property</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="text-muted-custom" style="font-size:.85rem;">This is a placeholder — hook this up to your real "Add Property" page/form.</p>
      </div>
      <div class="modal-footer">
        <button class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="dash-btn-primary" onclick="showToast()">Save Property</button>
      </div>
    </div>
  </div>
</div>

<!-- LOGOUT / CONFIRMATION MODAL -->
<div class="modal fade dash-modal danger" id="logoutModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-3">
      <div class="modal-body">
        <div class="stat-icon-lg mx-auto mb-3"><i class="bi bi-box-arrow-right"></i></div>
        <h5 class="mb-2">Log out of Dream Home?</h5>
        <p class="text-muted-custom" style="font-size:.85rem;">You'll need to sign in again to access the admin panel.</p>
      </div>
      <div class="modal-footer justify-content-center border-0 pt-0">
        <button class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="dash-btn-primary" data-bs-dismiss="modal">Yes, Log Out</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
  // Sidebar mobile toggle
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => {
    if (window.innerWidth <= 991) {
      sidebar.classList.toggle('mobile-open');
    } else {
      sidebar.classList.toggle('collapsed');
    }
  });

  // Theme toggle (uses the same data-theme attribute your site already uses)
  const themeBtn = document.getElementById('themeToggle');
  const root = document.documentElement;
  themeBtn.addEventListener('click', () => {
    const isLight = root.getAttribute('data-theme') === 'light';
    root.setAttribute('data-theme', isLight ? 'dark' : 'light');
    themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>';
    drawCharts(); // redraw so chart colors match the new theme
  });

  function showToast() {
    const t = document.getElementById('successToast');
    t.classList.add('show');
    setTimeout(() => t.classList.remove('show'), 3000);
  }

  // ---- Charts ----
  let bookingsChart, statusChart;
  function themeColor(varName) {
    return getComputedStyle(document.documentElement).getPropertyValue(varName).trim();
  }

  function drawCharts() {
    const textMuted = themeColor('--text-muted');
    const gridColor = themeColor('--border-color');
    const primary = themeColor('--primary');

    if (bookingsChart) bookingsChart.destroy();
    if (statusChart) statusChart.destroy();

    bookingsChart = new Chart(document.getElementById('bookingsChart'), {
      type: 'line',
      data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [
          {
            label: 'This Year',
            data: [320, 450, 380, 620, 540, 710, 680, 590, 730, 810, 690, 900],
            borderColor: primary,
            backgroundColor: primary + '22',
            tension: 0.4,
            fill: true,
            pointRadius: 0,
            borderWidth: 2.5
          },
          {
            label: 'Last Year',
            data: [280, 340, 300, 420, 460, 500, 480, 430, 520, 560, 500, 610],
            borderColor: gridColor,
            backgroundColor: 'transparent',
            borderDash: [4,4],
            tension: 0.4,
            pointRadius: 0,
            borderWidth: 2
          }
        ]
      },
      options: {
        plugins: { legend: { display: false } },
        scales: {
          x: { ticks: { color: textMuted, font: { size: 11 } }, grid: { display: false } },
          y: { ticks: { color: textMuted, font: { size: 11 } }, grid: { color: gridColor } }
        }
      }
    });

    statusChart = new Chart(document.getElementById('statusChart'), {
      type: 'doughnut',
      data: {
        labels: ['For Sale', 'For Rent', 'Sold'],
        datasets: [{
          data: [262, 198, 82],
          backgroundColor: ['#3cb57c', '#5aa9e6', '#f5a623'],
          borderWidth: 0,
          cutout: '72%'
        }]
      },
      options: { plugins: { legend: { display: false } } }
    });
  }

  drawCharts();
</script>
</body>
</html>
