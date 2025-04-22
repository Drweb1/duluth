@extends('admin.adminmaster')
@section('title')
Items
@endsection
<style>
    .text-end {
  text-align: right !important;
}
</style>
@section('content')
<div class="page-body-wrapper">
    <!-- Right sidebar Ends-->
    <div class="page-body">
      <div class="container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-lg-6 main-header">
              <h2>Items<span>List</span></h2>
              <h6 class="mb-0">admin panel</h6>
            </div>
            <div class="col-lg-6 breadcrumb-right">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="pe-7s-home"></i></a></li>
                <li class="breadcrumb-item">Items</li>
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
                        <div class="row">
                            <div class="col-md-4">
                                <h5>Items List</h5>
                            </div>
                        <div class="col-md-8 text-end">
                                <form class="form-inline search-form" action="{{ route('view_items') }}" method="get">
                                    <div class="form-group me-2">
                                        <div class="Typeahead Typeahead--twitterUsers">
                                            <div class="u-posRelative">
                                                <input class="Typeahead-input form-control-plaintext" id="demo-input" type="text" name="q" placeholder="Search by Owner or Type..." value="{{ request('q') }}">
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
                    <div class="table-responsive">
                        <table class="table table-xl">
                            <thead>
                                <tr>
                                    <th style="width: 12.5%;">#</th>
                                    <th style="width: 12.5%;">Owner</th>
                                    <th style="width: 12.5%;">Regional Value</th>
                                    <th style="width: 12.5%;">Open Date</th>
                                    <th style="width: 12.5%;">Price</th>
                                    <th style="width: 12.5%;">Payment Term</th>
                                    <th style="width: 12.5%;">Type</th>
                                    <th style="width: 12.5%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $index => $item)
                                    <tr>
                                        <th scope="row">{{ $items->firstItem() + $index }}</th>
                                        <td>{{ $item->owner }}</td>
                                        <td>{{ $item->total_value }}</td>
                                        <td>{{ $item->open_date }}</td>
                                        <td>{{ $item->price}}</td>
                                        <td>{{ $item->payment_term}}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>
                                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="card-footer">
                            <p class="text-muted">Showing {{ $current }} of {{ $total}}</p>
                            {{ $items->links() }}
                        </div> --}}
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-primary mb-3 mt-2">
                                <li class="page-item {{ $items->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $items->previousPageUrl() }}" tabindex="-1">Previous</a>
                                </li>
                                @foreach($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $items->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                @endforeach
                                <li class="page-item {{ $items->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $items->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- footer start-->
  </div>
@endsection
