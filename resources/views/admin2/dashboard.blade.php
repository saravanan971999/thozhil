<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>


	@include('admin2.layouts.company_header')
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
	</style>


<body>
	<div class="main-wrapper">

@include('admin2.layouts.company_sidebar')
@include('layouts.alert')

		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<h3 class="page-title mt-3">Welcome {{session('full_name')}}</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
                <a href="{{ url('/admin2/internships_applications')}}">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div style="color: #009688;">
										<h3 style="color: #4b8ef1;" class="card_widget_header">{{$int_app}}</h3>
										<h6 style="color: #009688;" class="text-muted">Internship Applications</h6>
                                    </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="8.5" cy="7" r="4"></circle>
                                        <line x1="20" y1="8" x2="20" y2="14"></line>
                                        <line x1="23" y1="11" x2="17" y2="11"></line>
                                        </svg></span>
                                    </div>
								</div>
							</a>
							</div>
						</div>
					</div>


					<a href="{{ url('/admin2/jobs_applications')}}">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 style="color: #4b8ef1;" class="card_widget_header">{{$job_app}}</h3>
										<h6 class="text-muted">Job Applications</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
									<line x1="12" y1="1" x2="12" y2="23"></line>
									<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
									</svg></span> </div>
								</div>
							</div>
						</a>
						</div>
					</div>

					<a href="{{ url('/admin2/posted_internship')}}">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div  class="dash-widget-header">
									<div>
										<h3 style="color: #4b8ef1;" class="card_widget_header">{{$int}}</h3>
										<h6 class="text-muted">Total Internship Posted</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
									<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
									</path>
									<polyline points="14 2 14 8 20 8"></polyline>
									<line x1="12" y1="18" x2="12" y2="12"></line>
									<line x1="9" y1="15" x2="15" y2="15"></line>
									</svg></span> </div>
								</div>
							</div>
						</a>
						</div>
					</div>


					<a href="{{ url('/admin2/posted_jobs')}}">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 style="color: #4b8ef1;" class="card_widget_header">{{$job}}</h3>
										<h6 class="text-muted" style="color: black">Total Job Posted</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="2" y1="12" x2="22" y2="12"></line>
									<path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
									</path>
									</svg></span> </div>
								</div>
							</div>
						</div>
					</a>
					</div>
                </div>


















    </div>
</div>
<!-- ... (your existing HTML code) ... -->
				</div>
            </div>
        </div>
    </div>
</div>
<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
@include('admin2.layouts.company_footer')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script>
    function openMeeting(link) {
        document.getElementById('meetingFrame').style.display = "";
      document.getElementById('meetingFrame').src = link;
    }
</script>


</body>

</html>
