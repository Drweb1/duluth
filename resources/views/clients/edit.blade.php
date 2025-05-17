@extends('admin.adminmaster')
@section('title')
Clients
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .custom-file-hidden {
    display: none;
}

</style>
<div class="page-body-wrapper">

    <div class="page-body">
        <div class="container">

            <div class="page-header">
                <div class="row">

                    <div class="col-lg-6 main-header">
                        <h2>Edit<span>Client</span></h2>
                        <h6 class="mb-0">Manage Your Clients</h6>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <a href="{{ route('view-clients') }}" class="btn btn-sm btn-primary">
                            Clients
                        </a>
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

        </div>


        <div class="row">

            <div class="col-sm-12">
                <div class="container-fluid">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form action="{{ route('client.edit', $client->external_id) }}" method="POST" id="client_form" enctype="multipart/form-data"
                        novalidate>
                        @csrf
                      <div class="container">
                        <h4>Personal Information</h4>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Name
                                    <x-required_field />
                                </label>
                                <input type="text" name="name" class="form-control" value="{{ $client->name }}"
                                    required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Email
                                    <x-required_field />
                                </label>
                                <input type="email" name="email" class="form-control" value="{{ $client->email }}"
                                    required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Phone
                                    <x-required_field />
                                </label>
                                <input type="text" name="phone" class="form-control" value="{{ $client->phone }}"
                                    required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Date of Birth
                                    <x-required_field />
                                </label>
                                <input type="date" name="dob" class="form-control" value="{{ $client->get_profile->date_of_birth }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $client->get_profile->address }}">
                            </div>
                        </div>
                        <h4 class="mt-4">Emergency Contact</h4>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Contact Name
                                    <x-required_field />
                                </label>
                                <input type="text" name="emergency_contact_name" class="form-control"
                                    value="{{ $client->get_profile->emergency_contact_name ?? '' }}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Phone
                                    <x-required_field />
                                </label>
                                <input type="text" name="emergency_phone" class="form-control"
                                    value="{{ $client->get_profile->emergency_phone ?? '' }}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Relationship
                                    <x-required_field />
                                </label>
                                <input type="text" name="emergency_relationship" class="form-control"
                                    value="{{ $client->get_profile->emergency_relation ?? '' }}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Email</label>
                                <input type="email" name="emergency_email" class="form-control"
                                    value="{{ $client->get_profile->emergency_email ?? '' }}">
                            </div>
                        </div>

                        <h4>Care Requirements</h4>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Care Type
                                    <x-required_field />
                                </label>
                                <select name="care_type" class="form-control" required>
                                    <option value="">-- Select Care Type --</option>
                                    <option value="Daily Care" {{ $client->get_profile->care_type === 'Daily Care' ? 'selected' : '' }}>Daily Care</option>
                                    <option value="Weekly" {{ $client->get_profile->care_type === 'Weekly' ? 'selected' : '' }}>Weekly</option>
                                    <option value="Respite" {{ $client->get_profile->care_type === 'Respite' ? 'selected' : '' }}>Respite</option>
                                    <option value="Specialized" {{ $client->get_profile->care_type === 'Specialized' ? 'selected' : '' }}>Specialized</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Frequency
                                    <x-required_field />
                                </label>
                                <input type="text" name="frequency" class="form-control"
                                    value="{{ $client->get_profile->care_frequency ?? '' }}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Start Date
                                    <x-required_field />
                                </label>
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ $client->get_profile->start_date ?? '' }}" required>
                            </div>
                        </div>

                        <h4 class="mt-4">Medical Requirements</h4>
                        <div class="row">
                            @foreach ($requires as $requirement)
                            <div class="col-md-3 mb-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="medical_requirements[]"
                                        value="{{ $requirement->id }}" id="require_{{ $requirement->id }}"
                                        {{ $client->get_requirements->pluck('special_requirement_id')->contains($requirement->id) ? 'checked' : '' }}>
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
                            <div class="col-md-3 mb-2">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="medical_conditions[]"
                                        value="{{ $medic->id }}" id="condition_{{ $medic->id }}"
                                        {{ $client->get_conditions->pluck('medical_condition_id')->contains($medic->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="condition_{{ $medic->id }}">
                                        {{ $medic->name }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <h3 class="mt-3">Insurance Information</h3>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Insurance Provider
                                    <x-required_field />
                                </label>
                                <input type="text" name="insurance_provider" class="form-control"
                                    value="{{ $client->get_profile->insurance_provider ?? '' }}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Policy Number
                                    <x-required_field />
                                </label>
                                <input type="text" name="policy_number" class="form-control"
                                    value="{{ $client->get_profile->policy_number ?? '' }}" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Medicare Number</label>
                                <input type="text" name="medicare_number" class="form-control"
                                    value="{{ $client->get_profile->medicare_number ?? '' }}">
                            </div>
                            <div class="form-group col-md-3">
                                <label>Group Number</label>
                                <input type="text" name="group_number" class="form-control"
                                    value="{{ $client->get_profile->group_number ?? '' }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label class="d-block mb-2">Insurance Card Upload</label>
                                <div class="custom-file-upload">
                                    <input type="file" name="insurance_card" id="insurance_card" class="custom-file-hidden">
                                    <label for="insurance_card"
                                        class="btn btn-outline-primary rounded-pill px-4 py-2">
                                        <i class="fas fa-upload"></i> Choose File
                                    </label>
                                    <a href="{{ asset('storage/insurance_cards/' . basename($client->get_profile->insurance_card)) }}"
                                        id="file-chosen" class="ml-2 text-muted" target="_blank">
                                         {{ $client->get_profile->insurance_card ? basename($client->get_profile->insurance_card) : 'No file selected' }}
                                     </a>

                                </div>
                            </div>
                            <div class="form-group col-md-12 text-right">
                                <button type="submit" class="btn btn-md btn-primary">Submit</button>
                            </div>
                        </div>

                      </div>

            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
    document.getElementById('insurance_card').addEventListener('change', function (e) {
        if (e.target.files.length > 0) {
            const fileName = e.target.files[0].name;
            document.getElementById('file-chosen').textContent = fileName;
        }
    });
</script>


@endsection
