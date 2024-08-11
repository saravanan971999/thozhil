<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="{{asset('asset/login/assets/css/styles.css')}}">

    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <style>

* {
    margin: 0;
    padding: 0;
}

.card {
    border-radius: 15px; /* Adjust as needed */
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Adjust as needed */
    padding: 20px;

}

.btn{
    width:270px;
    
}





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
        .popup {
            display: none;
            background-color: rgba(49, 49, 49, 0.7);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99;
        }
        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            /* box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3); */
            text-align: center;
        }

    /* Override number input styles */
    input[type="number"] {
        -moz-appearance: textfield;
        appearance: none;
        margin: 0;
    }

    /* Webkit browsers */
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    /* For screens smaller than 768px (typical smartphones) */
@media only screen and (max-width: 767px) {

    .login{
      width:350px;
      margin-top:150px;
      margin-left:-80px;

    }
    .login__forgot{
        margin-left:-5px;
    }
    .remember{
        margin-left:-90px;
    }
  

  
}

    </style>
</head>

<body>

@include('layouts.index_page_header')
  @include('layouts.alert')















    <div  class="container">
    <div class="row justify-content-center mt-5">
        <div style="margin-top:200px;" class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form  id="forgot-password-form">
                        @csrf
                        <h2 class="text-center">Forgot Password</h2>

                        {{-- loading spinners --}}
                        <div class="popup d-none" id="loading">
                            <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        {{-- loading spinners end --}}

                        <div class="form-group" id="logDIV">
                            <label for="email">Email</label>
                            <input style="border-radius:40px;" type="email" class="form-control" id="email" placeholder="Enter your email" required>
                        </div>
                        <span id="forgot-email-error" class="error"></span>
                        <br>
                        <center> <button style="border-radius:50px;" type="submit" id="logBTN" onclick="verifyEmail()" class="btn btn-primary"> <strong>Verify Email</strong></button></center>
                       

                        <div class="form-group" id="otpDIV" style="display: none;">
                            <label for="otp">OTP</label>
                            <input type="number" class="form-control" id="otp" placeholder="Enter OTP" required>
                        </div>

                        <center>
                        <button type="submit" id="otpBTN" style="display: none; margin-top:30px;" onclick="verifyOtp()" class="btn btn-primary"> <strong>Verify OTP</strong></button>
                        </center>
                        
                       

                        <!-- Forgot password message -->
                        <center>  <p style="margin-top:10px;" >Enter your email address to reset your password.</p></center>
                        <center>
                        <div>
                            <span class="login__account">Remember your password? </span>
                            <a href="{{url('login_register')}}" class="login__account"> <span style="color:blue;">Sign In</span></a>
                        </div>
                        
                        </center>
                      

                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


















                <form class="login__registre" id="reset-password-form" style="display:none">
                    <h1 class="login__title">Reset Password</h1>

                    <div class="login__box">
                        <i class='bx bx-envelope'></i>
                        <input type="email" id="Reset_email" placeholder="Email" class="login__input" required>
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" id="new-password" placeholder="New Password" class="login__input" required>
                    </div>

                    <div class="login__box">
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" id="confirm-password" placeholder="Confirm Password" class="login__input" required>
                    </div>

                    <!-- Forgot password message -->
                    <!-- <p class="login__forgot" id="forgot-message">Reset your new password.</p> -->

                    <button type="button" onclick="resetPassword()" class="login__btn">Reset Password</button>

                    <div>
                        <span class="login__account">Remember your password? </span>
                        <a href="index.html" class="login__account"> <span style="color:blue;">Sign In</span></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


    @include('layouts.index_page_footer')
    <script>
        function verifyOtp(){
            event.preventDefault();
            let loading = document.getElementById('loading');
            loading.classList.remove('d-none');
            var email = document.getElementById('email').value;
            var otp = document.getElementById('otp').value;
            fetch('/otp_verify/' + email + '/' + otp)
                .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
                })
                .then(data => {
                    loading.classList.add('d-none');
                    if (data.Success) {

                        window.location.replace("/reset/" + email);
                    }
                    else if(data.error){
                        alert(data.error);
                    }
                // console.log(data);
                })
                .catch(error => {
                console.error('Error during fetch:', error);
                // Provide user-friendly error feedback if needed
                });
        }

        function validateOTP() {
            document.getElementById("forgot-email-error").textContent = "";

            var email = document.getElementById("email").value;

            var isValid = true;

            if (email.trim() === "") {
                document.getElementById("forgot-email-error").textContent = "Email is required";
                isValid = false;
            } else if (!/^[a-zA-Z][a-zA-Z0-9._%+-]{5,}@(gmail\.com|yahoo\.com)$/.test(email)) {
                document.getElementById("forgot-email-error").textContent = "Please enter a valid email address";
                isValid = false;
            } else if (email.trim().length < 6 || email.trim().length > 100) {
                document.getElementById("forgot-email-error").textContent = "Email should be between 6 and 100 characters long";
                isValid = false;
            }
            return isValid;
        }


        function verifyEmail() {
            event.preventDefault();
            let loading = document.getElementById('loading');
            loading.classList.remove('d-none');
            if(validateForgetForm()){
                var email = document.getElementById('email').value;

                // Show loading indicator

                // Make the fetch request
                fetch('/email_verify/' + email)
                    .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();

                    })
                    .then(data => {
                        loading.classList.add('d-none');
                        if (data.Success) {

                            document.getElementById('otpDIV').style.display = 'block';
                            document.getElementById('otpBTN').style.display = 'block';
                            document.getElementById('logBTN').style.display = 'none';
                            document.getElementById('email').readOnly = true;
                        }
                        else if(data.error){
                            alert(data.error);
                        }
                    // console.log(data);
                    })
                    .catch(error => {
                    console.error('Error during fetch:', error);
                    // Provide user-friendly error feedback if needed
                });
            }
}


        function validateForgetForm() {
            document.getElementById("forgot-email-error").textContent = "";

            var email = document.getElementById("email").value;

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('asset/login/js/main.js')}}"></script>
</body>
</html>
