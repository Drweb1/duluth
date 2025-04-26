@extends('admin.adminmaster')

@section('title')
Caregivers
@endsection

@section('content')
<div class="page-body-wrapper">

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">

                    <div class="col-lg-6 main-header">
                        <h2>View <span>Caregivers</span></h2>
                        <h6 class="mb-0">Manage Your Caregivers</h6>
                    </div>
                    <div class="col-lg-6 text-right">
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary">
                            Add Caregiver
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
                                    <th>Caregiver ID</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    {{-- <th>Specialty</th>
                                    <th>Location</th> --}}
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($caregivers as $caregiver)
                                <tr>
                                    <td>{{ $caregiver->name }}</td>
                                    <td>{{ $caregiver->external_id }}</td>
                                    <td>{{ $caregiver->email }}</td>
                                    <td>{{ $caregiver->phone }}</td>
                                    <td>{{ $caregiver->get_profile->address ?? '' }}</td>
                                    {{-- <td>
                                         <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-star"></i> View Specialties
                                            </button>
                                            <ul class="dropdown-menu">
                                                @foreach($caregiver->get_specialities as $spec)
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            {{ $spec->get_speciality->name ?? 'N/A' }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </td> --}}
                                    {{-- <td>
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-calendar"></i> View Availabilities
                                            </button>
                                            <ul class="dropdown-menu">
                                                @foreach($caregiver->get_availabilities as $avail)
                                                    <li>
                                                        <a class="dropdown-item" href="#">
                                                            {{ $avail->day ?? '' }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </td> --}}
                                    <td>
                                        <a href="{{ route('caregiver.edit', $caregiver->external_id) }}"
                                            class="btn btn-sm btn-primary me-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('caregiver.delete', $caregiver->id) }}"
                                            class="btn btn-sm btn-danger me-1" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this caregiver?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="{{ route('caregiver.profile', $caregiver->external_id) }}"
                                            class="btn btn-sm btn-primary me-1" title="Edit">
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

</div>
@endsection
