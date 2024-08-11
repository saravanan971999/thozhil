@if (count($applications) > 0)
<table class="datatable table table-stripped table table-hover table-center mb-0">
    <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
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
                <th>Resume</th>
                {{-- <th class="text-right">Actions</th> --}}
            </tr>
        </thead>
        <tbody>

                @php
                    $r=1;
                @endphp
@if ($applications != null)

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
{{-- <td class="text-right">
<div class="btn-group">
<a href="{{ url('/employer/approve_job', ['input' => $int->application_id]) }}">
<button class="btn btn-primary btn-sm mr-2">Approve</button>
</a>
<a href="{{ url('/employer/reject_job', ['input' => $int->application_id]) }}">
<button class="btn btn-danger btn-sm">Reject</button>
</a>
</div>
</td> --}}
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

        <div id="resume-view"></div>

@else
<table class="datatable table table-stripped table table-hover table-center mb-0">
    <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
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
                <th>Resume</th>
                {{-- <th class="text-right">Actions</th> --}}
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" class="text-center"><strong>No records found</strong></td>
            </tr>
        </tbody>
</table>
@endif
