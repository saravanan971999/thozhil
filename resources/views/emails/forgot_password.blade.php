<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Thozhil Internships & Jobs</title>
</head>
<body>
    <h2>Dear {{ucwords($ema['name'])}},</h2>

You've requested a password reset for your Thozhil account. Your One-Time Password (OTP) to reset your password is: <strong>{{$ema['otp']}}</strong>.
<br><br>
Please use this OTP to reset your password. If you didn't request this password reset, please ignore this message.
<br><br>
Should you require any additional support, don't hesitate to contact our support team at <a href="mailto:info@thozhil.co.in">info@thozhil.co.in</a> or call us at <a href="tel:+91">+91 6379572800</a>.
<br><br>
Best regards, <br>
Thozhil Support Team
</body>
</html>