<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rejection for your application</title>
</head>
<body>
    <h2>Dear {{ucwords($new_user['name'])}},</h2>

    We hope you're well.

    @if ($new_user['type'] == 1)
        Following your recent face-to-face interview for the job <strong>{{ucwords($new_user['title'])}}</strong> at <strong>{{ucwords($new_user['company_name'])}}</strong>, we regret to inform you that we won't be moving forward with your application at this time.
    @else
        Following your recent face-to-face interview for the internship <strong>{{ucwords($new_user['title'])}}</strong> at <strong>{{ucwords($new_user['company_name'])}}</strong>, we regret to inform you that we won't be moving forward with your application at this time.
    @endif
<br><br>
We appreciate your interest and the time you invested in the interview process.
<br><br>
Please don't be disheartened. Your skills are valuable, and we encourage you to keep exploring opportunities that align with your career goals.
<br><br>
Thank you for your understanding.
<br><br>
Sincerely,
<br>
{{ucwords($new_user['company_name'])}}
</body>
</html>
