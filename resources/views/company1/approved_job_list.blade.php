@if (count($applications) > 0)
<table class="datatable table table-stripped table table-hover table-center mb-0">
    <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
        <thead>
            <tr>
            <th>
            <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
            </th>

                <th>SI No</th>
                <th>Name</th>
                <th>Job Title</th>
                <th>Phone Number</th>
                <th>Email ID</th>
                <th>Resume</th>
                <th>Select test</th>
                <th>Allot test module</th>
                <th>Test Timing</th>

                <th>Test Status</th>
                <th>Test percentage</th>
                {{-- <th>Test Qualified</th> --}}
                <th>Generate meeting</th>
                <th>Zoom Qualified</th>
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
<td>{{$int->job_title}}</td>
<td>{{$int->student_phone}}</td>
<td>{{$int->student_email}}</td>
<td>
<div class="btn-group">
<a href="{{ url('download', ['filename' => urlencode($int->resume)]) }}" class="btn btn-primary btn-sm mr-2">Download</a>

<button class="btn btn-danger btn-sm" id="resumeID" value="{{urlencode($int->resume)}}" onclick="view()" >View</button>
{{-- <button >View</button> --}}


<script>
function view() {
document.getElementById("resume-view").classList.add("resume");
var resumeView = document.getElementById("resume-view");
var name = document.getElementById("resumeID").value;

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
        <a href="{{url('employer/import_test/'.$int->student_id .'/'.$int->application_id.'/'.$int->test_id)}}">
            <i class="fa fa-arrow-down bg-danger-light" title="Import Test" style="font-size:24px;padding:5px;cursor:pointer"></i>
        </a>
    </td>
    <td>
        <form action="{{url('select_test_module/'.$int->student_email.'/'.$int->application_id.'/'.$int->test_id)}}" method="post">
             @csrf

            <input type="hidden" name="test_module" value="{{$int->quiz_id}}">
            <input type="hidden" name="title" value="{{$int->job_title}}">
            <input type="datetime-local" name="datetime" id="">
            <button type="submit" onclick="editDate('submit')">Submit</button>
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
            <input type="hidden" name="title" value="{{$int->job_title}}">
            <input type="datetime-local" name="datetime" id="">
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

                <input type="datetime-local" name="datetime" id="">
                <button type="submit" >Submit</button>
            </form>
            <i onclick="editZoomDateview('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
        </td>
                    <td>-</td>
                @else
                    <td id="viewZoomDate{{$r}}">Finished {{ \Carbon\Carbon::parse($int->zoom_time)->diffForHumans() }}<i onclick="editZoomDate('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i></td>
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

                    <input type="text" name="zoom" placeholder="zoom meeting link">
                    <input type="datetime-local" name="datetime" id="">
                    <button type="submit" >Submit</button>
                    </form>
                </td>
                <td>-</td>
            @endif


        <td><a href="{{url('employer/candidate_profile/'.$int->student_id .'/'.$int->application_id)}}">view</a></td>
    @else
        <div class="btn-group"><td><span class="btn btn-danger btn-sm">NOT QUALIFIED</span></td></div>
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
<td colspan="7">No application yet.</td>
</tr>
@endif
                <!-- Add more rows as needed -->
            </tbody>
        </table>
        <button id="deleteButton" class="btn btn-danger mt-4 " style="display: none;">Delete Selected</button>

        {{$applications->links('guest.link')}}
        <div id="resume-view"></div>
        <script>
            function openMeeting(link) {
                document.getElementById('meetingFrame').style.display = "";
              document.getElementById('meetingFrame').src = link;
            }
        </script>
        <iframe id="meetingFrame" style="display: none" ></iframe>
@else

<table class="datatable table table-stripped table table-hover table-center mb-0">
    <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
        <thead>
            <tr>
            <th>
            <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
            </th>

            <th>SI No</th>
            <th>Name</th>
            <th>Job Title</th>
            <th>Phone Number</th>
            <th>Email ID</th>
            <th>Resume</th>
            <th>Select test</th>
            <th>Allot test module</th>
            <th>Test Timing</th>

            <th>Test Status</th>
            <th>Test percentage</th>
            {{-- <th>Test Qualified</th> --}}
            <th>Generate meeting</th>
            <th>Zoom Qualified</th>
            <th>View profile</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="14" class="text-center"><strong>No records found</strong></td>
            </tr>
@endif
