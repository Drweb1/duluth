@extends('layouts.master')
@section('content')
<div class="container mt-5">
    {{-- <h1 class="text-center mb-4">Checkout</h1> --}}
    <div class="row">
        <!-- User Information Section -->
        <div class="col-md-12 text-center">
                <img src="{{ asset('assets/img/success.gif') }}" style="height: 200px">
                <h3>Payment Has been completed succesfully</h3>
                <h6>Please update your profile information to furthe procced.</h6>
                <div class=" text-center mb-4">
                    <a href="{{ route('profile') }}" class="th-btn">Click To Update</a>
                </div>
        </div>
    </div>
</div>
    @endsection
