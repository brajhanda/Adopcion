<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Mascota;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function store(Request $request){

        $Pet =new Mascota();
        $Pet->Edad = $request->Edad;
        $Pet->Genero = $request->Genero;
        $Pet->Descripcion = $request->Descripcion;
        $Pet->save();
        return redirect()->route("dashboard");
    }
}
