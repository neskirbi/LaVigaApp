<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Tienda;

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

   
    public function GuardaTienda(Request $request)
    {

        if($request->pass!=$request->pass2){
            return redirect('registro')->with('error','Las contraseñas no coinciden.');
        }
        if(Tienda::where('telefono',$request->telefono)->first()){
            return redirect('registro')->with('error','El teléfono ya se registró anteriormente, por favor igrese uno nuevo.');
        }
        if(Tienda::where('mail',$request->mail)->first()){
            return redirect('registro')->with('error','El correo ya se registró anteriormente, por favor igrese uno nuevo.');
        }

        $tienda=new Tienda();

        $tienda->id=GetUuid();
        $tienda->tienda=$request->tienda;
        $tienda->nombres=$request->nombres;
        $tienda->apellidos=$request->apellidos;
        
        $tienda->telefono=$request->telefono;
        $tienda->mail=$request->mail;
        $tienda->pass=$request->pass;

        $tienda->save();

        return redirect('home')->with('success','Registro Guardado.');
    }



    public function LoginPage()
    {
        return view('login.loginpage');
    }


    function Login(Request $request){

        $tienda = Tienda::where([
            'mail' => $request->mail
        ])->first();

        if($tienda){
            if($request->pass!=$tienda->pass){
                return redirect('LoginPage')->with('error', '¡Error de contraseña!');
            }
            Auth::guard('tiendas')->login($tienda);
            return redirect('home');
        }
        

        return redirect('LoginPage')->with('error', '¡Correo no registrado!');
    }
}
