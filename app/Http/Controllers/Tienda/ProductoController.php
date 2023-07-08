<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use App\Models\Producto;

class ProductoController extends Controller
{
    function Productos(Request $request){

        $productos=Producto::select('id',
        DB::RAW('(select categoria from categorias where id=productos.id_categoria) as categoria'),
        'producto','descripcion','precio')
        ->where('id_usuario',GetIdUsuario())
        ->orderby('producto','asc')
        ->get();
        return view('tienda.productos.productos',['productos'=>$productos]);
    }
}
