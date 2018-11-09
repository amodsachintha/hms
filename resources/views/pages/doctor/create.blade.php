@extends('layouts.app')
@section('header')
    <nav class="navbar navbar-light mb-2" style="background-color: rgba(224,246,255,0.41);">
        <span class="navbar-brand mb-0 h1 font-weight-bold">{{ Request::is('*update*') ? 'Update Doctor' : 'Add Doctor' }}</span>
    </nav>
@stop

@section('content')
    <div class="container">

        @if(session()->has('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session()->get('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif(session()->has('err'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @if(is_array(session()->get('err')))
                    <ul>
                        @foreach(session()->get('err') as $item)
                            <li>{{$item}}</li>
                        @endforeach
                    </ul>
                @else
                    {{session()->get('err')}}
                @endif
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header">
                <a href="{{route('doctor.list')}}" class="btn btn-primary"><i class="fas fa-list-alt"></i> Doctor List</a>
            </div>
            <form method="post" action="{{route('doctor.create')}}">
                <div class="card-body">

                    @csrf

                    @if(isset($doctor))
                        <input type="hidden" name="id" value="{{$doctor->id}}">
                    @endif

                    <div class="form-group">
                        <label for="text1">First Name</label>
                        <input id="text1" name="f_name" type="text" required="required" class="form-control here" value="{{isset($doctor) ? $doctor->f_name : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="text1">Last Name</label>
                        <input id="text1" name="l_name" type="text" required="required" class="form-control here" value="{{isset($doctor) ? $doctor->l_name : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="text1">Email</label>
                        <input id="text1" name="email" type="email" required="required" class="form-control here" value="{{isset($doctor) ? $doctor->email : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="specialization">Specialization</label>
                        <select id="specialization" name="specialization_id" class="form-control">
                            @if(isset($specializations))
                                @foreach($specializations as $specialization)
                                    <option value="{{$specialization->id}}" {{isset($doctor) ? $doctor->specialization_id === $specialization->id ? 'selected' : '' : ''}}>{{$specialization->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="dept">Department</label>
                        <select id="dept" name="department_id" class="form-control">
                            @if(isset($departments))
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}" {{isset($doctor) ? $doctor->department_id === $department->id ? 'selected' : '' : ''}}>{{$department->name}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="text1">Date of Birth</label>
                        <input id="text1" name="dob" type="date" required="required" class="form-control here" value="{{isset($doctor) ? $doctor->dob : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="text1">Address</label>
                        <input id="text1" name="address" type="text" required="required" class="form-control here" value="{{isset($doctor) ? $doctor->address : ''}}">
                    </div>

                    <div class="form-group">
                        <label for="text1">Mobile</label>
                        <input id="text1" name="mobile" type="text" required="required" class="form-control here" value="{{isset($doctor) ? $doctor->mobile : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="text1">Work</label>
                        <input id="text1" name="work" type="text" class="form-control here" value="{{isset($doctor) ? $doctor->work : ''}}">
                    </div>

                    <div class="form-group">
                        <label for="text1">Qualifications</label>
                        <input id="text1" name="qualifications" type="text" class="form-control here" value="{{isset($doctor) ? $doctor->qualifications : ''}}">
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" class="form-control">
                            <option value="MALE" {{isset($doctor) ? $doctor->gender === 'MALE' ? 'selected' : '' : ''}}>Male</option>
                            <option value="FEMALE" {{isset($doctor) ? $doctor->gender === 'FEMALE' ? 'selected' : '' : ''}}>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="text1">National ID Number</label>
                        <input id="text1" name="nic" type="text" class="form-control here" value="{{isset($doctor) ? $doctor->nic : ''}}">
                    </div>

                    <div class="form-group">
                        <label for="text1">Fee (LKR)</label>
                        <input id="text1" name="fee" type="number" step="0.01" class="form-control here" value="{{isset($doctor) ? $doctor->fee : ''}}">
                    </div>

                </div>

                <div class="card-footer">
                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-success mr-2">Submit</button>
                        <button name="reset" type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>


    </div>
@endsection