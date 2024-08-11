<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>

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

        .animate{
	/* color: #2e78fd;  */
	font-size: 45px;
	background: linear-gradient(to left,blue 35%, rgb(255, 3, 3));
	background-size: 200% auto;
	-webkit-background-clip: text;
	color: transparent;
	animation: gradient 3s linear infinite;
}

@keyframes gradient{
	0%{
		background-position: 0% 75%;
	}
	50%{
		background-position: 100% 30%;
	}
	100%{
		background-position: 0% 70%;
	}
}
	</style>


<body>
	<div class="main-wrapper">

@include('layouts.company_sidebar')
@include('layouts.alert')

		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row">
						<div class="col-sm-12 mt-5">
							<h3 class="page-title mt-3">Hey <span class="animate" style="font-size:30px;">{{$employer->full_name}} </span> ! Ready to rock your dashboard? Let's make magic happen!!</h3>
							<ul class="breadcrumb">
								<!-- <li class="breadcrumb-item active">Dashboard</li> -->
							</ul>
						</div>
					</div>
				</div>
				<div class="row">
                <a href="{{ url('/employer/internship_applications')}}">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div style="color: #009688;">
										<h3 style="color: #4b8ef1;" class="card_widget_header">{{$int_app}}</h3>
										<h6 style="color: #009688;" class="text-muted">Recent Internship Applications</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
									<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
									<circle cx="8.5" cy="7" r="4"></circle>
									<line x1="20" y1="8" x2="20" y2="14"></line>
									<line x1="23" y1="11" x2="17" y2="11"></line>
									</svg></span> </div>
								</div>
							</a>
							</div>
						</div>
					</div>


					<a href="{{ url('/employer/job_applications')}}">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 style="color: #4b8ef1;" class="card_widget_header">{{$job_app}}</h3>
										<h6 class="text-muted">Recent Job Applications</h6> </div>
									<div class="ml-auto mt-md-3 mt-lg-0"> <span class="opacity-7 text-muted">
									<line x1="12" y1="1" x2="12" y2="23"></line>
									<path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
									</svg></span> </div>
								</div>
							</div>
						</a>
						</div>
					</div>

					<a href="{{ url('/employer/posted_internship')}}">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div  class="dash-widget-header">
									<div>
										<h3 style="color: #4b8ef1;" class="card_widget_header">{{$int}}</h3>
										<h6 class="text-muted">Total Internships Posted</h6> </div>
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


					<a href="{{ url('/employer/posted_jobs')}}">
					<div class="col-xl-3 col-sm-6 col-12">
						<div class="card board1 fill">
							<div class="card-body">
								<div class="dash-widget-header">
									<div>
										<h3 style="color: #4b8ef1;" class="card_widget_header">{{$job}}</h3>
										<h6 class="text-muted" style="color: black">Total Jobs Posted</h6> </div>
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
                <style>
                    /* Custom styles for responsiveness */
                    @media (max-width: 768px) {
                        #bar-chart {
                            max-width: 100%;
                            height: auto;
                        }
                    }
                </style>
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card card-chart">
                            <div class="card-header">
                                <h4 class="card-title">Job Vacancies</h4>
                            </div>
                            <div class="card-body">
                                <canvas id="bar-chart"></canvas>
                            </div>
                        </div>
                    </div>


					{{-- <div class="col-md-12 col-lg-6">
						<div class="card card-chart">
							<div class="card-header">
								<h4 class="card-title"></h4>Job Vacancies</div>
							<div class="card-body">
								<div id="donut-chart"></div>
							</div>
						</div>
					</div> --}}
<!-- ... (your existing HTML code) ... -->

{{-- <div class="col-md-12 col-lg-6">
    <div class="card card-chart">
        <div class="card-header">
            <h4 class="card-title">Add test modules</h4>
            <a href="{{url('/employer/add_test')}}"><button id="" class="btn btn-primary">Add test</button></a>
            <a href="{{url('/employer/view_test')}}"><button id="" class="btn btn-primary">View test modules</button></a>

        </div>
    </div>
</div> --}}


<div class="col-md-12 col-lg-6">
    <div class="card card-chart">
        <div class="card-header">

            <h4 class="card-title" style="color: black">Interview Schedule Calendar</h4>
        </div>
        <div class="card-body">
            <ul class="notification-list">




            @foreach ($meet as $m)
            @if (\Carbon\Carbon::parse($m->zoom_time)->gte(\Carbon\Carbon::now()->subDay(1)))

                <li class="notification-message">

                        <div class="media"> <span class="avatar avatar-sm">
                          </span>
                            <div class="media-body">
                                <p class="noti-details"><span class="noti-title">Tomorrow's Talent Awaits: Interviews Scheduled for {{$m->student_name}}</span>  {{$m->internship_title}} Role on {{\Carbon\Carbon::parse($m->zoom_time)->format('Y-m-d')}} 🌟 Prepare to Meet the Future Stars.

                                    <span class="noti-title"></span>
                                    <a href="javascript:void(0)" onclick="toggleMeetingFrame('{{$m->zoom_meeting}}')">Join Meeting</a>

                                </p>
                                <p class="noti-time"><span class="notification-time">
                                    @if(\Carbon\Carbon::parse($m->zoom_time)->isFuture())
                                    {{ \Carbon\Carbon::parse($m->zoom_time)->diffForHumans(null, true) }} to go
                                @else
                                    Posted {{ \Carbon\Carbon::parse($m->zoom_time)->diffForHumans() }}
                                @endif

                                </span> </p>
                            </div>
                        </div>

                </li>
            @endif
            @endforeach









                    </ul>



            {{-- <div id="event-calendar" class="custom-calendar"></div> --}}
            {{-- <button id="add-event-btn" class="btn btn-primary">Add Event</button> --}}
        </div>
        <div class="">
            <iframe class="resume" id="meetingFrame" style="display: none;"></iframe>
        </div>

        <script>
            function toggleMeetingFrame(zoomMeetingUrl) {
                var meetingFrame = document.getElementById("meetingFrame");

                // Toggle the visibility of the iframe
                if (meetingFrame.style.display === 'none') {
                    // Set the iframe source to the Zoom meeting URL
                    meetingFrame.src = zoomMeetingUrl;

                    // Show the iframe
                    meetingFrame.style.display = 'block';

                    // Add a click event listener to close the iframe when clicking outside
                    document.addEventListener('click', clickOutsidePopup);
                } else {
                    // Hide the iframe
                    meetingFrame.style.display = 'none';

                    // Remove the click event listener
                    document.removeEventListener('click', clickOutsidePopup);
                }
            }

            function clickOutsidePopup(event) {
                var meetingFrame = document.getElementById("meetingFrame");
                var resumeContent = document.getElementById("meetingFrame");

                // Check if the clicked element is outside the iframe
                if (!resumeContent.contains(event.target)) {
                    // Close the iframe
                    toggleMeetingFrame('');
                }
            }
        </script>


    </div>
</div>
<!-- ... (your existing HTML code) ... -->
				</div>
            </div>
        </div>
    </div>
</div>
<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
@include('layouts.company_footer')
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script>
    function openMeeting(link) {
        document.getElementById('meetingFrame').style.display = "";
      document.getElementById('meetingFrame').src = link;
    }
</script>
<!-- Assuming you have a script tag in your Blade template -->
<script>
    $(document).ready(function () {
        // Laravel data passed from the backend
        var internshipData = {!! json_encode($internshipData) !!};
        var jobData = {!! json_encode($jobData) !!};

        // Process the data to match the chart structure
        var processedInternshipData = processData(internshipData, 12);
        var processedJobData = processData(jobData, 12);

        // Create the bar chart
        var barChartCanvas = document.getElementById('bar-chart').getContext('2d');
        var barChart = new Chart(barChartCanvas, {
            type: 'bar',
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [
                    {
                        label: 'Internship Postings',
                        data: processedInternshipData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Job Postings',
                        data: processedJobData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Function to process the data to match the chart structure
        function processData(inputData, numberOfMonths) {
            var processedData = new Array(numberOfMonths).fill(0);

            for (var i = 0; i < inputData.length; i++) {
                var monthIndex = inputData[i].month - 1;
                processedData[monthIndex] = inputData[i].count;
            }

            return processedData;
        }
    });
</script>

<script>
    // function donutChart() {
    //                                         var chartData = {!! json_encode($job_chart) !!};

    // //                                         // Ensure that chartData is an array
    // //                                         if (!Array.isArray(chartData)) {
    // //                                             console.error('Invalid data format for Morris.js chart.');
    // //                                             return;
    // //                                         }

    // //                                         // Transform the data into the required format
    //     var formattedData = chartData.map(function(item) {
    //         return { label: item.job_type, value: item.total_vacancies };
    //     });

    //     window.donutChart = Morris.Donut({
    //         element: 'donut-chart',
    //         data: formattedData,
    //         backgroundColor: '#f2f5fa',
    //     labelColor: '#000000',
    //     // colors: ['rgb(188,143,143)', 'rgba(211,59,66,0.8)', 'rgba(238,210,2,0.8)', 'rgba(107,142,35,0.8)', 'rgb(255,105,180)','rgb(138,43,226)'],
    //     colors: ['rgb(107,142,35)', 'rgb(255,105,180)','rgb(64,224,208)','rgb(238,210,2)','rgb(211,59,66)','rgb(188,143,143)'],
    //     resize: true,
    //     redraw: true
    //         // backgroundColor: '#f2f5fa',
    //         // labelColor: '#009688',
    //         // colors: ['#0BA462', '#39B580', '#67C69D', '#95D7BB'],
    //         // resize: true,
    //         // redraw: true
    //     });
    // }

    //                                     // Call the function to initialize the chart
    //                                     donutChart();
    // $(document).ready(function () {
    //     var eventData = [
    //         // Existing events...
    //     ];

    //     $('#event-calendar').fullCalendar({
    //         header: {
    //             left: 'prev,next today',
    //             center: 'title',
    //             right: 'month,agendaWeek,agendaDay'
    //         },
    //         events: eventData,
    //         eventClick: function (event) {
    //             var confirmDelete = confirm('Do you want to delete this event?');
    //             if (confirmDelete) {
    //                 // Remove the event from the eventData array
    //                 eventData = eventData.filter(function (e) {
    //                     return e !== event;
    //                 });

    //                 // Update the FullCalendar events
    //                 $('#event-calendar').fullCalendar('removeEvents', event._id);
    //             }
    //         }
    //     });

    //     // Add event dynamically on button click
    //     $('#add-event-btn').on('click', function () {
    //         // Get event details from user input (you can use a form for this)
    //         var title = prompt('Enter event title:');
    //         var start = prompt('Enter event start date and time (YYYY-MM-DD HH:mm):');
    //         var end = prompt('Enter event end date and time (YYYY-MM-DD HH:mm):');

    //         // Validate input (you can add more robust validation as needed)
    //         if (!title || !start || !end) {
    //             alert('Invalid input. Please enter all details.');
    //             return;
    //         }

    //         // Create a new event object
    //         var newEvent = {
    //             title: title,
    //             start: start,
    //             end: end
    //         };

    //         // Add the new event to the eventData array
    //         eventData.push(newEvent);

    //         // Update the FullCalendar events
    //         $('#event-calendar').fullCalendar('renderEvent', newEvent, true);
    //     });
    // });
</script>


</body>

</html>
