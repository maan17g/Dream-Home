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
            <th class="text-end">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__empty_1 = true; $__currentLoopData = $inquiries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
              <td>
                <div>
                  <div class="dash-row-title"><?php echo e(ucfirst($inquiry->full_name ?? $inquiry->name)); ?></div>
                  <div class="dash-row-sub"><?php echo e($inquiry->email); ?></div>
                </div>
              </td>
              <td><?php echo e($inquiry->phone ?? 'N/A'); ?></td>
              <td>
                <div class="fw-semibold"><?php echo e($inquiry->subject ?? 'General Inquiry'); ?></div>
                <?php if(isset($inquiry->property)): ?>
                  <small class="text-primary">
                    <i class="bi bi-house"></i> <?php echo e(Str::limit($inquiry->property->title, 25)); ?>

                  </small>
                <?php endif; ?>
              </td>
              <td style="max-width: 250px;">
                <span class="text-truncate d-block" title="<?php echo e($inquiry->message); ?>">
                  <?php echo e(Str::limit($inquiry->message, 50)); ?>

                </span>
              </td>
              <td><?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->format('M d, Y')); ?></td>
              <td class="text-end">
                <button 
                  type="button" 
                  class="btn btn-sm btn-outline-info rounded-2"
                  data-bs-toggle="modal" 
                  data-bs-target="#viewInquiryModal"
                  data-name="<?php echo e(ucfirst($inquiry->full_name ?? $inquiry->name)); ?>"
                  data-email="<?php echo e($inquiry->email); ?>"
                  data-phone="<?php echo e($inquiry->phone ?? 'N/A'); ?>"
                  data-subject="<?php echo e($inquiry->subject ?? 'General Inquiry'); ?>"
                  data-property="<?php echo e($inquiry->property->title ?? 'N/A'); ?>"
                  data-date="<?php echo e(\Carbon\Carbon::parse($inquiry->created_at)->format('M d, Y - h:i A')); ?>"
                  data-message="<?php echo e($inquiry->message); ?>"
                >
                  <i class="bi bi-eye"></i> View
                </button>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
              <td colspan="6" class="text-center py-4">No contact inquiries found.</td>
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


<div class="modal fade" id="viewInquiryModal" tabindex="-1" aria-labelledby="viewInquiryModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content border-0 shadow-lg" style="background-color: #1a1d21; color: #e1e1e1;">
      
      
      <div class="modal-header border-bottom border-secondary border-opacity-25 py-3">
        <h5 class="modal-title fs-5 fw-bold text-light" id="viewInquiryModalLabel">
          <i class="bi bi-envelope-open me-2 text-primary"></i> Inquiry Details
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      
      <div class="modal-body p-4">
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <div class="p-3 rounded-3" style="background-color: #22262b; border: 1px solid #2d3238;">
              <small class="text-secondary d-block text-uppercase fw-bold fs-7 mb-1">Sender Name</small>
              <div class="fw-medium text-light" id="modalSenderName">-</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 rounded-3" style="background-color: #22262b; border: 1px solid #2d3238;">
              <small class="text-secondary d-block text-uppercase fw-bold fs-7 mb-1">Email Address</small>
              <div class="fw-medium text-light" id="modalSenderEmail">-</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 rounded-3" style="background-color: #22262b; border: 1px solid #2d3238;">
              <small class="text-secondary d-block text-uppercase fw-bold fs-7 mb-1">Phone Number</small>
              <div class="fw-medium text-light" id="modalSenderPhone">-</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 rounded-3" style="background-color: #22262b; border: 1px solid #2d3238;">
              <small class="text-secondary d-block text-uppercase fw-bold fs-7 mb-1">Received Date</small>
              <div class="fw-medium text-light" id="modalReceivedDate">-</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 rounded-3" style="background-color: #22262b; border: 1px solid #2d3238;">
              <small class="text-secondary d-block text-uppercase fw-bold fs-7 mb-1">Subject</small>
              <div class="fw-medium text-light" id="modalSubject">-</div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 rounded-3" style="background-color: #22262b; border: 1px solid #2d3238;">
              <small class="text-secondary d-block text-uppercase fw-bold fs-7 mb-1">Related Property</small>
              <div class="fw-medium text-info" id="modalProperty">-</div>
            </div>
          </div>
        </div>

        
        <div class="p-3 rounded-3" style="background-color: #22262b; border: 1px solid #2d3238;">
          <small class="text-secondary d-block text-uppercase fw-bold fs-7 mb-2">Full Message</small>
          <div id="modalMessage" class="lh-lg" style="color: #cbd5e1; white-space: pre-line;">-</div>
        </div>
      </div>

      
      <div class="modal-footer border-top border-secondary border-opacity-25 py-2">
        <button type="button" class="btn btn-secondary btn-sm px-4" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Sidebar toggle
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn')?.addEventListener('click', () => { 
    if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); 
    else sidebar.classList.toggle('collapsed'); 
  });

  // Modal Dynamic Data Injection
  const viewInquiryModal = document.getElementById('viewInquiryModal');
  if (viewInquiryModal) {
    viewInquiryModal.addEventListener('show.bs.modal', function (event) {
      const button = event.relatedTarget;
      
      document.getElementById('modalSenderName').textContent = button.getAttribute('data-name');
      document.getElementById('modalSenderEmail').textContent = button.getAttribute('data-email');
      document.getElementById('modalSenderPhone').textContent = button.getAttribute('data-phone');
      document.getElementById('modalSubject').textContent = button.getAttribute('data-subject');
      document.getElementById('modalProperty').textContent = button.getAttribute('data-property');
      document.getElementById('modalReceivedDate').textContent = button.getAttribute('data-date');
      document.getElementById('modalMessage').textContent = button.getAttribute('data-message');
    });
  }
</script>
</body>
</html><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate\resources\views/admin/contacts.blade.php ENDPATH**/ ?>