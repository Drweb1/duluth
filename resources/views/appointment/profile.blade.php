@extends('admin.adminmaster')
@section('title')
Schedule Profile
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<style>
    .avatar {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 50px;
        height: 50px;
        font-weight: bold;
    }
</style>
<div class="page-body-wrapper">
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom-0 pt-3">
                            <h5 class="font-weight-bold text-primary"><i class="fas fa-calendar-alt mr-2"></i> Schedule
                                Overview</h5>
                        </div>
                        <div class="card-body pt-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span><i class="fas fa-id-badge mr-2 text-muted"></i> External ID</span>
                                    <span class="font-weight-bold">{{ $schedule->external_id }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span><i class="fas fa-calendar-day mr-2 text-muted"></i> Date</span>
                                    <span class="font-weight-bold">{{ \Carbon\Carbon::parse($schedule->date)->format('M
                                        d, Y') }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span><i class="fas fa-clock mr-2 text-muted"></i> Time</span>
                                    <span class="font-weight-bold">
                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} -
                                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                                    </span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                                    <span><i class="fas fa-tag mr-2 text-muted"></i> Status</span>
                                    <span
                                        class="badge badge-{{ $schedule->status == 'Completed' ? 'success' : ($schedule->status == 'Pending' ? 'warning' : 'danger') }}">
                                        {{ $schedule->status }}
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card shadow-sm mb-4">
                        <div class="card-header bg-white border-bottom-0 pt-3">
                            <h5 class="font-weight-bold text-info"><i class="fas fa-user-nurse mr-2"></i> Assigned Staff
                            </h5>
                        </div>
                        <div class="card-body pt-0">
                            <div class="alert alert-light" role="alert">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar avatar-lg bg-info text-white rounded-circle mr-3">
                                        {{ strtoupper(substr($schedule->staff_type, 0, 1)) }}
                                    </div>
                                    <div>
                                        <h6 class="mb-0 font-weight-bold text-capitalize">{{ $schedule->staff_type }}
                                        </h6>
                                        <small class="text-muted">
                                            @if($schedule->staff_type == 'nurse' && $schedule->nurse_id)
                                            Nurse: {{ $schedule->get_nurse->name }}
                                            @elseif($schedule->caregiver_id)
                                            Caregiver: {{ $schedule->get_caregiver->name }}
                                            @else
                                            Not assigned
                                            @endif
                                        </small>
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="text-muted small mb-1">Visit Type</h6>
                                        <h5 class="mb-0 font-weight-bold">{{ $schedule->visit_type }}</h5>
                                    </div>
                                    <div class="text-right">
                                        <h6 class="text-muted small mb-1">Duration</h6>
                                        <h5 class="mb-0 font-weight-bold">
                                            @php
                                            $start = \Carbon\Carbon::parse($schedule->start_time);
                                            $end = \Carbon\Carbon::parse($schedule->end_time);
                                            echo $start->diffInHours($end) . ' hrs ' . $start->diff($end)->format('%I
                                            min');
                                            @endphp
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-lg-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-white border-bottom-0 pt-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="font-weight-bold text-secondary mb-0">
                                <i class="fas fa-calendar-check mr-2"></i> Visit Details
                            </h5>
                            <span class="badge badge-{{ $schedule->status == 'Completed' ? 'success' : ($schedule->status == 'Pending' ? 'warning' : 'danger') }}">
                                {{ $schedule->status }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="p-2 mb-2">
                                    <h6 class="text-muted small mb-1">Visit Type</h6>
                                    <p class="font-weight-bold mb-0">{{ $schedule->visit_type }}</p>
                                </div>
                                <div class="p-2 mb-2">
                                    <h6 class="text-muted small mb-1">Date & Time</h6>
                                    <p class="font-weight-bold mb-0">
                                        {{ \Carbon\Carbon::parse($schedule->date)->format('M d, Y') }}<br>
                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} -
                                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="p-2 mb-2">
                                    <h6 class="text-muted small mb-1">Duration</h6>
                                    <p class="font-weight-bold mb-0">
                                        @php
                                            $start = \Carbon\Carbon::parse($schedule->start_time);
                                            $end = \Carbon\Carbon::parse($schedule->end_time);
                                            echo $start->diffInHours($end) . ' hrs ' . $start->diff($end)->format('%I min');
                                        @endphp
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="p-2 mb-3">
                            <h6 class="text-muted small mb-2">Notes</h6>
                            <div class="p-2rounded">
                                {{ $schedule->notes ?? 'No notes available for this visit.' }}
                            </div>
                        </div>
                        @if($schedule->signature)
                        <div class="p-2 mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="text-muted small mb-0">Visit Signature</h6>
                                <small class="text-muted">Signed on {{ $schedule->updated_at->format('M d, Y \a\t h:i A') }}</small>
                            </div>
                            <div class="text-center p-2 rounded mt-2">
                                <img src="{{ asset('storage/signatures/' . basename($schedule->signature)) }}"
                                    alt="Visit signature" class="img-fluid" style="max-height: 60px;">
                            </div>
                        </div>
                        @endif
                        <div class="mt-4">
                            <h6 class="font-weight-bold text-primary mb-3">
                                <i class="fas fa-tasks mr-2"></i> Associated Tasks
                            </h6>

                            @if(isset($tasks) && count($tasks) > 0)
                            <div class="list-group">
                                @foreach($tasks as $task)
                                <div class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 class="font-weight-bold mb-1">{{ $task->get_task->title ?? ' '}}</h6>
                                            <p class="small text-muted mb-0">{{ $task->get_task->description ?? ' ' }}</p>
                                            <p class="small text-muted mb-0"><strong>Remarks:</strong>{{ $task->remarks ?? ' ' }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <div class="alert alert-light text-center py-4" role="alert">
                                <i class="fas fa-clipboard-list fa-2x mb-2 text-muted"></i>
                                <p class="mb-0">No tasks assigned to this visit</p>
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
