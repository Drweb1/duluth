@extends('layouts.master')
<style>
    .table-wrapper {
      margin: 20px auto;
      padding: 1rem;
      background-color: #f9f9f9;
      border-radius: 8px;
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
    font-size: 0.9rem;
  }
  .item-table td {
      background-color: #fff;
      font-size: 0.95rem;
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
.table-wrapper {
    overflow-x: auto;
    width: 100%;
}

.item-table {
    width: 100%;
    border-collapse: collapse;
}
    @media (max-width: 768px) {
    .item-table,
    .item-table tbody,
    .item-table tr,
    .item-table td {
        display: block; /* Make each row a block */
        width: 100%; /* Full width for each block */
    }

    .item-table tr {
        margin-bottom: 15px; /* Space between rows */
        border: none; /* Remove border for block elements */
    }
    .item-table th {
        display: none
    }
    .item-table td {
        position: relative; /* Position for pseudo-element */
        padding-left: 50%; /* Space for the label */
        text-align: right; /* Align text to the right */
    }

    .item-table td:before {
        content: attr(data-label); /* Use data-label as a pseudo-element */
        position: absolute;
        left: 10px; /* Adjust as needed */
        width: calc(50% - 20px); /* Adjust for padding */
        white-space: nowrap; /* Prevent wrapping */
        font-weight: bold; /* Bold for the labels */
        text-align: left; /* Align labels to the left */
    }
    .add-to-cart-btn {
        width: 100%;
        padding: 10px;
        font-size: 1rem;
        margin-top: 10px;
    }
}

      </style>
@section('content')
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Unleash Your Potential with Our Pricing Plans</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li>Pricing Options</li>
            </ul>
        </div>
    </div>
</div>

<section class="space" id="service-sec">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="title-area text-center">
                    <span class="sub-title sub-title3">Our Services</span>
                    <h2 class="sec-title">Empower Your Financial Future with Our Expert Tradeline Services</h2>
                </div>
            </div>
        </div>
        <div class="row gy-4">
            <div class="col-xxl-3 col-xl-4 col-md-6">
                <div class="service-featured style2">
                    <div class="box-icon">
                        <img src="assets/img/icon/service_1_1.svg" alt="Icon" style="margin-top: 20px;">
                    </div>
                    <h3 class="box-title"><a href="#">Tradeline Consulting</a></h3>
                    <p class="box-text">Expert guidance on selecting and managing tradelines to enhance your credit profile.</p>
                    {{-- <a href="#" class="th-btn">Read More<i class="fa-regular fa-arrow-right"></i></a> --}}
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-md-6">
                <div class="service-featured style2">
                    <div class="box-icon">
                        <img src="assets/img/icon/service_1_2.svg" alt="Icon" style=" margin-top: 20px;">
                    </div>
                    <h3 class="box-title"><a href="#">Credit Score Analysis</a></h3>
                    <p class="box-text">Comprehensive assessment of your credit score to identify areas for improvement.</p>
                    {{-- <a href="#" class="th-btn">Read More<i class="fa-regular fa-arrow-right"></i></a> --}}
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-md-6">
                <div class="service-featured style2">
                    <div class="box-icon">
                        <img src="assets/img/icon/service_1_3.svg" alt="Icon" style="    margin-top: 20px;">
                    </div>
                    <h3 class="box-title"><a href="#">Credit Building Strategies</a></h3>
                    <p class="box-text">Tailored strategies to build and maintain a strong credit profile over time.</p>
                    {{-- <a href="#" class="th-btn">Read More<i class="fa-regular fa-arrow-right"></i></a> --}}
                </div>
            </div>

            <div class="col-xxl-3 col-xl-4 col-md-6">
                <div class="service-featured style2">
                    <div class="box-icon">
                        <img src="assets/img/icon/service_1_4.svg" alt="Icon" style="    margin-top: 20px;">
                    </div>
                    <h3 class="box-title"><a href="#">Debt Management</a></h3>
                    <p class="box-text">Strategies and support for managing existing debts effectively.</p>
                    {{-- <a href="#" class="th-btn">Read More<i class="fa-regular fa-arrow-right"></i></a> --}}
                </div>
            </div>



        </div>
    </div>
</section>
<div class="table-wrapper">
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
            @foreach($tradelines as $tradeline)
                <tr>
                    <td data-label="Owner">{{ $tradeline->owner }}</td>
                    <td data-label="Open Date">{{ \Carbon\Carbon::parse($tradeline->open_date)->format('Y-m-d') }}</td>
                    <td data-label="Total Value ($)">{{ number_format($tradeline->total_value, 2) }}</td>
                    <td data-label="Payment Term">{{ $tradeline->payment_term }}</td>
                    <td data-label="Price ($)">{{ number_format($tradeline->price, 2) }}</td>
                    <td data-label="Type">{{ $tradeline->type }}</td>
                    <td data-label="Action">
                        <form action="{{ route('add_cart') }}" method="POST">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $tradeline->id }}">
                            <input type="hidden" name="price" value="{{ $tradeline->price }}">
                            <button type="submit" class="add-to-cart-btn">
                                Add to Cart
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-links">
        {{ $tradelines->links() }}
    </div>
</div>


@endsection
