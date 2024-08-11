<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('asset/student/css/style.css')}}">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" ></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" > --}}
    <style>
        /* Add this to your existing style.css or in the head of your HTML */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
                <h4>{{$userr->full_name}}</h4>
                {{-- <small>Developer</small> --}}
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="{{url('/candidate/')}}">
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
                       <a href="{{ url('/candidate/all_jobs')}}">
                            <span class="las la-envelope"></span>
                            <small>Jobs</small>
                        </a>
                    </li>
                    <li>
                       <a href="{{ url('/candidate/all_intern')}}">
                            <span class="las la-clipboard-list"></span>
                            <small>Internship</small>
                        </a>
                    </li>
                    <li>
                       <a href="{{ url('/candidate/test_schedules')}}">
                            <span class="las la-tasks"></span>
                            <small>Test Schedule</small>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/candidate/interview_schedules')}}"  class="active">
                             <span class="las la-tasks"></span>
                             <small>Interview Schedule</small>
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
                {{-- <input type="text" placeholder="Search.." id="searchInput">
                <ul id="searchResults"></ul> --}}
                <div class="header-menu">
                    <label for="">
                        {{-- <input type="text" name="" id="search" placeholder="search job or internship"> --}}
                        {{-- <span class="las la-search"></span> --}}
                    </label>
                   <!-- HTML input for search results -->
{{-- <input type="text" name="searchResults" id="searchResults" oninput="Type()" placeholder="Search results"> --}}

{{-- <div class="dropdown"> --}}
    {{-- <button onclick="myFunction()" class="dropbtn">Dropdown</button>
    <div id="myDropdown" class="dropdown-content">
      <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
      <a href="#about">About</a>
      <a href="#base">Base</a>
      <a href="#blog">Blog</a>
      <a href="#contact">Contact</a>
      <a href="#custom">Custom</a>
      <a href="#support">Support</a>
      <a href="#tools">Tools</a>
    </div> --}}
  {{-- </div> --}}
<!-- resources/views/search/index.blade.php -->

{{--
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('searchInput').addEventListener('input', function () {
            var query = this.value.trim(); // Trim whitespace from the input value
            var resultsList = document.getElementById('searchResults');

            if(query){
                fetch('/search_dropdown/' + query)
                .then(response => response.json())
                .then(data => displayResults(data))
                .catch(error => console.error('Error:', error));
            }
            else{
                resultsList.innerHTML = '';
            }

        });

        function displayResults(results) {
            var resultsList = document.getElementById('searchResults');
            // Clear previous results
            resultsList.innerHTML = '';

            if (results.length > 0) {
                results.forEach(function (result) {
                    var listItem = document.createElement('li');

                    if ('internship_title' in result) {
                        // Handle internship suggestions
                        var link = document.createElement('a');
                        link.href = '{{ url("/candidate/internship_detail/") }}' + '/' + result.internship_id;
                        link.textContent = result.internship_title + ' Internship';
                        listItem.appendChild(link);
                    } else if ('job_title' in result) {
                        // Handle job suggestions
                        var link = document.createElement('a');
                        link.href = '{{ url("/candidate/job_detail/") }}' + '/' + result.job_id;
                        link.textContent = result.job_title + ' Job';
                        listItem.appendChild(link);
                    }

                    resultsList.appendChild(listItem);
                });
            } else {
                var listItem = document.createElement('li');
                listItem.textContent = 'No results found';
                resultsList.appendChild(listItem);
            }
        }
    });
</script> --}}


                    {{-- <div class="notify-icon">
                        <span class="las la-envelope"></span>
                        <span class="notify">4</span>
                    </div>

                    <div class="notify-icon">
                        <span class="las la-bell"></span>
                        <span class="notify">3</span>
                    </div> --}}

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
                <h1>Interview Schedule</h1>

@include('layouts.alert')
                <!-- <small>Home / Dashboard</small> -->
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body booking_card">
                            <div class="table-responsive">
                                {{-- <table class="datatable table table-stripped table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <td style="padding-right: 25px">S.No</td>
                                            <td style="padding-right: 25px">Application Title</td>
                                            <td style="padding-right: 25px">Test Time</td>
                                            <td style="padding-right: 25px">Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $us)
                                            <tr>
                                                <td>1</td>
                                                <td>{{$us->quiz_id}}</td>
                                                <td>{{$us->conducting_datetime}}</td>

                                                @php
                                                    $startTime = \Illuminate\Support\Carbon::parse($us->conducting_datetime);
                                                    $endTime = $startTime->copy()->addHour();
                                                @endphp

                                                @if (\Illuminate\Support\Carbon::now() >= $startTime && \Illuminate\Support\Carbon::now() <= $endTime)
                                                    <td><a href="{{ url('test/'.$us->quiz_id.'/'.$us->application_id)}}" class="btn btn-primary btn-sm mr-2">start</a></td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> --}}
                                @php
                                $r=1;
                                $futureMeetings = collect($futureMeetings);
                            @endphp
                                @if ($futureMeetings->count() >0)
                                <table class="table mt-5 text-center">
                                    <thead>
                                        <tr class="table-dark">
                                            <th>S.No</th>
                                            <th>Application Title</th>
                                            <th>Interview Time</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($futureMeetings as $us)
                                            <tr>
                                                <td>{{$r++}}</td>
                                                <td>{{$us->title}}</td>
                                                <td>
                                                @if(\Carbon\Carbon::parse($us->zoom_time)->isFuture())
                                                    {{ \Carbon\Carbon::parse($us->zoom_time)->diffForHumans(null, true) }} to go
                                                @else
                                                    Posted {{ \Carbon\Carbon::parse($us->zoom_time)->diffForHumans() }}
                                                @endif
                                            </td>



                                               <td> <a href="javascript:void(0)" onclick="toggleMeetingFrame('{{$us->zoom_meeting}}')">Join Meeting</a></td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                                @else
                                No schedule alloted till
                                @endif

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
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script> --}}
</body>
</html>
