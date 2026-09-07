@extends('admin.app')
@section('title')
    Theme
@endsection

@push('custom-style')
    {{-- Datatable css  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.semanticui.min.css">
    <style>
        /* View Toggle */
        .view-toggle-btn {
            background-color: #f1f5f9;
            color: #64748b;
            border: 1px solid #e2e8f0;
            padding: 5px 12px;
            font-size: 12px;
            font-weight: 500;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .view-toggle-btn.active, .view-toggle-btn:hover {
            background-color: #845adf;
            color: #ffffff;
            border-color: #845adf;
        }

        /* Theme Card */
        .theme-card-wrapper {
            background: #ffffff;
            border-radius: 10px;
            border: 1px solid #e9edf4;
            overflow: hidden;
            transition: all 0.25s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.04);
        }
        .theme-card-wrapper:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(17, 26, 58, 0.1);
            border-color: #cbd5e1;
        }
        .theme-card-wrapper.is-active {
            border: 2px solid #845adf;
            box-shadow: 0 4px 18px rgba(132, 90, 223, 0.16);
        }

        /* Scaled Website UI Showcase */
        .theme-ui-showcase {
            position: relative;
            width: 100%;
            border-bottom: 1px solid #e9edf4;
            overflow: hidden;
        }

        .showcase-header {
            padding: 8px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid rgba(0,0,0,0.06);
        }
        .showcase-brand {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.3px;
            display: flex;
            align-items: center;
        }
        .showcase-nav-items {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 9px;
            font-weight: 500;
        }
        .showcase-nav-btn {
            font-size: 8px;
            font-weight: 600;
            color: #ffffff;
            padding: 2px 8px;
            border-radius: 3px;
            text-decoration: none;
        }

        .showcase-hero {
            padding: 20px 16px;
            position: relative;
            overflow: hidden;
        }
        .showcase-hero::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.12) 0%, transparent 70%);
            pointer-events: none;
        }
        .showcase-tag {
            display: inline-block;
            font-size: 7.5px;
            font-weight: 700;
            color: #ffffff;
            padding: 2px 6px;
            border-radius: 20px;
            margin-bottom: 6px;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .showcase-title {
            font-size: 13px;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.25;
            margin-bottom: 4px;
        }
        .showcase-desc {
            font-size: 8.5px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.3;
            margin-bottom: 10px;
        }
        .showcase-btn-primary {
            display: inline-block;
            font-size: 8.5px;
            font-weight: 700;
            color: #ffffff;
            padding: 4px 10px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
            text-decoration: none;
        }
        .showcase-btn-outline {
            display: inline-block;
            font-size: 8.5px;
            font-weight: 600;
            color: rgba(255,255,255,0.9);
            border: 1px solid rgba(255,255,255,0.35);
            padding: 3px 8px;
            border-radius: 4px;
            margin-left: 4px;
            text-decoration: none;
        }

        .showcase-strip {
            padding: 8px 14px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 6px;
            border-top: 1px solid rgba(0,0,0,0.04);
        }
        .showcase-box {
            background: #ffffff;
            border-radius: 4px;
            padding: 4px 6px;
            flex: 1;
            text-align: center;
            border: 1px solid rgba(0,0,0,0.05);
            box-shadow: 0 1px 2px rgba(0,0,0,0.03);
        }
        .showcase-box strong {
            display: block;
            font-size: 9px;
            line-height: 1.1;
        }
        .showcase-box span {
            font-size: 7.5px;
            color: #64748b;
        }

        .showcase-footer {
            padding: 6px 14px;
            font-size: 7.5px;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            opacity: 0.95;
        }

        /* Color Swatches Grid */
        .color-chips-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 6px;
            margin: 12px 0;
            background: #f8fafc;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #eef2f6;
        }
        .color-chip {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 4px 6px;
            background: #ffffff;
            border-radius: 4px;
            border: 1px solid #e2e8f0;
        }
        .color-dot {
            width: 14px;
            height: 14px;
            min-width: 14px;
            border-radius: 50%;
            border: 1px solid rgba(0, 0, 0, 0.15);
            display: inline-block;
        }
        .color-info {
            line-height: 1;
            overflow: hidden;
        }
        .color-info span {
            display: block;
            font-size: 7.5px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        .color-info code {
            font-size: 9.5px;
            font-weight: 700;
            color: #1e293b;
            font-family: monospace;
            padding: 0;
        }

        /* Table View styling */
        .color-preview-circle {
            width: 16px;
            height: 16px;
            border-radius: 50%;
            display: inline-block;
            vertical-align: middle;
            margin-right: 6px;
            border: 1px solid #ced4da;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }
        .color-hex-text {
            font-size: 12px;
            font-family: monospace;
            font-weight: 600;
            color: #333335;
        }
        #data-table td {
            vertical-align: middle;
        }
    </style>
@endpush

@section('content')
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12">
                <div class="card table-card">
                    <div class="card-header table-header">
                        <div class="title-with-breadcrumb">
                            <div class="table-title">Theme</div>
                            <nav aria-label="breadcrumb"> 
                                <ol class="breadcrumb mb-0"> 
                                    <li class="breadcrumb-item">
                                        <a href="{{route('dashboard')}}">Dashboard</a>
                                    </li> 
                                    <li class="breadcrumb-item active" aria-current="page">Theme</li> 
                                </ol> 
                            </nav>
                        </div>
                        
                        <div class="d-flex align-items-center gap-2">
                            {{-- View Switcher --}}
                            <div class="btn-group btn-group-sm" role="group">
                                <button type="button" class="view-toggle-btn active" id="btn-view-cards" onclick="switchView('cards')">
                                    <i class="ri-grid-fill me-1"></i> Visual Showcase
                                </button>
                                <button type="button" class="view-toggle-btn" id="btn-view-table" onclick="switchView('table')">
                                    <i class="ri-table-line me-1"></i> Table View
                                </button>
                            </div>

                            <a href="{{route('theme.create')}}" class="add-new">
                                Add Theme<i class="ms-1 ri-add-line"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        {{-- VIEW 1: Visual Theme Showcase Gallery --}}
                        <div id="cards-view-container">
                            <div class="row g-4">
                                @foreach($themes as $theme)
                                    <div class="col-xl-4 col-md-6 col-12">
                                        <div class="theme-card-wrapper {{ $theme->status == 1 ? 'is-active' : '' }}">
                                            
                                            {{-- Scaled Theme UI Component --}}
                                            <div class="theme-ui-showcase">
                                                {{-- Navbar --}}
                                                <div class="showcase-header" style="background-color: {{ $theme->nav_bg }};">
                                                    <span class="showcase-brand" style="color: {{ $theme->secondary_color }};">
                                                        <i class="ri-shield-star-fill me-1" style="color: {{ $theme->primary_color }};"></i> AL FAHIM
                                                    </span>
                                                    <div class="showcase-nav-items">
                                                        <span style="color: {{ $theme->secondary_color }};">Countries</span>
                                                        <span style="color: {{ $theme->secondary_color }};">Visas</span>
                                                        <span class="showcase-nav-btn" style="background-color: {{ $theme->primary_color }};">
                                                            Apply
                                                        </span>
                                                    </div>
                                                </div>

                                                {{-- Hero Banner --}}
                                                <div class="showcase-hero" style="background: linear-gradient(135deg, {{ $theme->secondary_color }} 0%, rgba({{ hexToRgb($theme->secondary_color) }}, 0.88) 100%);">
                                                    <span class="showcase-tag" style="background-color: {{ $theme->primary_color }};">
                                                        GOVERNMENT APPROVED
                                                    </span>
                                                    <div class="showcase-title">
                                                        Overseas Manpower & Work Permits
                                                    </div>
                                                    <div class="showcase-desc">
                                                        Authorized worker deployment to 5 destination countries with full labor protections.
                                                    </div>
                                                    <div>
                                                        <span class="showcase-btn-primary" style="background-color: {{ $theme->primary_color }};">
                                                            Explore Jobs →
                                                        </span>
                                                        <span class="showcase-btn-outline">
                                                            Counselor
                                                        </span>
                                                    </div>
                                                </div>

                                                {{-- 3-Box Strip --}}
                                                <div class="showcase-strip" style="background-color: {{ $theme->light_color }};">
                                                    <div class="showcase-box">
                                                        <strong style="color: {{ $theme->primary_color }};">5,200+</strong>
                                                        <span>Workers</span>
                                                    </div>
                                                    <div class="showcase-box">
                                                        <strong style="color: {{ $theme->primary_color }};">5 Target</strong>
                                                        <span>Countries</span>
                                                    </div>
                                                    <div class="showcase-box">
                                                        <strong style="color: {{ $theme->primary_color }};">100%</strong>
                                                        <span>Verified</span>
                                                    </div>
                                                </div>

                                                {{-- Footer --}}
                                                <div class="showcase-footer" style="background-color: {{ $theme->footer_bg }};">
                                                    <span>© AL FAHIM INTERNATIONAL</span>
                                                    <span>RL-XXXX</span>
                                                </div>
                                            </div>

                                            {{-- Theme Info & Swatches --}}
                                            <div class="p-3 d-flex flex-column flex-grow-1">
                                                <div class="d-flex align-items-center justify-content-between mb-1">
                                                    <h6 class="fw-bold text-dark mb-0" style="font-size: 15px;">{{ $theme->name }}</h6>
                                                    @if($theme->status == 1)
                                                        <span class="badge bg-success" style="font-size: 11px; font-weight: 500;">Active Theme</span>
                                                    @else
                                                        <span class="badge bg-light text-secondary border" style="font-size: 11px; font-weight: 400;">Inactive</span>
                                                    @endif
                                                </div>

                                                @if($theme->description)
                                                    <p class="text-muted small mb-0" style="font-size: 12px; line-height: 1.35;">
                                                        {{ Str::limit($theme->description, 70) }}
                                                    </p>
                                                @endif

                                                {{-- Color Swatches 6-Grid --}}
                                                <div class="color-chips-container">
                                                    <div class="color-chip" title="Primary Color">
                                                        <span class="color-dot" style="background-color: {{ $theme->primary_color }};"></span>
                                                        <div class="color-info">
                                                            <span>Primary</span>
                                                            <code>{{ $theme->primary_color }}</code>
                                                        </div>
                                                    </div>
                                                    <div class="color-chip" title="Secondary / Base Dark">
                                                        <span class="color-dot" style="background-color: {{ $theme->secondary_color }};"></span>
                                                        <div class="color-info">
                                                            <span>Secondary</span>
                                                            <code>{{ $theme->secondary_color }}</code>
                                                        </div>
                                                    </div>
                                                    <div class="color-chip" title="Hover Accent">
                                                        <span class="color-dot" style="background-color: {{ $theme->hover_color }};"></span>
                                                        <div class="color-info">
                                                            <span>Hover</span>
                                                            <code>{{ $theme->hover_color }}</code>
                                                        </div>
                                                    </div>
                                                    <div class="color-chip" title="Light Background Tint">
                                                        <span class="color-dot" style="background-color: {{ $theme->light_color }};"></span>
                                                        <div class="color-info">
                                                            <span>Light Tint</span>
                                                            <code>{{ $theme->light_color }}</code>
                                                        </div>
                                                    </div>
                                                    <div class="color-chip" title="Navbar Background">
                                                        <span class="color-dot" style="background-color: {{ $theme->nav_bg }};"></span>
                                                        <div class="color-info">
                                                            <span>Nav BG</span>
                                                            <code>{{ $theme->nav_bg }}</code>
                                                        </div>
                                                    </div>
                                                    <div class="color-chip" title="Footer Background">
                                                        <span class="color-dot" style="background-color: {{ $theme->footer_bg }};"></span>
                                                        <div class="color-info">
                                                            <span>Footer BG</span>
                                                            <code>{{ $theme->footer_bg }}</code>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Actions Footer --}}
                                                <div class="d-flex align-items-center justify-content-between pt-2 mt-auto border-top">
                                                    <div>
                                                        @if($theme->status == 1)
                                                            <button type="button" class="btn btn-sm btn-success text-white fw-semibold" style="font-size: 12px;" disabled>
                                                                <i class="ri-checkbox-circle-line me-1"></i> Active
                                                            </button>
                                                        @else
                                                            <a href="{{ route('theme.active', ['id' => $theme->id]) }}" class="btn btn-sm btn-outline-primary fw-semibold" style="font-size: 12px;">
                                                                <i class="ri-check-line me-1"></i> Activate
                                                            </a>
                                                        @endif
                                                    </div>

                                                    <div class="d-flex align-items-center gap-1">
                                                        <a href="{{ route('theme.edit', ['id' => $theme->id]) }}" class="btn btn-sm btn-light border" title="Edit Theme" style="font-size: 12px;">
                                                            <i class="ri-edit-line"></i> Edit
                                                        </a>
                                                        @if($theme->status != 1)
                                                            <a href="{{ route('theme.delete', ['id' => $theme->id]) }}" class="btn btn-sm btn-light border text-danger" onclick="return confirm('Are you sure you want to delete this theme?')" title="Delete Theme" style="font-size: 12px;">
                                                                <i class="ri-delete-bin-2-line"></i>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- VIEW 2: Data Table --}}
                        <div id="table-view-container" class="d-none">
                            <table class="table w-100" id="data-table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 60px;">SL NO</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Primary Color</th>
                                        <th scope="col">Secondary Color</th>
                                        <th scope="col">Hover Color</th>
                                        <th scope="col">Light Tint</th>
                                        <th scope="col" style="width: 100px;" class="text-center">Status</th>
                                        <th scope="col" style="width: 140px;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($themes as $index => $theme)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="fw-semibold">{{ $theme->name }}</div>
                                                @if($theme->description)
                                                    <small class="text-muted">{{ Str::limit($theme->description, 50) }}</small>
                                                @endif
                                            </td>
                                            <td>
                                                <span class="color-preview-circle" style="background-color: {{ $theme->primary_color }};"></span>
                                                <span class="color-hex-text">{{ $theme->primary_color }}</span>
                                            </td>
                                            <td>
                                                <span class="color-preview-circle" style="background-color: {{ $theme->secondary_color }};"></span>
                                                <span class="color-hex-text">{{ $theme->secondary_color }}</span>
                                            </td>
                                            <td>
                                                <span class="color-preview-circle" style="background-color: {{ $theme->hover_color }};"></span>
                                                <span class="color-hex-text">{{ $theme->hover_color }}</span>
                                            </td>
                                            <td>
                                                <span class="color-preview-circle" style="background-color: {{ $theme->light_color }};"></span>
                                                <span class="color-hex-text">{{ $theme->light_color }}</span>
                                            </td>
                                            <td class="text-center align-middle">
                                                @if($theme->status == 1)
                                                    <span class="badge bg-success" style="font-size: 11px; font-weight: 500; padding: 4px 8px;">Active</span>
                                                @else
                                                    <span class="badge bg-secondary" style="font-size: 11px; font-weight: 400; padding: 4px 8px;">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="action-btn justify-content-center">
                                                    @if($theme->status != 1)
                                                        <a href="{{ route('theme.active', ['id' => $theme->id]) }}" class="btn btn-view" title="Set as Active Theme">
                                                            <i class="ri-check-line"></i>
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('theme.edit', ['id' => $theme->id]) }}" class="btn btn-edit" title="Edit">
                                                        <i class="ri-edit-line"></i>
                                                    </a>
                                                    @if($theme->status != 1)
                                                        <a href="{{ route('theme.delete', ['id' => $theme->id]) }}" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this theme?')" title="Delete">
                                                            <i class="ri-delete-bin-2-line"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom-scripts')
    {{-- Data table --}}
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js" defer></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#data-table').DataTable({
                responsive: true,
                "pageLength": 20,
                "lengthMenu": [20, 50, 100],
                order: [[6, 'asc'], [0, 'asc']]
            });
        });

        function switchView(view) {
            if (view === 'cards') {
                $('#cards-view-container').removeClass('d-none');
                $('#table-view-container').addClass('d-none');
                $('#btn-view-cards').addClass('active');
                $('#btn-view-table').removeClass('active');
            } else {
                $('#cards-view-container').addClass('d-none');
                $('#table-view-container').removeClass('d-none');
                $('#btn-view-cards').removeClass('active');
                $('#btn-view-table').addClass('active');
            }
        }
    </script>
@endpush
