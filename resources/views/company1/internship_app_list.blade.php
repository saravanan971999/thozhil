@if (count($applications) > 0)

<table class="datatable table table-stripped table table-hover table-center mb-0">
    <thead>
            <tr>
            {{-- <th>
                <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
                </th> --}}
                <th>SI.No</th>
                <th>Name</th>
                <th>Internship Title</th>
                <th>Phone Number</th>
                <th>Email ID</th>
                <th>Created_at</th>
                <th>Modified_at</th>
                <th>Resume</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody id="app">
        <button id="deleteButton" class="btn btn-danger mt-4 " style="display: none;">Delete Selected</button>

            @php
                $r=1;
            @endphp
@if ($applications != null)

<div class="btn-group">
<a href="{{ url('/employer/approve_all_interns_app') }}">
<button class="btn btn-primary btn-sm mr-2">Approve all</button>
</a>
<a href="{{ url('/employer/reject_all_interns_app') }}">
<button class="btn btn-danger btn-sm">Reject all</button>
</a>
</div>
@foreach ($applications as $int)
<tr>
{{-- <td>
<input type="checkbox" class="rowCheckbox">
</td> --}}
<td>{{$r++}}</td>
<td>{{ucwords($int->student_name)}}</td>
<td>{{$int->internship_title}}</td>
<td>{{$int->student_phone}}</td>
<td>{{$int->student_email}}</td>
<td>{{$int->created_at}}</td>
<td>{{$int->modified_at}}</td>
<td>
<div class="btn-group">
<a href="{{ url('download', ['filename' => urlencode($int->resume)]) }}" class="btn btn-primary btn-sm mr-2">Download</a>

<button class="btn btn-danger btn-sm" id="resumeID_{{$int->application_id}}" onclick="view(this.value)" value="{{$int->resume}}">View</button>
</div>
</td>
<td class="text-right">
<div class="btn-group">
<a href="{{ url('/employer/approve_intern', ['input' => $int->application_id]) }}">
<button class="btn btn-primary btn-sm mr-2">Approve</button>
</a>

<a href="" data-toggle="modal" data-target="#reject_modal_{{$int->application_id}}">
<button class="btn btn-danger btn-sm">Reject</button>
</a>

<div id="reject_modal_{{$int->application_id}}" class="modal fade delete-modal" role="dialog">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content">
    <div class="modal-body text-center">
        <img src="assets/img/sent.png" alt="" width="50" height="46">
        <h3 class="delete_class">Are you sure you want to reject this application?</h3>
        <div class="m-t-20">
            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
            <a href="{{ url('/employer/reject_intern', ['input' => $int->application_id]) }}" class="btn btn-danger">
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
    <div id="resume-view"></div>

@else
<table class="datatable table table-stripped table table-hover table-center mb-0">
    <thead>
        <tr>
        {{-- <th>
            <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
            </th> --}}
            <th>SI.No</th>
            <th>Name</th>
            <th>Internship Title</th>
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
