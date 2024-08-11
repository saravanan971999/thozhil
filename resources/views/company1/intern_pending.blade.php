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
		@include('layouts.company_sidebar')
        @include('layouts.alert')

		<div class="page-wrapper">
			<div class="content container-fluid">
				<h5 class="mt-5">Received Internship Application</h5>
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
                                    <!-- <table class="datatable table table-stripped table table-hover table-center mb-0" style="margin-left: 11%;"> -->
                                        <thead>
                                            <tr>
												<th>SI No.</th>
                                                <th>Name</th>
                                                <th>Internship Title</th>
                                                <th>Phone Number</th>
                                                <th>Email ID</th>
                                                <th>Resume</th>
                                                <th class="text-right">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
												<td>1</td>
                                                <td>John Doe</td>
                                                <td>Web Development</td>
                                                <td>123-456-7890</td>
                                                <td>john@example.com</td>
                                                <td>
													<div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm mr-2">Download</button>
                                                        <button type="button" class="btn btn-danger btn-sm">View</button>
                                                    </div>
												</td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm mr-2">Approve</button>
                                                        <button type="button" class="btn btn-danger btn-sm">Reject</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
												<td>2</td>
                                                <td>Jane Smith</td>
                                                <td>Data Science</td>
                                                <td>987-654-3210</td>
                                                <td>jane@example.com</td>
                                                <td>
													<div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm mr-2">Download</button>
                                                        <button type="button" class="btn btn-danger btn-sm">View</button>
                                                    </div>

												</td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-primary btn-sm mr-2">Approve</button>
                                                        <button type="button" class="btn btn-danger btn-sm">Reject</button>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Add more rows as needed -->
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
