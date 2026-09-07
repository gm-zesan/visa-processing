@extends('admin.app')

@section('title')
    Dashboard
@endsection

@push('custom-style')
<style>
    .kpi-card {
        background: #ffffff;
        border-radius: 8px;
        border: 1px solid #e9edf4;
        box-shadow: 0 2px 4px rgba(17, 26, 58, 0.02);
        padding: 16px 20px;
        transition: all 0.25s ease-in-out;
        position: relative;
        height: 100%;
    }
    .kpi-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(17, 26, 58, 0.06);
        border-color: #dbe2ea;
    }
    .kpi-icon {
        width: 44px;
        height: 44px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .kpi-icon.purple { background-color: #f2eefc; color: #845adf; }
    .kpi-icon.blue { background-color: #e8f4fd; color: #1a88cb; }
    .kpi-icon.green { background-color: #e8f8f0; color: #16a34a; }
    .kpi-icon.amber { background-color: #fff8dd; color: #b58105; }
    .kpi-icon.rose { background-color: #feecee; color: #e11d48; }

    .kpi-label {
        font-size: 13px;
        font-weight: 500;
        color: #536485;
        margin-bottom: 3px;
    }
    .kpi-value {
        font-size: 22px;
        font-weight: 700;
        color: #111a3a;
        line-height: 1.2;
        margin-bottom: 4px;
    }
    .kpi-sub {
        font-size: 11.5px;
        color: #8c98a9;
    }
    .kpi-link {
        font-size: 12px;
        font-weight: 500;
        color: #845adf;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        transition: all 0.2s ease;
    }
    .kpi-link:hover {
        color: #5d35b0;
        text-decoration: underline;
    }

    .status-pill {
        display: inline-block;
        padding: 3px 8px;
        font-size: 11px;
        font-weight: 600;
        border-radius: 4px;
        text-transform: capitalize;
    }
    .status-pill.pending { background-color: #fff8dd; color: #b58105; border: 1px solid #f7e6a5; }
    .status-pill.verified { background-color: #e8f4fd; color: #1a88cb; border: 1px solid #bce1f9; }
    .status-pill.in_progress { background-color: #f2eefc; color: #845adf; border: 1px solid #dcd3f8; }
    .status-pill.approved { background-color: #e8f8f0; color: #16a34a; border: 1px solid #bbf0d4; }
    .status-pill.rejected { background-color: #feecee; color: #e11d48; border: 1px solid #fcc2ca; }

    .dashboard-table-card {
        background-color: #fff;
        border-radius: 8px;
        border: 1px solid #e9edf4;
        box-shadow: 0 2px 4px rgba(17, 26, 58, 0.02);
        margin-bottom: 24px;
    }
    .dashboard-table-card .card-header {
        background-color: #fff;
        padding: 14px 20px;
        border-bottom: 1px solid #f0f1f7;
        border-radius: 8px 8px 0 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .dashboard-table-card .card-title {
        font-size: 15px;
        font-weight: 600;
        color: #1d1b31;
        position: relative;
        padding-left: 10px;
        margin-bottom: 0;
    }
    .dashboard-table-card .card-title::before {
        content: "";
        position: absolute;
        height: 15px;
        width: 3px;
        top: 3px;
        left: 0;
        background: #845adf;
        border-radius: 4px;
    }
    .dashboard-table-card table th {
        font-size: 12px;
        font-weight: 600;
        color: #536485;
        background-color: #f8fafc;
        border-bottom: 1px solid #e9edf4;
        padding: 10px 16px;
    }
    .dashboard-table-card table td {
        font-size: 13px;
        color: #333335;
        vertical-align: middle;
        padding: 12px 16px;
        border-bottom: 1px solid #f0f1f7;
    }

    .pipeline-progress-bar {
        height: 8px;
        border-radius: 4px;
        overflow: hidden;
        background-color: #f1f3f7;
        display: flex;
    }
    .country-flag-sm {
        width: 28px;
        height: 20px;
        object-fit: cover;
        border-radius: 3px;
        border: 1px solid #e9edf4;
    }
</style>
@endpush

@section('content')
<div class="container-fluid my-4">

    <!-- KPI Metric Cards Grid -->
    <div class="row g-3 mb-4">
        @canany(['application-list', 'application-view', 'application-edit', 'application-delete'])
        <div class="col-xl-3 col-md-6">
            <div class="kpi-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="kpi-label">Candidate Applications</div>
                        <div class="kpi-value">{{ $stats['total_applications'] }}</div>
                        <div class="kpi-sub">Today: <span class="fw-semibold text-dark">+{{ $stats['today_applications'] }}</span> | 7d: <span class="fw-semibold text-dark">+{{ $stats['week_applications'] }}</span></div>
                    </div>
                    <div class="kpi-icon purple">
                        <i class="ri-passport-line"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('applications.index') }}" class="kpi-link">View all applications <i class="ms-1 ri-arrow-right-line"></i></a>
                    <span class="badge bg-light text-muted fw-normal" style="font-size: 11px;">Active</span>
                </div>
            </div>
        </div>
        @endcan

        @canany(['application-list', 'application-view', 'application-edit', 'application-delete'])
        <div class="col-xl-3 col-md-6">
            <div class="kpi-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="kpi-label">Pending Review</div>
                        <div class="kpi-value text-warning">{{ $stats['pending_applications'] }}</div>
                        <div class="kpi-sub">Share of total: <span class="fw-semibold text-dark">{{ $stats['pending_pct'] }}%</span></div>
                    </div>
                    <div class="kpi-icon amber">
                        <i class="ri-time-line"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('applications.index') }}?status=pending" class="kpi-link">Review pending <i class="ms-1 ri-arrow-right-line"></i></a>
                    <span class="badge bg-warning-subtle text-warning fw-semibold" style="font-size: 11px;">Action Needed</span>
                </div>
            </div>
        </div>
        @endcan

        @canany(['country-list', 'country-create', 'country-edit', 'country-delete'])
        <div class="col-xl-3 col-md-6">
            <div class="kpi-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="kpi-label">Destination Countries</div>
                        <div class="kpi-value">{{ $stats['total_countries'] }}</div>
                        <div class="kpi-sub">Across active recruitment regions</div>
                    </div>
                    <div class="kpi-icon blue">
                        <i class="ri-map-2-line"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('countries') }}" class="kpi-link">Manage destinations <i class="ms-1 ri-arrow-right-line"></i></a>
                    <span class="badge bg-light text-muted fw-normal" style="font-size: 11px;">Destinations</span>
                </div>
            </div>
        </div>
        @endcan

        @canany(['visa_type-list', 'visa_type-create', 'visa_type-edit', 'visa_type-delete'])
        <div class="col-xl-3 col-md-6">
            <div class="kpi-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="kpi-label">Visa Categories</div>
                        <div class="kpi-value">{{ $stats['total_visa_types'] }}</div>
                        <div class="kpi-sub">Work permits & visas offered</div>
                    </div>
                    <div class="kpi-icon green">
                        <i class="ri-visa-line"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('visa_type') }}" class="kpi-link">Browse categories <i class="ms-1 ri-arrow-right-line"></i></a>
                    <span class="badge bg-light text-muted fw-normal" style="font-size: 11px;">Types</span>
                </div>
            </div>
        </div>
        @endcan

        @canany(['contact-list', 'contact-delete'])
        <div class="col-xl-3 col-md-6">
            <div class="kpi-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="kpi-label">Inquiries & Messages</div>
                        <div class="kpi-value">{{ $stats['total_messages'] }}</div>
                        <div class="kpi-sub">Today's inquiries: <span class="fw-semibold text-dark">+{{ $stats['today_messages'] }}</span></div>
                    </div>
                    <div class="kpi-icon rose">
                        <i class="ri-mail-open-line"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('message') }}" class="kpi-link">View all inquiries <i class="ms-1 ri-arrow-right-line"></i></a>
                    <span class="badge bg-light text-muted fw-normal" style="font-size: 11px;">Support</span>
                </div>
            </div>
        </div>
        @endcan

        @canany(['our_team-list', 'our_team-create', 'our_team-edit', 'our_team-delete'])
        <div class="col-xl-3 col-md-6">
            <div class="kpi-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="kpi-label">Team & Officers</div>
                        <div class="kpi-value">{{ $stats['total_team'] }}</div>
                        <div class="kpi-sub">Operations personnel</div>
                    </div>
                    <div class="kpi-icon purple">
                        <i class="ri-parent-line"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('our-team') }}" class="kpi-link">Manage team <i class="ms-1 ri-arrow-right-line"></i></a>
                    <span class="badge bg-light text-muted fw-normal" style="font-size: 11px;">Staff</span>
                </div>
            </div>
        </div>
        @endcan

        @canany(['blog-list', 'blog-create', 'blog-edit', 'blog-delete'])
        <div class="col-xl-3 col-md-6">
            <div class="kpi-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="kpi-label">Published Articles</div>
                        <div class="kpi-value">{{ $stats['total_blogs'] }}</div>
                        <div class="kpi-sub">Immigration & news articles</div>
                    </div>
                    <div class="kpi-icon amber">
                        <i class="ri-article-line"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('blogs') }}" class="kpi-link">Manage articles <i class="ms-1 ri-arrow-right-line"></i></a>
                    <span class="badge bg-light text-muted fw-normal" style="font-size: 11px;">Content</span>
                </div>
            </div>
        </div>
        @endcan

        @canany(['user-list', 'user-create', 'user-edit', 'user-delete'])
        <div class="col-xl-3 col-md-6">
            <div class="kpi-card">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="kpi-label">System Admins</div>
                        <div class="kpi-value">{{ $stats['total_users'] }}</div>
                        <div class="kpi-sub">Authorized system users</div>
                    </div>
                    <div class="kpi-icon blue">
                        <i class="ri-user-3-line"></i>
                    </div>
                </div>
                <div class="mt-3 pt-2 border-top d-flex justify-content-between align-items-center">
                    <a href="{{ route('users') }}" class="kpi-link">User control <i class="ms-1 ri-arrow-right-line"></i></a>
                    <span class="badge bg-light text-muted fw-normal" style="font-size: 11px;">Access</span>
                </div>
            </div>
        </div>
        @endcan
    </div>

    <!-- Application Processing Pipeline & Top Destination Demand -->
    <div class="row g-3 mb-4">
        <!-- Pipeline Breakdown -->
        <div class="col-xl-7 col-lg-12">
            <div class="dashboard-table-card h-100 mb-0">
                <div class="card-header">
                    <h5 class="card-title">Application Processing Pipeline</h5>
                    <span class="text-muted" style="font-size: 12.5px;">{{ $stats['total_applications'] }} Total Submissions</span>
                </div>
                <div class="card-body p-4">
                    <!-- Progress Bar -->
                    <div class="pipeline-progress-bar mb-4">
                        <div style="width: {{ $stats['pending_pct'] }}%; background-color: #b58105;" title="Pending: {{ $stats['pending_pct'] }}%"></div>
                        <div style="width: {{ $stats['verified_pct'] }}%; background-color: #1a88cb;" title="Verified: {{ $stats['verified_pct'] }}%"></div>
                        <div style="width: {{ $stats['in_progress_pct'] ?? 0 }}%; background-color: #845adf;" title="In Progress: {{ $stats['in_progress_pct'] ?? 0 }}%"></div>
                        <div style="width: {{ $stats['approved_pct'] }}%; background-color: #16a34a;" title="Approved: {{ $stats['approved_pct'] }}%"></div>
                        <div style="width: {{ $stats['rejected_pct'] }}%; background-color: #e11d48;" title="Rejected: {{ $stats['rejected_pct'] }}%"></div>
                    </div>

                    <div class="row g-2">
                        <div class="col-sm-6 col-md">
                            <div class="p-3 rounded border text-center h-100" style="background-color: #fffdf5; border-color: #f7e6a5 !important;">
                                <div class="text-muted small fw-medium">Pending</div>
                                <div class="fs-4 fw-bold" style="color: #b58105;">{{ $stats['pending_applications'] }}</div>
                                <div class="small text-muted">{{ $stats['pending_pct'] }}%</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md">
                            <div class="p-3 rounded border text-center h-100" style="background-color: #f6fbfe; border-color: #bce1f9 !important;">
                                <div class="text-muted small fw-medium">Verified</div>
                                <div class="fs-4 fw-bold" style="color: #1a88cb;">{{ $stats['verified_applications'] }}</div>
                                <div class="small text-muted">{{ $stats['verified_pct'] }}%</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md">
                            <div class="p-3 rounded border text-center h-100" style="background-color: #fbf9fe; border-color: #dcd3f8 !important;">
                                <div class="text-muted small fw-medium">In Progress</div>
                                <div class="fs-4 fw-bold" style="color: #845adf;">{{ $stats['in_progress_applications'] ?? 0 }}</div>
                                <div class="small text-muted">{{ $stats['in_progress_pct'] ?? 0 }}%</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md">
                            <div class="p-3 rounded border text-center h-100" style="background-color: #f5fbf7; border-color: #bbf0d4 !important;">
                                <div class="text-muted small fw-medium">Approved</div>
                                <div class="fs-4 fw-bold" style="color: #16a34a;">{{ $stats['approved_applications'] }}</div>
                                <div class="small text-muted">{{ $stats['approved_pct'] }}%</div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md">
                            <div class="p-3 rounded border text-center h-100" style="background-color: #fff7f8; border-color: #fcc2ca !important;">
                                <div class="text-muted small fw-medium">Rejected</div>
                                <div class="fs-4 fw-bold" style="color: #e11d48;">{{ $stats['rejected_applications'] }}</div>
                                <div class="small text-muted">{{ $stats['rejected_pct'] }}%</div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                        <span class="text-muted" style="font-size: 13px;">Manage applicant verification workflows</span>
                        <a href="{{ route('applications.index') }}" class="btn btn-sm text-white" style="background-color: #845adf; font-size: 12.5px; border-radius: 4px; padding: 5px 14px;">
                            Go to Applications Portal <i class="ri-arrow-right-line ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Destination Demand -->
        <div class="col-xl-5 col-lg-12">
            <div class="dashboard-table-card h-100 mb-0">
                <div class="card-header">
                    <h5 class="card-title">Top Destination Demand</h5>
                    <a href="{{ route('countries') }}" class="btn btn-sm" style="color: #845adf; font-weight: 500; font-size: 12.5px;">All Countries <i class="ri-arrow-right-line ms-1"></i></a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table w-100 mb-0">
                            <thead>
                                <tr>
                                    <th>Country</th>
                                    <th class="text-center">Applicants</th>
                                    <th class="text-end">Demand Share</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($top_destinations as $dest)
                                    @php
                                        $dest_pct = $stats['total_applications'] > 0 ? round(($dest->count / $stats['total_applications']) * 100) : 0;
                                    @endphp
                                    <tr>
                                        <td>
                                            <span class="fw-semibold text-dark">{{ $dest->destination_country }}</span>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark fw-bold" style="font-size: 12px;">{{ $dest->count }}</span>
                                        </td>
                                        <td class="text-end">
                                            <div class="d-inline-flex align-items-center gap-2">
                                                <div class="progress" style="width: 70px; height: 6px;">
                                                    <div class="progress-bar" style="width: {{ $dest_pct }}%; background-color: #845adf;"></div>
                                                </div>
                                                <span class="text-muted small fw-medium" style="min-width: 32px;">{{ $dest_pct }}%</span>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">No applicant destination data yet.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Candidate Applications Table -->
    @canany(['application-list', 'application-view', 'application-edit', 'application-delete'])
    <div class="row">
        <div class="col-12">
            <div class="dashboard-table-card">
                <div class="card-header">
                    <h5 class="card-title">Recent Candidate Applications</h5>
                    <div class="d-flex align-items-center gap-2">
                        <a href="{{ route('applications.create') }}" class="btn btn-sm text-white" style="background-color: #845adf; font-weight: 500; font-size: 12.5px; border-radius: 4px; padding: 4px 12px;">
                            <i class="ri-add-line me-1"></i> New Walk-in
                        </a>
                        <a href="{{ route('applications.index') }}" class="btn btn-sm" style="color: #845adf; font-weight: 500; font-size: 13px;">View All <i class="ri-arrow-right-line ms-1"></i></a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table w-100 mb-0">
                            <thead>
                                <tr>
                                    <th>Tracking No</th>
                                    <th>Candidate Name</th>
                                    <th>Passport No</th>
                                    <th>Phone</th>
                                    <th>Target Country</th>
                                    <th>Status</th>
                                    <th>Applied Date</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recent_applications as $app)
                                    <tr>
                                        <td><span class="fw-semibold text-dark">{{ $app->tracking_no }}</span></td>
                                        <td class="fw-medium text-dark">{{ $app->name }}</td>
                                        <td><span style="font-family: monospace; font-size: 12.5px; font-weight: 600;">{{ $app->passport_number }}</span></td>
                                        <td>{{ $app->phone ?? '-' }}</td>
                                        <td>{{ $app->destination_country ?? '-' }}</td>
                                        <td>
                                            @php
                                                $statusEnum = $app->status instanceof \App\Enums\ApplicationStatus
                                                    ? $app->status
                                                    : \App\Enums\ApplicationStatus::tryFrom($app->status ?? '');
                                            @endphp
                                            @if($statusEnum)
                                                <span class="{{ $statusEnum->pillClass() }}">
                                                    {{ $statusEnum->shortLabel() }}
                                                </span>
                                            @else
                                                <span class="status-pill pending">
                                                    {{ ucfirst((string)$app->status) }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="text-muted">{{ $app->created_at ? $app->created_at->format('d M Y') : '-' }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('applications.index') }}" class="btn btn-sm" style="color: #845adf; padding: 2px 8px; font-size: 12px; border: 1px solid #e9edf4; border-radius: 4px;">
                                                Review
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center py-4 text-muted">No candidate applications found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

    <!-- Contact Messages & Destination Country Catalog -->
    <div class="row g-3">
        <!-- Contact Inquiries -->
        @canany(['contact-list', 'contact-delete'])
        <div class="col-xl-7 col-lg-12">
            <div class="dashboard-table-card h-100 mb-0">
                <div class="card-header">
                    <h5 class="card-title">Recent Contact Inquiries</h5>
                    <a href="{{ route('message') }}" class="btn btn-sm" style="color: #845adf; font-weight: 500; font-size: 13px;">View All Messages <i class="ri-arrow-right-line ms-1"></i></a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table w-100 mb-0">
                            <thead>
                                <tr>
                                    <th>Sender</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message Preview</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recent_messages as $msg)
                                    <tr>
                                        <td class="fw-medium text-dark">{{ $msg->name }}</td>
                                        <td>{{ $msg->email }}</td>
                                        <td>{{ Str::limit($msg->subject, 28) }}</td>
                                        <td class="text-muted">{{ Str::limit($msg->message, 45) }}</td>
                                        <td class="text-muted" style="white-space: nowrap;">{{ $msg->created_at ? $msg->created_at->format('d M Y') : '-' }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-muted">No contact messages found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endcan

        <!-- Active Destination Directory -->
        @canany(['country-list', 'country-create', 'country-edit', 'country-delete'])
        <div class="col-xl-5 col-lg-12">
            <div class="dashboard-table-card h-100 mb-0">
                <div class="card-header">
                    <h5 class="card-title">Destination Country Directory</h5>
                    <a href="{{ route('countries') }}" class="btn btn-sm" style="color: #845adf; font-weight: 500; font-size: 13px;">Directory <i class="ri-arrow-right-line ms-1"></i></a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table w-100 mb-0">
                            <thead>
                                <tr>
                                    <th>Destination</th>
                                    <th class="text-center">Visa Types</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($destinations as $dest)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                @php
                                                    $iso = $dest->country->iso_3166_2 ?? $dest->country->country_code ?? '';
                                                    if (!$iso && $dest->country) {
                                                        $map = [
                                                            'Saudi Arabia' => 'sa',
                                                            'Qatar' => 'qa',
                                                            'United Arab Emirates' => 'ae',
                                                            'UAE' => 'ae',
                                                            'Malaysia' => 'my',
                                                            'Kuwait' => 'kw',
                                                            'Oman' => 'om',
                                                            'Bahrain' => 'bh',
                                                            'Singapore' => 'sg',
                                                            'Romania' => 'ro',
                                                            'Italy' => 'it',
                                                            'Poland' => 'pl',
                                                            'Portugal' => 'pt',
                                                            'Cyprus' => 'cy',
                                                            'Croatia' => 'hr',
                                                            'Malta' => 'mt',
                                                            'Mauritius' => 'mu',
                                                            'United Kingdom' => 'gb',
                                                            'UK' => 'gb',
                                                            'Canada' => 'ca'
                                                        ];
                                                        $iso = $map[$dest->country->name] ?? '';
                                                    }
                                                @endphp
                                                @if(!empty($iso))
                                                    <img src="https://flagcdn.com/w40/{{ strtolower(trim($iso)) }}.png" 
                                                         alt="{{ $dest->country->name ?? 'Flag' }}" 
                                                         class="country-flag-sm shadow-sm"
                                                         loading="lazy">
                                                @elseif($dest->image && file_exists(public_path($dest->image)))
                                                    <img src="{{ asset($dest->image) }}" alt="{{ $dest->country->name ?? 'Country' }}" class="country-flag-sm">
                                                @else
                                                    <span class="country-flag-sm bg-light d-inline-flex align-items-center justify-content-center text-muted"><i class="ri-flag-2-line"></i></span>
                                                @endif
                                                <div>
                                                    <span class="fw-semibold text-dark">{{ $dest->country ? $dest->country->name : 'N/A' }}</span>
                                                    @if($dest->country && $dest->country->capital)
                                                        <div class="text-muted" style="font-size: 11px;">{{ $dest->country->capital }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge bg-light text-dark fw-semibold" style="font-size: 11.5px;">{{ $dest->visa_types->count() }} Types</span>
                                        </td>
                                        <td class="text-end">
                                            <a href="{{ route('country.edit', $dest->id) }}" class="btn btn-sm" style="color: #845adf; padding: 2px 8px; font-size: 12px; border: 1px solid #e9edf4; border-radius: 4px;">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-muted">No destination countries configured.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endcan
    </div>

</div>
@endsection

