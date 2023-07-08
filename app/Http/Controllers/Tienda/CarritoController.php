<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Carrito;

class CarritoController extends Controller
{
    function index(){
        $productos = Carrito::select('id','cantidad','id_producto',
        DB::RAW("(select categoria from categorias where id=(select id_categoria from productos where id=carritos.id_producto)) as categoria"),
        DB::RAW("(select producto from productos where id=carritos.id_producto) as producto"),
        DB::RAW("(select descripcion from productos where id=carritos.id_producto) as descripcion"),
            DB::RAW("(select precio from productos where id=carritos.id_producto) as precio")            
        )->where('id_tienda',GetId())->get();
        return view('tienda.carrito.carrito',['productos'=>$productos]);
    }
}
