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


function GetTitle(){
    return 'LaVigaApp';
}
function NoEspacios(){
    //Si dejas espacios abajo o pones html fuera de las funciones, puedes causar errores
}
?>