<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Message</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e6e6e6;
        }

        .card {
            max-width: 450px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-top: 200px;
            height: 230px;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            color: #555;
            text-align: center;
            margin-bottom: 30px;
        }

        .checkout-btn {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .checkout-btn:hover {
            background-color: #2980b9; /* Darker shade on hover */
        }

        @media (max-width: 768px) {
            .card {
                margin: 20px auto;
            }
        }
    </style>
</head>
<body>
@include('layouts.alert')
<div class="card">
    <h1>Secure Payment</h1>
    <p>To access the full features of this website, a payment of Rs. 1000 is required.</p>

    <form action="/session" method="POST">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <button class="checkout-btn" type="submit"><i class="fa fa-money"></i> Proceed to Checkout</button>
    </form>
</div>

</body>
</html>
