@extends('admin.app')
@section('title')
    Visa Type
@endsection

@section('content')

    <div class="container-fluid my-4">
        <form action="{{ route('visa_type.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="card table-card">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Visa Type</div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{route('visa_type')}}">Visa Type</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"> Create Visa Type</li>
                                    </ol>
                                </nav>
                            </div>
                            <a href="{{route('visa_type')}}" class="add-new">Visa Type<i class="ms-1 ri-list-ordered-2"></i></a>
                        </div>
                        <div class="card-body custom-form">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label custom-label custom-label">Visa Type</label>
                                    <input type="text" class="form-control custom-input" name="name" placeholder="visa type name">
                                    @if($errors->has('name'))
                                        <div class="error_msg">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="country_details_id" class="form-label custom-label">Country</label>
                                    <select class="form-select custom-input" name="country_details_id">
                                        <option disabled selected>Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('country_details_id'))
                                        <div class="error_msg">
                                            {{ $errors->first('country_details_id') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="visa_category" class="form-label custom-label">Visa Category</label>
                                    <input type="text" class="form-control custom-input" name="visa_category" placeholder="e.g. Employment Work Permit">
                                </div>

                                <div class="col-md-6">
                                    <label for="issuing_authority" class="form-label custom-label">Issuing Authority</label>
                                    <input type="text" class="form-control custom-input" name="issuing_authority" placeholder="e.g. Ministry of Economic Development (MED)">
                                </div>

                                <div class="col-md-4">
                                    <label for="processing_time" class="form-label custom-label">Processing Time</label>
                                    <input type="text" class="form-control custom-input" name="processing_time" placeholder="e.g. 30 - 45 Working Days">
                                </div>

                                <div class="col-md-4">
                                    <label for="contract_period" class="form-label custom-label">Contract Period</label>
                                    <input type="text" class="form-control custom-input" name="contract_period" placeholder="e.g. 2 Years (Renewable)">
                                </div>

                                <div class="col-md-4">
                                    <label for="emigration_clearance" class="form-label custom-label">Emigration Clearance</label>
                                    <input type="text" class="form-control custom-input" name="emigration_clearance" placeholder="e.g. BMET Smart Card Mandatory">
                                </div>

                                <div class="col-md-12">
                                    <label for="description" class="form-label custom-label">Description</label>
                                    <textarea class="form-control custom-input" name="description" id="description" rows="5" placeholder="Description" style="resize: none; height: auto"></textarea>
                                    @if($errors->has('description'))
                                        <div class="error_msg">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="benefits" class="form-label custom-label">Key Benefits & Facilities (JSON array format: ["Legal 2-Year Contract", "Free Housing", ...])</label>
                                    <textarea class="form-control custom-input font-monospace" name="benefits" id="benefits" rows="4" placeholder='["Official Work Permit", "Company-provided accommodation", "Full medical insurance"]' style="resize: vertical;"></textarea>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="requirements" class="form-label custom-label">Required Documents Checklist (JSON array format: ["Original Passport", "Medical Certificate", ...])</label>
                                    <textarea class="form-control custom-input font-monospace" name="requirements" id="requirements" rows="5" placeholder='["Original passport (min 12 months validity)", "6 passport-size photographs", "Medical fitness certificate"]' style="resize: vertical;"></textarea>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <label for="processing_steps" class="form-label custom-label">Step-by-Step Processing Timeline (JSON format: [{"step": "01", "title": "...", "description": "..."}])</label>
                                    <textarea class="form-control custom-input font-monospace" name="processing_steps" id="processing_steps" rows="6" placeholder='[{"step": "01", "title": "Quota & Offer", "description": "Verification of demand letter."}]' style="resize: vertical;"></textarea>
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
                                        <div class="col-6">
                                            <button type="submit" class="btn submit-button">Save
                                                <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{route('visa_type')}}" class="btn leave-button">Leave</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Image</div>
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
    
                                    @if($errors->has('cover_image'))
                                        <div class="error_msg">
                                            {{ $errors->first('cover_image') }}
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
            console.log(e);
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
            // $( '#' + id + 'Preview' ).attr( 'class', noImage  );
            $( '#' + id + 'Preview' ).addClass( 'd-none' );
            $( '#' + id + 'PreviewNo' ).removeClass( 'd-none' );
            $( "#" + id + "_data").attr("value", "");
            $( '#' + id + 'Name' ).html( 'Not selected' );
            $( '#' + id + 'Delete' ).css( 'display', 'none' );
            $( '#' + id + 'Delete' ).addClass( 'd-none' );
        }
    </script>
@endpush
