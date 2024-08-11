<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('asset/login/assets/css/styles.css')}}">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
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
           .error {
            color: red;
            font-size: 14px;

            display: flex;
        }
        .login__box {
        display: flex;
        align-items: center;
    }

    .login__box i {
        margin-left: 5px; /* Adjust the margin as needed */
        cursor: pointer;
    }
    </style>
</head>
<body>
    @include('layouts.alert')
    <div class="login">
        <div class="login__content">
            <div class="login__forms">
                <form action="{{url('password_change')}}" onsubmit="resetPassword()" novalidate class="login__registre" id="forgot-password-form" style="margin-left: :100px;">
                    @csrf
                    <h1 class="login__title">Reset Password</h1>

                    <div class="login__box">
                        <i class='bx bx-envelope'></i>
                        <input type="email" value="{{$email}}" readonly name="email" id="email" placeholder="Email" class="login__input" required>
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" id="new-password" name="password" placeholder="New Password" class="login__input" required>
                        <i class="bx bx-hide toggle-password" onclick="togglePassword('new-password')"></i>
                    </div>
                    <span id="signup-password-error" class="error"></span>

                    <div class="login__box">
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" id="confirm-password" placeholder="Confirm Password" class="login__input" required>
                        <i class="bx bx-hide toggle-password" onclick="togglePassword('confirm-password')"></i>
                    </div>
                    <span id="signup-confirm-password-error" class="error"></span>

                    <!-- Forgot password message -->
                    <!-- <p class="login__forgot" id="forgot-message">Reset your new password.</p> -->

                    <button type="submit" class="login__button">Reset Password</button>

                    <div>
                        <span class="login__account">Remember your password? </span>
                        <a href="{{url('login_register')}}" class="login__account">Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

    function resetPassword(){

        if(!vA()){
            alert(3);
            event.preventDefault();
        }

    }
        function vA() {


            document.getElementById("signup-password-error").textContent = "";
            document.getElementById("signup-confirm-password-error").textContent = "";

            var password = document.getElementById("new-password").value;
             var confirmPassword = document.getElementById("confirm-password").value;

            var isValid = true;


        if (password.trim() === "") {
           document.getElementById("signup-password-error").textContent = "Password is required";
           isValid = false;
        } else if (password.trim().length < 8 || password.trim().length > 25 ||
           !/[A-Z]/.test(password) ||
           !/[a-z]/.test(password) ||
           !/[0-9]/.test(password) ||
           !/[^A-Za-z0-9]/.test(password)
        ) {
         document.getElementById("signup-password-error").textContent = password.trim().length < 8 ?
          "Password should be at least 8 characters long" :
          "Password should contain at least 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character";
        isValid = false;
}


            if (confirmPassword.trim() === "") {
                document.getElementById("signup-confirm-password-error").textContent = "Confirm Password is required";
                isValid = false;
            } else if (password !== confirmPassword) {
                document.getElementById("signup-confirm-password-error").textContent = "Passwords do not match";
                isValid = false;
            }

            return isValid;



        }
    </script>
    <script src="{{asset('asset/login/js/main.js')}}"></script>
    <script>
        function togglePassword(inputId) {
            var passwordInput = document.getElementById(inputId);
            var eyeIcon = document.querySelector("#" + inputId + " + i.toggle-password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("bx-hide");
                eyeIcon.classList.add("bx-show");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("bx-show");
                eyeIcon.classList.add("bx-hide");
            }
        }
    </script>
</body>
</html>
