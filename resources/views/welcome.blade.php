<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Razorpay Integration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .card {
            max-width: 450px;
            margin: 20px;
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #343a40;
            font-size: 24px;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            font-size: 16px;
            margin-bottom: 30px;
        }

        form {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Secure Payment</h1>
        <p>To access the full features of this website, a payment of Rs. 1000 is required.</p>
        <form action="{{ route('razorpay') }}" method="post">
            @csrf
            <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ env('RAZORPAY_KEY_ID') }}"
            data-amount="100000"
            data-buttontext="Pay with Razorpay"
            data-image="https://uxwing.com/wp-content/themes/uxwing/download/brands-and-social-media/razorpay-icon.png"
            data-notes.customer_name=""
            data-notes.customer_email=""
            data-notes.product_name=""
            data-notes.quantity=""
            data-prefill.name=""
            ></script>
        </form>
    </div>

    <script>
        // Wait for the Razorpay button to be rendered
        $(document).ready(function() {
            // Set the background color, width, and other styles for the Razorpay button
            $('.razorpay-payment-button').css({
                'background-color': '#3498db',
                'width': '40%',
                'padding': '12px',
                'color': '#fff',
                'text-align': 'center',
                'text-decoration': 'none',
                'border': 'none',
                'border-radius': '8px',
                'cursor': 'pointer',
                'font-size': '18px',
                'transition': 'background-color 0.3s ease'
            });
        });
    </script>

</body>
</html>
