<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Thozhil Internships & Jobs</title>
</head>
<body>
    {{-- <h1>{{ $new_user['name'] }} for Thozhil Internships & Jobs </h1>
    <p>
        <a href="{{ url('login_candidate', ['email' => $new_user['email'], 'id' => $new_user['id']]) }}">
            Click here to
        </a>
        {{ $new_user['id'] }}
        {{ $new_user['name'] }}
    </p> --}}
    <h1>Dear {{ ucwords($new_user['name']) }},</h1>
<p>
Great news! Your email has been successfully verified. You're now one step closer to diving into the world of jobs and internships. To embark on this exciting journey, simply follow the next step:
</p>

<h3>Click Payment Option:</h3>
<p>
Visit the payment page by clicking on the link below and take the leap into a realm of new opportunities:
<a href="{{ url('login_candidate', ['email' => $new_user['email'], 'id' => $new_user['id']]) }}">
    here
</a>
</p>

Upon completion, you'll gain full access to our platform, where you can explore and apply for jobs and internships tailored to your skills.

If you have any questions or need assistance, feel free to reach out to our support team at info@thozhil.co.in.</br>

We look forward to seeing you succeed in your career!</br>

Best regards,</br>

Thozhil
</body>
</html>
