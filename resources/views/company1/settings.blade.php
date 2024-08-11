<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
<title>Dashboard</title>

@include('layouts.company_header')

<style>
        .error-message {
        display: none;
        color: rgb(233, 13, 13);
    }
    .alert {
        background-color: #f0f0f0;
        padding: 10px;
    }
    .alert-warning {
        padding: 10px;
        color: #ff0000;
        background-color: rgba(228, 164, 99, 0.2)
    }

    /* For Chrome, Firefox, Safari, and Edge */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* For Firefox */
input[type="number"] {
  -moz-appearance: textfield;
}

    </style>


</head>
<body>

<div class="main-wrapper">

    @include('layouts.company_sidebar')
    @include('layouts.alert')


<div class="page-wrapper">
    <div class="content mt-5">
        <div class="row">
            <div class="col-lg-12">
                <form class="text-center" id="registrationForm" action="{{url('/employer/profile_update')}}"  enctype="multipart/form-data" method="POST">
                    @csrf
                    <!-- Inside the form section -->
                    <div class="mb-3">
                        <h3 class="page-title">Edit Company Profile</h3>
                        <a href="#" class="float-end" data-toggle="tooltip" data-placement="top" title="Edit">
                            <!-- <i class="fas fa-edit"></i> -->
                        </a>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="companyName">Company Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter company name" name="company_name" id="company_name" maxlength="100" value="{{$emp->company_name}}" onblur="validateField(this)" onkeydown="return validateCompanyName(event)" readonly>
                                <span id="company_nameError" class="error-message alert alert-warning">Please Enter Your Company Name</span>
                            </div>
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


<div class="col-md-4">
    <div class="form-group">
        <label for="city">Company type <span class="text-danger">*</span></label>
        <select id="company_type" class="form-control" placeholder="Select your Company Type" name="company_type" onblur="validateField(this)">
            <option value="">Select Your Company Type</option>
            <option value="private limited company" {{ $emp->company_type === 'private limited company' ? 'selected' : '' }}>Private Limited Company</option>
            <option value="public limited company" {{ $emp->company_type === 'public limited company' ? 'selected' : '' }}>Public Limited Company</option>
            <option value="partnership firm" {{ $emp->company_type === 'partnership firm' ? 'selected' : '' }}>Partnership Firm</option>
            <option value="limited liability" {{ $emp->company_type === 'limited liability' ? 'selected' : '' }}>Limited Liability Partnership</option>
            <option value="sole proprietorship" {{ $emp->company_type === 'sole proprietorship' ? 'selected' : '' }}>Sole Proprietorship</option>
        </select>
        <span id="company_typeError" class="error-message alert alert-warning">Please select your company type</span>
    </div>
</div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="state">Register Number</label>
                <input class="form-control" name="registration_no" id="registration_no" placeholder="Register number" value="{{$emp->registration_no}}">
            </div>
        </div>

                        <div class="col-md-4">
    <div class="form-group">
        <label for="year_of_founding">Year of Founding <span class="text-danger">*</span></label>
        <div>
            <select id="year_of_founding" class="form-control" name="year_of_founding" onblur="validateField(this)" onchange="validateYear()">
                <option value="">Select Year</option>
                <!-- Add other years as options -->
            </select>
        </div>
        <span id="yearofFoundingError" class="error-message alert alert-warning">Please select the founding year of your company</span>
    </div>
</div>

<script>
    var currentYear = new Date().getFullYear();
    var startYear = 1900;
    var yearSelect = document.getElementById("year_of_founding");

    for (var year = currentYear; year >= startYear; year--) {
        var option = document.createElement("option");
        option.value = year;
        option.textContent = year;

        // Check if the current year matches the value from $emp->year_of_founding
        var empYear = "{{$emp->year_of_founding}}"; // Replace this with the actual value from your server
        if (year.toString() === empYear) {
            option.selected = true;
        }

        yearSelect.appendChild(option);
    }

    function validateYear() {
        var yearSelect = document.getElementById("year_of_founding");
        var yearError = document.getElementById("yearofFoundingError");

        // Check if a year is selected
        if (yearSelect.value !== "") {
            yearError.style.display = "none"; // Hide the error message
        } else {
            yearError.style.display = "block"; // Show the error message
        }
    }
</script>






                                     <!-- mobile number -->

                                     <div class="col-md-4">
			<div class="form-group">
			  <label>Contact Mobile Number</label>
			  <input type="number"  class="form-control" value="{{$emp->phone}}" name="phone" placeholder="Enter the mobile number">
           <!-- <span id="phoneError" class="error-message alert alert-warning ">Please Enter the Contact Mobile_Number</span>-->
			</div>
		  </div>




                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fax">Email</label>
                                <input type="text" class="form-control" placeholder="Enter email" name="email" id="contact_email" value="{{$emp->email}}" onblur="validateField(this)" onkeyup="this.value=this.value.replace(/[^a-z0-9@._-]/g,'')" readonly>
                                <span id="emailError" class="error-message  alert alert-warning">Please enter your mail id</span>
                            </div>
                        </div>

                        <div class="col-md-4">
    <div class="form-group">
        <label for="description">Company Information</label>
        <textarea placeholder="Enter organizational overview" class="form-control" name="description" id="description" rows="5" maxlength="6000" onblur="validateField(this)" oninput="validateDescription(this)">{{$emp->description}}</textarea>
        <span id="descriptionError" class="error-message alert alert-warning">Please enter a company information between 20 and 5000 characters.</span>
    </div>
</div>

<script>
    function validateForm() {
        // Your existing form validation logic

        // Additional validation for description
        const description = document.getElementById('description');
        const descriptionError = document.getElementById('descriptionError');
        const minLength = 20;

        if (description.value.length < minLength) {
            descriptionError.textContent = Company Information should be at least ${minLength} characters long.;
            descriptionError.style.display = 'block';
            return false; // Prevent form submission
        } else if (description.value.length >= 500) {
            descriptionError.textContent = 'Company Information should not exceed 500 characters.';
            descriptionError.style.display = 'block';
            return false; // Prevent form submission
        } else {
            descriptionError.style.display = 'none';
            return true; // Allow form submission
        }
    }
</script>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="building">Building No & Name <span class="text-danger">*</span></label>
                                <input type="text" placeholder="Enter building no" class="form-control" name="door_no" id="building_no" maxlength="100" value="{{$emp->door_no}}" onblur="validateField(this)" oninput="validateBuilding(event)">
                                <span id="building_noError" class="error-message alert alert-warning" style="display: none;">Please enter your Building No & Name</span>
                            </div>
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

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="building">Area/Locality <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Enter the Area/Locality" name="area" id="area" maxlength="50" value="{{$emp->area}}" onblur="validateField(this)" oninput="validateArea(event)">
                                <span id="areaError" class="error-message alert alert-warning" style="display: none;">Please enter your Area/Locality</span>
                            </div>
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


<div class="col-md-4">
    <div class="form-group">
      <label for="country">Country <span class="text-danger">*</span></label>
      {{-- <select placeholder="Enter your country" class="form-control" name="country"  id="country">
      <option value="">Select Country</option>

      </select> --}}
      <input type="text" class="form-control" placeholder="Enter the Country" name="country" id="country" onkeypress="return /[a-zA-Z\s]/i.test(event.key) && this.value.length < 30" value="{{$emp->country}}">
      <span id="countryError" class="error-message alert alert-warning">Please select your country</span>
      </div>
      </div>

      <div class="col-md-4">
    <div class="form-group">
      <label for="state">State <span class="text-danger">*</span></label>
      <input type="text" class="form-control" placeholder="Enter the State" name="state" id="state" onkeypress="return /[a-zA-Z\s]/i.test(event.key) && this.value.length < 30" value="{{$emp->state}}">
      <span id="stateError" class="error-message alert alert-warning">Please select your state</span>
  </div>
  </div>

  <div class="col-md-4">
    <div class="form-group">
      <label for="district">District <span class="text-danger">*</span></label>
      {{-- <select class="form-control" placeholder="Enter your district" name="district" id="district">
          <option>Select District</option>
      </select> --}}
      <input type="text" class="form-control" placeholder="Enter the District" name="district" id="district" onkeypress="return /[a-zA-Z\s]/i.test(event.key) && this.value.length < 30" value="{{$emp->district}}">
      <span id="districtError" class="error-message alert alert-warning">Please select your district</span>
  </div>
  </div>

                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label for="phoneNumber">state</label>
                                <select placeholder="Enter your state" class="form-control" name="state" id="state" onblur="validateField(this)" >
                                 <option value="">Select State</option>
                                </select>
                                <span id="stateError" class="error-message alert alert-warning">Please select your state</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="postalCode">city</label>
                                <select placeholder="Enter your district" class="form-control" name="district" id="district" value="{{$emp->district}}" onblur="validateField(this)">
                                 <option value="">Select District</option>
                                </select>
                                <span id="districtError" class="error-message alert alert-warning">Please select your district</span>
                            </div>
                        </div> --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="websiteURL">Postal code <span class="text-danger">*</span></label>
                                <input type="number" placeholder="Enter your pincode" class="form-control" name="pincode" id="pincode" value="{{$emp->pincode}}" onblur="validateField(this)" onkeypress="return event.charCode === 0 || (/\d/.test(String.fromCharCode(event.charCode)) && this.value.length < 6)">
                                <span id="pincodeError" class="error-message alert alert-warning">Please enter a valid pincode</span>
                            </div>
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


						<div class="col-md-4">
                            <div class="form-group">
                                <label for="websiteURL">Company Logo</label>
                                <input type="file" name="company_logo" id="photo" class="form-control" accept=".jpg, .jpeg" onblur="validateField(this)">
                                <span id="photoError" class="error-message alert alert-warning">Please upload your Company Logo in JPG or JPEG format</span>
                                <!-- <input type="file"  class="form-control" name="company_logo" id="resume"> -->
                            <input type="hidden" name="oresume" id="" value="{{$emp->company_logo}}">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary buttonedit mr-5 mt-5">Update</button>
                 {{-- <a href="{{ url('/employer/password_change')}}"><button type="button" class="btn btn-primary buttonedit mr-5 mt-5">Change Password</button></a> --}}
                </form>
            </div>
        </div>
    </div>
</div>
</div>


@include('layouts.company_footer')
<script>
		$(function () {
			$('#datetimepicker3').datetimepicker({
				format: 'LT'

			});
		});
	</script>

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
        var company_name = document.getElementById('company_name').value;
        var company_type = document.getElementById('company_type').value;
        var year_of_founding = document.getElementById('year_of_founding').value;
        // var contacttype = document.getElementById('contacttype').value;
    //  var phoneField = document.getElementById('phone').value;
    //  var landlineField  = document.getElementById('landline').value;
    // var email = document.getElementById('contact_email').value;
    var description = document.getElementById('description').value;
    var building_no = document.getElementById('building_no').value;
    var area = document.getElementById('area').value;
    var country = document.getElementById('country').value;
    var state = document.getElementById('state').value;
    var district = document.getElementById('district').value;
    var pincode = document.getElementById('pincode').value;
    var photo = document.getElementById('photo').value;

        var isValid = true;


        function hideErrorMessageOnFocus(inputId, errorId) {
            var inputElement = document.getElementById(inputId);
            var errorElement = document.getElementById(errorId);

            inputElement.addEventListener('focus', function () {
                errorElement.style.display = 'none';
            });
        }

        // Company Name validation with length limit (maximum of 100 characters)
        if (company_name === '') {
            displayError('Please enter your company name.');
        }
        else if (company_name.length < 2) {
            displayError('Company Name should be at least 2 characters long.');
        }
        else if (company_name.length > 100) {
            displayError('Company Name should not exceed 100 characters.');
        }
        else if (/^\d+$/.test(company_name)) {
            displayError('Company Name should not consist of only numbers.');
        }
        else if (company_name.charAt(0) === ' ' || /\s\s/.test(company_name)) {
            displayError('Company Name should not start with a space, and continuous gaps are not allowed.');
        }
        else if (/[^a-zA-Z0-9\s]/.test(company_name)) {
            const specialCharCount = (company_name.match(/[^a-zA-Z0-9\s]/g) || []).length;
            if (specialCharCount !== 1) {
                displayError('Company Name should contain only one special character.');
            } else {
                hideErrorMessage('company_nameError');
            }
        }
        else {
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
        }
        else {
            document.getElementById('company_typeError').style.display = 'none';
        }


        // year of founding
        if (year_of_founding === '') {
            document.getElementById('yearofFoundingError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('year_of_founding', 'yearofFoundingError');
        }
        else {
            document.getElementById('yearofFoundingError').style.display = 'none';
        }








        function hideErrorMessage(errorId) {
            document.getElementById(errorId).style.display = 'none';
        }



        if (description.trim() === '') {
            document.getElementById('descriptionError').style.display = 'none';
        }
        else if (description.length > 0) {
            // document.getElementById('descriptionError').innerText = 'Company Information should not exceed 5000 characters.';
            document.getElementById('descriptionError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('description', 'descriptionError');
        }
        else if (description.length > 5000) {
            document.getElementById('descriptionError').innerText = 'Company Information should not exceed 5000 characters.';
            document.getElementById('descriptionError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('description', 'descriptionError');
        }
        else if (/(.)\1{2,}/.test(description)) {
            document.getElementById('descriptionError').innerText = 'Company Information should not contain continuous special characters.';
            document.getElementById('descriptionError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('description', 'descriptionError');
        }
        else {
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
















        // if (building_no.trim() === '') {
        //     document.getElementById('building_noError').innerText = 'Please enter your building number.';
        //     document.getElementById('building_noError').style.display = 'block';
        //     isValid = false;
        //     hideErrorMessageOnFocus('building_no', 'building_noError');
        // }
        // else if (building_no.length > 100) {
        //     document.getElementById('building_noError').innerText = 'Building number should not exceed 100 characters.';
        //     document.getElementById('building_noError').style.display = 'block';
        //     isValid = false;
        //     hideErrorMessageOnFocus('building_no', 'building_noError');
        // }
        // else if (/(.)\1{2,}/.test(building_no)) {
        //     document.getElementById('building_noError').innerText = 'Building Number should not contain continuous special characters.';
        //     document.getElementById('building_noError').style.display = 'block';
        //     isValid = false;
        //     hideErrorMessageOnFocus('building_no', 'building_noError');
        // }
        // else {
        //     document.getElementById('building_noError').style.display = 'none';
        // }






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


        // if (area === '') {
        //     document.getElementById('areaError').innerText = 'Please enter your area.';
        //     document.getElementById('areaError').style.display = 'block';
        //     isValid = false;
        //     hideErrorMessageOnFocus('area', 'areaError');
        // }
        // else if (area.length > 50) {
        //     document.getElementById('areaError').innerText = 'Area should not exceed 50 characters.';
        //     document.getElementById('areaError').style.display = 'block';
        //     isValid = false;
        //     hideErrorMessageOnFocus('area', 'areaError');
        // }
        // else if (/[^a-zA-Z0-9\s]/.test(area)) {
        //     document.getElementById('areaError').innerText = 'Area should only contain alphanumeric characters and spaces.';
        //     document.getElementById('areaError').style.display = 'block';
        //     isValid = false;
        //     hideErrorMessageOnFocus('area', 'areaError');
        // }
        // else {
        //     document.getElementById('areaError').style.display = 'none';
        // }

        // Country validation
        if (country === '') {
            document.getElementById('countryError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('country', 'countryError');
        }
        else {
            document.getElementById('countryError').style.display = 'none';
        }

        // State validation
        if (state === '') {
            document.getElementById('stateError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('state', 'stateError');
        }
        else {
            document.getElementById('stateError').style.display = 'none';
        }

        // District validation
        if (district === '') {
            document.getElementById('districtError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('district', 'districtError');
        }
        else {
            document.getElementById('districtError').style.display = 'none';
        }

        // Pincode validation
        if (pincode === '') {
            document.getElementById('pincodeError').innerText = 'Please enter your postal code.';
            document.getElementById('pincodeError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('pincode', 'pincodeError');
        }
        else {
            // Validate pincode format
            var pincodeRegex = /^[1-9][0-9]{5}$/;
            if (!pincodeRegex.test(pincode)) {
                document.getElementById('pincodeError').innerText = 'Invalid pincode format. Please enter a valid 6-digit postal code.';
                document.getElementById('pincodeError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('pincode', 'pincodeError');
            }
            else if (pincode.length !== 6) {
                document.getElementById('pincodeError').innerText = 'Postal code should be exactly 6 characters long.';
                document.getElementById('pincodeError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('pincode', 'pincodeError');
            }
            else {
                document.getElementById('pincodeError').style.display = 'none';
            }
        }

        var photoInput = document.getElementById('photo');
        var photoError = document.getElementById('photoError');

        if (!photoInput.files[0]) {
            photoError.style.display = 'none';
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
            }
            else if (fileSizeInBytes > maxSizeInBytes) {
                // Handle file size exceeding the limit
                photoError.innerText = 'File size exceeds the maximum limit of 1000KB.';
                photoError.style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus(photoInput, photoError);
            }
            else {
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

</body>
</html>
