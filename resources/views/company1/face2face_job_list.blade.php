@if (count($user) > 0)

<table class="datatable table table-stripped table table-hover table-center mb-0">
    <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
        <thead>
            <tr>
            {{-- <th>
            <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
            </th> --}}

                <th>SI.No</th>
                <th>Name</th>
                <th>Job Role</th>
                <th>Date</th>
                <th>Zoom</th>
                <!-- <th>Download</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
@if ($user)
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
<td>{{$u->job_title}}</td>
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

</tr>
@endforeach

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

@else
<table class="datatable table table-stripped table table-hover table-center mb-0">
    <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
        <thead>
            <tr>
            {{-- <th>
            <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
            </th> --}}

                <th>SI.No</th>
                <th>Name</th>
                <th>Job Role</th>
                <th>Date</th>
                <th>Zoom</th>
                <!-- <th>Download</th> -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="6" class="text-center"><strong>No records found</strong> </td>
            </tr>
        </tbody>
</table>
@endif
