<?php echo $__env->make('agent.layout.header', ['title' => 'My Properties | Dream Home Agent'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dash-content">
    <div class="dash-breadcrumb"><a href="agent-dashboard.html">Agent</a> / <span class="current">My Properties</span>
    </div>
    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">My Properties</h1>
            <!-- Counts total items dynamically from the collection or paginator -->
            <p class="dash-page-desc">
                <?php echo e($properties instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator ? $properties->total() : $properties->count()); ?>

                listings under your name.</p>
        </div>
        <div class="dash-head-actions"><a href="<?php echo e(route('property.create')); ?>" class="dash-btn-primary"><i
                    class="bi bi-plus-lg"></i> Add Listing</a></div>
    </div>

    <div class="dash-filter-bar">
        <form action="<?php echo e(route('agent.propsearch')); ?>" method="GET" class="row g-3 mb-4 align-items-end">
            <div class="col-lg-5 col-6">
                <label class="dash-filter-label" for="propertySearch">Search</label>
                <div class="dash-input-icon">
                    <i class="bi bi-search"></i>
                    <input type="text" id="propertySearch" name="search" class="dash-input"
                        placeholder="Search your properties..." value="<?php echo e(request('search')); ?>">
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <label class="dash-filter-label" for="propertyStatus">Status</label>
                <select id="propertyStatus" name="status" class="dash-select">
                    <option value="all" <?php echo e(request('status') == 'all' ? 'selected' : ''); ?>>All</option>
                    <option value="approved" <?php echo e(request('status') == 'approved' ? 'selected' : ''); ?>>Published</option>
                    <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                    <option value="rejected" <?php echo e(request('status') == 'rejected' ? 'selected' : ''); ?>>Rejected</option>
                </select>
            </div>

            <div class="col-lg-2 col-6">
                <label class="dash-filter-label" for="propertySort">Sort</label>
                <select id="propertySort" name="sort" class="dash-select">
                    <option value="newest" <?php echo e(request('sort') == 'newest' ? 'selected' : ''); ?>>Newest</option>
                    <option value="most_viewed" <?php echo e(request('sort') == 'most_viewed' ? 'selected' : ''); ?>>Most Viewed
                    </option>
                </select>
            </div>

            <div class="col-lg-2 col-6">
                <button class="dash-btn-primary w-100" type="submit">Submit</button>
            </div>
        </form>
        <!-- GRID VIEW -->
        <div class="row g-3" id="gridView">
            <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    // Pull out the primary thumbnail, or fallback to the first image if thumbnail isn't explicit
$thumbnail = $property->images->firstWhere('is_thumbnail', 1) ?? $property->images->first();
$thumbnailUrl = $thumbnail
    ? asset('storage/' . $thumbnail->image)
    : asset('images/default-property.jpg');
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="agent-prop-card">
                        <div class="agent-prop-thumb">
                            <img src="<?php echo e($thumbnailUrl); ?>" alt="<?php echo e($property->title); ?>">
                            <span class="badge-custom position-absolute" style="top:10px;left:10px;">For
                                <?php echo e(ucfirst($property->purpose)); ?></span>
                            
                        </div>
                        <div class="agent-prop-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="dash-row-title"><?php echo e($property->title); ?></div>
                                <!-- Static fallback status example, replace with $property->status when you add it -->
                                <span class="status-pill success"><i
                                        class="bi bi-circle-fill"></i><?php echo e(Str::title($property->verified)); ?></span>
                            </div>
                            <div class="dash-row-sub mb-2">
                                <?php echo e($property->city?->city ?? 'Unknown City'); ?>, <?php echo e($property->city?->country ?? ''); ?>

                                ·
                                $<?php echo e(number_format($property->price)); ?><?php echo e($property->purpose === 'rent' ? '/mo' : ''); ?>

                            </div>
                            <div class="agent-prop-stats">
                                <span><i class="bi bi-eye"></i> <?php echo e(number_format($property->views)); ?> views</span>
                                <span><i class="bi bi-door-open"></i> <?php echo e($property->bedrooms); ?> Beds</span>
                            </div>
                            <div class="row-actions mt-3">
                                <a href="<?php echo e(route('property.show', $property->id)); ?>" class="row-action-btn"><i
                                        class="bi bi-eye"></i></a>
                                <a href="<?php echo e(route('property.edit', $property->id)); ?>" class="row-action-btn"><i
                                        class="bi bi-pencil"></i></a>
                                <button class="row-action-btn danger btn-delete-trigger" data-id="<?php echo e($property->id); ?>"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal"><i
                                        class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <?php if(Auth::user()->agent->properties->count() == 0): ?>
                    <div class="col-12 text-center py-5">
                        <a href="<?php echo e(route('property.create')); ?>"
                            class="text-decoration-none text-primary-custom text-center fs-2 fw-bold">Add Properties</a>
                    </div>
                <?php else: ?>
                    <div class="col-12 text-center py-5">
                        <span class="text-decoration-none text-primary-custom text-center fs-2 fw-bold">No Property
                            Found</span>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>




        <!-- PAGINATION BAR -->
        <?php if($properties instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator): ?>
            <div class="dash-pagination-bar mt-4">
                <span>Showing <?php echo e($properties->firstItem()); ?> to <?php echo e($properties->lastItem()); ?> of
                    <?php echo e($properties->total()); ?> entries</span>
                <div>
                    <?php echo e($properties->links('pagination::bootstrap-4')); ?>

                </div>
            </div>
        <?php endif; ?>
</main>
</div>
</div>
<!-- DELETE MODAL -->
<div class="modal fade dash-modal danger" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center p-3 bg-transparent">
            <!-- Dynamic Form Target (Action populated via JS) -->
            <form id="deleteForm" method="POST" action="">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-body">
                    <div class="stat-icon-lg mx-auto mb-3"><i class="bi bi-trash"></i></div>
                    <h5 class="mb-2">Delete this listing?</h5>
                    <p class="text-muted-custom" style="font-size:.85rem;">This action cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center border-0 pt-0">
                    <button type="button" class="dash-btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="dash-btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php echo $__env->make('layout.Notification', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<script>
    // Handle dynamic delete modal action URL
    document.addEventListener('DOMContentLoaded', function () {
        const deleteModal = document.getElementById('deleteModal');
        const deleteForm = document.getElementById('deleteForm');

        deleteModal.addEventListener('show.bs.modal', function (event) {
            // Trigger button that opened the modal
            const button = event.relatedTarget;
            // Extract info from data-id attribute
            const propertyId = button.getAttribute('data-id');
            
            // Construct base URL dynamically for your route template
            const baseUrl = "<?php echo e(url('properties')); ?>"; 
            
            // Set form action dynamically: /properties/{id}
            deleteForm.action = `${baseUrl}/${propertyId}`;
        });
    });

    // Theme & Sidebar Toggles
    const sidebar = document.getElementById('sidebar');
    document.getElementById('burgerBtn')?.addEventListener('click', () => {
        if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open');
        else sidebar.classList.toggle('collapsed');
    });
    
    const themeBtn = document.getElementById('themeToggle');
    const root = document.documentElement;
    themeBtn?.addEventListener('click', () => {
        const isLight = root.getAttribute('data-theme') === 'light';
        root.setAttribute('data-theme', isLight ? 'dark' : 'light');
        themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>';
    });
</script><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/agent/agent-properties.blade.php ENDPATH**/ ?>