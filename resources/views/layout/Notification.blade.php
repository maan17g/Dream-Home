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
  @if(Session::has('success'))
  		toastr.success("{{ Session::get('success') }}");
  @endif



  @if(Session::has('info'))
  		toastr.info("{{ Session::get('info') }}");
  @endif
  @if(Session::has('warning'))
  		toastr.warning("{{ Session::get('warning') }}");
  @endif
  @if(Session::has('error'))
  		toastr.error("{{ Session::get('error') }}");
  @endif
</script>