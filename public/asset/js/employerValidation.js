function validateForm() {
  // Retrieve form inputs
  var company_name = document.getElementById('company_name').value;
  var company_type = document.getElementById('company_type').value;
  var registration_no = document.getElementById('registration_no').value;
  var year_of_founding = document.getElementById('year_of_founding').value;
  var mobile = document.getElementById('contact_no').value;
  var email = document.getElementById('contact_email').value;
  var description = document.getElementById('description').value;
  var building_no = document.getElementById('building_no').value;
  var area = document.getElementById('area').value;
  var country = document.getElementById('country').value;
  var state = document.getElementById('state').value;
  var district = document.getElementById('district').value;
  var pincode = document.getElementById('pincode').value;


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

// Name validation with length limit (maximum of 70 characters)
if (company_name === '') {
  document.getElementById('company_nameError').innerText = 'Please enter your company name.';
  document.getElementById('company_nameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_name', 'company_nameError');
} else if (company_name.length < 2) {
  document.getElementById('company_nameError').innerText = 'Company Name should be at least 2 characters long.';
  document.getElementById('company_nameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_name', 'company_nameError');
} else if (company_name.length > 70) { // Adding length limit (70 characters)
  document.getElementById('company_nameError').innerText = 'Company Name should not exceed 100 characters.';
  document.getElementById('company_nameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_name', 'company_nameError');
} else {
  document.getElementById('company_nameError').style.display = 'none';
}

  // company type validation
  if (company_type === '') {
    document.getElementById('company_typeError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('company_type', 'company_typeError');
  } else {
    document.getElementById('company_typeError').style.display = 'none';
  }

// Registration number validation with length limit (maximum of 20 characters)
if (registration_no === '') {
  document.getElementById('registration_noError').innerText = 'Please enter your registration number.';
  document.getElementById('registration_noError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('registration_no', 'registration_noError');
} else if (registration_no.length > 20) { // Adding length limit (20 characters)
  document.getElementById('registration_noError').innerText = 'Registration number should not exceed 20 characters.';
  document.getElementById('registration_noError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('registration_no', 'registration_noError');
} else {
  document.getElementById('registration_noError').style.display = 'none';
}

    // year of founding validation
    if (year_of_founding === '') {
    document.getElementById('yearofFoundingError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('year_of_founding', 'yearofFoundingError');
  } else {
    document.getElementById('yearofFoundingError').style.display = 'none';
  }

  // Mobile Number validation
  var mobilePattern = /^\d{10}$/;

// Check if mobile number is empty
if (mobile === '') {
  document.getElementById('mobileError').innerText = 'Mobile number is required.';
  document.getElementById('mobileError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('contact_no', 'mobileError');
}
// Check if mobile number matches the pattern and has no letters
else if (!mobilePattern.test(mobile) || /\D/.test(mobile)) {
  document.getElementById('mobileError').innerText = 'Invalid mobile number. Please enter a 10-digit number without any letters.';
  document.getElementById('mobileError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('contact_no', 'mobileError');
}
// Check if mobile number is in Indian format
else if (!/^[6789]\d{9}$/.test(mobile)) {
  document.getElementById('mobileError').innerText = 'Please enter a valid Indian mobile number starting with 6,7,8 or 9.';
  document.getElementById('mobileError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('contact_no', 'mobileError');
}
else {
  document.getElementById('mobileError').style.display = 'none';
}




  var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var emailSpecialCharPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

var email = document.getElementById('contact_email').value;

if (email === '') {
  document.getElementById('emailError').textContent = 'Email address is required.';
  document.getElementById('emailError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('contact_email', 'emailError');
} else if (!emailPattern.test(email)) {
  document.getElementById('emailError').textContent = 'Invalid email address format.';
  document.getElementById('emailError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('contact_email', 'emailError');
} else if (!emailSpecialCharPattern.test(email)) {
  document.getElementById('emailError').textContent = 'Email contains invalid special characters.';
  document.getElementById('emailError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('contact_email', 'emailError');
} else if (email.startsWith(' ') || email.endsWith(' ')) {
  document.getElementById('emailError').textContent = 'Email address should not start or end with a space.';
  document.getElementById('emailError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('contact_email', 'emailError');
} else if (email.includes('..')) {
  document.getElementById('emailError').textContent = 'Email address cannot contain consecutive dots.';
  document.getElementById('emailError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('contact_email', 'emailError');
} else {
  document.getElementById('emailError').style.display = 'none';
}

// Description validation with length limit (maximum of 250 characters)
if (description === '') {
  document.getElementById('descriptionError').innerText = 'Please enter a description.';
  document.getElementById('descriptionError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('description', 'descriptionError');
} else if (description.length > 250) { // Adding length limit (250 characters)
  document.getElementById('descriptionError').innerText = 'Description should not exceed 250 characters.';
  document.getElementById('descriptionError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('description', 'descriptionError');
} else {
  document.getElementById('descriptionError').style.display = 'none';
}


// Address validation for building number with length limit (maximum of 100 characters)
if (building_no === '') {
  document.getElementById('building_noError').innerText = 'Please enter your building number.';
  document.getElementById('building_noError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('building_no', 'building_noError');
} else if (building_no.length > 100) { // Adding length limit (100 characters)
  document.getElementById('building_noError').innerText = 'Building number should not exceed 100 characters.';
  document.getElementById('building_noError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('building_no', 'building_noError');
} else {
  document.getElementById('building_noError').style.display = 'none';
}


// Address validation for area with length limit (maximum of 50 characters)
if (area === '') {
  document.getElementById('areaError').innerText = 'Please enter your area.';
  document.getElementById('areaError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('area', 'areaError');
} else if (area.length > 50) { // Adding length limit (50 characters)
  document.getElementById('areaError').innerText = 'Area should not exceed 50 characters.';
  document.getElementById('areaError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('area', 'areaError');
} else {
  document.getElementById('areaError').style.display = 'none';
}


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

  if (pincode === '') {
  document.getElementById('pincodeError').innerText = 'Please enter your postal code.';
  document.getElementById('pincodeError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('pincode', 'pincodeError');
} else {
  // Validate pincode format
  var pincodeRegex =/^[1-9][0-9]{5}$/;
  if (!pincodeRegex.test(pincode)) {
    document.getElementById('pincodeError').innerText = 'Invalid pincode format. Please enter a valid 6 digit postal code.';
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

function closePopup() {
    window.location.replace("employer_dashboard");
}
