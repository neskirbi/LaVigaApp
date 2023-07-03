<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Redirect;


class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('usuarioislogged');
    }

    function index(Request $request){

        $productos=Producto::where('id_usuario',GetId())->get();
       
        return view('usuario.productos.productos',['productos'=>$productos]);
    }

    function create(){
        return view('usuario.productos.create');
    }

    function store(Request $request){
        $producto = new Producto();

        $producto->id = GetUuid();
        $producto->id_usuario = GetId();
        $producto->categoria = $request->categoria;
        $producto->producto = $request->producto;
        $producto->descripcion = $request->descripcion;

        if($producto->save()){
            return redirect('productos')->with('success', '¡Registro correcto!');
        }else{
            return Redirect::back()->with('error', '¡Error de registro!');
        }

    }

    function show($id){
        $producto = Producto::find($id);
        return view('usuario.productos.show',['producto'=>$producto]);
    }

    function update(Request $request,$id){
        $producto = Producto::find($id);

        $producto->categoria = $request->categoria;
        $producto->producto = $request->producto;
        $producto->descripcion = $request->descripcion;

        if($producto->save()){
            return Redirect::back()->with('success', '¡Registro correcto!');
        }else{
            return Redirect::back()->with('error', '¡Error de registro!');
        }

    }

    function destroy($id){
        $producto = Producto::find($id);
        return view('usuario.productos.destroy',['producto'=>$producto]);
    }

    function EliminarProducto($id){
        $producto = Producto::find($id);
        
        if($producto->delete()){
            return redirect('productos')->with('success', '¡Registro borrado!');
        }else{
            return redirect('productos')->with('error', '¡Error al borrar!');
        }

    }

}
