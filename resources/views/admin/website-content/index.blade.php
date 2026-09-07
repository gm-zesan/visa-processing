@extends('admin.app')
@section('title')
    Settings
@endsection
@push('custom-style')

    <style>
        .user-image .image-preview{
            width: 100%!important;
            height: auto!important;
            object-fit: cover;
            border-radius: 0!important;
        }
        
        /* Clean Organized Website Content Sidebar */
        .pagecontent-sidebar{
            padding: 14px;
            background-color: #fff;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }
        .sidebar-header-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-bottom: 10px;
            margin-bottom: 12px;
            border-bottom: 1px solid #f1f5f9;
        }
        .sidebar-header-box .header-title {
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
            letter-spacing: -0.01em;
        }
        .sidebar-header-box .header-badge {
            font-size: 11px;
            font-weight: 600;
            background: #f1f5f9;
            color: #64748b;
            padding: 2px 8px;
            border-radius: 6px;
        }
        .sidebar-search-box {
            position: relative;
            margin-bottom: 12px;
        }
        .sidebar-search-box i.search-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 13px;
            color: #94a3b8;
            pointer-events: none;
        }
        .sidebar-search-box input {
            width: 100%;
            height: 32px;
            font-size: 12px;
            padding: 4px 28px 4px 28px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            background-color: #f8fafc;
            color: #1e293b;
            transition: all 0.2s ease;
        }
        .sidebar-search-box input:focus {
            background-color: #ffffff;
            border-color: #cbd5e1;
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.1);
            outline: none;
        }
        .sidebar-search-box i.clear-icon {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 14px;
            color: #94a3b8;
            cursor: pointer;
        }
        .sidebar-search-box i.clear-icon:hover {
            color: #475569;
        }
        .page-group-item {
            margin-bottom: 4px;
        }
        .page-group-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 7px 10px;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.15s ease;
            user-select: none;
        }
        .page-group-header:hover {
            background-color: #f8fafc;
        }
        .page-group-header.active-group {
            background-color: #f1f5f9;
        }
        .page-group-header .group-left {
            display: flex;
            align-items: center;
            gap: 8px;
            overflow: hidden;
        }
        .page-group-header .group-icon {
            font-size: 14px;
            color: #64748b;
        }
        .page-group-header.active-group .group-icon {
            color: #0f172a;
        }
        .page-group-header .group-name {
            font-size: 12.5px;
            font-weight: 600;
            color: #334155;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .page-group-header.active-group .group-name {
            color: #0f172a;
        }
        .page-group-header .group-right {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .page-group-header .count-pill {
            font-size: 10.5px;
            font-weight: 600;
            background: #f1f5f9;
            color: #64748b;
            padding: 1px 6px;
            border-radius: 10px;
        }
        .page-group-header.active-group .count-pill {
            background: #e2e8f0;
            color: #1e293b;
        }
        .page-group-header .chevron-icon {
            font-size: 14px;
            color: #94a3b8;
            transition: transform 0.2s ease;
        }
        .page-group-header.is-open .chevron-icon {
            transform: rotate(90deg);
            color: #0f172a;
        }
        .page-group-body {
            padding: 3px 0 5px 12px;
            margin-left: 10px;
            border-left: 1.5px solid #e2e8f0;
        }
        .section-sublist {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .section-item {
            margin-bottom: 2px;
        }
        .section-item a {
            display: flex;
            align-items: center;
            padding: 5px 8px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: 500;
            color: #475569;
            text-decoration: none;
            transition: all 0.15s ease;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .section-item a:hover {
            background-color: #f8fafc;
            color: #0f172a;
        }
        .section-item.active-focus a {
            background-color: #f1f5f9;
            color: #0f172a;
            font-weight: 600;
        }
        .section-item .bullet-dot {
            width: 4px;
            height: 4px;
            border-radius: 50%;
            background-color: #cbd5e1;
            margin-right: 8px;
            flex-shrink: 0;
        }
        .section-item.active-focus .bullet-dot {
            background-color: #0f172a;
            width: 5px;
            height: 5px;
        }
        .create-new-section a {
            display: flex;
            align-items: center;
            gap: 4px;
            padding: 4px 8px;
            font-size: 11.5px;
            font-weight: 500;
            color: #2563eb !important;
            text-decoration: none;
        }
        .create-new-section a:hover {
            text-decoration: underline;
        }

        .data-image{
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 10px;
        }
        .clipboard{
            background-color: #f5f5f5;
            color: #525252;
            padding: 3px 10px;
            font-size: 13px;
            border-radius: 5px;
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
        }
        .clipboard p{
            margin-bottom: 0!important;
            font-size: 13px!important;
            font-weight: 400!important;
            text-align: left!important;
            font-family: Courier New, monospace;
        }
        .tooltips {
            position: relative;
            background-color: transparent;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .tooltips .tooltiptext {
            visibility: hidden;
            width: auto;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 2px 15px;
            font-size: 12px;
            position: absolute;
            z-index: 1;
            bottom: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltips .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltips:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-3 col-12 mb-3 mb-md-0">
                <div class="pagecontent-sidebar">
                    <div class="sidebar-header-box">
                        <div class="d-flex align-items-center">
                            <i class="ri-pages-line me-2 text-primary" style="font-size: 15px;"></i>
                            <span class="header-title">Website Pages</span>
                        </div>
                        <span class="header-badge">{{ count($websitecontents) }} Pages</span>
                    </div>

                    <!-- Quick Live Search Filter -->
                    <div class="sidebar-search-box">
                        <i class="ri-search-line search-icon"></i>
                        <input type="text" id="sectionSearchInput" placeholder="Search section..." autocomplete="off">
                        <i class="ri-close-circle-line clear-icon d-none" id="clearSearchBtn"></i>
                    </div>

                    <!-- Page Accordion List -->
                    <div class="page-accordion" id="contentPageAccordion">
                        @php
                            $pageIcons = [
                                'Home' => 'ri-home-4-line',
                                'About' => 'ri-information-line',
                                'Service' => 'ri-customer-service-2-line',
                                'Faq' => 'ri-questionnaire-line',
                                'Terms of use' => 'ri-file-shield-line',
                                'Privacy Policy' => 'ri-shield-check-line',
                                'Contact' => 'ri-contacts-book-line',
                                'Blog' => 'ri-article-line',
                                'Team' => 'ri-team-line',
                                'Website Setting' => 'ri-settings-3-line',
                                'Admin Setting' => 'ri-admin-line',
                            ];
                        @endphp

                        @foreach ($websitecontents as $websitecontent => $datas)
                            @php
                                $isCurrentPage = ($page == $websitecontent);
                                $icon = $pageIcons[$websitecontent] ?? 'ri-folder-line';
                                $pageSlug = Illuminate\Support\Str::slug($websitecontent);
                            @endphp
                            <div class="page-group-item {{ $isCurrentPage ? 'current-page-group' : '' }}" data-page="{{ strtolower($websitecontent) }}">
                                <div class="page-group-header {{ $isCurrentPage ? 'active-group is-open' : '' }}" data-target="#pageGroup-{{ $pageSlug }}">
                                    <div class="group-left">
                                        <i class="{{ $icon }} group-icon"></i>
                                        <span class="group-name">{{ $websitecontent }}</span>
                                    </div>
                                    <div class="group-right">
                                        <span class="count-pill">{{ count($datas) }}</span>
                                        <i class="ri-arrow-right-s-line chevron-icon"></i>
                                    </div>
                                </div>

                                <div class="page-group-body" id="pageGroup-{{ $pageSlug }}" style="{{ $isCurrentPage ? 'display: block;' : 'display: none;' }}">
                                    <ul class="section-sublist">
                                        @foreach ($datas as $data)
                                            @if(isset($data->link_key))
                                                @php
                                                    $modKey = Illuminate\Support\Str::title(str_replace(['-', '_'], ' ', $data->link_key));
                                                    $isCurrentSection = ($data->link_key == $key && $data->page_name == $page);
                                                @endphp
                                                <li class="section-item {{ $isCurrentSection ? 'active-focus' : '' }}" data-title="{{ strtolower($modKey) }} {{ strtolower($data->link_key) }}">
                                                    <a href="{{ route('website-contents', ['key' => $data->link_key, 'page' => $data->page_name]) }}">
                                                        <span class="bullet-dot"></span>
                                                        <span class="text-truncate">{{ $modKey }}</span>
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                            <li class="create-new-section pt-1">
                                                <a href="{{ route('website-content.create', ['page' => $websitecontent]) }}">
                                                    <i class="ri-add-circle-line"></i>
                                                    <span>Add Section</span>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-12">
                @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                    <div class="card table-card mb-3">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Website Content</div>
                                <nav aria-label="breadcrumb"> 
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{route('website-contents')}}">Content</a>
                                        </li>
                                        <li class="breadcrumb-item"><span class="text-primary">{{ $page }}</span></li>
                                        @if(isset($settings->hints))
                                            <li class="breadcrumb-item active" aria-current="page"> Edit {{ $settings->hints }}</li> 
                                        @endif
                                    </ol> 
                                </nav>
                            </div>
                            @if(isset($settings->hints))
                                <a href="{{route('website-content.create', ['key' => $key, 'page' => $page])}}" class="add-new ms-auto">Add {{ $settings->hints }}<i class="ms-1 ri-list-ordered-2"></i></a>
                            @else
                                <a href="{{route('website-content.create', ['key' => $key, 'page' => $page])}}" class="add-new ms-auto">Add New One<i class="ms-1 ri-list-ordered-2"></i></a>
                            @endif
                        </div>
                    </div>
                @endif
                
                @if(isset($settings))
                    @if($count > 1)
                        
                        <div class="card table-card">
                            <div class="card-body">
                                @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                    <div class="clipboard mb-3">
                                        <p>
                                            &#64;foreach( getSettingsList('{{$key}}') as $item) <br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt; Title : &#123;&#123; $item-&gt;title &#125;&#125;&lt;/p&gt; <br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt; Subtitle : &#123;&#123; $item-&gt;subtitle &#125;&#125;&lt;/p&gt; <br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&lt;a href="&#123;&#123; $item-&gt;button_link &#125;&#125;"&gt;&#123;&#123; $item-&gt;button_text &#125;&#125;&lt;/a&gt;  <br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&lt;p&gt; Description : &#123;!! $item-&gt;description !!&#125;&lt;/p&gt; <br>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&lt;img src="&#123;&#123; asset($item-&gt;image) &#125;&#125;" alt="img"&gt; <br>
                                            &#64;endforeach
                                        </p>
                                        <div class="tooltips">
                                            <span class="tooltiptext">Copy</span>
                                            <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                        </div>
                                    </div>
                                @endif
                                <table class="table dataTable w-100">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 10%">SL NO</th>
                                            <th scope="col" style="width: 25%">Hints</th>
                                            <th scope="col" style="width: 25%">Title</th>
                                            <th scope="col" style="width: 30%">Subtitle</th>
                                            <th scope="col" style="width: 20%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($settings as $setting)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$setting->hints}}</td>
                                                <td>{{$setting->title}}</td>
                                                <td>{{$setting->subtitle}}</td>
                                                <td class="action-btn">
                                                    <a href="{{route('website-content.edit', ['id'=> $setting->id ])}}" class="btn btn-edit" style="float: left"><i class="ri-edit-line"></i></a>
                                                    <a href="{{route('website-content.delete', ['id'=> $setting->id ])}}" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                    @else
                        <form action="{{ route('website-content.update', ['id'=> $settings->id ]) }}" method="POST" enctype="multipart/form-data" id="contentContainer">
                            @csrf
                            @include('admin.website-content.form.common-form')
                        </form>
                    @endif
                @else
                    <p>No Data Here</p>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });

        // Section quick live search
        $('#sectionSearchInput').on('input', function() {
            var query = $(this).val().toLowerCase().trim();
            if (query.length > 0) {
                $('#clearSearchBtn').removeClass('d-none');
                $('.page-group-item').each(function() {
                    var $group = $(this);
                    var groupMatched = false;
                    $group.find('.section-item').each(function() {
                        var title = $(this).attr('data-title') || '';
                        if (title.indexOf(query) !== -1) {
                            $(this).show();
                            groupMatched = true;
                        } else {
                            $(this).hide();
                        }
                    });
                    if (groupMatched || $group.attr('data-page').indexOf(query) !== -1) {
                        $group.show();
                        $group.find('.page-group-body').slideDown(150);
                        $group.find('.page-group-header').addClass('is-open');
                    } else {
                        $group.hide();
                    }
                });
            } else {
                $('#clearSearchBtn').addClass('d-none');
                $('.page-group-item').show();
                $('.section-item').show();
                $('.page-group-item').each(function() {
                    if ($(this).hasClass('current-page-group')) {
                        $(this).find('.page-group-body').show();
                        $(this).find('.page-group-header').addClass('is-open');
                    } else {
                        $(this).find('.page-group-body').hide();
                        $(this).find('.page-group-header').removeClass('is-open');
                    }
                });
            }
        });

        $('#clearSearchBtn').click(function() {
            $('#sectionSearchInput').val('').trigger('input');
        });

        // Accordion header click handler
        $('.page-group-header').click(function() {
            var $header = $(this);
            var $body = $header.next('.page-group-body');
            $header.toggleClass('is-open');
            $body.slideToggle(180);
        });
    </script>

    {{-- CK Editor --}}
    <script src="{{asset('vendor/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">
        setTimeout(function(){
            CKEDITOR.replace('description', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
        },100);
    </script>

    <script>
        // image upload and preview js
        var noImage = "{{ asset('images/admin/default.jpg') }}";
        function imageUpload( e ) {
            var imgPath = e.value;
            var ext = imgPath.substring( imgPath.lastIndexOf( '.' ) + 1 ).toLowerCase();
            if ( ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg" || ext == "svg") {
                readURL( e, e.id );
                $( '.' + e.id + 'error' ).hide()
                $( '.btn-submit' ).prop( "disabled", false );
            } else {
                $( '.' + e.id + 'error' ).html( 'Select a jpg, jpeg, png type image file.' ).show();
                $( '.btn-submit' ).prop( "disabled", true );
            }
        }

        var imageName;
        function readURL( input, id ) {
            if ( input.files && input.files[ 0 ] ) {
                imageName = input.files[0].name;
                var reader = new FileReader();
                reader.readAsDataURL( input.files[ 0 ] );
                reader.onload = function ( e ) {
                    $( '#' + id + 'Preview' ).attr( 'src', e.target.result ).show();
                    $( '#' + id + 'Delete' ).css( 'display', 'flex' );
                    $( '#' + id + 'Name' ).html( input.files[ 0 ].name );
                    $("#" + id + "_data").attr("value", imageName);
                };
            }
        }
        function removeImage(id) {
            $( "#" + id ).val( null );
            $( '#' + id + 'Preview' ).attr( 'src', noImage );
            $( '#' + id + 'Name' ).html( 'Not selected' );
            $( '#' + id + 'Delete' ).css( 'display', 'none' );
        }
    </script>

    {{-- Copy to clipboard --}}
    <script>
        function copyContent(e) {
            const clipboardContainer = $(e).closest('.clipboard');
            const copyText = clipboardContainer.find('p').text();
            const tooltip = clipboardContainer.find('span');
            
            navigator.clipboard.writeText(copyText)
                .then(() => {
                    tooltip.text('Copied');
                    setTimeout(() => {
                        tooltip.text('Copy');
                    }, 1000);
                })
                .catch((error) => {
                    console.error('Error copying text:', error);
                    tooltip.text('Error copying');
                    setTimeout(() => {
                        tooltip.text('Copy');
                    }, 1000);
                });
        }
    </script>
@endpush
