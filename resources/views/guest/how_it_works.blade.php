@include('layouts.index_page_header')
@include('layouts.alert')
<style>
    @media (max-width: 768px){
       .rows {
                margin-left: 15px; 
            }
            .card {
                margin: 15px 0px; 
              
            }
          }
       .iframe_image{
            width: 20rem;
            height: 12rem;
            margin-left: 22px;
        }
        @media (max-width: 768px) {
            .main-banner .row {
                margin-right: -15px; 
                margin-left: -15px;
            }

            .main-banner .col-lg-12 {
                padding-right: 15px; /* Adjust the padding as needed */
                padding-left: 15px;
            }

            .main-banner .col-lg-6 {
                padding-right: 15px; /* Adjust the padding as needed */
                padding-left: 15px;
            }
        }

    @media screen and (max-width: 768px) {
  .dropdown {
    position: static; /* Change dropdown position to static */
  }

  .dropdown-content {
    display: none; /* Hide dropdown content by default */
    position: relative; /* Set position to relative */
    width: 100%; /* Set width to 100% */
    margin-top: 10px; /* Adjust margin as needed */
  }

  .dropdown:hover .dropdown-content {
    display: block; /* Show dropdown content on hover */
  }
}

    .card-img-top{

      width:200px;
      height:200px;
    }

.card-text{
  font-family:
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

.card{
  width: 18rem;
  margin: 20px;
  height: 95%;
}



</style>
<div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2 class="animate">How it works?</h2>
                    <h6 style="font-size: 25px; color: black">"Find the perfect job or internship easily. <br>Apply and track your progress effortlessly."</h6>
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                        <br><br>
                        @if (session('user_id') || session('employer_id'))

                        @else
                            <a href="{{url('login_register')}}">Enroll Now </a>
                        @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img style="max-width: 400px;" src="{{asset('asset/index_page/assets/images/howit.jpeg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="services" class="services section">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading  wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4>Discover Your Career Journey in <em> Eight Simple Steps</em></h4>
            <img src="{{ asset('asset/index_page/assets/images/heading-line-dec.png')}}" alt="">
            <p style="font-size: 20px;">Gain invaluable global work experience, setting you apart in your career journey like never before.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
		<div class="row rows">
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<img src="{{ asset('asset/index_page/assets/images/mobile.svg')}}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Step 1: Sign Up
</h5>
						<p class="card-text">Begin your journey by registering on our platform. This involves providing basic information such as your name, email, and creating a password</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="card">
					<img src="{{ asset('asset/index_page/assets/images/lap.svg')}}" class="card-img-top" alt="..." >
					<div class="card-body">
						<h5 class="card-title">Step 2: Email Verification
</h5>
						<p class="card-text">Once registered, you'll receive an email verification request. Click on the verification link in your email to confirm your registration and activate your account.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="card">
					<img src="{{ asset('asset/index_page/assets/images/step3.jpg')}}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Step 3: Payment and Access
</h5>
						<p class="card-text">To access the full range of features and opportunities, proceed to the payment page. Complete the payment process, unlocking exclusive access to the main registration page</p>
					</div>
				</div>
			</div>
            <div class="col-lg-3 col-md-6">
				<div class="card" >
					<img src="{{ asset('asset/index_page/assets/images/step4.jpg')}}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Step 4: Profile Setup
</h5>
						<p class="card-text">On the main registration page, fill out a detailed profile. This includes personal and professional details, helping you stand out to potential employers. Your profile can be easily updated and modified in the user dashboard for ongoing optimization.</p>
					</div>
				</div>
			</div>
		</div>
        <br>
        <br>
        <div class="row rows">
			<div class="col-lg-3 col-md-6">
				<div class="card">
					<img src="{{ asset('asset/index_page/assets/images/step5.jpg')}}" class="card-img-top " alt="...">
					<div class="card-body">
						<h5 class="card-title">Step 5: Customize Interests and Skills
</h5>
						<p class="card-text">To personalize your profile, navigate to your dashboard and select "Profile." Next, click on "Manage Your Account" followed by the "Edit" option. From there, you can modify your areas of interest and talents to ensure accurate matching with job and internship opportunities, increasing the likelihood of finding the ideal fit.</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="card" >
					<img src="{{ asset('asset/index_page/assets/images/step6.jpg')}}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Step 6: Apply for Jobs/Internships</h5>
						<p class="card-text">Explore the diverse range of positions available and apply for those that align with your career goals and internship aspirations. With just a single click, you can initiate the application process, and your details will be sent directly to the respective employers for consideration. Simplify your application process today!</p>
					</div>
				</div>
			</div>

			<div class="col-lg-3 col-md-6">
				<div class="card" >
					<img src="{{ asset('asset/index_page/assets/images/step7.png')}}" class="card-img-top" alt="...">
					<div class="card-body">
						<h5 class="card-title">Step 7: Interview Process

</h5>
						<p class="card-text">Receive notifications when your applications are approved, signaling the next step in your journey. Prepare for either the MCQ (Multiple Choice Questions) test, a comprehensive assessment of your skills and qualifications, or a direct face-to-face interview, depending on the specific requirements of the position and the company's selection process.</p>
					</div>
				</div>
			</div>
            <div class="col-lg-3 col-md-6">
				<div class="card" >
					<img src="{{ asset('asset/index_page/assets/images/step8.jpg')}}" class="card-img-top" alt="..." style="width:280px;">
					<div class="card-body">
						<h5 class="card-title">Step 8: Results
</h5>
						<p class="card-text">Access your test results through notifications, which will be available both in your dashboard and sent to your email. Congratulations on your successful completion! Following the notifications, we will keep you informed about the issuance of an offer letter, along with details about your joining date. We look forward to welcoming you to the team.</p>
					</div>
				</div>
			</div>
		</div>
	</div>

    @if (session('user_id') || session('employer_id'))

    @else
    <li><div class="gradient-button text-center mt-5" ><a id="modal_trigger" href="{{url('login_register')}}">Enroll Now</a></div></li>
    @endif
  </div>


   <!-- cta -->
     <section class="cta">
        <h1>"Begin Your Career Adventure - Exciting Internships & Jobs Await at Thozhil."</h1>
       
        @if (session('user_id') || session('employer_id'))
        @else
        <a href="{{url('login_register')}}" class="hero-btn mt-3">Enroll Now</a>
        @endif

    </section>





<script>
  $(document).ready(function(){
    $(".owl-carousel").owlCarousel({
      loop: true, // Enable loop
      margin: 10, // Set margin between items
      responsive: {
        0: {
          items: 1 // Number of items to show on small screens
        },
        600: {
          items: 3 // Number of items to show on medium screens
        },
        1000: {
          items: 3 // Number of items to show on large screens
        }
      }
    });
  });
</script>


@include('layouts.index_page_footer')