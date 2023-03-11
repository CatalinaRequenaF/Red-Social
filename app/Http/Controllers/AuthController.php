<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    //Login
    public function register(LoginRequest $request){
        //Realizamos validacion
        $validated=$request->validated();

        //Creamos usuario
        $user = User::create([
            'name'=> $request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);
        //Creamos su token
        $token = $user->createToken('auth_token')->plainTextToken;
        
        //Devolvemos respuesta json
        return response()->json(['data'=> $user,'access_token'=>$token, 'token_type'=> 'Bearer']);
    }
}
