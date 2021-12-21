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
            <form action="{{ route('userss.cuentaStore', $usuario) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row ">
                    <div class="col-xs-12 col-sm-12 col-md-12 info">
                        INFORMACIÓN DEL USUARIO
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 img">
                        <label for="perfil" class="form-label la">Foto de Perfil:</label>
                        {{-- <img id="picture" class="imagen" src="{{ Storage::url($usuario->url) }}" alt="" > --}}
                        @if ($usuario->url==null)
                        <img class="imagen" id="picture"
                        src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Image Description">
                        @else
                        <img class="imagen" id="picture" src="{{ asset(Storage::url($usuario->url))  }}" alt="" />
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 imgUser">

                        <input type="file"  id="imageU" name="file" accept="image/*">

                    </div>
                    @error('file')
                    <div style="text-align: center">
                        <span  class="text-danger">{{ $message }}</span>
                    </div>

                    @enderror
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <label for="nombre" class="form-label la">Nombre Completo:</label>
                        <input name="name" type="text" class="form-control shadow-sm" id="nombre"
                            value="{{ $usuario->name }}">
                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <label for="correo" class="form-label la">Correo:</label>
                        <input name="email" type="text" class="form-control shadow-sm" id="correo"
                            value="{{ $usuario->email }}">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <label for="contraseña" class="form-label la">Contraseña Actual:</label>
                        <input name="password" type="password" class="form-control shadow-sm" id="contraseña">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <label for="newPassword" class="form-label la">Nueva Contraseña:</label>
                        <input name="nuevaContraseña" type="password" class="form-control shadow-sm" id="newPassword">
                        @error('nuevaContraseña')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                        <label for="confirmar" class="form-label la">Confirmar Contraseña:</label>
                        <input name="confirmarContraseña" type="password" class="form-control shadow-sm" id="confirmar">
                        @error('confirmarContraseña')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>
                <input class="botonSub" type="submit" value="Actualizar Datos">
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

        .imgUser {
            display: inline-block;
            margin: 1rem 0rem;
            text-align: center;
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

        document.getElementById("imageU").addEventListener('change', cambiarImagen);

        function cambiarImagen(event) {
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }
    </script>
@stop
