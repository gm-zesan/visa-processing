@extends('admin.app')
@section('title')
    Edit Theme
@endsection

@push('custom-style')
<style>
    .palette-preview-card {
        border-radius: 8px;
        background: #ffffff;
        border: 1px solid #e9edf4;
        padding: 16px;
    }
    .swatch-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 8px 12px;
        border-radius: 6px;
        background: #f8fafc;
        border: 1px solid #eef2f6;
        margin-bottom: 8px;
    }
    .swatch-circle {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        border: 1px solid rgba(0, 0, 0, 0.15);
        display: inline-block;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
    }
</style>
@endpush

@section('content')
<div class="container-fluid my-4">
    <form action="{{ route('theme.update', ['id' => $theme->id]) }}" method="POST">
        @csrf
        <div class="row g-4">
            {{-- Main Form Card --}}
            <div class="col-md-8 col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Theme</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="{{ route('theme') }}">Theme</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Theme</li> 
                                </ol> 
                            </nav>
                        </div>
                        <a href="{{ route('theme') }}" class="add-new">Theme<i class="ms-1 ri-list-ordered-2"></i></a>
                    </div>

                    <div class="card-body custom-form">
                        <div class="row">
                            {{-- Theme Name --}}
                            <div class="col-12 mb-2">
                                <label for="name" class="form-label custom-label">Theme Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control custom-input" name="name" id="name" value="{{ old('name', $theme->name) }}" placeholder="Theme Name">
                                @if($errors->has('name'))
                                    <div class="error_msg">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            {{-- Primary Color --}}
                            <div class="col-md-6 mb-2">
                                <label for="primary_color" class="form-label custom-label">Primary Color <span class="text-danger">*</span></label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="color" class="form-control form-control-color custom-input" style="width: 44px; height: 32px; padding: 2px; cursor: pointer;" id="primary_picker" value="{{ old('primary_color', $theme->primary_color) }}" oninput="syncColor(this, 'primary_color')">
                                    <input type="text" class="form-control custom-input font-monospace text-uppercase" name="primary_color" id="primary_color" value="{{ old('primary_color', $theme->primary_color) }}" oninput="syncPicker(this, 'primary_picker')" placeholder="#C59A27" required>
                                </div>
                                @if($errors->has('primary_color'))
                                    <div class="error_msg">
                                        {{ $errors->first('primary_color') }}
                                    </div>
                                @endif
                            </div>

                            {{-- Secondary Color --}}
                            <div class="col-md-6 mb-2">
                                <label for="secondary_color" class="form-label custom-label">Secondary Color <span class="text-danger">*</span></label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="color" class="form-control form-control-color custom-input" style="width: 44px; height: 32px; padding: 2px; cursor: pointer;" id="secondary_picker" value="{{ old('secondary_color', $theme->secondary_color) }}" oninput="syncColor(this, 'secondary_color')">
                                    <input type="text" class="form-control custom-input font-monospace text-uppercase" name="secondary_color" id="secondary_color" value="{{ old('secondary_color', $theme->secondary_color) }}" oninput="syncPicker(this, 'secondary_picker')" placeholder="#111A3A" required>
                                </div>
                                @if($errors->has('secondary_color'))
                                    <div class="error_msg">
                                        {{ $errors->first('secondary_color') }}
                                    </div>
                                @endif
                            </div>

                            {{-- Hover Color --}}
                            <div class="col-md-6 mb-2">
                                <label for="hover_color" class="form-label custom-label">Hover Color</label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="color" class="form-control form-control-color custom-input" style="width: 44px; height: 32px; padding: 2px; cursor: pointer;" id="hover_picker" value="{{ old('hover_color', $theme->hover_color) }}" oninput="syncColor(this, 'hover_color')">
                                    <input type="text" class="form-control custom-input font-monospace text-uppercase" name="hover_color" id="hover_color" value="{{ old('hover_color', $theme->hover_color) }}" oninput="syncPicker(this, 'hover_picker')" placeholder="#A87F17">
                                </div>
                                @if($errors->has('hover_color'))
                                    <div class="error_msg">
                                        {{ $errors->first('hover_color') }}
                                    </div>
                                @endif
                            </div>

                            {{-- Light Background Color --}}
                            <div class="col-md-6 mb-2">
                                <label for="light_color" class="form-label custom-label">Light Background Color</label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="color" class="form-control form-control-color custom-input" style="width: 44px; height: 32px; padding: 2px; cursor: pointer;" id="light_picker" value="{{ old('light_color', $theme->light_color) }}" oninput="syncColor(this, 'light_color')">
                                    <input type="text" class="form-control custom-input font-monospace text-uppercase" name="light_color" id="light_color" value="{{ old('light_color', $theme->light_color) }}" oninput="syncPicker(this, 'light_picker')" placeholder="#FBF6EA">
                                </div>
                                @if($errors->has('light_color'))
                                    <div class="error_msg">
                                        {{ $errors->first('light_color') }}
                                    </div>
                                @endif
                            </div>

                            {{-- Navbar Background --}}
                            <div class="col-md-6 mb-2">
                                <label for="nav_bg" class="form-label custom-label">Navbar Background</label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="color" class="form-control form-control-color custom-input" style="width: 44px; height: 32px; padding: 2px; cursor: pointer;" id="nav_picker" value="{{ old('nav_bg', $theme->nav_bg) }}" oninput="syncColor(this, 'nav_bg')">
                                    <input type="text" class="form-control custom-input font-monospace text-uppercase" name="nav_bg" id="nav_bg" value="{{ old('nav_bg', $theme->nav_bg) }}" oninput="syncPicker(this, 'nav_picker')" placeholder="#FFFFFF">
                                </div>
                                @if($errors->has('nav_bg'))
                                    <div class="error_msg">
                                        {{ $errors->first('nav_bg') }}
                                    </div>
                                @endif
                            </div>

                            {{-- Footer Background --}}
                            <div class="col-md-6 mb-2">
                                <label for="footer_bg" class="form-label custom-label">Footer Background</label>
                                <div class="d-flex align-items-center gap-2">
                                    <input type="color" class="form-control form-control-color custom-input" style="width: 44px; height: 32px; padding: 2px; cursor: pointer;" id="footer_picker" value="{{ old('footer_bg', $theme->footer_bg) }}" oninput="syncColor(this, 'footer_bg')">
                                    <input type="text" class="form-control custom-input font-monospace text-uppercase" name="footer_bg" id="footer_bg" value="{{ old('footer_bg', $theme->footer_bg) }}" oninput="syncPicker(this, 'footer_picker')" placeholder="#111A3A">
                                </div>
                                @if($errors->has('footer_bg'))
                                    <div class="error_msg">
                                        {{ $errors->first('footer_bg') }}
                                    </div>
                                @endif
                            </div>

                            {{-- Description --}}
                            <div class="col-12 mt-2">
                                <label for="description" class="form-label custom-label">Description</label>
                                <textarea class="form-control custom-input" name="description" id="description" rows="4" placeholder="Theme Description" style="resize: none;">{{ old('description', $theme->description) }}</textarea>
                                @if($errors->has('description'))
                                    <div class="error_msg">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Sidebar Cards --}}
            <div class="col-md-4 col-12">
                <div class="row g-4">
                    {{-- Action Card --}}
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Action</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn submit-button">Update
                                            <span class="ms-1 spinner-border spinner-border-sm d-none" role="status"></span>
                                        </button>
                                    </div>
                                    <div class="col-6">
                                        <a href="{{ route('theme') }}" class="btn leave-button">Leave</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Palette Swatches Summary --}}
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Palette Summary</div>
                            </div>
                            <div class="card-body p-3">
                                <div class="swatch-item">
                                    <span class="small fw-semibold text-dark">Primary Color</span>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="small font-monospace text-muted" id="preview_hex_primary">{{ $theme->primary_color }}</span>
                                        <span class="swatch-circle" id="preview_circle_primary" style="background-color: {{ $theme->primary_color }};"></span>
                                    </div>
                                </div>
                                <div class="swatch-item">
                                    <span class="small fw-semibold text-dark">Secondary Base</span>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="small font-monospace text-muted" id="preview_hex_secondary">{{ $theme->secondary_color }}</span>
                                        <span class="swatch-circle" id="preview_circle_secondary" style="background-color: {{ $theme->secondary_color }};"></span>
                                    </div>
                                </div>
                                <div class="swatch-item">
                                    <span class="small fw-semibold text-dark">Hover Accent</span>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="small font-monospace text-muted" id="preview_hex_hover">{{ $theme->hover_color }}</span>
                                        <span class="swatch-circle" id="preview_circle_hover" style="background-color: {{ $theme->hover_color }};"></span>
                                    </div>
                                </div>
                                <div class="swatch-item">
                                    <span class="small fw-semibold text-dark">Light Tint</span>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="small font-monospace text-muted" id="preview_hex_light">{{ $theme->light_color }}</span>
                                        <span class="swatch-circle" id="preview_circle_light" style="background-color: {{ $theme->light_color }};"></span>
                                    </div>
                                </div>
                                <div class="swatch-item">
                                    <span class="small fw-semibold text-dark">Footer Background</span>
                                    <div class="d-flex align-items-center gap-2">
                                        <span class="small font-monospace text-muted" id="preview_hex_footer">{{ $theme->footer_bg }}</span>
                                        <span class="swatch-circle" id="preview_circle_footer" style="background-color: {{ $theme->footer_bg }};"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Theme Status Card --}}
                    <div class="col-12">
                        <div class="card table-card">
                            <div class="table-header">
                                <div class="table-title">Status</div>
                            </div>
                            <div class="custom-form card-body">
                                <div class="form-check">
                                    <input class="form-check-input custom-checkbox" type="checkbox" name="set_active" id="set_active" value="1" {{ old('set_active', $theme->status) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label custom-checkbox-label ms-1" for="set_active">Set as Active Theme</label>
                                </div>
                                <small class="text-muted d-block mt-2" style="font-size: 11px;">
                                    When enabled, this theme color palette will be applied across the entire website.
                                </small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </form>
</div>
@endsection

@push('custom-scripts')
    <script>
        $('.submit-button').click(function(){
            $(this).css('opacity', '1');
            $(this).find('.spinner-border').removeClass('d-none');
            $(this).attr('disabled', true);
            $(this).closest('form').submit();
        });

        function syncColor(picker, targetId) {
            document.getElementById(targetId).value = picker.value.toUpperCase();
            updateSwatches();
        }

        function syncPicker(input, targetPickerId) {
            var val = input.value.trim();
            if (/^#([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$/.test(val)) {
                document.getElementById(targetPickerId).value = val;
                updateSwatches();
            }
        }

        function updateSwatches() {
            var primary = document.getElementById('primary_color').value || '#C59A27';
            var secondary = document.getElementById('secondary_color').value || '#111A3A';
            var hover = document.getElementById('hover_color').value || primary;
            var light = document.getElementById('light_color').value || '#FBF6EA';
            var footerBg = document.getElementById('footer_bg').value || secondary;

            document.getElementById('preview_hex_primary').innerText = primary;
            document.getElementById('preview_circle_primary').style.backgroundColor = primary;

            document.getElementById('preview_hex_secondary').innerText = secondary;
            document.getElementById('preview_circle_secondary').style.backgroundColor = secondary;

            document.getElementById('preview_hex_hover').innerText = hover;
            document.getElementById('preview_circle_hover').style.backgroundColor = hover;

            document.getElementById('preview_hex_light').innerText = light;
            document.getElementById('preview_circle_light').style.backgroundColor = light;

            document.getElementById('preview_hex_footer').innerText = footerBg;
            document.getElementById('preview_circle_footer').style.backgroundColor = footerBg;
        }

        document.addEventListener('DOMContentLoaded', function() {
            updateSwatches();
        });
    </script>
@endpush
