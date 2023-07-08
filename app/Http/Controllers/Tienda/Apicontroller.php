<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tienda;
use App\Models\Carrito;
use App\Models\Codigo;

class Apicontroller extends Controller
{
    function AddToCart(Request $request){
        //return $request;
        $tienda=Tienda::where('token',$request->token)->first();
        $carrito= new Carrito();
        $carrito->id = GetUuid();
        $carrito->id_tienda = $tienda->id; 
        $carrito->id_producto = $request->id_producto; 
        $carrito->cantidad=$request->cantidad;
        $carrito->save();

        return Carrito::where('id_tienda',$tienda->id)->count();

    }

    function SolicitarCodigo(Request $request){
        $codigo=new Codigo();
        $tienda=Tienda::where('token',$request->token)->first();
        $codigo->id = GetUuid();
        $codigo->id_tienda = $tienda->id;

        $number = rand(1,9999);
        $length = 4;
        $number = substr(str_repeat(0, $length).$number, - $length);


        $codigo->codigo = $number;

        $codigo->save();
        return $number;

    } 
}
