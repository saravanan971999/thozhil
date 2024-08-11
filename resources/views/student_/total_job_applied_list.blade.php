<div class="container mt-3">
    <div class="row align-items-center">
        <div class="col-md-4">
            <h5>Applied Job Applications:
                @if ($total_job != 0)
                {{$total_job}}
                @else
                No records
                @endif
                </h5>
        </div>
        {{-- <div class="col-md-4 text-center mb-2" id="viewBTTN">
            <button class="btn btn-primary view-more-btn" onclick="viewInt()" >View Internship</button>
            <button class="btn btn-primary view-more-btn" onclick="viewJob()" >View Job</button>
        </div> --}}

        <div class="col-md-4 d-flex justify-content-end align-items-center">

            <div class="ms-3">
                {{-- <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort By
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="sortDropdown">
                        <li><a class="dropdown-item" href="#">Latest</a></li>
                        <li><a class="dropdown-item" href="#">Oldest</a></li>
                        <!-- Add more sorting options as needed -->
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</div>

<div class="container mt-5" id="jobsContainer">
    <div class="row">
        @if ($app_job)
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

        @else
            <div class="col-md-4">
                <div class="card job-card">
                    <div class="card-body">
                        <div>
                            <h5 class="card-title"><strong>No applications yet</strong></h5>

                        </div>
                    {{-- <a href="{{url('/employer/job_detail/'.$int->job_id)}}"><button class="btn btn-primary view-more-btn">View More</button></a> --}}
                    </div>
                </div>
            </div>
        @endif


            <!-- Replace the content inside the card with your actual data -->
        {{$app_job->links('guest.link')}}
    </div>
</div>
