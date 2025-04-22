@extends('admin.adminmaster')
@section('title')
Add Items
@endsection

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-header">
        <div class="row">
          <div class="col-lg-6 main-header">
            <h2>Import<span>Items</span></h2>
            <h6 class="mb-0">admin panel</h6>
          </div>
          <div class="col-lg-6 breadcrumb-right">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="pe-7s-home"></i></a></li>
              <li class="breadcrumb-item">Dashboard</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <div class="card">

            <div class="card-header">
              <h5>Add file</h5>
            </div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('import_errors'))
            <div class="alert alert-danger">
                <ul>
                    @foreach (session('import_errors') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <form action="{{ route('import_items') }}" method="POST" enctype="multipart/form-data" class="form form-theme">
                @csrf
                <div class="form-group">
                    <label class="col-sm-3 col-form-label">Upload File</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" name="file" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary btn-pill" type="submit">Submit</button>
                    <input class="btn btn-light btn-pill" type="reset" value="Cancel">
                </div>
            </form>

          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection
