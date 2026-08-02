@include('agent.layout.header', ['title' => 'Agent Dashboard | Dream Home'])
{{-- {{ Auth::user() }} --}}
<main class="dash-content">
    <div class="dash-breadcrumb"><a href="agent-dashboard.html">Agent</a> / <span class="current">Dashboard</span></div>
    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">Welcome back, {{ Auth::user()->first_name }} 👋</h1>
            <p class="dash-page-desc">Here's how your listings are performing this week.</p>
        </div>
        <div class="dash-head-actions"><a href="{{ route('property.create') }}" class="dash-btn-primary"><i
                    class="bi bi-plus-lg"></i> Add Listing</a></div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-buildings-fill"></i></div>
                <div>
                    <div class="stat-label">My Listings</div>
                    <div class="stat-value text-center  ">{{ Auth::user()->agent->properties->count() }}</div>

                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-eye-fill"></i></div>
                <div>
                    <div class="stat-label">Total Views</div>
                    <div class="stat-value text-center">{{ Auth::user()->agent->properties->sum('views') }}</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-calendar-check-fill"></i></div>
                <div>
                    <div class="stat-label">Appointments</div>
                    <div class="stat-value text-center">{{ Auth::user()->agent->appointments->count() }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-lg-8">
            <div class="dash-panel">
                <div class="dash-panel-head">
                    <div>
                        <div class="dash-panel-title">Performance</div>
                        <div class="dash-panel-sub">Most Views</div>
                    </div>
                </div>
                <div id="" height="110">
                    <div class="dash-panel" id="tableView">
                        <div class="dash-table-wrap">
                            <table class="dash-table text-center">
                                <thead>
                                    <tr>
                                        <th>Property</th>

                                        <th>Status</th>
                                        <th>Views</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($properties as $property)
                                        @php
                                            $thumbnail =
                                                $property->images->firstWhere('is_thumbnail', 1) ??
                                                $property->images->first();
                                            $thumbnailUrl = $thumbnail
                                                ? asset('storage/' . $thumbnail->image)
                                                : asset('images/default-property.jpg');
                                        @endphp
                                        <tr>
                                            <td class="d-flex align-items-center gap-2">
                                                <img class="dash-row-thumb" src="{{ $thumbnailUrl }}"
                                                    alt="{{ $property->title }}">
                                                <div>
                                                    <div class="dash-row-title">{{ $property->title }}</div>

                                            </td>

                                            </td>
                                            <td><span class="status-pill success"><i
                                                        class="bi bi-circle-fill"></i>{{ Str::title($property->verified) }}</span>
                                            </td>
                                            <td>{{ number_format($property->views) }}</td>

                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <x-side-calendar :upcoming="$upcoming ?? collect()" :completed="$completed ?? collect()" :cancelled="$cancelled ?? collect()" />

        </div>
    </div>

    <div class="row g-3">

        <div class="col-lg-12">
            <div class="dash-panel">
                <div class="dash-panel-head">
                    <div class="dash-panel-title">Upcoming Appointments</div><a
                        href="{{ route('agent.appointments') }}" class="dash-link">View All</a>
                </div>
         

              @forelse ($appointments as $appt)
    @php
        // 1. Handle avatar string path extraction safely
        $thumbnailPath = $appt->user?->avatar;
        $thumbnailUrl = !empty($thumbnailPath)
            ? asset('storage/' . $thumbnailPath)
            : asset('images/default-property.jpg');

        // 2. Parse the dynamic date string using Carbon
        $date = \Carbon\Carbon::parse($appt->scheduled_at);
    @endphp
    
    <div class="appointment-card">
        <!-- Dynamic Date Box -->
        <div class="appt-date-box">
            <div class="d">{{ $date->format('d') }}</div> <!-- e.g., 16 -->
            <div class="m">{{ $date->format('M') }}</div> <!-- e.g., Feb -->
        </div>
        
        <div class="flex-fill">
            <div class="customer-card">
                <img src="{{ $thumbnailUrl }}" alt="{{ $appt->user?->name ?? 'User Avatar' }}">
                <div>
                    <!-- Dynamic User Name -->
                    <div class="dash-row-title" style="font-size:.82rem;">
                        {{ $appt->user?->name ?? 'Unknown Customer' }}
                    </div>
                    
                    <!-- Dynamic Property Name & Time -->
                    <div class="dash-row-sub">
                        {{ $appt->property?->title ?? 'Property Details' }} · {{ $date->format('g:i A') }}
                    </div>
                </div>
            </div>

            <!-- Single tag HTML implementation for Read More notes feature -->
        
        </div>
        
        <!-- Dynamic Status Pill classes based on status string value -->
        <span class="status-pill {{ $appt->status === 'completed' ? 'success' : ($appt->status === 'pending' ? 'warning' : 'danger') }}">
            <i class="bi bi-circle-fill"></i>{{ ucfirst($appt->status) }}
        </span>
    </div>
@empty
    <div class="no-records">No appointments found.</div>
@endforelse

            </div>
        </div>
    </div>
</main>
</div>
</div>
{{ Auth::user()->properties }}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    document.getElementById('burgerBtn').addEventListener('click', () => {
        if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open');
        else sidebar.classList.toggle('collapsed');
    });
    const themeBtn = document.getElementById('themeToggle');
    const root = document.documentElement;
    themeBtn.addEventListener('click', () => {
        const isLight = root.getAttribute('data-theme') === 'light';
        root.setAttribute('data-theme', isLight ? 'dark' : 'light');
        themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' :
            '<i class="bi bi-sun-fill"></i>';
        drawChart();
    });
</script>
</body>

</html>
