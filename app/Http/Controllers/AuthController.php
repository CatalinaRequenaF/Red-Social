<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //

    //Login
    public function register(RegisterRequest $request){
        //Realizamos validacion (Está llamando a Requests/RegisterRequest)
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


    public function login(Request $request){
        //Del usuario que quiere acceder, sólo pide email y contraseña
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()->json(['message'=> 'Unauthorized'], 401);
        }

        //Verifica que el email existe
        $user = User::where('email', $request ['email'])->firstOrFail();
        
        //Creamos token
        $token=$user->createToken('auth_token')->plainTextToken;

        //Si no coincide la psswd  no existe el mail -> Unauthorized
        return response()->json([
            'message'=> 'Hola, '.$user->name,
            'accessToken'=>$token,
            'token_type'=>'Bearer',
            'user'=>$user
        ]);
    }

    public function logout()
    {
        $user = request()->user();
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return ['message' => 'You have succesfully logged out and the token was succesfully deleted.'];
    }
}
