@include('admin.layout.header', ['title' => 'CMS - Amenities & Cities'])

<div class="container-fluid py-4 px-lg-5">

   

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- PAGE TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-secondary">
        <div>
            <h2 class="h4 text-main font-weight-bold mb-1">CMS Management</h2>
            <p class="text-muted-custom small mb-0">Manage platform amenities and operational cities.</p>
        </div>
    </div>

    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs border-secondary mb-4" id="cmsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-main bg-transparent border-secondary fw-bold" 
                    id="amenities-tab" 
                    data-bs-toggle="tab" 
                    data-bs-target="#amenities-panel" 
                    type="button" 
                    role="tab" 
                    aria-controls="amenities-panel" 
                    aria-selected="true">
                <i class="bi bi-stars me-2 text-primary-custom"></i>Amenities
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-muted-custom bg-transparent border-secondary fw-bold" 
                    id="cities-tab" 
                    data-bs-toggle="tab" 
                    data-bs-target="#cities-panel" 
                    type="button" 
                    role="tab" 
                    aria-controls="cities-panel" 
                    aria-selected="false">
                <i class="bi bi-geo-alt me-2 text-primary-custom"></i>Cities
            </button>
        </li>
    </ul>

    <div class="tab-content" id="cmsTabsContent">

        <!-- ================= 1. AMENITIES SECTION ================= -->
        <div class="tab-pane fade show active" id="amenities-panel" role="tabpanel" aria-labelledby="amenities-tab">
            <div class="row g-4">
                <!-- Add Amenity Form -->
                <div class="col-lg-4">
                    <div class="feature-box h-auto">
                        <div class="card-header bg-transparent border-secondary text-main fw-bold px-0 pt-0 pb-3">
                            Add New Amenity
                        </div>
                        <div class="card-body px-0 pb-0">
                            <form action="{{ route('amenities.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label small">Amenity Name</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="e.g. Swimming Pool" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">Bootstrap Icon Class</label>
                                    <input type="text" name="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ old('icon') }}" placeholder="e.g. bi-droplet">
                                    @error('icon')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-consult w-100 fw-bold mt-2">Save Amenity</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Amenities List -->
                <div class="col-lg-8">
                    <div class="feature-box h-auto">
                        <div class="card-header bg-transparent border-secondary text-main fw-bold px-0 pt-0 pb-3">
                            Existing Amenities
                        </div>
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0 align-middle bg-transparent">
                                <thead class="border-bottom border-secondary text-muted-custom small">
                                    <tr>
                                        <th style="width: 70px;">ID</th>
                                        <th>Icon</th>
                                        <th>Name</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($amenities ?? [] as $amenity)
                                    <tr class="border-secondary">
                                        <td class="text-muted-custom">#{{ $amenity->id }}</td>
                                        <td><i class="bi {{ $amenity->icon ?? 'bi-check2-circle' }} fs-5 text-primary-custom"></i></td>
                                        <td class="fw-bold text-main">{{ $amenity->name }}</td>
                                        <td class="text-end">
                                            <form action="{{ route('amenities.destroy', $amenity->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this amenity?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted-custom py-4">No amenities added yet.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= 2. CITIES SECTION ================= -->
        <div class="tab-pane fade" id="cities-panel" role="tabpanel" aria-labelledby="cities-tab">
            <div class="row g-4">
                <!-- Add City Form -->
                <div class="col-lg-4">
                    <div class="feature-box h-auto">
                        <div class="card-header bg-transparent border-secondary text-main fw-bold px-0 pt-0 pb-3">
                            Add New City
                        </div>
                        <div class="card-body px-0 pb-0">
                            <form action="{{ route('cities.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label small">City Name</label>
                                    <input type="text" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}" placeholder="e.g. Multan" required>
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small">State / Region</label>
                                    <input type="text" name="state" class="form-control @error('state') is-invalid @enderror" value="{{ old('state') }}" placeholder="e.g. Punjab">
                                    @error('state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                               
                                <button type="submit" class="btn btn-consult w-100 fw-bold mt-2">Save City</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Cities List -->
                <div class="col-lg-8">
                    <div class="feature-box h-auto">
                        <div class="card-header bg-transparent border-secondary text-main fw-bold px-0 pt-0 pb-3">
                            Existing Cities
                        </div>
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0 align-middle bg-transparent">
                                <thead class="border-bottom border-secondary text-muted-custom small">
                                    <tr>
                                        <th>City Name</th>
                                        <th>State</th>
                                   
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($cities ?? [] as $city)
                                    <tr class="border-secondary">
                                        <td class="fw-bold text-main">{{ $city->city }}</td>
                                        <td class="text-muted-custom">{{ $city->state ?? '—' }}</td>
                                        
                                        <td class="text-end">
                                            <form action="{{ route('cities.destroy', $city->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this city?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted-custom py-4">No cities added yet.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('#cmsTabs button[data-bs-toggle="tab"]');
    const tabPanes = document.querySelectorAll('.tab-content .tab-pane');

    function activateTab(targetSelector) {
        const targetPane = document.querySelector(targetSelector);
        const activeTabBtn = document.querySelector(`#cmsTabs button[data-bs-target="${targetSelector}"]`);

        if (!targetPane || !activeTabBtn) return;

        tabs.forEach(t => {
            t.classList.remove('active', 'text-main');
            t.classList.add('text-muted-custom');
            t.setAttribute('aria-selected', 'false');
        });

        activeTabBtn.classList.add('active', 'text-main');
        activeTabBtn.classList.remove('text-muted-custom');
        activeTabBtn.setAttribute('aria-selected', 'true');

        tabPanes.forEach(pane => {
            pane.classList.remove('show', 'active');
        });

        targetPane.classList.add('show', 'active');
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            const targetSelector = this.getAttribute('data-bs-target');
            activateTab(targetSelector);
            history.replaceState(null, null, targetSelector);
        });
    });

    if (window.location.hash) {
        activateTab(window.location.hash);
    }
});
</script>