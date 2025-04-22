@extends('admin.adminmaster')
@section('title')
Orders
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets2/css/date-picker.css') }}">
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
                        <h2>Schdule Appointments</h2>
                        <h6 class="mb-0">Manage Your Appointments</h6>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <a href="{{ route('add-client') }}" class="btn btn-sm btn-primary">
                            Set Schdule
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6" style="overflow: auto">
                    {{-- <div class="cal-datepicker">
                        <div class="datepicker-here" data-language="en"> </div>
                      </div> --}}
                      <div class="cal-date-widget card-body p-0">
                        <div class="row">
                          <div class="col-xl-5 col-xs-12 col-md-6 col-sm-12 gradient-primary">
                            <div class="cal-info text-center">
                              <h2>14</h2>
                              <div class="d-inline-block mt-2"><span class="b-r-light pe-3">April </span><span class="ps-4"> 2025</span></div>
                              <ul class="task-list">
                                <li> <span>08:00 </span> client meeting</li>
                                <li> <span>09:30 </span> Assign project</li>
                                <li> <span>11:00 </span> take followup</li>
                                <li> <span>12:00 </span> Take lunch</li>
                              </ul>
                            </div>
                          </div>
                          <div class="col-xl-7 col-xs-12 col-md-6 col-sm-12 p-50">
                            <div class="cal-datepicker">
                              <div class="datepicker-here" data-language="en"> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="col-md-6">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Client</th>
                                <th>Schedule</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>


        </div>
        <!-- Container-fluid Ends-->
    </div>
    <!-- footer start-->
</div>


@endsection
@section('scripts')
<script src="{{ asset('assets2/js/datepicker/date-picker/datepicker.js') }}"></script>
<script src="{{ asset('assets2/js/datepicker/date-picker/datepicker.en.js') }}"></script>
<script src="{{ asset('assets2/js/datepicker/date-picker/datepicker.custom.js') }}"></script>

<script>

$(document).ready(function() {


});
</script>

@endsection
