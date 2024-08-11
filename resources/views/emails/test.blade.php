<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Hello {{ucwords($details['name'])}},</h2>
    <p>Congratulations! You've been allocated for the MCP(Multiple Choice Questions) Assessment as part of your evaluation process.</p>

    <h3>Test Details:-</h3>

    <strong>Title:</strong> {{ucwords($details['title'])}} <br>
    <strong>Test Type:</strong> MCP Question Assessment  <br>
    <strong>Scheduled Date:</strong> {{$details['datetime']}} <br>
    <strong>Duration:</strong> {{$details['duration']}}minutes <br>
    <h3>Instructions:</h3>
<ul>
    <li>Access the test portal using the link provided below.</li>
    <li>Complete the assessment within the specified time frame.</li>
    <li> Ensure a stable internet connection during the test.</li>
</ul>



    <br>

    <p><strong>Test Portal Link:</strong> <a href="{{url('candidate/application_profile/'.$details['app_id'])}}">View</a></p>
    <br>
    Feel free to reach out if you have any questions. Best of luck!
    <br>
    Warm regards,
    <br>
    {{ucwords($details['company_name'])}}




</body>
</html>
