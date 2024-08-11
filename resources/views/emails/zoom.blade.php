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

Exciting news! Your face-to-face interview has been scheduled via Zoom.
<br>
<br>
<h3>Interview Details:</h3>

<strong>Date:</strong> {{$details['datetime']}} <br>
<strong>Zoom Meeting Link:</strong> <a href="{{$details['zoom']}}">Link</a> <br>

<h3>Interview Agenda:</h3>
<ol>
    <li>Introduction and Overview</li>
    <li>Discussion of Your Experience</li>
    <li>Q&A Session</li>
    <li><strong>Instructions:</strong></li>
    <ul>
        <li>Click on the Zoom Meeting Link at the scheduled time.</li>
        <li>Ensure your video and audio are enabled.</li>
        <li>Dress professionally and find a quiet, well-lit space.</li>
        <li>We look forward to getting to know you better. If you have any questions, feel free to reach out.</li>
    </ul>
</ol>



<br><br>
Best regards, <br>
{{ucwords($details['company_name'])}} HR Team

</body>
</html>
