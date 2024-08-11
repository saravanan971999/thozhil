<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Scheduled Interviews</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <style>
    .parent-element {
  padding: 20px;
}

#calendar {
  height: 400px; /* Adjust as needed */
}

@media (max-width: 768px) {
  #calendar {
    height: 300px; /* Adjust as needed */
  }
}
  </style>
</head>

<body>
<a href="{{url('employer/')}}" class="btn btn-primary mt-5 mx-4">Back</a> <!-- Back Button -->


<div class="parent-element">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3 class="text-center mt-5">Scheduled Interviews</h3>
        <div id="calendar" class="mt-5 mb-5"></div>
      </div>
      <div class="col-md-6">
        <h3 class="text-center mt-5 border-bottom-1 text-decoration-underline">Notes</h3>
        <h6 id="title" class="text-center mt-5"></h6>
        <ul id='notes' class="overflow-scroll p-5"></ul>
      </div>
    </div>
  </div>
</div>


<script>
    function goBack() {
      window.history.back();
    }
  </script>
  <script>
    $(document).ready(function () {
      var tests = @json($tests);
      var meetings = @json($meetings);

      $('#calendar').fullCalendar({
        header: {

          right: 'month, agendaWeek, agendaDay today prev next '
        },
        eventSources: [{

          events: tests,
          color: 'red',
          textColor: 'black'
        },

        {
          events: meetings,
          color: 'green',
          textColor: 'white'
        }],

        selectable: true,
        selectHelper: true,

        editable: true,
        eventOverlap: false,
        eventClick: function (event) {

          if(event.title == 'TESTS'){
            var listElement = document.getElementById('notes');
            var tile = document.getElementById('title').innerText = event.title;
            listElement.innerHTML = "";
            var testCount = document.createElement('li');
            testCount.textContent = "Total Tests - " + event.data.length;
            listElement.appendChild(testCount);
            event.data.forEach(function (e) {

              var listItem = document.createElement('li');
              listItem.textContent = e.conducting_datetime;
              listElement.appendChild(listItem);
            });
          }else{
            var listElement = document.getElementById('notes');
            var tile = document.getElementById('title').innerText = event.title;
            listElement.innerHTML = "";
            var meetingsCount = document.createElement('li');
            meetingsCount.textContent ="Total Meetings -" + event.data.length;
            listElement.appendChild(meetingsCount);
            event.data.forEach(function (e) {
              var listItem = document.createElement('li');
              listItem.textContent = e.zoom_time;
              listElement.appendChild(listItem);
            });
          }
        }
      });

    }


    );
  </script>
</body>

</html>
