<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tienda;

use App\Models\Usuario;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Registro()
    {
        return view('login.registro');
    }

   
    public function GuardaUsuario(Request $request)
    {

        if($request->pass!=$request->pass2){
            return redirect('registro')->with('error','Las contraseñas no coinciden.');
        }
        if(Usuario::where('telefono',$request->telefono)->first()){
            return redirect('registro')->with('error','El teléfono ya se registró anteriormente, por favor igrese uno nuevo.');
        }
        if(Usuario::where('mail',$request->mail)->first()){
            return redirect('registro')->with('error','El correo ya se registró anteriormente, por favor igrese uno nuevo.');
        }

        $usuario=new Usuario();

        $usuario->id=GetUuid();
        $usuario->nombres=$request->nombres;
        $usuario->apellidos=$request->apellidos;
        
        $usuario->telefono=$request->telefono;
        $usuario->mail=$request->mail;
        $usuario->pass=$request->pass;

        $usuario->save();

        return redirect('home')->with('success','Registro Guardado.');
    }



    public function LoginPage()
    {
        return view('login.loginpage');
    }


    function Login(Request $request){

        $usuario = Usuario::where([
            'mail' => $request->mail
        ])->first();

        if($usuario){
            if($request->pass!=$usuario->pass){
                return redirect('LoginPage')->with('error', '¡Error de contraseña!');
            }
            Auth::guard('usuarios')->login($usuario);
            return redirect('home');
        }
        

        return redirect('LoginPage')->with('error', '¡Correo no registrado!');
    }

    function Logout(){

      
        if( Auth::guard('usuarios')->check()){
            Auth::guard('usuarios')->logout();
            //return redirect('home');
        }

        if(Auth::guard('tiendas')->check()){
            Auth::guard('tiendas')->logout();
        } 

        return redirect('home');

    }

    function LoginPageCliente(){
        return view('login.logincliente');
    }

    function LoginCliente(Request $request){
        $tienda=Tienda::where('telefono',$request->telefono)->first();
        if($tienda){
            Auth::guard('tiendas')->login($tienda);
            
            return redirect('productos')->with('success','Bienvenido.');
        }
        return redirect('LoginPageCliente')->with('error','El teléfono no esta registrado.');
    }
}
