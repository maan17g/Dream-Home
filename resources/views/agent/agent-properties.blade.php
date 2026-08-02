@include('agent.layout.header', ['title' => 'My Properties | Dream Home Agent'])

<main class="dash-content">
    <div class="dash-breadcrumb"><a href="agent-dashboard.html">Agent</a> / <span class="current">My Properties</span>
    </div>
    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">My Properties</h1>
            <!-- Counts total items dynamically from the collection or paginator -->
            <p class="dash-page-desc">
                {{ $properties instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator ? $properties->total() : $properties->count() }}
                listings under your name.</p>
        </div>
        <div class="dash-head-actions"><a href="{{ route('property.create') }}" class="dash-btn-primary"><i
                    class="bi bi-plus-lg"></i> Add Listing</a></div>
    </div>

    <div class="dash-filter-bar">
        <form action="{{ route('agent.propsearch') }}" method="GET" class="row g-3 mb-4 align-items-end">
            <div class="col-lg-5 col-6">
                <label class="dash-filter-label" for="propertySearch">Search</label>
                <div class="dash-input-icon">
                    <i class="bi bi-search"></i>
                    <input type="text" id="propertySearch" name="search" class="dash-input"
                        placeholder="Search your properties..." value="{{ request('search') }}">
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <label class="dash-filter-label" for="propertyStatus">Status</label>
                <select id="propertyStatus" name="status" class="dash-select">
                    <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All</option>
                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Published</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                </select>
            </div>

            <div class="col-lg-2 col-6">
                <label class="dash-filter-label" for="propertySort">Sort</label>
                <select id="propertySort" name="sort" class="dash-select">
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                    <option value="most_viewed" {{ request('sort') == 'most_viewed' ? 'selected' : '' }}>Most Viewed
                    </option>
                </select>
            </div>

            <div class="col-lg-2 col-6">
                <button class="dash-btn-primary w-100" type="submit">Submit</button>
            </div>
        </form>
        <!-- GRID VIEW -->
        <div class="row g-3" id="gridView">
            @forelse($properties as $property)
                @php
                    // Pull out the primary thumbnail, or fallback to the first image if thumbnail isn't explicit
$thumbnail = $property->images->firstWhere('is_thumbnail', 1) ?? $property->images->first();
$thumbnailUrl = $thumbnail
    ? asset('storage/' . $thumbnail->image)
    : asset('images/default-property.jpg');
                @endphp
                <div class="col-md-6 col-lg-4">
                    <div class="agent-prop-card">
                        <div class="agent-prop-thumb">
                            <img src="{{ $thumbnailUrl }}" alt="{{ $property->title }}">
                            <span class="badge-custom position-absolute" style="top:10px;left:10px;">For
                                {{ ucfirst($property->purpose) }}</span>
                            {{-- <button class="card-fav-btn {{ $property->featured ? 'active' : '' }} position-absolute" style="top:10px;right:10px;"><i class="bi bi-heart-fill"></i></button> --}}
                        </div>
                        <div class="agent-prop-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="dash-row-title">{{ $property->title }}</div>
                                <!-- Static fallback status example, replace with $property->status when you add it -->
                                <span class="status-pill success"><i
                                        class="bi bi-circle-fill"></i>{{ Str::title($property->verified) }}</span>
                            </div>
                            <div class="dash-row-sub mb-2">
                                {{ $property->city?->city ?? 'Unknown City' }}, {{ $property->city?->country ?? '' }}
                                ·
                                ${{ number_format($property->price) }}{{ $property->purpose === 'rent' ? '/mo' : '' }}
                            </div>
                            <div class="agent-prop-stats">
                                <span><i class="bi bi-eye"></i> {{ number_format($property->views) }} views</span>
                                <span><i class="bi bi-door-open"></i> {{ $property->bedrooms }} Beds</span>
                            </div>
                            <div class="row-actions mt-3">
                                <a href="{{ route('property.show', $property->id) }}" class="row-action-btn"><i
                                        class="bi bi-eye"></i></a>
                                <a href="{{ route('property.edit', $property->id) }}" class="row-action-btn"><i
                                        class="bi bi-pencil"></i></a>
                                <button class="row-action-btn danger btn-delete-trigger" data-id="{{ $property->id }}"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                        class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
            @if (Auth::user()->agent->properties->count()==0)
            <div class="col-12 text-center py-5">
              <a href="{{ route('property.create') }}"
              class="text-decoration-none text-primary-custom text-center fs-2 fw-bold">Add Properties</a>
            </div>
            @else
            <div class="col-12 text-center py-5">
              <span
              class="text-decoration-none text-primary-custom text-center fs-2 fw-bold">No Property Found</span>
            </div>

            @endif
            @endforelse
        </div>




        <!-- PAGINATION BAR -->
        @if ($properties instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
            <div class="dash-pagination-bar mt-4">
                <span>Showing {{ $properties->firstItem() }} to {{ $properties->lastItem() }} of
                    {{ $properties->total() }} entries</span>
                <div>
                    {{ $properties->links('pagination::bootstrap-4') }}
                </div>
            </div>
        @endif
</main>
</div>
</div>

<!-- DELETE MODAL -->
<div class="modal fade dash-modal danger" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-3">
            <!-- Wrapped in a form targeting your delete endpoint -->
            <form id="deleteForm" method="POST" action="">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="stat-icon-lg mx-auto mb-3"><i class="bi bi-trash"></i></div>
                    <h5 class="mb-2">Delete this listing?</h5>
                    <p class="text-muted-custom" style="font-size:.85rem;">This action can't be undone.</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pt-0">
                    <button type="button" class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="dash-btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@include('layout.Notification')
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
    });



    // Dynamically apply correct delete action endpoint to the form inside the modal
    document.querySelectorAll('.btn-delete-trigger').forEach(button => {
        button.addEventListener('click', function() {
            // 1. Get the ID from the clicked button
            const id = this.getAttribute('data-id');

            // 2. Set the correct form action matching your Route::delete
            document.getElementById('deleteForm').setAttribute('action', `/properties/${id}`);
        });
    });
</script>
</body>

</html>
