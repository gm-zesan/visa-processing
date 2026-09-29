@php
    $statusEnum = $application->status instanceof \App\Enums\ApplicationStatus
        ? $application->status
        : (\App\Enums\ApplicationStatus::tryFrom($application->status ?? '') ?? \App\Enums\ApplicationStatus::PENDING);
    $stageLevel = $statusEnum->stageLevel();

    $isStage1 = $stageLevel >= 1;
    $isStage2 = $stageLevel >= 2;
    $isStage3 = $stageLevel >= 3;
@endphp

<div class="tracking_dossier_card border-0 mb-0 p-0 shadow-none" id="trackingDossier">
    <div class="dossier_top_bar">
        <div class="dossier_title">
            <h4><i class="fa-solid fa-id-card-clip text-warning me-2"></i> {{ $application->name }}</h4>
            <span>Registered on {{ $application->created_at->format('M d, Y') }}</span>
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
            <strong>{{ $application->passport_number }}</strong>
        </div>
        <div class="dossier_field">
            <span>Target Destination</span>
            <strong>{{ $application->destination_country ?? 'General Overseas Pool' }}</strong>
        </div>
        <div class="dossier_field">
            <span>Contact Phone</span>
            <strong>{{ $application->phone ?? 'Not Provided' }}</strong>
        </div>
        <div class="dossier_field">
            <span>Last File Update</span>
            <strong>{{ $application->updated_at->format('M d, Y - h:i A') }}</strong>
        </div>
    </div>

    <!-- 3-Stage Visual Progress Timeline -->
        <div class="timeline_progress_bar">
            <div class="timeline_node {{ $isStage1 ? ($isStage2 ? 'done' : 'active') : '' }}">
                <div class="node_circle">
                    @if($isStage2)<i class="fa-solid fa-check"></i>@else 01 @endif
                </div>
                <div class="node_label">
                    <h5>Application Pending</h5>
                    <p>File created in database</p>
                </div>
            </div>

            <div class="timeline_node {{ $isStage2 ? ($isStage3 ? 'done' : 'active') : '' }}">
                <div class="node_circle">
                    @if($isStage3)<i class="fa-solid fa-check"></i>@else 02 @endif
                </div>
                <div class="node_label">
                    <h5>Processing</h5>
                    <p>Documents uploaded and verified</p>
                </div>
            </div>

            <div class="timeline_node {{ $isStage3 ? 'done' : '' }}">
                <div class="node_circle">
                    @if($isStage3)<i class="fa-solid fa-check"></i>@else 03 @endif
                </div>
                <div class="node_label">
                    <h5>Flight Ready</h5>
                    <p>Visa and deployment approved</p>
                </div>
            </div>
        </div>
    <!-- Uploaded Documents Section -->
    @if(isset($application->documents) && $application->documents->count() > 0)
        <div class="user_documents_box mt-4">
            <h5 class="mb-3" style="font-size: 1.25rem; font-weight: 700; color: #1e293b; border-bottom: 2px solid #e2e8f0; padding-bottom: 0.5rem;">
                <i class="fa-solid fa-folder-open text-primary me-2"></i> My Application Documents
            </h5>
            <div class="row g-3">
                @foreach($application->documents as $doc)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="document_item p-3 text-center" style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; transition: all 0.2s ease;">
                            <a href="{{ asset($doc->file_path) }}" data-fancybox="gallery" data-caption="{{ $doc->document_title }}" class="d-block text-decoration-none">
                                @if(Str::endsWith(strtolower($doc->file_path), ['.jpg', '.jpeg', '.png']))
                                    <div class="doc-preview mb-2" style="height: 120px; overflow: hidden; border-radius: 4px; border: 1px solid #e2e8f0;">
                                        <img src="{{ asset($doc->file_path) }}" alt="{{ $doc->document_title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                @else
                                    <div class="doc-preview mb-2 d-flex align-items-center justify-content-center" style="height: 120px; background: #e2e8f0; border-radius: 4px;">
                                        <i class="fa-solid fa-file-pdf fs-1 text-danger"></i>
                                    </div>
                                @endif
                                <strong class="d-block text-dark text-truncate" style="font-size: 1.1rem;">{{ $doc->document_title }}</strong>
                                <small class="text-muted" style="font-size: 0.9rem;">View File</small>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
