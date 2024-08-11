<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Joining date letter</title>
</head>
<body>
    <h2>Hello {{ucwords($new_user['name'])}},</h2>

    @if ($new_user['type'] == 1)
        <p>Exciting times ahead! We are pleased to inform you of your upcoming joining date for the job position of {{ucwords($new_user['title'])}} at {{ucwords($new_user['company_name'])}}.</p>
    @else
        <p>Exciting times ahead! We are pleased to inform you of your upcoming joining date for the internship position of {{ucwords($new_user['title'])}} at {{ucwords($new_user['company_name'])}}.</p>
    @endif

    <h3>Joining Details :</h3>
    <strong>Position :</strong>{{ucwords($new_user['title'])}} <br>
    <strong>Company :</strong>{{ucwords($new_user['company_name'])}} <br>
    <strong>Joining Date :</strong>{{date('jS M Y', strtotime($new_user['date']))}} <br><br>
    <strong>Next Steps :</strong>
    <ul>
        <li>Prepare for a fulfilling journey with {{ucwords($new_user['company_name'])}}.</li>
        <li>If you have any last-minute questions or need assistance, don't hesitate to reach out. We eagerly anticipate your arrival!</li>
    </ul>

    <p>Wishing you all the success and fulfillment in your future endeavors. Here's to reaching new heights together!</p>

    <br>

    Warm regards,
    <br>
    {{ucwords($new_user['company_name'])}}
</body>
</html>
