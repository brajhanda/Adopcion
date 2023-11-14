<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdoptaController extends Controller
{
    public function __invoke(){
        $mascotas= \DB::table("mascotas")
        ->select("id","genero","edad","descripcion","FotoMascota")
        ->orderBy("id","desc")
        ->get();
        return view("Adopta")->with("mascotas", $mascotas);
    }
}
