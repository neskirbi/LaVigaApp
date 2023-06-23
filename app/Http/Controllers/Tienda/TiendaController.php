<?php

namespace App\Http\Controllers\Tienda;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tienda;

class TiendaController extends Controller
{
    function index(){
       
        return view('tienda.tiendas.tiendas');
    }
}
