<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;



class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'username' => 'required|email:rfc,dns',
            'password' => 'required|max:30',
        ]);

            $credentials = $request->only('username', 'password');

            $emailResult = DB::table('student')
                ->select('email')
                ->where('email', '=', $credentials['username'])
                ->first();

            $email = DB::table('employer')
                ->select('email')
                ->where('email', '=', $credentials['username'])
                ->first();

                if ($emailResult) {
                    $user = DB::table('student')
                        ->select('*')
                        ->where('email', '=', $credentials['username'])
                        ->first();
                    if($user->payment_status == 1){
                        if ($user && Hash::check($credentials['password'], $user->password)) {
                            session(['user_id' => $user->student_id,'full_name' => $user->full_name ]);
                            if($user->registered == 0){
                                return redirect('/student_register');
                            }
                            return redirect('/candidate/');
                        }
                        return redirect('/login_register')->with(['error' => 'Invalid password']);
                    }
                    else{
                        return redirect('/payment'); // Redirect to the payment page if payment is not done
                    }
                }
                elseif ($email) {
                    $user = DB::table('employer')
                    ->select('*')
                    ->where('email', '=', $credentials['username'])
                    ->first();

if ($user && Hash::check($credentials['password'], $user->password)) {

                        if($user->employer_id != 24){
                            if($user->registered == 0){
                                // session(['employer_id' => $user->employer_id,'full_name' => $user->full_name ]);
                                $details=[];
                                $details['id']=$user->employer_id;
                                $details['email']=$user->email;
                                // return view('company.employerregister',["details"=>$details]);
                                return redirect('employer_register')->with(["id"=>$details]);
                            }
                            else{
                                if($user->admin_verify == 1){
                                    if($user->verification== 1){
                                        session(['employer_id' => $user->employer_id,'full_name' => $user->full_name, 'company_logo' => $user->company_logo ]);
                                        return redirect('/employer/');
                                        // return session('company_logo');
                                    }
                                    else{
                                        return redirect('/login_register')->with(['error' => 'Your account has not yet verified by you']);
                                    }
                                }
                                else{
                                    return redirect('/login_register')->with(['error' => 'Your account has not yet verified by admin']);
                                }
                            }
                        }
                        else{
                            session(['employer_id' => $user->employer_id,'full_name' => $user->full_name ]);
                            return redirect('/admin2/');
                        }


                    }
                    return redirect('/login_register')->with(['error' => 'Invalid password']);
                }
                 else {
                    return redirect('/login_register')->with(['error' => 'Invalid mail']);
                }
            // return $emailId;



    }

    public function index($email,$token){
        $emailResult = DB::table('student')
            ->select('email')
            ->where('email', '=', $email)
            ->first();

        $ema = DB::table('employer')
            ->select('email')
            ->where('email', '=', $email)
            ->first();

        $emailR = DB::table('colleges_list')
            ->select('email')
            ->where('email', '=', $email)
            ->first();

        // $currentDate = now()->toDateString();
        // Replace with your actual initial date
        // Calculate the difference in days
        // $daysDifference = $currentDate->diffInDays($firstDate);

        if ($emailResult) {
                $user = DB::table('student')
                    ->select('*')
                    ->where('email', '=', $email)
                    ->first();
                    $firstDate = Carbon::parse($user->token_date);
                    $currentDate = now();
                    $daysDifference = $currentDate->diffInDays($firstDate);

                    if ($daysDifference > 30) {
                        return redirect('/')->with(['error' => 'The link was expired']);
                    }
                    else {
                        if($user->verification == 0){
                            if ($user->token == $token ) {
                                session(['user_id' => $user->student_id,'full_name' => $user->full_name ]);
                                DB::table('student')->where('student_id', $user->student_id)->update(['verification' => 1]);
                                if($user->registered ==0 ){
                                    return redirect('/student_register');
                                }

                                return redirect('/candidate/');
                            }
                            else{
                                return redirect('/')->with(['error' => 'Check the address']);
                            }
                        }
                        else{
                            return redirect('/')->with(['error' => 'Your account had already verified']);
                        }
                    }
            }
            elseif ($ema) {
                $user = DB::table('employer')
                    ->select('*')
                    ->where('email', '=', $email)
                    ->first();
                    $firstDate = Carbon::parse($user->token_date);
                    $currentDate = now();
                    $daysDifference = $currentDate->diffInDays($firstDate);

                    if ($daysDifference > 30) {
                        return redirect('/')->with(['error' => 'The link was expired']);
                    }
                    else {
                        if($user->token == $token){
                            if ($user->registered == 0) {

                                $details=[];
                                $details['id']=$user->employer_id;
                                $details['email']=$user->email;
                                return redirect('employer_register')->with(["id"=>$details]);
                                // return $details;
                            }
                            else{
                                return redirect('/')->with(['error' => 'Your account had already registered and pending for admin approval']);
                            }
                            // else{
                                // if($user->admin_verify == 0){
                                //     return redirect('/')->with(['error' => 'Your account had already verified by admin']);
                                // }

                                // if( $user->verification == 0){
                                //     return redirect('/')->with(['error' => 'Your account had already verified by you']);
                                // }


                            // }

                            //     DB::table('employer')->where('employer_id', $user->employer_id)->update(['verification' => 1]);


                                    // session(['employer_id' => $user->employer_id,'full_name' => $user->full_name ]);

                                // }

                                // return redirect('/employer_register');
                        }
                        else{
                            return redirect('/')->with(['error' => 'Check the address']);

                        }
                    }
                // return redirect('/login')->with(['error' => 'Invalid password']);
            } elseif ($emailR) {
                return "college";
            } else {
                return "NO RECORDS FOUND";
            }
    }


    public function login_candidate($email,$id){
        $emailResult = DB::table('student')
            ->where('email', '=', $email)
            ->first();

        if($emailResult){
            if($emailResult->payment_status != 1){
                session(['instant_id'=>$id,'userEmail'=> $email]);
                return redirect('payment');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/')->with('error','Email not found');
        }
    }
}
