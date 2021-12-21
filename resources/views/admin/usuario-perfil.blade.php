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
            <form action="{{ route('userss.perfilStore') }}" method="POST" >
                @csrf
                @method('PUT')

                <div class="row ">
                    <div class="col-xs-12 col-sm-12 col-md-12 info">
                        INFORMACIÓN DEL PERFIL
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 img">
                        <label for="perfil" class="form-label la">Foto de Perfil:</label>
                        {{-- <img id="picture" class="imagen" src="{{ Storage::url($usuario->url) }}" alt="" > --}}
                        @if ($usuario->url==null)
                        <img class="imagen" id="picture"
                        src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                        @else
                        <img class="imagen" id="picture" src="{{Storage::url($usuario->url) }}" alt="" />
                        @endif

                    </div>

                    <div class="col-xs-6 col-sm-12 col-md-6 ">
                        <label for="nombre" class="form-label la">Nombre Completo:</label>
                        <input readonly type="text" class="form-control shadow-sm" id="nombre"
                            value="{{ $usuario->name }}">

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <label for="descripcion" class="form-label la">Descripcion:</label>
                        <input name="Descripcion" type="text" class="form-control shadow-sm" id="descripcion"
                            value="{{ $perfil->Descripcion }}">
                        @error('Descripcion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xs-4 col-sm-12 col-md-4 mt-3">
                        <label for="telefono" class="form-label la">Telefono:</label>
                        <input name="Telefono" type="number" class="form-control shadow-sm" id="telefono"
                            value="{{ $perfil->Telefono }}">
                        @error('Telefono')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xs-4 col-sm-12 col-md-4 mt-3">
                        <label for="fecha" class="form-label la">Fecha de Nacimiento:</label>
                        <input name="FechaNacimiento" type="date" class="form-control shadow-sm" id="fecha"
                            value="{{ $perfil->FechaNacimiento }}">
                        @error('FechaNacimiento')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xs-4 col-sm-12 col-md-4 mt-3">
                        <label for="hora" class="form-label la">Horario de atención:</label>
                        <input name="Horario" type="text" class="form-control shadow-sm" id="hora"
                            value="{{ $perfil->Horario }}">
                        @error('Horario')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-6 mt-3">
                        <label for="direc" class="form-label la">Dirección:</label>
                        <input name="Direccion" type="text" class="form-control shadow-sm" id="direc"
                            value="{{ $perfil->Direccion }}">
                        @error('Direccion')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xs-6 col-sm-12 col-md-6 mt-3">
                        <label for="emp" class="form-label la">Empresa:</label>
                        <input name="Empresa" type="text" class="form-control shadow-sm" id="emp"
                            value="{{ $perfil->Empresa }}">
                        @error('Empresa')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                </div>
                <input class="botonSub" type="submit" value="Actualizar Datos del Perfil">
            </form>
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
