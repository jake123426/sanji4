@extends('adminlte::page')

@section('title', 'SANJI')

@section('content_header')
    <h1 class="titulo">Suscripciones</h1>
@stop

@section('content')
    @livewire('admin.mis-suscripcion')
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

        /* --------------------------------------------------------------------------------------------- */

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

            /* justify-content: center;
                            align-items: center; */
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



        /* -------------------------------------------------------------------------------------------- */
        @media (max-width: 1500px) {
            .tamaño {
                max-width: 90%;
            }
        }

        @media (max-width: 760px) {

            .tamaño {
                max-width: 95%;
            }

            .content,
            .container-fluid {
                padding: 0 !important;
            }

            .container {
                max-width: 100%;
                padding: 0;

            }
        }

        @media (max-width: 450px) {

            .tamaño {
                max-width: 100%;
            }
        }

    </style>

@stop

@section('js')
    <script>
        console.log('Hola');
    </script>
@stop
