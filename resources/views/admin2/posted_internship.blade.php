<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Dashboard</title>
	@include('admin2.layouts.company_header')

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    {{-- <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>

	<div class="main-wrapper">
		@include('admin2.layouts.company_sidebar')
        @include('layouts.alert')

		<div class="page-wrapper">
			<div class="content container-fluid">
				<h5 class="mt-5">Posted Internship</h5>
				<div class="page-header">
					<div class="row align-items-center">

						<div class="col">
							<div class="mt-5">
                                {{-- {{dd($internships)}} --}}
                                <label for="sort-column">Sort by:</label>
                                <select id="sort-column"  onchange="demo()">Select
                                    <option value="default">Select</option>
                                    <option value="0">Latest</option>
                                    <option value="1">Oldest</option>
                                </select>
<script>
    function demo() {
            var selected = document.getElementById('sort-column').value;
            var application = @json($internships);
            var applications = application.data;
            // console.log(applications);
        if (selected == 0) {
            applications.sort((function(a, b) {
            var dateA = new Date(a.updated_at);
            var dateB = new Date(b.updated_at);
            return dateB - dateA ;
            }));
            document.getElementById('T_body').innerHTML = sortedData(applications);
        }
        else if(selected == 1){

            applications.sort((function(a, b) {
            var dateA = new Date(a.created_at);
            var dateB = new Date(b.created_at);
            return dateA - dateB;
            }));
            document.getElementById('T_body').innerHTML = sortedData(applications);

        }
        else{
            var applications = @json($internships);
            document.getElementById('T_body').innerHTML = sortedData(applications);
        }
    }
    function sortedData(applications) {
        var sortedData = '';
        for (i = 0; i < applications.length; i++) {
            // var resume = encodeURIComponent((applications[i].resume));
            // var app_id = encodeURIComponent((applications[i].application_id));
            sortedData +=
                        `<tr>
                        <td>
                            <input type="checkbox" name="checkbox[]" value="${applications[i].internship_id}" class="rowCheckbox">
                        </td>
                        <td>${i+1}</td>
                        <td>${applications[i].company_name}</td>
                        <td>${applications[i].internship_type}</td>
                        <td>${applications[i].internship_title}</td>
                        <td>${applications[i].application_start_date}</td>
                        <td>${applications[i].application_deadline}</td>
                        <td>`;



            const deadlineDate = new Date(applications[i].application_deadline);
            const currentDate = new Date();
            if (deadlineDate > currentDate) {
                sortedData += `<button type="button" class="btn btn-primary btn-sm mr-2">Active</button>`;
            } else {
                sortedData += `<button class="btn btn-danger btn-sm">Inactive</button>`;
            }

            sortedData += `</td>`;




        sortedData +=  `</td>
                        <td>`+applications[i].created_at+`</td>
                        <td>`+applications[i].updated_at+`</td>
                        <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v ellipse_color"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ url('/employer/edit_internship/'.`+applications[i].internship_id+`) }}">
                                    <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset_`+applications[i].internship_id+`">
                                    <i class="fas fa-trash-alt m-r-5"></i> Delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <div id="delete_asset_`+applications[i].internship_id+`" class="modal fade delete-modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h3 class="delete_class">Are you sure you want to delete this Asset?</h3>
                                <div class="m-t-20">
                                    <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                    <a href="{{ url('/employer/delete_internship/'.`+applications[i].internship_id+`) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;


        }

        return sortedData;
    }

</script>
                            </div>

						</div>
						<div class="col-md-6">
							<div class="mt-3">
								{{-- <form class="form-inline"> --}}
									<div class="input-group ml-auto">
                                        <style>
                                            .search-container {
                                                width: 10%;
                                            }
                                            /* Basic styles for the search input */
                                            .record-search {
                                            width: 100%;
                                                padding: 10px;
                                                box-sizing: border-box;
                                            }

                                            /* Styles for the search results dropdown */
                                            #searchResults {
                                                list-style-type: none;
                                                padding: 0;
                                                margin-top: 30px;
                                                position: absolute;
                                            width: fit-content;
                                                max-height: 200px;
                                                overflow-y: auto;
                                                background-color: #fff;
                                                border: 1px solid #ddd;
                                                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                                                z-index: 1;
                                            }

                                            #searchResults li {
                                                padding: 10px;
                                                border-bottom: 1px solid #ddd;
                                                cursor: pointer;
                                            }

                                            #searchResults li:last-child {
                                                border-bottom: none;
                                            }

                                            /* Highlight the selected item */
                                            #searchResults li:hover,
                                            #searchResults li.active {
                                                background-color: #f5f5f5;
                                            }

                                        </style>

<input type="text" id="searchInput" class="form-control record-search" placeholder="Search here">
<ul id="searchResults"></ul>
<div class="input-group-append">
    <button class="btn btn-outline-success" id="Search_btn">
        <i class="fas fa-search"></i>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var searchBtn = document.getElementById('Search_btn');
        var tbody = document.getElementById('T_body');

        // Add input event listener to the search input
        searchBtn.addEventListener('click', function () {
            var searchInput = document.getElementById('searchInput');
            var query = searchInput.value.trim();

            // Check if the search input is empty
            if (!query) {
                // Display an error message or take appropriate action
                alert('Please enter a search term.');
            } else {
                // Perform your search logic here
                fetch('/admin2/posted_internship_search/' + query)
                    .then(response => response.text())
                    .then(data => {
                        clearResults();
                        tbody.innerHTML = data;
                        // console.log(data);
                    })
                    .catch(error => console.error('Error:', error));
            }
        });

        function clearResults() {
            tbody.innerHTML = '';
        }
    });
</script>

									</div>
								{{-- </form> --}}
							</div>
						</div>
						</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="card card-table">

							<div class="card-body booking_card">
								<div class="table-responsive">
                                <form action="{{url('employer/delete_selected_internship')}}" method="post">
                                @csrf
									<table class="datatable table table-stripped table table-hover table-center mb-0">
										<thead>
											<tr>
                                                <th>
                                                    <input type="checkbox" id="selectAllCheckbox" class="selectAllCheckbox">
                                                    </th>
												<th>SI No.</th>
												<th>Company Name</th>
                                                <th>Internship Type</th>
												<th>Internship Title</th>
                                                <th>Posted Date</th>
												<th>Application Deadline</th>
                                                <th>Status</th>
												<th>Created_at</th>
                                                <th>Modified_at</th>
												<th class="text-right">Actions</th>

											</tr>
										</thead>
<tbody id="T_body">

            @php
                $r=1;
            @endphp
            @forelse ($internships as $int)
                <tr>
                    <td>
                        <input type="checkbox" name="checkbox[]" value="{{$int->internship_id}}" class="rowCheckbox">
                       </td>
                    <td>{{$r++}}</td>
                    <td class="sort" data-column="company_name">{{$int->company_name}}</td>
                    <td>{{$int->internship_type}}</td>
                    <td>{{$int->internship_title}}</td>
                    <td>{{$int->application_start_date}}</td>
                    <td>{{$int->application_deadline}}</td>
                    <td>
                        @if (\Carbon\Carbon::parse($int->application_deadline)->isFuture())

                        <button type="button" class="btn btn-primary btn-sm mr-2">
                            Active
                        </button>





                        @else
                        <button  class="btn btn-danger btn-sm">
                            Inactive
                        </button>

                        @endif
                    </td>
                    <td>{{$int->created_at}}</td>
                    <td>{{$int->updated_at}}</td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-ellipsis-v ellipse_color"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ url('/admin2/edit_internship/'.$int->internship_id) }}">
                                    <i class="fas fa-pencil-alt m-r-5"></i> Edit
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_asset_{{ $int->internship_id }}">
                                    <i class="fas fa-trash-alt m-r-5"></i> Delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <div id="delete_asset_{{ $int->internship_id }}" class="modal fade delete-modal" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">

                                <h3 class="delete_class">Are you sure you want to delete this Internship?</h3>
                                <div class="m-t-20">
                                    <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                                    <a href="{{ url('/employer/delete_internship/'.$int->internship_id) }}" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="9" class="text-center"><strong>No internships posted yet</strong></td>
                </tr>
            @endforelse
											<!-- Internship 1 -->
</tbody>
									</table>

                                    <button id="deleteButton" type="submit" class="btn btn-danger mt-4 " style="display: none;">Delete Selected</button>
                                </form>

								</div>
                                {{ $internships->links('guest.link') }}
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
@include('admin2.layouts.company_footer')
<!-- Include jQuery from CDN -->
{{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}
<!-- Include jQuery from CDN -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function () {
        // Function to update delete button visibility
        function updateDeleteButtonVisibility() {
            // Check if any of the individual checkboxes are checked
            if ($(".rowCheckbox:checked").length > 0) {
                // Show the delete button
                $("#deleteButton").show();
            } else {
                // Hide the delete button
                $("#deleteButton").hide();
            }
        }

        // Event listener for the "Select All" checkbox
        $("#selectAllCheckbox").change(function () {
            $(".rowCheckbox").prop('checked', $(this).prop('checked'));
            // Update delete button visibility
            updateDeleteButtonVisibility();
        });

        // Event listener for individual checkboxes
        $(".rowCheckbox").change(function () {
            // Update delete button visibility
            updateDeleteButtonVisibility();
        });
    });
</script>
<script>


		$(document).ready(function () {
		  $('.datatable').DataTable();
		});



        function sortResults() {
            var selectedColumn = $('#sort').val();
            var baseUrl = '{{ url("/your-sort-endpoint") }}'; // Replace with your actual sort endpoint

            // Build the URL with the selected sorting column
            var newUrl = baseUrl + '?column=' + selectedColumn;

            // Redirect to the new URL
            window.location.href = newUrl;
        }





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
