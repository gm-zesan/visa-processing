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
                    @php 
                        $extTracker = strtolower(pathinfo($doc->file_path, PATHINFO_EXTENSION));
                        $isPdfTracker = $extTracker === 'pdf'; 
                    @endphp
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="document_item p-3 d-flex flex-column justify-content-between h-100" style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 10px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); transition: transform 0.2s, box-shadow 0.2s;">
                            <div>
                                <a href="{{ route('applications.publicViewDocument', $doc->id) }}" target="_blank" class="d-block text-decoration-none" title="Click to view {{ $doc->document_title }}">
                                    @if(!$isPdfTracker)
                                        <div class="doc-preview mb-2 position-relative" style="height: 130px; overflow: hidden; border-radius: 6px; border: 1px solid #e2e8f0; background: #f8fafc; cursor: pointer;">
                                            <img src="{{ route('applications.publicViewDocument', $doc->id) }}" alt="{{ $doc->document_title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    @else
                                        <div class="doc-preview mb-2 d-flex flex-column align-items-center justify-content-center" style="height: 130px; background: #fff1f2; border: 1px solid #ffe4e6; border-radius: 6px; cursor: pointer;">
                                            <i class="fa-solid fa-file-pdf fs-1 text-danger mb-1"></i>
                                            <span class="badge bg-danger text-white" style="font-size: 10px; text-transform: uppercase;">PDF Document</span>
                                        </div>
                                    @endif
                                </a>
                                <strong class="d-block text-dark text-truncate mb-2 text-center" title="{{ $doc->document_title }}" style="font-size: 1.05rem;">
                                    {{ $doc->document_title }}
                                </strong>
                            </div>

                            <div class="text-center pt-2 mt-2 border-top">
                                <a href="{{ route('applications.publicDownloadDocument', $doc->id) }}" class="text-primary text-decoration-none fw-semibold d-inline-flex align-items-center gap-1" style="font-size: 0.92rem;">
                                    <i class="fa-solid fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
