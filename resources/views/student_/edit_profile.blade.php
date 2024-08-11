<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobEntry - Job Portal Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
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
        <link href="img/favicon.ico" rel="icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

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
        input[type="number"]::-webkit-inner-spin-button{
        display: none;
    }
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



           /* media query for toggle dropdown */

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

    {{-- <div class="container-xxl bg-white p-0"> --}}

        <!-- Spinner End -->






        <!-- Navbar End -->
        <!-- Column with width 9 -->
        <br><br>
        <div class="col-md-8 offset-md-2 mx-auto">
            <div class="card">
                <div class="card-header text-center" style="color: black">
                    Edit Profile
                </div>
                <div class="card-body">
                    <!-- Profile Editing Form -->
                    <form class="row g-3" action="{{url('/candidate/update_profile')}}" method="POST" id="editForm" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" value="{{ucwords($user->first_name)}}"  name="firstname" id="firstname" onkeypress="return /[a-zA-Z\s]/i.test(event.key) && this.value.length < 25" readonly>
                            <span id="firstnameError" class="error-message alert alert-warning" style="display: none; color: red;">Please enter your name</span>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="{{ucwords($user->last_name)}}" name="lastname" id="lastname"  onkeypress="return /[a-zA-Z\s]/i.test(event.key) && this.value.length < 25" readonly>
                            <span id="lastnameError" class="error-message alert alert-warning " style="display: none; color: red; ">Please enter your name</span>
                        </div>
                        <div class="col-md-6">
                            <label for="dob" class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" value="{{$user->dob}}" id="dob" name="dob">
                            <span id="dobError" class="error-message alert alert-warning" style="display: none; color: red;">Please enter your date of birth</span>
                        </div>
                        <script>
                            // Calculate the date ranges for 17 and 45 years ago from today
                            var currentDate = new Date();
                            var maxDate = new Date(currentDate.getFullYear() - 45, currentDate.getMonth(), currentDate.getDate());
                            var minDate = new Date(currentDate.getFullYear() - 17, currentDate.getMonth(), currentDate.getDate());

                            // Format the date to be in YYYY-MM-DD format for setting the min and max attributes
                            var maxDateString = maxDate.toISOString().split('T')[0];
                            var minDateString = minDate.toISOString().split('T')[0];

                            // Set the min and max attributes for the input element
                            document.getElementById("dob").setAttribute("min", maxDateString);
                            document.getElementById("dob").setAttribute("max", minDateString);



  function calculateAgeAndFillAgeField() {
    var dobInput = document.getElementById('dob');
    var ageInput = document.getElementById('age');

    var dob = dobInput.value;
    if (dob) {
      var currentDate = new Date();
      var inputDate = new Date(dob);

      var ageDiff = currentDate.getFullYear() - inputDate.getFullYear();
      var monthDiff = currentDate.getMonth() - inputDate.getMonth();
      if (monthDiff < 0 || (monthDiff === 0 && currentDate.getDate() < inputDate.getDate())) {
        ageDiff--;
      }

      ageInput.value = ageDiff;
    } else {
      ageInput.value = '';
    }
  }

  var dobInput = document.getElementById('dob');
  dobInput.addEventListener('input', calculateAgeAndFillAgeField);
                        </script>

                        <div class="col-md-6">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" value="{{$user->age}}" id="age" name="age" readonly>
                            <span id="ageError" class="error-message alert alert-warning" style="display: none; color: red;">Please enter your age</span>
                        </div>

                        <div class="col-md-6">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                 <option value="male"{{ $user->gender === 'male' ? 'selected' : '' }}>Male</option>
                                <option value="female"{{ $user->gender === 'female' ? 'selected' : '' }}>Female</option>
                                <option value="not willing to reveal"{{ $user->gender === 'not willing to reveal' ? 'selected' : '' }}>Not Willing to Reveal</option>
                            </select>

                            <span id="genderError" class="error-message alert alert-warning" style="display: none; color: red;">Please select your gender</span>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" value="{{$user->email}}" id="email"  aria-describedby="emailHelp" readonly>
                            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                            <span id="emailError" class="error-message alert alert-warning" style="display: none; color: red; ">Please enter a valid email address</span>
                        </div>

                        <div class="col-md-6">
                            <label for="contactNumber" class="form-label">Contact Number</label>
                            <input type="number" class="form-control" value="{{$user->phone}}"  name="contact_no" id="contact_no" oninput="clearErrorMessage('errorPhoneNumber')" onkeypress="return /^[6-9]\d?$/.test(event.key) || (event.target.value.length > 0 && /^\d$/.test(event.key) && event.target.value.length < 10)">
                            <span id="contactNoError" class="error-message alert alert-warning" style="display: none; color: red;">Please enter a valid mobile number</span>
                        </div>

                        <div class="col-md-6">
                            <label for="address" class="form-label">Door No.</label>
                            <input type="text" class="form-control" value="{{$user->door_no}}" id="address" name="door_no" maxlength="50" onkeypress="return event.charCode <= 50">
                            <span id="addressError" class="error-message alert alert-warning" style="display: none; color: red; ">Please enter your Door no & House name</span>
                        </div>

                        <div class="col-md-6">
                            <label for="addressStreet" class="form-label">Street</label>
                            <input type="text" class="form-control" value="{{$user->street_name}}" id="street" name="street" onkeypress="return event.target.value.length < 50">
                            <span id="streetError" class="error-message alert alert-warning" style="display: none; color: red;">Please enter your street name</span>
                        </div>

                        <div class="col-md-6">
                            <label for="addressVillage" class="form-label">Village/Town</label>
                            <input type="text" class="form-control" value="{{$user->locality}}" id="vt" name="vt" onkeypress="return event.target.value.length < 30">
                            <span id="vtError" class="error-message alert alert-warning" style="display: none; color: red;">Please enter your village/town name</span>
                        </div>

                        <div class="col-md-6">
                            <label for="addressCountry" class="form-label">Country</label>
                            {{-- <select placeholder="Enter your country" class="form-control" value="{{$user->country}}" id="country" name="country">
                                <option value="">Select Country</option>
                            </select> --}}
                            <input type="text" class="form-control"  value="{{$user->country}}" id="country" name="country" onkeypress="return /[a-zA-Z\s]/i.test(event.key) && this.value.length < 30">
                            <span id="countryError" class="error-message alert alert-warning " style="display: none; color: red;">Please select your country</span>
                        </div>

                        <div class="col-md-6">
                            <label for="addressState" class="form-label">State</label>
                            {{-- <select  placeholder="Enter your State" class="form-control" value="{{$user->state}}" id="state" name="state">
                                <option value="">Select State</option>
                            </select> --}}
                            <input type="text" class="form-control"  value="{{$user->state}}" id="state" name="state" onkeypress="return /[a-zA-Z\s]/i.test(event.key) && this.value.length < 30">
                            <span id="stateError" class="error-message alert alert-warning" style="display: none; color: red;">Please select your state</span>
                        </div>

                        <div class="col-md-6">
                            <label for="addressDistrict" class="form-label">District</label>
                            {{-- <select placeholder="Enter your District" class="form-control" value="{{$user->district}}" id="district" name="district">
                            <option value="">Select District</option>
                            </select> --}}
                            <input type="text" class="form-control"  value="{{$user->district}}" id="district" name="district" onkeypress="return /[a-zA-Z\s]/i.test(event.key) && this.value.length < 30">
                            <span id="districtError" class="error-message alert alert-warning" style="display: none; color: red;">Please select your district</span>
                        </div>

                        <div class="col-md-6">
                            <label for="addressPincode" class="form-label">Pincode</label>
                            <input type="number" class="form-control" value="{{$user->pincode}}"  name="pincode" id="pincode" onkeypress="return event.charCode === 0 || (/\d/.test(String.fromCharCode(event.charCode)) && this.value.length < 6)">
                            <span id="pincodeError" class="error-message alert alert-warning" style="display: none; color: red;">Please enter a valid pincode</span>
                        </div>

                        <div class="col-md-6">
                            <label for="degree" class="form-label">Degree</label>
                            <select id="degree" name="degrees[]" multiple name = "multiple-degrees">
                                <option value="">Select the Preferred Degrees</option>


                                @foreach([
                                        'B.E.Aeronautical Engineering',
                                        'B.E.Advanced Architectural Design',
                                        'B.E.Agriculture Engineering',
                                        'B.E.Architecture',
                                        'B.E.Artificial Intelligence',
                                        'B.Sc.AstroPhysics',
                                        'B.E.Automobile Engineering',
                                        'B.Sc.Bio Chemistry',
                                        'B.Sc.Bioinformatics',
                                        'B.Sc.Biology',
                                        'B.E.Biomedical engineering',
                                        'BBA Business Administration',
                                        'BBA Business Information Systems',
                                        'B.E.Chemical engineering',
                                        'B.Ed.Childhood Studies',
                                        'B.E.Civil and Structural',
                                        'B.E.Civil Engineering',
                                        'B.Com.Commerce',
                                        'B.Sc.Computer Science',
                                        'B.E.Computer Science engineering',
                                        'B.E.Data Analytics for Business',
                                        'B.E.Data science',
                                        'B.Sc.Economics',
                                        'B.Ed.Education',
                                        'B.Sc.Electrical',
                                        'B.E.Electrical engineering',
                                        'B.E.Electronics and Communication',
                                        'B.E.Electronics and Communication Engineering',
                                        'B.E.Electrical and Electronics Engineering',
                                        'Engineering',
                                        'BCA Computer Science',
                                        'BCA Information Technology',
                                        'BCA Software Engineering',
                                        'BBA Engineering Management',
                                        'B.Sc.Environment and Energy Management',
                                        'B.Sc.Environmental Science',
                                        'BBA Finance',
                                        'B.E.Fire and Safety Engineering',
                                        'B.Sc.Forensic Science',
                                        'B.A.Geography',
                                        'BBA Global Logistics',
                                        'B.Ed.Guidance',
                                        'BBA Healthcare Administration',
                                        'B.A.Historic Preservation',
                                        'B.A.History',
                                        'B.E.History of Architecture and Town Planning',
                                        'BBA Human Resources',
                                        'B.E.Industrial engineering',
                                        'B.E.Information Technology',
                                        'B.E.Interior and Spatial design',
                                        'B.E.International Architectural Regeneration and Development',
                                        'BBA International Business',
                                        'B.A.Journalism',
                                        'BBA Leadership and Entrepreneur',
                                        'B.A.Linguistics',
                                        'BBA Logistics and Supplychain',
                                        'B.A.MacroEconomics',
                                        'BBA Marketing',
                                        'B.Sc.Mathematics',
                                        'B.E.Mechanical',
                                        'B.E.Mechanical engineering',
                                        'B.E.Nuclear engineering',
                                        'B.Sc.Nursing',
                                        'B.A.Physics',
                                        'B.A.Political Science',
                                        'B.E.Product design and manufacturing',
                                        'B.E.Production Engineering',
                                        'B.Sc.Psychology',
                                        'B.A.Public Administration',
                                        'B.E.Regional Planning',
                                        'B.E.Robotics',
                                        'BBA Rural Development',
                                        'BBA Safety Management',
                                        'B.A.Social Policy',
                                        'B.A.Social Services',
                                        'B.E.Software Engineering',
                                        'B.A.Sports Management',
                                        'B.E.Systems engineering',
                                        'B.A.Tamil',
                                        'B.E.Thermal Engineering',
                                        'B.E.Urban Architecture',
                                        'B.Sc.Urban Studies',
                                        'B.Sc.Visual Communication',
                                        'B.E.Welding Technology',
                                        'B.Ed.Women Studies',
                                        'B.Sc.Zoology',
                                        'M.E.Aeronautical Engineering',
                                        'M.E.Advanced Architectural Design',
                                        'M.E.Agriculture Engineering',
                                        'M.E.Architecture',
                                        'M.E.Artificial Intelligence',
                                        'M.Sc.AstroPhysics',
                                        'M.E.Automobile Engineering',
                                        'M.Sc.Bio Chemistry',
                                        'M.Sc.Bioinformatics',
                                        'M.Sc.Biology',
                                        'M.E.Biomedical engineering',
                                        'MBA Business Administration',
                                        'MBA Business Information Systems',
                                        'M.E.Chemical engineering',
                                        'M.Ed.Childhood Studies',
                                        'M.E.Civil and Structural',
                                        'M.E.Civil Engineering',
                                        'M.Com.Commerce',
                                        'M.Sc.Computer Science',
                                        'M.E.Computer Science engineering',
                                        'M.E.Data Analytics for Business',
                                        'M.E.Data science',
                                        'M.Sc.Economics',
                                        'M.Ed.Education',
                                        'M.Sc.Electrical',
                                        'M.E.Electrical engineering',
                                        'M.E.Electronics and Communication',
                                        'M.E.Electronics and Communication Engineering',
                                        'M.E.Electrical and Electronics Engineering',
                                        'Engineering',
                                        'MCA Computer Science',
                                        'MCA Information Technology',
                                        "MCA Software Engineering",
                                        "MBA Engineering Management",
                                        "M.Sc.Environment and Energy Management",
                                        "M.Sc.Environmental Science",
                                        "MBA Finance",
                                        "M.E.Fire and Safety Engineering",
                                        "M.Sc.Forensic Science",
                                        "M.A.Geography",
                                        "MBA Global Logistics",
                                        "M.Ed.Guidance",
                                        "MBA Healthcare Administration",
                                        "M.A.Historic Preservation",
                                        "M.A.History",
                                        "M.E.History of Architecture and Town Planning",
                                        "MBA Human Resources",
                                        "M.E.Industrial engineering",
                                        "M.E.Information Technology",
                                        "M.E.Interior and Spatial design",
                                        "M.E.International Architectural Regeneration and Development",
                                        "MBA International Business",
                                        "M.A.Journalism",
                                        "MBA Leadership and Entreprenuer",
                                        "M.A.Lingustics",
                                        "MBA Logistics and Supplychain",
                                        "M.A.MacroEconomics",
                                        "MBA Marketing",
                                        "M.Sc.Mathematics",
                                        "M.E.Mechanical",
                                        "M.E.Mechanical engineering",
                                        "M.E.Nuclear engineering",
                                        "M.Sc.Nursing",
                                        "M.A.Physics",
                                        "M.A.Political Science",
                                        "M.E.Product design and manufacturing",
                                        "M.E.Production Engineering",
                                        "M.Sc.Psychology",
                                        "M.A.Public Administration",
                                        "M.E.Regional Planning",
                                        "M.E.Robotics",
                                        "MBA Rural Development",
                                        "MBA Safety Management",
                                        "M.A.Social Policy",
                                        "M.A.Social Services",
                                        "M.E.Software Engineering",
                                        "M.A.Sports Management",
                                        "M.E.Systems engineering",
                                        "M.A.Tamil",
                                        "M.E.Thermal Engineering",
                                        "M.E.Urban Architecture",
                                        "M.Sc.Urban Studies",
                                        "M.Sc.Visual Communication",
                                        "M.E.Welding Technology",
                                        "M.Ed.Women Studies",
                                        "M.Sc.Zoology",
                                        "Aeronautical Engineering",
                                        "Advanced Architectural Design",
                                        "Agriculture Engineering",
                                        "Architecture",
                                        "Artificial Intelligence",
                                        "AstroPhysics",
                                        "Automobile Engineering",
                                        "Bio Chemistry",
                                        "Bioinformatics",
                                        "Biology",
                                        "Biomedical engineering",
                                        "Business Administration",
                                        "Business Information Systems",
                                        "Chemical engineering",
                                        "Childhood Studies",
                                        "Civil and Structural",
                                        "Civil Engineering",
                                        "Commerce",
                                        'BBA Leadership and Entreprenuer',
                                        "Computer Science",
                                        "Computer Science engineering",
                                        "Data Analytics for Business",
                                        "Data science",
                                        "Economics",
                                        "Education",
                                        "Electrical",
                                        "Electrical engineering",
                                        "Electronics and Communication",
                                        "Electronics and Communication Engineering",
                                        "Electrical and Electronics Engineering",
                                        "Engineering",
                                        "Engineering Management",
                                        "Environment and Energy Management",
                                        "Environmental Science",
                                        "Finance",
                                        "Fire and Safety Engineering",
                                        "Forensic Science",
                                        "Geography",
                                        "Global Logistics",
                                        "Guidance",
                                        "Healthcare Administration",
                                        "Historic Preservation",
                                        "History",
                                        "History of Architecture and Town Planning",
                                        "Human Resources",
                                        "Industrial engineering",
                                        "Information Technology",
                                        "Interior and Spatial design",
                                        "International Architectural Regeneration and Development",
                                        "International Business",
                                        "Journalism",
                                        "Leadership and Entreprenuer",
                                        "Lingustics",
                                        "Logistics and Supplychain",
                                        "MacroEconomics",
                                        "Marketing",
                                        "Mathematics",
                                        "Mechanical",
                                        "Mechanical engineering",
                                        "Medicine",
                                        "Nuclear engineering",
                                        "Nursing",
                                        "Physics",
                                        "Political Science",
                                        "Product design and manufacturing",
                                        "Production Engineering",
                                        "Psychology",
                                        "Public Administration",
                                        "Regional Planning",
                                        "Research",
                                        "Robotics",
                                        "Rural Development",
                                        "Safety Management",
                                        "Social Policy",
                                        "Social Services",
                                        "Software Engineering",
                                        "Sports Management",
                                        "Systems engineering",
                                        "Tamil",
                                        "Thermal Engineering",
                                        "Urban Architecture",
                                        "Urban Studies",
                                        "Visual Communication",
                                        "Welding Technology",
                                        "Women Studies",
                                        "Zoology",
                                        "Others"
                                    ] as $degree)
                                    <option value="{{ $degree }}" {{ in_array($degree, explode(',', $user->degree)) ? 'selected' : '' }}>{{ $degree }}</option>
                                @endforeach

                                   </select>

                            <input type="text" id="otherDegree" name="otherDegree" style="display: none;" placeholder="Please specify the Degree">

                            <span id="degreeError" class="error-message alert alert-warning" style="display: none; color: red; ">Please select a degree</span>
                        </div>
                        <script>
                            $(document).ready(function() {
                                let multipleCancelButton1 = new Choices('#degree', {
                                    removeItemButton: true,
                                    maxItemCount: 5,
                                    searchResultLimit: 5,
                                    // renderChoiceLimit: 5
                                });
                            });
                            document.getElementById('degrees').addEventListener('change', function() {
                                var otherDegreeInput = document.getElementById('otherDegreeInput');
                                if (this.value === 'Others') {
                                    otherDegreeInput.style.display = 'block';
                                } else {
                                    otherDegreeInput.style.display = 'none';
                                }
                            });

                        </script>

                        <div class="col-md-6">
                            <label for="graduationYear" class="form-label">Graduation Year Of Passing</label>
                            <select class="form-control" id="year" name="passed_out_year">
                                <option value="">Select Year</option>
                                <script>
                                    const currentYear = new Date().getFullYear();
                                    const minYear = currentYear - 40; // 60 years back from the current year
                                    const maxYear = currentYear + 10; // 10 years after the current year
                                    const yearSelection = document.getElementById("year");
                                    for (let year = maxYear; year >= minYear; year--) {
                                        const option = document.createElement("option");
                                        option.value = year;
                                        option.textContent = year;

                                        // Set the selected attribute if it matches the user's passed_out_year
                                        if (year === {{$user->passed_out_year}}) {
                                            option.selected = true;
                                        }

                                        yearSelection.appendChild(option);
                                    }
                                </script>
                            </select>

                            <span id="yearError" class="error-message alert alert-warning" style="display: none; color: red;">Please select your graduation</span>
                        </div>

                        <div class="col-md-6">
                           <label for="experience">Experience:</label>
                            <select id="experience" value="" name="experience" onchange="toggleCTCInput()">
                                <option value="">Select the Experience Required</option>
                                <option value="Student"{{$user->experience === 'Student' ? 'selected' : ''}}>Student</option>
                                <option value="Fresher"{{$user->experience === 'Fresher' ? 'selected' : ''}}>Fresher</option>
                                <option value="0-1yrs"{{$user->experience === '0-1yrs' ? 'selected' : ''}}>0-1yrs</option>
                                <option value="1-2yrs"{{$user->experience === '1-2yrs' ? 'selected' : ''}}>1-2yrs</option>
                                <option value="2-3yrs"{{$user->experience === '2-3yrs' ? 'selected' : ''}}>2-3yrs</option>
                                <option value="3-4yrs"{{$user->experience === '3-4yrs' ? 'selected' : ''}}>3-4yrs</option>
                                <option value="4-5yrs"{{$user->experience === '4-5yrs' ? 'selected' : ''}}>4-5yrs</option>
                                <option value="5-6yrs"{{$user->experience === '5-6yrs' ? 'selected' : ''}}>5-6yrs</option>
                                <option value="6-7yrs"{{$user->experience === '6-7yrs' ? 'selected' : ''}}>6-7yrs</option>
                                <option value="7-8yrs"{{$user->experience === '7-8yrs' ? 'selected' : ''}}>7-8yrs</option>
                                <option value="8-9yrs"{{$user->experience === '8-9yrs' ? 'selected' : ''}}>8-9yrs</option>
                                <option value="9-10yrs"{{$user->experience === '9-10yrs' ? 'selected' : ''}}>9-10yrs</option>
                                <option value="More than 10yrs"{{$user->experience === 'More than 10yrs' ? 'selected' : ''}}>More than 10yrs</option>
                            </select>

                            @if ($user->ctc !=null)
                                <div id="previousCTC" >
                                    <label for="previousCTC">Current CTC:</label>
                                    <input type="text" id="previousCTC" value="{{$user->ctc}}" name="previousCTC" placeholder="Enter your previousCTC">
                                    <span id="previousCTCError" class="error-message alert alert-warning" style="display: none; color: red; ">Please Enter your previousCTC</span>
                                </div>
                            @endif




                            <div id="previousCTC" style="display: none;">
                                <label for="previousCTC">Current CTC:</label>
                                <input type="text" id="previousCTC" value="" name="previousCTC" placeholder="Enter your previousCTC">
                                <span id="previousCTCError" class="error-message alert alert-warning" style="display: none; color: red; ">Please Enter your previousCTC</span>
                            </div>
                            <span id="experienceError" class="error-message alert alert-warning" style="display: none; color: red; ">Please Select your experience</span>
                        </div>
                        <script>
                            function toggleCTCInput() {
                            var experienceSelect = document.getElementById("experience");
                            var ctcInput = document.getElementById("previousCTC");
                            var ctcError = document.getElementById("previousCTCError");

                            if (experienceSelect.value !== "Student" && experienceSelect.value !== "Fresher") {
                                ctcInput.style.display = "block";
                            } else {
                                ctcInput.style.display = "none";
                                ctcError.style.display = "none"; // Hide error when not applicable
                            }

                            // Show error message if previousCTC field is empty when it should be displayed
                            if (ctcInput.style.display === "block" && ctcInput.value && ctcInput.value.trim() === "") {
                                ctcError.style.display = "block";
                            } else {
                                ctcError.style.display = "none";
                            }

                            }
                        </script>

                        <div class="col-md-6">
                            <label for="area_of_interest">Area Of Interest</label>
                            <select name="area_of_interest[]" id="area_of_interest" multiple name="area_interest" onchange="showOtherField()">

                                <option value="">Select Your Area of Interest</option>


                                @foreach([
                                    'Accounts',
                                    'Administration',
                                    'Chemical',
                                    'Tech',
                                    'Finance',
                                    'Banking',
                                    'Healthcare',
                                    'Human Resource',
                                    'Education',
                                    'Engineering',
                                    'Retail',
                                    'Marketing',
                                    'Hospitality',
                                    'Consulting',
                                    'Manufacturing',
                                    'Media',
                                    'Transportation',
                                    'Telecommunications',
                                    'Nonprofit',
                                    'Government',
                                    'Fashion',
                                    'Legal',
                                    'Science',
                                    'Art',
                                    'Real Estate',
                                    'Automotive',
                                    'Information Technology',
                                    'Customer Service',
                                    'Agriculture',
                                    'Construction',
                                    'Pharmaceutical',
                                    'Environmental Services',
                                    'Energy',
                                    'Sales',
                                    'Writing/Editing',
                                    'Legal Services',
                                    'Supply Chain/Logistics',
                                    'Design',
                                    'Food Service',
                                    'Insurance',
                                    'Beauty/Cosmetics',
                                    'Sports',
                                    'Fitness',
                                    'Entertainment',
                                    'Research',
                                    'Quality Assurance',
                                    'Security',
                                    'Hospital/Clinical',
                                    'Pharmacy',
                                    'Architecture',
                                    'Aviation/Aerospace',
                                    'Veterinary',
                                    'Event Planning',
                                    'Social Services',
                                    'Libraries',
                                    'Humanities',
                                    'Biotechnology',
                                    'Nursing',
                                    'Psychology',
                                    'Geology',
                                    'others'
                                ] as $interest)
                                <option value="{{ $interest }}" {{ in_array($interest, explode(',', $user->area_of_interest)) ? 'selected' : '' }}>{{ $interest }}</option>
                            @endforeach



                            </select>
                            <script>
                                    $(document).ready(function() {

                                let multipleCancelButton1 = new Choices(`#area_of_interest`, {
                                    removeItemButton: true,
                                    maxItemCount: 5,
                                    searchResultLimit: 5,
                                    // renderChoiceLimit: 5
                                });
                                });
                            </script>
                            <div id="otherAreaInput" style="display: none;">
                                <label for="otherarea_of_interest">Enter the Area of Interest:</label>
                                <input type="text" id="otherarea_of_interest" name="otherarea_of_interest">
                                <span id="otherarea_of_interestError" class="error-message alert alert-warning">Please Enter your other Area of Interest</span>
                            </div>
                            <script>
                                function showOtherField() {
                                    var area_of_interestDropdown = document.getElementById("area_of_interest");
                                    var otherarea_of_interestField = document.getElementById("otherAreaInput");

                                    if (area_of_interestDropdown.value === "others") {
                                        otherarea_of_interestField.style.display = "block";
                                    } else {
                                        otherarea_of_interestField.style.display = "none";
                                    }
                                }
                            </script>
                            <span id="area_of_interestError" class="error-message alert alert-warning" style="display: none; color: red; ">Please Select your Area of Interest</span>
                        </div>


















                        <div class="col-md-6">
                            <label for="skills">Skills</label>
                            <select name="skills[]" id="skills" multiple name="skills" onchange="showOtherField_skill()">

                                @foreach($skills as $s)
                                <option value="{{$s->name}}" {{ in_array($s->name, explode(',', $user->skills)) ? 'selected' : '' }}>{{ $s->name }}</option>
                            @endforeach



                            </select>
                            <script>
                                    $(document).ready(function() {

                                let multipleCancelButton1 = new Choices(`#skills`, {
                                    removeItemButton: true,
                                    maxItemCount: 5,
                                    searchResultLimit: 5,
                                    // renderChoiceLimit: 5
                                });
                                });
                            </script>
                            <div id="otherAreaInputskills" style="display: none;">
                                <label for="otherskills">Enter the Skills:</label>
                                <input type="text" id="otherskills" name="otherskills">
                                <span id="otherskillsError" class="error-message alert alert-warning">Please Enter your other Skills</span>
                            </div>
                            <script>
                                function showOtherField_skill() {

                                    var skillsDropdown = document.getElementById("skills");
                                    var otherskillsField = document.getElementById("otherAreaInputskills");
                                    // console.log(skillsDropdown.value);
                                    if (skillsDropdown.value === "Others") {
                                        otherskillsField.style.display = "block";
                                    } else {
                                        otherskillsField.style.display = "none";
                                    }
                                }
                            </script>
                            <span id="skillsError" class="error-message alert alert-warning" style="display: none; color: red; ">Please Select your Skills</span>
                        </div>
























                        <div class="col-md-6">
                            <label for="resume" class="form-label">Resume</label>
                            <input type="file" accept=".pdf" class="form-control" name="resume" id="resume">
                            <span id="resumeError" class="error-message alert alert-warning" style="display: none; color: red;">Please upload your resume</span>
                            <input type="hidden" name="oresume" id="" value="{{$user->resume}}">
                        </div>

                        <div id="resume-view"></div>

                        <script>
                            document.getElementById("resume").addEventListener("change", function(event) {
                              var file = event.target.files[0];
                              var resumeView = document.getElementById("resume-view");
                              var reader = new FileReader();

                              if (file && file.type === "application/pdf") {
                                reader.onload = function(e) {
                                  resumeView.innerHTML = "<embed src='" + e.target.result + "' width='500' height='500' type='application/pdf'>";
                                };
                                reader.readAsDataURL(file);
                                document.getElementById("resumeError").style.display = "none";
                              } else {
                                resumeView.innerHTML = "";
                                document.getElementById("resumeError").style.display = "block";
                              }
                            });
                        </script>

                        <div class="col-12 text-center">
                            <button type="submit" class="btn" style="color:white;background-color: #007bff">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <script>
        function validateForm() {
                // alert(255)
            var firstname = document.getElementById('firstname').value;
            var lastname = document.getElementById('lastname').value;
            var dob = document.getElementById('dob').value;
            var age = document.getElementById('age').value;
            var gender = document.getElementById('gender').value;
            var email = document.getElementById('email').value;
            var contactNo = document.getElementById('contact_no').value;
            var address = document.getElementById('address').value;
            var street = document.getElementById('street').value;
            var vt = document.getElementById('vt').value;
            var country = document.getElementById('country').value;
            var state = document.getElementById('state').value;
            var district = document.getElementById('district').value;
            var pincode = document.getElementById('pincode').value;
            //  var qualification = document.getElementById('qualification').value;
            var degree = document.getElementById('degree').value;
            //  var majorSubject = document.getElementById('major_subject').value;
            var year = document.getElementById('year').value;
            var experience = document.getElementById('experience').value;
            var previousCTC = document.getElementById('previousCTC').value;
            var area_of_interest = document.getElementById('area_of_interest').value;
            var otherarea_of_interest = document.getElementById('otherarea_of_interest').value;
            var resume = document.getElementById('resume').value;
            var skills = document.getElementById('skills').value;
            //  alert(255)




            var isValid = true;

            function hideErrorMessageOnFocus(inputId, errorId) {
                var inputElement = document.getElementById(inputId);
                var errorElement = document.getElementById(errorId);

                inputElement.addEventListener('focus', function () {
                    errorElement.style.display = 'none';
                });
            }

            // Name validation
            if (firstname.trim() === '') {
                // alert(24)
            document.getElementById('firstnameError').innerText = 'Please enter your name.';
            document.getElementById('firstnameError').style.display = 'block';
            //   alert(2)
            isValid = false;
            hideErrorMessageOnFocus('firstname', 'firstnameError');
            }  else if (firstname.charAt(0) === ' ') {
            document.getElementById('firstnameError').innerText = 'Name should not start with a space.';
            document.getElementById('firstnameError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('firstname', 'firstnameError');
            } else if (firstname.length < 2) {
            document.getElementById('firstnameError').innerText = 'Name should be at least 2 characters long.';
            document.getElementById('firstnameError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('firstname', 'firstnameError');
            } else if (firstname.length > 25) { // Adding length limit
            document.getElementById('firstnameError').innerText = 'Name should not exceed 25 characters.';
            document.getElementById('firstnameError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('firstname', 'firstnameError');
            }else if (!/^[a-zA-Z\s]*$/.test(firstname)) {
            document.getElementById('firstnameError').innerText = 'Name should only contain letters and spaces.';
            document.getElementById('firstnameError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('firstname', 'firstnameError');
            }
            else {
            document.getElementById('firstnameError').style.display = 'none';
            }


            // Name validation
            if (lastname.trim() === '') {
            document.getElementById('lastnameError').innerText = 'Please enter your name.';
            document.getElementById('lastnameError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('lastname', 'lastnameError');
            } else if (lastname.length < 1) {
            document.getElementById('lastnameError').innerText = 'Last Name should be at least 1 character long.';
            document.getElementById('lastnameError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('lastname', 'lastnameError');
            } else if (lastname.length > 25) { // Adding length limit
            document.getElementById('lastnameError').innerText = 'Name should not exceed 25 characters.';
            document.getElementById('lastnameError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('lastname', 'lastnameError');
            } else if (!/^[a-zA-Z\s]*$/.test(lastname)) {
            document.getElementById('lastnameError').innerText = 'Name should only contain letters and spaces.';
            document.getElementById('lastnameError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('lastname', 'lastnameError');
            }
            //else if (!/^[a-zA-Z]+(?:\s[a-zA-Z]+(?:\s[a-zA-Z]+)?)?$/.test(lastname)) {
            // document.getElementById('lastnameError').innerText = 'Name should only contain letters and at most two spaces in the middle.';
            // document.getElementById('lastnameError').style.display = 'block';
            //isValid = false;
            // hideErrorMessageOnFocus('lastname', 'lastnameError');
            //}
            else {
            document.getElementById('lastnameError').style.display = 'none';
            }



            if (dob === '') {
                document.getElementById('dobError').innerText = 'Please enter your date of birth.';
                document.getElementById('dobError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('dob', 'dobError' )
            } else {
                // Validate date format (YYYY-MM-DD)
                var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
                if (!dateRegex.test(dob)) {
                    document.getElementById('dobError').innerText = 'Invalid date format. Please use the format YYYY-MM-DD.';
                    document.getElementById('dobError').style.display = 'block';
                    isValid = false;
                    hideErrorMessageOnFocus('dob', 'dobError' )
                }
                else {
                    // Validate if the date is in the past
                    var currentDate = new Date();
                    var inputDate = new Date(dob);

                    if (inputDate >= currentDate) {
                        document.getElementById('dobError').innerText = 'Date of birth should be in the past.';
                        document.getElementById('dobError').style.display = 'block';
                        isValid = false;
                        hideErrorMessageOnFocus('dob', 'dobError' )
                    }
                    else {
                        // Calculate age based on date of birth
                        var ageDiff = currentDate.getFullYear() - inputDate.getFullYear();
                        var monthDiff = currentDate.getMonth() - inputDate.getMonth();
                        if (monthDiff < 0 || (monthDiff === 0 && currentDate.getDate() < inputDate.getDate())) {
                            ageDiff--;
                        }

                        // Autofill age field
                        document.getElementById('age').value = ageDiff;

                        // Validate age
                        var age = parseInt(ageDiff);
                        if (isNaN(age) || age < 17) {
                            document.getElementById('ageError').innerText = 'You must be at least 17 years old to register.';
                            document.getElementById('ageError').style.display = 'block';
                            isValid = false;
                            hideErrorMessageOnFocus('age', 'ageError' )
                        } else {
                            document.getElementById('ageError').style.display = 'none';
                        }
                    }
                }
            }


            // Age validation
            if (age === '') {
                document.getElementById('ageError').textContent = 'Please enter your age.';
                document.getElementById('ageError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('age', 'ageError');
            }
            else if (isNaN(age)) {
                document.getElementById('ageError').textContent = 'Please enter a valid age.';
                document.getElementById('ageError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('age', 'ageError');
            }
            else if (parseInt(age) < 17 || parseInt(age) > 45) {
                document.getElementById('ageError').textContent = 'Age must be between 17 and 45.';
                document.getElementById('ageError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('age', 'ageError');
            }
            else {
                document.getElementById('ageError').style.display = 'none';
            }

            // Gender validation
            if (gender === '') {
                document.getElementById('genderError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('gender', 'genderError' )
            } else {
                document.getElementById('genderError').style.display = 'none';
            }

            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var emailSpecialCharPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            var email = document.getElementById('email').value.trim(); // Assuming 'email' is the variable containing the user input.

            if (email === '') {
                document.getElementById('emailError').textContent = 'Email address is required.';
                document.getElementById('emailError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('email', 'emailError');
            }
           // else if (email.length < 4 || email.length > 30) {
            //    document.getElementById('emailError').textContent = 'Email length should be between 4 and 30 characters before "@" symbol.';
            //    document.getElementById('emailError').style.display = 'block';
            //    isValid = false;
            //    hideErrorMessageOnFocus('email', 'emailError');
            //}
            else if (!emailPattern.test(email)) {
                document.getElementById('emailError').textContent = 'Invalid email address format.';
                document.getElementById('emailError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('email', 'emailError');
            }
            else if (!emailSpecialCharPattern.test(email)) {
                document.getElementById('emailError').textContent = 'Email contains invalid special characters.';
                document.getElementById('emailError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('email', 'emailError');
            }
            //else if (email.startsWith(' ') || email.endsWith(' ')) {
             //   document.getElementById('emailError').textContent = 'Email address should not start or end with a space.';
             //   document.getElementById('emailError').style.display = 'block';
              //  isValid = false;
              //  hideErrorMessageOnFocus('email', 'emailError');
            //}
            else if (email.includes('..')) {
                document.getElementById('emailError').textContent = 'Email address cannot contain consecutive dots.';
                document.getElementById('emailError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('email', 'emailError');
            }
            else if (!/^(?:[a-zA-Z0-9.-]+@gmail\.com|[a-zA-Z0-9.-]+@yahoo\.com|[a-zA-Z0-9.-]+@hotmail\.com|[a-zA-Z0-9.-]+@outlook\.com)$/.test(email)) {
                document.getElementById('emailError').textContent = 'Email address should be @gmail.com, @yahoo.com, @hotmail.com, or @outlook.com.';
                document.getElementById('emailError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('email', 'emailError');
            }
            else {
                document.getElementById('emailError').style.display = 'none';
            }

            // Mobile Number validation
            var mobilePattern = /^\d{10}$/;

            // Check if mobile number is empty
            if (contactNo === '') {
            document.getElementById('contactNoError').innerText = 'Mobile number is required.';
            document.getElementById('contactNoError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('contact_no', 'contactNoError');
            }
            // Check if mobile number matches the pattern and has no letters
            else if (!mobilePattern.test(contactNo) || /\D/.test(contactNo)) {
            document.getElementById('contactNoError').innerText = 'Invalid mobile number. Please enter a 10-digit number without any letters.';
            document.getElementById('contactNoError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('contact_no', 'contactNoError');
            }
            // Check if mobile number is in Indian format
            else if (!/^[6789]\d{9}$/.test(contactNo)) {
            document.getElementById('contactNoError').innerText = 'Please enter a valid Indian mobile number starting with 6,7,8 or 9.';
            document.getElementById('contactNoError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('contact_no', 'contactNoError');
            }
            else {
            document.getElementById('contactNoError').style.display = 'none';
            }

            // Address validation
            if (address.trim() === '') {
            document.getElementById('addressError').innerText = 'Please enter your address.';
            document.getElementById('addressError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('address', 'addressError');
            } else if (address.length > 50) {
            document.getElementById('addressError').innerText = 'Address should not exceed 50 characters.';
            document.getElementById('addressError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('address', 'addressError');
            } else if (address.length < 2) {
            // Display error for address below minimum length
            document.getElementById('addressError').innerText = 'Address should have a minimum length of 2 character.';
            document.getElementById('addressError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('address', 'addressError');
            }
            //else if (/[^a-zA-Z0-9\s]+/.test(address)) {
            // Display error for continuous special characters
           // document.getElementById('addressError').innerText = 'Address should not contains continuous special characters.';
           // document.getElementById('addressError').style.display = 'block';
           // isValid = false;
           // hideErrorMessageOnFocus('address', 'addressError');
            // }
            else {
            document.getElementById('addressError').style.display = 'none';
            }



            // Street validation
            if (street.trim() === '') {
            document.getElementById('streetError').innerText = 'Please enter your street.';
            document.getElementById('streetError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('street', 'streetError');
            } else if (street.length > 50) {
            document.getElementById('streetError').innerText = 'Street should not exceed 50 characters.';
            document.getElementById('streetError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('street', 'streetError');
            } else if (street.length < 2) {
            // Display error for street below minimum length
            document.getElementById('streetError').innerText = 'Street should have a minimum length of 2 characters.';
            document.getElementById('streetError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('street', 'streetError');
            }
           // else if (/[^a-zA-Z0-9\s]+/.test(street)) {
            // Display error for continuous special characters
            //document.getElementById('streetError').innerText = 'Street should not contains continuous special characters.';
            //document.getElementById('streetError').style.display = 'block';
           // isValid = false;
           // hideErrorMessageOnFocus('street', 'streetError');
           // }
            else {
            document.getElementById('streetError').style.display = 'none';
            }

            // Validation for variable 'vt' with a length limit of 30 characters
            if (vt.trim() === '') {
            document.getElementById('vtError').innerText = 'Please enter the Village/Town.';
            document.getElementById('vtError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('vt', 'vtError');
            } else if (vt.length > 30) { // Adding length limit (30 characters)
            document.getElementById('vtError').innerText = 'Village/Town should not exceed 30 characters.';
            document.getElementById('vtError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('vt', 'vtError');
            }
            else {
            document.getElementById('vtError').style.display = 'none';
            }

            if (country === '') {
                document.getElementById('countryError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('country', 'countryError');
            } else {
                document.getElementById('countryError').style.display = 'none';
            }

            // State validation
            if (state === '') {
                document.getElementById('stateError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('state', 'stateError');
            } else {
                document.getElementById('stateError').style.display = 'none';
            }

            // District validation
            if (district === '') {
                document.getElementById('districtError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('district', 'districtError');
            } else {
                document.getElementById('districtError').style.display = 'none';
            }

            if (pincode === '') {
            document.getElementById('pincodeError').innerText = 'Please enter your postal code.';
            document.getElementById('pincodeError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('pincode', 'pincodeError');
            } else {
            var pincodeRegex =/^[1-9][0-9]{5}$/;
            if (!pincodeRegex.test(pincode)) {
                document.getElementById('pincodeError').innerText = 'Invalid pincode format. Please enter a valid 6 digit postal code.';
                document.getElementById('pincodeError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('pincode', 'pincodeError');
            } else if (pincode.length !== 6) { // Modify the length check here
                document.getElementById('pincodeError').innerText = 'Postal code should be exactly 6 digits long.';
                document.getElementById('pincodeError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('pincode', 'pincodeError');
            } else {
                document.getElementById('pincodeError').style.display = 'none';
            }
            }



            // Degree validation
            if (degree === '') {
            document.getElementById('degreeError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('degree', 'degreeError');
            } else {
                document.getElementById('degreeError').style.display = 'none';
            }

            // Year of Passing validation
            if (year === '') {
                document.getElementById('yearError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('year', 'yearError');
            } else {
                document.getElementById('yearError').style.display = 'none';
            }

            if (experience === '') {
            // Display error message for experience field
            document.getElementById('experienceError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('experience', 'experienceError');
            } else {
            document.getElementById('experienceError').style.display = 'none';
            }


            if (previousCTC === '') {
            document.getElementById('previousCTCError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('previousCTC', 'previousCTCError');
            } else {
            document.getElementById('previousCTCError').style.display = 'none';
            }


            if (area_of_interest === '') {
                document.getElementById('area_of_interestError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('area_of_interest', 'area_of_interesrError');
            } else {
                document.getElementById('area_of_interestError').style.display = 'none';
            }


            if (skills === '') {
                document.getElementById('skillsError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('skills', 'skillsError');
            } else {
                document.getElementById('skillsError').style.display = 'none';
            }

            if(area_of_interest === 'others'){
                if (otherarea_of_interest === '') {
                document.getElementById('otherarea_of_interestError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('otherarea_of_interest', 'otherarea_of_interestError');
                } else {
                document.getElementById('otherarea_of_interestError').style.display = 'none';
                }
            }


            if (resume === '') {
            // Display error for empty resume
            // document.getElementById('resumeError').innerText = 'Please upload a resume.';
            // document.getElementById('resumeError').style.display = 'block';
            // isValid = false;
            // hideErrorMessageOnFocus('resume', 'resumeError');
            document.getElementById('resumeError').style.display = 'none';
            } else {
            // Validate file type
            var allowedExtensions = ['.pdf'];
            var fileExtension = resume.substring(resume.lastIndexOf('.')).toLowerCase();
            if (allowedExtensions.indexOf(fileExtension) === -1) {
                // Display error for invalid file type
                document.getElementById('resumeError').innerText = 'Invalid file type. Only PDF files are allowed.';
                document.getElementById('resumeError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('resume', 'resumeError');
            } else {
                // Retrieve file input element
                var fileInput = document.getElementById('resume');
                // Check if files are selected
                if (fileInput.files && fileInput.files.length > 0) {
                var uploadedFile = fileInput.files[0];
                var fileSizeInBytes = uploadedFile.size; // Get the file size in bytes

                // Validate file size
                var maxSizeInBytes = 250 * 1024; // 250KB
                if (fileSizeInBytes > maxSizeInBytes) {
                    // Display error for file size exceeding the limit
                    document.getElementById('resumeError').innerText = 'File size exceeds the maximum limit of 250KB.';
                    document.getElementById('resumeError').style.display = 'block';
                    isValid = false;
                    hideErrorMessageOnFocus('resume', 'resumeError');
                } else {
                    // File is valid, hide error message
                    document.getElementById('resumeError').style.display = 'none';
                }
                }
            }
            }


            console.log(isValid);
            // isValid = true;
            return isValid;
        }

        document.getElementById('editForm').addEventListener('submit', function (event) {
        event.preventDefault();

        var isValid = validateForm();
        if (isValid) {
            this.submit();
        }
        });


        function calculateAgeAndFillAgeField() {
            var dobInput = document.getElementById('dob');
            var ageInput = document.getElementById('age');

            var dob = dobInput.value;
            if (dob) {
            var currentDate = new Date();
            var inputDate = new Date(dob);

            var ageDiff = currentDate.getFullYear() - inputDate.getFullYear();
            var monthDiff = currentDate.getMonth() - inputDate.getMonth();
            if (monthDiff < 0 || (monthDiff === 0 && currentDate.getDate() < inputDate.getDate())) {
                ageDiff--;
            }

            ageInput.value = ageDiff;
            } else {
            ageInput.value = '';
            }
        }

        var dobInput = document.getElementById('dob');
        dobInput.addEventListener('input', calculateAgeAndFillAgeField);
    </script>



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
            closePopup();
        }
    }

    function closePopup() {
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
  {{-- <script src="{{asset('asset/js/dropdown.js')}}"></script> --}}

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" ></script>

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
