<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginPage() 
    {
       return view('login');
    }

    public function registrationPage() 
    {
        return view('registration');

    }

    public function registration(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email'           => 'required|string|email|max:255',
            'password'        => 'required|string|min:8',
            'name'            => 'required|string',
            'department_id'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/')->with(['msg' => $validator->errors()]);
        }

        $user                  = new User();
        $user->name            = $request->name;
        $user->email           = $request->email;
        $user->department_id   = $request->department_id;
        $user->password        = Hash::make($request->password);
        $user->save();

        return redirect('/')->with(['success_msg' => "Registration successful !"]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            return redirect('/')->with(['msg' => 'login failed !']);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect('/')->with(['msg' => 'Invalid Credentials!']);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        return redirect('dashboard')->with(['msg' => 'login successful !']);
    }

    public function dashboard()
    {
        return view('welcome');
    }

    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect('/');
    }
}
