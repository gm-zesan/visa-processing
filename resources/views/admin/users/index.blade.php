@extends('admin.app')
@section('title')
    User Management
@endsection

@push('custom-style')
   {{-- Datatable css  --}}
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
   <style>
       /* Table Action Buttons sizing consistency */
       table.dataTable tbody tr td .action-btn {
           display: flex;
           align-items: center;
           justify-content: center;
           gap: 4px;
       }
       table.dataTable tbody tr td .btn-edit,
       table.dataTable tbody tr td .btn-delete,
       table.dataTable tbody tr td .btn-assign-role {
           height: 28px !important;
           width: 28px !important;
           min-width: 28px !important;
           max-width: 28px !important;
           border-radius: 5px !important;
           border: none !important;
           padding: 0 !important;
           display: inline-flex !important;
           align-items: center !important;
           justify-content: center !important;
           font-size: 14px !important;
           line-height: 1 !important;
           cursor: pointer;
           transition: all 0.25s ease-in-out;
           margin: 0 !important;
           text-decoration: none;
       }
       table.dataTable tbody tr td .btn-edit {
           color: #845adf !important;
           background-color: #f2eefc !important;
       }
       table.dataTable tbody tr td .btn-edit:hover {
           color: #fff !important;
           background-color: #845adf !important;
       }
       table.dataTable tbody tr td .btn-assign-role {
           color: #23b7e9 !important;
           background-color: #e9f8fc !important;
       }
       table.dataTable tbody tr td .btn-assign-role:hover {
           color: #fff !important;
           background-color: #23b7e9 !important;
       }
       table.dataTable tbody tr td .btn-delete {
           color: #dc3545 !important;
           background-color: #f3d1d4 !important;
       }
       table.dataTable tbody tr td .btn-delete:hover {
           color: #fff !important;
           background-color: #dc3545 !important;
       }

       /* Modal Styling - Admin Panel Theme */
       .admin-modal-theme .modal-content {
           border-radius: 10px;
           border: none;
           box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
           background-color: #fff;
           overflow: hidden;
       }
       .admin-modal-theme .modal-header {
           background-color: #fff;
           padding: 14px 20px;
           border-bottom: 1px solid #f0f1f7;
           display: flex;
           align-items: center;
           justify-content: space-between;
       }
       .admin-modal-theme .modal-header .modal-title {
           font-size: 15px;
           font-weight: 600;
           color: #1d1b31;
           position: relative;
           padding-left: 12px;
           margin: 0;
           line-height: 1.4;
       }
       .admin-modal-theme .modal-header .modal-title::before {
           content: "";
           position: absolute;
           height: 16px;
           width: 3px;
           inset-block-start: 3px;
           inset-inline-start: 0;
           background: linear-gradient(
               to bottom,
               rgba(132, 90, 223, 0.8) 50%,
               rgba(35, 183, 229, 0.8) 50%
           );
           border-radius: 3px;
       }
       .admin-modal-theme .modal-body {
           padding: 20px 22px;
           background-color: #fff;
       }
       .user-info-banner {
           display: flex;
           align-items: center;
           gap: 12px;
           padding: 12px 14px;
           background: #f8fafc;
           border: 1px solid #edf2f7;
           border-radius: 8px;
           margin-bottom: 18px;
       }
       .user-avatar-circle {
           width: 38px;
           height: 38px;
           min-width: 38px;
           border-radius: 50%;
           background: #f2eefc;
           color: #845adf;
           display: flex;
           align-items: center;
           justify-content: center;
           font-size: 18px;
       }
       .user-meta-name {
           font-size: 13.5px;
           font-weight: 600;
           color: #1e293b;
           margin-bottom: 2px;
           line-height: 1.2;
       }
       .user-meta-email {
           font-size: 12px;
           color: #64748b;
           line-height: 1.2;
       }
       .user-current-badge {
           margin-left: auto;
           font-size: 11px;
           padding: 3px 8px;
           border-radius: 4px;
           background: #e9f8fc;
           color: #23b7e9;
           font-weight: 600;
           letter-spacing: 0.3px;
           text-transform: uppercase;
           white-space: nowrap;
       }
       .role-selection-label {
           font-size: 13px;
           font-weight: 600;
           color: #1d1b31;
           margin-bottom: 10px;
           display: flex;
           align-items: center;
           gap: 6px;
       }
       .role-selection-label i {
           color: #845adf;
           font-size: 15px;
       }
       .role-option-card {
           position: relative;
           display: flex;
           align-items: center;
           justify-content: space-between;
           padding: 10px 14px;
           border: 1.5px solid #e2e8f0;
           border-radius: 7px;
           background-color: #fff;
           cursor: pointer;
           transition: all 0.2s ease;
           margin-bottom: 8px;
       }
       .role-option-card:hover {
           border-color: #cbd5e1;
           background-color: #f8fafc;
       }
       .role-input:checked + .role-option-card {
           border-color: #845adf;
           background-color: #f8f6ff;
           box-shadow: 0 0 0 1px #845adf;
       }
       .role-card-left {
           display: flex;
           align-items: center;
           gap: 10px;
       }
       .role-icon-box {
           width: 30px;
           height: 30px;
           border-radius: 6px;
           background: #f1f5f9;
           color: #475569;
           display: flex;
           align-items: center;
           justify-content: center;
           font-size: 15px;
           transition: all 0.2s ease;
       }
       .role-input:checked + .role-option-card .role-icon-box {
           background: #f2eefc;
           color: #845adf;
       }
       .role-card-name {
           font-size: 13px;
           font-weight: 600;
           color: #1e293b;
           text-transform: capitalize;
       }
       .role-input:checked + .role-option-card .role-card-name {
           color: #845adf;
       }
       .role-radio-indicator {
           width: 18px;
           height: 18px;
           border-radius: 50%;
           border: 2px solid #cbd5e1;
           display: flex;
           align-items: center;
           justify-content: center;
           transition: all 0.2s ease;
       }
       .role-input:checked + .role-option-card .role-radio-indicator {
           border-color: #845adf;
           background-color: #845adf;
       }
       .role-radio-indicator::after {
           content: "";
           width: 6px;
           height: 6px;
           border-radius: 50%;
           background: #fff;
           opacity: 0;
           transition: opacity 0.2s ease;
       }
       .role-input:checked + .role-option-card .role-radio-indicator::after {
           opacity: 1;
       }
       .admin-modal-theme .modal-footer {
           background-color: #fff;
           padding: 12px 20px;
           border-top: 1px solid #f0f1f7;
           border-radius: 0 0 10px 10px;
           display: flex;
           justify-content: flex-end;
           gap: 8px;
       }
       .btn-modal-cancel {
           font-size: 12.5px;
           color: #475569;
           background-color: #f1f5f9;
           border: 1px solid #e2e8f0;
           padding: 6px 16px;
           border-radius: 5px;
           font-weight: 500;
           cursor: pointer;
           transition: all 0.2s ease;
       }
       .btn-modal-cancel:hover {
           background-color: #e2e8f0;
           color: #1e293b;
       }
       .btn-modal-save {
           font-size: 12.5px;
           color: #fff;
           background-color: #845adf;
           border: none;
           padding: 6px 20px;
           border-radius: 5px;
           font-weight: 500;
           cursor: pointer;
           display: inline-flex;
           align-items: center;
           gap: 5px;
           transition: all 0.2s ease;
       }
       .btn-modal-save:hover {
           background-color: #7245d6;
           color: #fff;
       }
   </style>
@endpush

@section('content')
    {{-- Data Table --}}
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">User Management</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">User List</li> 
                                </ol>
                            </nav>
                        </div>
                        <a href="{{route('user.create')}}" class="add-new">Create User<i class="ms-1 ri-add-line"></i></a>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 800px;">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 60px;">SL NO</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone No</th>
                                    <th scope="col" style="width: 120px;">Role</th>
                                    <th scope="col" style="width: 140px;" class="text-center">Action</th>
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

    <!-- Modal for Quick Assign Role -->
    <div class="modal fade admin-modal-theme" id="assignroleModal" tabindex="-1" aria-labelledby="modalTitleLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 440px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleLabel">Assign User Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{route('assignrole.store')}}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="email" value="" class="modalEmail">

                        <!-- User Info Box -->
                        <div class="user-info-banner">
                            <div class="user-avatar-circle">
                                <i class="ri-user-3-line"></i>
                            </div>
                            <div class="overflow-hidden">
                                <div class="user-meta-name text-truncate" id="modalUserName">-</div>
                                <div class="user-meta-email text-truncate" id="modalUserEmail">-</div>
                            </div>
                            <span class="user-current-badge" id="modalCurrentRole">ROLE</span>
                        </div>

                        <!-- Role Selection -->
                        <div class="mb-1">
                            <label class="role-selection-label">
                                <i class="ri-shield-check-line"></i> Select Role
                            </label>
                            <div class="role-list">
                                @foreach ($roles as $role)
                                    <div class="role-option-item">
                                        <input type="radio" id="role_{{$role}}" name="role" class="role-input d-none" value="{{$role}}">
                                        <label for="role_{{$role}}" class="role-option-card">
                                            <div class="role-card-left">
                                                <div class="role-icon-box">
                                                    @if(in_array(strtolower($role), ['admin', 'super-admin', 'super admin']))
                                                        <i class="ri-shield-keyhole-line"></i>
                                                    @elseif(in_array(strtolower($role), ['manager', 'editor', 'moderator']))
                                                        <i class="ri-shield-user-line"></i>
                                                    @else
                                                        <i class="ri-user-line"></i>
                                                    @endif
                                                </div>
                                                <span class="role-card-name">{{ ucfirst($role) }}</span>
                                            </div>
                                            <div class="role-radio-indicator"></div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-modal-cancel" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn-modal-save"><i class="ri-check-line"></i> Save Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('custom-scripts')
    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

    <script type="text/javascript">
        var listUrl = SITEURL + '/dashboard/users';

        function assignRole(id, name, email, role) {
            $("#modalUserName").text(name);
            $("#modalUserEmail").text(email);
            $(".modalEmail").val(email);
            if (role && role.trim() !== '') {
                $("#modalCurrentRole").text(role.toUpperCase()).show();
            } else {
                $("#modalCurrentRole").text("NO ROLE").show();
            }
            $('#assignroleModal').modal('show');

            var roles = document.getElementsByClassName('role-input');
            for (var i = 0; i < roles.length; i++) {
                if (roles[i].value.toLowerCase() === (role || '').toLowerCase()) {
                    roles[i].checked = true;
                } else {
                    roles[i].checked = false;
                }
            }
        }

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
                    { data: 'email', name: 'email', orderable: true },
                    { data: 'phone_no', name: 'phone_no', orderable: true },
                    { data: 'role', name: 'role', orderable: false, searchable: false },
                    {
                        data: 'action-btn',
                        orderable: false,
                        className: 'text-center align-middle',
                        render: function (data) {
                            var btn1 = '';
                            btn1 += '<div class="action-btn">';
                            btn1 += '<a href="' + SITEURL + '/dashboard/user/edit/' + data.id + '" class="btn btn-edit" title="Edit User"><i class="ri-edit-line"></i></a>';
                            btn1 += `<button type="button" class="btn btn-assign-role" onclick="assignRole(${data.id}, '${data.name.replace(/'/g, "\\'")}', '${data.email}', '${data.role || ''}')" title="Assign Role"><i class="ri-user-settings-line"></i></button>`;
                            btn1 += '<a href="' + SITEURL + '/dashboard/user/delete/' + data.id + '" class="btn btn-delete" onclick="return confirm(\'Are you sure you want to delete this user?\')" title="Delete User"><i class="ri-delete-bin-2-line"></i></a>';
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
