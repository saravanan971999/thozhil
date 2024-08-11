
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
                    <h2 class="animate">Unlock Your Potential <br> Select Your Dream <br>Job Here!</h2>                  </div>
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
                <img src="{{asset('asset/index_page/assets/images/jobs.jpg')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
{{-- start body content --}}
<section id="particular_div">
<style>
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
       .filter-container {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
        }
        .filter-container label,
        .filter-container select,
        .filter-container input,
        .filter-container button {
            margin-bottom: 10px;
        }
        .filter-container {
            flex: 1;
            max-width: 300px;
        }
        .filter-container label {
            display: inline-block;
        }
        .filter-container input[type="checkbox"] {
            display: inline-block;
            margin-left: 50px;
        }
        .search-alert-form {
            display: flex;
            flex-direction: column;
        }
        .card-container {
            flex: 1;
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 20px;
        }
        .card {
            border: 1px solid #ddd;
            padding: 20px;
            box-sizing: border-box;
            height: fit-content;
        }
        .search-alert-form {
            display: grid;
            grid-gap: 15px;
        }
        label {
            font-weight: bold;
        }
        input,
        select {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            margin-top: 5px;
        }
 button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            /* margin-left: 80px; */
            width:90%;
        }
  @media (max-width: 768px){
        .filter{
            margin-left: 25px;
        }
        .h2Class{
            margin-right: 50px;
            font-size: 2rem;
        }
        .form-outline{
            margin-left: -700px;
        }
        h5{
            font-size: 15px;
        }
    }
    .btn-custom {
    background-color: #007bff; /* Blue */
    border-color: #007bff; /* Blue */
    color: #fff; /* White */
}
.btn-custom:hover {
    background-color: #0056b3; /* Darker blue */
    border-color: #0056b3; /* Darker blue */
}
.search{
position: relative;  
}
.search input{
height: 60px;
 text-indent: 25px;
 border: 2px solid #d6d4d4;
 border-radius:30px;
}
.search input:focus{
 box-shadow: none;
 border: 2px solid blue;
}
.search .fa-search{
 position: absolute;
 top: 20px;
 left: 16px;
}
.search button{
 position: absolute;
 top: 5px;
 right: 5px;
 height: 50px;
 width: 110px;
 background: blue;

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
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-3 d-flex justify-content-center" style="margin-top: 160px;height:680px; border-radius:30px;">
                <div class="filter-container" style="margin-left: 10px;"> 
                <form id="filterForm" action="{{ route('job_search') }}" method="get">
                        @csrf
                     <h2 class="text-center">Filters</h2>
                         <br>
                         @if (request()->has('part_time'))
                            <input type="hidden" name="ptft" value="1">
                        @elseif (request()->has('full_time'))
                            <input type="hidden" name="ptft" value="2">
            @endif
                        <label for="profile">Job Role</label>
                        <input type="text" placeholder="(e.g., Software Engineer)
" name="title" id="title" onkeypress="return /[a-zA-Z\s]/i.test(event.key) && this.value.length < 30">
                        <span id="titleError" class="error-message" style="display: none; color: red; font-size: 0.8em; margin-top: 5px;"></span>
                        <label for="profile">Skills</label>
                        <input type="text" name="skills" id="skills" placeholder="(e.g., Java, Python, HTML)
" onkeypress="return enforceMaxLength(event, 30);">
                        <span id="skillsError" class="error-message" style="display: none; color: red; font-size: 0.8em; margin-top: 5px;"></span>
                        <script>
                            function enforceMaxLength(event, maxLength) {
                                return event.target.value.length < maxLength;
                            }
                        </script>
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" placeholder="(e.g., Chennai)" onkeypress="return /[a-zA-Z\s]/i.test(event.key) && this.value.length < 30">
                        <span id="locationError" class="error-message" style="display: none; color: red; font-size: 0.8em; margin-top: 5px;"></span>
                        <label for="stipend">Salary</label>
                        <select name="salary" id="salary">
                            <option selected value="">Select Package</option>
                            <option value="1-2 LPA">1-2 LPA</option>
                            <option value="2-3 LPA">2-3 LPA</option>
                            <option value="3-4 LPA">3-4 LPA</option>
                            <option value="4-5 LPA">4-5 LPA</option>
                            <option value="5-6 LPA">5-6 LPA</option>
                            <option value="6-7 LPA">6-7 LPA</option>
                            <option value="7-8 LPA">7-8 LPA</option>
                            <option value="8-9 LPA">8-9 LPA</option>
                            <option value="9-10 LPA">9-10 LPA</option>
                            <option value="More than 10 LPA">More than 10 LPA</option>
                        </select>
                        <span id="salaryError" class="error-message" style="display: none; color: red; font-size: 0.8em; margin-top: 5px;"></span>                   
            <label for="experience">Experience</label>
            <select id="experience" name="experience" >
            <option selected value="">Select Experience</option>
            <option value="Fresher">Fresher</option>
            <option value="0-1 years">0-1 years</option>
            <option value="1-2 years">1-2 years</option>
            <option value="2-3 years">2-3 years</option>
            <option value="3-4 years">3-4 years</option>
            <option value="4-5 years">4-5 years</option>
            <option value="5-6 years">5-6 years</option>
            <option value="6-7 years">6-7 years</option>
            <option value="7-8 years">7-8 years</option>
            <option value="8-9 years">8-9 years</option>
            <option value="9-10 years">9-10 years</option>
            <option value="More than 10 years">More than 10 years</option>
            </select>
            <span id="formErrorMessage" class="error-message" style="display: none; color: red; font-size: 0.8em;"></span>
                        <br><br>
                        <button type="button" id="submitForm" onclick="filterFormValidation()" class="d-block mx-auto">Submit</button>
</form>
<script>
  function filterFormValidation() {
    var title = document.getElementById('title').value.trim();
    var location = document.getElementById('location').value.trim();
    var skills = document.getElementById('skills').value.trim();
    var salary = document.getElementById('salary').value;
    var experience = document.getElementById('experience').value;
    var isValid = true;
    var errorMessage = document.getElementById('formErrorMessage');
    if (title === '' && location === '' && skills === '' && salary === '' && experience === '') {
        isValid = false;
        errorMessage.innerText = 'Please select at least one field to get the desired result.';
        errorMessage.style.display = 'block';
    } else {
        errorMessage.style.display = 'none';
    }

    return isValid;
}
</script>
 </div>
</div>
<div class="col-md-8 mt-4">             
<br>
<br>
<!-- ....................................................search bar ............................................. -->
<div class="row justify-content-center">
        <div class="col-md-6 mb-4">
            <h1 class="d-flex justify-content-center" >JOB'S</h1>
        </div>
 <div class="row justify-content-center mb-4">
    <!-- Search bar -->
    <div class="col-md-11 ms-3">
      <form id="searchForm">
        <div class="search ">
            <i class="fa fa-search"></i>
            <input type="text" id="title-search" class="form-control" placeholder="Search Anything">
            @if (request()->has('part_time'))
                            <input type="hidden" name="ptft" value="1">
                        @elseif (request()->has('full_time'))
                            <input type="hidden" name="ptft" value="2">
              @endif
            <button style="border-radius:30px;padding:5px;" id="search_input" class="btn btn-primary">Search</button>
        </div>
      </form>
        <span id="title-searchError" class="error-message" style="display: none; color: red; font-size: 0.8em; margin-top: 5px;"></span>
    </div>
<script>
        function searchFormvalidation() {
            var title = document.getElementById('title-search').value.trim();
            var t = true;
            if (title === '') {
                event.preventDefault(); // Prevent form submission
                document.getElementById('title-searchError').innerText = 'Please Enter a Search term';
                document.getElementById('title-searchError').style.display = 'block'; // Show error message
                t = false; // Set flag to false indicating validation failure
            } else {
                document.getElementById('title-searchError').style.display = 'none'; // Hide error message
            }
            return t; // Return the validation result
        }
    </script>
<script>
                    document.getElementById('search_input').addEventListener('click', function(event) {
                        // alert(333)
                        event.preventDefault(); // Prevent default form submission
// console.log(searchFormvalidation());
                 var userId = document.querySelector('meta[name="user-id"]');
              if(userId){
                        if(searchFormvalidation()){
                            // Gather form data
                            // var formData = new FormData(document.getElementById('filterForm'));
                            var formData = new FormData(document.getElementById('searchForm'));

                            // Construct the URL with the route for job search
                            var url = '{{ secure_url("job_search") }}';

                            // Construct options for the fetch request
                            var options = {
                                method: 'POST',
                                body: formData
                            };
                            // Send a POST request using fetch
                            fetch(url, options)
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.text();
                                })
                                .then(data => {
                                    // Update content with filtered results
                                    document.getElementById('jobsContainer').innerHTML = data;
                                    document.getElementById('jobsContainer').addEventListener('click', clickOutsidePopupp);
                                })
                                .catch(error => {
                                    console.error('There was a problem with the fetch operation:', error);
                                });
                        }
                      }
                        else{
                            alert('You need to sign in first')}
                    });
                    function clickOutsidePopupp(event) {
                                                // alert(3)
                        if (event.target.classList.contains('page-link')) {
                            event.preventDefault(); // Prevent default link behavior
                            var nextPageUrl = event.target.href; // Get the URL of the next page
                            fetchNextPagee(nextPageUrl); // Fetch the next page via AJAX
                        }
                    }
                    function fetchNextPagee(url) {
                        fetch(url)
                            .then(response => response.text())
                            .then(data => {
                                document.getElementById('jobsContainer').innerHTML = data; // Update content with new page
                            })
                            .catch(error => console.error('Error fetching next page:', error));
                    }
                </script>
                    <script>
                        function searchFormvalidation() {
                            var title = document.getElementById('title-search').value.trim();
                            var t =true;
                            if (title === '') {
                            event.preventDefault();
                            document.getElementById('title-searchError').innerText = 'Please enter a search term';

                            document.getElementById('title-searchError').style.display = 'block';
                                t=false;
                            } else {
                                document.getElementById('title-searchError').style.display = 'none';
                            }
                            return t;
                        }
                    </script>
    </div>
               <div>
               <div class="row">
        <!-- Jobs List -->
        <div class="col-md-12">
            <div id="jobsContainer">
                @include('guest.jobs_list')
            </div>
        </div>
    </div>
</div>
                <script>
                    document.getElementById('submitForm').addEventListener('click', function(event) {
                        event.preventDefault(); // Prevent default form submission

                        // console.log(filterFormValidation());
                        var userId = document.querySelector('meta[name="user-id"]');
                        if (userId) {
                        if(filterFormValidation()){
                            // Gather form data
                            var formData = new FormData(document.getElementById('filterForm'));

                            // Construct the URL with the route for job filter
                            var url = '{{ secure_url("job_filter") }}';

                            // Construct options for the fetch request
                            var options = {
                                method: 'POST',
                                body: formData
                            };
                            // Send a POST request using fetch
                            fetch(url, options)
                                .then(response => {
                                    if (!response.ok) {
                                        throw new Error('Network response was not ok');
                                    }
                                    return response.text();
                                })
                                .then(data => {
                                    // Update content with filtered results
                                    document.getElementById('jobsContainer').innerHTML = data;
                                    document.getElementById('jobsContainer').addEventListener('click', clickOutsidePopup);
                                })
                                .catch(error => {
                                    console.error('There was a problem with the fetch operation:', error);
                                });
                        }
                      }
                        else{
                            alert('You need to sign in first')}
                    });
                    function clickOutsidePopup(event) {
                                                // alert(3)
                        if (event.target.classList.contains('page-link')) {
                            event.preventDefault(); // Prevent default link behavior
                            var nextPageUrl = event.target.href; // Get the URL of the next page
                            fetchNextPage(nextPageUrl); // Fetch the next page via AJAX
                        }
                    }
                    function fetchNextPage(url) {
                        fetch(url)
                            .then(response => response.text())
                            .then(data => {
                                document.getElementById('jobsContainer').innerHTML = data; // Update content with new page
                            })
                            .catch(error => console.error('Error fetching next page:', error));
                    }
                </script>
       </div>
    </div>
</section>
{{-- end body content --}}
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
    document.getElementById("forgot-email-error").textContent = "Please enter a valid email address";
    isValid = false;
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
            <a href="#" target="_blank" class="social-icon"> <img style="height:17px; width:15px;" src="{{asset('asset/index_page/assets/images/x.png')}}" alt=""></a>
            <a href="https://www.instagram.com/thozhil_global?igsh=MWd3c2JxYXpvNHhoaw==" target="_blank" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/company/thozhil/" target="_blank" class="social-icon"><i class="fab fa-linkedin"></i></a>
           <li> Email: <a href="mailto:info@thozhil.co.in"><b>info@thozhil.co.in</b></a> </li>
            <li>Customer Support:+91 784 592 1063</li>
          
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
        @media screen and (max-width: 768px) {
            .main-button{
                margin-left: -2px;
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

