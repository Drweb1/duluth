@extends('admin.adminmaster')
@section('title')
Affiliates
@endsection
@section('content')
<div class="page-body-wrapper">
    <!-- Right sidebar Ends-->
    <div class="page-body">
      <div class="container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-lg-6 main-header">
              <h2>Affliates<span>List</span></h2>
              <h6 class="mb-0">admin panel</h6>
            </div>
            <div class="col-lg-6 breadcrumb-right">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                <li class="breadcrumb-item">Affliates</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Affiliates List</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-xl">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Added At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($affiliates as $affiliate)
                                <tr>
                                    <th scope="row">{{ $affiliate->id }}</th>
                                    <td>{{ $affiliate->name }}</td>
                                    <td>{{ $affiliate->email }}</td>
                                    <td>{{ $affiliate->phone }}</td>
                                    <td>{{ $affiliate->created_at->format('Y-m-d') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-primary mb-3 mt-2">
                            <li class="page-item {{ $affiliates->onFirstPage() ? 'disabled' : '' }}">
                                <a class="page-link" href="{{ $affiliates->previousPageUrl() }}">Previous</a>
                            </li>

                            @foreach(range(1, $affiliates->lastPage()) as $page)
                                <li class="page-item {{ $page == $affiliates->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $affiliates->url($page) }}">{{ $page }}</a>
                                </li>
                            @endforeach

                            <li class="page-item {{ $affiliates->hasMorePages() ? '' : 'disabled' }}">
                                <a class="page-link" href="{{ $affiliates->nextPageUrl() }}">Next</a>
                            </li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>

      <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
  </div>
@endsection
