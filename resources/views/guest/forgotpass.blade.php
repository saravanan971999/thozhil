<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(session('Success'))
        <div class="alert alert-success">
            {{ session('Success') }}
        </div>
    @endif


        <input type="email" name="email" id="">
        <input type="submit" value="submit">


    <form action="{{ url('otp') }}" id="OTP" method="post" style="display: none;">
        @csrf
        <input type="text" name="otp" id="">
        <input type="submit" value="submit">
    </form>

    <script>
        document.getElementById('PPP').addEventListener('submit', function (event) {
            fetch('forpass')
                .then(response => {
                    // Check if the request was successful (status code 200)
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }

                    // Parse the response JSON
                    log(response.json());
                })
                .then(data => {
                    // Handle the data
                    console.log(data);

                    // You can update your UI or perform other actions here
                })
                .catch(error => {
                    // Handle errors
                    console.error('Fetch error:', error);
                });

            // Enable the OTP form
            document.getElementById('OTP').style.display = 'block';

            // Submit the OTP form programmatically
            // document.getElementById('OTP').submit();
        });
    </script>
</body>
</html>
