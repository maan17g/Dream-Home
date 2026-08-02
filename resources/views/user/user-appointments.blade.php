@include('user.layout.header', ['title' => 'My Appointments | Dream Home'])
@include('layout.Notification')
<main class="dash-content">
    <div class="dash-breadcrumb">
        <a href="{{ route('page.index') }}">Home</a> / <span class="current">My Appointments</span>
    </div>

    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">My Appointments</h1>
            <p class="dash-page-desc">Track your scheduled property viewings.</p>
        </div>
    </div>

    <div class="dash-tabs">
        <button class="dash-tab active" data-tab="upcoming">Upcoming ({{ ($upcoming ?? collect())->count() }})</button>
        <button class="dash-tab" data-tab="history">History ({{ ($history ?? collect())->count() }})</button>
    </div>

    <!-- UPCOMING PANE -->
    <div id="pane-upcoming">
        @forelse($upcoming ?? [] as $appt)
            <div class="appointment-card mb-2">
                <div class="appt-date-box">
                    <div class="d">{{ \Carbon\Carbon::parse($appt->scheduled_at)->format('d') }}</div>
                    <div class="m">{{ \Carbon\Carbon::parse($appt->scheduled_at)->format('M') }}</div>
                
                </div>

                <div class="flex-fill ms-3">
                    <div class="dash-row-title" style="font-size:.85rem;">
                        <a href="{{ route('property.show', $appt->property->id) }}" class="text-decoration-none text-reset">
                            {{ $appt->property->title }}
                        </a>
                    </div>
                    <div class="dash-row-sub">
                        {{ \Carbon\Carbon::parse($appt->scheduled_at)->format('g:i A') }} · with 
                        {{ $appt->agent->user->first_name ?? 'Agent' }} {{ $appt->agent->user->last_name ?? '' }}
                    </div>
                </div>

                <span class="status-pill {{ $appt->status === 'confirmed' ? 'success' : 'warning' }}">
                    <i class="bi bi-circle-fill"></i> {{ ucfirst($appt->status) }}
                </span>
           
                <div class="row-actions ms-2">
                    <form action="{{ route('appointments.update-status', $appt->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this viewing?');">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="cancelled">
                        <button type="submit" class="row-action-btn danger" title="Cancel Appointment">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <div class="dash-empty text-center py-4">
                <i class="bi bi-calendar-event fs-2 text-muted"></i>
                <h6 class="mt-2">No upcoming appointments</h6>
            </div>
        @endforelse
    </div>

    <!-- HISTORY PANE -->
    <div id="pane-history" class="d-none">
        <div class="dash-panel">
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Property</th>
                            <th>Date</th>
                            <th>Agent</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($history ?? [] as $appt)
                            <tr>
                                <td class="dash-row-title">
                                    <a href="{{ route('property.show', $appt->property->id) }}" class="text-decoration-none text-reset">
                                        {{ $appt->property->title }}
                                    </a>
                                </td>
                               
                                <td>{{ \Carbon\Carbon::parse($appt->scheduled_at)->format('M d, Y · g:i A') }}</td>
                                <td>{{ $appt->agent->user->first_name ?? 'Agent' }} {{ $appt->agent->user->last_name ?? '' }}</td>
                                <td>
                                    <span class="status-pill {{ $appt->status === 'completed' ? 'success' : 'danger' }}">
                                        <i class="bi bi-circle-fill"></i> {{ ucfirst($appt->status) }}
                                    </span>
                                </td>
                                <td>
                                    <form action="{{ route('appointment.delete',$appt->id) }}" method="GET">
                                        @csrf
                                        <button type=submit class="status-pill danger">
                                           Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No appointment history found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('dashboard/assets/js/script.js') }}"></script>
<script>
    document.querySelectorAll('.dash-tab').forEach(t => t.addEventListener('click', () => {
        document.querySelectorAll('.dash-tab').forEach(x => x.classList.remove('active'));
        t.classList.add('active');
        document.getElementById('pane-upcoming').classList.toggle('d-none', t.dataset.tab !== 'upcoming');
        document.getElementById('pane-history').classList.toggle('d-none', t.dataset.tab !== 'history');
    }));
</script>
</body>
</html>