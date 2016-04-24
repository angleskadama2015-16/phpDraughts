@extends('layouts.app')

@section('content')
        <!--preprečimo caching strani, saj bi se ob cachiranju prikazovale enake slike dokler se cache ne bi refreshal kljub temu če bi profilno sliko uporabnik zamenjal-->
<meta http-equiv="Expires" content="Tue, 01 Jan 1995 12:12:12 GMT">
<meta http-equiv="Pragma" content="no-cache">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript">
    setInterval(function(){
        //vključevanje CSRF tokena ker laravel tak hoče; neka varnost al neke pač
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type:'get',
            url:'../public/onlineGet',
            dataType:'json',
            contentType: 'application/json; charset-utf8',
            success: function(rezultat){
                //console.log(rezultat);
                $("#list-of-users").innerHTML="";
                var htmlString="";
                var count=0;
                var i;
                for(i=0; i<rezultat.length; i++){
                    htmlString+="<div class='w3-card-12 w3-margin user w3-hover-shadow' style='width:195px; height:290px;float:left;'><div style='height:70%;width:100%;' align='center'><img class='w3-center' src='../public"+rezultat[i]['imagePath']+"' alt='"+rezultat[i]['name']+"-image' style='width:100%; height:100%; max-height:200px; border-bottom:2px black solid;'></div><div class='w3-container w3-center'> <h6>"+rezultat[i]['name']+"</h6><p style='word-wrap: break-word;'>"+rezultat[i]['email']+"</p></div></div>";
                    count++;
                }
                $('#list-of-users').html(htmlString);
                $('#numberonline').html(count);
            }
        });
    }, 1500);
</script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Currently online users (<span id="numberonline"></span>)</div>
                <div class="panel-body">
                    <div id="list-of-users" style="display:inline-block;">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection