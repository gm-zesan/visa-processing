<div class="sidebar sidebar-navigation active">
    <div class="logo_content">
        <a href="{{route('dashboard')}}" class="logo">
            <img class="logo-icon" src="{{ asset(getSettingsData('4', 'image')) }}">
            <div class="logo_name">
                <img style="height: 45px; width: 70px; object-fit: contain;" src="{{ asset(getSettingsData('4', 'image')) }}" alt="">
            </div>
        </a>
    </div>
    <ul class="nav_list ps-0 scrollbar">
        <li class="category-li">
            <span class="link_names">Dashboard</span>
        </li>
        <li>
            <a href="{{route('dashboard')}}" class="{{ Route::is('dashboard') ? ' active-focus' : '' }}">
                <i class="ri-home-4-line"></i>
                <span class="link_names">Dashboard</span>
            </a>
        </li>


        <li class="category-li">
            <span class="link_names">Main</span>
        </li>
        {{-- @canany(['country-list', 'country-create', 'country-edit', 'country-delete'])
        <li>
            <a href="{{ route('country') }}" class="{{ in_array(Route::currentRouteName(), ['country', 'country.create', 'country.edit']) ? 'active-focus' : '' }}">
                <i class="ri-file-list-line"></i>
                <span class="link_names">Country</span>
            </a>
        </li>
        @endcan --}}
        @canany(['category-list', 'category-create', 'category-edit', 'category-delete'])
        <li>
            <a href="{{ route('categories') }}" class="{{ in_array(Route::currentRouteName(), ['categories', 'category.create', 'category.edit']) ? 'active-focus' : '' }}">
                <i class="ri-survey-line"></i>
                <span class="link_names">Blog Category</span>
            </a>
        </li>
        @endcan

        @canany(['blog-list', 'blog-create', 'blog-edit', 'blog-delete'])
        <li>
            <a href="{{route('blogs')}}" class="{{ in_array(Route::currentRouteName(), ['blogs','blog.create','blog.edit']) ? 'active-focus' : '' }}">
                <i class="ri-article-line"></i>
                <span class="link_names">Blog & News</span>
            </a>
        </li>
        @endcan
        <li>
            <a href="{{route('our-team')}}" class="{{ in_array(Route::currentRouteName(), ['our-team','our-team.create','our-team.edit']) ? 'active-focus' : '' }}">
                <i class="ri-parent-line"></i>
                <span class="link_names">Our Team</span>
            </a>
        </li>
        <li>
            <a href="{{ route('countries') }}" class="{{ in_array(Route::currentRouteName(), ['countries', 'country.create', 'country.edit']) ? 'active-focus' : '' }}">
                <i class="ri-map-2-line"></i>
                <span class="link_names">Country</span>
            </a>
        </li>
        <li>
            <a href="{{ route('visa_type') }}" class="{{ in_array(Route::currentRouteName(), ['visa_type','visa_type.create','visa_type.edit']) ? 'active-focus' : '' }}">
                <i class="ri-visa-line"></i>
                <span class="link_names">Visa Type</span>
            </a>
        </li>
        <li>
            <a href="{{ route('appointment') }}" class="{{ in_array(Route::currentRouteName(), ['appointment','appointment.create','appointment.edit']) ? 'active-focus' : '' }}">
                <i class="ri-file-paper-2-line"></i>
                <span class="link_names">Appointment</span>
            </a>
        </li>
        





        <li class="category-li">
            <span class="link_names">General</span>
        </li>
        <li>
            <a href="{{route('theme')}}" class="{{ in_array(Route::currentRouteName(), ['theme', 'theme.create', 'theme.edit']) ? ' active-focus' : '' }}">
                <i class="ri-brush-2-line"></i>
                <span class="link_names">Theme</span>
            </a>
        </li>
        @canany(['commontype-list', 'commontype-create', 'commontype-edit', 'commontype-delete'])
        <li>
            <a href="{{route('commontypes')}}" class="{{ in_array(Route::currentRouteName(), ['commontypes', 'commontype.create', 'commontype.edit']) ? ' active-focus' : '' }}">
                <i class="ri-menu-3-fill"></i>
                <span class="link_names">Common Type</span>
            </a>
        </li>
        @endcan
        
        @canany(['website-content-list', 'website-content-create', 'website-content-edit', 'website-content-delete'])
        <li>
            <a href="{{route('website-contents')}}" class="{{ in_array(Route::currentRouteName(), ['website-contents', 'website-content.create', 'website-content.edit']) ? ' active-focus' : '' }}">
                <i class="ri-file-zip-line"></i>
                <span class="link_names">Website Content</span>
            </a>
        </li>
        @endcan
        @canany(['contact-list', 'contact-delete'])
        <li>
            <a href="{{route('message')}}" class="{{ in_array(Route::currentRouteName(), ['message']) ? 'active-focus' : '' }}">
                <i class="ri-mail-open-line"></i>
                <span class="link_names">Contact Message</span>
            </a>
        </li>
        @endcan

        



        
        @canany(['user-list', 'user-create', 'user-edit', 'user-delete', 'role-list', 'role-create', 'role-edit', 'role-delete'])
        <li class="category-li">
            <span class="link_names">Users</span>
        </li>
        @endcan
        @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
        <li class="drop-item">
            <a href="{{route('users')}}" class="{{ in_array(Route::currentRouteName(), ['users', 'user.create', 'user.edit']) ? 'active-focus' : '' }}">
                <i class="ri-user-3-line"></i>
                <span class="link_names">User List</span>
            </a>
        </li>
        @endcan
        @canany(['role-list', 'role-create', 'role-edit', 'role-delete'])
            <li class="drop-item">
                <a href="{{route('role.index')}}" class="{{ in_array(Route::currentRouteName(), ['role.index', 'role.create', 'role.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-shield-user-line"></i>
                    <span class="link_names">Role</span>
                </a>
            </li>
            

            <li class="drop-item">
                <a href="{{route('assignrole.index')}}" class="{{ in_array(Route::currentRouteName(), ['assignrole.index', 'assignrole.edit']) ? 'active-focus' : '' }}">
                    <i class="ri-user-settings-line"></i>
                    <span class="link_names">Assign Role</span>
                </a>
                <span class="tooltip">Assign Role</span>
            </li>
        @endcan
    </ul>

    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <img class="d-none" id="sidebarImage" src="{{ asset('/admin') }}/assets/images/user.jpg" alt="">

                @if(Auth::user()->image)
                    <img id="sidebarImageDB" src="{{ asset(Auth::user()->image) }}" alt="img" width="30" height="30" class="rounded-circle">
                @else
                    <i class="ri-user-3-line profile-icon"></i>
                @endif

                <div class="name_job">
                    <div class="name">{{ Auth::user()->name }}</div>
                    <div class="job">{{ Auth::user()->designation }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{route('logout')}}" class="d-flex" onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="ri-logout-box-r-line" id="log_out"></i>
                </a>
            </form>
        </div>
    </div>
</div>
