<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;

class productosController extends Controller
{
    public function listar_productos(Request $request){
        return productos::where('descripcion','like',$request->palabra)->get();
        
        //$productos = productos::all();

        //return $productos;
    }

    public function guarda_producto(Request $request){

        if($request->id == 0){
            $producto = new productos();
        }else{
            $producto = productos::find($request->id);
        }

        $producto->codigo = $request->codigo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;

        $producto ->save();

        return response()->json($producto,200);
        //return response()->json(['codigo'=>'Guardado :slight_smile:'],200);
    }

    public function borra_producto(Request $request){
        
        $producto = productos::find($request->id);

        $producto->delete();

        return response()->json(["Eliminado"],200);
    }
}
