@extends('admin.app')
@section('title')
    Visa
@endsection

@push('custom-style')
   {{-- Datatable css  --}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
@endpush

@section('content')
    {{-- Data Table --}}
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Visa</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Visa</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('visa.create')}}" class="add-new">Create Visa<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table w-100" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Client</th>
                                    <th scope="col">Sales By</th>
                                    <th scope="col">Invoice No</th>
                                    <th scope="col">Sale Date</th>
                                    <th scope="col">Due Date</th>
                                    <th scope="col">Agent</th>
                                    <th scope="col">Passport No</th>
                                    <th scope="col">Action</th>
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
    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>



    {{-- Datatable Ajax Call --}}
    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/visa';

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
                    { data: 'client_id', name: 'client_id', orderable: true },
                    { data: 'sales_by', name: 'sales_by', orderable: true },
                    { data: 'invoice_no', name: 'invoice_no', orderable: true },
                    { data: 'sale_date', name: 'sale_date', orderable: true },
                    { data: 'due_date', name: 'due_date', orderable: true },
                    { data: 'agent_id', name: 'agent_id', orderable: true },
                    { data: 'passport_no', name: 'passport_no', orderable: true },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/dashboard/visa/edit/' + data + '" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            btn1 += '<a href="' + SITEURL + '/dashboard/visa/delete/' + data + '" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></a>';
                            btn1 += '</div>';
                            return btn1;
                        }
                    }
                ],
                order: [[0, 'asc']]
            });
        });
    </script>


@endpush
