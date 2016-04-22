<?php

namespace App\Http\Controllers;

class AccountController extends Controller
{
    public function login(){
        return view('pages/login'); 
    }
    
    public function register(){
        return view('pages/register');
    }
}
?>