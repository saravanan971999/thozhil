@include('layouts.index_page_header')
@include('layouts.alert')
<style>
    .service-item {
      height: 450px; /* Set a fixed height for all card items */
      width: 100%; /* Set a fixed width for all card items */
      border: 1px solid #ddd;
      margin-bottom: 20px; /* Optional: Add margin for better spacing between cards */
    }
.image1{
    width: 530px;
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
    height: 290px; /* Set your desired height */
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
    @media (max-width: 768px) {
      .service-item {
        height: auto; /* Allow cards to have dynamic height on smaller screens */
      }
      .image1{
        margin-left: -30px;
        width: 350px;
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
                    <h1 class="animate">"Empowering aspirations, sculpting career paths"</h1>
                    <p>Create a World Where Guarenteed jobs & internships are accessible to all.</p>
                  </div>
                  <div class="col-lg-12">
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
                <img class="image1" src="{{asset('asset/index_page/assets/images/mission.svg.jpg')}}" alt="">
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
            <h4>Unlock Your Potential with Seamless Internship Experiences </h4>
            <img  src="{{ asset('asset/index_page/assets/images/heading-line-dec.png')}}" alt="">
            <p>Welcome to Thozhil, where we pave the way for your professional journey by seamlessly connecting aspiring talents with transformative internship opportunities. Our platform is designed to be your trusted ally in navigating the dynamic landscape of internships, providing a user-friendly interface that streamlines the search, application, and placement process.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="service-item first-service">
            <div class="icon"></div>
            <h4>Empowering Future Leaders:</h4>
            <p>Facilitating transformative learning experiences that equip interns with real-world skills and insights for a successful future.</p>
            <div class="text-button">
              <!-- <a href="#">Read More <i class="fa fa-arrow-right"></i></a> -->
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item second-service">
            <div class="icon"></div>
            <h4>Building Career Bridges:</h4>
            <p>Facilitating transformative learning experiences that equip interns with real-world skills and insights for a successful future.</p>
            <div class="text-button">
              <!-- <a href="#">Read More <i class="fa fa-arrow-right"></i></a> -->
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item third-service">
            <div class="icon"></div>
            <h4>Diversity and Inclusion in Action:</h4>
            <p>Facilitating transformative learning experiences that equip interns with real-world skills and insights for a successful future.</p>
            <div class="text-button">
              <!-- <a href="#">Read More <i class="fa fa-arrow-right"></i></a> -->
            </div>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="service-item fourth-service">
            <div class="icon"></div>
            <h4>Ransformative Learning Journeys:</h4>
            <p>Facilitating transformative learning experiences that equip interns with real-world skills and insights for a successful future.</p>
            <div class="text-button">
              <!-- <a href="#">Read More <i class="fa fa-arrow-right"></i></a> -->
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
            <h4>About <em>What We Do</em> &amp; Who We Are</h4>
            <img src="{{ asset('asset/index_page/assets/images/i2.svg')}}" alt="">
            <p>Welcome to our dynamic internship platform, where dialogue meets opportunity. We are a vibrant community dedicated to fostering meaningful connections between ambitious interns and forward-thinking organizations</p>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Maintance Problems</a></h4>
                <p>Tackling real-world challenges is at the core of our internship program. </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">24/7 Support &amp; Help</a></h4>
                <p>We understand that learning and problem-solving don't adhere to a 9-to-5 schedule. That's why we provide 24/7 support and help for our interns. </p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Fixing Issues About</a></h4>
                <p>Interns  play a vital role in addressing and fixing various issues.Opportunities to contribute to impactful projects.</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="box-item">
                <h4><a href="#">Co. Development</a></h4>
                <p>Collaboration is key to success. Our internship program fosters a culture of co-development, where interns work alongside experienced professionals, contributing to meaningful projects.</p>
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
            <img src="{{ asset('asset/index_page/assets/images/mission.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
   <!-- footer -->

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
{{-- end body content --}}

@include('layouts.index_page_footer')
