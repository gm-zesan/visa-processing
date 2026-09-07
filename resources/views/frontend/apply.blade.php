@extends('frontend.layouts.app')

@section('title')
Apply Online & Track Passport Status - Manpower Recruitment
@endsection

@push("styles")
@vite(['resources/scss/frontend/apply.scss'])
<style>
/* Live Passport Tracker Styling */
.passport_tracker_wrapper {
    background: #111A3A;
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 0;
    padding: 3.5rem 3rem;
    margin-bottom: 4rem;
    color: #FFFFFF;
}

.tracker_header {
    margin-bottom: 2rem;
}

.tracker_header h3 {
    font-family: 'Outfit', sans-serif;
    font-size: 2.2rem;
    font-weight: 700;
    color: #FFFFFF;
    margin-bottom: 0.6rem;
    display: flex;
    align-items: center;
    column-gap: 1rem;
}

.tracker_header h3 i {
    color: #C59A27;
}

.tracker_header p {
    font-family: 'Plus Jakarta Sans', sans-serif;
    color: rgba(255, 255, 255, 0.75);
    font-size: 1.4rem;
    margin: 0;
}

.tracker_input_group {
    display: flex;
    max-width: 70rem;
    border-radius: 0;
    overflow: hidden;
    border: 1px solid rgba(197, 154, 39, 0.4);
}

.tracker_input_group input {
    flex: 1;
    background: rgba(255, 255, 255, 0.08);
    border: none;
    padding: 1.6rem 2rem;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 1.6rem;
    color: #FFFFFF;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-radius: 0;
    outline: none;
}

.tracker_input_group input::placeholder {
    color: rgba(255, 255, 255, 0.45);
    text-transform: none;
    letter-spacing: normal;
}

.tracker_input_group button {
    background: #C59A27;
    border: none;
    color: #FFFFFF;
    padding: 0 3.5rem;
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 1.4rem;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    cursor: pointer;
    border-radius: 0;
    display: flex;
    align-items: center;
    column-gap: 0.8rem;
    transition: all 0.3s ease;
}

.tracker_input_group button:hover {
    background: #d6a830;
    color: #111A3A;
}

/* Tracking Result Dossier Card */
.tracking_dossier_card {
    background: #FFFFFF;
    border: 1px solid #E2E8F0;
    border-radius: 0;
    padding: 3.5rem 3rem;
    margin-bottom: 4.5rem;
    box-shadow: 0 10px 30px rgba(17, 26, 58, 0.05);
}

.dossier_top_bar {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 1.5rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #F1F5F9;
    margin-bottom: 2.5rem;
}

.dossier_title h4 {
    font-family: 'Outfit', sans-serif;
    font-size: 2.2rem;
    font-weight: 700;
    color: #111A3A;
    margin-bottom: 0.4rem;
}

.dossier_title span {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 1.3rem;
    color: #64748B;
}

.dossier_status_badge {
    padding: 0.8rem 1.8rem;
    font-family: 'Outfit', sans-serif;
    font-size: 1.3rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    border-radius: 0;
    display: inline-flex;
    align-items: center;
    column-gap: 0.6rem;
}

.badge_pending { background: #FEF3C7; color: #92400E; border: 1px solid #FDE68A; }
.badge_verified { background: #E0F2FE; color: #0369A1; border: 1px solid #BAE6FD; }
.badge_in_progress { background: #EEF2FF; color: #4338CA; border: 1px solid #C7D2FE; }
.badge_approved { background: #D1FAE5; color: #065F46; border: 1px solid #A7F3D0; }
.badge_rejected { background: #FEE2E2; color: #991B1B; border: 1px solid #FECACA; }

.dossier_grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
    background: #F8FAFC;
    padding: 2rem;
    border: 1px solid #E2E8F0;
    border-radius: 0;
}

.dossier_field span {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 1.2rem;
    color: #64748B;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    display: block;
    margin-bottom: 0.4rem;
}

.dossier_field strong {
    font-family: 'Outfit', sans-serif;
    font-size: 1.6rem;
    color: #111A3A;
    font-weight: 600;
}

/* 4-Stage Timeline */
.timeline_progress_bar {
    display: flex;
    justify-content: space-between;
    position: relative;
    margin: 3.5rem 0 2.5rem;
    padding: 0 1rem;
}

.timeline_progress_bar::before {
    content: '';
    position: absolute;
    top: 2rem;
    left: 5rem;
    right: 5rem;
    height: 3px;
    background: #E2E8F0;
    z-index: 1;
}

.timeline_node {
    position: relative;
    z-index: 2;
    text-align: center;
    flex: 1;
}

.node_circle {
    width: 4.2rem;
    height: 4.2rem;
    border-radius: 50%;
    background: #FFFFFF;
    border: 3px solid #CBD5E1;
    color: #94A3B8;
    font-family: 'Outfit', sans-serif;
    font-weight: 700;
    font-size: 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    transition: all 0.3s ease;
}

.timeline_node.done .node_circle {
    background: #10B981;
    border-color: #10B981;
    color: #FFFFFF;
}

.timeline_node.active .node_circle {
    background: #111A3A;
    border-color: #C59A27;
    color: #C59A27;
    box-shadow: 0 0 0 4px rgba(197, 154, 39, 0.2);
}

.node_label h5 {
    font-family: 'Outfit', sans-serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: #111A3A;
    margin-bottom: 0.2rem;
}

.node_label p {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 1.2rem;
    color: #64748B;
    margin: 0;
}

.admin_remarks_box {
    background: #FAFBFD;
    border: 1px solid #E2E8F0;
    border-radius: 0;
    padding: 2rem;
    margin-top: 2rem;
}

.admin_remarks_box h5 {
    font-family: 'Outfit', sans-serif;
    font-size: 1.4rem;
    font-weight: 700;
    color: #111A3A;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    column-gap: 0.6rem;
}

.admin_remarks_box p {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 1.4rem;
    color: #334155;
    margin: 0;
    line-height: 1.6;
}

@media(max-width: 768px) {
    .tracker_input_group { flex-direction: column; }
    .tracker_input_group button { padding: 1.5rem; justify-content: center; }
    .timeline_progress_bar { flex-direction: column; gap: 2rem; }
    .timeline_progress_bar::before { display: none; }
    .timeline_node { display: flex; align-items: center; text-align: left; column-gap: 1.5rem; }
    .node_circle { margin: 0; flex-shrink: 0; }
}
</style>
@endpush

@section('content')
@php
    $errors = $errors ?? new \Illuminate\Support\ViewErrorBag;
    $countries = $countries ?? collect();
    $visaTypes = $visaTypes ?? collect();
@endphp

    <!-- Breadcrumb Page Header -->
    <div class="contact_page_area" style="background-image: url({{ asset(getSettingsData('43', 'image')) }});">
        <div class="container">
            <div class="contact_wrapper">
                <h2>Candidate Application & Passport Status</h2>
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">HOME</a></li>
                    <li class="breadcrumb-item active">APPLY & STATUS TRACKING</li>
                  </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Apply Page Main Wrapper -->
    <div class="apply_page_wrapper">
        <div class="container">

            <!-- 1. Live Passport Status Tracking Search Bar -->
            <div class="passport_tracker_wrapper">
                <div class="tracker_header">
                    <h3><i class="fa-solid fa-magnifying-glass"></i> Track Your Application by Passport Number</h3>
                    <p>Already applied? Enter your Passport Number or File Tracking ID to view real-time recruitment, medical, and visa processing status.</p>
                </div>

                <form action="{{ route('apply.track') }}" method="POST">
                    @csrf
                    <div class="tracker_input_group">
                        <input type="text" name="passport_number" value="{{ request('passport') ?? old('passport_number') }}" placeholder="ENTER PASSPORT NUMBER (e.g. A08934521)" required autocomplete="off">
                        <button type="submit">
                            <i class="fa-solid fa-arrow-right"></i>
                            <span>CHECK STATUS</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Error Banner When Status Check Fails -->
            @if(session('status_check_error'))
                <div class="alert alert-warning mb-4" style="border-radius:0; font-family:'Plus Jakarta Sans',sans-serif; font-size:1.4rem; padding:1.8rem; background:#FEF3C7; border:1px solid #FDE68A; color:#92400E;">
                    <i class="fa-solid fa-circle-exclamation me-2"></i> {{ session('status_check_error') }}
                </div>
            @endif

            <!-- 2. Candidate Status Dossier (If Passport Found) -->
            @if($trackedApplication)
                @php
                    $statusEnum = $trackedApplication->status instanceof \App\Enums\ApplicationStatus
                        ? $trackedApplication->status
                        : (\App\Enums\ApplicationStatus::tryFrom($trackedApplication->status ?? '') ?? \App\Enums\ApplicationStatus::PENDING);
                    $stageLevel = $statusEnum->stageLevel();

                    $isStage1 = $stageLevel >= 1;
                    $isStage2 = $stageLevel >= 2;
                    $isStage3 = $stageLevel >= 3;
                    $isStage4 = $stageLevel >= 4;
                @endphp

                <div class="tracking_dossier_card" id="trackingDossier">
                    <div class="dossier_top_bar">
                        <div class="dossier_title">
                            <h4><i class="fa-solid fa-id-card-clip text-warning me-2"></i> {{ $trackedApplication->name }}</h4>
                            <span>Official File Reference: <strong>{{ $trackedApplication->tracking_no ?? 'AFI-APPLICATION' }}</strong> &bull; Registered on {{ $trackedApplication->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="dossier_status_badge {{ $statusEnum->badgeClass() }}">
                            <i class="fa-solid fa-circle-dot"></i>
                            <span>{{ $statusEnum->label() }}</span>
                        </div>
                    </div>

                    <!-- Dossier Information Grid -->
                    <div class="dossier_grid">
                        <div class="dossier_field">
                            <span>Passport Number</span>
                            <strong>{{ $trackedApplication->passport_number }}</strong>
                        </div>
                        <div class="dossier_field">
                            <span>Target Destination</span>
                            <strong>{{ $trackedApplication->destination_country ?? 'General Overseas Pool' }}</strong>
                        </div>
                        <div class="dossier_field">
                            <span>Contact Phone</span>
                            <strong>{{ $trackedApplication->phone ?? 'Not Provided' }}</strong>
                        </div>
                        <div class="dossier_field">
                            <span>Last File Update</span>
                            <strong>{{ $trackedApplication->updated_at->format('M d, Y - h:i A') }}</strong>
                        </div>
                    </div>

                    @if($statusEnum !== \App\Enums\ApplicationStatus::REJECTED)
                        <!-- 4-Stage Visual Progress Timeline -->
                        <div class="timeline_progress_bar">
                            <div class="timeline_node {{ $isStage1 ? ($isStage2 ? 'done' : 'active') : '' }}">
                                <div class="node_circle">
                                    @if($isStage2)<i class="fa-solid fa-check"></i>@else 01 @endif
                                </div>
                                <div class="node_label">
                                    <h5>Passport Registered</h5>
                                    <p>File created in database</p>
                                </div>
                            </div>

                            <div class="timeline_node {{ $isStage2 ? ($isStage3 ? 'done' : 'active') : '' }}">
                                <div class="node_circle">
                                    @if($isStage3)<i class="fa-solid fa-check"></i>@else 02 @endif
                                </div>
                                <div class="node_label">
                                    <h5>Document & Medical</h5>
                                    <p>Verification clearance</p>
                                </div>
                            </div>

                            <div class="timeline_node {{ $isStage3 ? ($isStage4 ? 'done' : 'active') : '' }}">
                                <div class="node_circle">
                                    @if($isStage4)<i class="fa-solid fa-check"></i>@else 03 @endif
                                </div>
                                <div class="node_label">
                                    <h5>Embassy & Visa</h5>
                                    <p>Visa quota endorsement</p>
                                </div>
                            </div>

                            <div class="timeline_node {{ $isStage4 ? 'done' : '' }}">
                                <div class="node_circle">
                                    @if($isStage4)<i class="fa-solid fa-check"></i>@else 04 @endif
                                </div>
                                <div class="node_label">
                                    <h5>Flight & Deployment</h5>
                                    <p>Work permit stamped</p>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-danger" style="border-radius:0; font-family:'Plus Jakarta Sans',sans-serif; font-size:1.4rem;">
                            <i class="fa-solid fa-circle-xmark me-2"></i> <strong>Application Attention Required:</strong> Your file was reviewed and flagged by our compliance team. Please visit our office or contact our helpline with your original documents.
                        </div>
                    @endif

                    <!-- Official Admin Counselor Remarks -->
                    @if($trackedApplication->admin_remarks)
                        <div class="admin_remarks_box">
                            <h5><i class="fa-solid fa-clipboard-check text-primary"></i> Official Recruitment Counselor Remarks:</h5>
                            <p>{{ $trackedApplication->admin_remarks }}</p>
                        </div>
                    @endif
                </div>
            @endif

            <!-- 3-Step Process Flow Strip -->
            <div class="apply_steps_strip">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 mb-3 mb-md-0">
                        <div class="step_item active">
                            <div class="step_badge">01</div>
                            <div class="step_text">
                                <h4>Passport Registration</h4>
                                <p>Submit Name & Passport Number</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 mb-3 mb-md-0">
                        <div class="step_item">
                            <div class="step_badge">02</div>
                            <div class="step_text">
                                <h4>Embassy Verification</h4>
                                <p>Background & Medical Clearance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="step_item">
                            <div class="step_badge">03</div>
                            <div class="step_text">
                                <h4>Visa & Overseas Flight</h4>
                                <p>Work Permit & Deployment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Success Confirmation Card (When Submitted) -->
            @if(session('success'))
                <div class="apply_success_card" data-aos="zoom-in">
                    <div class="success_icon_ring">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <h2>Application Successfully Registered!</h2>
                    <p class="lead_text">{{ session('success') }}</p>

                    @if(session('tracking_no'))
                        <div class="tracking_pill_box">
                            <span class="label">Your Official File Tracking Reference</span>
                            <strong class="tracking_code">{{ session('tracking_no') }}</strong>
                        </div>
                    @endif

                    <div class="next_steps_info">
                        <p><i class="fa-solid fa-circle-info text-warning me-2"></i> <strong>Next Step:</strong> Please keep your tracking number safe. You can check your progress anytime above using your passport number.</p>
                    </div>
                </div>
            @endif

            <!-- Main 2-Column Application Section -->
            <div class="row">
                <!-- Left Form Column (7 Cols) -->
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="apply_card_main">
                        <div class="apply_card_header">
                            <div class="badge_trust">
                                <i class="fa-solid fa-shield-halved"></i> Government Approved Recruitment Agency
                            </div>
                            <h2>Direct Candidate Application</h2>
                            <p>Enter your legal name and passport number below to register for overseas employment and visa processing.</p>
                        </div>

                        <form action="{{ route('apply.store') }}" method="POST" id="candidateApplyForm">
                            @csrf

                            <!-- Full Name Field (Required) -->
                            <div class="form_group">
                                <label for="candidate_name">Full Legal Name <span class="required_mark">*</span></label>
                                <div class="input_field_wrapper">
                                    <input type="text" id="candidate_name" name="name" value="{{ old('name') }}" placeholder="e.g. MOHAMMAD ABDUR RAHMAN" required autocomplete="name">
                                    <i class="fa-solid fa-user input_icon"></i>
                                </div>
                                <div class="field_helper">
                                    <i class="fa-solid fa-circle-check"></i> Enter your name exactly as printed in your official passport.
                                </div>
                                @error('name')
                                    <div class="error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Passport Number Field (Required) -->
                            <div class="form_group">
                                <label for="passport_number">Passport Number <span class="required_mark">*</span></label>
                                <div class="input_field_wrapper">
                                    <input type="text" id="passport_number" name="passport_number" value="{{ old('passport_number') }}" placeholder="e.g. A01234567 / BE0123456" required style="text-transform: uppercase;" maxlength="30">
                                    <i class="fa-solid fa-passport input_icon"></i>
                                </div>
                                <div class="field_helper">
                                    <i class="fa-solid fa-circle-check"></i> Passport must have at least 6 months remaining validity.
                                </div>
                                @error('passport_number')
                                    <div class="error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <!-- Phone / WhatsApp Number (Required) -->
                                <div class="col-md-6">
                                    <div class="form_group">
                                        <label for="candidate_phone">Phone / WhatsApp Number <span class="required_mark">*</span></label>
                                        <div class="input_field_wrapper">
                                            <input type="tel" id="candidate_phone" name="phone" value="{{ old('phone') }}" placeholder="+880 1700 000 000" required>
                                            <i class="fa-solid fa-phone input_icon"></i>
                                        </div>
                                        @error('phone')
                                            <div class="error_text">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Destination Country Preference (Optional) -->
                                <div class="col-md-6">
                                    <div class="form_group">
                                        <label for="destination_country">Target Country <span class="optional_mark">(Optional)</span></label>
                                        <div class="input_field_wrapper">
                                            <select id="destination_country" name="destination_country">
                                                <option value="">-- Select Destination --</option>
                                                @foreach($countries as $countryDetail)
                                                    @if($countryDetail->country)
                                                        <option value="{{ $countryDetail->country->name }}" {{ old('destination_country') == $countryDetail->country->name ? 'selected' : '' }}>
                                                            {{ $countryDetail->country->name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <i class="fa-solid fa-globe input_icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Address (Optional) -->
                            <div class="form_group">
                                <label for="candidate_email">Email Address <span class="optional_mark">(Optional)</span></label>
                                <div class="input_field_wrapper">
                                    <input type="email" id="candidate_email" name="email" value="{{ old('email') }}" placeholder="name@example.com">
                                    <i class="fa-solid fa-envelope input_icon"></i>
                                </div>
                                @error('email')
                                    <div class="error_text">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Additional Notes (Optional) -->
                            <div class="form_group">
                                <label for="notes">Additional Remarks / Experience <span class="optional_mark">(Optional)</span></label>
                                <div class="input_field_wrapper">
                                    <textarea id="notes" name="notes" placeholder="Mention any previous overseas work experience, licenses, or language skills...">{{ old('notes') }}</textarea>
                                </div>
                            </div>

                            <!-- Legal Consent Box -->
                            <div class="terms_consent_box">
                                <div class="form-check">
                                    <input type="checkbox" id="consent_checkbox" required checked>
                                    <label for="consent_checkbox">
                                        I hereby certify that my <strong>Full Name</strong> and <strong>Passport Number</strong> submitted above are accurate, legally valid, and belong to me.
                                    </label>
                                </div>
                            </div>

                            <!-- Submit CTA Button -->
                            <div class="submit_action_wrap">
                                <button type="submit" class="btn_apply_submit">
                                    <span>SUBMIT APPLICATION NOW</span>
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Right Sidebar Column (5 Cols) -->
                <div class="col-lg-5">
                    <div class="apply_sidebar">

                        <!-- Direct Helpline Card -->
                        <div class="sidebar_card helpline_box">
                            <h3 class="card_title">Direct Visa Desk Helpline</h3>
                            <p class="helpline_intro">Have questions regarding your passport submission or overseas visa quota? Contact our dedicated counseling officers:</p>
                            
                            <div class="helpline_item">
                                <i class="fa-solid fa-phone"></i>
                                <div class="hl_info">
                                    <span>Direct Application Hotline</span>
                                    <a href="tel:+8801700000000">+880 1700 000 000</a>
                                </div>
                            </div>

                            <div class="helpline_item">
                                <i class="fa-brands fa-whatsapp"></i>
                                <div class="hl_info">
                                    <span>Instant WhatsApp Counseling</span>
                                    <a href="https://wa.me/8801700000000" target="_blank">+880 1700 000 000</a>
                                </div>
                            </div>

                            <div class="helpline_item">
                                <i class="fa-solid fa-envelope"></i>
                                <div class="hl_info">
                                    <span>Official Inquiries</span>
                                    <a href="mailto:info@alfahiminternational.com">info@alfahiminternational.com</a>
                                </div>
                            </div>
                        </div>

                        <!-- Requirements Checklist Card -->
                        <div class="sidebar_card">
                            <h3 class="card_title">Mandatory Requirements</h3>
                            <ul class="requirements_list">
                                <li>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <div class="req_content">
                                        <h5>Original Passport</h5>
                                        <p>Minimum 6 months validity from the date of visa endorsement.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <div class="req_content">
                                        <h5>Biometric Photographs</h5>
                                        <p>White background color photos (standard passport size 35mm x 45mm).</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <div class="req_content">
                                        <h5>Medical Fitness Clearance</h5>
                                        <p>Health check from government & GAMCA accredited medical centers.</p>
                                    </div>
                                </li>
                                <li>
                                    <i class="fa-solid fa-circle-check"></i>
                                    <div class="req_content">
                                        <h5>Police Clearance Certificate</h5>
                                        <p>Clean background check from local police department.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- Government Licensed Trust Guarantee -->
                        <div class="sidebar_card guarantee_box">
                            <div class="guarantee_item">
                                <i class="fa-solid fa-shield-check"></i>
                                <span>100% Genuine Work Permits</span>
                            </div>
                            <p class="guarantee_note">All visa demands and work permits are verified directly by government labor ministries and embassy portals. We strictly prohibit unauthorized third-party intermediaries.</p>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
