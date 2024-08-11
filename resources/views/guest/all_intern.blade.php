<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title> Job </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('asset/job_intern/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('asset/job_intern/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
   <link href="{{ asset('asset/job_intern/css/bootstrap.min.css')}}" rel="stylesheet">


   <style>
    .navbar{
    box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
}
.navbar-nav .nav-link:hover {
    color: orange; /* Change the color to your desired hover color */
}
.navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .show>.nav-link{
    background: -webkit-linear-gradient(rgb(14, 236, 214));
    -webkit-text-fill-color: transparent;

}

.filter-container {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add box shadow */
            padding: 20px;
            border-radius: 8px; /* Optional: Add border-radius for rounded corners */
        }
        .filter-container label,
        .filter-container select,
        .filter-container input,
        .filter-container button {
            margin-bottom: 10px;
        }

.container
        {
            display: flex;
            justify-content: space-between;
            align-items: flex-start; /* Align items at the start of the cross axis */
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
            /* margin-top: 50px; */
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
        }
.search-alert-form {
    display: grid;
    grid-gap: 15px;
}

label {
    font-weight: bold;
}

input, select {
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    margin-top: 5px;
}

button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #45a049;}


   </style>

    <!-- Template Stylesheet -->
    <link href="{{ asset('asset/job_intern/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


  <body data-bs-spy="scroll" data-bs-target=".navbar">
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
            <h3>Thozhil</h3>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Jobs</a>
                <a href="all_jobs.html" class="nav-item nav-link active">Internship</a>

                <!-- Add the profile dropdown -->
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="index.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="img/3.jpeg" alt="Profile Photo" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                    </a>
                </div>
            </div>
        </div>
    </nav>
<br><br>
        <!-- Carousel Start -->
        <div class="container-fluid p-0">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('asset/job_intern/img/index.webp')}}" alt="">
                    <div class="position-absolute top-0 start-0 w-80 h-70 d-flex align-items-center">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">Dreams Don't Work Unless You Do.</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                    <a href="all_jobs.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Internship</a>
                                    <!-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="{{ asset('asset/job_intern/img/index2.jpg')}}" alt="">
                    <div class="position-absolute top-0 start-0 w-80 h-70 d-flex align-items-center" style="background: rgba(16, 72, 66, 0.374);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-3 text-white animated slideInDown mb-4">"Chasing Dreams,One Internship At A Time"</h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                    <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Search A Job</a>
                                    <!-- <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Find A Talent</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-3 mt-4">
                <div class="filter-container">
                    <h2>Filters</h2>

                    <label for="profile">Skills</label>
                    <select id="profile" name="profile">
                        <option value="marketing">Marketing</option>
                        <option value="engineering">Engineering</option>
                        <option value="design">Design</option>
                        <!-- Add more options as needed -->
                    </select>
                    <label for="location">Location</label>
                    <select id="location" name="location">
                        <option value="delhi">Delhi</option>
                        <option value="mumbai">Mumbai</option>
                        <option value="bangalore">Bangalore</option>
                        <!-- Add more options as needed -->
                    </select>

                    <!-- <label for="work-from-home">Work from home</label>
                    <input type="checkbox" id="work-from-home" name="work-from-home">

                    <label for="part-time">Part-time</label>
                    <input type="checkbox" id="part-time" name="part-time"> -->

                    <label for="stipend">Desired minimum monthly stipend (₹)</label>
                    <select id="stipend" name="stipend">
                        <option value="0">0</option>
                        <option value="2000">2K</option>
                        <option value="4000">4K</option>
                        <option value="6000">6K</option>
                        <option value="8000">8K</option>
                        <option value="10000">10K</option>
                    </select>

                    <label for="starting-date">Starting from (or after)</label>
                    <input type="date" id="starting-date" name="starting-date">

                    <label for="max-duration">Max. duration (months)</label>
                    <input type="number" id="max-duration" name="max-duration" min="1" max="12">

        <br>
                    <button>Clear all</button>
                </div>
                </div>

                <div class="col-md-9 mt-4">
                    <h2>Latest Internship</h2>

                    <!-- Example Card -->
                    <div class="card mb-4">
                        <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="card-title mb-0">Software Engineer</h5>
                                    </div>
                                    <p class="card-text">
                                        Location: Rewa, INDIA<br>
                                        Type: Full Time<br>
                                        Salary: $123 - $456
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <div class="small-box text-md-right">
                                        <a href="#" class="btn btn-primary">Apply Now</a>
                                        <br>
                                        <small class="text-muted">Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="card-title mb-0">Software Engineer</h5>
                                    </div>
                                    <p class="card-text">
                                        Location: Rewa, INDIA<br>
                                        Type: Full Time<br>
                                        Salary: $123 - $456
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <div class="small-box text-md-right">
                                        <a href="#" class="btn btn-primary">Apply Now</a>
                                        <br>
                                        <small class="text-muted">Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="card-title mb-0">Software Engineer</h5>
                                    </div>
                                    <p class="card-text">
                                        Location: Rewa, INDIA<br>
                                        Type: Full Time<br>
                                        Salary: $123 - $456
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <div class="small-box text-md-right">
                                        <a href="#" class="btn btn-primary">Apply Now</a>
                                        <br>
                                        <small class="text-muted">Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="card-title mb-0">Software Engineer</h5>
                                    </div>
                                    <p class="card-text">
                                        Location: Rewa, INDIA<br>
                                        Type: Full Time<br>
                                        Salary: $123 - $456
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <div class="small-box text-md-right">
                                        <a href="#" class="btn btn-primary">Apply Now</a>
                                        <br>
                                        <small class="text-muted">Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <!-- <img src="img/com-logo-1.jpg" class="card-img-top" alt="Company Logo"> -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <h5 class="card-title mb-0">Software Engineer</h5>
                                    </div>
                                    <p class="card-text">
                                        Location: Rewa, INDIA<br>
                                        Type: Full Time<br>
                                        Salary: $123 - $456
                                    </p>
                                </div>
                                <div class="col-md-4">
                                    <div class="small-box text-md-right">
                                        <a href="#" class="btn btn-primary">Apply Now</a>
                                        <br>
                                        <small class="text-muted">Date Line: 01 Jan, 2045</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>


        <section class="site-footer mt-4" style="background-color: rgb(16, 72, 66); padding-top: 20px; padding-bottom: 20px;">
            <div class="container mx-auto row col-lg-12">
                 <!-- Left Side Content -->
                 <div class="container col-lg-6 col-12">
                    <div class="justify-content-center align-items-center">
                        <div class="col-md-12 mb-4 text-left"> <!-- Updated to text-left class -->
                            <h1 class="heading text-white">
                                Thozhil<br> <span style="color: rgb(14, 236, 214)"> </span>
                            </h1>
                        </div>
                        <div class="col-md-12 text-left"> <!-- Updated to text-left class -->
                            <form action="" method="POST">
                                <div class="flex-column">
                                    <div class="col-md-10 mb-4">
                                        <input type="text" class="form-control" placeholder="Please Enter Your Email">
                                    </div>
                        <div class="col-md-10 mb-4">
                            <select class="form-control">
                                <option value="" disabled selected>Please Select Your Newsletter Type</option>
                                <option value="daily">Daily Newsletter</option>
                                <option value="weekly">Weekly Newsletter</option>
                                <option value="monthly">Monthly Newsletter</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <input type="submit" class="btn btn-secondary w-100 h-55" value="Subscribe">
                        </div>
                    </div>
                </form>
            </div>

            <!-- Social Media Icons -->
        </div>
        </div>

                    <!-- Right Side Content -->
            <div class="container col-12 col-lg-6">
                <div class="d-lg-flex mx-auto justify-content-center mb-5">
                    <div class="col-lg-3 col-12 text-center text-white mb-5">
                        <h2 class="text-white">Quick Links</h2>
                            <ul class="list-unstyled footer-link text-white">
                                <li><a href="#"><span style="color: #fff">Internship</span></a></li>
                                <li><a href="#"><span style="color: #fff">Jobs</span></a></li>
                            </ul>
                    </div>

            <div class="col-lg-3 col-12 text-center text-white mb-5">
                <h2 class="text-white">To Know More</h2>
                    <ul class="list-unstyled footer-link">
                        <li><a href="#"><span style="color: #fff">Our Mission</span></a></li>
                        <li><a href="#"><span style="color: #fff">Our Vision</span></a></li>
                        <li><a href="#"><span style="color: #fff">Contact Us</span></a></li>
                    </ul>
            </div>
            <div class="col-lg-3 col-12 text-center mb-5 text-white ms-auto">
                <!-- <h2 class="text-white">Our Social Media</h2> -->
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-linkedin"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="text-white"><i class="fab fa-youtube"></i></a></li>
                </ul>
        </div>

        </div>
        </div>
        </div>
        <hr>
        <!-- Copyright Content -->
        <div class="container text-center text-white">
            <p>&copy; 2023 OneYes. All rights reserved.</p>
            </div>
        </section>




    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('asset/job_intern/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('asset/job_intern/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('asset/job_intern/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('asset/job_intern/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('asset/job_intern/js/main.js')}}"></script>
</body>

</html>
