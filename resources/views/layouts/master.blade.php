<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    {{--    <script src="https://cdn.datatables.net/autofill/2.5.2/js/dataTables.autoFill.min.js"></script>--}}
    <!-- Styles -->
    <link href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    {{--    <link href="https://cdn.datatables.net/autofill/2.5.2/css/autoFill.dataTables.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css"/>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('js/function.js') }}"></script>
</head>
<body class="">
@include('layouts.includes.admin.navbar')

<div id="layoutSidenav">
    @include('layouts.includes.admin.sidebar')
    <div id="layoutSidenav_content">
        <main>
            @yield('content')
        </main>
        @include('layouts.includes.admin.footer')
    </div>
</div>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
{{--<script src="{{ asset('assets/js/scripts.js') }}"></script>--}}
<script src="{{asset('js/script.js')}}"></script>
{{--<script src="https://cdn.datatables.net/autofill/2.5.2/js/dataTables.autoFill.min.js"></script>--}}
@yield('script')
</body>
</html>

