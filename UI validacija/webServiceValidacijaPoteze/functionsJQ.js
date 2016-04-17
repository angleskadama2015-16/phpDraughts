//se proži ob kliku na gumb z id btn
$('#btn').on('click', function(){
    //dobi text stanje iz input boxa
    var stanje=$('#currentstate').val();
    //dobi text premika it input boxa
    var premik=$('#moveToMake').val();
    data={}; //pošilja JSON
    data.premikText=premik;
    $.ajax({    //ajax
        type:'post',    //tip pošiljanja posatkov;; v tem primeru POST
        url: 'api.php/validacija/', //url, ki ga na api.php explodamo da dobimo array posameznih elementov
        data: JSON.stringify(data),  //json. stringify podatkov, ki jih želimo poslat
        dataType:'json',    //definicija datatipa; json v tem primeru
        contentType: 'application/json; charset-utf8',
        success: function(rezultat){ //success funkcija, ki se izvede ob uspešnosti izvedbe api.php

        }
    });
});

