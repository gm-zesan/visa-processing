@extends('admin.app')
@section('title')
    Edit Candidate Application
@endsection

@push('custom-style')
<style>
    .custom-label {
        font-size: 13px;
        font-weight: 500;
        color: #333335;
        margin-bottom: 4px;
    }
    .custom-input {
        height: 38px;
        font-size: 13px;
        border-radius: 4px;
        border: 1px solid #dee2e6;
    }
    .custom-input:focus {
        border-color: #845adf;
        box-shadow: 0 0 0 0.2rem rgba(132, 90, 223, 0.15);
    }
    .section-divider {
        font-size: 12.5px;
        font-weight: 600;
        color: #536485;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        padding-bottom: 6px;
        border-bottom: 1px dashed #e2e8f0;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
</style>
@endpush

@section('content')
<div class="container-fluid my-4">
    <form action="{{ route('applications.update', $application->id) }}" method="POST" autocomplete="off" id="editAppForm">
        @csrf
        <div class="row g-4">
            <!-- Left Main Form Area -->
            <div class="col-lg-8 col-12">
                <div class="card table-card mb-4">
                    <div class="card-header table-header d-flex justify-content-between align-items-center">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Edit Candidate Application</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> 
                                    <li class="breadcrumb-item"><a href="{{ route('applications.index') }}">Candidate Applications</a></li> 
                                    <li class="breadcrumb-item active" aria-current="page">Edit Application</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{ route('applications.index') }}" class="add-new">
                            <i class="ri-list-ordered-2 me-1"></i> Application List
                        </a>
                    </div>

                    <div class="card-body custom-form p-4">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px;">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 10px;"></button>
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 13px;">
                                <ul class="mb-0 ps-3">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 10px;"></button>
                            </div>
                        @endif

                        <!-- Section 1: Candidate Passport & Personal Details -->
                        <div class="section-divider">
                            <i class="ri-passport-line text-primary"></i> 1. Candidate Passport & Identity
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6 col-12">
                                <label for="name" class="form-label custom-label">Full Name (As in Passport) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control custom-input @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $application->name) }}" placeholder="e.g. MOHAMMED ALAM HOSSAIN" required autofocus>
                                @error('name')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="passport_number" class="form-label custom-label">Passport Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control custom-input font-monospace text-uppercase @error('passport_number') is-invalid @enderror" id="passport_number" name="passport_number" value="{{ old('passport_number', $application->passport_number) }}" placeholder="e.g. A01234567" required style="letter-spacing: 0.5px;">
                                @error('passport_number')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="phone" class="form-label custom-label">Candidate Contact / WhatsApp No <span class="text-danger">*</span></label>
                                <input type="text" class="form-control custom-input @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $application->phone) }}" placeholder="e.g. +880 1712 345678" required>
                                @error('phone')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 col-12">
                                <label for="email" class="form-label custom-label">Candidate Email Address <span class="text-muted fw-normal">(Optional)</span></label>
                                <input type="email" class="form-control custom-input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $application->email) }}" placeholder="e.g. candidate@example.com">
                                @error('email')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 2: Destination -->
                        <div class="section-divider">
                            <i class="ri-flight-takeoff-line text-primary"></i> 2. Target Destination
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-12 col-12">
                                <label for="destination_country" class="form-label custom-label">Destination Country (Optional)</label>
                                <select class="form-select custom-input @error('destination_country') is-invalid @enderror" id="destination_country" name="destination_country">
                                    <option value="">-- Select Destination Country --</option>
                                    @foreach($countries as $c)
                                        @if($c->country)
                                            <option value="{{ $c->country->name }}" {{ old('destination_country', $application->destination_country) == $c->country->name ? 'selected' : '' }}>
                                                {{ $c->country->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('destination_country')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Section 3: Official Status -->
                        <div class="section-divider">
                            <i class="ri-shield-check-line text-success"></i> 3. Official Status
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-12 col-12">
                                <label class="form-label custom-label">Status <span class="text-danger">*</span></label>
                                <select class="form-select custom-input" name="status" required>
                                    @foreach(\App\Enums\ApplicationStatus::cases() as $appStatus)
                                        <option value="{{ $appStatus->value }}" {{ old('status', $application->status->value ?? $application->status) == $appStatus->value ? 'selected' : '' }}>
                                            {{ $appStatus->label() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Right Column: Submission & Info Card -->
            <div class="col-lg-4 col-12">
                <!-- Action Controls Card -->
                <div class="card table-card mb-4">
                    <div class="table-header">
                        <div class="table-title">Save Application</div>
                    </div>
                    <div class="card-body p-4">
                        <p class="text-muted small mb-3">
                            The candidate's passport number will be used to track their application status on the official portal.
                        </p>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn submit-button" style="background-color: #845adf; color: #fff; padding: 9px; font-weight: 500; font-size: 13.5px; border-radius: 4px;">
                                <i class="ri-save-line me-1"></i> Update Application
                            </button>
                            <a href="{{ route('applications.index') }}" class="btn leave-button" style="font-size: 13px; font-weight: 500; background-color: #f8f9fa; border: 1px solid #dee2e6; color: #333; padding: 9px; border-radius: 4px; text-align: center; text-decoration: none;">
                                Cancel & Leave
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Guidance Info Card -->
                <div class="card table-card">
                    <div class="table-header">
                        <div class="table-title">Update Checklist</div>
                    </div>
                    <div class="card-body p-3">
                        <ul class="list-unstyled mb-0" style="font-size: 12.5px;">
                            <li class="d-flex align-items-start gap-2 mb-2">
                                <i class="ri-checkbox-circle-fill text-success mt-1"></i>
                                <span>Verify applicant's original passport validity (at least 6 months remaining).</span>
                            </li>
                            <li class="d-flex align-items-start gap-2 mb-2">
                                <i class="ri-checkbox-circle-fill text-success mt-1"></i>
                                <span>Confirm correct contact mobile / WhatsApp number for candidate notifications.</span>
                            </li>
                            <li class="d-flex align-items-start gap-2 mb-2">
                                <i class="ri-checkbox-circle-fill text-success mt-1"></i>
                                <span>Inform the candidate to use their Passport Number to monitor their application on the portal.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('custom-scripts')
<script>
    $('#editAppForm').on('submit', function() {
        var btn = $(this).find('button[type="submit"]');
        btn.prop('disabled', true).html('<i class="ri-loader-4-line ri-spin me-1"></i> Updating...');
    });
</script>
@endpush
