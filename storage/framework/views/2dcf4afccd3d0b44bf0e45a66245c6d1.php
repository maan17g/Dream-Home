<div class="col-lg-4 col-md-6 fprop-card reveal-child">
    <!-- Wrapper to keep position-absolute button aligned -->
    <div class="position-relative h-100">

        <!-- Favorite Button (Outside the link) -->
        
       <button type="button" 
        class="card-fav-btn position-absolute top-0 end-0 m-3 z-3 js-fav-btn"
        data-id="<?php echo e($property->id); ?>"
        aria-label="Save property">

   <i class="bi <?php echo e($property->savedProperties->contains('user_id', auth()->id()) 
    ? 'bi-heart-fill text-success' 
    : 'bi-heart'); ?>">
</i>

</button>
        <!-- Main Card Link -->
        <a href="<?php echo e(route('property.show', $property->id)); ?>" style="text-decoration: none;" class="d-block h-100">
            <div class="card property-card border-0 h-100">
                <div class="card-image-wrapper position-relative">
                    <span class="badge-custom position-absolute top-0 start-0 m-3 text-capitalize">
                        <?php echo e($property['purpose']); ?>

                    </span>
                    
                    <span class="badge-price position-absolute bottom-0 end-0 m-3">
                        $<?php echo e(number_format($property['price'], 0)); ?><?php echo e($property['purpose'] === 'rent' ? '/mo' : ''); ?>

                    </span>

                    <?php
                        $thumbnail = $property->images->firstWhere('is_thumbnail', 1) ?? $property->images->first();
                        $thumbnailUrl = $thumbnail
                            ? asset('storage/' . $thumbnail->image)
                            : asset('images/default-property.jpg');
                    ?>
                    
                    <img src="<?php echo e($thumbnailUrl); ?>" alt="<?php echo e($property['title']); ?>" loading="lazy">
                    <span class="badge-tag position-absolute start-0 ms-3 text-capitalize"><?php echo e($property['type']); ?></span>
                </div>

                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title mb-2 text-truncate"><?php echo e($property['title']); ?></h5>
                    <p class="card-location mb-3 d-flex align-items-center">
                        <i class="bi bi-geo-alt-fill me-2"></i><?php echo e($property['city']['city']); ?>, <?php echo e($property['city']['country']); ?>

                    </p>
                    <div class="card-features d-flex justify-content-between pt-3 feature-border">
                        <div class="feature-item d-flex align-items-center gap-1">
                            <i class="bi bi-door-open border-end-1"></i> <?php echo e($property['bedrooms']); ?> Beds
                        </div>
                        <div class="feature-item d-flex align-items-center gap-1">
                            <i class="bi bi-droplet-half"></i> <?php echo e($property['bathrooms']); ?> Baths
                        </div>
                        <div class="feature-item d-flex align-items-center gap-1">
                            <i class="bi bi-arrows-fullscreen"></i> <?php echo e($property['area']); ?> sq ft
                        </div>
                    </div>
                    <div class="card-agent-row">
                        <img class="card-agent-avatar" 
                             src="<?php echo e(asset('storage/' . ($property->agent?->user?->avatar ?? 'avatars/default.png'))); ?>" 
                             alt="Agent Avatar" loading="lazy">
                        <div class="card-agent-info">
                            <span class="card-agent-name">
                                <?php echo e($property->agent?->user ? $property->agent->user->first_name . ' ' . $property->agent->user->last_name : 'No Agent Assigned'); ?>

                            </span>
                            <span class="card-agent-role"><?php echo e(Str::title($property['agent_type'])); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </a>

    </div>
</div>
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/components/property.blade.php ENDPATH**/ ?>