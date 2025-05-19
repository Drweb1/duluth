@extends('admin.adminmaster')
@section('title')
Clients
@endsection
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .card {
        transition: all 0.3s ease;
        border-radius: 10px;
    }
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .text-muted {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
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
    <div class="container my-5">
        <div class="row mb-4">
            <div class="col-12">
                <div class="profile-header p-4 rounded-lg"
                    style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);">
                    <div class="d-flex align-items-center">
                        <div class="mr-4">
                            <div class="avatar-circle bg-white d-flex align-items-center justify-content-center"
                                style="width: 80px; height: 80px; border-radius: 50%;">
                                <span class="display-4 text-primary">{{ strtoupper(substr($caregiver->name, 0, 1))
                                    }}</span>
                            </div>
                        </div>
                        <div class="text-white">
                            <h2 class="mb-1">{{ $caregiver->name }}</h2>
                            <p class="mb-1"><i class="fas fa-envelope mr-2"></i> {{ $caregiver->email }}</p>
                            <p class="mb-0"><i class="fas fa-phone mr-2"></i> {{ $caregiver->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-3">
                        <h5 class="font-weight-bold text-primary"><i class="fas fa-id-card mr-2"></i> Basic Information
                        </h5>
                    </div>
                    <div class="card-body pt-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span><i class="fas fa-id-badge mr-2 text-muted"></i> External ID</span>
                                <span class="font-weight-bold">{{ $caregiver->external_id }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span><i class="fas fa-birthday-cake mr-2 text-muted"></i> Date of Birth</span>
                                <span class="font-weight-bold">{{ $caregiver->get_profile->date_of_birth ?? 'N/A'
                                    }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                <span><i class="fas fa-map-marker-alt mr-2 text-muted"></i> Address</span>
                                <span class="font-weight-bold text-right">{{ $caregiver->get_profile->address ?? 'N/A'
                                    }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-3">
                        <h5 class="font-weight-bold text-danger"><i class="fas fa-exclamation-triangle mr-2"></i>
                            Emergency Contact</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="alert alert-light" role="alert">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-user mr-3 text-danger"></i>
                                <div>
                                    <h6 class="mb-0 font-weight-bold">{{ $caregiver->get_profile->emergency_contact_name
                                        ?? 'N/A' }}</h6>
                                    <small class="text-muted">{{ $caregiver->get_profile->emergency_relation ?? 'N/A'
                                        }}</small>
                                </div>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-phone mr-3 text-danger"></i>
                                <div>
                                    <h6 class="mb-0 font-weight-bold">{{ $caregiver->get_profile->emergency_phone ??
                                        'N/A' }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Skills Card -->
                <div class="card shadow-sm">
                    <div class="card-header bg-white border-bottom-0 pt-3">
                        <h5 class="font-weight-bold text-info"><i class="fas fa-star mr-2"></i> Skills & Specializations
                        </h5>
                    </div>
                    <div class="card-body pt-0">
                        @if (count($caregiver->get_specialities) > 0)
                        <div class="d-flex flex-wrap">
                            @foreach ($caregiver->get_specialities as $speciality)
                            @if ($speciality->get_speciality)
                            <span class="badge badge-info p-2 m-1">{{ $speciality->get_speciality->name }}</span>
                            @endif
                            @endforeach
                        </div>
                        @else
                        <p class="text-muted">No specializations recorded.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="container">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-header bg-transparent border-0 py-3">
                            <h5 class="font-weight-bold text-success mb-0">
                                <i class="fas fa-briefcase mr-2"></i>Professional Overview
                            </h5>
                        </div>
                        <div class="card-body p-3">
                            <div class="row g-3">
                                <div class="col-6 col-md-3">
                                    <div class="card bg-light h-100 border-0">
                                        <div class="card-body p-3 text-center">
                                            <div class="text-success mb-2">
                                                <i class="fas fa-clock fa-2x"></i>
                                            </div>
                                            <h6 class="text-muted small mb-1">Experience</h6>
                                            <h5 class="font-weight-bold mb-0 text-muted">
                                                {{ $caregiver->get_profile->experience_years ?? '0' }}<small
                                                    class="text-muted">yrs</small>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card bg-light h-100 border-0">
                                        <div class="card-body p-3 text-center">
                                            <div class="text-success mb-2">
                                                <i class="fas fa-certificate fa-2x"></i>
                                            </div>
                                            <h6 class="text-muted small mb-1">Certification</h6>
                                            <h5 class="font-weight-bold mb-0 text-muted">
                                                {{ $caregiver->get_profile->certification ?? ' '}}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card bg-light h-100 border-0">
                                        <div class="card-body p-3 text-center">
                                            <div class="text-success mb-2">
                                                <i class="fas fa-calendar-alt fa-2x"></i>
                                            </div>
                                            <h6 class="text-muted small mb-1">Schedule</h6>
                                            <h5 class="font-weight-bold mb-0 text-muted">
                                                {{ $caregiver->get_profile->schedule ?? 'Flexible' }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                    <div class="card bg-light h-100 border-0">
                                        <div class="card-body p-3 text-center">
                                            <div class="text-success mb-2">
                                                <i class="fas fa-calendar-check fa-2x"></i>
                                            </div>
                                            <h6 class="text-muted small mb-1">Start Date</h6>
                                            <h5 class="font-weight-bold mb-0  text-muted">
                                                {{ $caregiver->get_profile->start_date ? date('M Y',
                                                strtotime($caregiver->get_profile->start_date)) : 'ASAP' }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <div class="card bg-light border-0">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center">
                                            <div class="text-success mr-3">
                                                <i class="fas fa-hands-helping fa-2x"></i>
                                            </div>
                                            <div>
                                                <h6 class="text-muted small mb-1">Specializes In</h6>
                                                <h5 class="font-weight-bold mb-0 text-muted">
                                                    {{ $caregiver->get_profile->care_type ?? 'General Care' }}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-white border-bottom-0 pt-3">
                                <h5 class="font-weight-bold text-warning"><i class="fas fa-calendar-alt mr-2"></i>
                                    Availability</h5>
                            </div>
                            <div class="card-body pt-0">
                                @if (count($caregiver->get_availabilities) > 0)
                                <div class="d-flex flex-wrap">
                                    @foreach ($caregiver->get_availabilities as $availability)
                                    <span class="badge badge-warning p-2 m-1">{{ ucfirst($availability->day) }}</span>
                                    @endforeach
                                </div>
                                @else
                                <p class="text-muted">No availabilities recorded.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-header bg-white border-bottom-0 pt-3">
                                <h5 class="font-weight-bold text-purple"><i class="fas fa-language mr-2"></i> Languages
                                </h5>
                            </div>
                            <div class="card-body pt-0">
                                @if (count($caregiver->get_languages) > 0)
                                <div class="d-flex flex-wrap">
                                    @foreach ($caregiver->get_languages as $language)
                                    @if ($language->get_language)
                                    <span class="badge badge-purple p-2 m-1">{{ $language->get_language->name }}</span>
                                    @endif
                                    @endforeach
                                </div>
                                @else
                                <p class="text-muted">No languages recorded.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-sm mt-4">
                    <div class="card-header bg-white border-bottom-0 pt-3">
                        <h5 class="font-weight-bold text-secondary"><i class="fas fa-file-alt mr-2"></i> Documents</h5>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            @if ($caregiver->get_profile->background_check)
                            <div class="col-md-6 mb-3">
                                <div class="document-card p-3 border rounded">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-file-pdf text-danger fa-2x mr-3"></i>
                                        <div>
                                            <h6 class="mb-0 font-weight-bold">Background Check</h6>
                                            <a href="{{ asset(str_replace('public/', 'storage/', $caregiver->get_profile->background_check)) }}"
                                                target="_blank" class="btn btn-sm btn-link p-0">View Document</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($caregiver->get_profile->crp_certification)
                            <div class="col-md-6 mb-3">
                                <div class="document-card p-3 border rounded">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-file-pdf text-danger fa-2x mr-3"></i>
                                        <div>
                                            <h6 class="mb-0 font-weight-bold">CPR Certification</h6>
                                            <a href="{{ asset(str_replace('public/', 'storage/', $caregiver->get_profile->crp_certification)) }}"
                                                target="_blank" class="btn btn-sm btn-link p-0">View Document</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($caregiver->get_profile->tb_test)
                            <div class="col-md-6 mb-3">
                                <div class="document-card p-3 border rounded">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-file-pdf text-danger fa-2x mr-3"></i>
                                        <div>
                                            <h6 class="mb-0 font-weight-bold">TB Test</h6>
                                            <a href="{{ asset(str_replace('public/', 'storage/', $caregiver->get_profile->tb_test)) }}"
                                                target="_blank" class="btn btn-sm btn-link p-0">View Document</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if ($caregiver->get_profile->licence)
                            <div class="col-md-6 mb-3">
                                <div class="document-card p-3 border rounded">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-file-pdf text-danger fa-2x mr-3"></i>
                                        <div>
                                            <h6 class="mb-0 font-weight-bold">Driver's License</h6>
                                            <a href="{{ asset(str_replace('public/', 'storage/', $caregiver->get_profile->licence)) }}"
                                                target="_blank" class="btn btn-sm btn-link p-0">View Document</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if (!$caregiver->get_profile->background_check &&
                            !$caregiver->get_profile->crp_certification
                            && !$caregiver->get_profile->tb_test && !$caregiver->get_profile->licence)
                            <div class="col-12">
                                <div class="alert alert-light text-center" role="alert">
                                    <i class="fas fa-folder-open fa-2x mb-2 text-muted"></i>
                                    <p class="mb-0">No documents uploaded</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        @endsection
