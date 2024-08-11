<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobEntry - Job Portal Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

@include('layouts.student_header')
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


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h3>Thozhil<br> <span></span></h3>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="all_jobs.html" class="nav-item nav-link active">Jobs</a>
                    <a href="all_intern.html" class="nav-item nav-link active">Internship</a>

                    <!-- Add the profile dropdown -->
                    <div class="nav-item dropdown">
                        <a class="" href="#" id="" role="" data-toggle="" aria-haspopup="" aria-expanded="">
                            <img src="profile.jpeg" alt="Profile Photo" class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="my_profile.html">Profile</a>
                            <a class="dropdown-item" href="edit_profile.html">Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->

        <div class="container mt-5">
            <div class="row">
                <!-- Job Card 1 -->
                @foreach ($jobs as $in)
                    <div class="col-md-4 mb-4">
                        <div class="card style_card">
                            <img src="./img/img1.svg" class="card-logo style_card_logo" alt="Logo">
                            <div class="card-body mt-5">
                                <h5 class="card-title">{{$in->job_title}}</h5>
                                <p class="card-text">{{$in->company_name}}</p>
                                <div>
                                    <!-- <a href="#" class="btn btn-apply-now">Apply Now</a> -->
                                    <a href="{{url('/candidate/job_detail',["id"=> $in->job_id])}}" class="btn btn-view-more">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>




                {{ $jobs->links() }}


        <!-- Jobs Start -->



        <!-- Footer Start -->
        <section class="site-footer mt-4" style="background-color: #4b8ef1; padding-top: 20px; padding-bottom: 20px;">
            <div class="container mx-auto row col-lg-12">
                 <!-- Left Side Content -->
                 <div class="container col-lg-6 col-12">
                    <div class="justify-content-center align-items-center">
                        <div class="col-md-12 mb-4 text-left"> <!-- Updated to text-left class -->
                            <h1 class="heading text-white">
                                Thozhil<br> <span style="color: rgb(29, 31, 30)"> </span>
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
                            <input type="submit" class="btn btn-secondary w-50 h-55" style="background-color: black;" value="Subscribe">
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
                        <h4 class="text-white">Useful Links</h4>
                            <ul class="list-unstyled footer-link text-white">
                                <li><a href="#"><span style="color: #fff">Home</span></a></li>
                                <li><a href="#"><span style="color: #fff">Jobs</span></a></li>
                                <li><a href="#"><span style="color: #fff">Internships</span></a></li>
                                <li><a href="#"><span style="color: #fff">Contact Us</span></a></li>
                            </ul>
                    </div>

            <div class="col-lg-3 col-12 text-center text-white mb-5">
                <h4 class="text-white">About Us</h4>
                    <ul class="list-unstyled footer-link">
                        <li><a href="#"><span style="color: #fff">Our Mission</span></a></li>
                        <li><a href="#"><span style="color: #fff">Our Vision</span></a></li>
                        <li><a href="#"><span style="color: #fff">How It Works</span></a></li>
                        <li><a href="#"><span style="color: #fff">FAQ</span></a></li>
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
            <p> Developed By <a href="https://oneyesinfotechsolutions.com/">Oneyes Infotech Solutions</a> <br> Copyright © 2023 Thozhil. All Rights Reserved.

            </div>
        </section>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('layouts.student_footer')
</body>

</html>
