@if (count($applications) > 0)
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
                    <th>SI... No</th>
                    <th>Name</th>
                    <th>Job Title</th>
                    <th>Phone Number</th>
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


                @endif



















                <!-- Add more rows as needed -->
            </tbody>
        </table>
        <button id="deleteButton" class="btn btn-danger mt-4 " style="display: none;">Delete Selected</button>

@else
    <table class="datatable table table-stripped table table-hover table-center mb-0" >
        <thead>
            <tr>
                {{-- <th>
                <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
                </th> --}}
                <th>SI No</th>
                <th>Name</th>
                <th>Job Title</th>
                <th>Phone Number</th>
                <th>Email ID</th>
                <th>Created_at</th>
                    <th>Modified_at</th>
                <th>Resume</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <td colspan="9" class="text-center"><strong>No application yet</strong></td>
            </tr>
        </tbody>
    </table>
@endif
