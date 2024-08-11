@if ($intt->count() > 0)
@foreach ($intt as $i)
<div class="mb-4">
    <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
    <div class="card-body" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="row" style="padding: 15px;">
            <h5 class="card-title mb-0" style="color: #333; font-size: 1.5rem;">{{$i->company_name}}</h5>
            <div class="col-md-8">
           <div class="d-flex justify-content-between align-items-start">
                    <p class="card-text">
                          Role: {{$i->internship_title}}
                    </p>
                </div>
                <p class="card-text">
                    Location: {{$i->district}}, {{$i->state}}<br>

                    Sipend: ₹{{$i->stipend}}
                </p>
            </div>
            <div class="col-md-4">
                <div class="small-box text-md-right">
                    <a href="{{ url('internship_detail/'.$i->internship_id)}}" class="btn btn-primary">View more</a>
                    <br>
                    <small class="text-muted">@if(\Carbon\Carbon::parse($i->created_at)->isToday())
                        Today
                    @else
                        Posted {{ \Carbon\Carbon::parse($i->created_at)->diffForHumans() }}
                    @endif</small>
                </div>
            </div>
        </div>
    </div>
    <style>
        .card-body:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>

</div>
@endforeach

@else
<div class="card mb-4">
    <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-start">
                    <h5 class="card-title mb-0"></h5>
                </div>
                <p class="card-text">
                    No records found
                </p>
            </div>
            <div class="col-md-4">
                <div class="small-box text-md-right">

                </div>
            </div>
        </div>
    </div>
</div>
@endif

{{ $intt->links('guest.link')}}
<style>
    /* Media Query for Mobile */
    @media (max-width: 768px) {
        .card-body {
            padding: 10px;
            width: 250px; /* Adjust padding for smaller screens */
        }

        .col-md-8,
        .col-md-4 {
            width: 100%; /* Make columns full width on smaller screens */
            margin-bottom: 10px; /* Add some margin between columns */
        }
    }
</style>
