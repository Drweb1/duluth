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

    .signature-pad {
        margin: 0 auto;
        max-width: 500px;
    }

    #signature-canvas {
        width: 100%;
        height: 200px;
        touch-action: none;
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

            <div class="col-xl-4 box-col-12 xl-100">
                <div class="card btc-table">
                    <div class="card-header no-border text-center">
                        <h5 class="mb-1">{{ $schedule->get_client->name ?? 'Client Name' }}-(Visit Scheduled)</h5>
                        <p class="text-muted small mb-2">{{ $schedule->visit_type ?? 'Visit Type' }}</p>
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
                                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}-{{
                                            \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}
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
            <div class="col-xl-8 box-col-12 xl-100">
                <div class="container-fluid">

                    <div class="card" style="padding: 1rem; background:#f8f5fd">
                        <div class="row justify-content-center">
                            <h4>Tasks</h4>
                            <div class="col-md-12">
                                <form id="multiRemarksForm" action="{{ route('add_remarks_to_schedule') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @foreach ($tasks as $index => $task)
                                    @php
                                    $taskId = $task->id;
                                    @endphp

                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $index + 1 }}. {{ $task->get_task->title }}
                                            </h5>
                                            <p class="text-muted">{{ $task->get_task->description ?? 'No description' }}
                                            </p>

                                            <div class="form-group mt-3">
                                                <label for="remarks_{{ $taskId }}" class="form-label">Remarks</label>
                                                <textarea name="remarks[{{ $taskId }}]" id="remarks_{{ $taskId }}"
                                                    class="form-control" rows="3"
                                                    placeholder="Enter your remarks here...">{{ old("remarks.$taskId", $task->remarks ?? '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-primary">Submit All Remarks with
                                            Signature</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <div class="card mb-3" style="padding: 1rem; background:#f8f5fd">
                        <div class="card-body">

                            <h5 class="card-title">Caregiver/Nurse Signature</h5>
                            <div class="container-fluid">
                                <div class="card" style="padding: 1rem;">
                                    <form action="{{ route('add_signature', ['id' => $schedule->id]) }}"
                                        method="POST" class="form theme-form" id="signatureForm">
                                        @csrf
                                        <div class="form-group mt-3">
                                            <label class="form-label">Signature</label>
                                            <div id="signature-pad" class="signature-pad"
                                                style="border: 1px solid #ddd; background: white;">
                                                <canvas id="signature-canvas" width="500" height="200"
                                                    style="border: 1px solid #ddd;"></canvas>
                                            </div>
                                            <div class="mt-2">
                                                <button type="button" id="clear-signature"
                                                    class="btn btn-sm btn-secondary">Clear</button>
                                            </div>
                                            <input type="hidden" name="signature" id="signature-data">
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-primary">Save
                                                Signature</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



        </div>

    </div>
</div>
@endsection
@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
          const canvas = document.getElementById('signature-canvas');
      const signaturePad = new SignaturePad(canvas, {
                                                backgroundColor: 'rgb(255, 255, 255)'
                                            });
                                            const signatureData = document.getElementById('signature-data');
                                            const form = document.getElementById('signatureForm');
                                            const clearButton = document.getElementById('clear-signature');

                                            // Handle form submission
                                            form.addEventListener('submit', function(e) {
                                                if (signaturePad.isEmpty()) {
                                                    alert('Please provide your signature');
                                                    e.preventDefault();
                                                } else {
                                                    signatureData.value = signaturePad.toDataURL('image/png');
                                                }
                                            });

                                            // Clear signature
                                            clearButton.addEventListener('click', function() {
                                                signaturePad.clear();
                                            });

                                            // Handle window resize
                                            function resizeCanvas() {
                                                const ratio = Math.max(window.devicePixelRatio || 1, 1);
                                                canvas.width = canvas.offsetWidth * ratio;
                                                canvas.height = canvas.offsetHeight * ratio;
                                                canvas.getContext('2d').scale(ratio, ratio);
                                                signaturePad.clear();
                                            }

                                            window.addEventListener('resize', resizeCanvas);
                                            resizeCanvas();
                                        });
</script>


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
