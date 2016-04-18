<?php
//pridobi request metodo(post, get, delete...)
$method = $_SERVER['REQUEST_METHOD'];
//naredi array iz dobljene poti
$request = explode('/',trim($_SERVER['PATH_INFO'],'/'));
//dobi vhod z json_decode
$input = json_decode(file_get_contents('php://input'),true);
//id stavek preveri ime requesta
if($request[0]=='validacija'){
    switch($method){
        case 'POST':
            require_once("validator.php");
            break;
    }
}
?>