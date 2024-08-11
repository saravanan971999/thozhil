<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
@include('layouts.company_header')
<style>
    /* Custom styles for the card */
    .custom-card {
      background-color: #f8f9fa; /* Grey background */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow */
      border-radius: 10px; /* Border radius */
      transition: box-shadow 0.3s ease-in-out; /* Hover effect transition */
    }

    .custom-card:hover {
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Adjusted box shadow on hover */
    }

    /* Custom styles for the interview status steps */
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

    /* Additional styling for progress bar */
    .progress-wrapper {
      margin-top: 20px;
      text-align: center;
    }

    .progress-bar {
      background-color: #007bff;
    }

    .status-label {
      font-size: 18px;
      margin-top: 10px;
      font-weight: bold;
    }

    /* Additional styling for Round 2 details */
    .round-details {
      margin-top: 20px;
    }
</style>
</head>

<body>
	<div class="main-wrapper">

    @include('layouts.company_sidebar')
    @include('layouts.alert')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="container mt-4">
                <div class="row">
                <div class="col-md-6">
                    <div class="card custom-card">
                    <div class="card-body">
                        <h4 class="card-title">{{$user->student_name}}</h4>
                        <h6 class="card-text">{{$user->company_name}}</h6>
                        <p class="card-text">{{$user->title_}}</p>
                        <ul class="list-group list-group-flush">

                    @if (is_null($user->quid_ID))

                        <h5>Interview Details</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Round : Face 2 Face</li>
                            {{-- <li class="list-group-item">Type: MCQ</li> --}}

                            <li class="list-group-item">Date:
                            @if (is_null($user->zoom_meeting))
                                -
                            @else
                                @if(\Carbon\Carbon::parse($user->zoom_time)->isFuture())
                                {{ \Carbon\Carbon::parse($user->zoom_time)->format('jS M Y g:ia') }}

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


                        @if ($user->test_status == 0)
                            <h5>Selection process details</h5>
                            <li class="list-group-item">Round 1: Aptitude</li>
                            <li class="list-group-item">Type: MCQ</li>
                            <li class="list-group-item">Date:
                                {{ \Carbon\Carbon::parse($user->conducting_datetime)->diffForHumans(null, true) }} to go
                            </li>
                            <li class="list-group-item">Status: Allotted</li>
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
                                <div class="status-label">Current Status: Allotted</div>
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
                                                        @if(\Carbon\Carbon::parse($user->zoom_time)->isFuture())
                                                        {{ \Carbon\Carbon::parse($user->zoom_time)->format('jS M Y g:ia') }}

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
                                            @endif
                                        @endif

                                        <div class="line"></div>
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
                                                        <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <div class="status-label">Current Status: Selected for next round</div>
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

{{--
                @if ($user->test_status === 0)

                @elseif ($user->conducting_datetime === null)
                @else
                    <!-- Interview status steps -->
                    <div class="interview-status">
                        <div class="step">✓</div>
                        <div class="line"></div>
                        @if ($user->test_qualified === 1)
                        <div class="step">✓</div>
                        @else
                        <div class="step">2</div>
                            @endif
                        <div class="line"></div>
                        <!-- <div class="step">3</div> -->
                    </div>

                    <!-- Progress bar -->
                    <div class="progress-wrapper">
                        <div class="progress">
                            @if ($user->test_qualified === 1)
                                @if ($user->meet_status === 1)
                                    <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="status-label">Current Status: Selected for next round</div>
                                @elseif ($user->meet_status === null)
                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="status-label">Current Status: Meeting scheduled</div>
                                @else
                                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="status-label">Current Status: Not qualified</div>
                                @endif
                            @else
                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="status-label">Current Status: Not qualified</div>
                            @endif

                    </div>
                @endif --}}




            </div>
            </div>
        </div>
    </div>


      @include('layouts.company_footer')
</body>
</html>
