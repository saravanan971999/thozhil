<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Mail\PasswordChangedMail;

class ForgotPasswordController extends Controller
{
    public function forgot_password($email){
        $ema=[];
        $ema['email'] = $email;
        $emailSTU = DB::table('student')->where('email', $ema['email'])->first();
        $emailEMP = DB::table('employer')->where('email', $ema['email'])->first();
        $randomNumber = random_int(100000, 999999);
        $ema['otp'] = $randomNumber;

        if($emailSTU){
            // Use update with an associative array
            DB::table('student')->where('email', $ema['email'])->update(['otp' => $randomNumber]);
            $ema['name'] = $emailSTU->full_name;
            Mail::to($ema['email'])->send(new ForgotPassword($ema));
            DB::table('student')->where('email', $ema['email'])->increment('email_received');

            return response()->json(['Success' => 'OTP sent successfully']);
        } else if($emailEMP){
            // Use update with an associative array
            DB::table('employer')->where('email', $ema['email'])->update(['otp' => $randomNumber]);
            $ema['name'] = $emailEMP->full_name;
            Mail::to($ema['email'])->send(new ForgotPassword($ema));
            return response()->json(['Success' => 'OTP sent successfully']);
        }
        else {
            return response()->json(['error' => 'Entered email does not exist']);
        }
    }

    public function otp($email , $otp){
        // return $email. ",". $otp;
        $emailll = $email;
        $otP = $otp;
        $emailSTU = DB::table('student')->select('*')->where('email', $emailll)->first();
        $emailEMP = DB::table('employer')->select('*')->where('email', $emailll)->first();

        if($emailSTU){
            // Use update with an associative array
            if($otP == $emailSTU->otp){
                return response()->json(['Success' => 'OTP has been verified']);
            }
            else{
                return response()->json(['error' => 'Entered OTP was wrong']);
            }
        }
        else if($emailEMP){
            if($otP == $emailEMP->otp){
                return response()->json(['Success' => 'OTP has been verified']);
            }
            else{
                return response()->json(['error' => 'Entered OTP was wrong']);
            }
        }
    }


public function reset(Request $request){
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $emailSTU = DB::table('student')->where('email', $email)->first();
        $emailEMP = DB::table('employer')->where('email', $email)->first();

        if($emailSTU){
            if (Hash::check($request->input('password'), $emailSTU->password)) {
                return redirect()->back()->with('error', 'New password and old password must not be the same');
            }
            DB::table('student')->where('email', $email)->update(['password'=>$password, 'otp'=>null]);
            $new_user =[];
            $new_user['name'] = $emailSTU->full_name;
            Mail::to($email)->send(new PasswordChangedMail($new_user));
            return redirect('/')->with('Success','Your password has been changed. Login to continue.');
        }
        elseif($emailEMP){
            if (Hash::check($request->input('password'), $emailEMP->password)) {
                return redirect()->back()->with('error', 'New password and old password must not be the same');
            }
            DB::table('employer')->where('email', $email)->update(['password'=>$password, 'otp'=>null]);
            $new_user =[];
            $new_user['name'] = $emailEMP->full_name;
            Mail::to($email)->send(new PasswordChangedMail($new_user));
            return redirect('/')->with('Success','Your password has been changed. Login to continue.');
        }
    }
}
