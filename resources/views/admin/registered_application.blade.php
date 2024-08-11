<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Dashboard
  </title>  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('asset/admin/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{ asset('asset/admin/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js"></script>
  <link href="{{asset('asset/admin/css/nucleo-svg.css')}}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('asset/admin/css/argon-dashboard.css?v=2.0.4')}}" rel="stylesheet" />
 <style>
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
  </style>
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
      <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="index.html" target="_blank">
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
                              <a class="nav-link" href="{{url('registered_company')}}">View Applications</a>
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
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Students application table</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Si no</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Application Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">First Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Last Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date of Birth</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Age</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gender</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact Number</th>
                      {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Address</th> --}}
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qualification</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Degree</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Major Subject</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Graduation Year</th>

                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Resume</th>
                    </tr>

                  </thead>
                  <tbody>
@php
    $r=1;
@endphp
@foreach ($con as $c)
<tr>
    <td class="text-center">{{$r++}}</td>
    <td class="text-center">{{$c->type}}</td>
  <td class="text-center">
    @if ($c->status ==  1)
        Approved
    @elseif ($c->status ==  2)
        Rejected
    @else
        Pending
    @endif
</td>
  <td class="text-center">{{$c->first_name}}</td>
  <td class="text-center">{{$c->last_name}}</td>
  <td class="text-center">{{$c->dob}}</td>
  <td class="text-center">{{$c->age}}</td>
  <td class="text-center">{{$c->gender}}</td>
  <td class="text-center">{{$c->email}}</td>
  <td class="text-center">{{$c->phone}}</td>
  {{-- <td class="text-center">{{$c->first_name}}</td> --}}
  <td class="text-center">{{$c->qualification}}</td>
  <td class="text-center">{{$c->degree}}</td>
  <td class="text-center">{{$c->major_subject}}</td>
  <td class="text-center">{{$c->passed_out_year}}</td>

<td>
    <button class="btn btn-danger btn-sm" id="resumeID" value="{{urlencode($c->resume)}}" onclick="view()" >View</button>

</td>
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

                           </script></tr>
@endforeach



                  </tbody>
                </table>

              </div>
            </div>
            <div id="resume-view"></div>
          </div>
        </div>
      </div>


    </div>
  </main>
  <script src="{{ asset('asset/admin/js/core/popper.min.js')}}"></script>
  <script src="{{ asset('asset/admin/js/core/bootstrap.min.js')}}"></script>
  <script src="{{ asset('asset/admin/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{ asset('asset/admin/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{ asset('asset/admin/js/plugins/chartjs.min.js')}}"></script>
  <script src="{{asset('asset/admin/js/argon-dashboard.min.js?v=2.0.4')}}"></script>
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
