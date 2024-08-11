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
                    <h1 class="animate" style="font-size:40px;">Internship Details</h1>
                    <br>
                    <p style="color:black;font-size:20px;">Thank you for your interest in our internship <br> opportunities. Below, you'll find brief details about <br> the internship positions available.</p>
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
                <img style="max-width:400px;height:400px;" src="{{asset('asset/index_page/assets/images/internship1.jpg')}}" alt="">
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
                        <h3 class="mb-3">{{$int->internship_title}}</h3>
                        <h6 class="mb-2">{{$int->company_name}}</h6>
                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$int->district}}</span>
                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$int->part_full_time}}</span>
                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>₹{{$int->stipend == 'others' ? $int->other_stipend : $int->stipend}}</span>
                    </div>
                </div>

                <div class="mb-5">
                    <div class="row">
                        <div class="col-md-12">
                        <h4 class="mb-3">Internship Description</h4>
                    <p class="text-break" style="color: rgb(36, 35, 35);">{{$int->description}}</p>
                        </div>
                   

                </div>
                   
                    <h4 class="mb-3 mt-3">Required Skills</h4>
                    <p style="color: rgb(36, 35, 35);">{{$int->required_skills == 'Others' ? $int->other_required_skills  : $int->required_skills}}</p>
                    <h4 class="mb-3 mt-3">Qualifications</h4>
                    <p style="color: rgb(36, 35, 35);">{{$int->degrees_preferred}}</p>

                    <div class="row">
                        <div class="col-md-12">
                    @if($int->responsibilities)
                        <h4 class="text-break mb-3 mt-3">Responsibilities</h4>
                    <p class="text-break" style="color: rgb(36, 35, 35);">{{$int->responsibilities}}</p>
                    @endif

                        </div>
                    </div>
                  
                    {{--<ul class="list-unstyled mt-3">
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                    </ul> --}}

                    {{-- <h4 class="mb-3 mt-3">Required Skills</h4>
                    <p style="color: rgb(36, 35, 35);">{{$int->required_skills}}</p> --}}
                    {{-- <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                    </ul> --}}
                    {{-- <h4 class="mb-3 mt-3">Contact Details</h4>
                    <p style="color: rgb(36, 35, 35);">Contact number: {{$int->contact_number}} <br>Contact email: {{$int->contact_email}}</p> --}}


                    <div class="col-12 mt-5">
                        @if (session('user_id'))
                            @if ($apply)
                                <li><div class="gradient-button"><a id="modal_trigger">Applied</a></div><li>
                            @else
                                <li><div class="gradient-button"><a id="modal_trigger"href="{{url('/candidate/internship_apply/'.$int->internship_id)}}">Apply Now</a></div></li>
                            @endif

                        @elseif (session('employer_id'))

                        @else
                            <li><div class="gradient-button"><a id="modal_trigger"href="{{url('login_error')}}">Apply Now</a></div></li>
                        @endif
                    </div>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Internship Summary</h4>
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{Carbon\Carbon::parse($int->created_at)->format('d-m-Y')}}</p>
                    @if($int->total_vacancies)
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Vacancies: {{$int->total_vacancies}} Positions</p>
                    @endif
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Internship Type: {{$int->internship_type}}</p>
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Internship Nature: {{$int->part_full_time}}</p>
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Stipend: ₹{{$int->stipend == 'others' ? $int->other_stipend : $int->stipend}}</p>
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Location: {{$int->state}}</p>
                    @if($int->accomodation)
                    <p style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Accomodation: {{$int->accomodation}}</p>
                    @endif
                    <p class="m-0" style="color: rgb(36, 35, 35);"><i class="fa fa-angle-right text-primary me-2"></i>Dead Line: {{Carbon\Carbon::parse($int->application_deadline)->format('d-m-Y')}}</p>
                </div>
                @if($int->company_info)
                <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Company Details</h4>
                    <p class="text-break m-0" style="color: rgb(36, 35, 35);">{{$int->company_info}}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<br>
<center><h3>Similar Internship Offers</h3></center><br><br>
{{-- {{count($int_post)}} --}}
<div class="row mx-3">
    <!-- Job Card 1 -->
    @foreach ($int_post as $int)
    <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
        <div class="card">
            {{-- <img  src="{{asset('company_logo/'.$logo)}}" style="width: 120px; height: 120px;"  class="card-logo style_card_logo" alt="Logo"> --}}
            <div class="card-body mt-5">
                <h5 class="card-text">{{$int->company_name}}</h5>
                <p class="card-title">Internship Role: {{$int->internship_title}}</p>
                <p class="card-title">Location: {{$int->state}}</p>
                <p class="card-title">Stipend: {{$int->stipend}}</p>
                <span class="badge rounded-pill bg-primary" style="font-size: 15px">{{$int->part_full_time}}</span>
                <br>
                <div>
                    @php
                    $encryptedId = encrypt($int->internship_id);
                    @endphp
                    <!-- <a href="#" class="btn btn-apply-now">Apply Now</a> -->
                  
                </div>
            </div>
            <center><a  style="margin-bottom:5px;" href="{{url('internship_detail/'.$encryptedId)}}" class="btn btn-view-more">View More</a></center>
        </div>
    </div>
    @endforeach
</div>



<style>


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
	background: linear-gradient(to left,#301934 35%, rgb(255, 192, 203));
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