<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anuncio;
class Home extends Controller
{
public function index(){

    $anuncios=Anuncio::all();
    return view('welcome',compact('anuncios'));
}
}
