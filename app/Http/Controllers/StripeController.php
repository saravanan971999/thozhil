<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleMail;
use App\Mail\UserRegistrationMail;
use Illuminate\Support\Facades\Session;

class StripeController extends Controller
{
    public function checkout()
    {
        return view('checkout');
    }

    public function session(Request $request)
    {
        \Stripe\Stripe::setApiKey(config('stripe.sk'));
        $productname = "Your Product Name"; // Provide a default value or fetch it from the form
        $totalprice = 1000; // Provide a default value or fetch it from the form
        session(['total_amt'=>$totalprice]);
        // $userFullName = session('userFullName');
    $userEmail = session('userEmail');
        // Format total amount in cents (Stripe requires the amount in cents)
        $total = $totalprice * 100;

        $session = \Stripe\Checkout\Session::create([
            'line_items'  => [
                [
                    'price_data' => [
                        'currency'     => 'INR',
                        'product_data' => [
                            "name" => $productname,
                        ],
                        'unit_amount'  => $total,
                    ],
                    'quantity'   => 1,
                ],
            ],
            'mode'        => 'payment',
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
            'payment_method_types' => ['card'],
            'billing_address_collection' => 'required',
            'shipping_address_collection' => [
                'allowed_countries' => ['IN'],
            ],
            'customer_email' => $userEmail
        ]);

        return redirect()->away($session->url);
    }

    public function success()
    {
        // dd(session('total_amt'),session('instant_id'));
        DB::table('student')->where('student_id', session('instant_id'))
            ->update(['payment_amount'=>session('total_amt'),'payment_status'=>1]);
        $user = DB::table('student')->where('student_id', session('instant_id'))->first();
        $new_user = [];
        $new_user['name'] = $user->full_name;
        $new_user['email'] =  $user->email;
        $new_user['token'] =  $user->token;
        Mail::to($new_user['email'])->send(new UserRegistrationMail($new_user));
        Session::flush();
        return redirect('/login_register')->with('Success', 'Confirmation mail had been sent!');
    }
}
