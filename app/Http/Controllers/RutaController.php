<?php

namespace Iplane\Http\Controllers;

use Illuminate\Http\Request;
use Iplane\Ruta;
use Iplane\Ciudad;



class RutaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutas=ruta::all();
        
        return view('administrador.rutas.index')->with('rutas',$rutas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ciudades=ciudad::all();
        return view('administrador.rutas.agregar')->with('ciudades',$ciudades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //$ruta= new ruta;
        $ciudadSalida=ciudad::where('nombre', $request->ciudadSalida)->first();
        $ciudadLlegada=ciudad::where('nombre', $request->ciudadLlegada)->first();

        $ruta= new Ruta;
        $ruta->ciudadSalida=$ciudadSalida->nombre;
        $ruta->ciudadLlegada=$ciudadLlegada->nombre;
        $ruta->ciudades;

        //return $ciudad->$ruta->ciudadSalida;
        $ruta->save();

        flash('Se ha registrado la ruta exitosamente')->success();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $ruta= ruta::find($id);
        $ciudades=ciudad::all();
        return view('administrador.rutas.edit')->with('ruta',$ruta)->with('ciudades',$ciudades);
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
        $ruta= ruta::find($id);
        $ruta->ciudadSalida=$request->ciudadSalida;
        $ruta->ciudadLlegada=$request->ciudadLlegada;
        $ruta->save();

        flash('Se ha modificado la ruta # '.$ruta->id.' exitosamente')->success();
        return redirect('/homeAdministrador');
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
