@include('admin.layout.header', ['title' => 'Schedule Management | Dream Home Admin'])

<main class="dash-content">
    <!-- Breadcrumb -->
    <div class="dash-breadcrumb mb-3">
        <a href="{{ route('admin.index') }}">Admin</a> / <span class="current">Schedules</span>
    </div>

    <!-- Page Header & Overview Stats -->
    <div class="dash-page-head d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h1 class="dash-page-title">Tour Schedules</h1>
            <p class="dash-page-desc">
                View all property viewing appointments, booking details, and client inquiries.
            </p>
        </div>
    </div>

    <!-- Quick Overview Stat Badges -->
    <div class="row g-3 mb-4">
        <div class="col-md-3 col-6">
            <div class="dash-panel p-3 d-flex align-items-center gap-3">
                <div class="rounded-circle text-primary-custom bg-opacity-10  p-3">
                    <i class="bi bi-calendar-event fs-4"></i>
                </div>
                <div>
                    <span class="text-custom-muted small d-block">Total Bookings</span>
                    <strong class="fs-5">{{ count($schedules) }}</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="dash-panel p-3 d-flex align-items-center gap-3">
                <div class="rounded-circle text-primary-custom bg-opacity-10  p-3">
                
                    <i class="bi bi-clock-history fs-4"></i>
                </div>
                <div>
                    <span class="text-custom-muted small d-block">Pending</span>
                    <strong class="fs-5">{{ collect($schedules)->where('status', 'pending')->count() }}</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="dash-panel p-3 d-flex align-items-center gap-3">
                              <div class="rounded-circle text-primary-custom bg-opacity-10  p-3">

                    <i class="bi bi-check-circle fs-4"></i>
                </div>
                <div>
                    <span class="text-custom-muted small d-block">Completed</span>
                    <strong class="fs-5">{{ collect($schedules)->where('status', 'completed')->count() }}</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="dash-panel p-3 d-flex align-items-center gap-3">
                              <div class="rounded-circle text-primary-custom bg-opacity-10  p-3">

                    <i class="bi bi-x-circle fs-4"></i>
                </div>
                <div>
                    <span class="text-custom-muted small d-block">Cancelled</span>
                    <strong class="fs-5">{{ collect($schedules)->where('status', 'cancelled')->count() }}</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Schedules Table Panel -->
    <div class="dash-panel">
        <div class="dash-table-wrap">
            <table class="dash-table">
                <thead>
                    <tr>
                        <th>Property</th>
                        <th>Client / Buyer</th>
                        <th>Assigned Agent</th>
                        <th>Scheduled Date</th>
                        <th>Status</th>
                        <th>Notes</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="scheduleTableBody">
                    @forelse($schedules as $schedule)
                        <tr>
                            <!-- Property Column -->
                            <td>
                                <div>
                                    <a href="{{ route('property.show', $schedule->property->id ?? '#') }}" class="dash-row-title text-primary-custom text-decoration-none fw-bold">
                                        {{ $schedule->property->title ?? 'N/A' }}
                                    </a>
                                    <div class="dash-row-sub small">
                                        <span class="badge bg-secondary bg-opacity-10 text-secondary border px-2 py-0 me-1">
                                            {{ ucfirst($schedule->property->type ?? 'Property') }}
                                        </span class='text-secondary'>
                                        ${{ number_format($schedule->property->price ?? 0, 2) }}{{ ($schedule->property->purpose ?? '') === 'rent' ? '/mo' : '' }}
                                    </div>
                                </div>
                            </td>

                            <!-- Client Column -->
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('storage/' . ($schedule->user->avatar ?? 'avatars/default.png')) }}" 
                                         alt="User Avatar" 
                                         class="rounded-circle" 
                                         style="width: 38px; height: 38px; object-fit: cover;">
                                    <div>
                                        <div class="fw-semibold">
                                            {{ $schedule->user->first_name ?? '' }} {{ $schedule->user->last_name ?? 'N/A' }}
                                        </div>
                                        <div class="dash-row-sub  small">
                                            <i class="bi bi-envelope"></i> {{ $schedule->user->email ?? 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Agent Column -->
                            <td>
                                <div>
                                    <div class="dash-row-title fw-semibold">
                                        {{ $schedule->agent->license_no ?? 'Agent #' . $schedule->agent_id }}
                                    </div>
                                    <div class="dash-row-sub text-muted small">
                                        <span class="badge bg-info bg-opacity-10 text-info border border-info px-2 py-0">
                                            {{ ucfirst($schedule->agent->agent_type ?? 'Agent') }}
                                        </span>
                                    </div>
                                </div>
                            </td>

                            <!-- Scheduled Date Column -->
                            <td>
                                <div class="fw-medium text-main">
                                    <i class="bi bi-calendar3 text-primary me-1"></i>
                                    {{ \Carbon\Carbon::parse($schedule->scheduled_at)->format('M d, Y') }}
                                </div>
                                <div class="dash-row-sub     small">
                                    <i class="bi bi-clock me-1"></i>
                                    {{ \Carbon\Carbon::parse($schedule->scheduled_at)->format('h:i A') }}
                                </div>
                            </td>

                            <!-- Status Badge Column -->
                            <td>
                                @php
                                    $badgeClasses = [
                                        'completed' => 'bg-success text-success border-success',
                                        'pending'   => 'bg-warning text-warning border-warning',
                                        'cancelled' => 'bg-danger text-danger border-danger',
                                    ];
                                    $currentBadge = $badgeClasses[strtolower($schedule->status)] ?? 'bg-secondary text-secondary border-secondary';
                                @endphp
                                <span class="badge {{ $currentBadge }} bg-opacity-10 border px-2 py-1 text-capitalize fw-semibold">
                                    {{ $schedule->status }}
                                </span>
                            </td>

                            <!-- Notes Column -->
                            <td>
                                <span class="text-truncate d-inline-block " style="max-width: 150px;" title="{{ $schedule->notes }}">
                                    {{ $schedule->notes ?: 'No additional notes' }}
                                </span>
                            </td>

                            <!-- Action Column -->
                            <td>
                                <div class="row-actions">
                                    <button type="button" class="row-action-btn btn-view-trigger" title="View Details"
                                        data-bs-toggle="modal" data-bs-target="#viewScheduleModal"
                                        data-user="{{ trim(($schedule->user->first_name ?? '') . ' ' . ($schedule->user->last_name ?? '')) ?: 'N/A' }}"
                                        data-email="{{ $schedule->user->email ?? 'N/A' }}"
                                        data-phone="{{ $schedule->user->phone ?? 'Not Provided' }}"
                                        data-property="{{ $schedule->property->title ?? 'N/A' }}"
                                        data-scheduled="{{ \Carbon\Carbon::parse($schedule->scheduled_at)->format('M d, Y @ h:i A') }}"
                                        data-status="{{ ucfirst($schedule->status) }}"
                                        data-notes="{{ $schedule->notes ?: 'No additional notes provided.' }}"
                                        data-agent="{{ $schedule->agent->license_no ?? 'Agent #' . $schedule->agent_id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 ">
                                <i class="bi bi-calendar-x fs-2 d-block mb-2 text-secondary"></i>
                                No tour schedules found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Dynamic Laravel Pagination Bar -->
        @if ($schedules instanceof \Illuminate\Pagination\LengthAwarePaginator && $schedules->hasPages())
            <div class="dash-pagination-bar p-3 border-top d-flex justify-content-between align-items-center">
                <span class=" small">Showing {{ $schedules->firstItem() }} to {{ $schedules->lastItem() }} of {{ $schedules->total() }} entries</span>
                {{ $schedules->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</main>

<!-- ================= VIEW SCHEDULE DETAILS MODAL ================= -->
<div class="modal fade dash-modal" id="viewScheduleModal" tabindex="-1" aria-labelledby="viewScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-card border-secondary p-4 shadow-lg rounded-4">
            <div class="modal-header border-0 pb-0">
                <h5 class="fw-bold mb-0 text-muted-custom " id="viewScheduleModalLabel">
                    <i class="bi bi-info-circle me-2"></i>Schedule Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-3">
                <div class="list-group list-group-flush rounded-3">
                    <div class="list-group-item bg-transparent d-flex justify-content-between py-2 border-bottom">
                        <strong class="text-muted">Client:</strong>
                        <span id="modalClientName" class="fw-semibold text-main"></span>
                    </div>
                    <div class="list-group-item bg-transparent d-flex justify-content-between py-2 border-bottom">
                        <strong class="text-muted">Email:</strong>
                        <span id="modalClientEmail" class="text-main"></span>
                    </div>
                    <div class="list-group-item bg-transparent d-flex justify-content-between py-2 border-bottom">
                        <strong class="text-muted">Phone:</strong>
                        <span id="modalClientPhone" class="text-main"></span>
                    </div>
                    <div class="list-group-item bg-transparent d-flex justify-content-between py-2 border-bottom">
                        <strong class="text-muted">Property:</strong>
                        <span id="modalPropertyTitle" class="fw-semibold text-main"></span>
                    </div>
                    <div class="list-group-item bg-transparent d-flex justify-content-between py-2 border-bottom">
                        <strong class="text-muted">Assigned Agent:</strong>
                        <span id="modalAgentLicense" class="text-main"></span>
                    </div>
                    <div class="list-group-item bg-transparent d-flex justify-content-between py-2 border-bottom">
                        <strong class="text-muted">Scheduled Time:</strong>
                        <span id="modalScheduledTime" class="badge bg-primary bg-opacity-10 text-primary border border-primary px-2 py-1"></span>
                    </div>
                    <div class="list-group-item bg-transparent d-flex justify-content-between py-2 border-bottom">
                        <strong class="text-muted">Current Status:</strong>
                        <span id="modalStatus" class="fw-semibold"></span>
                    </div>
                    <div class="list-group-item bg-transparent py-2 border-0">
                        <strong class="text-muted d-block mb-1">Notes:</strong>
                        <p id="modalNotes" class="p-2 rounded bg-light border text-secondary small mb-0"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 pt-0">
                <button type="button" class="btn btn-secondary w-100 py-2 rounded-3 fw-bold" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('asset/js/script.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/script.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const viewModal = document.getElementById('viewScheduleModal');
    if (viewModal) {
        viewModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            
            // Extract data from data-* attributes
            const user = button.getAttribute('data-user') || 'N/A';
            const email = button.getAttribute('data-email') || 'N/A';
            const phone = button.getAttribute('data-phone') || 'Not Provided';
            const property = button.getAttribute('data-property') || 'N/A';
            const scheduled = button.getAttribute('data-scheduled') || 'N/A';
            const status = button.getAttribute('data-status') || 'Pending';
            const notes = button.getAttribute('data-notes') || 'No additional notes provided.';
            const agent = button.getAttribute('data-agent') || 'N/A';

            // Populate Modal Elements
            document.getElementById('modalClientName').textContent = user;
            document.getElementById('modalClientEmail').textContent = email;
            document.getElementById('modalClientPhone').textContent = phone;
            document.getElementById('modalPropertyTitle').textContent = property;
            document.getElementById('modalAgentLicense').textContent = agent;
            document.getElementById('modalScheduledTime').textContent = scheduled;
            
            // Format status badge inside modal dynamically
            const modalStatusEl = document.getElementById('modalStatus');
            modalStatusEl.textContent = status;
            
            const lowerStatus = status.toLowerCase();
            modalStatusEl.className = 'fw-semibold badge px-2 py-1 text-capitalize ';
            if (lowerStatus === 'completed') {
                modalStatusEl.className += 'bg-success bg-opacity-10 text-success border border-success';
            } else if (lowerStatus === 'cancelled') {
                modalStatusEl.className += 'bg-danger bg-opacity-10 text-danger border border-danger';
            } else {
                modalStatusEl.className += 'bg-warning bg-opacity-10 text-warning border border-warning';
            }

            document.getElementById('modalNotes').textContent = notes;
        });
    }
});
</script>   