@extends('adminlte::page')

@section('title', 'SANJI')

@section('content_header')
    <h1 class="titulo">Usuario Registrado</h1>

@stop

@section('content')
    @if (session('info'))
        <div style="position: absolute" class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif

    <div class="card shadow formulario ">
        <div class="card-body">
            <div class="row ">
                <div class="col-xs-12 col-sm-12 col-md-12 info">
                    INFORMACIÓN DEL USUARIO
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 img">
                    <label for="perfil" class="form-label la">Foto de Perfil:</label>
                    @isset($usuario->url)
                        <img class="imagen" src="{{ asset(Storage::url($usuario->url)) }}" alt="">
                    @else
                        <img class="imagen" src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png"
                            alt="">
                    @endisset
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <label for="nombre" class="form-label la">Nombre Completo:</label>
                    <input type="text" readonly class="form-control shadow-sm" id="nombre" value="{{ $usuario->name }}">
                </div>
                <div class="col-xs-6 col-sm-12 col-md-6 mt-3">
                    <label for="correo" class="form-label la">Correo:</label>
                    <input type="text" readonly class="form-control shadow-sm" id="correo" value="{{ $usuario->email }}">
                </div>
                <div class="col-xs-4 col-sm-6 col-md-4 mt-3">
                    <label for="nacimiento" class="form-label la">Fecha de Nacimiento:</label>
                    <input type="text" class="form-control shadow-sm" readonly id="nacimiento"
                        value="{{ $perfil->FechaNacimiento }}">
                </div>
                <div class="col-xs-2 col-sm-6 col-md-2 mt-3">
                    <label for="telefono" class="form-label la">Telefono:</label>
                    <input type="text" class="form-control shadow-sm" readonly id="telefono" value="69102452">
                </div>
                <div class="col-xs-6 col-sm-12 col-md-6 mt-3">
                    <label for="direccion" class="form-label la">Direccion</label>
                    <input type="text" class="form-control shadow-sm" readonly id="direccion"
                        value="{{ $perfil->Direccion }}">
                </div>
                <div class="col-xs-6 col-sm-12 col-md-6 mt-3">
                    <label for="empresa" class="form-label la">Nombre de la Empresa</label>
                    <input type="text" class="form-control shadow-sm" readonly id="empresa" value="SANJI S.A.">
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center" class="card shadow formulario">
        <form action="{{ route('userss.storeRol', $usuario) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <label style="text-align: start" for="rol" class="form-label la">Rol del Usuario:</label>
                <select name="rol" style="margin: auto" id="rol" class="form-control shadow-sm selec">
                    <option>{{ $usuario->roles()->first()->name }}</option>
                    @foreach ($roles as $role)
                        <option>{{ $role }}</option>
                    @endforeach
                </select>
                <input class="botonSub" type="submit" value="Actualizar Rol">
            </div>
        </form>

    </div>
    <div class="card  btnFormulario ">
        <div class="card-body">
            <a href="{{ route('userss.index') }}" class="btn btn-primary btnSub">Volver</a>
        </div>
    </div>

@stop


@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" /> --}}

    <link rel="stylesheet" type="text/css"
        href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap");

        :root {
            --green: #adc5ea;
            --black: #192a56;
            --light-color: #666;
        }

        * {
            text-decoration: none !important;
        }

        form {
            display: inline-block;
        }

        .selec {

            max-width: 50%;
            font-weight: 700;
            color: var(--black);
        }

        .titulo {
            color: var(--black);
        }

        .info {
            color: var(--black);
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .formulario {
            max-width: 60%;
            margin: auto;
            margin-bottom: 2rem;
            /* background: rgba(255, 255, 255, 0); */
        }

        .la {
            color: var(--green);
        }

        .btnFormulario {
            max-width: 60%;
            margin: auto;
            border: none;
            box-shadow: none;
            background: rgba(255, 255, 255, 0);
        }

        .botonSub {
            margin-top: 1rem;
            display: inline-block;
            color: white;
            background: var(--black);
            border: none;
            border-radius: 4rem;
            padding: 0.2rem 1.2rem;
            font-size: 1.2rem;
        }

        .btnSub {
            /* margin-top: 1.5rem; */
            background: var(--black);
            border: 0px;
            border-radius: 4rem;
            padding: 0.8rem 2rem;
            font-size: 1.5rem;
        }

        .btnSub:hover {
            background: var(--green);
        }

        .img {
            text-align: center;
            /* display: flex;
                            justify-content: space-evenly;
                            align-items: center; */
        }

        .imagen {
            margin-left: 2rem;
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }



        @media (max-width: 1024px) {

            .formulario {
                max-width: 95%;
            }

        }

        @media (max-width: 760px) {

            .tags-input {
                /* nuevo */
                height: 9.3rem;
            }

        }

        @media (max-width: 450px) {

            .formulario {
                max-width: 80%;
            }

            .tags-input {
                /* nuevo */
                height: 9.3rem;
            }
        }

    </style>

@stop

@section('js')

    <script>
        $(function() {
            var timeout = 2000;
            $('.alert').delay(timeout).fadeOut(400);
        });
    </script>
@stop
