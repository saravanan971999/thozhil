<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rejection for your application</title>
</head>
<body>
    <h2>Dear {{ucwords($details['name'])}},</h2>

    @if ($details['type'] == 1)
        We regret to inform you that your recent job application for the <strong>{{ucwords($details['title'])}}</strong> at <strong>{{ucwords($details['company_name'])}}</strong> has not been selected at this time.
    @else
        We regret to inform you that your recent internship application for the <strong>{{ucwords($details['title'])}}</strong> at <strong>{{ucwords($details['company_name'])}}</strong> has not been selected at this time.
    @endif
<br><br>
While we appreciate your interest, we've decided to pursue other options at this time.
<br><br>
Feel free to keep an eye out for future opportunities with us.
<br><br>
Thank you for your understanding.
<br><br>
Best regards,
<br>
{{ucwords($details['company_name'])}}
</body>
</html>
