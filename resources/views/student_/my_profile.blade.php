<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/favicon.ico" rel="icon">
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" >
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('asset/index_page/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('asset/index_page/assets/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('asset/index_page/assets/css/animated.css')}}">
    <link rel="stylesheet" href="{{asset('asset/index_page/assets/css/owl.css')}}">

<!-- owl carosallink -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">


    <link href="{{asset('asset/student/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('asset/student/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
   <link href="{{asset('asset/student/css/bootstrap.min.css')}}" rel="stylesheet">
   <link href="{{ asset('asset/student/css/style.css')}}" rel="stylesheet">

<style>

    .hero-btn{
    display: inline-block;
    text-decoration: none;
    color: #f44336;
    border: 1px solid #fff;
    padding: 12px 34px;
    font-size: 18px;
    background: transparent;
    position: relative;
    cursor: pointer;
}
    .hero-btn:hover{
    border: 1px solid #e45bc6;
    transition: 1s;
}
.red-btn{
    border: 1px solid #f44336;
    background: transparent;
    color: #f44336;
}
.popup {
            display: none;
            background-color: rgba(0, 0, 0, 0.7);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .popup-button {
            background-color: #e98e25;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }




        .card-img-top {
          object-fit: cover; /* Maintain aspect ratio for the images */
          height: 50%; /* Set the height for the images within the card */
        }

        .about-update {
  padding-top: 130px;
  position: relative;
}

.about-update .section-heading {
  margin-bottom: 45px;
}

.about-update .section-heading,
.about-update .box-item,
.about-update p,
.about-update .box-item .gradient-button,
.about-update .box-item span {
  position: relative;
  z-index: 1;
}

.about-update .box-item {
  box-shadow: 0px 0px 15px rgba(0,0,0,0.07);
  padding: 10px 30px;
  background-color: #fff;
  border-radius: 40px;
  margin-bottom: 30px;
  box-shadow: blue;
}

.about-update .box-item h4 a {
  font-size: 20px;
  font-weight: 700;
  margin-top: 8px;
  color: #2a2a2a;
  transition: all .3s;
}

.about-update .box-item p {
  margin-bottom: 0px;
}

.about-update .box-item:hover h4 a {
  color: #4b8ef1;
}

.about-update .gradient-button {
  margin-top: 30px;
  margin-bottom: 10px;
}

.about-update span {
  font-size: 14px;
  color: #7a7a7a;
}

.about-update .right-image {
  position: relative;
  z-index: 1;
}

.about-update:after {
  /* background-image: url(../images/about-bg.jpg); */
  width: 777px;
  height: 1132px;
  content: '';
  position: absolute;
  background-repeat: no-repeat;
  right: 0;
  top: 50%;
  transform: translateY(-50%);
  z-index: 0;
}


.resume {
               display: none;
               background-color: rgba(0, 0, 0, 0.7);
               position: fixed;
               top: 0;
               left: 0;
               width: 100%;
               height: 100%;
               display: flex;
               justify-content: center;
               align-items: center;
               z-index: 9999;
           }
           .resume-content {
               background-color: #fff;
               padding: 20px;
               border-radius: 8px;
               box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
               text-align: center;
           }
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        /* background-color: rgb(16,72,66); */
        color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
        border-radius: 10px 10px 0 0;
    }

    .card-body {
        padding: 20px;
    }

    .profile-label {
        font-weight: bold;
        /* color: #007bff; */
    }

    .profile-info {
        margin-bottom: 15px;
    }

    .resume-link {
        color: #007bff;
        text-decoration: none;
    }

    .resume-link:hover {
        text-decoration: underline;
    }






.contact-us{
    width: 80%;
    margin: auto;
}

.contact-col{
    flex-basis: 48%;
    margin-bottom: 30px;
}

.contact-col div{
    display: flex;
    align-items: center;
    margin-bottom: 40px;
}

.contact-col div .fa{
    font-size: 28px;
    color: #F5226D;
    margin: 10px;
    margin-right: 30px;
}

.contact-col div p{
    padding: 0;
}

.contact-col div h5{
    font-size: 20px;
    margin-bottom: 5px;
    color: #555;
    font-weight: 400;
}

.contact-col input, .contact-col textarea{
    width: 100%;
    padding: 15px;
    margin-bottom: 17px;
    outline: none;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
    .dropdown {
         position: relative;
         display: inline-block;
       }

       /* Style for the dropdown button */
       .gradient-button {

         color: white;
         padding: 10px;
         border: none;
         cursor: pointer;
       }

       /* Style for the dropdown content */
       .dropdown-content {
         display: none;
         position: absolute;
         background-color: #f9f9f9;
         min-width: 160px;
         box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
         z-index: 1;
       }

       /* Style for the dropdown links */
       .dropdown-content a {
         color: black;
         padding: 12px 16px;
         text-decoration: none;
         display: block;
       }

       /* Change color on hover */
       .dropdown-content a:hover {
         background-color: #ddd;
       }

       /* Show the dropdown menu on hover */
       .dropdown:hover .dropdown-content {
         display: block;
       }



       /* Media query for screens smaller than 768px */
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

<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{ url('/')}}" class="logo">
                <img src="{{asset('Thozhil/thozhill-removebg-preview (1).png')}}" alt="" style="width: 200px;margin-top:-10px; margin-left:40px;">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">


                  <!-- Your HTML code with Blade syntax -->
                  <li class="scroll-to-section"><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
    <li class="scroll-to-section">
        <div class="dropdown">
            <a href="#" class="{{ request()->is('all_jobs') ? 'active' : '' }}">
                Jobs <i class="fas fa-caret-down"></i>
            </a>
            <div class="dropdown-content" style="height: 100px;">
                <a href="{{ url('all_jobs?full_time')}}">Full-Time</a>
                <a href="{{ url('all_jobs?part_time')}}">Part-Time</a>
            </div>
        </div>
    </li>
    <li class="scroll-to-section">
        <div class="dropdown">
            <a href="#" class="{{ request()->is('all_intern') ? 'active' : '' }}">
                Internships <i class="fas fa-caret-down"></i>
            </a>
            <div class="dropdown-content"  style="height: 100px;">
                <a href="{{ url('all_intern?full_time')}}">Full-Time</a>
                <a href="{{ url('all_intern?part_time')}}">Part-Time</a>
            </div>
        </div>
    </li>
    <li class="scroll-to-section"><a href="{{ url('how_it_works') }}" class="{{ request()->is('how_it_works') ? 'active' : '' }}">How It Works</a></li>
    <li class="scroll-to-section"><a href="{{ url('faq') }}" class="{{ request()->is('faq') ? 'active' : '' }}">FAQ</a></li>



              @if(Session::has('user_id'))

              <li>
                <div class="dropdown">
                    <div class="gradient-button">
                      <a id="modal_trigger" href="#">
                          <span class="fas fa-user"></span>
                          {{ Session::get('full_name') }}
                        </a>

                    </div>
                    <div class="dropdown-content">
                      <a href="{{url('/candidate/')}}">Dashboard</a>
                      <a href="{{url('/candidate/profile')}}">Profile</a>
                      <a href="{{url('logout')}}">Logout</a>
                    </div>
                  </div>
              </li>
              @elseif (Session::has('employer_id'))
              <li>
                <div class="dropdown">
                    <div class="gradient-button">
                      <a id="modal_trigger" href="#">
                          <span class="fas fa-user"></span>
                          {{ Session::get('full_name') }}
                        </a>

                    </div>
                    <div class="dropdown-content">
                      <a href="{{url('/employer/')}}">Dashboard</a>
                      <a href="{{url('/employer/my_profile')}}">Profile</a>
                      <a href="{{url('logout')}}">Logout</a>
                    </div>
                  </div>
              </li>
              @else
                <li>
                    <div class="gradient-button" style="margin-top: -6px;">
                        <a id="modal_trigger" href="{{url('login_register')}}">
                            <i class="fa fa-sign-in-alt"></i> Login / Register
                        </a>
                    </div>
                </li>
              @endif


            </ul>
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->
<body>

    <div class="container mt-5">
        <div class="row">
            <!-- Column with width 3 -->
            <div class="col-lg-3 mt-5">
                <div class="card shadow" >
                    <div class="card-header text-center">
                        <!-- <img src="profile.jpeg" alt="Profile Picture" class="img-fluid rounded-circle" style="width: 80px; height: 80px;"> -->
                        <h5 class="mt-2">{{ ucwords($user->full_name)}}</h5>
                        <p style="color:black">{{$user->email}}</p>


                    <!-- </div> -->
                    </div>
                    <div class="card-body">
                        <!-- Add your account-related menu items here -->
                        <div class="dropdown d-flex justify-content-center">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="manageAccountDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Manage your account
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="manageAccountDropdown">
                                <a class="dropdown-item" href="{{url('/candidate/edit_profile')}}"><i class="bi bi-pencil"></i> Edit</a>
                                <a class="dropdown-item" onclick="DELEte()"><i class="bi bi-trash"></i> Delete</a>
                                <a class="dropdown-item" href="{{ url('/candidate/change_password')}}"><i class="bi bi-key"></i> Change Password</a>
                            </div>
                            <div id="deletePOPUP" style="display: none;">
                                <style>
                                    .popup {
                                        display: none;
                                        background-color: rgba(0, 0, 0, 0.7);
                                        position: fixed;
                                        top: 0;
                                        left: 0;
                                        width: 100%;
                                        height: 100%;
                                        display: flex;
                                        justify-content: center;
                                        align-items: center;
                                        z-index: 9999;
                                    }

                                    .popup-content {
                                        background-color: #fff;
                                        padding: 20px;
                                        border-radius: 8px;
                                        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
                                        text-align: center;
                                    }

                                    .popup-button {
                                        background-color: #3b82c4;
                                        color: #fff;
                                        border: none;
                                        padding: 10px 20px;
                                        border-radius: 5px;
                                        cursor: pointer;
                                        font-size: 16px;
                                        margin-top: 10px;
                                    }

                                </style>
                                <div class="popup" id="confirmationPopup">
                                    <div class="popup-content">
                                        <p class="align" style="color: black">
                                        Are you sure want to delete your account?
                                        </p>
                                        <span>
                                            <a href="{{url('candidate/delete/'.$user->student_id)}}"><button class="popup-button">Yes</button></a>
                                        </span>
                                        <button class="popup-button" onclick="closePopup_P()">No</button>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function DELEte(){
                                    document.getElementById('deletePOPUP').style.display = '';
                                }
                                document.addEventListener("DOMContentLoaded", function() {
                                    document.getElementById("confirmationPopup").style.display = "flex";
                                });
                                function closePopup_P() {
                                    document.getElementById("deletePOPUP").style.display = "none";
                                }
                            </script>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Column with width 9 -->
            <div class="col-md-9">
                <div class="card">
                <center><div style="color: black; font-weight: bold;" class="card-header">
                    My Profile
                </div></center>
                    <div class="card-body">
                        <!-- Profile Information -->
                        <div class="profile-info">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="profile-label">First Name:</p>
                                    <p>{{ucwords($user->first_name)}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Last Name:</p>
                                    <p>{{ucwords($user->last_name)}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Date Of Birth:</p>
                                    <p>{{$user->dob}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Age:</p>
                                    <p>{{$user->age}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Gender:</p>
                                    <p>{{ ucwords($user->gender) }}
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Email:</p>
                                    <p>{{$user->email}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Contact Number:</p>
                                    <p>{{$user->phone}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Address:</p>
                                    <p>{{$user->door_no .", ". $user->street_name .", ". $user->city .", ". $user->state .", ". $user->country .", ". $user->pincode}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Skills:</p>
                                    <p>{{$user->skills}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Degrees:</p>
                                    <p>{{$user->degree}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Area Of interest:</p>
                                    <p>{{$user->area_of_interest}}</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="profile-label">Graduation Year:</p>
                                    <p>{{$user->passed_out_year}}</p>
                                </div>
                                  <div class="col-md-6">
            <p class="profile-label">Resume:</p>
            <p>
                <a href="{{ url('download_student', ['filename' => urlencode($user->resume)]) }}" class="resume-link" target="_blank">Download Resume</a>
                <span class="mx-2">|</span>
                {{-- <a onclick="view()" value="{{$user->resume}}" class="resume-link" target="_blank">View</a> --}}
                <button class="btn btn-danger btn-sm" id="resumeID" onclick="view()" value="{{$user->resume}}">View</button>
            </p>
        </div>
        <div id="resume-view"></div>
                            </div>
                        </div>
                        <!-- End Profile Information -->
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>





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
    function view() {
        document.getElementById("resume-view").classList.add("resume");
        var resumeView = document.getElementById("resume-view");
        var name = document.getElementById("resumeID").value;

        // Send an AJAX request to Laravel backend
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/get-pdf/" + name, true);

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);

                    if (response.success) {
                        // Decode the URL and display the PDF
                        var decodedUrl = decodeURIComponent(response.url);
                        decodedUrl = decodedUrl.replace(/'/g, '%27');
                        resumeView.innerHTML = "<embed class='resume-content' id='RESUME' src='" + decodedUrl + "' width='50%' height='80%' type='application/pdf'>";
                        resumeView.style.display = 'flex';

                        // Attach the click event listener to close the popup when clicking outside
                        document.addEventListener('click', clickOutsidePopup);
                    } else {
                        // Display an error message
                        resumeView.innerHTML = "";
                        resumeError.style.display = "block";
                        resumeError.innerHTML = response.message;
                    }
                } else {
                    console.error(xhr.statusText);
                }
            }
        };

        xhr.send();
    }

    function clickOutsidePopup(event) {
        var resumeView = document.getElementById("resume-view");
        var resumeContent = document.getElementById("RESUME");

        // Check if the clicked element is outside the popup
        if (event.target !== resumeContent && !resumeContent.contains(event.target)) {
            // Close the popup
            closePopup_p();
        }
    }

    function closePopup_p() {
        // Your code to close the popup goes here
        document.getElementById('resume-view').style.display = 'none';

        // Remove the click event listener
        document.removeEventListener('click', clickOutsidePopup);
    }
</script>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('asset/student/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('asset/student/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('asset/student/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('asset/student/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('asset/student/js/main.js')}}"></script>


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