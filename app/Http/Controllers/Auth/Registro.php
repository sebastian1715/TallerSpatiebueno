<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Registro extends Controller
{
    public function register(Request $r){
        $validacion = Validator::make($r->all(),[
            'nombre'=>'required',
            'password'=>'required',
            'email'=>'required'
        ]);
        if(!$validacion->fails()){
            $user = new User();
            $user -> name = $r -> nombre;
            $user -> email = $r -> email;
            $user -> password = Hash::make ($r -> nombre);
            $user -> save();
            return view('Admin.Dashboard');
        }
        else{
        }
    }
}
