<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    {{--    @yield('third_party_stylesheets')

        @stack('page_css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
{{--                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>--}}
                <a href="#" class="nav-link" >
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
{{--                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>--}}
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">

                    <!-- Menu Footer-->
                    <li class="user-footer">

                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>

{{--<script src="{{ mix('js/app.js') }}" defer></script>--}}

@yield('third_party_scripts')

@stack('page_scripts')

{{--
<script src="{{ asset('js/app.js') }}"></script>
--}}
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
@yield('javascripts')
<script>

</script>
</body>
</html>
