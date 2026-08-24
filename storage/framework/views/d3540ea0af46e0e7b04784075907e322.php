<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "timeOut": "5000",

            // ── DEFINE COMPLETELY DIFFERENT CLASSES FOR EACH TYPE ──
            "iconClasses": {
                "success": "successToast",
                "error": "errorToast",
                "warning": "warningToast"
            }
        };
  <?php if(Session::has('success')): ?>
  		toastr.success("<?php echo e(Session::get('success')); ?>");
  <?php endif; ?>



  <?php if(Session::has('info')): ?>
  		toastr.info("<?php echo e(Session::get('info')); ?>");
  <?php endif; ?>
  <?php if(Session::has('warning')): ?>
  		toastr.warning("<?php echo e(Session::get('warning')); ?>");
  <?php endif; ?>
  <?php if(Session::has('error')): ?>
  		toastr.error("<?php echo e(Session::get('error')); ?>");
  <?php endif; ?>
</script><?php /**PATH C:\Users\amana\Desktop\dream-home-real-estate_2\estate - Copy\resources\views/layout/Notification.blade.php ENDPATH**/ ?>