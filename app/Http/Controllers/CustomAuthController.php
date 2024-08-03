<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('Signed in');
        }
        return redirect("login")->withSuccess('Login details are not valid');
    }
    public function registration()
    {
        return view('auth.register');
    }
    public function customRegistration(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        // ]);
        // $data = $request->all();
        // $check = $this->create($data);
        // return redirect("dashboard")->withSuccess('You have signed-in');

        if (User::where('mobile_no', $request->input('mobile_no'))->where('otp',$request->input('otp'))->exists()) {
            $userid = User::where('mobile_no', $request->input('mobile_no'))->first();
            $user = User::find($userid->id);

            if(!empty($user->email)){
                // Send success response data
                $data = [
                    'check' => 'success',
                    'message' => "We have found that you are already registered and your data was updated successfully.",
                ];
            }else{
                 // Send success response data
                 $data = [
                    'check' => 'success',
                    'message' => "You have been successfully registered with us.",
                ]; 
            }
            
            $user->name              = $request['name'];
            $user->email             = $request['email'];
            $user->mobile_no         = $request['mobile_no'];
            $user->country           = $request['country'];
            $user->city              = $request['city'];
            $user->pin              = $request['pin'];
            $user->occupation        = $request['occupation'];
            $user->save();

            // Return JSON response
            return response()->json($data);
        }else{
             // Send user exists error response data
             $data = [
                'check' => 'error',
                'message' => "You have already been registered with us, please login into your account.",
            ];

            // Return JSON response
            return response()->json($data);
        }
    }
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
