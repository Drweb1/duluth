@extends('admin.adminmaster')
@section('title')
Schedule
@endsection
@section('content')

<style>
    /* Pill Toggle Styles */
    .pill-toggle-group {
        display: inline-flex;
        background: #f8f9fa;
        border-radius: 50px;
        padding: 4px;
    }

    .pill-toggle {
        border: none;
        padding: 8px 20px;
        border-radius: 50px;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        background: transparent;
        color: #495057;
    }

    .pill-toggle i {
        font-size: 16px;
    }

    .pill-toggle.active {
        background: #7e37d8;
        color: white;
        box-shadow: 0 2px 8px rgba(139, 26, 184, 0.3);
    }

    .pill-toggle:not(.active):hover {
        background: #e9ecef;
    }
</style>

<div class="page-body-wrapper">

    <div class="page-body">
        <div class="container-fluid">

            <div class="page-header">
                <div class="row">

                    <div class="col-lg-6 main-header">
                        <h2>Edit<span>Schedule</span></h2>
                        <h6 class="mb-0">Manage Your Schedules</h6>
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
             <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('schedule.edit', $schedule->id) }}" class="form theme-form">
                        @csrf

                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="mb-1">Client <x-required_field /></label>
                                            <select class="form-control" name="client">
                                                <option value="">Select Client</option>
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}" {{ $schedule->client_id == $client->id ? 'selected' : '' }}>
                                                        {{ $client->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('client') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Staff Type <x-required_field /></label>
                                            <input type="hidden" name="staff_type" id="staff_type" value="{{ $schedule->staff_type }}">
                                            <div class="pill-toggle-group">
                                                <button type="button" class="pill-toggle {{ $schedule->staff_type != 'caregiver' ? 'active' : '' }}" data-type="nurse">
                                                    <i class="fa fa-stethoscope"></i> Nurse
                                                </button>
                                                <button type="button" class="pill-toggle {{ $schedule->staff_type == 'caregiver' ? 'active' : '' }}" data-type="caregiver">
                                                    <i class="fa fa-user"></i> Caregiver
                                                </button>
                                            </div>
                                            @error('staff_type') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="nurse_select" style="{{ $schedule->staff_type == 'caregiver' ? 'display: none;' : '' }}">
                                        <div class="form-group">
                                            <label class="mb-1">Select Nurse <x-required_field /></label>
                                            <select class="form-control" name="nurse" id="nurse">
                                                <option value="">Select Nurse</option>
                                                @foreach($nurses as $nurse)
                                                    <option value="{{ $nurse->id }}" {{ $schedule->nurse_id == $nurse->id ? 'selected' : '' }}>
                                                        {{ $nurse->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('nurse') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="caregiver_select" style="{{ $schedule->staff_type == 'caregiver' ? '' : 'display: none;' }}">
                                        <div class="form-group">
                                            <label class="mb-1">Select Caregiver <x-required_field /></label>
                                            <select class="form-control" name="caregiver" id="caregiver">
                                                <option value="">Select Caregiver</option>
                                                @foreach($caregivers as $caregiver)
                                                    <option value="{{ $caregiver->id }}" {{ $schedule->caregiver_id == $caregiver->id ? 'selected' : '' }}>
                                                        {{ $caregiver->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('caregiver') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Visit Type <x-required_field /></label>
                                        <select class="form-control" name="visit_type" id="visit_type">
                                            <option value="">Select Visit Type</option>
                                            @foreach(['Medical Assessment', 'Initial Assessment', 'Reassessment', 'Supervisory Visit', 'Wound Care', 'Medication Review', 'Health Monitoring', 'Specialized Treatment'] as $type)
                                                <option value="{{ $type }}" {{ $schedule->visit_type == $type ? 'selected' : '' }}>{{ $type }}</option>
                                            @endforeach
                                        </select>
                                        @error('visit_type') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Date <x-required_field /></label>
                                        <input type="date" class="form-control" name="date" value="{{ $schedule->date }}">
                                        @error('date') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label class="form-label">Start Time <x-required_field /></label>
                                        <input type="time" class="form-control" name="start_time" value="{{ $schedule->start_time }}">
                                        @error('start_time') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="form-label">End Time <x-required_field /></label>
                                        <input type="time" class="form-control" name="end_time" value="{{ $schedule->end_time }}">
                                        @error('end_time') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="col-md-6 form-group mt-3">
                                        <label class="form-label">Select Tasks <x-required_field /></label>
                                        @php
                                            $selectedTasks = $schedule->get_tasks->pluck('id')->toArray();
                                        @endphp

                                        <select name="tasks[]" class="form-control">
                                            @foreach($tasks as $task)
                                                <option value="{{ $task->id }}" {{ in_array($task->id, $selectedTasks) ? 'selected' : '' }}>
                                                    {{ $task->title }}
                                                </option>
                                            @endforeach
                                        </select>

                                        @error('tasks') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="mb-3 col-md-6 form-group">
                                        <label class="form-label">Notes</label>
                                        <textarea class="form-control" name="notes" rows="3">{{ $schedule->notes }}</textarea>
                                        @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <div class="mb-3 col-md-12 form-group">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" name="recurring_visit" id="recurring_visit" {{ $schedule->recurring_visit ? 'checked' : '' }}>
                                            <label class="form-check-label" for="recurring_visit">Recurring Visit</label>
                                        </div>
                                        @error('recurring_visit') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="mb-3 col-md-12 form-group" id="frequency_field" style="{{ $schedule->recurring_visit ? '' : 'display: none;' }}">
                                        <label class="form-label" for="frequency">Frequency <x-required_field /></label>
                                        <select class="form-control" name="frequency" id="frequency">
                                            <option value="">Select Frequency</option>
                                            @foreach(['daily', 'weekly', 'bi-weekly', 'monthly'] as $freq)
                                                <option value="{{ $freq }}" {{ $schedule->frequency == $freq ? 'selected' : '' }}>
                                                    {{ ucfirst($freq) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('frequency') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>
                                    <div class="form-group col-md-12 text-right">
                                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                                    </div>
                                </div>
                    </form>

                </div>
             </div>
    </div>
</div>

@endsection
@section('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Store the current visit type value
        const currentVisitType = '{{ $schedule->visit_type }}';

        // Initialize staff type based on saved value
        const initialStaffType = document.getElementById('staff_type').value;
        const nurseButton = document.querySelector('.pill-toggle[data-type="nurse"]');
        const caregiverButton = document.querySelector('.pill-toggle[data-type="caregiver"]');

        if (initialStaffType === 'caregiver') {
            caregiverButton.classList.add('active');
            $('#nurse_select').hide();
            $('#caregiver_select').show();
            updateVisitTypeOptions('caregiver', currentVisitType);
        } else {
            nurseButton.classList.add('active');
            $('#nurse_select').show();
            $('#caregiver_select').hide();
            // No need to update options here as they're already nurse options by default
            // Just ensure the correct option is selected
            if (currentVisitType) {
                $('#visit_type').val(currentVisitType);
            }
        }

        document.querySelectorAll('.pill-toggle').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.pill-toggle').forEach(btn => {
                    btn.classList.remove('active');
                });
                this.classList.add('active');
                const staffType = this.dataset.type;
                document.getElementById('staff_type').value = staffType;

                if (staffType === 'nurse') {
                    $('#nurse_select').show();
                    $('#caregiver_select').hide();
                    updateVisitTypeOptions('nurse', currentVisitType);
                } else {
                    $('#nurse_select').hide();
                    $('#caregiver_select').show();
                    updateVisitTypeOptions('caregiver', currentVisitType);
                }
            });
        });

        function updateVisitTypeOptions(staffType, selectedValue) {
            let options;

            if (staffType === 'nurse') {
                options = `
                    <option value="">Select Visit Type</option>
                    <option value="Medical Assessment" ${selectedValue === 'Medical Assessment' ? 'selected' : ''}>Medical Assessment</option>
                    <option value="Initial Assessment" ${selectedValue === 'Initial Assessment' ? 'selected' : ''}>Initial Assessment</option>
                    <option value="Reassessment" ${selectedValue === 'Reassessment' ? 'selected' : ''}>Reassessment</option>
                    <option value="Supervisory Visit" ${selectedValue === 'Supervisory Visit' ? 'selected' : ''}>Supervisory Visit</option>
                    <option value="Wound Care" ${selectedValue === 'Wound Care' ? 'selected' : ''}>Wound Care</option>
                    <option value="Medication Review" ${selectedValue === 'Medication Review' ? 'selected' : ''}>Medication Review</option>
                    <option value="Health Monitoring" ${selectedValue === 'Health Monitoring' ? 'selected' : ''}>Health Monitoring</option>
                    <option value="Specialized Treatment" ${selectedValue === 'Specialized Treatment' ? 'selected' : ''}>Specialized Treatment</option>
                `;
            } else {
                options = `
                    <option value="">Select Visit Type</option>
                    <option value="Daily Care" ${selectedValue === 'Daily Care' ? 'selected' : ''}>Daily Care</option>
                    <option value="Weekly Check-in" ${selectedValue === 'Weekly Check-in' ? 'selected' : ''}>Weekly Check-in</option>
                    <option value="Personal Care" ${selectedValue === 'Personal Care' ? 'selected' : ''}>Personal Care</option>
                    <option value="Companionship" ${selectedValue === 'Companionship' ? 'selected' : ''}>Companionship</option>
                    <option value="Light Housekeeping" ${selectedValue === 'Light Housekeeping' ? 'selected' : ''}>Light Housekeeping</option>
                    <option value="Supervisory Assessment" ${selectedValue === 'Supervisory Assessment' ? 'selected' : ''}>Supervisory Assessment</option>
                    <option value="Care Plan Review" ${selectedValue === 'Care Plan Review' ? 'selected' : ''}>Care Plan Review</option>
                `;
            }

            $('#visit_type').html(options);

            // If the selected value exists in the new options, select it
            if (selectedValue && $(`#visit_type option[value="${selectedValue}"]`).length > 0) {
                $('#visit_type').val(selectedValue);
            }
        }
    });
</script>


<script>
    $(document).ready(function() {
        $('#recurring_visit').change(function() {
            if ($(this).is(':checked')) {
                $('#frequency_field').show();
            } else {
                $('#frequency_field').hide();
            }
        });
    });
</script>

@endsection
