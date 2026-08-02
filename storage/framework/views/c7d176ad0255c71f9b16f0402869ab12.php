<?php echo $__env->make('agent.layout.header', ['title' => 'Appointments | Dream Home Agent'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dash-content">
    <div class="dash-breadcrumb">
        <a href="<?php echo e(route('agent.index')); ?>">Agent</a> / <span class="current">Appointments</span>
    </div>

    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">Appointments</h1>
            <p class="dash-page-desc"><?php echo e(($upcoming ?? collect())->count()); ?> upcoming viewings scheduled.</p>
        </div>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="dash-tabs">
                <button class="dash-tab active" data-tab="upcoming">Upcoming
                    (<?php echo e(($upcoming ?? collect())->count()); ?>)</button>
                <button class="dash-tab" data-tab="completed">Completed
                    (<?php echo e(($completed ?? collect())->count()); ?>)</button>
                <button class="dash-tab" data-tab="cancelled">Cancelled
                    (<?php echo e(($cancelled ?? collect())->count()); ?>)</button>
            </div>

            <!-- UPCOMING PANE -->
            <div class="appt-pane" id="pane-upcoming">
                <?php $__empty_1 = true; $__currentLoopData = $upcoming ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="appointment-card mb-2 p-3 border rounded">
                        <div class="d-flex align-items-start">
                            <div class="appt-date-box align-self-center">
                                <div class="d"><?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('d')); ?></div>
                                <div class="m"><?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('M')); ?></div>
                            </div>

                            <div class="customer-card flex-fill ms-3">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e($appt->user->avatar ? asset('storage/' . $appt->user->avatar) : 'https://i.pravatar.cc/100?u=' . $appt->user->id); ?>"
                                        alt="Avatar" class="rounded-circle" width="40" height="40">
                                    <div class="ms-2">
                                        <div class="dash-row-title" style="font-size:.85rem;">
                                            <?php echo e($appt->user->first_name); ?> <?php echo e($appt->user->last_name); ?>

                                        </div>
                                        <div class="dash-row-sub " style="font-size:.75rem;">
                                            <?php echo e($appt->property->title); ?> ·
                                            <?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('g:i A')); ?>

                                        </div>
                                    </div>
                                </div>

                                
                                <?php if($appt->notes): ?>
                                    <div class="mt-2 p-2 bg-light rounded text-secondary"
                                        style="font-size: 0.825rem; border-left: 3px solid #c9a24b;">
                                        <i class="bi bi-chat-left-text me-1"></i> <strong>Buyer Note:</strong>
                                        "<?php echo e($appt->notes); ?>"
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex align-items-center ms-2 align-self-center">
                                <span
                                    class="status-pill <?php echo e($appt->status === 'confirmed' ? 'success' : 'warning'); ?> me-2">
                                    <i class="bi bi-circle-fill"></i> <?php echo e(ucfirst($appt->status)); ?>

                                </span>

                                <div class="row-actions d-flex gap-1">
                                    <?php if($appt->status === 'pending'): ?>
                                        <form action="<?php echo e(route('appointments.update-status', $appt->id)); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <input type="hidden" name="status" value="confirmed">
                                            <button type="submit"
                                                class="row-action-btn text-success btn btn-sm btn-light"
                                                title="Approve">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>

                                    <?php if($appt->status === 'confirmed'): ?>
                                        <form action="<?php echo e(route('appointments.update-status', $appt->id)); ?>"
                                            method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>
                                            <input type="hidden" name="status" value="completed">
                                            <button type="submit"
                                                class="row-action-btn text-primary btn btn-sm btn-light"
                                                title="Mark Completed">
                                                <i class="bi bi-check2-circle"></i>
                                            </button>
                                        </form>
                                    <?php endif; ?>

                                    <form action="<?php echo e(route('appointments.update-status', $appt->id)); ?>" method="POST"
                                        onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>
                                        <input type="hidden" name="status" value="cancelled">
                                        <button type="submit" class="row-action-btn text-danger btn btn-sm btn-light"
                                            title="Cancel">
                                            <i class="bi bi-x-lg"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="dash-empty text-center py-4">
                        <i class="bi bi-calendar-check fs-2 text-muted"></i>
                        <h6 class="mt-2">No upcoming appointments</h6>
                    </div>
                <?php endif; ?>
            </div>

            <!-- COMPLETED PANE -->
            <div class="appt-pane d-none" id="pane-completed">
                <?php $__empty_1 = true; $__currentLoopData = $completed ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="appointment-card mb-2 p-3 border rounded">
                        <div class="d-flex align-items-start">
                            <div class="appt-date-box">
                                <div class="d"><?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('d')); ?></div>
                                <div class="m"><?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('M')); ?></div>
                            </div>
                            <div class="customer-card flex-fill ms-3">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e($appt->user->avatar ? asset('storage/' . $appt->user->avatar) : 'https://i.pravatar.cc/100?u=' . $appt->user->id); ?>"
                                        alt="Avatar" class="rounded-circle" width="40" height="40">
                                    <div class="ms-2">
                                        <div class="dash-row-title" style="font-size:.85rem;">
                                            <?php echo e($appt->user->first_name); ?> <?php echo e($appt->user->last_name); ?></div>
                                        <div class="dash-row-sub text-muted" style="font-size:.75rem;">
                                            <?php echo e($appt->property->title); ?> ·
                                            <?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('g:i A')); ?></div>
                                    </div>
                                </div>
                                <?php if($appt->notes): ?>
                                    <div class="mt-2 p-2 bg-light rounded text-secondary"
                                        style="font-size: 0.825rem; border-left: 3px solid #6c757d;">
                                        <i class="bi bi-chat-left-text me-1"></i> <strong>Buyer Note:</strong>
                                        "<?php echo e($appt->notes); ?>"
                                    </div>
                                <?php endif; ?>
                            </div>
                            <span class="status-pill success"><i class="bi bi-circle-fill"></i> Completed</span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="dash-empty text-center py-4">
                        <i class="bi bi-check2-circle fs-2 text-muted"></i>
                        <h6 class="mt-2">No completed viewings</h6>
                    </div>
                <?php endif; ?>
            </div>

            <!-- CANCELLED PANE -->
            <div class="appt-pane d-none" id="pane-cancelled">
                <?php $__empty_1 = true; $__currentLoopData = $cancelled ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="appointment-card mb-2 p-3 border rounded">
                        <div class="d-flex align-items-start">
                            <div class="appt-date-box">
                                <div class="d"><?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('d')); ?>

                                </div>
                                <div class="m"><?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('M')); ?>

                                </div>
                            </div>
                            <div class="customer-card flex-fill ms-3">
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e($appt->user->avatar ? asset('storage/' . $appt->user->avatar) : 'https://i.pravatar.cc/100?u=' . $appt->user->id); ?>"
                                        alt="Avatar" class="rounded-circle" width="40" height="40">
                                    <div class="ms-2">
                                        <div class="dash-row-title" style="font-size:.85rem;">
                                            <?php echo e($appt->user->first_name); ?> <?php echo e($appt->user->last_name); ?></div>
                                        <div class="dash-row-sub text-muted" style="font-size:.75rem;">
                                            <?php echo e($appt->property->title); ?> ·
                                            <?php echo e(\Carbon\Carbon::parse($appt->scheduled_at)->format('g:i A')); ?></div>
                                    </div>
                                </div>
                                <?php if($appt->notes): ?>
                                    <div class="mt-2 p-2 bg-light rounded text-secondary"
                                        style="font-size: 0.825rem; border-left: 3px solid #dc3545;">
                                        <i class="bi bi-chat-left-text me-1"></i> <strong>Buyer Note:</strong>
                                        "<?php echo e($appt->notes); ?>"
                                    </div>
                                <?php endif; ?>
                            </div>
                            <span class="status-pill danger"><i class="bi bi-circle-fill"></i> Cancelled</span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="dash-empty text-center py-4">
                        <i class="bi bi-calendar-x fs-2 text-muted"></i>
                        <h6 class="mt-2">No cancelled appointments</h6>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Mini Calendar Side Column -->
        <div class="col-lg-4">
            <?php if (isset($component)) { $__componentOriginalb48f24e7f1e6500235d793f86e90edf3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb48f24e7f1e6500235d793f86e90edf3 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.side-calendar','data' => ['upcoming' => $upcoming ?? collect(),'completed' => $completed ?? collect(),'cancelled' => $cancelled ?? collect()]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('side-calendar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['upcoming' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($upcoming ?? collect()),'completed' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($completed ?? collect()),'cancelled' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cancelled ?? collect())]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb48f24e7f1e6500235d793f86e90edf3)): ?>
<?php $attributes = $__attributesOriginalb48f24e7f1e6500235d793f86e90edf3; ?>
<?php unset($__attributesOriginalb48f24e7f1e6500235d793f86e90edf3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb48f24e7f1e6500235d793f86e90edf3)): ?>
<?php $component = $__componentOriginalb48f24e7f1e6500235d793f86e90edf3; ?>
<?php unset($__componentOriginalb48f24e7f1e6500235d793f86e90edf3); ?>
<?php endif; ?>
        </div>
    </div>
</main>

<script src="<?php echo e(asset('dashboard/assets/js/script.js')); ?>"></script>
</body>

</html><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/agent/agent-appointments.blade.php ENDPATH**/ ?>