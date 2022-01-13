@extends('adminlte::page')

@section('title', 'SANJI')

@section('content_header')
    <h1 class="titulo">Tus Favoritos</h1>

@stop

@section('content')


@livewire('admin.favoritos')



@stop


@section('css')
@livewireStyles
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"> --}}

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap");


        :root {
            --green: #adc5ea;
            --black: #192a56;
            --light-color: #666;
            --box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }

        *{
            text-decoration: none !important;
        }

        .tamaño {
            max-width: 80%;
            margin: auto !important;
        }
        .corazon{
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            color: var(--black);
            padding: 0.5rem;
            border-radius: 50%;
            background: white;
        }
        .imagen {
            width: 100%;
            object-fit: cover;
            height: 300px;
        }

        .descripcion {
            /* font-family: 'Cookie', cursive; */
            text-align: center;
            color: var(--black);
            font-size: 150%;
        }

        .delete {
            margin: auto;
            display: block;
            border-radius: 1.5rem;
            max-width: 80%;
            background-color: var(--black);
            color: white;
            text-decoration: none;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }

        .delete:hover {
            color: white;
            background-color: var(--green);
        }

        @media (max-width: 1500px) {
            .tamaño{
                max-width: 85%;
            }
        }

        @media (max-width: 760px) {

            .tamaño{
                max-width: 90%;
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

            .tamaño{
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
