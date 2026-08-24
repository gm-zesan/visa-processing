@extends('admin.app')
@section('title')
    Category
@endsection


@section('content')
    <div class="container-fluid my-4">
        <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST">
            @csrf
            <div class="row g-4">
                <div class="col-8">
                    <div class="card table-card">
                        <div class="card-header table-header">
                            <div class="title-with-breadcrumb">
                                <div class="table-title">Category</div>
                                <nav aria-label="breadcrumb"> 
                                    <ol class="breadcrumb mb-0"> 
                                        <li class="breadcrumb-item">
                                            <a href="{{route('dashboard')}}">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="{{route('categories')}}">Category</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"> Edit Category</li> 
                                    </ol> 
                                </nav>
                            </div>
                            <a href="{{route('categories')}}" class="add-new">Category<i class="ms-1 ri-list-ordered-2"></i></a>
                        </div>

                        <div class="card-body custom-form">
                            
                            <div class="row">
                                <div class="col-12">
                                    <label for="" class="form-label custom-label custom-label">Category Name</label>
                                    <input type="text" class="form-control custom-input" name="name" value="{{$category->name}}">
                                    @if($errors->has('name'))
                                        <div class="error_msg">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>
                                {{-- <div class="col-12">
                                    <label for="" class="form-label custom-label custom-label">Category Description</label>
                                    <textarea class="form-control custom-input" rows="5" name="description" style="resize: none;">{{$category->description}}</textarea>
                                    @if($errors->has('description'))
                                        <div class="error_msg">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div> --}}

                            </div>
                        </div>
                    </div>
                </div>





                <div class="col-md-4">
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
                                            <a href="{{route('categories')}}" class="btn leave-button">Leave</a>
                                        </div>
                                    </div>
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


@endpush

