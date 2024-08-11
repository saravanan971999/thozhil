
            const loginForm = document.getElementById('loginForm');
            const signupForm = document.getElementById('signup');

            const loginUsernameInput = document.getElementById('username');
            const loginPasswordInput = document.getElementById('password');

            const signupFullNameInput = document.getElementById('fullName');
            const signupEmailInput = document.getElementById('email');
            const signupPasswordInput = document.getElementById('password');
            const signupCPasswordInput = document.getElementById('Cpassword');
            const signupRegisterAsInput = document.getElementById('register_as');

            const loginUsernameError = document.getElementById('usernameError');
            const loginPasswordError = document.getElementById('passwordError');

            const signupFullNameError = document.getElementById('fullnameError');
            const signupEmailError = document.getElementById('emailError');
            const signupPasswordError = document.getElementById('passwordERror');
            const signupCPasswordError = document.getElementById('CpasswordError');
            const signupRegisterAsError = document.getElementById('register_asError');

            loginForm.addEventListener('submit', function (event) {
                let valid = true;
                loginUsernameError.textContent = '';
                loginPasswordError.textContent = '';

                if (loginUsernameInput.value.trim() === '') {
                    loginUsernameError.textContent = 'Please enter your registered Email Id';
                    valid = false;
                }

                if (loginPasswordInput.value.trim() === '') {
                    loginPasswordError.textContent = 'Please enter a password';
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault();
                }
            });

            signupForm.addEventListener('submit', function (event) {
                let valid = true;
                signupFullNameError.textContent = '';
                signupEmailError.textContent = '';
                signupPasswordError.textContent = '';
                signupCPasswordError.textContent = '';
                signupRegisterAsError.textContent = '';

                if (signupFullNameInput.value.trim() === '') {
                    signupFullNameError.textContent = 'Please enter your username';
                    valid = false;
                }

                if (signupEmailInput.value.trim() === '') {
                    signupEmailError.textContent = 'Please enter your email address';
                    valid = false;
                }

                if (signupPasswordInput.value.trim() === '') {
                    signupPasswordError.textContent = 'Please enter a password';
                    valid = false;
                } else {
                    // Add your password strength validation here
                }

                if (signupCPasswordInput.value.trim() === '') {
                    signupCPasswordError.textContent = 'Please confirm your password';
                    valid = false;
                } else if (signupCPasswordInput.value.trim() !== signupPasswordInput.value.trim()) {
                    signupCPasswordError.textContent = 'Passwords do not match';
                    valid = false;
                }

                if (signupRegisterAsInput.value === '') {
                    signupRegisterAsError.textContent = 'Please select a role';
                    valid = false;
                }

                if (!valid) {
                    event.preventDefault();
                }
            });

// const form = document.getElementById('loginForm');
// const usernameInput = document.getElementById('username');
// const passwordInput = document.getElementById('password');
// const usernameError = document.getElementById('usernameError');
// const passwordError = document.getElementById('passwordError');

// form.addEventListener('submit', function(event) {
//     let valid = true;
//     usernameError.textContent = '';
//     passwordError.textContent = '';

//     // Check if username is empty
//     if (usernameInput.value.trim() === '') {
//         usernameError.textContent = 'Please enter a username';
//         valid = false;
//     }

//     // Check if password is empty
//     if (passwordInput.value.trim() === '') {
//         passwordError.textContent = 'Please enter a password';
//         valid = false;
//     } else {
//         // Validate password strength (minimum 8 characters including uppercase, lowercase, number, and special character)
//         const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
//         if (!passwordRegex.test(passwordInput.value)) {
//             passwordError.textContent = 'Password should contain at least 8 characters including uppercase, lowercase, number, and special character';
//             valid = false;
//         }
//     }

//     if (!valid) {
//         event.preventDefault(); // Prevent form submission if validation fails
//         // alert('Please fill in the required fields correctly.');
//     }
// });
