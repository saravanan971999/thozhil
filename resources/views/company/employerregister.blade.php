<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('asset\css\NEWinternshippost.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        input[type="number"]::-webkit-inner-spin-button{
        display: none;
        }
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

    @include('layouts.alert')
        <div class="">
            <!-- <div class="header">
                <h2>OneYes <br> <span>Internships</span></h2>
            </div> -->
            <br>
            <div class="title">
                <center><h1>Hire next Intern at <span>Thozhil</span></h1></center><br>
                <center><h3>Register for free now</h3></center>
                </div>
                <br>

            <div class="container">
            <form action="{{url('employer_store')}}" method="POST" id="registrationForm" enctype="multipart/form-data">
                @csrf



<input type="hidden" name="id" value="{{$id}}">

            <div class="user-details">

              <div class="input-box">
                <label for="company_name">Company Name</label>
                <input type="text" placeholder="Enter company name" name="company_name" id="company_name" maxlength="70" onblur="validateField(this)" onkeydown="return validateCompanyName(event)">
                <span id="company_nameError" class="error-message alert alert-warning">Please enter your company name</span>
            </div>

            <script>
                function validateCompanyName(event) {
                    const input = document.getElementById('company_name');
                    const companyNameError = document.getElementById('company_nameError');

                    // Check if the pressed key is a space or if character limit is reached
                    if ((event.keyCode === 32 && input.value.length === 0) || // Prevent space at the beginning
                        (event.keyCode === 32 && input.value.endsWith(' ')) || // Prevent continuous spaces
                        (input.value.length >= 100 && event.keyCode !== 8)) { // Prevent further input if limit reached (except for backspace)
                        event.preventDefault();
                        return false;
                    }
                    return true;
            }
            </script>


            <div class="input-box">
            <label for="company_type">Company type</label>
            <select id="company_type" placeholder="Select your Company Type" name="company_type" onblur="validateField(this)">
            <option value="">Select Your Company Type</option>
            <option value="private limited company">Private Limited Company</option>
            <option value="public limited company">Public Limited Company</option>
            <option value="partnership firm">Partnership Firm</option>
            <option value="limited liability">Limited Liability Partnership</option>
            <option value="sole proprietorship">Sole Proprietorship</option>
            </select>
        </select>

        <span id="company_typeError" class="error-message  alert alert-warning">Please select your company type</span>
            </div>

            <div class="input-box">
            <label for="registration_no">Registration Number</label>
            <input type="text" placeholder="Enter registration number" name="registration_no" id="registration_no"  maxlength="21" onkeypress="return event.target.value.length < 21">
            <!-- <span id="registration_noError" class="error-message  alert alert-warning">Please enter your company registration number</span> -->
            </div>

            <div class="input-box">
            <label for="year_of_founding">Year of Founding</label>
            <select id="year_of_founding" name="year_of_founding" onblur="validateField(this)">
            <option value="">Select Year</option>
            </select>
            <span id="yearofFoundingError" class="error-message alert alert-warning">Please select the founding year of your company</span>
            </div>
            <script>
    var currentYear = new Date().getFullYear();
    var startYear = 1900;
    var yearSelect = document.getElementById("year_of_founding");
    for (var year = currentYear; year >= startYear; year--) {
    var option = document.createElement("option");
    option.value = year;
    option.textContent = year;
    yearSelect.appendChild(option);
    }
</script>






<div class="input-box">
<label for="contactMobile">Mobile Number</label>
<input type="number" id="contactMobile"  name="contactMobile" placeholder="Enter the Mobile Number" onkeypress="return event.charCode === 0 || (/\d/.test(String.fromCharCode(event.charCode)) && this.value.length < 10)"  onblur="validateField(this)">
<span id="contactMobileError" class="error-message alert alert-warning ">Please enter the mobile number</span>
</div>




<!-- <div class="input-box">
  <label for="contacttype">Contact Number Type:</label>
  <select id="contacttype" name="contacttype" onblur="validateField(this)" onchange="toggleFields()">
    <option value="">Select the Contact Number Type</option>
    <option value="Mobile">Mobile</option>
    <option value="Landline">Landline</option>
    <option value="Both">Both</option>
    </select>
  <span id="contacttypeError" class="error-message alert alert-warning ">Please Select the Contact Number Type</span>
  </div>

<div class="input-box">
<label for="contactMobile">Mobile Number:</label>
<input type="number" id="contactMobile" name="contactMobile" placeholder="Enter the Mobile Number" onkeypress="return event.charCode === 0 || (/\d/.test(String.fromCharCode(event.charCode)) && this.value.length < 10)">
<span id="contactMobileError" class="error-message alert alert-warning ">Please Enter the Contact Mobile_Number</span>
</div>

<div class="input-box">
  <label for="landline">Landline Number:</label>
  <input type="number" id="landline" name="landline" placeholder="Enter the Landline Number" onkeypress="return event.charCode === 0 || (/\d/.test(String.fromCharCode(event.charCode)) && this.value.length < 13)">
  <span id="landlineError" class="error-message alert alert-warning ">Please Enter the Landline Number</span>
  </div>

  <script>
function toggleFields() {
var contactType = document.getElementById('contacttype').value;
var mobileField = document.getElementById('contactMobile');
var landlineField = document.getElementById('landline');
var mobileError = document.getElementById('contactMobileError');
var landlineError = document.getElementById('landlineError');

if (contactType === 'Mobile') {
mobileField.disabled = false;
landlineField.disabled = true;
landlineField.value = '';
landlineError.style.display = 'none'; // Hide landline error
if (mobileError.style.display !== 'none') {
mobileError.style.display = 'none'; // Hide mobile error only if currently displayed
}
} else if (contactType === 'Landline') {
mobileField.disabled = true;
mobileField.value = '';
landlineField.disabled = false;
mobileError.style.display = 'none'; // Hide mobile error
if (landlineError.style.display !== 'none') {
landlineError.style.display = 'none'; // Hide landline error only if currently displayed
}
} else if (contactType === 'Both') {
mobileField.disabled = false;
landlineField.disabled = false;
if (mobileError.style.display !== 'none') {
mobileError.style.display = 'none'; // Hide mobile error only if currently displayed
}
if (landlineError.style.display !== 'none') {
landlineError.style.display = 'none'; // Hide landline error only if currently displayed
}
}
} -->

  </script>

            <div class="input-box">
            <label for="contact_email">Contact Email</label>
            <input type="text" value="{{$email}}" readonly placeholder="Enter email" name="contact_email" id="contact_email" onblur="validateField(this)" onkeyup="this.value=this.value.replace(/[^a-z0-9@._-]/g,'')">
            <!--<span id="emailError" class="error-message  alert alert-warning">Please enter your mail id</span>-->
        </div>

        <div class="input-box">
          <label for="description">Company Information</label>
          <textarea placeholder="Enter organizational overview" name="description" id="description" rows="15" maxlength="5000" onsubmit="return validateForm()" onblur="validateField(this)" oninput="validateDescription(this)"></textarea>
          <span id="descriptionError" class="error-message alert alert-warning">Please enter a company information between 20 and 2500 characters.</span>
      </div>

      <script>
        function validateForm() {
            // Your existing form validation logic

            // Additional validation for description
            const description = document.getElementById('description');
            const descriptionError = document.getElementById('descriptionError');
            const minLength = 20;

            if (description.value.length < minLength) {
                descriptionError.textContent = Description should be at least ${minLength} characters long.;
                descriptionError.style.display = 'block';
                return false; // Prevent form submission
            } else if (description.value.length >= 2500) {
                descriptionError.textContent = 'Company Information should not exceed 2500 characters.';
                descriptionError.style.display = 'block';
                return false; // Prevent form submission
            } else {
                descriptionError.style.display = 'none';
                return true; // Allow form submission
            }
        }
    </script>


        <div class="input-box">
            <label for="building_no">Building No & Name</label>
            <input type="text" placeholder="Enter building no" name="building_no" id="building_no" maxlength="50" onblur="validateField(this)" oninput="validateBuilding(event)">
            <span id="building_noError" class="error-message alert alert-warning" style="display: none;">Please enter your Building No & Name</span>
        </div>

        <script>
            function validateBuilding(event) {
                const buildingInput = event.target;
                const trimmedValue = buildingInput.value.trim();

                // Ensure no space at the start or continuous spaces
                if (/^\s/.test(buildingInput.value) || /\s\s/.test(buildingInput.value)) {
                    buildingInput.value = trimmedValue.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
                }
            }
        </script>



            <div class="input-box">
            <label for="area">Area/Locality</label>
            <input type="text" placeholder="Enter the Area/Locality" name="area" id="area" maxlength="50" onblur="validateField(this)" oninput="validateArea(event)">
            <span id="areaError" class="error-message alert alert-warning" style="display: none;">Please enter your Area/Locality</span>
        </div>

        <script>
            function validateArea(event) {
                const areaInput = event.target;
                const trimmedArea = areaInput.value.trim(); // Remove leading and trailing spaces

                // If the input has consecutive spaces or starts with a space, prevent the input
                if (/^\s/.test(areaInput.value) || /\s\s/.test(areaInput.value)) {
                    areaInput.value = trimmedArea.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
                }
            }
        </script>

                <div class="input-box">
                    <label for="country">Country</label>
                    <select placeholder="Enter your country" name="country" id="country" onblur="validateField(this)">
                        <option value="">Select Country</option>
                    </select>
                    <span id="countryError" class="error-message alert alert-warning">Please select your country</span>
                    </div>

                    <div class="input-box">
                    <label for="state">State</label>
                    <select placeholder="Enter your state" name="state" id="state" onblur="validateField(this)" onchange="updateCities()">
                        <option value="">Select State</option>
                    </select>
                    <span id="stateError" class="error-message alert alert-warning">Please select your state</span>
                    </div>

                    <div class="input-box">
                    <label for="district">District</label>
                    <select placeholder="Enter your district" name="district" id="district" onblur="validateField(this)">
                        <option value="">Select District</option>
                    </select>
                    <span id="districtError" class="error-message alert alert-warning">Please select your district</span>
                    </div>

                    <div class="input-box">
                    <label for="pincode">Pincode</label>
                    <input type="number" placeholder="Enter your pincode" name="pincode" id="pincode" onblur="validateField(this)" onkeypress="return event.charCode === 0 || (/\d/.test(String.fromCharCode(event.charCode)) && this.value.length < 6)">
                    <span id="pincodeError" class="error-message alert alert-warning">Please enter a valid pincode</span>
                    </div>

                    <script>
                    // Assuming you have validation logic elsewhere

                    // Function to hide all error messages
                    function hideAllErrorMessages() {
                        document.getElementById('countryError').style.display = 'none';
                        document.getElementById('stateError').style.display = 'none';
                        document.getElementById('districtError').style.display = 'none';
                        document.getElementById('pincodeError').style.display = 'none';
                    }

                    // Call the function to hide error messages when the page loads
                    hideAllErrorMessages();
                    </script>

<div class="input-box">
    <label for="photo">Company Logo</label>
    <input type="file" name="photo" id="photo" accept=".jpg, .jpeg" onblur="validateField(this)">
    <span id="photoError" class="error-message alert alert-warning">Please upload your Company Logo in JPG or JPEG format</span>
    </div>

    <div id="photo-view"></div>

    <script>
    document.getElementById("photo").addEventListener("change", function(event) {
        var file = event.target.files[0];
        var photoView = document.getElementById("photo-view");
        var reader = new FileReader();

        if (file && (file.type === "image/jpeg" || file.type === "image/jpg")) {
        reader.onload = function(e) {
            photoView.innerHTML = "<img src='" + e.target.result + "' width='300' height='300'>";
        };
        reader.readAsDataURL(file);
        document.getElementById("photoError").style.display = "none";
        } else {
        photoView.innerHTML = "";
        document.getElementById("photoError").style.display = "block";
        }
    });
    </script>




            <div class="registerbtn">
            <button type="submit" class="btn">Register</button>
            </div>
                </div>
            </form>
        </div>
        <!-- <div class="liner">
            <input type="text" placeholder="">
        </div>
        <div class="footer-liner">
            <input type="text" placeholder="">
        </div> -->
        </div>

        <script>

function validateField(inputElement) {
        const inputValue = inputElement.value.trim();
        const errorElement = inputElement.parentElement.querySelector('.error-message'); // Find the error message within the parent element

        if (inputValue === '') {
            errorElement.style.display = 'block';
        } else {
            errorElement.style.display = 'none';
        }
    }



function validateForm() {
    // Retrieve form inputs
    var company_name = document.getElementById('company_name').value;
    var company_type = document.getElementById('company_type').value;
//   var registration_no = document.getElementById('registration_no').value;
    var year_of_founding = document.getElementById('year_of_founding').value;
    var contactMobile = document.getElementById('contactMobile').value;
    // var contactMobileField = document.getElementById('contactMobile').value;
    //  var landlineField  = document.getElementById('landline').value;
    // var mobile = document.getElementById('contact_no').value;
   // var email = document.getElementById('contact_email').value;
    var description = document.getElementById('description').value;
    var building_no = document.getElementById('building_no').value;
    var area = document.getElementById('area').value;
    var country = document.getElementById('country').value;
    var state = document.getElementById('state').value;
    var district = document.getElementById('district').value;
    var pincode = document.getElementById('pincode').value;
    var photo = document.getElementById('photo').value;



    // Validate each field
    var isValid = true;

// Function to hide the error message when the input field is clicked
function hideErrorMessageOnFocus(inputId, errorId) {
var inputElement = document.getElementById(inputId);
var errorElement = document.getElementById(errorId);

inputElement.addEventListener('focus', function () {
    errorElement.style.display = 'none';
});
}


// Company Name validation with length limit (maximum of 70 characters)
if (company_name === '') {
  displayError('Please enter your company name.');
} else if (company_name.length < 2) {
  displayError('Company Name should be at least 2 characters long.');
} else if (company_name.length > 70) {
  displayError('Company Name should not exceed 70 characters.');
} else if (/^\d+$/.test(company_name)) {
  displayError('Company Name should not consist of only numbers.');
} else if (company_name.charAt(0) === ' ' || /\s\s/.test(company_name)) {
  displayError('Company Name should not start with a space, and continuous gaps are not allowed.');
} else if (/[^a-zA-Z0-9\s]/.test(company_name)) {
  const specialCharCount = (company_name.match(/[^a-zA-Z0-9\s]/g) || []).length;
  if (specialCharCount !== 1) {
    displayError('Company Name should contain only one special character.');
  } else {
    hideErrorMessage('company_nameError');
  }
} else {
  hideErrorMessage('company_nameError');
}

function displayError(message) {
  document.getElementById('company_nameError').innerText = message;
  document.getElementById('company_nameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_name', 'company_nameError');
}

function hideErrorMessage(errorId) {
  document.getElementById(errorId).style.display = 'none';
}


    // company type validation
    if (company_type === '') {
    document.getElementById('company_typeError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('company_type', 'company_typeError');
    } else {
    document.getElementById('company_typeError').style.display = 'none';
    }

if (year_of_founding === '') {
    document.getElementById('yearofFoundingError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('year_of_founding', 'yearofFoundingError');
    } else {
    document.getElementById('yearofFoundingError').style.display = 'none';
    }

    if (contactMobile === '') {
    document.getElementById('contactMobileError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
} else if (!/^[6-9]\d{9}$/.test(contactMobile)) {
    // Check if the mobile number starts with 6, 7, 8, or 9 and is 10 digits long
    document.getElementById('contactMobileError').innerHTML = 'Mobile number must start with 6, 7, 8, or 9.';
    document.getElementById('contactMobileError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
} else {
    document.getElementById('contactMobileError').style.display = 'none';
}


// Mobile Number validation
// var mobilePattern = /^\d{10}$/;
// var contactMobileField = document.getElementById('contactMobile');
// var contactMobileError = document.getElementById('contactMobileError');

// if (!contactMobileField.disabled) {
//   if (contactMobileField.value === '') {
//     contactMobileError.textContent = 'Mobile number is required.';
//     contactMobileError.style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
//   } else if (!mobilePattern.test(contactMobileField.value) || /\D/.test(contactMobileField.value)) {
//     contactMobileError.textContent = 'Invalid mobile number. Please enter a 10-digit number without any letters.';
//     contactMobileError.style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
//   } else if (!/^[6789]\d{9}$/.test(contactMobileField.value)) {
//     contactMobileError.textContent = 'Please enter a valid Indian mobile number starting with 6, 7, 8, or 9.';
//     contactMobileError.style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
//   } else {
//     contactMobileError.style.display = 'none';
//   }
// }

// Landline Number validation
// var landlinePattern = /^0\d{2,4}-?\d{6,8}$/;
// var landlineField = document.getElementById('landline');
// var landlineError = document.getElementById('landlineError');

// if (!landlineField.disabled) {
//   if (landlineField.value === '') {
//     landlineError.textContent = 'Landline number is required.';
//     landlineError.style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('landline', 'landlineError');
//   } else if (!landlinePattern.test(landlineField.value)) {
//     landlineError.textContent = 'Invalid landline number. Please enter a valid Indian landline number starting with 0.';
//     landlineError.style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('landline', 'landlineError');
//   } else {
//     landlineError.style.display = 'none';
//   }
// }

/*var email = document.getElementById('contact_email').value;
var isValid = true;

if (email === '') {
    showErrorMessage('Email address is required.');
} else {
    var emailParts = email.split('@');
    var localPart = emailParts[0];

    // Use a regex to check if the local part contains only allowed special characters
    var allowedSpecialChars = /^[a-zA-Z0-9]+[@._-]?[a-zA-Z0-9]+$/;

    if (!allowedSpecialChars.test(localPart) ||
        localPart.startsWith('@') || localPart.endsWith('@') ||
        localPart.startsWith('.') || localPart.endsWith('.') ||
        localPart.startsWith('_') || localPart.endsWith('_') ||
        localPart.startsWith('-') || localPart.endsWith('-') ||
        /^\d{2,}$/.test(localPart) ||  // Check for continuous numbers
        /[\W_]{2,}/.test(localPart)) { // Check for continuous special characters
        showErrorMessage('Invalid special characters in the email address or continuous numbers.');
    } else {
        hideErrorMessage('emailError');
    }
}

function showErrorMessage(message) {
    document.getElementById('emailError').textContent = message;
    document.getElementById('emailError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('contact_email', 'emailError');
}

function hideErrorMessage(errorId) {
    document.getElementById(errorId).style.display = 'none';
}

function hideErrorMessageOnFocus(fieldId, errorId) {
    // Your implementation to hide error messages on focus
}

function showErrorMessage(message) {
    document.getElementById('emailError').textContent = message;
    document.getElementById('emailError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('contact_email', 'emailError');
}

function hideErrorMessage(errorId) {
    document.getElementById(errorId).style.display = 'none';
}

function hideErrorMessageOnFocus(fieldId, errorId) {
    // Your implementation to hide error messages on focus
}*/


if (description.trim() === '') {
    document.getElementById('descriptionError').innerText = 'Please enter your company information.';
    document.getElementById('descriptionError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('description', 'descriptionError');
} else if (description.length < 20) {
    document.getElementById('descriptionError').innerText = 'Company Information should have a minimum of 20 characters.';
    document.getElementById('descriptionError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('description', 'descriptionError');
} else if (description.length > 5000) {
    document.getElementById('descriptionError').innerText = 'Company Information should not exceed 5000 characters.';
    document.getElementById('descriptionError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('description', 'descriptionError');
} else if (/(\W)\1{2,}/.test(description)) {
    document.getElementById('descriptionError').innerText = 'Company Information should not contain continuous special characters.';
    document.getElementById('descriptionError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('description', 'descriptionError');
} else {
    document.getElementById('descriptionError').style.display = 'none';
}



if (building_no.trim() === '') {
    document.getElementById('building_noError').innerText = 'Please enter your building number.';
    document.getElementById('building_noError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('building_no', 'building_noError');
} else if (building_no.length > 50) {
    document.getElementById('building_noError').innerText = 'Building number should not exceed 50 characters.';
    document.getElementById('building_noError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('building_no', 'building_noError');
} else if (/(.)\1{2,}/.test(building_no)) {
    document.getElementById('building_noError').innerText = 'Building number should not contain continuous special characters.';
    document.getElementById('building_noError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('building_no', 'building_noError');
} else if (/[\d]{6,}|[^a-zA-Z0-9\s]{6,}/.test(building_no)) {
    document.getElementById('building_noError').innerText = 'Invalid format';
    document.getElementById('building_noError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('building_no', 'building_noError');
} else {
    document.getElementById('building_noError').style.display = 'none';
}



if (area === '') {
    document.getElementById('areaError').innerText = 'Please enter your area.';
    document.getElementById('areaError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('area', 'areaError');
} else if (area.length > 50) {
    document.getElementById('areaError').innerText = 'Area should not exceed 50 characters.';
    document.getElementById('areaError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('area', 'areaError');
} else if (/[^a-zA-Z0-9\s]/.test(area)) {
    document.getElementById('areaError').innerText = 'Invalid format';
    document.getElementById('areaError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('area', 'areaError');
} else if (/[\d]{6,}|[^a-zA-Z0-9\s]{6,}/.test(area)) {
    document.getElementById('areaError').innerText = 'Invalid format';
    document.getElementById('areaError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('area', 'areaError');
} else {
    document.getElementById('areaError').style.display = 'none';
}


// Country validation
if (country === '') {
    document.getElementById('countryError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('country', 'countryError');
} else {
    document.getElementById('countryError').style.display = 'none';
}

// State validation
if (state === '') {
    document.getElementById('stateError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('state', 'stateError');
} else {
    document.getElementById('stateError').style.display = 'none';
}

// District validation
if (district === '') {
    document.getElementById('districtError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('district', 'districtError');
} else {
    document.getElementById('districtError').style.display = 'none';
}

// Pincode validation
if (pincode === '') {
    document.getElementById('pincodeError').innerText = 'Please enter your postal code.';
    document.getElementById('pincodeError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('pincode', 'pincodeError');
} else {
    // Validate pincode format
    var pincodeRegex = /^[1-9][0-9]{5}$/;
    if (!pincodeRegex.test(pincode)) {
    document.getElementById('pincodeError').innerText = 'Invalid pincode format. Please enter a valid 6-digit postal code.';
    document.getElementById('pincodeError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('pincode', 'pincodeError');
    } else if (pincode.length !== 6) {
    document.getElementById('pincodeError').innerText = 'Postal code should be exactly 6 characters long.';
    document.getElementById('pincodeError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('pincode', 'pincodeError');
    } else {
    document.getElementById('pincodeError').style.display = 'none';
    }
}

var photoInput = document.getElementById('photo');
var photoError = document.getElementById('photoError');
var isValid = true;

if (!photoInput.files[0]) {
    // Handle empty file field
    photoError.innerText = 'Please upload your company Logo';
    photoError.style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus(photoInput, photoError);
} else {
    var photo = photoInput.files[0];
    // Validate file type and size
    var allowedExtensions = ['.jpg', '.jpeg'];
    var fileExtension = photo.name.substring(photo.name.lastIndexOf('.')).toLowerCase();
    var maxSizeInBytes = 1000 * 1024; // 1000KB
    var fileSizeInBytes = photo.size;

    if (!allowedExtensions.includes(fileExtension)) {
        // Handle invalid file type
        photoError.innerText = 'Invalid file type. Only JPG/JPEG files are allowed.';
        photoError.style.display = 'block';
        isValid = false;
        hideErrorMessageOnFocus(photoInput, photoError);
    } else if (fileSizeInBytes > maxSizeInBytes) {
        // Handle file size exceeding the limit
        photoError.innerText = 'File size exceeds the maximum limit of 1000KB.';
        photoError.style.display = 'block';
        isValid = false;
        hideErrorMessageOnFocus(photoInput, photoError);
    } else {
        photoError.style.display = 'none';
    }
}

function hideErrorMessageOnFocus(inputElement, errorElement) {
    // Your implementation to hide error messages on focus
}


return isValid;
}

// Event listener for form submission
document.getElementById('registrationForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the form from submitting

    // Validate the form
    var isValid = validateForm();


    if (isValid) {

    this.submit();
    }
});
</script>

<script src="{{ asset('asset\js\dropdown.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>



</body>
</html>
