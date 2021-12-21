<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Categorias;
use App\Models\Anuncio;
use App\Models\Categoria;
use App\Models\Subcategoria;
use Illuminate\Http\Request;

use App\Notifications\anuncioNotification;
use App\Notifications\actualizaranuncioNotification;
use App\Notifications\borraranuncioNotification;
use App\Models\Bitacora;
use App\Models\imagen;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class anuncios extends Controller
{


    public function __construct(){

        $this->middleware('can:anuncios.create')->only('create');
        $this->middleware('can:anuncios.edit')->only('edit');
        $this->middleware('can:anuncios.favoritos')->only('favoritos');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('principal.inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view('admin.crearanuncio');
    }

    public function favoritos($numero)
    {
        $anuncio = Anuncio::find($numero[0]);
        $anuncio->users()->sync($numero[1]);

        $date = date('H:i:s');
        Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>'añadir a favoritos','descripcion'=>'añadio el anuncio'. $anuncio->nombre ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
        return redirect()->back()->with('info', 'Guardado a Favoritos');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input2=$request->tags;
        $tags = explode(",", $input2);


        $anuncios = new Anuncio();
        $anuncios->nombre = $request->titulo;
        $anuncios->precio = $request->precio;
        $anuncios->descripcion = $request->descripcion;
        $anuncios->ubicacion = $request->ubicacion;
        $anuncios->puntuacion = 0;
        $anuncios->status = 1;

        if($request->moneda==1){
            $anuncios->moneda = "Bs";
        }
        else{
            $anuncios->moneda = "$";
        }

        $anuncios->estado = $request->estado;
        $anuncios->user_id = auth()->user()->id;
        $anuncios->categoria_id = $request->categoria;
        $anuncios->subcategoria_id = $request->subcategoria;
        $anuncios->save();


        if($request->hasFile('imagen')){
            $imagenes=$request->file('imagen');
            foreach($imagenes as $imagen){

             $nombre= $imagen->store('public');
            $crear=new imagen();
            $crear->url=$nombre;
            $crear->anuncio_id=$anuncios->id;
            $crear->save();

            }
        }
        foreach($tags as $tag){
            $creartag=new Tag();
            $creartag->nombre=$tag;
            $creartag->anuncio_id=$anuncios->id;
            $creartag->save();
        }

        auth()->user()->notify(new anuncioNotification($anuncios));
        $date = date('H:i:s');
        Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>'Crear Anuncio ','descripcion'=>'El Usuario Creo El Anuncio'. $anuncios->nombre ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
        return redirect()->back()->with('info', 'Anuncio Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anuncio=Anuncio::find($id);
        $verif=0;
        $favoritos = User::find(auth()->user()->id)->favoritos()->pluck('anuncio_id');
        $tags=$anuncio->etiqueta()->get();
     foreach($favoritos as $favorito){
         if($favorito==$id){
            $verif=1;
         }
     }
     $anuncio->vista=$anuncio->vista+1;
     $anuncio->save();

     $date = date('H:i:s');
     Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>'Mirar Anuncio ','descripcion'=>'El Usuario Miro El Anuncio'. $anuncio->nombre ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
        return view('principal.veranuncio', compact('anuncio','verif','tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* $user = User::find(auth()->user()->id);
        $anuncio = $user->anuncio()->where('status', '1')->get();
        return $anuncio; */
        $anuncio = Anuncio::find($id);
        return view('admin.editaranuncio', compact('anuncio'));
    }

    public function borrarimagen($id)
    {
        $imagen=imagen::find($id);
        $anuncio=$imagen->anuncio;
        Storage::delete($imagen->url);
        $imagen->delete();

        $date = date('H:i:s', time());
        Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>'Borrar Imagen ','descripcion'=>'El Usuario Borro La Imagen De El Anuncio'. $anuncio->nombre ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
     return redirect()->back();

    }

    public function megusta()
    {


        return view('admin.favoritos');
    }

    public function nogusta($id)
    {
        $user = User::find(auth()->user()->id);
        $anuncios=Anuncio::find($id);

        $user->favoritos()->detach($id);

        $date = date('H:i:s');
        Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>'Borrar De Favoritos ','descripcion'=>'El Usuario Borro De Favoritos El Anuncio'. $anuncios->nombre ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
        return view('admin.favoritos');
    }

    public function misanuncios()
    {
        date_default_timezone_set(('America/LA_Paz'));
        $date = date('H:i:s');
        return view('admin.misanuncios');
        Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>'Mirar Mis Anuncios ','descripcion'=>'El Usuario Entro A Mirar Sus Anuncio','hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
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
        $input2=$request->tags;
        $tags = explode(",", $input2);



        $anuncios = Anuncio::find($id);
        $anuncios->nombre = ucwords($request->titulo);
        $anuncios->precio = $request->precio;
        $anuncios->descripcion = ucwords($request->descripcion);
        $anuncios->ubicacion = ucwords($request->ubicacion);

        if($request->moneda==2){
            $anuncios->moneda = "Bs";
        }
        else{
            $anuncios->moneda = "$";
        }

        $anuncios->estado = ucwords($request->estado);
        $anuncios->user_id = auth()->user()->id;
        $anuncios->categoria_id = $request->categoria;
        $anuncios->subcategoria_id = $request->subcategoria;
        $anuncios->save();


        if($request->hasFile('imagen')){
            $imagenes=$request->file('imagen');
            foreach($imagenes as $imagen){

            $nombre= $imagen->store('public');
            $crear=new imagen();
            $crear->url=$nombre;
            $crear->anuncio_id=$anuncios->id;
            $crear->save();

            }
        }
        $tagsanuncio=$this->etiqueta_anuncio($tags,$anuncios);

          foreach($tags as $tag){
            if($this->encontrar($tag,$tagsanuncio)==2){
                $creartag=new Tag();
                $creartag->nombre=$tag;
                $creartag->anuncio_id=$anuncios->id;
                $creartag->save();
            }
        }
        auth()->user()->notify(new actualizaranuncioNotification($anuncios));
        $date = date('H:i:s');
        Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>'Editar Anuncio ','descripcion'=>'El Usuario Edito  El Anuncio'. $anuncios->nombre ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
        return redirect()->back()->with('info', 'Anuncio Creado');
    }

    public function etiqueta_anuncio($tags,Anuncio $anuncio){
        $etiquetas=$anuncio->etiqueta()->get();
        foreach($etiquetas as $etiqueta ){
            if(in_array($etiqueta->nombre,$tags)){

            }
            else{
                $etiqueta->delete();

            }
        }
        return $anuncio->etiqueta()->pluck('nombre');
    }
 public function encontrar($nombre , $tags){

     $verdad=0;
     foreach($tags as $tag){
         if($tag==$nombre){
            $verdad=1;
            break;
         }
         else{
             $verdad=2;
         }
     }
     return $verdad;
 }
    public function veranuncio($id)
    {

        $anuncio=Anuncio::find($id);
        $imagenes = $anuncio->imagen()->get();
        $opiniones=$anuncio->opinion()->get();
        $tags=$anuncio->etiqueta()->get();
        return view('sinacceso.veranuncio', compact('anuncio','imagenes','opiniones','tags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {

        $anuncio = Anuncio::find($id);
        $imagenes = $anuncio->imagen()->pluck('url');
        auth()->user()->notify(new borraranuncioNotification($anuncio));
        $date = date('H:i:s');
        Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>'Borrar Anuncio ','descripcion'=>'El Usuario Borro El Anuncio'. $anuncio->nombre ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
        $anuncio->delete();


        Storage::delete($imagenes);


        return redirect()->back();
    }
}
