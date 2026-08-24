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
        .pagecontent-sidebar{
            padding: 15px;
            background-color: #fff;
            border-radius: 10px;
        }
        .pagecontent-sidebar-menu{
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .pagecontent-sidebar-menu li{
            padding: 0 0 10px 0;
        }
        .pagecontent-sidebar-menu li a{
            color: #8c9097;
            opacity: 0.8;
            font-weight: 400;
            font-size: 12px;
            text-decoration: none;
        }
        .pagecontent-sidebar-menu li .pagecontent-sidebar-submenu{
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .pagecontent-sidebar-menu li .pagecontent-sidebar-submenu li{
            padding: 0 0 0 10px;
            border-radius: 5px;
            line-height: 0;
            margin-bottom: 3px;
        }
        .pagecontent-sidebar-menu li .pagecontent-sidebar-submenu li:hover{
            background-color: #f5f5f5;
        }
        .pagecontent-sidebar-menu li .pagecontent-sidebar-submenu li a{
            color: rgb(51, 51, 53);
            font-weight: 500;
            font-size: 13.4px;
            display: inline-block;
            height: 25px;
            padding: 6px 0;
            line-height: 1;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }
        .pagecontent-sidebar-menu li .pagecontent-sidebar-submenu li a:hover{
            color: #000;
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
            /* white-space: pre; */
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
        .active-focus {
            background-color: rgba(0, 0, 0, 0.05);
        }
        .active-focus>a{
            color: #000!important;
        }
        .create-new-section{
            transition: all 0.3s ease-in-out;
        }
        .create-new-section>a{
            color: #23b7e9!important;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-md-3 col-12 mb-3 mb-md-0">
                <div class="pagecontent-sidebar">
                    <ul class="pagecontent-sidebar-menu">

                        @foreach ($websitecontents as $websitecontent => $datas)
                            <li>
                                <a href="#">{{$websitecontent}}</a>
                                <ul class="pagecontent-sidebar-submenu">
                                    @foreach ($datas as $data)
                                        @if(isset($data->link_key))
                                            <?php
                                                $modKey = Illuminate\Support\Str::title(str_replace('-', ' ', $data->link_key));
                                            ?>
                                            <li  class="{{$data->link_key == $key && $data->page_name == $page ? 'active-focus' : ''}}">
                                                <a href="{{route('website-contents', ['key' => $data->link_key, 'page' => $data->page_name])}}">{{$modKey}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                    @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                        <li class="create-new-section">
                                            <a href="{{route('website-content.create', ['page' => $websitecontent])}}">Add New Section <i class="ri-add-circle-line"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @endforeach

                    </ul>
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
                            {{-- @if (Str::contains($settings->link_key, 'seo'))
                                @include('admin.website-content.form.seo-form')
                            @else
                                @include('admin.website-content.form.common-form')
                            @endif --}}
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
            if ( ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg" ) {
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
    
    {{-- <script>
        function copyContent(e){
            var copyText = $(e).closest('.clipboard').find('p').text();
            var tooltip = $(e).closest('.clipboard').find('span');
            navigator.clipboard.writeText(copyText);
            tooltip.html('Copied');
            setTimeout(function(){
                tooltip.html('Copy');
            }, 1000);
        }
    </script> --}}
@endpush
