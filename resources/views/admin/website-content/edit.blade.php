@extends('admin.app')
@section('title')
    Settings
@endsection

@push('custom-style')
    <style>
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
        <form action="{{ route('website-content.update', ['id'=> $settings->id ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-8">
                    <div class="card table-card pb-5">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Page</div>
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
                        </div>
                        <div class="card-body custom-form">
                            <div class="row">
                                
                                <input type="hidden" name="link_key" value="{{$settings->link_key}}">

                                @if((Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer')))
                                    <div class="col-12">
                                        <label for="" class="form-label custom-label custom-label">Hints</label>
                                        <input type="text" class="form-control custom-input" name="hints" value="{{$settings->hints}}">
                                        @if($errors->has('hints'))
                                            <div class="error_msg">
                                                {{ $errors->first('hints') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif


                                @if(isset($settings->title))
                                    <div class="col-12">
                                        <label for="" class="form-label custom-label custom-label">{{$settings->title_label ? $settings->title_label : 'Title'}}</label>
                                        <input type="text" class="form-control custom-input" name="title" value="{{$settings->title}}">
                                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                            <div class="clipboard mb-3">
                                                <p>&#123;&#123; getSettingsData('{{$settings->id}}', 'title') &#125;&#125;</p>
                                                <div class="tooltips">
                                                    <span class="tooltiptext">Copy</span>
                                                    <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                                </div>
                                            </div>
                                            
                                        @endif
                                        @if($errors->has('title'))
                                            <div class="error_msg">
                                                {{ $errors->first('title') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                @if(isset($settings->subtitle))
                                    <div class="col-12">
                                        <label for="" class="form-label custom-label custom-label">{{$settings->subtitle_label ? $settings->subtitle_label : 'Subtitle'}}</label>
                                        <input type="text" class="form-control custom-input" name="subtitle" value="{{$settings->subtitle}}">
                                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                            <div class="clipboard mb-3">
                                                <p>&#123;&#123; getSettingsData('{{$settings->id}}', 'subtitle') &#125;&#125;</p>
                                                <div class="tooltips">
                                                    <span class="tooltiptext">Copy</span>
                                                    <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                                </div>
                                            </div>
                                        @endif
                                        @if($errors->has('subtitle'))
                                            <div class="error_msg">
                                                {{ $errors->first('subtitle') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif


                                @if(isset($settings->button_text))
                                    <div class="col-md-6">
                                        
                                        <label for="" class="form-label custom-label custom-label">{{$settings->button_text_label ? $settings->button_text_label : 'Button Text'}}</label>
                                        <input type="text" class="form-control custom-input" name="button_text" value="{{$settings->button_text}}">
                                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                            <div class="clipboard mb-3">
                                                <p>&#123;&#123; getSettingsData('{{$settings->id}}', 'button_text') &#125;&#125;</p>
                                                <div class="tooltips">
                                                    <span class="tooltiptext">Copy</span>
                                                    <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                                </div>
                                            </div>
                                        @endif
                                        @if($errors->has('button_text'))
                                            <div class="error_msg">
                                                {{ $errors->first('button_text') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                @if(isset($settings->button_link))
                                    <div class="col-md-6">
                                        <label for="" class="form-label custom-label custom-label">{{$settings->button_link_label ? $settings->button_link_label : 'Button Link'}}</label>
                                        <input type="text" class="form-control custom-input" name="button_link" value="{{$settings->button_link}}">
                                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                            <div class="clipboard mb-3">
                                                <p>&#123;&#123; getSettingsData('{{$settings->id}}', 'button_link') &#125;&#125;</p>
                                                <div class="tooltips">
                                                    <span class="tooltiptext">Copy</span>
                                                    <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                                </div>
                                            </div>
                                        @endif
                                        @if($errors->has('button_link'))
                                            <div class="error_msg">
                                                {{ $errors->first('button_link') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif


                                @if(isset($settings->description))
                                    <div class="col-12">
                                        <label for="" class="form-label custom-label custom-label">{{$settings->description_label ? $settings->description_label : 'Description'}}</label>
                                        <textarea name="description" class="form-control custom-input" id="description" cols="30" rows="10">{{$settings->description}}</textarea>
                                        @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                            <div class="clipboard mt-3">
                                                <p>&#123;!! getSettingsData('{{$settings->id}}', 'description') !!&#125;</p>
                                                <div class="tooltips">
                                                    <span class="tooltiptext">Copy</span>
                                                    <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                                </div>
                                            </div>
                                        @endif
                                        @if($errors->has('description'))
                                            <div class="error_msg">
                                                {{ $errors->first('description') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-4">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Action</div>
                                </div>
                                <div class="custom-form card-body">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <button type="submit" class="btn submit-button">Update
                                                <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <a href="{{route('website-contents', ['key' => $key, 'page' => $page])}}" class="btn leave-button">Leave</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @if($settings->image)
                            <div class="col-12">
                                <div class="card table-card">
                                    <div class="table-header">
                                        <div class="table-title">{{$settings->image_label ? $settings->image_label : 'Image'}}</div>
                                    </div>
                                    <div class="custom-form card-body">
                                        <div class="image-select-file">
                                            <label class="form-label custom-label" for="cover_image">
                                                <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                                <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                                <div class="user-image">
                                                    <img id="cover_imagePreview" src="{{asset($settings->image)}}" alt="" class="image-preview">
                                                    
                                                    <span class="formate-error cover_imageerror"></span>
                                                </div>
                                                <span class="upload-btn">Upload Image</span>
                                            </label>
                                            @if(Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('developer'))
                                                <div class="clipboard mb-3">
                                                    <p>&#123;&#123; asset(getSettingsData('{{$settings->id}}', 'image'))&#125;&#125;</p>
                                                    <div class="tooltips">
                                                        <span class="tooltiptext">Copy</span>
                                                        <i class="ri-clipboard-line" onclick="copyContent(this)"></i>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="delete-btn mt-2 d-none remove-image" id="cover_imageDelete" onclick="removeImage('cover_image')">Remove image</div>

                                        @if($errors->has('image'))
                                            <div class="error_msg">
                                                {{ $errors->first('image') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </form>
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

    
    {{-- image upload and preview js --}}
    <script>
        function imageUpload( e ) {
            var imgPath = e.value;
            var ext = imgPath.substring( imgPath.lastIndexOf( '.' ) + 1 ).toLowerCase();
            if ( ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg" || ext == "svg") {
                readURL( e, e.id );
                $( '.' + e.id + 'error' ).hide()
                $( '#' + e.id + 'Delete' ).removeClass( 'd-none' );
            } else {
                $( '.' + e.id + 'error' ).html( 'Select a jpg, jpeg, png type image file.' ).show();
                $("#" + e.id + "_data").attr("value", "");
                $( '#' + e.id + 'Preview' ).attr( 'src', "" );
                $( '#' + e.id ).val( null );
                $( '#' + e.id + 'Delete' ).addClass( 'd-none' );
            }
        }

        var imageName;
        function readURL( input, id ) {
            if ( input.files && input.files[ 0 ] ) {
                imageName = input.files[0].name;
                var reader = new FileReader();
                reader.readAsDataURL( input.files[ 0 ] );
                reader.onload = function ( e ) {
                    $( '#' + id + 'Preview' ).removeClass( 'd-none' );
                    $( '#' + id + 'PreviewNo' ).addClass( 'd-none' );
                    $( '#' + id + 'Preview' ).attr( 'src', e.target.result ).show();
                    $( '#' + id + 'Delete' ).css( 'display', 'flex' );
                    $( '#' + id + 'Delete' ).removeClass( 'd-none' );
                    $( '#' + id + 'Name' ).html( input.files[ 0 ].name );
                    $("#" + id + "_data").attr("value", imageName);
                };
            }
        }
        function removeImage(id) {
            $( "#" + id ).val( null );
            $( '#' + id + 'Preview' ).addClass( 'd-none' );
            $( '#' + id + 'PreviewNo' ).removeClass( 'd-none' );
            $( "#" + id + "_data").attr("value", "");
            $( '#' + id + 'Name' ).html( 'Not selected' );
            $( '#' + id + 'Delete' ).css( 'display', 'none' );
            $( '#' + id + 'Delete' ).addClass( 'd-none' );
        }
    </script>

    {{-- Copy to clipboard --}}
    <script>
        function copyContent(e){
            var copyText = $(e).closest('.clipboard').find('p').text();
            var tooltip = $(e).closest('.clipboard').find('span');
            navigator.clipboard.writeText(copyText);
            tooltip.html('Copied');
            setTimeout(function(){
                tooltip.html('Copy');
            }, 1000);
        }
    </script>

@endpush
