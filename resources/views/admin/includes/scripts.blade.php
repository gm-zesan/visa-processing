


{{-- Jquery CDN --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

{{-- bootstrap script  --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


{{-- Select 2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.single-select2').select2();
    });
</script>


{{-- DatePicker plugin --}}
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<script>
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd',
        showOtherMonths: true
    });
</script>

{{-- sidebar dropdown menu --}}
<script>
    $(function(){
        var $ul   =   $('.sidebar-navigation > ul');
        
        $ul.find('li a').click(function(e){
            var $li = $(this).parent();
            
            if($li.find('ul').length > 0){
            e.preventDefault();
            
            if($li.hasClass('selected')){
                $li.removeClass('selected').find('li').removeClass('selected');
                $li.find('ul').slideUp(400);
                $li.find('a em').removeClass('mdi-flip-v');
            }else{
                
                if($li.parents('li.selected').length == 0){
                    $ul.find('li').removeClass('selected');
                    $ul.find('ul').slideUp(400);
                    $ul.find('li a em').removeClass('mdi-flip-v');
                }else{
                    $li.parent().find('li').removeClass('selected');
                    $li.parent().find('> li ul').slideUp(400);
                    $li.parent().find('> li a em').removeClass('mdi-flip-v');
                }
                
                $li.addClass('selected');
                $li.find('>ul').slideDown(400);
                $li.find('>a>em').addClass('mdi-flip-v');
            }
            }
        });
        
        
        $('.sidebar-navigation > ul ul').each(function(i){
            if($(this).find('>li>ul').length > 0){
            var paddingLeft = $(this).parent().parent().find('>li>a').css('padding-left');
            var pIntPLeft   = parseInt(paddingLeft);
            var result      = pIntPLeft + 20;
            
            $(this).find('>li>a').css('padding-left',result);
            }else{
            var paddingLeft = $(this).parent().parent().find('>li>a').css('padding-left');
            var pIntPLeft   = parseInt(paddingLeft);
            var result      = pIntPLeft + 20;
            
            $(this).find('>li>a').css('padding-left',result).parent().addClass('selected--last');
            }
        });
        
        var t = ' li > ul ';
        for(var i=1;i<=10;i++){
            $('.sidebar-navigation > ul > ' + t.repeat(i)).addClass('subMenuColor' + i);
        }
        
        var activeLi = $('li.selected');
        if(activeLi.length){
            opener(activeLi);
        }
        
        function opener(li){
            var ul = li.closest('ul');
            if(ul.length){
            
                li.addClass('selected');
                ul.addClass('open');
                li.find('>a>em').addClass('mdi-flip-v');
            
                if(ul.closest('li').length){
                    opener(ul.closest('li'));
                }else{
                    return false;
                }
            
            }
        }
        
    });
</script>

{{-- Sidebar active --}}
<script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    if (btn && sidebar) {
        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }

        function handleSidebarResponsive() {
            if (window.innerWidth < 992) {
                sidebar.classList.remove("active");
            }
        }

        // Check on initial load
        handleSidebarResponsive();

        // Check on window resize
        window.addEventListener('resize', handleSidebarResponsive);
    }
</script>

<!-- Common Scripts -->
<script>
    var SITEURL = "{{ URL::to('') }}";
    $( document ).ready( function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
        var SITEURL = "{{ URL::to('') }}";
        var ASSET_URL = "{{ config('app.asset_url') }}/";
    });
</script>


<script>
    function setProfileImage(e, image){
        if(image){
            $('#profileImage').attr('src', e.target.result ).show();
            $('#sidebarImage').attr('src', e.target.result ).show();
            $('#sidebarImage').removeClass('d-none');
            $('#profileImage').removeClass('d-none');

            $('.profile-icon').addClass('d-none');
            $('#profileImageDB').addClass('d-none');
            $('#sidebarImageDB').addClass('d-none');
        }else{
            $('#profileImage').addClass('d-none');
            $('#sidebarImage').addClass('d-none');

            $('.profile-icon').removeClass('d-none');
            $('#profileImageDB').removeClass('d-none');
            $('#sidebarImageDB').removeClass('d-none');
        }
    }
</script>

{{-- Toastr JS & Global Flash Message Handler --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    // Toastr Global Settings
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
        "timeOut": "4500",
        "extendedTimeOut": "1500",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // Universal Helper for Toast Notifications
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

    // Trigger Laravel Session Flash Messages
    $(document).ready(function() {
        @if(Session::has('success'))
            toastr.success("{!! addslashes(Session::get('success')) !!}", "Success");
        @endif

        @if(Session::has('message'))
            toastr.success("{!! addslashes(Session::get('message')) !!}", "Success");
        @endif

        @if(Session::has('error'))
            toastr.error("{!! addslashes(Session::get('error')) !!}", "Error");
        @endif

        @if(Session::has('warning'))
            toastr.warning("{!! addslashes(Session::get('warning')) !!}", "Warning");
        @endif

        @if(Session::has('info'))
            toastr.info("{!! addslashes(Session::get('info')) !!}", "Notice");
        @endif

        @if(Session::has('status'))
            toastr.info("{!! addslashes(Session::get('status')) !!}", "Status");
        @endif

        @if(isset($errors) && $errors->any())
            @foreach($errors->all() as $error)
                toastr.error("{!! addslashes($error) !!}", "Validation Error");
            @endforeach
        @endif
    });
</script>

<!-- Universal Admin Confirmation Modal -->
<div class="modal fade" id="adminConfirmModal" tabindex="-1" aria-labelledby="confirmModalTitle" aria-hidden="true" style="z-index: 1060;">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
        <div class="modal-content" style="border: none; border-radius: 14px; box-shadow: 0 15px 35px rgba(0,0,0,0.15); overflow: hidden;">
            <div class="modal-body text-center p-4">
                <div id="confirmModalIconWrapper" style="width: 64px; height: 64px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 16px; background-color: rgba(230, 83, 60, 0.12); color: #e6533c; transition: all 0.3s ease;">
                    <i id="confirmModalIcon" class="ri-delete-bin-2-line" style="font-size: 30px;"></i>
                </div>
                <h5 id="confirmModalTitle" class="fw-bold mb-2 text-dark" style="font-size: 18px; letter-spacing: -0.01em;">Confirm Action</h5>
                <div id="confirmModalMessage" class="text-muted mb-4" style="font-size: 13.5px; line-height: 1.55;">Are you sure you want to proceed?</div>
                
                <div class="d-flex justify-content-center gap-2">
                    <button type="button" class="btn" id="confirmModalCancelBtn" data-bs-dismiss="modal" style="background-color: #f1f5f9; color: #475569; font-weight: 500; font-size: 13.5px; padding: 9px 22px; border-radius: 6px; border: 1px solid #e2e8f0; min-width: 100px;">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-danger" id="confirmModalSubmitBtn" style="font-weight: 500; font-size: 13.5px; padding: 9px 22px; border-radius: 6px; min-width: 110px;">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Universal Admin Confirmation Modal Helper
    window.confirmAction = function(options) {
        options = options || {};
        var modalEl = document.getElementById('adminConfirmModal');
        if (!modalEl) {
            if (typeof options.onConfirm === 'function') options.onConfirm();
            return;
        }

        var title = options.title || 'Are you sure?';
        var message = options.message || 'Do you want to proceed with this action?';
        var icon = options.icon || 'ri-error-warning-line';
        var iconColor = options.iconColor || '#e6533c';
        var iconBg = options.iconBg || 'rgba(230, 83, 60, 0.12)';
        var confirmText = options.confirmText || 'Confirm';
        var confirmBtnClass = options.confirmBtnClass || 'btn-danger';
        var cancelText = options.cancelText || 'Cancel';

        $('#confirmModalTitle').text(title);
        $('#confirmModalMessage').html(message);
        $('#confirmModalIcon').attr('class', icon);
        $('#confirmModalIconWrapper').css({
            'color': iconColor,
            'background-color': iconBg
        });

        var $submitBtn = $('#confirmModalSubmitBtn');
        $submitBtn.attr('class', 'btn ' + confirmBtnClass).text(confirmText);
        $('#confirmModalCancelBtn').text(cancelText);

        // Reset click event
        $submitBtn.off('click');

        var bsModal = bootstrap.Modal.getInstance(modalEl);
        if (!bsModal) {
            bsModal = new bootstrap.Modal(modalEl);
        }

        $submitBtn.on('click', function() {
            bsModal.hide();
            if (typeof options.onConfirm === 'function') {
                options.onConfirm();
            }
        });

        bsModal.show();
    };
</script>

