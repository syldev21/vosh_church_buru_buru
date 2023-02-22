<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
</head>
<body class="">
@include('layouts.includes.admin-navbar')

<div id="layoutSidenav">
    @include('layouts.includes.admin-sidebar')
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        @include('layouts.includes.admin-footer')
    </div>
</div>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
@yield('script')
</body>
</html>

