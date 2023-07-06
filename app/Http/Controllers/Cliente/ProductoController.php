<?php

namespace App\Http\Controllers\Cliente;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\Producto;

class ProductoController extends Controller
{
    function Productos(Request $request){
        $productos=Producto::where('id_usuario',GetIdUsuario())->get();
        return view('cliente.productos.productos');
    }
}
