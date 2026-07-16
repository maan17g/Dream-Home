@include('frontend.layout.header',['title'=>'Contact Us - Dream Home'])
<main>

    <!-- HERO -->
    <section class="hero-section">
      <div class="hero-bg-contact"></div>
      <div class="hero-overlay"></div>
      <div class="container hero-content">
        <div class="col-lg-8">
          <div class="trust-badge"><span class="trust-dot"></span> We Respond Within 24 Hours — Guaranteed</div>
          <h1 class="hero-title mb-3">Let's Start a <br><span>Conversation</span></h1>
          <p class="hero-desc">Whether you have a question, need a consultation, or just want to explore your options — our team is here and ready to help.</p>
        </div>
      </div>
    </section>

    <!-- INFO CARDS -->
    <section class="contact-page-section">
      <div class="container">
        <div class="text-start mb-5">
          <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Get In Touch</h6>
          <h2 class="display-6 fw-bold">Multiple Ways to Reach Us</h2>
        </div>
        <div class="row g-4 mb-5">
          <div class="col-lg-3 col-md-6">
            <div class="info-card">
              <div class="info-icon"><i class="bi bi-geo-alt-fill"></i></div>
              <h5>Visit Our Office</h5>
              <p>9876 Wilshire Boulevard<br>Suite 500, Beverly Hills<br>CA 90210, USA</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="info-card">
              <div class="info-icon"><i class="bi bi-telephone-fill"></i></div>
              <h5>Call Us Directly</h5>
              <a href="tel:+13105550100" style="color:var(--text-muted);text-decoration:none;">(310) 555-0100</a><br>
              <a href="tel:+13105550199" style="color:var(--text-muted);text-decoration:none;">(310) 555-0199</a><br>
              <p class="mt-1" style="font-size:0.78rem;">Mon–Fri &nbsp;9am – 6pm</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="info-card">
              <div class="info-icon"><i class="bi bi-envelope-fill"></i></div>
              <h5>Email Us</h5>
              <a href="mailto:info@dreamhome.com" style="color:var(--text-muted);text-decoration:none;">info@dreamhome.com</a><br>
              <a href="mailto:sales@dreamhome.com" style="color:var(--text-muted);text-decoration:none;">sales@dreamhome.com</a><br>
              <p class="mt-1" style="font-size:0.78rem;">Reply within 24 hours</p>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="info-card">
              <div class="info-icon"><i class="bi bi-chat-dots-fill"></i></div>
              <h5>Live Chat</h5>
              <p>Chat with an agent in real-time directly from our website. Available during office hours.</p>
              <a href="#" style="color:var(--primary);font-weight:600;font-size:0.85rem;">Start Chat &rarr;</a>
            </div>
          </div>
        </div>

        <!-- FORM + SIDEBAR -->
        <div class="row g-4 align-items-start" id="contact-form">
          <!-- FORM -->
          <div class="col-lg-7">
            <div class="form-wrapper">
              <h3 class="fw-bold mb-1">Send Us a Message</h3>
              <p class="text-muted-custom mb-4" style="font-size:0.9rem;">Fill in the form and we'll get back to you as soon as possible.</p>
              <form id="contactForm" novalidate>
                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Full Name <span class="text-primary-custom">*</span></label>
                    <input type="text" class="form-control" placeholder="John Smith" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Email Address <span class="text-primary-custom">*</span></label>
                    <input type="email" class="form-control" placeholder="john@example.com" required>
                  </div>
                </div>
                <div class="row g-3 mb-3">
                  <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" placeholder="(555) 000-0000">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Budget Range</label>
                    <select class="form-select">
                      <option value="">Select a range</option>
                      <option>Under $500K</option>
                      <option>$500K – $1M</option>
                      <option>$1M – $2.5M</option>
                      <option>$2.5M – $5M</option>
                      <option>$5M+</option>
                    </select>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">I'm interested in <span class="text-primary-custom">*</span></label>
                  <div class="subject-pills">
                    <div class="subject-pill"><input type="radio" name="subject" id="s1" value="buying" checked><label for="s1"><i class="bi bi-house me-1"></i> Buying</label></div>
                    <div class="subject-pill"><input type="radio" name="subject" id="s2" value="selling"><label for="s2"><i class="bi bi-tag me-1"></i> Selling</label></div>
                    <div class="subject-pill"><input type="radio" name="subject" id="s3" value="renting"><label for="s3"><i class="bi bi-key me-1"></i> Renting</label></div>
                    <div class="subject-pill"><input type="radio" name="subject" id="s4" value="investing"><label for="s4"><i class="bi bi-graph-up me-1"></i> Investing</label></div>
                    <div class="subject-pill"><input type="radio" name="subject" id="s5" value="other"><label for="s5"><i class="bi bi-three-dots me-1"></i> Other</label></div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label">Your Message <span class="text-primary-custom">*</span></label>
                  <textarea class="form-control" rows="5" placeholder="Tell us about your real estate needs, questions, or what type of property you're looking for..." required></textarea>
                </div>
                <div class="mb-4">
                  <label class="form-label d-block">How did you hear about us?</label>
                  <select class="form-select">
                    <option value="">Select an option</option>
                    <option>Google Search</option>
                    <option>Social Media</option>
                    <option>Friend / Referral</option>
                    <option>Advertisement</option>
                    <option>Other</option>
                  </select>
                </div>
                <div class="form-check mb-4">
                  <input class="form-check-input" type="checkbox" id="consent" required style="border-color:var(--border-color);background-color:var(--form-input-bg);">
                  <label class="form-check-label text-muted-custom" for="consent" style="font-size:0.83rem;">
                    I agree to the <a href="#" style="color:var(--primary);">Privacy Policy</a> and consent to being contacted regarding my inquiry.
                  </label>
                </div>
                <button type="submit" class="btn-search w-100 py-3" style="border-radius:12px;font-size:1rem;">
                  <i class="bi bi-send me-2"></i> Send Message
                </button>
              </form>
            </div>
          </div>

          <!-- SIDEBAR -->
          <div class="col-lg-5">
            <div class="schedule-card mb-4">
              <div class="schedule-head">
                <h5><i class="bi bi-clock me-2"></i>Office Hours</h5>
                <p>Walk-ins welcome during open hours</p>
              </div>
              <div class="schedule-row"><span class="schedule-day">Monday</span><span class="schedule-time">9:00 AM – 6:00 PM</span><span class="schedule-badge badge-open">Open</span></div>
              <div class="schedule-row"><span class="schedule-day">Tuesday</span><span class="schedule-time">9:00 AM – 6:00 PM</span><span class="schedule-badge badge-open">Open</span></div>
              <div class="schedule-row"><span class="schedule-day">Wednesday</span><span class="schedule-time">9:00 AM – 6:00 PM</span><span class="schedule-badge badge-open">Open</span></div>
              <div class="schedule-row"><span class="schedule-day">Thursday</span><span class="schedule-time">9:00 AM – 6:00 PM</span><span class="schedule-badge badge-open">Open</span></div>
              <div class="schedule-row"><span class="schedule-day">Friday</span><span class="schedule-time">9:00 AM – 6:00 PM</span><span class="schedule-badge badge-open">Open</span></div>
              <div class="schedule-row"><span class="schedule-day">Saturday</span><span class="schedule-time">10:00 AM – 4:00 PM</span><span class="schedule-badge badge-open">Open</span></div>
              <div class="schedule-row"><span class="schedule-day">Sunday</span><span class="schedule-time">–</span><span class="schedule-badge badge-closed">Closed</span></div>
            </div>
            <div class="row g-3">
              <div class="col-6">
                <div class="social-connect-card">
                  <div class="social-connect-icon" style="background:linear-gradient(135deg,#1877f2,#0d4f9e);"><i class="fab fa-facebook-f"></i></div>
                  <h6>Facebook</h6><p>@DreamHomeRealty</p><button class="btn-social-follow">Follow</button>
                </div>
              </div>
              <div class="col-6">
                <div class="social-connect-card">
                  <div class="social-connect-icon" style="background:linear-gradient(135deg,#e1306c,#833ab4);"><i class="fab fa-instagram"></i></div>
                  <h6>Instagram</h6><p>@dreamhome</p><button class="btn-social-follow">Follow</button>
                </div>
              </div>
              <div class="col-6">
                <div class="social-connect-card">
                  <div class="social-connect-icon" style="background:linear-gradient(135deg,#1da1f2,#0d6efd);"><i class="fab fa-twitter"></i></div>
                  <h6>Twitter / X</h6><p>@DreamHomeRE</p><button class="btn-social-follow">Follow</button>
                </div>
              </div>
              <div class="col-6">
                <div class="social-connect-card">
                  <div class="social-connect-icon" style="background:linear-gradient(135deg,#0077b5,#005e8c);"><i class="fab fa-linkedin-in"></i></div>
                  <h6>LinkedIn</h6><p>Dream Home Inc.</p><button class="btn-social-follow">Follow</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- MAP -->
    <section class="map-section">
      <div class="container">
        <div class="text-start mb-4">
          <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Find Us</h6>
          <h2 class="display-6 fw-bold">Our Location</h2>
        </div>
        <div class="map-full-wrapper">
          <div class="ratio ratio-21x9">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.4929947820883!2d71.47017897440747!3d30.223014874834096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x393b33854e735d97%3A0xac35e804dff3bf59!2sDevelopers%20Point%20(Pvt)%20Ltd!5e0!3m2!1sen!2s!4v1769175404698!5m2!1sen!2s"
              loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ -->
    <section class="faq-section">
      <div class="container">
        <div class="row align-items-start gy-5">
          <div class="col-lg-4">
            <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">FAQs</h6>
            <h2 class="display-6 fw-bold mb-3">Frequently Asked Questions</h2>
            <p class="text-muted-custom" style="line-height:1.9;font-size:0.92rem;">Can't find what you're looking for? Reach out directly and our team will be happy to help.</p>
            <a href="#contact-form" class="btn btn-consult mt-3 d-inline-flex align-items-center gap-2">
              <i class="bi bi-envelope"></i> Ask Us Directly
            </a>
          </div>
          <div class="col-lg-8">
            <div class="accordion faq-accordion" id="faqAccordion">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">How do I schedule a property viewing?</button>
                </h2>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">You can schedule a viewing by filling out the contact form above, calling our office directly, or clicking "Book a Viewing" on any property listing page. Our agents will confirm your appointment within a few hours.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">What documents do I need to start the buying process?</button>
                </h2>
                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">Typically you'll need proof of identity, proof of income, bank statements for the past 3 months, and a pre-approval letter from your lender. Our agents will guide you through the full checklist.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">Do you charge a consultation fee?</button>
                </h2>
                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">No — your first consultation is completely free. We believe in building relationships before transactions. Our agents are happy to discuss your needs and provide market insights at no charge.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">How long does it typically take to close a deal?</button>
                </h2>
                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">A typical residential transaction closes in 30–60 days after an offer is accepted. This can vary based on financing, inspections, and negotiations. Our team works hard to keep everything on schedule.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">Can I list my property with Dream Home?</button>
                </h2>
                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">Absolutely. We work with sellers to create compelling listings with professional photography, market analysis, and targeted promotion. Contact us for a free property valuation and listing consultation.</div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq6">Do you assist with international property inquiries?</button>
                </h2>
                <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                  <div class="accordion-body">Yes. We have experience working with international buyers and can connect you with verified local agents in other markets. Reach out via email and we'll assign a specialist to your inquiry.</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- ===================== FOOTER ===================== -->
  @include('frontend.layout.footer')