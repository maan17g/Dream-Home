<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Properties - Dream Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body data-theme="dark">

  <!-- NAVBAR -->
  <header>
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="index.html">
          <i class="bi bi-house-door-fill"></i> Real Estate
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-lg-4">
            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
            <li class="nav-item"><a class="nav-link active" href="property.html">Properties</a></li>
            <li class="nav-item"><a class="nav-link" href="about.html">About Us</a></li>
            <li class="nav-item"><a class="nav-link" href="contact-us.html">Contact</a></li>
          </ul>
          <div class="d-flex align-items-center gap-3 flex-column flex-lg-row mt-3 mt-lg-0">
            <button class="theme-toggle-btn" id="themeToggle" title="Toggle Light/Dark Mode">
              <i class="bi bi-sun-fill"></i>
            </button>
            <a href="login.html" class="nav-link fw-bold">Login</a>
            <a href="contact-us.html" class="btn btn-consult shadow-sm"><i class="bi bi-telephone me-2"></i> Consult</a>
          </div>
        </div>
      </div>
    </nav>
  </header>

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
            <button class="btn-reset"><i class="bi bi-arrow-clockwise me-2"></i> Reset</button>
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
  <footer class="footer">
    <div class="container">
      <div class="row g-5">
        <div class="col-lg-4 col-md-6">
          <a href="index.html" class="footer-brand"><i class="bi bi-house-door-fill"></i> Real Estate</a>
          <p class="footer-tagline">Building places you're proud to call home — today, tomorrow, and for every milestone in between.</p>
          <p class="footer-heading mb-2">Stay Updated</p>
          <div class="footer-newsletter">
            <input type="email" class="form-control" placeholder="Your email address">
            <button class="footer-newsletter-btn" type="button"><i class="bi bi-send-fill"></i></button>
          </div>
          <div class="footer-socials">
            <a href="#" class="footer-social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="footer-social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="footer-social-icon"><i class="fab fa-x-twitter"></i></a>
            <a href="#" class="footer-social-icon"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="footer-social-icon"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-6">
          <h6 class="footer-heading">Quick Links</h6>
          <ul class="footer-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="property.html">Properties</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact-us.html">Contact</a></li>
            <li><a href="#">Blog</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-3 col-6">
          <h6 class="footer-heading">Property Types</h6>
          <ul class="footer-links">
            <li><a href="property.html">Apartments</a></li>
            <li><a href="property.html">Villas</a></li>
            <li><a href="property.html">Townhouses</a></li>
            <li><a href="property.html">Penthouses</a></li>
            <li><a href="property.html">Office Spaces</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6">
          <h6 class="footer-heading">Contact Us</h6>
          <div class="footer-contact-item">
            <i class="bi bi-geo-alt-fill"></i>
            <div><strong>Our Office</strong>9876 Wilshire Blvd, Suite 500<br>Beverly Hills, CA 90210</div>
          </div>
          <div class="footer-contact-item">
            <i class="bi bi-telephone-fill"></i>
            <div><strong>Phone</strong>(310) 555-0100</div>
          </div>
          <div class="footer-contact-item">
            <i class="bi bi-envelope-fill"></i>
            <div><strong>Email</strong>info@dreamhome.com</div>
          </div>
          <div class="footer-contact-item">
            <i class="bi bi-clock-fill"></i>
            <div><strong>Hours</strong>Mon–Fri: 9AM–6PM &nbsp;|&nbsp; Sat: 10AM–4PM</div>
          </div>
        </div>
      </div>
      <hr class="footer-divider">
      <div class="footer-bottom">
        <p class="footer-copyright mb-0">&copy; 2025 <span>Dream Home</span>. All Rights Reserved. Built with care.</p>
        <div class="footer-bottom-links">
          <a href="#">Privacy Policy</a>
          <a href="#">Terms of Service</a>
          <a href="#">Sitemap</a>
        </div>
      </div>
    </div>
  </footer>
  <!-- ===================== / FOOTER ===================== -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="public/js/script.js"></script>
</body>
</html>