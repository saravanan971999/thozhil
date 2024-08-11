<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>
	@include('layouts.company_header')
</head>
<body>
	<div class="main-wrapper">
		@include('layouts.company_sidebar')
        @include('layouts.alert')
        		<div class="page-wrapper">
			<div class="content container-fluid">
				<h5 class="mt-5">Job Application Received</h5>
				<div class="page-header">
					<div class="row align-items-center">

						<div class="col">
							<div class="mt-5">
								<label for="sort-column">Sort by:</label>
								<select id="sort-column"  onchange="demo()">Select
                                    <option value="default">Select</option>
                                    <option value="0">Latest</option>
                                    <option value="1">Oldest</option>
                                </select>
                    <script>
                        function demo() {
                                selected = document.getElementById('sort-column').value;
                                var applications = @json($applications);
                            if (selected == 0) {
                                applications.sort((function(a, b) {
                                var dateA = new Date(a.modified_at);
                                var dateB = new Date(b.modified_at);
                                return dateB - dateA ;
                                }));
                                document.getElementById('app').innerHTML = sortedData(applications);
                            }
                            else if(selected == 1){

                                applications.sort((function(a, b) {
                                var dateA = new Date(a.created_at);
                                var dateB = new Date(b.created_at);
                                return dateA - dateB;
                                }));
                                document.getElementById('app').innerHTML = sortedData(applications);

                            }
                            else{
                                var applications = @json($applications);
                                document.getElementById('app').innerHTML = sortedData(applications);
                            }
                        }
                        function sortedData(applications) {
                            var sortedData = '';
                            for (i = 0; i < applications.length; i++) {
                                var resume = encodeURIComponent((applications[i].resume));
                                var app_id = encodeURIComponent((applications[i].application_id));
                                sortedData +=
                                            `<tr>
                                            <td>${i+1}</td>
                                            <td>${applications[i].student_name}</td>
                                            <td>${applications[i].job_title}</td>
                                            <td>${applications[i].student_phone}</td>
                                            <td>${applications[i].student_email}</td>
                                            <td>`+applications[i].created_at+`</td>
                                            <td>`+applications[i].modified_at+`</td>
                                            <td>
                                                 <div class="btn-group">
                                                 <a href="{{url('download')}}/`+resume+`" class="btn btn-primary btn-sm mr-2">Download</a>


                                                    <button class="btn btn-danger btn-sm"
                                                        data-resume="`+resume+`"
                                                        onclick="view(this)">View</button>

                                                 </div>
                                             </td>
                                             <td class="text-right">
                                                <div class="btn-group">
                                                    <a
                                                        href="{{ url('/employer/approve_job')}}/`+app_id+`">
                                                        <button class="btn btn-primary btn-sm mr-2">Approve</button>
                                                    </a>

                                                    <a href="" data-toggle="modal"
                                                        data-target="#rejectModal_`+applications[i].application_id+`">
                                                        <button class="btn btn-danger btn-sm">Reject</button>
                                                    </a>

                                                    <!-- Reject Modal -->
                                                    <div id="rejectModal_`+applications[i].application_id+`"
                                                        class="modal fade delete-modal" role="dialog">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-body text-center">
                                                                    <img src="assets/img/sent.png" alt="" width="50"
                                                                        height="46">
                                                                    <h3 class="delete_class">Are you sure you want
                                                                        to reject this application?</h3>
                                                                    <div class="m-t-20">
                                                                        <a href="#" class="btn btn-white"
                                                                            data-dismiss="modal">Close</a>
                                                                        <a href="{{ url('/employer/reject_job')}}/`+app_id+`"
                                                                            class="btn btn-danger">
                                                                            Reject
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                                            </tr>`;


                            }

                            return sortedData;
                        }

                    </script>
							</div>
						</div>
						<div class="col-md-6">
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
                fetch('/job_application_search/' + query)
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
								<div class="table-responsive" id="T_body">
									<table class="datatable table table-stripped table table-hover table-center mb-0" >
                                    <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->


                                            @php
                                            $r=1;
                                            @endphp
                                            @if (count($applications) > 0)

                                            <div class="btn-group">
                                                <a href="{{ url('/employer/approve_all_jobs_app') }}">
                                                    <button class="btn btn-primary btn-sm mr-2">Approve all jobs</button>
                                                </a>
                                                <a href="{{ url('/employer/reject_all_jobs_app') }}">
                                                    <button class="btn btn-danger btn-sm">Reject all jobs</button>
                                                </a>
                                            </div>
                                            <thead>
                                                <tr>
                                                    {{-- <th>
                                                        <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
                                                    </th> --}}
                                                    <th>SI.No</th>
                                                    <th>Name</th>
                                                    <th>Job Role</th>
                                                    <th>Contact Number</th>
                                                    <th>Email ID</th>
                                                    <th>Created_at</th>
                                                    <th>Modified_at</th>
                                                    <th>Resume</th>
                                                    <th class="text-right">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody id="app">
                                                @foreach ($applications as $int)
                                                <tr>
                                                    {{-- <td>
                                                        <input type="checkbox" class="rowCheckbox">
                                                    </td> --}}
                                                    <td>{{$r++}}</td>
                                                    <td>{{ucwords($int->student_name)}}</td>
                                                    <td>{{$int->job_title}}</td>
                                                    <td>{{$int->student_phone}}</td>
                                                    <td>{{$int->student_email}}</td>
            <td>{{\Carbon\Carbon::parse($int->created_at)->format('jS M Y g:ia')}}</td>
            <td>{{\Carbon\Carbon::parse($int->modified_at)->format('jS M Y g:ia')}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ url('download', ['filename' => urlencode($int->resume)]) }}"
                                                                class="btn btn-primary btn-sm mr-2">Download</a>

                                                            <button class="btn btn-danger btn-sm"
                                                                data-resume="{{urlencode($int->resume)}}"
                                                                onclick="view(this)">View</button>
                                                            <!-- The "data-resume" attribute stores the resume value dynamically -->

                                                            {{-- <button class="btn btn-danger btn-sm" id="resumeID"
                                                                value="{{urlencode($int->resume)}}"
                                                                onclick="view()">View</button> --}}
                                                            {{-- <button>View</button> --}}


                                                            <script>
                                                                    function view(button) {
                                                                        var resumeView = document.getElementById("resume-view");
                                                                        var resumeError = document.getElementById("resume-error");
                                                                        document.getElementById("resume-view").classList.add("resume");
                                                                        var name = button.getAttribute("data-resume");

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

                                                            <!-- Resume View Modal -->
                                                            {{-- <div id="resumeModal_{{$int->application_id}}"
                                                                class="modal fade" role="dialog">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body text-center">
                                                                            <img src="assets/img/sent.png" alt="" width="50"
                                                                                height="46">
                                                                            <h3 class="modal-title">Resume</h3>
                                                                            <div class="m-t-20">
                                                                                <embed class='resume-content'
                                                                                    id='RESUME_{{$int->application_id}}' src=''
                                                                                    width='50%' height='80%'
                                                                                    type='application/pdf'>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="btn-group">
                                                            <a
                                                                href="{{ url('/employer/approve_job', ['input' => $int->application_id]) }}">
                                                                <button class="btn btn-primary btn-sm mr-2">Approve</button>
                                                            </a>

                                                            <a href="" data-toggle="modal"
                                                                data-target="#rejectModal_{{$int->application_id}}">
                                                                <button class="btn btn-danger btn-sm">Reject</button>
                                                            </a>

                                                            <!-- Reject Modal -->
                                                            <div id="rejectModal_{{$int->application_id}}"
                                                                class="modal fade delete-modal" role="dialog">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <div class="modal-content">
                                                                        <div class="modal-body text-center">
                                                                            <img src="assets/img/sent.png" alt="" width="50"
                                                                                height="46">
                                                                            <h3 class="delete_class">Are you sure you want
                                                                                to reject this application?</h3>
                                                                            <div class="m-t-20">
                                                                                <a href="#" class="btn btn-white"
                                                                                    data-dismiss="modal">Close</a>
                                                                                <a href="{{ url('/employer/reject_job', ['input' => $int->application_id]) }}"
                                                                                    class="btn btn-danger">
                                                                                    Reject
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach


                                                @else
                                                {{-- Handle the case when $internshipDetails is null --}}
                                                <tr>
                                                    <td colspan="9" class="text-center"><strong>No application yet</strong></td>
                                                    </tr>
                                                @endif



















                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
										<button id="deleteButton" class="btn btn-danger mt-4 " style="display: none;">Delete Selected</button>

								</div>
							</div>
                            <div id="resume-view"></div>
						</div>
					</div>
				</div>
			</div>
			{{-- <div id="delete_asset" class="modal fade delete-modal" role="dialog">
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
			</div> --}}
		</div>
	</div>

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



    function approve_all_Jobs() {
        var checkboxes = document.getElementsByName('checkbox[]');
        var values = [];
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                values.push(checkbox.value);
            }
        });
        if (values) {
            fetch('employer/approve_selected_jobs_app/' + values)
                .then(response =>  response.text())
                .then(data =>{
                    // clearResults();
                    // tbody.innerHTML = data;
                    console.log('Response:', data);

                })
                .catch(error => console.error('Error:', error));
        }
        else {
            clearResults();
        }
    }


        function clearResults() {
            tbody.innerHTML = '';
        }
    // });
</script>


	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    @include('layouts.company_footer')
</body>

</html>
