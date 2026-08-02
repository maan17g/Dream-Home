<?php
    $isEdit = isset($property) && $property->exists;
    $title = $isEdit ? 'Edit Listing' : 'Add Listing';
?>

<?php echo $__env->make('agent.layout.header', ['title' => $title . ' | Dream Home Agent'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dash-content">
    <div class="dash-breadcrumb">
        <a href="agent-dashboard.html">Agent</a> / 
        <a href="agent-properties.html">My Properties</a> / 
        <span class="current"><?php echo e($title); ?></span>
    </div>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
    <form action="<?php echo e($isEdit ? route('property.update', $property->id) : route('properties.store')); ?>" 
          method="POST" 
          enctype="multipart/form-data">
        
        <?php echo csrf_field(); ?>
        <?php if($isEdit): ?>
       
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>

        <div class="dash-page-head">
            <div>
                <h1 class="dash-page-title"><?php echo e($isEdit ? 'Edit Listing' : 'Add New Listing'); ?></h1>
                <p class="dash-page-desc">
                    <?php echo e($isEdit ? 'Update your property details below.' : 'Fill in the details below. You can save as draft and finish later.'); ?>

                </p>
            </div>
            <div class="dash-head-actions">
                <button type="button" class="dash-btn-secondary"><i class="bi bi-eye"></i> Preview</button>
                <button type="submit" class="dash-btn-primary">
                    <i class="bi bi-check-lg"></i> <?php echo e($isEdit ? 'Update Listing' : 'Publish'); ?>

                </button>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-lg-12">
                <div class="dash-panel">
                    
                    <!-- Navigation Tabs -->
                    <div class="dash-tabs mb-4">
                        <button type="button" class="dash-tab property-tab active" data-tab="basic">Basic Info</button>
                        <button type="button" class="dash-tab property-tab" data-tab="pricing">Pricing</button>
                        <button type="button" class="dash-tab property-tab" data-tab="media">Media</button>
                        <button type="button" class="dash-tab property-tab" data-tab="location">Location</button>
                        <button type="button" class="dash-tab property-tab" data-tab="features">Features</button>
                        <button type="button" class="dash-tab property-tab" data-tab="seo">SEO</button>
                    </div>

                    <!-- Tab 1: Basic Info -->
                    <div class="dash-tab-pane property-tab-pane active" id="tab-basic">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="dash-form-label">Property Title <span class="req">*</span></label>
                                <input type="text" class="dash-input <?php $__errorArgs = ['property_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="property_title" value="<?php echo e(old('property_title', $property->title ?? '')); ?>" placeholder="e.g. Modern Villa in Miami">
                                <?php $__errorArgs = ['property_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4">
                                <label class="dash-form-label">Type <span class="req">*</span></label>
                                <select class="dash-select <?php $__errorArgs = ['property_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="property_type">
                                    <?php $currentType = old('property_type', $property->type ?? ''); ?>
                                    <option value="house" <?php echo e($currentType == 'house' ? 'selected' : ''); ?>>House</option>
                                    <option value="villa" <?php echo e($currentType == 'villa' ? 'selected' : ''); ?>>Villa</option>
                                    <option value="apartment" <?php echo e($currentType == 'apartment' ? 'selected' : ''); ?>>Apartment</option>
                                    <option value="office" <?php echo e($currentType == 'office' ? 'selected' : ''); ?>>Office</option>
                                    <option value="land" <?php echo e($currentType == 'land' ? 'selected' : ''); ?>>Land</option>
                                </select>
                                <?php $__errorArgs = ['property_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4">
                                <label class="dash-form-label">Purpose <span class="req">*</span></label>
                                <select class="dash-select <?php $__errorArgs = ['property_purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="property_purpose">
                                    <?php $currentPurpose = old('property_purpose', $property->purpose ?? ''); ?>
                                    <option value="sale" <?php echo e($currentPurpose == 'sale' ? 'selected' : ''); ?>>For Sale</option>
                                    <option value="rent" <?php echo e($currentPurpose == 'rent' ? 'selected' : ''); ?>>For Rent</option>
                                </select>
                                <?php $__errorArgs = ['property_purpose'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="col-md-4">
                                <label class="dash-form-label">Listed By</label>
                                <input type="text" class="dash-input" value="<?php echo e($isEdit && isset($property->agent->user) ? $property->agent->user->first_name . ' ' . $property->agent->user->last_name : Auth::user()->first_name . ' ' . Auth::user()->last_name); ?>" disabled>
                            </div>

                            <div class="col-12">
                                <label class="dash-form-label">Description</label>
                                <textarea class="dash-input <?php $__errorArgs = ['property_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="property_description" rows="5" placeholder="Describe the property..."><?php echo e(old('property_description', $property->description ?? '')); ?></textarea>
                                <?php $__errorArgs = ['property_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 2: Pricing & Details -->
                    <div class="dash-tab-pane property-tab-pane d-none" id="tab-pricing">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="dash-form-label">Price ($) <span class="req">*</span></label>
                                <input type="number" step="0.01" class="dash-input <?php $__errorArgs = ['property_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="property_price" value="<?php echo e(old('property_price', $property->price ?? '')); ?>" placeholder="850000">
                                <?php $__errorArgs = ['property_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Floors</label>
                                <input type="number" name="property_floors" class="dash-input" value="<?php echo e(old('property_floors', $property->floors ?? 1)); ?>" placeholder="1">
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Bedrooms</label>
                                <input type="number" name="property_bedrooms" class="dash-input" value="<?php echo e(old('property_bedrooms', $property->bedrooms ?? 0)); ?>" placeholder="0">
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Bathrooms</label>
                                <input type="number" name="property_bathrooms" class="dash-input" value="<?php echo e(old('property_bathrooms', $property->bathrooms ?? 0)); ?>" placeholder="0">
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Garages</label>
                                <input type="number" name="property_garages" class="dash-input" value="<?php echo e(old('property_garages', $property->garages ?? 0)); ?>" placeholder="0">
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Area (sqft)</label>
                                <input type="number" name="property_area" class="dash-input" value="<?php echo e(old('property_area', $property->area ?? '')); ?>" placeholder="4500">
                            </div>
                            <div class="col-md-4">
                                <label class="dash-form-label">Year Built</label>
                                <input type="number" name="year_built" class="dash-input" value="<?php echo e(old('year_built', $property->year_built ?? date('Y'))); ?>" placeholder="2024">
                                <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                
                            </div>
                        </div>
                    </div>

                    <!-- Tab 3: Media -->
                    <div class="dash-tab-pane property-tab-pane d-none" id="tab-media">
                        <?php
                            $featuredImage = $isEdit && $property->images ? $property->images->firstWhere('is_thumbnail', 1) : null;
                            $galleryImages = $isEdit && $property->images ? $property->images->where('is_thumbnail', 0) : collect();
                        ?>

                        <!-- Featured Image -->
                        <div class="mb-4">
                            <label class="dash-form-label">Featured Cover Image <?php if(!$isEdit): ?><span class="req">*</span><?php endif; ?></label>
                            <div class="dash-dropzone position-relative text-center p-4 border rounded <?php $__errorArgs = ['property_f_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="featuredDropzone">
                                <i class="bi bi-cloud-arrow-up fs-1 text-primary"></i>
                                <div><strong>Click or drag cover image here</strong></div>
                                <span class="text-muted small">(JPG, PNG, WEBP - Max 3MB)</span>
                                
                                <input type="file" name="property_f_image" id="property_f_image" class="opacity-0 position-absolute w-100 h-100 top-0 start-0 pointer-cursor" accept="image/*">
                                
                                <div id="featuredPreview" class="mt-3 <?php echo e($featuredImage ? '' : 'd-none'); ?>">
                                    <img src="<?php echo e($featuredImage ? asset('storage/' . $featuredImage->image) : ''); ?>" id="featuredPreviewImg" class="img-thumbnail" style="max-height: 180px; object-fit: cover;">
                                </div>
                            </div>
                            <?php $__errorArgs = ['property_f_image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <!-- Gallery Images -->
                        <div class="mb-3">
                            <label class="dash-form-label">Gallery Images (Multiple)</label>
                            <div class="dash-dropzone position-relative text-center p-4 border rounded <?php $__errorArgs = ['property_all_images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-danger <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="galleryDropzone">
                                <i class="bi bi-images fs-1 text-primary"></i>
                                <div><strong>Click or drag gallery photos here</strong></div>
                                <span class="text-muted small">You can select multiple photos</span>
                                
                                <input type="file" name="property_all_images[]" id="property_all_images" class="opacity-0 position-absolute w-100 h-100 top-0 start-0 pointer-cursor" accept="image/*" multiple>
                            </div>
                            <?php $__errorArgs = ['property_all_images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <!-- Gallery Preview Container -->
                            <div id="galleryPreview" class="row g-2 mt-3">
                                <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gImg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-auto">
                                        <div class="position-relative">
                                            <img src="<?php echo e(asset('storage/' . $gImg->image)); ?>" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 4: Location -->
                    <div class="dash-tab-pane property-tab-pane d-none" id="tab-location">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="dash-form-label">Address <span class="req">*</span></label>
                                <input type="text" class="dash-input <?php $__errorArgs = ['property_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="property_address" value="<?php echo e(old('property_address', $property->city->address_line ?? '')); ?>" placeholder="Street address">
                                <?php $__errorArgs = ['property_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-3">
                                <label class="dash-form-label">City <span class="req">*</span></label>
                                <input type="text" name="property_city" class="dash-input <?php $__errorArgs = ['property_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('property_city', $property->city->city ?? '')); ?>" placeholder="Miami">
                                <?php $__errorArgs = ['property_city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="col-md-3">
                                <label class="dash-form-label">State <span class="req">*</span></label>
                                <input type="text" name="property_state" class="dash-input <?php $__errorArgs = ['property_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('property_state', $property->city->state ?? '')); ?>" placeholder="Florida">
                                <?php $__errorArgs = ['property_state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Tab 5: Features & Amenities -->
                    <div class="dash-tab-pane property-tab-pane d-none" id="tab-features">
                        <label class="dash-form-label">Amenities</label>
                        <div class="chip-select">
                            <?php if(isset($amenities) && count($amenities) > 0): ?>
                                <?php
                                    $selectedAmenities = old('amenities', $isEdit && $property->amenities ? $property->amenities->pluck('id')->toArray() : []);
                                ?>
                                <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="checkbox" name="amenities[]" value="<?php echo e($amenity->id); ?>" id="am<?php echo e($amenity->id); ?>" <?php echo e(in_array($amenity->id, $selectedAmenities) ? 'checked' : ''); ?>>
                                    <label for="am<?php echo e($amenity->id); ?>"><i class="<?php echo e($amenity->icon); ?>"></i> <?php echo e($amenity->name); ?></label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <p class="text-muted">No amenities found in database.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Tab 6: SEO -->
                    <div class="dash-tab-pane property-tab-pane d-none" id="tab-seo">
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="dash-form-label">URL Slug (Auto-generated if left blank)</label>
                                <input type="text" class="dash-input <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="slug" value="<?php echo e(old('slug', $property->slug ?? '')); ?>" placeholder="modern-villa-in-miami">
                                <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="text-danger small mt-1"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="d-flex justify-content-between mt-4 pt-3" style="border-top:1px solid var(--border-color);">
                        <button type="button" class="dash-btn-secondary" id="prevTabBtn"><i class="bi bi-arrow-left"></i> Previous</button>
                        <button type="button" class="dash-btn-primary" id="nextTabBtn">Next <i class="bi bi-arrow-right"></i></button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</main>

<?php echo $__env->make('layout.Notification', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('dashboard/assets/js/script.js')); ?>"></script><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/agent/agent-add-property.blade.php ENDPATH**/ ?>