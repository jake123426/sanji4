<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Perfil;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class usuarios extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.usuarios');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRol(Request $request, User $id)
    {
        $rol = 0;
        switch ($request->rol) {
            case 'admin':
                $rol = 1;
                break;
            case 'basico':
                $rol = 2;
                break;
            case 'premium':
                $rol = 3;
                break;
        }

        $date = date('H:i:s');
        Bitacora::create(['nombre'=>auth()->user()->name,'accion'=>'Actualizar Rol','descripcion'=>'El Administrador Actualizo El Rol' ,'hora'=>$date,'fecha'=>date('Y-m-d'),'user_id'=>auth()->user()->id,]);
        $id->roles()->sync($rol);

        /* $usuario = $id;
        $roles = Role::whereNotIn('name', [$id->roles()->first()->name])->pluck('name');
        $perfil = $id->perfil; */

        return redirect()->route('userss.show', compact('id'))->with('info', 'Se actualizó el rol con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = User::find($id);
        $roles = Role::whereNotIn('name', [$usuario->roles()->first()->name])->pluck('name');
        $perfil = $usuario->perfil;

        return view('user.detalle-usuario', compact('usuario', 'perfil', 'roles' ));
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
    public function update($id)
    {
        $usuario = User::find($id);
        $usuario->status = false;
        $usuario->update();

        return redirect()->route('userss.index');
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

    public function cuenta()
    {
        $usuario = auth()->user();

        return view('admin.usuario-cuenta', compact('usuario'));
    }
    public function cuentaStore(Request $request, User $id)
    {
        $request->validate([
            'name'      =>  'required|string|max:40',
            'email'     =>  'required|email|max:30',
            'password'  =>  'required|current_password',
            'nuevaContraseña'     => 'required|same:confirmarContraseña|max:20',
            'confirmarContraseña' => 'required|max:20',
            'file' => 'required'
        ]);

            $imagen = $request->file('file');
            $nombre = $imagen->store('public/perfiles');

        $id->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->nuevaContraseña),
            'url' => $nombre
        ]);



        return redirect()->route('userss.cuenta')->with('info', 'Se actualizó la cuenta con éxito');
    }
    public function perfil()
    {
        $usuario = auth()->user();
        $perfil = $usuario->perfil;
        /* return $perfil; */
        return view('admin.usuario-perfil', compact('usuario', 'perfil'));
    }
    public function perfilStore(Request $request)
    {
        $usuario = auth()->user();
        $perfil = $usuario->perfil;

        $request->validate([
            'Descripcion'      =>  'required|max:100',
            'Telefono'     =>  'required',
            'FechaNacimiento'  =>  'required',
            'Direccion'     => 'required',
            'Empresa' => 'required|max:20',
            'Horario' => 'required'
        ]);

        $perfil->update([
            'Descripcion'      =>  $request->Descripcion,
            'Telefono'     =>  $request->Telefono,
            'FechaNacimiento'  =>  $request->FechaNacimiento,
            'Direccion'     => $request->Direccion,
            'Empresa' => $request->Empresa,
            'Horario' => $request->Horario
        ]);
        return redirect()->route('userss.perfil')->with('info', 'Se actualizó el perfil con éxito');
    }
}
