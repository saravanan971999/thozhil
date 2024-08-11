
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Thozhil</title>

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
@if(session('user_id') || session('employer_id'))
    <meta name="user-id" content="{{ session('user_id') ?? '' }}{{ session('employer_id') ?? '' }}">
@endif

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
    transition: 1s;
}
.red-btn{
    border: 1px solid #f44336;
    background: transparent;
    color: #f44336;
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



.card {
          height: 100%; /* Set a fixed height for all cards */
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
         /* padding: 12px 16px; */
         text-align:center;
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


   @media (max-width: 767px) {
        .dropdown-content {
            /* display: none; */
            position: fixed;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            display: block;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    }

</style>

</head>
<body>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65b9ecf28d261e1b5f59cf04/1hlf4b6c0';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

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
            {{-- <h2 class="mt-4">Thozhil</h2> --}}
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
            <div class="dropdown-content text-center">
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
            <div class="dropdown-content text-center">
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
                          {{ ucwords(Session::get('full_name')) }}
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
                          {{ ucwords(Session::get('full_name')) }}
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
