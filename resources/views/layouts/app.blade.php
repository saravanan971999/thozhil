<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid" style="background-color: rgb(16, 72, 66);">
      <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto" >


            @if(Session::has('user_id'))
            <p style="color: white;" > {{ Session::get('full_name') }}</p>
            <div class="nav-item dropdown"  >
                <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('asset/site-images/p1.webp')}}" alt="Your Profile" width="30" class="rounded-circle" style="margin-right: 30px;">
                    <!-- <span class="navbar-toggler-icon" style="margin-right: 30px;"></span> -->
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="transform: translateX(-50px);">
                    <a class="dropdown-item" href="{{url('student_dashboard')}}">Profile</a>
                    <a class="dropdown-item" href="#">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                </div>
            </div>
            @elseif (Session::has('employer_id'))
            <h5 style="color: white;" > {{ session('full_name') }}</h5>
            <div class="nav-item dropdown"  >
                <a class="nav-link dropdown-toggle p-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('asset/site-images/p1.webp')}}" alt="Your Profile" width="30" class="rounded-circle" style="margin-right: 30px;">
                    <!-- <span class="navbar-toggler-icon" style="margin-right: 30px;"></span> -->
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="transform: translateX(-50px);">
                    <a class="dropdown-item" href="{{url('employer_dashboard')}}">Profile</a>
                    <a class="dropdown-item" href="#">Dashboard</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('logout')}}">Logout</a>
                </div>
            </div>
            @else
            <li class="nav-item">
                <a class="nav-link text-white" href="{{url('login_register')}}">Login / Register</a>
            </li>
            @endif


          </ul>
      </div>
    </div>
  </nav>




<br><br>








  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
      <img src="{{asset('asset/site-images/image1.jpg')}}" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Thozhil <br><span style="color: rgb(14, 236, 214);"></span>
    </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
        <a class="nav-link" href="{{url('jobs')}}">Jobs</a>
        <a class="nav-link" href="{{url('internships')}}">Internship</a>
        <a class="nav-link" href="{{url('how_it_works')}}">How It Works</a>
        <a class="nav-link" href="#">FAQ</a>
          <!-- <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a> -->
        </div>
      </div>
    </div>
  </nav>










<!-- <home -->



