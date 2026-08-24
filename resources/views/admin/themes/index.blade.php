@extends('admin.app')
@section('title')
    Theme
@endsection



@push('custom-style')
    @vite(['resources/scss/admin/theme.scss'])
@endpush



@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card table-card mb-3">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Theme</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('theme')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Theme</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('theme.create')}}" class="add-new">Create Theme<i class="ms-1 ri-add-line"></i></a>
                    </div>
                </div>


                <div class="row row-cols-1 row-cols-lg-2 g-4">
                    @if (count($themes) > 0)
                        @foreach ($themes as $theme)
                            <div class="col">
                                <div class="card theme-card mb-3">
                                    <div class="row g-2">
                                        <div class="col-md-4 theme-image">
                                            <img src="{{asset($theme->image)}}" class="img-fluid rounded-start" alt="...">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body theme-details">
                                                <h5 class="card-title">{{$theme->name}}</h5>
                                                <h6 class="card-title">{{$theme->subtitle}}</h6>
                                                {!!Str::limit($theme->description, 120, '...') !!}
                                                <div class="theme-actions">
                                                    <a href="{{route('theme.edit', ['id' => $theme->id])}}" class="theme-edit-btn">Edit</a>
                                                    <a href="{{route('theme.delete', ['id' => $theme->id])}}" class="theme-delete-btn">Delete</a>
                                                    @if($theme->status == 0)
                                                        <a href="{{route('theme.active', ['id' => $theme->id])}}" class="theme-active-btn">Activate</a>
                                                    @else
                                                        <button  type="button" class="theme-deactive-btn" id="deactivate_{{ $theme->id }}" disabled >Activate</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                        @endforeach
                    @else
                        <P> No data here...</P>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection


@push('custom-scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

<script type="text/javascript">
    var listUrl = SITEURL + '/dashboard/theme';

    $(document).ready( function () {
        var table = $('#data-table').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            fixedHeader: true,
            "pageLength": 20,
            "lengthMenu": [ 20, 50, 100, 500 ],
            ajax: {
                url: listUrl,
                type: 'GET'
            },
            columns: [
                { data: 'id', name: 'id', orderable: true },
                { data: 'title', name: 'title', orderable: true },
                { data: 'category_id', name: 'category_id', orderable: true },
                { data: 'created_by', name: 'created_by', orderable: true },
                { data: 'created_at', name: 'created_at', orderable: true },
                { data: 'description',
                    name: 'description',
                    orderable: true,
                    render: function (data) {
                        var tmp = document.createElement("div");
                        tmp.innerHTML = data;
                        $content = tmp.textContent || tmp.innerText || "";
                        // remove img tag from string
                        var regex = /(<([^>]+)>)/ig;
                        var body = $content.replace(regex, "");
                        return body.length > 100 ? body.substring(0, 100) + "..." : body;
                    }
                },
                {
                    data: 'action-btn',
                    orderable: false,
                    render: function (data) {
                        var btn1 = '';
                        btn1 += '<div class="action-btn">';
                        btn1 += '<a href="' + SITEURL + '/dashboard/blog/edit/' + data + '" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                        btn1 += '<a href="' + SITEURL + '/dashboard/blog/delete/' + data + '" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></a>';
                        
                        btn1 += '</div>';
                        return btn1;
                    }
                }
            ],
            order: [[0, 'asc']],
        });
    });
</script>
@endpush
