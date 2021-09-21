<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerPage(){
        return view("Auth.registerPage");
    }

    public function registerFunc(Request $request){
        //implement register
        
      

        $this->validate($request,[
            "username"=>"required|unique:users",
            "email"=>"required|unique:users",
            "pass"=>"required|confirmed"
        ]);
        User::create([
            "username"=>$request->username,
            "email"=>$request->email,
            "picture"=>$request->file("image")->store("Images"),
            "password"=>Hash::make($request->pass),
        ]);
        
         Auth::attempt(['email' => $request->email, 'password' => $request->pass]);
         return redirect()->route("home");

    }

    public function loginPage(){
        return view("Auth.loginPage");
    }

    public function loginFunc(Request $request){
       if(!Auth::attempt(['email' => $request->email, 'password' => $request->pass])){
        return back()->with("status","Login failed");
       }    
       return redirect()->route("home");
    }

    public function logoutFunc(){
        auth()->logout();
        return back();
    }
}
