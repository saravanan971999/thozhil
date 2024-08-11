<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Approval for your application</title>
</head>
<body>

    <h2> Hello {{ ucwords($details['name'])}},</h2>

    @if ($details['type'] == 1)
        <p>Fantastic news! Your application for the Job post {{ucwords($details['title'])}} has been shortlisted.</p>
    @else
        <p>Exciting news! Your application for the Internship post {{ucwords($details['title'])}} has been shortlisted.</p>
    @endif


    <h3>Application Details:</h3>
<strong>Position:</strong> {{ucwords($details['title'])}} <br>
<br>
<strong>Next Steps:</strong>
<ul>
    <li>Watch your inbox for upcoming onboarding details.</li>
    <li>Get ready to embark on an exciting journey with {{ucwords($details['company_name'])}}.</li>
    <li>Feel free to reach out if you have any questions.</li>
</ul>

<br>



Cheers to your success!
<br>
Best regards,
<br>
{{ucwords($details['company_name'])}} HR Team

</body>
</html>
