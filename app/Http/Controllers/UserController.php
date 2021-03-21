<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{

    public function showViewLogin(Request $request)
    {
    }
    public function handleLogin(Request $request)
    {

        echo $request->email . "<br>";
        echo $request->password . "<br>";
        echo $request->remember . "<br>";
        $remember = true;
        if ($request->remember == true) {
            $remember = true;
        } else {
            $remember = false;
        }
        echo $remember;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            $inforuser = [
                "email" => $request->email,
                "password" => $request->password,
            ];
            //echo "Login successfully";
            //return view('home', ['response' => $response]);
            return redirect()->route('home');
        } else {
            echo "login failse";
        }
        //return "run in handle login<br>";
        //$credentials = $request->only('email', 'password');
        //echo $credentials;
    }
    public function handleLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
