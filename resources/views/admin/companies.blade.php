@extends('admin.adminmaster')
@section('title')
Companies
@endsection
@section('content')
<div class="page-body-wrapper">

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">

                    <div class="col-lg-6 main-header">
                        <h2>View<span>Companies</span></h2>
                        <h6 class="mb-0">Manage Your Companies</h6>
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
        <div class="row">

            <div class="col-xl-12 xl-100 box-col-12">
                <div class="card">
                    <div class="card-header no-border">
                        <h5>Top Companies</h5>
                        <ul class="creative-dots">
                            <li class="bg-primary big-dot"></li>
                            <li class="bg-secondary semi-big-dot"></li>
                            <li class="bg-warning medium-dot"></li>
                            <li class="bg-info semi-medium-dot"></li>
                            <li class="bg-secondary semi-small-dot"></li>
                            <li class="bg-primary small-dot"></li>
                        </ul>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="icofont icofont-gear fa fa-spin font-primary"></i></li>
                                <li><i class="view-html fa fa-code font-primary"></i></li>
                                <li><i class="icofont icofont-maximize full-card font-primary"></i></li>
                                <li><i class="icofont icofont-minus minimize-card font-primary"></i></li>
                                <li><i class="icofont icofont-refresh reload-card font-primary"></i></li>
                                <li><i class="icofont icofont-error close-card font-primary"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="activity-table table-responsive recent-table selling-product custom-scrollbar">
                            <table class="table table-bordernone">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Owner</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($companies as $company)
                                    {{-- @dd($company); --}}
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="company-icon bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 30px; height: 30px;">

                                                    @php
                                                        $words = explode(' ', $company->name);
                                                        $initials = '';
                                                        foreach($words as $word) {
                                                            $initials .= strtoupper(substr($word, 0, 1));
                                                        }
                                                        $initials = substr($initials, 0, 2);
                                                    @endphp
                                                    {{ $initials }}
                                                </div>
                                                <h5 class="default-text mb-0 f-w-700 f-18">{{ $company->name }}</h5>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill recent-badge f-12">{{ $company->owner }}</span>
                                        </td>
                                        <td class="f-w-700">
                                            {{ $company->country }},
                                            {{ $company->state }},
                                            {{ $company->city }}<br>
                                            {{ $company->street }}
                                        </td>
                                        <td>
                                            <span class="badge rounded-pill status-badge {{ $company->status === 'Active' ? 'bg-success' : 'bg-secondary' }}">
                                                {{ $company->status }}
                                            </span>
                                        </td>
                                        <td>
                                            {{-- <span class="badge rounded-pill recent-badge">
                                                <i data-feather="more-horizontal"></i>
                                            </span> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {


});
</script>

@endsection
