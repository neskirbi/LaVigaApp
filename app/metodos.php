<?php

function Version(){
    return 1;
}

function GetUuid(){
    $data = random_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); 
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); 
    return str_replace("-","",vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4)));
}

function GetId(){
    if(Auth::guard('usuarios')->check()){
        return Auth::guard('usuarios')->user()->id;
    } 
}

function GetIdUsuario(){
    if(Auth::guard('tiendas')->check()){
        return Auth::guard('tiendas')->user()->id_usuario;
    } 
}


function GetNombre(){
    if(Auth::guard('usuarios')->check()){
        return Auth::guard('usuarios')->user()->nombres;
    } 

    if(Auth::guard('tiendas')->check()){
        return Auth::guard('tiendas')->user()->tienda;
    }
}


function GetTitle(){
    return 'LaVigaApp';
}
function NoEspacios(){
    //Si dejas espacios abajo o pones html fuera de las funciones, puedes causar errores
}


function GuardarArchivos($file,$ruta,$nombre){


    $ruta=public_path().$ruta;
    if(!is_dir($ruta))
        mkdir($ruta, 0777,true);

    if(file_exists($ruta.'/'.$nombre))             
        unlink($ruta.'/'.$nombre);

    if($file->move($ruta, $nombre)){
        return true;
    }else{
        return false;
    }

}
?>