@extends('admin.app')
@section('title')
    Contact Messages
@endsection



@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush



@section('content')
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Contact Messages</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Message</li> 
                                </ol> 
                            </nav>
                        </div>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 10%">SL NO</th>
                                    <th scope="col" style="width: 15%">Name</th>
                                    <th scope="col" style="width: 20%">Email</th>
                                    <th scope="col" style="width: 15%">Phone</th>
                                    <th scope="col" style="width: 15%">Subject</th>
                                    <th scope="col" style="width: 20%">Message</th>
                                    <th scope="col" style="width: 5%">Action</th>
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
    var listUrl = SITEURL + '/dashboard/message';

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
                // { data: 'name', 
                //     orderable: true,
                //     render: function (data) {
                //         var name = data.first_name + ' ' + data.last_name;
                //         return name;
                //     },
                // },

                { data: 'name', name: 'name', orderable: true },
                { data: 'email', name: 'email', orderable: true },
                { data: 'phone', name: 'phone', orderable: true },
                { data: 'subject', name: 'subject', orderable: true },
                { data: 'message', name: 'message', orderable: true },
                {
                    data: 'action-btn',
                    orderable: false,
                    render: function (data) {
                        var btn1 = '';
                        btn1 += '<div class="action-btn">';
                        btn1 += '<a href="' + SITEURL + '/dashboard/message/delete/' + data + '" class="btn btn-delete" onclick="return confirm(\'Are you sure you want to delete this message?\')" title="Delete"><i class="ri-delete-bin-2-line"></i></a>';
                        btn1 += '</div>';
                        return btn1;
                    }
                }
            ],
            order: [[0, 'desc']],
        });
    });
</script>
@endpush
