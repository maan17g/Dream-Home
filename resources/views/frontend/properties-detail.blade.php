@include('frontend.layout.header',['title'=>'Modern Luxury Villa - Dream Home'])

  <!-- BREADCRUMB -->
  <div class="breadcrumb-wrap">
    <div class="container">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="property.html">Properties</a></li>
          <li class="breadcrumb-item active">Modern Luxury Villa</li>
        </ol>
      </nav>
    </div>
  </div>

  <main>
    <!-- GALLERY -->
    <section class="gallery-section">
      <div class="container">
        <div class="row g-3">
          <div class="col-lg-8">
            <div class="gallery-main" onclick="openLightbox(0)">
              <img id="mainGalleryImg"
                src="https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=80"
                alt="Modern Luxury Villa">
              <span class="gallery-count-badge"><i class="bi bi-images me-1"></i> 8 Photos</span>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="gallery-thumbs">
              <div class="gallery-thumb" onclick="openLightbox(1)">
                <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=600&q=80" alt="Interior">
              </div>
              <div class="gallery-thumb" onclick="openLightbox(2)">
                <img src="https://images.unsplash.com/photo-1600566752355-35792bedcfea?auto=format&fit=crop&w=600&q=80" alt="Living Room">
              </div>
              <div class="gallery-thumb" onclick="openLightbox(3)">
                <img src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=600&q=80" alt="Kitchen">
              </div>
              <div class="gallery-thumb last-thumb" data-more="4" onclick="openLightbox(4)">
                <img src="https://images.unsplash.com/photo-1600047509358-9dc75507daeb?auto=format&fit=crop&w=600&q=80" alt="Pool">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- DETAIL CONTENT -->
    <section class="detail-section">
      <div class="container">
        <div class="row g-4">

          <!-- LEFT: Main Info -->
          <div class="col-lg-8">

            <!-- Share Bar -->
            <div class="share-bar">
              <span>Share:</span>
              <button class="share-btn" title="Facebook"><i class="fab fa-facebook-f"></i></button>
              <button class="share-btn" title="Twitter"><i class="fab fa-x-twitter"></i></button>
              <button class="share-btn" title="WhatsApp"><i class="fab fa-whatsapp"></i></button>
              <button class="share-btn" title="LinkedIn"><i class="fab fa-linkedin-in"></i></button>
              <button class="share-btn" title="Copy Link" onclick="copyLink()"><i class="bi bi-link-45deg"></i></button>
              <span id="copyMsg" style="color:var(--primary);font-size:0.8rem;display:none;">Link copied!</span>
            </div>

            <!-- Title -->
            <h1 class="prop-title">Modern Luxury Villa</h1>
            <p class="prop-location"><i class="bi bi-geo-alt-fill"></i> 9876 Sunset Blvd, Beverly Hills, CA 90210</p>
            <div class="prop-badges">
              <span class="prop-badge sale"><i class="bi bi-tag me-1"></i>For Sale</span>
              <span class="prop-badge featured"><i class="bi bi-star me-1"></i>Featured</span>
              <span class="prop-badge verified"><i class="bi bi-patch-check me-1"></i>Verified</span>
            </div>

            <!-- Quick Stats -->
            <div class="quick-stats">
              <div class="stat-box"><i class="bi bi-door-open"></i><strong>5</strong><span>Bedrooms</span></div>
              <div class="stat-box"><i class="bi bi-droplet-half"></i><strong>4</strong><span>Bathrooms</span></div>
              <div class="stat-box"><i class="bi bi-arrows-fullscreen"></i><strong>4,500</strong><span>Sq Ft</span></div>
              <div class="stat-box"><i class="bi bi-car-front"></i><strong>2</strong><span>Parking</span></div>
              <div class="stat-box"><i class="bi bi-building"></i><strong>2</strong><span>Floors</span></div>
              <div class="stat-box"><i class="bi bi-calendar3"></i><strong>2019</strong><span>Year Built</span></div>
            </div>

            <!-- Description -->
            <h5 class="detail-heading"><i class="bi bi-file-text"></i> Description</h5>
            <p class="desc-text" id="descText">
              Welcome to this stunning modern luxury villa nestled in the prestigious Beverly Hills neighborhood. This architectural masterpiece boasts floor-to-ceiling windows that flood the interiors with natural light, creating a seamless indoor-outdoor living experience. The open-plan living and dining area flows effortlessly onto a sprawling terrace overlooking the sparkling infinity pool and manicured gardens.
              <span id="descMore" style="display:none;">
                The gourmet kitchen is fitted with premium European appliances, marble countertops, and a massive center island perfect for entertaining. Five generously proportioned bedrooms each feature en-suite bathrooms with designer fixtures. The master suite occupies the entire upper level with panoramic city views, a walk-in wardrobe, and a spa-like bathroom with a soaking tub and rain shower. The property also includes a home cinema, wine cellar, gym, and smart home automation system throughout.
              </span>
            </p>
            <button class="read-more-btn" id="readMoreBtn" onclick="toggleDesc()">
              Read More <i class="bi bi-chevron-down"></i>
            </button>

            <!-- Property Details -->
            <h5 class="detail-heading mt-4"><i class="bi bi-list-check"></i> Property Details</h5>
            <div class="prop-details-grid">
              <div class="prop-detail-item"><i class="bi bi-house"></i><div><span class="detail-label">Property Type</span><span class="detail-val">Villa</span></div></div>
              <div class="prop-detail-item"><i class="bi bi-rulers"></i><div><span class="detail-label">Property Size</span><span class="detail-val">4,500 sqft</span></div></div>
              <div class="prop-detail-item"><i class="bi bi-calendar3"></i><div><span class="detail-label">Year Built</span><span class="detail-val">2019</span></div></div>
              <div class="prop-detail-item"><i class="bi bi-layers"></i><div><span class="detail-label">Total Floors</span><span class="detail-val">2 Floors</span></div></div>
              <div class="prop-detail-item"><i class="bi bi-car-front"></i><div><span class="detail-label">Parking Spaces</span><span class="detail-val">2 Cars</span></div></div>
              <div class="prop-detail-item"><i class="bi bi-lightbulb"></i><div><span class="detail-label">Furnishing</span><span class="detail-val">Fully Furnished</span></div></div>
              <div class="prop-detail-item"><i class="bi bi-thermometer-sun"></i><div><span class="detail-label">Heating / Cooling</span><span class="detail-val">Central HVAC</span></div></div>
              <div class="prop-detail-item"><i class="bi bi-shield-check"></i><div><span class="detail-label">Security</span><span class="detail-val">24/7 Gated</span></div></div>
              <div class="prop-detail-item"><i class="bi bi-wifi"></i><div><span class="detail-label">Internet</span><span class="detail-val">Fiber Optic</span></div></div>
              <div class="prop-detail-item"><i class="bi bi-cash-coin"></i><div><span class="detail-label">HOA Fees</span><span class="detail-val">$450 / mo</span></div></div>
            </div>

            <!-- Amenities -->
            <h5 class="detail-heading mt-4"><i class="bi bi-stars"></i> Amenities</h5>
            <div class="amenities-grid">
              <div class="amenity-item"><i class="bi bi-water"></i> Swimming Pool</div>
              <div class="amenity-item"><i class="bi bi-activity"></i> Fitness Gym</div>
              <div class="amenity-item"><i class="bi bi-shield-check"></i> 24/7 Security</div>
              <div class="amenity-item"><i class="bi bi-wifi"></i> High-Speed WiFi</div>
              <div class="amenity-item"><i class="bi bi-camera-video"></i> Home Cinema</div>
              <div class="amenity-item"><i class="bi bi-cup-hot"></i> Coffee Bar</div>
              <div class="amenity-item"><i class="bi bi-tree"></i> Garden</div>
              <div class="amenity-item"><i class="bi bi-car-front"></i> Garage</div>
              <div class="amenity-item"><i class="bi bi-lightning-charge"></i> Smart Home</div>
              <div class="amenity-item"><i class="bi bi-wind"></i> Air Conditioning</div>
              <div class="amenity-item"><i class="bi bi-journal-bookmark"></i> Wine Cellar</div>
              <div class="amenity-item"><i class="bi bi-sun"></i> Rooftop Terrace</div>
            </div>

            <!-- Floor Plan -->
            <h5 class="detail-heading mt-4"><i class="bi bi-grid-1x2"></i> Floor Plan</h5>
            <div class="floor-plan-wrap">
              <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?auto=format&fit=crop&w=800&q=80" alt="Floor Plan">
              <p class="text-muted-custom small mt-2 mb-0">Ground Floor — 2,200 sqft &nbsp;|&nbsp; Upper Floor — 2,300 sqft</p>
            </div>

            <!-- Map -->
            <h5 class="detail-heading mt-4"><i class="bi bi-geo-alt"></i> Location</h5>
            <div class="map-detail-wrap">
              <div class="ratio ratio-16x9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3305.5760958456617!2d-118.40022092357376!3d34.073621573099894!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bc04d6d147ab%3A0xd6c7c379fd081ed1!2sBeverly%20Hills%2C%20CA%2090210!5e0!3m2!1sen!2sus!4v1700000000000"
                  loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
            <p class="text-muted-custom small mt-2">
              <i class="bi bi-geo-alt text-primary-custom me-1"></i>
              0.3 mi to Beverly Hills High School &nbsp;|&nbsp;
              0.5 mi to Cedars-Sinai &nbsp;|&nbsp;
              1.2 mi to Beverly Center Mall
            </p>

          </div><!-- /LEFT -->

          <!-- RIGHT SIDEBAR -->
          <div class="col-lg-4">

            <!-- Price Card -->
            <div class="price-card">
              <div class="price-main">$850,000</div>
              <div class="price-label">For Sale &nbsp;·&nbsp; Updated 2 days ago</div>
              <button class="btn-book-viewing" onclick="document.getElementById('bookingModal').style.display='flex'">
                <i class="bi bi-calendar-check"></i> Book a Viewing
              </button>
              <button class="btn-save-prop" id="saveBtn" onclick="toggleSave()">
                <i class="bi bi-heart" id="saveIcon"></i> <span id="saveText">Save Property</span>
              </button>
              <div class="price-meta">
                <div class="price-meta-item"><span>Price per sqft</span><strong>$189</strong></div>
                <div class="price-meta-item"><span>Property Tax</span><strong>$9,200/yr</strong></div>
                <div class="price-meta-item"><span>Listed</span><strong>14 days</strong></div>
              </div>
            </div>

            <!-- Agent Card -->
            <div class="agent-card">
              <div class="agent-card-header">
                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=200&q=80" class="agent-avatar" alt="James Carter">
                <div>
                  <p class="agent-name">James Carter</p>
                  <div class="agent-title">Senior Real Estate Agent</div>
                  <div class="agent-rating">
                    <span>★★★★★</span> 4.9 (127 reviews)
                  </div>
                </div>
              </div>
              <button class="btn-agent-call"><i class="bi bi-telephone-fill"></i> (310) 555-0100</button>
              <button class="btn-agent-msg"><i class="bi bi-envelope"></i> Send Message</button>
              <a href="agent-profile.html" class="d-block text-center text-primary-custom small mt-2" style="text-decoration:none;">
                View Full Profile →
              </a>
            </div>

            <!-- Mortgage Calculator -->
            <div class="mortgage-card">
              <h6><i class="bi bi-calculator text-primary-custom me-2"></i>Mortgage Calculator</h6>
              <div class="mb-2">
                <label>Home Price ($)</label>
                <input type="number" class="form-control" id="calcPrice" value="850000" oninput="calcMortgage()">
              </div>
              <div class="mb-2">
                <label>Down Payment (%)</label>
                <input type="number" class="form-control" id="calcDown" value="20" min="0" max="100" oninput="calcMortgage()">
              </div>
              <div class="mb-2">
                <label>Interest Rate (%)</label>
                <input type="number" class="form-control" id="calcRate" value="6.5" step="0.1" oninput="calcMortgage()">
              </div>
              <div class="mb-2">
                <label>Loan Term (years)</label>
                <select class="form-select" id="calcTerm" onchange="calcMortgage()">
                  <option value="30" selected>30 Years</option>
                  <option value="20">20 Years</option>
                  <option value="15">15 Years</option>
                  <option value="10">10 Years</option>
                </select>
              </div>
              <div class="mortgage-result">
                <div class="mortgage-monthly" id="monthlyPayment">$4,303</div>
                <div class="mortgage-label">Estimated Monthly Payment</div>
                <div class="mortgage-breakdown">
                  <span>Principal + Interest</span>
                  <span id="piAmount">$4,303/mo</span>
                </div>
                <div class="mortgage-breakdown">
                  <span>Loan Amount</span>
                  <span id="loanAmount">$680,000</span>
                </div>
                <div class="mortgage-breakdown">
                  <span>Total Interest</span>
                  <span id="totalInterest">$869,080</span>
                </div>
              </div>
              <p class="text-muted-custom mt-2 mb-0" style="font-size:0.72rem;">* Estimates only. Contact a lender for accurate rates.</p>
            </div>

          </div><!-- /RIGHT -->
        </div>
      </div>
    </section>

    <!-- SIMILAR PROPERTIES -->
    <section class="similar-section">
      <div class="container">
        <div class="text-start mb-4">
          <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">You May Also Like</h6>
          <h2 class="display-6 fw-bold">Similar Properties</h2>
        </div>
        <div class="row g-4" id="similarGrid"></div>
      </div>
    </section>
  </main>

  <!-- BOOKING MODAL -->
  <div id="bookingModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.7);z-index:9998;align-items:center;justify-content:center;">
    <div style="background:var(--form-bg);border:1px solid var(--border-color);border-radius:20px;padding:2rem;width:100%;max-width:480px;margin:1rem;position:relative;">
      <button onclick="document.getElementById('bookingModal').style.display='none'" style="position:absolute;top:14px;right:18px;background:none;border:none;color:var(--text-muted);font-size:1.4rem;cursor:pointer;">&times;</button>
      <h5 class="fw-bold mb-1">Book a Property Viewing</h5>
      <p class="text-muted-custom small mb-3">Modern Luxury Villa — Beverly Hills, CA</p>
      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label small">Full Name *</label>
          <input type="text" class="form-control" placeholder="Your name">
        </div>
        <div class="col-md-6">
          <label class="form-label small">Phone *</label>
          <input type="tel" class="form-control" placeholder="(555) 555-5555">
        </div>
        <div class="col-md-6">
          <label class="form-label small">Preferred Date *</label>
          <input type="date" class="form-control">
        </div>
        <div class="col-md-6">
          <label class="form-label small">Preferred Time *</label>
          <select class="form-select">
            <option>9:00 AM</option><option>10:00 AM</option>
            <option>11:00 AM</option><option>12:00 PM</option>
            <option>2:00 PM</option><option>3:00 PM</option>
            <option>4:00 PM</option>
          </select>
        </div>
        <div class="col-12">
          <label class="form-label small">Message (optional)</label>
          <textarea class="form-control" rows="3" placeholder="Any specific questions about this property?"></textarea>
        </div>
        <div class="col-12">
          <button class="btn-book-viewing w-100" onclick="bookingConfirm()">
            <i class="bi bi-calendar-check"></i> Confirm Booking
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- LIGHTBOX -->
  <div class="lightbox-overlay" id="lightbox">
    <button class="lightbox-close" onclick="closeLightbox()">&times;</button>
    <button class="lightbox-prev" onclick="lightboxNav(-1)"><i class="bi bi-chevron-left"></i></button>
    <img class="lightbox-img" id="lightboxImg" src="" alt="Gallery">
    <button class="lightbox-next" onclick="lightboxNav(1)"><i class="bi bi-chevron-right"></i></button>
  </div>

  <!-- SUCCESS TOAST -->
  <div id="successToast" style="position:fixed;bottom:2rem;right:2rem;z-index:9999;background:var(--primary);color:#fff;padding:1rem 1.5rem;border-radius:14px;box-shadow:0 10px 30px rgba(0,0,0,0.3);display:flex;align-items:center;gap:0.75rem;font-size:0.95rem;font-weight:500;transform:translateY(100px);opacity:0;transition:all 0.4s ease;font-family:var(--font-family);" id="toast">
    <i class="bi bi-check-circle-fill"></i> <span id="toastMsg">Done!</span>
  </div>

  <!-- FOOTER -->
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
            <li><a href="blog.html">Blog</a></li>
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
          <div class="footer-contact-item"><i class="bi bi-geo-alt-fill"></i><div><strong>Our Office</strong>9876 Wilshire Blvd, Suite 500<br>Beverly Hills, CA 90210</div></div>
          <div class="footer-contact-item"><i class="bi bi-telephone-fill"></i><div><strong>Phone</strong>(310) 555-0100</div></div>
          <div class="footer-contact-item"><i class="bi bi-envelope-fill"></i><div><strong>Email</strong>info@dreamhome.com</div></div>
          <div class="footer-contact-item"><i class="bi bi-clock-fill"></i><div><strong>Hours</strong>Mon–Fri: 9AM–6PM | Sat: 10AM–4PM</div></div>
        </div>
      </div>
      <hr class="footer-divider">
      <div class="footer-bottom">
        <p class="footer-copyright mb-0">&copy; 2025 <span>Dream Home</span>. All Rights Reserved.</p>
        <div class="footer-bottom-links">
          <a href="privacy-policy.html">Privacy Policy</a>
          <a href="terms-conditions.html">Terms of Service</a>
          <a href="sitemap.html">Sitemap</a>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // ── Theme Toggle ──
    const themeBtn = document.getElementById('themeToggle');
    themeBtn.addEventListener('click', () => {
      const body = document.body;
      const icon = themeBtn.querySelector('i');
      if (body.getAttribute('data-theme') === 'dark') {
        body.setAttribute('data-theme', 'light');
        icon.classList.replace('bi-sun-fill', 'bi-moon-fill');
      } else {
        body.setAttribute('data-theme', 'dark');
        icon.classList.replace('bi-moon-fill', 'bi-sun-fill');
      }
    });

    // ── Navbar Scroll ──
    window.addEventListener('scroll', () => {
      document.getElementById('navbar').classList.toggle('nav-scroll', window.scrollY > 50);
    });

    // ── Gallery Images ──
    const galleryImages = [
      'https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=1200&q=80',
      'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1200&q=80',
      'https://images.unsplash.com/photo-1600566752355-35792bedcfea?auto=format&fit=crop&w=1200&q=80',
      'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=1200&q=80',
      'https://images.unsplash.com/photo-1600047509358-9dc75507daeb?auto=format&fit=crop&w=1200&q=80',
      'https://images.unsplash.com/photo-1568605114967-8130f3a36994?auto=format&fit=crop&w=1200&q=80',
      'https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=1200&q=80',
      'https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=1200&q=80',
    ];
    let currentLightboxIndex = 0;

    function openLightbox(index) {
      currentLightboxIndex = index;
      document.getElementById('lightboxImg').src = galleryImages[index];
      document.getElementById('lightbox').classList.add('active');
      document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
      document.getElementById('lightbox').classList.remove('active');
      document.body.style.overflow = '';
    }
    function lightboxNav(dir) {
      currentLightboxIndex = (currentLightboxIndex + dir + galleryImages.length) % galleryImages.length;
      document.getElementById('lightboxImg').src = galleryImages[currentLightboxIndex];
    }
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeLightbox();
      if (e.key === 'ArrowLeft') lightboxNav(-1);
      if (e.key === 'ArrowRight') lightboxNav(1);
    });

    // ── Read More ──
    function toggleDesc() {
      const more = document.getElementById('descMore');
      const btn = document.getElementById('readMoreBtn');
      if (more.style.display === 'none') {
        more.style.display = 'inline';
        btn.innerHTML = 'Read Less <i class="bi bi-chevron-up"></i>';
      } else {
        more.style.display = 'none';
        btn.innerHTML = 'Read More <i class="bi bi-chevron-down"></i>';
      }
    }

    // ── Save Property ──
    let saved = false;
    function toggleSave() {
      saved = !saved;
      const btn = document.getElementById('saveBtn');
      const icon = document.getElementById('saveIcon');
      const text = document.getElementById('saveText');
      if (saved) {
        btn.classList.add('saved');
        icon.className = 'bi bi-heart-fill';
        text.textContent = 'Saved!';
        showToast('Property saved to your favorites!');
      } else {
        btn.classList.remove('saved');
        icon.className = 'bi bi-heart';
        text.textContent = 'Save Property';
        showToast('Removed from favorites');
      }
    }

    // ── Toast ──
    function showToast(msg) {
      const toast = document.getElementById('toast');
      document.getElementById('toastMsg').textContent = msg;
      toast.style.transform = 'translateY(0)';
      toast.style.opacity = '1';
      setTimeout(() => {
        toast.style.transform = 'translateY(100px)';
        toast.style.opacity = '0';
      }, 3000);
    }

    // ── Copy Link ──
    function copyLink() {
      navigator.clipboard.writeText(window.location.href);
      document.getElementById('copyMsg').style.display = 'inline';
      setTimeout(() => document.getElementById('copyMsg').style.display = 'none', 2000);
    }

    // ── Booking Confirm ──
    function bookingConfirm() {
      document.getElementById('bookingModal').style.display = 'none';
      showToast('Viewing booked! We\'ll confirm within 2 hours.');
    }

    // ── Mortgage Calculator ──
    function calcMortgage() {
      const price = parseFloat(document.getElementById('calcPrice').value) || 0;
      const downPct = parseFloat(document.getElementById('calcDown').value) || 0;
      const annualRate = parseFloat(document.getElementById('calcRate').value) || 0;
      const years = parseInt(document.getElementById('calcTerm').value) || 30;

      const loan = price * (1 - downPct / 100);
      const monthlyRate = annualRate / 100 / 12;
      const n = years * 12;
      let monthly = 0;
      if (monthlyRate > 0) {
        monthly = loan * (monthlyRate * Math.pow(1 + monthlyRate, n)) / (Math.pow(1 + monthlyRate, n) - 1);
      } else {
        monthly = loan / n;
      }
      const totalPaid = monthly * n;
      const totalInterest = totalPaid - loan;

      const fmt = (v) => '$' + Math.round(v).toLocaleString();
      document.getElementById('monthlyPayment').textContent = fmt(monthly);
      document.getElementById('piAmount').textContent = fmt(monthly) + '/mo';
      document.getElementById('loanAmount').textContent = fmt(loan);
      document.getElementById('totalInterest').textContent = fmt(totalInterest);
    }
    calcMortgage();

    // ── Similar Properties ──
    const similar = [
      { title: 'Ocean View Penthouse', location: 'Miami, FL', price: '$2,100,000', beds: 3, baths: 4, size: '3,200 sqft', status: 'New Listing', img: 'https://images.unsplash.com/photo-1572120360610-d971b9d7767c?auto=format&fit=crop&w=600&q=80' },
      { title: 'Waterfront Estate', location: 'Malibu, CA', price: '$3,500,000', beds: 6, baths: 5, size: '6,200 sqft', status: 'For Sale', img: 'https://images.unsplash.com/photo-1600047509358-9dc75507daeb?auto=format&fit=crop&w=600&q=80' },
      { title: 'Mountain View Chalet', location: 'Denver, CO', price: '$1,800,000', beds: 5, baths: 4, size: '4,100 sqft', status: 'For Sale', img: 'https://images.unsplash.com/photo-1600607687644-c7171b42498b?auto=format&fit=crop&w=600&q=80' },
    ];
    const grid = document.getElementById('similarGrid');
    similar.forEach(p => {
      const col = document.createElement('div');
      col.className = 'col-lg-4 col-md-6';
      col.innerHTML = `
        <a href="property-detail.html" style="text-decoration:none;">
          <div class="card property-card border-0 h-100">
            <div class="card-image-wrapper position-relative">
              <span class="badge-custom position-absolute top-0 start-0 m-3">${p.status}</span>
              <span class="badge-price position-absolute bottom-0 end-0 m-3">${p.price}</span>
              <img src="${p.img}" alt="${p.title}" loading="lazy">
            </div>
            <div class="card-body p-4">
              <h5 class="card-title mb-2">${p.title}</h5>
              <p class="card-location mb-3 d-flex align-items-center">
                <i class="bi bi-geo-alt-fill me-2"></i>${p.location}
              </p>
              <div class="card-features d-flex justify-content-between pt-3 feature-border">
                <div class="feature-item d-flex align-items-center gap-1"><i class="bi bi-door-open"></i>${p.beds} Beds</div>
                <div class="feature-item d-flex align-items-center gap-1"><i class="bi bi-droplet-half"></i>${p.baths} Baths</div>
                <div class="feature-item d-flex align-items-center gap-1"><i class="bi bi-arrows-fullscreen"></i>${p.size}</div>
              </div>
            </div>
          </div>
        </a>`;
      grid.appendChild(col);
    });
  </script>
</body>
</html>