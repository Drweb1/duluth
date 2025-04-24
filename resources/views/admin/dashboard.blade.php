@extends('admin.adminmaster')
@section('title')
Dashboard
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<style>
    .step-line {
        height: 3px;
        background-color: #ced4da;
        z-index: 0;
        margin-left: -80px;
        margin-right: -80px;
        margin-bottom: 5px;
        margin-top: -14px;
    }

    .custom-file-upload {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
    }
.custom-file-hidden {
    position: absolute;
    left: -9999px;
    opacity: 0;
    height: 1px;
    width: 1px;
    pointer-events: none;
}
    .invalid-feedback {
        color: red;
        font-size: 0.875em;
        margin-top: 0.25rem;
    }
    .document-checklist {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 1rem;
}

.doc-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #f9f9f9;
    padding: 12px 16px;
    border-radius: 8px;
    border: 1px solid #ddd;
}

.doc-info {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
}

.doc-upload {
    display: flex;
    align-items: center;
}

.upload-btn {
    padding: 6px 12px;
    background-color: #ffffff;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    transition: background-color 0.2s ease-in-out;
}

.upload-btn:hover {
    background-color: #f1f1f1;
}

.hidden-input {
    display: none;
}

    </style>

<div class="page-body">
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

    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6 main-header">
                    <h2>Welcome Back, {{ Auth::user()->name }}</h2>
                    <h6>{{ Auth::user()->type }}</h6>


                </div>
                <div class="col-lg-6 text-right">
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addClientModal"><i
                            class="fas fa-plus"></i>
                        Client</button>
                        <button class="btn btn-success" data-toggle="modal" data-target="#addcare_giver_Modal"><i
                            class="fas fa-plus"></i>
                        Caregiver</button>
                </div>

            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 xl-100">
                <div class="row">
                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-primary o-hidden">
                            <div class="card-body tag-card">
                                <div class="default-chart">
                                    <div class="apex-widgets">
                                        <!-- SVG for Curved Line -->
                                        <svg width="100%" height="100" viewBox="0 0 100 100"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#FFFFFF"
                                            stroke-width="2">
                                            <!-- Calendar outline -->
                                            <rect x="10" y="20" width="80" height="70" rx="5" ry="5" fill="none" />

                                            <!-- Calendar header bar -->
                                            <line x1="10" y1="35" x2="90" y2="35" />

                                            <!-- Binding rings -->
                                            <line x1="25" y1="10" x2="25" y2="25" />
                                            <line x1="75" y1="10" x2="75" y2="25" />

                                            <!-- Calendar grid dots -->
                                            <circle cx="30" cy="45" r="2" />
                                            <circle cx="50" cy="45" r="2" />
                                            <circle cx="70" cy="45" r="2" />
                                            <circle cx="30" cy="60" r="2" />
                                            <circle cx="50" cy="60" r="2" />
                                            <circle cx="70" cy="60" r="2" />
                                            <circle cx="30" cy="75" r="2" />
                                            <circle cx="50" cy="75" r="2" />
                                            <circle cx="70" cy="75" r="2" />
                                        </svg>

                                    </div>
                                    <div class="widgets-bottom">
                                        <h5 class="f-w-700 mb-0">Appointments<span class="pull-right">111</span></h5>
                                    </div>
                                </div>
                                <span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span
                                            class="dots dots9 dot-small"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-warning o-hidden">
                            <div class="card-body tag-card">
                                <div class="default-chart">
                                    <div class="apex-widgets">
                                        <svg width="100%" height="100" viewBox="0 0 100 100"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#FFFFFF"
                                            stroke-width="2">
                                            <!-- Main document -->
                                            <rect x="20" y="20" width="50" height="60" rx="5" ry="5" />

                                            <!-- Folded corner -->
                                            <polyline points="70,20 70,40 50,40" />

                                            <!-- Lines inside the document -->
                                            <line x1="30" y1="50" x2="60" y2="50" />
                                            <line x1="30" y1="60" x2="60" y2="60" />
                                            <line x1="30" y1="70" x2="55" y2="70" />

                                            <!-- Second (stacked) document behind -->
                                            <rect x="30" y="10" width="50" height="60" rx="5" ry="5"
                                                stroke-opacity="0.4" />
                                        </svg>

                                    </div>
                                    <div class="widgets-bottom">
                                        <h5 class="f-w-700 mb-0">Documents<span class="pull-right"> 34534</span></h5>
                                    </div>
                                </div><span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span
                                            class="dots dots9 dot-small"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-secondary o-hidden">
                            <div class="card-body tag-card">
                                <div class="default-chart">
                                    <div class="apex-widgets">
                                        <svg width="100%" height="100" viewBox="0 0 100 100"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#FFFFFF"
                                            stroke-width="2">
                                            <!-- Head -->
                                            <circle cx="50" cy="30" r="12" />

                                            <!-- Body -->
                                            <path d="M35,65 Q50,50 65,65" />
                                            <line x1="50" y1="42" x2="50" y2="65" />

                                            <!-- Shoulders -->
                                            <path d="M25,80 Q50,70 75,80" />

                                            <!-- Left arm -->
                                            <line x1="50" y1="50" x2="35" y2="65" />
                                            <!-- Right arm -->
                                            <line x1="50" y1="50" x2="65" y2="65" />
                                        </svg>

                                    </div>
                                    <div class="widgets-bottom">
                                        <h5 class="f-w-700 mb-0">Staff Members<span class="pull-right">4232</span></h5>
                                    </div>
                                </div><span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span
                                            class="dots dots9 dot-small"></span></span></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 xl-50 col-md-6 box-col-6">
                        <div class="card gradient-info o-hidden">
                            <div class="card-body tag-card">
                                <div class="default-chart">
                                    <div class="apex-widgets">
                                        <svg width="100%" height="100" viewBox="0 0 100 100"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" stroke="#FFFFFF"
                                            stroke-width="2">

                                            <!-- Center person -->
                                            <circle cx="50" cy="30" r="10" />
                                            <path d="M40,55 Q50,45 60,55" />

                                            <!-- Left person -->
                                            <circle cx="30" cy="35" r="7" />
                                            <path d="M23,55 Q30,47 37,55" />

                                            <!-- Right person -->
                                            <circle cx="70" cy="35" r="7" />
                                            <path d="M63,55 Q70,47 77,55" />

                                            <!-- Group base line -->
                                            <path d="M20,70 Q50,60 80,70" />

                                            <!-- Active status dot (bottom right) -->
                                            <circle cx="85" cy="20" r="5" fill="limegreen" stroke="none" />
                                        </svg>

                                    </div>
                                    <div class="widgets-bottom">
                                        <h5 class="f-w-700 mb-0">Active Clients<span class="pull-right">35345</span>
                                        </h5>
                                    </div>
                                </div><span class="tag-hover-effect"><span class="dots-group"><span
                                            class="dots dots1"></span><span class="dots dots2 dot-small"></span><span
                                            class="dots dots3 dot-small"></span><span
                                            class="dots dots4 dot-medium"></span><span
                                            class="dots dots5 dot-small"></span><span
                                            class="dots dots6 dot-small"></span><span
                                            class="dots dots7 dot-small-semi"></span><span
                                            class="dots dots8 dot-small-semi"></span><span
                                            class="dots dots9 dot-small"></span></span></span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xl-12 xl-100 box-col-12">
                <div class="card">
                    <div class="card-header no-border">
                        <h5>Compliance Monitoring</h5>
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
                        <div class="row">
                            <div class="col-sm-6 col-xl-4 col-lg-4 box-col-4">
                                <div class="card gradient-info o-hidden">
                                    <div class="b-r-4 card-body">
                                        <div class="d-flex static-top-widget">
                                            <div class="align-self-center text-center">
                                                <div class="text-white i" data-feather="check-circle"></div>
                                            </div>
                                            <div class="flex-grow-1"><span class="m-0 text-white">HIPAA Compliance
                                                    <p>All systems meet requirements</p>
                                                </span>
                                                <h4 class="mb-0 counter text-white">45631</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4 col-lg-4 box-col-4">
                                <div class="card gradient-success o-hidden">
                                    <div class="b-r-4 card-body">
                                        <div class="d-flex static-top-widget ">
                                            <div class="align-self-center text-center">
                                                <div class="text-white i me-2" data-feather="alert-octagon"></div>
                                            </div>
                                            <div class="flex-grow-1"><span class="m-0 text-white">Document Verification
                                                    <p>3 documents need review</p>
                                                </span>
                                                <h4 class="mb-0 counter text-white">45631</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-4 col-lg-4 box-col-4">
                                <div class="card gradient-primary o-hidden">
                                    <div class="b-r-4 card-body">
                                        <div class="d-flex static-top-widget">
                                            <div class="align-self-center text-center">
                                                <div class="text-white i" data-feather="file"></div>
                                            </div>
                                            <div class="flex-grow-1"><span class="m-0 text-white">Staff Certifications
                                                    <p>All certifications up to date</p>
                                                </span>

                                                <h4 class="mb-0 counter text-white">45631</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
    <div class="modal fade" id="addClientModal" tabindex="-1" role="dialog" aria-labelledby="addClientModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <form action="{{ route('add-client') }}" method="POST" id="client_form" novalidate>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Client</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <div class="container">
                            <div class="d-flex justify-content-between align-items-center mb-4 px-3">
                                <div class="text-center flex-fill">
                                    <div class="rounded-circle bg-primary text-white mx-auto mb-1"
                                        style="width:30px;height:30px;line-height:30px;">1</div>
                                    <small>Personal Info</small>
                                </div>
                                <div class="border-top flex-fill step-line"></div>
                                <div class="text-center flex-fill">
                                    <div class="rounded-circle bg-secondary text-white mx-auto mb-1" id="step2-indicator"
                                        style="width:30px;height:30px;line-height:30px;">2</div>
                                    <small>Care Details</small>
                                </div>
                                <div class="border-top flex-fill step-line" style="border-color: #706d6d;"></div>
                                <div class="text-center flex-fill">
                                    <div class="rounded-circle bg-secondary text-white mx-auto mb-1" id="step3-indicator"
                                        style="width:30px;height:30px;line-height:30px;">3</div>
                                    <small>Insurance</small>
                                </div>
                            </div>

                            <div class="step step-1">
                                <h4>Personal Information</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Name<x-required_field/></label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email<x-required_field/></label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Phone<x-required_field/></label>
                                        <input type="text" name="phone" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Date of Birth<x-required_field/></label>
                                        <input type="date" name="dob" class="form-control" required>
                                    </div>
                                    <div class="form-group col-12">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>

                                <h4 class="mt-4">Emergency Contact</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Contact Name<x-required_field/></label>
                                        <input type="text" name="emergency_contact_name" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Phone<x-required_field/></label>
                                        <input type="text" name="emergency_phone" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Relationship<x-required_field/></label>
                                        <input type="text" name="emergency_relationship" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" name="emergency_email" class="form-control">
                                    </div>
                                </div>

                                <button type="button" class="btn btn-primary float-right next-btn">Next<i
                                        class="fas fa-arrow-right"></i>
                                </button>
                            </div>

                            <div class="step step-2 d-none">
                                <h4>Care Requirements</h4>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Care Type<x-required_field/></label>
                                        <select name="care_type" class="form-control" required>
                                            <option value="">-- Select Care Type --</option>
                                            <option value="Daily Care">Daily Care</option>
                                            <option value="Weekly">Weekly</option>
                                            <option value="Respite">Respite</option>
                                            <option value="Specialized">Specialized</option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Frequency<x-required_field/></label>
                                        <input type="text" name="frequency" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Start Date<x-required_field/></label>
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                </div>

                                <h4 class="mt-4">Medical Requirements</h4>
                                <div class="row">
                                    @foreach ($requires as $requirement)
                                    <div class="col-md-6 mb-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="medical_requirements[]"
                                                value="{{ $requirement->id }}" id="require_{{ $requirement->id }}">
                                            <label class="form-check-label" for="require_{{ $requirement->id }}">
                                                {{ $requirement->name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <h4 class="mt-4">Medical Conditions</h4>
                                <div class="row">
                                    @foreach ($medics as $medic)
                                    <div class="col-md-6 mb-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="medical_conditions[]"
                                                value="{{ $medic->id }}" id="condition_{{ $medic->id }}">
                                            <label class="form-check-label" for="condition_{{ $medic->id }}">
                                                {{ $medic->name }}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="mt-4">
                                    <button type="button" class="btn btn-secondary prev-btn">
                                        <i class="fas fa-arrow-left"></i> Previous
                                    </button>
                                    <button type="button" class="btn btn-primary float-right next-btn">
                                        Next <i class="fas fa-arrow-right"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="step step-3 d-none">
                                <h3>Insurance Information</h3>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Insurance Provider<x-required_field/></label>
                                        <input type="text" name="insurance_provider" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Policy Number<x-required_field/></label>
                                        <input type="text" name="policy_number" class="form-control" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Medicare Number</label>
                                        <input type="text" name="medicare_number" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Group Number</label>
                                        <input type="text" name="group_number" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="d-block mb-2">Insurance Card Upload</label>
                                        <div class="custom-file-upload">
                                            <input type="file" name="insurance_card" id="insurance_card" class="custom-file-hidden">
                                            <label for="insurance_card"
                                                class="btn btn-outline-primary rounded-pill px-4 py-2">
                                                <i class="fas fa-upload"></i> Choose File
                                            </label>
                                            <span id="file-chosen" class="ml-2 text-muted">No file selected</span>
                                        </div>
                                    </div>

                                </div>

                                <button type="button" class="btn btn-secondary prev-btn">
                                    <i class="fas fa-arrow-left"></i> Previous
                                </button>
                                <button type="submit" class="btn btn-success float-right">
                                    Save Client
                                </button>
                            </div>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal fade" id="addcare_giver_Modal" tabindex="-1" role="dialog" aria-labelledby="addcare_giver_Modal"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('add-caregiver') }}" method="POST" id="caregiver_form" novalidate enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Caregiver</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="container">
                        <div class="d-flex justify-content-between align-items-center mb-4 px-3">
                            <div class="text-center flex-fill">
                                <div class="rounded-circle bg-primary text-white mx-auto mb-1"
                                    style="width:30px;height:30px;line-height:30px;">1</div>
                                <small>Personal Info</small>
                            </div>
                            <div class="border-top flex-fill step-line"></div>
                            <div class="text-center flex-fill">
                                <div class="rounded-circle bg-secondary text-white mx-auto mb-1" id="new-modal-step2-indicator"
                                    style="width:30px;height:30px;line-height:30px;">2</div>
                                <small>Qualifications</small>
                            </div>
                            <div class="border-top flex-fill step-line" style="border-color: #706d6d;"></div>
                            <div class="text-center flex-fill">
                                <div class="rounded-circle bg-secondary text-white mx-auto mb-1" id="new-modal-step3-indicator"
                                    style="width:30px;height:30px;line-height:30px;">3</div>
                                <small>Documents</small>
                            </div>
                        </div>

                        <div class="step step-1" id="new-modal-step1">
                            <h4>Personal Information</h4>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Name<x-required_field/></label>
                                    <input type="text" name="c_name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email<x-required_field/></label>
                                    <input type="email" name="c_email" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone<x-required_field/></label>
                                    <input type="text" name="c_phone" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Date of Birth<x-required_field/></label>
                                    <input type="date" name="c_dob" class="form-control" required>
                                </div>
                                <div class="form-group col-12">
                                    <label>Address</label>
                                    <input type="text" name="c_address" class="form-control">
                                </div>
                            </div>
                            <h4 class="mt-4">Emergency Contact</h4>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Contact Name <x-required_field/></label>
                                    <input type="text" name="c_emergency_contact_name" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone <x-required_field/></label>
                                    <input type="text" name="c_emergency_phone" class="form-control" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Relationship <x-required_field/></label>
                                    <input type="text" name="c_emergency_relationship" class="form-control" required>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary float-right next-btn">Next<i
                                    class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                        <div class="step step-2 d-none" id="new-modal-step2">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="certification">Certification<x-required_field/></label>
                                    <select name="certification" id="certification" class="form-control" required>
                                        <option value="">Select Certification</option>
                                        <option value="HHA">HHA</option>
                                        <option value="LPN">LPN</option>
                                        <option value="RN">RN</option>
                                        <option value="CNA">CNA</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="experience">Experience (in years)<x-required_field/></label>
                                    <input type="number" name="experience" id="experience" class="form-control" min="0" required>
                                </div>
                            </div>

                            <h4 class="mt-4">Availability</h4>
                            <div class="row">
                                @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                    <div class="col-sm-6 col-md-4 mb-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="availabilities[]" value="{{ $day }}" id="avail_{{ $day }}">
                                            <label class="form-check-label" for="avail_{{ $day }}">{{ $day }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <h4 class="mt-4">Languages</h4>
                            <div class="row">
                                @foreach(['Spanish', 'English', 'French', 'Arabic', 'Mandarin', 'Other'] as $lang)
                                    <div class="col-sm-6 col-md-4 mb-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="languages[]" value="{{ $lang }}" id="lang_{{ $lang }}">
                                            <label class="form-check-label" for="lang_{{ $lang }}">{{ $lang }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <h4 class="mt-4">Specializations</h4>
                            <div class="row">
                                @foreach($specializations as $specialization)
                                    <div class="col-sm-6 col-md-4 mb-2">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="specializations[]" value="{{ $specialization->id }}" id="spec_{{ $specialization->id }}">
                                            <label class="form-check-label" for="spec_{{ $specialization->id }}">{{ $specialization->name }}</label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="mt-4">
                                <button type="button" class="btn btn-secondary prev-btn">
                                    <i class="fas fa-arrow-left"></i> Previous
                                </button>
                                <button type="button" class="btn btn-primary float-right next-btn">
                                    Next <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                        <div class="step step-3 d-none" id="new-modal-step3">
                            <h4 class="mb-3">Document Verification</h4>
                            <p>Please verify you have the following documents ready for submission:</p>

                            <div class="document-checklist">
                                <div class="doc-row">
                                    <div class="doc-info">
                                        <label for="background_check" style="margin-bottom: 1px;">Background Check</label>
                                    </div>
                                    <div class="doc-upload">
                                        <label for="background_check_file" class="upload-btn">
                                            <i class="fas fa-upload"></i> Upload
                                        </label>
                                        <input type="file" id="background_check_file" name="background_check_file" class="hidden-input">
                                    </div>
                                </div>
                                <div class="doc-row">
                                    <div class="doc-info">
                                        <label for="cpr_certification" style="margin-bottom: 1px;">CPR Certification</label>
                                    </div>
                                    <div class="doc-upload">
                                        <label for="cpr_certification_file" class="upload-btn">
                                            <i class="fas fa-upload"></i> Upload
                                        </label>
                                        <input type="file" id="cpr_certification_file" name="cpr_certification_file" class="hidden-input">
                                    </div>
                                </div>
                                <div class="doc-row">
                                    <div class="doc-info">
                                        <label for="tb_test" style="margin-bottom: 1px;">TB Test Results</label>
                                    </div>
                                    <div class="doc-upload">
                                        <label for="tb_test_file" class="upload-btn">
                                            <i class="fas fa-upload"></i> Upload
                                        </label>
                                        <input type="file" id="tb_test_file" name="tb_test_file" class="hidden-input">
                                    </div>
                                </div>
                                <div class="doc-row">
                                    <div class="doc-info">
                                        <label for="drivers_license" style="margin-bottom: 1px;">Driver's License</label>
                                    </div>
                                    <div class="doc-upload">
                                        <label for="drivers_license_file" class="upload-btn">
                                            <i class="fas fa-upload"></i> Upload
                                        </label>
                                        <input type="file" id="drivers_license_file" name="drivers_license_file" class="hidden-input">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="preferred_schedule">Preferred Schedule</label>
                                <select name="preferred_schedule" id="preferred_schedule" class="form-control">
                                    <option value="">-- Select --</option>
                                    <option value="full_time">Full Time</option>
                                    <option value="part_time">Part Time</option>
                                    <option value="flexible">Flexible</option>
                                </select>
                            </div>
                            <div id="formErrorMsgContainer"></div>
                            <button type="button" class="btn btn-secondary prev-btn">
                                <i class="fas fa-arrow-left"></i> Previous
                            </button>
                            <button type="submit" class="btn btn-success float-right" id="submitBtn">
                                Save Caregiver
                            </button>
                        </div>


                    </div>

                </div>
            </div>
        </form>
    </div>

</div>
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                </div>
                <div class="modal-body">
                   <span class="text-success">Client saved successfully!</span>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @section('scripts')
    <script>
        document.getElementById("insurance_card").addEventListener("change", function () {
            const fileName = this.files[0]?.name || "No file selected";
            document.getElementById("file-chosen").textContent = fileName;
        });
    </script>
 <script>
    document.addEventListener("DOMContentLoaded", function () {
        const steps = document.querySelectorAll(".step");
        const nextButtons = document.querySelectorAll(".next-btn");
        const prevButtons = document.querySelectorAll(".prev-btn");
        const form = document.getElementById("client_form");

        let currentStep = 0;

        function showStep(stepIndex) {
            steps.forEach((step, index) => {
                step.classList.toggle("d-none", index !== stepIndex);
            });
        }

        function validateStep(stepIndex) {
            const inputs = steps[stepIndex].querySelectorAll("input, select, textarea");
            let isValid = true;

            inputs.forEach(input => {
                const errorSpan = input.nextElementSibling;
                if (!input.checkValidity()) {
                    input.classList.add("is-invalid");
                    if (!errorSpan || !errorSpan.classList.contains("invalid-feedback")) {
                        const errorMsg = document.createElement("div");
                        errorMsg.classList.add("invalid-feedback");
                        errorMsg.innerText = input.validationMessage || "This field is required.";
                        input.parentNode.appendChild(errorMsg);
                    }
                    isValid = false;
                } else {
                    input.classList.remove("is-invalid");
                    if (errorSpan && errorSpan.classList.contains("invalid-feedback")) {
                        errorSpan.remove();
                    }
                }
            });

            return isValid;
        }

        nextButtons.forEach(button => {
            button.addEventListener("click", () => {
                if (validateStep(currentStep)) {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                }
            });
        });

        prevButtons.forEach(button => {
            button.addEventListener("click", () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });
        form.addEventListener("submit", function (e) {
            console.log("dhjdd");
            if (!validateStep(currentStep)) {
                e.preventDefault(); // Prevent form submission
            }
        });

        showStep(currentStep); // Initialize on page load
    });
 </script>
<script>
    $(document).ready(function () {
        $('#client_form').on('submit', function (e) {
            e.preventDefault();

            let form = $(this); // reference to the form
            let formData = new FormData(this);
            let submitBtn = form.find('button[type="submit"]'); // ✅ define the submit button inside the form
            let originalBtnText = submitBtn.html();

            submitBtn.prop('disabled', true).html('Submitting...');

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    form.find('.is-invalid').removeClass('is-invalid');
                    form.find('.invalid-feedback').remove();
                    form.find('#formErrorMsg').remove();
                },
                success: function (response) {
                    if (response.message) {
                        alert(response.message);
                        form[0].reset();
                    }
                    submitBtn.prop('disabled', false).html(originalBtnText);
                },
                error: function (xhr) {
                    submitBtn.prop('disabled', false).html(originalBtnText);

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (field, messages) {
                            let input = form.find('[name="' + field + '"]');
                            input.addClass('is-invalid');
                            input.after('<div class="invalid-feedback">' + messages[0] + '</div>');
                        });
                        form.prepend('<div id="formErrorMsg" class="alert alert-danger mb-3">An error occurred. Please fix the highlighted fields.</div>');
                    } else {
                        alert('An unexpected error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const steps = ['#new-modal-step1', '#new-modal-step2', '#new-modal-step3'];
        const indicators = ['#new-modal-step2-indicator', '#new-modal-step3-indicator'];
        const c_form= document.getElementById("caregiver_form");
        let currentStep = 0;

        function showStep(index) {
            steps.forEach((step, i) => {
                const el = document.querySelector(step);
                if (el) {
                    el.classList.toggle('d-none', i !== index);
                }
            });

            indicators.forEach((selector, i) => {
                const el = document.querySelector(selector);
                if (el) {
                    el.classList.remove('bg-primary', 'bg-secondary');
                    el.classList.add(i <= index - 1 ? 'bg-primary' : 'bg-secondary');
                }
            });
        }

        function validateStep(stepIndex) {
            const stepElement = document.querySelector(steps[stepIndex]);
            if (!stepElement) return false;

            const requiredFields = stepElement.querySelectorAll('[required]');
            let isValid = true;

            requiredFields.forEach(field => {
                const value = field.value.trim();
                const parent = field.parentElement;

                // Remove existing error
                field.classList.remove('is-invalid');
                const existingFeedback = parent.querySelector('.invalid-feedback');
                if (existingFeedback) existingFeedback.remove();

                if (!value) {
                    field.classList.add('is-invalid');
                    isValid = false;

                    // Create error message
                    const errorMsg = document.createElement('div');
                    errorMsg.className = 'invalid-feedback';
                    errorMsg.textContent = 'This field is required.';
                    parent.appendChild(errorMsg);
                }
            });

            return isValid;
        }

        document.querySelectorAll('.next-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                if (validateStep(currentStep)) {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        showStep(currentStep);
                    }
                }
            });
        });

        document.querySelectorAll('.prev-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });
        c_form.addEventListener("submit", function (e) {
            console.log("dhjdd");
            if (!validateStep(currentStep)) {
                e.preventDefault();
            }
        });

        showStep(currentStep);
    });
</script>
<script>
    $(document).ready(function () {
        $('#caregiver_form').on('submit', function (e) {
            e.preventDefault();

            let form = $(this);
            let formData = new FormData(this);
            let submitBtn = form.find('#submitBtn');
            let originalBtnText = submitBtn.html();

            submitBtn.prop('disabled', true).html('Submitting...');

            $.ajax({
                url: form.attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    $('.is-invalid').removeClass('is-invalid');
                    $('.invalid-feedback').remove();
                    $('#formErrorMsg').remove(); // Remove any previous general error
                },
                success: function (response) {
                    console.log(response);
                    if (response.message) {
                        alert(response.message); // Show the success message
                        form[0].reset(); // Reset the form
                    }
                    submitBtn.prop('disabled', false).html(originalBtnText); // Restore button after submission
                },
                error: function (xhr) {
                    submitBtn.prop('disabled', false).html(originalBtnText); // Restore button if error occurs

                    if (xhr.status === 422) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function (field, messages) {
                            let input = form.find('[name="' + field + '"]');
                            input.addClass('is-invalid');
                            input.after('<div class="invalid-feedback">' + messages[0] + '</div>');
                        });
                        form.prepend('<div id="formErrorMsg" class="alert alert-danger mb-3">An error occurred. Please fix the highlighted fields.</div>');
                    } else {
                        alert('An unexpected error occurred. Please try again.');
                    }
                }
            });
        });
    });
</script>

    @endsection
