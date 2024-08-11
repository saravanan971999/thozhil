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
                            <a class="nav-link" href="{{url('registered_applications')}}">Internship / Jobs</a>
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
             <li class="nav-item">
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
            </li>
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
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                {{-- <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                    </div>
                </div> --}}
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{url('logout')}}" class="nav-link text-white font-weight-bold px-0">
                            <i class="fa fa-user me-sm-1"></i>
                            <span class="d-sm-inline d-none">Logout</span>
                        </a>
                    </li>
                    {{-- <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item px-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0">
                            <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <!-- End Navbar -->



<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Rejected companies</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Si No</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Company Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Company Type</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Registration Number</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Year of Founding</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobile</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">City</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">State</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pincode</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    <!-- <th class="text-secondary opacity-7"></th> -->
                  </tr>
                </thead>
                <tbody>
                  <!-- Add rows for each company -->
                  <tr>
                      <td>
                          <p class="text-xs font-weight-bold mb-0 text-center">1</p>
                      </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-center">Company A</p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-center">Type A</p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-center">123456789</p>
                    </td>
                    <td class="align-middle text-center text-center">
                      <span class="text-secondary text-xs font-weight-bold">2000</span>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-center">companyA@example.com</p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-center">1234567890</p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-center">City A</p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-center">State A</p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0 text-center">ABCDE</p>
                    </td>
                    <td>
                      <div class="d-flex justify-content-center">
                          <button class="btn btn-success btn-sm me-2">Approve</button>
                          <!-- <button class="btn btn-danger btn-sm">Decline</button> -->
                      </div>
                  </td>

                  </tr>
                  <!-- Add more rows for additional companies as needed -->
                </tbody>
              </table>

            </div>
          </div>
        </div>
      </div>
    </div>


</div>


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
