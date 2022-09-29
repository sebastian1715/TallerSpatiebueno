<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Indicar que pase contenido segun se especifique al Index.
        // $Users = User::simplePaginate(5);
        $Users = User::orderBy('name', 'ASC')->get();
        return view('User.index', compact('Users'));

        // return view('User.index')->compact('Users');
        // return view('User.index')->with('Users'); Pasar un solo dato
        // return view('User.index')->get('Users'); Pasar un solo dato
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Roles = Role::all();
        return view('User.create', compact('Roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaciones = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        if (isset($validaciones)) {
            $Users = new User;
            $Users->name = $request->name;
            $Users->email = $request->email;
            $Users->password = $request->password;
            $Users->save();
            session()->flash('message', 'Usuario creado satisfactoriamente!!!!');
            return redirect()->route('User.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        return view('User.edit', compact('User'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        $validaciones = request()->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',

        ]);

        if (isset($validaciones)) {
            $User->name = $request->name;
            $User->email = $request->email;
            $User->password = $request->password;
            $User->save();
            session()->flash('message', 'Usuario editado satisfactoriamente!!!!');
            return redirect()->route('User.index');
        }
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sites  $sites
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
$User->delete();
session()->flash('message', 'Sitio eliminado correctamente!!');
return redirect()->route('User.index')->with('eliminar', 'ok');
    }
}
