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
                        <h2>View<span>Clients</span></h2>
                        <h6 class="mb-0">Manage Your Clients</h6>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <a href="{{ route('add-client') }}" class="btn btn-sm btn-primary">
                            Add Client
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




                        <table class="display basic" id="basic">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Medicaid ID</th>
                                    <th>SSN</th>
                                    <th>Date of Birth</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>MD123456</td>
                                    <td>123-45-6789</td>
                                    <td>1985-07-10</td>
                                    <td>New York, USA</td>
                                    <td><span class="badge bg-success text-light">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary me-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger me-1" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info text-light" title="Profile">
                                            <i class="fa fa-user"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>MD654321</td>
                                    <td>987-65-4321</td>
                                    <td>1990-02-15</td>
                                    <td>Los Angeles, USA</td>
                                    <td><span class="badge bg-success text-light">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary me-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger me-1" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info text-light" title="Profile">
                                            <i class="fa fa-user"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mike Johnson</td>
                                    <td>MD111222</td>
                                    <td>321-54-9876</td>
                                    <td>1978-11-30</td>
                                    <td>Chicago, USA</td>
                                    <td><span class="badge bg-success text-light">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary me-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger me-1" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info text-light" title="Profile">
                                            <i class="fa fa-user"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Emma Wilson</td>
                                    <td>MD333444</td>
                                    <td>456-78-1234</td>
                                    <td>1995-05-25</td>
                                    <td>Houston, USA</td>
                                    <td><span class="badge bg-success text-light">Active</span></td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary me-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger me-1" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info text-light" title="Profile">
                                            <i class="fa fa-user"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>



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
