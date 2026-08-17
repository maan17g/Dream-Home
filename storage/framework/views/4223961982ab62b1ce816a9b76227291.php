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
                            <th>Review</th>
                            <th>Actions</th>
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

                                <!-- REVIEW ACTION COLUMN -->
                                <td>
                                    <?php if($appt->status === 'completed'): ?>
                                        <?php if($appt->review): ?>
                                            <span class="badge bg-success"><i class="bi bi-star-fill me-1"></i> Reviewed</span>
                                        <?php else: ?>
                                            <button type="button" 
                                                    class="btn btn-sm btn-outline-primary py-0" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#reviewModal"
                                                    onclick="populateReviewModal(<?php echo e($appt->id); ?>, <?php echo e($appt->property->id); ?>, '<?php echo e(addslashes($appt->property->title)); ?>')">
                                                <i class="bi bi-star"></i> Leave Review
                                            </button>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <span class="text-muted small">N/A</span>
                                    <?php endif; ?>
                                </td>

                                <td>
                                    <form action="<?php echo e(route('appointment.delete', $appt->id)); ?>" method="GET">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="status-pill danger border-0">
                                           Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No appointment history found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<!-- REVIEW POPUP MODAL -->
<div class="modal fade property-card" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content dash-modal">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Leave a Review</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="<?php echo e(route('user.review')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <p class="text-muted-custo">How was your experience visiting <strong id="modalPropertyTitle">this property</strong>?</p>
                    
                    <input type="hidden" name="appointment_id" id="modalAppointmentId" value="<?php echo e($unreviewedAppointment->id ?? ''); ?>">
                    <input type="hidden" name="property_id" id="modalPropertyId" value="<?php echo e($unreviewedAppointment->property_id ?? ''); ?>">

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Rating</label>
                        <select name="rating" class="form-select" required>
                            <option value="5" selected>⭐⭐⭐⭐⭐ (5/5) Excellent</option>
                            <option value="4">⭐⭐⭐⭐ (4/5) Very Good</option>
                            <option value="3">⭐⭐⭐ (3/5) Average</option>
                            <option value="2">⭐⭐ (2/5) Poor</option>
                            <option value="1">⭐ (1/5) Terrible</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label font-weight-bold">Your Review / Feedback</label>
                        <textarea name="comment" class="form-control" rows="3" placeholder="Write your feedback here..."></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo e(asset('dashboard/assets/js/script.js')); ?>"></script>
<script>
    // Tab switching logic
    document.querySelectorAll('.dash-tab').forEach(t => t.addEventListener('click', () => {
        document.querySelectorAll('.dash-tab').forEach(x => x.classList.remove('active'));
        t.classList.add('active');
        document.getElementById('pane-upcoming').classList.toggle('d-none', t.dataset.tab !== 'upcoming');
        document.getElementById('pane-history').classList.toggle('d-none', t.dataset.tab !== 'history');
    }));

    // Function to populate modal dynamically when user clicks "Leave Review" button manually
    function populateReviewModal(apptId, propId, propTitle) {
        document.getElementById('modalAppointmentId').value = apptId;
        document.getElementById('modalPropertyId').value = propId;
        document.getElementById('modalPropertyTitle').innerText = propTitle;
    }

    // AUTO POPUP LOGIC: Automatically open modal if a completed appointment is pending a review
    <?php if(isset($unreviewedAppointment) && $unreviewedAppointment): ?>
        document.addEventListener('DOMContentLoaded', function() {
            populateReviewModal(
                <?php echo e($unreviewedAppointment->id); ?>, 
                <?php echo e($unreviewedAppointment->property_id); ?>, 
                '<?php echo e(addslashes($unreviewedAppointment->property->title ?? "Property")); ?>'
            );
            var myModal = new bootstrap.Modal(document.getElementById('reviewModal'));
            myModal.show();
        });
    <?php endif; ?>
</script>
</body>
</html><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/user/user-appointments.blade.php ENDPATH**/ ?>