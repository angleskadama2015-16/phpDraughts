@extends('layout')

@section('register')
    @if(true)
        {{"<div class='alert alert-success'><strong>User successfully registered!</strong></div>"}}
    @else
        {{"<div class='alert alert-danger'><strong>An error occured, please try again later!</strong></div>"}}}
    @endif
@stop