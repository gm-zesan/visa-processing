<header>
    <div id="top-navbar" class="container-fluid">
        <div>
            <i class="ri-menu-2-line" id="btn" style="font-size: 22px;"></i>
        </div>
        <ul>
            <!-- Global / Live Website Link -->
            <li>
                <a href="{{ route('home') }}" target="_blank" class="icon" title="View Live Website" style="font-size: 18px;" data-bs-toggle="tooltip" data-bs-placement="bottom">
                    <i class="ri-global-line"></i>
                </a>
            </li>

            <!-- Clear Cache Link -->
            <li>
                <a href="{{ route('admin.clear-cache') }}" id="headerClearCacheBtn" class="icon" title="Clear System Cache" style="font-size: 18px;" onclick="clearAdminCache(event, this)">
                    <i class="ri-brush-line" id="headerClearCacheIcon"></i>
                </a>
            </li>


            <!-- User Profile Dropdown -->
            <li>
                <a href="#" class="dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="d-flex align-items-center"> 
                        <div class="me-sm-2 me-0">
                            <img id="profileImage" class="d-none" src="" alt="img" width="30" height="30" class="rounded-circle"> 
                            
                            @if(Auth::user()->image)
                                <img id="profileImageDB" src="{{ asset(Auth::user()->image) }}" alt="img" width="30" height="30" class="rounded-circle"> 
                            @else
                                <i class="ri-user-3-line profile-icon"></i>
                            @endif
                            
                        </div> 
                        <div> 
                            <p class="fw-semibold mb-0 lh-1">{{ Auth::user()->name }}</p>
                            <span class="op-7 fw-normal d-block fs-11">{{ Auth::user()->designation }}</span>
                        </div>
                    </div>
                </a>

                <ul class="main-header-dropdown dropdown-menu">
                    <li>
                        <a class="dropdown-item d-flex" href="{{route('profile.view')}}">
                            <i class="ri-information-line fs-18 me-3 op-7"></i>My Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex" href="{{route('profile.edit')}}">
                            <i class="ri-user-3-line fs-18 me-3 op-7"></i>Update Profile
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item d-flex" href="{{route('password-change.profile')}}">
                            <i class="ri-lock-password-line fs-18 me-3 op-7"></i>Change Password
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item d-flex" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                <i class="ri-logout-box-r-line fs-18 me-3 op-7"></i>Log Out
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</header>

<!-- Global Toast Notification Container -->
<div id="adminGlobalToast" class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="position: fixed; top: 20px; right: 20px; z-index: 999999; min-width: 280px; display: none; border-radius: 6px; font-size: 13px; font-weight: 500;">
    <i class="ri-checkbox-circle-line me-1" id="adminGlobalToastIcon"></i> <span id="adminGlobalToastMsg">Action completed successfully.</span>
    <button type="button" class="btn-close" onclick="$('#adminGlobalToast').fadeOut();" style="box-shadow: none !important; outline: none !important;"></button>
</div>

<script>
function clearAdminCache(event, el) {
    event.preventDefault();
    var $icon = $('#headerClearCacheIcon');
    $icon.addClass('ri-spin');
    
    $.ajax({
        url: "{{ route('admin.clear-cache') }}",
        type: 'GET',
        headers: { 'X-Requested-With': 'XMLHttpRequest' },
        success: function(res) {
            $icon.removeClass('ri-spin');
            showAdminToast(res.message || 'System cache cleared successfully!', false);
        },
        error: function(xhr) {
            $icon.removeClass('ri-spin');
            showAdminToast('Failed to clear cache. Please try again.', true);
        }
    });
}

function showAdminToast(msg, isError) {
    var $toast = $('#adminGlobalToast');
    $toast.removeClass('alert-success alert-danger');
    $toast.addClass(isError ? 'alert-danger' : 'alert-success');
    $('#adminGlobalToastIcon').attr('class', isError ? 'ri-error-warning-line me-1' : 'ri-checkbox-circle-line me-1');
    $('#adminGlobalToastMsg').text(msg);
    $toast.stop(true, true).fadeIn();
    setTimeout(function() {
        $toast.fadeOut();
    }, 3500);
}
</script>
