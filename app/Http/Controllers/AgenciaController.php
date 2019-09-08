<?php

namespace Iplane\Http\Controllers;

use Illuminate\Http\Request;
use Iplane\Agencia;
use Auth;
use DB;

class AgenciaController extends Controller
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
        $agencias= agencia::paginate(10);
        return view('administrador.agencias.index')->with('agencias',$agencias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.agencias.agregarAgencia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'rif' => 'required|min:10|max:10|unique:agencias,rif',
            'nombreDeLaAgencia' => 'required|min:4|max:120|unique:agencias,nombreDeLaAgencia',
            'direccion'=>'required|min:4|max:120',
            'telefono'=>'required|integer',
            'personaContacto'=>'required|min:4|max:120',
        ]);

        $agencia= new agencia;
        $agencia->rif=$request->input('rif');
        $agencia->nombreDeLaAgencia=$request->input('nombreDeLaAgencia');
        $agencia->direccion=$request->input('direccion');
        $agencia->telefono=$request->input('telefono');
        $agencia->personaContacto=$request->input('personaContacto');
        $agencia->save();

        flash('Se ha registrado la agencia exitosamente')->success();
        return redirect('/homeAdministrador');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $rif
     * @return \Illuminate\Http\Response
     */
    public function show($rif)
    {
      // $agencia= agencia::find($rif);
       //return view('administrador.agencias.show')->with('agencia',$agencia);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($rif)
    {
        $agencia= agencia::find($rif);
        return view('administrador.agencias.edit')->with('agencia',$agencia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rif)
    {
        $this->validate($request, [
            //'rif' => 'required|min:10|max:10|unique:agencias,rif',
            'nombreDeLaAgencia' => 'required|min:4|max:120|unique:agencias,nombreDeLaAgencia',
            'direccion'=>'required|min:4|max:120',
            'telefono'=>'required|integer',
            'personaContacto'=>'required|min:4|max:120',
        ]);

        $agencia= agencia::find($rif);
        $agencia->rif=$request->input('rif');
        $agencia->direccion=$request->input('direccion');
        $agencia->telefono=$request->input('telefono');
        $agencia->personaContacto=$request->input('personaContacto');

        if(!($agencia->nombreDeLaAgencia==$request->nombreDeLaAgencia)){
            $this->validate($request,[
                'nombreDeLaAgencia' => 'required|min:4|max:120|unique:agencias,nombreDeLaAgencia',
                ]);    
                $agencia->nombreDeLaAgencia=$request->input('nombreDeLaAgencia');
        } 
        $agencia->save();

        flash('Se han modificado los datos de  la agencia exitosamente')->success();
        return redirect('/homeAdministrador');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rif)
    {
        $agencia = agencia::find($rif); 
        $agencia->delete();
        flash('Se ha eliminado la agencia exitosamente')->success();
        return redirect('/homeAdministrador');
    }
}
