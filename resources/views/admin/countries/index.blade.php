@extends('admin.app')
@section('title')
    Country
@endsection

@push('custom-style')
   {{-- Datatable css  --}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
   <style>
       .table-flag-container {
           width: 44px;
           height: 30px;
           display: inline-flex;
           align-items: center;
           justify-content: center;
           background: #f8fafc;
           border-radius: 4px;
           overflow: hidden;
           border: 1px solid #e9edf4;
           box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
           vertical-align: middle;
       }
       .table-flag-img {
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
    {{-- Data Table --}}
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Country</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Country</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{route('country.create')}}" class="add-new">Add Country<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table w-100" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 50px;">Id</th>
                                    <th scope="col" style="width: 80px;" class="text-center">Flag</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Capital</th>
                                    <th scope="col">Description</th>
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
    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

    {{-- Datatable Ajax Call --}}
    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/countries';

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
                    { data: 'flag', name: 'flag', orderable: false, searchable: false, className: 'text-center align-middle' },
                    { data: 'country_id', name: 'country_id', orderable: true },
                    { data: 'capital', name: 'capital', orderable: true },
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
                        className: 'text-center align-middle',
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/dashboard/country/edit/' + data + '" class="btn btn-edit" title="Edit"><i class="ri-edit-line"></i></a>';
                            btn1 += '<a href="' + SITEURL + '/dashboard/country/delete/' + data + '" class="btn btn-delete" onclick="return confirm(\'Are you sure you want to delete this country record?\')" title="Delete"><i class="ri-delete-bin-2-line"></i></a>';
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
