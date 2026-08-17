<?php echo $__env->make('admin.layout.header', ['title' => 'Admin Dashboard | Dream Home'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

  <!-- ============ MAIN ============ -->
  <main class="dash-content">

    <div class="dash-breadcrumb"><a href="#">Admin</a> / <span class="current">Dashboard</span></div>
    <div class="dash-page-head">
      <div>
        <h1 class="dash-page-title">Welcome back, Admin 👋</h1>
        <p class="dash-page-desc">Here's what's happening across your listings today.</p>
      </div>
    </div>

    <!-- STAT CARDS -->
    <div class="row g-3 mb-3">
      <div class="col-6 col-lg-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
          <div>
            <div class="stat-label">Total Users</div>
            <div class="stat-value"><?php echo e(number_format($totalUsers ?? 0)); ?></div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-person-badge-fill"></i></div>
          <div>
            <div class="stat-label">Total Agents</div>
            <div class="stat-value"><?php echo e(number_format($totalAgents ?? 0)); ?></div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-buildings-fill"></i></div>
          <div>
            <div class="stat-label">Total Properties</div>
            <div class="stat-value"><?php echo e(number_format($totalProperties ?? 0)); ?></div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-calendar-check-fill"></i></div>
          <div>
            <div class="stat-label">Total Bookings</div>
            <div class="stat-value"><?php echo e(number_format($totalBookings ?? 0)); ?></div>
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
              <div class="dash-panel-sub"><?php echo e(number_format($totalProperties ?? 0)); ?> total listings</div>
            </div>
          </div>
          <canvas id="statusChart" height="180"></canvas>
          <div class="d-flex justify-content-between mt-3" style="font-size:.8rem;">
            <div><span class="legend-dot" style="background:#3cb57c"></span>For Sale <strong><?php echo e($forSaleCount ?? 0); ?></strong></div>
            <div><span class="legend-dot" style="background:#5aa9e6"></span>For Rent <strong><?php echo e($forRentCount ?? 0); ?></strong></div>
            <div><span class="legend-dot" style="background:#f5a623"></span>Sold <strong><?php echo e($soldCount ?? 0); ?></strong></div>
          </div>
        </div>
      </div>
    </div>

    <!-- RECENT BOOKINGS -->
    <div class="row g-3">
      <div class="col-lg-12">
        <div class="dash-panel">
          <div class="dash-panel-head">
            <div class="dash-panel-title">Recent Bookings</div>
            <a href="<?php echo e(route('admin.appointment')); ?>" class="dash-link">View All</a>
          </div>
          <div class="dash-table-wrap">
            <table class="dash-table">
              <thead>
                <tr>
                  <th>Property</th>
                  <th>Date</th>
                  <th>Price</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $recentBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                  <?php
                    $thumbnailImage = $booking->property->images->where('is_thumbnail', 1)->first()->image 
                      ?? $booking->property->images->first()->image 
                      ?? null;
                  ?>
                  <tr>
                    <td class="d-flex align-items-center gap-2">
                      <img class="dash-row-thumb" src="<?php echo e($thumbnailImage ? asset('storage/'.$thumbnailImage) : asset('images/default-property.jpg')); ?>" alt="Property Thumbnail">
                      <div>
                        <div class="dash-row-title"><?php echo e($booking->property->title ?? 'N/A'); ?></div>
                        <div class="dash-row-sub"><?php echo e(ucfirst($booking->property->type ?? '')); ?> • <?php echo e(ucfirst($booking->property->purpose ?? '')); ?></div>
                      </div>
                    </td>
                    <td><?php echo e(\Carbon\Carbon::parse($booking->created_at)->format('M d, Y')); ?></td>
                    <td>$<?php echo e(number_format($booking->property->price ?? 0, 2)); ?></td>
                    <td>
                      <?php if(in_array($booking->status, ['confirmed', 'completed'])): ?>
                        <span class="status-pill success"><i class="bi bi-circle-fill"></i><?php echo e(ucfirst($booking->status)); ?></span>
                      <?php elseif($booking->status === 'pending'): ?>
                        <span class="status-pill warning"><i class="bi bi-circle-fill"></i>Pending</span>
                      <?php else: ?>
                        <span class="status-pill danger"><i class="bi bi-circle-fill"></i><?php echo e(ucfirst($booking->status)); ?></span>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                  <tr>
                    <td colspan="4" class="text-center py-3 text-muted">No recent bookings found.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
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

    const currentYearData = <?php echo json_encode($chartDataCurrentYear ?? [], 15, 512) ?>;
    const lastYearData = <?php echo json_encode($chartDataLastYear ?? [], 15, 512) ?>;
    const statusData = [<?php echo json_encode($forSaleCount ?? 0, 15, 512) ?>, <?php echo json_encode($forRentCount ?? 0, 15, 512) ?>, <?php echo json_encode($soldCount ?? 0, 15, 512) ?>];

    bookingsChart = new Chart(document.getElementById('bookingsChart'), {
      type: 'line',
      data: {
        labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
        datasets: [
          {
            label: 'This Year',
            data: currentYearData,
            borderColor: primary,
            backgroundColor: primary + '22',
            tension: 0.4,
            fill: true,
            pointRadius: 0,
            borderWidth: 2.5
          },
          {
            label: 'Last Year',
            data: lastYearData,
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
          data: statusData,
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
</html><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/admin/admin-dashboard.blade.php ENDPATH**/ ?>