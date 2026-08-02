<?php echo $__env->make('agent.layout.header', ['title' => 'Agent Dashboard | Dream Home'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dash-content">
    <div class="dash-breadcrumb"><a href="agent-dashboard.html">Agent</a> / <span class="current">Dashboard</span></div>
    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">Welcome back, <?php echo e(Auth::user()->first_name); ?> 👋</h1>
            <p class="dash-page-desc">Here's how your listings are performing this week.</p>
        </div>
        <div class="dash-head-actions"><a href="<?php echo e(route('property.create')); ?>" class="dash-btn-primary"><i
                    class="bi bi-plus-lg"></i> Add Listing</a></div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-buildings-fill"></i></div>
                <div>
                    <div class="stat-label">My Listings</div>
                    <div class="stat-value text-center  "><?php echo e(Auth::user()->agent->properties->count()); ?></div>

                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-eye-fill"></i></div>
                <div>
                    <div class="stat-label">Total Views</div>
                    <div class="stat-value text-center"><?php echo e(Auth::user()->agent->properties->sum('views')); ?></div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-calendar-check-fill"></i></div>
                <div>
                    <div class="stat-label">Appointments</div>
                    <div class="stat-value text-center"><?php echo e(Auth::user()->agent->appointments->count()); ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-3">
        <div class="col-lg-8">
            <div class="dash-panel">
                <div class="dash-panel-head">
                    <div>
                        <div class="dash-panel-title">Performance</div>
                        <div class="dash-panel-sub">Most Views</div>
                    </div>
                </div>
                <div id="" height="110">
                    <div class="dash-panel" id="tableView">
                        <div class="dash-table-wrap">
                            <table class="dash-table text-center">
                                <thead>
                                    <tr>
                                        <th>Property</th>

                                        <th>Status</th>
                                        <th>Views</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $thumbnail =
                                                $property->images->firstWhere('is_thumbnail', 1) ??
                                                $property->images->first();
                                            $thumbnailUrl = $thumbnail
                                                ? asset('storage/' . $thumbnail->image)
                                                : asset('images/default-property.jpg');
                                        ?>
                                        <tr>
                                            <td class="d-flex align-items-center gap-2">
                                                <img class="dash-row-thumb" src="<?php echo e($thumbnailUrl); ?>"
                                                    alt="<?php echo e($property->title); ?>">
                                                <div>
                                                    <div class="dash-row-title"><?php echo e($property->title); ?></div>

                                            </td>

                                            </td>
                                            <td><span class="status-pill success"><i
                                                        class="bi bi-circle-fill"></i><?php echo e(Str::title($property->verified)); ?></span>
                                            </td>
                                            <td><?php echo e(number_format($property->views)); ?></td>

                                            <td>

                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

    <div class="row g-3">

        <div class="col-lg-12">
            <div class="dash-panel">
                <div class="dash-panel-head">
                    <div class="dash-panel-title">Upcoming Appointments</div><a
                        href="<?php echo e(route('agent.appointments')); ?>" class="dash-link">View All</a>
                </div>
         

              <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <?php
        // 1. Handle avatar string path extraction safely
        $thumbnailPath = $appt->user?->avatar;
        $thumbnailUrl = !empty($thumbnailPath)
            ? asset('storage/' . $thumbnailPath)
            : asset('images/default-property.jpg');

        // 2. Parse the dynamic date string using Carbon
        $date = \Carbon\Carbon::parse($appt->scheduled_at);
    ?>
    
    <div class="appointment-card">
        <!-- Dynamic Date Box -->
        <div class="appt-date-box">
            <div class="d"><?php echo e($date->format('d')); ?></div> <!-- e.g., 16 -->
            <div class="m"><?php echo e($date->format('M')); ?></div> <!-- e.g., Feb -->
        </div>
        
        <div class="flex-fill">
            <div class="customer-card">
                <img src="<?php echo e($thumbnailUrl); ?>" alt="<?php echo e($appt->user?->name ?? 'User Avatar'); ?>">
                <div>
                    <!-- Dynamic User Name -->
                    <div class="dash-row-title" style="font-size:.82rem;">
                        <?php echo e($appt->user?->name ?? 'Unknown Customer'); ?>

                    </div>
                    
                    <!-- Dynamic Property Name & Time -->
                    <div class="dash-row-sub">
                        <?php echo e($appt->property?->title ?? 'Property Details'); ?> · <?php echo e($date->format('g:i A')); ?>

                    </div>
                </div>
            </div>

            <!-- Single tag HTML implementation for Read More notes feature -->
        
        </div>
        
        <!-- Dynamic Status Pill classes based on status string value -->
        <span class="status-pill <?php echo e($appt->status === 'completed' ? 'success' : ($appt->status === 'pending' ? 'warning' : 'danger')); ?>">
            <i class="bi bi-circle-fill"></i><?php echo e(ucfirst($appt->status)); ?>

        </span>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <div class="no-records">No appointments found.</div>
<?php endif; ?>

            </div>
        </div>
    </div>
</main>
</div>
</div>
<?php echo e(Auth::user()->properties); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    document.getElementById('burgerBtn').addEventListener('click', () => {
        if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open');
        else sidebar.classList.toggle('collapsed');
    });
    const themeBtn = document.getElementById('themeToggle');
    const root = document.documentElement;
    themeBtn.addEventListener('click', () => {
        const isLight = root.getAttribute('data-theme') === 'light';
        root.setAttribute('data-theme', isLight ? 'dark' : 'light');
        themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' :
            '<i class="bi bi-sun-fill"></i>';
        drawChart();
    });
</script>
</body>

</html>
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/agent/agent-dashboard.blade.php ENDPATH**/ ?>