@include('agent.layout.header', ['title' => 'Appointments | Dream Home Agent'])

<main class="dash-content">
    <div class="dash-breadcrumb">
        <a href="{{ route('agent.index') }}">Agent</a> / <span class="current">Appointments</span>
    </div>

    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">Appointments</h1>
            <p class="dash-page-desc">{{ ($upcoming ?? collect())->count() }} upcoming viewings scheduled.</p>
        </div>
    </div>

   

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="dash-tabs">
                <button class="dash-tab active" data-tab="upcoming">Upcoming
                    ({{ ($upcoming ?? collect())->count() }})</button>
                <button class="dash-tab" data-tab="completed">Completed
                    ({{ ($completed ?? collect())->count() }})</button>
                <button class="dash-tab" data-tab="cancelled">Cancelled
                    ({{ ($cancelled ?? collect())->count() }})</button>
            </div>

            <!-- UPCOMING PANE -->
            <div class="appt-pane" id="pane-upcoming">
                @forelse($upcoming ?? [] as $appt)
                    <div class="appointment-card mb-2 p-3 border rounded">
                        <div class="d-flex align-items-start">
                            <div class="appt-date-box align-self-center">
                                <div class="d">{{ \Carbon\Carbon::parse($appt->scheduled_at)->format('d') }}</div>
                                <div class="m">{{ \Carbon\Carbon::parse($appt->scheduled_at)->format('M') }}</div>
                            </div>

                            <div class="customer-card flex-fill ms-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $appt->user->avatar ? asset('storage/' . $appt->user->avatar) : 'https://i.pravatar.cc/100?u=' . $appt->user->id }}"
                                        alt="Avatar" class="rounded-circle" width="40" height="40">
                                    <div class="ms-2">
                                        <div class="dash-row-title" style="font-size:.85rem;">
                                            {{ $appt->user->first_name }} {{ $appt->user->last_name }}
                                        </div>
                                        <div class="dash-row-sub " style="font-size:.75rem;">
                                            {{ $appt->property->title }} ·
                                            {{ \Carbon\Carbon::parse($appt->scheduled_at)->format('g:i A') }}
                                        </div>
                                    </div>
                                </div>

                                {{-- BUYER NOTES DISPLAY --}}
                                @if ($appt->notes)
                                    <div class="mt-2 p-2 bg-light rounded text-secondary"
                                        style="font-size: 0.825rem; border-left: 3px solid #c9a24b;">
                                        <i class="bi bi-chat-left-text me-1"></i> <strong>Buyer Note:</strong>
                                        "{{ $appt->notes }}"
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex align-items-center ms-2 align-self-center">
                                <span
                                    class="status-pill {{ $appt->status === 'confirmed' ? 'success' : 'warning' }} me-2">
                                    <i class="bi bi-circle-fill"></i> {{ ucfirst($appt->status) }}
                                </span>

                                <div class="row-actions d-flex gap-1">
                                    @if ($appt->status === 'pending')
                                        <form action="{{ route('appointments.update-status', $appt->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="confirmed">
                                            <button type="submit"
                                                class="row-action-btn text-success btn btn-sm btn-light"
                                                title="Approve">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        </form>
                                    @endif

                                    @if ($appt->status === 'confirmed')
                                        <form action="{{ route('appointments.update-status', $appt->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit"
                                                class="row-action-btn text-primary btn btn-sm btn-light"
                                                title="Mark Completed">
                                                <i class="bi bi-check2-circle"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <form action="{{ route('appointments.update-status', $appt->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="cancelled">
                                        <button type="submit" class="row-action-btn text-danger btn btn-sm btn-light"
                                            title="Cancel">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="dash-empty text-center py-4">
                        <i class="bi bi-calendar-check fs-2 text-muted"></i>
                        <h6 class="mt-2">No upcoming appointments</h6>
                    </div>
                @endforelse
            </div>

            <!-- COMPLETED PANE -->
            <div class="appt-pane d-none" id="pane-completed">
                @forelse($completed ?? [] as $appt)
                    <div class="d-flex align-items-center justify-content-center mb-2 p-3 border rounded">
                        <div class="d-flex align-items-center gap-1 justify-content-center">
                            <div class="appt-date-box">
                                <div class="d">{{ \Carbon\Carbon::parse($appt->scheduled_at)->format('d') }}</div>
                                <div class="m">{{ \Carbon\Carbon::parse($appt->scheduled_at)->format('M') }}</div>
                            </div>
                            <div class="customer-card flex-fill ms-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $appt->user->avatar ? asset('storage/' . $appt->user->avatar) : 'https://i.pravatar.cc/100?u=' . $appt->user->id }}"
                                        alt="Avatar" class="rounded-circle" width="40" height="40">
                                    <div class="ms-2">
                                        <div class="dash-row-title" style="font-size:.85rem;">
                                            {{ $appt->user->first_name }} {{ $appt->user->last_name }}</div>
                                        <div class="dash-row-sub text-custom-muted" style="font-size:.75rem;">
                                            {{ $appt->property->title }} ·
                                            {{ \Carbon\Carbon::parse($appt->scheduled_at)->format('g:i A') }}</div>
                                    </div>
                                </div>
                                @if ($appt->notes)
                                    <div class="mt-2 p-2 bg-light rounded text-secondary"
                                        style="font-size: 0.825rem; border-left: 3px solid #6c757d;">
                                        <i class="bi bi-chat-left-text me-1"></i> <strong>Buyer Note:</strong>
                                        "{{ $appt->notes }}"
                                    </div>
                                @endif
                            </div>
                            <span class="status-pill success"><i class="bi bi-circle-fill"></i> Completed</span>
                        </div>
                    </div>
                @empty
                    <div class="dash-empty text-center py-4">
                        <i class="bi bi-check2-circle fs-2 text-muted"></i>
                        <h6 class="mt-2">No completed viewings</h6>
                    </div>
                @endforelse
            </div>

            <!-- CANCELLED PANE -->
            <div class="appt-pane d-none" id="pane-cancelled">
                @forelse($cancelled ?? [] as $appt)
                    <div class="appointment-card mb-2 p-3 border rounded">
                        <div class="d-flex align-items-start">
                            <div class="appt-date-box">
                                <div class="d">{{ \Carbon\Carbon::parse($appt->scheduled_at)->format('d') }}
                                </div>
                                <div class="m">{{ \Carbon\Carbon::parse($appt->scheduled_at)->format('M') }}
                                </div>
                            </div>
                            <div class="customer-card flex-fill ms-3">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $appt->user->avatar ? asset('storage/' . $appt->user->avatar) : 'https://i.pravatar.cc/100?u=' . $appt->user->id }}"
                                        alt="Avatar" class="rounded-circle" width="40" height="40">
                                    <div class="ms-2">
                                        <div class="dash-row-title" style="font-size:.85rem;">
                                            {{ $appt->user->first_name }} {{ $appt->user->last_name }}</div>
                                        <div class="dash-row-sub text-muted" style="font-size:.75rem;">
                                            {{ $appt->property->title }} ·
                                            {{ \Carbon\Carbon::parse($appt->scheduled_at)->format('g:i A') }}</div>
                                    </div>
                                </div>
                                @if ($appt->notes)
                                    <div class="mt-2 p-2 bg-light rounded text-secondary"
                                        style="font-size: 0.825rem; border-left: 3px solid #dc3545;">
                                        <i class="bi bi-chat-left-text me-1"></i> <strong>Buyer Note:</strong>
                                        "{{ $appt->notes }}"
                                    </div>
                                @endif
                            </div>
                            <span class="status-pill danger"><i class="bi bi-circle-fill"></i> Cancelled</span>
                        </div>
                    </div>
                @empty
                    <div class="dash-empty text-center py-4">
                        <i class="bi bi-calendar-x fs-2 text-muted"></i>
                        <h6 class="mt-2">No cancelled appointments</h6>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Mini Calendar Side Column -->
        <div class="col-lg-4">
            <x-side-calendar :upcoming="$upcoming ?? collect()" :completed="$completed ?? collect()" :cancelled="$cancelled ?? collect()" />
        </div>
    </div>
</main>

<script src="{{ asset('dashboard/assets/js/script.js') }}"></script>
</body>

</html>