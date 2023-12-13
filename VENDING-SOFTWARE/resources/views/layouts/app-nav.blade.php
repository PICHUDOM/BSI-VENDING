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
    <link href="assets/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
</head>

<body>
    <div id="app">
        <div class="wrapper">
            <nav id="sidebar">
                {{-- <nav id="sidebar" class="active"> --}}
                <div class="sidebar-header">
                    <img src="images/official_logo1.png" class="logo-off" alt="logo">
                    <h6 class=" tx-uner-logo">B Scientific Instrument</h6>
                </div>

                <ul class=" list-unstyled components text-secondary">
                    <li>
                        <a href="{{ url('/dashboard') }}"><i class="fas fa-home "></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('/vending_mac') }}"><i class="fas fa-file-alt"></i> Vending Machine</a>
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
                        <a href="#uielementsmenu" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle no-caret-down"><i class="fas fa-layer-group"></i> Expenses</a>
                        <ul class="collapse list-unstyled" id="uielementsmenu">
                            <li>
                                <a href="ui-buttons.html"><i class="fas fa-angle-right"></i> Reports</a>
                            </li>
                            <li>
                                <a href="ui-badges.html"><i class="fas fa-angle-right"></i> Badges</a>
                            </li>
                            <li>
                                <a href="ui-cards.html"><i class="fas fa-angle-right"></i> Cards</a>
                            </li>
                            <li>
                                <a href="ui-alerts.html"><i class="fas fa-angle-right"></i> Alerts</a>
                            </li>
                            <li>
                                <a href="ui-tabs.html"><i class="fas fa-angle-right"></i> Tabs</a>
                            </li>
                            <li>
                                <a href="ui-date-time-picker.html"><i class="fas fa-angle-right"></i> Date & Time
                                    Picker</a>
                            </li>
                        </ul>
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
                <!-- navbar navigation component -->
                <nav class="navbar navbar-expand-lg navbar-white bg-white">
                    <button type="button" id="sidebarCollapse" class="btn btn-light">
                        <i class="fas fa-bars"></i><span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
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
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
        <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
    </div>
</body>

</html>
