<?php

namespace App\Http\Controllers;

class PageController extends Controller{
    public function home(){
        return view('pages/welcome');
    }
    
    public function about(){
        return view('pages/about');
    }

    public function rules(){
        return view('pages/rules');
    }
}
?>