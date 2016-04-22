@extends('layout')

@section('login')
    @if(true)
        {{"<div class='alert alert-success'><strong>User successfully logged-in!</strong></div>"}}
    @else
        {{"<div class='alert alert-danger'><strong>An error occured, please try again later!</strong></div>"}}}
    @endif
@stop