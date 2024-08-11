<footer id="newsletter">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 offset-lg-2">
          <div class="section-heading">
            <h4>Join our mailing list to receive the news &amp; latest trends</h4>
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
                    // document.getElementById("emailSubscription").style.boxShadow = "0 0 1px 1px red";
                    document.getElementById("forgot-email-error").textContent = "Email is required";
                    isValid = false;
                  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    document.getElementById("forgot-email-error").textContent = "Please enter a valid email address";
                    // document.getElementById("emailSubscription").style.boxShadow = "0 0 1px 1px red";
                    isValid = false;
                  } else if (email.trim().length < 6 || email.trim().length > 100) {
                    document.getElementById("forgot-email-error").textContent = "Email should be between 6 and 100 characters long";
                    // document.getElementById("emailSubscription").style.boxShadow = "0 0 1px 1px red";
                    isValid = false;
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
    <a href="#" target="_blank" class="social-icon"> <img style="height:17px; width:15px;" src="{{asset('asset/index_page/assets/images/x.png')}}" alt=""></a>
    <a href="https://www.instagram.com/thozhil_global?igsh=MWd3c2JxYXpvNHhoaw==" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
    <a href="https://www.linkedin.com/company/thozhil/" target="_blank" class="social-icon"><i class="fab fa-linkedin"></i></a>
   <li style="color:black;"> Email: <a href="mailto:info@thozhil.co.in"><b>info@thozhil.co.in</b></a> </li>
    <li style="color:black;">Customer Support:+91 784 592 1063</li>
  
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
