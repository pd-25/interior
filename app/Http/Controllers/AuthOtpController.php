<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthOtpController extends Controller
{
    // Return View of OTP Login Page
    public function login()
    {
        return view('auth.otp-login');
    }

    // Generate OTP
    public function generate(Request $request)
    {

        // # Validate Data
        // $request->validate([
        //     'mobile_no' => 'required|exists:users,mobile_no'
        // ]);

        // # Generate An OTP
        // $verificationCode = $this->generateOtp($request->mobile_no);

        // $message = "Your OTP To Login is - ".$verificationCode->otp;
        // # Return With OTP

        // return redirect()->route('otp.verification', ['user_id' => $verificationCode->user_id])->with('success',  $message);


        $email = $request->email_or_mobileno;

        $emailPattern = '/^\w{2,}@\w{2,}\.\w{2,4}$/';
        $mobilePattern ="/^[7-9][0-9]{9}$/";
        $otp = rand(123456, 999999);
        if(preg_match($emailPattern, $email)){
            if (User::where('email', '=', $request->email_or_mobileno)->count() > 0) {
                User::where('email', $request->email_or_mobileno)
                ->update([
                    'password' => Hash::make($otp),
                    'otp' => $otp
                ]);
            }else{
                $user = new User();
                $user->email    = $request->email_or_mobileno;
                $user->password = Hash::make($otp);
                $user->otp      = $otp;
                $user->save();
            }
        } else if(preg_match($mobilePattern, $email)){
            if (User::Where('mobile_no','=',$request->email_or_mobileno)->count() > 0) {
                User::where('mobile_no', $request->email_or_mobileno)
                ->update([
                    'password' => Hash::make($otp),
                    'otp' => $otp
                ]);
            }else{
                $user = new User();
                $user->mobile_no = $request->email_or_mobileno;
                $user->password = Hash::make($otp);
                $user->otp = $otp;
                $user->save();
            }

             // Send user exists error response data
             $data = [
                'check' => 'success',
                'otp' => $otp
            ];

            // Return JSON response
            return response()->json($data);
        } else {
             // Send user exists error response data
             $data = [
                'check' => 'error',
                'message' => "Invalid entry.",
            ];

            // Return JSON response
            return response()->json($data);
        }
    }

    public function generateOtp($mobile_no)
    {
        $user = User::where('mobile_no', $mobile_no)->first();

        # User Does not Have Any Existing OTP
        $verificationCode = VerificationCode::where('user_id', $user->id)->latest()->first();

        $now = Carbon::now();

        if($verificationCode && $now->isBefore($verificationCode->expire_at)){
            return $verificationCode;
        }

        // Create a New OTP
        return VerificationCode::create([
            'user_id' => $user->id,
            'otp' => rand(123456, 999999),
            'expire_at' => Carbon::now()->addMinutes(10)
        ]);
    }

    public function verification(Request $request)
    {
        // return view('auth.otp-verification')->with([
        //     'user_id' => $user_id
        // ]);

        $email = $request->mobileoremail;
        $emailPattern = '/^\w{2,}@\w{2,}\.\w{2,4}$/';
        $mobilePattern ="/^[7-9][0-9]{9}$/";
        $otp = rand(123456, 999999);
        if(preg_match($emailPattern, $email)){
            if (User::where('email', '=', $request->mobileoremail)->count() > 0) {

            }
        } else {
            if (User::Where('mobile_no','=',$request->mobileoremail)->count() > 0) {
                    if(User::where('mobile_no','=',$request->mobileoremail)->where('otp','=',$request->otpnumber)->count() > 0){
                        $credentials = [
                            'mobile_no' => $request->mobileoremail,
                            'password' => $request->otpnumber,
                        ];

                        if (Auth::attempt($credentials)) {
                            //return redirect()->route('dashboard');
                            //echo "login success";
                            echo Auth::user()->type;
                        }
                    }else{
                        echo "Invalid OTP";
                    }
            }
        }


    }

    public function loginWithOtp(Request $request)
    {
        #Validation
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'otp' => 'required'
        ]);

        #Validation Logic
        $verificationCode   = VerificationCode::where('user_id', $request->user_id)->where('otp', $request->otp)->first();

        $now = Carbon::now();
        if (!$verificationCode) {
            return redirect()->back()->with('error', 'Your OTP is not correct');
        }elseif($verificationCode && $now->isAfter($verificationCode->expire_at)){
            return redirect()->route('otp.login')->with('error', 'Your OTP has been expired');
        }

        $user = User::whereId($request->user_id)->first();

        if($user){
            // Expire The OTP
            $verificationCode->update([
                'expire_at' => Carbon::now()
            ]);

            Auth::login($user);

            return redirect('/home');
        }

        return redirect()->route('otp.login')->with('error', 'Your Otp is not correct');
    }
}
