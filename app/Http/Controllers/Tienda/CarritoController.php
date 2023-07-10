<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Carrito;
use App\Models\Tienda;
use App\Models\Codigo;
use Redirect;

class CarritoController extends Controller
{

    
    public function __construct(){
        $this->middleware('tiendaislogged');
    }

    function index(){
        $productos = Carrito::select('id','cantidad','id_producto',
        DB::RAW("(select categoria from categorias where id=(select id_categoria from productos where id=carritos.id_producto)) as categoria"),
        DB::RAW("(select producto from productos where id=carritos.id_producto) as producto"),
        DB::RAW("(select descripcion from productos where id=carritos.id_producto) as descripcion"),
            DB::RAW("(select precio from productos where id=carritos.id_producto) as precio")            
        )->where('id_tienda',GetId())->get();
        return view('tienda.carrito.carrito',['productos'=>$productos]);
    }


    function ValidarCodigo(Request $request){
        if(Codigo::where('codigo',$request->codigo)->first()){
            return Redirect::back()->with('success', '¡Pedido realizado!');
        }else{
            return Redirect::back()->with('error', '¡Error de codigo, por favor verificar el código!');
        }
    }
}
