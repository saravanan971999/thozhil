<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

    <h2>Dear {{ucwords($new_user['name'])}},</h2>

    Congratulations on embarking on your Thozhil journey!
<br><br>
To fully unlock the potential of our platform and discover exceptional talent, we invite you to complete your registration by filling out the form linked below:
<br>
<a href="{{ url('login', ['email' => $new_user['email'], 'token' => $new_user['token']]) }}">
    Click here
</a>
<br><br>
Rest assured, our dedicated support team is available round the clock to assist you every step of the way. Reach out to us at <a href="mailto:info@thozhil.co.in">info@thozhil.co.in</a> or dial <a href="tel:+91">+91 6379572800</a> for any assistance you may need.
<br><br>
Thank you for choosing <a href="https://thozhil.co.in">Thozhil</a> to elevate your talent acquisition efforts. We're excited to partner with you in finding the perfect candidates to drive your company's success.
<br><br>
Best regards,
<br>
Thozhil
</body>
</html>
