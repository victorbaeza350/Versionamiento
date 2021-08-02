<?php

namespace App\Http\Controllers;

use App\Models\clientes;
use Illuminate\Http\Request;

class clientesController extends Controller
{
    public function listar_clientes(){
        $clientes = clientes::all();

        return $clientes;
    }

    public function guarda_clientes(Request $request){

        if($request->id == 0){
            $clientes = new clientes();
        }else{
            $clientes = clientes::find($request->id);
        }

        $clientes->nombre = $request->nombre ;
        $clientes->telefono = $request->telefono ;
        $clientes->correo = $request->correo ;

        $clientes ->save();

        return response()->json($clientes,200);
        //return response()->json(['codigo'=>'Guardado :slight_smile:'],200);
    }

    public function borra_clientes(Request $request){
        
        $clientes = clientes::find($request->id);

        $clientes->delete();

        return response()->json(["Eliminado"],200);
    }
}
