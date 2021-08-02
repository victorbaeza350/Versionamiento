<?php

namespace App\Http\Controllers;


use App\Models\usuarios;
use Illuminate\Http\Request;

class usuariosController extends Controller
{
    public function listar_usuarios(){
        $usuarios = usuarios::all();

        return $usuarios;
    }

    public function guarda_usuarios(Request $request){

        if($request->id == 0){
            $usuarios = new usuarios();
        }else{
            $usuarios = usuarios::find($request->id);
        }

        $usuarios->nombre = $request->nombre ;
        $usuarios->telefono = $request->telefono ;
        $usuarios->correo = $request->correo ;

        $usuarios ->save();

        return response()->json($usuarios,200);
        //return response()->json(['codigo'=>'Guardado :slight_smile:'],200);
    }

    public function borra_usuarios(Request $request){
        
        $usuarios = usuarios::find($request->id);

        $usuarios->delete();

        return response()->json(['code'=>'OK'],200);
    }
}
