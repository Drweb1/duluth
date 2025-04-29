@extends('admin.adminmaster')
@section('title')
Orders
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/date-picker.css') }}">

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


@endsection
@section('content')
<div class="page-body-wrapper">
    <!-- Right sidebar Ends-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 main-header">
                        <h2>Schdule Appointments</h2>
                        <h6 class="mb-0">Manage Your Appointments</h6>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                            data-bs-target="#setScheduleModal">
                            Set Schedule
                        </button>

                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
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
                {{-- <div class="col-md-6" style="overflow: auto">
                    <div class="cal-date-widget card-body p-0">
                        <div class="row">
                            <div class="col-xl-5 col-xs-12 col-md-6 col-sm-12 gradient-primary">
                                <div class="cal-info text-center">
                                    <h2>{{ \Carbon\Carbon::today()->format('d') }}</h2>
                                    <div class="d-inline-block mt-2">
                                        <span class="b-r-light pe-3">{{ \Carbon\Carbon::today()->format('F') }} </span>
                                        <span class="ps-4">{{ \Carbon\Carbon::today()->format('Y') }}</span>
                                    </div>
                                    <ul class="task-list">
                                        @foreach($schedules as $schedule)
                                            <li>
                                                <span>{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} </span>
                                                {{ $schedule->get_client->name }} - {{ $schedule->get_nurse->name ?? $schedule->get_caregiver->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-7 col-xs-12 col-md-6 col-sm-12 p-50">
                                <div class="cal-datepicker">
                                    <div class="datepicker-here" data-language="en"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                    <div class="col-md-3 mb-4">
                      <div class="card shadow-sm h-100">
                        <div class="card-body">

                          <!-- Client Info -->
                          <div class="d-flex align-items-center mb-3">
                            <img src="client-profile.jpg" alt="Client Profile" class="rounded-circle me-3" width="60" height="60">
                            <div>
                              <h5 class="card-title mb-0">John Doe</h5>
                              <small class="text-muted">
                                Visit Status: <span class="badge bg-success">Completed</span>
                              </small>
                            </div>
                          </div>

                          <hr>

                          <!-- Caregiver/Nurse Info -->
                          <div class="d-flex align-items-center">
                            <img src="caregiver-profile.jpg" alt="Caregiver Profile" class="rounded-circle me-3" width="50" height="50">
                            <div>
                              <h6 class="mb-0">Nurse Mary Smith</h6>
                              <small class="text-muted">Role: Nurse</small>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                <div class="col-md-9">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Client</th>
                                <th>Staff Type</th>
                                <th>Schedule</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->id }}</td>
                                    <td>{{ $schedule->get_client->name }}</td>
                                    <td>{{Str::ucfirst( $schedule->staff_type) }}  ({{ $schedule->get_nurse->name ?? $schedule->get_caregiver->name }})</td>
                                    <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d M Y') }} {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}</td>
                                    <td>
                                        <a href="{{ route('schedule.edit', $schedule->id) }}"
                                            class="btn btn-sm btn-primary me-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <a href="{{ route('schedule.delete', $schedule->id) }}" class="btn btn-sm btn-danger me-1" title="Delete" onclick="return confirm('Are you sure you want to delete this Schedule?')">
                                            <i class="fa fa-trash"></i>
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
    <div class="modal fade" id="setScheduleModal" tabindex="-1" aria-labelledby="setScheduleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('schedule.add') }}" class="form theme-form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="setScheduleModalLabel">Schedule Visit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-1">Client
                                        <x-required_field />
                                    </label>
                                    <select class="form-control" name="client">
                                        <option value="">Select Client</option>
                                        @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ old('client')==$client->id ? 'selected'
                                            : '' }}>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('client') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Staff Type
                                        <x-required_field />
                                    </label>
                                    <input type="hidden" name="staff_type" id="staff_type"
                                        value="{{ old('staff_type', 'nurse') }}">
                                    <div class="pill-toggle-group">
                                        <button type="button"
                                            class="pill-toggle {{ old('staff_type') != 'caregiver' ? 'active' : '' }}"
                                            data-type="nurse">
                                            <i class="fa fa-stethoscope"></i> Nurse
                                        </button>
                                        <button type="button"
                                            class="pill-toggle {{ old('staff_type') == 'caregiver' ? 'active' : '' }}"
                                            data-type="caregiver">
                                            <i class="fa fa-user"></i> Caregiver
                                        </button>
                                    </div>
                                    @error('staff_type') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-12" id="nurse_select"
                                style="{{ old('staff_type') == 'caregiver' ? 'display: none;' : '' }}">
                                <div class="form-group">
                                    <label class="mb-1">Select Nurse
                                        <x-required_field />
                                    </label>
                                    <select class="form-control" name="nurse" id="nurse">
                                        <option value="">Select Nurse</option>
                                        @foreach($nurses as $nurse)
                                        <option value="{{ $nurse->id }}" {{ old('nurse')==$nurse->id ? 'selected' :
                                            '' }}>{{ $nurse->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('nurse') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-12" id="caregiver_select"
                                style="{{ old('staff_type') == 'caregiver' ? '' : 'display: none;' }}">
                                <div class="form-group">
                                    <label class="mb-1">Select Caregiver
                                        <x-required_field />
                                    </label>
                                    <select class="form-control" name="caregiver" id="caregiver">
                                        <option value="">Select Caregiver</option>
                                        @foreach($caregivers as $caregiver)
                                        <option value="{{ $caregiver->id }}" {{ old('caregiver')==$caregiver->id ?
                                            'selected' : '' }}>{{ $caregiver->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('caregiver') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="mb-2">Visit Type
                                        <x-required_field />
                                    </label>
                                    <select class="form-control" name="visit_type" id="visit_type">
                                        <option value="">Select Visit Type</option>
                                        @foreach(['Medical Assessment', 'Initial Assessment', 'Reassessment',
                                        'Supervisory Visit', 'Wound Care', 'Medication Review', 'Health Monitoring',
                                        'Specialized Treatment'] as $type)
                                        <option value="{{ $type }}" {{ old('visit_type')==$type ? 'selected' : '' }}>{{
                                            $type }}</option>
                                        @endforeach
                                    </select>
                                    @error('visit_type') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label">Date
                                    <x-required_field />
                                </label>
                                <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                                @error('date') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label">Start Time
                                    <x-required_field />
                                </label>
                                <input type="time" class="form-control" name="start_time"
                                    value="{{ old('start_time') }}">
                                @error('start_time') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6 form-group">
                                <label class="form-label">End Time
                                    <x-required_field />
                                </label>
                                <input type="time" class="form-control" name="end_time" value="{{ old('end_time') }}">
                                @error('end_time') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-12 form-group">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control" name="notes" rows="3"
                                    placeholder="Add any special instructions or notes...">{{ old('notes') }}</textarea>
                                @error('notes') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-12 form-group">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="recurring_visit"
                                        id="recurring_visit" {{ old('recurring_visit') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="recurring_visit">Recurring Visit</label>
                                </div>
                                @error('recurring_visit') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="mb-3 col-md-12 form-group" id="frequency_field"
                                style="{{ old('recurring_visit') ? '' : 'display: none;' }}">
                                <label class="form-label" for="frequency">Frequency
                                    <x-required_field />
                                </label>
                                <select class="form-control" name="frequency" id="frequency">
                                    <option value="">Select Frequency</option>
                                    @foreach(['daily', 'weekly', 'bi-weekly', 'monthly'] as $freq)
                                    <option value="{{ $freq }}" {{ old('frequency')==$freq ? 'selected' : '' }}>{{
                                        ucfirst($freq) }}</option>
                                    @endforeach
                                </select>
                                @error('frequency') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Schedule Visit</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>


    </div>

</div>


@endsection
@section('scripts')
<script src="{{ asset('assets2/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('assets2/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('assets2/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
<script>
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
          $('#visit_type').html(`
          <option value="">Select Visit Type</option>
      <option value="Medical-Assessment">Medical Assessment</option>
      <option value="Initial-Assessment">Initial Assessment</option>
      <option value="Reassessment">Reassessment</option>
      <option value="Supervisory-Visit">Supervisory Visit</option>
      <option value="Wound-Care">Wound Care</option>
      <option value="Medication-Review">Medication Review</option>
      <option value="Health-Monitoring">Health Monitoring</option>
      <option value="Specialized-Treatment">Specialized Treatment</option>
          `);
        } else {
          $('#nurse_select').hide();
          $('#caregiver_select').show();
          $('#visit_type').html(`
               <option value="">Select Visit Type</option>
      <option value="Daily Care">Daily Care</option>
      <option value="Weekly Check-in">Weekly Check-in</option>
      <option value="Personal Care">Personal Care</option>
      <option value="Companionship">Companionship</option>
      <option value="Light_housekeeping">Light Housekeeping</option>
      <option value="Supervisory-Assessment">Supervisory Assessment</option>
      <option value="Care-Plan-Review">Care Plan Review</option>
          `);
        }
      });
    });

    // Initialize
    $(document).ready(function() {
      $('.pill-toggle[data-type="nurse"]').addClass('active');
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
