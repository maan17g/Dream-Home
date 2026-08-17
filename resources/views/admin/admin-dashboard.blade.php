@include('admin.layout.header', ['title' => 'Admin Dashboard | Dream Home'])

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
            <div class="stat-value">{{ number_format($totalUsers ?? 0) }}</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-person-badge-fill"></i></div>
          <div>
            <div class="stat-label">Total Agents</div>
            <div class="stat-value">{{ number_format($totalAgents ?? 0) }}</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-buildings-fill"></i></div>
          <div>
            <div class="stat-label">Total Properties</div>
            <div class="stat-value">{{ number_format($totalProperties ?? 0) }}</div>
          </div>
        </div>
      </div>
      <div class="col-6 col-lg-3">
        <div class="stat-card">
          <div class="stat-icon"><i class="bi bi-calendar-check-fill"></i></div>
          <div>
            <div class="stat-label">Total Bookings</div>
            <div class="stat-value">{{ number_format($totalBookings ?? 0) }}</div>
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
              <div class="dash-panel-sub">{{ number_format($totalProperties ?? 0) }} total listings</div>
            </div>
          </div>
          <canvas id="statusChart" height="180"></canvas>
          <div class="d-flex justify-content-between mt-3" style="font-size:.8rem;">
            <div><span class="legend-dot" style="background:#3cb57c"></span>For Sale <strong>{{ $forSaleCount ?? 0 }}</strong></div>
            <div><span class="legend-dot" style="background:#5aa9e6"></span>For Rent <strong>{{ $forRentCount ?? 0 }}</strong></div>
            <div><span class="legend-dot" style="background:#f5a623"></span>Sold <strong>{{ $soldCount ?? 0 }}</strong></div>
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
            <a href="{{ route('admin.appointment') }}" class="dash-link">View All</a>
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
                @forelse ($recentBookings as $booking)
                  @php
                    $thumbnailImage = $booking->property->images->where('is_thumbnail', 1)->first()->image 
                      ?? $booking->property->images->first()->image 
                      ?? null;
                  @endphp
                  <tr>
                    <td class="d-flex align-items-center gap-2">
                      <img class="dash-row-thumb" src="{{ $thumbnailImage ? asset('storage/'.$thumbnailImage) : asset('images/default-property.jpg') }}" alt="Property Thumbnail">
                      <div>
                        <div class="dash-row-title">{{ $booking->property->title ?? 'N/A' }}</div>
                        <div class="dash-row-sub">{{ ucfirst($booking->property->type ?? '') }} • {{ ucfirst($booking->property->purpose ?? '') }}</div>
                      </div>
                    </td>
                    <td>{{ \Carbon\Carbon::parse($booking->created_at)->format('M d, Y') }}</td>
                    <td>${{ number_format($booking->property->price ?? 0, 2) }}</td>
                    <td>
                      @if(in_array($booking->status, ['confirmed', 'completed']))
                        <span class="status-pill success"><i class="bi bi-circle-fill"></i>{{ ucfirst($booking->status) }}</span>
                      @elseif($booking->status === 'pending')
                        <span class="status-pill warning"><i class="bi bi-circle-fill"></i>Pending</span>
                      @else
                        <span class="status-pill danger"><i class="bi bi-circle-fill"></i>{{ ucfirst($booking->status) }}</span>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="4" class="text-center py-3 text-muted">No recent bookings found.</td>
                  </tr>
                @endforelse
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

    const currentYearData = @json($chartDataCurrentYear ?? []);
    const lastYearData = @json($chartDataLastYear ?? []);
    const statusData = [@json($forSaleCount ?? 0), @json($forRentCount ?? 0), @json($soldCount ?? 0)];

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
</html>