<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('asset/new_student_dash/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('asset/new_student_dash/css/sb-admin-2.min.css')}}" rel="stylesheet">
<style>
    iframe {
      width: 100%;
      height: 500px;
      border: 1px solid #ddd;
    }
    @media only screen and (max-width: 720px) {
        .card-title{
            /* margin-right: 307px; */
        }
        .media-body{
            height: 10px;
        }
    }
    .animate{
	/* color: #2e78fd;  */
	font-size: 45px;
	background: linear-gradient(to left,blue 35%, rgb(255, 3, 3));
	background-size: 200% auto;
	-webkit-background-clip: text;
	color: transparent;
	animation: gradient 3s linear infinite;
}

@keyframes gradient{
	0%{
		background-position: 0% 75%;
	}
	50%{
		background-position: 100% 30%;
	}
	100%{
		background-position: 0% 70%;
	}
}
.interview-status {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

.step {
    width: 30px;
    height: 30px;
    background-color: #007bff;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}
.line {
    flex: 1;
    height: 2px;
    background-color: #007bff;
}
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                </div>
                {{-- <div class="sidebar-brand-text mx-3">Thozhil</div> --}}
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{url('/candidate/')}}">
                    <i class="fas fa-desktop"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{url('/candidate/profile')}}"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#jobDropdown"
        aria-expanded="false" aria-controls="jobDropdown">
        <i class="fas fa-fw fa-suitcase"></i>
        <span>Jobs</span>
    </a>
    <div id="jobDropdown" class="collapse" aria-labelledby="headingJobDropdown" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('all_jobs?full_time')}}">Full-time Jobs</a>
            <a class="collapse-item" href="{{ url('all_jobs?part_time')}}">Part-time Jobs</a>

        </div>
    </div>
</li>


<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#internshipDropdown"
        aria-expanded="false" aria-controls="internshipDropdown">
        <i class="fas fa-fw fa-briefcase"></i>
        <span>Internships</span>
    </a>
    <div id="internshipDropdown" class="collapse" aria-labelledby="headingInternshipDropdown" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="{{ url('all_intern?full_time')}}">Full-time Internships</a>
            <a class="collapse-item" href="{{ url('all_intern?part_time')}}">Part-time Internships</a>

        </div>
    </div>
</li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/candidate/test_schedules')}}"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-thumbs-up"></i>
                    <span>Success Signals</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/candidate/application_status')}}"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Applications Tracking</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ url('/candidate/messages')}}"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Messages</span>
                </a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">


            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <a href="{{ url('/')}}" class="logo">
                        <img src="{{asset('Thozhil/thozhill-removebg-preview (1).png')}}" alt="" style="width: 150px;margin-top:-10px;">
                    </a>


                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <!-- <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> -->
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">{{ count($test) + count($futureMeetings) }}</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notifications
                                </h6>
            @foreach ($futureMeetings as $m)
                @if (\Carbon\Carbon::parse($m->zoom_time)->gte(\Carbon\Carbon::now()->subDay(1)))

                    <a class="dropdown-item d-flex align-items-center" href="{{url('candidate/application_profile/'.$m->application_id)}}">
                        <div>
                            <span class="font-weight-bold">Interviews Scheduled on </span>
                            <strong>{{ \Carbon\Carbon::parse($m->zoom_time)->format('jS M Y g:ia') }}</strong>
                            🌟 Prepare to Meet the Future.
                            <span class="noti-title"></span>
                            </span>
                            <div class="small text-gray-500">
                                {{ \Carbon\Carbon::parse($m->zoom_time)->diffForHumans(null, true) }} to go
                            </div>
                        </div>
                    </a>
                @endif
            @endforeach

            @foreach ($test as $t)
                <a class="dropdown-item d-flex align-items-center" href="{{url('candidate/application_profile/'.$t->application_id)}}">
                    <div>
                        <span class="font-weight-bold">Test Scheduled on </span>
                        <strong>{{ \Carbon\Carbon::parse($t->conducting_datetime)->format('jS M Y g:ia') }}</strong>
                        <span class="noti-title"></span>
                        </span>
                        <div class="small text-gray-500">
                            {{ \Carbon\Carbon::parse($t->conducting_datetime)->diffForHumans(null, true) }} to go
                        </div>
                    </div>
                </a>
            @endforeach




                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="{{ url('/candidate/messages')}}" id="messagesDropdown" role="button"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">{{$mess_c}}</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center

                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{$user->student_name}}</span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{url('/candidate/profile')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <div class="main-content">


<main>

    <div class="page-header">
<center>
    <h1 style="color: black;">Application Status</h1>
</center>

@include('layouts.alert')
        <!-- <small>Home / Dashboard</small> -->
    </div>

<div class="container mt-4">
<div class="card custom-card">



    <div class="container mt-4">
        <div class="row">
        <div class="col-md-6">

            <div class="card-body">
                <h4 class="card-title">{{$user->student_name}}</h4>
                <h6 class="card-text">{{$user->company_name}}</h6>
                <p class="card-text">{{$user->title_}}</p>
                <ul class="list-group list-group-flush">
                    {{-- {{$user->conducting_datetime}} <br> --}}
{{-- {{\Carbon\Carbon::parse($user->conducting_datetime)->format('jS M Y g:ia')}} --}}
            @if (is_null($user->quiz_id))

                <h5>Interview Details</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Round : Face 2 Face</li>
                    {{-- <li class="list-group-item">Type: MCQ</li> --}}

                    <li class="list-group-item">Date:
                    @if (is_null($user->zoom_meeting))
                        -
                    @else
                        @php
                            $startTimee = \Illuminate\Support\Carbon::parse($user->zoom_time);
                            $endTimee = $startTimee->copy()->addHour();
                        @endphp

                        @if(\Carbon\Carbon::parse($user->zoom_time)->isFuture())
                        {{ \Carbon\Carbon::parse($user->zoom_time)->format('jS M Y g:ia') }}

                            </li>

                        @elseif (\Illuminate\Support\Carbon::now() >= $startTimee && \Illuminate\Support\Carbon::now() <= $endTimee)
                            <a href="javascript:void(0)" onclick="toggleMeetingFrame('{{$user->zoom_meeting}}')">Join Meeting</a>
                                </li>
                        @else
                            Finished on {{ \Carbon\Carbon::parse($user->zoom_time)->format('jS M Y') }}
                        </li>
                        @endif
                    @endif
                </ul>

                @if(\Carbon\Carbon::parse($user->zoom_time)->isFuture())
                    <!-- Interview status steps -->
                    <div class="interview-status">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="step">1</div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                    <div class="progress-wrapper">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="status-label">Current Status: Meeting scheduled</div>
                        </div>
                    </div>

                @elseif (is_null($user->zoom_meeting))
                    <div class="interview-status">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="step">1</div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                    <div class="progress-wrapper">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="status-label">Current Status: Meeting not scheduled </div>
                        </div>
                    </div>
                @else
                    <div class="interview-status">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="step">✓</div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                    <div class="progress-wrapper">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="status-label">Current Status:
                                @if (is_null($user->meet_status))
                                    Still in progress
                                @elseif ($user->meet_status == 1)
                                    Selected
                                @else
                                    Rejected
                                @endif
                                </div>
                        </div>
                    </div>


                @endif



            @else
            @endif


                @if ($user->test_status != 1 && isset($user->test_status))
                    <h5>Selection process details</h5>
                    <li class="list-group-item">Round 1: Aptitude</li>
                    <li class="list-group-item">Type: MCQ</li>
                    <li class="list-group-item">Date:
                        {{ \Carbon\Carbon::parse($user->conducting_datetime)->format('j M Y, H:i:s') }}


                    </li>

                    <li class="list-group-item"> Status:
                        @php
                            $startTime = \Illuminate\Support\Carbon::parse($user->conducting_datetime);
                            $endTime = $startTime->copy()->addHour();
                        @endphp

                        @if (\Illuminate\Support\Carbon::now() >= $startTime && \Illuminate\Support\Carbon::now() <= $endTime)
                            <a href="{{ url('test/'.$user->quiz_id.'/'.$user->application_id)}}" class="btn btn-primary btn-sm mr-2">Start</a>
                        @else
                            @if(\Carbon\Carbon::parse($user->conducting_datetime)->isFuture())
                                {{ \Carbon\Carbon::parse($user->conducting_datetime)->diffForHumans(null, true) }} to go
                            @else
                                @if (is_null($user->testsss_status))
                                    You missed the test
                                @else
                                    Finished {{ \Carbon\Carbon::parse($user->conducting_datetime)->diffForHumans() }}
                                @endif
                            @endif

                        @endif
                    </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <!-- Interview status steps -->
                    <div class="interview-status">
                        <div class="step">1</div>
                        <div class="line"></div>
                        <div class="step">2</div>
                        <div class="line"></div>
                        <!-- <div class="step">3</div> -->
                    </div>

                    <!-- Progress bar -->
                    <div class="progress-wrapper">
                        <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="status-label">Current Status:
                            @php
                                $startTime = \Illuminate\Support\Carbon::parse($user->conducting_datetime);
                                $endTime = $startTime->copy()->addHour();
                            @endphp

                            @if (\Illuminate\Support\Carbon::now() >= $startTime && \Illuminate\Support\Carbon::now() <= $endTime)
                                <a href="{{ url('test/'.$user->quiz_id.'/'.$user->application_id)}}" class="btn btn-primary btn-sm mr-2">Still in progress</a>
                            @else
                                @if(\Carbon\Carbon::parse($user->conducting_datetime)->isFuture())
                                    {{ \Carbon\Carbon::parse($user->conducting_datetime)->diffForHumans(null, true) }} to go
                                @else
                                    @if (is_null($user->testsss_status))
                                        You missed the test
                                    @else
                                        Finished {{ \Carbon\Carbon::parse($user->conducting_datetime)->diffForHumans() }}
                                    @endif
                                @endif

                            @endif
                        </div>
                    </div>





                @elseif ($user->test_status == 1)
                    <h5>Completed Round Details</h5>
                    <li class="list-group-item">Round 1: Aptitude</li>
                    <li class="list-group-item">Type: MCQ</li>
                    <li class="list-group-item">Date: {{ \Carbon\Carbon::parse($user->conducting_datetime)->format('jS M Y') }}
                    </li>


                    @if ($user->test_qualified == 1)

                        <li class="list-group-item">Status: Qualified </li>
                            </ul>
                        </div>
                        </div>
                        </div>
                        <div class="round-details">
                            <div class="card custom-card">
                                <div class="card-body">
                                        <h5>Round 2 Details</h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">Round 2: Face 2 Face</li>
                                            {{-- <li class="list-group-item">Type: MCQ</li> --}}

                                            <li class="list-group-item">Date:
                                            @if (is_null($user->zoom_meeting))
                                                Still in progress
                                            @else

                                                @php
                                                    $startTimee = \Illuminate\Support\Carbon::parse($user->zoom_time);
                                                    $endTimee = $startTimee->copy()->addHour();
                                                @endphp

                                                @if (\Illuminate\Support\Carbon::now() >= $startTimee && \Illuminate\Support\Carbon::now() <= $endTimee)
                                                    <a href="javascript:void(0)" onclick="toggleMeetingFrame('{{$user->zoom_meeting}}')">Join Meeting</a>
                                                        </li>
                                                @elseif(\Carbon\Carbon::parse($user->zoom_time)->isFuture())
                                                {{ \Carbon\Carbon::parse($user->zoom_time)->format('jS M Y g:ia') }}
                                                    <a href="javascript:void(0)" onclick="toggleMeetingFrame('{{$user->zoom_meeting}}')">Join Meeting</a>
                                                        </li>
                                                @else
                                                    Finished on {{ \Carbon\Carbon::parse($user->zoom_time)->format('jS M Y') }}
                                                </li>
                                                @endif
                                            @endif
                                        </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Interview status steps -->
                            <div class="interview-status">
                                <div class="step">✓</div>
                                <div class="line"></div>
                                @if (is_null($user->zoom_meeting))
                                    <div class="step">2</div>
                                @else
                                    @if(\Carbon\Carbon::parse($user->zoom_time)->isFuture())
                                        <div class="step">2</div>
                                    @else
                                    <div class="step">✓</div>
                                    <div class="line"></div>

                                        @if (is_null($user->meet_status))

                                        <div class="step">3</div>
                                        <div class="line"></div>
                                        @elseif ($user->meet_status == 1)
                                            @if ($user->offer_issue_date)
                                                <div class="step">✓</div>
                                                <div class="line"></div>
                                                @if ($user->joining_date)
                                                    <div class="step">✓</div>
                                                @else
                                                    <div class="step">4</div>
                                                @endif
                                            @else
                                                <div class="step">3</div>
                                            @endif
                                        @endif

                                    @endif
                                @endif


                                <!-- <div class="step">3</div> -->
                            </div>

                            <!-- Progress bar -->
                            <div class="progress-wrapper">
                                <div class="progress">
                                    @if (is_null($user->zoom_meeting))
                                        <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="status-label">Current Status: Qualified in first round</div>
                                    @else
                                        @if(\Carbon\Carbon::parse($user->zoom_time)->isFuture())
                                            <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="status-label">Current Status: Meeting scheduled</div>
                                        @else
                                            @if (is_null($user->meet_status))
                                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="status-label">Current Status: Interview result in progress</div>
                                            @elseif ($user->meet_status == 1)
                                                @if ($user->offer_issue_date)

                                                    @if ($user->joining_date)
                                                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="status-label">Current Status: Joining date will be {{$user->joining_date}}</div>
                                                    @else
                                                        <div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="status-label">Current Status:  Your offer date will be {{$user->offer_issue_date}} & wait for joining date</div>
                                                    @endif
                                                @else
                                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <div class="status-label">Current Status: Waiting for offer letter date</div>
                                                @endif












                                            @else
                                                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <div class="status-label">Current Status: Rejected in interview panel</div>
                                            @endif
                                        @endif
                                    @endif

                            </div>





                    @else
                        <li class="list-group-item">Not qualified </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                        <div class="round-details">
                            <div class="card custom-card">
                                <div class="card-body">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Interview status steps -->
                            <div class="interview-status">
                                <div class="step">✓</div>
                                <div class="line"></div>
                                <div class="step">2</div>
                                <div class="line"></div>
                                <!-- <div class="step">3</div> -->
                            </div>

                            <!-- Progress bar -->
                            <div class="progress-wrapper">
                                <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="status-label">Current Status: Not qualified for second round</div>

                            </div>



                    @endif










                @endif


        </div>
    </div>




</div>
<iframe class="resume" id="meetingFrame" style="display: none;"></iframe>
                                <script>
                                    function toggleMeetingFrame(zoomMeetingUrl) {
                                        var meetingFrame = document.getElementById("meetingFrame");

                                        // Toggle the visibility of the iframe
                                        if (meetingFrame.style.display === 'none') {
                                            // Set the iframe source to the Zoom meeting URL
                                            meetingFrame.src = zoomMeetingUrl;

                                            // Show the iframe
                                            meetingFrame.style.display = 'block';

                                            // Add a click event listener to close the iframe when clicking outside
                                            document.addEventListener('click', clickOutsidePopup);
                                        } else {
                                            // Hide the iframe
                                            meetingFrame.style.display = 'none';

                                            // Remove the click event listener
                                            document.removeEventListener('click', clickOutsidePopup);
                                        }
                                    }

                                    function clickOutsidePopup(event) {
                                        var meetingFrame = document.getElementById("meetingFrame");
                                        var resumeContent = document.getElementById("meetingFrame");

                                        // Check if the clicked element is outside the iframe
                                        if (!resumeContent.contains(event.target)) {
                                            // Close the iframe
                                            toggleMeetingFrame('');
                                        }
                                    }
                                </script>



<!-- End of Page Wrapper -->











   
@include('layouts.alert')
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{url('logout')}}">Logout</a>
                </div>
            </div>
        </div>
        <div class="">
            <iframe class="resume" id="meetingFrame" style="display: none;"></iframe>
        </div>



 <script src="{{asset('asset/new_student_dash/vendor/jquery/jquery.min.js')}}"></script>
 <script src="{{asset('asset/new_student_dash/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

 <!-- Core plugin JavaScript-->
 <script src="{{asset('asset/new_student_dash/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

 <!-- Custom scripts for all pages-->
 <script src="{{asset('asset/new_student_dash/js/sb-admin-2.min.js')}}"></script>

 <!-- Page level plugins -->
 <script src="{{asset('asset/new_student_dash/vendor/chart.js/Chart.min.js')}}"></script>

 <!-- Page level custom scripts -->
 <script src="{{asset('asset/new_student_dash/js/demo/chart-area-demo.js')}}"></script>
 <script src="{{asset('asset/new_student_dash/js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
