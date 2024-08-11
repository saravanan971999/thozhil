<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">


    @include('admin2.layouts.company_header')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<style>

		.custom-calendar {
			background-color: #f5f5f5; /* Light gray background color */
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			overflow: hidden;
			padding: 20px;
		}

		#add-event-btn {
			margin-top: 15px;
		}

		.card-title {
			margin-bottom: 0;
		}

		.card-header {
			background-color: #2196F3; /* Material blue color */
			color: #fff;
			padding: 10px;
			border-top-left-radius: 8px;
			border-top-right-radius: 8px;
		}

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

	</style>
</head>
<body>
	<div class="main-wrapper">

@include('admin2.layouts.company_sidebar')
@include('layouts.alert')

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title mt-5">Edit Posted Internship</h3>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-12">
	<form action="{{url('/admin2/update_internship')}}" id="registrationForm" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="INTid"  value="{{$int->internship_id}}" >
		<!-- Add your form fields here -->
		<div class="row formtype">
		  <div class="col-md-4">
			<div class="form-group">
			  <label>Company Name</label>
			  <input type="text" placeholder="Enter company name" name="company_name" id="company_name" class="form-control" value="{{$int->company_name}}" maxlength="50" onkeydown="return validateCompanyName(event)">
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
			  <label>Internship Role</label>
			  <!-- <input class="form-control" value="{{$int->internship_title}}" name="internship_title" type="text" id="internshipTitle"> -->
			  <input class="form-control" value="{{$int->internship_title}}" type="text" placeholder="Enter the internship role" name="internship_title" id="internship_title" oninput="validateInternshipTitle(event)" maxlength="50">
              <span id="internship_titleError" class="error-message alert alert-warning" style="display: none;">Please enter the internship title</span>
			</div>
		  </div>
		  <script>
    function validateInternshipTitle(event) {
        const titleInput = event.target;
        const trimmedValue = titleInput.value.trim();

        // Prevent space at the start or continuous spaces
        if (/^\s/.test(titleInput.value) || /\s\s/.test(titleInput.value)) {
            titleInput.value = trimmedValue.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
        }
    }
</script>

<div class="col-md-4">
    <div class="form-group">
        <label for="internship_type">Internship Type</label>
        <select class="form-control" name="internship_type" id="internship_type" value="{{$int->internship_type}}">
            <option value="">Select Internship Type</option>
            <?php
                $selectedInternshipType = $int->internship_type;
                $internshipTypes = array('In-office/Hybrid', 'Remote');

                foreach ($internshipTypes as $type) {
                    $selected = ($type == $selectedInternshipType) ? 'selected' : '';
                    echo "<option value='$type' $selected>$type</option>";
                }
            ?>
        </select>
        <span id="internship_typeError" class="error-message alert alert-warning" style="display: none;">Please select the internship type</span>
    </div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <label for="ptft">Part-time/Full-time</label>
        <select class="form-control" name="ptft" id="ptft">
            <option value="">Select</option>
            <option value="Part-time" {{ $int->part_full_time === 'Part-time' ? 'selected' : '' }}>Part-time</option>
            <option value="Full-time" {{ $int->part_full_time === 'Full-time' ? 'selected' : '' }}>Full-time</option>
        </select>
        <span id="ptftError" class="error-message alert alert-warning" style="display: none;">Please select Part-time/Full-time</span>
    </div>
</div>

<div class="col-md-4">
			<div class="form-group">
    <label for="jobDescription">Internship Description</label>
    <textarea class="form-control" id="jobDescription" name="internDescription" placeholder="Enter the intern description" rows="15" maxlength="5000" oninput="validateJobDescription(event)">{{$int->description}}</textarea>
    <span id="jobDescriptionError" class="error-message alert alert-warning" style="display: none;">Please provide a Job Description of at least 30 characters</span>
</div>
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
<script>
    function validateSkills(event) {
        const skillsInput = event.target;
        const trimmedValue = skillsInput.value.trim();

        // Prevent space at the start or continuous spaces
        if (/^\s/.test(skillsInput.value) || /\s\s/.test(skillsInput.value)) {
            skillsInput.value = trimmedValue.replace(/\s\s+/g, ' '); // Replace consecutive spaces with a single space
        }
    }
</script>

<div class="col-md-4">
    <div class="form-group">
        <label for="duration">Duration (in months)</label>
        <select class="form-control" id="duration" name="duration">
            <option value="">--Select Duration--</option>
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" {{ $int->duration == $i ? 'selected' : '' }}>{{ $i }} month{{ $i > 1 ? 's' : '' }}</option>
            @endfor
        </select>
        <span id="durationError" class="error-message alert alert-warning">Please select the duration</span>
    </div>
</div>


		<div class="col-md-4">
			<div class="form-group">
          <label for="startDate">Application Start Date</label>
          <input type="date" id="startDate" name="startDate" value="{{$int->application_start_date}}" class="form-control" readonly>
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
        <label for="stipend">Stipend</label>
        <select id="stipend" name="stipend" class="form-control" onchange="showInputField(this.value)">
            <option value="">Select Stipend</option>
            <option value="1000-2000" {{ $int->stipend === '1000-2000' ? 'selected' : '' }}>1000 - 2000</option>
            <option value="2000-3000" {{ $int->stipend === '2000-3000' ? 'selected' : '' }}>2000 - 3000</option>
            <option value="3000-4000" {{ $int->stipend === '3000-4000' ? 'selected' : '' }}>3000 - 4000</option>
            <option value="4000-5000" {{ $int->stipend === '4000-5000' ? 'selected' : '' }}>4000 - 5000</option>
            <option value="5000-6000" {{ $int->stipend === '5000-6000' ? 'selected' : '' }}>5000 - 6000</option>
            <option value="6000-7000" {{ $int->stipend === '6000-7000' ? 'selected' : '' }}>6000 - 7000</option>
            <option value="7000-8000" {{ $int->stipend === '7000-8000' ? 'selected' : '' }}>7000 - 8000</option>
            <option value="8000-9000" {{ $int->stipend === '8000-9000' ? 'selected' : '' }}>8000 - 9000</option>
            <option value="9000-10000" {{ $int->stipend === '9000-10000' ? 'selected' : '' }}>9000 - 10000</option>
            <option value="others" {{ $int->stipend === 'others' ? 'selected' : '' }}>Others</option>
        </select><br>
        <input type="text" class="form-control" id="otherStipend" name="otherStipend" placeholder="Enter exact stipend" style="{{ $int->stipend === 'others' ? 'display: block;' : 'display: none;' }}">
        <span id="stipendError" class="error-message alert alert-warning" style="display: none;">Please select the stipend range</span>
    </div>
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

<div class="col-md-4">
			<div class="form-group">
            <label for="eligibility">Eligibility Criteria</label>
            <select id="eligibility" name="eligibility" value="{{$int->eligiblity_criteria}}" class="form-control">
            <option value="">Select Eligibility</option>



            <option value="Pre-final year students"{{ $int->eligiblity_criteria === 'Pre-final year students' ? 'selected' : '' }}>Pre-final year students</option>

            <option value="Final year students"{{ $int->eligiblity_criteria === 'Final year students' ? 'selected' : '' }}>Final year students</option>

            <option value="Both Pre-final and Final year students"{{ $int->eligiblity_criteria === 'Both Pre-final and Final year students' ? 'selected' : '' }}>Both Pre-final and Final year students</option>

            <option value="Graduates"{{ $int->eligiblity_criteria === 'Graduates' ? 'selected' : '' }}>Graduates</option>

            <option value="Post graduates"{{ $int->eligiblity_criteria === 'Post graduates' ? 'selected' : '' }}>Post graduates</option>

            <option value="Both Graduates and Post graduates"{{ $int->eligiblity_criteria === 'Both Graduates and Post graduates' ? 'selected' : '' }}>Both Graduates and Post graduates</option>

            <option value="Both Pre-final year,Final year students and Graduates, Post graduates"{{ $int->eligiblity_criteria === 'Both Pre-final year,Final year students and Graduates, Post graduates' ? 'selected' : '' }}>Both Pre-final year,Final year students and Graduates, Post graduates</option>

            </select>
            <span id="eligibilityError" class="error-message alert alert-warning">Please select the eligibility criteria</span>
            </div>
            </div>


<div class="col-md-4">
    <div class="form-group">
    <label for="degrees">Degrees Preferred</label>
    <select id="degrees" name="degrees[]" multiple name = "multiple-degrees">
        <option value="">Select the Preferred Degrees</option>


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
            <option value="{{$degree}}" {{ in_array($degree, explode(',', $int->degrees_preferred)) ? 'selected' : '' }}>{{$degree}}</option>
        @endforeach

           </select>
           <br><br>
        <input type="text" id="otherDegreeInput" name="otherDegreeInput" style="display: none;" placeholder="Enter the degrees preferred">
        <span id="degreesPreferredError" class="error-message alert alert-warning">Please select the degrees preferred</span>
    </div>
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




    <!-- <div class="col-md-4">
    <div class="form-group">
        <label for="additionalInfo">Accommodation</label>
        <select id="additionalInfo" name="additionalInfo" class="form-control">
            <option value="">Select</option>
            <option value="Yes" {{ $int->accomodation === 'Yes' ? 'selected' : '' }}>Yes</option>
            <option value="No" {{ $int->accomodation === 'No' ? 'selected' : '' }}>No</option>
        </select>
        <span id="additionalInfoError" class="error-message alert alert-warning">Please select the accommodation option</span>
    </div>
</div> -->

			<div class="col-md-4">
			<div class="form-group">
            <label for="contactEmail">Contact Email</label>
            <input class="form-control" type="text" id="contactEmail" name="contactEmail" placeholder="Enter the email id" value="{{$int->contact_email}}" onkeyup="this.value=this.value.replace(/[^a-z0-9@._-]/g,'')">
           <!-- <span id="contactEmailError" class="error-message alert alert-warning ">Please Enter the Contact Email</span>-->
            </div>
            </div>


            <div class="col-md-4">
			<div class="form-group">
			  <label>Contact Mobile Number</label>
			  <input type="number" id="contactMobile" class="form-control" value="{{$int->contact_number}}" name="contactMobile" placeholder="Enter the mobile number">
           <!-- <span id="contactMobileError" class="error-message alert alert-warning ">Please Enter the Contact Mobile_Number</span>-->
			</div>
		  </div>



<div class="col-md-4">
			<div class="form-group">
                <label for="company_info">Company Information</label>
                <textarea class="form-control" id="company_info" name="company_info" placeholder="Enter the company_info" rows="15" maxlength="5000" oninput="validateApplicationProcedure(event)">{{$int->company_info}}</textarea>
                <span id="company_infoError" class="error-message alert alert-warning" style="display: none;">Please Enter the Company Information</span>
            </div>
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

			<div class="col-md-4">
			<div class="form-group">
                <label for="responsibilities">Responsibilities</label>
                <textarea class="form-control" id="responsibilities" name="responsibilities" placeholder="Enter the responsibilities" rows="15" maxlength="5000" oninput="validateSelectionProcess(event)">{{$int->responsibilities}}</textarea>
                <span id="responsibilitiesError" class="error-message alert alert-warning" style="display: none;">Please Enter the Responsibilities</span>
            </div>
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

<div class="col-md-4">
    <div class="form-group">
        <label for="totalVacancies">Total Vacancies</label>
        <select id="totalVacancies" name="totalVacancies" class="form-control">
            <option value="">Select Total Vacancies</option>
            <!-- Generate options using a loop for numbers from 1 to 500 -->
            <?php
                $selectedValue = $int->total_vacancies;
                for ($i = 1; $i <= 500; $i++) {
                    $selected = ($i == $selectedValue) ? 'selected' : '';
                    echo "<option value='$i' $selected>$i</option>";
                }
            ?>
        </select>
        <span id="totalVacanciesError" class="error-message alert alert-warning">Please select the total vacancies</span>
    </div>
</div>


		<div class="col-md-4">
    <div class="form-group">
    <label for="country">Country</label>
    <input type="text" placeholder="Enter country Name" name="country" id="country" class="form-control" value="{{$int->country}}" maxlength="50" oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">
    <span id="countryError" class="error-message alert alert-warning">Please select your country</span>
</div>
            </div>

			<div class="col-md-4">
		  <div class="form-group">
            <label for="state">State</label>
            {{-- <select class="form-control" placeholder="Enter state Name" name="state" id="state" value="{{$int->state}}" onchange="updateCities()">
                <option value="">Select State</option>
            </select> --}}
            <input type="text" placeholder="Enter your state" name="state" id="state" class="form-control" value="{{$int->state}}" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">

            <span id="stateError" class="error-message alert alert-warning">Please select your state</span>
        </div>
        </div>

		<div class="col-md-4">
		  <div class="form-group">
            <label for="district">District</label>
            {{-- <select class="form-control" placeholder="Enter your district" name="district" id="district" value="{{$int->district}}">
                <option value="">Select District</option>
            </select> --}}
            <input type="text" placeholder="Enter Work Location" name="district" id="district" class="form-control" value="{{$int->district}}" maxlength="50"  oninput="this.value = this.value.replace(/[^A-Za-z]/g, '');">

            <span id="districtError" class="error-message alert alert-warning">Please select your district</span>
        </div>
        </div>

        <div class="input-box">
            <label for="photo">Current Logo</label> <span id="photp_view1"><img src="{{ asset('company_logo/' . $int->company_logo) }}" alt="Company Logo" width='30' height='30'></span>
            <label for="photo">Company Logo</label>

            <input type="hidden" name="oresume" id="" value="{{$int->company_logo}}">
            <input type="file" name="photo" id="photo" placeholder="change logo" accept=".jpg, .jpeg" aria-valuetext="{{$int->company_logo}}">
            <span id="photoError" class="error-message alert alert-warning">Please upload your Company Logo in JPG or JPEG format</span>
            </div>

            <div id="photo-view">


            </div>

            <script>

            document.getElementById("photo").addEventListener("change", function(event) {
                var file = event.target.files[0];
                var photoView = document.getElementById("photo-view");
                var photoView1 = document.getElementById("photp_view1");
                var reader = new FileReader();

                if (file && (file.type === "image/jpeg" || file.type === "image/jpg")) {
                reader.onload = function(e) {
                    photoView.innerHTML = "<img src='" + e.target.result + "' width='300' height='300'>";
                    photoView1.innerHTML = "<img src='" + e.target.result + "' width='30' height='30'>";
                };
                reader.readAsDataURL(file);
                document.getElementById("photoError").style.display = "none";
                } else {
                photoView.innerHTML = "";
                document.getElementById("photoError").style.display = "block";
                }
            });
            </script>

		<!-- Add other form fields as needed -->

		<!-- Save Button -->
		<div class="col-md-12">
		  <button type="submit" class="btn btn-primary buttonedit">Update</button>
		</div>
	  </div>
	</form>
</div>

</div>

@include('admin2.layouts.company_footer')

<script>
      function validateForm() {

        var company_name = document.getElementById('company_name').value;
		var internship_title = document.getElementById('internship_title').value;
        var internship_type = document.getElementById('internship_type').value;
		var ptft = document.getElementById('ptft').value;
		var jobDescription = document.getElementById('jobDescription').value;
    var degrees = document.getElementById('degrees').value;
        var skills = document.getElementById('skills').value;
        var duration = document.getElementById('duration').value;
        // var startDate = document.getElementById('startDate').value;
        // var applicationDeadline = document.getElementById('applicationDeadline').value;
        var stipend = document.getElementById('stipend').value;
        var eligibility = document.getElementById('eligibility').value;
        // var additionalInfo = document.getElementById('additionalInfo').value;
		// var contactEmail = document.getElementById('contactEmail').value;
		var company_info = document.getElementById('company_info').value;
        var responsibilities = document.getElementById('responsibilities').value;
		var totalVacancies = document.getElementById('totalVacancies').value;
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

// Company Name validation with length limit (maximum of 50 characters)
const specialCharCount = (company_name.match(/[^\w\s]|(?<!\s)\s(?!\s)|-{2,}/g) || []).filter(char => char.trim() !== ' ').length;
const continuousSpecialChars = /-{3,}|([^\w\s-])\1{2,}/.test(company_name);

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
} else if (company_name.length > 50) {
  document.getElementById('company_nameError').innerText = 'Company Name should not exceed 50 characters.';
  document.getElementById('company_nameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_name', 'company_nameError');
} else if (/^\d+$/.test(company_name)) {
  document.getElementById('company_nameError').innerText = 'Company Name should not consist of only numbers.';
  document.getElementById('company_nameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_name', 'company_nameError');
} else if (company_name.charAt(0) === ' ' || /\s\s/.test(company_name)) {
  document.getElementById('company_nameError').innerText = 'Company Name should not start with a space, and continuous gaps are not allowed.';
  document.getElementById('company_nameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_name', 'company_nameError');
}
// else if (specialCharCount > 3) {
//   document.getElementById('company_nameError').innerText = 'Company Name can have at most three special characters.';
//   document.getElementById('company_nameError').style.display = 'block';
//   isValid = false;
//   hideErrorMessageOnFocus('company_name', 'company_nameError');
// }
else if (continuousSpecialChars) {
  document.getElementById('company_nameError').innerText = 'Company Name should not contain continuous special characters.';
  document.getElementById('company_nameError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_name', 'company_nameError');
} else {
  document.getElementById('company_nameError').style.display = 'none';
}


const specialChar = (internship_title.match(/[^\w\s]|(?<!\s)\s(?!\s)|-{2,}|[+\-*/=^%$#@!&()|[\]{}:;'"<>?,.]/g) || []).filter(char => char.trim() !== ' ').length;
const consecutiveSpecialChars = (internship_title.match(/[+\-*/=^%$#@!&()|[\]{}:;'"<>?,.]{3,}/g) || []).length;


if (internship_title === '') {
  document.getElementById('internship_titleError').innerText = 'Please enter the internship title.';
  document.getElementById('internship_titleError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('internship_title', 'internship_titleError');
} else if (internship_title.length > 50) {
  document.getElementById('internship_titleError').innerText = 'Internship Title should not exceed 50 characters.';
  document.getElementById('internship_titleError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('internship_title', 'internship_titleError');
} else if (specialChar > 4) {
  document.getElementById('internship_titleError').innerText = 'Internship Title can have at most four special characters.';
  document.getElementById('internship_titleError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('internship_title', 'internship_titleError');
}else if (consecutiveSpecialChars > 0) {
  document.getElementById('internship_titleError').innerText = 'Internship Title can have at most two consecutive special characters.';
  document.getElementById('internship_titleError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('internship_title', 'internship_titleError');
}else {
  document.getElementById('internship_titleError').style.display = 'none';
}


if (internship_type === '') {
  document.getElementById('internship_typeError').innerText = 'Please select the internship type.';
  document.getElementById('internship_typeError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('internship_type', 'internship_typeError');
}else {
  document.getElementById('internship_typeError').style.display = 'none';
}

if (ptft === '') {
  document.getElementById('ptftError').innerText = 'Please select the Part-time/Full-time.';
  document.getElementById('ptftError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('ptft', 'ptftError');
}else {
  document.getElementById('ptftError').style.display = 'none';
}


// Job Description validation with length limit (minimum of 30 characters, maximum of 5000 characters)
if (jobDescription === '') {
  document.getElementById('jobDescriptionError').innerText = 'Please enter the job description.';
  document.getElementById('jobDescriptionError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
} else if (jobDescription.length < 30) {
  document.getElementById('jobDescriptionError').innerText = 'Job Description should contain at least 30 characters.';
  document.getElementById('jobDescriptionError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
} else if (jobDescription.length > 5000) {
  document.getElementById('jobDescriptionError').innerText = 'Job Description should not exceed 5000 characters.';
  document.getElementById('jobDescriptionError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
} else if (/(.)\1{2,}/.test(jobDescription)) {
  document.getElementById('jobDescriptionError').innerText = 'Job Description should not contain continuous special characters.';
  document.getElementById('jobDescriptionError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('jobDescription', 'jobDescriptionError');
} else {
  document.getElementById('jobDescriptionError').style.display = 'none';
}

if (degrees === '') {
            // Display error message for duration field
            document.getElementById('degreesPreferredError').style.display = 'block';
            isValid = false;
            hideErrorMessageOnFocus('degrees', 'degreesPreferredError');
            // console.log(123);
        } else {
            document.getElementById('degreesPreferredError').style.display = 'none';
        }


   if (skills === '') {
  document.getElementById('skillsError').innerText = 'Please select your skills.';
  document.getElementById('skillsError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('skills', 'skillsError');
} else {
  document.getElementById('skillsError').style.display = 'none';
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

if (stipend === '') {
          // Display error message for stipend field
          document.getElementById('stipendError').style.display = 'block';
          isValid = false;
          hideErrorMessageOnFocus('stipend', 'stipendError');
        } else {
          document.getElementById('stipendError').style.display = 'none';
        }

        if (eligibility === '') {
          // Display error message for eligibility field
          document.getElementById('eligibilityError').style.display = 'block';
          isValid = false;
          hideErrorMessageOnFocus('eligibility', 'eligibilityError');
        } else {
          document.getElementById('eligibilityError').style.display = 'none';
        }



// Application Procedure validation with length limit (maximum of 5000 characters)
if (company_info === '') {
  document.getElementById('company_infoError').innerText = 'Please enter the company information.';
  document.getElementById('company_infoError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_info', 'company_infoError');
} else if (company_info.length > 5000) { // Adding length limit (5000 characters)
  document.getElementById('company_infoError').innerText = 'Company Information should not exceed 5000 characters.';
  document.getElementById('company_infoError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_info', 'company_infoError');
} else if (/(.)\1{2,}/.test(company_info)) {
  document.getElementById('company_infoError').innerText = 'Company Information should not contain continuous special characters.';
  document.getElementById('company_infoError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('company_info', 'company_infoError');
} else {
  document.getElementById('company_infoError').style.display = 'none';
}



// Selection Process validation with length limit (maximum of 5000 characters)
if (responsibilities === '') {
  document.getElementById('responsibilitiesError').innerText = 'Please enter the responsibilities.';
  document.getElementById('responsibilitiesError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('responsibilities', 'responsibilitiesError');
} else if (responsibilities.length > 5000) { // Adding length limit (5000 characters)
  document.getElementById('responsibilitiesError').innerText = 'Responsibilities should not exceed 5000 characters.';
  document.getElementById('responsibilitiesError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('responsibilities', 'responsibilitiesError');
} else if (/(.)\1{2,}/.test(responsibilities)) {
  document.getElementById('responsibilitiesError').innerText = 'Responsibilities should not contain continuous special characters.';
  document.getElementById('responsibilitiesError').style.display = 'block';
  isValid = false;
  hideErrorMessageOnFocus('responsibilities', 'responsibilitiesError');
} else {
  document.getElementById('responsibilitiesError').style.display = 'none';
}

if (totalVacancies === '') {
          // Display error message for totalVacancies field
          document.getElementById('totalVacanciesError').style.display = 'block';
          isValid = false;
          hideErrorMessageOnFocus('totalVacancies', 'totalVacanciesError');
        } else {
          document.getElementById('totalVacanciesError').style.display = 'none';
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

// console.log(isValid);
// isValid = false;
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
