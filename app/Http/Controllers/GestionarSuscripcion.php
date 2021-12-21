<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionarSuscripcion extends Controller
{
    public function index()
    {
        return view('admin.gestionarSuscripcion');
    }
    public function create()
    {
        return view('admin.crearSuscripcion');
    }
}
