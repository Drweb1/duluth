@extends('admin.adminmaster')
@section('title')
Clients
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .profile-header {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .avatar-circle {
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .card {
        transition: all 0.3s ease;
        border-radius: 10px;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .badge-purple {
        background-color: #6f42c1;
        color: white;
    }

    .document-card:hover {
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }
</style>
<div class="page-header">
    <div class="row">
        <div class="col-lg-6 main-header">
            <h2>View <span>Client</span></h2>
            <h6 class="mb-0">Client Details</h6>
        </div>
    </div>
</div>
<div class="container my-5">
    <!-- Profile Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="profile-header p-4 rounded-lg" style="background: linear-gradient(135deg, #4b6cb7 0%, #182848 100%);">
                <div class="d-flex align-items-center">
                    <div class="mr-4">
                        <div class="avatar-circle bg-white d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border-radius: 50%;">
                            <span class="display-4 text-primary">{{ strtoupper(substr($client->name, 0, 1)) }}</span>
                        </div>
                    </div>
                    <div class="text-white">
                        <h2 class="mb-1">{{ $client->name }}</h2>
                        <p class="mb-1"><i class="fas fa-envelope mr-2"></i> {{ $client->email }}</p>
                        <p class="mb-0"><i class="fas fa-phone mr-2"></i> {{ $client->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Row -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-4">
            <!-- Basic Info Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom-0 pt-3">
                    <h5 class="font-weight-bold text-primary"><i class="fas fa-id-card mr-2"></i> Basic Information</h5>
                </div>
                <div class="card-body pt-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-id-badge mr-2 text-muted"></i> External ID</span>
                            <span class="font-weight-bold">{{ $client->external_id }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-birthday-cake mr-2 text-muted"></i> Date of Birth</span>
                            <span class="font-weight-bold">{{ $client->get_profile->date_of_birth ?? 'N/A' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fas fa-map-marker-alt mr-2 text-muted"></i> Address</span>
                            <span class="font-weight-bold text-right">{{ $client->get_profile->address ?? 'N/A' }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Emergency Contact Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom-0 pt-3">
                    <h5 class="font-weight-bold text-danger"><i class="fas fa-exclamation-triangle mr-2"></i> Emergency Contact</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="alert alert-light" role="alert">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-user mr-3 text-danger"></i>
                            <div>
                                <h6 class="mb-0 font-weight-bold">{{ $client->get_profile->emergency_contact_name ?? 'N/A' }}</h6>
                                <small class="text-muted">{{ $client->get_profile->emergency_relation ?? 'N/A' }}</small>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex align-items-center mb-2">
                            <i class="fas fa-phone mr-3 text-danger"></i>
                            <div>
                                <h6 class="mb-0 font-weight-bold">{{ $client->get_profile->emergency_phone ?? 'N/A' }}</h6>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope mr-3 text-danger"></i>
                            <div>
                                <h6 class="mb-0 font-weight-bold">{{ $client->get_profile->emergency_email ?? 'N/A' }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-8">
            <!-- Health Summary Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white border-bottom-0 pt-3">
                    <h5 class="font-weight-bold text-info"><i class="fas fa-heartbeat mr-2"></i> Health Summary</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="p-3 bg-light rounded mb-3">
                        <h6 class="text-muted small mb-1">Primary Conditions</h6>
                        @if (count($client->get_conditions) > 0)
                        <div class="d-flex flex-wrap">
                            @foreach ($client->get_conditions as $condition)
                                @if ($condition->get_medical_condition)
                                <span class="badge badge-info p-2 m-1">{{ $condition->get_medical_condition->name }}</span>
                                @endif
                            @endforeach
                        </div>
                        @else
                        <p class="text-muted small">No conditions recorded</p>
                        @endif
                    </div>
                    <div class="p-3 bg-light rounded">
                        <h6 class="text-muted small mb-1">Special Requirements</h6>
                        @if (count($client->get_requirements) > 0)
                        <div class="d-flex flex-wrap">
                            @foreach ($client->get_requirements as $requirement)
                                @if ($requirement->get_requirement)
                                <span class="badge badge-danger p-2 m-1">{{ $requirement->get_requirement->name }}</span>
                                @endif
                            @endforeach
                        </div>
                        @else
                        <p class="text-muted small">No special requirements</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Insurance & Care Details Card -->
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-transparent border-0 py-3">
                    <h5 class="font-weight-bold text-success mb-0">
                        <i class="fas fa-shield-alt mr-2"></i>Insurance & Care Details
                    </h5>
                </div>
                <div class="card-body p-3">
                    <div class="row g-3">
                        <div class="col-6 col-md-3">
                            <div class="card bg-light h-100 border-0">
                                <div class="card-body p-3 text-center">
                                    <div class="text-success mb-2">
                                        <i class="fas fa-hospital fa-2x"></i>
                                    </div>
                                    <h6 class="text-muted small mb-1">Provider</h6>
                                    <h5 class="font-weight-bold mb-0 text-muted">
                                        {{ $client->get_profile->insurance_provider ?? 'N/A' }}
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="card bg-light h-100 border-0">
                                <div class="card-body p-3 text-center">
                                    <div class="text-success mb-2">
                                        <i class="fas fa-file-contract fa-2x"></i>
                                    </div>
                                    <h6 class="text-muted small mb-1">Policy #</h6>
                                    <h5 class="font-weight-bold mb-0 text-muted">
                                        {{ $client->get_profile->policy_number ?? 'N/A' }}
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="card bg-light h-100 border-0">
                                <div class="card-body p-3 text-center">
                                    <div class="text-success mb-2">
                                        <i class="fas fa-user-md fa-2x"></i>
                                    </div>
                                    <h6 class="text-muted small mb-1">Medicare #</h6>
                                    <h5 class="font-weight-bold mb-0 text-muted">
                                        {{ $client->get_profile->medicare_number ?? 'N/A' }}
                                    </h5>
                                </div>
                            </div>
                        </div>

                        <div class="col-6 col-md-3">
                            <div class="card bg-light h-100 border-0">
                                <div class="card-body p-3 text-center">
                                    <div class="text-success mb-2">
                                        <i class="fas fa-users fa-2x"></i>
                                    </div>
                                    <h6 class="text-muted small mb-1">Group #</h6>
                                    <h5 class="font-weight-bold mb-0 text-muted">
                                        {{ $client->get_profile->group_number ?? 'N/A' }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <div class="card bg-light border-0">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="text-success mr-3">
                                                <i class="fas fa-hands-helping fa-2x"></i>
                                            </div>
                                            <div>
                                                <h6 class="text-muted small mb-1">Care Type</h6>
                                                <h5 class="font-weight-bold mb-0 text-muted">
                                                    {{ $client->get_profile->care_type ?? 'N/A' }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="text-success mr-3">
                                                <i class="fas fa-calendar-week fa-2x"></i>
                                            </div>
                                            <div>
                                                <h6 class="text-muted small mb-1">Care Frequency</h6>
                                                <h5 class="font-weight-bold mb-0 text-muted">
                                                    {{ $client->get_profile->care_frequency ?? 'N/A' }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Insurance Documents Card -->
            <div class="card shadow-sm">
                <div class="card-header bg-white border-bottom-0 pt-3">
                    <h5 class="font-weight-bold text-secondary"><i class="fas fa-file-alt mr-2"></i> Insurance Documents</h5>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        @if ($client->get_profile->insurance_card)
                        <div class="col-md-6 mb-3">
                            <div class="document-card p-3 border rounded">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-file-pdf text-danger fa-2x mr-3"></i>
                                    <div>
                                        <h6 class="mb-0 font-weight-bold">Insurance Card</h6>
                                        <a href="{{ asset('storage/insurance_cards/' . basename($client->get_profile->insurance_card)) }}"
                                           target="_blank" class="btn btn-sm btn-link p-0">View Document</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-12">
                            <div class="alert alert-light text-center" role="alert">
                                <i class="fas fa-folder-open fa-2x mb-2 text-muted"></i>
                                <p class="mb-0">No insurance documents uploaded</p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
