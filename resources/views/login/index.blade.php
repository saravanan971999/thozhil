<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- ===== CSS ===== -->
<link rel="stylesheet" href="{{asset('asset/login/assets/css/styles.css')}}">
<!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <title>Login Form Sign In Sign Up</title>
<style>
     .error {
            color: red;
            font-size: 14px;

            display: flex;
        }

        .login__registre {
            text-align: center;
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
        .login__box .right-icon {
            position: absolute;
            right: 40px;
            margin-top: 10px;
            /* top: 20%; */
            transform: translateY(-50%); /* Vertically center the icon */
        }

        .login__btn1 {
    display: flex;
    padding: 1rem;
    margin: 2rem 0;
    width: 100%;
    background-color: #0099cc;
    color: #FFF;
    font-weight: 600;
    text-align: center;
    border-radius: .5rem;
    transition: .3s;
    justify-content: center;
}

.login__btn1:disabled {
    background-color: #ccc; /* Change background color to gray */
    color: #666; /* Change text color to a darker shade */
    cursor: not-allowed; /* Change cursor to indicate button is not clickable */
}


@media (max-width: 767px) {
  .container-new {
    display: flex;
    align-items: center;
    justify-content: center;
      flex-direction: column;
  }

}

    </style>
</head>

<body>
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/65b9ecf28d261e1b5f59cf04/1hlf4b6c0';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- ***** Preloader Start ***** -->
<!-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
</div> -->
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  
  <!-- ***** Header Area End ***** -->

  @include('layouts.index_page_header')
  @include('layouts.alert')







  <!-- login form start -->


  <div class="container-new">
    <div class="login mt-2">
        <div class="login__content" style="height:600px;">
            <div class="login__img" style="margin-top:200px;">
                <img class="img-fluid" src="{{ asset('asset/login/assets/img/img-login.svg')}}" alt="">
            </div>
            <div class="login__forms" style="margin-top:70px;">



            <!-- login form -->
                <form action="{{url('log_in')}}" class="login__registre" id="login-in" method="POST" onsubmit="return validateSignInForm()">
                    @csrf
                    <h1 class="login__title">Login</h1>


                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" id="signin-username" name="username"  placeholder="Email" class="login__input" onblur="validateField('signin-username')">
                    </div>

                    
                    <span id="signin-username-error" class="error"></span>

                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" id="signin-password" name="password" placeholder="Password" class="login__input" onblur="validateField('signin-password')">
                        <i class="bx bx-show bx-hide-password login__icon right-icon" onclick="togglePasswordVisibility('signin-password')"></i>

                    </div>
                    <span id="signin-password-error" class="error"></span>

                    <a href="{{url('forgot_password')}}" class="login__forgot">Forgot Password?</a>

                    <!-- <a href="#" type="submit" class="login__button">Login</a> -->

                    <button type="submit" class="login__btn">Login</button>
                    <div>
                        <span class="login__account">Don't have an account ?</span>
                        <span class="login__signin" id="sign-up">Register</span>
                        
                    </div>
                </form>


                <!-- login form end -->



                <div class="container-new">
                <!-- .................................create an account .................................................... -->

                <form action="{{url('instant_register')}}" method="POST" class="login__create none" id="login-up" onsubmit="return validateSignUpForm()" style="height: 999px;; margin-top:-195px; position: relative;">
                    @csrf
                    <h1 class="login__title"  style="margin-top:70px;">Create Account</h1>

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <select id="signup-register-as" name="register_as" class="login__input">
                            <option value="" selected disabled>Register As</option>
                            <option value="1">Candidate</option>
                            <option value="2">Employer</option>
                            <!-- Add other options as needed -->
                        </select>
                    </div>


                    <span id="signup-register-as-error" class="error"></span>

               

                    <div class="login__box">
                        <i class='bx bx-user login__icon'></i>
                        <input type="text" id="signup-username" name="fullName" placeholder="Full Name" class="login__input">
                    </div>

                    <span id="signup-username-error" class="error"></span>
                    

                    <div class="login__box">
                        <i class='bx bx-at login__icon'></i>
                        <input type="text" id="signup-email" name="Email" placeholder="Email" class="login__input">
                    </div>

                    <span id="signup-email-error" class="error"></span>


                    

                    <div class="login__box">
                      <i class='bx bx-phone login__icon'></i>
                      <input type="tel" id="signup-number" name="number" placeholder="Contact Number" class="login__input" oninput="clearErrorMessage('signup-number-error')" maxlength="10" >
                    </div>
                     <span id="signup-number-error" class="error"></span>


                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" id="signup-password" name="passWord" placeholder="Password" class="login__input" >
                        <i class="bx bx-show bx-hide-password login__icon right-icon" onclick="togglePasswordVisibility('signup-password')"></i>

                    </div>
                      <span id="signup-password-error" class="error"></span>

                      <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" id="signup-confirm-password" name="CpassWord" placeholder="Confirm Password" class="login__input"onblur="validateSignUpForm()">
                        <i class="bx bx-show bx-hide-password login__icon right-icon" onclick="togglePasswordVisibility('signup-confirm-password')"></i>
                      </div>
                      <span id="signup-confirm-password-error" class="error"></span>  
                  <!-- <a href="#" class="login__button">Sign Up</a> --><br>

                  <div class="login__box">

                  <label>
                    <input type="checkbox" id="signup-termsCheckbox" onblur="validateSignUpForm()">
                    I agree to the <a href="{{url('terms_condition')}}" target="_blank">terms and conditions</a>
                </label>
                </div>
                <span id="signup-terms-error" name="terms-error" class="error"></span>

                
                <button type="submit" class="login__btn1" id="register-button" disabled>Register</button>


                    
                    <div>
                        <span class="login__account">Already have an account? </span>
                        <a href="{{url('login_register')}}"><span class="login__signup" id="sign-in">Login</span></a>
                    </div>
                </form>
                
                
            </div>
            </div>
        </div>
    </div>
</div>


<br><br><br><br><br><br><br><br><br><br>
@include('layouts.index_page_footer')


    <!--===== MAIN JS =====-->

    <script>
                        let spaceCount = 0;
                        let lastKeyWasSpace = false;

                        document.getElementById("signup-username").addEventListener("input", handleInput);

                        function handleInput(event) {
                            const inputText = event.target.value;
                            const lastChar = inputText.slice(-1);

                            if (lastChar === " ") {
                                if (lastKeyWasSpace || inputText.trim() === "") {
                                    event.target.value = inputText.slice(0, -1); // Remove the space
                                } else if (spaceCount >= 2) {
                                    event.target.value = inputText.slice(0, -1); // Remove the space
                                } else {
                                    spaceCount++;
                                }
                                lastKeyWasSpace = true;
                            } else {
                                spaceCount = 0;
                                lastKeyWasSpace = false;
                            }

                            const isValidChar = /[a-zA-Z\s]/i.test(lastChar);
                            if (!isValidChar) {
                                event.target.value = inputText.slice(0, -1); // Remove the invalid character
                            }
                        }
     </script>






<script>
    function validateField(fieldId) {
        var inputField = document.getElementById(fieldId);
        var fieldValue = inputField.value.trim();
        var errorElement = document.getElementById(fieldId + "-error");
        var valid = /^\d{10}$/.test(fieldValue); // Check if the input is 10 digits
        if (!valid) {
            errorElement.textContent = "Please enter a 10-digit number.";
            return false;
        }
        errorElement.textContent = ""; // Clear any previous error message
        return true;
    }

    function clearErrorMessage(errorId) {
        document.getElementById(errorId).textContent = "";
    }

    document.getElementById("signup-number").addEventListener("blur", function() {
        validateField('signup-number');
    });

    document.getElementById("signup-number").addEventListener("keypress", function(event) {
        var keyPressed = event.key;
        var inputValue = event.target.value;
        var firstDigit = parseInt(keyPressed);
        if (inputValue.length === 0 && ![6, 7, 8, 9].includes(firstDigit)) {
            event.preventDefault(); // Prevent input if first digit is not allowed
        }
    });

    document.getElementById("signup-number").addEventListener("input", function() {
        var inputValue = this.value;
        if (inputValue.length === 10) {
            validateField('signup-number');
        }
    });
</script>



    <script src="{{ asset('asset/login/assets/js/main.js')}}"></script>

    <!-- password eye symbol validation -->
    <script>
        function togglePasswordVisibility(id) {
  const passwordInput = document.getElementById(id);
  const eyeIcon = passwordInput.nextElementSibling;

  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    eyeIcon.classList.remove('bx-hide-password');
    eyeIcon.classList.add('bx-hide');
  } else {
    passwordInput.type = 'password';
    eyeIcon.classList.remove('bx-hide');
    eyeIcon.classList.add('bx-hide-password');
  }
}


// signin form validation
        function validateSignInForm() {
            document.getElementById("signin-username-error").textContent = "";
            document.getElementById("signin-password-error").textContent = "";

            var username = document.getElementById("signin-username").value;
            var password = document.getElementById("signin-password").value;

            var isValid = true;

            if (username.trim() === "") {
    document.getElementById("signin-username-error").textContent = "Email is required";
    isValid = false;
} else {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(username.trim())) {
        document.getElementById("signin-username-error").textContent = "Please enter a valid email";
        isValid = false;
    } else {
        const usernameBeforeAtSymbol = username.trim().split('@')[0];

        // Check if the part before "@" contains a dot at the beginning
        if (usernameBeforeAtSymbol.startsWith(".") || usernameBeforeAtSymbol.endsWith(".")) {
            document.getElementById("signin-username-error").textContent = "Please enter a valid email";
            isValid = false;
        } else {
            // Check if the domain is gmail.com
            const domain = username.trim().split('@')[1];
            if (!/^(gmail\.com|yahoo\.com|hotmail\.com|outlook\.com|yourcompany\.com)$/.test(domain)) {
    document.getElementById("signin-username-error").textContent = "Please enter a valid email";
    isValid = false;
}

        }
    }
}



            if (password.trim() === "") {
    document.getElementById("signin-password-error").textContent = "Password is required";
    isValid = false;
} else if (password.trim().length < 8 ||
    !/[A-Z]/.test(password) ||
    !/[a-z]/.test(password) ||
    !/[0-9]/.test(password) ||
    !/[^A-Za-z0-9]/.test(password)
) {
    document.getElementById("signin-password-error").textContent = password.trim().length < 8 ?
        "Invalid email or password" :
        "Invalid email or password";
    isValid = false;
}
    return isValid;
}







// onblur validation for signin form

function validateField(fieldId) {
    var field = document.getElementById(fieldId);
    var errorSpan = document.getElementById(fieldId + "-error");

    if (fieldId === "signin-username") {
        if (field.value.trim() === "") {
            errorSpan.textContent = "Email is required";
        } else {
            errorSpan.textContent = "";
        }
    } else if (fieldId === "signin-password") {
        if (field.value.trim() === "") {
            errorSpan.textContent = "Password is required";
        } else {
            errorSpan.textContent = "";
        }
    }
}

// onblur validation for each field


document.addEventListener("DOMContentLoaded", function () {
    // Add event listeners for blur events on input fields
    var usernameField = document.getElementById("signup-username");
    usernameField.addEventListener("blur", function () {
        validateField("signup-username");
    });

    var emailField = document.getElementById("signup-email");
    emailField.addEventListener("blur", function () {
        validateEmailField("signup-email");
    });

    var numberField = document.getElementById("signup-number");
    numberField.addEventListener("blur", function () {
        validateNumberField("signup-number");
    });

    var passwordField = document.getElementById("signup-password");
    passwordField.addEventListener("blur", function () {
        validatePasswordField("signup-password");
    });

    var confirmPasswordField = document.getElementById("signup-confirm-password");
    confirmPasswordField.addEventListener("blur", function () {
        validateConfirmPasswordField("signup-confirm-password");
    });

    var registerAsField = document.getElementById("signup-register-as");
    registerAsField.addEventListener("blur", function () {
        validateRegisterAsField("signup-register-as");
    });

    var termsCheckbox = document.getElementById("signup-termsCheckbox");
    termsCheckbox.addEventListener("change", function () {
        validateTermsAndConditions();
    });
    
    // Add event listener for full name field
    var fullNameField = document.getElementById("signup-username");
    fullNameField.addEventListener("blur", function () {
        validateFullNameField("signup-username");
    });
});

function validateNumberField(fieldId) {
    var field = document.getElementById(fieldId);
    var errorSpan = document.getElementById(fieldId + "-error");

    if (field.value.trim() === "") {
        errorSpan.textContent = "Number is required";
    } else {
        errorSpan.textContent = "";
    }
}

function validateEmailField(fieldId) {
    var field = document.getElementById(fieldId);
    var errorSpan = document.getElementById(fieldId + "-error");

    if (field.value.trim() === "") {
        errorSpan.textContent = "Email is required";
    } else {
        errorSpan.textContent = "";
    }
}

function validatePasswordField(fieldId) {
    var field = document.getElementById(fieldId);
    var errorSpan = document.getElementById(fieldId + "-error");

    if (field.value.trim() === "") {
        errorSpan.textContent = "Password is required";
    } else {
        errorSpan.textContent = "";
    }
}

function validateConfirmPasswordField(fieldId) {
    var field = document.getElementById(fieldId);
    var errorSpan = document.getElementById(fieldId + "-error");

    if (field.value.trim() === "") {
        errorSpan.textContent = "Confirm Password is required";
    } else {
        errorSpan.textContent = "";
    }
}

function validateRegisterAsField(fieldId) {
    var field = document.getElementById(fieldId);
    var errorSpan = document.getElementById(fieldId + "-error");

    if (field.value.trim() === "") {
        errorSpan.textContent = "Please select an option from the list";
    } else {
        errorSpan.textContent = "";
    }
}

function validateTermsAndConditions() {
    var checkbox = document.getElementById("signup-termsCheckbox");
    var errorSpan = document.getElementById("signup-terms-error");

    if (!checkbox.checked) {
        errorSpan.textContent = "Please accept the Terms and Conditions.";
        return false;
    } else {
        errorSpan.textContent = "";
        return true;
    }
}

// Function to validate full name field
function validateFullNameField(fieldId) {
    var field = document.getElementById(fieldId);
    var errorSpan = document.getElementById(fieldId + "-error");

    if (field.value.trim() === "") {
        errorSpan.textContent = "Full Name is required";
    } else {
        errorSpan.textContent = "";
    }
}






// validation for signup form




function validateSignUpForm() {
    // Your existing validation code here...
    document.getElementById("signup-username-error").textContent = "";
            document.getElementById("signup-email-error").textContent = "";
            document.getElementById("signup-number-error").textContent = "";
            document.getElementById("signup-password-error").textContent = "";
            document.getElementById("signup-confirm-password-error").textContent = "";
            document.getElementById("signup-register-as-error").textContent = "";

            var username = document.getElementById("signup-username").value;
            var email = document.getElementById("signup-email").value;
            var number = document.getElementById("signup-number").value;
            var password = document.getElementById("signup-password").value;
             var confirmPassword = document.getElementById("signup-confirm-password").value;
            var registerAs = document.getElementById("signup-register-as").value;
            var termsCheckbox = document.getElementById("signup-termsCheckbox");

            var isValid = true;

      

            if (username.trim() === "") {
                document.getElementById("signup-username-error").textContent = "Full name is required";
                isValid = false;
            } else if (username.trim().length < 2 || username.trim().length > 40) {
                document.getElementById("signup-username-error").textContent = "The Full name field should contain 2 to 40 characters";
                isValid = false;
            }  
            else if (/\d/.test(username)) {
                document.getElementById("signup-username-error").textContent = "Invalid Full Name. Numbers are not allowed.";
                isValid = false;
            } else if (/\s{2,}/.test(username)) {
                document.getElementById("signup-username-error").textContent = "Invalid Full Name. Continuous spaces are not allowed.";
                isValid = false;
            }



            // email validation............................................................................

            if (email.trim() === "") {
    document.getElementById("signup-email-error").textContent = "Email is required";
    isValid = false;
} else {
    // Regular expression for general email format validation
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!emailRegex.test(email)) {
        document.getElementById("signup-email-error").textContent = "Please enter a valid email";
        isValid = false;
    } else {
        // Check if the email length is within the specified range
        const emailLength = email.length;
        if (emailLength < 4 || emailLength > 60) {
            document.getElementById("signup-email-error").textContent = "Email length must be between 4 and 60 characters";
            isValid = false;
        } else {
            if (registerAs === "1") {
                // Validate against specific domains
                const specificDomainsRegex = /^[a-zA-Z0-9._%+-]{4,40}@(?:[a-zA-Z0-9-]+\.)+(?:gmail\.com|hotmail\.com|outlook\.com|yahoo\.com|com|co\.in|in)$/;


                if (!specificDomainsRegex.test(email)) {
                    document.getElementById("signup-email-error").textContent = "Please enter a valid email";
                    isValid = false;
                } else if (email.startsWith(".")) {
                    document.getElementById("signup-email-error").textContent = "Please enter a valid email";
                    isValid = false;
                }
            } else if (registerAs === "2") {
                // Validate against company email format
                const companyEmailRegex = /^[a-zA-Z0-9._%+-]{4,40}@(?:[a-zA-Z0-9-]+\.)+(?:gmail\.com|hotmail\.com|outlook\.com|yahoo\.com|com|co\.in|in)$/;

                if (!companyEmailRegex.test(email)) {
                    document.getElementById("signup-email-error").textContent = "Please enter a valid email";
                    isValid = false;
                } else if (email.startsWith(".")) {
                    document.getElementById("signup-email-error").textContent = "Please enter a valid email";
                    isValid = false;
                }
            }
        }
    }
}



// contact number validation
if (registerAs === "1" || registerAs === "2" || registerAs === "") {
    if (number.trim() === "") {
        document.getElementById("signup-number-error").textContent = "Contact number is required";
        isValid = false;
    } else if (number.trim().length < 10) {
        document.getElementById("signup-number-error").textContent = "Contact number should be atleast 10 digits long";
        isValid = false;
    } else if (/\s/.test(number)) {
        document.getElementById("signup-number-error").textContent = "Contact number should not contain spaces";
        isValid = false;
    } else if (/^[0-5]/.test(number.trim())) {
        document.getElementById("signup-number-error").textContent = "Please enter a valid contact number";
        isValid = false;
    }
}


// password validation


            if (password.trim() === "") {
                document.getElementById("signup-password-error").textContent = "Password is required";
                isValid = false;
            } else if (
                password.trim().length < 8 ||
                password.trim().length > 15 || // Set maximum length to 15
                !/[A-Z]/.test(password) ||
                !/[a-z]/.test(password) ||
                !/[0-9]/.test(password) ||
                !/[^A-Za-z0-9]/.test(password)
            ) {
                document.getElementById("signup-password-error").textContent =
                    password.trim().length < 8 ?
                        "Password should be minimum 8 characters and maximum 15 characters long and contain atleast 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character" :
                        "Password should be minimum 8 characters and maximum 15 characters long and contain atleast 1 uppercase letter, 1 lowercase letter, 1 number, and 1 special character";
                isValid = false;
            }


            if (confirmPassword.trim() === "") {
                document.getElementById("signup-confirm-password-error").textContent = "Confirm password is required";
                isValid = false;
            } else if (password !== confirmPassword) {
                document.getElementById("signup-confirm-password-error").textContent = "Password and Confirm Password do not match";
                isValid = false;
            }

            if (registerAs.trim() === "") {
                document.getElementById("signup-register-as-error").textContent = "Please select an option from the list";
                isValid = false;
            }


            var termsCheckbox = document.getElementById("signup-termsCheckbox");
            var termsError = document.getElementById("signup-terms-error");

            if (!termsCheckbox.checked) {
                termsError.textContent = "Please accept the Terms and Conditions.";
                isValid = false;
            } else {
                termsError.textContent = ""; // Clear the error message if checkbox is checked
            }


            if (
        username.trim() !== "" &&
        email.trim() !== "" &&
        number.trim() !== "" &&
        password.trim() !== "" &&
        confirmPassword.trim() !== ""&&
        termsCheckbox.checked
    ) {
        // Enable register button and remove disabled style
        var registerButton = document.getElementById("register-button");
        registerButton.disabled = false;
        registerButton.classList.add("login__btn1");
    } else {
        // Disable register button and apply disabled style
        var registerButton = document.getElementById("register-button");
        registerButton.disabled = true;
        registerButton.classList.remove("login__btn1:disabled ");
        // Return early if any field is empty or checkbox is not ticked
        return;
    }


    return isValid;
}

</script>


</body>

</html>
































    















