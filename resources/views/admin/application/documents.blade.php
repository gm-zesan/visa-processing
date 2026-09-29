@extends('admin.app')
@section('title')
    Manage Documents - {{ $application->name }}
@endsection

@push('custom-style')
<style>
    :root {
        --primary-color: #845adf;
        --primary-light: rgba(132, 90, 223, 0.1);
        --primary-gradient: linear-gradient(135deg, #845adf 0%, #6842c2 100%);
        --bg-light: #f8fafc;
        --border-color: #e2e8f0;
    }

    /* Page Header */
    .vault-header {
        background: #fff;
        border-radius: 12px;
        padding: 24px 32px;
        margin-bottom: 24px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid var(--border-color);
    }
    .vault-title { font-size: 20px; font-weight: 700; color: #1e293b; margin: 0; }
    .vault-subtitle { font-size: 13px; color: #64748b; margin-top: 4px; }

    /* Left Upload Section */
    .upload-section {
        background: #fff;
        border-radius: 12px;
        padding: 32px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        border: 1px solid var(--border-color);
    }
    .upload-section-title {
        font-size: 16px;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .upload-section-title i { color: var(--primary-color); background: var(--primary-light); padding: 8px; border-radius: 8px; }

    /* Dynamic Form Item & File Uploads */
    .dynamic-item-card {
        background: var(--bg-light);
        border: 1px solid var(--border-color);
        padding: 12px;
        border-radius: 8px;
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease;
        position: relative;
    }
    .dynamic-item-card:hover { border-color: #cbd5e1; box-shadow: 0 5px 15px rgba(0,0,0,0.04); }
    .btn-remove-row {
        position: absolute; top: -8px; right: -8px; background: #ef4444; color: #fff; border: none; border-radius: 50%;
        width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; font-size: 14px;
        cursor: pointer; box-shadow: 0 4px 10px rgba(239, 68, 68, 0.3); transition: transform 0.2s; z-index: 10;
    }
    .btn-remove-row:hover { transform: scale(1.1); }
    
    .custom-label { font-size: 12px; font-weight: 600; color: #334155; margin-bottom: 4px; display: block; }
    .custom-input { height: 34px; font-size: 13px; border-radius: 6px; border: 1px solid var(--border-color); transition: all 0.3s; background: #fff; }
    .custom-input:focus { border-color: var(--primary-color); box-shadow: 0 0 0 3px var(--primary-light); }

    .file-upload-wrapper {
        position: relative; width: 100%; height: 90px; border: 2px dashed #cbd5e1; border-radius: 8px;
        background: #fff; display: flex; flex-direction: column; align-items: center; justify-content: center;
        cursor: pointer; overflow: hidden; transition: all 0.3s;
    }
    .file-upload-wrapper:hover { border-color: var(--primary-color); background: var(--primary-light); }
    .file-upload-wrapper input[type="file"] { position: absolute; width: 100%; height: 100%; opacity: 0; cursor: pointer; z-index: 2; }
    .file-upload-placeholder { text-align: center; z-index: 1; }
    .file-upload-placeholder i { font-size: 24px; color: #94a3b8; margin-bottom: 4px; transition: 0.3s; display: block;}
    .file-upload-wrapper:hover .file-upload-placeholder i { color: var(--primary-color); }
    .file-upload-placeholder span { display: block; font-size: 11px; color: #64748b; font-weight: 500; }
    
    .file-preview { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: #fff; display: none; align-items: center; justify-content: center; z-index: 1; }
    .file-preview img { width: 100%; height: 100%; object-fit: contain; border-radius: 6px; }
    
    /* Add Column Button Card */
    .add-document-card {
        height: 100%;
        min-height: 156px;
        border: 2px dashed var(--primary-color);
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: var(--primary-light);
        color: var(--primary-color);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .add-document-card:hover { background: rgba(132, 90, 223, 0.15); transform: translateY(-2px); }
    .add-document-card i { font-size: 32px; margin-bottom: 6px; }
    .add-document-card span { font-size: 13px; font-weight: 600; }

    /* Vault Sidebar (Right Column) */
    .vault-sidebar {
        background: #fff; border-radius: 8px; border: 1px solid var(--border-color); box-shadow: 0 4px 15px rgba(0,0,0,0.02);
    }
    .vault-sidebar-header {
        padding: 12px 16px; border-bottom: 1px solid var(--border-color); font-weight: 700; font-size: 14px; display: flex; align-items: center; gap: 8px; color: #1e293b;
    }
    .vault-grid { max-height: 500px; overflow-y: auto; overflow-x: hidden; padding: 12px; }
    .vault-item {
        position: relative; border-radius: 8px; border: 1px solid var(--border-color); overflow: hidden;
        cursor: pointer; transition: all 0.2s ease; background: var(--bg-light); display: flex; flex-direction: column;
    }
    .vault-item:hover { border-color: var(--primary-color); box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .vault-item-preview { height: 90px; width: 100%; display: flex; align-items: center; justify-content: center; background: #fff; }
    .vault-item-preview img { width: 100%; height: 100%; object-fit: cover; }
    .vault-item-preview .pdf-box { width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #fff1f2; color: #e11d48; font-size: 32px; }
    .vault-item-details { padding: 8px; border-top: 1px solid var(--border-color); background: var(--bg-light); text-align: center; }
    .vault-item-title { font-size: 11px; font-weight: 600; color: #1e293b; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; }
    
    .btn-delete-vault {
        position: absolute; top: 4px; right: 4px; background: #ef4444; color: #fff; width: 22px; height: 22px; 
        border-radius: 4px; display: flex; align-items: center; justify-content: center; font-size: 12px;
        text-decoration: none; transition: 0.2s; z-index: 10; border: none; box-shadow: 0 2px 4px rgba(239, 68, 68, 0.3);
    }
    .btn-delete-vault:hover { background: #dc2626; color: #fff; transform: scale(1.1); }

    /* Buttons */
    .btn-action-primary { background: var(--primary-gradient); color: #fff; border: none; padding: 10px 24px; border-radius: 6px; font-weight: 600; font-size: 13px; box-shadow: 0 4px 15px rgba(132, 90, 223, 0.3); transition: all 0.3s; }
    .btn-action-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(132, 90, 223, 0.4); color: #fff; }

    /* Lightbox Modal */
    #lightboxModal {
        position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: rgba(15, 23, 42, 0.95);
        z-index: 9999; display: none; flex-direction: column; align-items: center; justify-content: center;
        opacity: 0; transition: opacity 0.3s ease;
    }
    #lightboxModal.show { display: flex; opacity: 1; }
    #lightboxClose { position: absolute; top: 30px; right: 40px; color: #fff; font-size: 40px; cursor: pointer; transition: 0.2s; }
    #lightboxClose:hover { color: #ef4444; transform: scale(1.1); }
    #lightboxContent { max-width: 90%; max-height: 85vh; border-radius: 8px; box-shadow: 0 10px 40px rgba(0,0,0,0.5); }
    .lightbox-title { position: absolute; bottom: 30px; color: #fff; font-size: 18px; font-weight: 600; text-align: center; }

</style>
@endpush

@section('content')
<div class="container-fluid my-4 pb-5">
    
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4" style="border-radius: 10px;">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row g-4">
        <!-- Left: Upload Section -->
        <div class="col-lg-8 col-12">
            <div class="card table-card mb-4">
                <div class="card-header table-header d-flex justify-content-between align-items-center">
                    <div class="table-title">Upload New Documents</div>
                    <a href="{{ route('applications.index') }}" class="add-new" style="background-color: transparent; border: 1px solid rgba(255,255,255,0.2); color: #fff; text-decoration: none; padding: 5px 10px; border-radius: 4px; font-size: 13px;">
                        <i class="ri-list-ordered-2 me-1"></i> Application List
                    </a>
                </div>
                <div class="card-body p-4 bg-light">

                <form action="{{ route('applications.uploadDocuments', $application->id) }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                    @csrf
                    
                    <div class="row g-4" id="dynamic-documents-container">
                        <!-- Default First Upload Box -->
                        <div class="col-12 col-lg-6 col-xl-4 col-xxl-3 dynamic-item">
                            <div class="dynamic-item-card">
                                <label class="custom-label">Document Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control custom-input mb-3" name="documents[0][title]" placeholder="e.g. Passport Front Page" required>
                                
                                <label class="custom-label">Upload File <span class="text-danger">*</span></label>
                                <div class="file-upload-wrapper flex-grow-1">
                                    <input type="file" name="documents[0][file]" accept=".pdf,.jpg,.jpeg,.png" required onchange="previewFile(this)">
                                    <div class="file-upload-placeholder">
                                        <i class="ri-image-add-fill"></i>
                                        <span>Click or drag file here</span>
                                    </div>
                                    <div class="file-preview"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Plus Button Column -->
                        <div class="col-12 col-lg-6 col-xl-4 col-xxl-3" id="add-btn-container">
                            <div class="add-document-card" id="add-document-btn">
                                <i class="ri-add-line"></i>
                                <span>Add New File Box</span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-top d-flex gap-2">
                        <button type="submit" class="btn submit-button" style="background-color: #845adf; color: #fff; padding: 10px 24px; font-weight: 500; font-size: 13.5px; border-radius: 4px; border: none;">
                            <i class="ri-upload-cloud-2-fill me-1"></i> Upload All Files
                        </button>
                        <a href="{{ route('applications.index') }}" class="btn btn-light border" style="font-size: 13.5px; font-weight: 500; padding: 10px 24px; color: #475569; text-decoration: none;">
                            Cancel & Leave
                        </a>
                    </div>
                </form>
                </div>
            </div>
        </div>

        <!-- Right: Vault Section -->
        <div class="col-lg-4 col-12">
            <div class="card table-card mb-4">
                <div class="card-header table-header">
                    <div class="table-title">Currently Uploaded Files</div>
                </div>
                <div class="card-body p-3">
                    @if($application->documents && $application->documents->count() > 0)
                        <div class="vault-grid">
                            <div class="row g-2">
                                @foreach($application->documents as $doc)
                                    @php
                                        $ext = strtolower(pathinfo($doc->file_path, PATHINFO_EXTENSION));
                                        $isPdf = $ext === 'pdf';
                                    @endphp
                                    <div class="col-6 col-sm-4 col-md-3 col-lg-6 col-xl-6">
                                        <div class="vault-item h-100">
                                            <a href="{{ route('applications.deleteDocument', $doc->id) }}" class="btn-delete-vault" title="Delete Document" onclick="return confirm('Delete this document permanently?')">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                            
                                            <div class="vault-item-preview" onclick="openLightbox('{{ asset($doc->file_path) }}', '{{ $isPdf ? 'pdf' : 'image' }}', '{{ $doc->document_title }}')">
                                                @if($isPdf)
                                                    <div class="pdf-box"><i class="ri-file-pdf-2-fill"></i></div>
                                                @else
                                                    <img src="{{ asset($doc->file_path) }}" alt="{{ $doc->document_title }}">
                                                @endif
                                            </div>
                                            <div class="vault-item-details" onclick="openLightbox('{{ asset($doc->file_path) }}', '{{ $isPdf ? 'pdf' : 'image' }}', '{{ $doc->document_title }}')">
                                                <div class="vault-item-title" title="{{ $doc->document_title }}">{{ $doc->document_title }}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <div class="text-center p-5">
                            <i class="ri-folder-open-fill text-muted mb-3" style="font-size: 60px; opacity: 0.3;"></i>
                            <h6 class="fw-bold text-dark">Vault is Empty</h6>
                            <p class="text-muted small mb-0">No documents uploaded.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightboxModal">
    <i class="ri-close-line" id="lightboxClose"></i>
    <div id="lightboxContentWrapper" style="width: 80%; height: 80%; display: flex; justify-content: center; align-items: center; position: relative;">
        <!-- Dynamic content goes here -->
    </div>
    <div class="lightbox-title" id="lightboxTitle"></div>
</div>

@endsection

@push('custom-scripts')
<script>
    let docIndex = 1;

    $('#add-document-btn').click(function() {
        let colHtml = `
            <div class="col-12 col-lg-6 col-xl-4 col-xxl-3 dynamic-item" style="display: none;">
                <div class="dynamic-item-card">
                    <button type="button" class="btn-remove-row" title="Remove Document"><i class="ri-close-line"></i></button>
                    
                    <label class="custom-label">Document Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control custom-input mb-3" name="documents[${docIndex}][title]" placeholder="e.g. Medical Report" required>
                    
                    <label class="custom-label">Upload File <span class="text-danger">*</span></label>
                    <div class="file-upload-wrapper flex-grow-1">
                        <input type="file" name="documents[${docIndex}][file]" accept=".pdf,.jpg,.jpeg,.png" required onchange="previewFile(this)">
                        <div class="file-upload-placeholder">
                            <i class="ri-image-add-fill"></i>
                            <span>Click or drag file here</span>
                        </div>
                        <div class="file-preview"></div>
                    </div>
                </div>
            </div>
        `;
        let $newCol = $(colHtml);
        $newCol.insertBefore('#add-btn-container').fadeIn(300);
        docIndex++;
    });

    $(document).on('click', '.btn-remove-row', function() {
        $(this).closest('.dynamic-item').fadeOut(300, function(){ $(this).remove(); });
    });

    // File Preview Logic for Upload Boxes
    function previewFile(input) {
        var wrapper = $(input).closest('.file-upload-wrapper');
        var previewContainer = wrapper.find('.file-preview');
        
        if (input.files && input.files[0]) {
            var file = input.files[0];
            var fileType = file.type;
            var reader = new FileReader();
            
            reader.onload = function(e) {
                if (fileType.match('image.*')) {
                    previewContainer.html('<img src="' + e.target.result + '" alt="Preview">').fadeIn(200).css('display', 'flex');
                } else if (fileType === 'application/pdf') {
                    previewContainer.html('<div style="text-align:center;"><i class="ri-file-pdf-2-fill text-danger fs-1"></i><div class="fw-bold mt-2 text-dark">PDF Selected</div></div>').fadeIn(200).css('display', 'flex');
                } else {
                    previewContainer.html('<div style="text-align:center;"><i class="ri-file-text-fill text-primary fs-1"></i><div class="fw-bold mt-2 text-dark">File Selected</div></div>').fadeIn(200).css('display', 'flex');
                }
            }
            reader.readAsDataURL(file);
        } else {
            previewContainer.fadeOut(200);
        }
    }

    // Lightbox Logic
    function openLightbox(fileUrl, type, title) {
        let content = '';
        if(type === 'image') {
            content = `<img src="${fileUrl}" id="lightboxContent" style="object-fit: contain;">`;
        } else if(type === 'pdf') {
            content = `<iframe src="${fileUrl}" id="lightboxContent" style="width:100%; height:100%; border:none; background: #fff;"></iframe>`;
        }
        
        $('#lightboxContentWrapper').html(content);
        $('#lightboxTitle').text(title);
        $('#lightboxModal').addClass('show');
    }

    $('#lightboxClose, #lightboxModal').click(function(e) {
        if(e.target.id === 'lightboxModal' || e.target.id === 'lightboxClose') {
            $('#lightboxModal').removeClass('show');
            setTimeout(() => { $('#lightboxContentWrapper').empty(); }, 300);
        }
    });
</script>
@endpush
