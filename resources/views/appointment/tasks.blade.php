@extends('admin.adminmaster')
@section('title')
Tasks
@endsection
@section('content')

<style>
    tr:hover {
        background-color: #f5f5f5;
    }
    #basic tbody tr {
        cursor: pointer;
    }
</style>
<div class="page-body-wrapper">

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">

                    <div class="col-lg-6 main-header">
                        <h2>View<span>Tasks</span></h2>
                        <h6 class="mb-0">Manage Your Tasks</h6>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-primary">
                          Back
                        </a>
                    </div>
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
            <div class="row">
                <div class="col-md-8">
                    <div class="container-fluid">
                        <div class="card" style="padding: 1rem;">
                            <table class="display basic" id="basic">
                                <thead>
                                    <tr>
                                        <th>Task_Id</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tasks as $task)
                                        @php
                                            $taskId = $task->id;
                                        @endphp
                                        <tr data-bs-toggle="modal" data-bs-target="#taskModal{{ $taskId }}" style="cursor: pointer;">
                                            <td>{{ $task->get_task->external_id }}</td>
                                            <td>{{ $task->get_task->title }}</td>
                                            <td>{{ Str::limit($task->get_task->description ?? 'N/A', 50) }}</td>
                                        </tr>
                                        <div class="modal fade" id="taskModal{{ $taskId }}" tabindex="-1" aria-labelledby="taskModalLabel{{ $taskId }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-primary text-white">
                                                        <h5 class="modal-title" id="taskModalLabel{{ $taskId }}">Task Details</h5>
                                                         </div>
                                                    <div class="modal-body">
                                                        @if(!empty($task->remarks))
                                                        <h6>Previous Remarks:</h6>
                                                        <div class="alert alert-secondary" role="alert">
                                                            {{ $task->remarks }}
                                                        </div>
                                                    @else
                                                        <div class="alert alert-warning" role="alert">
                                                            No remarks added yet.
                                                        </div>
                                                    @endif

                                                        <form action="{{ route('add_remarks_to_schedule') }}" class="form theme-form" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="task_id" value="{{ $taskId }}">

                                                            <div class="mb-3">
                                                                <h6>Add New Remark</h6>
                                                                <textarea name="remarks" class="form-control" rows="3" placeholder="Add your remarks here..."></textarea>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save Remarks</button>
                                                            </div>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>



                <div class="col-xl-4 box-col-12 xl-100">
                    <div class="card btc-table">
                        <div class="card-header no-border text-center">
                            <h5 class="mb-2">Schedule Details</h5>
                            <ul class="creative-dots">
                                <li class="bg-primary big-dot"></li>
                                <li class="bg-secondary semi-big-dot"></li>
                                <li class="bg-warning medium-dot"></li>
                                <li class="bg-info semi-medium-dot"></li>
                                <li class="bg-secondary semi-small-dot"></li>
                                <li class="bg-primary small-dot"></li>
                            </ul>
                        </div>

                        <div class="card-body pt-0">
                            <ul class="btc-buy-sell">
                                <li>
                                    <div class="row">
                                        <div class="col-sm-5 btc-table-xs">
                                            <div class="btc-amount default-text f-w-700 text-center">Date</div>
                                        </div>
                                        <div class="col-sm-7 p-l-0 btc-table-xs-l">
                                            <div class="btc-amount f-w-700 default-text">
                                                {{ \Carbon\Carbon::parse($schedule->date)->format('d M, Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-sm-5 btc-table-xs">
                                            <div class="btc-amount font-primary f-w-700 text-center">Duration</div>
                                        </div>
                                        <div class="col-sm-7 p-l-0 btc-table-xs-l">
                                            <div class="btc-amount f-w-700 font-primary">
                                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}-{{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="btc-buy text-center">
                                <form class="form theme-form" method="POST" action="{{ route('update_status') }}">
                                    @csrf
                                    <input type="hidden" value="{{ $schedule->id }}" name="schedule_id">

                                    <div class="form-group mt-3">
                                        <select class="form-control" id="status" name="status" style="height: 41px;">
                                            <option value="">Select Status</option>
                                            <option value="Pending">Pending</option>
                                            <option value="In Progress">In Progress</option>
                                            <option value="Completed">Completed</option>
                                            <option value="Cancelled">Cancelled</option>
                                        </select>
                                        @error('status') <small class="text-danger">{{ $message }}</small> @enderror
                                    </div>

                                    <button type="submit" class="btn btn-pill btn-secondary f-w-700 mt-3">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable if needed
        $('#basic').DataTable();
        $('#basic tbody').on('click', 'tr', function() {
            const taskId = $(this).data('task-id');
            const taskExternalId = $(this).find('td:eq(0)').text();
            const taskTitle = $(this).find('td:eq(1)').text();
            const taskDescription = $(this).find('td:eq(2)').text();
            $('#modalTaskId').text(taskExternalId);
            $('#modalTaskTitle').text(taskTitle);
            $('#modalTaskDescription').text(taskDescription);

            $('#taskModal').modal('show');
        });

        $('#saveRemarksBtn').click(function() {
            const remarks = $('#taskRemarks').val();
            const taskId = $('tr.selected').data('task-id');
            console.log('Saving remarks for task:', taskId, remarks);
            $('#taskModal').modal('hide');
        });
    });
    </script>

@endsection
