<div class="container mt-3">
<div class="row">
    @if (isset($app_job))
    @foreach ($app_job as $int)
    <div class="col-md-4 mt-3">
        <div class="card job-card">
            <div class="card-body">
                <div class="row">
                    <div>
                        <h5 class="card-title"><strong>{{$int->job_title}}</strong></h5>
                        <p class="card-text">{{$int->company_name}}</p>
                        <p class="card-text">Location: {{$int->city}}</p>
                        <p class="card-text">Skills: {{$int->required_skills}}</p>
                        <p class="card-text"><small class="text-muted">
                            @if(\Carbon\Carbon::parse($int->created_at)->isToday())
                            Today
                        @else
                            Posted {{ \Carbon\Carbon::parse($int->created_at)->diffForHumans() }}
                        @endif
                        </small></p>
                    </div>
                    <div>
                        @php
                        $encryptedId = encrypt($int->job_id);
                    @endphp
                        <a href="{{url('job_detail/'.$encryptedId)}}"><button class="btn btn-primary view-more-btn">View More</button></a>
                    </div>
                </div>


            </div>
        </div>
    </div>
<br>
    @endforeach
    {{-- <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-2">
            <button class="btn btn-primary view-more-btn">View More</button>
        </div>

    </div> --}}

    @if (count($app_job) == 0)
    <div class="col-md-4">
        <div class="card job-card">
            <div class="card-body">
                <div>
                    <h5 class="card-title"><strong>No results</strong></h5>
                </div>
                {{-- <a href="{{url('/employer/job_detail/'.$int->job_id)}}"><button class="btn btn-primary view-more-btn">View More</button></a> --}}
            </div>
        </div>
    </div>
@endif
    @else

    @endif


        <!-- Replace the content inside the card with your actual data -->
        @if (isset($app_int))
        @foreach ($app_int as $int)
        <div class="col-md-4 mt-3">
            <div class="card job-card">
                <div class="card-body">
                    <div>
                        <h5 class="card-title"><strong>{{$int->internship_title}}</strong></h5>
                        <p class="card-text">{{$int->company_name}}</p>
                        <p class="card-text">Location: {{$int->district}}</p>
                        <p class="card-text">Skills: {{$int->required_skills}}</p>
                        <p class="card-text"><small class="text-muted">
                            @if(\Carbon\Carbon::parse($int->created_at)->isToday())
                            Today
                        @else
                            Posted {{ \Carbon\Carbon::parse($int->created_at)->diffForHumans() }}
                        @endif
                        </small></p>
                    </div>
                    @php
                    $encryptedId = encrypt($int->internship_id);
                @endphp
                   <a href="{{url('/candidate/job_detail/'.$encryptedId)}}"><button class="btn btn-primary view-more-btn">View More</button></a>
                </div>
            </div>
        </div>

        @endforeach
        <div class="row justify-content-center">
            {{-- <div class="col-md-6 text-center mb-2">
                <button class="btn btn-primary view-more-btn">View More</button>
            </div> --}}

        </div>
            @if (count($app_int) == 0)
                <div class="col-md-4">
                    <div class="card job-card">
                        <div class="card-body">
                            <div>
                                <h5 class="card-title"><strong>No results</strong></h5>
                            </div>
                            {{-- <a href="{{url('/employer/job_detail/'.$int->job_id)}}"><button class="btn btn-primary view-more-btn">View More</button></a> --}}
                        </div>
                    </div>
                </div>
            @endif
        @else

        @endif




    </div>
</div>
