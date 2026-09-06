<div class="row">
    <!-- Left Column: Profile Details Form -->
    <div class="col-lg-8 col-12">
        <div class="card table-card mb-4">
            <div class="card-header table-header d-flex justify-content-between align-items-center">
                <div class="title-with-breadcrumb">
                    <div class="table-title">Personal Information</div>
                    <nav aria-label="breadcrumb"> 
                        <ol class="breadcrumb mb-0"> 
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> 
                            <li class="breadcrumb-item active" aria-current="page">Profile Settings</li> 
                        </ol> 
                    </nav>
                </div>
                <a href="{{ route('password-change.profile') }}" class="btn btn-sm text-primary" style="font-size: 13px; font-weight: 500;">
                    <i class="ri-lock-password-line me-1"></i> Change Password
                </a>
            </div>

            <div class="card-body custom-form">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px;">
                        <i class="ri-checkbox-circle-line me-1"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 10px;"></button>
                    </div>
                @endif

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" id="profileUpdateForm">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="remove_image" id="remove_image" value="0">

                    <div class="row g-3">
                        <!-- Full Name -->
                        <div class="col-md-6 col-12">
                            <label for="name" class="form-label custom-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control custom-input @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required placeholder="Enter your full name">
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="col-md-6 col-12">
                            <label for="email" class="form-label custom-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control custom-input @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required placeholder="Enter your email address">
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Designation -->
                        <div class="col-md-6 col-12">
                            <label for="designation" class="form-label custom-label">Designation / Role Title <span class="text-muted fw-normal">(Optional)</span></label>
                            <input type="text" class="form-control custom-input @error('designation') is-invalid @enderror" id="designation" name="designation" value="{{ old('designation', $user->designation) }}" placeholder="e.g. Managing Director / Operations Manager">
                            @error('designation')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-6 col-12">
                            <label for="phone_no" class="form-label custom-label">Phone Number <span class="text-muted fw-normal">(Optional)</span></label>
                            <input type="text" class="form-control custom-input @error('phone_no') is-invalid @enderror" id="phone_no" name="phone_no" value="{{ old('phone_no', $user->phone_no) }}" placeholder="e.g. +880 1712 345678">
                            @error('phone_no')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Office Address -->
                        <div class="col-12">
                            <label for="address" class="form-label custom-label">Office / Contact Address <span class="text-muted fw-normal">(Optional)</span></label>
                            <input type="text" class="form-control custom-input @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $user->address) }}" placeholder="e.g. Suite 402, Al Fahim Tower, Dhaka">
                            @error('address')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Social & Messaging Profiles -->
                        <div class="col-md-4 col-12">
                            <label for="whatsapp" class="form-label custom-label">WhatsApp Number <span class="text-muted fw-normal">(Optional)</span></label>
                            <input type="text" class="form-control custom-input @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $user->whatsapp) }}" placeholder="e.g. +8801712345678">
                            @error('whatsapp')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 col-12">
                            <label for="facebook" class="form-label custom-label">Facebook Profile <span class="text-muted fw-normal">(Optional)</span></label>
                            <input type="text" class="form-control custom-input @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook', $user->facebook) }}" placeholder="e.g. https://facebook.com/username">
                            @error('facebook')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 col-12">
                            <label for="linkedin" class="form-label custom-label">LinkedIn Profile <span class="text-muted fw-normal">(Optional)</span></label>
                            <input type="text" class="form-control custom-input @error('linkedin') is-invalid @enderror" id="linkedin" name="linkedin" value="{{ old('linkedin', $user->linkedin) }}" placeholder="e.g. https://linkedin.com/in/username">
                            @error('linkedin')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Bio / Description -->
                        <div class="col-12">
                            <label for="description" class="form-label custom-label">Professional Bio / Notes <span class="text-muted fw-normal">(Optional)</span></label>
                            <textarea class="form-control custom-input" id="description" name="description" rows="4" style="height: auto; resize: vertical;" placeholder="Write a short summary or internal remarks...">{{ old('description', $user->description) }}</textarea>
                            @error('description')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-4 pt-3 border-top d-flex align-items-center gap-3">
                        <button type="submit" class="btn submit-button" style="background-color: #845adf; color: #fff; padding: 7px 22px; font-weight: 500; font-size: 13px; border-radius: 4px;">
                            Save Changes
                        </button>
                        <a href="{{ route('dashboard') }}" class="btn btn-light" style="font-size: 13px; font-weight: 500; border: 1px solid #dee2e6;">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Right Column: Avatar & Account Summary Card -->
    <div class="col-lg-4 col-12">
        <!-- Avatar Management Card -->
        <div class="card table-card mb-4">
            <div class="table-header">
                <div class="table-title">Profile Photo</div>
            </div>
            <div class="card-body text-center p-4">
                <div class="position-relative d-inline-block mb-3">
                    @if($user->image && file_exists(public_path($user->image)))
                        <img id="avatarPreview" src="{{ asset($user->image) }}" alt="Avatar" class="rounded-circle shadow-sm" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #845adf;">
                    @else
                        <div id="avatarPlaceholder" class="rounded-circle d-flex align-items-center justify-content-center bg-light text-muted mx-auto shadow-sm" style="width: 120px; height: 120px; border: 3px solid #e9edf4; font-size: 48px;">
                            <i class="ri-user-3-line"></i>
                        </div>
                        <img id="avatarPreview" src="" alt="Avatar" class="rounded-circle shadow-sm d-none" style="width: 120px; height: 120px; object-fit: cover; border: 3px solid #845adf;">
                    @endif
                </div>

                <h6 class="fw-bold mb-1" id="previewCardName" style="color: #111a3a;">{{ $user->name }}</h6>
                <p class="text-muted small mb-3" id="previewCardEmail">{{ $user->email }}</p>

                <div class="d-flex justify-content-center gap-2">
                    <label for="imageUploadInput" class="btn btn-sm text-white mb-0 cursor-pointer" style="background-color: #845adf; font-size: 12.5px; border-radius: 4px; padding: 6px 14px; cursor: pointer;">
                        <i class="ri-upload-2-line me-1"></i> Upload Photo
                    </label>
                    <input type="file" id="imageUploadInput" name="image" form="profileUpdateForm" accept="image/*" class="d-none" onchange="handleAvatarSelect(this)">

                    @if($user->image)
                        <button type="button" class="btn btn-sm btn-outline-danger" id="removeAvatarBtn" onclick="triggerRemoveAvatar()" style="font-size: 12.5px; border-radius: 4px; padding: 6px 12px;">
                            <i class="ri-delete-bin-line"></i> Remove
                        </button>
                    @endif
                </div>
                <div class="text-muted mt-2" style="font-size: 11px;">Supported: JPG, PNG, WEBP (Max 2MB)</div>
            </div>
        </div>

        <!-- Account Security & Summary Card -->
        <div class="card table-card">
            <div class="table-header">
                <div class="table-title">Account Quick Summary</div>
            </div>
            <div class="card-body p-3">
                <ul class="list-unstyled mb-0" style="font-size: 13px;">
                    <li class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Account Status:</span>
                        <span class="badge bg-success-subtle text-success fw-semibold">Active Verified</span>
                    </li>
                    <li class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Assigned Role:</span>
                        <span class="fw-medium text-dark text-capitalize">
                            {{ $user->roles->pluck('name')->first() ?? 'Administrator' }}
                        </span>
                    </li>
                    <li class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Member Since:</span>
                        <span class="text-muted">{{ $user->created_at ? $user->created_at->format('d M, Y') : 'N/A' }}</span>
                    </li>
                    <li class="d-flex justify-content-between py-2">
                        <span class="text-muted">Password Security:</span>
                        <a href="{{ route('password-change.profile') }}" class="text-decoration-none" style="color: #845adf; font-weight: 500;">
                            Update Password <i class="ri-arrow-right-s-line"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>