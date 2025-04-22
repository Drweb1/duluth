@extends('layouts.master')
<style>
    .table-wrapper {
        width: 100%;
        max-width: 1200px;
      margin: 20px auto;
      padding: 1rem;
      background-color: #f9f9f9;
      border-radius: 8px;
      overflow-x: auto;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
  }
  .item-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
  }
  .item-table th, .item-table td {
      padding: 12px 20px;
      text-align: left;
  }
  .item-table th {
    font-weight: 600;
    color: #ffffff;
    background-color: #2b5487;
    text-transform: uppercase;
    white-space: normal; /* Allows text to wrap within the cell */
    word-wrap: break-word;
    font-size: 0.9rem;
  }
  .item-table td {
      background-color: #fff;
      font-size: 0.95rem;
      white-space: normal; /* Allows text to wrap within the cell */
      word-wrap: break-word;
  }
  .item-table tr:not(:last-child) td {
      border-bottom: 1px solid #ddd;
  }
  .item-table tr:hover td {
      background-color: #f1faff;
  }
  .add-to-cart-btn {
      display: inline-block;
      padding: 8px 12px;
      font-size: 0.9rem;
      color: #fff;
      background-color: #28a745;
      text-decoration: none;
      border-radius: 4px;
      text-align: center;
  }
  .add-to-cart-btn:hover {
      background-color: #218838;
  }
  @media (max-width: 768px) {
    .item-table th, .item-table td {
        padding: 8px 10px; /* Adjust padding for mobile */
        font-size: 0.8rem; /* Smaller font for mobile */
    }

    .table-wrapper {
        padding: 0.5rem;
        margin: 0 auto;
    }
}
.remove-item-btn {
    padding: 4px; /* Reduce padding on the button */
    font-size: 1rem; /* Smaller icon size */
}
@media (max-width: 576px) {
    .item-table th, .item-table td {
        padding: 6px 8px; /* Even smaller padding for very small screens */
        font-size: 0.75rem; /* Smaller font size */
    }

    .item-table {
        margin-top: 10px;
    }

    .table-wrapper {
        margin: 10px auto;
        padding: 0.5rem;
    }
}

      </style>
@section('content')
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Cart</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li>Items in your cart</li>
            </ul>
        </div>
    </div>
</div>

<div class="table-wrapper">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="item-table">
                <thead>
                    <tr>
                        <th>Owner</th>
                        <th>Open Date</th>
                        <th>Total Value ($)</th>
                        <th>Payment Term</th>
                        <th>Price ($)</th>
                        <th>Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(empty($cartItems))
                        <tr>
                            <td colspan="7" class="text-center">Your cart is empty.</td>
                        </tr>
                    @else
                        @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item->item->owner }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
                            <td>${{ number_format($item->item->total_value, 2) }}</td>
                            <td>{{ $item->item->payment_term }}</td>
                            <td>${{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->item->type }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-item-btn" title="Remove Item" style="border: none; background: none;">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</div>
<div class="container">
    @if(!empty($cartItems))
    <div class="cart-total" style="text-align: end;">
        <h5>Total Price: ${{ number_format($cart->total_price, 2) }}</h5>
        <a href="{{ route('checkout') }}" class="btn th-btn mb-3">Proceed to Checkout</a>
    </div>
@endif

</div>


@endsection
