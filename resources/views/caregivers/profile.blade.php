@extends('admin.adminmaster')
@section('title')
Clients
@endsection
@section('content')
<div class="page-body">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6 main-header">
                <h2>View <span>Caregiver</span></h2>
                <h6 class="mb-0"> Caregiver Details</h6>
            </div>
        </div>
    </div>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header py-2 bg-primary text-white">
                        <h6 class="mt-1">Basic Info</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $caregiver->name }}</p>
                        <p><strong>Email:</strong> {{ $caregiver->email }}</p>
                        <p><strong>Phone:</strong> {{ $caregiver->phone }}</p>
                        <p><strong>External ID:</strong> {{ $caregiver->external_id }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header py-2 bg-success text-white">
                        <h6 class="mt-1">Profile Info</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Date of Birth:</strong> {{ $caregiver->get_profile->date_of_birth ?? 'N/A' }}</p>
                        <p><strong>Address:</strong> {{ $caregiver->get_profile->address ?? 'N/A' }}</p>
                        <p><strong>Experience (Years):</strong> {{ $caregiver->get_profile->experience_years ?? 'N/A' }}
                        </p>
                        <p><strong>Certification:</strong> {{ $caregiver->get_profile->certification ?? 'N/A' }}</p>
                        <p><strong>Preferred Schedule:</strong> {{ $caregiver->get_profile->schedule ?? 'N/A' }}</p>
                        <p><strong>Start Date:</strong> {{ $caregiver->get_profile->start_date ?? 'N/A' }}</p>
                        <p><strong>Care Type:</strong> {{ $caregiver->get_profile->care_type ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header py-2 bg-warning text-dark">
                        <h6 class="mt-1">Emergency Contact</h6>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $caregiver->get_profile->emergency_contact_name ?? 'N/A' }}</p>
                        <p><strong>Phone:</strong> {{ $caregiver->get_profile->emergency_phone ?? 'N/A' }}</p>
                        <p><strong>Relationship:</strong> {{ $caregiver->get_profile->emergency_relation ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-4">
                <div class="card h-100">
                    <div class="card-header py-2 bg-secondary text-white">
                        <h6 class="mt-1">Uploaded Documents</h6>
                    </div>
                    <div class="card-body">
                        @if ($caregiver->get_profile->background_check)
                        <p>
                            <strong>Background Check:</strong>
                            <a href="{{ asset(str_replace('public/', 'storage/', $caregiver->get_profile->background_check)) }}"
                                target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                        </p>
                        @endif

                        @if ($caregiver->get_profile->crp_certification)
                        <p>
                            <strong>CPR Certification:</strong>
                            <a href="{{ asset(str_replace('public/', 'storage/', $caregiver->get_profile->crp_certification)) }}"
                                target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                        </p>
                        @endif

                        @if ($caregiver->get_profile->tb_test)
                        <p>
                            <strong>TB Test:</strong>
                            <a href="{{ asset(str_replace('public/', 'storage/', $caregiver->get_profile->tb_test)) }}"
                                target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                        </p>
                        @endif

                        @if ($caregiver->get_profile->licence)
                        <p>
                            <strong>Driver's License:</strong>
                            <a href="{{ asset(str_replace('public/', 'storage/', $caregiver->get_profile->licence)) }}"
                                target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                        </p>
                        @endif

                        @if (!$caregiver->get_profile->background_check && !$caregiver->get_profile->crp_certification
                        && !$caregiver->get_profile->tb_test && !$caregiver->get_profile->licence)
                        <p class="text-muted">No documents uploaded.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-2 bg-info text-white">
                        <h6 class="mt-1">Availabilities</h6>
                    </div>
                    <div class="card-body">
                        @if (count($caregiver->get_availabilities) > 0)
                            <ul class="mb-0">
                                @foreach ($caregiver->get_availabilities as $availability)
                                    <li class="mt-1">{{ ucfirst($availability->day) }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p>No availabilities recorded.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-2 bg-success text-white">
                        <h6 class="mt-1">Specializations</h6>
                    </div>
                    <div class="card-body">
                        @if (count($caregiver->get_specialities) > 0)
                            <ul class="mb-0">
                                @foreach ($caregiver->get_specialities as $speciality)
                                    @if ($speciality->get_speciality)
                                        <li class="mt-1">{{ $speciality->get_speciality->name }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p>No specializations recorded.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-2 bg-danger text-white">
                        <h6 class="mt-1">Languages</h6>
                    </div>
                    <div class="card-body">
                        @if (count($caregiver->get_languages) > 0)
                            <ul class="mb-0">
                                @foreach ($caregiver->get_languages as $language)
                                    @if ($language->get_language)
                                        <li class="mt-1">{{ $language->get_language->name }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                            <p>No languages recorded.</p>
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
