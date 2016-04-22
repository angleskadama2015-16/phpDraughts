<?php

namespace App;

use DB;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //Funkcija vrne vse uporabnike, ki jih dobi iz baze
    public static function getAllUsers(){
        $users=DB::table('users')->get();
        return $users;
    }
    //funkcija za spreminjanje/edit uporabnikovih podatkov
    public static function changeUser(Request $request)
    {
        //preveri če obstaja datoteka v requestu
        if($request->hasFile('file')) {
            //dobimo tip datoteke
            $extension = strtolower($request->file('file')->getClientOriginalExtension());
            //destinacijska pot, pridobi pot do public in doda images/uploads
            $destPath = public_path() . '/images/uploads';
            //ime datoteke; image + dodana ID številka uporabnika da se imena datotek ne podvajajo
            $imageName = 'image' . Auth::user()->id . "." . $extension;
        }
        //preveri če je datoteka v request in če se ujema tip
        if($request->hasFile('file') && ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif')){
            //spremeni podatke v bazi
            $result = DB::table('users')->where('id', Auth::user()->id)->update(['name' => $request->input('name'), 'email' => $request->input('email'), 'imagePath' => '/images/uploads/'.$imageName]);
            //premakne datoteko v destinacijo definirano zgoraj
            $request->file('file')->move($destPath, $imageName);
        }else{
            //če slika ni na novo podana pustimo staro sliko in spremenimo samo druge podatke
            $result = DB::table('users')->where('id', Auth::user()->id)->update(['name' => $request->input('name'), 'email' => $request->input('email')]);
        }
        return $result;
    }
}
