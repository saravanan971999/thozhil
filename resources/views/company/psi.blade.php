<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Job Post Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

    <link rel="stylesheet" href="{{ asset('asset/css/NEWinternshippost.css') }}">

    <style>

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
                 {{-- <div class="rectangular"></div>
                <div class="square"></div> --}}
            </div> -->
            <br>
            <div class="title">
                <center><h1>Post your Job Details</h1></center><br>
                <center><h3>1000+ companies hiring on <Span>OneYes</Span> Internships</h3></center>
                </div>
                <br>

            <div class="container">
                <form action="{{url('job_posting_form')}}" id="registrationForm" method="POST">
                    @csrf
                        <div class="user-details">
        <div class="input-box">
                        <label for="company_name">Company Name</label>
                        <input type="text"  placeholder="Enter company name" name="company_name" id="company_name" maxlength="100" onkeydown="return validateCompanyName(event)">
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
            <label for="job_type">Job type</label>
            <select id="job_type" placeholder="Select your Job Type" name="job_type">
                <option value="">Select your Tob Type</option>
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
<span id="job_typeError" class="error-message  alert alert-warning">Please select your job type</span><br><br>
<input type="text" id="otherjob_typeInput" name="otherjob_typeInput" style="display: none;" placeholder="Enter the other job type">
</div>
<script>
document.getElementById('job_type').addEventListener('change', function() {
var otherDegreeInput = document.getElementById('otherjob_typeInput');
if (this.value === 'others') {
  otherDegreeInput.style.display = 'block';
} else {
  otherDegreeInput.style.display = 'none';
}
});

</script>

        <div class="input-box">
            <label for="job_title">Job Title</label>
            <input type="text" placeholder="Enter the job title" name="job_title" id="job_title" onkeypress="return /[a-zA-Z]/i.test(event.key) && this.value.length < 50">
            <span id="job_titleError" class="error-message  alert alert-warning ">Please enter the job title</span>
        </div>

        <div class="input-box">
            <label for="totalVacancies">Total Vacancies:</label>
            <select id="totalVacancies" name="totalVacancies" class="form-control">
            <option value="">Select Total Vacancies</option>
            <!-- Generate options using a loop for numbers from 1 to 1000 -->
            @php
                for ($i = 1; $i <= 1000; $i++) {
                echo "<option value='$i'>$i</option>";
                }
            @endphp
            </select>
            <span id="totalVacanciesError" class="error-message alert alert-warning">Please select the total vacancies</span>
            </div>

            <div class="input-box">
            <label for="jobDescription">Job Description:</label>
            <textarea id="jobDescription" name="jobDescription" placeholder="Enter the Job Description" rows="5" maxlength="2500" onkeypress="return event.target.value.length < 250"></textarea>
            <span id="jobDescriptionError" class="error-message alert alert-warning ">Please provide the Job Description</span>
        </div>

            <div class="input-box">
            <label for="skills">Required Skills:</label>
            <select id="skills" name="skills[]" multiple name = "multiple-skills">
            <option value="">Select the Required Skills</option>
    <option value="Java">Java</option>
    <option value="Python">Python</option>
    <option value="React">React</option>
    <option value="PHP">PHP</option>
    <option value="Laravel">Laravel</option>
    <option value="MYSQL">MYSQL</option>
    <option value="Kotlin">Kotlin</option>
    <option value="Swift">Swift</option>



                </select>

            <!-- <textarea id="skills" name="skills" placeholder="Enter the Required Skills" rows="5" maxlength="2500" onkeypress="return event.target.value.length < 150"></textarea>-->
            <span id="skillsError" class="error-message alert alert-warning ">Please Enter the Required Skills</span>
        </div>



            <div class="input-box">
            <label for="startDate">Start Date:</label>
            <input type="date" id="startDate" name="startDate">
            <span id="startDateError" class="error-message alert alert-warning ">Please Enter the Start Date</span>
        </div>

            <div class="input-box">
            <label for="applicationDeadline">Application Deadline:</label>
            <input type="date" id="applicationDeadline" name="applicationDeadline">
            <span id="applicationDeadlineError" class="error-message alert alert-warning ">Please Enter the Application Deadline</span>
        </div>

        <div class="input-box">
    <label for="salary">Salary Package:</label>
    <select id="salary" name="salary" onchange="showOtherField()">
        <option value="">Select Salary Package</option>
        <option value="1-2LPA">1-2LPA</option>
        <option value="2-3LPA">2-3LPA</option>
        <option value="3-4LPA">3-4LPA</option>
        <option value="4-5LPA">4-5LPA</option>
        <option value="5-6LPA">5-6LPA</option>
        <option value="6-7LPA">6-7LPA</option>
        <option value="7-8LPA">7-8LPA</option>
        <option value="8-9LPA">8-9LPA</option>
        <option value="9-10LPA">9-10LPA</option>
        <option value="More than 10LPA">More than 10LPA</option>
        <option value="others">Others</option>
    </select>

    <div id="otherSalaryField" style="display: none;">
        <label for="otherSalary">Enter Salary:</label>
        <input type="text" id="otherSalary" name="otherSalary">
    </div>

    <span id="salaryError" class="error-message alert alert-warning">Please select the salary package</span>
</div>

<script>
    function showOtherField() {
        var salaryDropdown = document.getElementById("salary");
        var otherSalaryField = document.getElementById("otherSalaryField");

        if (salaryDropdown.value === "others") {
            otherSalaryField.style.display = "block";
        } else {
            otherSalaryField.style.display = "none";
        }
    }
</script>


<div class="input-box">
            <label for="qualification"> Qualification:</label>
            <select id="qualification" name="qualification">
            <option value="">Select the Qualification</option>
            <option value="PG">PG</option>
            <option value="UG">UG</option>
            <option value="PG">PG(Arts)</option>
            <option value="UG">UG(Arts)</option>
            <option value="Diploma">Diploma</option>
            <option value="Mphil">Mphil</option>
            <option value="Doctoral-Degrees">Doctoral-Degrees</option>
            <option value="Both PG and UG">Both PG and UG</option>
            <option value="Both PG and UG">Both PG and UG(Arts)</option>
            <option value="PG,UG and Diploma">PG,UG and Diploma</option>
            <option value="Mphil and Doctoral-Degrees">Mphil and Doctoral-Degrees</option>
            <option value="All Qualifications Eligible">All Qualifications Eligible</option>
            <option value="Others">Others</option>
    </select><br><br>
    <input type="text" id="otherQualificationInput" name="otherQualificationInput" style="display: none;" placeholder="Enter the qualification">
    <span id="qualificationError" class="error-message alert alert-warning">Please select the Qualification</span>
    </div>
<script>
    document.getElementById('qualification').addEventListener('change', function() {
    var otherQualificationInput = document.getElementById('otherQualificationInput');
    if (this.value === 'Others') {
        otherQualificationInput.style.display = 'block';
    } else {
        otherQualificationInput.style.display = 'none';
    }
});

    </script>



            <div class="input-box">
            <label for="degrees">Degrees Preferred:</label>
            <select id="degrees" name="degrees[]" multiple name = "multiple-degrees">
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
    <option value="Others">Others</option>

                </select>
                <input type="text" id="otherDegreeInput" name="otherDegreeInput" style="display: none;" placeholder="Enter the Degrees Preferred">
            <span id="degreesError" class="error-message alert alert-warning">Please select the degrees preferred</span>
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

$(document).ready(function() {

let multipleCancelButton1 = new Choices(`#skills`, {
    removeItemButton: true,
    maxItemCount: 5,
    searchResultLimit: 5,
    // renderChoiceLimit: 5
});
});

    </script>



            <div class="input-box">
            <label for="experience">Experience Required(in years):</label>
            <select id="experience" name="experience" >
            <option value="">Select the Experience Required</option>
            <option value="Fresher">Fresher</option>
            <option value="0-1yrs">0-1yrs</option>
            <option value="1-2yrs">1-2yrs</option>
            <option value="2-3yrs">2-3yrs</option>
            <option value="3-4yrs">3-4yrs</option>
            <option value="4-5yrs">4-5yrs</option>
            <option value="5-6yrs">5-6yrs</option>
            <option value="6-7yrs">6-7yrs</option>
            <option value="7-8yrs">7-8yrs</option>
            <option value="8-9yrs">8-9yrs</option>
            <option value="9-10yrs">9-10yrs</option>
            <option value="More than 10yrs">More than 10yrs</option>
            </select>
            <span id="experienceError" class="error-message alert alert-warning">Please select the Experience Required</span>
            </div>



            <div class="input-box">
            <label for="contactEmail">Contact Email:</label>
            <input type="email" id="contactEmail"  name="contactEmail" placeholder="Enter the Email Id">
            <span id="contactEmailError" class="error-message alert alert-warning ">Please Enter the Contact Email</span>
            </div>

            <div class="input-box">
            <label for="contactMobile">Contact Mobile Number:</label>
            <input type="number" id="contactMobile"  name="contactMobile" placeholder="Enter the Mobile Number">
            <span id="contactMobileError" class="error-message alert alert-warning ">Please Enter the Contact Mobile_Number</span>
            </div>


            <div class="input-box">
                <label for="applicationProcedure">Company Information:</label>
                <textarea id="applicationProcedure" name="company_info" placeholder="Enter the company details" rows="5" maxlength="2500" onkeypress="return event.target.value.length < 500">{{$emp->description}}</textarea>
                <span id="applicationProcedureError" class="error-message alert alert-warning ">Please Enter the Company Information</span>
            </div>


            <div class="input-box">
            <label for="selectionProcess">Responsibilities:</label>
            <textarea id="selectionProcess" name="responsibilities" placeholder="Enter the responsibilities" rows="5" maxlength="2500" onkeypress="return event.target.value.length < 250"></textarea>
            <span id="selectionProcessError" class="error-message alert alert-warning ">Please Enter the Responsibilities details</span>
        </div>



        <div class="input-box">
            <label for="workLocation">Work Location:</label>
            <input type="text" id="workLocation" name="workLocation" placeholder="Enter the preferred work location" maxlength="100" onkeypress="return event.target.value.length < 100">
            <span id="workLocationError" class="error-message alert alert-warning ">Please Enter the preferred work location</span>
        </div>




        <div class="input-box">
            <label for="additionalInfo">Accommodation:</label>
            <select id="additionalInfo" name="additionalInfo" class="form-control">
            <option value="">Select</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>

            </select>
            <span id="additionalInfoError" class="error-message alert alert-warning">Please select the accommodation option</span>
            </div>

            {{-- <div class="input-box">
            <label for="address">Address:</label>
            <input type="text" placeholder="Enter the Door No & Building Name" name="address" id="address" maxlength="100" onkeypress="return event.target.value.length < 100">
            <span id="addressError" class="error-message alert alert-warning">Please enter your Door no & Building Name</span>
        </div>

            <div class="input-box">
            <label for="street">Street:</label>
            <input type="text" placeholder="Enter your street name" name="street" id="street" maxlength="70" onkeypress="return event.target.value.length < 70">
            <span id="streetError" class="error-message alert alert-warning">Please enter your street name</span>
        </div>

            <div class="input-box">
            <label for="vt">Village/Town:</label>
            <input type="text" placeholder="Enter your Village/Town" name="vt" id="vt" maxlength="50" onkeypress="return event.target.value.length < 50">
            <span id="vtError" class="error-message alert alert-warning">Please enter your village/town name</span>
        </div> --}}

        <div class="input-box">
            <label for="country">Country</label>
            <select placeholder="Enter your country" name="country" id="country">
            <option value="">Select Country</option>

            </select>
            <span id="countryError" class="error-message alert alert-warning">Please select your country</span>
            </div>

            <div class="input-box">
            <label for="state">State</label>
            <select placeholder="Enter your state" name="state" id="state" onchange="updateCities()">
                <option value="">Select State</option>

            </select>
            <span id="stateError" class="error-message alert alert-warning">Please select your state</span>
        </div>

        <div class="input-box">
            <label for="district">District</label>
            <select placeholder="Enter your district" name="district" id="district">
                <option value="">Select District</option>

            </select>
            <span id="districtError" class="error-message alert alert-warning">Please select your district</span>
        </div>

        <!-- <script>
            const stateSelect = document.getElementById("state");
            const citySelect = document.getElementById("district");

            window.addEventListener('DOMContentLoaded', function () {
                loadStates();
            });

            function loadStates() {
                $.ajax({
                    url: "http://localhost/internshippost/get_states.php",
                    method: "GET",
                    dataType: "json",
                    success: function (response) {
                        stateSelect.innerHTML = "<option value=''>Select State</option>";
                        response.forEach(function (state) {
                            const option = document.createElement("option");
                            option.value = state.name;
                            option.text = state.name;
                            stateSelect.appendChild(option);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }

            function updateCities() {
    const selectedState = stateSelect.value;
    citySelect.innerHTML = "<option value=''>Select District</option>";

    if (selectedState) {
        $.ajax({
            url: "http://localhost/internshippost/get_districts.php",
            method: "POST",
            data: { state: selectedState },
            dataType: "json",
            success: function (response) {
                response.forEach(function (district) {
                    const option = document.createElement("option");
                    option.value = district;
                    option.text = district;
                    citySelect.appendChild(option);
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    }
}
        </script>-->

            {{-- <div class="input-box">
            <label for="pincode">Pin Code:</label>
            <input type="text" placeholder="Enter your pincode" name="pincode" id="pincode">
            <span id="pincodeError" class="error-message alert alert-warning">Please enter a valid pincode</span>
        </div> --}}


        <label for="yesno">Add test module: <br>
            <input type="radio" name="test" value="1"> Create new module <br>
            <input type="radio" name="test" value="2" checked> Select from exist module <br>
           <input type="radio" name="test" value="0" checked> No
        </label>


            <div class="registerbtn">
            <button type="submit" class="btn">Post your Job</button>
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
        function validateForm() {

        var company_name = document.getElementById('company_name').value;
        var job_type = document.getElementById('job_type').value;
        var job_title = document.getElementById('job_title').value;
        var jobDescription = document.getElementById('jobDescription').value;
        var skills = document.getElementById('skills').value;
        var totalVacancies = document.getElementById('totalVacancies').value;
        var startDate = document.getElementById('startDate').value;
        var applicationDeadline = document.getElementById('applicationDeadline').value;
        var salary = document.getElementById('salary').value;
        var qualification = document.getElementById('qualification').value;
        var degrees = document.getElementById('degrees').value;
        var experience = document.getElementById('experience').value;
        var additionalInfo = document.getElementById('additionalInfo').value;
        var contactEmail = document.getElementById('contactEmail').value;
        var contactMobile = document.getElementById('contactMobile').value;
        var applicationProcedure = document.getElementById('applicationProcedure').value;
        var selectionProcess = document.getElementById('selectionProcess').value;
        var workLocation = document.getElementById('workLocation').value;
        // var address = document.getElementById('address').value;
        // var street = document.getElementById('street').value;
        // var vt = document.getElementById('vt').value;
        var country = document.getElementById('country').value;
        var state = document.getElementById('state').value;
        var district = document.getElementById('district').value;
        // var pincode = document.getElementById('pincode').value;

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

// job type validation
if (job_type === '') {
    document.getElementById('job_typeError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('job_type', 'job_typeError');
    } else {
    document.getElementById('job_typeError').style.display = 'none';
    }

// job Title validation
if (job_title === '') {
    document.getElementById('job_titleError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('job_title', 'job_titleError');
    } else {
    document.getElementById('job_titleError').style.display = 'none';
    }

          // Job Description validation with length limit (maximum of 2500 characters)
if (jobDescription === '') {
  document.getElementById('jobDescriptionError').innerText = 'Please enter the job description.';
  document.getElementById('jobDescriptionError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
} else if (jobDescription.length < 30) { // Adding minimum length limit (30 characters)
  document.getElementById('jobDescriptionError').innerText = 'Job Description should contain atleast 30 characters.';
  document.getElementById('jobDescriptionError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
}  else if (jobDescription.length > 2500) { // Adding length limit (2500 characters)
  document.getElementById('jobDescriptionError').innerText = 'Job Description should not exceed 2500 characters.';
  document.getElementById('jobDescriptionError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
} else {
  document.getElementById('jobDescriptionError').style.display = 'none';
}


    // Qualification validation
    if (qualification === '') {
    document.getElementById('qualificationError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('qualification', 'qualificationError');
    } else {
    document.getElementById('qualificationError').style.display = 'none';
    }






        if (degrees === '') {
            // Display error message for duration field
            document.getElementById('degreesError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('degrees', 'degreesError');
        } else {
            document.getElementById('degreesError').style.display = 'none';
        }


// Get the current date without the time (set hours, minutes, seconds, and milliseconds to 0)
var currentDate = new Date();
currentDate.setHours(0, 0, 0, 0);

var providedDate = new Date(startDate);

// Set the provided date without the time (if needed)
providedDate.setHours(0, 0, 0, 0);

if (providedDate < currentDate) {
    // Display error message for past start dates
    document.getElementById('startDateError').innerText = 'Start date should be today or in the future.';
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
    document.getElementById('applicationDeadlineError').innerText = 'Please provide the application deadline.';
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
    document.getElementById('applicationDeadlineError').innerText = 'Deadline should be after the start date.';
    document.getElementById('applicationDeadlineError').style.display = 'block';
    isValid = false;
    hideErrorMessageOnFocus('applicationDeadline', 'applicationDeadlineError');
    } else {
    document.getElementById('applicationDeadlineError').style.display = 'none';
    }
}

        if (salary === '') {
            // Display error message for stipend field
            document.getElementById('salaryError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('salary', 'salaryError');
        } else {
            document.getElementById('salaryError').style.display = 'none';
        }

        if (skills === '') {
            // Display error message for skills field
            document.getElementById('skillsError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('skills', 'skillsError');
        } else {
            document.getElementById('skillsError').style.display = 'none';
        }

        if (experience === '') {
            // Display error message for eligibility field
            document.getElementById('experienceError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('experience', 'experienceError');
        } else {
            document.getElementById('experienceError').style.display = 'none';
        }

        if (workLocation === '') {
            // Display error message for workLocation field
            document.getElementById('workLocationError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('workLocation', 'workLocationError');
        } else {
            document.getElementById('workLocationError').style.display = 'none';
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

// // Address validation
// if (address === '') {
//     document.getElementById('addressError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('address', 'addressError');
//     } else {
//     document.getElementById('addressError').style.display = 'none';
//     }

// // Street validation
// if (street === '') {
//     document.getElementById('streetError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('street', 'streetError');
//     } else {
//     document.getElementById('streetError').style.display = 'none';
//     }

//     if (vt === '') {
//     document.getElementById('vtError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('vt', 'vtError');
//     } else {
//     document.getElementById('vtError').style.display = 'none';
//     }

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

//     if (pincode === '') {
//     document.getElementById('pincodeError').innerText = 'Please enter your postal code.';
//     document.getElementById('pincodeError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('pincode', 'pincodeError');
// } else {

// // Validate pincode format
//     var pincodeRegex =/^[1-9][0-9]{5}$/;
//     if (!pincodeRegex.test(pincode)) {
//     document.getElementById('pincodeError').innerText = 'Invalid pincode format. Please enter a valid 6 digit postal code.';
//     document.getElementById('pincodeError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('pincode', 'pincodeError');
//     } else if (pincode.length !== 6) {
//     document.getElementById('pincodeError').innerText = 'Postal code should be exactly 6 characters long.';
//     document.getElementById('pincodeError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('pincode', 'pincodeError');
//     } else {
//     document.getElementById('pincodeError').style.display = 'none';
//     }
// }


        return isValid;
        }

        // Event listener for form submission
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting

        // Validate the form
        var isValid = validateForm();

        // If the form is valid, you can submit it to the server using AJAX or perform any other necessary action
        if (isValid) {
            console.log("HIIII")
            // Submit the form or perform other actions
            this.submit();
        }
        else{
            console.log("NOOOO");
        }
        });
        </script>
        <script src="{{asset('asset/js/dropdown.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>

