@extends('admin.adminmaster')
@section('title')
Nurses
@endsection
@section('content')
<div class="page-body-wrapper">

    <div class="page-body">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">

                    <div class="col-lg-6 main-header">
                        <h2>Nurses</h2>
                        <h6 class="mb-0">Manage Your Nurses</h6>
                    </div>
                    <div class="col-lg-6 text-right ">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addNurseModal">
                            Add Nurse
                        </a>

                    </div>
                </div>
            </div>
        </div>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="row">

                <div class="col-sm-12">
                    <div class="container-fluid">
                        <div class="card" style="padding: 1rem;">
                            <table class="display basic" id="basic">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Nurse ID</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Location</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($nurses as $index => $nurse)
                                    <tr>
                                        <td>{{ $nurse->name }}</td>
                                        <td>{{ $nurse->external_id }}</td>
                                        <td>{{ $nurse->email }}</td>
                                        <td>{{ $nurse->phone }}</td>
                                        <td>{{ $nurse->get_profile->address ?? 'N/A' }}</td>

                                        <td>
                                            <a href="{{ route('nurse.delete', $nurse->id) }}" class="btn btn-sm btn-danger me-1" title="Delete" onclick="return confirm('Are you sure you want to delete this nurse?')">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-primary me-1" title="Edit" data-bs-toggle="modal" data-bs-target="#editNurseModal{{ $index }}">
                                             <i class="fa fa-edit"></i>
                                         </a>
                                            {{--
                                            <a href="{{ route('nurses.profile', $nurse->id) }}" class="btn btn-sm btn-info text-light" title="Profile">
                                                <i class="fa fa-user"></i>
                                            </a> --}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
        <div class="modal fade" id="addNurseModal" tabindex="-1" aria-labelledby="addNurseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content rounded-4">
                <div class="modal-header">
                  <h5 class="modal-title" id="addNurseModalLabel">Add Nurse</h5>
                </div>

                <div class="modal-body">
               <div class="container">
                <form method="POST" action="{{ route('nurse.add') }}" class="form theme-form">
                    @csrf
                    <div class="row">

                        <div class="mb-3 col-md-6 form-group">
                            <label for="nurseName" class="form-label">Name<x-required_field/></label>
                            <input type="text" class="form-control" id="nurseName" name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-md-6 form-group">
                            <label for="nurseEmail" class="form-label">Email<x-required_field/></label>
                            <input type="email" class="form-control" id="nurseEmail" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-md-6 form-group">
                            <label for="nursePhone" class="form-label">Phone<x-required_field/></label>
                            <input type="text" class="form-control" id="nursePhone" name="phone" value="{{ old('phone') }}">
                            @if ($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-md-6 form-group">
                            <label for="nurseDob" class="form-label">Date of Birth<x-required_field/></label>
                            <input type="date" class="form-control" id="nurseDob" name="dob" value="{{ old('dob') }}">
                            @if ($errors->has('dob'))
                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-md-6 form-group">
                            <label for="nurseSalary" class="form-label">Salary<x-required_field/></label>
                            <input type="number" step="0.01" class="form-control" id="nurseSalary" name="salary" value="{{ old('salary') }}">
                            @if ($errors->has('salary'))
                                <span class="text-danger">{{ $errors->first('salary') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 col-md-12 form-group">
                            <label for="nurseAddress" class="form-label">Address</label>
                            <textarea class="form-control" id="nurseAddress" name="address" rows="2">{{ old('address') }}</textarea>
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary">Save Nurse</button>
                </form>

               </div>
                </div>

              </div>
            </div>
          </div>


</div>
@foreach($nurses as $index => $nurse)
    <div class="modal fade" id="editNurseModal{{ $index }}" tabindex="-1" aria-labelledby="editNurseModalLabel{{ $index }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form method="POST" action="{{ route('nurse.edit', $nurse->external_id) }}" class="form theme-form">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editNurseModalLabel{{ $index }}">Edit Nurse</h5>
                    </div>

               <div class="modal-body">
    <div class="row">
        <div class="mb-3 col-md-6 form-group">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $nurse->name ?? '' }}">
        </div>

        <div class="mb-3 col-md-6 form-group">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $nurse->email ?? '' }}">
        </div>

        <div class="mb-3 col-md-6 form-group">
            <label class="form-label">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ $nurse->phone ?? '' }}">
        </div>

        <div class="mb-3 col-md-6 form-group">
            <label class="form-label">Date of Birth</label>
            <input type="date" class="form-control" name="dob" value="{{ $nurse->get_profile->date_of_birth ?? '' }}">
        </div>

        <div class="mb-3 col-md-6 form-group">
            <label class="form-label">Salary</label>
            <input type="number" step="0.01" class="form-control" name="salary" value="{{ $nurse->salary ?? '' }}">
        </div>

        <div class="mb-3 col-md-12 form-group">
            <label class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="2">{{ $nurse->get_profile->address ?? '' }}</textarea>
        </div>
    </div>
</div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
@endforeach

<script>
    $(document).ready(function() {


});
</script>

@endsection
