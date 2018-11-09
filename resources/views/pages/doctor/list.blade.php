@extends('layouts.app')
@section('header')
    <nav class="navbar navbar-light mb-2" style="background-color: rgba(224,246,255,0.41);">
        <span class="navbar-brand mb-0 h1 font-weight-bold">Doctors</span>
    </nav>
@stop

@section('content')
    <div class="container-fluid">

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

        @if(isset($alert))
            {{$alert}}
        @endif

        <div class="card shadow">
            <div class="card-header">
                <a href="{{route('doctor.create.show')}}" class="btn btn-primary"><i class="fas fa-plus-square"></i> Add Doctor</a>
            </div>
            <div class="card-body">
                <table id="doctors" class="dataTable table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Specialization</th>
                        <th>Department</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>NIC</th>
                        <th>Fee</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($doctors))
                        @foreach($doctors as $doctor)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td class="font-weight-bold">{{$doctor->id}}</td>
                                <td>{{$doctor->f_name.' '.$doctor->l_name}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>{{$doctor->specialization->name}}</td>
                                <td>{{$doctor->department->name}}</td>
                                <td>{{$doctor->mobile}}</td>
                                <td>{{$doctor->address}}</td>
                                <td>{{$doctor->gender}}</td>
                                <td>{{$doctor->nic}}</td>
                                <td>{{number_format($doctor->fee,2)}}</td>
                                <td align="center">
                                    <a href="{{route('doctor.update.show',['id'=>$doctor->id])}}" class="mr-2"><i class="far fa-edit"></i></a>
                                    <a href="{{route('doctor.delete',['id'=>$doctor->id])}}" class="text-danger" onclick="return confirm('Are you sure?')"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Specialization</th>
                        <th>Department</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Gender</th>
                        <th>NIC</th>
                        <th>Fee</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>


        <script>
            $(document).ready(function () {
                var table = $('#doctors').DataTable({
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
                    .appendTo('#doctors_wrapper .col-md-6:eq(0)');
            });
        </script>

    </div>
@endsection