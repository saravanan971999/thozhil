<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
	@include('layouts.company_header')
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
	

        #company-details {
            margin-top: 20px;
        }
        .resume {
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
           .resume-content {
               background-color: #fff;
               padding: 20px;
               border-radius: 8px;
               box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
               text-align: center;
           }
	</style>

<body>
	<div class="main-wrapper">
		@include('layouts.company_sidebar')
        @include('layouts.alert')

		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header mt-5">
            <h2 style="text-align:center;">Company Profile</h2>
			<div class="row align-items-center">
				<div class="col-lg-12">
					<div class="card">
						<div class="card-body">
							<h5 style="margin-left:1000px;">
								
								<a class="edit-link"  href="{{ url('/employer/settings')}}">
									<i class="fa fa-edit mr-1"></i>Edit
								</a>
							</h5>
							{{-- <form> --}}
								<div class="form-group row mt-4">
									<label for="companyName" class="col-sm-3 col-form-label text-sm-right">Company Name:</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="companyName" value="{{$emp->company_name}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="companyType" class="col-sm-3 col-form-label text-sm-right">Company Type:</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="companyType" value="{{$emp->company_type}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="registrationNumber" class="col-sm-3 col-form-label text-sm-right">Registration Number:</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="registrationNumber" value="{{$emp->registration_no}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="yearOfFounding" class="col-sm-3 col-form-label text-sm-right">Year of Founding:</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="yearOfFounding" value="{{$emp->year_of_founding}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="email" class="col-sm-3 col-form-label text-sm-right">Email:</label>
									<div class="col-sm-9">
										<input readonly type="email" class="form-control" id="email" value="{{$emp->email}}" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label for="mobile" class="col-sm-3 col-form-label text-sm-right">Mobile:</label>
									<div class="col-sm-9">
										<input readonly type="tel" class="form-control" id="mobile" value="{{$emp->phone}}">
									</div>
								</div>

								<div class="form-group row">
									<label for="mobile" class="col-sm-3 col-form-label text-sm-right">Company Information:</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="description" value="{{$emp->description}}">
									</div>
								</div>



								<div class="form-group row">
									<label for="addressLine1" class="col-sm-3 col-form-label text-sm-right">Building No & Name:</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="addressLine1" value="{{$emp->door_no}}">
									</div>
								</div>

								<div class="form-group row">
									<label for="mobile" class="col-sm-3 col-form-label text-sm-right">Area/Locality</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="mobile" value="{{$emp->area}}">
									</div>
								</div>

								<div class="form-group row">
									<label for="country" class="col-sm-3 col-form-label text-sm-right">Country:</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="city" value="{{$emp->country}}">
									</div>
								</div>

								<div class="form-group row">
									<label for="state" class="col-sm-3 col-form-label text-sm-right">State:</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="state" value="{{$emp->state}}">
									</div>
								</div>

								<div class="form-group row">
									<label for="city" class="col-sm-3 col-form-label text-sm-right">City:</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="city" value="{{$emp->district}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="postalCode" class="col-sm-3 col-form-label text-sm-right">Postal Code:</label>
									<div class="col-sm-9">
										<input readonly type="text" class="form-control" id="postalCode" value="{{$emp->pincode}}">
									</div>
								</div>

								<div class="form-group row">
									<label for="postalCode" class="col-sm-3 col-form-label text-sm-right">Company Logo</label>
									<div class="col-sm-9">
										{{-- <input readonly type="file" class="form-control" id="postalCode" value="{{$emp->pincode}}"> --}}
                                        <button class="btn btn-danger btn-sm" id="resumeID" onclick="view()" value="{{$emp->company_logo}}">View</button>
									</div>
								</div>



							{{-- </form> --}}
<div id="resume-view"></div>
						</div>
					</div>
				</div>
			</div>
	</div>

<script>
        function view() {
            document.getElementById("resume-view").classList.add("resume");
            var resumeView = document.getElementById("resume-view");
            var name = document.getElementById("resumeID").value;

            // Send an AJAX request to Laravel backend
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/get-pdf-logo/" + name, true);

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        var response = JSON.parse(xhr.responseText);
                        console.log(response);
                        if (response.success) {
                            // Decode the URL and display the PDF
                            var decodedUrl = decodeURIComponent(response.url);
                            decodedUrl = decodedUrl.replace(/'/g, '%27');
                            resumeView.innerHTML = "<embed class='resume-content' id='RESUME' src='" + decodedUrl + "' width='50%' height='80%' type='application/pdf'>";
                            resumeView.style.display = 'flex';

                            // Attach the click event listener to close the popup when clicking outside
                            document.addEventListener('click', clickOutsidePopup);
                        }
                        else {
                            // Display an error message
                            resumeView.innerHTML = "";
                            resumeError.style.display = "block";
                            resumeError.innerHTML = response.message;
                        }
                    } else {
                        console.error(xhr.statusText);
                    }
                }
            };

            xhr.send();
        }

        function clickOutsidePopup(event) {

            var resumeView = document.getElementById("resume-view");
            var resumeContent = document.getElementById("RESUME");

            // Check if the clicked element is outside the popup
            if (event.target !== resumeContent && !resumeContent.contains(event.target)) {
                // Close the popup

                closePopup_p();

            }
        }

        function closePopup_p() {
            // Your code to close the popup goes here
            // alert(1);
            document.getElementById('resume-view').style.display = 'none';

            // Remove the click event listener
            document.removeEventListener('click', clickOutsidePopup);
        }
    </script>


<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
@include('layouts.company_footer')

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>




</body>

</html>
