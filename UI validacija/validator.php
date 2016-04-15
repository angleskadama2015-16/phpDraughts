
<?php
// funkcija inicializira matriko sosedov in jo vrne 

$sosedi = 3; // $sosedi je 2d array..  

function initSosedi()
{
    $datoteka = fopen("sosedi", "r") or die("Napaka pri branju datoteke sosedov!");
    while($vrstica = fgets($datoteka))
    {
        //TODO: parseanje vrstice iz datoteke
        
        /* 
        
           for i = indeksPrve vrstice to indeks zadnje do 
        
            splitamo vrstico po vejicah od naslednika znaka ':' naprej.. 
            stringe pretvorimo v integer oz. če je '/', potem zapišemo npr -1  
            
            // vrstica je npr array {'23','/','12',13'}
            // POTEM: 
            
            vrstica[0] = 23; 
            vrstica[1] = -1; 
            ... 
            
            sosedi[$i] = array("TL" => vrstica[0] );
           
           end for 
        */ 
    }
    
   return $sosedi; 
    
}

function jeSosed($zacetnoPolje, $koncnoPolje)
{
       if($koncnoPolje == sosedi[$zacetnoPolje]['TL'] || $koncnoPolje == sosedi[$zacetnoPolje]['TR'] 
       || $koncnoPolje == sosedi[$zacetnoPolje]['BL'] || $koncnoPolje == sosedi[$zacetnoPolje]['BR'])
       {
           return true; 
       }
       
       return false;
}



?>