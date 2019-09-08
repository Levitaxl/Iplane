<?php

namespace Iplane\Http\Controllers;

use Illuminate\Http\Request;
use Iplane\Personal;
use Iplane\Ruta;
use Iplane\vuelo;

class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('administrador.vuelos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal=personal::all();
        $rutas=ruta::all();
        return view('administrador.vuelos.agregar')->with('personal',$personal)->with('rutas',$rutas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //return $request->fecha_vuelo;
        $this->validate($request,[
            'fecha_vuelo' => 'date_validation|required',
            'hora_vuelo'=>'hour_validation|required',
            'capacidad_pasajeros'=>'integer|max:30|required',
            'piloto'=>'required',
            'copiloto'=>'required',
            'sobrecargo1'=>'required',
            'sobrecargo2'=>'required',
            ]);

        $piloto=explode('-', $request->piloto);
        $copiloto=explode('-',$request->copiloto);
        $sobrecargo1=explode('-', $request->sobrecargo1);
        $sobrecargo2=explode('-', $request->sobrecargo2);

        $id_piloto=$piloto[1];
        $id_copiloto=$copiloto[1];
        $id_sobrecargo1=$sobrecargo1[1];
        $id_sobrecargo2=$sobrecargo2[1];

        if($id_sobrecargo1==$id_sobrecargo2){
            flash('Escoja 2 sobrecargo distintos')->error();  
            return redirect('/vuelo/create');      
        }

        
        
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
