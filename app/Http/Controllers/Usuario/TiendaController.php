<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tienda;
use Redirect;

class TiendaController extends Controller
{
    function index(){

        $tiendas=Tienda::where('id_usuario',GetId())->get();
       
        return view('usuario.tiendas.tiendas',['tiendas'=>$tiendas]);
    }

    function create(){
        return view('usuario.tiendas.create');
    }

    function store(Request $request){
        $tienda=new Tienda();
        $tienda->id = GetUuid(); 
        $tienda->tienda = $request->tienda;
        $tienda->id_usuario = GetId();
        $tienda->contacto = $request->contacto;
        $tienda->telefono = $request->telefono;
        $tienda->correo = $request->correo;
        if($tienda->save()){
            return redirect('tiendas')->with('success', '¡Registro correcto!');
        }else{
            return Redirect::back()->with('error', '¡Error de registro!');
        }
    }

    function show($id){
        $tienda=Tienda::find($id);
        return view('usuario.tiendas.show',['tienda'=>$tienda]);
    }

    function update(Request $request,$id){
        $tienda=Tienda::find($id);

        $tienda->tienda = $request->tienda;
        $tienda->contacto = $request->contacto;
        $tienda->telefono = $request->telefono;
        $tienda->correo = $request->correo;
        if($tienda->save()){
            return Redirect::back()->with('success', '¡Registro actualizado!');
        }else{
            return Redirect::back()->with('error', '¡Error de actualización!');
        }
    }
}
