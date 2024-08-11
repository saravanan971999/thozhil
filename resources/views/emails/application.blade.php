<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>Your application for {{}} has been submitted</title> --}}
</head>
<body>
    <h2>Hello {{ucwords($details['name'])}},</h2>
@if ($details['type'] == 1)
    This is to confirm that your job application has been received. The {{ucwords($details['company'])}} team will review your application, and you will be notified of any further steps.
    <br>
    <br>
    Thank you for applying through thozhil platform.
    <br>
    <br>
    Best wishes,<br>
    Thozhil

@else
    Exciting news! Your internship application has landed safely in our inbox. Your journey with the thozhil platform  is now in motion!
    <br>
    Stay tuned as the {{ucwords($details['company'])}} team gears up to review your application and explore potential opportunities together.
    <br>
    <br>
    Cheers to new beginnings!
    <br>
    Thozhil Team

@endif


</body>
</html>
