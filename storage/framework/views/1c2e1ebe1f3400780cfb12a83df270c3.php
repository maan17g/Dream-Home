<?php echo $__env->make('frontend.layout.header', ['title' => 'Properties - Dream Home'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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
        <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo e(session('error')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- VALIDATION ERRORS SUMMARY BANNER -->
        <?php if($errors->any()): ?>
            <div class="alert alert-danger mb-4">
                <div class="fw-bold mb-1"><i class="bi bi-x-circle me-1"></i> Please correct the following search
                    issues:</div>
                <ul class="mb-0 ps-3">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- SMART FILTERS FORM -->
        <!-- SMART FILTERS FORM -->
        <section class="filter-top-wrap mb-4">
            <form action="<?php echo e(route('property.search')); ?>" method="GET" id="filterForm">

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
                        <input type="text" name="search" class="form-control <?php $__errorArgs = ['search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Search by title..." id="searchInput" value="<?php echo e(request('search')); ?>">
                        <?php $__errorArgs = ['search'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- NEW: Location (City) Dropdown -->
                    <div class="filter-group">
                        <label for="cityInput">Location</label>
                        <select name="city" class="form-select <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="cityInput">
                            <option value="">All Locations</option>
                            <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($city); ?>" <?php echo e(request('city') == $city ? 'selected' : ''); ?>>
                                    <?php echo e($city); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Property Type -->
                    <div class="filter-group">
                        <label for="propertyType">Property Type</label>
                        <select name="type" class="form-select <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="propertyType">
                            <option value="">All Types</option>
                            <option value="apartment" <?php echo e(request('type') == 'apartment' ? 'selected' : ''); ?>>Apartment
                            </option>
                            <option value="villa" <?php echo e(request('type') == 'villa' ? 'selected' : ''); ?>>Villa</option>
                            <option value="house" <?php echo e(request('type') == 'house' ? 'selected' : ''); ?>>House</option>
                            <option value="land" <?php echo e(request('type') == 'land' ? 'selected' : ''); ?>>Land</option>
                            <option value="office" <?php echo e(request('type') == 'office' ? 'selected' : ''); ?>>Office</option>
                        </select>
                        <?php $__errorArgs = ['type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Bedrooms -->
                    <div class="filter-group">
                        <label for="bedrooms">Bedrooms</label>
                        <select name="bedrooms" class="form-select <?php $__errorArgs = ['bedrooms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="bedrooms">
                            <option value="">Any</option>
                            <option value="1" <?php echo e(request('bedrooms') == '1' ? 'selected' : ''); ?>>1+</option>
                            <option value="2" <?php echo e(request('bedrooms') == '2' ? 'selected' : ''); ?>>2+</option>
                            <option value="3" <?php echo e(request('bedrooms') == '3' ? 'selected' : ''); ?>>3+</option>
                            <option value="4" <?php echo e(request('bedrooms') == '4' ? 'selected' : ''); ?>>4+</option>
                            <option value="5" <?php echo e(request('bedrooms') == '5' ? 'selected' : ''); ?>>5+</option>
                        </select>
                        <?php $__errorArgs = ['bedrooms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Bathrooms -->
                    <div class="filter-group">
                        <label for="bathrooms">Bathrooms</label>
                        <select name="bathrooms" class="form-select <?php $__errorArgs = ['bathrooms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            id="bathrooms">
                            <option value="">Any</option>
                            <option value="1" <?php echo e(request('bathrooms') == '1' ? 'selected' : ''); ?>>1+</option>
                            <option value="2" <?php echo e(request('bathrooms') == '2' ? 'selected' : ''); ?>>2+</option>
                            <option value="3" <?php echo e(request('bathrooms') == '3' ? 'selected' : ''); ?>>3+</option>
                            <option value="4" <?php echo e(request('bathrooms') == '4' ? 'selected' : ''); ?>>4+</option>
                        </select>
                        <?php $__errorArgs = ['bathrooms'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Min Area -->
                    <div class="filter-group">
                        <label for="minArea">Min Area (sqft)</label>
                        <input type="number" name="min_area"
                            class="form-control <?php $__errorArgs = ['min_area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="e.g. 1000"
                            id="minArea" value="<?php echo e(request('min_area')); ?>">
                        <?php $__errorArgs = ['min_area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Purpose (Sale / Rent) -->
                    <div class="filter-grou">
                        <label>Purpose</label>
                        <div class="status-pills">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purpose[]" value="sale"
                                    id="statusSale"
                                    <?php echo e(is_array(request('purpose')) && in_array('sale', request('purpose')) ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="statusSale">For Sale</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="purpose[]" value="rent"
                                    id="statusRent"
                                    <?php echo e(is_array(request('purpose')) && in_array('rent', request('purpose')) ? 'checked' : ''); ?>>
                                <label class="form-check-label" for="statusRent">For Rent</label>
                            </div>
                        </div>
                        <?php $__errorArgs = ['purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Price Range -->
                    <div class="filter-group filter-price">
                        <label for="priceRange">Max Price</label>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="range-value">$0</span>
                            <span class="range-value"
                                id="priceValue">$<?php echo e(number_format(request('max_price', 50000))); ?></span>
                        </div>
                        <input type="range" class="form-range <?php $__errorArgs = ['max_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            name="max_price" min="0" max="50000" step="50"
                            value="<?php echo e(request('max_price', 50000)); ?>" id="priceRange"
                            oninput="document.getElementById('priceValue').innerText = '$' + Number(this.value).toLocaleString()">
                        <?php $__errorArgs = ['max_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small mt-1"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="filter-actions">
                        <button type="submit" class="btn-filter"><i class="bi bi-search me-2"></i> Apply
                            Filters</button>
                    </div>
                </div>

                <input type="hidden" name="sort" id="hiddenSort" value="<?php echo e(request('sort', 'featured')); ?>">

            </form>
        </section>
        <!-- RESULTS + SORT -->
        <section>
            <div class="sort-dropdown d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
                <p class="results-count mb-0">
                    
                </p>
                <select class="form-select w-auto" id="sortBy"
                    onchange="document.getElementById('hiddenSort').value = this.value; document.getElementById('filterForm').submit();">
                    <option value="featured" <?php echo e(request('sort') == 'featured' ? 'selected' : ''); ?>>Featured</option>
                    <option value="price-low" <?php echo e(request('sort') == 'price-low' ? 'selected' : ''); ?>>Price: Low to
                        High</option>
                    <option value="price-high" <?php echo e(request('sort') == 'price-high' ? 'selected' : ''); ?>>Price: High to
                        Low</option>
                    <option value="newest" <?php echo e(request('sort') == 'newest' ? 'selected' : ''); ?>>Newest First</option>
                    <option value="beds" <?php echo e(request('sort') == 'beds' ? 'selected' : ''); ?>>Most Bedrooms</option>
                </select>
            </div>

            <!-- EMPTY RESULTS / PROPERTY LIST GRID -->
            <div class="row g-4" id="propertiesGrid">
                <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php if (isset($component)) { $__componentOriginal4532de4c7fd0861589289e273a4fcf93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4532de4c7fd0861589289e273a4fcf93 = $attributes; } ?>
<?php $component = App\View\Components\Property::resolve(['property' => $property] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('property'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Property::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4532de4c7fd0861589289e273a4fcf93)): ?>
<?php $attributes = $__attributesOriginal4532de4c7fd0861589289e273a4fcf93; ?>
<?php unset($__attributesOriginal4532de4c7fd0861589289e273a4fcf93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4532de4c7fd0861589289e273a4fcf93)): ?>
<?php $component = $__componentOriginal4532de4c7fd0861589289e273a4fcf93; ?>
<?php unset($__componentOriginal4532de4c7fd0861589289e273a4fcf93); ?>
<?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-building-exclamation display-4 text-muted"></i>
                        <h4 class="mt-3">No properties found</h4>
                        <p class="text-muted-custom">Try adjusting your filters or resetting them to find matching properties.
                        </p>
                        <a href="<?php echo e(route('property.index')); ?>" class="btn btn-outline-primary mt-2">
                            <i class="bi bi-arrow-clockwise me-1"></i> Reset Filters
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-5 d-flex justify-content-between align-items-center gap-2">
                <!-- Results Counter Text -->
                <?php if($properties->total() > 0): ?>
                    <p class="text-muted-custom  small">
                        Showing <span class="fw-semibold"><?php echo e($properties->firstItem()); ?></span>
                        to <span class="fw-semibold"><?php echo e($properties->lastItem()); ?></span>
                        of <span class="fw-semibold"><?php echo e($properties->total()); ?></span> results
                    </p>
                <?php endif; ?>

                <!-- Laravel Pagination Links -->
                <div>
                    <?php echo e($properties->links()); ?>

                </div>
            </div>
        </section>
    </div>
</main>

<?php echo $__env->make('frontend.layout.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/frontend/property.blade.php ENDPATH**/ ?>