<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset/admin/img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{ asset('asset/admin/img/favicon.png')}}"> -->
  <title>
    Admin-Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('asset/admin/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('asset/admin/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js"></script>
  <link href="{{asset('asset/admin/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('asset/admin/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
  <style>
    .navbar-nav .nav-item:hover {
    background-color: #f8f9fa; /* Change the background color as needed */
  }

  .navbar-nav .nav-link:hover {
    color: #343a40; /* Change the text color as needed */
  }

  /* Sub Sidebar Hover Effect */
  .navbar-nav .nav-item .collapse.show a:hover {
    background-color: #e9ecef; /* Change the background color as needed for sub-sidebar */
    color: #495057; /* Change the text color as needed for sub-sidebar */
  }

  /* Sub Sidebar Subheading Hover Effect */
  .navbar-nav .nav-item .collapse.show .nav-item:hover {
    background-color: #dee2e6; /* Change the background color as needed for sub-sub-sidebar */
  }

  .navbar-nav .nav-item .collapse.show .nav-link:hover {
    color: #495057; /* Change the text color as needed for sub-sub-sidebar */
  }
  </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{url('admin')}}" target="_blank">
        <!-- <img src="./assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> -->
        <span class="ms-1 font-weight-bold">Dashboard</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="{{url('admin')}}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            <!-- Adding some space -->
            <li class="nav-item heading-gap">
                <hr class="dropdown-divider">
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#companiesDropdown" aria-expanded="false">
                    <i class="fas fa-building"></i> Companies
                </a>
                <div class="collapse" id="companiesDropdown">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('app_company')}}">Manage Applications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('approved_companies')}}">Approved Applications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('rejected_companies')}}">Rejected Applications</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Adding some space -->
            <li class="nav-item heading-gap">
                <hr class="dropdown-divider">
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#candidatesDropdown" aria-expanded="false">
                    <i class="fas fa-users"></i> Candidates
                </a>
                <div class="collapse" id="candidatesDropdown">
                    <ul class="nav flex-column ms-3">
                     <li class="nav-item">
                            <a class="nav-link" href="{{url('registered_paid_candidates')}}">Paid candidates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('registered_unpaid_candidates')}}">Unpaid candidates</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('registered_app_interns')}}">Internship </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('registered_app_jobs')}}">Jobs</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Adding some space -->
            <li class="nav-item heading-gap">
                <hr class="dropdown-divider">
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#notificationsDropdown" aria-expanded="false">
                    <i class="fas fa-bell"></i> Notifications
                </a>
                <div class="collapse" id="notificationsDropdown">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('ad_email')}}">Email</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Adding some space -->
            <li class="nav-item heading-gap">
                <hr class="dropdown-divider">
            </li>
             {{-- <li class="nav-item">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#financeDropdown" aria-expanded="false">
                    <i class="fas fa-money-bill-wave"></i> Finance
                </a>
                <div class="collapse" id="financeDropdown">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="billing.html">Billing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="expenses.html">Expenses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="revenue.html">Revenue</a>
                        </li>
                    </ul>
                </div>
            </li> --}}
        </ul>



    {{-- <div class="sidenav-footer mx-3 ">
      <div class="card card-plain shadow-none" id="sidenavCard">
        <img class="w-50 mx-auto" src="{{asset('asset/admin/img/illustrations/icon-documentation.svg')}}" alt="sidebar_illustration">
        <div class="card-body text-center p-3 w-100 pt-0">
          <div class="docs-info">
            <h6 class="mb-0">Settings</h6>
            <p class="text-xs font-weight-bold mb-0">Please check our docs</p>
          </div>
        </div>
      </div>
      <a href="settings.html" target="_blank" class="btn btn-dark btn-sm w-100 mb-3">Settings</a>
      <a class="btn btn-primary btn-sm mb-0 w-100" href="feedback.html" type="button">Feedback</a>
    </div> --}}

  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl overflow-hidden" id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <!-- <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li> -->
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Admin Dashboard</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <!-- <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here..."> -->
                    </div>
                </div> 
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{url('logout')}}" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Logout</span>
                        </a>
                    </li>
                     <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li> 
                     <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->



    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card h-100">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                    <a href="{{url('registered_candidates')}}">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Registered Candidates</p>
                            <h5 class="font-weight-bolder">
                                {{$user}}
                            </h5>
                            <p class="mb-0">
                              <!-- <span class="text-success text-sm font-weight-bolder">+55%</span> -->
                              since yesterday
                            </p>
                          </div>
                    </a>

                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card h-100">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                    <a href="{{url('registered_companies')}}">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Registered Companies</p>
                            <h5 class="font-weight-bolder">
                                {{$employer}}
                            </h5>
                            <p class="mb-0">
                              <!-- <span class="text-success text-sm font-weight-bolder">+3%</span> -->
                              since last week
                            </p>
                          </div>
                    </a>

                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="fas fa-briefcase text-lg opacity-10"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card h-100">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                    <a href="{{url('active_internships')}}">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Active<br> Internship</p>
                            <h5 class="font-weight-bolder">
                                {{$act_int}}
                            </h5>
                            <p class="mb-0">
                              <!-- <span class="text-danger text-sm font-weight-bolder">-2%</span> -->
                              since yesterday
                            </p>
                        </div>
                    </a>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6">
          <div class="card h-100">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                    <a href="{{url('active_jobs')}}">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Active<br> Jobs</p>
                            <h5 class="font-weight-bolder">
                                {{$act_job}}
                            </h5>
                            <p class="mb-0">
                               Since Yesterday
                            </p>
                          </div>
                    </a>

                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="fas fa-briefcase text-lg opacity-10"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Companies Overview</h6>
              <!-- <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">4% more</span> in 2021
              </p> -->
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card card-carousel overflow-hidden h-100 p-0">
            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <div class="carousel-item h-100 active" style="background-image: url('{{asset('asset/admin/img/image1.jpg')}}');
       background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-camera-compact text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-dark mb-1">Get started with Thozhil</h5>
                    <p class="text-dark">There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('{{asset('asset/admin/img/image2.jpg')}}');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-dark mb-1">Faster way to get Job</h5>
                    <p class="text-dark">That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('{{asset('asset/admin/img/image3.jpg')}}');
      background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-dark mb-1">Share with us your design tips!</h5>
                    <p class="text-dark">Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Recently Registered Companies </h6>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Company Name</p>
                          {{-- <h6 class="text-sm mb-0">OneYes</h6> --}}
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Registration Number</p>
                        {{-- <h6 class="text-sm mb-0">22334455</h6> --}}
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Registered Date</p>
                        {{-- <h6 class="text-sm mb-0">30.12.2023</h6> --}}
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <p class="text-xs font-weight-bold mb-0">Phone Number</p>
                        {{-- <h6 class="text-sm mb-0">6368142699</h6> --}}
                      </div>
                    </td>
                  </tr>

                  @foreach ($jobb as $jj)
<tr>
    <td class="w-30">
      <div class="d-flex px-2 py-1 align-items-center">
        <div class="ms-4">
          {{-- <p class="text-xs font-weight-bold mb-0">Company Name</p> --}}
          <h6 class="text-sm mb-0">{{$jj->company_name}}</h6>
        </div>
      </div>
    </td>
    <td>
      <div class="text-center">
        {{-- <p class="text-xs font-weight-bold mb-0">Registration Number</p> --}}
        <h6 class="text-sm mb-0">{{$jj->registration_no}}</h6>
      </div>
    </td>
    <td>
      <div class="text-center">
        {{-- <p class="text-xs font-weight-bold mb-0">Registered Date</p> --}}
        <h6 class="text-sm mb-0">{{$jj->created_at}}</h6>
      </div>
    </td>
    <td class="align-middle text-sm">
      <div class="col text-center">
        {{-- <p class="text-xs font-weight-bold mb-0">Phone Number</p> --}}
        <h6 class="text-sm mb-0">{{$jj->phone}}</h6>
      </div>
    </td>
  </tr>
@endforeach



                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-lg-5">
            <div class="card">
              <div class="card-header pb-0 p-3">
                <h6 class="mb-0">Categories</h6>
              </div>
              <div class="card-body p-3">
                <ul class="list-group">

                  <a href="{{url('total_posted_internships')}}" class="numbers text-decoration-none">
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                          <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                              <i class="fas fa-briefcase text-white opacity-10"></i>
                          </div>
                          <div class="d-flex flex-column">
                              <h6 class="mb-1 text-dark text-sm">Total Posted Internship</h6>
                              <span class="text-xs"> {{$int}} </span>
                          </div>
                      </div>
                      <div class="d-flex">
                          <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                              <i class="ni ni-bold-right" aria-hidden="true"></i>
                          </button>
                      </div>
                  </li>
                </a>


                  <a href="{{url('total_posted_jobs')}}" class="numbers text-decoration-none">
                  <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                      <div class="d-flex align-items-center">
                          <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                              <i class="fas fa-briefcase text-white opacity-10"></i>
                          </div>
                          <div class="d-flex flex-column">
                              <h6 class="mb-1 text-dark text-sm">Total Posted Jobs</h6>
                              <span class="text-xs">{{$job}}</span>
                          </div>
                      </div>
                      <div class="d-flex">
                          <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto">
                              <i class="ni ni-bold-right" aria-hidden="true"></i>
                          </button>
                      </div>
                  </li>
                  </a>
                </ul>
              </div>
            </div>
          </div>
      </div>


    </div>
  </main>

  <!--   Core JS Files   -->
  <script src="{{ asset('asset/admin/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('asset/admin/js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('asset/admin/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('asset/admin/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{ asset('asset/admin/js/plugins/chartjs.min.js')}}"></script>
  <script src="{{asset('asset/admin/js/argon-dashboard.min.js?v=2.0.4')}}"></script>

  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
</body>

</html>
