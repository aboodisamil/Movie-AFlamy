<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description"
          content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">

    <!-- Open Graph Meta-->
    <title>Netflix</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/nest.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/mint.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/noty.css') }} ">


    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/noty.css') }} ">

    <link rel="stylesheet" href="{{ asset('dashboard_files/css/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }} "></script>
    <script src="{{ asset('custome/movie.js') }} "></script>

    <style>
        label {
            font-weight: bold;
        }
    </style>
@stack('styles')
</head>
<body class="app sidebar-mini">
<!-- Navbar-->
@include('layouts.dashboard._header')

<!-- Sidebar menu-->
@include('layouts.dashboard._aside')
<main class="app-content">
    @yield('content')


</main>
<!-- Essential javascripts for application to work-->
<script src=" {{ asset('dashboard_files/js/popper.min.js') }} "></script>
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }} "></script>
<script src="{{ asset('dashboard_files/js/main.js')  }} "></script>
<script src="{{ asset('dashboard_files/js/toastr.min.js')  }} "></script>
<script src="{{ asset('dashboard_files/js/noty.min.js')  }} "></script>
<script src="{{ asset('dashboard_files/js/select2.min.js')  }} "></script>

@include('dashboard.pariales._session')
<script>
    $(document).ready(function () {
        $(document).on('click', '.delete', function (e) {
            e.preventDefault();
            var that=$(this);
            var n = new Noty({
                text: 'Do You Want To Delete This Item',
                killer: true,
                type:"alert",
                buttons: [
                    Noty.button('Yes', 'btn btn-warning btn-sm  mr-2', function () {
                       that.closest('form').submit();

                    }),
                    Noty.button('Cancel', 'btn btn-danger btn-sm', function () {
                        n.close()
                    })
                ]
            });
            n.show();
        });


    });
    $('.select2').select2({
        width:"100%"
    })
</script>
</body>
</html>