<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>
	@include('layouts.company_header')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<style>
/* Hide the number input field spin buttons */
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

input[type="number"] {
  -moz-appearance: textfield;
}
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


        .error-message {
        display: none;
        color: rgb(233, 13, 13);
    }
    .alert {
        background-color: #f0f0f0;
        padding: 15px;
    }
    .alert-warning {
        padding: 1px;
        color: #ff0000;
        background-color: rgba(228, 164, 99, 0.2)
    }

    </style>

<body>
	<div class="main-wrapper">

@include('layouts.company_sidebar')
@include('layouts.alert')
<div class="page-wrapper">
<div class="content container-fluid">
   <div class="page-header">
       <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title mt-5">Edit Posted Jobs</h3>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-lg-12">
	<form action="{{url('/employer/update_job')}}" id="registrationForm" method="POST">
        @csrf
        <input type="hidden" name="INTid"  value="{{$int->job_id}}" >

		<!-- Add your form fields here -->
		<div class="row formtype">

		  <div class="col-md-4">
			<div class="form-group">
			  <label>Company Name</label>
			  <input type="text" class="form-control" value="{{$int->company_name}}" placeholder="Enter company name" name="company_name" id="company_name" maxlength="100" onkeydown="return validateCompanyName(event)">

			  <span id="company_nameError" class="error-message alert alert-warning">Please enter your company name</span>
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
        <label for="job_type">Job Type</label>
        <select id="job_type" class="form-control" name="job_type">
            <option value="">Select your Job Type</option>
            <?php
                $selectedJobType = $int->job_type;
                $jobTypes = array(
                    'Accounts', 'Administration', 'Chemical', 'Technology', 'Finance', 'Banking', 'Healthcare', 'Human Resource',
                    'Education', 'Engineering', 'Retail', 'Marketing', 'Hospitality', 'Consulting', 'Manufacturing', 'Media',
                    'Transportation', 'Telecommunications', 'Nonprofit', 'Government', 'Fashion', 'Legal', 'Science', 'Art',
                    'Real Estate', 'Automotive', 'Information Technology', 'Customer Service', 'Agriculture', 'Construction',
                    'Pharmaceutical', 'Environmental Services', 'Energy', 'Sales', 'Writing/Editing', 'Legal Services',
                    'Supply Chain/Logistics', 'Design', 'Food Service', 'Insurance', 'Beauty/Cosmetics', 'Sports', 'Fitness',
                    'Entertainment', 'Research', 'Quality Assurance', 'Security', 'Hospital/Clinical', 'Pharmacy', 'Architecture',
                    'Aviation/Aerospace', 'Veterinary', 'Event Planning', 'Social Services', 'Libraries', 'Humanities', 'Biotechnology',
                    'Nursing', 'Psychology', 'Geology', 'Others'
                );

                foreach ($jobTypes as $type) {
                    $selected = ($type == $selectedJobType) ? 'selected' : '';
                    echo "<option value='$type' $selected>$type</option>";
                }
            ?>
        </select>
        <span id="job_typeError" class="error-message alert alert-warning">Please select your job type</span><br><br>
        <input type="text" id="otherjob_typeInput" name="otherjob_typeInput" style="display: none;" placeholder="Enter the other job type">
    </div>
</div>

<script>
    document.getElementById('job_type').addEventListener('change', function() {
        var otherJobTypeInput = document.getElementById('otherjob_typeInput');
        if (this.value === 'Others') {
            otherJobTypeInput.style.display = 'block';
        } else {
            otherJobTypeInput.style.display = 'none';
        }
    });
</script>
<!-- <input class="form-control" value="{{$int->job_type}}" name="job_type" type="text" id="internshipTitle"> -->

          <div class="col-md-4">
			<div class="form-group">
			  <label>Job Role</label>
			  <input type="text" placeholder="Enter the job role" name="job_title" id="job_title" class="form-control" value="{{$int->job_title}}" onkeypress="return /[a-zA-Z]/i.test(event.key) && this.value.length < 50">
            <span id="job_titleError" class="error-message  alert alert-warning ">Please enter the job title</span>
			</div>
		  </div>

      <div class="col-md-4">
    <div class="form-group">
        <label>Total Vacancies</label>
        <select id="totalVacancies" name="totalVacancies" class="form-control">
            <option value="">Select Total Vacancies</option>
            @php
                $selectedTotalVacancies = $int->total_vacancies;
                for ($i = 1; $i <= 1000; $i++) {
                    $selected = ($i == $selectedTotalVacancies) ? 'selected' : '';
                    echo "<option value='$i' $selected>$i</option>";
                }
            @endphp
        </select>
        <span id="totalVacanciesError" class="error-message alert alert-warning">Please select the total vacancies</span>
    </div>
</div>
<div class="col-md-4">
<div class="form-group">
    <label for="ptft">Job Nature</label>
    <select  name="ptft" id="ptft" onblur="validateField(this)" class="form-control">
        <option>Select</option>
        <option value="Part-time" {{$int->ptft === 'Part-time' ? 'selected' : '' }}>Part-time</option>
        <option value="Full-time" {{$int->ptft === 'Full-time' ? 'selected' : '' }}>Full-time</option>
    </select>
    <span id="ptftError" class="error-message alert alert-warning" style="display: none;">Please select Part-time/Full-time</span>
  </div>
</div>
		  <div class="col-md-4">
			<div class="form-group">
			  <label>Job Description</label>
			  <!-- <textarea class="form-control" name="job_description" rows="5" id="jobDescription"></textarea> -->
			  <textarea id="jobDescription" class="form-control" rows="5" name="jobDescription" placeholder="Enter the job description" rows="15" maxlength="5000" onkeypress="return event.target.value.length < 5000">{{$int->job_description}}</textarea>
              <span id="jobDescriptionError" class="error-message alert alert-warning ">Please provide the Job Description</span>
			</div>
		  </div>

		  <div class="col-md-4">
			<div class="form-group">
                <label for="skills">Required Skills</label>
            <select id="skills" name="skills[]" multiple name = "multiple-skills">



                @foreach($skills as $s)
                    <option value="{{$s->name}}" {{ in_array($s->name, explode(',', $int->required_skills)) ? 'selected' : '' }}>{{ $s->name }}</option>
                @endforeach

        </select>
        <br><br>
        <input type="text" id="otherSkillsInput" name="otherSkillsInput" style="display: none;" placeholder="Enter the required skills">
            <!-- <textarea id="skills" name="skills" placeholder="Enter the Required Skills" rows="5" maxlength="2500" onkeypress="return event.target.value.length < 150"></textarea>-->
            <span id="skillsError" class="error-message alert alert-warning ">Please Enter the Required Skills</span>

			</div>
		  </div>
<script>
    $(document).ready(function() {

let multipleCancelButton1 = new Choices(`#skills`, {
    removeItemButton: true,
    maxItemCount: 5,
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
</script>
      <div class="col-md-4">
			<div class="form-group">
          <label for="startDate">Application Start Date</label>
          <input type="date" id="startDate" name="startDate" value="{{$int->start_date}}" class="form-control" readonly>
         <!-- <span id="startDateError" class="error-message alert alert-warning" style="display: none;">Please Enter the Start Date.</span>-->
        </div>
        </div>

        <script>
          var startDateInput = document.getElementById("startDate");
          var today = new Date();
          var maxDate = new Date(today.getFullYear(), today.getMonth() + 3, today.getDate());

          startDateInput.setAttribute("min", today.toISOString().split('T')[0]);
          startDateInput.setAttribute("max", maxDate.toISOString().split('T')[0]);
        </script>

		<div class="col-md-4">
			<div class="form-group">
            <label for="applicationDeadline">Application End Date</label>
            <input type="date" id="applicationDeadline" name="applicationDeadline" value="{{$int->application_deadline}}" class="form-control" readonly>
           <!-- <span id="applicationDeadlineError" class="error-message alert alert-warning ">Please Enter the Application Deadline</span>-->
        </div>
		</div>

        <script>
          var applicationDeadlineInput = document.getElementById("applicationDeadline");
          var today = new Date();
          var maxDeadline = new Date(today.getFullYear(), today.getMonth() + 3, today.getDate());

          applicationDeadlineInput.setAttribute("min", today.toISOString().split('T')[0]);
          applicationDeadlineInput.setAttribute("max", maxDeadline.toISOString().split('T')[0]);

        </script>


<div class="col-md-4">
    <div class="form-group">
        <label for="salary">Salary Package</label>
        <select id="salary" class="form-control" name="salary" onchange="showOtherField()">
            <option value="">Select Salary Package</option>
            <option value="1-2 LPA" {{ $int->salary_package === '1-2 LPA' ? 'selected' : '' }}>1-2 LPA</option>
            <option value="2-3 LPA" {{ $int->salary_package === '2-3 LPA' ? 'selected' : '' }}>2-3 LPA</option>
            <option value="3-4 LPA" {{ $int->salary_package === '3-4 LPA' ? 'selected' : '' }}>3-4 LPA</option>
            <option value="4-5 LPA" {{ $int->salary_package === '4-5 LPA' ? 'selected' : '' }}>4-5 LPA</option>
            <option value="5-6 LPA" {{ $int->salary_package === '5-6 LPA' ? 'selected' : '' }}>5-6 LPA</option>
            <option value="6-7 LPA" {{ $int->salary_package === '6-7 LPA' ? 'selected' : '' }}>6-7 LPA</option>
            <option value="7-8 LPA" {{ $int->salary_package === '7-8 LPA' ? 'selected' : '' }}>7-8 LPA</option>
            <option value="8-9 LPA" {{ $int->salary_package === '8-9 LPA' ? 'selected' : '' }}>8-9 LPA</option>
            <option value="9-10 LPA" {{ $int->salary_package === '9-10 LPA' ? 'selected' : '' }}>9-10 LPA</option>
            <option value="More than 10 LPA" {{ $int->salary_package === 'More than 10 LPA' ? 'selected' : '' }}>More than 10 LPA</option>
            <option value="others" {{ $int->salary_package === 'others' ? 'selected' : '' }}>Others</option>
        </select>

        <div class="form-control" id="otherSalaryField" style="display: {{ $int->salary_package === 'others' ? 'block' : 'none' }};">
            <label for="otherSalary">Enter Salary</label>
            <input type="text" id="otherSalary" name="otherSalary" value="{{ $int->other_salary }}">
        </div>

        <span id="salaryError" class="error-message alert alert-warning">Please select the salary package</span>
    </div>
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

<div class="col-md-4">
        <div class="form-group">
            <label for="qualification"> Qualification</label>
            <select class="form-control" id="qualification" name="qualification">
            <option value="">Select the Qualification</option>
            <option value="PG"{{ $int->qualification === 'PG' ? 'selected' : '' }}>PG</option>
            <option value="UG"{{ $int->qualification === 'UG' ? 'selected' : '' }}>UG</option>
            <option value="Diploma"{{ $int->qualification === 'Diploma' ? 'selected' : '' }}>Diploma</option>
            <option value="Mphil"{{ $int->qualification === 'Mphil' ? 'selected' : '' }}>Mphil</option>
            <option value="Doctoral-Degrees"{{ $int->qualification === 'Doctoral-Degrees' ? 'selected' : '' }}>Doctoral-Degrees</option>
            <option value="Both PG and UG"{{ $int->qualification === 'Both PG and UG' ? 'selected' : '' }}>Both PG and UG</option>
            <option value="PG,UG and Diploma"{{ $int->qualification === 'PG,UG and Diploma' ? 'selected' : '' }}>PG,UG and Diploma</option>
            <option value="Mphil and Doctoral-Degrees"{{ $int->qualification === 'Mphil and Doctoral-Degrees' ? 'selected' : '' }}>Mphil and Doctoral-Degrees</option>
            <option value="All Qualifications Eligible"{{ $int->qualification === 'All Qualifications Eligible' ? 'selected' : '' }}>All Qualifications Eligible</option>
            <option value="others"{{ $int->qualification === 'others' ? 'selected' : '' }}>Others</option>
    </select><br><br>
    <input type="text" class="form-control" id="otherQualificationInput" name="otherQualificationInput" style="display: none;" placeholder="Enter the qualification">
    <span id="qualificationError" class="error-message alert alert-warning">Please select the Qualification</span>
</div>
</div>
<script>
    document.getElementById('qualification').addEventListener('change', function() {
    var otherQualificationInput = document.getElementById('otherQualificationInput');
    if (this.value === 'others') {
        otherQualificationInput.style.display = 'block';
    } else {
        otherQualificationInput.style.display = 'none';
    }
});

    </script>

<div class="col-md-4">
    <div class="form-group">
    <label for="degrees">Degrees Preferred</label>
        <select class="form-control" id="degrees" name="degrees[]" multiple name = "multiple-degrees" >
            @foreach([
                                        'B.E.Aeronautical Engineering',
                                        'B.E.Advanced Architectural Design',
                                        'B.E.Agriculture Engineering',
                                        'B.E.Architecture',
                                        'B.E.Artificial Intelligence',
                                        'B.Sc.AstroPhysics',
                                        'B.E.Automobile Engineering',
                                        'B.Sc.Bio Chemistry',
                                        'B.Sc.Bioinformatics',
                                        'B.Sc.Biology',
                                        'B.E.Biomedical engineering',
                                        'BBA Business Administration',
                                        'BBA Business Information Systems',
                                        'B.E.Chemical engineering',
                                        'B.Ed.Childhood Studies',
                                        'B.E.Civil and Structural',
                                        'B.E.Civil Engineering',
                                        'B.Com.Commerce',
                                        'B.Sc.Computer Science',
                                        'B.E.Computer Science engineering',
                                        'B.E.Data Analytics for Business',
                                        'B.E.Data science',
                                        'B.Sc.Economics',
                                        'B.Ed.Education',
                                        'B.Sc.Electrical',
                                        'B.E.Electrical engineering',
                                        'B.E.Electronics and Communication',
                                        'B.E.Electronics and Communication Engineering',
                                        'B.E.Electrical and Electronics Engineering',
                                        'Engineering',
                                        'BCA Computer Science',
                                        'BCA Information Technology',
                                        'BCA Software Engineering',
                                        'BBA Engineering Management',
                                        'B.Sc.Environment and Energy Management',
                                        'B.Sc.Environmental Science',
                                        'BBA Finance',
                                        'B.E.Fire and Safety Engineering',
                                        'B.Sc.Forensic Science',
                                        'B.A.Geography',
                                        'BBA Global Logistics',
                                        'B.Ed.Guidance',
                                        'BBA Healthcare Administration',
                                        'B.A.Historic Preservation',
                                        'B.A.History',
                                        'B.E.History of Architecture and Town Planning',
                                        'BBA Human Resources',
                                        'B.E.Industrial engineering',
                                        'B.E.Information Technology',
                                        'B.E.Interior and Spatial design',
                                        'B.E.International Architectural Regeneration and Development',
                                        'BBA International Business',
                                        'B.A.Journalism',
                                        'BBA Leadership and Entrepreneur',
                                        'B.A.Linguistics',
                                        'BBA Logistics and Supplychain',
                                        'B.A.MacroEconomics',
                                        'BBA Marketing',
                                        'B.Sc.Mathematics',
                                        'B.E.Mechanical',
                                        'B.E.Mechanical engineering',
                                        'B.E.Nuclear engineering',
                                        'B.Sc.Nursing',
                                        'B.A.Physics',
                                        'B.A.Political Science',
                                        'B.E.Product design and manufacturing',
                                        'B.E.Production Engineering',
                                        'B.Sc.Psychology',
                                        'B.A.Public Administration',
                                        'B.E.Regional Planning',
                                        'B.E.Robotics',
                                        'BBA Rural Development',
                                        'BBA Safety Management',
                                        'B.A.Social Policy',
                                        'B.A.Social Services',
                                        'B.E.Software Engineering',
                                        'B.A.Sports Management',
                                        'B.E.Systems engineering',
                                        'B.A.Tamil',
                                        'B.E.Thermal Engineering',
                                        'B.E.Urban Architecture',
                                        'B.Sc.Urban Studies',
                                        'B.Sc.Visual Communication',
                                        'B.E.Welding Technology',
                                        'B.Ed.Women Studies',
                                        'B.Sc.Zoology',
                                        'M.E.Aeronautical Engineering',
                                        'M.E.Advanced Architectural Design',
                                        'M.E.Agriculture Engineering',
                                        'M.E.Architecture',
                                        'M.E.Artificial Intelligence',
                                        'M.Sc.AstroPhysics',
                                        'M.E.Automobile Engineering',
                                        'M.Sc.Bio Chemistry',
                                        'M.Sc.Bioinformatics',
                                        'M.Sc.Biology',
                                        'M.E.Biomedical engineering',
                                        'MBA Business Administration',
                                        'MBA Business Information Systems',
                                        'M.E.Chemical engineering',
                                        'M.Ed.Childhood Studies',
                                        'M.E.Civil and Structural',
                                        'M.E.Civil Engineering',
                                        'M.Com.Commerce',
                                        'M.Sc.Computer Science',
                                        'M.E.Computer Science engineering',
                                        'M.E.Data Analytics for Business',
                                        'M.E.Data science',
                                        'M.Sc.Economics',
                                        'M.Ed.Education',
                                        'M.Sc.Electrical',
                                        'M.E.Electrical engineering',
                                        'M.E.Electronics and Communication',
                                        'M.E.Electronics and Communication Engineering',
                                        'M.E.Electrical and Electronics Engineering',
                                        'Engineering',
                                        'MCA Computer Science',
                                        'MCA Information Technology',
                                        "MCA Software Engineering",
                                        "MBA Engineering Management",
                                        "M.Sc.Environment and Energy Management",
                                        "M.Sc.Environmental Science",
                                        "MBA Finance",
                                        "M.E.Fire and Safety Engineering",
                                        "M.Sc.Forensic Science",
                                        "M.A.Geography",
                                        "MBA Global Logistics",
                                        "M.Ed.Guidance",
                                        "MBA Healthcare Administration",
                                        "M.A.Historic Preservation",
                                        "M.A.History",
                                        "M.E.History of Architecture and Town Planning",
                                        "MBA Human Resources",
                                        "M.E.Industrial engineering",
                                        "M.E.Information Technology",
                                        "M.E.Interior and Spatial design",
                                        "M.E.International Architectural Regeneration and Development",
                                        "MBA International Business",
                                        "M.A.Journalism",
                                        "MBA Leadership and Entreprenuer",
                                        "M.A.Lingustics",
                                        "MBA Logistics and Supplychain",
                                        "M.A.MacroEconomics",
                                        "MBA Marketing",
                                        "M.Sc.Mathematics",
                                        "M.E.Mechanical",
                                        "M.E.Mechanical engineering",
                                        "M.E.Nuclear engineering",
                                        "M.Sc.Nursing",
                                        "M.A.Physics",
                                        "M.A.Political Science",
                                        "M.E.Product design and manufacturing",
                                        "M.E.Production Engineering",
                                        "M.Sc.Psychology",
                                        "M.A.Public Administration",
                                        "M.E.Regional Planning",
                                        "M.E.Robotics",
                                        "MBA Rural Development",
                                        "MBA Safety Management",
                                        "M.A.Social Policy",
                                        "M.A.Social Services",
                                        "M.E.Software Engineering",
                                        "M.A.Sports Management",
                                        "M.E.Systems engineering",
                                        "M.A.Tamil",
                                        "M.E.Thermal Engineering",
                                        "M.E.Urban Architecture",
                                        "M.Sc.Urban Studies",
                                        "M.Sc.Visual Communication",
                                        "M.E.Welding Technology",
                                        "M.Ed.Women Studies",
                                        "M.Sc.Zoology",
                                        "Aeronautical Engineering",
                                        "Advanced Architectural Design",
                                        "Agriculture Engineering",
                                        "Architecture",
                                        "Artificial Intelligence",
                                        "AstroPhysics",
                                        "Automobile Engineering",
                                        "Any Degree",
                                        "Bio Chemistry",
                                        "Bioinformatics",
                                        "Biology",
                                        "Biomedical engineering",
                                        "Business Administration",
                                        "Business Information Systems",
                                        "Chemical engineering",
                                        "Childhood Studies",
                                        "Civil and Structural",
                                        "Civil Engineering",
                                        "Commerce",
                                        'BBA Leadership and Entreprenuer',
                                        "Computer Science",
                                        "Computer Science engineering",
                                        "Data Analytics for Business",
                                        "Data science",
                                        "Economics",
                                        "Education",
                                        "Electrical",
                                        "Electrical engineering",
                                        "Electronics and Communication",
                                        "Electronics and Communication Engineering",
                                        "Electrical and Electronics Engineering",
                                        "Engineering",
                                        "Engineering Management",
                                        "Environment and Energy Management",
                                        "Environmental Science",
                                        "Finance",
                                        "Fire and Safety Engineering",
                                        "Forensic Science",
                                        "Geography",
                                        "Global Logistics",
                                        "Guidance",
                                        "Healthcare Administration",
                                        "Historic Preservation",
                                        "History",
                                        "History of Architecture and Town Planning",
                                        "Human Resources",
                                        "Industrial engineering",
                                        "Information Technology",
                                        "Interior and Spatial design",
                                        "International Architectural Regeneration and Development",
                                        "International Business",
                                        "Journalism",
                                        "Leadership and Entreprenuer",
                                        "Lingustics",
                                        "Logistics and Supplychain",
                                        "MacroEconomics",
                                        "Marketing",
                                        "Mathematics",
                                        "Mechanical",
                                        "Mechanical engineering",
                                        "Medicine",
                                        "Nuclear engineering",
                                        "Nursing",
                                        "Physics",
                                        "Political Science",
                                        "Product design and manufacturing",
                                        "Production Engineering",
                                        "Psychology",
                                        "Public Administration",
                                        "Regional Planning",
                                        "Research",
                                        "Robotics",
                                        "Rural Development",
                                        "Safety Management",
                                        "Social Policy",
                                        "Social Services",
                                        "Software Engineering",
                                        "Sports Management",
                                        "Systems engineering",
                                        "Tamil",
                                        "Thermal Engineering",
                                        "Urban Architecture",
                                        "Urban Studies",
                                        "Visual Communication",
                                        "Welding Technology",
                                        "Women Studies",
                                        "Zoology",
                                        "Others"
                                    ] as $degree)
                                    <option value="{{ $degree }}" {{ in_array($degree, explode(',', $int->degrees_preferred)) ? 'selected' : '' }}>{{ $degree }}</option>
                                @endforeach
        </select>
        <br><br>
        <input type="text" id="otherDegreeInput" name="otherDegreeInput" style="display: none;" placeholder="Enter the degrees preferred">
    <span id="degreesError" class="error-message alert alert-warning">Please select the degrees preferred</span>
    </div>
</div>
<script>

$(document).ready(function() {
    let multipleCancelButton1 = new Choices('#degrees', {
        removeItemButton: true,
        maxItemCount: 5,
        searchResultLimit: 5,
        // renderChoiceLimit: 5
    });
});
  document.getElementById('degrees').addEventListener('change', function() {
    var otherDegreeInput = document.getElementById('otherDegreeInput');
    if (this.value === 'others') {
        otherDegreeInput.style.display = 'block';
    } else {
        otherDegreeInput.style.display = 'none';
    }
});

</script>

		  <!-- <div class="col-md-4">
			<div class="form-group">
			  <label>Degrees Preferred</label>
			  <textarea class="form-control" name="degrees_preferred" rows="5" id="eligibilityCriteria">{{$int->degrees_preferred}}</textarea>
			  <span id="degreesError" class="error-message alert alert-warning">Please select the degrees preferred</span>
			</div>
		  </div> -->

		  <div class="col-md-4">
			<div class="form-group">
            <label for="experience">Experience Required(in years)</label>
            <select class="form-control" id="experience" name="experience" >
            <option value="">Select the Experience Required</option>
            <option value="Fresher"{{ $int->experience_required === 'Fresher' ? 'selected' : '' }}>Fresher</option>
            <option value="0-1 years"{{ $int->experience_required === '0-1 years' ? 'selected' : '' }}>0-1 years</option>
            <option value="1-2 years"{{ $int->experience_required === '1-2 years' ? 'selected' : '' }}>1-2 years</option>
            <option value="2-3 years"{{ $int->experience_required === '2-3 years' ? 'selected' : '' }}>2-3 years</option>
            <option value="3-4 years"{{ $int->experience_required === '3-4 years' ? 'selected' : '' }}>3-4 years</option>
            <option value="4-5 years"{{ $int->experience_required === '4-5 years' ? 'selected' : '' }}>4-5 years</option>
            <option value="5-6 years"{{ $int->experience_required === '5-6 years' ? 'selected' : '' }}>5-6 years</option>
            <option value="6-7 years"{{ $int->experience_required === '6-7 years' ? 'selected' : '' }}>6-7 years</option>
            <option value="7-8 years"{{ $int->experience_required === '7-8 years' ? 'selected' : '' }}>7-8 years</option>
            <option value="8-9 years"{{ $int->experience_required === '8-9 years' ? 'selected' : '' }}>8-9 years</option>
            <option value="9-10 years"{{ $int->experience_required === '9-10 years' ? 'selected' : '' }}>9-10 years</option>
            <option value="More than 10 years"{{ $int->experience_required === 'More than 10 years' ? 'selected' : '' }}>More than 10 years</option>
            </select>
            <span id="experienceError" class="error-message alert alert-warning">Please select the Experience Required</span>
            </div>
</div>

		  <div class="col-md-4">
			<div class="form-group">
			  <label>Contact Email</label>
			  <input type="email" id="contactEmail" class="form-control" value="{{$int->contact_email}}" name="contactEmail" placeholder="Enter the email id">
            <!--<span id="contactEmailError" class="error-message alert alert-warning ">Please Enter the Contact Email</span>-->
			</div>
		  </div>

		  <div class="col-md-4">
			<div class="form-group">
			  <label>Contact Mobile Number</label>
			  <input type="number" id="contactMobile" class="form-control" value="{{$int->contact_mobile}}" name="contactMobile" placeholder="Enter the mobile number">
           <!-- <span id="contactMobileError" class="error-message alert alert-warning ">Please Enter the Contact Mobile_Number</span>-->
			</div>
		  </div>

		  <!-- <div class="col-md-4">
			<div class="form-group">
			  <label>Work Location</label>
			  <input type="text" class="form-control" value="{{$int->work_location}}" id="workLocation" name="workLocation" placeholder="Enter the preferred work location" maxlength="100" onkeypress="return event.target.value.length < 100">
            <span id="workLocationError" class="error-message alert alert-warning ">Please Enter the preferred work location</span>
			 
			</div>
		  </div> -->
           <div class="col-md-4">
			<div class="form-group">
                <label for="applicationProcedure">Company Information</label>
                <textarea class="form-control" id="applicationProcedure" name="company_info" placeholder="Enter the company details" rows="15" maxlength="5000" onkeypress="return event.target.value.length < 5000">{{$int->company_info}}</textarea>
                <span id="applicationProcedureError" class="error-message alert alert-warning ">Please Enter the Company Information</span>
				</div>
				</div>

			<div class="col-md-4">
			<div class="form-group">
            <label for="selectionProcess">Job Responsibilities</label>
            <textarea class="form-control" id="selectionProcess" name="responsibilities" placeholder="Enter the responsibilities" rows="15" maxlength="5000" onkeypress="return event.target.value.length < 5000">{{$int->responsibilities}}</textarea>
            <span id="selectionProcessError" class="error-message alert alert-warning ">Please Enter the Responsibilities details</span>
        </div>
		</div>

		  <!-- <div class="col-md-4">
			<div class="form-group">
			  <label>Application Procedure</label>
			  <textarea class="form-control" rows="5" name="application_procedure" id="applicationProcedure">{{$int->company_info}}</textarea>
			</div>
		  </div>
		  <div class="col-md-4">
			<div class="form-group">
			  <label>Selection Process</label>
			  <textarea class="form-control" rows="5" name="selection_process" id="selectionProcess">{{$int->responsibilities}}</textarea>
			</div>
		  </div> -->

      <div class="col-md-4">
    <div class="form-group">
        <label for="additionalInfo">Accommodation</label>
        <select class="form-control" id="additionalInfo" name="additionalInfo">
            <option value="">Select</option>
            <option value="Yes" {{ $int->accomodation === 'Yes' ? 'selected' : '' }}>Yes</option>
            <option value="No" {{ $int->accomodation === 'No' ? 'selected' : '' }}>No</option>
        </select>
        <span id="additionalInfoError" class="error-message alert alert-warning">Please select the accommodation option</span>
    </div>
</div>

		  <!-- <div class="col-md-4">
			<div class="form-group">
			  <label>Address</label>
			  <textarea class="form-control" name="address" rows="5" id="trainingAddress">{{$int->address}}</textarea>
			</div>
		  </div>
		  <div class="col-md-4">
			<div class="form-group">
			  <label>Street</label>
			  <input class="form-control" value="{{$int->street}}" name="street" type="text" id="street">
			</div>
		</div>
		<div class="col-md-4">
		  <div class="form-group">
			<label>Village/Town</label>
			<input class="form-control"  value="{{$int->area}}" name="area" type="text" id="village">
		  </div>
		</div> -->

		<div class="col-md-4">
		  <div class="form-group">
            <label for="country">Country</label>
            <input type="text" placeholder="Enter your country" name="country" id="country" class="form-control" value="{{$int->country}}" maxlength="50" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">

            <span id="countryError" class="error-message alert alert-warning">Please select your country</span>
            </div>
         </div>

		 <div class="col-md-4">
			<div class="form-group">
            <label for="state">State</label>
            <input type="text" placeholder="Enter your state" name="state" id="state" class="form-control" value="{{$int->state}}" maxlength="50" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">

            <span id="stateError" class="error-message alert alert-warning">Please select your state</span>
        </div>
        </div>

		<div class="col-md-4">
		  <div class="form-group">
            <label for="district">District</label>
             <input type="text" placeholder="Enter your preferred work location" name="district" id="district" class="form-control" value="{{$int->city}}" maxlength="50" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">

            <span id="districtError" class="error-message alert alert-warning">Please select your preferred work location </span>
        </div>
        </div>

        <label for="yesno">Add test module: <br>
            @if ($int->quiz_id != null)
            <input type="radio" name="test" value="3" checked> Test module Already added
            <input type="radio" name="test" value="1"> Create new module <br>
            <input type="radio" name="test" value="2" > Select from exist module <br>
           <input type="radio" name="test" value="0" > No
           @else
           <input type="radio" name="test" value="1"> Create new module <br>
            <input type="radio" name="test" value="2" > Select from exist module <br>
           <input type="radio" name="test" value="0" checked> No
            @endif
        </label>



		<!-- Save Button -->
		<div class="col-md-12">
		  <button type="submit" class="btn btn-primary buttonedit">Update</button>
		</div>
	  </div>
	</form>
</div>

<!-- </div> -->

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
        function validateForm() {

        var company_name = document.getElementById('company_name').value;
        var job_type = document.getElementById('job_type').value;
        var job_title = document.getElementById('job_title').value;
	    var totalVacancies = document.getElementById('totalVacancies').value;
        var jobDescription = document.getElementById('jobDescription').value;
        var ptft = document.getElementById('ptft').value;
        var skills = document.getElementById('skills').value;
        // var startDate = document.getElementById('startDate').value;
        // var applicationDeadline = document.getElementById('applicationDeadline').value;
        var salary = document.getElementById('salary').value;
        var qualification = document.getElementById('qualification').value;
        var degrees = document.getElementById('degrees').value;
        var experience = document.getElementById('experience').value;
        // var additionalInfo = document.getElementById('additionalInfo').value;
        // var contactEmail = document.getElementById('contactEmail').value;
        // var contactMobile = document.getElementById('contactMobile').value;
        // // var applicationProcedure = document.getElementById('applicationProcedure').value;
        // // var selectionProcess = document.getElementById('selectionProcess').value;
        // var workLocation = document.getElementById('workLocation').value;
        // var applicationProcedure = document.getElementById('applicationProcedure').value;
        var selectionProcess = document.getElementById('selectionProcess').value;
        // // var address = document.getElementById('address').value;
        // // var street = document.getElementById('street').value;
        // // var vt = document.getElementById('vt').value;
        var country = document.getElementById('country').value;
        var state = document.getElementById('state').value;
        var district = document.getElementById('district').value;
        // // var pincode = document.getElementById('pincode').value;

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

	if (totalVacancies === '') {
            // Display error message for totalVacancies field
            document.getElementById('totalVacanciesError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('totalVacancies', 'totalVacanciesError');
        } else {
            document.getElementById('totalVacanciesError').style.display = 'none';
        }



        if (jobDescription === '') {
            // Display error message for jobDescription field
            document.getElementById('jobDescriptionError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
        } else {
            document.getElementById('jobDescriptionError').style.display = 'none';
        }

        if (ptft === '') {
      document.getElementById('ptftError').innerText = 'Please select the Part-time/Full-time.';
      document.getElementById('ptftError').style.display = 'block';
      isValid = false;
      hideErrorMessageOnFocus('ptft', 'ptftError');
    }else {
      document.getElementById('ptftError').style.display = 'none';
    }

		if (skills === '') {
            // Display error message for skills field
            document.getElementById('skillsError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('skills', 'skillsError');
        } else {
            document.getElementById('skillsError').style.display = 'none';
        }

// // Get the current date without the time (set hours, minutes, seconds, and milliseconds to 0)
// var currentDate = new Date();
// currentDate.setHours(0, 0, 0, 0);

// var providedDate = new Date(startDate);

// // Set the provided date without the time (if needed)
// providedDate.setHours(0, 0, 0, 0);

// if (providedDate < currentDate) {
//   // Display error message for past start dates
//   document.getElementById('startDateError').innerText = 'Start date should be today or in the future.';
//   document.getElementById('startDateError').style.display = 'block';
//   isValid = false;
// } else {
//   document.getElementById('startDateError').style.display = 'none';
// }

// if (startDate === '') {
//   // Display error message for startDate field
//   document.getElementById('startDateError').style.display = 'block';
//   isValid = false;
//   hideErrorMessageOnFocus('startDate', 'startDateError');
// } else if (applicationDeadline === '') {
//   // Display error message for applicationDeadline field
//   document.getElementById('applicationDeadlineError').innerText = 'Please provide the application deadline.';
//   document.getElementById('applicationDeadlineError').style.display = 'block';
//   isValid = false;
//   hideErrorMessageOnFocus('applicationDeadline', 'applicationDeadlineError');
// } else {
//   var start = new Date(startDate);
//   var deadline = new Date(applicationDeadline);

//   // Set hours, minutes, seconds, and milliseconds to 0 for comparison
//   start.setHours(0, 0, 0, 0);
//   deadline.setHours(0, 0, 0, 0);

//   if (deadline <= start) {
//     // Display error message for deadline not after start date
//     document.getElementById('applicationDeadlineError').innerText = 'Deadline should be after the start date.';
//     document.getElementById('applicationDeadlineError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('applicationDeadline', 'applicationDeadlineError');
//   } else {
//     document.getElementById('applicationDeadlineError').style.display = 'none';
//   }
// }

if (salary === '') {
            // Display error message for stipend field
            document.getElementById('salaryError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('salary', 'salaryError');
        } else {
            document.getElementById('salaryError').style.display = 'none';
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


        if (experience === '') {
            // Display error message for eligibility field
            document.getElementById('experienceError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('experience', 'experienceError');
        } else {
            document.getElementById('experienceError').style.display = 'none';
        }


//             // Email address validation patterns
//     var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
//     var emailSpecialCharPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

//     if (contactEmail === '') {
//     document.getElementById('contactEmailError').textContent = 'Email address is required.';
//     document.getElementById('contactEmailError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
//     } else if (!emailPattern.test(contactEmail)) {
//     document.getElementById('contactEmailError').textContent = 'Invalid email address format.';
//     document.getElementById('contactEmailError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
//     } else if (!emailSpecialCharPattern.test(contactEmail)) {
//     document.getElementById('contactEmailError').textContent = 'Email contains invalid special characters.';
//     document.getElementById('contactEmailError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
//     } else if (contactEmail.startsWith(' ') || contactEmail.endsWith(' ')) {
//     document.getElementById('contactEmailError').textContent = 'Email address should not start or end with a space.';
//     document.getElementById('contactEmailError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
//     } else if (contactEmail.includes('..')) {
//     document.getElementById('contactEmailError').textContent = 'Email address cannot contain consecutive dots.';
//     document.getElementById('contactEmailError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('contactEmail', 'contactEmailError');
//     } else {
//     document.getElementById('contactEmailError').style.display = 'none';
//     }


//     // Mobile Number validation
//     var mobilePattern = /^\d{10}$/;

// if (contactMobile === '') {
//     // document.getElementById('contactMobileError').textContent = 'Mobile number is required.';
//     // document.getElementById('contactMobileError').style.display = 'block';
//     // isValid = false;
//     // hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
//     document.getElementById('contactMobileError').style.display = 'none';
// } else if (!mobilePattern.test(contactMobile) || /\D/.test(contactMobile)) {
//     document.getElementById('contactMobileError').textContent = 'Invalid mobile number. Please enter a 10-digit number without any letters.';
//     document.getElementById('contactMobileError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
// } else if (!/^[6789]\d{9}$/.test(contactMobile)) {
//     document.getElementById('contactMobileError').textContent = 'Please enter a valid Indian mobile number starting with 6,7,8 or 9.';
//     document.getElementById('contactMobileError').style.display = 'block';
//     isValid = false;
//     hideErrorMessageOnFocus('contactMobile', 'contactMobileError');
// } else {
//     document.getElementById('contactMobileError').style.display = 'none';
// }

// if (workLocation === '') {
//             // Display error message for workLocation field
//             document.getElementById('workLocationError').style.display = 'block';
//             isValid = false;
//             hideErrorMessageOnFocus('workLocation', 'workLocationError');
//         } else {
//             document.getElementById('workLocationError').style.display = 'none';
//         }

		// if (additionalInfo === '') {
    //         // Display error message for additionalInfo field
    //         document.getElementById('additionalInfoError').style.display = 'block';
    //         isValid = false;
    //         hideErrorMessageOnFocus('additionalInfo', 'additionalInfoError');
    //     } else {
    //         document.getElementById('additionalInfoError').style.display = 'none';
    //     }

    //     if (additionalInfo === '') {
    //         // Display error message for additionalInfo field
    //         document.getElementById('additionalInfoError').style.display = 'block';
    //         isValid = false;
    //         hideErrorMessageOnFocus('additionalInfo', 'additionalInfoError');
    //     } else {
    //         document.getElementById('additionalInfoError').style.display = 'none';
    //     }

// Application Procedure validation with length limit (maximum of 5000 characters)
// if (applicationProcedure === '') {
//   document.getElementById('applicationProcedureError').innerText = 'Please enter the company information.';
//   document.getElementById('applicationProcedureError').style.display = 'block';
//   isValid = false;
//   hideErrorMessageOnFocus('applicationProcedure', 'applicationProcedureError');
// } else if (applicationProcedure.length > 5000) { // Adding length limit (5000 characters)
//   document.getElementById('applicationProcedureError').innerText = 'Company Information should not exceed 5000 characters.';
//   document.getElementById('applicationProcedureError').style.display = 'block';
//   isValid = false;
//   hideErrorMessageOnFocus('applicationProcedure', 'applicationProcedureError');
// } else if (/(.)\1{2,}/.test(applicationProcedure)) {
//   document.getElementById('applicationProcedureError').innerText = 'Company Information should not contain continuous special characters.';
//   document.getElementById('applicationProcedureError').style.display = 'block';
//   isValid = false;
//   hideErrorMessageOnFocus('applicationProcedure', 'applicationProcedureError');
// } else {
//   document.getElementById('applicationProcedureError').style.display = 'none';
// }



// Selection Process validation with length limit (maximum of 5000 characters)
if (selectionProcess === '') {
  document.getElementById('selectionProcessError').innerText = 'Please enter the responsibilities.';
  document.getElementById('selectionProcessError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('selectionProcess', 'selectionProcessError');
} else if (selectionProcess.length > 5000) { // Adding length limit (5000 characters)
  document.getElementById('selectionProcessError').innerText = 'Responsibilities should not exceed 5000 characters.';
  document.getElementById('selectionProcessError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('selectionProcess', 'selectionProcessError');
} else if (/(.)\1{2,}/.test(selectionProcess)) {
  document.getElementById('selectionProcessError').innerText = 'Responsibilities should not contain continuous special characters.';
  document.getElementById('selectionProcessError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('selectionProcess', 'selectionProcessError');
} else {
  document.getElementById('selectionProcessError').style.display = 'none';
}
        // if (applicationProcedure === '') {
        //     // Display error message for applicationProcedure field
        //     document.getElementById('applicationProcedureError').style.display = 'block';
        //     isValid = false;
        //     hideErrorMessageOnFocus('applicationProcedure', 'applicationProcedureError');
        // } else {
        //     document.getElementById('applicationProcedureError').style.display = 'none';
        // }

        // if (selectionProcess === '') {
        //     // Display error message for selectionProcess field
        //     document.getElementById('selectionProcessError').style.display = 'block';
        //     isValid = false;
        //     hideErrorMessageOnFocus('selectionProcess', 'selectionProcessError');
        // } else {
        //     document.getElementById('selectionProcessError').style.display = 'none';
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
        {{-- <script src="{{asset('asset/js/dropdown.js')}}"></script> --}}
</body>
</html>
