@if ($int->count() > 0)
@foreach ($int as $i)
<div class="container mb-4">
    <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
    <div class="card-body" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="row" style="padding: 15px;">
            <h4 class="card-title mb-0 text-break" style="color: #333; font-size: 1.5rem;">{{$i->company_name}}</h4>
            <br>
            <br>
            <div class="col-md-8">
           <div class="d-flex justify-content-between align-items-start">
                    <h6 class="card-text">
                         Internship Role: {{$i->internship_title}}
</h6>
                </div>
                <p class="card-text">
                    Location: {{$i->district}}, {{$i->state}}<br>

                    Stipend: ₹{{$i->stipend}}
                    <br>
                    <span class="badge rounded-pill bg-primary" style="font-size: 15px">{{$i->part_full_time}}</span>
                </p>

            </div>
            <div class="col-md-4">
                <div class="small-box text-md-right">
                    @php
                        $encryptedId = encrypt($i->internship_id);
                    @endphp
                    <a href="{{ url('internship_detail/'.$encryptedId)}}" class="btn btn-primary">View more</a>
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
{{--@if (!session('user_id') || !session('employer_id'))
@if ($int->currentPage() == 2)
<div class="container mb-4">
    <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
    <div class="col-md-12 card-body" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class=" text-center">
          
            <div>
                <p>Oops! To access the countless internships available on our platform, you'll need to sign up. Don't miss out – sign up now!</p>

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
@endif
@endif--}}
@else
<div class="card mb-4">
    <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-start">
                    <h5 class="card-title mb-0"></h5>
                </div>
                <h4 class="card-text">
                    @if (isset($NR))
                        @if ($NR == 1)
                            "No records found"
                        @else
                        "Adjust your Skills to achieve your desired outcome! Wishing you the very best as you tailor your abilities towards success!"
                        @endif
                    @else
                    "Adjust your Skills to achieve your desired outcome! Wishing you the very best as you tailor your abilities towards success!"
                    @endif
                </h4>
            </div>
            <div class="col-md-4">
                <div class="small-box text-md-right">

                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div id="pagelink">

@if(request()->has('full_time'))
        {{ $int->appends(['full_time' => ''])->links('guest.link') }}
    @elseif(request()->has('part_time'))
        {{ $int->appends(['part_time' => ''])->links('guest.link') }}
    @else
        {{$int->appends(request()->input())->links('guest.link')}}
@endif

</div>
<style>

/* Media Query for screens up to 360px */
@media (max-width: 380px) {
    .card-body {
   margin-left:-60;
        padding: 10px;
        width: 280px;
    }

    .col-md-8,
    .col-md-4 {
        width: 100%;
        margin-bottom: 10px;
    }
}

/* Media Query for screens between 361px and 768px */
@media (min-width: 380px) and (max-width: 768px) {
    .card-body {
        margin-left: 52px;
        padding: 10px;
        width: 250px;
    }

    .col-md-8,
    .col-md-4 {
        width: 100%;
        margin-bottom: 10px;
    }
}







</style>
