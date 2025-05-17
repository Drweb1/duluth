@extends('admin.adminmaster')
@section('title')
Documents
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .custom-file-upload {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }

    .custom-file-hidden {
        position: absolute;
        left: -9999px;
        opacity: 0;
        height: 1px;
        width: 1px;
        pointer-events: none;
    }
</style>
@section('content')
<div class="page-body-wrapper">

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">

                    <div class="col-lg-6 main-header">
                        <h2>Add<span>Documents</span></h2>
                        <h6 class="mb-0">Manage Your Documents</h6>
                    </div>
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Add Document</h5>
                        </div>

                        <form method="POST" action="{{ route('document.add') }}" class="form theme-form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row mb-3">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1">Document Name
                                                <x-required_field />
                                            </label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ old('name') }}">
                                            @error('name') <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1">Select Folder
                                                <x-required_field />
                                            </label>
                                            <select class="form-control" name="folder_id" >
                                                <option value="">Choose Folder</option>
                                                @foreach ($folders as $folder)
                                                <option value="{{ $folder->id }}" {{ old('folder_id')==$folder->id ?
                                                    'selected' : '' }}>
                                                    {{ $folder->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('folder_id') <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1">Upload File
                                                <x-required_field />
                                            </label>
                                            <div class="custom-file-upload">
                                                <input type="file" name="file" id="file"
                                                    class="custom-file-hidden" hidden>
                                                <label for="file"
                                                    class="btn btn-outline-primary rounded-pill px-4 py-2">
                                                    <i class="fas fa-upload"></i> Choose File
                                                </label>
                                                <span id="file-chosen" class="ml-2 text-muted">No file selected</span>
                                            </div>
                                            @error('file') <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="mb-1">File Description</label>
                                            <textarea class="form-control" name="description" rows="3"
                                                placeholder="Add a description for the file...">{{ old('description') }}</textarea>
                                            @error('description') <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection
    @section('scripts')
    <script>
        document.getElementById('file').addEventListener('change', function () {
        const fileName = this.files.length > 0 ? this.files[0].name : 'No file selected';
        document.getElementById('file-chosen').textContent = fileName;
    });
    </script>

    @endsection
