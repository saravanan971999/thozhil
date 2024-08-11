<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>

    <title>Applications</title>
    <style>
         .popupP {
            display: none;
            background-color: rgba(49, 49, 49, 0.7);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 100000;
        }
        /* Custom Styles */
        .navbar-custom {
            background-color: #4b8ef1; /* Set your custom color here */
        }
        .navbar-custom .navbar-brand {
            color: #fff; /* Set text color for the company name */
        }
        .navbar-custom .navbar-nav .nav-link {
            color: #fff; /* Set text color for the navigation links */
        }

        .container {
            max-width: 1200px;
        }

        .mt-5 {
            margin-top: 3rem;
        }

        .job-card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
            margin-bottom: 20px;
        }

        .job-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-body .card-text {
            margin-bottom: 10px;
        }

        .card-body .view-more-btn {
            align-self: flex-end; /* Align the button to the right */
            margin-top: 10px; /* Adjust as needed */
        }

        .text-muted {
            color: #6c757d;
        }

        .input-group .input-group-text:hover {
            cursor: pointer;
            background-color: #4b8ef1;
        }
        .card-container {
        height: 100%; /* Set a specific height for the card container */
    }

    .job-card {
        height: 100%; /* Set a specific height for the job card */
    }
    </style>
</head>
<body>

@include('layouts.index_page_header')


<br>
<br>
<br>
<br>
<br>
<div class="popupP d-none" id="loading">
    <div class="spinner-border text-primary" style="width: 4rem; height: 4rem;"   role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div class="container mt-3">
    <div class="align-items-center">
        <div class="col-md-6">
            <div class="col-md text-center mb-2 d-flex">
                <h4>Approved Applications: &nbsp;&nbsp;&nbsp;</h4>
                <button class="btn btn-primary view-more-btn" onclick="viewInt()" >View Internship</button>
                &nbsp;<button class="btn btn-primary view-more-btn" onclick="viewJob()" >View Job</button>
            </div>
            <div class="input-group col-md-6"  id="SEARCH_OPTION" style="display: none">
                @if ($total_int >6 || $total_job > 6)
                    <span class="input-group-text">
                    <i class="fas fa-search" id="search_btn"></i></span>
                    <input type="text" id="title" class="form-control form-control-sm" placeholder="Search..." style="width: 120px;">
                @endif
            </div>
            <div class="input-group col-md-6"  id="SEARCH_OPTION_JOB" style="display: none">
                @if ($total_int >6 || $total_job > 6)
                    <span class="input-group-text">
                    <i class="fas fa-search" id="search_btn_job"></i></span>
                    <input type="text" id="title_job" class="form-control form-control-sm" placeholder="Search..." style="width: 120px;">
                @endif
            </div>
        </div>
    </div>
</div>


<div id="jobs-container">

</div>



<script>
     function clickOutsidePopup(event) {
                                // alert(3)
        if (event.target.classList.contains('page-link')) {
            event.preventDefault(); // Prevent default link behavior
            var nextPageUrl = event.target.href; // Get the URL of the next page
            fetchNextPage(nextPageUrl); // Fetch the next page via AJAX
        }
    }

    function fetchNextPage(url) {
        url = url.replace(/^http:\/\//i, 'https://');
        fetch(url)
            .then(response => response.text())
            .then(data => {
                document.getElementById('jobs-container').innerHTML = data; // Update content with new page
            })
            .catch(error => console.error('Error fetching next page:', error));
    }



    document.addEventListener('DOMContentLoaded', function () {
        function addPaginationClickListener() {
            var paginationLinks = document.querySelectorAll('.pagination a');

            paginationLinks.forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault();

                    var pageUrl = link.getAttribute('href');
                    fetch(pageUrl)
                        .then(response => response.text())
                        .then(data => {
                            console.log(data);
                            document.getElementById('jobsContainer').innerHTML = data;
                            document.getElementById('internship').style.display = "none";
                            document.getElementById('jobID').style.display = "";
                            addPaginationClickListener(); // Re-add event listener for new pagination links
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        }

        var filterForm = document.getElementById('search_btn');

        filterForm.addEventListener('click', function (e) {
            e.preventDefault();
let loading = document.getElementById('loading');
            loading.classList.remove('d-none');
            // alert(1);
            // var formData = new FormData(filterForm);
            // var queryString = new URLSearchParams(formData).toString();
            var queryString = encodeURIComponent(document.getElementById('title').value);

            fetch("{{ route('search_approved_internships') }}?title=" + queryString)
                .then(response => response.text())
                .then(data => {
                    loading.classList.add('d-none');
                    document.getElementById('jobs-container').innerHTML = "";
                    document.getElementById('jobs-container').innerHTML = data;
                    document.getElementById('jobs-container').addEventListener('click', clickOutsidePopup);

                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    });

    var filterForm = document.getElementById('search_btn_job');

        filterForm.addEventListener('click', function (e) {
            e.preventDefault();
let loading = document.getElementById('loading');
            loading.classList.remove('d-none');
            // alert(1);
            // var formData = new FormData(filterForm);
            // var queryString = new URLSearchParams(formData).toString();
            var queryString = encodeURIComponent(document.getElementById('title_job').value);

            fetch("{{ route('search_approved_jobs') }}?title=" + queryString)
                .then(response => response.text())
                .then(data => {
                    loading.classList.add('d-none');
                    document.getElementById('jobs-container').innerHTML = "";
                    document.getElementById('jobs-container').innerHTML = data;
                    document.getElementById('jobs-container').addEventListener('click', clickOutsidePopup);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });


    function viewInt(){
let loading = document.getElementById('loading');
            loading.classList.remove('d-none');
        fetch('/approved_application_intern')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
                    loading.classList.add('d-none');
                    // Update content with filtered results
                    document.getElementById('jobs-container').innerHTML = data;
                    document.getElementById('jobs-container').addEventListener('click', clickOutsidePopup);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        document.getElementById('SEARCH_OPTION').style.display = "";
        document.getElementById('SEARCH_OPTION_JOB').style.display = "none";
    }

    function viewJob(){
        let loading = document.getElementById('loading');
            loading.classList.remove('d-none');
        fetch('/approved_application_job')
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.text();
                })
                .then(data => {
loading.classList.add('d-none');
                    // Update content with filtered results
                    document.getElementById('jobs-container').innerHTML = data;
                    document.getElementById('jobs-container').addEventListener('click', clickOutsidePopup);
                })
                .catch(error => {
                    console.error('There was a problem with the fetch operation:', error);
                });
        document.getElementById('SEARCH_OPTION').style.display = "none";
        document.getElementById('SEARCH_OPTION_JOB').style.display = "";
    }
</script>







<!-- Bootstrap JS (Optional, if you need it for some features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@include('layouts.index_page_footer')
