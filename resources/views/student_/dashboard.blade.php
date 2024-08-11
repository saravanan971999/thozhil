<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('asset/student/css/style.css')}}">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>


        /* Add this to your existing style.css or in the head of your HTML */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;

        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin: -10px; /* Adjust the negative margin */
        }

        .job-card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
            margin-bottom: 20px;
        }

        .job-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .card-text {
            color: #555;
            margin-bottom: 5px;
        }

        .btn-primary {
            background-color: #25acea;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            margin-top: 5px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #098792;
        }

    </style>

</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>LOGO</h3>
        </div>

        <div class="side-content">
            <div class="profile">
                <!-- <div class="profile-img bg-img" style="background-image: url(img/3.jpeg)"></div> -->
                <h4>{{$user->full_name}}</h4>
                {{-- <small>Developer</small> --}}
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="{{url('/candidate/')}}" class="active">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                       <a href="{{url('/candidate/profile')}}">
                            <span class="las la-user-alt"></span>
                            <small>Profile</small>
                        </a>
                    </li>
                    <li>
                       <a href="{{ url('all_jobs')}}">
                        <span class="las la-clipboard-list"></span>
                            <small>Jobs</small>
                        </a>
                    </li>
                    <li>
                       <a href="{{ url('all_intern')}}">
                            <span class="las la-clipboard-list"></span>
                            <small>Internship</small>
                        </a>
                    </li>
                    <li>
                       <a href="{{ url('/candidate/test_schedules')}}">
                            <span class="las la-tasks"></span>
                            <small>Success Signals</small>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/candidate/messages')}}">
                             <span class="las la-envelope"></span>
                             <small>Messages</small>
                        </a>
                     </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">

        <header>

            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>

                <div class="header-menu">

                    <div class="notify-icon">
                        <a href="{{ url('/candidate/test_schedules')}}" data-toggle="dropdown">
                            Success Signals<span class="las la-bell"></span>
                            <span class="notify">{{ count($test) + count($futureMeetings) }}</span>
                        </a>
                    </div>



                    <div class="notify-icon">
                        <a href="{{ url('/candidate/messages')}}" data-toggle="dropdown">
                            Messages<span class="las la-bell"></span>
                            <span class="notify">{{$mess_c}}</span>
                        </a>
                    </div>



                    <div class="user">
                        <!-- <div class="bg-img" style="background-image: url(img/1.jpeg)"></div> -->
                        <a href="{{url('logout')}}">
                        <span class="las la-power-off"></span>
                        <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </header>


        <main>

            <div class="page-header">
                <center>   <h1>Dashboard</h1></center>
@include('layouts.alert')
                <!-- <small>Home / Dashboard</small> -->
            </div>

            <div class="page-content">

                <div class="analytics">

                    <div class="card">
                        @if ($total === 0)
                            <a>
                        @else
                            <a href="{{('/candidate/total_applied')}}">
                        @endif

                        <div class="card-head">
                            <h2>{{$total}}</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Applied Applications</small>
                            <div class="card-indicator">
                                <div class="indicator one" style="width: 100%"></div>
                            </a>
                             </div>
                        </div>
                    </div>

                    <div class="card">
                        @if ($approved === 0)
                            <a>
                        @else
                            <a href="{{('/candidate/approved_app')}}">
                        @endif
                        <div class="card-head">
                            <h2>{{$approved}}</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Approved Applications</small>
                            <div class="card-indicator">
                                <div class="indicator two" style="width: 100%"></div>
                            </a>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        @if ($reject === 0)
                            <a>
                        @else
                            <a href="{{('/candidate/rejected_app')}}">
                        @endif
                        <div class="card-head">
                            <h2>{{$reject}}</h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Rejected Applications</small>
                            <div class="card-indicator">
                                <div class="indicator three" style="width: 100%"></div>
                            </div>
                        </div>
                    </a>
                    </div>

                    <div class="card">
                        <style>
                            /* Add this to your existing CSS code */
.bell-icon {
    font-size: 24px; /* Adjust the size as needed */
    margin-left: 10px; /* Add margin to separate from text */
    animation: ring 0.5s ease infinite;
}

@keyframes ring {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2);
    }
    100% {
        transform: scale(1);
    }
}
                        </style>
                        @if ( (count($test) + count($futureMeetings)) === 0)
                            <a>
                        @else
                            <a href="{{('/candidate/test_schedules')}}">
                        @endif
                        {{-- <a href="{{ url('candidate/test_schedules') }}"> --}}
                        <div class="card-head">
                            <h2>{{ count($test) + count($futureMeetings) }}</h2>
                            <span class="las la-bell bell-icon"></span>
                        </div>
                        <div class="card-progress">
                            <small>Success Signals</small>
                            <div class="card-indicator">
                                <div class="indicator four" style="width: 100%"></div>
                            </div>
                        </div>
                    </a>
                    </div>

                </div>
<br><br>

                <style>
                    /* Add a container to control the size of the chart */
                    .chart-container {
                        position: relative;
                        width: 450px;
                        border: 2px solid white;
                        border-radius: 5px;
                        box-shadow: 5px 5px 5px 5px rgb(0 0 0 / 10%);
                        position: relative;
                        padding: 10px;
                        height: 350px;
                        margin-left: 30px;
                    }

                    /* Style to make the chart responsive */
                    .chart-container canvas {
                        display: block;
                        width: 100%;
                        height: auto;
                        margin-top: -45px;
                    }
                </style>


<div class="row">
    <div class="col-md-6">
        <!-- Graph Section -->
        @if ($total != 0 || $approved != 0 || $reject != 0 )
    <div class="chart-container">
        <canvas id="combinedChart"></canvas>
    </div>
@endif

    </div>

<div class="row">
    <div class="col-md-6">
        <!-- Bootstrap Card Section -->
        <div class="card" style="width: 550px; height: 350px; margin-right:60px; margin-top:10px;">
            <div class="card-body">
                <center>
                    <h5 class="card-title">Interview Schedule</h5>
                </center>
                <br>

                @forelse ($futureMeetings as $m)
                    @if (\Carbon\Carbon::parse($m->zoom_time)->gte(\Carbon\Carbon::now()->subDay(1)))

                        <li class="notification-message">
                            <div class="media">
                                <span class="avatar avatar-sm"></span>
                                <div class="media-body">
                                    <p class="noti-details"><span class="noti-title">Tomorrow's Talent Awaits: Interviews Scheduled for </span>
                                        <strong>{{ \Carbon\Carbon::parse($m->zoom_time)->format('jS M Y g:ia') }}</strong>
                                        🌟 Prepare to Meet the Future Stars.
                                        <span class="noti-title"></span>
                                        <a href="javascript:void(0)" onclick="toggleMeetingFrame('{{$m->zoom_meeting}}')">Join Meeting</a>
                                    </p>
                                    <p class="noti-time"><span class="notification-time">
                                            @if(\Carbon\Carbon::parse($m->zoom_time)->isFuture())
                                                {{ \Carbon\Carbon::parse($m->zoom_time)->diffForHumans(null, true) }} to go
                                            @else
                                                Posted {{ \Carbon\Carbon::parse($m->zoom_time)->diffForHumans() }}
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endif
                @empty
                    <p>No future meetings scheduled.</p>
                @endforelse
            </div>
        </div>


</div>
                </div>

            </div>

        </main>

    </div>

                </div>

            </div>

        </main>

    </div>

<!-- Add this script after including Chart.js -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the data from your server-side variables
        var appliedData = {{$total}};
        var approvedData = {{$approved}};
        var testScheduleData = {{$reject}};

        var ctx = document.getElementById("combinedChart").getContext("2d");

        var combinedChart = new Chart(ctx, {
            type: "doughnut",
            data: {
                labels: [
                    "Applied Applications",
                    "Approved Applications",
                    "Rejected Applications",
                 ],
                datasets: [{
                    data: [appliedData, approvedData, testScheduleData],
                    backgroundColor: ["#25acea", "#4CAF50", "#FFC107", "#FF5722"],
                }],
            },
            options: {
                cutout: "50%",
                responsive: false,
                plugins: {
                    legend: {
                        position: 'right',
                        align: 'center',
                        labels: {
                            boxWidth: 15,
                            padding: 15,
                        }
                    },
                },
            },
        });
    });
</script>


</body>
</html>
