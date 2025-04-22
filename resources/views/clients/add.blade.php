@extends('admin.adminmaster')
@section('title')
Orders
@endsection
@section('content')
<div class="page-body-wrapper">
    <!-- Right sidebar Ends-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6 main-header">
                        <h2>Add<span>Client</span></h2>

                    </div>
                    <div class="col-lg-6 text-right ">
                        <a href="{{ route('view-clients') }}" class="btn btn-sm btn-primary">
                             Client List
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form>
                        <div class="row">
                                <div class="form-group col-md-6 ">
                                    <label class="f-w-700">First Name </label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="First Name" required>
                                </div>
                                <div class="form-group col-md-6 position-relative">
                                    <label class="f-w-700">Last Name </label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required>

                                </div>
                                <div class="form-group col-md-6 position-relative">
                                    <label class="f-w-700">Medicaid Id </label>
                                    <input type="text" class="form-control" name="medicaid_id" id="medicaid_id" placeholder="Medicaid Id " required>

                                </div>
                                <div class="form-group col-md-6 position-relative">
                                    <label class="f-w-700">SSN</label>
                                    <input type="text" class="form-control" name="ssn" id="ssn" placeholder="Enter SSN" required>

                                </div>
                                <div class="form-group col-md-6 position-relative">
                                    <label class="f-w-700">Date Of Birth</label>
                                    <input type="date" class="form-control" name="dob" id="dob" required>
                                </div>
                                <div class="form-group col-md-6 position-relative">
                                    <label class="f-w-700">City</label>
                                    <input type="text" class="form-control" name="city" id="city" placeholder="Enter City" required>
                                </div>
                                <div class="form-group col-md-6 position-relative">
                                    <label class="f-w-700">Country</label>
                                    <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country" required>
                                </div>
                                <div class="form-group col-md-12 position-relative">
                                    <label class="f-w-700">Address</label>
                                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" required>
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
