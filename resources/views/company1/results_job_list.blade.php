@if (count($user) > 0)
<table id="jobResultsTable" class="datatable table table-stripped table table-hover table-center mb-0">
    <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
        <thead>
            <tr>
            {{-- <th>
                <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
                </th> --}}

                <th>SI.No</th>
                <th>Name</th>
                <th>Job Role</th>
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
        @if ($user)
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
                    <td>
                        @if (is_null($u->offer_issue_date))
                        <form action="{{url('employer/offer_issue_date/'.$u->application_id)}}" method="post">
                            @csrf

                            <input type="date" name="datetime" id="">
                            <button type="submit" >Submit</button>
                        </form>
                        @else
                            {{$u->offer_issue_date}}
                        @endif
                    </td>
                    <td>
                        @if (is_null($u->offer_issue_date))
                        -
                        @elseif (is_null($u->joining_date))
                        <form action="{{url('employer/joining_date/'.$u->application_id)}}" method="post">
                            @csrf

                            <input type="date" name="datetime" id="">
                            <button type="submit" >Submit</button>
                        </form>
                        @else
                            {{$u->joining_date}}
                        @endif
                    </td>
                </tr>
            @endforeach
        @else
        No records found
        @endif



        </tbody>
    </table>
    <button id="deleteButton" class="btn btn-danger mt-4 " style="display: none;">Delete Selected</button>

    {{-- {{$user->links('guest.link')}} --}}
    <div id="resume-view"></div>




@else
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
            <td colspan="9" class="text-center"><strong>No records found</strong> </td>
        </tbody>
</table>
@endif
