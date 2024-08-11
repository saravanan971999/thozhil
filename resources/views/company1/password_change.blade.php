<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@include('layouts.company_header')

</head>
<body>

<div class="main-wrapper">

    @include('layouts.company_sidebar')
    @include('layouts.alert')


<div class="page-wrapper">
    <div class="content mt-5">
        <div class="row">
            {{-- @include('layouts.alert') --}}
            <div class="col-lg-12">
                <form class="text-center" id="passForm" method="POST" action="{{ url('/employer/password_change_function')}}" >
                    <!-- Inside the form section -->
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <h3 class="text-center mb-4">Change Password</h3>

                                    @csrf
                                    <div class="mb-3">
                                        <label for="oldPassword" class="form-label">Old Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="oldPassword" name="cPassword">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('oldPassword')">
                                                <i id="oldPasswordToggle" class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <span id="oldPasswordError" class="error-message" style="display: none; color: red; font-size: 0.8em; margin-top: 5px;">Please Enter your Old Password</span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="newPassword" class="form-label">New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="newPassword" name="nPassword">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('newPassword')">
                                                <i id="newPasswordToggle" class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <span id="newPasswordError" class="error-message" style="display: none; color: red; font-size: 0.8em; margin-top: 5px;">Please Enter your New Password</span>
                                    </div>

                                    <div class="mb-3">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                            <button class="btn btn-outline-secondary" type="button" onclick="togglePassword('confirmPassword')">
                                                <i id="confirmPasswordToggle" class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                        <span id="confirmPasswordError" class="error-message" style="display: none; color: red; font-size: 0.8em; margin-top: 5px;">Please Enter your Confirm Password</span>
                                    </div>


                                    <button type="submit" class="btn btn-primary" >Change Password</button>

                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>



@include('layouts.company_footer')
{{-- <script>
		$(function () {
			$('#datetimepicker3').datetimepicker({
				format: 'LT'

			});
		});
	</script> --}}
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

            var strongPasswordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            var isValid = true;

            function validatePassword(password, errorId) {
            if (password === '') {
                document.getElementById(errorId).innerText = 'Please enter a password';
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
            document.getElementById('confirmPasswordError').innerText = 'Please enter your Confirm Password';
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
    function togglePassword(fieldId) {
        var passwordField = document.getElementById(fieldId);
        var toggleButton = document.getElementById(fieldId + 'Toggle');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleButton.className = 'fas fa-eye-slash';
        } else {
            passwordField.type = 'password';
            toggleButton.className = 'fas fa-eye';
        }
    }
</script>

</body>
</html>
