<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Other meta tags, CSS links, etc. -->
</head>




@if ($jobs->count() > 0)

@foreach ($jobs as $j)
<div class="container">
<div class="mb-4">
    <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
    <div class="card-body" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="row" style="padding: 15px;">
            <h4 class="card-title mb-0" style="color: #333;">{{$j->company_name}}</h4>

            <br>
            <br>


            <div class="col-md-8">
                <div class="d-flex justify-content-between align-items-start">
                    <h6 class="card-text">
                        Job Role: {{$j->job_title}}
</h6>
                </div>
                <p class="card-text">
                    Location: {{$j->city}}, {{$j->state}}<br>
                    Salary: ₹
                    @if ($j->salary_package == "others")
                        {{$j->other_salary}}
                    @else
                        {{$j->salary_package}}
                    @endif
                    <br>
                    <span class="badge rounded-pill bg-primary" style="font-size: 15px">{{$j->ptft}}</span>
                </p>
            </div>
            <div class="col-md-4">
                <div class="small-box text-md-right">
                    @php
                        $encryptedId = encrypt($j->job_id);
                    @endphp
                    <a href="{{ url('job_detail/'.$encryptedId)}}" class="btn btn-primary" style="background-color: #007bff; border: none;">View more</a>
                    <br>
                    <small class="text-muted">
                        @if(\Carbon\Carbon::parse($j->created_at)->isToday())
                            Today
                        @else
                            Posted {{ \Carbon\Carbon::parse($j->created_at)->diffForHumans() }}
                        @endif
                    </small>
                </div>
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
@if ($jobs->currentPage() == 2)
<div class="mb-4">
    <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
    <div class="card-body" style="border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div class="row" style="padding: 15px;">
          
            <div>
                <p>Oops! To access the countless jobs available on our platform, you'll need to sign up. Don't miss out – sign up now!</p>

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
<div class=" mb-4">
    <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-start">
                    <h5 class="card-title mb-0"></h5>
                </div>
                <br>
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
        {{ $jobs->appends(['full_time' => ''])->links('guest.link') }}
    @elseif(request()->has('part_time'))
        {{ $jobs->appends(['part_time' => ''])->links('guest.link') }}
    @else
        {{$jobs->appends(request()->input())->links('guest.link')}}
@endif

</div>

<style>
   /* @media (max-width: 380px) {
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
} */

/* Media Query for screens between 361px and 768px */
/* @media (min-width: 380px) and (max-width: 768px) {
    .card-body {
        /* margin-left: 52px; 
        padding: 10px;
        width: 250px;
    }

    .col-md-8,
    .col-md-4 {
        width: 100%;
        margin-bottom: 10px;
    }
} */

</style>
