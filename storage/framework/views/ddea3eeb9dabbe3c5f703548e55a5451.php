<?php echo $__env->make('admin.layout.header', ['title' => 'Property Management | Dream Home Admin'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dash-content">
    <div class="dash-breadcrumb">
        <a href="<?php echo e(route('admin.index')); ?>">Admin</a> / <span class="current">Properties</span>
    </div>

    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">Property Management</h1>
            <p class="dash-page-desc">
                <?php echo e($properties->total() ?? $properties->count()); ?> listings across your platform — search, filter, and
                manage them here.
            </p>
        </div>
    </div>

    <!-- Filter Bar with Auto-Submit -->
    <form action="<?php echo e(route('admin.property')); ?>" method="GET" id="filterForm" class="dash-filter-bar mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-lg-3 col-6">
                <label class="dash-filter-label">Search</label>
                <div class="dash-input-icon">
                    <i class="bi bi-search"></i>
                    <input type="text" name="search" id="searchInput" class="dash-input"
                        placeholder="Search by title or ID..." value="<?php echo e(request('search')); ?>">
                </div>
            </div>
            <div class="col-lg-2 col-6">
                <label class="dash-filter-label">Status</label>
                <select name="status" class="dash-select" onchange="this.form.submit()">
                    <option value="">All Status</option>
                    <option value="approved" <?php echo e(request('status') == 'approved' ? 'selected' : ''); ?>>Approved</option>
                    <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                    <option value="rejected" <?php echo e(request('status') == 'rejected' ? 'selected' : ''); ?>>Rejected</option>
                </select>
            </div>
            <div class="col-lg-2 col-6">
                <label class="dash-filter-label">Purpose</label>
                <select name="purpose" class="dash-select" onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="sale" <?php echo e(request('purpose') == 'sale' ? 'selected' : ''); ?>>For Sale</option>
                    <option value="rent" <?php echo e(request('purpose') == 'rent' ? 'selected' : ''); ?>>For Rent</option>
                </select>
            </div>
            <div class="col-lg-2 col-6">
                <label class="dash-filter-label">Category</label>
                <select name="type" class="dash-select" onchange="this.form.submit()">
                    <option value="">All Types</option>
                    <option value="villa" <?php echo e(request('type') == 'villa' ? 'selected' : ''); ?>>Villa</option>
                    <option value="apartment" <?php echo e(request('type') == 'apartment' ? 'selected' : ''); ?>>Apartment</option>
                    <option value="house" <?php echo e(request('type') == 'house' ? 'selected' : ''); ?>>House</option>
                    <option value="land" <?php echo e(request('type') == 'land' ? 'selected' : ''); ?>>Land</option>
                    <option value="office" <?php echo e(request('type') == 'office' ? 'selected' : ''); ?>>Office</option>
                </select>
            </div>
            <div class="col-lg-3 col-12">
                <label class="dash-filter-label">Location</label>
                <select name="city_id" class="dash-select" onchange="this.form.submit()">
                    <option value="">All Locations</option>
                    <?php $__currentLoopData = $cities ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($city->id); ?>" <?php echo e(request('city_id') == $city->id ? 'selected' : ''); ?>>
                            <?php echo e($city->city); ?>, <?php echo e($city->country); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
    </form>

    <!-- Data Table Panel -->
    <div class="dash-panel">
        <div class="dash-table-wrap">
            <table class="dash-table">
                <thead>
                    <tr>
                        <th>Property</th>
                        <th>Price</th>
                        <th>Purpose</th>
                        <th>Category</th>
                        <th>Agent</th>
                        <th>Status</th>
                        <th>Views</th>
                        <th>Listed On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="propTableBody">
                    <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $thumbnail = $property->images->firstWhere('is_thumbnail', 1) ?? $property->images->first();
                            $thumbUrl = $thumbnail ? asset('storage/' . $thumbnail->image) : null;
                        ?>
                        <tr>
                            <td class="d-flex align-items-center gap-2">
                                <?php if($thumbUrl): ?>
                                    <img class="dash-row-thumb" src="<?php echo e($thumbUrl); ?>" alt="<?php echo e($property->title); ?>">
                                <?php else: ?>
                                    <div class="dash-row-thumb d-flex align-items-center justify-content-center"
                                        style="background:var(--form-input-bg);color:var(--text-muted);">
                                        <i class="bi bi-image"></i>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <div class="dash-row-title">
                                        <?php echo e($property->title); ?>

                                        <?php if($property->featured): ?>
                                            <span class="badge-featured ms-1"><i class="bi bi-star-fill"></i> Featured</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="dash-row-sub">
                                        <?php echo e($property->city->city ?? 'N/A'); ?>, <?php echo e($property->city->country ?? ''); ?>

                                    </div>
                                </div>
                            </td>
                            <td>
                                $<?php echo e(number_format($property->price, 2)); ?><?php echo e($property->purpose === 'rent' ? '/mo' : ''); ?>

                            </td>
                            <td>
                                <span class="badge-purpose badge-purpose-<?php echo e($property->purpose); ?>">
                                    For <?php echo e(ucfirst($property->purpose)); ?>

                                </span>
                            </td>
                            <td><?php echo e(ucfirst($property->type)); ?></td>
                            <td><?php echo e($property->agent->license_no ?? 'Agent #' . $property->agent_id); ?></td>
                            <td>
                                <select class="dash-select status-select-dropdown"
                                    data-property-id="<?php echo e($property->id); ?>" onchange="updatePropertyStatus(this)">
                                    <option value="approved" <?php echo e($property->verified === 'approved' ? 'selected' : ''); ?>>Approved</option>
                                    <option value="pending" <?php echo e($property->verified === 'pending' ? 'selected' : ''); ?>>Pending</option>
                                    <option value="rejected" <?php echo e($property->verified === 'rejected' ? 'selected' : ''); ?>>Rejected</option>
                                </select>
                            </td>
                            <td><?php echo e(number_format($property->views)); ?></td>
                            <td><?php echo e(\Carbon\Carbon::parse($property->created_at)->format('M d, Y')); ?></td>
                            <td>
                                <div class="row-actions">
                                    <a href="<?php echo e(route('property.show', $property->id)); ?>" class="row-action-btn" title="View">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <!-- Feature Toggle Button -->
                                    <button class="row-action-btn btn-feature-trigger <?php echo e($property->featured ? 'text-warning' : ''); ?>" 
                                        title="<?php echo e($property->featured ? 'Unfeature' : 'Feature'); ?>"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#featureModal"
                                        data-action="<?php echo e(route('properties.feature', $property->id)); ?>"
                                        data-featured="<?php echo e($property->featured ? '1' : '0'); ?>">
                                        <i class="bi <?php echo e($property->featured ? 'bi-star-fill' : 'bi-star'); ?>"></i>
                                    </button>

                                    <!-- Delete Button -->
                                    <button class="row-action-btn danger btn-delete-trigger" title="Delete"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        data-action="<?php echo e(route('properties.destroy', $property->id)); ?>">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="9" class="text-center py-4 text-muted">
                                No properties found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Dynamic Laravel Pagination Bar -->
        <?php if($properties instanceof \Illuminate\Pagination\LengthAwarePaginator && $properties->hasPages()): ?>
            <div class="dash-pagination-bar">
                <span>Showing <?php echo e($properties->firstItem()); ?> to <?php echo e($properties->lastItem()); ?> of
                    <?php echo e($properties->total()); ?> entries</span>
                <?php echo e($properties->links('pagination::bootstrap-5')); ?>

            </div>
        <?php endif; ?>
    </div>
</main>

<!-- ================= FEATURE MODAL ================= -->
<div class="modal fade dash-modal" id="featureModal" tabindex="-1" aria-labelledby="featureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content bg-card border-secondary text-center p-3 shadow-lg rounded-4 overflow-hidden">
            <form id="featureForm" method="POST" action="">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                
                <div class="modal-content p-3">
                    <div class="stat-icon-lg mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle bg-warning bg-opacity-10 text-warning" style="width: 60px; height: 60px;">
                        <i class="bi bi-star-fill fs-3"></i>
                    </div>
                    
                    <h5 class="fw-bold mb-2" id="featureModalTitle">Feature Property?</h5>
                    <p class="text-muted-custom mb-0 small" id="featureModalDesc">
                        Featured properties are highlighted and placed at the top of search results.
                    </p>
                </div>

                <div class="modal-footer justify-content-center border-0 pt-2 pb-1 gap-2">
                    <button type="button" class="btn btn-outline-secondary px-4 py-2 rounded-3 text-main fw-bold" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-warning px-4 py-2 rounded-3 fw-bold text-dark" id="featureSubmitBtn">
                        Confirm
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ================= DELETE MODAL ================= -->
<div class="modal fade dash-modal danger" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content bg-card border-secondary text-center p-3 shadow-lg rounded-4 overflow-hidden">
            <form id="deleteForm" method="POST" action="">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                
                <div class="modal-body p-3">
                    <div class="stat-icon-lg mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10 text-danger" style="width: 60px; height: 60px;">
                        <i class="bi bi-trash fs-3"></i>
                    </div>
                    
                    <h5 class="text-main fw-bold mb-2" id="deleteModalLabel">Delete Property?</h5>
                    <p class="text-muted-custom mb-0 small">
                        This action cannot be undone. The listing will be permanently removed.
                    </p>
                </div>

                <div class="modal-footer justify-content-center border-0 pt-2 pb-1 gap-2">
                    <button type="button" class="btn btn-outline-secondary px-4 py-2 rounded-3 text-main fw-bold" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-danger px-4 py-2 rounded-3 fw-bold">
                        Delete Property
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Dynamic Delete Action Mapping
    document.querySelectorAll('.btn-delete-trigger').forEach(button => {
        button.addEventListener('click', function() {
            const actionUrl = this.getAttribute('data-action');
            document.getElementById('deleteForm').setAttribute('action', actionUrl);
        });
    });

    // Dynamic Feature Action & Modal Content Mapping
    document.querySelectorAll('.btn-feature-trigger').forEach(button => {
        button.addEventListener('click', function() {
            const actionUrl = this.getAttribute('data-action');
            const isFeatured = this.getAttribute('data-featured') === '1';

            document.getElementById('featureForm').setAttribute('action', actionUrl);

            // Dynamically change title and text depending on current state
            if (isFeatured) {
                document.getElementById('featureModalTitle').textContent = 'Remove from Featured?';
                document.getElementById('featureModalDesc').textContent = 'This property will no longer be highlighted on the homepage.';
                document.getElementById('featureSubmitBtn').textContent = 'Unfeature Property';
            } else {
                document.getElementById('featureModalTitle').textContent = 'Feature Property?';
                document.getElementById('featureModalDesc').textContent = 'Featured properties are highlighted and placed at the top of search results.';
                document.getElementById('featureSubmitBtn').textContent = 'Feature Property';
            }
        });
    });
// Add this inside your <script> block
async function updatePropertyStatus(selectElement) {
    const propertyId = selectElement.getAttribute('data-property-id');
    const newStatus = selectElement.value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // Visually indicate updating state
    selectElement.disabled = true;

    try {
        const response = await fetch(`/admin/properties/${propertyId}/status`, {
            method: 'PATCH', // or 'POST', match this with your routes/web.php definition
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ verified: newStatus })
        });

        const data = await response.json();

        if (response.ok && data.success) {
            // Optional: Provide visual success feedback
            selectElement.style.borderColor = '#198754'; // green border on success
            setTimeout(() => selectElement.style.borderColor = '', 2000);
        } else {
            alert(data.message || 'Failed to update property status.');
        }
    } catch (error) {
        console.error('Error updating status:', error);
        alert('An error occurred while updating the status.');
    } finally {
        selectElement.disabled = false;
    }
}
    // Auto-submit search input with debouncing
    const searchInput = document.getElementById('searchInput');
    const filterForm = document.getElementById('filterForm');
    let searchTimeout = null;

    if (searchInput && filterForm) {
        searchInput.addEventListener('input', () => {
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                filterForm.submit();
            }, 500);
        });
    }
</script>   <?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/admin/property-management.blade.php ENDPATH**/ ?>