@php
    $r=1;
@endphp

@if (count($jobs) > 0)

@foreach ($jobs as $int)
    <tr>
        <td>
            <input type="checkbox" name="checkbox[]" value="{{$int->job_id}}" class="rowCheckbox">
            </td>
        <td>{{$r++}}</td>
        <td class="sort" data-column="company_name">{{$int->company_name}}</td>
        <td>{{$int->job_type}}</td>
        <td>{{$int->job_title}}</td>
        <td>{{$int->start_date}}</td>
        <td>{{$int->application_deadline}}</td>
        <td>
            @if (\Carbon\Carbon::parse($int->application_deadline)->isFuture())

            <button type="button" class="btn btn-primary btn-sm mr-2">
                Active
            </button>





            @else
            <button  class="btn btn-danger btn-sm">
                Inactive
            </button>

            @endif
        </td>
        <td class="text-right">
            <div class="dropdown dropdown-action">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-ellipsis-v ellipse_color"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{ url('/admin2/edit_job/'.$int->job_id) }}">
                        <i class="fas fa-pencil-alt m-r-5"></i> Edit
                    </a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset_{{ $int->job_id }}">
                        <i class="fas fa-trash-alt m-r-5"></i> Delete
                    </a>
                </div>
            </div>
        </td>
    </tr>
    <div id="delete_asset_{{ $int->job_id }}" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="assets/img/sent.png" alt="" width="50" height="46">
                    <h3 class="delete_class">Are you sure you want to delete this Asset?</h3>
                    <div class="m-t-20">
                        <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <a href="{{ url('/admin2/delete_job/'.$int->job_id) }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach



@else
<tr>
    <td></td>
    <td colspan="9" class="text-center"><strong>No records found</strong></td>
</tr>
@endif
