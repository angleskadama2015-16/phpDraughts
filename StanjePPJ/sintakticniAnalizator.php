<?php
include("leksikalniAnalizator.php");

$niz = json_decode(file_get_contents("php://input"));



$i = 0;
$napake = array(); 
$testniNiz =   "B:K,2K,3K/B:4,2K,4;"; // ;   $niz->niz;
$trenutniToken = "";
$simbolnaTabela = leksikalnaAnaliza($testniNiz);



if(isset($niz))
{
    $rez['prejetNiz'] = $niz->niz;
    $rez['leksikalnaAnaliza'] = leksikalnaAnaliza($testniNiz);
    
    sintakticnaAnaliza();
    $rez['sintakticnaAnaliza'] = array("napake" => $napake);
    header("Content-Type: application/json, charset:utf-8");
    echo json_encode($rez);
}


function NextToken()
{
    global $i, $simbolnaTabela;
    if($i < count($simbolnaTabela))
    {
          return $simbolnaTabela[$i++];
    }
    else 
    {
        return null;
    }
}

function sintakticnaAnaliza()
{
   global $napake;
   S();  
   return $napake;
}

function S()
{
    
    global $i, $trenutniToken, $napake;
    
    $trenutniToken = NextToken();
    if(key($trenutniToken) == "B")
    {
        $trenutniToken = NextToken();
        if(key($trenutniToken) == ":")
        {
            $trenutniToken = NextToken();
            P(); 
            if(key($trenutniToken) == "/")
                $trenutniToken = NextToken();
            else
            {
                $napake[] = "Nepricakovani leksikalni simbol na mestu ".$i.", pricakujem /";
            }
             if(key($trenutniToken) == "W")
                $trenutniToken = NextToken();
             else 
             {
                 $napake[] = "Nepricakovani leksikalni simbol na mestu ".$i.", pricakujem W";
             }
             if(key($trenutniToken) == ":")
                $trenutniToken = NextToken();
             P();
             if(key($trenutniToken) == ";")
                return;
        }
        else 
        {
             $napake[] = "Nepricakovani leksikalni simbol na mestu ".$i.", pricakujem :";
        }
    }
    else 
    {
         $napake[] = "Nepricakovani leksikalni simbol na mestu ".$i.", pricakujem B";
    }
}

function P()
{
        
    global $trenutniToken;
    if($trenutniToken[key($trenutniToken)] == "idPolja")
    {
        $trenutniToken = NextToken();
        V();
        L();
        P();
    }
}

function V()
{
        
    global $trenutniToken;
    
    if(key($trenutniToken) == "K")
    {
        $trenutniToken = NextToken();
    }
    
}

function L()
{
        
    global $trenutniToken;
    if(key($trenutniToken) == ",")
    { 
         $trenutniToken = NextToken(); 
    }
}


?>