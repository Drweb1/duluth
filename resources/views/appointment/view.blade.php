@extends('admin.adminmaster')
@section('title')
Orders
@endsection
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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

    .calendar-header {
        margin-bottom: 15px;
    }

    .calendar-header th {
        padding: 10px;
    }

    .calendar-body {
        border: 1px solid #dee2e6;
    }

    .calendar-row {
        display: flex;
        min-height: 80px;
        border-bottom: 1px solid #dee2e6;
    }

    .calendar-time {
        width: 80px;
        padding: 10px;
        background-color: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
    }

    .calendar-days {
        display: flex;
        flex: 1;
    }

    .calendar-day {
        flex: 1;
        padding: 5px;
        border-right: 1px solid #dee2e6;
        position: relative;
    }

    .calendar-day.today {
        background-color: #f8f9fa;
    }

    .appointment {
        background-color: #e9f7fe;
        border: 1px solid #bee1fa;
        border-radius: 4px;
        padding: 2px;
        margin-bottom: 5px;
    }

    .appointment-time {
        font-size: 12px;
        color: #666;
    }

    .appointment-staff {
        font-weight: bold;
        margin: 3px 0;
    }

    .appointment-client {
        font-size: 13px;
    }

    .appointment-actions {
        margin-top: 5px;
        display: flex;
        gap: 5px;
    }

    .appointment-actions .btn {
        padding: 0.15rem 0.3rem;
        font-size: 12px;
    }

    .view-toggle.active {
        background-color: #0d6efd;
        color: white;
    }
    .select2-container--default .select2-selection--multiple {
        min-height: 40px !important;
    padding: 4px !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        min-height: 45px;
        padding-bottom: 5px;
    }

    .select2-container--default .select2-search--inline .select2-search__field {
        margin-top: 10px;
    }
</style>


<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="page-body-wrapper">
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
                        <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                        data-bs-target="#addTaskModal" style="margin-left: 10px;">
                        Add Task
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
                @php
                use Carbon\Carbon;
                @endphp

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <button class="btn-outline-secondary me-2" id="prev-period">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <h4 class="mb-0" id="current-period">{{ $startDate->format('F j') }} - {{
                                    $endDate->format('F j, Y') }}</h4>
                                <button class="btn-outline-secondary ms-2" id="next-period">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-outline-secondary view-toggle active"
                                    data-view="week">Week</button>
                                <button class="btn btn-sm btn-outline-secondary view-toggle"
                                    data-view="month">Month</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="calendar-header">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            @php
                                            $days = [];
                                            $currentDay = $startDate->copy();
                                            while ($currentDay <= $endDate) { $days[]=$currentDay->copy();
                                                $currentDay->addDay();
                                                }
                                                @endphp
                                                @foreach($days as $day)
                                                <th class="{{ $day->isToday() ? 'bg-light' : '' }}">
                                                    <div>{{ $day->format('D') }}</div>
                                                    <div>{{ $day->format('M j') }}</div>
                                                </th>
                                                @endforeach
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="calendar-body">
                                @php
                             $startTime = Carbon::createFromTime(0, 0, 0);
                                $endTime = Carbon::createFromTime(23, 0, 0);

                                $timeSlots = [];
                                while ($startTime <= $endTime) { $timeSlots[]=$startTime->copy();
                                    $startTime->addHour();
                                    }
                                    @endphp

                                    @foreach($timeSlots as $time)
                                    <div class="calendar-row">
                                        <div class="calendar-time">{{ $time->format('h A') }}</div>
                                        <div class="calendar-days">
                                            @foreach($days as $day)
                                            <div class="calendar-day {{ $day->isToday() ? 'today' : '' }}">
                                                @php
                                                $appointments = $schedules->filter(function($schedule) use ($day, $time)
                                                {
                                                $scheduleDate = Carbon::parse($schedule->date);
                                                $scheduleStart = Carbon::parse($schedule->start_time);
                                                $scheduleEnd = Carbon::parse($schedule->end_time);
                                                return $scheduleDate->isSameDay($day) &&
                                                $scheduleStart->format('H') == $time->format('H');
                                                });
                                                @endphp

                                                @if($appointments->count() > 0)
                                                <div class="appointments-container">
                                                    @foreach($appointments as $appointment)
                                                    <div class="appointment">
                                                        <div class="appointment-time">
                                                            {{
                                                            \Carbon\Carbon::parse($appointment->start_time)->format('h:i
                                                            A') }} -
                                                            {{
                                                            \Carbon\Carbon::parse($appointment->end_time)->format('h:i
                                                            A') }}
                                                        </div>
                                                        <div class="appointment-staff"
                                                            style="display: flex; align-items: center; gap: 4px;">
                                                            <strong style="display: inline;">
                                                                {{ $appointment->get_nurse->name ??
                                                                $appointment->get_caregiver->name }}
                                                            </strong>
                                                            <span style="display: inline;">({{ $appointment->staff_type
                                                                }})</span>
                                                        </div>

                                                        <div class="appointment-client">
                                                            {{ $appointment->get_client->name }}
                                                        </div>
                                                        <div class="appointment-actions">
                                                            <a href="{{ route('schedule.edit', $appointment->id) }}"
                                                                class="btn btn-xs btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('schedule.delete', $appointment->id) }}"
                                                                class="btn btn-xs btn-danger"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                             <a href="{{ route('schedule.profile', $appointment->id) }}"
                                                                class="btn btn-xs btn-primary">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                @endif
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                </div>



                @php
                function calculateHeight($appointment) {
                $start = Carbon::parse($appointment->start_time);
                $end = Carbon::parse($appointment->end_time);
                $duration = $end->diffInMinutes($start);
                return max(50, $duration / 60 * 50); // 50px per hour
                }
                @endphp
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
                            <div class="col-md-6 form-group mt-3">
                                <label class="form-label">Select Tasks <x-required_field /></label>
                                <select name="tasks[]" class="form-control select2-multiple" multiple="multiple" style="min-height: 45px;">
                                    @foreach($tasks as $task)
                                        <option value="{{ $task->id }}" {{ (collect(old('tasks'))->contains($task->id)) ? 'selected' : '' }}>
                                            {{ $task->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('tasks') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>


                            <div class="mb-3 col-md-6 form-group">
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
    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="addTaskModalLabel">Add Task</h5>
            </div>

            <div class="modal-body">
              <form action="{{ route('add_task') }}" class="form theme-form" method="POST">
                @csrf
                <div class="mb-3 form-group">
                  <label for="taskName" class="form-label">Title <x-required_field /></label>
                  <input type="text" class="form-control" id="title" name="title">
                  @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="mb-3 form-group">
                  <label for="taskDescription" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                  @error('description') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save Task</button>
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2-multiple').select2({
            placeholder: "Select tasks",
            allowClear: true,
            width: '100%',
            closeOnSelect: false
        });
    });
    </script>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let currentStartDate = new Date('{{ $startDate->format('Y-m-d') }}');
        let currentEndDate = new Date('{{ $endDate->format('Y-m-d') }}');
        let currentView = 'week';

        // Initialize the calendar
        updateNavigationButtons();
        document.getElementById('prev-period').addEventListener('click', function() {
            navigate(-1);
        });

        document.getElementById('next-period').addEventListener('click', function() {
            navigate(1);
        });

        // View toggle buttons
        document.querySelectorAll('.view-toggle').forEach(button => {
            button.addEventListener('click', function() {
                document.querySelectorAll('.view-toggle').forEach(btn => {
                    btn.classList.remove('active');
                });
                this.classList.add('active');
                currentView = this.dataset.view;

                // Reset to current week/month when changing views
                const today = new Date();
                if (currentView === 'week') {
                    currentStartDate = new Date(today);
                    currentStartDate.setDate(today.getDate() - today.getDay());
                    currentEndDate = new Date(currentStartDate);
                    currentEndDate.setDate(currentStartDate.getDate() + 6);
                } else {
                    currentStartDate = new Date(today.getFullYear(), today.getMonth(), 1);
                    currentEndDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
                }

                updateCalendar();
            });
        });

        function navigate(direction) {
            if (currentView === 'week') {
                currentStartDate.setDate(currentStartDate.getDate() + (direction * 7));
                currentEndDate.setDate(currentEndDate.getDate() + (direction * 7));
            } else if (currentView === 'month') {
                currentStartDate.setMonth(currentStartDate.getMonth() + direction);
                currentEndDate = new Date(
                    currentStartDate.getFullYear(),
                    currentStartDate.getMonth() + 1,
                    0
                );
            }
            updateCalendar();
        }

        function updateCalendar() {
            updateNavigationButtons();

            const params = new URLSearchParams({
                start_date: formatDateForRequest(currentStartDate),
                end_date: formatDateForRequest(currentEndDate),
                view: currentView
            });

            window.location.href = `{{ route('schdules') }}?${params.toString()}`;
        }

        function updateNavigationButtons() {
            if (currentView === 'week') {
                document.getElementById('current-period').textContent =
                    `${formatDate(currentStartDate)} - ${formatDate(currentEndDate)}`;
            } else {
                const monthName = currentStartDate.toLocaleString('default', { month: 'long' });
                document.getElementById('current-period').textContent =
                    `${monthName} ${currentStartDate.getFullYear()}`;
            }
        }
        function formatDate(date) {
            const options = { month: 'short', day: 'numeric' };
            const startStr = date.toLocaleDateString('en-US', options);

            if (currentView === 'month') {
                const year = date.getFullYear();
                return `${startStr} - ${date.getDate()}, ${year}`;
            }
            return startStr;
        }

        function formatDateForRequest(date) {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }
    });
</script>

@endsection
