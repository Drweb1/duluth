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
                        <h2>View<span>orders</span></h2>
                        <h6 class="mb-0">admin panel</h6>
                    </div>
                    <div class="col-lg-6 breadcrumb-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                            <li class="breadcrumb-item">Orders</li>>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">

                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5>Orders List</h5>
                                </div>
                                <div class="col-md-8 text-end">
                                    <form class="form-inline" action="{{ route('orders') }}" method="get">
                                        <div class="form-group me-2">

                                                <div>
                                                    <select class="form-control" name="status">
                                                        <option value="">Select Status</option>
                                                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                                                        <option value="done" {{ request('status') == 'done' ? 'selected' : '' }}>Done</option>
                                                        <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                                    </select>
                                                </div>
                                        </div>

                                        <div class="form-group me-2 search-form">
                                            <div class="Typeahead Typeahead--twitterUsers">
                                                <div class="u-posRelative">
                                                    <input class="Typeahead-input form-control-plaintext" id="demo-input" type="text" name="customer_name" placeholder="Search by Customer..." value="{{ request('customer_name') }}">
                                                    <div class="spinner-border Typeahead-spinner" role="status">
                                                        <span class="sr-only">Loading...</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </form>
                                </div>


                            </div>

                        </div>


                        <div class="table-responsive">
                            <table class="table table-xl">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Price</th>
                                        <th>Placed at</th>
                                        {{-- <th>Status</th>
                                        <th>Delivery Date</th> --}}

                                        <th>CustomerEmail</th>

                                        {{-- <th>Address</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $order->order_no }}</td>
                                        <td>{{ $order->customer->name  }}</td>
                                        <td>{{ $order->total_price }}</td>
                                        <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                        {{-- <td>
                                            <span class="badge
                                    @if($order->status == 'Shipped') bg-success
                                    @elseif($order->status == 'Pending') bg-warning
                                    @elseif($order->status == 'Cancelled') bg-danger
                                    @endif">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($order->deliveredDate)->format('Y-m-d') ?? 'N/A' }}
                                        </td> --}}


                                        <td>{{ $order->customer->email}}</td>
                                        {{-- <td>{{ $order->street }}, {{ $order->city }}, {{ $order->postal_code }}</td> --}}
                                        <td>
                                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#orderModal" data-order-id="{{ $order->id }}">
                                               Details
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination pagination-primary mb-3 mt-3">
                                <li class="page-item {{ $orders->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $orders->previousPageUrl() }}"
                                        tabindex="-1">Previous</a>
                                </li>

                                @foreach($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                                <li class="page-item {{ $page == $orders->currentPage() ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                </li>
                                @endforeach
                                <li class="page-item {{ $orders->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="{{ $orders->nextPageUrl() }}">Next</a>
                                </li>
                            </ul>
                        </nav>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

// $(document).ready(function() {

//     console.log('shown');
//     $('#orderModal').on('show.bs.modal', function (event) {
//         console.log('triggerd');
//         var button = $(event.relatedTarget);
//         var orderId = button.data('order-id');
//         $.ajax({
//             url: '/orders/' + orderId + '/items',
//             method: 'GET',
//             success: function(data) {
//                 console.log(data);
//                 var itemsHtml = '<table class="table"><thead><tr><th>#</th><th>Item Owner</th><th>Type</th><th>Price</th><th>Payment Term</th></tr></thead><tbody>';
//                     $.each(data.items, function(index, item) {
//                         itemsHtml += '<tr><td>' + (index + 1) + '</td><td>' + item.items.owner + '</td><td>' + item.items.type + '</td><td>' + item.items.price + '</td><td>' + item.items.payment_term + '</td></tr>';
//                     });
//                     itemsHtml += '</tbody></table>';

//                 itemsHtml += '</tbody></table>';
//                 $('#orderItemsContainer').html(itemsHtml);
//             },
//             error: function() {
//                 $('#orderItemsContainer').html('<p>An error occurred while fetching order items.</p>');
//             }
//         });
//     });
// });
$(document).ready(function() {

console.log('shown');
$('#orderModal').on('show.bs.modal', function (event) {
    console.log('triggered');
    var button = $(event.relatedTarget);
    var orderId = button.data('order-id');
    $.ajax({
        url: '/orders/' + orderId + '/items',
        method: 'GET',
        success: function(data) {
            console.log(data);
            if (data.customer) { // Check if customer data exists
                var customerInfo = '<h3>Customer Information:</h3>' +
                                '<div class="row">' +
                                    '<div class="col-md-6">' +
                                        '<p><strong>Name:</strong> ' + data.customer.name + '</p>' +
                                        '<p><strong>Email:</strong> ' + data.customer.email + '</p>' +
                                        '<p><strong>Phone:</strong> ' + data.customer.phone_number + '</p>' +
                                    '</div>' +
                                    '<div class="col-md-6">' +
                                        '<p><strong>Postal Code:</strong> ' + (data.customer.postal_code || 'N/A') + '</p>' + // Assuming you have postal_code in the data
                                        '<p><strong>Country:</strong> ' + data.customer.country + '</p>' +
                                        '<p><strong>City:</strong> ' + data.customer.city + '</p>' +
                                        '<p><strong>Address:</strong> ' + data.customer.address + '</p>' +
                                    '</div>' +
                                '</div>';
                $('#customerInfo').html(customerInfo);
            } else {
                $('#customerInfo').html('<p>No customer information available.</p>');
            }
            // Order items table
            var itemsHtml = '<table class="table"><thead><tr><th>#</th><th>Item Owner</th><th>Type</th><th>Price</th><th>Payment Term</th></tr></thead><tbody>';
            $.each(data.items, function(index, item) {
                itemsHtml += '<tr><td>' + (index + 1) + '</td><td>' + item.items.owner + '</td><td>' + item.items.type + '</td><td>' + item.items.price + '</td><td>' + item.items.payment_term + '</td></tr>';
            });
            itemsHtml += '</tbody></table>';

            // Insert the order items HTML into the modal
            $('#orderItemsContainer').html(itemsHtml);

            // Calculate total amount
            var totalAmount = 0;
            $.each(data.items, function(index, item) {
                totalAmount += parseFloat(item.items.price); // Assuming price is a number
            });

            // Display total amount
            $('#totalAmount').text(totalAmount.toFixed(2));
        },
        error: function() {
            $('#orderItemsContainer').html('<p>An error occurred while fetching order items.</p>');
        }
    });
});
});
</script>
<script>
    $(document).ready(function() {
    // Print button functionality
    $('#printBtn').on('click', function() {
        var printContent = $('#orderModal .modal-body').html(); // Get the content of the modal body
        var printWindow = window.open('', '', 'height=600,width=800'); // Open a new window for printing

        // Add a basic style for the print content
        printWindow.document.write('<html><head><title>Order Details</title>');
        printWindow.document.write('<style>');
        printWindow.document.write('body { font-family: Arial, sans-serif; margin: 20px; }');
        printWindow.document.write('table { width: 100%; border-collapse: collapse; margin-top: 20px; }');
        printWindow.document.write('th, td { padding: 8px 12px; border: 1px solid #ddd; text-align: left; }');
        printWindow.document.write('h5 { color: #333; }');
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write('<h5>Order Details</h5>');
        printWindow.document.write(printContent); // Insert the modal content
        printWindow.document.write('</body></html>');

        printWindow.document.close(); // Close the document for writing

        // Trigger the print dialog
        printWindow.print();
    });
});

</script>
@endsection
