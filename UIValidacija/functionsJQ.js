

function urejeno(a, b)
{
    return a - b;
}

function pocisti()
{              
            kralji = new Array();
            
            $(".izbranaCrna").each(function()
            {
                $(this).removeClass("izbranaCrna");
            });
            $(".izbranaBela").each(function()
            {
                $(this).removeClass("izbranaBela");
            });
            $(".B").each(function()
            {
                $(this).removeClass("B");
            });
            $(".W").each(function()
            {
                $(this).removeClass("W");
            });
            $(".K").each(function()
            {
                $(this).removeClass("K");
            });
}

$(function()
{
    
        var stPolja = 0; 
        var izbranaBarva = "črna";
        var izbranKralj = false; 
        var kralji = new Array();
    
        $("#barva").css("background", "black");
        $("#kralj").html(izbranKralj);
        
        $("#gmbCrna").click(function(){
            izbranaBarva = "črna";
            $("#barva").css("background", "black");
        });
        $("#gmbBela").click(function(){
            izbranaBarva = "bela";
            $("#barva").css("background", "white");
        });
        $("#gmbKralj").click(function(){
            izbranKralj = true;
            $("#kralj").html(izbranKralj);
        });
        $("#gmbNiKralj").click(function(){
            izbranKralj = false;
            $("#kralj").html("false");
        });
        
        
        
        
        for(var i = 1; i <= 8; i++)
        {
            var vrstica = $("<tr></tr>");
            
            for(var j = 1; j <= 8; j++)
            {
           
                var celica = $("<td></td>");
           
                
                
                if(j % 2 == 1 && i % 2 == 0)
                {
                        $(celica).addClass("crno"); 
                }
                else if(j % 2 == 0 && i % 2 == 1)
                {
                        $(celica).addClass("crno"); 
                }

                if(celica.hasClass("crno"))
                {
                        celica.html(++stPolja);
                        $(celica).attr("id",stPolja);
                }
                
                $(vrstica).append(celica);
            }
            
            $("#igralnoPolje").append(vrstica);
                             
       
        }
        
        
        // KLIK NA POLJE 
        $(".crno").click(function(){
            
            if(izbranaBarva == "črna")
            {
               $(this).toggleClass("izbranaCrna");
            }
            else
            {
                 $(this).toggleClass("izbranaBela");
            }

            if(izbranKralj && !$(this).hasClass("K"))
            {
                $(this).toggleClass("K");
                kralji.push(parseInt($(this).html()));
            }
            if(izbranaBarva == "črna")
            {
                $(this).toggleClass("B");
            }
            else
            {
                $(this).toggleClass("W");
            }
        });
        
        // KLIK NA GUMB ZA POŠILJANJE
        $("#poslji").click(function(){
            
            var stevilaB = new Array();
            var stevilaW = new Array();
            
            $("#rezultat").empty();
            
            var B = $(".B");
            
            B.each(function()
             {
                var N = parseInt($(this).html());
                stevilaB.push(N);
             }
            );
            
            var W = $(".W");
            
            W.each(function()
            {
                var N = parseInt($(this).html());
                stevilaW.push(N);
            }
            );
            
            stevilaB.sort(urejeno);
            stevilaW.sort(urejeno);
            kralji.sort(urejeno);
            
            var nizStanja = "";
            
            if(stevilaB.length > 0)
            {
                nizStanja += "B:";
            
            
                for(var i = 0; i < stevilaB.length; i++ )
                {
                    if(kralji.indexOf(stevilaB[i]) > -1)
                    {
                        nizStanja += "K";
                    }
                    nizStanja += stevilaB[i];
                    if(i < stevilaB.length - 1)
                    {
                        nizStanja += ",";
                    }
                }
                
            }

            if(stevilaW.length > 0)
            {
                
                if(B.length > 0) nizStanja += "/";
                
                nizStanja += "W:";
            
                for(var i = 0; i < stevilaW.length; i++ )
                {
                    if(kralji.indexOf(stevilaW[i]) > -1)
                    {
                        nizStanja += "K";
                    }
                    nizStanja += stevilaW[i];
                    if(i < stevilaW.length - 1)
                    {
                        nizStanja += ",";
                    }
                } 
            }
            
	    if(stevilaB.length > 0 || stevilaW.length > 0)
            nizStanja += ";";
            
            
            var nizPoteze = $("#poteza").val();

            var data = 
            {
               "nizStanja" : nizStanja,
               "nizPoteze" : nizPoteze,  
            };
            
            $.ajax(
                {
                    type:'POST',    
                    url: 'api.php/validacija/', 
                    data: JSON.stringify(data), 
                    dataType:'json',    
                    success: function(rezultat){
                          if(rezultat.veljavna)
                          {
                              alert("Veljavna poteza.");
                          }
                          else 
                          {
                              alert("Neveljavna poteza.");
                          }
                    }
                }
            );
            
            pocisti();

        });
});


