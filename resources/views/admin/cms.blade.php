@include('admin.layout.header', ['title' => 'CMS Reviews | Dream Home Admin'])

<main class="dash-content">
    <div class="dash-breadcrumb">
        <a href="{{ route('admin.index') }}">Admin</a> / <span class="current">CMS Reviews</span>
    </div>

    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">Manage Reviews & Testimonials</h1>
            <p class="dash-page-desc">Feature specific user reviews to display on the frontend homepage.</p>
        </div>
    </div>


    <div class="dash-panel">
        <div class="dash-panel-head d-flex justify-content-between align-items-center">
            <div>
                <div class="dash-panel-title">All Customer Reviews</div>
                <div class="dash-panel-sub">Toggle the switch to feature or unfeature reviews on your site</div>
            </div>
        </div>

        <div class="dash-table-wrap">
            <table class="dash-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Property</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Featured</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reviews as $review)
                        <tr>
                            {{-- USER INFO --}}
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    @if ($review->appointment?->user?->avatar)
                                        <img src="{{ asset('storage/' . $review->appointment->user->avatar) }}"
                                            alt="User Avatar" class="rounded-circle"
                                            style="width: 36px; height: 36px; object-fit: cover;">
                                    @else
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center text-muted fw-bold"
                                            style="width: 36px; height: 36px;">
                                            {{ strtoupper(substr($review->appointment?->user?->first_name ?? 'U', 0, 1)) }}
                                        </div>
                                    @endif
                                    <div>
                                        <div class="fw-bold">
                                            {{ $review->appointment?->user?->first_name }}
                                            {{ $review->appointment?->user?->last_name }}
                                        </div>
                                        <small
                                            class="text-muted-custom">{{ $review->appointment?->user?->email }}</small>
                                    </div>
                                </div>
                            </td>

                            {{-- PROPERTY INFO --}}
                            <td>
                                <div class="fw-bold text-truncate" style="max-width: 180px;"
                                    title="{{ $review->property?->title }}">
                                    {{ $review->property?->title ?? 'N/A' }}
                                </div>
                                <small class="text-muted-custom">
                                    ${{ number_format((float) ($review->property?->price ?? 0), 2) }} /
                                    {{ ucfirst($review->property?->purpose ?? 'N/A') }}
                                </small>
                            </td>

                            {{-- STAR RATING --}}
                            <td>
                                <div class="text-warning">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="bi bi-star{{ $i <= $review->rating ? '-fill' : '' }}"></i>
                                    @endfor
                                    <span
                                        class="ms-1 text-white
                                         fw-bold">({{ $review->rating }}/5)</span>
                                </div>
                            </td>

                            {{-- COMMENT --}}
                            <td>
                                @if ($review->comment)
                              
                                    <p class="mb-0 text-break" style="max-width: 250px;">
                                        "{{ $review->comment }}"
                                    </p>
                               
                                @endif
                            </td>

                            {{-- FEATURED FORM TOGGLE (PURE FORM SUBMIT, NO AJAX) --}}
                            <td>
                                <form action="{{ route('admin.review.toggle', $review->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <label class="dash-toggle">
                                        <input type="checkbox" onchange="this.form.submit()"
                                            {{ $review->featured ? 'checked' : '' }}>
                                        <span class="dash-toggle-slider"></span>
                                    </label>
                                </form>
                            </td>

                            {{-- ACTIONS --}}
                            <td>
                                <div class="row-actions">
                                    <form action="{{ route('admin.review.delete', $review->id) }}" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this review?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="row-action-btn danger" title="Delete Review">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    @if (!$review->status)
                                        

                                        <form action="{{ route('admin.review.status', $review->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="row-action-btn danger" title="Delete Review">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        </form>
                                       
                                  
                                        
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-chat-left-quote fs-2 d-block mb-2 text-secondary"></i>
                                No reviews found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('asset/js/script.js') }}"></script>
<script src="{{ asset('dashboard/assets/js/script.js') }}"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    document.getElementById('burgerBtn').addEventListener('click', () => {
        if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open');
        else sidebar.classList.toggle('collapsed');
    });
</script>
</body>

</html>
