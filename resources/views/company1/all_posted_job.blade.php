<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>
@include('layouts.company_header')
</head>

<body>
	<div class="main-wrapper">
		{{-- <div class="header">
			<div class="header-left">
				<a href="index.html" class="logo">  <span class="logoclass">OneYes</span> </a>
				<!-- <a href="index.html" class="logo logo-small"> <img src="assets/img/hotel_logo.png" alt="Logo" width="30" height="30"> </a> -->
			</div>
			<a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
			<a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
			<ul class="nav user-menu">
				<li class="nav-item dropdown noti-dropdown">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span> </a>
					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header"> <span class="notification-title">Notifications</span> <a href="javascript:void(0)" class="clear-noti"> Clear All </a> </div>
						<div class="noti-content">
							<ul class="notification-list">
								<li class="notification-message">
									<a href="#">
										<div class="media"> <span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
												<p class="noti-time"><span class="notification-time">4 mins ago</span> </p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media"> <span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-11.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">International Software
													Inc</span> has sent you a invoice in the amount of <span class="noti-title">$218</span></p>
												<p class="noti-time"><span class="notification-time">6 mins ago</span> </p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media"> <span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-17.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">John Hendry</span> sent a cancellation request <span class="noti-title">Apple iPhone
													XR</span></p>
												<p class="noti-time"><span class="notification-time">8 mins ago</span> </p>
											</div>
										</div>
									</a>
								</li>
								<li class="notification-message">
									<a href="#">
										<div class="media"> <span class="avatar avatar-sm">
											<img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-13.jpg">
											</span>
											<div class="media-body">
												<p class="noti-details"><span class="noti-title">Mercury Software
												Inc</span> added a new product <span class="noti-title">Apple
												MacBook Pro</span></p>
												<p class="noti-time"><span class="notification-time">12 mins ago</span> </p>
											</div>
										</div>
									</a>
								</li>
							</ul>
						</div>
						<div class="topnav-dropdown-footer"> <a href="#">View all Notifications</a> </div>
					</div>
				</li>
				<li class="nav-item dropdown has-arrow">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="Soeng Souy"></span> </a>
					<div class="dropdown-menu">
						<div class="user-header">
							<div class="avatar avatar-sm"> <img src="assets/img/profiles/avatar-01.jpg" alt="User Image" class="avatar-img rounded-circle"> </div>
							<div class="user-text">
								<h6>OneYes</h6>
								<!-- <p class="text-muted mb-0">Hr Admin</p> -->
							</div>
						</div> <a class="dropdown-item" href="profile.html">My Profile</a> <a class="dropdown-item" href="settings.html">Edit Profile</a> <a class="dropdown-item" href="login.html">Logout</a> </div>
				</li>
			</ul>
			<!-- <div class="top-nav-search">
				<form>
					<input type="text" class="form-control" placeholder="Search here">
					<button class="btn" type="submit"><i class="fas fa-search"></i></button>
				</form>
			</div> -->
		</div>
		<div class="sidebar" id="sidebar">
			<div class="sidebar-inner slimscroll">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="active"> <a href="index.html"><i class="fas fa-tachometer-alt"></i> <span>Dashboard</span></a> </li>
						<li class="list-divider"></li>
						<li class="submenu"> <a href="#"><i class="fas fa-suitcase"></i> <span> Internship </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="post_internship.html"> Post Internship </a></li>
								<li><a href="posted_internship.html"> Posted Internship </a></li>
								<li><a href="internship_app.html"> Applications </a></li>
							</ul>
						</li>
						<li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Jobs </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="post_job.html"> Post Jobs </a></li>
								<li><a href="posted_job.html"> Posted Jobs </a></li>
								<li><a href="job_app.html"> Applications </a></li>
							</ul>
						</li>
						<li class="submenu"> <a href="#"><i class="fas fa-key"></i> <span> Pending<br> Applications </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="intern_pending.html">Internship </a></li>
								<li><a href="job_pending.html"> Jobs </a></li>
								<!-- <li><a href="add-room.html"> Add Rooms </a></li> -->
							</ul>
						</li>
						<li class="submenu"> <a href="#"><i class="fas fa-user"></i> <span> Approved<br> Applications </span> <span class="menu-arrow"></span></a>
							<ul class="submenu_class" style="display: none;">
								<li><a href="approved-intern.html">Internship </a></li>
								<li><a href="approved-job.html"> Job </a></li>
								<!-- <li><a href="add-staff.html"> Add Staff </a></li> -->
							</ul>
						</li>
								<li class="submenu"> <a href="#"><i class="fas fa-envelope"></i> <span> Rejected<br> Applications </span> <span class="menu-arrow"></span></a>
									<ul class="submenu_class" style="display: none;">
										<li><a href="rejected-intern.html">Internship </a></li>
										<li><a href="rejected-job.html"> Jobs </a></li>
										<!-- <li><a href="mail-veiw.html"> Mail Veiw </a></li> -->
									</ul>
								</li>
							</ul>
						</li>

					</ul>
				</div>
			</div>
		</div> --}}
@include('layouts.company_sidebar')
@include('layouts.alert')
		<div class="page-wrapper">
			<div class="content container-fluid">
				<h5 class="mt-5">Posted Job</h5>
				<div class="page-header">
					<div class="row align-items-center">

						<div class="col">
							<div class="mt-5">
								<label for="sort-column">Sort by:</label>
								<select id="sort-column">
								   <option value="0">Date</option>
									   <option value="1">Company Name</option>
										<!-- Add options for other columns as needed -->
								   </select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mt-3">
								<form class="form-inline">
									<div class="input-group ml-auto">
										<input type="text" class="form-control" placeholder="Search here">
										<div class="input-group-append">
											<button class="btn btn-outline-success" type="submit">
												<i class="fas fa-search"></i>
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">

							<div class="card-body booking_card">
								<div class="table-responsive">
									<table class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>SI No</th>
												<th>Company Name</th>
												<th>Job Type</th>
												<th>Job Title</th>
												<th>Total Vacancies</th>
												<th>Job Description</th>
												<th>Required Skills</th>
												<th>Posted Date</th>
												<th>Application Deadline</th>
												<th>Salary Package</th>
												<th>Degrees Preferred</th>
												<th>Experience Required(In Years)</th>
												<th>Contact Email</th>
												<th>Contact Mobile Number</th>
												<th>WorkLocation</th>
												<th>Application Procedure</th>
												<th>Selection Process</th>
												<th>Accomdation</th>
												<th>Address</th>
												<th>Street</th>
												<th>Village/Town</th>
                                                <th>Country</th>
												<th>State</th>
												<th>District</th>
												<th>Pincode</th>
												<th class="text-right">Actions</th>

											</tr>
										</thead>
										<tbody>
											<!-- Internship 1 -->
											<tr>
												<td>1</td>
												<td>OneYes</td>
												<td>IT</td>
												<td>Software Developer</td>
												<td class="text-center">3</td>
												<td>It is a place to explore your Knowledge</td>
											    <td>Programming skills, familiarity with XYZ technologies</td>
												<td>11.11.2023</td>
												<td>30.12.2023</td>
												<td>$900</td>
												<td>BE/B.Tech</td>
												<td>3 Years</td>
												<td>info@gmail.com</td>
												<td>4207-7117-53</td>
												<td>Salem</td>
												<td>Submit resume and cover letter through the company website.</td>
												<td>Technical interview and HR interview</td>
												<td>Yes</td>
												<td>Salem</td>
												<td>Salem</td>
												<td>Salem</td>
												<td>India</td>
												<td>Tamil Nadu</td>
												<td>Salem</td>
												<td>636363</td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
															<i class="fas fa-ellipsis-v ellipse_color"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="edit-job.html">
																<i class="fas fa-pencil-alt m-r-5"></i> Edit
															</a>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset">
																<i class="fas fa-trash-alt m-r-5"></i> Delete
															</a>
														</div>
													</div>
												</td>
											</tr>

											<tr>
												<td>2</td>
												<td>OneYes</td>
												<td>IT</td>
												<td>Software Developer</td>
												<td class="text-center">3</td>
												<td>It is a place to explore your Knowledge</td>
											    <td>Programming skills, familiarity with XYZ technologies</td>
												<td>11.11.2023</td>
												<td>30.12.2023</td>
												<td>$900</td>
												<td>BE/B.Tech</td>
												<td>3 Years</td>
												<td>info@gmail.com</td>
												<td>4207-7117-53</td>
												<td>Salem</td>
												<td>Submit resume and cover letter through the company website.</td>
												<td>Technical interview and HR interview</td>
												<td>Yes</td>
												<td>Salem</td>
												<td>Salem</td>
												<td>Salem</td>
												<td>India</td>
												<td>Tamil Nadu</td>
												<td>Salem</td>
												<td>636363</td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
															<i class="fas fa-ellipsis-v ellipse_color"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="edit-job.html">
																<i class="fas fa-pencil-alt m-r-5"></i> Edit
															</a>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset">
																<i class="fas fa-trash-alt m-r-5"></i> Delete
															</a>
														</div>
													</div>
												</td>
											</tr>


											<tr>
												<td>3</td>
												<td>OneYes</td>
												<td>IT</td>
												<td>Software Developer</td>
												<td class="text-center">3</td>
												<td>It is a place to explore your Knowledge</td>
											    <td>Programming skills, familiarity with XYZ technologies</td>
												<td>11.11.2023</td>
												<td>30.12.2023</td>
												<td>$900</td>
												<td>BE/B.Tech</td>
												<td>3 Years</td>
												<td>info@gmail.com</td>
												<td>4207-7117-53</td>
												<td>Salem</td>
												<td>Submit resume and cover letter through the company website.</td>
												<td>Technical interview and HR interview</td>
												<td>Yes</td>
												<td>Salem</td>
												<td>Salem</td>
												<td>Salem</td>
												<td>India</td>
												<td>Tamil Nadu</td>
												<td>Salem</td>
												<td>636363</td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
															<i class="fas fa-ellipsis-v ellipse_color"></i>
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="edit-job.html">
																<i class="fas fa-pencil-alt m-r-5"></i> Edit
															</a>
															<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset">
																<i class="fas fa-trash-alt m-r-5"></i> Delete
															</a>
														</div>
													</div>
												</td>
											</tr>





										</tbody>
									</table>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="delete_asset" class="modal fade delete-modal" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body text-center"> <img src="assets/img/sent.png" alt="" width="50" height="46">
							<h3 class="delete_class">Are you sure want to delete this Asset?</h3>
							<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	@include('layouts.company_footer')
</body>

</html>
