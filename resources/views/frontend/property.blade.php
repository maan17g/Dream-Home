@include('frontend.layout.header',['title'=>'Properties - Dream Home'])
  <!-- HERO -->
  <section class="hero-section">
    <div class="hero-bg-prop"></div>
    <div class="hero-overlay"></div>
    <div class="container hero-content">
      <div class="col-lg-8">
        <span class="text-primary-custom text-uppercase fw-bold small letter-spacing-2 mb-2 d-block">Properties</span>
        <h1 class="hero-title mb-3">Find your Perfect <br><span>Dream Home</span></h1>
        <p class="hero-desc mb-4">Explore verified listings, get expert guidance, and find the property that fits your lifestyle perfectly.</p>
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

      <!-- SMART FILTERS -->
      <section class="filter-top-wrap mb-4">
        <div class="filter-top-head d-flex justify-content-between align-items-center">
          <h5 class="mb-0"><i class="bi bi-sliders me-2"></i>Smart Filters</h5>
          <button type="button" class="btn-reset-all" id="btnResetAll"><i class="bi bi-arrow-clockwise me-1"></i> Reset All</button>
        </div>
        <div class="filter-top-grid">
          <div class="filter-group">
            <label for="searchInput">Search</label>
            <input type="text" class="form-control" placeholder="Search by title or location..." id="searchInput">
          </div>
          <div class="filter-group">
            <label for="propertyType">Property Type</label>
            <select class="form-select" id="propertyType">
              <option value="">All Types</option>
              <option value="apartment">Apartment</option>
              <option value="villa">Villa</option>
              <option value="townhouse">Townhouse</option>
              <option value="penthouse">Penthouse</option>
              <option value="office">Office</option>
            </select>
          </div>
          <div class="filter-group">
            <label for="bedrooms">Bedrooms</label>
            <select class="form-select" id="bedrooms">
              <option value="">Any</option>
              <option value="1">1+</option>
              <option value="2">2+</option>
              <option value="3">3+</option>
              <option value="4">4+</option>
              <option value="5">5+</option>
            </select>
          </div>
          <div class="filter-group">
            <label for="bathrooms">Bathrooms</label>
            <select class="form-select" id="bathrooms">
              <option value="">Any</option>
              <option value="1">1+</option>
              <option value="2">2+</option>
              <option value="3">3+</option>
              <option value="4">4+</option>
            </select>
          </div>
          <div class="filter-group">
            <label for="minArea">Min Area (sqft)</label>
            <input type="number" class="form-control" placeholder="e.g. 1000" id="minArea">
          </div>
          <div class="filter-group filter-status">
            <label>Status</label>
            <div class="status-pills">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="sale" id="statusSale">
                <label class="form-check-label" for="statusSale">For Sale</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="rent" id="statusRent">
                <label class="form-check-label" for="statusRent">For Rent</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="new" id="statusNew">
                <label class="form-check-label" for="statusNew">New Listing</label>
              </div>
            </div>
          </div>
          <div class="filter-group filter-price">
            <label for="priceRange">Price Range</label>
            <div class="d-flex justify-content-between mb-2">
              <span class="range-value" id="currentValue">$0</span>
              <span class="range-value" id="priceValue">$5,000,000</span>
            </div>
            <input type="range" class="form-range" min="0" max="5000000" step="100000" value="5000000" id="priceRange">
          </div>
          <div class="filter-actions">
            <button class="btn-filter"><i class="bi bi-search me-2"></i> Apply Filters</button>
          </div>
        </div>
      </section>

      <!-- RESULTS + SORT -->
      <section>
        <div class="sort-dropdown d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
          <p class="results-count mb-0">Showing <span id="resultCount">12</span> properties</p>
          <select class="form-select w-auto" id="sortBy">
            <option value="featured">Featured</option>
            <option value="price-low">Price: Low to High</option>
            <option value="price-high">Price: High to Low</option>
            <option value="newest">Newest First</option>
            <option value="beds">Most Bedrooms</option>
          </select>
        </div>

        <div class="row g-4" id="propertiesGrid">
          <!-- Loaded by JS -->
        </div>

        <nav aria-label="Properties pagination" class="mt-5">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
          </ul>
        </nav>
      </section>
    </div>
  </main>

  <!-- PROPERTY ALERTS BANNER -->
  <section class="alerts-banner-section">
    <div class="container">
      <div class="alerts-banner">
        <div class="alerts-banner-icon"><i class="bi bi-envelope-heart-fill"></i></div>
        <div class="alerts-banner-text">
          <h4>Get New Property Alerts</h4>
          <p>Be the first to know about new listings that match your dream home criteria.</p>
        </div>
        <form class="alerts-banner-form">
          <input type="email" class="form-control" placeholder="Enter your email address" required>
          <button type="submit" class="btn-alerts-subscribe">Subscribe</button>
        </form>
      </div>
      <p class="alerts-banner-note"><i class="bi bi-shield-check me-1"></i>No spam, unsubscribe anytime.</p>
    </div>
  </section>

  <!-- ===================== FOOTER ===================== -->
  @include('frontend.layout.footer')