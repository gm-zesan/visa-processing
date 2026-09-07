@extends('admin.app')
@section('title')
    Website Content
@endsection

@section('content')
    <div class="container-fluid my-3">
        <form action="{{ route('website-content.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-8">
                    <div class="card table-card pb-5">
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
                                        <li class="breadcrumb-item">
                                            <a href="{{route('website-contents', ['key' => $key, 'page' => $page])}}">{{ $page }}</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"> Create Content</li> 
                                    </ol> 
                                </nav>
                            </div>
                        </div>
                        <div class="card-body custom-form">
                            <div class="row">
                                
                                <input type="hidden" name="page_name" value="{{$page}}">
                                @if(isset($key))
                                    <input type="hidden" name="link_key" value="{{$key}}">
                                @else
                                    <div class="col-12">
                                        <label for="" class="form-label custom-label">Link Key</label>
                                        <input type="text" class="form-control custom-input" name="link_key" placeholder="Link Key">
                                        @if($errors->has('link_key'))
                                            <div class="error_msg">
                                                {{ $errors->first('link_key') }}
                                            </div>
                                        @endif
                                    </div>
                                @endif

                                <div class="col-12">
                                    <label for="" class="form-label custom-label">Hints</label>
                                    <input type="text" class="form-control custom-input" name="hints" placeholder="Hints" value="{{ old('hints') }}">
                                    @if($errors->has('hints'))
                                        <div class="error_msg">
                                            {{ $errors->first('hints') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label for="" class="form-label custom-label">{{ isset($websitecontent->title_label) && $websitecontent->title_label ? $websitecontent->title_label : 'Title' }}</label>
                                    <input type="text" class="form-control custom-input" name="title" placeholder="Title" value="{{ old('title') }}">
                                    @if($errors->has('title'))
                                        <div class="error_msg">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label for="" class="form-label custom-label">{{ isset($websitecontent->subtitle_label) && $websitecontent->subtitle_label ? $websitecontent->subtitle_label : 'Subtitle' }}</label>
                                    <input type="text" class="form-control custom-input" name="subtitle" placeholder="Subtitle" value="{{ old('subtitle') }}">
                                    @if($errors->has('subtitle'))
                                        <div class="error_msg">
                                            {{ $errors->first('subtitle') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">{{ isset($websitecontent->button_text_label) && $websitecontent->button_text_label ? $websitecontent->button_text_label : 'Button Text' }}</label>
                                    <input type="text" class="form-control custom-input" name="button_text" placeholder="Button Text" value="{{ old('button_text') }}">
                                    @if($errors->has('button_text'))
                                        <div class="error_msg">
                                            {{ $errors->first('button_text') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label custom-label">{{ isset($websitecontent->button_link_label) && $websitecontent->button_link_label ? $websitecontent->button_link_label : 'Button Link' }}</label>
                                    <input type="text" class="form-control custom-input" name="button_link" placeholder="Button Link" value="{{ old('button_link') }}">
                                    @if($errors->has('button_link'))
                                        <div class="error_msg">
                                            {{ $errors->first('button_link') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-12">
                                    <label for="" class="form-label custom-label">{{ isset($websitecontent->description_label) && $websitecontent->description_label ? $websitecontent->description_label : 'Description' }}</label>
                                    <textarea name="description" class="form-control custom-input" id="description" cols="30" rows="10" placeholder="Description">{{ old('description') }}</textarea>
                                    @if($errors->has('description'))
                                        <div class="error_msg">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>

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
                                            <button type="submit" class="btn submit-button">Save
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

                        <div class="col-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">{{ isset($websitecontent->image_label) && $websitecontent->image_label ? $websitecontent->image_label : 'Image' }}</div>
                                </div>
                                <div class="custom-form card-body">
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="cover_image">
                                            <input type="hidden" id="cover_image_data" class="form-control custom-input" name="cover_image_data">
                                            <input type="file" id="cover_image" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="image">
                                            <div class="user-image">
                                                <img id="cover_imagePreview" src="{{asset('images/admin/default.jpg')}}" alt="" class="image-preview">
                                                <span class="formate-error cover_imageerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Image</span>
                                        </label>
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
@endpush
