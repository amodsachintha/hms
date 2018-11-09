<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{--DataTables--}}
    <link rel="stylesheet" type="text/css" href="{{asset('datatables/datatables.min.css')}}"/>
    <script type="text/javascript" src="{{asset('datatables/datatables.min.js')}}"></script>

    {{--Font Awesome--}}
    <link rel="stylesheet" href="{{asset('fa/css/all.css')}}">

    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <script src="{{ asset('js/feather.min.js') }}"></script>

    <link rel="stylesheet" href="{{asset('css/sticky-footer.css')}}">

    {{--formio--}}
    <link rel="stylesheet" href="{{asset('formio/formio.full.min.css')}}">
    <script src="{{asset('formio/formio.full.min.js')}}"></script>

</head>
<body style="background-color: white">
<div id="app">
    <div class="fixed-top d-flex flex-column flex-md-row align-items-center p-2 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-bold"><a class="navbar-brand text-dark" href="/">{{ config('app.name', 'Laravel') }}</a></h5>
        <nav class="my-2 my-md-0 mr-md-3">

            @guest
                <a class="p-2 text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
            @else
                <a class="p-2 text-dark" href="{{route('user.profile')}}">{{ Auth::user()->name }}</a>
                <a class="p-2 text-dark" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
            @endguest
        </nav>
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <div class="container-fluid pt-0">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('*dashboard*') ? 'active' : '' }} font-weight-bold hv" href="#">
                                <i class="far fa-tachometer-alt"></i>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv {{ Request::is('*department*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseDepartment" aria-expanded="false" aria-controls="collapseDepartment">
                                <i class="far fa-building"></i>
                                Department
                            </a>
                            <div class="collapse ml-2" id="collapseDepartment">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="{{route('department.create.show')}}">Add Department</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="{{route('department.list')}}">Department List</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv {{ Request::is('*doctor*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapseDoctor" aria-expanded="false" aria-controls="collapseDoctor">
                                <i class="far fa-user-md"></i>
                                Doctor
                            </a>
                            <div class="collapse ml-2" id="collapseDoctor">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="{{route('doctor.create.show')}}">Add Doctor</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="{{route('doctor.list')}}">Doctor List</a></li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv {{ Request::is('*patient*') ? 'active' : '' }}" href="#" data-toggle="collapse" data-target="#collapsePatient" aria-expanded="false" aria-controls="collapsePatient">
                                <i class="far fa-wheelchair"></i>
                                Patient
                            </a>
                            <div class="collapse ml-2" id="collapsePatient">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="#">Add Patient</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Patient List</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Add Document</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Document List</a></li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv {{ Request::is('*department*') ? 'appointment' : '' }}" href="#" data-toggle="collapse" data-target="#collapseAppointment" aria-expanded="false" aria-controls="collapseAppointment">
                                <i class="far fa-clock"></i>
                                Appointment
                            </a>
                            <div class="collapse ml-2" id="collapseAppointment">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="#">Add Appointment</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Appointment List</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv" href="#" data-toggle="collapse" data-target="#collapseAccountMgr" aria-expanded="false" aria-controls="collapseAccountMgr">
                                <i class="fal fa-usd-circle"></i>
                                Account Manager
                            </a>
                            <div class="collapse ml-2" id="collapseAccountMgr">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="#">Add Account</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Account List</a></li>

                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Debit Report</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Credit Report</a></li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv" href="#" data-toggle="collapse" data-target="#collapseHR" aria-expanded="false" aria-controls="collapseHR">
                                <i class="fal fa-users"></i>
                                Human Resources
                            </a>
                            <div class="collapse ml-2" id="collapseHR">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="#">Add Employee</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Accountant List</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Case Manager List</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Laboratorist List</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Nurse List</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Pharmacist List</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Receptionist List</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv" href="#" data-toggle="collapse" data-target="#collapseBedMgr" aria-expanded="false" aria-controls="collapseBedMgr">
                                <i class="fal fa-bed"></i>
                                Bed Manager
                            </a>
                            <div class="collapse ml-2" id="collapseBedMgr">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="#">Add Bed</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Bed List</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Bed Assign</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Bed Assign List</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv" href="#" data-toggle="collapse" data-target="#collapseNoticeboard" aria-expanded="false" aria-controls="collapseNoticeboard">
                                <i class="fal fa-bell"></i>
                                Noticeboard
                            </a>
                            <div class="collapse ml-2" id="collapseNoticeboard">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="#">Add Notice</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Notice List</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv" href="#" data-toggle="collapse" data-target="#collapseCaseMgr" aria-expanded="false" aria-controls="collapseCaseMgr">
                                <i class="fal fa-medkit"></i>
                                Case Manager
                            </a>
                            <div class="collapse ml-2" id="collapseCaseMgr">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="#">Add Notice</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Notice List</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv" href="#" data-toggle="collapse" data-target="#collapseHospitalActs" aria-expanded="false" aria-controls="collapseHospitalActs">
                                <i class="fal fa-clipboard"></i>
                                Hospital Activities
                            </a>
                            <div class="collapse ml-2" id="collapseHospitalActs">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="#">Add Birth Report</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Add Death Report</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Add Operation Report</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Add Investigation Report</a></li>

                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">List Birth Reports</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">List Death Reports</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">List Operation Reports</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">List Investigation Reports</a></li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link font-weight-bold hv" href="#" data-toggle="collapse" data-target="#collapsePharmacyMgr" aria-expanded="false" aria-controls="collapsePharmacyMgr">
                                <i class="far fa-hospital"></i>
                                Pharmacy Manager
                            </a>
                            <div class="collapse ml-2" id="collapsePharmacyMgr">
                                <ul class="list-group bg-transparent" style="margin-right: 10px; margin-left: 10px">
                                    <li class="list-group-item small p-2"><a class="text-dark btn-link" href="#">Add Drug</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">List Drugs</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">Add Drug Category</a></li>
                                    <li class="list-group-item small p-2"><a class="text-dark nav-item" href="#">List Drug Categories</a></li>
                                </ul>
                            </div>
                        </li>

                        <li class="nav-item" style="margin-bottom: 40px">
                            <p class="font-weight-bold"></p>
                        </li>


                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-0">
                @yield('header')
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 ml-2">
                    @yield('content')
                </div>
            </main>

        </div>
    </div>

    <script>
        feather.replace()
    </script>
</div>

<footer class="footer">
    <div class="container text-center">
        <span class="text-muted small">&copy; amodsachintha {{date('Y')}}</span>
    </div>
</footer>


</body>
</html>
