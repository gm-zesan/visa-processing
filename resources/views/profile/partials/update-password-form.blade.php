<div class="row justify-content-center">
    <div class="col-lg-7 col-md-10 col-12">
        <div class="card table-card mb-4">
            <div class="card-header table-header d-flex justify-content-between align-items-center">
                <div class="title-with-breadcrumb">
                    <div class="table-title">Change Password</div>
                    <nav aria-label="breadcrumb"> 
                        <ol class="breadcrumb mb-0"> 
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li> 
                            <li class="breadcrumb-item"><a href="{{ route('profile.edit') }}">Profile Settings</a></li> 
                            <li class="breadcrumb-item active" aria-current="page">Change Password</li> 
                        </ol> 
                    </nav>
                </div>
                <a href="{{ route('profile.edit') }}" class="btn btn-sm text-primary" style="font-size: 13px; font-weight: 500;">
                    <i class="ri-user-3-line me-1"></i> Back to Profile
                </a>
            </div>

            <div class="card-body custom-form p-4">
                @if (session('status') === 'password-updated')
                    <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 13px;">
                        <i class="ri-checkbox-circle-line me-1"></i> Your password has been changed successfully!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="font-size: 10px;"></button>
                    </div>
                @endif

                <p class="text-muted small mb-4">
                    Ensure your account is using a strong, long password to stay protected against unauthorized access.
                </p>

                <form method="post" action="{{ route('password.update') }}" class="row g-3">
                    @csrf
                    @method('put')

                    <!-- Current Password -->
                    <div class="col-12">
                        <label for="current_password" class="form-label custom-label">Current Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="current_password" name="current_password" type="password" class="form-control custom-input @error('current_password', 'updatePassword') is-invalid @enderror" autocomplete="current-password" placeholder="Enter your current password">
                            <button class="btn btn-light border border-start-0 toggle-password" type="button" style="border-color: #dee2e6 !important;" onclick="togglePasswordVisibility('current_password', this)">
                                <i class="ri-eye-off-line"></i>
                            </button>
                        </div>
                        @if($errors->updatePassword->has('current_password'))
                            <div class="text-danger small mt-1">{{ $errors->updatePassword->first('current_password') }}</div>
                        @endif
                    </div>

                    <!-- New Password -->
                    <div class="col-12">
                        <label for="password" class="form-label custom-label">New Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="password" name="password" type="password" class="form-control custom-input @error('password', 'updatePassword') is-invalid @enderror" autocomplete="new-password" placeholder="Minimum 8 characters with mix of letters & numbers">
                            <button class="btn btn-light border border-start-0 toggle-password" type="button" style="border-color: #dee2e6 !important;" onclick="togglePasswordVisibility('password', this)">
                                <i class="ri-eye-off-line"></i>
                            </button>
                        </div>
                        @if($errors->updatePassword->has('password'))
                            <div class="text-danger small mt-1">{{ $errors->updatePassword->first('password') }}</div>
                        @endif
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-12">
                        <label for="password_confirmation" class="form-label custom-label">Confirm New Password <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control custom-input @error('password_confirmation', 'updatePassword') is-invalid @enderror" autocomplete="new-password" placeholder="Re-enter your new password">
                            <button class="btn btn-light border border-start-0 toggle-password" type="button" style="border-color: #dee2e6 !important;" onclick="togglePasswordVisibility('password_confirmation', this)">
                                <i class="ri-eye-off-line"></i>
                            </button>
                        </div>
                        @if($errors->updatePassword->has('password_confirmation'))
                            <div class="text-danger small mt-1">{{ $errors->updatePassword->first('password_confirmation') }}</div>
                        @endif
                    </div>

                    <div class="col-12 mt-4 pt-3 border-top d-flex align-items-center gap-3">
                        <button type="submit" class="btn submit-button" style="background-color: #845adf; color: #fff; padding: 7px 22px; font-weight: 500; font-size: 13px; border-radius: 4px;">
                            Update Password
                        </button>
                        <a href="{{ route('profile.edit') }}" class="btn btn-light" style="font-size: 13px; font-weight: 500; border: 1px solid #dee2e6;">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>