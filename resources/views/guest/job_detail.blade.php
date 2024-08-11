@include('layouts.index_page_header')
@include('layouts.alert')
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h1 class="animate" style="font-size:40px;">Diving Deeper</h1>
                    <br>
                    <h6 style="color:black; font-size:20px;">Get a closer look at what this position entails. <br> Uncover key details about responsibilities, <br> requirements, and benefits.</h6>
                  </div>
                  <div class="col-lg-12 mt-4">
                    <div class="white-button first-button scroll-to-section">
                        @if (session('user_id') || session('employer_id'))
                        @else
                            <a href="{{url('login_register')}}" class="neon-button">Enroll Now </a>
                        @endif
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="{{asset('asset/index_page/assets/images/jobs.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-5">
                    @if ($logo)
                    <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('company_logo/'.$logo)}}" alt="" style="width: 130px; height: 110px;">
                    @else

                    @endif

                    <div class="text-start ps-4">
                        <h3 class="mb-3">{{$jobs->job_title}}</h3>
                        <h4 class="mb-2">{{$jobs->company_name}}</h4>
                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$jobs->city}},{{$jobs->state}}</span>
                        {{-- <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span> --}}
                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$jobs->ptft}}</span>
                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>₹{{$jobs->salary_package == 'others' ? $jobs->other_salary : $jobs->salary_package}}</span>
                    </div>
                </div>

                <div class="mb-5">
                    <h4 class="mb-3">Job Description</h4>
                    <p style="color: rgb(36, 35, 35);">{{$jobs->job_description}}</p>
                    {{-- <h4 class="mb-3 mt-2">Responsibilities</h4>
                    <p style="color: rgb(36, 35, 35);">Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                    <ul class="list-unstyled mt-3">
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                    </ul> --}}
                    <h4 class="mb-3 mt-3">Qualifications</h4>
                    <p style="color: rgb(36, 35, 35);">{{$jobs->degrees_preferred == 'Others' ? $jobs->other_degree_preferred  : $jobs->degrees_preferred }}</p>
                    <h4 class="mb-3 mt-3">Required Skills</h4>
                    <p style="color: rgb(36, 35, 35);">{{$jobs->required_skills == 'Others' ? $jobs->other_required_skills  : $jobs->required_skills}}</p>

                    @if($jobs->responsibilities)
                    <h4 class="mb-3 mt-3">Responsibilities</h4>
                    
                    <p style="color: rgb(36, 35, 35);">{{$jobs->responsibilities}}</p>
                    @endif

                    {{-- <h4 class="mb-3 mt-3">Company Information</h4>
                    <p style="color: rgb(36, 35, 35);">{{$jobs->company_info}}</p> --}}
                    {{-- <h4 class="mb-3 mt-3">Qualifications</h4>
                    <p style="color: rgb(36, 35, 35);">{{$jobs->degrees_preferred}}</p> --}}
                    {{-- <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                    </ul> --}}
                    <div class="col-12 mt-5">
                    @if (session('user_id'))
                        @if ($apply)
                        <li><div class="gradient-button"><a id="modal_trigger">Applied</a></div></li>
                        @else
                            <li><div class="gradient-button"><a id="modal_trigger" href="{{url('/candidate/job_application_form/'.$jobs->job_id)}}">Apply Now</a></div></li>
                        @endif

                    @elseif (session('employer_id'))

                    @else
                        <li><div class="gradient-button"><a id="modal_trigger" href="{{ url('/login_error')}}">Apply Now</a></div></li>
                    @endif

                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Job Summary</h4>
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{Carbon\Carbon::parse($jobs->created_at)->format('d-m-Y')}}</p>
                    @if($jobs->total_vacancies)
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Vacancies: {{$jobs->total_vacancies}} Positions</p>
                    @endif
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: {{$jobs->ptft}}</p>
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Salary: ₹{{$jobs->salary_package == 'others' ? $jobs->other_salary : $jobs->salary_package}}</p>
                    <!-- <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Location: {{$jobs->state .", ". $jobs->country}}</p> -->
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Work Location: {{$jobs->city}}</p>
                    <p class="m-0" style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Deadline: {{Carbon\Carbon::parse($jobs->application_deadline)->format('d-m-Y')}}</p>
                    @if($jobs->experience_required)
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Experience: {{$jobs->experience_required}}</p>
                    @endif
                    @if($jobs->accomodation)
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Accomodation: {{$jobs->accomodation}}</p>
                    @endif
                </div>
                @if($jobs->company_info)
                <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Company Details</h4>
                    <p class="m-0" style="color: rgb(36, 35, 35);">{{$jobs->company_info}}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>



<br>

<center><h3>Similar Job Offers</h3></center><br><br>
<div class="row mx-3">
    @foreach ($job_post as $int)
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card style_card">
            {{-- <img  src="{{asset('company_logo/'.$logo)}}" style="width: 130px; height: 110px;"  class="card-logo style_card_logo" alt="Logo"> --}}
            <div class="card-body mt-5">

                <h5 class="card-text">{{$int->company_name}}</h5>
                <h6 class="card-title">Job Role:{{$int->job_title}}</h6>
                <p class="card-title">Experience:{{$int->experience_required}}</p>
                <p class="card-title">Salary Package:{{$int->salary_package}}</p>
                <span class="badge rounded-pill bg-primary" style="font-size: 15px">{{$int->ptft}}</span>
                
                
                <div>
                  <br>
                  @php
                  $encryptedId = encrypt($int->job_id);
              @endphp

                    <!-- <a href="#" class="btn btn-apply-now">Apply Now</a> -->
                   
                </div>
  
            </div>
            <center>

<a style="margin-bottom:5px;" href="{{url('job_detail/'.$encryptedId)}}" class="btn btn-view-more">View More</a>

</center>
        </div>
    </div>
    @endforeach
</div>

<style>
    /* Your existing styles */
 .row.job1 {
     margin-left: 200px;
 }

 /* Media query for smaller screens */
 @media (max-width: 768px) {
     .row.job1 {
         margin-left: 40px;
     }
     .card{
      /* width:270px; */
     }
 }
 .animate{
	/* color: #2e78fd;  */
	font-size: 45px;
  background: linear-gradient(to left,#8b0000 50%, rgb(0, 0, 0));
	background-size: 200% auto;
	-webkit-background-clip: text;
	color: transparent;
	animation: gradient 3s linear infinite;
}

@keyframes gradient{
	0%{
		background-position: 0% 75%;
	}
	50%{
		background-position: 100% 30%;
	}
	100%{
		background-position: 0% 70%;
	}
}
 </style>
  <!-- footer -->


@include('layouts.index_page_footer')
