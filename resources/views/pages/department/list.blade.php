@extends('layouts.app')
@section('header')
    <nav class="navbar navbar-light mb-2" style="background-color: rgba(224,246,255,0.41);">
        <span class="navbar-brand mb-0 h1 font-weight-bold">Departments</span>
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
                <a href="{{route('department.create.show')}}" class="btn btn-primary"><i class="fas fa-plus-square"></i> Add Department</a>
            </div>
            <div class="card-body">
                <table id="departments" class="dataTable table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($departments))
                        @foreach($departments as $department)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$department->name}}</td>
                                <td>{{$department->description}}</td>
                                <td align="center">
                                    <a href="{{route('department.update.show',['id'=>$department->id])}}" class="mr-2"><i class="far fa-edit"></i></a>
                                    <a href="{{route('department.delete',['id'=>$department->id])}}" class="text-danger" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                var table = $('#departments').DataTable({
                    responsive: true,
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            text: '<i class="fal fa-clone"></i>',
                            titleAttr: 'Copy'
                        },
                        {
                            extend: 'excelHtml5',
                            text: '<i class="fal fa-file-excel"></i>',
                            titleAttr: 'Excel'
                        },
                        {
                            extend: 'pdfHtml5',
                            text: '<i class="fal fa-file-pdf"></i>',
                            titleAttr: 'PDF'
                        }
                    ]
                });
                table.buttons().container()
                    .appendTo('#departments_wrapper .col-md-6:eq(0)');
            });
        </script>
    </div>



@endsection