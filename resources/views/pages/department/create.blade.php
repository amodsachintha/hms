@extends('layouts.app')
@section('header')
    <nav class="navbar navbar-light" style="background-color: rgba(224,246,255,0.41);">

        <span class="navbar-brand mb-0 h1 font-weight-bold">{{ Request::is('*update*') ? 'Update Department' : 'Add Department' }}</span>
    </nav>
@stop

@section('content')
    <div class="container">

        @if(session()->has('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{session()->get('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif


        <div class="card shadow">
            <div class="card-header">
                <a href="{{route('department.list')}}" class="btn btn-primary"><i class="fas fa-list-alt"></i> Department List</a>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('department.create')}}">
                    @csrf
                    <div class="form-group">
                        <label for="text1">Department Name</label>
                        <input id="text1" name="name" type="text" required="required" class="form-control here">
                    </div>
                    <div class="form-group">
                        <label for="text">Description</label>
                        <input id="text" name="description" type="text" required="required" class="form-control here">
                    </div>

                    <div class="form-group">
                        <button name="submit" type="submit" class="btn btn-success">Submit</button>
                        <button name="reset" type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection