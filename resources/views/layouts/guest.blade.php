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
    <link rel="stylesheet" href="{{asset('css/sticky-footer.css')}}">
</head>


<body style="background-color: white">
<div id="app">
    <div class="fixed-top d-flex flex-column flex-md-row align-items-center p-2 px-md-4 mb-3 bg-white border-bottom shadow-sm">
        <h5 class="my-0 mr-md-auto font-weight-bold"><a class="navbar-brand text-dark" href="/">{{ config('app.name', 'Laravel') }}</a></h5>
    </div>

    <main role="main">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 mt-3">
            @yield('content')
        </div>
    </main>
</div>


<footer class="footer">
    <div class="container text-center">
        <span class="text-muted small">&copy; amodsachintha {{date('Y')}}</span>
    </div>
</footer>


</body>

</html>