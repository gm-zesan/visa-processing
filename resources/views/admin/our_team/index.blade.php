@extends('admin.app')
@section('title')
    Our Team
@endsection

@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
<style>
    .table-avatar-container {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        overflow: hidden;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 2px solid #e2e8f0;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        background: #f8fafc;
        vertical-align: middle;
    }
    .table-avatar-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }
    #data-table td {
        vertical-align: middle;
    }
</style>
@endpush

@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Our Team</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('our-team')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Our Team</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('our-team.create')}}" class="add-new">Create Member<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 50px;">SL NO</th>
                                    <th scope="col" style="width: 70px;" class="text-center">Photo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Biography</th>
                                    <th scope="col" style="width: 100px;" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

<script type="text/javascript">
    var listUrl = SITEURL + '/dashboard/our-team';

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
                { data: 'image', name: 'image', orderable: false, searchable: false, className: 'text-center align-middle' },
                { data: 'name', name: 'name', orderable: true },
                { data: 'phone', name: 'phone', orderable: true },
                { data: 'designation', name: 'designation', orderable: true },
                { data: 'biography',
                    name: 'biography',
                    orderable: true,
                    render: function (data) {
                        var tmp = document.createElement("div");
                        tmp.innerHTML = data;
                        var content = tmp.textContent || tmp.innerText || "";
                        var regex = /(<([^>]+)>)/ig;
                        var body = content.replace(regex, "");
                        return body.length > 50 ? body.substring(0, 50) + "..." : body;
                    }
                },
                {
                    data: 'action-btn',
                    orderable: false,
                    className: 'text-center align-middle',
                    render: function (data) {
                        var btn1 = '';
                        btn1 += '<div class="action-btn">';
                        btn1 += '<a href="' + SITEURL + '/dashboard/our-team/edit/' + data + '" class="btn btn-edit" title="Edit"><i class="ri-edit-line"></i></a>';
                        btn1 += '<a href="' + SITEURL + '/dashboard/our-team/delete/' + data + '" class="btn btn-delete" onclick="return confirm(\'Are you sure you want to delete this team member?\')" title="Delete"><i class="ri-delete-bin-2-line"></i></a>';
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
