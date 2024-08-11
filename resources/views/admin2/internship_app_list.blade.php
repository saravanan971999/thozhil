@if (count($applications) > 0)

<table id="jobResultsTable" class="datatable table table-stripped table table-hover table-center mb-0">
    <thead>
            <tr>
            {{-- <th>
                <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
                </th> --}}
                <th>SI.No</th>
                <th>Name</th>
                <th>Company Name</th>
                <th>Internship Title</th>
                <th>Phone Number</th>
                <th>Email ID</th>
                <th>Created_at</th>
                <th>Modified_at</th>
                <th>Resume</th>
            </tr>
        </thead>
        <tbody id="app">
        <button id="deleteButton" class="btn btn-danger mt-4 " style="display: none;">Delete Selected</button>

            @php
                $r=1;
            @endphp


@foreach ($applications as $int)
<tr>
<td>{{$r++}}</td>
<td>{{ucwords($int->student_name)}}</td>
<td>{{ucwords($int->company_name)}}</td>
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
</tr>
@endforeach


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
            <th>Company Name</th>
            <th>Internship Title</th>
            <th>Phone Number</th>
            <th>Email ID</th>
            <th>Created_at</th>
            <th>Modified_at</th>
            <th>Resume</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="9" class="text-center"><strong>No application yet</strong></td>
        </tr>
    </tbody>
</table>
@endif
