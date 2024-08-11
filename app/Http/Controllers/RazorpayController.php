<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Payment;
use App\Mail\UserRegistrationMail;
use Razorpay\Api\Api;

class RazorpayController extends Controller
{
    public function razorpay(Request $request)
    {
        if(isset($request->razorpay_payment_id) && $request->razorpay_payment_id != '')
        {
            $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
            $payment = $api->payment->fetch($request->razorpay_payment_id);

            $response = $payment->capture(array('amount'=>$payment->amount));

            $paymentModel = new Payment();
            $paymentModel->payment_id = $response['id'];
            $paymentModel->product_name = $response['notes']['product_name'];
            $paymentModel->quantity = $response['notes']['quantity'];
            $paymentModel->amount = $response['amount']/100;
            session(['total_amt'=>$paymentModel->amount]);
            $userEmail = session('userEmail');
            $paymentModel->currency = $response['currency'];
            $paymentModel->customer_name = $response['notes']['customer_name'];
            $paymentModel->customer_email = $response['notes']['customer_email'];
            $paymentModel->payment_status = $response['status'];
            $paymentModel->payment_method = 'Razorpay';
            $paymentModel->save();

            return redirect()->route('success');
        } else {
            return redirect()->route('cancel');
        }
    }

    public function success()
    {
        DB::table('student')->where('student_id', session('instant_id'))
            ->update(['payment_amount' => session('total_amt'), 'payment_status' => 1,'verification'=>1]);
        $user = DB::table('student')->where('student_id', session('instant_id'))->first();
        // $new_user = [
        //     'name' => $user->full_name,
        //     'email' => $user->email,
        //     'token' => $user->token
        // ];
        // Mail::to($new_user['email'])->send(new UserRegistrationMail($new_user));
        session()->flush();
        return redirect('/login_register')->with('Success', 'Payment successfully done, login to continue');
    }

    public function cancel()
    {
        return "Payment failed";
    }
}
