<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function checkEmail(Request $request){
        $email = $request->input('email');
        $isExists = User::where('email',$email)->first();
        if($isExists){
            return response()->json(array("exists" => true));
        }else{
            return response()->json(array("exists" => false));
        }
    }
    public function register_post(Request $request)
    {
        // dd($request->all());
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:0,1', // Assuming 0 for Staff and 1 for Admin
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',

        ];

        // Validation messages


        // Validate the request data
        $validator = Validator::make($request->all(), $rules);

        // Check for validation failure
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, proceed with user creation
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(56);
        $user->role = trim($request->role);
        $user->phone = trim($request->phone);
        $user->address = trim($request->address);
        $user->save();

        return redirect()->back()->with('success', 'Registration successful.');
    }

    public function loadLogin()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }

        return view('welcome');
    }
    public function getlogin()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'string|required|email',
            'password' => 'string|required'
        ]);

        $userCredential = $request->only('email','password');
        if(Auth::attempt($userCredential)){

            $route = $this->redirectDash();
            return redirect($route);
        }
        else{
            return back()->with('error','Username & Password is incorrect');
        }
    }


    public function loadRegister()
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('register');
    }

    public function redirectDash()
    {
        $redirect = '';


        if(Auth::user() && Auth::user()->role == 1){
            $redirect = '/admin';
        }
        else if(Auth::user() && Auth::user()->role == 0){
            $redirect = '/home';
        }
        else  {

            $redirect = '/';
        }

        return $redirect;
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }


}
