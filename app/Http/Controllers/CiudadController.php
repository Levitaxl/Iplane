<?php

namespace Iplane\Http\Controllers;

use Illuminate\Http\Request;
use Iplane\Ciudad;
use Auth;

class CiudadController extends Controller
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
        $ciudades=ciudad::all();
        return view('administrador.ciudades.index')->with('ciudades',$ciudades);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('administrador.ciudades.agregar');
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
            'nombre' => 'required|min:4|max:120',
        ]);

        $ciudad= new ciudad;
        $ciudad->nombre=$request->nombre;
        $ciudad->save();

        flash('Se ha registrado la ciudad '. $request->nombre.' exitosamente')->success();
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
        $ciudad= ciudad::find($id);
        return view('administrador.ciudades.edit')->with('ciudad',$ciudad);
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
        $ciudad= ciudad::find($id);

        if(!($ciudad->nombre==$request->nombre)){
            $this->validate($request,[
                'nombre' => 'required|min:4|max:120|regex:/^[a-zA-Z ]+$/',
            ]);
            $ciudad->nombre=$request->nombre;
            $ciudad->save();
            flash('Se han modificado los datos de  la ciudad exitosamente')->success();
        }
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
        $ciudad= ciudad::find($id);
        $ciudad->delete();
        flash('Se ha eliminado la ciudad exitosamente')->success();
        return redirect('/homeAdministrador');
    }
}
