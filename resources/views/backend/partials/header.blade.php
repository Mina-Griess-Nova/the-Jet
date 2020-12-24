<!-- Header -->
<div class="header">

    <!-- Logo -->
    <div class="header-left">
        <a href="#" class="logo">
            {{-- <img src="{{ asset('front/images/msol-logo.png') }}" width="150" alt="Logo"> --}}
        </a>
        <a href="#" class="logo logo-small">
            {{-- <img src="{{ asset('front/images/msol-logo.png') }}" alt="Logo" width="30" height="30"> --}}
        </a>
    </div>
    <!-- /Logo -->

    <a href="javascript:void(0);" id="toggle_btn">
        <i class="fe fe-text-align-left"></i>
    </a>

    {{-- <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div> --}}

    <!-- Mobile Menu Toggle -->
    <a class="mobile_btn" id="mobile_btn">
        <i class="fa fa-bars"></i>
    </a>
    <!-- /Mobile Menu Toggle -->

    <!-- Header Right Menu -->
    <ul class="nav user-menu">
        <ul>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endforeach
        </ul>
        <!-- Notifications -->
        <li class="nav-item dropdown noti-dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Notifications</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">

                    <ul class="notification-list">

                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('backend/img/doctors/doctor-thumb-01.jpg') }}">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Dr. Ruby Perrin</span> Schedule <span class="noti-title">her appointment</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('backend/img/patients/patient1.jpg') }}">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Charlene Reed</span> has booked her appointment to <span class="noti-title">Dr. Ruby Perrin</span></p>
                                        <p class="noti-time"><span class="notification-time">6 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('backend/img/patients/patient2.jpg') }}">
                                    </span>
                                    <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Travis Trimble</span> sent a amount of $210 for his <span class="noti-title">appointment</span></p>
                                    <p class="noti-time"><span class="notification-time">8 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="notification-message">
                            <a href="#">
                                <div class="media">
                                    <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('backend/img/patients/patient3.jpg') }}">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Carl Kelly</span> send a message <span class="noti-title"> to his doctor</span></p>
                                        <p class="noti-time"><span class="notification-time">12 mins ago</span></p>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="#">View all Notifications</a>
                </div>
            </div>
        </li>
        <!-- /Notifications -->

        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow">
            @if (auth()->guard('admin')->user()->hasRole('cook'))
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <span class="user-img"><img class="rounded-circle" src="{{ asset('backend/img/cook/'.auth()->guard('admin')->user()->images) }}" width="31" alt="Ryan Taylor"></span>
                </a>
            @else
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img"><img class="rounded-circle" src="{{ asset('backend/img/profiles/avatar-01.jpg') }}" width="31" alt="Ryan Taylor"></span>
            </a>
            @endif

            <div class="dropdown-menu">
                <div class="user-header">
                    @if (auth()->guard('admin')->user()->hasRole('cook'))
                    <div class="avatar avatar-sm">
                        <img src="{{ asset('backend/img/cook/'.auth()->guard('admin')->user()->images) }}" alt="User Image" class="avatar-img rounded-circle">
                    </div>

                    @else
                        <div class="avatar avatar-sm">
                            <img src="{{ asset('backend/img/profiles/avatar-01.jpg') }}" alt="User Image" class="avatar-img rounded-circle">
                        </div>
                    @endif
                    <div class="user-text">
                        <h6>{{ auth()->guard('admin')->user()->name }}</h6>
                        <p class="text-muted mb-0">{{ auth()->guard('admin')->user()->roles[0]->display_name }}</p>
                    </div>
                </div>
                <a class="dropdown-item" href="{{ auth()->guard('admin')->user()? url('dashboard/cook/{id}/edit') : '' }}">My Profile</a>
                <a class="dropdown-item" href="settings.html">Settings</a>

                <form action="{{ url('dashboard/logout') }}" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item" >Logout</button>
                </form>
            </div>
        </li>
        <!-- /User Menu -->

    </ul>
    <!-- /Header Right Menu -->

</div>
<!-- /Header -->
