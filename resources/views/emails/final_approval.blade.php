<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Thozhil Internships & Jobs</title>
</head>
<body>
    <h2>Hello {{ucwords($new_user['name'])}},</h2>
@if ($new_user['type'] == 1)
    <p>We are thrilled to announce that you have been selected for the job of {{ucwords($new_user['title'])}} at {{ucwords($new_user['company_name'])}}. Your skills and knowledge truly stood out, and we believe you'll make a valuable addition to our team.
    </p>
@else
    <p>We are thrilled to announce that you have been selected for the internship of {{ucwords($new_user['title'])}} at {{ucwords($new_user['company_name'])}}. Your skills and knowledge truly stood out, and we believe you'll make a valuable addition to our team.
    </p>
@endif

    <h3>Selection Details:</h3>
    <strong>Position :</strong>{{ucwords($new_user['title'])}} <br>
    <strong>Company : </strong>{{ucwords($new_user['company_name'])}} <br>
    <strong>Next Steps :</strong> Look out for an email containing your offer letter details.
    Should you have any questions or require further information, feel free to reach out. We're excited to welcome you aboard!
    <br><br>
    Best regards,
    <br>
    {{ucwords($new_user['company_name'])}}

</body>
</html>
