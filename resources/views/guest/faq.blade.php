@include('layouts.index_page_header')
@include('layouts.alert')

{{-- body content --}}
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
              <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                <div class="row">
                  <div class="col-lg-12">
                    <h2 class="animate" style="font-size: 37px; ">The Page Where All <br>Your Queries Made!</h2>
                    <h6 style="color: black;">Never Assume You understand.Ask The Questions....</h6>
                  </div>
                  <div class="col-lg-12">
                    <div class="white-button first-button scroll-to-section">
                        </br>
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
                <img style="max-width: 450px; height:400px;" src="{{asset('asset/index_page/assets/images/faq.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <br>

  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
      /* Add your custom styles here */


      .faq-container {
        max-width: 800px;
        margin: 0 auto;
      }

      .faq-question {
        cursor: pointer;
        padding: 10px;
        background-color: #ffffff;
        border: 1px solid #dee2e6;
        margin-bottom: 10px;
        border-radius: 5px;
      }

      .faq-answer {
        display: none;
        padding: 10px;
        color: black;
        background-color: #e4fdfc;
        border: 1px solid #dee2e6;
        border-top: none;
        border-radius: 0 0 5px 5px;
      }
      h6{
        color: black;
      }

      .animate{
	/* color: #2e78fd;  */
	font-size: 45px;
	background: linear-gradient(to left,#9400d3 50%, rgb(0, 0, 0));
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
  </head>
  <body>

<center> <h2>Frequently Asked Questions</h2></center>
    <!-- FAQ Section -->
    <div class="container mt-5 faq-container">

      <!-- Sample Questions -->
      <div class="faq-question" onclick="toggleAnswer(1)">
        <h5>What is Thozhil and how does it work?</h5>
        <div class="faq-answer">
          <h6>Thozhil is an innovative online platform designed to connect talented individuals with exciting internship and job opportunities. Our platform utilizes cutting-edge algorithms to match candidates with positions that align with their skills, qualifications, and career aspirations.</h6>
        </div>
      </div>

      <div class="faq-question" onclick="toggleAnswer(2)">
        <h5>What types of internships and jobs are available on Thozhil?</h5>
        <div class="faq-answer">
          <h6>Thozhil offers a diverse array of opportunities, ranging from internships to part-time and full-time positions. Our platform spans various industries, including technology, finance, marketing, and more, catering to individuals at different stages of their careers.</h6>
        </div>
      </div>

      <div class="faq-question" onclick="toggleAnswer(3)">
        <h5>How can I sign up for an account on Thozhil?</h5>
        <div class="faq-answer">
          <h6>Signing up for Thozhil is a breeze! Simply visit our website, click on the "Sign Up" button, and follow the prompts to create your account. Fill in some basic information and set up your profile to get started.</h6>
        </div>
      </div>

      <div class="faq-question" onclick="toggleAnswer(4)">
        <h5>Is Thozhil suitable for both internships and full-time positions?</h5>
        <div class="faq-answer">
          <h6>Absolutely! Thozhil caters to both individuals seeking valuable internship experiences and those looking for full-time positions to advance their careers.</h6>
        </div>
      </div>

      <div class="faq-question" onclick="toggleAnswer(5)">
        <h5>Is there a deadline for internship applications?</h5>
        <div class="faq-answer">
          <h6>Yes, each internship may have a different application deadline. Make sure to check the deadline for the specific internship you are interested in and submit your application before that date.</h6>
        </div>
      </div>

      <div class="faq-question" onclick="toggleAnswer(6)">
        <h5>How does Thozhil match candidates with suitable opportunities?</h5>
        <div class="faq-answer">
          <h6>Our platform employs an advanced matching algorithm that carefully analyses your profile, taking into account your skills, experience, and preferences. This ensures that you receive personalized recommendations tailored to your unique qualifications and career goals.</h6>
        </div>
      </div>

      <div class="faq-question" onclick="toggleAnswer(7)">
        <h5>Are there any fees associated with using Thozhil?</h5>
        <div class="faq-answer">
          <h6>Yes, Thozhil has a nominal registration fee to access our platform's comprehensive features and opportunities. This fee helps us maintain the quality of our services and support a seamless experience for all users.</h6>
        </div>
      </div>

      <div class="faq-question" onclick="toggleAnswer(8)">
        <h5>How does the application process work on Thozhil?</h5>
        <div class="faq-answer">
          <h6>Applying is simple. Once you find a position of interest, click on "Apply Now" and follow the instructions. You can also conveniently track your application status through your personalized dashboard.</h6>
        </div>
      </div>

      <div class="faq-question" onclick="toggleAnswer(9)">
        <h5>How does Thozhil ensure the quality and legitimacy of job postings?</h5>
        <div class="faq-answer">
          <h6>Thozhil is designed with a user-friendly interface, ensuring a seamless experience for both candidates and employers, facilitating easy navigation and interaction.</h6>
        </div>
      </div>

      <div class="faq-question" onclick="toggleAnswer(10)">
        <h5>How does Thozhil ensure a user-friendly experience for both candidates and employers?</h5>
        <div class="faq-answer">
          <h6>To maintain quality, we implement a rigorous vetting process for job postings. Our dedicated team reviews each listing verify its authenticity and relevance before it is published on the platform.</h6>
        </div>
      </div>

    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    {{-- <script>
      // Function to toggle the visibility of the answer
      function toggleAnswer(questionNumber) {
        var answer = document.querySelector('.faq-question:nth-child(' + questionNumber + ') .faq-answer');
        answer.style.display = (answer.style.display === 'none' || answer.style.display === '') ? 'block' : 'none';
      }
    </script> --}}
    <script>
        // Function to toggle the visibility of the answer
        function toggleAnswer(questionNumber) {
          var allAnswers = document.querySelectorAll('.faq-answer');

          // Hide all answers
          allAnswers.forEach(function(answer) {
            answer.style.display = 'none';
          });

          // Show the answer for the clicked question
          var answer = document.querySelector('.faq-question:nth-child(' + questionNumber + ') .faq-answer');
          answer.style.display = (answer.style.display === 'none' || answer.style.display === '') ? 'block' : 'none';
        }
      </script>



  <footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4 style="margin-top:120px;">Join our mailing list to receive the news &amp; latest trends</h4>
          </div>
        </div>
        <div class="col-lg-6 offset-lg-3">
            <form id="search" action="{{ url('email_subscription') }}" method="POST" novalidate>
                @csrf
                <div class="row">
                  <div class="col-lg-6 col-sm-6">
                    <fieldset>
                      <input type="email" name="email" id="emailSubscription" class="email" placeholder="Email Address..." autocomplete="on" required>
                      <div id="forgot-email-error" style="color: red;"></div>
                    </fieldset>
                  </div>
                  <div class="col-lg-6 col-sm-6">
                    <fieldset>
                      <button type="submit" class="main-button">Subscribe Now</button>
                    </fieldset>
                  </div>
                </div>
              </form>
              <script>
  const loginForm = document.getElementById('search');

  loginForm.addEventListener('submit', (e) => {
    if (!validateForgetForm()) {
      e.preventDefault();
    }
  });
  function validateForgetForm() {
    var email = document.getElementById("emailSubscription").value;
    var isValid = true;
    if (email.trim() === "") {
        document.getElementById("forgot-email-error").textContent = "Email is required";
        isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById("forgot-email-error").textContent = "Please enter a valid email address";
        isValid = false;
    } else if (email.trim().length < 6 || email.trim().length > 100) {
        document.getElementById("forgot-email-error").textContent = "Email should be between 6 and 100 characters long";
        isValid = false;
    } else if (email.trim().startsWith('.')) {
        document.getElementById("forgot-email-error").textContent = "Please enter a valid email address";
        isValid = false;
    } else {
        // Check for allowed domains
        var allowedDomains = ["gmail.com", "yahoo.com", "hotmail.com", "outlook.com"];
        var domain = email.split('@')[1];
        if (!allowedDomains.includes(domain)) {
            // Check if it's a company email format
            var companyDomainRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!companyDomainRegex.test(email)) {
                document.getElementById("forgot-email-error").textContent = "Please enter a valid email address";
                isValid = false;
            }
        } else if (email.trim().split('@')[0].length < 4 || email.trim().split('@')[0].length > 30) {
            document.getElementById("forgot-email-error").textContent = "Please enter a valid email address";
            isValid = false;
        }
    }

    return isValid;
}

</script>


        </div>
      </div>
      <div class="row">

        <div class="col-lg-3">
        <div class="footer-widget">
            <h4>About Our Website</h4>
            <div class="logo">
            <h3 style="color:black">Thozhil</h3>
            </div>
            <p class="mt-4">Find your relevant career that matches your skills and passion.</p>
        </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>About Us</h4>
            <ul>
              <li><a href="{{url('/')}}">Home</a></li>
              <li><a href="{{ url('all_jobs?full_time')}}">Full-time Jobs</a></li>
              <li><a href="{{ url('all_jobs?part_time')}}">Part-time Jobs</a></li>
              <li><a href="{{ url('all_intern?full_time')}}">Full-time Internships</a></li>
              <li><a href="{{ url('all_intern?part_time')}}">Part-time Internships</a></li>
             
              <li><a href="{{url('how_it_works')}}">How It Works</a></li>
              <li><a href="{{url('contact_us')}}">Contact Us</a></li>
             

            </ul>
            <ul>
            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="{{url('our_mission')}}">Our Mission</a></li>
              <li><a href="{{url('our_vision')}}">Our Vision</a></li>
              <li><a href="{{url('faq')}}">FAQ</a></li>
            
              <li><a href="{{url('privacy')}}">Privacy Policy</a></li>
              <li><a href="{{url('terms_condition')}}">Terms & Conditions</a></li>
              <li><a href="{{url('Pricing_Policy')}}">Pricing Policy</a></li>
              <li><a href="{{url('cancellation_policy')}}">Cancellation Policy</a></li>

            </ul>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="footer-widget">
            <h4>Join Us</h4>
            <a href="https://www.facebook.com/profile.php?id=61556333192870&mibextid=2JQ9oc" target="_blank" class="social-icon"><i class="fab fa-facebook"></i></a>
            <a href="#" target="_blank" class="social-icon"><i class="fab fa-x"></i></a>
            <a href="https://www.instagram.com/thozhil_global?igsh=MWd3c2JxYXpvNHhoaw==" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/company/thozhil/" target="_blank" class="social-icon"><i class="fab fa-linkedin"></i></a>
           <li> Email: <a href="mailto:info@thozhil.co.in"><b>info@thozhil.co.in</b></a> </li>
            <li style="font-size: 15px">Customer Support:+91 784 592 1063</li>
          
<!-- Scroll to Top Button -->
<div>
    <style>
        #scroll-to-top {
          display: none;
          position: fixed;
          bottom: 20px;
          right: 20px;
          cursor: pointer;
          animation: fadeIn 0.5s;
        }

        .arrow-box {
          background-color: #007bff;
          color: #fff;
          padding: 10px;
          border-radius: 5px;
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
          display: flex;
          align-items: center;
          justify-content: center;
          transition: background-color 0.3s;
        }

        .arrow-box:hover {
          background-color: #007bff;
        }

        .arrow-box i {
          font-size: 20px;
        }

        @keyframes fadeIn {
          from {
            opacity: 0;
          }
          to {
            opacity: 1;
          }
        }
      </style>

<div id="scroll-to-top" class="scroll-to-top">
    <div class="arrow-box">
      <i class="fas fa-arrow-up"></i>
    </div>
  </div>
</div>
  <script>
    // Show/Hide Scroll to Top Button
    window.onscroll = function () {
      scrollFunction();
    };

    function scrollFunction() {
      var scrollButton = document.getElementById("scroll-to-top");
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollButton.style.display = "block";
      } else {
        scrollButton.style.display = "none";
      }
    }

    // Scroll to Top
    document.getElementById("scroll-to-top").onclick = function () {
      scrollToTop();
    };

    function scrollToTop() {
      document.body.scrollTop = 0; // For Safari
      document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE, and Opera
    }
  </script>
          </div>
        </div>

        <div class="col-lg-12">
          <div class="copyright-text">
            <p> Developed By <a href="https://oneyesinfotechsolutions.com/">Oneyes Infotech Solutions</a> <br> Copyright © 2023 Thozhil. All Rights Reserved.

          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="  referrerpolicy="no-referrer"></script> --}}

<!-- Bootstrap core JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Your custom scripts -->
<script src="{{asset('asset/index_page/assets/js/owl-carousel.js')}}"></script>
<script src="{{asset('asset/index_page/assets/js/animation.js')}}"></script>
<script src="{{asset('asset/index_page/assets/js/imagesloaded.js')}}"></script>
<script src="{{asset('asset/index_page/assets/js/popup.js')}}"></script>
<script src="{{asset('asset/index_page/assets/js/custom.js')}}"></script>

</body>
</html>
