@extends('admin.adminmaster')
@section('title')
Clients
@endsection
@section('content')

<div class="page-body my-5">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>View <span>Client</span></h2>
                <h6 class="mb-0"> Client Details</h6>
            </div>
        </div>
    </div>
    <div class="container my-5">

        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header py-2 bg-primary text-white">
                        <h6 class="mt-1">Basic Info</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $client->name }}</p>
                        <p><strong>Email:</strong> {{ $client->email }}</p>
                        <p><strong>Phone:</strong> {{ $client->phone }}</p>
                        <p><strong>External ID:</strong> {{ $client->external_id }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header py-2 bg-success text-white">
                        <h6 class="mt-1">Profile Info</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Care Type:</strong> {{ $client->get_profile->care_type }}</p>
                        <p><strong>Care Frequency:</strong> {{ $client->get_profile->care_frequency }}</p>
                        <p><strong>Start Date:</strong> {{ $client->get_profile->start_date }}</p>
                        <p><strong>DOB:</strong> {{ $client->get_profile->date_of_birth }}</p>
                        <p><strong>Address:</strong> {{ $client->get_profile->address }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header py-2 bg-info text-white">
                        <h6 class="mt-1">Insurance Info</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Provider:</strong> {{ $client->get_profile->insurance_provider }}</p>
                        <p><strong>Policy #:</strong> {{ $client->get_profile->policy_number }}</p>
                        <p><strong>Medicare #:</strong> {{ $client->get_profile->medicare_number }}</p>
                        <p><strong>Group #:</strong> {{ $client->get_profile->group_number }}</p>

                        @if ($client->get_profile->insurance_card)
                        <div class="mt-2">
                            <a href="{{ asset('storage/insurance_cards/' . basename($client->get_profile->insurance_card)) }}"
                                class="btn btn-outline-primary btn-sm" target="_blank">
                                View Insurance Card
                            </a>
                        </div>

                        @else
                        <p><strong>Insurance Card:</strong> Not Uploaded</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-2 bg-primary text-white">
                        <h6 class="mt-1">
                            Emergency Contact
                        </h6>

                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $client->get_profile->emergency_contact_name }}</p>
                        <p><strong>Phone:</strong> {{ $client->get_profile->emergency_phone }}</p>
                        <p><strong>Relationship:</strong> {{ $client->get_profile->emergency_relation }}</p>
                        <p><strong>Email:</strong> {{ $client->get_profile->emergency_email }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-2 bg-warning text-white">
                        <h6 class="mt-1">Medical Conditions
                        </h6>
                    </div>
                    <div class="card-body">
                        @if (count($client->get_conditions) > 0)
                        <ul class="mb-0">
                            @foreach ($client->get_conditions as $condition)
                            @if ($condition->get_medical_condition)
                            <li class="mt-1">{{ $condition->get_medical_condition->name }}</li>
                            @endif
                            @endforeach
                        </ul>
                        @else
                        <p>No medical conditions recorded.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-2 bg-danger text-white">
                        <h6 class="mt-1"> Special Requirements</h6>
                    </div>
                    <div class="card-body">
                        @if (count($client->get_requirements) > 0)
                        <ul class="mb-0">
                            @foreach ($client->get_requirements as $requirement)
                            @if ($requirement->get_requirement)
                            <li class="mt-1">{{ $requirement->get_requirement->name }}</li>
                            @endif
                            @endforeach
                        </ul>
                        @else
                        <p>No special requirements recorded.</p>
                        @endif
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
