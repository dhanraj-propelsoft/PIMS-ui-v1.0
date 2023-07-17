<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dore jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="{{ asset('font/iconsmind-s/css/iconsminds.css')}}" />
    <link rel="stylesheet" href="{{ asset('font/simple-line-icons/css/simple-line-icons.css')}}" />

    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.rtl.only.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/fullcalendar.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-float-label.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/select2.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/select2-bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-datepicker3.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/dropzone.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-tagsinput.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/component-custom-switch.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/nouislider.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-stars.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/vendor/cropper.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/main.css')}}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css')}}" />
    <script src="{{ asset('js/vendor/jquery-3.3.1.min.js')}}"></script>

</head>

<body id="app-container" class="menu-default show-spinner">

    <nav class="navbar fixed-top">
        <div class="d-flex align-items-center navbar-left">
            <a href="#" class="menu-button d-none d-md-block">
                <svg class="main" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9 17">
                    <rect x="0.48" y="0.5" width="7" height="1" />
                    <rect x="0.48" y="7.5" width="7" height="1" />
                    <rect x="0.48" y="15.5" width="7" height="1" />
                </svg>
                <svg class="sub" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 17">
                    <rect x="1.56" y="0.5" width="16" height="1" />
                    <rect x="1.56" y="7.5" width="16" height="1" />
                    <rect x="1.56" y="15.5" width="16" height="1" />
                </svg>
            </a>

            <a href="#" class="menu-button-mobile d-xs-block d-sm-block d-md-none">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 17">
                    <rect x="0.5" y="0.5" width="25" height="1" />
                    <rect x="0.5" y="7.5" width="25" height="1" />
                    <rect x="0.5" y="15.5" width="25" height="1" />
                </svg>
            </a>

            <div class="user d-inline-block">
                <button class="btn btn-empty p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <span>
                        <img alt="Profile Picture" src="img/profiles/l-1.jpg" />
                    </span>
                    <br>
                    <span class="name">Sarah</span><br>
                
                </button>
                &nbsp;
                &nbsp;
                <div class="dropdown-menu dropdown-menu-right mt-3">
                    <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                    <a class="dropdown-item" href="{ut') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign out</a>
                    <form action="" method="post" class="d-none" id="logout-form">@csrf</form>
                </div>
            </div>


        
                <div class="header-icons d-inline-block align-middle">

                    <div class="d-none d-md-inline-block align-text-bottom mr-3">
                        <div class="custom-switch custom-switch-primary-inverse custom-switch-small pl-1" data-toggle="tooltip" data-placement="left" title="Dark Mode">
                            <input class="custom-switch-input" id="switchDark" type="checkbox" checked>
                            <label class="custom-switch-btn" for="switchDark"></label>
                        </div>
                    </div>

                    <div class="position-relative d-none d-sm-inline-block">
                        <button class="header-icon btn btn-empty" type="button" id="iconMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="simple-icon-grid"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right mt-3  position-absolute" id="iconMenuDropdown">
                            <a href="#" class="icon-menu-item">
                                <i class="iconsminds-equalizer d-block"></i>
                                <span>Settings</span>
                            </a>

                            <a href="#" class="icon-menu-item">
                                <i class="iconsminds-male-female d-block"></i>
                                <span>Users</span>
                            </a>

                            <a href="#" class="icon-menu-item">
                                <i class="iconsminds-puzzle d-block"></i>
                                <span>Components</span>
                            </a>

                            <a href="#" class="icon-menu-item">
                                <i class="iconsminds-bar-chart-4 d-block"></i>
                                <span>Profits</span>
                            </a>

                            <a href="#" class="icon-menu-item">
                                <i class="iconsminds-file d-block"></i>
                                <span>Surveys</span>
                            </a>

                            <a href="#" class="icon-menu-item">
                                <i class="iconsminds-suitcase d-block"></i>
                                <span>Tasks</span>
                            </a>

                        </div>
                    </div>


                    <button class="header-icon btn btn-empty d-none d-sm-inline-block" type="button" id="fullScreenButton">
                        <i class="simple-icon-size-fullscreen"></i>
                        <i class="simple-icon-size-actual"></i>
                    </button>



                </div>


            <div class="search" data-search-path="Pages.Search.html?q=">
                <input placeholder="Search...">
                <span class="search-icon">
                    <i class="simple-icon-magnifier"></i>
                </span>
            </div>

        </div>




        <div class="navbar-right">
        <a class="navbar-logo" href="Dashboard.Default.html">
            <span class="logo d-none d-xs-block"></span>
            <span class="logo-mobile d-block d-xs-none"></span>
        </a>
        </div>

    </nav>