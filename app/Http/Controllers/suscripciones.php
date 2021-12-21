<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bitacora;
use App\Models\Suscripcion;
use PDF;
class suscripciones extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    return view('principal.suscripcion');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.suscripciones');
    }

    public function factura($id){
        $factura=Suscripcion::find($id);
        return view('factura.factura',compact('factura'));
    }

    public function descargar($id){
  // share data to view
  $factura=Suscripcion::find($id);

  $pdf = PDF::loadView('factura.factura',compact('factura'))->setPaper('a4', 'landscape');

  return $pdf->download('factura.pdf');
    }

    public function comprar_suscripciones($nombre){

        if($nombre=='1 month'){
            $tiempo="1 month";
            $precio=10;
        }
        if($nombre=='6 month'){
            $tiempo="6 month";
            $precio=50;
        }
        if($nombre=='year'){
            $tiempo="1 year";
            $precio=80;
        }
        return view('principal.suscripcion-pagar',compact('tiempo','precio'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function mis_suscripcion()
    {
        return view('admin.mis_suscripciones');
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
