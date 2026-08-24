<?php echo $__env->make('admin.layout.header', ['title' => 'Agents | Dream Home Admin'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dash-content">
    <div class="dash-breadcrumb"><a href="<?php echo e(route('admin.index')); ?>">Admin</a> / <span class="current">Agents</span></div>
    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">Agents</h1>
            <p class="dash-page-desc"><?php echo e($agents->count()); ?> agents on your platform — manage verification, performance,
                and approvals.</p>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-6">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-person-badge-fill"></i></div>
                <div>
                    <div class="stat-label">Total Agents</div>
                    <div class="stat-value"><?php echo e($agents->total()); ?></div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-star-fill"></i></div>
                <div>
                    <div class="stat-label">Avg. Rating</div>
                    <div class="stat-value"><?php echo e($globalAvgRating); ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <?php $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4">
                <div class="agent-card position-relative d-flex flex-column h-100">

                    
                    <div class="d-flex justify-content-between align-items-center w-100">
                        <?php if($agent->is_featured): ?>
                            <span class="badge-tag featured-badge">
                                <i class="bi bi-star-fill"></i> Featured
                            </span>
                        <?php else: ?>
                            <div></div> 
                        <?php endif; ?>

                        <?php if($agent->user->is_verified): ?>
                            <span class="badge-tag verified-badge">
                                <i class="bi bi-patch-check-fill"></i> Verified
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="agent-card-body text-center flex-grow-1">
                        <img src="<?php echo e(asset('storage/' . $agent->user->avatar)); ?>" alt="<?php echo e($agent->user->first_name); ?>"
                            class="agent-avatar mb-2">
                        <h6><?php echo e($agent->user->first_name . ' ' . $agent->user->last_name); ?></h6>
                        <div class="agent-role"><?php echo e(ucfirst(str_replace('_', ' ', $agent->agent_type))); ?></div>

                        <div class="rating-stars mb-1">★★★★★
                            <span class="text-muted-custom">
                                <?php echo e($agent->review->count() > 0 ? number_format($agent->review->avg('rating'), 1) : 'No Review'); ?>

                            </span>
                        </div>

                        <div class="agent-stats-row">
                            <div><strong><?php echo e($agent->properties->count()); ?></strong><span>Listings</span></div>
                           
                        </div>
                    </div>

                    
                    <div class="d-flex align-items-center gap-2 pt-2 border-top-custom">
                        <a href="<?php echo e(route('agent.show', $agent->id)); ?>"
                            class="dash-btn-secondary text-decoration-none flex-fill text-center py-2">
                            <i class="bi bi-eye"></i> View
                        </a>

                        <form action="<?php echo e(route('admin.agents.toggle-feature', $agent->id)); ?>" method="POST"
                            class="flex-fill m-0">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>
                            <button type="submit"
                                class="dash-btn-primary w-100 py-2 <?php echo e($agent->is_featured ? 'is-featured' : ''); ?>">
                                <i class="bi <?php echo e($agent->is_featured ? 'bi-star-fill' : 'bi-star'); ?>"></i>
                                <?php echo e($agent->is_featured ? 'Unfeature' : 'Feature'); ?>

                            </button>
                        </form>
                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="dash-pagination-bar mt-4">
        <span>
            Showing <?php echo e($agents->firstItem()); ?> to <?php echo e($agents->lastItem()); ?> of <?php echo e($agents->total()); ?> entries
        </span>

        <ul class="dash-pagination">
            <?php echo e($agents->links()); ?>

        </ul>
    </div>
</main>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate - Copy\resources\views/admin/agents.blade.php ENDPATH**/ ?>