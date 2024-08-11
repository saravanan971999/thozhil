function validateForm() {

  var company_name = document.getElementById('company_name').value;
  var internship_title = document.getElementById('internship_title').value;
  var jobDescription = document.getElementById('jobDescription').value;
  var duration = document.getElementById('duration').value;
  var startDate = document.getElementById('startDate').value;
  var applicationDeadline = document.getElementById('applicationDeadline').value;
  var stipend = document.getElementById('stipend').value;
  var skills = document.getElementById('skills').value;
  var eligibility = document.getElementById('eligibility').value;
  var additionalInfo = document.getElementById('additionalInfo').value;
  var contactEmail = document.getElementById('contactEmail').value;
  var contactMobile = document.getElementById('contactMobile').value;
  var totalVacancies = document.getElementById('totalVacancies').value;

  var applicationProcedure = document.getElementById('applicationProcedure').value;

  var selectionProcess = document.getElementById('selectionProcess').value;
  var address = document.getElementById('address').value;
  var street = document.getElementById('street').value;
  var vt = document.getElementById('vt').value;
  var country = document.getElementById('country').value;
  var state = document.getElementById('state').value;
  var district = document.getElementById('district').value;
  var pincode = document.getElementById('pincode').value;

  // Validate each field
  var isValid = true;

  function hideErrorMessageOnFocus(inputId, errorId) {
var inputElement = document.getElementById(inputId);
var errorElement = document.getElementById(errorId);

inputElement.addEventListener('focus', function () {
errorElement.style.display = 'none';
});
}

 // Company Name validation
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
}  else {
document.getElementById('company_nameError').style.display = 'none';
}

// Internship Title validation
if (internship_title === '') {
document.getElementById('internship_titleError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('internship_title', 'internship_titleError');
} else {
document.getElementById('internship_titleError').style.display = 'none';
}

  if (jobDescription === '') {
    // Display error message for jobDescription field
    document.getElementById('jobDescriptionError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
  } else {
    document.getElementById('jobDescriptionError').style.display = 'none';
  }


  if (duration === '') {
    // Display error message for duration field
    document.getElementById('durationError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('duration', 'durationError');
  } else {
    document.getElementById('durationError').style.display = 'none';
  }


  if (startDate === '') {
    // Display error message for startDate field
    document.getElementById('startDateError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('startDate', 'startDateError');
  } else {
    document.getElementById('startDateError').style.display = 'none';
  }

  if (applicationDeadline === '') {
    // Display error message for applicationDeadline field
    document.getElementById('applicationDeadlineError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('applicationDeadline', 'applicationDeadlineError');
  } else {
    document.getElementById('applicationDeadlineError').style.display = 'none';
  }

  if (stipend === '') {
    // Display error message for stipend field
    document.getElementById('stipendError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('stipend', 'stipendError');
  } else {
    document.getElementById('stipendError').style.display = 'none';
  }

  if (skills === '') {
    // Display error message for skills field
    document.getElementById('skillsError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('skills', 'skillsError');
  } else {
    document.getElementById('skillsError').style.display = 'none';
  }

  if (eligibility === '') {
    // Display error message for eligibility field
    document.getElementById('eligibilityError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('eligibility', 'eligibilityError');
  } else {
    document.getElementById('eligibilityError').style.display = 'none';
  }

  if (additionalInfo === '') {
    // Display error message for additionalInfo field
    document.getElementById('additionalInfoError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('additionalInfo', 'additionalInfoError');
  } else {
    document.getElementById('additionalInfoError').style.display = 'none';
  }

   // Email address validation patterns
var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var emailSpecialCharPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

if (contactEmail === '') {
document.getElementById('contactEmailError').textContent = 'Email address is required.';
document.getElementById('contactEmailError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
} else if (!emailPattern.test(contactEmail)) {
document.getElementById('contactEmailError').textContent = 'Invalid email address format.';
document.getElementById('contactEmailError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
} else if (!emailSpecialCharPattern.test(contactEmail)) {
document.getElementById('contactEmailError').textContent = 'Email contains invalid special characters.';
document.getElementById('contactEmailError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
} else if (contactEmail.startsWith(' ') || contactEmail.endsWith(' ')) {
document.getElementById('contactEmailError').textContent = 'Email address should not start or end with a space.';
document.getElementById('contactEmailError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
} else if (contactEmail.includes('..')) {
document.getElementById('contactEmailError').textContent = 'Email address cannot contain consecutive dots.';
document.getElementById('contactEmailError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
} else {
document.getElementById('contactEmailError').style.display = 'none';
}


// Mobile Number validation
var mobilePattern = /^\d{10}$/;

if (contactMobile === '') {
document.getElementById('contactMobileError').textContent = 'Mobile number is required.';
document.getElementById('contactMobileError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
} else if (!mobilePattern.test(contactMobile) || /\D/.test(contactMobile)) {
document.getElementById('contactMobileError').textContent = 'Invalid mobile number. Please enter a 10-digit number without any letters.';
document.getElementById('contactMobileError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
} else if (!/^[6789]\d{9}$/.test(contactMobile)) {
document.getElementById('contactMobileError').textContent = 'Please enter a valid Indian mobile number starting with 6,7,8 or 9.';
document.getElementById('contactMobileError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
} else {
document.getElementById('contactMobileError').style.display = 'none';
}

  if (totalVacancies === '') {
    // Display error message for totalVacancies field
    document.getElementById('totalVacanciesError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('totalVacancies', 'totalVacanciesError');
  } else {
    document.getElementById('totalVacanciesError').style.display = 'none';
  }




  if (applicationProcedure === '') {
    // Display error message for applicationProcedure field
    document.getElementById('applicationProcedureError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('applicationProcedure', 'applicationProcedureError');
  } else {
    document.getElementById('applicationProcedureError').style.display = 'none';
  }



  if (selectionProcess === '') {
    // Display error message for selectionProcess field
    document.getElementById('selectionProcessError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('selectionProcess', 'selectionProcessError');
  } else {
    document.getElementById('selectionProcessError').style.display = 'none';
  }

// Address validation
if (address === '') {
document.getElementById('addressError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('address', 'addressError');
} else {
document.getElementById('addressError').style.display = 'none';
}

// Street validation
if (street === '') {
document.getElementById('streetError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('street', 'streetError');
} else {
document.getElementById('streetError').style.display = 'none';
}

if (vt === '') {
document.getElementById('vtError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('vt', 'vtError');
} else {
document.getElementById('vtError').style.display = 'none';
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
document.getElementById('registrationForm').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the form from submitting

  // Validate the form
  var isValid = validateForm();

  // If the form is valid, you can submit it to the server using AJAX or perform any other necessary action
  if (isValid) {
    // Submit the form or perform other actions
    this.submit();
  }
});
