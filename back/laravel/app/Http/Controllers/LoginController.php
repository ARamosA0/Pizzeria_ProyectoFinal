<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request){

        $usuario=User::where('usuario',$request->usuario)->where('password',$request->password)->first();
        if ($usuario){
            return response(
                [
                    'mensaje'=> 'usuario validado correctamente',
                    'usuario'=> $usuario

                ]);
        }
        else{
            return response([
                'mensaje'=> 'usuario validado incorrectamente',
            ]);
        }
    }
}
