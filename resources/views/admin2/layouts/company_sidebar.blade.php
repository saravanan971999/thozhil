

<style>
    /* Add this CSS to your stylesheet */
    #sidebar {
        max-height: 200%;
        overflow-y: auto;
    }

    .sidebar-inner {
        overflow-y: auto;
    }

    .submenu_class {
        overflow-y: auto;
        max-height: 200px; /* You can adjust the max-height as needed */

        /* Customize the scrollbar */
        scrollbar-width: thin; /* Firefox */
        scrollbar-color: lightgray white; /* Firefox */
    }

    /* Webkit browsers (Chrome, Safari) */
    .submenu_class::-webkit-scrollbar {
        width: 8px;
    }

    .submenu_class::-webkit-scrollbar-thumb {
        background-color: lightgray;
    }

    .submenu_class::-webkit-scrollbar-track {
        background-color: white;
    }
    </style>


    <div class="header">
        <div class="header-left">
            <a href="{{ url('/')}}" class="logo">
                <img src="{{asset('Thozhil/thozhill-removebg-preview (1).png')}}" alt="" style="width: 140px;margin-top:-10px;">
            </a>
        </div>
        <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
        <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
        <ul class="nav user-menu">







            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt=""></span>{{ucwords(session('full_name'))}} </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        {{-- <div class="avatar avatar-sm">
                        </div> --}}
                        <div class="user-text">
                            <h6>{{ucwords(session('full_name'))}}</h6>

                        </div>
                    </div>
                        {{-- <a class="dropdown-item" href="{{url('/admin2/my_profile')}}">My Profile</a> --}}
                        <a class="dropdown-item" href="{{url('/admin2/password_change')}}">Password Change</a>
                        <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                    </div>
            </li>
        </ul>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="active"> <a href="{{url('admin2/')}}"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
                    <li class="list-divider"></li>


                    <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Internships </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{url('/admin2/post_internships')}}"> Post Internship </a></li>
                            <li><a href="{{url('/admin2/posted_internships')}}"> Posted Internship </a></li>
                            <li><a href="{{url('/admin2/internships_applications')}}"> Applications </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{url('/admin2/post_jobs')}}"> Post Jobs </a></li>
                            <li><a href="{{url('/admin2/posted_jobs')}}"> Posted Jobs </a></li>
                            <li><a href="{{url('/admin2/jobs_applications')}}"> Applications </a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
