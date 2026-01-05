<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $request){
        $validated = $request->validate([
            'name'=>'required|max:50',
            'email'=>'required|email|max:175|unique:users',
            'password'=>'required|min:6'
        ]);
        $user = User::create($validated);
        return ResponseHelper::success("user created successfully",[
            'user'=>$user,
            'token'=>$user->createToken('Api Token')->plainTextToken
        ]);
    }
    function login(Request $request){
        $validated = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $user= User::where('email',$validated['email'])->first();
        if($user && Hash::check($validated['password'],$user->password)){
            return ResponseHelper::success("user log in successfully",[
                'user'=>$user,
                'token'=>$user->createToken('Api Token')->plainTextToken
            ]);
        }
        else{
            return ResponseHelper::error('invalid credential');
        }
    }
    function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return ResponseHelper::success("user logout successfully");
    }
}
