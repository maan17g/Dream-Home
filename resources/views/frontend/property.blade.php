@include('frontend.layout.header', ['title' => 'Properties - Dream Home'])

<!-- HERO -->
<section class="hero-section">
    <div class="hero-bg-prop"></div>
    <div class="hero-overlay"></div>
    <div class="container hero-content">
        <div class="col-lg-8">
            <span
                class="text-primary-custom text-uppercase fw-bold small letter-spacing-2 mb-2 d-block">Properties</span>
            <h1 class="hero-title mb-3">Find your Perfect <br><span>Dream Home</span></h1>
            <p class="hero-desc mb-4">Explore verified listings, get expert guidance, and find the property that fits
                your lifestyle perfectly.</p>
            <div class="d-flex align-items-center gap-4 hero-proof-row">
                <div class="avatar-stack">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Client">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Client">
                    <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Client">
                </div>
                <div class="hero-proof-item">
                    <strong>10K+</strong>
                    <span>Happy Customers</span>
                </div>
                <div class="hero-proof-divider"></div>
                <div class="hero-proof-item">
                    <strong><i class="bi bi-star-fill text-warning"></i> 4.9</strong>
                    <span>Average Rating</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT -->
<main class="py-5">
    <div class="container">

        <!-- GLOBAL SESSION ERROR ALERT -->
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- VALIDATION ERRORS SUMMARY BANNER -->
        @if ($errors->any())
            <div class="alert alert-danger mb-4">
                <div class="fw-bold mb-1"><i class="bi bi-x-circle me-1"></i> Please correct the following search
                    issues:</div>
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- SMART FILTERS FORM -->
       <!-- SMART FILTERS FORM -->
<section class="filter-top-wrap mb-4">
    <form action="{{ route('property.search') }}" method="GET" id="filterForm">
 
        <div class="filter-top-head d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-sliders me-2"></i>Smart Filters</h5>
            <button type="reset" class="btn-reset-all text-decoration-none" id="btnResetAll">
                <i class="bi bi-arrow-clockwise me-1"></i> Reset All
            </button>
        </div>

        <div class="filter-top-grid">
            
            <!-- Search Input -->
            <div class="filter-group">
                <label for="searchInput">Search</label>
                <input type="text" name="search" class="form-control @error('search') is-invalid @enderror" 
                    placeholder="Search by title..." id="searchInput" value="{{ request('search') }}">
                @error('search')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- NEW: Location (City) Dropdown -->
            <div class="filter-group">
                <label for="cityInput">Location</label>
                <select name="city" class="form-select @error('city') is-invalid @enderror" id="cityInput">
                    <option value="">All Locations</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                            {{ $city }}
                        </option>
                    @endforeach
                </select>
                @error('city')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Property Type -->
            <div class="filter-group">
                <label for="propertyType">Property Type</label>
                <select name="type" class="form-select @error('type') is-invalid @enderror" id="propertyType">
                    <option value="">All Types</option>
                    <option value="apartment" {{ request('type') == 'apartment' ? 'selected' : '' }}>Apartment</option>
                    <option value="villa" {{ request('type') == 'villa' ? 'selected' : '' }}>Villa</option>
                    <option value="house" {{ request('type') == 'house' ? 'selected' : '' }}>House</option>
                    <option value="land" {{ request('type') == 'land' ? 'selected' : '' }}>Land</option>
                    <option value="office" {{ request('type') == 'office' ? 'selected' : '' }}>Office</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bedrooms -->
            <div class="filter-group">
                <label for="bedrooms">Bedrooms</label>
                <select name="bedrooms" class="form-select @error('bedrooms') is-invalid @enderror" id="bedrooms">
                    <option value="">Any</option>
                    <option value="1" {{ request('bedrooms') == '1' ? 'selected' : '' }}>1+</option>
                    <option value="2" {{ request('bedrooms') == '2' ? 'selected' : '' }}>2+</option>
                    <option value="3" {{ request('bedrooms') == '3' ? 'selected' : '' }}>3+</option>
                    <option value="4" {{ request('bedrooms') == '4' ? 'selected' : '' }}>4+</option>
                    <option value="5" {{ request('bedrooms') == '5' ? 'selected' : '' }}>5+</option>
                </select>
                @error('bedrooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Bathrooms -->
            <div class="filter-group">
                <label for="bathrooms">Bathrooms</label>
                <select name="bathrooms" class="form-select @error('bathrooms') is-invalid @enderror" id="bathrooms">
                    <option value="">Any</option>
                    <option value="1" {{ request('bathrooms') == '1' ? 'selected' : '' }}>1+</option>
                    <option value="2" {{ request('bathrooms') == '2' ? 'selected' : '' }}>2+</option>
                    <option value="3" {{ request('bathrooms') == '3' ? 'selected' : '' }}>3+</option>
                    <option value="4" {{ request('bathrooms') == '4' ? 'selected' : '' }}>4+</option>
                </select>
                @error('bathrooms')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Min Area -->
            <div class="filter-group">
                <label for="minArea">Min Area (sqft)</label>
                <input type="number" name="min_area" class="form-control @error('min_area') is-invalid @enderror" 
                    placeholder="e.g. 1000" id="minArea" value="{{ request('min_area') }}">
                @error('min_area')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Purpose (Sale / Rent) -->
            <div class="filter-grou">
                <label>Purpose</label>
                <div class="status-pills">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="purpose[]" value="sale" id="statusSale"
                            {{ is_array(request('purpose')) && in_array('sale', request('purpose')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="statusSale">For Sale</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="purpose[]" value="rent" id="statusRent"
                            {{ is_array(request('purpose')) && in_array('rent', request('purpose')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="statusRent">For Rent</label>
                    </div>
                </div>
                @error('purpose')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Price Range -->
            <div class="filter-group filter-price">
                <label for="priceRange">Max Price</label>
                <div class="d-flex justify-content-between mb-2">
                    <span class="range-value">$0</span>
                    <span class="range-value" id="priceValue">${{ number_format(request('max_price', 50000)) }}</span>
                </div>
                <input 
                    type="range" 
                    class="form-range @error('max_price') is-invalid @enderror" 
                    name="max_price" 
                    min="0" 
                    max="50000" 
                    step="50"
                    value="{{ request('max_price', 50000) }}" 
                    id="priceRange"
                    oninput="document.getElementById('priceValue').innerText = '$' + Number(this.value).toLocaleString()"
                >
                @error('max_price')
                    <div class="text-danger small mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="filter-actions">
                <button type="submit" class="btn-filter"><i class="bi bi-search me-2"></i> Apply Filters</button>
            </div>
        </div>

        <input type="hidden" name="sort" id="hiddenSort" value="{{ request('sort', 'featured') }}">
    
    </form>
</section>
        <!-- RESULTS + SORT -->
        <section>
            <div class="sort-dropdown d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <p class="results-count mb-0">
                    {{-- Showing <span>{{ $properties->firstItem() ?? 0 }}</span> - <span>{{ $properties->lastItem() ?? 0 }}</span> of <span>{{ $properties->total() }}</span> properties --}}
                </p>
                <select class="form-select w-auto" id="sortBy"
                    onchange="document.getElementById('hiddenSort').value = this.value; document.getElementById('filterForm').submit();">
                    <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>Featured</option>
                    <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Price: Low to
                        High</option>
                    <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Price: High to
                        Low</option>
                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                    <option value="beds" {{ request('sort') == 'beds' ? 'selected' : '' }}>Most Bedrooms</option>
                </select>
            </div>

            <!-- EMPTY RESULTS / PROPERTY LIST GRID -->
            <div class="row g-4" id="propertiesGrid">
                @forelse ($properties as $property)
                    <x-property :property="$property" />
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-building-exclamation display-4 text-muted"></i>
                        <h4 class="mt-3">No properties found</h4>
                        <p class="text-muted">Try adjusting your filters or resetting them to find matching properties.
                        </p>
                        <a href="{{ route('property.index') }}" class="btn btn-outline-primary mt-2">
                            <i class="bi bi-arrow-clockwise me-1"></i> Reset Filters
                        </a>
                    </div>
                @endforelse
            </div>

            <!-- DYNAMIC PAGINATION -->
            <div class="mt-5 d-flex justify-content-center">
                {{-- {{ $properties->links() }} --}}
            </div>
        </section>
    </div>
</main>

@include('frontend.layout.footer')
