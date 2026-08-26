<?php echo $__env->make('admin.layout.header', ['title' => 'CMS - Amenities & Cities'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container-fluid py-4 px-lg-5">

   

    <?php if(session('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <?php echo e(session('error')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- PAGE TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom border-secondary">
        <div>
            <h2 class="h4 text-main font-weight-bold mb-1">CMS Management</h2>
            <p class="text-muted-custom small mb-0">Manage platform amenities and operational cities.</p>
        </div>
    </div>

    <!-- TAB NAVIGATION -->
    <ul class="nav nav-tabs border-secondary mb-4" id="cmsTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active text-main bg-transparent border-secondary fw-bold" 
                    id="amenities-tab" 
                    data-bs-toggle="tab" 
                    data-bs-target="#amenities-panel" 
                    type="button" 
                    role="tab" 
                    aria-controls="amenities-panel" 
                    aria-selected="true">
                <i class="bi bi-stars me-2 text-primary-custom"></i>Amenities
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-muted-custom bg-transparent border-secondary fw-bold" 
                    id="cities-tab" 
                    data-bs-toggle="tab" 
                    data-bs-target="#cities-panel" 
                    type="button" 
                    role="tab" 
                    aria-controls="cities-panel" 
                    aria-selected="false">
                <i class="bi bi-geo-alt me-2 text-primary-custom"></i>Cities
            </button>
        </li>
    </ul>

    <div class="tab-content" id="cmsTabsContent">

        <!-- ================= 1. AMENITIES SECTION ================= -->
        <div class="tab-pane fade show active" id="amenities-panel" role="tabpanel" aria-labelledby="amenities-tab">
            <div class="row g-4">
                <!-- Add Amenity Form -->
                <div class="col-lg-4">
                    <div class="feature-box h-auto">
                        <div class="card-header bg-transparent border-secondary text-main fw-bold px-0 pt-0 pb-3">
                            Add New Amenity
                        </div>
                        <div class="card-body px-0 pb-0">
                            <form action="<?php echo e(route('amenities.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label class="form-label small">Amenity Name</label>
                                    <input type="text" name="name" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" placeholder="e.g. Swimming Pool" required>
                                    <?php $__errorArgs = ['name'];
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
                                <div class="mb-3">
                                    <label class="form-label small">Bootstrap Icon Class</label>
                                    <input type="text" name="icon" class="form-control <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('icon')); ?>" placeholder="e.g. bi-droplet">
                                    <?php $__errorArgs = ['icon'];
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
                                <button type="submit" class="btn btn-consult w-100 fw-bold mt-2">Save Amenity</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Amenities List -->
                <div class="col-lg-8">
                    <div class="feature-box h-auto">
                        <div class="card-header bg-transparent border-secondary text-main fw-bold px-0 pt-0 pb-3">
                            Existing Amenities
                        </div>
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0 align-middle bg-transparent">
                                <thead class="border-bottom border-secondary text-muted-custom small">
                                    <tr>
                                        <th style="width: 70px;">ID</th>
                                        <th>Icon</th>
                                        <th>Name</th>
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $amenities ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="border-secondary">
                                        <td class="text-muted-custom">#<?php echo e($amenity->id); ?></td>
                                        <td><i class="bi <?php echo e($amenity->icon ?? 'bi-check2-circle'); ?> fs-5 text-primary-custom"></i></td>
                                        <td class="fw-bold text-main"><?php echo e($amenity->name); ?></td>
                                        <td class="text-end">
                                            <form action="<?php echo e(route('amenities.destroy', $amenity->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this amenity?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted-custom py-4">No amenities added yet.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================= 2. CITIES SECTION ================= -->
        <div class="tab-pane fade" id="cities-panel" role="tabpanel" aria-labelledby="cities-tab">
            <div class="row g-4">
                <!-- Add City Form -->
                <div class="col-lg-4">
                    <div class="feature-box h-auto">
                        <div class="card-header bg-transparent border-secondary text-main fw-bold px-0 pt-0 pb-3">
                            Add New City
                        </div>
                        <div class="card-body px-0 pb-0">
                            <form action="<?php echo e(route('cities.store')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="mb-3">
                                    <label class="form-label small">City Name</label>
                                    <input type="text" name="city" class="form-control <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('city')); ?>" placeholder="e.g. Multan" required>
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
                                <div class="mb-3">
                                    <label class="form-label small">State / Region</label>
                                    <input type="text" name="state" class="form-control <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('state')); ?>" placeholder="e.g. Punjab">
                                    <?php $__errorArgs = ['state'];
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
                               
                                <button type="submit" class="btn btn-consult w-100 fw-bold mt-2">Save City</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Cities List -->
                <div class="col-lg-8">
                    <div class="feature-box h-auto">
                        <div class="card-header bg-transparent border-secondary text-main fw-bold px-0 pt-0 pb-3">
                            Existing Cities
                        </div>
                        <div class="table-responsive">
                            <table class="table table-dark table-hover mb-0 align-middle bg-transparent">
                                <thead class="border-bottom border-secondary text-muted-custom small">
                                    <tr>
                                        <th>City Name</th>
                                        <th>State</th>
                                   
                                        <th class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $cities ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="border-secondary">
                                        <td class="fw-bold text-main"><?php echo e($city->city); ?></td>
                                        <td class="text-muted-custom"><?php echo e($city->state ?? '—'); ?></td>
                                        
                                        <td class="text-end">
                                            <form action="<?php echo e(route('cities.destroy', $city->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Delete this city?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted-custom py-4">No cities added yet.</td>
                                    </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('#cmsTabs button[data-bs-toggle="tab"]');
    const tabPanes = document.querySelectorAll('.tab-content .tab-pane');

    function activateTab(targetSelector) {
        const targetPane = document.querySelector(targetSelector);
        const activeTabBtn = document.querySelector(`#cmsTabs button[data-bs-target="${targetSelector}"]`);

        if (!targetPane || !activeTabBtn) return;

        tabs.forEach(t => {
            t.classList.remove('active', 'text-main');
            t.classList.add('text-muted-custom');
            t.setAttribute('aria-selected', 'false');
        });

        activeTabBtn.classList.add('active', 'text-main');
        activeTabBtn.classList.remove('text-muted-custom');
        activeTabBtn.setAttribute('aria-selected', 'true');

        tabPanes.forEach(pane => {
            pane.classList.remove('show', 'active');
        });

        targetPane.classList.add('show', 'active');
    }

    tabs.forEach(tab => {
        tab.addEventListener('click', function (e) {
            e.preventDefault();
            const targetSelector = this.getAttribute('data-bs-target');
            activateTab(targetSelector);
            history.replaceState(null, null, targetSelector);
        });
    });

    if (window.location.hash) {
        activateTab(window.location.hash);
    }
});
</script><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/admin/cms-AmenityCity.blade.php ENDPATH**/ ?>