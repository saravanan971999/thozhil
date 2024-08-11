
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('asset\css\loginform.css') }}">
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
            background-color: rgb(16, 134, 0);
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
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
                        <a class="dropdown-item" href="{{url('student-dashboard')}}">Profile</a>
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
    <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>
    <div class="form-box login">
        {{-- @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif --}}
@include('layouts.alert')
        <h2 class="animation" style="--i:0; --j:22;">Login</h2>
        <form id="loginForm" action="{{url('log_in')}}" method="POST" >
            @csrf
            <div class="input-box animation" style="--i:1; --j:23;">
                <input type="email" id="username" name="username">
                <label for="username">Email</label>
                <span id="usernameError" class="error"></span>
            </div><br><br>
            <div class="input-box animation" style="--i:2; --j:24;">
                <input type="password" id="password" name="password">
                <label for="password">Password</label>
                <span id="passwordError" class="error"></span>
            </div><br><br>
            <button type="submit" class="btn animation" style="--i:3; --j:25;">Login</button>
            <div class="logreg-link animation" style="--i:4; --j:26">
                <p>Don't have an account? <a href="#"
                    class="register-link">Sign Up</a></p>
            </div>
        </form>
    </div>
    {{-- <script>
        const form = document.getElementById('loginForm');
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const usernameError = document.getElementById('usernameError');
        const passwordError = document.getElementById('passwordError');

        form.addEventListener('submit', function(event) {
            let valid = true;
            usernameError.textContent = '';
            passwordError.textContent = '';

            // Check if username is empty
            if (usernameInput.value.trim() === '') {
                usernameError.textContent = 'Please enter your registered Email Id';
                valid = false;
            }

            // Check if password is empty
            if (passwordInput.value.trim() === '') {
                passwordError.textContent = 'Please enter a password';
                valid = false;
            } else {
                // Validate password strength (minimum 8 characters including uppercase, lowercase, number, and special character)
                const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
                if (!passwordRegex.test(passwordInput.value)) {
                    passwordError.textContent = 'Password should contain at least 8 characters including uppercase, lowercase, number, and special character';
                    valid = false;
                }
            }

            if (!valid) {
                event.preventDefault(); // Prevent form submission if validation fails
                // alert('Please fill in the required fields correctly.');
            }
        });
    </script> --}}


    <div class="info-text login">
        <h3 class="animation" style="--i:0; --j:20;">Welcome Back to!</h3>
        <h2 class="animation" style="--i:1; --j:21;">Thozhil</h2>
    </div>

    <div class="form-box registration">
        <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
        <form action="{{url('instant_register')}}" id="signup" method="POST">
            @csrf
            <div class="input-box animation" style="--i:18; --j:1;">
                <input type="text" id="fullName" name="fullName">
                <label for="fullname">Username</label>
                <span id="fullnameError" class="error"></span>
            </div>
            <div class="input-box animation" style="--i:19; --j:2;">
                <input type="email" id="email" name="Email">
                <label for="email">Email Address</label>
                <span id="emailError" class="error"></span>
            </div>
           <!-- <div class="input-box animation" style="--i:20; --j:3;">
                <input type="text">
                <label for="mobile">Mobile Number</label>
            </div>-->
            <div class="input-box animation" style="--i:21; --j:4;">
                <input type="password" id="password" name="passWord">
                <label for="password">Password</label>
                <span id="passwordERror" class="error"></span>
            </div>

            <div class="input-box animation" style="--i:21; --j:4;">
                <input type="password" id="Cpassword" name="CpassWord">
                <label for="Cpassword">Confirm Password</label>
                <span id="CpasswordError" class="error"></span>
            </div>

            <div class="input-box animation" style="--i:21; --j:4;">
                <select id="register_as" name="register_as">
                    <option value="">Register As</option>
                    <option value="1">Candidate</option>
                    <option value="2">Employer</option>
                    <option value="3">College</option>
                </select>
                <span id="register_asError" class="error"></span>
            </div>
            <button type="submit" class="btn animation" style="--i:22; --j:5;">Sign Up</button>
            <div class="logreg-link animation" style="--i:23; --j:6;">
                <p>Already have an account? <a href="#"
                    class="login-link">Login</a></p>
            </div>
        </form>
    </div>



    <div class="info-text registration">
        <h3 class="animation" style="--i:17; --j:0;">Welcome Back to!</h3>
        <h2 class="animation" style="--i:18; --j:1;">Thozhil</h2>
    </div>
    </div>


 {{-- @include('layouts.footer') --}}
    {{-- <script src="{{ asset('asset\js\loginValidation.js') }}"></script> --}}
    <script>
        const wrapper = document.querySelector('.wrapper');
        const registerLink = document.querySelector('.register-link');
        const loginLink = document.querySelector('.login-link');

        registerLink.onclick = () => {
            wrapper.classList.add('active')
        }

        loginLink.onclick = () => {
            wrapper.classList.remove('active')
        }

        </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>
