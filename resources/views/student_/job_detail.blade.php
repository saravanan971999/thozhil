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
                    <!-- <a href="index.html" class="nav-item nav-link active">Home</a> -->
                    <a href="all_jobs.html" class="nav-item nav-link active">Jobs</a>
                    <a href="all_intern.html" class="nav-item nav-link active">Internship</a>

                    <!-- Profile Dropdown -->
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="my_profile.html">My Profile</a>
                            <!-- <a class="dropdown-item" href="#">View Applications</a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="stu_dashboard.html">Logout</a>
                        </div>
                    </div>
                    <!-- End Profile Dropdown -->

                </div>
            </div>
        </nav>

        <!-- Navbar End -->


        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h3 class="display-3 text-white mb-3 animated slideInDown">Job<span style="color: rgb(14, 236, 214);"> Detail </span></h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        <div class="d-flex align-items-center mb-5">
                            <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-2.jpg" alt="" style="width: 80px; height: 80px;">
                            <div class="text-start ps-4">
                                <h3 class="mb-3">{{$int->job_title}}</h3>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$int->city}}</span>
                                {{-- <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span> --}}
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>₹{{$int->salary_package}}</span>
                            </div>
                        </div>

                        <div class="mb-5">
                            <h4 class="mb-3">Job description</h4>
                            <p>{{$int->job_description}}</p>
                            {{-- <h4 class="mb-3">Responsibility</h4>
                            <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                            </ul> --}}
                            <h4 class="mb-3">Qualifications</h4>
                            <p>{{$int->required_skills}}</p>
                            {{-- <ul class="list-unstyled">
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Dolor justo tempor duo ipsum accusam</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                                <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                            </ul> --}}
                            <div class="col-12">
                                @if ($apply)
                                    <button class="btn btn-success w-25">Applied</button>
                                @else
                                    <a href="{{url('/candidate/job_application_form/'.$int->job_id)}}"><button class="btn btn-primary w-25" type="submit">Apply Now</button></a>
                                @endif
                            </div>

                        </div>
                            </div>

                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Job Summery</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{Carbon\Carbon::parse($int->created_at)->format('d-m-Y')}}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{$int->total_vacancies}} Position</p>
                            {{-- <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: Full Time</p> --}}
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: ₹{{$int->salary_package}}</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{$int->state .", ". $int->country}}</p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>End Date: {{Carbon\Carbon::parse($int->application_deadline)->format('d-m-Y')}}</p>
                        </div>
                        {{-- <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Company Detail</h4>
                            <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->


        <!-- Footer Start -->
        <section class="site-footer mt-5" style="background-color: rgb(16, 72, 66); padding-top: 20px; padding-bottom: 20px;">
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
             <div class="col-lg-3 col-12 text-center mb-5 text-white">
                <h2 class="text-white">Follow Us</h2>
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
   @include('layouts.student_footer')
</body>

</html>
