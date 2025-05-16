@extends('admin.adminmaster')
@section('title')
Folders
@endsection
@section('style')
<style>

</style>

@endsection
@section('content')
<div class="page-body-wrapper">
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 main-header">
                        <h2>Folders</h2>
                        <h6 class="mb-0">Manage Your Folders</h6>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addFolderModal">
                            Add Folders
                        </button>
                        <a href="{{ route('document.add') }}" class="btn btn-outline-success">
                            Add Document
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addFolderModal" tabindex="-1" aria-labelledby="addFolderModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form method="POST" action="{{ route('folder.add') }}" class="form theme-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="addFolderModalLabel">Add New Folders</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-1">Folder Name
                                            <x-required_field />
                                        </label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="mb-2">Folder Type
                                            <x-required_field />
                                        </label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="">Select Folder Type</option>
                                            <option value="pdf" {{ old('type')=='pdf' ? 'selected' : '' }}>Pdf
                                            </option>
                                            <option value="word" {{ old('type')=='word' ? 'selected' : '' }}>Word
                                            </option>
                                        </select>
                                        @error('type') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="mb-1">Description
                                            <x-required_field />
                                        </label>
                                        <textarea class="form-control" name="description" rows="3"
                                            placeholder="Add a description...">{{ old('description') }}</textarea>
                                        @error('description') <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Folder</button>
                        </div>
                    </form>
                </div>
            </div>
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
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="container-fluid">
            <div class="row">
                @foreach ($folders as $folder)
                <div class="col-md-3">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3 w-100">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">{{ $folder->name }}</h6>
                                <p class="text-muted mb-0 small">{{ $folder->description }}</p>
                            </div>
                            <div class="ms-auto dropdown" style="margin-left: 120px">
                                <a href="#" class="text-muted" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item" href="{{route('folder.documents',$folder->id)}}"><i
                                                class="fa fa-eye me-2"></i>View</a></li>

                                    <li>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                            data-bs-target="#editFolderModal{{ $folder->id }}">
                                            <i class="fa fa-edit me-2"></i>Edit
                                        </a>
                                    </li>

                                    {{-- <li><a class="dropdown-item" href="#"><i class="fa fa-share me-2"></i>Share</a></li> --}}
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a href="{{ route('folder.delete', $folder->id) }}"
                                            class="dropdown-item text-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="editFolderModal{{ $folder->id }}" tabindex="-1"
                    aria-labelledby="editFolderModalLabel{{ $folder->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editFolderModalLabel{{ $folder->id }}">Edit Folder</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('folder.edit') }}" method="POST" class="form theme-form">
                                @csrf
                                <input type="hidden" name="id" value="{{ $folder->id }}">

                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-6 form-group">
                                            <div class="mb-3">
                                                <label for="folderName{{ $folder->id }}" class="form-label">Folder
                                                    Name
                                                    <x-required_field />
                                                </label>
                                                <input type="text" class="form-control" id="folderName{{ $folder->id }}"
                                                    name="name" value="{{ $folder->name }}">
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3 form-group">
                                                <label for="folderType{{ $folder->id }}" class="form-label">
                                                    Folder Type
                                                    <x-required_field />
                                                </label>
                                                <select class="form-control" id="folderType{{ $folder->id }}"
                                                    name="type" required>
                                                    <option value="pdf" {{ $folder->type == 'pdf' ? 'selected' : ''
                                                        }}>PDF</option>
                                                    <option value="word" {{ $folder->type == 'word' ? 'selected' : ''
                                                        }}>Word</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="mb-3  form-group">
                                                <label for="folderStatus{{ $folder->id }}" class="form-label">Status
                                                </label>
                                                <select class="form-control" id="folderStatus{{ $folder->id }}"
                                                    name="status">
                                                    <option value="active" {{ $folder->status == 'active' ? 'selected' :
                                                        '' }}>Active</option>
                                                    <option value="inactive" {{ $folder->status == 'inactive' ?
                                                        'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3  form-group">
                                                <label for="folderDescription{{ $folder->id }}"
                                                    class="form-label">Description
                                                    <x-required_field />
                                                </label>
                                                <textarea class="form-control" id="folderDescription{{ $folder->id }}"
                                                    name="description" rows="3">{{ $folder->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>

        </div>
    </div>
</div>

@endsection
