<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your query has been submitted</title>
</head>
<body>
    <h1>{{ ucwords($details['name'])}}</h1>
    <p>{{$details['subject']}}</p>
    <p>{{$details['message']}}</p>

</body>
</html>
