<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Hash;


class logueoController extends FacadesAuth
{
    public function login (Request $request){
        $email = $request->email;
        $password = $request->password;
        $validacion = Validator::make($request->all(),[
            'email'=>'required',
            'password'=>'required'
        ]);
        if($validacion->fails()){
            $usuarioemial = User::where('email',$email)->get();
            if(Hash::check($password, $usuarioemial->password)){
                $request->session()->put('id',$usuarioemial->id);
                $request->session()->put('user',$usuarioemial->name);
                $request->session()->put('email',$usuarioemial->email);
                return view('Admin.Dashboard');
            }
        }
    }
}
