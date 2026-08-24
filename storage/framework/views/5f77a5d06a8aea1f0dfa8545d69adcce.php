<?php echo $__env->make('admin.layout.header', ['title' => 'Customers | Dream Home Admin'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<main class="dash-content">
  <div class="dash-breadcrumb">
    <a href="<?php echo e(route('admin.index')); ?>">Admin</a> / <span class="current">Customers</span>
  </div>
  
  <div class="dash-page-head">
    <div>
      <h1 class="dash-page-title">Customers</h1>
      <p class="dash-page-desc"><?php echo e(number_format(\App\Models\User::count())); ?> registered users — track activity, saved properties, and inquiries.</p>
    </div>
   
  </div>

  
  <div class="dash-filter-bar">
    <form action="<?php echo e(request()->url()); ?>" method="GET">
      <div class="row g-3 align-items-end">
       
        <div class="col-lg-3 col-6">
          <label class="dash-filter-label">Status</label>
          <select name="status" class="dash-select" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="verified" <?php echo e(request('status') == 'verified' ? 'selected' : ''); ?>>Verified</option>
            <option value="unverified" <?php echo e(request('status') == 'unverified' ? 'selected' : ''); ?>>Unverified</option>
          </select>
        </div>
        <div class="col-lg-4 col-12">
          <label class="dash-filter-label">Sort By</label>
          <select name="sort" class="dash-select" onchange="this.form.submit()">
            <option value="newest" <?php echo e(request('sort') == 'newest' ? 'selected' : ''); ?>>Newest</option>
            <option value="oldest" <?php echo e(request('sort') == 'oldest' ? 'selected' : ''); ?>>Oldest</option>
          </select>
        </div>
      </div>
    </form>
  </div>

  
  <div class="dash-panel">
    <div class="dash-table-wrap">
      <table class="dash-table">
        <thead>
          <tr>
            <th>Customer</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Joined</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td class="d-flex align-items-center gap-2">
                <img 
                  class="dash-row-thumb" 
                  style="border-radius:50%; width: 40px; height: 40px; object-fit: cover;" 
                  src="<?php echo e(asset('storage/' . $user->avatar)); ?>" 
                  alt="<?php echo e($user['first_name']); ?>"
                >
                <div>
                  <div class="dash-row-title"><?php echo e(ucfirst($user->first_name)); ?> <?php echo e(ucfirst($user->last_name)); ?></div>
                  <div class="dash-row-sub"><?php echo e($user->email); ?></div>
                </div>
              </td>
              <td>
              <form action="<?php echo e(route('users.updateRoles', $user->id)); ?>" method="POST" class="d-inline">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
   <?php if($user->role==='agent'): ?>
    <div name="role" 
            class="badge border-0 <?php echo e($user->role === 'admin' ? 'bg-danger' : ($user->role === 'agent' ? 'bg-info' : 'bg-secondary')); ?>" 
            onchange="this.form.submit()" 
            style="cursor: pointer; outline: none;">
            <option value="agent" <?php echo e($user->role === 'agent' ? 'selected' : ''); ?>>Agent</option>
              </div >
    <?php else: ?>
    <select name="role" 
            class="badge border-0 <?php echo e($user->role === 'admin' ? 'bg-danger' : ($user->role === 'agent' ? 'bg-info' : 'bg-secondary')); ?>" 
            onchange="this.form.submit()" 
            style="cursor: pointer; outline: none;">
        
        <option value="buyer" <?php echo e($user->role === 'buyer' ? 'selected' : ''); ?>>Buyer</option>
        <option value="admin" <?php echo e($user->role === 'admin' ? 'selected' : ''); ?>>Admin</option>

    </select>
    <?php endif; ?>
</form>
              </td>
              <td><?php echo e($user['phone'] ?? 'N/A'); ?></td>
              <td>
                <?php if($user['is_verified']): ?>
                  <span class="status-pill success"><i class="bi bi-circle-fill"></i> Verified</span>
                <?php else: ?>
                  <span class="status-pill danger"><i class="bi bi-circle-fill"></i> Unverified</span>
                <?php endif; ?>
              </td>
              <td><?php echo e(\Carbon\Carbon::parse($user->created_at)->format('M d, Y')); ?></td>
              <td>
                <div class="row-actions mx-auto">
               
   <form action="<?php echo e(route('users.suspend', $user->id)); ?>" method="POST" class="d-inline">
    <?php echo csrf_field(); ?>
    <?php echo method_field('PATCH'); ?>
    
    <button type="submit" 
            class="row-action-btn border-0 bg-transparent p-0 <?php echo e($user->status !== 'inactive' ? 'danger' : 'success'); ?>" 
            title="<?php echo e($user->status !== 'inactive' ? 'Suspend User' : 'Activate User'); ?>"
            onclick="return confirm('Are you sure you want to change this user status?')">
        
        <?php if($user->status !== 'inactive'): ?>
            <i class="bi bi-slash-circle "></i>
        <?php else: ?>
            <i class="bi bi-check-circle text-danger" style="color: #198754;"></i>
        <?php endif; ?>

    </button>
</form>
                </div>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="6" class="text-center py-4">No customers found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    
    <div class="dash-pagination-bar">
      <span>Showing <?php echo e($users->firstItem() ?? 0); ?> to <?php echo e($users->lastItem() ?? 0); ?> of <?php echo e(number_format($users->total())); ?> entries</span>
      
      <ul class="dash-pagination">
        
        <?php if($users['prev_page_url']): ?>
          <li class="page-link"><a href="<?php echo e($users['prev_page_url']); ?>"><i class="bi bi-chevron-left"></i></a></li>
     
        <?php endif; ?>

        
       <div class="dash-pagination-bar">
  
  
  <div class="dash-pagination">
    <?php echo $users->withQueryString()->links('pagination::bootstrap-5'); ?>

  </div>
</div>
      </ul>
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
</html><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate - Copy\resources\views/admin/customers.blade.php ENDPATH**/ ?>