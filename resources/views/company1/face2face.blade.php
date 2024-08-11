<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
@include('layouts.company_header')
<style>
    iframe {
      width: 100%;
      height: 500px;
      border: 1px solid #ddd;
    }
</style>
</head>

<body>
	<div class="main-wrapper">

    @include('layouts.company_sidebar')
    @include('layouts.alert')

    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <h5 class="mt-5">Face to Face Internships</h5>
                <div class="page-header">
                    <div class="row align-items-center">

                        <div class="col">
                            <div class="mt-5">
                                {{-- <label for="sort-column">Sort by:</label>
                                <select id="sort-column">
                                    <option value="0">Date</option>
                                    <option value="1">Internship Role</option>
                                    <!-- Add options for other columns as needed -->
                                </select> --}}
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mt-3">
                                {{-- <form class="form-inline"> --}}
                                    <div class="input-group ml-auto">
                                        <input type="text" id="searchInput"  class="form-control record-search" placeholder="Search here">
                                        <ul id="searchResults"></ul>
										<div class="input-group-append">
											<button style="margin-left:-40px;" class="btn btn-outline-success" id="Search_btn" >
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

            var query = document.getElementById('searchInput').value.trim();
            if (query) {
                fetch('/face_to_face_intern_application_search/' + query)
                    .then(response =>  response.text())
                    .then(data =>{
                        clearResults();
                        tbody.innerHTML = data;
                        // console.log(data);

                    })
                    .catch(error => console.error('Error:', error));
            } else {
                clearResults();
            }
        });

        function clearResults() {
            tbody.innerHTML = '';
        }
    });
</script>

                                {{-- </form>  --}}
                            </div>
                        </div>
                        </div>
                </div>



            <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table">
                            <div class="card-body booking_card">
                                <div class="table-responsive" id="T_body">
                                    <table class="datatable table table-stripped table table-hover table-center mb-0">
                                        <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
                                            <thead>
                                                <tr>
                                                {{-- <th>
												<input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
												</th> --}}
                                                    <th>SI.No</th>
                                                    <th>Name</th>
                                                    <th>Internship Role</th>
                                                    <th>Date</th>
                                                    <th>Zoom</th>
                                                    <!-- <th>Download</th> -->
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                @if (count($user) > 0)
                    @php
                        $r=1;
                    @endphp
                    @foreach ($user as $u)
                    <tr>
                    {{-- <td>
					 <input type="checkbox" class="rowCheckbox">
					</td> --}}
                        <td>{{$r++}}</td>
                        <td>{{$u->student_name}}</td>
                        <td>{{$u->internship_title}}</td>


                        @php
                            $startTime = \Illuminate\Support\Carbon::parse($u->zoom_time);
                            $endTime = $startTime->copy()->addHour();
                        @endphp

                        @if (\Illuminate\Support\Carbon::now() >= $startTime && \Illuminate\Support\Carbon::now() <= $endTime)
                            <td>  {{ \Carbon\Carbon::parse($u->zoom_time)->format('jS M Y g:ia') }} </td>
                            <td><a href="javascript:void(0)" onclick="openMeeting('{{$u->zoom_meeting}}')">Join Meeting</a></td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{url('employer/interview_approval/'.$u->application_id .'/1')}}">
                                        <button type="button" class="btn btn-primary btn-sm mr-2">Select candidate</button>
                                    </a>
                                    <a href="{{url('employer/interview_approval/'.$u->application_id .'/0')}}">
                                        <button type="button" class="btn btn-danger btn-sm">Reject</button>
                                    </a>
                                </div>
                            </td>
                        @elseif(\Carbon\Carbon::parse($u->zoom_time)->isFuture())
                            <td>  {{ \Carbon\Carbon::parse($u->zoom_time)->format('jS M Y g:ia') }} </td>
                            {{-- <td><a href="javascript:void(0)" onclick="openMeeting('{{$u->zoom_meeting}}')">Join Meeting</a></td> --}}
                            <td>-</td>
                            <td>
                                <div class="btn-group">
                                    {{-- <a href="{{url('employer/interview_approval/'.$u->application_id .'/1')}}"> --}}
                                        <button type="button" class="btn btn-primary btn-sm mr-2" disabled>Select candidate</button>
                                    {{-- </a> --}}
                                    {{-- <a href="{{url('employer/interview_approval/'.$u->application_id .'/0')}}"> --}}
                                        <button type="button" class="btn btn-danger btn-sm" disabled>Reject</button>
                                    {{-- </a> --}}
                                </div>
                            </td>
                        @else
                            <td>  Finished on {{ \Carbon\Carbon::parse($u->zoom_time)->format('jS M Y') }} </td>
                                <td>-</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{url('employer/interview_approval/'.$u->application_id .'/1')}}">
                                            <button type="button" class="btn btn-primary btn-sm mr-2">Select candidate</button>
                                        </a>
                                        <a href="{{url('employer/interview_approval/'.$u->application_id .'/0')}}">
                                            <button type="button" class="btn btn-danger btn-sm">Reject</button>
                                        </a>
                                    </div>
                                </td>
                        @endif


                        {{-- <td>
                            <div class="btn-group">
                                <a href="{{url('employer/interview_approval/'.$u->application_id .'/1')}}">
                                    <button type="button" class="btn btn-primary btn-sm mr-2" disabled>Select candidate</button>
                                </a>
                                <a href="{{url('employer/interview_approval/'.$u->application_id .'/0')}}">
                                    <button type="button" class="btn btn-danger btn-sm" disabled>Reject</button>
                                </a>
                            </div>
                        </td> --}}
                    </tr>
                    @endforeach
                @else
                <td colspan="6" class="text-center"><strong>No records found</strong> </td>
                @endif

                <script>




                    function openMeeting(link) {
                        document.getElementById('meetingFrame').style.display = "";
                      document.getElementById('meetingFrame').src = link;
                    }
                </script>
                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                        <button id="deleteButton" class="btn btn-danger mt-4 " style="display: none;">Delete Selected</button>

<iframe id="meetingFrame" style="display: none" ></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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



      @include('layouts.company_footer')
</body>
</html>
