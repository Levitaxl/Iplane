<?php

namespace Iplane\Http\Controllers;

use Illuminate\Http\Request;
use Iplane\Personal;
use Iplane\Ruta;
use Iplane\vuelo;
use Carbon\Carbon;
use DateTime;


class VueloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vuelos=vuelo::paginate(10);
        return view('administrador.vuelos.index')->with('vuelos',$vuelos);
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
            'sobrecargo1'=>'required|different:sobrecargo2',
            'sobrecargo2'=>'required',
            ]);

        $fecha_vuelo = explode('/', $request->fecha_vuelo);
        $dia=$fecha_vuelo[0];
        $mes=$fecha_vuelo[1];
        $ano=$fecha_vuelo[2];
        $hora_vuelo = explode(':', $request->hora_vuelo);
        $hora=$hora_vuelo[0];
        $minuto=$hora_vuelo[1];
        $fecha_vuelo=Carbon::create($ano, $mes, $dia, $hora,$minuto,0);

        $piloto=explode('-', $request->piloto);
        $copiloto=explode('-',$request->copiloto);
        $sobrecargo1=explode('-', $request->sobrecargo1);
        $sobrecargo2=explode('-', $request->sobrecargo2);

        $piloto_id=$piloto[1];
        $copiloto_id=$copiloto[1];
        $sobrecargo1_id=$sobrecargo1[1];
        $sobrecargo2_id=$sobrecargo2[1];

        $vuelo=new vuelo();
        $vuelo->ruta_id=$request->ruta_id;
        $vuelo->capacidad_pasajeros=$request->capacidad_pasajeros;
        $vuelo->fecha_hora=$fecha_vuelo;
        $vuelo->piloto_id=$piloto_id;
        $vuelo->copiloto_id=$copiloto_id;
        $vuelo->sobrecargo1_id=$sobrecargo1_id;
        $vuelo->sobrecargo2_id=$sobrecargo2_id;

        $vuelo->save();

        flash('Se ha registrado el vuelo exitosamente')->success();
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
