<?php

require_once("sintakticniAnalizator.php");

$niz = json_decode(file_get_contents("php://input"));

//var_dump($_POST);

if(isset($niz))
{
    $rez['prejetNiz'] = $niz->niz;
    $rez['leksikalnaAnaliza'] = leksikalnaAnaliza($niz->niz);
    $rez['sintakticnaAnaliza'] = sintakticnaAnaliza($niz->niz);
    header("Content-Type: application/json, charset:utf-8");
    echo json_encode($rez);
}






?>