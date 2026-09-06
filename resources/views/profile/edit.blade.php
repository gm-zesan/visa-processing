@extends('admin.app')
@section('title')
    Profile Settings
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
    </style>
@endpush

@section('content')
    <div class="container-fluid my-4">
        @include('profile.partials.update-profile-information-form')
    </div>
@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function(){
            $('#name').on('input', function(){
                var name = $(this).val();
                $('#previewCardName').text(name || 'Your Name');
            });
            $('#email').on('input', function(){
                var email = $(this).val();
                $('#previewCardEmail').text(email || 'example@domain.com');
            });
        });

        function handleAvatarSelect(input) {
            if (input.files && input.files[0]) {
                var file = input.files[0];
                var validTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/webp', 'image/svg+xml'];
                if (!validTypes.includes(file.type)) {
                    alert('Please select a valid image format (JPG, PNG, WEBP, SVG).');
                    input.value = '';
                    return;
                }
                if (file.size > 2 * 1024 * 1024) {
                    alert('Image file size must be less than 2MB.');
                    input.value = '';
                    return;
                }

                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#avatarPlaceholder').addClass('d-none');
                    $('#avatarPreview').attr('src', e.target.result).removeClass('d-none');
                    $('#remove_image').val('0');
                }
                reader.readAsDataURL(file);
            }
        }

        function triggerRemoveAvatar() {
            if (confirm('Are you sure you want to remove your profile photo?')) {
                $('#remove_image').val('1');
                $('#imageUploadInput').val('');
                $('#avatarPreview').addClass('d-none').attr('src', '');
                $('#avatarPlaceholder').removeClass('d-none');
                $('#removeAvatarBtn').remove();
            }
        }
    </script>
@endpush
