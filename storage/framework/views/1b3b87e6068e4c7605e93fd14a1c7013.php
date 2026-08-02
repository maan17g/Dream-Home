<?php echo $__env->make('user.layout.header',['title'=>'Saved Properties | Dream Home'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="user-dashboard.html">Home</a> / <span class="current">Saved Properties</span></div>
      <div class="dash-page-head">
        <div><h1 class="dash-page-title">Saved Properties</h1><p class="dash-page-desc">12 properties you've bookmarked.</p></div>
        <div class="dash-head-actions">
          <span id="compareBar" class="dash-btn-secondary" style="display:none;"><i class="bi bi-columns-gap"></i> Compare (<span id="compareCount">0</span>)</span>
        </div>
      </div>

      <div class="row g-3">
       <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <a href="<?php echo e(route('property.index')); ?>" class="text-decoration-none text-primary-custom text-center fs-2 fw-bold">Browse Properties</a>
<?php endif; ?>
      </div>

      <div class="dash-pagination-bar">
    <!-- Dynamic counters that update automatically -->
    <span>
        Showing <?php echo e($properties->firstItem()); ?> 
        to <?php echo e($properties->lastItem()); ?> 
        of <?php echo e($properties->total()); ?> entries
    </span>
    
    <!-- Dynamic paginatio  n buttons -->
    <?php echo e($properties->links()); ?>

</div>

    </main>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src='<?php echo e(asset('asset/js/script.js')); ?>'></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; });

</script>
</body>
</html>
sc
<?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/user/user-saved.blade.php ENDPATH**/ ?>