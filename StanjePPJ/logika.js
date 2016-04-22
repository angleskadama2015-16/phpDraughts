
function urejeno(a, b)
{
    return a - b;
}

function pocisti()
{              
            kralji = new Array();
            
            $(".izbrana").each(function()
            {
                $(this).removeClass("izbrana");
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
        var izbranKralj = true; 
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
            $(this).toggleClass("izbrana");
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
            
            var niz = "";
            
            if(stevilaB.length > 0)
            {
                niz += "B:";
            
            
                for(var i = 0; i < stevilaB.length; i++ )
                {
                    if(kralji.indexOf(stevilaB[i]) > -1)
                    {
                        niz += "K";
                    }
                    niz += stevilaB[i];
                    if(i < stevilaB.length - 1)
                    {
                        niz += ",";
                    }
                }
                
            }

            if(stevilaW.length > 0)
            {
                
                if(B.length > 0) niz += "/";
                
                niz += "W:";
            
                for(var i = 0; i < stevilaW.length; i++ )
                {
                    if(kralji.indexOf(stevilaW[i]) > -1)
                    {
                        niz += "K";
                    }
                    niz += stevilaW[i];
                    if(i < stevilaW.length - 1)
                    {
                        niz += ",";
                    }
                } 
            }
            
	    if(stevilaB.length > 0 || stevilaW.length > 0)
            niz += ";";

            
            $.ajax(
                {
                    url: "streznik.php",
                    method: "post", 
                    data: JSON.stringify({"niz" : niz}), 
                    contentType: "application/json",
                    dataType: "json",
                    success: function(data)
                    {
             
                        var prejeto = $("<p></p>");
                        prejeto.html("Strežnik je prejel sledeč niz: &nbsp" + data.prejetNiz);
                        prejeto.css("max-width", "300px");
                        prejeto.css("margin-top", "50px");
                        prejeto.css("margin","auto");
                        $("#rezultat").append(prejeto);
                        
                        var rez = $("<table></table>");
                        var prvaV = $("<tr></tr>");
                        var th = $("<th></th>");
                        
                        th.html("Leksem");
                        prvaV.append(th);
                        
                        th = $("<th></th>");
                        th.html("Simbol");
                        prvaV.append(th);
                        
                        rez.append(prvaV);
                        
                        var leksikalniDel = data.leksikalnaAnaliza;
                        
                       for(var i = 0; i < niz.length; i++)
                       {
                            var vrstica = $("<tr></tr>");
                            var celica = $("<td></td>");
                            celica.html(niz[i]);
                            if(niz[i+1] != "," && !isNaN(parseInt(niz[i])))
                            {
                                celica.html(niz[i]+niz[i+1]);
                                vrstica.append(celica);
                                celica = $("<td></td>");
                                celica.html(leksikalniDel[niz[i]+niz[i+1]]);
                                vrstica.append(celica);
                                rez.append(vrstica);
                                i++;
                                continue;
                            }
                            vrstica.append(celica);
                            celica = $("<td></td>");
                            celica.html(leksikalniDel[niz[i]]);
                            vrstica.append(celica);
                            
                            rez.append(vrstica);
                       }
     
     
                       
                      
                        $("#rezultat").append(rez);
                    }
                    
                }
            );
            
            pocisti();

        });
});