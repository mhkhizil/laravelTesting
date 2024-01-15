<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function login(Request $request){
        $incomingFields = $request->validate([
            'loginname' => ["required"],
           
            "loginpassword" => ["required", "min:5", "max:50"]
        ]);
        if (auth()->attempt(['name'=>$incomingFields['loginname'],"password"=>$incomingFields["loginpassword"]])) {
            $request->session()->regenerate();
        }
        return redirect("/");
    }
    public function logout()
    {
        auth()->logout();
        return redirect("/");
    }
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ["required"],
            'email' => ["email"],
            "password" => ["required", "min:5", "max:50"]
        ]);
        $incomingFields["password"] = bcrypt($incomingFields["password"]);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect("/");
    }
}