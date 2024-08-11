@include('layouts.index_page_header')
@include('layouts.alert')
<style>
    .service-item {
      height: 360px; /* Set a fixed height for all card items */
      width: 100%; /* Set a fixed width for all card items */
      border: 1px solid #ddd;
      margin-bottom: 20px; /* Optional: Add margin for better spacing between cards */
    }

    .service-item h4,
    .service-item p {
      padding: 15px;
    }
    .para{
        margin-top: -20px;
    }

      .box-item {
    /* Add your custom styles here */
    height: 400px; /* Set your desired height */
    width: 100%; /* Set your desired width, it's 100% to fill the container */
    border: 1px solid #ddd; /* Add borders or any other styles as needed */
    padding: 15px; /* Adjust padding as needed */
    margin-bottom: 20px; /* Add margin to separate the cards */
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
  }

    @media (max-width: 768px) {
      .service-item {
        height: auto; /* Allow cards to have dynamic height on smaller screens */
      }
    }

    
    .owl-carousel.design {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Adjust the shadow as needed */
        border-radius: 10px; /* Adjust the border-radius as needed */
        background: #D3D3D3;
    }

    .owl-carousel.design img {
        width: 200px; /* Make all images fill the container width */
        height: 200px; /* Maintain aspect ratio */
        border-radius: 10px; /* Adjust the border-radius for images as needed */
        margin-top:45px
    }

    @media only screen and (max-width: 767px) {
    .owl-carousel.design img {
        width: 100%; /* Make images fill the container width */
        height: auto; /* Allow height to adjust based on the width */
        margin-top: 20px; /* Remove top margin for smaller screens */
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

/* section{
	margin: 0;
	padding: 0;
} */

.container-new {
	display: flex;
	justify-content: center;
	align-items: center;
	flex-wrap: wrap;
	background: #fff;
	min-height: 10vh;
}

/*section::before {*/
/*	content: '';*/
/*	position: absolute;*/
/*	top: 0;*/
/*	left: 0;*/
/*	width: 100%;*/
/*	height: 100%;*/
	/* background: linear-gradient(#DA22FF, #9733EE); */
	/* clip-path: circle(30% at right 70%); */
/*}*/

/*section::after {*/
/*	content: '';*/
/*	position: absolute;*/
/*	top: 0;*/
/*	left: 0;*/
/*	width: 100%;*/
/*	height: 100%;*/
	/* background: linear-gradient(#E55D87, #5FC3E4); */
	/* clip-path: circle(20% at 10% 10%); */
/*}*/

.container-new {
	position: relative;
	z-index: 1;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-wrap: wrap;
	margin: 40px 0;
}

.container-new .card {
	position: relative;
	width: 300px;
	height: 400px;
	background-color: #fff;
	margin: 20px;
	box-shadow: 0 15px 35px rgba(0, 0, 0, 0.5);
	border-radius: 15px;
	display: flex;
	justify-content: center;
	align-items: center;
	backdrop-filter: blur(10px);
}

.container-new .card .content {
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	transition: 0.5s;
}

.container-new .card:hover .content {
	transform: translateY(-40px);
}

.container-new .card .content .imgBx {
	position: relative;
	width: 200px;
	height: 200px;
	overflow: hidden;
}

.container-new .card .content .imgBx img {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.container-new .card .content .contentBx h3 {
	color: #4b8ef1;
	text-transform: uppercase;
	letter-spacing: 2px;
	font-weight: 500;
	font-size: 18px;
	text-align: center;
	margin: 20px 0 10px;
	line-height: 1.1em;
}

.container-new .card .content .contentBx h3 span {
	font-size: 12px;
	font-weight: 300;
	text-transform: initial;
}

.container-new .card .sci {
	position: absolute;
	bottom: 10px;
	display: flex;
}

.container-new .card .sci p {
	list-style: none;
	margin: 0 10px;
	transform: translateY(40px);
	transition: 0.5s;
	opacity: 0;
}

.container-new .card:hover .sci p {
	transform: translateY(0px);
	opacity: 1;
}

.container-new .card .sci p a {
	color: #fff;
	font-size: 15px;
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

                  <h2 class="animate" style="font-size: 37px;">"Fueling Your Journey: <br>Internships Ignite, Jobs <br>Propel-Your Trailblazing <br> Odyssey Begins Here!"</h2>
                    <!-- <h2 style="margin-left:-30px;">Welcome To Thozhil</h2>

                    <p style="margin-left:-30px;" >Your job and internship success are our priority. <br> With a guarantee, trust Thozhil to pave the way for your career. <br> Say goodbye to worries, and let's embark on your journey to <br> success together!"</p> -->
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
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
                <img style="width: 320px;" src="{{asset('asset/index_page/assets/images/main.jpg')}}" alt="">
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
            <h4>The Reality Of <em>Starting Your Career</em> </h4>
            <img src="asset/index_page/assets/images/heading-line-dec.png" alt="">
            <p>"Embarking on your career journey? Thozhil unveils the realities with you. Trust our commitment for a seamless start, turning your career dreams into a tangible reality. With Thozhil, step into a future filled with purpose and confidence!"</p>
          </div>
        </div>
      </div>
    </div>

    <div  class="container mt-4">
    <div class="new-cards">
	<div class="row">

	  <!-- Card 1 -->
    
	  <div data-aos="fade-right" class="col-lg-4 mb-4">
		<div class="card">
      <!-- <div class="card-img"></div> -->
		  <img src="{{asset('asset/index_page/assets/images/savetime.jpeg')}}" class="card-img mx-auto" alt="">
		  <div class="card-body">
		  <h3 class="card-title">Efficiency Enhancing</h3>
		  <p class="card-text">Save Time with Thozhil! Streamline your journey to success. Let Thozhil handle the details, so you can focus on what truly matters – building your future!</p>
		  </div>
		</div>
		</div>
	  
		<!-- Card 2 -->
		<div data-aos="fade-up" class="col-lg-4 mb-4">
		<div class="card">
    <img src="{{asset('asset/index_page/assets/images/card2.jpeg')}}" class="card-img mx-auto" alt="">
		  <div class="card-body">
		  <h3 class="card-title">Complete Flexibility</h3>
		  <p class="card-text">Tailor your career path on your terms. Empower yourself with choices, ensuring your journey to success is uniquely yours.</p>
		  </div>
		</div>
		</div>
	  
		<!-- Card 3 -->
		<div data-aos="fade-left" class="col-lg-4 mb-4">
		<div class="card">
    <img src="{{asset('asset/index_page/assets/images/card3.jpeg')}}" class="card-img mx-auto" alt="">
		  <div class="card-body">
		  <h3 class="card-title">Guaranteed placement</h3>
		  <p class="card-text">Guaranteed Placement Excellence! Secure your future with Thozhil. Our commitment ensures your success – a promise fulfilled in every career step.</p>
		  </div>
		</div>
		</div>
	</div>
  </div>
</div>


<div id="about" class="about-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h4>About <em>What We Do</em> &amp; Who We Are?</h4>
            <img src="{{asset('asset/index_page/assets/images/i2.svg')}}" alt="">
            <!-- <p>Thozhil is all about shaping careers and linking talents with opportunities. We connect job seekers with the right roles and offer employers easy access to top-notch talent. Thozhil is your go-to platform for a straight-forward, effective approach to advancing your career or finding the perfect candidate.</p> -->
          </div>
          <div class="row">
            <div  class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="box-item">
                <br>
                <h4>Define Your Goals</h4>
                <br>
                <p>Thozhil offers opportunities for job seekers and employers to achieve career goals through placements and internships. Our platform makes it easy to define and pursue objectives. With Thozhil, explore, connect, and succeed.</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="box-item">
                <br>
                <h4>24/7 Support and Assistance</h4>
                <br>
                <p>Thozhil ensures you have assistance whenever needed, whether navigating the platform, with questions, or needing immediate help. Your success is our priority, and we're here 24/7 to support you.</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="box-item">
                <br>
                <h4>Fixing Issues</h4>
                <br>
                <p>Encountered a problem? We've got you covered. Our dedicated support team is committed to swiftly resolving issues and ensuring your experience is seamless. Trust us to fix any concerns, so you can focus on what matters most – your success.</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="box-item">
                <br>
                <h4>Co-Development</h4>
                <br>
                <p>
                  Embark on a journey of collaborative innovation with Thozhil's Co-Development services. Here, we merge your unique ideas with our expertise to create impactful solutions, ensuring shared success. Join us in shaping a future where innovation knows no bounds.
              </p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="{{asset('asset/index_page/assets/images/i2.svg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div id="clients" class="the-clients">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
            <div class="section-heading">
                <h4> Our<em> Clients</em> </h4>
                <img src="{{ asset('asset/index_page/assets/images/heading-line-dec.png')}}" alt="">
                <p> Our clients aren't just clients; they are valued partners in progress. We take pride in understanding their unique needs, tailoring solutions, and fostering long-term relationships. </p>
            </div>
            </div>

            <div class="owl-carousel design">
               
                <div> <img src="{{asset('asset/index_page/assets/images/3.jpg')}}" alt=""> </div>
                <div> <img src="{{asset('asset/index_page/assets/images/6.jpg')}}" alt=""> </div>
                <div> <img src="{{asset('asset/index_page/assets/images/22.jpg')}}" alt=""> </div>
                <div> <img src="{{asset('asset/index_page/assets/images/14.jpg')}}" alt=""> </div>
                <div> <img src="{{asset('asset/index_page/assets/images/15.png')}}" alt=""> </div>
                <div> <img src="{{asset('asset/index_page/assets/images/17.jpg')}}" alt=""> </div>
                <div> <img src="{{asset('asset/index_page/assets/images/20.jpg')}}" alt=""> </div>
                <div> <img src="{{asset('asset/index_page/assets/images/21.jpg')}}" alt=""> </div>
                <div> <img src="{{asset('asset/index_page/assets/images/bltzwork.jpeg')}}" alt=""> </div>
               




               
                
            </div>
            

        </div>
    </div>
</div>

<br>
<br>
<br>



  <!-- OL Cards -->
  <div class="section-heading">
  <h1 class="text-center" style="font-weight: bolder;">Use <span class="animate">Thozhil's</span> Steps For Professional Success!!</h1>
  <div class="text-center">
  <img src="{{ asset('asset/index_page/assets/images/heading-line-dec.png')}}" alt="">
</div>
</div>
<section>
		<div class="container-new">
			<div class="card">
				<div class="content">
					<div class="imgBx">
          <img src="{{asset('asset/index_page/assets/images/account.jpeg')}}" alt="">
					</div>
					<div class="contentBx">
						<h3>Step 1</h3>
						<span>Account Creation</span>
					</div>
				</div>
				<div class="sci">
					<p>Start your journey now by signing up, unlocking personalized opportunities and resources just for you.</p>
				</div>
			</div>
			<div class="card">
				<div class="content">
					<div class="imgBx">
					<img src="{{asset('asset/index_page/assets/images/opportunity.jpeg')}}" alt="">	
					</div>
					<div class="contentBx">
						<h3>Step 2</h3>
						<span>Customize Your Profile</span>
					</div>
				</div>
				<div class="sci">
				<p>Easily tailor your profile by editing skills and area of interest to match desired opportunities on this platform.</p>
				</div>
			</div>
			<div class="card">
				<div class="content">
					<div class="imgBx">
					<img src="{{asset('asset/index_page/assets/images/dashboard.jpeg')}}" alt="">
					</div>
					<div class="contentBx">
						<h3>Step 3</h3>
						<span>Easy Application Process</span>
					</div>
				</div>
				<div class="sci">
				<p>Apply to job and internship opportunities effortlessly with just a click on the "Apply Now" button.</p>
				</div>
			</div>
      <div class="card">
				<div class="content">
					<div class="imgBx">
					<img src="{{asset('asset/index_page/assets/images/notification.jpeg')}}" alt="">
					</div>
					<div class="contentBx">
						<h3>Step 4</h3>
						<span>Timely Notifications</span>
					</div>
				</div>
				<div class="sci">
				<p>Receive timely email notifications, ensuring you're always informed and up-to-date with the latest developments.</p>
				</div>
			</div>
		</div>
	</section>

  <section>
		<div class="container-new">
			<div class="card">
				<div class="content">
					<div class="imgBx">
          <img src="{{asset('asset/index_page/assets/images/accessdb.jpeg')}}" alt="">
					</div>
					<div class="contentBx">
						<h3>Step 5</h3>
						<span>Easy Dashboard Access</span>
					</div>
				</div>
				<div class="sci">
					<p>Quickly access everything conveniently and efficiently from your personalized dashboard interface.</p>
				</div>
			</div>
			<div class="card">
				<div class="content">
					<div class="imgBx">
					<img src="{{asset('asset/index_page/assets/images/assesment.jpeg')}}" alt="">
					</div>
					<div class="contentBx">
						<h3>Step 6</h3>
            <span>Assessment Process</span>
					</div>
				</div>
				<div class="sci">
				<p>Please ensure you are adequately prepared for the upcoming MCQ test.</p>		
				</div>
			</div>
			<div class="card">
				<div class="content">
					<div class="imgBx">
					<img src="{{asset('asset/index_page/assets/images/stepss.jpeg')}}" alt="">
					</div>
					<div class="contentBx">
						<h3>step 7</h3>
						<span>F2F Process</span>
					</div>
				</div>
				<div class="sci">
				<p>Approach direct interview through our portal with assurance and self-assurance.</p>
				</div>
			</div>
      <div class="card">
				<div class="content">
					<div class="imgBx">
					<img src="{{asset('asset/index_page/assets/images/stepsss.jpeg')}}" alt="">
					</div>
					<div class="contentBx">
						<h3>Step 8</h3>
						<span>Offer Releases</span>
					</div>
				</div>
				<div class="sci">
				<p>Receive official offer letters and joining dates seamlessly via email and dashboard notifications.</p>
				</div>
			</div>
		</div>
	</section>
<!-- </div> -->


   <!-- cta -->
     <section class="cta">
        <h1>Start your Carrer Journey With Our Thozhil Internships & Jobs</h1>
        <!-- <h5 class="text-white">An Internship Is A Stepping Stone To Successfull Carrer</h5> -->
        @if (session('user_id') || session('employer_id'))

        @else
        <a href="{{url('login_register')}}" class="hero-btn mt-3">Enroll Now</a>
        @endif
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                autoplay: true, // Enable autoplay
                autoplayTimeout: 1000, // Set the autoplay timeout in milliseconds (adjust as needed)
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                        
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 6,
                        nav: false,
                        loop: true
                    }
                }
            });
        });
    </script>


{{-- end body content --}}

@include('layouts.index_page_footer')
