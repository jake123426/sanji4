<?php

use App\Http\Controllers\anuncios;
use App\Http\Controllers\GestionarSuscripcion;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\suscripciones;
use App\Http\Controllers\usuarios;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::get('/',[\App\Http\Controllers\Home::class,'index'])->name('home');

    Route::get('categoria/{id}',[\App\Http\Controllers\categorias::class,'vercategoria'])->name('ver.categoria');
    Route::get('veranuncio/{id}',[\App\Http\Controllers\anuncios::class,'veranuncio'])->name('ver.anuncio');

    Route::get('/userss/cuenta',[\App\Http\Controllers\usuarios::class,'cuenta'])/* ->middleware('can:userss.index') */->name('userss.cuenta');
    Route::put('/userss/cuenta/{id}',[\App\Http\Controllers\usuarios::class,'cuentaStore'])/* ->middleware('can:userss.index') */->name('userss.cuentaStore');
    Route::get('/userss/perfil',[\App\Http\Controllers\usuarios::class,'perfil'])/* ->middleware('can:userss.index') */->name('userss.perfil');
    Route::put('/userss/perfil',[\App\Http\Controllers\usuarios::class,'perfilStore'])/* ->middleware('can:userss.index') */->name('userss.perfilStore');

    Route::get('/userss',[\App\Http\Controllers\usuarios::class,'index'])->middleware('can:userss.index')->name('userss.index');
    Route::get('/userss/{id}',[\App\Http\Controllers\usuarios::class,'show'])/* ->middleware('can:userss.show') */->name('userss.show');
    Route::put('/userss/{id}',[\App\Http\Controllers\usuarios::class,'storeRol'])/* ->middleware('can:userss.show') */->name('userss.storeRol');


    Route::get('auth/facebook',[SocialController::class,'redirectFacebook']);
    Route::get('auth/facebook/callback',[SocialController::class,'callbackFacebook']);

    Route::put('/userss/eliminar/{id}',[\App\Http\Controllers\usuarios::class,'update'])->middleware('can:userss.index')->name('userss.update');



    /* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard'); */

Route::middleware(['auth:sanctum', 'verified'])->group(function() {

     Route::resource('opiniones',\App\Http\Controllers\opiniones::class)->names('opiniones');
     Route::get('mis_suscripcion',[\App\Http\Controllers\suscripciones::class,'mis_suscripcion'])->name('mis_suscripcion');
     Route::resource('suscripcion',\App\Http\Controllers\suscripciones::class)->names('suscripcion');
     Route::resource('noticacion',\App\Http\Controllers\NotificacionesController::class)->names('noticacion');

     Route::get('gestionar-suscripcion', [GestionarSuscripcion::class, 'index'])->name('gestionarSuscripcion.index');
     Route::get('comprar/{nombre}',[\App\Http\Controllers\suscripciones::class,'comprar_suscripciones'])->name('suscripcion_comprar');


     Route::get('descargar/{id}',[\App\Http\Controllers\suscripciones::class,'descargar'])->name('suscripcion_descargar');
     Route::get('factura/{id}',[\App\Http\Controllers\suscripciones::class,'factura'])->name('suscripcion_factura');


     Route::get('gestionar-suscripcion/crear', [GestionarSuscripcion::class, 'create'])->name('gestionarSuscripcion.create');

     Route::resource('bitacora',\App\Http\Controllers\bitacoras::class)->names('bitacora');
     Route::resource('anuncios',\App\Http\Controllers\anuncios::class)->names('anuncios');
     Route::get('eliminar/{id}',[\App\Http\Controllers\anuncios::class,'eliminar'])->name('eliminar.borrar');
     Route::get('eliminarimagen/{id}',[\App\Http\Controllers\anuncios::class,'borrarimagen'])->name('eliminar.imagen');
     Route::get('/megustas',[\App\Http\Controllers\anuncios::class,'megusta'])->middleware('can:megustas.megusta')->name('megustas.megusta');
     Route::get('/misanuncios',[\App\Http\Controllers\anuncios::class,'misanuncios'])->middleware('can:misanuncio.misanuncios')->name('misanuncio.misanuncios');
     Route::get('borrar/{id}',[\App\Http\Controllers\anuncios::class,'nogusta'])->name('borrar.nogusta');

     Route::get('/estadisticas',[anuncios::class,'estadisticas'])->name('estadisticas'); // Pagina de estadisticas
     Route::get('/alertas',[anuncios::class,'alertas'])->name('alertas'); // Pagina para listar las alertas de usuario
     Route::get('/notificar',[anuncios::class,'notificar'])->name('notificar'); // Pagina para notificar a los usuarios seleccionados
     Route::post('/storenotificar',[anuncios::class,'storenotificar'])->name('storenotificar'); // Pagina para notificar a los usuarios seleccionados

     Route::get('enviarnotificacion',[\App\Http\Controllers\anuncios::class,'mensaje'])->name('mensaje');

     Route::resource('categorias',\App\Http\Controllers\categorias::class)->names('categorias');
     Route::resource('subcategorias',\App\Http\Controllers\subcategorias::class)->names('subcategorias');
     /* Route::get('user/perfil',[usuarios::class,'perfil_edit'])->name('perfil.edit');
     Route::put('user/perfil/update',[usuarios::class,'perfil_update'])->name('perfil.update'); */
});
