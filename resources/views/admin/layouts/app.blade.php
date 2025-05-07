<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>
        HealthCare Management System
    </title>


    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
     <link href="{{asset('argon')}}/assets/css/nucleo-icons.css" rel="stylesheet" />
     {{-- <link href="{{asset('argon')}}/assets/css/ncleo-svg.css" rel="stylesheet" /> --}}
    <!-- Font Awesome Icons -->
     {{-- <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>  --}}


    <link  src="{{asset('assets')}}/css/mdb.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('assets')}}/css/datatable.min.css"></link>
    <link id="pagestyle" href="{{asset('argon')}}/assets/css/argon-dashboard.css" rel="stylesheet" />
    <link src="{{asset('assets')}}/css/all.min.css" rel="stylesheet" />
    {{-- <link href="{{asset('argon')}}/assets/css/nucleo-svg.css" rel="stylesheet" /> --}}
    <!-- CSS Files -->
    <link rel="stylesheet" src="{{asset('assets')}}/css/css.css"/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" src="{{asset('assets')}}/css/css.css"></link>

</head>

<body class="{{ $class ?? '' }}">

    {{-- @guest --}}
         {{-- @yield('content') --}}
     {{-- @endguest --}}

    {{-- @auth --}}
        {{-- @if (in_array(request()->route()->getName(), [ 'login', 'register', 'recover-password',]))
            @yield('content')
        @else --}}
             {{-- @if (!in_array(request()->route()->getName(), ['profile', 'profile-static']))
                <div class="min-height-300 bg-primary position-absolute w-100"></div>
            @elseif (in_array(request()->route()->getName(), ['profile-static', 'profile'])) --}}
                <div class="position-absolute w-100 min-height-300 top-0" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
                    <span class="mask bg-primary opacity-6"></span>
                </div>
            {{-- @endif --}}
            @include('admin.layouts.navbars.auth.sidenav')
                <main class="main-content border-radius-lg">
                    @yield('content')
                </main>
            @include('components.fixed-plugin')
         {{-- @endif --}}
    {{-- @endauth --}}

    <!--   Core JS Files   -->

    <script src="{{asset('argon')}}/assets/js/core/popper.min.js"></script>
    <script src="{{asset('argon')}}/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="{{asset('argon')}}/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
       var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
        damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}

    </script>
    <!-- Github buttons -->
    @stack('js');
</body>
<footer>

    <script src="{{asset('assets')}}/js/javascript/jquery.min.js"></script>
    <script src="{{asset('assets')}}/js/javascript/mdb.umd.min.js"></script>
    <script src="{{asset('assets')}}/js/javascript/datatable.min.js"></script>
    {{-- <script src="{{asset('assets')}}/js/javascript/appointment.js"></script> --}}
    <script src="{{asset('assets')}}/js/doctors.js"></script>
    <script src="{{asset('assets')}}/js/javascript/axios.min.js"></script>
    <script src="{{asset('argon')}}/assets/js/core/bootstrap.min.js"></script>
    <script src="{{asset('assets')}}/js/users.js"></script>
    <script src="{{asset('assets')}}/js/usersAppointments.js"></script>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- <script src="{{asset('assets')}}/js/javascript/csrf-token.js"></script> --}}
</footer>
</html>
