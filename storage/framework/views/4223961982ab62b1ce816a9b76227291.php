<?php echo $__env->make('user.layout.header', ['title' => 'My Appointments | Dream Home'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php echo $__env->make('layout.Notification', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<main class="dash-content">
    <div class="dash-breadcrumb">
        <a href="<?php echo e(route('page.index')); ?>">Home</a> / <span class="current">My Appointments</span>
    </div>

    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">My Appointments</h1>
            <p class="dash-page-desc">Track your scheduled property viewings.</p>
        </div>
    </div>

    <div class="dash-tabs">
        <button class="dash-tab active" data-tab="upcoming">Upcoming (<?php echo e(($upcoming ?? collect())->count()); ?>)</button>
        <button class="dash-tab" data-tab="history">History (<?php echo e(($history ?? collect())->count()); ?>)</button>
    </div>

    <!-- UPCOMING PANE -->
    <div id="pane-upcoming">
        <?php $__empty_1 = true; $__currentLoopData = $upcoming ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="appointment-card mb-2">
                <div class="appt-date-box">
                    <div class="d"><?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('d')); ?></div>
                    <div class="m"><?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('M')); ?></div>
                
                </div>

                <div class="flex-fill ms-3">
                    <div class="dash-row-title" style="font-size:.85rem;">
                        <a href="<?php echo e(route('property.show', $appt->property->id)); ?>" class="text-decoration-none text-reset">
                            <?php echo e($appt->property->title); ?>

                        </a>
                    </div>
                    <div class="dash-row-sub">
                        <?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('g:i A')); ?> · with 
                        <?php echo e($appt->agent->user->first_name ?? 'Agent'); ?> <?php echo e($appt->agent->user->last_name ?? ''); ?>

                    </div>
                </div>

                <span class="status-pill <?php echo e($appt->status === 'confirmed' ? 'success' : 'warning'); ?>">
                    <i class="bi bi-circle-fill"></i> <?php echo e(ucfirst($appt->status)); ?>

                </span>
           
                <div class="row-actions ms-2">
                    <form action="<?php echo e(route('appointments.update-status', $appt->id)); ?>" method="POST" onsubmit="return confirm('Are you sure you want to cancel this viewing?');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <input type="hidden" name="status" value="cancelled">
                        <button type="submit" class="row-action-btn danger" title="Cancel Appointment">
                            <i class="bi bi-x-lg"></i>
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="dash-empty text-center py-4">
                <i class="bi bi-calendar-event fs-2 text-muted"></i>
                <h6 class="mt-2">No upcoming appointments</h6>
            </div>
        <?php endif; ?>
    </div>

    <!-- HISTORY PANE -->
    <div id="pane-history" class="d-none">
        <div class="dash-panel">
            <div class="dash-table-wrap">
                <table class="dash-table">
                    <thead>
                        <tr>
                            <th>Property</th>
                            <th>Date</th>
                            <th>Agent</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $history ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="dash-row-title">
                                    <a href="<?php echo e(route('property.show', $appt->property->id)); ?>" class="text-decoration-none text-reset">
                                        <?php echo e($appt->property->title); ?>

                                    </a>
                                </td>
                               
                                <td><?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('M d, Y · g:i A')); ?></td>
                                <td><?php echo e($appt->agent->user->first_name ?? 'Agent'); ?> <?php echo e($appt->agent->user->last_name ?? ''); ?></td>
                                <td>
                                    <span class="status-pill <?php echo e($appt->status === 'completed' ? 'success' : 'danger'); ?>">
                                        <i class="bi bi-circle-fill"></i> <?php echo e(ucfirst($appt->status)); ?>

                                    </span>
                                </td>
                                <td>
                                    <form action="<?php echo e(route('appointment.delete',$appt->id)); ?>" method="GET">
                                        <?php echo csrf_field(); ?>
                                        <button type=submit class="status-pill danger">
                                           Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="4" class="text-center py-4 text-muted">No appointment history found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('dashboard/assets/js/script.js')); ?>"></script>
<script>
    document.querySelectorAll('.dash-tab').forEach(t => t.addEventListener('click', () => {
        document.querySelectorAll('.dash-tab').forEach(x => x.classList.remove('active'));
        t.classList.add('active');
        document.getElementById('pane-upcoming').classList.toggle('d-none', t.dataset.tab !== 'upcoming');
        document.getElementById('pane-history').classList.toggle('d-none', t.dataset.tab !== 'history');
    }));
</script>
</body>
</html><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/user/user-appointments.blade.php ENDPATH**/ ?>