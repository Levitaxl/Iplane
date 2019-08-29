<?php

namespace Iplane\Http\Controllers;
use Iplane\User;
use Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{

       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $user= User::findOrFail(Auth::user()->email);
        return view('users.edit')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($email)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        $this->validate($request,[
            'nombre' => 'required|min:4|max:120',
            'apellido'=>'required|min:4|max:120',
            //'cedula'=>'required|unique:users,cedula|integer',
            'direccion'=>'required|min:4|max:120',
            'telefono'=>'required|integer',
            //'email' => 'required|unique:users|max:255|email|unique:users,email',
            //'password'=>'required'
        ]);

        $usuario=User::find($email);
        $usuario->nombre=$request->nombre;
        $usuario->apellido=$request->apellido;
        $usuario->direccion=$request->direccion;
        $usuario->telefono=$request->telefono;
        $usuario->save();
        flash('Se han modificado sus datos exitosamente')->success();
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
