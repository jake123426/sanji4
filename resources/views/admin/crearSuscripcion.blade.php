@extends('adminlte::page')

@section('title', 'SANJI')

@section('content_header')
    <a class="btn crear btn-md float-right border border-secondary "
        href="{{ route('gestionarSuscripcion.index') }}">Volver</a>
    <h1 class="titulo">Suscripciones</h1>
@stop

@section('content')

    <div>
        <form action="" method="POST">
            @csrf
            <div class="card shadow formulario ">
                <div class="card-body">
                    <div class="row ">
                        <div class="col-xs-12 col-sm-12 col-md-12  info">
                            DETALLES DE LA SUSCRIPCION
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 mt-3">
                            <label for="nombre" class="form-label la">Nombre de la Suscripción</label>
                            <input type="text" name="nombre" class="form-control shadow-sm" id="nombre">
                        </div>

                        <div class="col-xs-4 col-sm-6 col-md-3 mt-3">
                            <label for="precio" class="form-label la">Precio</label>
                            <input type="number" class="form-control shadow-sm" name="precio" id="precio">
                        </div>
                        <div class="col-xs-2 col-sm-6 col-md-3 mt-3">
                            <label for="moneda" class="form-label la">Moneda</label>
                            <select class="form-select shadow-sm" name="moneda" id="moneda">
                                <option value="2">Bs.</option>
                                <option value="1">$.</option>
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 mt-3">
                            <label for="ubicacion" class="form-label la">Duracion</label>
                            <input type="text" name="ubicacion" class="form-control shadow-sm" id="ubicacion">
                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <label for="detalle" class="form-label la">Detalle de la suscripcion</label>
                            <textarea class="form-control" id="detalle" name="detalle" rows="6"></textarea>
                        </div>

                    </div>
                </div>
            </div>


            <div class="card  btnFormulario ">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary btnSub">Crear Suscripcion</button>
                </div>
            </div>
        </form>
    </div>


@stop


@section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap");

        @import url('https://fonts.googleapis.com/css2?family=Cookie&family=Cormorant:wght@600&family=Courgette&display=swap');

        :root {
            --green: #adc5ea;
            --black: #192a56;
            --light-color: #666;
            --box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }

        * {
            text-decoration: none !important;
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
            max-width: 90%;
            margin: auto;
            margin-bottom: 2rem;
            /* background: rgba(255, 255, 255, 0); */
        }

        .la {
            color: var(--green);
        }

        .btnFormulario {
            margin: auto;
            border: none;
            box-shadow: none;
            background: rgba(255, 255, 255, 0);
        }

        .btnSub {
            margin-top: -1rem;
            background: var(--black);
            border: 0px;
            border-radius: 4rem;
            padding: 0.5rem 2.5rem;
            font-size: 1.2rem;
        }

        .btnSub:hover {
            background: var(--green);
        }

        .crear {
            background: var(--black);
            color: white;
        }

        .crear:hover {
            background: #adc5ea;
            color: white;
        }

        @media (max-width: 1024px) {

            .formulario {
                max-width: 95%;
            }

        }

        @media (max-width: 760px) {
            .formulario {
                max-width: 100%;
            }

        }

        @media (max-width: 450px) {

            .formulario {
                max-width: 100%;
            }

        }

    </style>

@stop

@section('js')
    <script>
        cosole.log('Hola');
    </script>
@stop
