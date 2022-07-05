<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    //
    public function register(Request $request){

        $usuario= new User();
        $usuario->usuario = $request->usuario;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        if ($usuario){
            return response(
                [
                    'mensaje'=> 'usuario registrado correctamente',
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
