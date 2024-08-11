@include('layouts.index_page_header')
@include('layouts.alert')
<style>
    .service-item {
      height: 450px; /* Set a fixed height for all card items */
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
    height: 350px; /* Set your desired height */
    width: 100%; /* Set your desired width, it's 100% to fill the container */
    border: 1px solid #ddd; /* Add borders or any other styles as needed */
    padding: 15px; /* Adjust padding as needed */
    margin-bottom: 20px; /* Add margin to separate the cards */
    box-sizing: border-box; /* Include padding and border in the element's total width and height */
  }
  .animate{
	/* color: #2e78fd;  */
	font-size: 45px;
	background: linear-gradient(to left,#322d31 35%, rgb(255, 3, 3));
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
.image1{
    width: 430px;
}
    @media (max-width: 768px) {
      .service-item {
        height: auto; /* Allow cards to have dynamic height on smaller screens */
      }
      .image1{
        width: 300px;
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
                    <h2 class="animate">"Fostering Success, Guiding Tomorrow's Leaders."</h2>
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                        @if (session('user_id') || session('employer_id'))
                        @else
                        <a href="{{url('login_register')}}" class="neon-button">Enroll Now</i></a>
                        @endif

                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img class="image1" src="{{asset('asset/index_page/assets/images/vision.jpg')}}" alt="">
              </div>
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
            <h4>Our <em>Vision </em>On Job search</h4>
            <img src="{{asset('asset/index_page/assets/images/i2.svg')}}" alt="">
            <p>Revolutionizing the job search experience by connecting individuals with their dream careers through a user-centric and innovative online platform</p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Seamless Connection, Lasting Impact</a></h4>
                <p>Seamlessly connect with companies that share your vision and values, creating meaningful professional relationships that go beyond the internship period, leaving a lasting impact on your career trajectory. </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Your Journey, Your Way</a></h4>
                <p>Tailor your internship experience to match your unique aspirations. Our platform is designed to empower you to curate a personalized path that aligns with your career goals and ambitions. </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Innovation Meets Experience</a></h4>
                <p>Experience a revolutionary approach to internships, where cutting-edge technology meets hands-on learning, paving the way for a new era of skill development and career advancement.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Bridging Aspirations and Realities</a></h4>
                <p>Our platform serves as the vital link between enthusiastic interns and dynamic companies, ensuring a seamless integration of passion and purpose in the professional world.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Empowering Futures</a></h4>
                <p>At our core, we believe in unlocking the potential of aspiring individuals, providing them with the tools and opportunities needed to shape their professional destinies.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Tomorrow's Leaders, Today's Opportunities</a></h4>
                <p>Nurture the leaders of tomorrow by offering them today's most exciting opportunities. Our platform is dedicated to propelling emerging talent into the forefront of their respective industries.</p>
              </div>
            </div>
            <!-- <div class="col-lg-12">
              <p>Welcome to our dynamic internship platform, where dialogue meets opportunity. We are a vibrant community dedicated to fostering meaningful connections between ambitious interns and forward-thinking organizations.</p>
              <div class="gradient-button">

              </div>

            </div> -->
          </div>
        </div>
        <div class="col-lg-6">
          <div class="right-image">
            <img src="{{asset('asset/index_page/assets/images/our_vision.svg')}}" alt="">
            <img src="{{asset('asset/index_page/assets/images/i22.svg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

{{-- end body content --}}

@include('layouts.index_page_footer')
