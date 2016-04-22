<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    //Funkcija za prikaz home strani preko kontrolerja
    public function index(){
        return view('home');
    }
    //Funkcija z aprikaz about strani preko kontrolerja
    public function about(){
        return view('pages/about');
    }
    //funkcija za prikaz strani rules preko kontrolerja
    public function rules(){
        return view('pages/rules');
    }

    //Funkcija za prikaz edit strani preko kontrolerja
    public function edit(){
        return view('userPages/edit');
    }
    //Funkcija za pridobivanje vseh userjov in posredovanja teh v user/Pages/users view
    public function users(){
        $users=User::getAllUsers();
        return view('userPages/users', compact('users'));
    }
    //Funckija za spreminajnje uporabnikoviga profila in redirekcijo na homepage
    public function change(Request $request){
        $result=User::changeUser($request);
        return view('userPages/successEdit');
    }
    //FUnckija za prikaz igralne plošče
    public function play(){
        return view('gameView/play');
    }
}
