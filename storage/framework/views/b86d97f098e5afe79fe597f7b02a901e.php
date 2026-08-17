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
            <li><a href="<?php echo e(route('page.index')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('property.index')); ?>">Properties</a></li>
            <li><a href="<?php echo e(route('page.about')); ?>">About Us</a></li>
            <li><a href="<?php echo e(route('page.contact')); ?>">Contact</a></li>
            
          </ul>
        </div>
        <div class="col-lg-2 col-md-3 col-6">
          <h6 class="footer-heading">Property Types</h6>
          <ul class="footer-links">
          <li><a href="<?php echo e(route('property.search', ['type' => 'apartment'])); ?>">Apartments</a></li>
<li><a href="<?php echo e(route('property.search', ['type' => 'villa'])); ?>">Villas</a></li>
<li><a href="<?php echo e(route('property.search', ['type' => 'townhouse'])); ?>">Townhouses</a></li>
<li><a href="<?php echo e(route('property.search', ['type' => 'penthouse'])); ?>">Penthouses</a></li>
<li><a href="<?php echo e(route('property.search', ['type' => 'office'])); ?>">Office Spaces</a></li>
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

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('asset/js/script.js')); ?>"></script> 
    <script src="<?php echo e(asset('dashboard/assets/js/script.js')); ?>"></script> 
  </body>

</html><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/frontend/layout/footer.blade.php ENDPATH**/ ?>