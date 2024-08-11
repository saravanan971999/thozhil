function validateForm() {

    var company_name = document.getElementById('company_name').value;
    var job_title = document.getElementById('job_title').value;
    var firstname = document.getElementById('firstname').value;
    var lastname = document.getElementById('lastname').value;
    var dob = document.getElementById('dob').value;
    var age = document.getElementById('age').value;
    var gender = document.getElementById('gender').value;
    var email = document.getElementById('email').value;
    var contactNo = document.getElementById('contact_no').value;
    // var address = document.getElementById('address').value;
    // var street = document.getElementById('street').value;
    // var vt = document.getElementById('vt').value;
    // var country = document.getElementById('country').value;
    // var state = document.getElementById('state').value;
    // var district = document.getElementById('district').value;
    // var pincode = document.getElementById('pincode').value;
    var qualification = document.getElementById('qualification').value;
    var degree = document.getElementById('degree').value;
    var majorSubject = document.getElementById('major_subject').value;
    var graduation = document.getElementById('graduation').value;
    var year = document.getElementById('year').value;
    var resume = document.getElementById('resume').value;





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

// Job Title validation
if (job_title === '') {
document.getElementById('job_titleError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('job_title', 'job_titleError');
} else {
document.getElementById('job_titleError').style.display = 'none';
}



// Name validation
if (firstname === '') {
document.getElementById('firstnameError').innerText = 'Please enter your name.';
document.getElementById('firstnameError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('firstname', 'firstnameError' )
} else if (firstname.length < 2) {
document.getElementById('firstnameError').innerText = 'Name should be at least 2 characters long.';
document.getElementById('firstnameError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('firstname', 'firstnameError' )
} else if (!/^[a-zA-Z\s]+$/.test(firstname)) {
document.getElementById('firstnameError').innerText = 'Name should only contain letters and spaces.';
document.getElementById('firstnameError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('firstname', 'firstnameError' )
} else {
document.getElementById('firstnameError').style.display = 'none';
}

// Name validation
if (lastname === '') {
document.getElementById('lastnameError').innerText = 'Please enter your name.';
document.getElementById('lastnameError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('lastname', 'lastnameError' )
} else if (lastname.length < 2) {
document.getElementById('lastnameError').innerText = 'Name should be at least 2 characters long.';
document.getElementById('lastnameError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('lastname', 'lastnameError' )
} else if (!/^[a-zA-Z\s]+$/.test(lastname)) {
document.getElementById('lastnameError').innerText = 'Name should only contain letters and spaces.';
document.getElementById('lastnameError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('lastname', 'lastnameError' )
} else {
document.getElementById('lastnameError').style.display = 'none';
}


if (dob === '') {
document.getElementById('dobError').innerText = 'Please enter your date of birth.';
document.getElementById('dobError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('dob', 'dobError' )
} else {
// Validate date format (YYYY-MM-DD)
var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
if (!dateRegex.test(dob)) {
document.getElementById('dobError').innerText = 'Invalid date format. Please use the format YYYY-MM-DD.';
document.getElementById('dobError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('dob', 'dobError' )
} else {
// Validate if the date is in the past
var currentDate = new Date();
var inputDate = new Date(dob);

if (inputDate >= currentDate) {
 document.getElementById('dobError').innerText = 'Date of birth should be in the past.';
 document.getElementById('dobError').style.display = 'block';
 isValid = false;
 hideErrorMessageOnFocus('dob', 'dobError' )
} else {
 // Calculate age based on date of birth
 var ageDiff = currentDate.getFullYear() - inputDate.getFullYear();
 var monthDiff = currentDate.getMonth() - inputDate.getMonth();
 if (monthDiff < 0 || (monthDiff === 0 && currentDate.getDate() < inputDate.getDate())) {
   ageDiff--;
 }

 // Autofill age field
 document.getElementById('age').value = ageDiff;

 // Validate age
 var age = parseInt(ageDiff);
 if (isNaN(age) || age < 17) {
   document.getElementById('ageError').innerText = 'You must be at least 17 years old to register.';
   document.getElementById('ageError').style.display = 'block';
   isValid = false;
   hideErrorMessageOnFocus('age', 'ageError' )
 } else {
   document.getElementById('ageError').style.display = 'none';
 }
}
}
}


// Age validation
if (age === '') {
document.getElementById('ageError').textContent = 'Please enter your age.';
document.getElementById('ageError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('age', 'ageError');
} else if (isNaN(age)) {
document.getElementById('ageError').textContent = 'Please enter a valid age.';
document.getElementById('ageError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('age', 'ageError');
} else if (parseInt(age) < 17 || parseInt(age) > 35) {
document.getElementById('ageError').textContent = 'Age must be between 17 and 35.';
document.getElementById('ageError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('age', 'ageError');
} else {
document.getElementById('ageError').style.display = 'none';
}

// Gender validation
if (gender === '') {
document.getElementById('genderError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('gender', 'genderError' )
} else {
document.getElementById('genderError').style.display = 'none';
}

var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
var emailSpecialCharPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

var email = document.getElementById('email').value; // Assuming 'email' is the variable containing the user input.

if (email === '') {
document.getElementById('emailError').textContent = 'Email address is required.';
document.getElementById('emailError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('email', 'emailError');
} else if (!emailPattern.test(email)) {
document.getElementById('emailError').textContent = 'Invalid email address format.';
document.getElementById('emailError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('email', 'emailError');
} else if (!emailSpecialCharPattern.test(email)) {
document.getElementById('emailError').textContent = 'Email contains invalid special characters.';
document.getElementById('emailError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('email', 'emailError');
} else if (email.startsWith(' ') || email.endsWith(' ')) {
document.getElementById('emailError').textContent = 'Email address should not start or end with a space.';
document.getElementById('emailError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('email', 'emailError');
} else if (email.includes('..')) {
document.getElementById('emailError').textContent = 'Email address cannot contain consecutive dots.';
document.getElementById('emailError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('email', 'emailError');
} else {
document.getElementById('emailError').style.display = 'none';
}

// Mobile Number validation
var mobilePattern = /^\d{10}$/;

// Check if mobile number is empty
if (contactNo === '') {
document.getElementById('contactNoError').innerText = 'Mobile number is required.';
document.getElementById('contactNoError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contact_no', 'contactNoError');
}
// Check if mobile number matches the pattern and has no letters
else if (!mobilePattern.test(contactNo) || /\D/.test(contactNo)) {
document.getElementById('contactNoError').innerText = 'Invalid mobile number. Please enter a 10-digit number without any letters.';
document.getElementById('contactNoError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contact_no', 'contactNoError');
}
// Check if mobile number is in Indian format
else if (!/^[6789]\d{9}$/.test(contactNo)) {
document.getElementById('contactNoError').innerText = 'Please enter a valid Indian mobile number starting with 6,7,8 or 9.';
document.getElementById('contactNoError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('contact_no', 'contactNoError');
}
else {
document.getElementById('contactNoError').style.display = 'none';
}

// // Address validation
// if (address === '') {
// document.getElementById('addressError').style.display = 'block';
// isValid = false;
// hideErrorMessageOnFocus('address', 'addressError');
// } else {
// document.getElementById('addressError').style.display = 'none';
// }

// // Street validation
// if (street === '') {
// document.getElementById('streetError').style.display = 'block';
// isValid = false;
// hideErrorMessageOnFocus('street', 'streetError');
// } else {
// document.getElementById('streetError').style.display = 'none';
// }

// if (vt === '') {
// document.getElementById('vtError').style.display = 'block';
// isValid = false;
// hideErrorMessageOnFocus('vt', 'vtError');
// } else {
// document.getElementById('vtError').style.display = 'none';
// }

// if (country === '') {
// document.getElementById('countryError').style.display = 'block';
// isValid = false;
// hideErrorMessageOnFocus('country', 'countryError');
// } else {
// document.getElementById('countryError').style.display = 'none';
// }

// // State validation
// if (state === '') {
// document.getElementById('stateError').style.display = 'block';
// isValid = false;
// hideErrorMessageOnFocus('state', 'stateError');
// } else {
// document.getElementById('stateError').style.display = 'none';
// }

// // District validation
// if (district === '') {
// document.getElementById('districtError').style.display = 'block';
// isValid = false;
// hideErrorMessageOnFocus('district', 'districtError');
// } else {
// document.getElementById('districtError').style.display = 'none';
// }

// if (pincode === '') {
// document.getElementById('pincodeError').innerText = 'Please enter your postal code.';
// document.getElementById('pincodeError').style.display = 'block';
// isValid = false;
// hideErrorMessageOnFocus('pincode', 'pincodeError');
// } else {
// // Validate pincode format
// var pincodeRegex =/^[1-9][0-9]{5}$/;
// if (!pincodeRegex.test(pincode)) {
// document.getElementById('pincodeError').innerText = 'Invalid pincode format. Please enter a valid 6 digit postal code.';
// document.getElementById('pincodeError').style.display = 'block';
// isValid = false;
// hideErrorMessageOnFocus('pincode', 'pincodeError');
// } else if (pincode.length !== 6) {
// document.getElementById('pincodeError').innerText = 'Postal code should be exactly 6 characters long.';
// document.getElementById('pincodeError').style.display = 'block';
// isValid = false;
// hideErrorMessageOnFocus('pincode', 'pincodeError');
// } else {
// document.getElementById('pincodeError').style.display = 'none';
// }
// }

// Qualification validation
if (qualification === '') {
document.getElementById('qualificationError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('qualification', 'qualificationError');
} else {
document.getElementById('qualificationError').style.display = 'none';
}

 // Degree validation
 if (degree === '') {
document.getElementById('degreeError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('degree', 'degreeError');
} else {
document.getElementById('degreeError').style.display = 'none';
}

// Major Subject validation
if (majorSubject === '') {
document.getElementById('majorSubjectError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('major_subject', 'majorSubjectError');
} else {
document.getElementById('majorSubjectError').style.display = 'none';
}

// Graduation validation
if (graduation === '') {
document.getElementById('graduationError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('graduation', 'graduationError');
} else {
document.getElementById('graduationError').style.display = 'none';
}

// Year of Passing validation
if (year === '') {
document.getElementById('yearError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('year', 'yearError');
} else {
document.getElementById('yearError').style.display = 'none';
}

if (resume === '') {
document.getElementById('resumeError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('resume', 'resumeError');
} else {
// Validate file type
var allowedExtensions = ['.pdf'];
var fileExtension = resume.substring(resume.lastIndexOf('.')).toLowerCase();

if (allowedExtensions.indexOf(fileExtension) === -1) {
document.getElementById('resumeError').innerText = 'Invalid file type. Only PDF files are allowed.';
document.getElementById('resumeError').style.display = 'block';
isValid = false;
hideErrorMessageOnFocus('resume', 'resumeError');
} else {
// Validate file size
var maxSizeInBytes = 250 * 1024; // 250KB
var fileSizeInBytes = ""/* Calculate the file size of the uploaded resume */;

if (fileSizeInBytes > maxSizeInBytes) {
 document.getElementById('resumeError').innerText = 'File size exceeds the maximum limit of 250KB.';
 document.getElementById('resumeError').style.display = 'block';
 isValid = false;
 hideErrorMessageOnFocus('resume', 'resumeError');
} else {
 document.getElementById('resumeError').style.display = 'none';
}
}
}



return isValid;
}

document.getElementById('registrationForm').addEventListener('submit', function (event) {
event.preventDefault();

var isValid = validateForm();
if (isValid) {
this.submit();
}
});


function calculateAgeAndFillAgeField() {
var dobInput = document.getElementById('dob');
var ageInput = document.getElementById('age');

var dob = dobInput.value;
if (dob) {
 var currentDate = new Date();
 var inputDate = new Date(dob);

 var ageDiff = currentDate.getFullYear() - inputDate.getFullYear();
 var monthDiff = currentDate.getMonth() - inputDate.getMonth();
 if (monthDiff < 0 || (monthDiff === 0 && currentDate.getDate() < inputDate.getDate())) {
   ageDiff--;
 }

 ageInput.value = ageDiff;
} else {
 ageInput.value = '';
}
}

var dobInput = document.getElementById('dob');
dobInput.addEventListener('input', calculateAgeAndFillAgeField);

