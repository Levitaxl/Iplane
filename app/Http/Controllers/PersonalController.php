<?php

namespace Iplane\Http\Controllers;

use Illuminate\Http\Request;
use Iplane\Personal;
use Auth;

class PersonalController extends Controller
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
        $personal=personal::all();
        return view('administrador.personal.index')->with('personal',$personal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.personal.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|min:4|max:120|regex:/^[a-zA-Z ]+$/',
            'apellido'=>'required|min:4|max:120',
            'cedula'=>'required|unique:personal,cedula|integer',
            'direccion'=>'required|min:4|max:120',
            'telefono'=>'required|integer',
            'cargo'=>'required'
        ]);

        $personal= new personal;
        $personal->nombre=$request->nombre;
        $personal->apellido=$request->apellido;
        $personal->direccion=$request->direccion;
        $personal->telefono=$request->telefono;
        $personal->cedula=$request->cedula;
        $personal->cargo=$request->cargo;
        $personal->save();

        flash('Se ha registrado a '. $request->nombre.' '.$request->apellido.' exitosamente')->success();
        return redirect('/homeAdministrador');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($cedula)
    {
        $trabajador= personal::find($cedula);
        return view('administrador.personal.edit')->with('trabajador',$trabajador);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cedula)
    {
        $this->validate($request,[
            'nombre' => 'required|min:4|max:120|regex:/^[a-zA-Z ]+$/',
            'apellido'=>'required|min:4|max:120',
            //'cedula'=>'required|unique:personal,cedula|integer',
            'direccion'=>'required|min:4|max:120',
            'telefono'=>'required|integer',
            //'cargo'=>'required'
        ]);

        $personal= personal::find($cedula);
        $personal->nombre=$request->nombre;
        $personal->apellido=$request->apellido;
        $personal->direccion=$request->direccion;
        $personal->telefono=$request->telefono;
        $personal->save();

        flash('Se ha modificado a '. $request->nombre.' '.$request->apellido.' exitosamente')->success();
        return redirect('/homeAdministrador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($cedula)
    {
        $personal= personal::find($cedula);
        flash('Se ha eliminado a '. $personal->nombre.' '.$personal->apellido.' exitosamente')->success();

        $personal->delete();
        return redirect('/homeAdministrador');//
    }
}
