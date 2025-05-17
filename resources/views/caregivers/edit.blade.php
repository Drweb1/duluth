@extends('admin.adminmaster')
@section('title')
Caregiver
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
        <div class="container-fluid">

            <div class="page-header">
                <div class="row">

                    <div class="col-lg-6 main-header">
                        <h2>Edit<span>Caregiver</span></h2>
                        <h6 class="mb-0">Manage Your Caregiver</h6>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <a href="{{ route('view-caregivers') }}" class="btn btn-sm btn-primary">
                            Caregivers
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
                <form action="{{ route('caregiver.edit', $caregiver->external_id) }}" method="POST" id="caregiver_form" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="container">

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Name <x-required_field/></label>
                                <input type="text" name="name" value="{{ old('name', $caregiver->name ?? '') }}" class="form-control" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Email <x-required_field/></label>
                                <input type="email" name="email" value="{{ old('email', $caregiver->email ?? '') }}" class="form-control" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Phone <x-required_field/></label>
                                <input type="text" name="phone" value="{{ old('phone', $caregiver->phone ?? '') }}" class="form-control" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Date of Birth <x-required_field/></label>
                                <input type="date" name="dob" value="{{ old('dob', $caregiver->get_profile->date_of_birth ?? '') }}" class="form-control" required>
                            </div>
                            <div class="form-group col-12">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address', $caregiver->get_profile->address ?? '') }}">
                            </div>
                        </div>
                        <h4 class="mt-4">Emergency Contact</h4>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Contact Name <x-required_field/></label>
                                <input type="text" name="emergency_contact_name" value="{{ old('emergency_contact_name', $caregiver->get_profile->emergency_contact_name ?? '') }}" class="form-control" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Phone <x-required_field/></label>
                                <input type="text" name="emergency_phone" value="{{ old('emergency_phone', $caregiver->get_profile->emergency_phone ?? '') }}" class="form-control" required>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Relationship <x-required_field/></label>
                                <input type="text" name="emergency_relationship" value="{{ old('emergency_relationship', $caregiver->get_profile->emergency_relation ?? '') }}" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="certification">Certification <x-required_field/></label>
                                <select name="certification" id="certification" class="form-control" required>
                                    <option value="">Select Certification</option>
                                    <option value="HHA" {{ old('certification', $caregiver->get_profile->certification ?? '') === 'HHA' ? 'selected' : '' }}>HHA</option>
                                    <option value="LPN" {{ old('certification', $caregiver->get_profile->certification ?? '') === 'LPN' ? 'selected' : '' }}>LPN</option>
                                    <option value="RN" {{ old('certification', $caregiver->get_profile->certification ?? '') === 'RN' ? 'selected' : '' }}>RN</option>
                                    <option value="CNA" {{ old('certification', $caregiver->get_profile->certification ?? '') === 'CNA' ? 'selected' : '' }}>CNA</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="experience">Experience (in years) <x-required_field/></label>
                                <input type="number" name="experience" id="experience" class="form-control" min="0" value="{{ old('experience', $caregiver->get_profile->experience_years ?? '') }}" required>
                            </div>
                        </div>
                        <h4 class="mt-4">Availability</h4>
                        <div class="row">
                            @php
                                $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                                $checkedDays = old('availabilities', $caregiver->get_availabilities->pluck('day')->toArray() ?? []); // Get the 'day' field from get_availabilities
                            @endphp

                            @foreach($days as $day)
                                <div class="col-sm-6 col-md-3 mb-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="availabilities[]" value="{{ $day }}" id="avail_{{ $day }}"
                                            {{ in_array($day, $checkedDays) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="avail_{{ $day }}">{{ $day }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <h4 class="mt-4">Languages</h4>
                        <div class="row">
                            @foreach($languages as $lang)
                                <div class="col-sm-6 col-md-3 mb-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="languages[]" value="{{ $lang->id }}" id="lang_{{ $lang->id }}"
                                            {{ old('languages') ? (in_array($lang->id, old('languages')) ? 'checked' : '') : ($caregiver->get_languages->pluck('language_id')->contains($lang->id) ? 'checked' : '') }}>
                                        <label class="form-check-label" for="lang_{{ $lang->id }}">{{ $lang->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <h4 class="mt-4">Specializations</h4>
                        <div class="row">
                            @php
                                $selectedSpecs = old('specializations', $caregiver->get_specialities->pluck('specialization_id')->toArray() ?? []); // Get the 'specialization_id' field from get_specialities
                            @endphp
                            @foreach($specializations as $specialization)
                                <div class="col-sm-6 col-md-3 mb-2">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="specializations[]" value="{{ $specialization->id }}" id="spe{{ $specialization->id }}"
                                            {{ in_array($specialization->id, $selectedSpecs) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="spe{{ $specialization->id }}">{{ $specialization->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 mt-2">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date', $caregiver->get_profile->start_date ?? '') }}">
                            </div>

                            <div class="form-group col-md-4 mt-2">
                                <label for="preferred_schedule">Preferred Schedule</label>
                                <select name="preferred_schedule" id="preferred_schedule" class="form-control">
                                    <option value="">-- Select --</option>
                                    <option value="full_time" {{ old('preferred_schedule', $caregiver->get_profile->schedule ?? '') === 'full_time' ? 'selected' : '' }}>Full Time</option>
                                    <option value="part_time" {{ old('preferred_schedule', $caregiver->get_profile->schedule ?? '') === 'part_time' ? 'selected' : '' }}>Part Time</option>
                                    <option value="flexible" {{ old('preferred_schedule', $caregiver->get_profile->schedule ?? '') === 'flexible' ? 'selected' : '' }}>Flexible</option>
                                </select>
                            </div>
                        </div>
                        <h4 class="mb-3 mt-2">Document Verification</h4>
                        <p>Please verify you have the following documents ready for submission:</p>
                        @php
                        $docs = [
                            'background_check' => 'Background Check',
                            'crp_certification' => 'CPR Certification',
                            'tb_test' => 'TB Test Results',
                            'licence' => "Driver's License"
                        ];
                    @endphp
                       <div class="row ">
                        @foreach($docs as $file => $label)
                            <div class="col-md-3 mb-2 mt-3">
                                <div class="doc-row">
                                    <div class="doc-info">
                                        <label for="{{ $file }}" style="margin-bottom: 1px;">{{ $label }}</label>
                                    </div>
                                    <div class="doc-upload">
                                        <input type="file" id="{{ $file }}" name="{{ $file }}" class="custom-file-hidden">
                    <label for="{{ $file }}" class="btn btn-outline-primary rounded-pill px-4 py-2">
                        <i class="fas fa-upload"></i> Choose File
                    </label>
                    @if(isset($caregiver) && $caregiver->get_profile && $caregiver->get_profile->$file)
                    <div class="uploaded-doc">
                        <a href="{{ asset('storage/caregiver_docs/' . basename($caregiver->get_profile->$file)) }}" target="_blank" class="ml-2">View Uploaded {{ $label }}</a>
                    </div>
                @endif

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                        <div id="formErrorMsgContainer"></div>
                        <div class="form-group col-md-12 text-right">
                            <button type="submit" class="btn btn-md btn-primary">Submit</button>
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
