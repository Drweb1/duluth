@extends('layouts.master')

@section('content')
<div class="breadcumb-wrapper" data-bg-src="assets/img/bg/breadcumb-bg.jpg">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Add Info</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('index')}}">Home</a></li>
                <li>Info Form</li>
            </ul>
        </div>
    </div>
</div>
<div class="space">
    <div class="container">
        <div class="row gy-4 flex-row-reverse">
            <h3>Add your info</h3>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
            </div>
        @endif
            <div class="col-lg-12 col-xl-10">
{{-- @if(session()->has('errors'))
                            <p class="text-danger">{{ session('errors') }}</p>
                         @endif --}}
                <form action="{{ route('customer.store_info') }}" method="POST" class="user-form input-smoke ajax-user-form" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 position-relative">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Name" maxlength="50" value="{{ old('name', $customer->name ?? '') }}" >
                            <i class="fal fa-user form-icon"></i>

                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" maxlength="100" value="{{ old('email', $customer->email ?? '') }}">
                            <i class="fal fa-envelope form-icon"></i>
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="{{old('password',$customer->password ?? '')}}">
                            <i class="fal fa-lock form-icon"></i>
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="tel" class="form-control" name="phone_number" id="phone_number" placeholder="Phone Number" maxlength="20" value="{{ old('phone_number', $customer->phone_number ?? '') }}">
                            <i class="fal fa-phone form-icon"></i>
                            @error('phone_number')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address" maxlength="255" value="{{ old('address', $customer->address ?? '') }}">
                            <i class="fal fa-map-marker form-icon"></i>
                             @error('address')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="text" class="form-control" name="city" id="city" placeholder="City" maxlength="50" value="{{ old('city', $customer->city ?? '') }}">
                            <i class="fal fa-city form-icon"></i>
                            @error('city')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="text" class="form-control" name="state" id="state" placeholder="State" maxlength="50" value="{{ old('state', $customer->state ?? '') }}">
                            <i class="fal fa-flag form-icon"></i>
                            @error('state')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" maxlength="20" value="{{ old('postal_code', $customer->postal_code ?? '') }}">
                            <i class="fal fa-mail-bulk form-icon"></i>
                            @error('postal_code')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="text" class="form-control" name="country" id="country" placeholder="Country" maxlength="50" value="{{ old('country', $customer->country ?? '') }}">
                            <i class="fal fa-globe form-icon"></i>
                            @error('country')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="text" class="form-control" name="social_security_no" id="social_security_no" placeholder="Social Security Number" value="{{ old('social_security_no', $customer->social_security_no ?? '') }}">
                            <i class="fal fa-id-card form-icon"></i>
                            @error('social_security_no')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>
                        <div class="form-group col-md-6 position-relative">
                            <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" value="{{ old('dob', $customer->dob ?? '') }}">
                            <i class="fal fa-calendar form-icon"></i>
                            @error('dob')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ssn_doc" class="form-label">SSN Document</label>
                            <input type="file" name="ssn_doc" id="ssn_doc" style="height: 34px">
                            @if ($customer && $customer->ssn_doc_path)
                                <div>
                                    <a href="{{ asset('storage/' . $customer->ssn_doc_path) }}" target="_blank">View SSN Document</a>
                                </div>
                            @endif
                            @error('ssn_doc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="id_doc" class="form-label">ID Document</label>
                            <input type="file" name="id_doc" id="id_doc" style="height: 34px">
                            @if ($customer && $customer->id_doc_path)
                                <div>
                                    <a href="{{ asset('storage/' . $customer->id_doc_path) }}" target="_blank">View ID Document</a>
                                </div>
                            @endif
                            @error('id_doc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="utility_bill_doc" class="form-label">Utility Bill Document</label>
                            <input type="file" name="utility_bill_doc" id="utility_bill_doc" style="height: 34px">
                            @if ($customer && $customer->utility_bill_doc_path)
                                <div>
                                    <a href="{{ asset('storage/' . $customer->utility_bill_doc_path) }}" target="_blank">View Utility Bill Document</a>
                                </div>
                            @endif
                            @error('utility_bill_doc')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-btn col-12">
                            <button class="th-btn">Add User</button>
                        </div>
                    </div>
                    <p class="form-messages mb-0 mt-3"></p>
                </form>

            </div>
            {{-- <div class="col-lg-6 col-xl-5">
                <div class="contact-item-wrap">
                    <div class="title-area mt-n2 mb-40">
                        <h3 class="sec-title">User Details</h3>
                        <p>Provide all necessary details to add a new user to the system.</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

@endsection
