<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test missed</title>
</head>
<body>
    <h1> missed test for {{ $new_user['title'] }}  </h1>
    <p>
        {{-- <a href="{{ url('login', ['email' => $new_user['email'], 'token' => $new_user['token']]) }}">
            Click here to verify and explore your dreams
        </a> --}}
        {{ $new_user['test'] }}
    </p>
</body>
</html>
