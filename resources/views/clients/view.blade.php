@extends('admin.adminmaster')
@section('title')
Clients
@endsection
@section('content')
<div class="page-body-wrapper">

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">

                    <div class="col-lg-6 main-header">
                        <h2>View<span>Clients</span></h2>
                        <h6 class="mb-0">Manage Your Clients</h6>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary">
                            Add Client
                        </a>
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

                <div class="col-sm-12">
                    <div class="container-fluid">
                    <div class="card" style="padding: 1rem;">
                        <table class="display basic" id="basic">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Medicaid ID</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Care Type</th>
                                    <th>Location</th>
                                    {{-- <th>Status</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clients as $client)
                                <tr>
                                    <td>{{ $client->name }}</td>
                                    <td>{{ $client->external_id }}</td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone }}</td>
                                    <td>{{ $client->get_profile->care_type ?? 'N/A' }}</td>
                                    <td>{{ $client->get_profile->address ?? 'N/A'}}</td>
                                    {{-- <td>
                                        <span
                                            class="badge {{ $client->status == 'Active' ? 'bg-success' : 'bg-secondary' }} text-light">
                                            {{ $client->status }}
                                        </span>
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('clients.delete', $client->id) }}"
                                            class="btn btn-sm btn-danger me-1" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this client?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="{{ route('client.edit', $client->external_id) }}"
                                            class="btn btn-sm btn-primary me-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('client.profile', $client->external_id) }}"
                                            class="btn btn-sm btn-info text-light" title="Profile">
                                            <i class="fa fa-user"></i>
                                        </a>
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
        <!-- Container-fluid Ends-->

    <!-- footer start-->
</div>

<script>
    $(document).ready(function() {


});
</script>

@endsection
