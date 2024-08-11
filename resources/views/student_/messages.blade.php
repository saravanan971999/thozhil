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
            margin-right: 307px;
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{$user->full_name}}</span>
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
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


@include('layouts.alert')


                <div class="container mt-5" >
                    <div class="table-responsive">

                    <table class="table table-bordered custom-table custom-table-hover" >
                    <h2 class="text-center">Welcome {{$user->full_name}}</h2>
                    <br>
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Message</th>
                        <th>Rapid Alert</th>
                        <th>Mark As Read</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if (count($messages) > 0)
                        @php
                            $r = 1;
                        @endphp

                        @foreach ($messages as $m)
                            <tr>
                                <td>{{ $r++ }}</td>
                                <td>{{ $m->message }}</td>
                                <td>{{ \Carbon\Carbon::parse($m->created_at)->diffForHumans() }}</td>
                                @if ($m->read == 1)
                                    <td></td>
                                @else
                                <td>
                                    <!-- Switch button for Mark as Read -->
                                    <div class="custom-control custom-switch">
                                        <input
                                            type="checkbox"
                                            class="custom-control-input"
                                            id="checkbox_{{ $m->messages_id }}"
                                            data-message-id="{{ $m->messages_id }}"
                                            {{ $m->read ? 'checked' : '' }}
                                        >
                                        <label class="custom-control-label" for="checkbox_{{ $m->messages_id }}"></label>
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <td colspan="4">No records found</td>
                    @endif


                    <script>
                        // Add an event listener to each checkbox
                        document.querySelectorAll('.custom-control-input').forEach(function (checkbox) {
                            checkbox.addEventListener('change', function () {
                                // Retrieve the message ID from the data attribute
                                var messageId = this.getAttribute('data-message-id');

                                // Use Fetch API to update the database
                                fetch('/candidate/update-read-status/' + messageId, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token
                                    },
                                    body: JSON.stringify({
                                        read: this.checked, // Send the checked status of the checkbox
                                    }),
                                })
                                .then(response => response.json())
                                .then(data => {
                                    // console.log('Update successful:', data);
                                    alert("Successfully updated")
                                })
                                .catch(error => {
                                    console.error('Error updating read status:', error);
                                });
                            });
                        });
                    </script>



                    </tbody>
                  </table>
                    </div>
                  {{$messages->links('guest.link')}}
                </div>






                </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
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
                        <span aria-hidden="true"> ×  </span>
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