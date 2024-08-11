<!DOCTYPE html>
<html>
<head>
  <title>Participants Table</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    iframe {
      width: 100%;
      height: 500px;
      border: 1px solid #ddd;
    }
  </style>
<script>
    function openMeeting(link) {
      document.getElementById('meetingFrame').src = link;
    }
  </script>
</head>
<body>

<h2>Participants Table</h2>

<table>
  <thead>
    <tr>
      <th>SI No</th>
      <th>Name</th>
      <th>Age</th>
      <th>Email</th>
      <th>Mobile No</th>
      <th>Set Date</th>
      <th>Set Time</th>
      <th>Meet Link</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>1</td>
      <td>John Doe</td>
      <td>30</td>
      <td>johndoe@example.com</td>
      <td>1234567890</td>
      <td>2023-12-20</td>
      <td>10:00 AM</td>
      <td><a href="javascript:void(0)" onclick="openMeeting('https://us04web.zoom.us/j/2477180089?prefer=1&pwd=MjF1WWdPM1htalJ0T25qV2RraXBoQT09&omn=76378103516')">Join Meeting</a></td>
    </tr>
    <tr>
      <td>2</td>
      <td>Jane Smith</td>
      <td>25</td>
      <td>janesmith@example.com</td>
      <td>9876543210</td>
      <td>2023-12-21</td>
      <td>11:30 AM</td>
      <td><a href="javascript:void(0)" onclick="openMeeting('https://us04web.zoom.us/j/2477180089?prefer=1&pwd=MjF1WWdPM1htalJ0T25qV2RraXBoQT09&omn=76378103516')">Join Meeting</a></td>
    </tr>

  </tbody>
</table>

<iframe id="meetingFrame"></iframe>

</body>
</html>
