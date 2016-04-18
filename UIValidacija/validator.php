
<?php

session_start();

// funkcija inicializira matriko sosedov in jo vrne 
function initSosedi()
{
    
    $sosedi = array();
    
    $datoteka = fopen("sosedi", "r") or die("Napaka pri branju datoteke sosedov!");
    while($vrstica = fgets($datoteka))
    {
      
        $poljePozicije = explode(":", $vrstica);
        
        $stPolja = intval($poljePozicije[0]);
        
        $pozicije = explode(",",$poljePozicije[1]);

        if($pozicije[0] != "/")
        {
            $sosedi[$stPolja]["TL"] = intval($pozicije[0]);
        }
        else {
             $sosedi[$stPolja]["TL"] = -1;
        }
        
        if($pozicije[1] != "/")
        {
            $sosedi[$stPolja]["TR"] = intval($pozicije[1]);
        }
        else {
             $sosedi[$stPolja]["TR"] = -1;
        }
        
        if($pozicije[2] != "/")
        {
            $sosedi[$stPolja]["BL"] = intval($pozicije[2]);
        }
        else {
             $sosedi[$stPolja]["BL"] = -1;
        }
        
        if($pozicije[3] != "/")
        {
            $sosedi[$stPolja]["BR"] = intval($pozicije[3]);
        }
        else {
             $sosedi[$stPolja]["BR"] = -1;
        }
         
        
    }
    
  return $_SESSION['sosedi'] = $sosedi; 
    
}

// funkcija, ki pove, ali sta dve polji sosednji. 
function jeSosed($zacetnoPolje, $koncnoPolje)
{
       if($koncnoPolje == $_SESSION['sosedi'][$zacetnoPolje]['TL'] || $koncnoPolje == $_SESSION['sosedi'][$zacetnoPolje]['TR'] 
       || $koncnoPolje == $_SESSION['sosedi'][$zacetnoPolje]['BL'] || $koncnoPolje == $_SESSION['sosedi'][$zacetnoPolje]['BR'])
       {
           return true; 
       }
       
       return false;
}

// prejme string stanja in vrne 2d polje z pozicijami
function razpoznajStanje($stanje)
{
    $poljalevega = array();
    $poljadesnega = array();
    
    
    $levidel = explode("/", $stanje)[0];
    
    if(count(explode("/",$stanje)) > 1)
        $desnidel = explode("/", $stanje)[1];
    
    $brezdvopicja = explode(":", $levidel);
    $leviigralec = $brezdvopicja[0];
    $poljalevegastr = explode(",", $brezdvopicja[1]);
    
    if(isset($desnidel))
    {
        $brezdvopicja = explode(":", $desnidel);
        $desniigralec = $brezdvopicja[0];
        $poljadesnegastr = explode(",", $brezdvopicja[1]);
    }
 
    for($i = 0; $i < count($poljalevegastr); $i++)
    {
        $poljalevega[] = $poljalevegastr[$i];
    }
    
    if(isset($desnidel))
        for($i = 0; $i < count($poljadesnegastr); $i++)
        {
            $poljadesnega[] = $poljadesnegastr[$i];
        }
    
    if(isset($desniigralec))
    {
          $rezultat = array($leviigralec => $poljalevega, $desniigralec => $poljadesnega );
    }
    else {
          $rezultat = array($leviigralec => $poljalevega);
    }
  
    $_SESSION['stanje'] = $rezultat;
    
    return $rezultat;

}

// preveri, ali je polje zasedeno 
function zasedeno($polje)
{
    if(isset($_SESSION['stanje']['W']))
    {
        if(in_array($polje, $_SESSION['stanje']['W']))
        {
            return true;
        }
    }
    if(isset($_SESSION['stanje']['B']))
    {
        if(in_array($polje,$_SESSION['stanje']['B']))
        {
            return true;
        }
    }
    
    return false;
}

// preveri ali je preskok možen 
function preskok($zacetnoPolje, $koncnoPolje)
{
    $sosediZacetnega = $_SESSION['sosedi'][$zacetnoPolje];
    
    $sosediKoncnega = $_SESSION['sosedi'][$koncnoPolje];
    
    $indeksiVPreseku = array_values(array_intersect($sosediZacetnega, $sosediKoncnega));
    
    $polozajNasprotnika = 0;
  
    foreach($indeksiVPreseku as $stPolozaja)
    {
        if($stPolozaja > 0)
        {
            $polozajNasprotnika = $stPolozaja;
            break;
        }
    }
    
    if(!zasedeno($polozajNasprotnika))
    {
        return false;
    }

    
    if($polozajNasprotnika === 0)
    {
        return false;
    }
    else
    {

        $barvaFigure = "B";
        
        if(isset($_SESSION['stanje']['W']))
        if(!(array_search($zacetnoPolje, $_SESSION['stanje']['W']) === false)) 
        {
            $barvaFigure = "W";
        }
                
        $barvaNasprotnika = "B";
        
        if(isset($_SESSION['stanje']['W']))
        if(!(array_search($polozajNasprotnika, $_SESSION['stanje']['W'])  === false))
        {
            $barvaNasprotnika = "W";
        }
     
        if($barvaFigure === $barvaNasprotnika)
        {
            return false;
        }
        
    }
    
    return true;
  
}

// prejme string poteze in vrne 2d polje z pozicijami
function razpoznajPotezo($poteza)
{
    $poljastr = explode("-",$poteza);
    $rez = array("od" => intval($poljastr[0]), "do" => intval($poljastr[1]));
    return $rez;
}

//glavna funkcija za validacijo poteze
function validiraj($prejetijson)
{
   
   
    $stanje = razpoznajStanje($prejetijson->nizStanja);
    $poteza = razpoznajPotezo($prejetijson->nizPoteze);
    
    $zacetnoPolje = $poteza["od"];
        
    $koncnoPolje = $poteza["do"];
    
    if(isset($stanje["B"]))
    $zasedelCrni = array_search($koncnoPolje,$stanje["B"]);
    else
    {
        $zasedelCrni = false; 
    }
    if(isset($stanje["W"]))
    $zasedelBeli = array_search($koncnoPolje, $stanje["W"]);
    else
    {
        $zasedelBeli = false; 
    }

    if($zasedelCrni !== false || $zasedelBeli !== false) 
    { 
       return false; 
    }
    if(jeSosed($zacetnoPolje,$koncnoPolje))
    {
        return true; 
    }
    else if(preskok($zacetnoPolje, $koncnoPolje))
    {
        return true;
    }
    else 
    {
        return false; 
    }
    
}




if(!isset($_SESSION['sosedi']))
    $_SESSION['sosedi'] = initSosedi();

$prejeto = json_decode(file_get_contents("php://input"));


header('Content-Type: application/json');
echo json_encode(array("veljavna" => validiraj($prejeto)));


?>