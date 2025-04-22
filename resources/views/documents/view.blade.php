@extends('admin.adminmaster')
@section('title')
Documents
@endsection
@section('style')
<style>

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
                        <h2>Documents</h2>
                        <h6 class="mb-0">Manage Your DOcuments</h6>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <a href="{{ route('add-client') }}" class="btn btn-sm btn-primary">
                            Add Document
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">Service Agreement</h6>
                                <p class="text-muted mb-0 small">Details of service contract</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">Service Plan</h6>
                                <p class="text-muted mb-0 small">Planned support services</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">Service Delivery</h6>
                                <p class="text-muted mb-0 small">Provided service records</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">Client Rights</h6>
                                <p class="text-muted mb-0 small">Policies on client rights</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">Supervisory Review</h6>
                                <p class="text-muted mb-0 small">Periodic review reports</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">Physician Form</h6>
                                <p class="text-muted mb-0 small">Doctor documentation</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">Satisfaction Eval</h6>
                                <p class="text-muted mb-0 small">Client feedback forms</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">Consent Form</h6>
                                <p class="text-muted mb-0 small">Signed client consents</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">Liability Release</h6>
                                <p class="text-muted mb-0 small">Release of responsibility</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card folder-card shadow-sm border p-3 transition">
                        <div class="d-flex align-items-center gap-3">
                            <div class="text-primary">
                                <i class="fa fa-folder" style="font-size: 40px"></i>
                            </div>
                            <div class="ms-3" style="margin-left:10px">
                                <h6 class="mb-1 fw-semibold">Clinical Progress</h6>
                                <p class="text-muted mb-0 small">Client health updates</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
</div>
<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderModalLabel">Order Details</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal">Close</button> --}}
                <button type="button" class="btn btn-primary" id="printBtn">Print</button>
            </div>
            <div class="modal-body">
                <div id="customerInfo" class="mb-3">
                    <!-- Customer information will be loaded here -->
                </div>
                <div id="orderItemsContainer">
                    <!-- Order items will be loaded here -->
                </div>
                <div id="totalAmountContainer" class="text-end">
                    <strong class="mt-2">Total Amount: $<span id="totalAmount">0.00</span></strong>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function() {


});
</script>

@endsection
