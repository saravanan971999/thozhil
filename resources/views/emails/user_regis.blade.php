<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Welcome to Thozhil Internships & Jobs</title> --}}
</head>
<body>
    <h1>Welcome to Thozhil Internships & Jobs {{ ucwords($new_user['name']) }}</h1>

    <p>
        Dear {{ ucwords($new_user['name']) }}
    </p>
    <p>
Congratulations! Your payment on Thozhil Internships & Jobs  has been successfully processed. We appreciate your commitment to unlocking the full potential of our platform.
    </p>
    <p>
        <a href="{{ url('login', ['email' => $new_user['email'], 'token' => $new_user['token']]) }}">
            Click here to verify and explore your dreams
        </a>
    </p>
</body>
</html>
