  <!-- Vendor JS Files -->
  <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('frontend/js/main.js')}}"></script>

  <!-- Toastr JS CDN & Global Handlers -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
      toastr.options = {
          "closeButton": true,
          "debug": false,
          "newestOnTop": true,
          "progressBar": true,
          "positionClass": "toast-top-right",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "600",
          "timeOut": "5500",
          "extendedTimeOut": "2000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
      };

      // Universal Website Helper for Toast Notifications
      window.showToast = function(message, isError = false, title = '') {
          if (isError) {
              toastr.error(message, title || 'Error');
          } else {
              toastr.success(message, title || 'Success');
          }
      };

      window.notify = function(type, message, title = '') {
          if (type === 'error' || type === 'danger') {
              toastr.error(message, title || 'Error');
          } else if (type === 'warning') {
              toastr.warning(message, title || 'Warning');
          } else if (type === 'info') {
              toastr.info(message, title || 'Notice');
          } else {
              toastr.success(message, title || 'Success');
          }
      };

      // Trigger Laravel Session Flash Messages on Frontend
      $(document).ready(function() {
          @if(Session::has('success'))
              toastr.success("{!! addslashes(Session::get('success')) !!}", "Application Success");
          @endif

          @if(Session::has('status_check_success'))
              toastr.success("{!! addslashes(Session::get('status_check_success')) !!}", "Application File Found");
          @endif

          @if(Session::has('status_check_error'))
              toastr.warning("{!! addslashes(Session::get('status_check_error')) !!}", "Status Tracking");
          @endif

          @if(Session::has('message'))
              toastr.success("{!! addslashes(Session::get('message')) !!}", "Notification");
          @endif

          @if(Session::has('error'))
              toastr.error("{!! addslashes(Session::get('error')) !!}", "Error");
          @endif

          @if(Session::has('warning'))
              toastr.warning("{!! addslashes(Session::get('warning')) !!}", "Notice");
          @endif

          @if(Session::has('info'))
              toastr.info("{!! addslashes(Session::get('info')) !!}", "Information");
          @endif

          @if(Session::has('status'))
              toastr.info("{!! addslashes(Session::get('status')) !!}", "Status");
          @endif

          @if(isset($errors) && $errors->any())
              @foreach($errors->all() as $error)
                  toastr.error("{!! addslashes($error) !!}", "Validation Required");
              @endforeach
          @endif
      });
  </script>