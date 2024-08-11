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
            <!-- <a href="index.html" class="logo logo-small"> <img src="assets/img/hotel_logo.png" alt="Logo" width="30" height="30"> </a> -->
        </div>
        <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
        <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
        <ul class="nav user-menu">
            @php
                        $futureMeetings = collect($futureMeetings);

            @endphp

            @if($futureMeetings->count() > 0)
            <li class="nav-item dropdown noti-dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span class="badge badge-pill">{{ $futureMeetings->count() }}</span> </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span>
                        {{-- <a href="javascript:void(0)" class="clear-noti"> Clear All </a>  --}}
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                @foreach ($futureMeetings as $m)
                    @if(\Carbon\Carbon::parse($m->zoom_time)->isFuture())
                        <li class="notification-message">
                            {{-- <a href="#"> --}}
                                <div class="media">
                                    {{-- <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
                                    </span> --}}
                                    <div class="media-body" style="padding-left: 30px;">
                                        <p class="noti-details"><span class="noti-title">{{$m->full_name}}</span> for internship {{$m->title_}} <span class="noti-title">
                                            <a href="javascript:void(0)" onclick="openMeeting('{{$m->zoom_meeting}}')">Join Meeting</a>
                                        </span></p>
                                        <p class="noti-time"><span class="notification-time">
                                            @if(\Carbon\Carbon::parse($m->zoom_time)->isFuture())
                                            {{ \Carbon\Carbon::parse($m->zoom_time)->diffForHumans(null, true) }} to go
                                        @else
                                            Posted {{ \Carbon\Carbon::parse($m->zoom_time)->diffForHumans() }}
                                        @endif
                                        </span> </p>
                                    </div>
                                </div>
                            {{-- </a> --}}
                        </li>
                    @endif
                @endforeach
                        </ul>
                    </div>
                    {{-- <div class="topnav-dropdown-footer"> <a href="#">View all Notifications</a> </div> --}}
                </div>
                </li>
            @else
                <li class="nav-item dropdown noti-dropdown">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> </a>
                    <div class="dropdown-menu notifications">
                        <div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span>
                            {{-- <a href="javascript:void(0)" class="clear-noti"> Clear All </a>  --}}
                        </div>
                        <div class="noti-content">
                            <ul class="notification-list">

                            <li class="notification-message">
                                {{-- <a href="#"> --}}
                                    <div class="media">
                                        {{-- <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
                                        </span> --}}
                                        <div class="media-body" style="padding-left: 30px;">
                                            <p class="noti-details"><span class="noti-title"></span>No records found <span class="noti-title">

                                            </span></p>
                                            <p class="noti-time"><span class="notification-time">

                                            </span> </p>
                                        </div>
                                    </div>
                                {{-- </a> --}}
                            </li>

                            </ul>
                        </div>
                        {{-- <div class="topnav-dropdown-footer"> <a href="#">View all Notifications</a> </div> --}}
                    </div>
                </li>
            @endif




                            {{-- <li class="notification-message">
                                <a href="#">
                                    <div class="media"> <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-11.jpg">
                                        </span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">International Software
                                                Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
                                            <p class="noti-time"><span class="notification-time">6 mins ago</span> </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media"> <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-17.jpg">
                                        </span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone
                                                XR</span></p>
                                            <p class="noti-time"><span class="notification-time">8 mins ago</span> </p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="notification-message">
                                <a href="#">
                                    <div class="media"> <span class="avatar avatar-sm">
                                        <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-13.jpg">
                                        </span>
                                        <div class="media-body">
                                            <p class="noti-details"><span class="noti-title">Mercury Software
                                            Inc</span> added a new product <span class="noti-title">Apple
                                            MacBook Pro</span></p>
                                            <p class="noti-time"><span class="notification-time">12 mins ago</span> </p>
                                        </div>
                                    </div>
                                </a>
                            </li> --}}



            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt=""></span>{{ucwords(session('full_name'))}} </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                        <div class="avatar avatar-sm">
                            <img src="{{asset('company_logo/'.session('company_logo'))}}" alt="User Image" class="avatar-img rounded-circle"> </div>
                        <div class="user-text">
                            <h6>{{ucwords(session('full_name'))}}</h6>
                            <!-- <p class="text-muted mb-0">Hr Admin</p> -->
                        </div>
                    </div> <a class="dropdown-item" href="{{url('/employer/my_profile')}}">My Profile</a> <a class="dropdown-item" href="{{url('/employer/password_change')}}">Password Change</a> <a class="dropdown-item" href="{{url('logout')}}">Logout</a> </div>
            </li>
        </ul>
    </div>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="active"> <a href="{{url('employer/')}}"><i class="fas fa-desktop"></i> <span><strong>DASHBOARD</strong></span></a> </li>
                    <li class="list-divider"></li>

                    <li class="submenu"> <a href="#"><i class="fa fa-calendar"></i> <span>Interview <br> Calendar</span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{url('/employer/interview_schedule')}}"> Interview Schedule </a></li>
                        </ul>
                    </li>

                    <li class="submenu"> <a href="#"><i class="fas fa-user-tie"></i> <span> Interview <br>Questions</span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{url('/employer/add_test')}}"> Add Interview Questions </a></li>
                            <li><a href="{{url('/employer/import_test')}}"> Import Interview Questions </a></li>
                            <li><a href="{{url('/employer/edit_test')}}"> Edit / Delete Interview Questions </a></li>
                            <li><a href="{{url('/employer/export_test')}}"> Export Interview Questions </a></li>
                        </ul>
                    </li>



                    <li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Internships </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{url('/employer/post_internship')}}"> Post Internship </a></li>
                            <li><a href="{{url('/employer/posted_internship')}}"> Posted Internships </a></li>
                            <li><a href="{{url('/employer/internship_applications')}}"> Applications </a></li>
                        </ul>
                    </li>
                    <li class="submenu"> <a href="#"><i class="fas fa-briefcase"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{url('/employer/post_jobs')}}"> Post Job </a></li>
                            <li><a href="{{url('/employer/posted_jobs')}}"> Posted Jobs </a></li>
                            <li><a href="{{url('/employer/job_applications')}}"> Applications </a></li>
                        </ul>
                    </li>
                    {{-- <li class="submenu"> <a href="#">
                        <i class="fas fa-clock"></i> <span> Pending<br> Applications </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{url('/employer/intern_pending')}}">Internships </a></li>
                            <li><a href="{{url('/employer/job_pending')}}"> Jobs </a></li>
                            <!-- <li><a href="add-room.html"> Add Rooms </a></li> -->
                        </ul>
                    </li> --}}
                    <li class="submenu"> <a href="#"><i class="fas fa-check-circle"></i> <span> Approved<br> Applications </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{url('/employer/approved_intern')}}">Internships </a></li>
                            <li><a href="{{url('/employer/approved_job')}}"> Jobs </a></li>
                            <!-- <li><a href="add-staff.html"> Add Staff </a></li> -->
                        </ul>
                    </li>
                            <li class="submenu"> <a href="#"><i class="fas fa-times-circle"></i> <span> Rejected<br> Applications </span> <span class="menu-arrow"></span></a>
                                <ul class="submenu_class" style="display: none;">
                                    <li><a href="{{url('/employer/rejected_intern')}}">Internships </a></li>
                                    <li><a href="{{url('/employer/rejected_job')}}"> Jobs </a></li>
                                    <!-- <li><a href="mail-veiw.html"> Mail Veiw </a></li> -->
                                </ul>
                            </li>

                    </li>

                    <li class="submenu"> <a href="#"><i class="fas fa-handshake"></i> <span> Face 2 Face </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{url('/employer/face_2_face')}}">Internships</a></li>
                            <li><a href="{{url('/employer/face_2_face_job')}}">Jobs </a></li>
                        </ul>
                    </li>

                </li>
                    <li class="submenu"> <a href="#"><i class="fas fa-hand-holding-usd"></i> <span> Offer Oasis </span> <span class="menu-arrow"></span></a>
                        <ul class="submenu_class" style="display: none;">
                            <li><a href="{{url('/employer/results_intern')}}">Internships </a></li>
                            <li><a href="{{url('/employer/results_job')}}"> Jobs </a></li>
                            <!-- <li><a href="mail-veiw.html"> Mail Veiw </a></li> -->
                        </ul>
                    </li>
                </ul>
            </li>


                </ul>
            </div>
        </div>
    </div>
