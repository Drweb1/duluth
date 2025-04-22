@extends('admin.adminmaster')
@section('title')
Customer deatils
@endsection
@section('content')
<div class="page-body-wrapper">
    <!-- Right sidebar Ends-->
    <div class="page-body">
      <div class="container-fluid">
        <div class="page-header">
          <div class="row">
            <div class="col-lg-6 main-header">
              <h2>{{$customer->name}}<span>Details</span></h2>
              <h6 class="mb-0">admin panel</h6>
            </div>
            <div class="col-lg-6 breadcrumb-right">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><i class="pe-7s-home"></i></a></li>
                <li class="breadcrumb-item">Details</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Container-fluid starts-->
      <div class="container-fluid">
        <div class="row">
            <!-- User Details Card -->
            <div class="col-sm-12 col-xl-12">
                <div class="card">
                    <div class="card-header b-l-primary">
                        <h5>User Details</h5>
                    </div>
                    <div class="card-body">
                        <!-- User Details -->
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Name:</strong> {{ $customer->name }}
                            </div>
                            <div class="col-md-3">
                                <strong>Email:</strong> {{ $customer->email }}
                            </div>
                            <div class="col-md-3">
                                <strong>Phone Number:</strong> {{ $customer->phone_number ?? 'N/A' }}
                            </div>
                            <div class="col-md-3">
                                <strong>City:</strong> {{ $customer->city ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="row">
                            <!-- Second Row: 4 fields -->
                            <div class="col-md-3">
                                <strong>State:</strong> {{ $customer->state ?? 'N/A' }}
                            </div>
                            <div class="col-md-3">
                                <strong>Address:</strong> {{ $customer->address ?? 'N/A' }}
                            </div>
                            <div class="col-md-3">
                                <strong>Postal Code:</strong> {{ $customer->postal_code ?? 'N/A' }}
                            </div>
                            <div class="col-md-3">
                                <strong>Country:</strong> {{ $customer->country ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="row">
                            <!-- Third Row: 2 fields -->
                            <div class="col-md-3">
                                <strong>Date of Birth:</strong> {{ $customer->dob ?? 'N/A' }}
                            </div>
                        </div>
                        <div class="row">
                            @if($customer->ssn_doc_path)
                                <div class="col-md-4 col-sm-12">
                                    <strong>Social Security Document:</strong>
                                    <a href="{{ asset('storage/' . $customer->ssn_doc_path) }}" target="_blank" class="btn btn-link">View SSN Document</a>
                                </div>
                            @endif
                            @if($customer->id_doc_path)
                                <div class="col-md-4 col-sm-12">
                                    <strong>ID Document:</strong>
                                    <a href="{{ asset('storage/' . $customer->id_doc_path) }}" target="_blank" class="btn btn-link">View ID Document</a>
                                </div>
                            @endif
                            @if($customer->utility_bill_doc_path)
                                <div class="col-md-4 col-sm-12">
                                    <strong>Utility Bill Document:</strong>
                                    <a href="{{ asset('storage/' . $customer->utility_bill_doc_path) }}" target="_blank" class="btn btn-link">View Utility Bill Document</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>



            <!-- Order Items Table -->
            <div class="col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header b-l-primary">
                        <h5>Order Items</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Order</th>
                                    <th>Total Price</th>
                                    <th>Statue</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Loop through order items -->
                                @foreach($customer->orders as $key => $order)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_no}}</td>
                                    <td>${{ number_format($order->price, 2) }}</td>
                                    <td>{{ $order->status}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Cart Items Table -->
            <div class="col-sm-12 col-xl-6">
                <div class="card">
                    <div class="card-header b-l-primary">
                        <h5>Cart Items</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Owner</th>
                                    <th>Payment Term</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @isset($customer->cart) <!-- Check if the customer has a cart -->
                                @if($customer->cart->cart_items->isNotEmpty())
                                    @foreach($customer->cart->cart_items as $key => $cartItem)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $cartItem->item->owner }}</td>
                                            <td>{{ $cartItem->item->payment_term }}</td>
                                            <td>${{ number_format($cartItem->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4">No items in the cart.</td>
                                    </tr>
                                @endif
                            @else
                                <tr>
                                    <td colspan="4">No cart associated with this customer.</td>
                                </tr>
                            @endisset

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

      </div>
      <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
  </div>
@endsection
