<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@include('layouts.company_header')
<style>
    iframe {
      width: 100%;
      height: 500px;
      border: 1px solid #ddd;
    }
    .popupP {
            display: none;
            background-color: rgba(49, 49, 49, 0.7);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 100000;
        }
</style>
</head>

<body>
    <div class="popupP d-none" id="loading">
        <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;"   role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
	<div class="main-wrapper">

        @include('layouts.company_sidebar')
        @include('layouts.alert')
		<div class="page-wrapper">



			<div class="content container-fluid">
				<h5 class="mt-5">Approved Internship Application</h5>
				<div class="page-header">
					<div class="row align-items-center">

						<div class="col">
							<div class="mt-5">
                                <label for="sort-column">Filter :</label>
								{{-- <label for="sort-column">Sort by:</label>
                                <select id="sort" >
                                    <option value="">Select</option>
                                    <option value="created_at">Date</option>
                                    <option value="">Qualified</option>
                                    <!-- Add options for other columns as needed -->
                                </select> --}}
                                <button onclick="sortResults()"  class="btn-group btn btn-primary btn-sm mr-2">QUALIFIED</button>
                                <button onclick="NotQualified()" class="btn-group btn btn-danger btn-sm">NOT QUALIFIED</button>


    <script>
        function NotQualified() {
            var baseUrl = '{{ secure_url("employer/approved_intern/not_qualified") }}'; // Replace with your actual sort endpoint

            // Build the URL with the selected sorting column
            var newUrl = baseUrl;

            // Redirect to the new URL
            window.location.href = newUrl;
        }
        function sortResults() {
            var selectedColumn = "test_qualified";
            var baseUrl = '{{ url("employer/approved_intern/qualified") }}'; // Replace with your actual sort endpoint

            // Build the URL with the selected sorting column
            var newUrl = baseUrl;

            // Redirect to the new URL
            window.location.href = newUrl;
        }
    </script>

							</div>
						</div>
						<div class="col-md">
							<div class="mt-3">
								{{-- <form class="form-inline"> --}}
									<div class="input-group ml-auto">
										<input type="text" id="searchInput" class="form-control record-search" placeholder="Search here">
    <ul id="searchResults"></ul>
    <div class="input-group-append">
        <button style="margin-left:-40px;" class="btn btn-outline-success" id="Search_btn">
            <i class="fas fa-search"></i>
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var searchBtn = document.getElementById('Search_btn');
        var tbody = document.getElementById('T_body');

        // Add input event listener to the search input
        searchBtn.addEventListener('click', function () {
            var searchInput = document.getElementById('searchInput');
            var query = searchInput.value.trim();

            // Check if the search input is empty
            if (!query) {
                // Display an error message or take appropriate action
                alert('Please enter a search term.');
            } else {
                // Perform your search logic here
                fetch('/approved_internship_application_search/' + query)
                    .then(response => response.text())
                    .then(data => {
                        clearResults();
                        tbody.innerHTML = data;
                        // console.log(data);
                    })
                    .catch(error => console.error('Error:', error));
            }
        });

        function clearResults() {
            tbody.innerHTML = '';
        }
    });
</script>
								{{-- </form> --}}
							</div>
						</div>
						</div>
				</div>



				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">
							<div class="card-body booking_card">
                                <form action="{{url('select_test_module_for_all/')}}" method="post" id="test_for_all">
                                    @csrf
                                    <label for="">Test schedule for all</label>
                                    <input type="datetime-local" name="datetime" id="datetime">

<script>
    // Get the datetime input element
    var datetimeInput = document.getElementById('datetime');

    // Set min attribute to the current date and time
    datetimeInput.setAttribute('min', getCurrentDateTime());

    function getCurrentDateTime() {
        var now = new Date();
        // Format the date and time in a way that the input expects (YYYY-MM-DDTHH:MM)
        var year = now.getFullYear();
        var month = ('0' + (now.getMonth() + 1)).slice(-2);
        var day = ('0' + now.getDate()).slice(-2);
        var hours = ('0' + now.getHours()).slice(-2);
        var minutes = ('0' + now.getMinutes()).slice(-2);
        // Return in the format 'YYYY-MM-DDTHH:MM'
        return year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
    }

    // Listen for changes in the input value
    datetimeInput.addEventListener('change', function() {
        // Get the selected datetime
        var selectedDatetime = new Date(datetimeInput.value);
        // Get the current datetime
        var currentDatetime = new Date();
        
        // Compare the selected datetime with the current datetime
        if (selectedDatetime < currentDatetime) {
            // If selected datetime is in the past, reset the input value
            datetimeInput.value = getCurrentDateTime();
            alert("Please select a date and time in the future.");
        }
    });
</script>
                                    <input type="hidden" name="intern" value="1" id="">

                                    <button type="submit" >Submit</button>
                                </form>
                            
<script>
    document.getElementById('test_for_all').addEventListener('submit', function(event) {
        event.preventDefault();
        var checkboxes = document.querySelectorAll('.rowCheckbox:checked');

        if (checkboxes.length > 0) {
            if(this.datetime.value !== ''){
                // alert(1); // At least one checkbox is selected
                let loading = document.getElementById('loading');
                loading.classList.remove('d-none');
                // Get the form data
                var formData = new FormData(this);

                // Get the selected checkboxes and append their names and values to the form data
                var checkboxes = document.querySelectorAll('.rowCheckbox:checked');
                checkboxes.forEach(function(checkbox) {
                    // Append each selected checkbox name and value to the form data
                    // formData.append('checkbox_names[]', checkbox.name);
                    formData.append('checkbox_values[]', checkbox.value);
                });

                // Fetch API request
                fetch(this.action, {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    loading.classList.add('d-none');
                    // Handle the response data as needed
                    if(data == 1){
                        // Add flash message to the session
                        window.sessionStorage.setItem('Success', 'Successfully allotted');
                        // Reload the page
                        window.location.reload();
                    }
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
            }
            else{
                alert("Select datetime");
            }
        } else {
            alert("Select checkbox to submit"); // No checkboxes are selected
        }

    });
</script>
								<div class="table-responsive" id="T_body">

									<table class="text-center datatable table table-stripped table table-hover table-center mb-0">
                                        <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
                                            <thead>
                                                <tr>
                                                <th>
												<input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
												</th>

                                                    <th>SI.No</th>
                                                    <th>Name</th>
                                                    <th>Internship Role</th>
                                                    <th>Contact Number</th>
                                                    <th>Email ID</th>
                                                    <th>Resume</th>
                                                    <th>Select Test</th>
                                                    <th>Allot Test Module</th>
                                                    <th>Test Timing</th>
                                                    <th>Test Status</th>
                                                    <th>Test Percentage</th>

                                                    <th>Generate Meeting</th>
                                                    <th>Virtual Forum Status</th>
                                                    <th>View Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $r=1;
                                                @endphp
            @if (count($applications) > 0)

            <script>
                $(document).ready(function () {
                    // Get the current date and time
                    var currentDate = new Date();
                    var currentDateTime = currentDate.toISOString().slice(0, 16);

                    // Set the minimum attribute of the datetime-local input
                    $('input[name="datetime"]').attr('min', currentDateTime);
                });
            </script>



            @foreach ($applications as $int)
                <tr>
                    <td>
                        @if ($int->quiz_id)
                            @if (is_null($int->conducting_datetime))
                                <input type="checkbox" name="checkboxes[]" class="rowCheckbox" value="{{$int->application_id}}">
                            @endif
                        @endif
                    </td>
                    <td>{{$r++}}</td>

                    <td>{{ucwords($int->student_name)}}</td>
                    <td>{{$int->internship_title}}</td>
                    <td>{{$int->student_phone}}</td>
                    <td>{{$int->student_email}}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ url('download', ['filename' => urlencode($int->resume)]) }}" class="btn btn-primary btn-sm mr-2">Download</a>

                            <button class="btn btn-danger btn-sm" id="resumeID" value="{{urlencode($int->resume)}}" onclick="view(this.value)" >View</button>
                            {{-- <button >View</button> --}}

                        </div>
                    </td>

@if ($int->quiz_id)
        @if (is_null($int->test_status))
            <td>
                <a href="{{url('employer/add_test/'.$int->student_id .'/'.$int->application_id.'/'.$int->test_id)}}">
                    <i class="fa fa-plus bg-primary-light mr-3" title="Add test" style="font-size:24px;padding:5px;cursor:pointer"></i>
                </a>
                <a href="{{url('employer/select_test/'.$int->student_id .'/'.$int->application_id.'/'.$int->test_id)}}">
                    <i class="fa fa-list bg-primary-light mr-3" title="Select test" style="font-size:24px;padding:5px;cursor:pointer"></i>
                </a>
                <i class="fa fa-ballot-check"></i>
                <a href="{{url('employer/import_test/'.$int->student_id .'/'.$int->application_id.'/'.$int->test_id)}}">
                    <i class="fa fa-arrow-down bg-danger-light" title="Import Test" style="font-size:24px;padding:5px;cursor:pointer"></i>
                </a>
            </td>
            <td>
                <form action="{{url('select_test_module/'.$int->student_email.'/'.$int->application_id)}}" method="post">
                    @csrf

                    <input type="hidden" name="test_module" value="{{$int->quiz_id}}">
                    <input type="hidden" name="title" value="{{$int->internship_title}}">
                    <input type="datetime-local" name="datetime" id="">
                    <button type="submit" >Submit</button>
                </form>
            </td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td><a href="{{url('employer/candidate_profile/'.$int->student_id .'/'.$int->application_id)}}">view</a></td>
        @elseif ($int->test_status == 0)
            <td>
                <a href="{{url('employer/add_test/'.$int->student_id .'/'.$int->application_id.'/'.$int->test_id)}}">
                    <i class="fa fa-plus bg-primary-light mr-3" title="Add test" style="font-size:24px;padding:5px;cursor:pointer"></i>
                </a>
                <a href="{{url('employer/select_test/'.$int->student_id .'/'.$int->application_id.'/'.$int->test_id)}}">
                    <i class="fa fa-list bg-primary-light mr-3" title="Select test" style="font-size:24px;padding:5px;cursor:pointer"></i>
                </a>
                <i class="fa fa-ballot-check"></i>
                <a href="{{url('employer/import_test/'.$int->student_id .'/'.$int->application_id.'/'.$int->test_id)}}">
                    <i class="fa fa-arrow-down bg-danger-light" title="Import Test" style="font-size:24px;padding:5px;cursor:pointer"></i>
                </a>
            </td>
            <td>Allotted</td>
            <td id="viewDate{{$r}}">
                {{$int->conducting_datetime}}<i onclick="editDate('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
            </td>
            <td id="addDate{{$r}}" style="display:none">
                <form action="{{url('select_test_module/'.$int->student_email.'/'.$int->application_id.'/'.$int->test_id)}}" method="post">
                    @csrf

                    <input type="hidden" name="test_module" value="{{$int->quiz_id}}">
                    <input type="hidden" name="title" value="{{$int->internship_title}}">
                    <input type="datetime-local" name="datetime" id="datetime">

<script>
    // Get the datetime input element
    var datetimeInput = document.getElementById('datetime');

    // Set min attribute to the current date and time
    datetimeInput.setAttribute('min', getCurrentDateTime());

    function getCurrentDateTime() {
        var now = new Date();
        // Format the date and time in a way that the input expects (YYYY-MM-DDTHH:MM)
        var year = now.getFullYear();
        var month = ('0' + (now.getMonth() + 1)).slice(-2);
        var day = ('0' + now.getDate()).slice(-2);
        var hours = ('0' + now.getHours()).slice(-2);
        var minutes = ('0' + now.getMinutes()).slice(-2);
        // Return in the format 'YYYY-MM-DDTHH:MM'
        return year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
    }

    // Listen for changes in the input value
    datetimeInput.addEventListener('change', function() {
        // Get the selected datetime
        var selectedDatetime = new Date(datetimeInput.value);
        // Get the current datetime
        var currentDatetime = new Date();
        
        // Compare the selected datetime with the current datetime
        if (selectedDatetime < currentDatetime) {
            // If selected datetime is in the past, reset the input value
            datetimeInput.value = getCurrentDateTime();
            alert("Please select a date and time in the future.");
        }
    });
</script>
                    <button type="submit" >Submit</button>
                </form>
            </td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td>-</td>
            <td><a href="{{url('employer/candidate_profile/'.$int->student_id .'/'.$int->application_id)}}">view</a></td>
        @elseif ($int->test_status == 1)
            <td>-</td>
            <td>Attended</td>
            <td>{{$int->conducting_datetime}}</td>

            @if ($int->test_qualified == 1)
                <div class="btn-group">
                    <td><span class="btn btn-primary btn-sm mr-2">QUALIFIED</span></td>
                </div>
                <td>{{$int->percentage}}%</td>

                    @if ($int->zoom_meeting != null)
                        @if(\Carbon\Carbon::parse($int->zoom_time)->isFuture())
                            <td id="viewZoomDate{{$r}}">
                                {{$int->zoom_time}}</span><a href="javascript:void(0)" onclick="openMeeting('{{$int->zoom_meeting}}')">Join Meeting</a><i onclick="editZoomDate('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
                            </td>
                            <td id="addZoomDate{{$r}}" style="display:none">
                                <form action="{{url('meeting_link_zoom/'.$int->student_email.'/'.$int->application_id)}}" method="post">
                                    @csrf

                                    <input type="text" name="zoom" placeholder="zoom meeting link">

                                    <input type="datetime-local" name="datetime" id="datetime">

<script>
    // Get the datetime input element
    var datetimeInput = document.getElementById('datetime');

    // Set min attribute to the current date and time
    datetimeInput.setAttribute('min', getCurrentDateTime());

    function getCurrentDateTime() {
        var now = new Date();
        // Format the date and time in a way that the input expects (YYYY-MM-DDTHH:MM)
        var year = now.getFullYear();
        var month = ('0' + (now.getMonth() + 1)).slice(-2);
        var day = ('0' + now.getDate()).slice(-2);
        var hours = ('0' + now.getHours()).slice(-2);
        var minutes = ('0' + now.getMinutes()).slice(-2);
        // Return in the format 'YYYY-MM-DDTHH:MM'
        return year + '-' + month + '-' + day + 'T' + hours + ':' + minutes;
    }

    // Listen for changes in the input value
    datetimeInput.addEventListener('change', function() {
        // Get the selected datetime
        var selectedDatetime = new Date(datetimeInput.value);
        // Get the current datetime
        var currentDatetime = new Date();
        
        // Compare the selected datetime with the current datetime
        if (selectedDatetime < currentDatetime) {
            // If selected datetime is in the past, reset the input value
            datetimeInput.value = getCurrentDateTime();
            alert("Please select a date and time in the future.");
        }
    });
</script>
                                    <button type="submit" >Submit</button>
                                </form>
                                <i onclick="editZoomDateview('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
                            </td>
                            <td>-</td>
                        @else
                            <td id="viewZoomDate{{$r}}">
                                Finished {{ \Carbon\Carbon::parse($int->zoom_time)->diffForHumans() }}
                                <i onclick="editZoomDate('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
                            </td>
                            <td id="addZoomDate{{$r}}" style="display:none">
                                <form action="{{url('meeting_link_zoom/'.$int->student_email.'/'.$int->application_id)}}" method="post">
                                    @csrf

                                    <input type="text" name="zoom" placeholder="zoom meeting link">

                                    <input type="datetime-local" name="datetime" id="">
                                    <button type="submit" >Submit</button>
                                </form>
                                <i onclick="editZoomDateview('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
                            </td>










                                @if ($int->meet_status == 1)
                                    <div class="btn-group">
                                        <td><span class="btn btn-primary btn-sm mr-2">QUALIFIED</span></td>
                                    </div>
                                @elseif (is_null($int->meet_status))
                                    <div class="btn-group">
                                        <td>-</td>
                                    </div>
                                @else
                                    <div class="btn-group">
                                        <td><span class="btn btn-danger btn-sm mr-2">NOT QUALIFIED</span></td>
                                    </div>
                                @endif

                        @endif
                        {{-- <span>{{$int->zoom_time}}</span><a href="javascript:void(0)" onclick="openMeeting('{{$int->zoom_meeting}}')">Join Meeting</a> --}}
                    @else
                        <td>
                            <form action="{{url('meeting_link_zoom/'.$int->student_email.'/'.$int->application_id)}}" method="post">
                            @csrf

                            <input type="text" name="zoom" placeholder="meeting link">
                            <input type="datetime-local" name="datetime" id="">
                            <button type="submit" >Submit</button>
                            </form>
                        </td>
                        <td>-</td>
                    @endif


                <td><a href="{{url('employer/candidate_profile/'.$int->student_id .'/'.$int->application_id)}}">view</a></td>
            @else
                <div class="btn-group">
                    <td><span class="btn btn-danger btn-sm">NOT QUALIFIED</span></td>
                </div>
                <td>{{$int->percentage}}%</td>
                <td>-</td>
                <td>-</td>
                <td><a href="{{url('employer/candidate_profile/'.$int->student_id .'/'.$int->application_id)}}">view</a></td>
            @endif


        @endif
@else

    <td>
        <a href="{{url('employer/add_test/'.$int->student_id .'/'.$int->application_id.'/'.$int->test_id)}}">
            <i class="fa fa-plus bg-primary-light mr-3" title="Add test" style="font-size:24px;padding:5px;cursor:pointer"></i>
        </a>
        <a href="{{url('employer/select_test/'.$int->student_id .'/'.$int->application_id.'/'.$int->test_id)}}">
            <i class="fa fa-list bg-primary-light mr-3" title="Select test" style="font-size:24px;padding:5px;cursor:pointer"></i>
        </a>
        <i class="fa fa-ballot-check"></i>
        <a href="{{url('employer/import_test/'.$int->student_id .'/'.$int->application_id.'/'.$int->test_id)}}">
            <i class="fa fa-arrow-down bg-danger-light" title="Import Test" style="font-size:24px;padding:5px;cursor:pointer"></i>
        </a>
    </td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>


        @if ($int->zoom_meeting != null)
            <td id="viewZoomDate{{$r}}">
                {{$int->zoom_time}}</span><a href="javascript:void(0)" onclick="openMeeting('{{$int->zoom_meeting}}')">Join Meeting</a><i onclick="editZoomDate('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
            </td>
            <td id="addZoomDate{{$r}}" style="display:none">
                <form action="{{url('meeting_link_zoom/'.$int->student_email.'/'.$int->application_id)}}" method="post">
                    @csrf

                    <input type="text" name="zoom" placeholder="zoom meeting link">

                    <input type="datetime-local" name="datetime" id="">
                    <button type="submit" >Submit</button>
                </form>
                <i onclick="editZoomDateview('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
            </td>
            {{-- <td><span>{{$int->zoom_time}}</span><a href="javascript:void(0)" onclick="openMeeting('{{$int->zoom_meeting}}')">Join Meeting</a></td> --}}
            <td>-</td>
        @else
            <td>
                <form action="{{url('meeting_link_zoom/'.$int->student_email.'/'.$int->application_id)}}" method="post">
                @csrf

                <input type="text" name="zoom" placeholder="zoom meeting link">

                <input type="datetime-local" name="datetime" id="">
                <button type="submit" >Submit</button>
                </form>
            </td>
            <td>-</td>
        @endif
    <td><a href="{{url('employer/candidate_profile/'.$int->student_id .'/'.$int->application_id)}}">view</a></td>
@endif


            </tr>
            @endforeach

            @else
                {{-- Handle the case when $internshipDetails is null --}}
                <tr>
                    <td colspan="14" class="text-center"><strong>No application yet</strong></td>
                </tr>
            @endif



                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                        <script>
                                            function view(value) {
                                                    document.getElementById("resume-view").classList.add("resume");
                                                    var resumeView = document.getElementById("resume-view");
                                                    var name = value;

                                                    // Send an AJAX request to Laravel backend
                                                    var xhr = new XMLHttpRequest();
                                                    xhr.open("GET", "/get-pdf/" + name, true);

                                                    xhr.onreadystatechange = function () {
                                                        if (xhr.readyState == 4) {
                                                            if (xhr.status == 200) {
                                                                var response = JSON.parse(xhr.responseText);

                                                                if (response.success) {
                                                                    // Decode the URL and display the PDF
                                                                    var decodedUrl = decodeURIComponent(response.url);
                                                                    decodedUrl = decodedUrl.replace(/'/g, '%27');
                                                                    // console.log(response.url,decodedUrl);
                                                                    resumeView.innerHTML = "<embed class='resume-content' id='RESUME' src='" + decodedUrl + "' width='50%' height='80%' type='application/pdf'>";
                                                                    resumeView.style.display = 'flex';

                                                                    // Attach the click event listener to close the popup when clicking outside
                                                                    document.addEventListener('click', clickOutsidePopup);
                                                                } else {
                                                                    // Display an error message
                                                                    resumeView.innerHTML = "";
                                                                    resumeError.style.display = "block";
                                                                    resumeError.innerHTML = response.message;
                                                                }
                                                            } else {
                                                                console.error(xhr.statusText);
                                                            }
                                                        }
                                                    };

                                                    xhr.send();
                                            }

                                            function clickOutsidePopup(event) {
                                                var resumeView = document.getElementById("resume-view");
                                                var resumeContent = document.getElementById("RESUME");

                                                // Check if the clicked element is outside the popup
                                                if (event.target !== resumeContent && !resumeContent.contains(event.target)) {
                                                    // Close the popup
                                                    closePopup_p();
                                                }
                                            }

                                            function closePopup_p() {
                                                // Your code to close the popup goes here
                                                document.getElementById('resume-view').style.display = 'none';

                                                // Remove the click event listener
                                                document.removeEventListener('click', clickOutsidePopup);
                                            }
                                        </script>

                            <script>
                                function openMeeting(link) {
                                    document.getElementById('meetingFrame').style.display = "";
                                    document.getElementById('meetingFrame').src = link;
                                }
                            </script>
										<button id="deleteButton" class="btn btn-danger mt-4 " style="display: none;">Delete Selected</button>

                            {{$applications->links('guest.link')}}
                                        <div id="resume-view"></div>

                                        <iframe id="meetingFrame" style="display: none" ></iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<div id="viewDropDown">

</div>
			<div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Include jQuery from CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Function to update delete button visibility
        function updateDeleteButtonVisibility() {
            // Check if any of the individual checkboxes are checked
            if ($(".rowCheckbox:checked").length > 0) {
                // Show the delete button
                $("#deleteButton").show();
            } else {
                // Hide the delete button
                $("#deleteButton").hide();
            }
        }

        // Event listener for the "Select All" checkbox
        $("#selectAllCheckbox").change(function () {
            $(".rowCheckbox").prop('checked', $(this).prop('checked'));
            // Update delete button visibility
            updateDeleteButtonVisibility();
        });

        // Event listener for individual checkboxes
        $(".rowCheckbox").change(function () {
            // Update delete button visibility
            updateDeleteButtonVisibility();
        });
    });
</script>
<script>
    function editDate(state,id){
        console.log(state,id,"addDate" + id);
        if(state == 'edit')
        {
            document.getElementById("addDate" + id).style.display = "block";
            document.getElementById("viewDate" + id).style.display = "none";
        }
        else{
            document.getElementById("addDate"  + id).style.display = "none";
            document.getElementById("viewDate"  + id).style.display = "block";
        }
    }

    function editZoomDate(state,id){
        console.log(state,id,"addDate" + id);
        if(state == 'edit')
        {
            document.getElementById("addZoomDate" + id).style.display = "block";
            document.getElementById("viewZoomDate" + id).style.display = "none";
        }
        else{
            document.getElementById("addZoomDate"  + id).style.display = "none";
            document.getElementById("viewZoomDate"  + id).style.display = "block";
        }
    }
    function editZoomDateview(state,id){
        console.log(state,id,"addDate" + id);
        if(state == 'edit')
        {
            document.getElementById("addZoomDate" + id).style.display = "none";
            document.getElementById("viewZoomDate" + id).style.display = "block";
        }
        else{
            document.getElementById("addZoomDate"  + id).style.display = "block";
            document.getElementById("viewZoomDate"  + id).style.display = "none";
        }
    }
</script>



	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	@include('layouts.company_footer')
</body>

</html>
