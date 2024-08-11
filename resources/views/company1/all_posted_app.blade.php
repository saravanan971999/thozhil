<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>
	@include('layouts.company_header')

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
</head>

<body>
	<div class="main-wrapper">
		@include('layouts.company_sidebar')
@include('layouts.alert')
		<div class="page-wrapper">
			<div class="content container-fluid">
				<h5 class="mt-5">Posted Internship</h5>
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
									<div class="col-md-6 text-right  ml-auto">
									<a href="all_posted_job.html"><button class="btn btn-primary" type="button">Job posted</button></a>
									</div>

									<table class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
												<th>SI.No</th>
												<th>Company Name</th>
												<th>Internship Title</th>
												<th>Job Description</th>
												<th>Required Skills</th>
												<th>Duration (Months)</th>
												<th>Posted Date</th>
												<th>Application Deadline</th>
												<th>Stipend</th>
												<th>Eligibility Criteria</th>
												<th>Accomdation</th>
												<th>Contact Email</th>
												<th>Contact Mobile Number</th>
												<th>Total Vacancies</th>
												<th>Application Procedure</th>
												<th>Selection Process</th>
												<th>Training Address</th>
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
												<td>Software Developer Intern</td>
												<td>Work on developing and maintaining software applications.</td>
												<td>Programming skills, familiarity with XYZ technologies</td>
												<td class="text-center">3</td>
												<td>11.11.2023</td>
												<td>30.12.2023</td>
												<td>$900</td>
												<td>BE/B.Tech</td>
												<td>Available</td>
												<td>info@gmail.com</td>
												<td>4207-7117-53</td>
												<td>10</td>
												<td>Submit resume and cover letter through the company website.</td>
												<!-- <td>Interview</td> -->
												<td>Technical interview and HR interview</td>
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
															<a class="dropdown-item" href="edit-internship.html">
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
												<td>Software Developer Intern</td>
												<td>Work on developing and maintaining software applications.</td>
												<td>Programming skills, familiarity with XYZ technologies</td>
												<td class="text-center">3</td>
												<td>11.11.2023</td>
												<td>30.12.2023</td>
												<td>$900</td>
												<td>BE/B.Tech</td>
												<td>Available</td>
												<td>info@gmail.com</td>
												<td>4207-7117-53</td>
												<td>10</td>
												<td>Submit resume and cover letter through the company website.</td>
												<!-- <td>Interview</td> -->
												<td>Technical interview and HR interview</td>
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
															<a class="dropdown-item" href="edit-internship.html">
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
												<td>Software Developer Intern</td>
												<td>Work on developing and maintaining software applications.</td>
												<td>Programming skills, familiarity with XYZ technologies</td>
												<td class="text-center">3</td>
												<td>11.11.2023</td>
												<td>30.12.2023</td>
												<td>$900</td>
												<td>BE/B.Tech</td>
												<td>Available</td>
												<td>info@gmail.com</td>
												<td>4207-7117-53</td>
												<td>10</td>
												<td>Submit resume and cover letter through the company website.</td>
												<!-- <td>Interview</td> -->
												<td>Technical interview and HR interview</td>
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
															<a class="dropdown-item" href="edit-internship.html">
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

	<script>
		$(document).ready(function () {
		  $('.datatable').DataTable();
		});
	  </script>

<script>
	$(document).ready(function () {
	  var dataTable = $('.datatable').DataTable();

	  $('#sort-column').on('change', function () {
		var column = parseInt($(this).val());
		dataTable.order([column, 'asc']).draw();
	  });
	});
  </script>


</body>

</html>
