<?php echo $__env->make('admin.layout.header', ['title' => 'CMS Reviews | Dream Home Admin'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dash-content">
    <div class="dash-breadcrumb">
        <a href="<?php echo e(route('admin.index')); ?>">Admin</a> / <span class="current">CMS Reviews</span>
    </div>

    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">Manage Reviews & Testimonials</h1>
            <p class="dash-page-desc">Feature specific user reviews to display on the frontend homepage.</p>
        </div>
    </div>


    <div class="dash-panel">
        <div class="dash-panel-head d-flex justify-content-between align-items-center">
            <div>
                <div class="dash-panel-title">All Customer Reviews</div>
                <div class="dash-panel-sub">Toggle the switch to feature or unfeature reviews on your site</div>
            </div>
        </div>

        <div class="dash-table-wrap">
            <table class="dash-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Property</th>
                        <th>Rating</th>
                        <th>Comment</th>
                        <th>Featured</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <?php if($review->appointment?->user?->avatar): ?>
                                        <img src="<?php echo e(asset('storage/' . $review->appointment->user->avatar)); ?>"
                                            alt="User Avatar" class="rounded-circle"
                                            style="width: 36px; height: 36px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="rounded-circle bg-light d-flex align-items-center justify-content-center text-muted fw-bold"
                                            style="width: 36px; height: 36px;">
                                            <?php echo e(strtoupper(substr($review->appointment?->user?->first_name ?? 'U', 0, 1))); ?>

                                        </div>
                                    <?php endif; ?>
                                    <div>
                                        <div class="fw-bold">
                                            <?php echo e($review->appointment?->user?->first_name); ?>

                                            <?php echo e($review->appointment?->user?->last_name); ?>

                                        </div>
                                        <small
                                            class="text-muted-custom"><?php echo e($review->appointment?->user?->email); ?></small>
                                    </div>
                                </div>
                            </td>

                            
                            <td>
                                <div class="fw-bold text-truncate" style="max-width: 180px;"
                                    title="<?php echo e($review->property?->title); ?>">
                                    <?php echo e($review->property?->title ?? 'N/A'); ?>

                                </div>
                                <small class="text-muted-custom">
                                    $<?php echo e(number_format((float) ($review->property?->price ?? 0), 2)); ?> /
                                    <?php echo e(ucfirst($review->property?->purpose ?? 'N/A')); ?>

                                </small>
                            </td>

                            
                            <td>
                                <div class="text-warning">
                                    <?php for($i = 1; $i <= 5; $i++): ?>
                                        <i class="bi bi-star<?php echo e($i <= $review->rating ? '-fill' : ''); ?>"></i>
                                    <?php endfor; ?>
                                    <span
                                        class="ms-1 text-white
                                         fw-bold">(<?php echo e($review->rating); ?>/5)</span>
                                </div>
                            </td>

                            
                            <td>
                                <?php if($review->comment): ?>
                              
                                    <p class="mb-0 text-break" style="max-width: 250px;">
                                        "<?php echo e($review->comment); ?>"
                                    </p>
                               
                                <?php endif; ?>
                            </td>

                            
                            <td>
                                <form action="<?php echo e(route('admin.review.toggle', $review->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('PATCH'); ?>
                                    <label class="dash-toggle">
                                        <input type="checkbox" onchange="this.form.submit()"
                                            <?php echo e($review->featured ? 'checked' : ''); ?>>
                                        <span class="dash-toggle-slider"></span>
                                    </label>
                                </form>
                            </td>

                            
                            <td>
                                <div class="row-actions">
                                    <form action="<?php echo e(route('admin.review.delete', $review->id)); ?>" method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this review?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="row-action-btn danger" title="Delete Review">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    <?php if(!$review->status): ?>
                                        

                                        <form action="<?php echo e(route('admin.review.status', $review->id)); ?>" method="POST"
                                            class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <button type="submit" class="row-action-btn danger" title="Delete Review">
                                                <i class="bi bi-check-circle"></i>
                                            </button>
                                        </form>
                                       
                                  
                                        
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
                                <i class="bi bi-chat-left-quote fs-2 d-block mb-2 text-secondary"></i>
                                No reviews found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('asset/js/script.js')); ?>"></script>
<script src="<?php echo e(asset('dashboard/assets/js/script.js')); ?>"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    document.getElementById('burgerBtn').addEventListener('click', () => {
        if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open');
        else sidebar.classList.toggle('collapsed');
    });
</script>
</body>

</html>
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/admin/cms.blade.php ENDPATH**/ ?>