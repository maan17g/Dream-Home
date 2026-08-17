<?php echo $__env->make('frontend.layout.header',['title'=>'Blog | Dream Home Real Estate'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>


<!-- HERO -->
<header class="hero-section">
  <div class="hero-bg-prop"></div>
  <div class="hero-overlay"></div>
  <div class="container hero-content">
    <span class="trust-badge"><span class="trust-dot"></span>Insights, Tips & Market Trends</span>
    <h1 class="hero-title">Our <span>Blog</span></h1>
    <p class="hero-desc">Real estate news, buying guides, and market analysis to help you make smarter decisions.</p>
  </div>
</header>

<!-- FILTER ROW -->
<section class="py-5" style="background-color:var(--bg-body);">
  <div class="container">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-5">
      <div class="cat-pills">
        <a href="#" class="cat-pill active">All Posts</a>
        <a href="#" class="cat-pill">Buying Tips</a>
        <a href="#" class="cat-pill">Market Trends</a>
        <a href="#" class="cat-pill">Selling</a>
        <a href="#" class="cat-pill">Investing</a>
      </div>
      <div class="blog-search position-relative w-100">
        <input type="text" class="form-control" placeholder="Search articles...">
      </div>
    </div>

    <!-- BLOG GRID -->
    <div class="row g-4">
      <div class="col-md-6 col-lg-4">
        <a href="blog-post.html" class="text-decoration-none">
          <div class="blog-card">
            <div class="blog-img-wrap"><img src="https://images.unsplash.com/photo-1560518883-ce09059eeffa?auto=format&fit=crop&w=500&q=70" alt=""></div>
            <div class="blog-body">
              <div class="blog-meta"><span><i class="bi bi-calendar3"></i> May 20, 2024</span><span><i class="bi bi-clock"></i> 6 min read</span></div>
              <div class="blog-title text-primary-custom mb-2" style="color:var(--primary);font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Buying Tips</div>
              <div class="blog-title">10 Tips for First-Time Home Buyers</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="blog-post.html" class="text-decoration-none">
          <div class="blog-card">
            <div class="blog-img-wrap"><img src="https://images.unsplash.com/photo-1560184897-ae75f418493e?auto=format&fit=crop&w=500&q=70" alt=""></div>
            <div class="blog-body">
              <div class="blog-meta"><span><i class="bi bi-calendar3"></i> May 15, 2024</span><span><i class="bi bi-clock"></i> 8 min read</span></div>
              <div class="mb-2" style="color:var(--primary);font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Market Trends</div>
              <div class="blog-title">Luxury Real Estate Market Trends in 2026</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="blog-post.html" class="text-decoration-none">
          <div class="blog-card">
            <div class="blog-img-wrap"><img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=500&q=70" alt=""></div>
            <div class="blog-body">
              <div class="blog-meta"><span><i class="bi bi-calendar3"></i> May 10, 2024</span><span><i class="bi bi-clock"></i> 5 min read</span></div>
              <div class="mb-2" style="color:var(--primary);font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Selling</div>
              <div class="blog-title">How to Increase Property Value Before Selling</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="blog-post.html" class="text-decoration-none">
          <div class="blog-card">
            <div class="blog-img-wrap"><img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=500&q=70" alt=""></div>
            <div class="blog-body">
              <div class="blog-meta"><span><i class="bi bi-calendar3"></i> May 5, 2024</span><span><i class="bi bi-clock"></i> 7 min read</span></div>
              <div class="mb-2" style="color:var(--primary);font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Investing</div>
              <div class="blog-title">Is Rental Property Still a Good Investment in 2026?</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="blog-post.html" class="text-decoration-none">
          <div class="blog-card">
            <div class="blog-img-wrap"><img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=500&q=70" alt=""></div>
            <div class="blog-body">
              <div class="blog-meta"><span><i class="bi bi-calendar3"></i> Apr 28, 2024</span><span><i class="bi bi-clock"></i> 4 min read</span></div>
              <div class="mb-2" style="color:var(--primary);font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Buying Tips</div>
              <div class="blog-title">Mortgage Pre-Approval: What You Need to Know</div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-6 col-lg-4">
        <a href="blog-post.html" class="text-decoration-none">
          <div class="blog-card">
            <div class="blog-img-wrap"><img src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?auto=format&fit=crop&w=500&q=70" alt=""></div>
            <div class="blog-body">
              <div class="blog-meta"><span><i class="bi bi-calendar3"></i> Apr 20, 2024</span><span><i class="bi bi-clock"></i> 6 min read</span></div>
              <div class="mb-2" style="color:var(--primary);font-size:.72rem;font-weight:700;text-transform:uppercase;letter-spacing:1px;">Market Trends</div>
              <div class="blog-title">Which Cities Are Seeing the Fastest Price Growth?</div>
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- PAGINATION -->
    <nav class="mt-5">
      <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  </div>
</section>

<!-- NEWSLETTER CTA -->
<section class="cta-section">
  <div class="container">
    <div class="cta-box">
      <span class="section-line"></span><span class="text-primary-custom fw-semibold">Stay Updated</span>
      <h2 class="editorial-title mt-2">Get New Articles In Your Inbox</h2>
      <p class="text-muted-custom mb-4">No spam — just useful real estate insights, once a week.</p>
      <div class="d-flex justify-content-center gap-2 flex-wrap">
        <input type="email" class="form-control" style="max-width:320px;" placeholder="Enter your email address">
        <button class="btn-search" style="width:auto;padding:0 24px;">Subscribe</button>
      </div>
    </div>
  </div>
</section>

<?php echo $__env->make('frontend.layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/frontend/blog.blade.php ENDPATH**/ ?>