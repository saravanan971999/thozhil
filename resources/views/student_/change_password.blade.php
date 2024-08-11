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

    <br>
    <br>
    <br>

    @include('layouts.student_header')
    <style>
        .card {
            margin-top: 150px;
            margin-left: 100px;
            height: 450px;
        }

        @media only screen and (max-width: 991px) {
            .card {
                margin-left: 20px;
                height: auto;
            }
        }

        @media only screen and (max-width: 575px) {
            .card {
                margin-left: 10px;
                margin-right: 10px;
            }
        }

        /* Adjustments for form inputs */
        input[type="password"] {
            width: 100%;
            padding-right: 40px; /* Adjusted padding for eye icon */
        }

        .input-group-text {
            cursor: pointer;
        }



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

    <div class="container mt-5">
        <div class="row">
            <!-- Column with width 3 -->

            <!-- Column with width 9 -->
            <div class="col-md-5 offset-md-3">
                <div class="card">
                    @include('layouts.alert')
                    <center>
                        <div class="card-header" style="color: black; font-size:24px;">
                            Change Password
                        </div>
                    </center>
                    <div class="card-body">
                        <!-- Change Password Form -->
                        <form class="row g-3" method="POST" action="{{url('/candidate/change_password_form')}}"
                            id="passForm">
                            @csrf
                            <!-- Old Password -->
                            <div class="col-md-12">
                                <label for="oldPassword" class="form-label">Old Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="oldPassword"
                                        name="oldPassword">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye" onclick="togglePassword('oldPassword')"></i>
                                    </span>
                                </div>
                                <span id="oldPasswordError" class="error-message"
                                    style="display: none; color: red; font-size: 0.8em; margin-top: 5px;">Please Enter
                                    your Old Password</span>
                            </div>

                            <!-- New Password -->
                            <div class="col-md-12">
                                <label for="newPassword" class="form-label">New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="newPassword"
                                        name="newPassword">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye" onclick="togglePassword('newPassword')"></i>
                                    </span>
                                </div>
                                <span id="newPasswordError" class="error-message"
                                    style="display: none; color: red; font-size: 0.8em; margin-top: 5px;">Please Enter
                                    your New Password</span>
                            </div>

                            <!-- Confirm New Password -->
                            <div class="col-md-12">
                                <label for="confirmPassword" class="form-label">Confirm New Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="confirmPassword"
                                        name="confirmPassword">
                                    <span class="input-group-text">
                                        <i class="fas fa-eye" onclick="togglePassword('confirmPassword')"></i>
                                    </span>
                                </div>
                                <span id="confirmPasswordError" class="error-message"
                                    style="display: none; color: red; font-size: 0.8em; margin-top: 5px;">Please Enter
                                    your Confirm Password</span>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </div>
                        </form>
                        <!-- End Change Password Form -->
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Function to prevent space key entry in the password fields
        function preventSpaces(event) {
            if (event.keyCode === 32) {
                event.preventDefault();
                return false;
            }
        }

        // Event listener to prevent space key entry for all password fields
        document.querySelectorAll('input[type="password"]').forEach(function (element) {
            element.addEventListener('keypress', preventSpaces);
        });


        function hideErrorMessageOnFocus(inputId, errorId) {
            var inputElement = document.getElementById(inputId);
            var errorElement = document.getElementById(errorId);

            inputElement.addEventListener('focus', function () {
                errorElement.style.display = 'none';
            });
        }

        function validateForm() {
            var oldPassword = document.getElementById('oldPassword').value;
            var newPassword = document.getElementById('newPassword').value;
            var confirmPassword = document.getElementById('confirmPassword').value;

            var strongPasswordRegex = /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;

            var isValid = true;

            function validatePassword(password, errorId) {
                if (password === '') {
                    document.getElementById(errorId).innerText = 'Please  enter a  password';
                    document.getElementById(errorId).style.display = 'block';
                    isValid = false;
                    hideErrorMessageOnFocus(errorId.replace('Error', ''), errorId);
                } else if (!strongPasswordRegex.test(password)) {
                    document.getElementById(errorId).innerText = 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.';
                    document.getElementById(errorId).style.display = 'block';
                    isValid = false;
                    hideErrorMessageOnFocus(errorId.replace('Error', ''), errorId);
                } else {
                    document.getElementById(errorId).style.display = 'none';
                }
            }

            validatePassword(oldPassword, 'oldPasswordError');
            validatePassword(newPassword, 'newPasswordError');

            if (confirmPassword === '') {
                document.getElementById('confirmPasswordError').innerText = 'Please enter your confirm password';
                document.getElementById('confirmPasswordError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('confirmPassword', 'confirmPasswordError');
            } else if (newPassword !== confirmPassword) {
                document.getElementById('confirmPasswordError').innerText = 'Passwords do not match.';
                document.getElementById('confirmPasswordError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('confirmPassword', 'confirmPasswordError');
            } else {
                document.getElementById('confirmPasswordError').style.display = 'none';
            }

            return isValid;
        }

        document.getElementById('passForm').addEventListener('submit', function (event) {
            event.preventDefault();

            var isValid = validateForm();
            if (isValid) {
                this.submit();
            }
        });
    </script>
    <script>
        function togglePassword(inputId) {
            var passwordInput = document.getElementById(inputId);
            var icon = passwordInput.nextElementSibling.querySelector('i');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = "password";
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
    @include('layouts.student_footer')
</body>

</html>