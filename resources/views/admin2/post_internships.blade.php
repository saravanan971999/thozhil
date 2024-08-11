<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Internship Post Form</title>
    <link rel="stylesheet" href="{{ asset('asset/css/internship_post.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
@include('admin2.layouts.company_header')
<style>
    .registerbtn button {
    padding: 10px 20px;
    font-size: 16px;
}

/* Media query for screens with a maximum width of 768px (typical for mobile devices) */
@media only screen and (max-width: 768px) {
    .registerbtn button {
        padding: 8px 16px;
        font-size: 14px;
    }
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

    <div class="main-wrapper">
        @include('admin2.layouts.company_sidebar')
        @include('layouts.alert')
		<div class="page-wrapper">
			<div class="content container-fluid">
        <div class="">
            <!-- <div class="header">
                <h2>OneYes <br> <span>Internships</span></h2> -->
                <!-- <div class="rectangular"></div>
                <div class="square"></div> -->
            <!-- </div> -->
            <br><br><br>
            <div class="title">
                <center><h1>Post Your Internship Details</h1></center><br>

                <center><h3>1000+ Companies Hiring On <Span> <img style="width:120px; margin-top:-10px;"  src="{{asset('Thozhil/thozhill-removebg-preview (1).png')}}"</Span> </h3></center>
              </div>
                <br>

            <div class="container">

                <form action="{{url('internship_post_form')}}" novalidate method="POST" id="registrationForm" enctype="multipart/form-data">
                    <div class="user-details">
                        @csrf

                        <div class="input-box">
                            <label for="company_name">Company Name <span style="color: red;">*</span></label>
                            <input type="text"  placeholder="Enter company name" name="company_name" id="company_name" maxlength="50" onblur="validateField(this)" onkeydown="return validateCompanyName(event)">
                            <span id="company_nameError" class="error-message">Please enter your company name</span>
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
        <label for="internship_title">Internship Role <span style="color: red;">*</span></label>
        <input type="text" placeholder="Please enter the internship role" name="internship_title" id="internship_title" onblur="validateField(this)" oninput="validateInternshipTitle(event)" maxlength="80">
        <span id="internship_titleError" class="error-message" style="display: none;">Please enter the internship title</span>
    </div>

    <script>
       function validateInternshipTitle(event) {
    const titleInput = event.target;
    const trimmedValue = titleInput.value.trim();

    // Prevent space at the start
    if (/^\s/.test(titleInput.value)) {
        titleInput.value = trimmedValue; // Remove leading spaces
    }

    // Replace consecutive spaces with a single space
    titleInput.value = titleInput.value.replace(/\s\s+/g, ' ');
}

    </script>

    <div class="input-box">
      <label for="internship_type">Internship Type <span style="color: red;">*</span></label>
      <select  name="internship_type" id="internship_type" onblur="validateField(this)">
        <option value="">Select Internship Type</option>
        <option value="In-office/Hybrid">In-office/Hybrid</option>
        <option value="Remote">Remote</option>
      </select>
      <span id="internship_typeError" class="error-message" style="display: none;">Please select the internship type</span>
    </div>

    <div class="input-box">
      <label for="ptft">Part-time/Full-time <span style="color: red;">*</span></label>
      <select  name="ptft" id="ptft" onblur="validateField(this)">
        <option value="">Select</option>
        <option value="Part-time">Part-time</option>
        <option value="Full-time">Full-time</option>
      </select>
      <span id="ptftError" class="error-message" style="display: none;">Please select Part-time/Full-time</span>
    </div>

    <div class="input-box">
        <label for="jobDescription">Internship Description <span style="color: red;">*</span></label>
        <textarea id="jobDescription" name="internDescription" placeholder="Enter internship description" rows="20" maxlength="6000" onblur="validateField(this)" oninput="validateJobDescription(event)"></textarea>
        <span id="jobDescriptionError" class="error-message" style="display: none;">Please provide a Internship Description of at least 10 characters</span>
    </div>

    <script>
        function validateJobDescription(event) {
            const descriptionInput = event.target;
            const trimmedValue = descriptionInput.value.trim();

            // Prevent space at the start or continuous spaces
            if (/^\s/.test(descriptionInput.value) || /\s\s/.test(descriptionInput.value)) {
                descriptionInput.value = trimmedValue.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
            }
        }
    </script>


<div class="input-box">
    <label for="skills">Required Skills <span style="color: red;">*</span></label>
    <select id="skills" placeholder="Enter required skills (e.g., Java, Python, HTML....)
" name="skills[]" multiple name = "multiple-skills">
        @foreach ($skills as $s)
        <option value="{{$s->name}}">{{ucwords($s->name)}}</option>
    @endforeach



        </select><br><br>
        <input type="text" id="otherSkillsInput" name="otherSkillsInput" style="display: none;" placeholder="Enter the required skills">

    <!-- <textarea id="skills" name="skills" placeholder="Enter the Required Skills" rows="5" maxlength="2500" onkeypress="return event.target.value.length < 150"></textarea>-->
    <span style="margin-top:-70px;" id="skillsError" class="error-message ">Please Enter the Required Skills</span>
</div>


    <script>
        $(document).ready(function() {

let multipleCancelButton1 = new Choices(`#skills`, {
    removeItemButton: true,
    maxItemCount: 10,
    searchResultLimit: 5,
    // renderChoiceLimit: 5
});
});

document.getElementById('skills').addEventListener('change', function() {
                var otherDegreeInput = document.getElementById('otherSkillsInput');
                if (this.value === 'Others') {
                    otherDegreeInput.style.display = 'block';
                } else {
                    otherDegreeInput.style.display = 'none';
                }
              });

        function validateSkills(event) {
            const skillsInput = event.target;
            const trimmedValue = skillsInput.value.trim();

            // Prevent space at the start or continuous spaces
            if (/^\s/.test(skillsInput.value) || /\s\s/.test(skillsInput.value)) {
                skillsInput.value = trimmedValue.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
            }
        }
    </script>


                <div class="input-box">
                <label for="duration">Duration(in months) <span style="color: red;">*</span></label>
                <select id="duration" name="duration" class="form-control" onblur="validateField(this)">
                <option value="">--Select duration--</option>
                <option value="1">1 month</option>
                <option value="2">2 months</option>
                <option value="3">3 months</option>
                <option value="4">4 months</option>
                <option value="5">5 months</option>
                <option value="6">6 months</option>
                <option value="7">7 months</option>
                <option value="8">8 months</option>
                <option value="9">9 months</option>
                <option value="10">10 months</option>
                <option value="11">11 months</option>
                <option value="12">12 months</option>
                </select>
                <span id="durationError" class="error-message">Please select the duration</span>
            </div>

            <div class="input-box">
              <label for="startDate">Application Start Date <span style="color: red;">*</span></label>
              <input type="date" id="startDate" name="startDate" onblur="validateField(this)">
              <span id="startDateError" class="error-message" style="display: none;">Please enter the start date</span>
            </div>

            <script>
              var startDateInput = document.getElementById("startDate");
              var today = new Date();
              var maxDate = new Date(today.getFullYear(), today.getMonth() + 3, today.getDate());

              startDateInput.setAttribute("min", today.toISOString().split('T')[0]);
              startDateInput.setAttribute("max", maxDate.toISOString().split('T')[0]);
            </script>

            <div class="input-box">
                <label for="applicationDeadline">Application End Date <span style="color: red;">*</span></label>
                <input type="date" id="applicationDeadline" name="applicationDeadline" onblur="validateField(this)">
                <span id="applicationDeadlineError" class="error-message ">Please enter the application deadline</span>
            </div>
            <script>
              var applicationDeadlineInput = document.getElementById("applicationDeadline");
    var today = new Date();
    var maxDeadline = new Date(today.getFullYear(), today.getMonth() + 3, today.getDate());

    applicationDeadlineInput.setAttribute("min", today.toISOString().split('T')[0]);
    applicationDeadlineInput.setAttribute("max", maxDeadline.toISOString().split('T')[0]);

            </script>

            <div class="input-box">
                <label for="stipend">Stipend <span style="color: red;">*</span></label>
                <select id="stipend" name="stipend" class="form-control" onblur="validateField(this)" onchange="showInputField(this.value)">
                    <option value="">Select stipend</option>
                    <option value="Pay to be determined later">Pay to be determined later</option>
                    <option value="Earnings discussed during interview">Earnings discussed during interview</option>
                    <option value="1000-2000">1000 - 2000</option>
                    <option value="2000-3000">2000 - 3000</option>
                    <option value="3000-4000">3000 - 4000</option>
                    <option value="4000-5000">4000 - 5000</option>
                    <option value="5000-6000">5000 - 6000</option>
                    <option value="6000-7000">6000 - 7000</option>
                    <option value="7000-8000">7000 - 8000</option>
                    <option value="8000-9000">8000 - 9000</option>
                    <option value="9000-10000">9000 - 10000</option>
                    <option value="More Than 10000">More Than 10000</option>
                    <option value="others">Others</option>
                </select><br>
                <input type="text" id="otherStipend" name="otherStipend" placeholder="Enter specific stipend amount (e.g., ₹11,500/month)" style="display: none;">
                <span id="stipendError" class="error-message" style="display: none;">Please select the stipend range</span>
            </div>

            <script>
                function showInputField(value) {
                    const otherStipendInput = document.getElementById('otherStipend');

                    if (value === 'others') {
                        otherStipendInput.style.display = 'block';
                    } else {
                        otherStipendInput.style.display = 'none';
                    }
                }
            </script>


                <div class="input-box">
                <label for="eligibility">Eligibility Criteria <span style="color: red;">*</span></label>
                <select id="eligibility" name="eligibility" class="form-control" onblur="validateField(this)">
                <option value="">Select eligibility</option>
                <option value="Pre-final year students">Pre-final year students</option>
                <option value="Final year students">Final year students</option>
                <option value="Both Pre-final and Final year students">Both Pre-final and Final year students</option>
                <option value="Graduates">Graduates</option>
                <option value="Post graduates">Post graduates</option>
                <option value="Both graduates and Post graduates">Both graduates and Post graduates</option>
                <option value="Both Pre-final year,Final year students and Graduates, Post graduates">Both Pre-final year,Final year students and Graduates, Post graduates</option>
                </select>
                <span id="eligibilityError" class="error-message">Please select the eligibility criteria</span>
                </div>


                <div class="input-box">
                <label for="degrees">Degrees Preferred <span style="color: red;">*</span></label>
                <select id="degrees" name="degrees[]" multiple name = "multiple-degrees">

                    <option value="">Select the preferred degrees</option>
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





{{--
                <option value="">Select the Preferred Degrees</option>
                <option value="Accounting, Finance, Business Administration">Accounting, Finance, Business Administration</option>
                <option value="Aerospace Engineering, Aviation Management">Aerospace Engineering, Aviation Management</option>
                <option value="Aeronautical Engineering">Aeronautical Engineering</option>
                <option value="Advanced Architectural Design">Advanced Architectural Design</option>
                <option value="Agriculture Engineering">Agriculture Engineering</option>
                <option value="Agriculture Science, Agronomy, Agricultural Engineering">Agriculture Science, Agronomy, Agricultural Engineering</option>
                <option value="All Engineering Domains">All Engineering Domains</option>
                <option value="Any Degree">Any Degree</option>
                <option value="Architecture">Architecture</option>
                <option value="Architecture, Architectural Engineering">Architecture, Architectural Engineering</option>
                <option value="Artificial Intelligence">Artificial Intelligence</option>
                <option value="AstroPhysics">AstroPhysics</option>
                <option value="Automobile Engineering">Automobile Engineering</option>
                <option value="Bio Chemistry">Bio Chemistry</option>
                <option value="Bioinformatics">Bioinformatics</option>
                <option value="Biology">Biology</option>
                <option value="Biomedical engineering">Biomedical engineering</option>
                <option value="Biotechnology, Biology, Biochemistry">Biotechnology, Biology, Biochemistry</option>
                <option value="Business Administration">Business Administration</option>
                <option value="Business Administration, Communication, Psychology">Business Administration, Communication, Psychology</option>
                <option value="Business Administration, Management, Public Administration">Business Administration, Management, Public Administration</option>
                <option value="Business Administration, Marketing, Communication">Business Administration, Marketing, Communication</option>
                <option value="Business Administration, Marketing, Retail Management">Business Administration, Marketing, Retail Management</option>
                <option value="Business Administration, specific industry-related degrees">Business Administration, specific industry-related degrees</option>
                <option value="Business Information Systems">Business Information Systems</option>
                <option value="Chemical engineering">Chemical engineering</option>
                <option value="Chemical Engineering, Chemistry">Chemical Engineering, Chemistry</option>
                <option value="Childhood Studies">Childhood Studies</option>
                <option value="Civil and Structural">Civil and Structural</option>
                <option value="Civil Engineering">Civil Engineering</option>
                <option value="Communication, Journalism, Media Studies">Communication, Journalism, Media Studies</option>
                <option value="Commerce">Commerce</option>
                <option value="Computer Science">Computer Science</option>
                <option value="Computer Science engineering">Computer Science engineering</option>
                <option value="Computer Science, Information Technology, Software Engineering">Computer Science, Information Technology, Software Engineering</option>
                <option value="Construction Management, Civil Engineering, Architecture">Construction Management, Civil Engineering, Architecture</option>
                <option value="Cosmetology, Beauty Therapy, Business Administration">Cosmetology, Beauty Therapy, Business Administration</option>
                <option value="Criminal Justice, Security Management">Criminal Justice, Security Management</option>
                <option value="Culinary Arts, Food Science, Hospitality Management">Culinary Arts, Food Science, Hospitality Management</option>
                <option value="Data Analytics for Business">Data Analytics for Business</option>
                <option value="Data science">Data science</option>
                <option value="Economics">Economics</option>
                <option value="Education">Education</option>
                <option value="Education, Teaching, Pedagogy, Psychology">Education, Teaching, Pedagogy, Psychology</option>
                <option value="Electrical">Electrical</option>
                <option value="Electrical engineering">Electrical engineering</option>
                <option value="Electronics and Communication">Electronics and Communication</option>
                <option value="Electronics and Communication Engineering">Electronics and Communication Engineering</option>
                <option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
                <option value="Energy Engineering, Environmental Science, Renewable Energy">Energy Engineering, Environmental Science, Renewable Energy</option>
                <option value="Engineering">Engineering</option>
                <option value="Engineering Management">Engineering Management</option>
                <option value="Environment and Energy Management">Environment and Energy Management</option>
                <option value="Environmental Science">Environmental Science</option>
                <option value="Environmental Science, Environmental Engineering">Environmental Science, Environmental Engineering</option>
                <option value="Fashion Design, Fashion Merchandising, Marketing">Fashion Design, Fashion Merchandising, Marketing</option>
                <option value="Fine Arts, Graphic Design, Visual Arts">Fine Arts, Graphic Design, Visual Arts</option>
                <option value="Finance">Finance</option>
                <option value="Finance, Economics, Business Administration">Finance, Economics, Business Administration</option>
                <option value="Fire and Safety Engineering">Fire and Safety Engineering</option>
                <option value="Forensic Science">Forensic Science</option>
                <option value="Geography">Geography</option>
                <option value="Geology, Earth Science">Geology, Earth Science</option>
                <option value="Global Logistics">Global Logistics</option>
                <option value="Graphic Design, Industrial Design, Web Design">Graphic Design, Industrial Design, Web Design</option>
                <option value="Guidance">Guidance</option>
                <option value="Healthcare Administration">Healthcare Administration</option>
                <option value="Historic Preservation">Historic Preservation</option>
                <option value="History">History</option>
                <option value="History of Architecture and Town Planning">History of Architecture and Town Planning</option>
                <option value="Hospitality Management, Business Administration, Hotel Management">Hospitality Management, Business Administration, Hotel Management</option>
                <option value="Human Resource Management, Psychology, Business Administration">Human Resource Management, Psychology, Business Administration</option>
                <option value="Human Resources">Human Resources</option>
                <option value="Humanities Studies, Philosophy, History">Humanities Studies, Philosophy, History</option>
                <option value="Industrial Engineering, Mechanical Engineering, Operations Management">Industrial Engineering, Mechanical Engineering, Operations Management</option>
                <option value="Industrial engineering">Industrial engineering</option>
                <option value="Information Technology">Information Technology</option>
                <option value="Information Technology, Computer Science, Software Engineering">Information Technology, Computer Science, Software Engineering</option>
                <option value="Insurance Studies, Business Administration, Risk Management">Insurance Studies, Business Administration, Risk Management</option>
                <option value="Interior and Spatial design">Interior and Spatial design</option>
                <option value="International Architectural Regeneration and Development">International Architectural Regeneration and Development</option>
                <option value="International Business">International Business</option>
                <option value="Journalism">Journalism</option>
                <option value="Law, Legal Studies, Criminal Justice">Law, Legal Studies, Criminal Justice</option>
                <option value="Law, Legal Studies, Paralegal Studies">Law, Legal Studies, Paralegal Studies</option>
                <option value="Library Science, Information Science">Library Science, Information Science</option>
                <option value="Leadership and Entreprenuer">Leadership and Entreprenuer</option>
                <option value="Lingustics">Lingustics</option>
                <option value="Logistics and Supplychain">Logistics and Supplychain</option>
                <option value="Logistics, Supply Chain Management, Civil Engineering">Logistics, Supply Chain Management, Civil Engineering</option>
                <option value="Logistics, Supply Chain Management, Operations Management">Logistics, Supply Chain Management, Operations Management</option>
                <option value="MacroEconomics">MacroEconomics</option>
                <option value="Marketing">Marketing</option>
                <option value="Marketing, Business Administration, Communication">Marketing, Business Administration, Communication</option>
                <option value="Marketing, Business Administration, Retail Management">Marketing, Business Administration, Retail Management</option>
                <option value="Mathematics">Mathematics</option>
                <option value="Mechanical">Mechanical</option>
                <option value="Mechanical engineering">Mechanical engineering</option>
                <option value="Mechanical Engineering, Civil Engineering, Electrical and Electronics Engineering">Mechanical Engineering, Civil Engineering, Electrical and Electronics Engineering</option>
                <option value="Medicine">Medicine</option>
                <option value="Medicine, Nursing, Healthcare Administration">Medicine, Nursing, Healthcare Administration</option>
                <option value="Medicine, Nursing, Healthcare Administration, Biology">Medicine, Nursing, Healthcare Administration, Biology</option>
                <option value="Nuclear engineering">Nuclear engineering</option>
                <option value="Nursing">Nursing</option>
                <option value="Nursing, Healthcare">Nursing, Healthcare</option>
                <option value="Pharmaceutical Sciences, Pharmacology, Chemistry">Pharmaceutical Sciences, Pharmacology, Chemistry</option>
                <option value="Pharmacy, Pharmaceutical Sciences">Pharmacy, Pharmaceutical Sciences</option>
                <option value="Physics">Physics</option>
                <option value="Political Science">Political Science</option>
                <option value="Product design and manufacturing">Product design and manufacturing</option>
                <option value="Production Engineering">Production Engineering</option>
                <option value="Psychology">Psychology</option>
                <option value="Psychology, Counseling, Behavioral Science">Psychology, Counseling, Behavioral Science</option>
                <option value="Public Administration">Public Administration</option>
                <option value="Public Administration, Political Science, Law">Public Administration, Political Science, Law</option>
                <option value="Quality Management, Engineering, Business Administration">Quality Management, Engineering, Business Administration</option>
                <option value="Real Estate Studies, Business Administration, Finance">Real Estate Studies, Business Administration, Finance</option>
                <option value="Regional Planning">Regional Planning</option>
                <option value="Research">Research</option>
                <option value="Research Methodology, specific field-related research degrees">Research Methodology, specific field-related research degrees</option>
                <option value="Robotics">Robotics</option>
                <option value="Rural Development">Rural Development</option>
                <option value="Safety Management">Safety Management</option>
                <option value="Social Policy">Social Policy</option>
                <option value="Social Services">Social Services</option>
                <option value="Social Work, Psychology, Sociology">Social Work, Psychology, Sociology</option>
                <option value="Software Engineering">Software Engineering</option>
                <option value="Sports Management">Sports Management</option>
                <option value="Sports Management, Kinesiology, Physical Education">Sports Management, Kinesiology, Physical Education</option>
                <option value="Strategy, Innovation and Management">Strategy, Innovation and Management</option>
                <option value="Systems engineering">Systems engineering</option>
                <option value="Tamil">Tamil</option>
                <option value="Telecommunications Engineering, Electrical Engineering">Telecommunications Engineering, Electrical Engineering</option>
                <option value="Thermal Engineering">Thermal Engineering</option>
                <option value="Urban Architecture">Urban Architecture</option>
                <option value="Urban Studies">Urban Studies</option>
                <option value="Veterinary Medicine, Animal Science">Veterinary Medicine, Animal Science</option>
                <option value="Visual Communication">Visual Communication</option>
                <option value="Welding Technology">Welding Technology</option>
                <option value="Women Studies">Women Studies</option>
                <option value="Zoology">Zoology</option>
                <option value="Others">Others</option> --}}

                            </select>
                            <input type="text" id="otherDegreeInput" name="otherDegreeInput" style="display: none;" placeholder="Enter the degrees preferred">
                        <span id="degreesError" class="error-message">Please select the degrees preferred</span>
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
                document.getElementById('degrees').addEventListener('change', function() {
                var otherDegreeInput = document.getElementById('otherDegreeInput');
                if (this.value === 'Others') {
                    otherDegreeInput.style.display = 'block';
                } else {
                    otherDegreeInput.style.display = 'none';
                }
              });

                </script>



                <!-- <div class="input-box">
                <label for="additionalInfo">Accommodation</label>
                <select id="additionalInfo" name="additionalInfo" class="form-control" onblur="validateField(this)">
                <option value="">Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>

                </select>
                <span id="additionalInfoError" class="error-message">Please select the accommodation option</span>
                </div> -->

                <div class="input-box">
                  <label for="contactEmail">Contact Email</label>
                  <input type="text" id="contactEmail" name="contactEmail"  placeholder="Enter the email id" onblur="validateField(this)" onkeyup="this.value=this.value.replace(/[^a-z0-9@._-]/g,'')">
                  <!--<span id="contactEmailError" class="error-message ">Please Enter the Contact Email</span>-->
              </div>

              <div class="input-box">
            <label for="contactMobile">Contact Number</label>
            <input type="text" id="contactMobile"  name="contactMobile" placeholder="Enter the contact number">
           <!-- <span id="contactMobileError" class="error-message ">Please Enter the Contact Mobile_Number</span>-->
            </div>

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

                document.getElementById("contactMobile").addEventListener("blur", function() {
                    validateField('contactMobile');
                });

                document.getElementById("contactMobile").addEventListener("keypress", function(event) {
                    var keyPressed = event.key;
                    var inputValue = event.target.value;
                    var firstDigit = parseInt(keyPressed);
                    if (inputValue.length === 0 && ![6, 7, 8, 9].includes(firstDigit)) {
                        event.preventDefault(); // Prevent input if first digit is not allowed
                    }
                });

                document.getElementById("contactMobile").addEventListener("input", function() {
                    var inputValue = this.value;
                    if (inputValue.length === 10) {
                        validateField('contactMobile');
                    }
                });
            </script>








                <div class="input-box">
                    <label for="applicationProcedure">Company Information</label>
                    <textarea id="applicationProcedure" name="company_info" placeholder="Enter the company information" rows="15" maxlength="5000" onblur="validateField(this)" oninput="validateApplicationProcedure(event)"></textarea>
                    <span id="applicationProcedureError" class="error-message" style="display: none;">Please Enter the Company Information</span>
                </div>

                <script>
                    function validateApplicationProcedure(event) {
                        const procedureInput = event.target;
                        const trimmedValue = procedureInput.value.trim();

                        // Prevent space at the start or continuous spaces
                        if (/^\s/.test(procedureInput.value) || /\s\s/.test(procedureInput.value)) {
                            procedureInput.value = trimmedValue.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
                        }
                    }
                </script>

                <div class="input-box">
                    <label for="selectionProcess">Internship Responsibilities <span style="color: red;">*</span></label>
                    <textarea id="selectionProcess" name="responsibilities" placeholder="Enter the responsibilities" rows="15" maxlength="5000" onblur="validateField(this)" oninput="validateSelectionProcess(event)"></textarea>
                    <span id="selectionProcessError" class="error-message" style="display: none;">Please enter the internship Responsibilities details</span>
                </div>

                <script>
                    function validateSelectionProcess(event) {
                        const processInput = event.target;
                        const trimmedValue = processInput.value.trim();

                        // Prevent space at the start or continuous spaces
                        if (/^\s/.test(processInput.value) || /\s\s/.test(processInput.value)) {
                            processInput.value = trimmedValue.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
                        }
                    }
                </script>

                <div class="input-box">
                <label for="totalVacancies">Total Vacancies <span style="color: red;">*</span></label>
                <select id="totalVacancies" name="totalVacancies" class="form-control" onblur="validateField(this)">
                <option value="">Select total vacancies</option>
                <!-- Generate options using a loop for numbers from 1 to 500 -->
                @php


                    for ($i = 1; $i <= 500; $i++) {
                    echo "<option value='$i'>$i</option>";
                    }
                @endphp
                </select>
                <span id="totalVacanciesError" class="error-message">Please select the total vacancies</span>
                </div>

                <!-- <div class="input-box">
                    <label for="address">Training Address:</label>
                    <input type="text" placeholder="Enter the Door No & Building Name" name="address" id="address" maxlength="100" onblur="validateField(this)" oninput="validateAddress(event)">
                    <span id="addressError" class="error-message" style="display: none;">Please enter your Door no & Building Name</span>
                </div>

                <script>
                    function validateAddress(event) {
                        const addressInput = event.target;
                        const trimmedValue = addressInput.value.trim();

                        // Prevent space at the start or continuous spaces
                        if (/^\s/.test(addressInput.value) || /\s\s/.test(addressInput.value)) {
                            addressInput.value = trimmedValue.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
                        }
                    }
                </script>

                <div class="input-box">
                    <label for="street">Street:</label>
                    <input type="text" placeholder="Enter your street name" name="street" id="street" maxlength="100" oninput="validateStreet(event)">
                    <span id="streetError" class="error-message" style="display: none;">Please enter your street name</span>
                </div>

                <script>
                    function validateStreet(event) {
                        const streetInput = event.target;
                        const trimmedValue = streetInput.value.trim();

                        // Prevent space at the start or continuous spaces
                        if (/^\s/.test(streetInput.value) || /\s\s/.test(streetInput.value)) {
                            streetInput.value = trimmedValue.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
                        }
                    }
                </script>

                <div class="input-box">
                    <label for="vt">Village/Town:</label>
                    <input type="text" placeholder="Enter your Village/Town" name="vt" id="vt" maxlength="50" oninput="validateVillageTown(event)">
                    <span id="vtError" class="error-message" style="display: none;">Please enter your village/town name</span>
                </div>

                <script>
                    function validateVillageTown(event) {
                        const vtInput = event.target;
                        const trimmedValue = vtInput.value.trim();

                        // Prevent space at the start or continuous spaces
                        if (/^\s/.test(vtInput.value) || /\s\s/.test(vtInput.value)) {
                            vtInput.value = trimmedValue.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
                        }
                    }
                </script> -->


            <div class="input-box">
                <label for="country">Country <span style="color: red;">*</span></label>
                <select placeholder="Enter your country" name="country" id="country" onblur="validateField(this)">
                <option value="">Select country</option>
                </select>
                <span id="countryError" class="error-message">Please select the country</span>
                </div>

                <div class="input-box">
                <label for="state">State <span style="color: red;">*</span></label>
                <select placeholder="Enter your state" name="state" id="state" onblur="validateField(this)" onchange="updateCities()">
                    <option value="">Select state</option>
                </select>
                <span id="stateError" class="error-message">Please select the state</span>
            </div>

            <div class="input-box">
                <label for="district">District <span style="color: red;">*</span></label>
                <select placeholder="Enter your district" name="district" id="district" onblur="validateField(this)">
                    <option value="">Work location</option>
                </select>
                <span id="districtError" class="error-message">Please select your preferred work location</span>
            </div>


            <div class="input-box">
                <label for="photo">Company Logo <span style="color: red;">*</span></label>
                <input type="file" name="photo" id="photo" accept=".jpg, .jpeg" onblur="validateField(this)">
                <span id="photoError" class="error-message">Please upload your Company Logo in JPG or JPEG format</span>
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
                <button type="submit" class="btn">Post Internship</button>
                </div>
                </div>
                </form>
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

            var company_name = document.getElementById('company_name').value;
            var internship_title = document.getElementById('internship_title').value;
            var internship_type = document.getElementById('internship_type').value;
            var ptft = document.getElementById('ptft').value;
            var jobDescription = document.getElementById('jobDescription').value;
            var duration = document.getElementById('duration').value;
            var startDate = document.getElementById('startDate').value;
            var applicationDeadline = document.getElementById('applicationDeadline').value;
            var stipend = document.getElementById('stipend').value;
            var skills = document.getElementById('skills').value;
            var eligibility = document.getElementById('eligibility').value;
            var degrees = document.getElementById('degrees').value;
            // var additionalInfo = document.getElementById('additionalInfo').value;
            // var contactEmail = document.getElementById('contactEmail').value;
            // var contacttype = document.getElementById('contacttype').value;
            // var contactMobileField = document.getElementById('contactMobile').value;
            // var landlineField  = document.getElementById('landline').value;
            var totalVacancies = document.getElementById('totalVacancies').value;
            var applicationProcedure = document.getElementById('applicationProcedure').value;
            var selectionProcess = document.getElementById('selectionProcess').value;
            // var address = document.getElementById('address').value;
            // var street = document.getElementById('street').value;
            // var vt = document.getElementById('vt').value;
            var country = document.getElementById('country').value;
            var state = document.getElementById('state').value;
            var district = document.getElementById('district').value;
            // var pincode = document.getElementById('pincode').value;
            var photo = document.getElementById('photo').value;

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
} else if (/[\W\d]{6,}/.test(company_name)) {
    document.getElementById('company_nameError').innerText = 'Company Name should not contain a continuous sequence of more than 5 special characters or numbers.';
    document.getElementById('company_nameError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('company_name', 'company_nameError');
} else {
    document.getElementById('company_nameError').style.display = 'none';
}

const specialChar = (internship_title.match(/[^\w\s]|(?<!\s)\s(?!\s)|-{2,}|[+\-*/=^%$#@!&()|[\]{}:;'"<>?,.]/g) || []).filter(char => char.trim() !== ' ').length;
    const consecutiveSpecialChars = (internship_title.match(/[+\-*/=^%$#@!&()|[\]{}:;'"<>?,.]{3,}/g) || []).length;

    if (internship_title === '') {
      document.getElementById('internship_titleError').innerText = 'Internship role is required.';
      document.getElementById('internship_titleError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('internship_title', 'internship_titleError');
    } else if (internship_title.length > 50) {
      document.getElementById('internship_titleError').innerText = 'Internship role should not exceed 50 characters.';
      document.getElementById('internship_titleError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('internship_title', 'internship_titleError');
    } else if (specialChar > 4) {
      document.getElementById('internship_titleError').innerText = 'Internship role can have at most four special characters.';
      document.getElementById('internship_titleError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('internship_title', 'internship_titleError');
    }else if (consecutiveSpecialChars > 0) {
      document.getElementById('internship_titleError').innerText = 'Internship role can have at most two consecutive special characters.';
      document.getElementById('internship_titleError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('internship_title', 'internship_titleError');
    }else {
      document.getElementById('internship_titleError').style.display = 'none';
    }

    if (internship_type === '') {
      document.getElementById('internship_typeError').innerText = 'Internship type is required';
      document.getElementById('internship_typeError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('internship_type', 'internship_typeError');
    }else {
      document.getElementById('internship_typeError').style.display = 'none';
    }

    if (ptft === '') {
      document.getElementById('ptftError').innerText = 'Please select the part-time/full-time.';
      document.getElementById('ptftError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('ptft', 'ptftError');
    }else {
      document.getElementById('ptftError').style.display = 'none';
    }

        // Job Description validation with length limit (maximum of 6000 characters)
    if (jobDescription === '') {
      document.getElementById('jobDescriptionError').innerText = 'Please enter the internship description';
      document.getElementById('jobDescriptionError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
    } else if (jobDescription.length < 10) { // Adding minimum length limit (10 characters)
      document.getElementById('jobDescriptionError').innerText = 'Internship description should contain atleast 10 characters';
      document.getElementById('jobDescriptionError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
    }  else if (jobDescription.length > 6000) { // Adding length limit (6000 characters)
      document.getElementById('jobDescriptionError').innerText = 'Internship description should not exceed 6000 characters';
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


    // Get the current date without the time (set hours, minutes, seconds, and milliseconds to 0)
    var currentDate = new Date();
    currentDate.setHours(0, 0, 0, 0);

    var providedDate = new Date(startDate);

    // Set the provided date without the time (if needed)
    providedDate.setHours(0, 0, 0, 0);

    if (providedDate < currentDate) {
      // Display error message for past start dates
      document.getElementById('startDateError').innerText = 'Start date should be today or in the future';
      document.getElementById('startDateError').style.display = 'block';
      isValid = false;
    } else {
      document.getElementById('startDateError').style.display = 'none';
    }


    if (startDate === '') {
      // Display error message for startDate field
      document.getElementById('startDateError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('startDate', 'startDateError');
    } else if (applicationDeadline === '') {
      // Display error message for applicationDeadline field
      document.getElementById('applicationDeadlineError').innerText = 'Please provide the application deadline';
      document.getElementById('applicationDeadlineError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('applicationDeadline', 'applicationDeadlineError');
    } else {
      var start = new Date(startDate);
      var deadline = new Date(applicationDeadline);

      // Set hours, minutes, seconds, and milliseconds to 0 for comparison
      start.setHours(0, 0, 0, 0);
      deadline.setHours(0, 0, 0, 0);

      if (deadline <= start) {
        // Display error message for deadline not after start date
        document.getElementById('applicationDeadlineError').innerText = 'Deadline should be after the start date';
        document.getElementById('applicationDeadlineError').style.display = 'block';
        isValid = false;
        hideErrorMessageOnFocus('applicationDeadline', 'applicationDeadlineError');
      } else {
        document.getElementById('applicationDeadlineError').style.display = 'none';
      }
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
      document.getElementById('skillsError').innerText = 'Please enter your skills';
      document.getElementById('skillsError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('skills', 'skillsError');
    }  else {
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

            if (degrees === '') {
                // Display error message for duration field
                document.getElementById('degreesError').style.display = 'block';
                isValid = false;
                hideErrorMessageOnFocus('degrees', 'degreesError');
            } else {
                document.getElementById('degreesError').style.display = 'none';
            }

            // if (additionalInfo === '') {
            //   // Display error message for additionalInfo field
            //   document.getElementById('additionalInfoError').style.display = 'block';
            //   isValid = false;
            //   hideErrorMessageOnFocus('additionalInfo', 'additionalInfoError');
            // } else {
            //   document.getElementById('additionalInfoError').style.display = 'none';
            // }

    // // Email address validation patterns
    // var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    // var emailSpecialCharPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    // var emailDoesNotStartWithDot = /^[^.]/; // New regex pattern to check email doesn't start with '.'
    // var containsOnlyNumbers = /^\d+$/; // New regex pattern to check if email contains only numbers

    // // Additional constraints
    // var minLength = 4;
    // var maxLength = 50;

    // if (contactEmail === '') {
    //     document.getElementById('contactEmailError').style.display = 'none';
    // } else if (contactEmail.length < minLength || contactEmail.length > maxLength) {
    //     document.getElementById('contactEmailError').textContent = 'Email address should be between ' + minLength + ' and ' + maxLength + ' characters.';
    //     document.getElementById('contactEmailError').style.display = 'block';
    //     isValid = false;
    //     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
    // } else if (!emailPattern.test(contactEmail)) {
    //     document.getElementById('contactEmailError').textContent = 'Invalid email address format.';
    //     document.getElementById('contactEmailError').style.display = 'block';
    //     isValid = false;
    //     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
    // } else if (!emailSpecialCharPattern.test(contactEmail)) {
    //     document.getElementById('contactEmailError').textContent = 'Email contains invalid special characters.';
    //     document.getElementById('contactEmailError').style.display = 'block';
    //     isValid = false;
    //     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
    // } else if (contactEmail.startsWith(' ') || contactEmail.endsWith(' ')) {
    //     document.getElementById('contactEmailError').textContent = 'Email address should not start or end with a space.';
    //     document.getElementById('contactEmailError').style.display = 'block';
    //     isValid = false;
    //     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
    // } else if (contactEmail.includes('..')) {
    //     document.getElementById('contactEmailError').textContent = 'Email address cannot contain consecutive dots.';
    //     document.getElementById('contactEmailError').style.display = 'block';
    //     isValid = false;
    //     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
    // } else if (containsOnlyNumbers.test(contactEmail.split('@')[0])) {
    //     document.getElementById('contactEmailError').textContent = 'Email address should not contain only numbers.';
    //     document.getElementById('contactEmailError').style.display = 'block';
    //     isValid = false;
    //     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
    // } else if (!emailDoesNotStartWithDot.test(contactEmail)) {
    //     document.getElementById('contactEmailError').textContent = 'Email address should not start with a dot.';
    //     document.getElementById('contactEmailError').style.display = 'block';
    //     isValid = false;
    //     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
    // } else {
    //     document.getElementById('contactEmailError').style.display = 'none';
    // }



    // //   if (contacttype === '') {
    // //   document.getElementById('contacttypeError').innerText = 'Please select the contact type.';
    // //   document.getElementById('contacttypeError').style.display = 'block';
    // //   isValid = false;
    // //   hideErrorMessageOnFocus('contacttype', 'contacttypeError');
    // // }else {
    // //   document.getElementById('contacttypeError').style.display = 'none';
    // // }

    // // Mobile Number validation
    // var mobilePattern = /^\d{10}$/;
    // var contactMobileField = document.getElementById('contactMobile');
    // var contactMobileError = document.getElementById('contactMobileError');

    // function validateMobileNumber() {
    //         var mobilePattern = /^[6789]\d{9}$/;

    //         if (!contactMobileField.disabled) {
    //             if (contactMobileField.value === '') {
    //                 contactMobileError.textContent = 'Mobile number is required.';
    //                 contactMobileError.style.display = 'block';
    //                 isValid = false;
    //                 hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
    //             } else if (!mobilePattern.test(contactMobileField.value)) {
    //                 contactMobileError.textContent = 'Please enter a valid Indian mobile number starting with 6, 7, 8, or 9.';
    //                 contactMobileError.style.display = 'block';
    //                 isValid = false;
    //                 hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
    //             } else {
    //                 contactMobileError.style.display = 'none';
    //             }
    //         }
    //     }

    // // Landline Number validation
    // var landlinePattern = /^0\d{11}$/;
    // var landlineField = document.getElementById('landline');
    // var landlineError = document.getElementById('landlineError');

    // if (!landlineField.disabled) {
    //     if (landlineField.value === '') {
    //         landlineError.textContent = 'Landline number is required.';
    //         landlineError.style.display = 'block';
    //         isValid = false;
    //         hideErrorMessageOnFocus('landline', 'landlineError');
    //     } else if (!landlinePattern.test(landlineField.value) || /\D/.test(landlineField.value)) {
    //         landlineError.textContent = 'Invalid landline number. Please enter a valid landline number starting with 0 and having 12 digits.';
    //         landlineError.style.display = 'block';
    //         isValid = false;
    //         hideErrorMessageOnFocus('landline', 'landlineError');
    //     } else {
    //         landlineError.style.display = 'none';
    //     }
    // }


            if (totalVacancies === '') {
              // Display error message for totalVacancies field
              document.getElementById('totalVacanciesError').style.display = 'block';
              isValid = false;
              hideErrorMessageOnFocus('totalVacancies', 'totalVacanciesError');
            } else {
              document.getElementById('totalVacanciesError').style.display = 'none';
            }




    // Application Procedure validation with length limit (maximum of 5000 characters)
    if (applicationProcedure === '') {
      document.getElementById('applicationProcedureError').innerText = '';
      document.getElementById('applicationProcedureError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('applicationProcedure', 'applicationProcedureError');
    } else if (applicationProcedure.length > 5000) { // Adding length limit (5000 characters)
      document.getElementById('applicationProcedureError').innerText = 'Company information should not exceed 5000 characters';
      document.getElementById('applicationProcedureError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('applicationProcedure', 'applicationProcedureError');
    } else if (/(.)\1{2,}/.test(applicationProcedure)) {
      document.getElementById('applicationProcedureError').innerText = 'Company information should not contain continuous special characters';
      document.getElementById('applicationProcedureError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('applicationProcedure', 'applicationProcedureError');
    } else {
      document.getElementById('applicationProcedureError').style.display = 'none';
    }



    // Selection Process validation with length limit (maximum of 5000 characters)
    if (selectionProcess === '') {
      document.getElementById('selectionProcessError').innerText = 'Please enter the internship responsibilities';
      document.getElementById('selectionProcessError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('selectionProcess', 'selectionProcessError');
    } else if (selectionProcess.length > 5000) { // Adding length limit (5000 characters)
      document.getElementById('selectionProcessError').innerText = 'Responsibilities should not exceed 5000 characters';
      document.getElementById('selectionProcessError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('selectionProcess', 'selectionProcessError');
    } else if (/(.)\1{2,}/.test(selectionProcess)) {
      document.getElementById('selectionProcessError').innerText = 'Responsibilities should not contain continuous special characters';
      document.getElementById('selectionProcessError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('selectionProcess', 'selectionProcessError');
    } else {
      document.getElementById('selectionProcessError').style.display = 'none';
    }


    // Address validation with length limit (maximum of 100 characters)
    // if (address === '') {
    //   document.getElementById('addressError').innerText = 'Please enter your address.';
    //   document.getElementById('addressError').style.display = 'block';
    //   isValid = false;
    //   hideErrorMessageOnFocus('address', 'addressError');
    // } else if (address.length > 100) { // Adding length limit (100 characters)
    //   document.getElementById('addressError').innerText = 'Address should not exceed 100 characters.';
    //   document.getElementById('addressError').style.display = 'block';
    //   isValid = false;
    //   hideErrorMessageOnFocus('address', 'addressError');
    // }else if (/(.)\1{2,}/.test(address)) {
    //   document.getElementById('addressError').innerText = 'Address should not contain continuous special characters.';
    //   document.getElementById('addressError').style.display = 'block';
    //   isValid = false;
    //   hideErrorMessageOnFocus('address', 'addressError');
    // } else {
    //   document.getElementById('addressError').style.display = 'none';
    // }


    // Street validation with length limit (maximum of 100 characters)
    // if (street === '') {
    //   document.getElementById('streetError').innerText = 'Please enter your street.';
    //   document.getElementById('streetError').style.display = 'block';
    //   isValid = false;
    //   hideErrorMessageOnFocus('street', 'streetError');
    // } else if (street.length > 100) { // Adding length limit (100 characters)
    //   document.getElementById('streetError').innerText = 'Street should not exceed 50 characters.';
    //   document.getElementById('streetError').style.display = 'block';
    //   isValid = false;
    //   hideErrorMessageOnFocus('street', 'streetError');
    // }else if (/(.)\1{2,}/.test(street)) {
    //   document.getElementById('streetError').innerText = 'Street should not contain continuous special characters.';
    //   document.getElementById('streetError').style.display = 'block';
    //   isValid = false;
    //   hideErrorMessageOnFocus('street', 'streetError');
    // } else {
    //   document.getElementById('streetError').style.display = 'none';
    // }


    // Validation for vt with length limit (maximum of 50 characters)
    // if (vt === '') {
    //   document.getElementById('vtError').innerText = 'Please enter the Village/Town.';
    //   document.getElementById('vtError').style.display = 'block';
    //   isValid = false;
    //   hideErrorMessageOnFocus('vt', 'vtError');
    // } else if (vt.length > 50) { // Adding length limit (50 characters)
    //   document.getElementById('vtError').innerText = 'Village/Town should not exceed 50 characters.';
    //   document.getElementById('vtError').style.display = 'block';
    //   isValid = false;
    //   hideErrorMessageOnFocus('vt', 'vtError');
    // } else if (/(.)\1{2,}/.test(vt)) {
    //   document.getElementById('vtError').innerText = 'Village/Town should not contain continuous special characters.';
    //   document.getElementById('vtError').style.display = 'block';
    //   isValid = false;
    //   hideErrorMessageOnFocus('vt', 'vtError');
    // }else {
    //   document.getElementById('vtError').style.display = 'none';
    // }


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

    //   if (pincode === '') {
    //   document.getElementById('pincodeError').innerText = 'Please enter your postal code.';
    //   document.getElementById('pincodeError').style.display = 'block';
    //   isValid = false;
    //   hideErrorMessageOnFocus('pincode', 'pincodeError');
    // } else {

    // // Validate pincode format
    //   var pincodeRegex =/^[1-9][0-9]{5}$/;
    //   if (!pincodeRegex.test(pincode)) {
    //     document.getElementById('pincodeError').innerText = 'Invalid pincode format. Please enter a valid 6 digit postal code.';
    //     document.getElementById('pincodeError').style.display = 'block';
    //     isValid = false;
    //     hideErrorMessageOnFocus('pincode', 'pincodeError');
    //   } else if (pincode.length !== 6) {
    //     document.getElementById('pincodeError').innerText = 'Postal code should be exactly 6 characters long.';
    //     document.getElementById('pincodeError').style.display = 'block';
    //     isValid = false;
    //     hideErrorMessageOnFocus('pincode', 'pincodeError');
    //   } else {
    //     document.getElementById('pincodeError').style.display = 'none';
    //   }
    // }
    var photoInput = document.getElementById('photo');
var photoError = document.getElementById('photoError');
var isValid = true;

if (!photoInput.files[0]) {
    // Handle empty file field
    photoError.innerText = 'Please upload your company logo';
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
          </script>
      @include('layouts.company_footer')
       <script src="{{asset('asset/js/dropdown.js')}}" ></script>
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
