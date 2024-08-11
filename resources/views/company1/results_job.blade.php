<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Offer Oasis Jobs</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
@include('layouts.company_header')
</head>

<body>

    @include('layouts.company_sidebar')
    @include('layouts.alert')


    <div class="page-wrapper">
        <div class="content container-fluid">
            <h5 class="mt-5">Offer Oasis Jobs</h5>
            <div class="page-header">
                <div class="row align-items-center">

                    <div class="col">
                        <div class="mt-5">
                            {{-- <label for="sort-column">Sort by:</label>
                            <select id="sort-column">
                                <option value="0">Date</option>
                                    <option value="1">Internship Title</option>
                                    <!-- Add options for other columns as needed -->
                                </select> --}}
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
                                            if (query === '') {
                                                // Display an error message or take appropriate action
                                                alert('Please enter a search term.');
                                            } else {
                                                // Perform your search logic here
                                                fetch('/results_job_application_search/' + query)
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

                                <div class="btn-group mt-3">
                                    <button type="button" onclick="filterResults(1)" class="btn btn-primary btn-sm rounded mr-2">All</button>
                                    {{-- <button  onclick="Filter(2)" type="button" class="btn btn-secondary btn-sm rounded mr-2">Selected</button> --}}
                                    {{-- <button  onclick="Filter(1)" type="button" class="btn btn-success btn-sm rounded mr-2">Rejected</button> --}}
                                    <button  onclick="filterResults(3)" type="button" class="btn btn-warning text-white btn-sm rounded mr-2">Offers Issued</button>
                                    <button  onclick="filterResults(4)" type="button" class="btn btn-danger btn-sm rounded mr-2">Offers Not Issued</button>
                                    {{-- <button  onclick="Filter(5)" type="button" class="btn btn-dark btn-sm rounded mr-2">Send Offer Letter</button> --}}
                                    <button id="exportToExcel" type="button" class="btn btn-info btn-sm ml-1 btn-curved"><small>Export To Excel</small></button>
                                </div>
<script>
    function filterResults(value) {
        var baseUrl = '{{ url("employer/results_job") }}'; // Replace with your actual URL endpoint

        // Build the URL with the selected value
        var newUrl = baseUrl + '/' + value;

        // Redirect to the new URL
        window.location.href = newUrl;
    }
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
                                <table id="jobResultsTable" class="datatable table table-stripped table table-hover table-center mb-0">
                                    <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
                                        <thead>
                                            <tr>
                                            {{-- <th>
												<input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
												</th> --}}

                                                <th>SI.No</th>
                                                <th>Name</th>
                                                <th>Internship Title</th>
                                                <th>Test Date</th>
                                                <th>Interview Date</th>
                                                <th>Resume</th>
                                                <th>Status</th>
                                                <th>Offer letter</th>
                                                <th>Joining date</th>
                                                <!-- <th class="text-right">Actions</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @php
                                            $r=1;
                                        @endphp
                                        @if (count($user) > 0)
                                            @foreach ($user as $u)
                                                <tr>
                                                {{-- <td>
					 <input type="checkbox" class="rowCheckbox">
					</td> --}}
                                                    <td>{{$r++}}</td>
                                                    <td>{{ucwords($u->student_name)}}</td>
                                                    <td>{{$u->job_title}}</td>
                                                    <td>{{ \Carbon\Carbon::parse($u->conducting_datetime)->format('jS M Y') }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($u->zoom_time)->format('jS M Y') }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ url('download', ['filename' => urlencode($u->resume)]) }}"><button type="button" class="btn btn-primary btn-sm mr-2">
                                                                <i class="fas fa-download"></i>
                                                            </button></a>

                                                            <button id="resumeID"  class="btn btn-danger btn-sm" value="{{urlencode($u->resume)}}" onclick="view(this.value)" >
                                                                    <i class="fas fa-eye"></i>
                                                            </button>
                                                            {{-- <button >View</button> --}}

                                                        </div>
                                                    </td>
                                                    <td>
                                                        @if ($u->meet_status == 1)
                                                            Selected
                                                        @else
                                                            Not selected
                                                        @endif
                                                    </td>

                @if (is_null($u->offer_issue_date))
                    <td>
                        <form action="{{url('employer/offer_issue_date/'.$u->application_id)}}" method="post">
                            @csrf

                            <input type="date" name="datetime" id="">
                            <button type="submit" >Submit</button>
                        </form>
                    </td>
                @elseif (is_null($u->joining_date))
                    {{-- {{$u->offer_issue_date}} --}}
                    <td id="viewDate{{$r}}">
                        {{$u->offer_issue_date}}<i onclick="editDate('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
                    </td>
                    <td id="addDate{{$r}}" style="display:none">
                        <form action="{{url('employer/offer_issue_date/'.$u->application_id)}}" method="post">
                            @csrf

                            <input type="date" name="datetime" id="">
                            <button type="submit" >Submit</button>
                        </form>
                        <i onclick="editDateView('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
                    </td>
                @else
                    <td> {{$u->offer_issue_date}}</td>
                @endif


        @if (is_null($u->offer_issue_date))
            <td>-</td>
        @elseif (is_null($u->joining_date))
            <td>
                <form action="{{url('employer/joining_date/'.$u->application_id)}}" method="post">
                    @csrf

                    <input type="date" name="datetime" id="">
                    <button type="submit" >Submit</button>
                </form>
            </td>
        @else
            <td id="viewJoinDate{{$r}}">
                {{$u->joining_date}}<i onclick="editJoinDate('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
            </td>
            <td id="addJoinDate{{$r}}" style="display:none">
                <form action="{{url('employer/joining_date/'.$u->application_id)}}" method="post">
                    @csrf

                    <input type="date" name="datetime" id="">
                    <button type="submit" >Submit</button>
                </form>
                <i onclick="editJoinDateview('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
            </td>

        @endif

                                                </tr>
                                            @endforeach
                                        @else
                                         <td colspan="9" class="text-center"><strong>No records found</strong> </td>
                                        @endif



                                        </tbody>
                                    </table>
                                    <button id="deleteButton" class="btn btn-danger mt-4 " style="display: none;">Delete Selected</button>

                                    {{$user->links('guest.link')}}
                                    <div id="resume-view"></div>





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
    function editDateView(state,id){
        console.log(state,id,"addDate" + id);
        if(state == 'edit')
        {
            document.getElementById("addDate" + id).style.display = "none";
            document.getElementById("viewDate" + id).style.display = "block";
        }
        else{
            document.getElementById("addDate"  + id).style.display = "block";
            document.getElementById("viewDate"  + id).style.display = "none";
        }
    }


    function editJoinDate(state,id){
        console.log(state,id,"addJoinDate" + id);
        if(state == 'edit')
        {
            document.getElementById("addJoinDate" + id).style.display = "block";
            document.getElementById("viewJoinDate" + id).style.display = "none";
        }
        else{
            document.getElementById("addJoinDate"  + id).style.display = "none";
            document.getElementById("viewJoinDate"  + id).style.display = "block";
        }
    }
    function editJoinDateview(state,id){
        console.log(state,id,"addJoinDate" + id);
        if(state == 'edit')
        {
            document.getElementById("addJoinDate" + id).style.display = "none";
            document.getElementById("viewJoinDate" + id).style.display = "block";
        }
        else{
            document.getElementById("addJoinDate"  + id).style.display = "block";
            document.getElementById("viewJoinDate"  + id).style.display = "none";
        }
    }



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
        // Function to export table data to Excel
        function exportToExcel() {
            const table = document.getElementById("jobResultsTable");
            const ws = XLSX.utils.table_to_sheet(table);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "JobResults");
            XLSX.writeFile(wb, "JobResults.xlsx");
        }

        // Attach click event listener to the export button
        document.getElementById("exportToExcel").addEventListener("click", exportToExcel);
    </script>


    @include('layouts.company_footer')
</body>
</html>
