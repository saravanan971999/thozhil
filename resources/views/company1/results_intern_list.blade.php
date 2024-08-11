@if (count($user) > 0)
<table id="jobResultsTable" class="datatable table table-stripped table table-hover table-center mb-0">
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
            <th>Offer letter issuing date
            </th>
            <th>Joining date</th>
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
                    <td>{{$u->internship_title}}</td>
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
<form action="{{url('employer/offer_issue_date/'.$u->application_id)}}" method="post" id="myForm1">
@csrf

<input type="date" name="datetime" id="issue_date">
<span id="issuedateError" style="color: red; display: none;">Please select a valid date</span>
<button type="submit">Submit</button>
</form>
<script>
document.getElementById("myForm1").addEventListener("submit", function(event) {
// event.preventDefault();
// alert(3);
var inputDate = document.getElementById("issue_date").value;
var interviewDate = new Date({!! json_encode(\Carbon\Carbon::parse($u->zoom_time)->toDateString()) !!});



var currentDate = new Date().toISOString().slice(0, 10);
var dateError = document.getElementById("issuedateError");

var oneMonthLater = new Date(interviewDate);
oneMonthLater.setMonth(oneMonthLater.getMonth() + 6);

if (inputDate === "") {
dateError.textContent = "Please select a date";
dateError.style.display = "block";
event.preventDefault();
} else if (new Date(inputDate) > oneMonthLater) {
dateError.textContent = "Issue date should be within six months from interview date";
dateError.style.display = "block";
event.preventDefault();
}else if (new Date(inputDate) < new Date(currentDate)) {
dateError.textContent = "Issue date cannot be in the past";
dateError.style.display = "block";
event.preventDefault();
} else {
dateError.style.display = "none";
}
});
</script>
</td>
@elseif (is_null($u->joining_date))
{{-- <td>
{{$u->offer_issue_date}}
</td> --}}
<td id="viewDate{{$r}}">
{{$u->offer_issue_date}}<i onclick="editDate('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
</td>
<td id="addDate{{$r}}" style="display:none">
<form action="{{url('employer/offer_issue_date/'.$u->application_id)}}" method="post" id="myForm1">
@csrf

<input type="date" name="datetime" id="issue_date">
<span id="issuedateError" style="color: red; display: none;">Please select a valid date</span>
<button type="submit">Submit</button>
</form>
<i onclick="editDateView('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
</td>
@else
<td>
{{$u->offer_issue_date}}
</td>
@endif


@if (is_null($u->offer_issue_date))
<td>-</td>
@elseif (is_null($u->joining_date))
<td>
<form action="{{url('employer/joining_date/'.$u->application_id)}}" method="post" id="myForm">
@csrf

<input type="date" name="datetime" id="joining_date">
<span id="joiningdateError" style="color: red; display: none;">Please select a valid date</span>
<button type="submit" >Submit</button>
</form>
</td>
<script>
    document.getElementById("myForm").addEventListener("submit", function(event) {
    var issueDate = document.getElementById("issue_date").value;
    var joiningDate = document.getElementById("joining_date").value;
    var dateError = document.getElementById("joiningdateError");

    var oneYearLater = new Date(issueDate);
    oneYearLater.setFullYear(oneYearLater.getFullYear() + 1);

    if (joiningDate === "") {
        dateError.textContent = "Please select a date";
        dateError.style.display = "block";
        event.preventDefault();
    } else if (new Date(joiningDate) <= new Date(issueDate)) {
        dateError.textContent = "Joining date should be after the issue date";
        dateError.style.display = "block";
        event.preventDefault();
    } else if (new Date(joiningDate) > oneYearLater) {
        dateError.textContent = "Joining date should be within one year from the issue date";
        dateError.style.display = "block";
        event.preventDefault();
    } else {
        dateError.style.display = "none";
    }
});
</script>

@else
<td id="viewJoinDate{{$r}}">
{{$u->joining_date}}<i onclick="editJoinDate('edit',<?=$r?>)" class='fas fa-pen' style='font-size:16px;color:black;padding:7px;margin-left:8px;border-radius:10px;background-color:red;cursor:pointer'></i>
</td>
<td id="addJoinDate{{$r}}" style="display:none">
<form action="{{url('employer/joining_date/'.$u->application_id)}}" method="post" id="myForm">
@csrf

<input type="date" name="datetime" id="joining_date">
<span id="joiningdateError" style="color: red; display: none;">Please select a valid date</span>
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

    {{-- {{$user->links('guest.link')}} --}}
    <div id="resume-view"></div>
@else
<table id="jobResultsTable" class="datatable table table-stripped table table-hover table-center mb-0">
    <thead>
        <tr>
        {{-- <th>
                <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
                </th> --}}

            <th>SI.No</th>
            <th>Name</th>
            <th>Internship Title</th>
            <th> Test Date</th>
            <th>Interview Date</th>
            <th>Resume</th>
            <th>Status</th>
            <th>Offer letter</th>
            <th>Joining date</th>
        </tr>
    </thead>
        <tbody>
            <tr>
                <td colspan="9" class="text-center"><strong>No records found</strong> </td>
            </tr>
        </tbody>
</table>
@endif
