<?php

namespace Iplane\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function indexUsuario()
    {
        return view('users.home');
    }

    public function indexAdministrador()
    {
        return view('administrador.home');
    }
}
