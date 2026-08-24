@extends('admin.app')
@section('title')
    Product
@endsection
@push('custom-style')
    <style>
        .no-image-preview{
            height: auto!important;
            width: auto!important;
            object-fit: cover;
            border-radius: 0!important;
            font-size: 150px!important;
            line-height: 1;

        }
        .image-preview{
            height: 150px!important;
            width: auto!important;
            object-fit: cover;
            border-radius: 0!important;
        }
        .multiple-select-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #multiple-image-icon {
            font-size: 150px;
            color: #c4c4c4;
            margin-bottom: 30px;
            line-height: 1;
        }
        #multipleImagePreview {
            background: #f1f1f1;
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
            gap: 10px;
            margin-bottom: 30px;
        }
        .preview-multiple-image {
            height: 130px!important;
            width: auto!important;
            background-attachment: #fff;
            object-fit: cover;
            border-radius: 0!important;
            display: inline-block;
            background: #fff;
        }
        .multiple-file-upload{
            width: 100%;
            text-align: center;
        }
        .multiple-upload-btn{
            display: inline-block;
            padding: 5px 20px;
            background: #f1f1f1;
            border-radius: 5px;
            cursor: pointer;
            color: #000;
            font-weight: 500;
            font-size: 11px;
            transition: all 0.3s ease;
        }
        .add-image-block{
            cursor: pointer;
            background: #fff;
            padding: 5px 20px;
            border-radius: 5px;
        }
        .remove-imagefile-block span{
            cursor: pointer;
            font-size: 20px;
            color: #ff0000;
            transition: all 0.3s ease;
        }
        .field{
            display: flex;
            align-items: center;
        }
        .field span{
            cursor: pointer;
            font-size: 11px;
            color: #ff0000;
            transition: all 0.3s ease;
            display: inline-block;
            margin-left: 7px;
            background: #f0f1f7;
            border-radius: 5px;
            padding: 5px 5px
        }
        .field input{
            font-size: 11px;
        }
        .field .upload-btn{
            cursor: pointer;
            font-size: 11px;
            color: #000;
            transition: all 0.3s ease;
            display: inline-block;
            margin-left: 20px;
            background: #f0f1f7;
            border-radius: 5px;
            padding: 5px 20px
        }
    </style>
@endpush
@section('content')

    <div class="container-fluid my-4">
        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
            <div class="row">
                <div class="col-8">
                    <div class="card table-card">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Product</div>
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0">
                                        <li class="breadcrumb-item">
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{route('products')}}">Product</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"> Edit Product</li>
                                    </ol>
                                </nav>
                            </div>
                            <a href="{{route('products')}}" class="add-new">Product<i class="ms-1 ri-list-ordered-2"></i></a>
                        </div>
                        <div class="card-body custom-form">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label custom-label custom-label">Product Name</label>
                                    <input type="text" class="form-control custom-input" name="name" value="{{$product->name}}" id="name">
                                    @if($errors->has('name'))
                                        <div class="error_msg">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>



                                <div class="col-md-6">
                                    <label for="category_id" class="form-label custom-label custom-label">Category</label>
                                    <select name="category_id" class="form-select custom-select single-select2">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{$category->id == $product->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('category_id'))
                                        <div class="error_msg">
                                            {{ $errors->first('category_id') }}
                                        </div>
                                    @endif
                                </div>

                                
                                <div class="col-md-6">
                                    <label for="price" class="form-label custom-label custom-label">Price</label>
                                    <input type="number" class="form-control custom-input" name="price" value="{{$product->price}}" id="price">
                                    @if($errors->has('price'))
                                        <div class="error_msg">
                                            {{ $errors->first('price') }}
                                        </div>
                                    @endif
                                </div>



                                <div class="col-12">
                                    <label for="" class="form-label custom-label">Description</label>
                                    <textarea class="form-control custom-input" name="description" rows="5" id="description" style="resize: none; height: auto">{{$product->description}}</textarea>
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
                                        <div class="col-6">
                                            <button type="submit" class="btn submit-button">Update
                                                <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                                </span>
                                            </button>
                                        </div>
                                        <div class="col-6">
                                            <a href="{{route('products')}}" class="btn leave-button">Leave</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Thumbnail Image</div>
                                </div>
                                <div class="custom-form card-body">
                                    <div class="image-select-file">
                                        <label class="form-label custom-label" for="cover_thumbnail">
                                            <input type="hidden" id="cover_thumbnail_data" class="form-control custom-input" name="cover_thumbnail_data">
                                            <input type="file" id="cover_thumbnail" class="form-file-input form-control custom-input d-none" onchange="imageUpload(this)" name="thumbnail">
                                            <div class="user-image">
                                                @if($product->thumbnail)
                                                    <img id="cover_thumbnailPreview" src="{{asset($product->thumbnail)}}" alt="" class="image-preview">
                                                @else
                                                    <i id="cover_thumbnailPreviewNo" class="ri-folder-image-line no-image-preview"></i>
                                                @endif

                                                <img id="cover_thumbnailPreview" src="{{asset('admin/assets/images/default.jpg')}}" alt="" class="image-preview d-none">
                                                <span class="formate-error cover_thumbnailerror"></span>
                                            </div>
                                            <span class="upload-btn">Upload Image</span>
                                        </label>
                                    </div>

                                    <div class="delete-btn mt-2 d-none remove-image" id="cover_thumbnailDelete" onclick="removeImage('cover_thumbnail')">Remove image</div>

                                    @if($errors->has('thumbnail'))
                                        <div class="error_msg">
                                            {{ $errors->first('thumbnail') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-12" id="imagesBlock">
                            <div class="card table-card">
                                <div class="table-header">
                                    <div class="table-title">Images</div>
                                </div>
                                <div class="custom-form card-body" id="imageBlocksContainer">
                                    <div class="field">
                                        <input type="file" name="imagefile[]" id="imagefile" onchange="imageUpload(this)">
                                        <span onclick="addField(this)">Add</span>
                                        <span onclick="removeField(this)">Remove</span>
                                        
                                    </div>
                                    <button class="display"></button>
                                </div>
                            </div>
                        </div> --}}
                        
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
            CKEDITOR.replace('facilities', {
                filebrowserUploadUrl: "{{route('ckeditor.upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });
            CKEDITOR.replace('policy', {
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
            if ( ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg") {
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
                console.log(imageName);
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


    {{-- Multiple image upload --}}
    <script>
        function addField(plusElement){
            let displayButton = document.querySelector(".display");
            if(plusElement.previousElementSibling.value.trim() === ""){
                return false;
            }
            let div = document.createElement("div");
            div.setAttribute("class", "field");

            let uniqueId = "imagefile" + (document.getElementById('imageBlocksContainer').childElementCount - 1);
            
            let field = document.createElement("input");
            field.setAttribute("type", "file");
            field.setAttribute("name", "imagefile[]");
            field.setAttribute("id", uniqueId);
            field.setAttribute("onchange", "imageUpload(this)");
            
            // Creating the plus span element.
            let plus = document.createElement("span");
            plus.setAttribute("onclick", "addField(this)");
            let plusText = document.createTextNode("Add");
            plus.appendChild(plusText);
            
            
            // Creating the minus span element.
            let minus = document.createElement("span");
            minus.setAttribute("onclick", "removeField(this)");
            let minusText = document.createTextNode("Remove");
            minus.appendChild(minusText);

            let form = document.querySelector("#imageBlocksContainer");
            
            // Adding the elements to the DOM.
            form.insertBefore(div, displayButton);
            div.appendChild(field);
            div.appendChild(plus);
            div.appendChild(minus);
            
            // Un hiding the minus sign.
            plusElement.nextElementSibling.style.display = "inline-block"; // the minus sign
            // Hiding the plus sign.
            plusElement.style.display = "none"; // the plus sign
            }

            function removeField(minusElement){
                // the value of input file will also be empty.
                field = minusElement.parentElement;
                console.log(field);

                field.remove();

            }
    </script>
@endpush
