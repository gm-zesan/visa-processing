<div class="sidebar sidebar-navigation {{ request()->is('dashboard/website-content*') ? '' : 'active' }}">
    <div class="logo_content">
        <a href="{{route('dashboard')}}" class="logo">
            <img class="logo-icon" src="{{ asset(getSettingsData('4', 'image')) }}" alt="Logo">
            <div class="logo_name">
                <div class="d-flex align-items-center">
                    <img src="{{ asset(getSettingsData('4', 'image')) }}" alt="Logo" class="me-2"
                        style="height: 32px; width: 32px; object-fit: contain;">
                    <div class="d-flex flex-column text-start" style="line-height: 1.15;">
                        <span
                            style="font-size: 14.5px; font-weight: 700; color: #111A3A; letter-spacing: -0.01em; white-space: nowrap;">AL
                            FAHIM</span>
                        <span
                            style="font-size: 10px; font-weight: 600; color: #C59A27; text-transform: uppercase; letter-spacing: 0.08em; white-space: nowrap;">International</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <ul class="nav_list ps-0 scrollbar">
        <!-- Main / Dashboard -->
        <li class="category-li">
            <span class="link_names">Main</span>
        </li>
        <li>
            <a href="{{route('dashboard')}}" class="{{ Route::is('dashboard') ? ' active-focus' : '' }}">
                <i class="ri-dashboard-3-line"></i>
                <span class="link_names">Dashboard</span>
            </a>
        </li>

        <!-- Recruitment & Visa Operations -->
        @canany(['application-list', 'application-view', 'application-edit', 'application-delete', 'country-list', 'country-create', 'country-edit', 'country-delete', 'visa_type-list', 'visa_type-create', 'visa_type-edit', 'visa_type-delete'])
            <li class="category-li">
                <span class="link_names">Visa & Operations</span>
            </li>
        @endcanany

        @canany(['application-list', 'application-view', 'application-edit', 'application-delete'])
        <li>
            <a href="{{ route('applications.index') }}"
                class="{{ in_array(Route::currentRouteName(), ['applications.index', 'applications.show', 'applications.create']) ? 'active-focus' : '' }}">
                <i class="ri-passport-line"></i>
                <span class="link_names">Applications</span>
            </a>
        </li>
        @endcan

        @canany(['country-list', 'country-create', 'country-edit', 'country-delete'])
        <li>
            <a href="{{ route('countries') }}"
                class="{{ in_array(Route::currentRouteName(), ['countries', 'country.create', 'country.edit']) ? 'active-focus' : '' }}">
                <i class="ri-earth-line"></i>
                <span class="link_names">Countries</span>
            </a>
        </li>
        @endcan

        @canany(['visa_type-list', 'visa_type-create', 'visa_type-edit', 'visa_type-delete'])
        <li>
            <a href="{{ route('visa_type') }}"
                class="{{ in_array(Route::currentRouteName(), ['visa_type', 'visa_type.create', 'visa_type.edit']) ? 'active-focus' : '' }}">
                <i class="ri-visa-line"></i>
                <span class="link_names">Visa Types</span>
            </a>
        </li>
        @endcan

        <!-- Content & Media -->
        @canany(['our_team-list', 'our_team-create', 'our_team-edit', 'our_team-delete', 'blog-list', 'blog-create', 'blog-edit', 'blog-delete', 'category-list', 'category-create', 'category-edit', 'category-delete', 'contact-list', 'contact-delete'])
            <li class="category-li">
                <span class="link_names">Content & Media</span>
            </li>
        @endcanany

        @canany(['our_team-list', 'our_team-create', 'our_team-edit', 'our_team-delete'])
        <li>
            <a href="{{route('our-team')}}"
                class="{{ in_array(Route::currentRouteName(), ['our-team', 'our-team.create', 'our-team.edit']) ? 'active-focus' : '' }}">
                <i class="ri-team-line"></i>
                <span class="link_names">Our Team</span>
            </a>
        </li>
        @endcan

        @canany(['blog-list', 'blog-create', 'blog-edit', 'blog-delete'])
        <li>
            <a href="{{route('blogs')}}"
                class="{{ in_array(Route::currentRouteName(), ['blogs', 'blog.create', 'blog.edit']) ? 'active-focus' : '' }}">
                <i class="ri-article-line"></i>
                <span class="link_names">Blogs & News</span>
            </a>
        </li>
        @endcan

        @canany(['category-list', 'category-create', 'category-edit', 'category-delete'])
        <li>
            <a href="{{ route('categories') }}"
                class="{{ in_array(Route::currentRouteName(), ['categories', 'category.create', 'category.edit']) ? 'active-focus' : '' }}">
                <i class="ri-price-tag-3-line"></i>
                <span class="link_names">Blog Categories</span>
            </a>
        </li>
        @endcan

        @canany(['contact-list', 'contact-delete'])
        <li>
            <a href="{{route('message')}}"
                class="{{ in_array(Route::currentRouteName(), ['message']) ? 'active-focus' : '' }}">
                <i class="ri-mail-open-line"></i>
                <span class="link_names">Contact Messages</span>
            </a>
        </li>
        @endcan

        <!-- Site Configuration -->
        @canany(['website-content-list', 'website-content-create', 'website-content-edit', 'website-content-delete', 'theme-list', 'theme-create', 'theme-edit', 'theme-delete', 'theme-active'])
            <li class="category-li">
                <span class="link_names">Site Settings</span>
            </li>
        @endcanany

        @canany(['website-content-list', 'website-content-create', 'website-content-edit', 'website-content-delete'])
        <li>
            <a href="{{route('website-contents')}}"
                class="{{ in_array(Route::currentRouteName(), ['website-contents', 'website-content.create', 'website-content.edit']) ? ' active-focus' : '' }}"
                onclick="$('.sidebar').removeClass('active');">
                <i class="ri-layout-masonry-line"></i>
                <span class="link_names">Website Content</span>
            </a>
        </li>
        @endcan

        @canany(['theme-list', 'theme-create', 'theme-edit', 'theme-delete', 'theme-active'])
        <li>
            <a href="{{route('theme')}}"
                class="{{ in_array(Route::currentRouteName(), ['theme', 'theme.create', 'theme.edit']) ? ' active-focus' : '' }}">
                <i class="ri-palette-line"></i>
                <span class="link_names">Theme Settings</span>
            </a>
        </li>
        @endcan

        <!-- User & Access Management -->
        @canany(['user-list', 'user-create', 'user-edit', 'user-delete', 'role-list', 'role-create', 'role-edit', 'role-delete', 'assignrole-list', 'assignrole-create'])
            <li class="category-li">
                <span class="link_names">User Management</span>
            </li>
        @endcanany

        @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
        <li class="drop-item">
            <a href="{{route('users')}}"
                class="{{ in_array(Route::currentRouteName(), ['users', 'user.create', 'user.edit']) ? 'active-focus' : '' }}">
                <i class="ri-user-3-line"></i>
                <span class="link_names">User List</span>
            </a>
        </li>
        @endcan

        @canany(['role-list', 'role-create', 'role-edit', 'role-delete'])
        <li class="drop-item">
            <a href="{{route('role.index')}}"
                class="{{ in_array(Route::currentRouteName(), ['role.index', 'role.create', 'role.edit']) ? 'active-focus' : '' }}">
                <i class="ri-shield-user-line"></i>
                <span class="link_names">Roles & Permissions</span>
            </a>
        </li>
        @endcan

        @canany(['assignrole-list', 'assignrole-create', 'role-list', 'role-create', 'role-edit', 'role-delete'])
        <li class="drop-item">
            <a href="{{route('assignrole.index')}}"
                class="{{ in_array(Route::currentRouteName(), ['assignrole.index', 'assignrole.edit']) ? 'active-focus' : '' }}">
                <i class="ri-user-settings-line"></i>
                <span class="link_names">Assign Role</span>
            </a>
        </li>
        @endcan
    </ul>

    <div class="profile_content">
        <div class="profile">
            <div class="profile_details">
                <img class="d-none" id="sidebarImage" src="{{ asset('/admin') }}/assets/images/user.jpg" alt="">

                @if(Auth::user()->image)
                    <img id="sidebarImageDB" src="{{ asset(Auth::user()->image) }}" alt="img" width="30" height="30"
                        class="rounded-circle">
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
                <a href="{{route('logout')}}" class="d-flex"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="ri-logout-box-r-line" id="log_out"></i>
                </a>
            </form>
        </div>
    </div>
</div>