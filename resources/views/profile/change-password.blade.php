@extends('admin.app')
@section('title')
    Change Password
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
            border-radius: 4px 0 0 4px;
            border: 1px solid #dee2e6;
        }
        .custom-input:focus {
            border-color: #845adf;
            box-shadow: 0 0 0 0.2rem rgba(132, 90, 223, 0.15);
        }
        .toggle-password {
            height: 38px;
            border-radius: 0 4px 4px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 12px;
            color: #6c757d;
        }
        .toggle-password:hover {
            color: #111a3a;
            background-color: #f8f9fa;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid my-4">
        @include('profile.partials.update-password-form')
    </div>
@endsection

@push('custom-scripts')
    <script>
        function togglePasswordVisibility(inputId, btn) {
            var input = document.getElementById(inputId);
            var icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'ri-eye-line';
            } else {
                input.type = 'password';
                icon.className = 'ri-eye-off-line';
            }
        }
    </script>
@endpush
