<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        if(Auth::check()){
            return redirect()->route('index');
        }else{
            return view('login');
        }
        
    }

    public function register(){
        if(Auth::check()){
            return redirect()->route('index');
        }else{
            return view('register');
        }
    
    }

    public function proccessRegister(Request $request){

        $validator = Validator::make($request->all(),[
           "name" => 'required',
           "email" => 'required|email|unique:users',
           "password" => 'required|min:4',
           "confirm_password" => 'required|same:password',
        ]);

        if($validator->passes()){
            $user = new User();
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->route('show.login')->with('success','Registration successful!');
        }else{
            return redirect()->route('show.register')->withInput()->withErrors($validator);
        }  
    }

    public function proccessLogin(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => 'required|email',
            "password" => 'required'
        ]);

        if($validator->passes()){
            $credentials = [
                "email" => $request->input('email'),
                "password" => $request->input('password')
            ];
            if(Auth::attempt($credentials)){
                return redirect()->route('index');
            }else{
                return redirect()->route('show.login')->with('error','invalid email or passowrd');
            }

        }else{
            return redirect()->route('show.login')->withInput()->withErrors($validator);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('show.login')->with('success','You Logout successful.');
    }
    
}
