<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function login(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            
            $response = [
                'displayName' => $user->name,
                'userId' => $user->id,
                'token' => $user->createToken('MyApp')->accessToken,
                'message' => "Aceeso Concedido"
            ];

            return response()->json($response, 200);
        }
        else{
            $response = [
                'displayName' => '',
                'userId' => 0,
                'token' => '',
                'message' => "Usuario no Encontrado!!"
            ];
            return response()->json($response, 200);
        }
    }

    public function salir(){
        if(Auth::check()){
            Auth::user()->token()->revoke();
            return "Sesión cerrada 🙂";
        }
    }
}
