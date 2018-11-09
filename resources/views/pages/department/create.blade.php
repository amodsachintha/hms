@extends('layouts.app')
@section('header')
    <nav class="navbar navbar-light" style="background-color: rgba(224,246,255,0.41);">

        <span class="navbar-brand mb-0 h1 font-weight-bold">{{ Request::is('*update*') ? 'Update Department' : 'Add Department' }}</span>
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
                <a href="{{route('department.list')}}" class="btn btn-primary"><i class="fas fa-list-alt"></i> Department List</a>
            </div>
            <form method="post" action="{{route('department.create')}}">
                <div class="card-body">

                    @csrf

                    @if(isset($department))
                        <input type="hidden" name="id" value="{{$department->id}}">
                    @endif

                    <div class="form-group">
                        <label for="text1">Department Name</label>
                        <input id="text1" name="name" type="text" required="required" class="form-control here" value="{{isset($department) ? $department->name : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="text">Description</label>
                        <input id="text" name="description" type="text" required="required" class="form-control here" value="{{isset($department) ? $department->description : ''}}">
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