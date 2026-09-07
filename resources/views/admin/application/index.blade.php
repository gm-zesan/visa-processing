@extends('admin.app')
@section('title')
    Candidate Applications
@endsection

@push('custom-style')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
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
.status-select-sm.status-verified { background-color: #e8f4fd; color: #1a88cb; border-color: #bce1f9; }
.status-select-sm.status-in_progress { background-color: #f2eefc; color: #845adf; border-color: #dcd3f8; }
.status-select-sm.status-approved { background-color: #e8f8f0; color: #16a34a; border-color: #bbf0d4; }
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
                                    <th scope="col">Tracking ID</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Passport Number</th>
                                    <th scope="col">Phone / WhatsApp</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Date Applied</th>
                                    <th scope="col">Status (Reviewer)</th>
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

    <!-- Review Application Modal (Fully Scrollable & Admin Panel Theme Styled) -->
    <div class="modal fade admin-modal-theme" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="reviewModalLabel">Review Candidate Dossier</div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="box-shadow: none !important; outline: none !important;"></button>
                </div>
                <div class="modal-body custom-form scrollbar">
                    <form id="reviewDossierForm">
                        <input type="hidden" id="modal_app_id" name="app_id">

                        <!-- Candidate Overview Section -->
                        <div class="modal-section-heading">
                            <i class="ri-user-follow-line text-primary"></i> Candidate Information
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="modal_name" class="form-label custom-label">Full Name (As in Passport)</label>
                                <input type="text" class="form-control custom-input" id="modal_name" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="modal_passport" class="form-label custom-label">Passport Number</label>
                                <input type="text" class="form-control custom-input font-monospace fw-bold" id="modal_passport" readonly style="letter-spacing: 0.5px;">
                            </div>
                            <div class="col-md-6">
                                <label for="modal_tracking" class="form-label custom-label">File Tracking Reference</label>
                                <input type="text" class="form-control custom-input fw-bold" id="modal_tracking" readonly style="color: #845adf;">
                            </div>
                            <div class="col-md-6">
                                <label for="modal_country" class="form-label custom-label">Target Destination</label>
                                <input type="text" class="form-control custom-input" id="modal_country" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="modal_phone" class="form-label custom-label">Phone / WhatsApp</label>
                                <input type="text" class="form-control custom-input" id="modal_phone" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="modal_email" class="form-label custom-label">Email Address</label>
                                <input type="text" class="form-control custom-input" id="modal_email" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="modal_notes" class="form-label custom-label">Applicant Notes / Experience</label>
                                <textarea class="form-control custom-input" id="modal_notes" rows="2" readonly></textarea>
                            </div>
                        </div>

                        <!-- Reviewer Status & Remarks Section -->
                        <div class="modal-section-heading mt-3">
                            <i class="ri-shield-check-line text-success"></i> Reviewer Action & Processing Status
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="modal_status" class="form-label custom-label">Update Recruitment Status <span class="text-danger">*</span></label>
                                <select class="form-select custom-input" id="modal_status" name="status" required>
                                    @foreach(\App\Enums\ApplicationStatus::cases() as $appStatus)
                                        <option value="{{ $appStatus->value }}">{{ $appStatus->label() }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-12">
                                <label for="modal_remarks" class="form-label custom-label">Official Counselor Remarks / Live Tracking Message</label>
                                <textarea class="form-control custom-input" id="modal_remarks" name="admin_remarks" rows="3" placeholder="Add remarks or instructions visible to the candidate when tracking their passport..."></textarea>
                                <small class="text-muted d-block" style="font-size: 11px; margin-top: -4px;">These remarks are displayed to the candidate in real-time on the frontend tracking page.</small>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn modal-btn-leave" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn modal-btn-submit" id="btnSaveDossier" onclick="saveDossierChanges()">
                        <i class="ri-save-line me-1"></i> Save Changes & Update Status
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

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
                { 
                    data: 'tracking_no', 
                    name: 'tracking_no', 
                    orderable: true,
                    render: function (data) {
                        return '<strong style="color:#845adf;">' + (data ? data : 'N/A') + '</strong>';
                    }
                },
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
                    data: 'status', 
                    name: 'status', 
                    orderable: true,
                    render: function(data, type, row) {
                        var status = data ? data : 'pending';
                        var html = '<select class="status-select-sm status-' + status + '" onchange="quickStatusChange(' + row.id + ', this.value, this)">';
                        for (var key in applicationStatuses) {
                            if (applicationStatuses.hasOwnProperty(key)) {
                                html += '<option value="' + key + '" ' + (status === key ? 'selected' : '') + '>' + applicationStatuses[key] + '</option>';
                            }
                        }
                        html += '</select>';
                        return html;
                    }
                },
                {
                    data: 'action-btn',
                    orderable: false,
                    render: function (data, type, row) {
                        var btn1 = '';
                        btn1 += '<div class="action-btn">';
                        btn1 += '<button type="button" class="btn-view" onclick="openReviewModal(' + data + ')" title="Review Candidate Dossier"><i class="ri-eye-line"></i></button>';
                        btn1 += '<a href="' + SITEURL + '/dashboard/applications/delete/' + data + '" class="btn-delete" onclick="return confirm(\'Are you sure you want to delete this application record?\')" title="Delete"><i class="ri-delete-bin-2-line"></i></a>';
                        btn1 += '</div>';
                        return btn1;
                    }
                }
            ],
            order: [[5, 'desc']],
        });
    });

    // Quick inline status change handler
    function quickStatusChange(id, newStatus, selectElement) {
        $(selectElement).prop('disabled', true);
        $.ajax({
            url: SITEURL + '/dashboard/applications/status/' + id,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: newStatus
            },
            success: function(response) {
                $(selectElement).prop('disabled', false);
                for (var key in applicationStatuses) {
                    $(selectElement).removeClass('status-' + key);
                }
                $(selectElement).addClass('status-' + newStatus);
                showToast(response.message || 'Status updated successfully.');
            },
            error: function(xhr) {
                $(selectElement).prop('disabled', false);
                showToast('Failed to update status. Please try again.', true);
            }
        });
    }

    // Open detailed review modal
    function openReviewModal(id) {
        $.ajax({
            url: SITEURL + '/dashboard/applications/' + id,
            type: 'GET',
            success: function(response) {
                if(response.success && response.data) {
                    var app = response.data;
                    $('#modal_app_id').val(app.id);
                    $('#modal_name').val(app.name || '');
                    $('#modal_passport').val(app.passport_number || '');
                    $('#modal_tracking').val(app.tracking_no || 'N/A');
                    $('#modal_country').val(app.destination_country || 'General Overseas Pool');
                    $('#modal_phone').val(app.phone || 'Not provided');
                    $('#modal_email').val(app.email || 'Not provided');
                    $('#modal_notes').val(app.notes || 'No remarks submitted by candidate.');
                    $('#modal_status').val(app.status || 'pending');
                    $('#modal_remarks').val(app.admin_remarks || '');
                    
                    var modal = new bootstrap.Modal(document.getElementById('reviewModal'));
                    modal.show();
                }
            },
            error: function() {
                showToast('Failed to load candidate dossier.', true);
            }
        });
    }

    // Save changes from review modal
    function saveDossierChanges() {
        var id = $('#modal_app_id').val();
        var status = $('#modal_status').val();
        var remarks = $('#modal_remarks').val();
        
        $('#btnSaveDossier').prop('disabled', true).html('<i class="ri-loader-4-line ri-spin me-1"></i> Saving...');

        $.ajax({
            url: SITEURL + '/dashboard/applications/status/' + id,
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                status: status,
                admin_remarks: remarks
            },
            success: function(response) {
                $('#btnSaveDossier').prop('disabled', false).html('<i class="ri-save-line me-1"></i> Save Changes & Update Status');
                var modalElement = document.getElementById('reviewModal');
                var modal = bootstrap.Modal.getInstance(modalElement);
                if(modal) modal.hide();
                table.ajax.reload(null, false);
                showToast('Candidate dossier and status updated successfully.');
            },
            error: function() {
                $('#btnSaveDossier').prop('disabled', false).html('<i class="ri-save-line me-1"></i> Save Changes & Update Status');
                showToast('Error updating dossier. Please check your input.', true);
            }
        });
    }
</script>
@endpush
