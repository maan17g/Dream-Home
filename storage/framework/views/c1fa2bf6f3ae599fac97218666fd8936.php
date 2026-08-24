<?php echo $__env->make('frontend.layout.header', ['title' => 'Customer Reviews & Testimonials - Dream Home'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main>
    
  <section class="hero-section">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>

        <div class="container hero-content">
            <div class="col-lg-8">
                <div class="trust-badge">
                    <span class="trust-dot"></span> Verified Client Experiences
                </div>
                <h1 class="hero-title mb-3">
                    What Our Clients <br><span>Say About Us</span>
                </h1>
                <p class="hero-desc mb-4">
                    Read authentic feedback and reviews from home buyers, sellers, and renters who found their perfect properties with Dream Home.
                </p>
                <div class="d-flex flex-wrap gap-4 hero-proof-row">
                    <div class="hero-proof-item">
                        <strong><?php echo e($reviewsCount); ?>+</strong>
                        <span>Client Reviews</span>
                    </div>
                    <div class="hero-proof-divider"></div>
                    <div class="hero-proof-item">
                        <strong><?php echo e(number_format($avgRating, 1)); ?> ★</strong>
                        <span>Average Rating</span>
                    </div>
                    <div class="hero-proof-divider"></div>
                    <div class="hero-proof-item">
                        <strong>99%</strong>
                        <span>Client Satisfaction</span>
                    </div>
                    <div class="hero-proof-divider"></div>
                    <div class="hero-proof-item">
                        <strong>24/7</strong>
                        <span>Support</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="testimonial-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Client Feedback</h6>
                <h2 class="display-6 fw-bold">Stories From Homeowners</h2>
            </div>

            <div class="row g-4">
                <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                        $user = $review->appointment?->user;
                        $property = $review->property;
                    ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="sleek-card h-100 d-flex flex-column justify-content-between p-4">
                            <div>
                                
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <div class="text-warning fs-6">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                            <i class="bi bi-star<?php echo e($i <= $review->rating ? '-fill' : ''); ?>"></i>
                                        <?php endfor; ?>
                                    </div>
                            
                                </div>

                                
                                <p class="quote-content mb-4" style="font-size: 0.975rem; line-height: 1.6; color: var(--text-main, #2b3445);">
                                    <?php if($review->comment): ?>
                                        "<?php echo e($review->comment); ?>"
                                    <?php else: ?>
                                        <i class="text-muted">No detailed comment provided with this rating.</i>
                                    <?php endif; ?>
                                </p>
                            </div>

                            
                            <div>
                                <?php if($property): ?>
                                    <div class="property-tag p-2 mb-3 rounded" style="background: var(--bg-light, #f8f9fa); border: 1px dashed var(--border-color, #eef2f6);">
                                        <div class="text-muted small text-truncate">
                                            <i class="bi bi-house-door me-1 text-primary-custom"></i>
                                            <strong>Property:</strong> <?php echo e($property->title); ?>

                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="author-wrap d-flex align-items-center">
                                    <?php if($user?->avatar): ?>
                                        <img src="<?php echo e(asset('storage/' . $user->avatar)); ?>" 
                                             class="author-img rounded-circle object-fit-cover" 
                                             width="48" 
                                             height="48" 
                                             alt="<?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?>">
                                    <?php else: ?>
                                        <div class="author-img-placeholder rounded-circle bg-light d-flex align-items-center justify-content-center text-primary-custom fw-bold border" 
                                             style="width: 48px; height: 48px; font-size: 1.1rem;">
                                            <?php echo e(strtoupper(substr($user?->first_name ?? 'U', 0, 1))); ?>

                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="ms-3">
                                        <h6 class="author-name mb-0 fw-bold">
                                            <?php echo e($user?->first_name ?? 'Verified'); ?> <?php echo e($user?->last_name ?? 'User'); ?>

                                        </h6>
                                        <span class="author-label text-muted small text-capitalize">
                                            Verified <?php echo e($user?->role ?? 'Buyer'); ?>

                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center py-5">
                        <div class="p-5 rounded" style="background: var(--bg-light, #f8f9fa);">
                            <i class="bi bi-chat-square-quote display-4 text-muted mb-3 d-block"></i>
                            <h5 class="fw-bold">No Reviews Published Yet</h5>
                            <p class="text-muted mb-0">Check back later to see what our clients have to say.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            
            <?php if(method_exists($reviews, 'links')): ?>
                <div class="d-flex justify-content-center mt-5">
                    <?php echo e($reviews->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </section>

    
    <section class="cta-section">
        <div class="container">
            <div class="cta-box text-center">
                <h6 class="text-primary-custom text-uppercase letter-spacing-2 fw-bold">Ready to Experience Exceptional Service?</h6>
                <h2 class="display-6 fw-bold mb-3">Let's Find Your Dream Home Together</h2>
                <p class="text-muted-custom mb-4 mx-auto" style="max-width: 520px;">
                    Join thousands of satisfied homeowners who found their perfect property with our expert guidance.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?php echo e(route('property.index')); ?>" class="btn btn-search px-4" style="width:auto;">Browse Properties</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php echo $__env->make('frontend.layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/frontend/reviews.blade.php ENDPATH**/ ?>