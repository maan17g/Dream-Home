<?php echo $__env->make('user.layout.header',['title'=>'My Dashboard | Dream Home'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
  

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="user-dashboard.html">Home</a> / <span class="current">Dashboard</span></div>
      <div class="dash-page-head">
        <div><h1 class="dash-page-title">Welcome back, <?php echo e(Auth::user()->first_name); ?> 👋</h1><p class="dash-page-desc">Here's what's new since your last visit.</p></div>
        <div class="dash-head-actions"><a href="<?php echo e(route('property.index')); ?>" class="dash-btn-primary"><i class="bi bi-search"></i> Browse Properties</a></div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-heart-fill"></i></div><div><div class="stat-label">Saved Properties</div><div class="stat-value"><?php echo e(Auth::user()->savedProperties()->count()); ?>

</div></div></div></div>
        <div class="col-6 col-lg-3"><div class="stat-card"><div class="stat-icon"><i class="bi bi-calendar-check-fill"></i></div><div><div class="stat-label">Appointments</div><div class="stat-value"><?php echo e(Auth::user()->appointments->count()); ?></div></div></div></div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-lg-12">
          <div class="dash-panel">
            <div class="dash-panel-head"><div class="dash-panel-title">Recommended For You</div><a href="<?php echo e(route('property.index')); ?>" class="dash-link">View All</a></div>
            <div class="row g-3">
                    <?php
    $properties = App\Models\Property::latest()->take(2)->get();
?>
<?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if (isset($component)) { $__componentOriginal4532de4c7fd0861589289e273a4fcf93 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4532de4c7fd0861589289e273a4fcf93 = $attributes; } ?>
<?php $component = App\View\Components\Property::resolve(['property' => $property] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('property'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Property::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4532de4c7fd0861589289e273a4fcf93)): ?>
<?php $attributes = $__attributesOriginal4532de4c7fd0861589289e273a4fcf93; ?>
<?php unset($__attributesOriginal4532de4c7fd0861589289e273a4fcf93); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4532de4c7fd0861589289e273a4fcf93)): ?>
<?php $component = $__componentOriginal4532de4c7fd0861589289e273a4fcf93; ?>
<?php unset($__componentOriginal4532de4c7fd0861589289e273a4fcf93); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
          </div>
        </div>
      
      </div>

      <div class="dash-panel">
        <div class="dash-panel-head"><div class="dash-panel-title">Upcoming Appointments</div><a href="<?php echo e(route('user.appointments')); ?>" class="dash-link">View All</a></div>
   <?php
    // Fetch the single most recent appointment
    $appointment = Auth::user()->appointments()->latest()->first();
?>

<?php if($appointment): ?>
<div class="d-flex align-items-center justify-content-between gap-3">

  <div class="appt-date-box">
    <!-- Convert the string to a date object using Carbon::parse before formatting -->
    <div class="d"><?php echo e($appointment->scheduled_at ? \Carbon\Carbon::parse($appointment->scheduled_at)->format('d') : '--'); ?></div>
    <div class="m"><?php echo e($appointment->scheduled_at ? \Carbon\Carbon::parse($appointment->scheduled_at)->format('M') : 'None'); ?></div>
  </div>
      
      
  <div class="flex-fill">
        <!-- Changed to 'property_id' or another descriptive field if 'title' doesn't exist -->
        <div class="dash-row-title" style="font-size:.85rem;">
          Property ID: <?php echo e($appointment->property_id); ?>

        </div>
        <!-- Formatting the time using scheduled_at -->
        <div class="dash-row-sub">
          <?php echo e($appointment->scheduled_at ? \Carbon\Carbon::parse($appointment->scheduled_at)->format('h:i A') : 'No Time Set'); ?> with Agent ID: <?php echo e($appointment->agent_id); ?>

        </div>
      </div>
      
      <!-- Dynamically displaying the status (e.g., cancelled, confirmed) -->
      <span class="status-pill <?php echo e($appointment->status === 'confirmed' ? 'success' : 'danger'); ?>">
        <i class="bi bi-circle-fill"></i><?php echo e(ucfirst($appointment->status)); ?>

      </span>
    </div>
<?php else: ?>
    <p>No recent appointments found.</p>
<?php endif; ?>


        </div>
      </div>
    </main>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; });
</script>
</body>
</html>
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/user/user-dashboard.blade.php ENDPATH**/ ?>