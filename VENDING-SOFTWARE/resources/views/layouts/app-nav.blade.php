<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>B Scientific Instrument</title>
    <link rel="icon" type="image" href="images/official_logo1.png" alt="favicon">
    <link href="assets/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/master.css" rel="stylesheet">
    <link href="assets/css/nav-scroll.css" rel="stylesheet">
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
    <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css" />
</head>

<body>
    <div id="app">
        <div class="wrapper">
            <nav id="sidebar">
                <div class="sidebar-header">
                    <img src="images/official_logo1.png" class="logo-off" alt="logo">
                    <h6 class=" tx-uner-logo">B Scientific Instrument</h6>
                </div>

                <ul class=" list-unstyled components text-secondary">
                    <li>
                        <a href="{{ url('/dashboard') }}"><i class="fas fa-home "></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#uielementsmenu" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i> Vending Machine</a>
                        <ul class="collapse list-unstyled" id="uielementsmenu">
                            <li>
                                <a href="{{ url('/vending_machines') }}"><i class="fas fa-angle-right"></i> Machine</a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-angle-right"></i> Slot</a>
                            </li>
                            <li>
                                <a href="#"><i class="fas fa-angle-right"></i> Location</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-table"></i> Product</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-chart-bar"></i> Inventory</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-icons"></i> Income</a>
                    </li>

                    <li>
                        <a href="#authmenu" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Authentication</a>
                        <ul class="collapse list-unstyled" id="authmenu">
                            <li>
                                <a href="login.html"><i class="fas fa-lock"></i> Login</a>
                            </li>
                            <li>
                                <a href="signup.html"><i class="fas fa-user-plus"></i> Signup</a>
                            </li>
                            <li>
                                <a href="forgot-password.html"><i class="fas fa-user-lock"></i> Forgot password</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#pagesmenu" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle no-caret-down"><i class="fas fa-copy"></i> Pages</a>
                        <ul class="collapse list-unstyled" id="pagesmenu">
                            <li>
                                <a href="blank.html"><i class="fas fa-file"></i> Blank page</a>
                            </li>
                            <li>
                                <a href="404.html"><i class="fas fa-info-circle"></i> 404 Error page</a>
                            </li>
                            <li>
                                <a href="500.html"><i class="fas fa-info-circle"></i> 500 Error page</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="users.html"><i class="fas fa-user-friends"></i>Users</a>
                    </li>
                    <li>
                        <a href="settings.html"><i class="fas fa-cog"></i>Settings</a>
                    </li>
                </ul>
            </nav>
            <div id="body" class="active">
                <nav class="navbar navbar-expand-lg navbar-white bg-white">
                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fas fa-bars"></i><span></span>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav  ms-auto ">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#"
                                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                        @if (Auth::user()->profile_picture)
                                            <img src="{{ asset('path_to_user_images/' . Auth::user()->prof_img) }}"
                                                alt="Profile Picture" class="profile-image">
                                        @else
                                            <img src="images/defaul.jpg" alt="logo" class="profile-image">
                                        @endif
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </nav>
                <main class="py-4 main">
                    @yield('content')
                </main>
            </div>
        </div>
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="{{ asset('assets/js/select-packer.js') }}"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js" defer></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js" defer>
        </script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
        <script src="{{ asset('assets/vendor/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/initiate-datatables.js') }}"></script>

    </div>
</body>

</html>
