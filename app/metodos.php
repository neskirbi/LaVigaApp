<?php

use App\Models\Carrito;

function Version(){
    return 2;
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


    if(Auth::guard('tiendas')->check()){
        return Auth::guard('tiendas')->user()->id;
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

function GetToken(){
    if(Auth::guard('tiendas')->check()){
        return Auth::guard('tiendas')->user()->token;
    }
}


function GetTitle(){
    return 'LaVigaApp';
}





function GetCarritoCount(){
    return Carrito::where('id_tienda',GetId())->count();
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

function EnviarWhatsApp($telefono){
        
    //TOKEN QUE NOS DA FACEBOOK
    $token = 'EAALPCiZBjQg4BADRr5wqbTPHZAJiZAzSKLPmsPic64bEAcqj0hx6cQ7X0WSBg24It3yj6BVLhZAuE5dbtnKhcGx5T1h3iu2Ctqu6qAHRU51oXXdZCVeVXa2RmBwrnM6QyXcbThaVAzvqjfq1m6ShC082rZCbuAkqAhTHF2VVfQD2bJoctcmdpvihknTg4ZCSmqI58nMM5wsyQZDZD';
    //NUESTRO TELEFONO
    //$telefono = '5533772392';
    //URL A DONDE SE MANDARA EL MENSAJE
    $url = 'https://graph.facebook.com/v17.0/110807355409486/messages';
    //CONFIGURACION DEL MENSAJE
    $mensaje = ''
            . '{'
            . '"messaging_product": "whatsapp", '
            . '"to": "'.$telefono.'", '
            . '"type": "template", '
            . '"template": '
            . '{'
            . '     "name": "hello_world",'
            . '     "language":{ "code": "en_US" } '
            . '} '
            . '}';
    //DECLARAMOS LAS CABECERAS
    $header = array("Authorization: Bearer " . $token, "Content-Type: application/json",);
    //INICIAMOS EL CURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $mensaje);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //OBTENEMOS LA RESPUESTA DEL ENVIO DE INFORMACION
    $response = json_decode(curl_exec($curl), true);
    //IMPRIMIMOS LA RESPUESTA 
    //print_r($response);
    //OBTENEMOS EL CODIGO DE LA RESPUESTA
    $status_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    //CERRAMOS EL CURL
    curl_close($curl);

    return $response;
}










function NoEspacios(){
    //Si dejas espacios abajo o pones html fuera de las funciones, puedes causar errores
}
?>