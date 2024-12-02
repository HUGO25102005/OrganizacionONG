<?php

namespace App\Http\Controllers\Donaciones;

use App\Http\Controllers\Controller;
use App\Models\Donaciones\Donante;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class DonanteController extends Controller
{
    public function comprobarCorreo( Request $request ) {
       
        $email = $request->email;
        
        $donante = Donante::where('email', '=', $email)->first();

        if($donante){
            return response()->json([
                'exists' => true,
                'donante' => $donante
            ]);
        } else {
            return response()->json([
                'exists' => false
            ]);
        }
    }
}
