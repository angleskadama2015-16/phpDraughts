@extends('layouts.app')

@section('content')
        <!--preprečimo caching strani, saj bi se ob cachiranju prikazovale enake slike dokler se cache ne bi refreshal kljub temu če bi profilno sliko uporabnik zamenjal-->
<meta http-equiv="Expires" content="Tue, 01 Jan 1995 12:12:12 GMT">
<meta http-equiv="Pragma" content="no-cache">
<script>
</script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All users</div>
                <div class="panel-body">
                    <div id="list-of-users" style="display:inline-block;">
                            @foreach($users as $user)
                                <div class="w3-card-12 w3-margin user w3-hover-shadow" style="width:195px; height:290px;float:left;">
                                    <div style="height:70%;width:100%;" align="center" >
                                        <img class="w3-center" src="{{asset($user->imagePath)}}" alt="{{$user->name}}-image" style="width:100%; height:100%; max-height:200px; border-bottom:2px black solid;">
                                    </div>
                                    <div class="w3-container w3-center">
                                        <h6>{{ $user->name }}</h6>
                                        <p style="word-wrap: break-word;">{{ $user->email }}</p>
                                    </div>
                                </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection