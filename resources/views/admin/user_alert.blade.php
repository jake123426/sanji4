@extends('adminlte::page')

@section('title', 'SANJI')

@section('content_header')
    {{-- <a class="btn crear btn-md float-right border border-secondary "
        href="{{ route('gestionarSuscripcion.index') }}">Volver</a> --}}
    <h1 class="titulo">Reportes</h1>
@stop

@section('content')

@livewire('admin.user-alert')
    <p><br></p>
@stop


@section('css')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap");

        :root {
            --green: #adc5ea;
            --black: #192a56;
            --light-color: #666;
            --box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }

        * {
            text-decoration: none !important;
        }

        .tamaño {
            max-width: 80%;
            margin: auto;
        }

        h1 {
            color: var(--black);
        }

        .imagen {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        thead tr th {
            color: var(--black);
            font-size: 1.2rem;
        }

        .contenido {
            margin-top: 0.5rem;
            height: 100%;
            width: 100%;
        }



        #area{
            max-width: 100%;
            min-width: 100%;
            resize: none;
            border: 1px solid rgb(190, 190, 190);
            border-radius: 0.5rem;
            padding: 1rem;

        }

        .card {
            border-radius: 2rem;

        }

        .ver {
            color: white;
            background: var(--black);


        }

        .ver:hover {
            color: white;
            background: var(--green);
        }

        .tabla{
            overflow: auto;
        }

        .area{
            resize: none;
            padding: 0.2rem 0.3rem;
            border: 1px solid rgb(185, 185, 185);
            border-radius: 0.5rem;
        }
        .area:hover{
            cursor: default;
        }

        /* -------------------------------------------------------------------------------------------- */
        @media (max-width: 1500px) {
            .tamaño {
                max-width: 95%;
            }
        }

        @media (max-width: 760px) {

            .tamaño {
                max-width: 95%;
            }
        }

        @media (max-width: 450px) {

            .tamaño {
                max-width: 100%;
            }
            .content , .container-fluid{
                padding: 0 !important;
            }
            .container {
                max-width: 100%;
                padding: 0;

            }
        }



    </style>

@stop

@section('js')
    <script>
        console.log('Hola');
    </script>
@stop
