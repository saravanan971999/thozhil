<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Registration Form</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"  />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>

<style>
    body {
        background-color: #e6f7ff;
    }

    .container {
      background-color: #ffffff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      padding: 30px;
      margin-top: 50px;
    }

    .form-label {
      font-weight: bold;
    }

    .form-select{
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 15px;
    }

    .form-control {
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 15px;
    }

    .btn-secondary, .btn-primary {
      margin-top: 20px;
    }
    .error-message {
      color: red;
    }
  </style>



<body>
    <h1 class="text-center">Sign-up and apply here</h1>
    <h4 class="text-center">1000+ companies hiring on Thozhil</h4>

<div class="container mt-5">
   
  <form   method="POST" action="{{url('submit-form')}}" id="registrationForm" enctype="multipart/form-data">
    @csrf
    <div class="row g-4">
        <div class="col-md-4">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="Enter Firstname" id="firstname" name="firstname">
            <div class="error-message" id="firstnameError"></div>
         
          </div>     
          
          <script>
                        let spaceCount = 0;
                        let lastKeyWasSpace = false;

                        document.getElementById("firstname").addEventListener("input", handleInput);

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
         


         <div class="col-md-4">
    <label for="lastname" class="form-label">Last Name</label>
    <input type="text" class="form-control" placeholder="Enter Lastname" id="lastname" name="lastname">
    <div class="error-message" id="lastnameError"></div>
</div>

<script>
    document.getElementById("lastname").addEventListener("input", handleInput);

    function handleInput(event) {
        const inputText = event.target.value;
        const sanitizedText = inputText.replace(/[^a-zA-Z\s]/g, ''); // Remove characters other than letters and spaces
        event.target.value = sanitizedText;
    }
</script>

<div class="col-md-4">
    <label for="dob" class="form-label">Date Of Birth</label>
    <input type="date" class="form-control" id="dob" name="dob">
    <div class="error-message" id="dobError"></div>
</div>

<script>
    // Calculate the date ranges for 17 and 35 years ago from today
    var currentDate = new Date();
    var maxDate = new Date(currentDate.getFullYear() - 45, currentDate.getMonth(), currentDate.getDate());
    var minDate = new Date(currentDate.getFullYear() - 17, currentDate.getMonth(), currentDate.getDate());

    // Format the date to be in YYYY-MM-DD format for setting the min and max attributes
    var maxDateString = maxDate.toISOString().split('T')[0];
    var minDateString = minDate.toISOString().split('T')[0];

    // Set the min and max attributes for the input element
    document.getElementById("dob").setAttribute("min", maxDateString);
    document.getElementById("dob").setAttribute("max", minDateString);

    // Add event listener to check if the entered date is after 2007
    document.getElementById("dob").addEventListener("change", function() {
        var inputDate = new Date(this.value);
        var cutoffDate = new Date("2007-01-01"); // Date after which the input should not be allowed
        var errorDiv = document.getElementById("dobError");

        if (inputDate > cutoffDate) {
            errorDiv.innerText = "Please enter a date on or before 2007.";
            this.value = ""; // Clear the input value
        } else {
            errorDiv.innerText = "";
        }
    });
</script>
<script>

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
</script>


      <div class="col-md-4">
        <label for="age" class="form-label">Age</label>
        <input type="text" class="form-control" placeholder="Enter Your Age" id="age"  name="age"  readonly >
        <div class="error-message"id="ageError"></div>
      </div>


      <div class="col-md-4">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" id="gender" name="gender">
        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <!--<option value="other">Other</option>-->
                        <option value="not willing to reveal">Not Willing to Reveal</option>
         
          <!-- Add sector options here -->
        </select>
        <div class="error-message"id="genderError"></div>
      </div>


      <div class="col-md-4">
        <label for="email" class="form-label">Email ID</label>
        <input type="email" class="form-control" id="email"  value="{{ $user->email }}" name="email">
        <!-- <div class="error-message" id="errorEmail"></div> -->
      </div>

      <div class="col-md-4">
        <label for="contact_no" class="form-label">Contact Number</label>
        <input type="text"  value="{{ $user->phone }}" class="form-control" placeholder="Enter Contact Number"id="contact_no" name="contact_no" >
        <div class="error-message" id="contactNoError"></div>
    </div>

    <div class="col-md-4">
        <label for="address"" class="form-label">Address</label>
        <input type="text" class="form-control" placeholder="Enter Your Door No & House Name" name="address" id="address">
        <div class="error-message"id="addressError"></div>
      </div>



      <script>
        const addressInput = document.getElementById('address');
  
        addressInput.addEventListener('input', function(event) {
          const minLength = parseInt(this.getAttribute('minlength'));
          const maxLength = parseInt(this.getAttribute('maxlength'));
  
          if (this.value.length >= maxLength) {
            event.preventDefault();
          } else if (this.value.length < minLength) {
            this.setCustomValidity('Please enter at least 1 characters.');
          } else {
            // Check for continuous spaces or spaces at the beginning
            const trimmedValue = this.value.trim();
            if (trimmedValue.startsWith(' ') || /\s{2,}/.test(this.value)) {
              this.value = trimmedValue; // Remove extra spaces
              event.preventDefault();
            }
            this.setCustomValidity('');
          }
      });
      </script>


      <div class="col-md-4">
        <label for="street" class="form-label">Street</label>
        <input type="text" class="form-control" placeholder="Enter Your Street" id="street" name="street">
        <div class="error-message" id="streetError"></div>
      </div>


      <script>
        const streetInput = document.getElementById('street');
      
        streetInput.addEventListener('input', function(event) {
          const minLength = parseInt(this.getAttribute('minlength'));
          const maxLength = parseInt(this.getAttribute('maxlength'));
      
          if (this.value.length >= maxLength) {
            event.preventDefault();
          } else if (this.value.length < minLength) {
            this.setCustomValidity('Please enter at least 2 characters.');
          } else {
            // Check for continuous spaces or spaces at the beginning
            const trimmedValue = this.value.trim();
            if (trimmedValue.startsWith(' ') || /\s{2,}/.test(this.value)) {
              this.value = trimmedValue; // Remove extra spaces
              event.preventDefault();
            }
            this.setCustomValidity('');
          }
      });
      </script>


      <div class="col-md-4">
        <label  for="vt" class="form-label">Village/Town</label>
        <input type="text" class="form-control" placeholder="Enter Your Village/Town" name="vt" id="vt" >
        <div class="error-message"id="vtError"></div>
      </div>

      <script>
        const vtInput = document.getElementById('vt');
      
        vtInput.addEventListener('input', function(event) {
          const minLength = parseInt(this.getAttribute('minlength'));
          const maxLength = parseInt(this.getAttribute('maxlength'));
      
          if (this.value.length >= maxLength) {
            event.preventDefault();
          } else if (this.value.length < minLength) {
            this.setCustomValidity('Please enter at least 2 characters.');
          } else {
            // Check for continuous spaces or spaces at the beginning
            const trimmedValue = this.value.trim();
            if (trimmedValue.startsWith(' ') || /\s{2,}/.test(this.value)) {
              this.value = trimmedValue; // Remove extra spaces
              event.preventDefault();
            }
            this.setCustomValidity('');
          }
      });
      </script>
      


      <div class="col-md-4">
        <label for="country" class="form-label">Country</label>
        <select class="form-select" id="country" name="country" >
          <option value="">Select Country</option>
        
          <!-- Add sector options here -->
        </select>
        <div class="error-message"  id="countryError" ></div>
      </div>




      <div class="col-md-4">
        <label for="state" class="form-label">State</label>
        <select class="form-select" id="state" name="state">
          <option value="">Select state</option>
       
          <!-- Add sector options here -->
        </select>
        <div class="error-message" id="stateError"></div>
      </div>

      <div class="col-md-4">
        <label for="state" class="form-label">District</label>
        <select class="form-select"  id="district" name="district">
          <option value="">Select District</option>
    
          <!-- Add sector options here -->
        </select>
        <div class="error-message" id="districtError"></div>
      </div>

      <div class="col-md-4">
        <label  for="pincode" class="form-label">Pincode</label>
        <input type="text" class="form-control" name="pincode" id="pincode">
        <div class="error-message" id="pincodeError"></div>
    </div>

    <script>
      document.getElementById('pincode').addEventListener('input', function(event) {
    var inputValue = event.target.value;
    var sanitizedValue = inputValue.replace(/[^\d]/g, ''); // Remove non-digit characters
    event.target.value = sanitizedValue; // Update input value
});
      document.getElementById('pincode').addEventListener('input', function () {
          if (this.value.length > 6) {
              this.value = this.value.slice(0, 6);
          }
      });
  </script>


  <div class="col-md-4">
    <label  for="degree" class="form-label">Degree</label>
    <select class="form-select"  id="degrees" name="degrees[]" multiple name = "multiple-degrees" onchange="showOther_degree()"  >
      <option value="">Select the Preferred Degrees</option>
      <option value="B.E.Aeronautical Engineering">B.E.Aeronautical Engineering</option>
      <option value="B.E.Advanced Architectural Design">B.E.Advanced Architectural Design</option>
      <option value="B.E.Agriculture Engineering">B.E.Agriculture Engineering</option>
      <option value="B.E.Architecture">B.E.Architecture</option>
      <option value="B.E.Artificial Intelligence">B.E.Artificial Intelligence</option>
      <option value="B.Sc.AstroPhysics">B.Sc.AstroPhysics</option>
      <option value="B.E.Automobile Engineering">B.E.Automobile Engineering</option>
      <option value="B.Sc.Bio Chemistry">B.sc.Bio Chemistry</option>
      <option value="B.Sc.Bioinformatics">B.Sc.Bioinformatics</option>
      <option value="B.Sc.Biology">Biology</option>
      <option value="B.E.Biomedical engineering">B.E.Biomedical engineering</option>
      <option value="BBA Business Administration">BBA Business Administration</option>
      <option value="BBA Business Information Systems">BBA Business Information Systems</option>
      <option value="B.E.Chemical engineering">B.E.Chemical engineering</option>
      <option value="B.Ed.Childhood Studies">B.Ed.Childhood Studies</option>
      <option value="B.E.Civil and Structural">B.E.Civil and Structural</option>
      <option value="B.E.Civil Engineering">B.E.Civil Engineering</option>
      <option value="B.Com.Commerce">B.Com.Commerce</option>
      <option value="B.Sc.Computer Science">B.Sc.Computer Science</option>
      <option value="B.E.Computer Science engineering">B.E.Computer Science engineering</option>
      <option value="B.E.Data Analytics for Business">B.E.Data Analytics for Business</option>
      <option value="B.E.Data science">B.E.Data science</option>
      <option value="B.Sc.Economics">B.Sc.Economics</option>
      <option value="B.Ed.Education">B.Ed.Education</option>
      <option value="B.Sc.Electrical">B.Sc.Electrical</option>
      <option value="B.E.Electrical engineering">B.E.Electrical engineering</option>
      <option value="B.E.Electronics and Communication">B.E.Electronics and Communication</option>
      <option value="B.E.Electronics and Communication Engineering">B.E.Electronics and Communication Engineering</option>
      <option value="B.E.Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
      <option value="Engineering">Engineering</option>
      <option value="BCA Computer Science">BCA Computer Science</option>
      <option value="BCA Information Technology">BCA Information Technology</option>
      <option value="BCA Software Engineering">BCA Software Engineering</option>
      <option value="BBA Engineering Management"> BBA Engineering Management</option>
      <option value="B.Sc.Environment and Energy Management">B.Sc.Environment and Energy Management</option>
      <option value="B.Sc.Environmental Science">B.Sc.Environmental Science</option>
      <option value="BBA Finance">BBA Finance</option>
      <option value="B.E.Fire and Safety Engineering">B.E.Fire and Safety Engineering</option>
      <option value="B.Sc.Forensic Science">B.Sc.Forensic Science</option>
      <option value="B.A.Geography">B.A.Geography</option>
      <option value="BBA Global Logistics">BBA Global Logistics</option>
      <option value="B.Ed.Guidance">B.Ed.Guidance</option>
      <option value="BBA Healthcare Administration"> BBA Healthcare Administration</option>
      <option value="B.A.Historic Preservation">B.A.Historic Preservation</option>
      <option value="B.A.History">B.A.History</option>
      <option value="B.E.History of Architecture and Town Planning">B.E.History of Architecture and Town Planning</option>
      <option value="BBA Human Resources">BBA Human Resources</option>
      <option value="B.E.Industrial engineering">B.E.Industrial engineering</option>
      <option value="B.E.Information Technology">B.E.Information Technology</option>
      <option value="B.E.Interior and Spatial design">B.E.Interior and Spatial design</option>
      <option value="B.E.International Architectural Regeneration and Development">B.E.International Architectural Regeneration and Development</option>
      <option value="BBA International Business">BBA International Business</option>
      <option value="B.A.Journalism">B.A.Journalism</option>
      <option value="BBA Leadership and Entreprenuer">BBA Leadership and Entreprenuer</option>
      <option value="B.A.Lingustics">B.A.Lingustics</option>
      <option value="BBA Logistics and Supplychain">BBA Logistics and Supplychain</option>
      <option value="B.A.MacroEconomics">B.A.MacroEconomics</option>
      <option value="BBA Marketing">BBA Marketing</option>
      <option value="B.Sc.Mathematics">B.Sc.Mathematics</option>
      <option value="B.E.Mechanical">B.E.Mechanical</option>
      <option value="B.E.Mechanical engineering">B.E.Mechanical engineering</option>
      <option value="B.E.Nuclear engineering">B.E.Nuclear engineering</option>
      <option value="B.Sc.Nursing">B.Sc.Nursing</option>
      <option value="B.A.Physics">B.A.Physics</option>
      <option value="B.A.Political Science">B.A.Political Science</option>
      <option value="B.E.Product design and manufacturing">B.E.Product design and manufacturing</option>
      <option value="B.E.Production Engineering">B.E.Production Engineering</option>
      <option value="B.Sc.Psychology">B.Sc.Psychology</option>
      <option value="B.A.Public Administration">B.A.Public Administration</option>
      <option value="B.E.Regional Planning">B.E.Regional Planning</option>
      <option value="B.E.Robotics">B.E.Robotics</option>
      <option value="BBA Rural Development">BBA Rural Development</option>
      <option value="BBA Safety Management">BBA Safety Management</option>
      <option value="B.A.Social Policy">B.A.Social Policy</option>
      <option value="B.A.Social Services">B.A.Social Services</option>
      <option value="B.E.Software Engineering">B.E.Software Engineering</option>
      <option value="B.A.Sports Management">B.A.Sports Management</option>
      <option value="B.E.Systems engineering">B.E.Systems engineering</option>
      <option value="B.A.Tamil">B.A.Tamil</option>
      <option value="B.E.Thermal Engineering">B.E.Thermal Engineering</option>
      <option value="B.E.Urban Architecture">B.E.Urban Architecture</option>
      <option value="B.Sc.Urban Studies">B.Sc.Urban Studies</option>
      <option value="B.Sc.Visual Communication">Visual Communication</option>
      <option value="B.E.Welding Technology">Welding Technology</option>
      <option value="B.Ed.Women Studies">B.Ed.Women Studies</option>
      <option value="B.Sc.Zoology">Zoology</option>
      <option value="M.E.Aeronautical Engineering">M.E.Aeronautical Engineering</option>
      <option value="M.E.Advanced Architectural Design">M.E.Advanced Architectural Design</option>
      <option value="M.E.Agriculture Engineering">M.E.Agriculture Engineering</option>
      <option value="M.E.Architecture">M.E.Architecture</option>
      <option value="M.E.Artificial Intelligence">M.E.Artificial Intelligence</option>
      <option value="M.Sc.AstroPhysics">M.Sc.AstroPhysics</option>
      <option value="M.E.Automobile Engineering">M.E.Automobile Engineering</option>
      <option value="M.Sc.Bio Chemistry">M.Sc.Bio Chemistry</option>
      <option value="M.Sc.Bioinformatics">M.Sc.Bioinformatics</option>
      <option value="M.Sc.Biology">Biology</option>
      <option value="M.E.Biomedical engineering">M.E.Biomedical engineering</option>
      <option value="MBA Business Administration">MBA Business Administration</option>
      <option value="MBA Business Information Systems">MBA Business Information Systems</option>
      <option value="M.E.Chemical engineering">M.E.Chemical engineering</option>
      <option value="M.Ed.Childhood Studies">M.Ed.Childhood Studies</option>
      <option value="M.E.Civil and Structural">M.E.Civil and Structural</option>
      <option value="M.E.Civil Engineering">M.E.Civil Engineering</option>
      <option value="M.Com.Commerce">M.Com.Commerce</option>
      <option value="M.Sc.Computer Science">M.Sc.Computer Science</option>
      <option value="M.E.Computer Science engineering">M.E.Computer Science engineering</option>
      <option value="M.E.Data Analytics for Business">M.E.Data Analytics for Business</option>
      <option value="M.E.Data science">M.E.Data science</option>
      <option value="M.Sc.Economics">M.Sc.Economics</option>
      <option value="M.Ed.Education">M.Ed.Education</option>
      <option value="M.Sc.Electrical">M.Sc.Electrical</option>
      <option value="M.E.Electrical engineering">M.E.Electrical engineering</option>
      <option value="M.E.Electronics and Communication">M.E.Electronics and Communication</option>
      <option value="M.E.Electronics and Communication Engineering">M.E.Electronics and Communication Engineering</option>
      <option value="M.E.Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
      <option value="Engineering">Engineering</option>
      <option value="MCA Computer Science">MCA Computer Science</option>
      <option value="MCA Information Technology">MCA Information Technology</option>
      <option value="MCA Software Engineering">MCA Software Engineering</option>
      <option value="MBA Engineering Management"> MBA Engineering Management</option>
      <option value="M.Sc.Environment and Energy Management">M.Sc.Environment and Energy Management</option>
      <option value="M.Sc.Environmental Science">M.Sc.Environmental Science</option>
      <option value="MBA Finance">MBA Finance</option>
      <option value="M.E.Fire and Safety Engineering">M.E.Fire and Safety Engineering</option>
      <option value="M.Sc.Forensic Science">M.Sc.Forensic Science</option>
      <option value="M.A.Geography">M.A.Geography</option>
      <option value="MBA Global Logistics">MBA Global Logistics</option>
      <option value="M.Ed.Guidance">M.Ed.Guidance</option>
      <option value="MBA Healthcare Administration"> MBA Healthcare Administration</option>
      <option value="M.A.Historic Preservation">M.A.Historic Preservation</option>
      <option value="M.A.History">M.A.History</option>
      <option value="M.E.History of Architecture and Town Planning">M.E.History of Architecture and Town Planning</option>
      <option value="MBA Human Resources">MBA Human Resources</option>
      <option value="M.E.Industrial engineering">M.E.Industrial engineering</option>
      <option value="M.E.Information Technology">M.E.Information Technology</option>
      <option value="M.E.Interior and Spatial design">M.E.Interior and Spatial design</option>
      <option value="M.E.International Architectural Regeneration and Development">M.E.International Architectural Regeneration and Development</option>
      <option value="MBA International Business">MBA International Business</option>
      <option value="M.A.Journalism">M.A.Journalism</option>
      <option value="MBA Leadership and Entreprenuer">MBA Leadership and Entreprenuer</option>
      <option value="M.A.Lingustics">M.A.Lingustics</option>
      <option value="MBA Logistics and Supplychain">MBA Logistics and Supplychain</option>
      <option value="M.A.MacroEconomics">M.A.MacroEconomics</option>
      <option value="MBA Marketing">MBA Marketing</option>
      <option value="M.Sc.Mathematics">M.Sc.Mathematics</option>
      <option value="M.E.Mechanical">M.E.Mechanical</option>
      <option value="M.E.Mechanical engineering">M.E.Mechanical engineering</option>
      <option value="M.E.Nuclear engineering">M.E.Nuclear engineering</option>
      <option value="M.Sc.Nursing">M.Sc.Nursing</option>
      <option value="M.A.Physics">M.A.Physics</option>
      <option value="M.A.Political Science">M.A.Political Science</option>
      <option value="M.E.Product design and manufacturing">M.E.Product design and manufacturing</option>
      <option value="M.E.Production Engineering">M.E.Production Engineering</option>
      <option value="M.Sc.Psychology">M.Sc.Psychology</option>
      <option value="M.A.Public Administration">M.A.Public Administration</option>
      <option value="M.E.Regional Planning">M.E.Regional Planning</option>
      <option value="M.E.Robotics">M.E.Robotics</option>
      <option value="MBA Rural Development">MBA Rural Development</option>
      <option value="MBA Safety Management">MBA Safety Management</option>
      <option value="M.A.Social Policy">M.A.Social Policy</option>
      <option value="M.A.Social Services">M.A.Social Services</option>
      <option value="M.E.Software Engineering">M.E.Software Engineering</option>
      <option value="M.A.Sports Management">M.A.Sports Management</option>
      <option value="M.E.Systems engineering">M.E.Systems engineering</option>
      <option value="M.A.Tamil">M.A.Tamil</option>
      <option value="M.E.Thermal Engineering">M.E.Thermal Engineering</option>
      <option value="M.E.Urban Architecture">M.E.Urban Architecture</option>
      <option value="M.Sc.Urban Studies">M.Sc.Urban Studies</option>
      <option value="M.Sc.Visual Communication">M.Sc.Visual Communication</option>
      <option value="M.E.Welding Technology">M.E.Welding Technology</option>
      <option value="M.Ed.Women Studies">M.Ed.Women Studies</option>
      <option value="M.Sc.Zoology">M.SC.Zoology</option>
      <option value="Aeronautical Engineering">Aeronautical Engineering</option>
      <option value="Advanced Architectural Design">Advanced Architectural Design</option>
      <option value="Agriculture Engineering">Agriculture Engineering</option>
      <option value="Architecture">Architecture</option>
      <option value="Artificial Intelligence">Artificial Intelligence</option>
      <option value="AstroPhysics">AstroPhysics</option>
      <option value="Automobile Engineering">Automobile Engineering</option>
      <option value="Bio Chemistry">Bio Chemistry</option>
      <option value="Bioinformatics">Bioinformatics</option>
      <option value="Biology">Biology</option>
      <option value="Biomedical engineering">Biomedical engineering</option>
      <option value="Business Administration">Business Administration</option>
      <option value="Business Information Systems">Business Information Systems</option>
      <option value="Chemical engineering">Chemical engineering</option>
      <option value="Childhood Studies">Childhood Studies</option>
      <option value="Civil and Structural">Civil and Structural</option>
      <option value="Civil Engineering">Civil Engineering</option>
      <option value="Commerce">Commerce</option>
      <option value="Computer Science">Computer Science</option>
      <option value="Computer Science engineering">Computer Science engineering</option>
      <option value="Data Analytics for Business">Data Analytics for Business</option>
      <option value="Data science">Data science</option>
      <option value="Economics">Economics</option>
      <option value="Education">Education</option>
      <option value="Electrical">Electrical</option>
      <option value="Electrical engineering">Electrical engineering</option>
      <option value="Electronics and Communication">Electronics and Communication</option>
      <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
      <option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
      <option value="Engineering">Engineering</option>
      <option value="Engineering Management">Engineering Management</option>
      <option value="Environment and Energy Management">Environment and Energy Management</option>
      <option value="Environmental Science">Environmental Science</option>
      <option value="Finance">Finance</option>
      <option value="Fire and Safety Engineering">Fire and Safety Engineering</option>
      <option value="Forensic Science">Forensic Science</option>
      <option value="Geography">Geography</option>
      <option value="Global Logistics">Global Logistics</option>
      <option value="Guidance">Guidance</option>
      <option value="Healthcare Administration">Healthcare Administration</option>
      <option value="Historic Preservation">Historic Preservation</option>
      <option value="History">History</option>
      <option value="History of Architecture and Town Planning">History of Architecture and Town Planning</option>
      <option value="Human Resources">Human Resources</option>
      <option value="Industrial engineering">Industrial engineering</option>
      <option value="Information Technology">Information Technology</option>
      <option value="Interior and Spatial design">Interior and Spatial design</option>
      <option value="International Architectural Regeneration and Development">International Architectural Regeneration and Development</option>
      <option value="International Business">International Business</option>
      <option value="Journalism">Journalism</option>
      <option value="Leadership and Entreprenuer">Leadership and Entreprenuer</option>
      <option value="Lingustics">Lingustics</option>
      <option value="Logistics and Supplychain">Logistics and Supplychain</option>
      <option value="MacroEconomics">MacroEconomics</option>
      <option value="Marketing">Marketing</option>
      <option value="Mathematics">Mathematics</option>
      <option value="Mechanical">Mechanical</option>
      <option value="Mechanical engineering">Mechanical engineering</option>
      <option value="Medicine">Medicine</option>
      <option value="Nuclear engineering">Nuclear engineering</option>
      <option value="Nursing">Nursing</option>
      <option value="Physics">Physics</option>
      <option value="Political Science">Political Science</option>
      <option value="Product design and manufacturing">Product design and manufacturing</option>
      <option value="Production Engineering">Production Engineering</option>
      <option value="Psychology">Psychology</option>
      <option value="Public Administration">Public Administration</option>
      <option value="Regional Planning">Regional Planning</option>
      <option value="Research">Research</option>
      <option value="Robotics">Robotics</option>
      <option value="Rural Development">Rural Development</option>
      <option value="Safety Management">Safety Management</option>
      <option value="Social Policy">Social Policy</option>
      <option value="Social Services">Social Services</option>
      <option value="Software Engineering">Software Engineering</option>
      <option value="Sports Management">Sports Management</option>
      <option value="Systems engineering">Systems engineering</option>
      <option value="Tamil">Tamil</option>
      <option value="Thermal Engineering">Thermal Engineering</option>
      <option value="Urban Architecture">Urban Architecture</option>
      <option value="Urban Studies">Urban Studies</option>
      <option value="Visual Communication">Visual Communication</option>
      <option value="Welding Technology">Welding Technology</option>
      <option value="Women Studies">Women Studies</option>
      <option value="Zoology">Zoology</option>
      <option value="Others">Others</option>



    </select> 
    <div class="error-message" id="degreeError"></div> 






    <div id="otherDegreediv" style="display: none;">
    <label for="degrees">Enter other degree:</label>
    <input type="text" id="otherDegree" name="otherDegree">
    <span id="other_degreeError" class="error-message "></span>
</div>
    
    

    <!-- <input type="text" id="otherDegree" name="otherDegree" style="display: none;" placeholder="Please specify the Degree" > -->

    
</div>


<script>
  $(document).ready(function() {

 let multipleCancelButton1 = new Choices(`#degrees`, {
     removeItemButton: true,
     maxItemCount: 5,
     searchResultLimit: 5,
     // renderChoiceLimit: 5
 });
});
</script>


<script>
    function showOther_degree() {
     
      
     
        var degrees = document.getElementById("degrees");
        var other_Degree = document.getElementById("otherDegreediv");
      

        if (degrees.value === "Others") {
           other_Degree.style.display = "block";
        } else {
            other_Degree.style.display = "none";
        }
    }
</script>
























      
  <div class="col-md-4">
    <label for="graduation" class="form-label">Graduation</label>
    <select class="form-select" id="graduation" name="graduation" onchange="toggleExperienceOptions()">
      <option value="">Select</option>
      <option value="First Year">First Year</option>
      <option value="Second Year">Second Year</option>
      <option value="Pre-Final Year">Pre-Final Year</option>
      <option value="Final Year">Final Year</option>
      <option value="Graduated">Graduated</option>
    </select>   
    <div class="error-message"id="graduationError"></div> 
</div>

<div class="col-md-4">
  <label for="experience" class="form-label">Experience</label>
  <select class="form-select" id="experience" name="experience"onchange="toggleCTCInput()" >
    <option value="">Select The Experience Required</option>
                <option value="Student">Student</option>
                <option value="Fresher">Fresher</option>
                <option value="0-1 years">0-1 years</option>
                <option value="1-2 years">1-2 years</option>
                <option value="2-3 years">2-3 years</option>
                <option value="3-4 years">3-4 years</option>
                <option value="4-5 years">4-5 years</option>
                <option value="5-6 years">5-6 years</option>
                <option value="6-7 years">6-7 years</option>
                <option value="7-8 years">7-8 years</option>
                <option value="8-9 years">8-9 years</option>
                <option value="9-10 years">9-10 years</option>
                <option value="More than 10 years">More than 10 years</option>
  </select>
  <div id="previousCTC" style="display: none;">
    <label for="previousCTC">Current CTC:</label>
    <input type="text" id="previousCTC" name="previousCTC" placeholder="Enter Your PreviousCTC">
    <span id="previousCTCError" class="error-message alert alert-warning">Please Enter your previousCTC</span>
</div>
  <div class="error-message" id="experienceError"></div>
</div>



<script>
  function toggleCTCInput() {
    var experienceSelect = document.getElementById("experience");
    var ctcInput = document.getElementById("previousCTC");
    var ctcError = document.getElementById("previousCTCError");

    if (experienceSelect.value !== "Student" && experienceSelect.value !== "Fresher") {
      ctcInput.style.display = "block";
    } else {
      ctcInput.style.display = "none";
      ctcError.style.display = "none"; // Hide error when not applicable
    }

    // Show error message if previousCTC field is empty when it should be displayed
    if (ctcInput.style.display == "block" && ctcInput.value == "") {
      ctcError.style.display = "block";
    } else {
      ctcError.style.display = "none";
    }
  }

  function toggleExperienceOptions() {
    var graduationSelect = document.getElementById("graduation");
    var experienceSelect = document.getElementById("experience");
    var ctcInput = document.getElementById("previousCTC");
    var ctcError = document.getElementById("previousCTCError");

    if (graduationSelect.value !== "Graduated") {
      // If other options are selected in Graduation, show only the Student option
      experienceSelect.querySelectorAll("option").forEach(function(option) {
        if (option.value === "Student") {
          option.style.display = "block";
        } else {
          option.style.display = "none";
        }
      });
      ctcInput.style.display = "none";
      ctcError.style.display = "none"; // Hide error when not applicable
      // Reset experience field when Graduated is deselected
      experienceSelect.value = "";
    } else {
      // If Graduated is selected, show all options except Student
      experienceSelect.querySelectorAll("option").forEach(function(option) {
        if (option.value !== "Student") {
          option.style.display = "block";
        } else {
          option.style.display = "none";
        }
      });
      ctcInput.style.display = experienceSelect.value !== "Fresher" ? "block" : "none";
    }

    // Show error message if previousCTC field is empty when it should be displayed
    if (ctcInput.style.display == "block" && ctcInput.value == "") {
      ctcError.style.display = "block";
    } else {
      ctcError.style.display = "none";
    }
  }
</script>



<div class="col-md-4">
  <label for="year" class="form-label">Year of Passing</label>
  <select class="form-select"id="year" name="year">
    <option value="">Select Year</option>
    <script>
      const currentYear = new Date().getFullYear();
      const minYear = currentYear - 40; // 60 years back from the current year
      const maxYear = currentYear + 10; // 10 years after the current year
      const yearSelection = document.getElementById("year");
      for (let year = maxYear; year >= minYear; year--) {
          const option = document.createElement("option");
          option.value = year;
          option.textContent = year;
          yearSelection.appendChild(option);
      }
  </script>
  </select>
  <div class="error-message" id="yearError"></div>
</div>

<div class="col-md-4">
  <label for="college_name" class="form-label">College Name</label>
  <select class="form-select" id="college_name" name="college_name" class="js-example-responsive " >
   
   
  </select>

  <script>
    $(document).ready(function() {
        $('.js-example-responsive').select2();
    });


     $(document).ready(function () {
         var otherCollegeInput = document.getElementById('other_college_input');
 var errorSpan = document.getElementById('error_message');

    $('#college_name').select2({
        ajax: {
            url: function (params) {
                return '/college-drop/' + encodeURIComponent(params.term);
            },
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
            // Convert the object into an array of objects
            var transformedData = Object.keys(data).map(function (key) {
                return {
                    id:  key.slice(0,-13),
                    text: key.slice(0,-13)
                };
            });

         //    console.log(transformedData);

            return {
                results: transformedData
            };
            },
            cache: true
        },
        placeholder: 'Type To Search For Colleges',
        minimumInputLength: 4
    });
    $('#college_name').on('select2:select', function (e) {
     var data = e.params.data;

         if (data.text == 'Others') {
             otherCollegeInput.style.display = 'block';
         } else {
             otherCollegeInput.style.display = 'none';
             // Clear the input when a different option is selected
             document.getElementById('other_college_name').value = '';
             // Optionally, hide the error message when changing options
             errorSpan.style.display = 'none';
         }








 });
});

 </script>

<div id="otherCollegeInput" style="display: none;">
  <input type="text" id="other_college_name" name="other_college_name" class="form-control" placeholder="Enter Your College Name">
</div>


  <div class="error-message" id="collegeNameError"></div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function() {
      var collegeSelect = document.getElementById('college_name');
      var otherCollegeInput = document.getElementById('otherCollegeInput');
      var errorSpan = document.getElementById('collegeNameError');

      collegeSelect.addEventListener('input', function() {
          alert(3)
          if (collegeSelect.value === 'Others') {
              otherCollegeInput.style.display = 'block';
          } else {
              otherCollegeInput.style.display = 'none';
              // Clear the input when a different option is selected
              document.getElementById('other_college_name').value = '';
              // Optionally, hide the error message when changing options
              errorSpan.style.display = 'none';
          }
      });
  });
</script>



<div class="col-md-4">
  <label  for="college_state" class="form-label">College State</label>
  <select class="form-select"id="college_state" name="college_state">
    <option value="">Select</option>
    
  </select>
  <div class="error-message"id="collegeStateError"></div>
</div>

<div class="col-md-4">
  <label  for="college_district" class="form-label">College District</label>
  <select class="form-select"id="college_district" name="college_district">
    <option value="">Select</option>
    <option value=""></option>
    <option value=""></option>
    <option value=""></option>
  </select>
  <div class="error-message" id="collegeDistrictError"></div>
</div>
      
<div class="col-md-4">
  <label  for="area_of_interest" class="form-label">Area Of Interest</label>
  <select name="area_of_interest[]" id="area_of_interest" multiple name="area_interest" onchange="showOtherField()" placeholder="Select Your Area Of Interest">
    <option value="Accounts">Accounts</option>
    <option value="Administration">Administration</option>
    <option value="Chemical">Chemical</option>
    <option value="Tech">Technology</option>
    <option value="Finance">Finance</option>
    <option value="Banking">Banking</option>
    <option value="Healthcare">Healthcare</option>
    <option value="Human Resource">Human Resource</option>
    <option value="Education">Education</option>
    <option value="Engineering">Engineering</option>
    <option value="Retail">Retail</option>
    <option value="Marketing">Marketing</option>
    <option value="Hospitality">Hospitality</option>
    <option value="Consulting">Consulting</option>
    <option value="Manufacturing">Manufacturing</option>
    <option value="Media">Media</option>
    <option value="Transportation">Transportation</option>
    <option value="Telecommunications">Telecommunications</option>
    <option value="Nonprofit">Nonprofit</option>
    <option value="Government">Government</option>
    <option value="Fashion">Fashion</option>
    <option value="Legal">Legal</option>
    <option value="Science">Science</option>
    <option value="Art">Art</option>
    <option value="Real Estate">Real Estate</option>
    <option value="Automotive">Automotive</option>
    <option value="Information Technology">Information Technology</option>
    <option value="Customer Service">Customer Service</option>
    <option value="Agriculture">Agriculture</option>
    <option value="Construction">Construction</option>
    <option value="Pharmaceutical">Pharmaceutical</option>
    <option value="Environmental Services">Environmental Services</option>
    <option value="Energy">Energy</option>
    <option value="Sales">Sales</option>
    <option value="Writing/Editing">Writing/Editing</option>
    <option value="Legal Services">Legal Services</option>
    <option value="Supply Chain/Logistics">Supply Chain/Logistics</option>
    <option value="Design">Design</option>
    <option value="Food Service">Food Service</option>
    <option value="Insurance">Insurance</option>
    <option value="Beauty/Cosmetics">Beauty/Cosmetics</option>
    <option value="Sports">Sports</option>
    <option value="Fitness">Fitness</option>
    <option value="Entertainment">Entertainment</option>
    <option value="Research">Research</option>
    <option value="Quality Assurance">Quality Assurance</option>
    <option value="Security">Security</option>
    <option value="Hospital/Clinical">Hospital/Clinical</option>
    <option value="Pharmacy">Pharmacy</option>
    <option value="Architecture">Architecture</option>
    <option value="Aviation/Aerospace">Aviation/Aerospace</option>
    <option value="Veterinary">Veterinary</option>
    <option value="Event Planning">Event Planning</option>
    <option value="Social Services">Social Services</option>
    <option value="Libraries">Libraries</option>
    <option value="Humanities">Humanities</option>
    <option value="Biotechnology">Biotechnology</option>
    <option value="Nursing">Nursing</option>
    <option value="Psychology">Psychology</option>
    <option value="Geology">Geology</option>
    <option value="others">Others</option>
    
  </select>
  <script>
    $(document).ready(function() {

    let multipleCancelButton1 = new Choices(`#area_of_interest`, {
        removeItemButton: true,
        maxItemCount: 10,
        searchResultLimit: 5,
        // renderChoiceLimit: 5
    });
    });
</script>
<div id="otherAreaInput" style="display: none;">
    <label for="otherarea_of_interest">Enter the Area of Interest:</label>
    <input type="text" id="otherarea_of_interest" name="otherarea_of_interest">
    <span id="otherarea_of_interestError" class="error-message"></span>
</div>
<script>
  function showOtherField() {
      var area_of_interestDropdown = document.getElementById("area_of_interest");
      var otherarea_of_interestField = document.getElementById("otherAreaInput");

      if (area_of_interestDropdown.value === "others") {
          otherarea_of_interestField.style.display = "block";
      } else {
          otherarea_of_interestField.style.display = "none";
      }
  }
</script>
  <div class="error-message" id="area_of_interestError"></div>
</div>






<div class="col-md-4">
  <label  for="skills" class="form-label">Skills</label>
  <select id="skills" name="skills[]" multiple name="multiple-skills" placeholder="Select Your Skills"  onchange="showOther_skills()">
    @foreach ($skills as $s)
        <option value="{{$s->name}}">{{ucwords($s->name)}}</option>
    @endforeach>
    
  </select>
  <script>
    $(document).ready(function() {
        let multipleCancelButton1 = new Choices(`#skills`, {
            removeItemButton: true,
            maxItemCount: 10,
            searchResultLimit: 5,
            // renderChoiceLimit: 5
        });
    });
</script>
  <div class="error-message" id="skillError"></div>
  
<div id="otherinputskills" style="display: none;">
    <label for="skills">Enter other skills:</label>
    <input type="text" id="other_skills" name="other_skills">
    <span id="other_skills_error" class="error-message "></span>
</div>

<script>
    function showOther_skills() {
     
        var skills = document.getElementById("skills");
        var other_skills = document.getElementById("otherinputskills");

        if (skills.value === "Others") {
           other_skills.style.display = "block";
        } else {
            other_skills.style.display = "none";
        }
    }
</script>


 
</div>























<div class="col-md-4">
  <label for="resume" class="form-label">Resume</label>
  <br>
  <input  type="file" accept=".pdf" name="resume" id="resume" placeholder="No File">
  <div class="error-message"id="resumeError"></div>
</div>
<div id="resume-view"></div>

<script>
  document.getElementById("resume").addEventListener("change", function(event) {
    var file = event.target.files[0];
    var resumeView = document.getElementById("resume-view");
    var reader = new FileReader();

    if (file && file.type === "application/pdf") {
      reader.onload = function(e) {
        resumeView.innerHTML = "<embed src='" + e.target.result + "' width='400' height='400' type='application/pdf'>";
      };
      reader.readAsDataURL(file);
      document.getElementById("resumeError").style.display = "none";
    } else {
      resumeView.innerHTML = "";
      document.getElementById("resumeError").style.display = "block";
    }
  });
</script>

      <div class="col-12 text-center">
        <button type="submit" class="btn btn-primary" style="width:370px;border-radius:30px;">Register</button>    
      </div>

      
    </div>
  </form>
</div>

<script>
         function validateForm() {

         var firstname = document.getElementById('firstname').value;
         var lastname = document.getElementById('lastname').value;
         var dob = document.getElementById('dob').value;
         var age = document.getElementById('age').value;
         var gender = document.getElementById('gender').value;
         var email = document.getElementById('email').value;
         var contactNo = document.getElementById('contact_no').value.trim();
         var address = document.getElementById('address').value;
         var street = document.getElementById('street').value;
         var vt = document.getElementById('vt').value;
         var country = document.getElementById('country').value;
         var state = document.getElementById('state').value;
         var district = document.getElementById('district').value;
         var pincode = document.getElementById('pincode').value;
        //  var qualification = document.getElementById('qualification').value;
         var degree = document.getElementById('degrees').value;
         var skills = document.getElementById('skills').value;
         var other_skills = document.getElementById('other_skills').value;
         var other_degree = document.getElementById('otherDegree').value;
         var graduation = document.getElementById('graduation').value;
         var experience = document.getElementById('experience').value;
         var previousCTC = document.getElementById('previousCTC').value;
         var year = document.getElementById('year').value;
         var collegeName = document.getElementById('college_name').value;
         var collegeState = document.getElementById('college_state').value;
         var collegeDistrict = document.getElementById('college_district').value;
         var area_of_interest = document.getElementById('area_of_interest').value;
         var resume = document.getElementById('resume').value;
        //  var photo = document.getElementById('photo').value;
         var otherarea_of_interest = document.getElementById('otherarea_of_interest').value;




         var isValid = true;

         function hideErrorMessageOnFocus(inputId, errorId) {
         var inputElement = document.getElementById(inputId);
         var errorElement = document.getElementById(errorId);

         inputElement.addEventListener('focus', function () {
         errorElement.style.display = 'none';
        });
        }

// Name validation
if (firstname.trim() === '') {
  document.getElementById('firstnameError').innerText = 'Please enter your first name.';
  document.getElementById('firstnameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('firstname', 'firstnameError');
}  else if (firstname.charAt(0) === ' ') {
  document.getElementById('firstnameError').innerText = 'Name should not start with a space.';
  document.getElementById('firstnameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('firstname', 'firstnameError');
} else if (firstname.length < 2) {
  document.getElementById('firstnameError').innerText = 'Name should be at least 2 characters long.';
  document.getElementById('firstnameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('firstname', 'firstnameError');
} else if (firstname.length > 25) { // Adding length limit
  document.getElementById('firstnameError').innerText = 'Name should not exceed 25 characters.';
  document.getElementById('firstnameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('firstname', 'firstnameError');
}else if (!/^[a-zA-Z\s]*$/.test(firstname)) {
  document.getElementById('firstnameError').innerText = 'Name should only contain letters and spaces.';
  document.getElementById('firstnameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('firstname', 'firstnameError');
}else {
  document.getElementById('firstnameError').style.display = 'none';
}


// Name validation
if (lastname.trim() === '') {
  document.getElementById('lastnameError').innerText = 'Please enter your last name.';
  document.getElementById('lastnameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('lastname', 'lastnameError');
} else if (lastname.length < 1) {
  document.getElementById('lastnameError').innerText = 'Last Name should be at least 1 character long.';
  document.getElementById('lastnameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('lastname', 'lastnameError');
} else if (lastname.length > 25) { // Adding length limit
  document.getElementById('lastnameError').innerText = 'Name should not exceed 25 characters.';
  document.getElementById('lastnameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('lastname', 'lastnameError');
} else if (!/^[a-zA-Z\s]*$/.test(lastname)) {
  document.getElementById('lastnameError').innerText = 'Name should only contain letters and spaces.';
  document.getElementById('lastnameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('lastname', 'lastnameError');
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
      var age = ageDiff;
      document.getElementById('age').value = age;

      // Validate age
      if (isNaN(age) || age < 17) {
          document.getElementById('ageError').innerText = 'You must be at least 17 years old to register.';
          document.getElementById('ageError').style.display = 'block';
          isValid = false;

          hideErrorMessageOnFocus('age', 'ageError');
      } else {
          // Hide the age error message if the age is valid
          document.getElementById('ageError').style.display = 'none';
      }
    }
  }
}



// Age validation
if (age === '') {
  // document.getElementById('ageError').textContent = 'Please enter your age.';
  document.getElementById('ageError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('age', 'ageError');
} else if (isNaN(age)) {
  document.getElementById('ageError').textContent = 'Please enter a valid age.';
  document.getElementById('ageError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('age', 'ageError');
} else if (parseInt(age) < 17 || parseInt(age) > 45) {
  document.getElementById('ageError').textContent = 'Age must be between 17 and 45.';
  document.getElementById('ageError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('age', 'ageError');
} else {
  // Check if the age field was not autofilled before hiding the error message
  if (document.getElementById('age').value.trim() !== '') {
    document.getElementById('ageError').style.display = 'none';
  }
}

  // Gender validation
  if (gender === '') {
    document.getElementById('genderError').textContent = 'Please select your gender';
    document.getElementById('genderError').style.display = 'block';
    isValid = false;

    hideErrorMessageOnFocus('gender', 'genderError' )
  } else {
    document.getElementById('genderError').style.display = 'none';
  }

 // var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//var emailSpecialCharPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
//var emailNumericPattern = /^[^\d@]+@[^\s@]+\.[^\s@]+$/; // New pattern to ensure no digits before '@'
//var emailLengthPattern = /^.{4,30}@/; // Pattern to enforce email length before '@'

//var email = document.getElementById('email').value.trim(); // Assuming 'email' is the variable containing the user input.

//if (email === '') {
 // document.getElementById('emailError').textContent = 'Email address is required.';
  //document.getElementById('emailError').style.display = 'block';
  //isValid = false;
//   console.log(1);
  //hideErrorMessageOnFocus('email', 'emailError');
//} else if (!emailPattern.test(email)) {
 // document.getElementById('emailError').textContent = 'Invalid email address format.';
 // document.getElementById('emailError').style.display = 'block';
 // isValid = false;
//  console.log(1);
 // hideErrorMessageOnFocus('email', 'emailError');
//} else if (!emailSpecialCharPattern.test(email)) {
  //document.getElementById('emailError').textContent = 'Email contains invalid special characters.';
  //document.getElementById('emailError').style.display = 'block';
 // isValid = false;
//  console.log(1);
 // hideErrorMessageOnFocus('email', 'emailError');
//}  else if (!emailNumericPattern.test(email)) {
 // document.getElementById('emailError').textContent = 'Email address should not contain only numbers before @ symbol.';
 // document.getElementById('emailError').style.display = 'block';
  //isValid = false;
//   console.log(1);
  //hideErrorMessageOnFocus('email', 'emailError');
//} else if (!emailLengthPattern.test(email)) {
 // document.getElementById('emailError').textContent = 'Email address length before @ should be between 4 and 30 characters.';
 // document.getElementById('emailError').style.display = 'block';
 // isValid = false;
//  console.log(1);
 // hideErrorMessageOnFocus('email', 'emailError');
//} else if (email.startsWith(' ') || email.endsWith(' ')) {
 // document.getElementById('emailError').textContent = 'Email address should not start or end with a space.';
 // document.getElementById('emailError').style.display = 'block';
 // isValid = false;
//  console.log(1);
 // hideErrorMessageOnFocus('email', 'emailError');
//} else if (email.includes('..')) {
//  document.getElementById('emailError').textContent = 'Email address cannot contain consecutive dots.';
//  document.getElementById('emailError').style.display = 'block';
//  isValid = false;
// console.log(1);
//  hideErrorMessageOnFocus('email', 'emailError');
//} else if (!/^(?:[a-zA-Z0-9._-]+@gmail\.com|[a-zA-Z0-9._-]+@yahoo\.com)$/.test(email)) {
//  document.getElementById('emailError').textContent = 'Email address should be either @gmail.com or @yahoo.com.';
//  document.getElementById('emailError').style.display = 'block';
//  isValid = false;
// console.log(1);
//  hideErrorMessageOnFocus('email', 'emailError');
//} else {
//  document.getElementById('emailError').style.display = 'none';
//}


// Mobile Number validation
var mobilePattern = /^\d{10}$/;
var contactNo = document.getElementById('contact_no').value.trim(); // Retrieve the value from the input field

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
// Check if exactly 10 numbers are entered
else if (contactNo.length !== 10) {
  document.getElementById('contactNoError').innerText = 'Please enter exactly 10 digits for the mobile number.';
  document.getElementById('contactNoError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('contact_no', 'contactNoError');
}
// Check if mobile number is in Indian format
else if (!/^[6789]\d{9}$/.test(contactNo)) {
  document.getElementById('contactNoError').innerText = 'Please enter a valid Indian mobile number starting with 6, 7, 8, or 9.';
  document.getElementById('contactNoError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('contact_no', 'contactNoError');
}
else {
  document.getElementById('contactNoError').style.display = 'none';
}



// Address validation
// Address validation
if (address.trim() === '') {
  document.getElementById('addressError').innerText = 'Please enter your address.';
  document.getElementById('addressError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('address', 'addressError');
} else if (address.length > 50) {
  document.getElementById('addressError').innerText = 'Address should not exceed 50 characters.';
  document.getElementById('addressError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('address', 'addressError');
} else if (address.length < 2) {
  // Display error for address below minimum length
  document.getElementById('addressError').innerText = 'Address should have a minimum length of 2 characters.';
  document.getElementById('addressError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('address', 'addressError');
} else if (/[\W_]{8,}/.test(address)) {
  // Check for more than 7 consecutive special characters
  document.getElementById('addressError').innerText = 'Address should not have more than 7 consecutive special characters.';
  document.getElementById('addressError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('address', 'addressError');
} else {
  document.getElementById('addressError').style.display = 'none';
}



// Street validation
// Street validation
if (street.trim() === '') {
  document.getElementById('streetError').innerText = 'Please enter your street.';
  document.getElementById('streetError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('street', 'streetError');
} else if (street.length > 50) {
  document.getElementById('streetError').innerText = 'Street should not exceed 50 characters.';
  document.getElementById('streetError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('street', 'streetError');
} else if (street.length < 2) {
  // Display error for street below minimum length
  document.getElementById('streetError').innerText = 'Street should have a minimum length of 2 characters.';
  document.getElementById('streetError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('street', 'streetError');
} else if (/[\W_]{8,}/.test(street)) {
  // Check for more than 7 consecutive special characters
  document.getElementById('streetError').innerText = 'Street should not have more than 7 consecutive special characters.';
  document.getElementById('streetError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('street', 'streetError');
} else {
  document.getElementById('streetError').style.display = 'none';
}


// Validation for variable 'vt' with a length limit of 30 characters
if (vt.trim() === '') {
  document.getElementById('vtError').innerText = 'Please enter your Village/Town.';
  document.getElementById('vtError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('vt', 'vtError');
} else if (vt.length > 30) { // Adding length limit (30 characters)
  document.getElementById('vtError').innerText = 'Village/Town should not exceed 30 characters.';
  document.getElementById('vtError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('vt', 'vtError');
} else if (street.length < 2) {
  // Display error for street below minimum length
  document.getElementById('vtError').innerText = 'Village/Town should have a minimum length of 2 characters.';
  document.getElementById('vtError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('vt', 'vtError');
} else {
  document.getElementById('vtError').style.display = 'none';
}

  if (country === '') {
    document.getElementById('countryError').innerText = 'Please select your country';
    document.getElementById('countryError').style.display = 'block';
    isValid = false;

    hideErrorMessageOnFocus('country', 'countryError');
  } else {
    document.getElementById('countryError').style.display = 'none';
  }

  // State validation
  if (state === '') {
    document.getElementById('stateError').innerText = 'Please select your state';
    document.getElementById('stateError').style.display = 'block';
    isValid = false;

    hideErrorMessageOnFocus('state', 'stateError');
  } else {
    document.getElementById('stateError').style.display = 'none';
  }

  // District validation
  if (district === '') {
    document.getElementById('districtError').innerText = 'Please select your district';
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

  // Qualification validation
//   if (qualification === '') {
//     document.getElementById('qualificationError').style.display = 'block';
//     isValid = false;
// console.log(1);
//     hideErrorMessageOnFocus('qualification', 'qualificationError');
//   } else {
//     document.getElementById('qualificationError').style.display = 'none';
//   }

      // Degree validation
      if (degree === '') {
    document.getElementById('degreeError').innerText = 'Please select your degree';
    document.getElementById('degreeError').style.display = 'block';
    isValid = false;
} else {
    document.getElementById('degreeError').style.display = 'none';
}

// Assuming hideErrorMessageOnFocus function is used to hide error messages when a field is focused
hideErrorMessageOnFocus('degrees', 'degreeError');


if (degree === 'Others') {
    if(other_degree === ''){
        document.getElementById('other_degreeError').innerText = 'Please enter other degree';
        document.getElementById('other_degreeError').style.display = 'block';
        isValid = false;

        hideErrorMessageOnFocus('otherDegree', 'other_degreeError');
    }
    else{
        document.getElementById('other_degreeError').style.display = 'none';
    }
} 











  // Major Subject validation
//   if (majorSubject === '') {
//     document.getElementById('majorSubjectError').style.display = 'block';
//     isValid = false;
// console.log(40);
//     hideErrorMessageOnFocus('major_subject', 'majorSubjectError');
//   } else {
//     document.getElementById('majorSubjectError').style.display = 'none';
//   }

  // Graduation validation
  if (graduation === '') {
    document.getElementById('graduationError').innerText = 'Please select your graduation';
    document.getElementById('graduationError').style.display = 'block';
    isValid = false;

    hideErrorMessageOnFocus('graduation', 'graduationError');
  } else {
    document.getElementById('graduationError').style.display = 'none';
  }

  if (experience === '') {
    document.getElementById('experienceError').innerText = 'Please select your experience';
          // Display error message for experience field
          document.getElementById('experienceError').style.display = 'block';
          isValid = false;

          hideErrorMessageOnFocus('experience', 'experienceError');
        } else {
          document.getElementById('experienceError').style.display = 'none';
        }


        if (previousCTC === '') {
            document.getElementById('previousCTCError').innerText = 'Please select your previous CTC';
          document.getElementById('previousCTCError').style.display = 'block';
          isValid = false;

          hideErrorMessageOnFocus('previousCTC', 'previousCTCError');
        } else {
          document.getElementById('previousCTCError').style.display = 'none';
        }

  // Year of Passing validation
  if (year === '') {
    document.getElementById('yearError').innerText = 'Please select your year of passing';
    document.getElementById('yearError').style.display = 'block';
    isValid = false;

    hideErrorMessageOnFocus('year', 'yearError');
  } else {
    document.getElementById('yearError').style.display = 'none';
  }


  // Institute validation
  var selectedCollege = document.getElementById('college_name').value;
if (selectedCollege === '') {
    document.getElementById('collegeNameError').innerText = 'Please select your college name';
  document.getElementById('collegeNameError').style.display = 'block';
  isValid = false;

} else {
  document.getElementById('collegeNameError').style.display = 'none';
}

  //College State validation
  if (collegeState === '') {
    document.getElementById('collegeStateError').innerText = 'Please select your college state';
    document.getElementById('collegeStateError').style.display = 'block';
    isValid = false;

    hideErrorMessageOnFocus('college_state', 'collegeStateError');
  } else {
    document.getElementById('collegeStateError').style.display = 'none';
  }

    //College City validation
      if (collegeDistrict === '') {
        document.getElementById('collegeDistrictError').innerText = 'Please select your college district';
    document.getElementById('collegeDistrictError').style.display = 'block';
    isValid = false;

    hideErrorMessageOnFocus('college_district', 'collegeDistrictError');
  } else {
    document.getElementById('collegeDistrictError').style.display = 'none';
  }


  if (area_of_interest === '') {
    document.getElementById('area_of_interestError').innerText = 'Please select your area of interest';
    document.getElementById('area_of_interestError').style.display = 'block';
    isValid = false;

    hideErrorMessageOnFocus('area_of_interest', 'area_of_interesrError');
  } else {
    document.getElementById('area_of_interestError').style.display = 'none';
  }



  if (area_of_interest === 'others') {
    if(otherarea_of_interest === ''){
        document.getElementById('otherarea_of_interestError').innerText = 'Please enter your area of interest';
        document.getElementById('otherarea_of_interestError').style.display = 'block';
        isValid = false;

        hideErrorMessageOnFocus('otherarea_of_interest', 'otherarea_of_interestError');
    }
    else{
        document.getElementById('otherarea_of_interestError').style.display = 'none';
    }
} else {
  document.getElementById('otherarea_of_interestError').style.display = 'none';
}


if (skills === '') {
    document.getElementById('skillError').innerText = 'Please select your skills';
    document.getElementById('skillError').style.display = 'block';
    isValid = false;

    hideErrorMessageOnFocus('skills', 'skillError');
} else {
  document.getElementById('skillError').style.display = 'none';
}

if (skills === 'Others') {
    if(other_skills === ''){
        document.getElementById('other_skills_error').innerText = 'Please enter other skills';
        document.getElementById('other_skills_error').style.display = 'block';
        isValid = false;

        hideErrorMessageOnFocus('other_skills', 'other_skills_error');
    }
    else{
        document.getElementById('other_skills_error').style.display = 'none';
    }
} 














if (resume === '') {
  // Display error for empty resume
  document.getElementById('resumeError').innerText = 'Please upload a resume.';
  document.getElementById('resumeError').style.display = 'block';
  isValid = false;

  hideErrorMessageOnFocus('resume', 'resumeError');
} else {
  // Validate file type
  var allowedExtensions = ['.pdf'];
  var fileExtension = resume.substring(resume.lastIndexOf('.')).toLowerCase();

  if (allowedExtensions.indexOf(fileExtension) === -1) {
    // Display error for invalid file type
    document.getElementById('resumeError').innerText = 'Invalid file type. Only PDF files are allowed.';
    document.getElementById('resumeError').style.display = 'block';
    isValid = false;

    hideErrorMessageOnFocus('resume', 'resumeError');
  } else {
    // Retrieve file input element
    var fileInput = document.getElementById('resume');
    // Check if files are selected
    if (fileInput.files && fileInput.files.length > 0) {
      var uploadedFile = fileInput.files[0];
      var fileSizeInBytes = uploadedFile.size; // Get the file size in bytes

      // Validate file size
      var maxSizeInBytes = 2 * 1024 * 1024; // 2 MB
      if (fileSizeInBytes > maxSizeInBytes) {
        // Display error for file size exceeding the limit
        document.getElementById('resumeError').innerText = 'File size exceeds the maximum limit of 2 MB.';
        document.getElementById('resumeError').style.display = 'block';
        isValid = false;

        hideErrorMessageOnFocus('resume', 'resumeError');
      } else {
        // File is valid, hide error message
        document.getElementById('resumeError').style.display = 'none';
      }
    }
  }
}

// Assuming 'photo' contains the file path or name
// if (photo === '') {
//   // Handle empty file field
//   document.getElementById('photoError').innerText = 'Please upload your Photo';
//   document.getElementById('photoError').style.display = 'block';
//   isValid = false;
//   hideErrorMessageOnFocus('photo', 'photoError');
// } else {
//   // Validate file type
//   var allowedExtensions = ['.jpg', '.jpeg']; // Separate extensions with individual strings
//   var fileExtension = photo.substring(photo.lastIndexOf('.')).toLowerCase();

//   if (!allowedExtensions.includes(fileExtension)) {
//     // Handle invalid file type
//     document.getElementById('photoError').innerText = 'Invalid file type. Only JPG/JPEG files are allowed.';
//     document.getElementById('photoError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('photo', 'photoError');
//   } else {
//     // Validate file size (if possible to get the file size in bytes)
//     var maxSizeInBytes = 100 * 1024; // 100KB
//     var fileSizeInBytes = ""/* Get the file size of the uploaded photo */;

//     if (fileSizeInBytes > maxSizeInBytes) {
//       // Handle file size exceeding the limit
//       document.getElementById('photoError').innerText = 'File size exceeds the maximum limit of 100KB.';
//       document.getElementById('photoError').style.display = 'block';
//       isValid = false;
//       hideErrorMessageOnFocus('photo', 'photoError');
//     } else {
//       document.getElementById('photoError').style.display = 'none';
//     }
//   }
// }


console.log(isValid);
return isValid;
}

document.getElementById('registrationForm').addEventListener('submit', function (event) {
  event.preventDefault();

  var isValid = validateForm();
  if (isValid) {
    this.submit();
  }
});
</script>


<script src="{{ asset('asset\js\dropdown.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>