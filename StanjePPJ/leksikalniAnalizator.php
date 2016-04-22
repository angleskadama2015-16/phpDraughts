<?php
function leksikalnaAnaliza($niz)
{
    $lexem = "";
    
    $simbolnaTabela = array();
    
    for($i = 0; $i < strlen($niz); $i++ )
    {
        $lexem .= $niz[$i]; 
        if(strlen($lexem) == 1)
        {
            $testToken = Token($lexem);
            if($testToken == "LexErr")
            {
                $a = array('napaka' => "Leksikalna napaka na mestu ".$i."!", );
                
                return $a;
            }
            else 
            {
                if(Token($lexem) == "idPolja")
                {
                     if($i < strlen($niz) - 1)
                     {
                        $naslednjiZnak = $niz[$i+1];
                        if(Token($naslednjiZnak) != "idPolja")
                        {
                            $simbolnaTabela[$lexem] = $testToken;
                        } 
                        else 
                        {
                           $lexem .= $naslednjiZnak;
                           $simbolnaTabela[$lexem] = Token($lexem);
                           $lexem = "";
                           $i++;
                        }
                     }
                }
                
                $simbolnaTabela[$lexem] = $testToken;
                $lexem = "";
            }
            
        }
            
    }
    
    return $simbolnaTabela;
}

function Token($niz)
{
   $tokeni = array(
       'B' => "igralec",
       'W' => "igralec", 
       ':' => "separator",
       ';' => "separator", 
       ',' => "separator",
       '/' => "separator",
       'K' => "statusKralj"
   );
   
   for($i = 0; $i <= 32; $i++)
   {
       $e = "".$i;       
       
       $tokeni[$e] = "idPolja";
   }
   
    if(!isset($tokeni[$niz]))
    {
        return "LexErr"; 
    }
    else {
        return $tokeni[$niz];
    }
}

?>