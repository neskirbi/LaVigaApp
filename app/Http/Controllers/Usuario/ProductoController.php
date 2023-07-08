<?php

namespace App\Http\Controllers\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;
use App\Models\Producto;

use Redirect;


class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('usuarioislogged');
    }

    function index(Request $request){

        $productos=Producto::select('id',
        DB::RAW('(select categoria from categorias where id=productos.id_categoria) as categoria'),'producto'
        ,'descripcion','precio')->where('id_usuario',GetId())
        ->orderby('producto','asc')
        ->get();
       
       
        return view('usuario.productos.productos',['productos'=>$productos]);
    }

    function create(){
        $categorias=Categoria::all();
        return view('usuario.productos.create',['categorias'=>$categorias]);
    }

    function store(Request $request){
        
        //return $request;
        $producto = new Producto();

        $producto->id = GetUuid();
        $producto->id_usuario = GetId();
        $producto->id_categoria = $request->categoria;
        $producto->producto = $request->producto;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;

        if(!GuardarArchivos($request->foto,'/assets/images/fotos/',$producto->id.'.jpg')){
            return Redirect::back()->with('error', '¡Error al cargar la foto!');
        }

        if($producto->save()){
            return redirect('productosv')->with('success', '¡Registro correcto!');
        }else{
            return Redirect::back()->with('error', '¡Error de registro!');
        }

    }

    function show($id){
        $producto = Producto::find($id);
        $categorias=Categoria::all();
        $categoria=Categoria::where('id',$producto->id_categoria)->first();
        return view('usuario.productos.show',['producto'=>$producto,'categorias'=>$categorias,'categoria'=>$categoria]);
    }

    function update(Request $request,$id){
        $producto = Producto::find($id);

        $producto->id_categoria = $request->categoria;
        $producto->producto = $request->producto;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;

        if(isset($request->foto)){
            if(!GuardarArchivos($request->foto,'/assets/images/fotos/',$producto->id.'.jpg')){
                return Redirect::back()->with('error', '¡Error al cargar la foto!');
            }
        }

        if($producto->save()){
            return Redirect::back()->with('success', '¡Registro correcto!');
        }else{
            return Redirect::back()->with('error', '¡Error de registro!');
        }

    }

    function destroy($id){
        $producto = Producto::find($id);
        
        $categoria=Categoria::where('id',$producto->id_categoria)->first();
        return view('usuario.productos.destroy',['producto'=>$producto,'categoria'=>$categoria]);
    }

    function EliminarProducto($id){
        $producto = Producto::find($id);
        
        if($producto->delete()){
            return redirect('productosv')->with('success', '¡Registro borrado!');
        }else{
            return redirect('productosv')->with('error', '¡Error al borrar!');
        }

    }

}
