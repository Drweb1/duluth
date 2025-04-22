@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Checkout</h1>
    <div class="row">
        <!-- User Information Section -->
        <div class="col-md-8">
            <h4>User Information</h4>
            <!-- Display Success Message -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <!-- Display Validation Errors -->
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if ($customer)
            <p>Name: {{ $customer->name }}</p>
            <p>Email: {{ $customer->email }}</p>
            {{-- ... display other customer details as needed --}}

        @else
            <!-- Customer Form -->
            <form method="POST" action="{{ route('customers.store') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                            required>
                    </div>
                </div>
                <button class="btn th-btn mb-3" type="submit">Submit</button>
            </form>
            @endif
        </div>
        <div class="col-md-4">
            <h4>Order Summary</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Owner</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($cartItems) > 0)
                    @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->item->owner ?? 'N/A' }} #{{ $item->item->id ?? 'N/A' }} </td>
                        <td>${{ number_format($item->price, 2) }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="2" class="text-center">No items in cart</td>
                    </tr>
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total</th>
                        <th>${{ number_format($totalPrice, 2) }}</th>
                    </tr>
                </tfoot>
            </table>

            {{-- <button class="btn th-btn mb-3" type="button">Proceed to Payment</button> --}}
            @if($totalPrice>0)
            <a href="{{ route('checkout2') }}" class="btn th-btn mb-3">Pay with Stripe</a>
            @endif

        </div>

    </div>
</div>
    @endsection
