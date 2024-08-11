<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('asset/login/assets/css/styles.css')}}">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .error {
            color: red;
            font-size: 14px;
            display: flex;
        }

        .login__btn {
            display: flex;
            padding: 1rem;
            margin: 2rem 0;
            width: 300px;
            background-color: var(--first-color);
            color: #FFF;
            font-weight: 600;
            text-align: center;
            border-radius: .5rem;
            transition: .3s;
            justify-content: center;
        }
        .login__btn:hover{
            background-color: var(--first-color-dark);
        }
    </style>
</head>
<body>
    <div class="login">
        @include('layouts.alert')
        <div class="login__content">
            <div class="login__forms">
                <form action="#" class="login__registre" id="forgot-password-form" onsubmit="return validateForgetForm()">
                    @csrf
                    <h1 class="login__title">Forgot Password</h1>
                    <div class="login__box">
                        <i class='bx bx-envelope'></i>
                        <input type="email" id="forgot-email" placeholder="Email" class="login__input">
                    </div>
                    <span id="forgot-email-error" class="error"></span>

                    <!-- Forgot password message -->
                    <p class="login__forgot">Enter your email address to reset your password.</p>

                    <button type="submit" class="login__btn">Reset Password</button>

                    <div>
                        <span class="login__account">Remember your password? </span>
                        <a href="{{url('login_register')}}" >Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('asset/login/js/main.js')}}"></script>
    <script>
        function validateForgetForm() {
            document.getElementById("forgot-email-error").textContent = "";

            var email = document.getElementById("forgot-email").value;

            var isValid = true;

            if (email.trim() === "") {
                document.getElementById("forgot-email-error").textContent = "Email is required";
                isValid = false;
            } else if (!/^[a-zA-Z][a-zA-Z0-9._%+-]{5,}@(gmail\.com|yahoo\.com)$/.test(email)) {
                document.getElementById("forgot-email-error").textContent = "Please enter a valid email address with domain @gmail.com or @yahoo.com";
                isValid = false;
            } else if (email.trim().length < 6 || email.trim().length > 100) {
                document.getElementById("forgot-email-error").textContent = "Email should be between 6 and 100 characters long";
                isValid = false;
            }
            return isValid;
        }
    </script>
</body>
</html>
