@extends('admin.adminmaster')
@section('title')
Documents
@endsection
@section('style')
<style>
    .dropdown-menu {
        z-index: 1050;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection
@section('content')
<div class="page-body-wrapper">
    <div class="page-body" style="background-color: #f4f4f4">
        <div class="container-fluid">
            <div class="page-header">
                @if ($currentUserType === 'admin' )
                <div class="row">
                    <div class="col-lg-6 main-header">
                        <h2>Documents</h2>
                        <h6 class="mb-0">Manage Your Documents</h6>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="{{ route('document.add') }}" class="btn btn-outline-success">
                            Add Document
                        </a>
                    </div>
                </div>
                @endif
            </div>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="row mt-4">
                <div class="col-md-12">
                    @if($docs->count() > 0)
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                        @foreach($docs as $document)
                        <div class="col">
                            <div class="card document-card h-90 shadow-sm border-0 overflow-hidden position-relative">
                                <div class="card-body p-3">
                                    <div class="d-flex flex-column h-100">
                                        <!-- File Icon Header -->
                                        <div class="text-center mb-3">
                                            @if(str_contains($document->file, '.pdf'))
                                            <i class="fas fa-file-pdf text-danger" style="font-size: 48px"></i>
                                            @elseif(str_contains($document->file, '.doc') ||
                                            str_contains($document->file, '.docx'))
                                            <i class="fas fa-file-word text-primary" style="font-size: 48px"></i>
                                            @elseif(str_contains($document->file, '.xls') ||
                                            str_contains($document->file, '.xlsx'))
                                            <i class="fas fa-file-excel text-success" style="font-size: 48px"></i>
                                            @elseif(str_contains($document->file, '.jpg') ||
                                            str_contains($document->file, '.png') || str_contains($document->file,
                                            '.gif'))
                                            <i class="fas fa-file-image text-info" style="font-size: 48px"></i>
                                            @else
                                            <i class="fas fa-file text-secondary" style="font-size: 48px"></i>
                                            @endif
                                        </div>

                                        <!-- Document Details -->
                                        <div class="mb-3 flex-grow-1">
                                            <h6 class="mb-1 fw-semibold text-truncate" title="{{ $document->name }}">
                                                <i class="fas fa-file-signature me-2 text-muted"></i>
                                                {{ $document->name }}
                                            </h6>
                                            <p class="text-muted small mb-2">
                                                <i class="fas fa-align-left me-2"></i>
                                                {{ $document->description ?? 'No description' }}
                                            </p>

                                            <div class="d-flex flex-wrap gap-2 mt-3">
                                                @if($document->file)
                                                <span class="badge bg-light text-dark small">
                                                    <i class="fas fa-file-code me-1"></i>
                                                    {{ strtoupper(pathinfo($document->file, PATHINFO_EXTENSION)) }}
                                                </span>
                                                <span class="badge bg-light text-dark small">
                                                    <i class="fas fa-weight-hanging me-1"></i>
                                                    {{ round(Storage::size($document->file) / 1024, 1) }} KB
                                                </span>
                                                @endif
                                                <span class="badge bg-light text-dark small">
                                                    <i class="far fa-clock me-1"></i>
                                                    {{ $document->created_at->diffForHumans() }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center border-top pt-2">
                                            <div class="btn-group">
                                                @php
                                                $fileUrl = Storage::url($document->file);
                                                $ext = strtolower(pathinfo($document->file, PATHINFO_EXTENSION));
                                                @endphp

                                                @php
                                                $fileUrlFull = asset($fileUrl);
                                                @endphp

                                                @if(in_array($ext, ['pdf']))
                                                <button class="btn btn-sm btn-outline-primary view-file-btn"
                                                    data-file-url="{{ $fileUrlFull }}" data-file-type="{{ $ext }}"
                                                    title="View File">
                                                    <i class="far fa-eye"></i>
                                                </button>
                                                @elseif(in_array($ext, ['doc', 'docx']))
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-primary open-word-viewer"
                                                    data-file-url="{{ $fileUrlFull }}" title="View Word File">
                                                    <i class="far fa-eye"></i></button>
                                                @else
                                                <a href="{{ $fileUrlFull }}" target="_blank"
                                                    class="btn btn-sm btn-outline-primary" title="View File">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                @endif

                                                <a href="{{ asset($fileUrl) }}" download
                                                    class="btn btn-sm btn-outline-success" title="Download">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                            </div>
                                            @if ($currentUserType === 'admin' )
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-secondary dropdown-toggle"
                                                    type="button" data-bs-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">

                                                    <li>
                                                        <a href="{{route('document.delete',$document->id)}}"
                                                            class="dropdown-item text-danger"
                                                            onclick="return confirm('Are you sure you want to delete this document?')">
                                                            <i class="fas fa-trash-alt me-2"></i> Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-5">
                        <div class="empty-state">
                            <i class="fas fa-file-circle-exclamation fa-4x text-muted mb-4"></i>
                            <h4>No documents found</h4>
                            <p class="text-muted">Upload your first document to get started</p>
                            <a href="{{ route('document.add') }}" class="btn btn-primary mt-3">
                                <i class="fas fa-plus me-2"></i> Add Document
                            </a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="modal fade" id="fileViewerModal" tabindex="-1" aria-labelledby="fileViewerModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fileViewerModalLabel">Document Viewer</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-0">
                            <div id="pdf-viewer-container" style="display: none; height: 80vh;">
                                <iframe id="pdf-viewer" style="width: 100%; height: 100%; border: none;"></iframe>
                            </div>
                            <div id="word-viewer-container" style="display: none; height: 80vh;">
                                <div class="alert alert-info mb-0" id="word-viewer-fallback" style="display: none;">
                                    <h5><i class="fas fa-exclamation-triangle me-2"></i>Word Document Preview Not
                                        Available</h5>
                                    <p>Please download the file to view it properly.</p>
                                    <a id="word-download-fallback" href="#" class="btn btn-primary">
                                        <i class="fas fa-download me-2"></i> Download Document
                                    </a>
                                </div>
                                <iframe id="word-viewer" style="width: 100%; height: 100%; border: none;"></iframe>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a id="download-file-btn" href="#" class="btn btn-primary">
                                <i class="fas fa-download me-2"></i> Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>


@endsection
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Handle view file button clicks
    document.querySelectorAll('.view-file-btn').forEach(button => {
        button.addEventListener('click', function() {
            const fileUrl = this.getAttribute('data-file-url');
            const fileType = this.getAttribute('data-file-type');
            const modal = new bootstrap.Modal(document.getElementById('fileViewerModal'));

            // Set download link
            document.getElementById('download-file-btn').setAttribute('href', fileUrl);
            document.getElementById('word-download-fallback').setAttribute('href', fileUrl);

            // Hide all viewers first
            document.getElementById('pdf-viewer-container').style.display = 'none';
            document.getElementById('word-viewer-container').style.display = 'none';
            document.getElementById('word-viewer-fallback').style.display = 'none';

            if (fileType === 'pdf') {
                // Show PDF viewer
                document.getElementById('pdf-viewer-container').style.display = 'block';
                document.getElementById('pdf-viewer').src = fileUrl;
                document.getElementById('fileViewerModalLabel').textContent = 'PDF Viewer';
            } else if (fileType === 'doc' || fileType === 'docx') {
                // Show Word viewer with multiple options
                document.getElementById('word-viewer-container').style.display = 'block';
                document.getElementById('fileViewerModalLabel').textContent = 'Word Document Viewer';

                // Try Microsoft Office Online Viewer first
                const officeViewerUrl = `https://view.officeapps.live.com/op/embed.aspx?src=${encodeURIComponent(fileUrl)}`;
                const wordViewer = document.getElementById('word-viewer');
                wordViewer.src = officeViewerUrl;

                // Fallback if the viewer doesn't load
                wordViewer.onload = function() {
                    try {
                        // Check if viewer loaded successfully
                        if (wordViewer.contentDocument.body.innerText.includes("Sorry, we couldn't find the file") ||
                            wordViewer.contentDocument.body.innerText.includes("We can't open this file")) {
                            document.getElementById('word-viewer-fallback').style.display = 'block';
                        }
                    } catch (e) {
                        // Cross-origin error means it probably loaded
                        console.log("Viewer loaded successfully");
                    }
                };

                wordViewer.onerror = function() {
                    document.getElementById('word-viewer-fallback').style.display = 'block';
                };
            }

            modal.show();
        });
    });
});
</script>
@endsection
