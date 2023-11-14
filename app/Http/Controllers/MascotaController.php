<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mascota;

class MascotaController extends Controller
{
    public function index(){
        return view("RegistrarMascota");
    }

    
    public function registrar(Request $request){

        $Pet =new mascota();
        if($request->hasFile('FotoMascota')){

            $file = $request->file('FotoMascota');
            $destinationPath='img/FotoMascota/';
            $filename = time().'-'.$file->getClientOriginalExtension();
            $uploadSuccess = $request->file('FotoMascota')->move( $destinationPath, $filename );
            $Pet->FotoMascota = $destinationPath. $filename;
        }

        $Pet->Edad = $request->Edad;
        $Pet->Genero = $request->Genero;
        $Pet->Descripcion = $request->Descripcion;
        $Pet->save();
        return redirect()->route("Inicio");  
    }
}
