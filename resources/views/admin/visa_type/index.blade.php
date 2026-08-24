@extends('admin.app')
@section('title')
    Visa Type
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
                            <div class="table-title">Visa Type</div>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Visa Type</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{route('visa_type.create')}}" class="add-new">New Visa Type<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body">
                        <table class="table w-100" id="data-table">
                            <thead>
                                <tr>
                                    <th scope="col">SL NO</th>
                                    <th scope="col">Visa Type</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="col-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="card-header table-header">
                                <div class="title-with-breadcrumb">
                                    <div id="form-title" class="table-title">Create Visa Type</div>
                                </div>
                                <button class="add-new" onclick="createOrUpdate()"><span id="form-submit-text">Save</span>
                                    <span class="ms-1 spinner-border spinner-border-sm d-none" role="status">
                                    </span>
                                </button>
                            </div>
                            <div class="card-body custom-form">

                                <div class="row">
                                    <input type="hidden" id="id" name="id">
                                    <div class="col-md-12">
                                        <label for="name" class="form-label custom-label custom-label">Visa Type</label>
                                        <input type="text" class="form-control custom-input" name="name" id="name"
                                            @if(isset($visa_type))
                                                value="{{ $visa_type->name }}"
                                            @else
                                                placeholder="Visa Type"
                                            @endif
                                        >
                                        @if($errors->has('name'))
                                            <div class="error_msg">
                                                {{ $errors->first('name') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

@endsection

@push('custom-scripts')
    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>



    {{-- Datatable Ajax Call --}}
    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/visa_type';


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
                    { data: 'name', name: 'name', orderable: true },
                    { data: 'country_details_id ', name: 'country_details_id ', orderable: true },
                    { data: 'description',
                        name: 'description',
                        orderable: true,
                        render: function (data) {
                            console.log(data);
                            var tmp = document.createElement("div");
                            tmp.innerHTML = data;
                            $content = tmp.textContent || tmp.innerText || "";
                            // remove img tag from string
                            var regex = /(<([^>]+)>)/ig;
                            var body = $content.replace(regex, "");
                            return body.length > 70 ? body.substring(0, 70) + "..." : body;
                        }
                    },
                    {
                        data: 'action-btn',
                        orderable: false,
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/dashboard/visa_type/edit/' + data + '" class="btn btn-edit"><i class="ri-edit-line"></i></a>';
                            btn1 += '<a href="' + SITEURL + '/dashboard/visa_type/delete/' + data + '" class="btn btn-delete"><i class="ri-delete-bin-2-line"></i></a>';
                            btn1 += '</div>';
                            return btn1;
                        }
                    }
                ],
                order: [[0, 'asc']]
            });
        });
    </script>

    {{-- <script>
        function createOrUpdate() {
            var id = $('#id').val();
            if (id == '') {
                var url = SITEURL + '/dashboard/visa_type/store';
            } else {
                var url = SITEURL + '/dashboard/visa_type/update/' + id;
            }
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    name: $('#name').val(),
                    id: '1',
                },
                beforeSend: function () {
                    $('.spinner-border').removeClass('d-none');
                },
                success: function (data) {
                    $('.error_msg').remove();
                    $('.spinner-border').addClass('d-none');
                    $('#name').val('');
                    $('#id').val('');
                    $('#form-title').html('Create Visa Type');
                    $('#form-submit-text').html('Save');
                    $('#data-table').DataTable().ajax.reload();
                },
                error: function (xhr, status, error) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        for (var key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                var errorMessage = errors[key][0];
                                var field = $('#' + key);
                                field.after('<div class="error_msg">' + errorMessage + '</div>');
                            }
                        }
                    } else {
                        console.error("Error:", error);
                    }

                    $('.spinner-border').addClass('d-none');
                }
            });
        }


        function getEditData(id) {
            var url = SITEURL + '/dashboard/visa_type/edit/' + id;
            $.ajax({
                url: url,
                type: 'GET',
                success: function (data) {
                    $('.error_msg').remove();
                    $('#name').val(data.data.name);
                    $('#id').val(data.data.id);
                    $('#form-title').html('Update Visa Type');
                    $('#form-submit-text').html('Update');
                }
            });
        }

        function deleteData(id) {
            var url = SITEURL + '/dashboard/visa_type/delete/' + id;
            if (confirm('Are you sure you want to delete this?')) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function (data) {
                        $('.error_msg').remove();
                        $('#data-table').DataTable().ajax.reload();
                    }
                });
            }
        }
    </script> --}}

@endpush
