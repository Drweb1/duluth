@extends('admin.adminmaster')
@section('title')
Customers
@endsection
@section('content')
<div class="page-body-wrapper">
    <!-- Right sidebar Ends-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 main-header">
                        <h2>Customers<span>List</span></h2>
                        <h6 class="mb-0">admin panel</h6>
                    </div>
                    <div class="col-lg-6 breadcrumb-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                            <li class="breadcrumb-item">Customers</li>>
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
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Customers List</h5>
                                </div>
                                <div class="col-md-8 text-end">
                                    <form class="form-inline search-form" action="{{ route('customers') }}" method="get">
                                        <div class="form-group me-2">
                                            <div class="Typeahead Typeahead--twitterUsers">
                                                <div class="u-posRelative">
                                                    <input class="Typeahead-input form-control-plaintext" id="demo-input" type="text" name="q" placeholder="Search by Name or Email..." value="{{ request('q') }}">
                                                    <div class="spinner-border Typeahead-spinner" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                    <span class="d-sm-none mobile-search"><i data-feather="search"></i></span>
                                                </div>
                                                <div class="Typeahead-menu"></div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </form>
                                </div>

                            </div>

                        </div>

                        <div class="table-responsive">
                            <table class="table table-xl">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Actions</th> <!-- Added a column for action buttons -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Loop through each customer -->
                                    @foreach($customers as $key => $customer)
                                    <tr>
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone_number }}</td>
                                        <td>
                                            <a href="{{route('admin.customer_details',$customer->id)}}" class="btn btn-info btn-sm">View</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination pagination-primary mb-3 ms-3 mt-3">
                                    <!-- Previous Button -->
                                    <li class="page-item {{ $customers->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $customers->previousPageUrl() }}"
                                            tabindex="-1">Previous</a>
                                    </li>

                                    <!-- Page Numbers -->
                                    @foreach($customers->getUrlRange(1, $customers->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $customers->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                    @endforeach

                                    <!-- Next Button -->
                                    <li class="page-item {{ $customers->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $customers->nextPageUrl() }}">Next</a>
                                    </li>
                                </ul>
                            </nav>
                            {{-- <div class="d-flex justify-content-center">
                                {{ $customers->links() }}
                            </div> --}}
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
</div>
@endsection
