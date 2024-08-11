<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Offer letter</title>
</head>
<body>
    <h2>Hello {{ucwords($new_user['name'])}},</h2>

    @if ($new_user['type'] == 1)
        <p>Congratulations once again! We are delighted to extend the official offer for the job position of {{ucwords($new_user['title'])}} at {{ucwords($new_user['company_name'])}}. Your journey with us is about to begin.</p>
    @else
        <p>Congratulations once again! We are delighted to extend the official offer for the internship position of {{ucwords($new_user['title'])}} at {{ucwords($new_user['company_name'])}}. Your journey with us is about to begin.</p>
    @endif

    <p>Keep an eye on your inbox for an official offer letter from our esteemed company. This is just the beginning of an incredible chapter in your career.</p>

    <h3>Offer Letter Details :</h3>
    <strong>Position :</strong>{{ucwords($new_user['title'])}} <br>
    <strong>Company :</strong>{{ucwords($new_user['company_name'])}} <br>
    <strong>Offer Letter Issuing Date :</strong>{{date('jS M Y', strtotime($new_user['date']))}} <br><br>
    <strong>Next Steps :</strong>
    <ul>
        <li>Keep an eye on your inbox for details regarding your joining date.</li>
        <li>If you have any queries or need additional information, feel free to get in touch.</li>
        <li>We're looking forward to having you on our team!</li>
    </ul>
    <p>Wishing you all the success and fulfillment in your future endeavors. Here's to reaching new heights together!</p>
    <br>

    Warm regards,
    <br>
    {{ucwords($new_user['company_name'])}}

</body>
</html>
