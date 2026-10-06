@extends('admin.app')
@section('title')
    Candidate Applications
@endsection

@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<style>
/* Status Dropdown in Admin Table */
.status-select-sm {
    min-height: 26px !important;
    height: 26px;
    padding: 2px 10px;
    font-size: 12px;
    font-weight: 500;
    border-radius: 5px;
    border: 1px solid #ced4da;
    cursor: pointer;
    outline: none;
    transition: all 0.25s ease;
}
.status-select-sm.status-pending { background-color: #fff8dd; color: #b58105; border-color: #f7e6a5; }
.status-select-sm.status-processing { background-color: #e8f4fd; color: #1a88cb; border-color: #bce1f9; }
.status-select-sm.status-flight { background-color: #e8f8f0; color: #16a34a; border-color: #bbf0d4; }
.status-select-sm.status-rejected { background-color: #feecee; color: #e11d48; border-color: #fcc2ca; }

/* Admin Modal Theme & Scrollable Structure */
.admin-modal-theme .modal-content {
    border-radius: 8px;
    border: none;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    max-height: 90vh;
    display: flex;
    flex-direction: column;
}

.admin-modal-theme .modal-header {
    background-color: #fff;
    padding: 14px 20px;
    border-bottom: 1px solid #f0f1f7;
    border-radius: 8px 8px 0 0;
    flex-shrink: 0;
}

.admin-modal-theme .modal-header .modal-title {
    font-size: 15px;
    font-weight: 600;
    color: #1d1b31;
    position: relative;
    padding-left: 12px;
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
    padding: 20px 24px;
    background-color: #fff;
    overflow-y: auto !important;
    max-height: calc(90vh - 130px) !important;
    flex: 1 1 auto;
}

.admin-modal-theme .modal-section-heading {
    font-size: 13px;
    font-weight: 600;
    color: #536485;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-top: 10px;
    margin-bottom: 12px;
    padding-bottom: 6px;
    border-bottom: 1px dashed #e2e8f0;
    display: flex;
    align-items: center;
    gap: 6px;
}

.admin-modal-theme .modal-section-heading:first-child {
    margin-top: 0;
}

.admin-modal-theme .modal-footer {
    background-color: #fff;
    padding: 12px 20px;
    border-top: 1px solid #f0f1f7;
    border-radius: 0 0 8px 8px;
    flex-shrink: 0;
    display: flex;
    justify-content: flex-end;
    gap: 10px;
}

/* Modal Form Fields - Comfortable spacing & No box-shadow/outline on focus */
.admin-modal-theme .custom-form .custom-label {
    font-size: 13px;
    font-weight: 600;
    color: #1d1b31;
    margin-bottom: 6px;
    display: block;
}

.admin-modal-theme .custom-form .custom-input,
.admin-modal-theme .custom-form .form-control,
.admin-modal-theme .custom-form .form-select,
.admin-modal-theme .custom-form textarea,
.admin-modal-theme .custom-form select,
.admin-modal-theme .custom-form input {
    border: 1px solid #ced4da;
    border-radius: 5px;
    padding: 6px 12px;
    font-size: 12px;
    font-weight: 500;
    color: #1d1b31;
    margin-bottom: 10px;
    min-height: 36px;
    height: 36px;
    box-shadow: none !important;
    outline: none !important;
    -webkit-box-shadow: none !important;
    transition: border-color 0.2s ease;
}

.admin-modal-theme .custom-form textarea.custom-input {
    height: auto !important;
    min-height: 68px;
    padding: 8px 12px;
    margin-bottom: 8px;
    resize: none;
}

.admin-modal-theme .custom-form .custom-input:focus,
.admin-modal-theme .custom-form .custom-input:active,
.admin-modal-theme .custom-form .form-control:focus,
.admin-modal-theme .custom-form .form-select:focus,
.admin-modal-theme .custom-form textarea:focus,
.admin-modal-theme .custom-form select:focus,
.admin-modal-theme .custom-form input:focus {
    box-shadow: none !important;
    outline: none !important;
    -webkit-box-shadow: none !important;
    border-color: #845adf !important;
}

.admin-modal-theme .custom-form .custom-input[readonly],
.admin-modal-theme .custom-form .custom-input[readonly]:focus,
.admin-modal-theme .custom-form .custom-input[readonly]:active {
    background-color: #f8fafc !important;
    color: #334155 !important;
    border-color: #e2e8f0 !important;
    box-shadow: none !important;
    outline: none !important;
    -webkit-box-shadow: none !important;
    cursor: default;
}

.admin-modal-theme .modal-btn-submit {
    background-color: #845adf;
    color: #fff;
    border: none;
    padding: 7px 20px;
    border-radius: 5px;
    font-size: 13px;
    font-weight: 500;
    box-shadow: none !important;
    outline: none !important;
    transition: all 0.25s ease;
}
.admin-modal-theme .modal-btn-submit:hover {
    background-color: #7248c8;
    color: #fff;
}

.admin-modal-theme .modal-btn-leave {
    background-color: rgba(230, 83, 60, 0.1);
    color: rgb(230, 83, 60);
    border: none;
    padding: 7px 18px;
    border-radius: 5px;
    font-size: 13px;
    font-weight: 500;
    box-shadow: none !important;
    outline: none !important;
    transition: all 0.25s ease;
}
.admin-modal-theme .modal-btn-leave:hover {
    background-color: rgb(230, 83, 60);
    color: #fff;
}

#toastNotification {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 99999;
    min-width: 280px;
    display: none;
    border-radius: 5px;
    font-size: 13px;
    font-weight: 500;
}
</style>
@endpush

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header d-flex justify-content-between align-items-center">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Candidate Applications</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Candidate Applications</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{ route('applications.create') }}" class="add-new">
                            <i class="ri-add-line me-1"></i> New Walk-in Application
                        </a>
                    </div>
                    <div class="card-body" style="overflow-x: auto">
                        <table class="table dataTable w-100" id="data-table" style="min-width: 950px;">
                            <thead>
                                <tr>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Passport Number</th>
                                    <th scope="col">Phone / WhatsApp</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Date Applied</th>
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

    <!-- End Review Application Modal -->
    
@endsection

@push('custom-scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>

<script type="text/javascript">
    var SITEURL = "{{ url('/') }}";
    var listUrl = SITEURL + '/dashboard/applications';
    var applicationStatuses = @json(\App\Enums\ApplicationStatus::shortOptions());
    var table;

    $(document).ready( function () {
        table = $('#data-table').DataTable({
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
                { data: 'name', name: 'name', orderable: true },
                { 
                    data: 'passport_number', 
                    name: 'passport_number', 
                    orderable: true,
                    render: function(data) {
                        return '<span class="badge bg-dark font-monospace" style="font-size:12px; letter-spacing:0.04em;">' + data + '</span>';
                    }
                },
                { 
                    data: 'phone', 
                    name: 'phone', 
                    orderable: true,
                    render: function(data) {
                        return data ? data : '<span class="text-muted small">N/A</span>';
                    }
                },
                
                { 
                    data: 'email', 
                    name: 'email', 
                    orderable: true,
                    render: function (data) {
                        return data ? data : '<span class="text-muted small">N/A</span>';
                    }
                },
                { 
                    data: 'destination_country', 
                    name: 'destination_country', 
                    orderable: true,
                    render: function(data) {
                        return data ? data : '<span class="text-muted small">Not specified</span>';
                    }
                },
                { 
                    data: 'created_at', 
                    name: 'created_at', 
                    orderable: true,
                    render: function(data) {
                        if(!data) return '';
                        var d = new Date(data);
                        return d.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
                    }
                },
                {
                    data: 'action-btn',
                    orderable: false,
                    render: function (data, type, row) {
                        var isFlight = (row.status === 'flight');
                        var targetStatus = isFlight ? 'processing' : 'flight';
                        var icon = isFlight ? 'ri-arrow-go-back-line' : 'ri-flight-takeoff-line';
                        var title = isFlight ? 'Revert to Processing' : 'Mark as Flight Ready';
                        var color = isFlight ? '#fd7e14' : '#198754';
                        var bg = isFlight ? 'rgba(253,126,20,0.1)' : 'rgba(25,135,84,0.1)';
                        var safeName = (row.name || 'this candidate').replace(/'/g, "\\'");

                        var btn1 = '';
                        btn1 += '<div class="action-btn">';
                        btn1 += '<a href="javascript:void(0)" onclick="toggleStatus(' + row.id + ', \'' + targetStatus + '\', \'' + safeName + '\', this)" class="btn-success" title="' + title + '" style="color: ' + color + '; background: ' + bg + '; padding: 5px 8px; border-radius: 4px; margin-right: 5px;"><i class="' + icon + '"></i></a>';
                        btn1 += '<a href="' + SITEURL + '/dashboard/applications/documents/' + data + '" class="btn-info" title="Manage Documents" style="color: #0dcaf0; background: rgba(13,202,240,0.1); padding: 5px 8px; border-radius: 4px; margin-right: 5px;"><i class="ri-folder-upload-line"></i></a>';
                        btn1 += '<a href="' + SITEURL + '/dashboard/applications/edit/' + data + '" class="btn-view" title="Edit Application"><i class="ri-edit-line"></i></a>';
                        btn1 += '<a href="javascript:void(0)" onclick="confirmDeleteApplication(\'' + SITEURL + '/dashboard/applications/delete/' + data + '\', \'' + safeName + '\')" class="btn-delete" title="Delete"><i class="ri-delete-bin-2-line"></i></a>';
                        btn1 += '</div>';
                        return btn1;
                    }
                }
            ],
            order: [[5, 'desc']],
        });
    });

    // Confirmation for deleting application
    function confirmDeleteApplication(deleteUrl, candidateName) {
        confirmAction({
            title: 'Delete Application Record?',
            message: 'Are you sure you want to delete application for <strong>' + candidateName + '</strong>? This will permanently delete this record and all associated documents.',
            icon: 'ri-delete-bin-2-line',
            iconColor: '#e6533c',
            iconBg: 'rgba(230, 83, 60, 0.12)',
            confirmText: 'Yes, Delete',
            confirmBtnClass: 'btn-danger',
            onConfirm: function() {
                window.location.href = deleteUrl;
            }
        });
    }

    // Toggle application status
    function toggleStatus(id, newStatus, candidateName, btnElement) {
        var isFlight = (newStatus === 'flight');
        var title = isFlight ? 'Mark as Flight Ready?' : 'Revert to Processing?';
        var actionText = isFlight 
            ? 'Are you sure you want to change the status for <strong>' + (candidateName || 'this candidate') + '</strong> to <span class="badge bg-success">Flight Ready</span>?'
            : 'Are you sure you want to revert the status for <strong>' + (candidateName || 'this candidate') + '</strong> back to <span class="badge bg-info text-dark">Processing</span>?';
        var icon = isFlight ? 'ri-flight-takeoff-line' : 'ri-arrow-go-back-line';
        var iconColor = isFlight ? '#16a34a' : '#ea580c';
        var iconBg = isFlight ? 'rgba(22, 163, 74, 0.12)' : 'rgba(234, 88, 12, 0.12)';
        var confirmText = isFlight ? 'Yes, Mark Flight' : 'Yes, Revert to Processing';
        var btnClass = isFlight ? 'btn-success' : 'btn-warning text-white';

        confirmAction({
            title: title,
            message: actionText,
            icon: icon,
            iconColor: iconColor,
            iconBg: iconBg,
            confirmText: confirmText,
            confirmBtnClass: btnClass,
            onConfirm: function() {
                var $btn = $(btnElement);
                var originalHtml = $btn.html();
                $btn.html('<i class="ri-loader-4-line ri-spin"></i>').addClass('disabled');

                $.ajax({
                    url: SITEURL + '/dashboard/applications/status/' + id,
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        status: newStatus
                    },
                    success: function(response) {
                        $btn.html(originalHtml).removeClass('disabled');
                        showToast(response.message || 'Application status updated.');
                        table.ajax.reload(null, false);
                    },
                    error: function(xhr) {
                        $btn.html(originalHtml).removeClass('disabled');
                        var errorMsg = 'Failed to update status.';
                        if(xhr.responseJSON && xhr.responseJSON.message) errorMsg = xhr.responseJSON.message;
                        showToast(errorMsg, true);
                    }
                });
            }
        });
    }
</script>
@endpush
