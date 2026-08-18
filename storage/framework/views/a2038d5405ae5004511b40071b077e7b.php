<?php echo $__env->make('admin.layout.header', ['title' => 'Inquiries | Dream Home Admin'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dash-content">
  <div class="dash-breadcrumb">
    <a href="<?php echo e(route('admin.index')); ?>">Admin</a> / <span class="current">Inquiries</span>
  </div>
  
  <div class="dash-page-head">
    <div>
      <h1 class="dash-page-title">Contact Inquiries</h1>
      <p class="dash-page-desc"><?php echo e(number_format(\App\Models\ContactInquiry::count())); ?> total messages — review lead details, status, and property questions.</p>
    </div>
  </div>

  
  

  
  <div class="dash-panel">
    <div class="dash-table-wrap">
      <table class="dash-table">
        <thead>
          <tr>
            <th>Sender</th>
            <th>Phone</th>
            <th>Subject / Property</th>
            <th>Message Preview</th>
            <th>Received</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td>
                <div>
                  <div class="dash-row-title"><?php echo e(ucfirst($inquiry->name)); ?></div>
                  <div class="dash-row-sub"><?php echo e($inquiry->email); ?></div>
                </div>
              </td>
              <td><?php echo e($inquiry->phone ?? 'N/A'); ?></td>
              <td>
                <div class="fw-semibold"><?php echo e($inquiry->subject ?? 'General Inquiry'); ?></div>
                <?php if($inquiry->property): ?>
                  <small class="text-primary">
                    <i class="bi bi-house"></i> <?php echo e(Str::limit($inquiry->property->title, 25)); ?>

                  </small>
                <?php endif; ?>
              </td>
              <td style="max-width: 250px;">
                <span class="text-truncate d-block" title="<?php echo e($inquiry->message); ?>">
                  <?php echo e(Str::limit($inquiry->message, 60)); ?>

                </span>
              </td>
              <td><?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->format('M d, Y')); ?></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="5" class="text-center py-4">No contact inquiries found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    
    <div class="dash-pagination-bar">
      <span>Showing <?php echo e($inquiries->firstItem() ?? 0); ?> to <?php echo e($inquiries->lastItem() ?? 0); ?> of <?php echo e(number_format($inquiries->total())); ?> entries</span>
      
      <div class="dash-pagination">
        <?php echo $inquiries->withQueryString()->links('pagination::bootstrap-5'); ?>

      </div>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn')?.addEventListener('click', () => { 
    if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); 
    else sidebar.classList.toggle('collapsed'); 
  });
</script>
</body>
</html><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/admin/contacts.blade.php ENDPATH**/ ?>