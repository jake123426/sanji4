@extends('adminlte::page')

@section('title', 'SANJI')

@section('content_header')
    <h1 class="titulo">Tus Opiniones</h1>

@stop

@section('content')

@livewire('admin.opiniones')


@stop


@section('css')

    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"> --}}
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap");


        :root {
            --green: #adc5ea;
            --black: #192a56;
            --light-color: #666;
            --box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }


        .tamaño {
            max-width: 80%;
            margin: auto;
        }

        /* ---------------------/-------------------------------------------- */
        .nombre{
            font-size: 1.7rem;
            color: var(--black);
            font-weight: 700;
        }
        .estrella{
            color: rgb(199, 169, 0);
        }
        @media (min-width: 0) {
            .g-mr-15 {
                margin-right: 1.07143rem !important;
            }
        }

        @media (min-width: 0) {
            .g-mt-3 {
                margin-top: 0.21429rem !important;
            }
        }

        .g-height-50 {
            height: 50px;
        }

        .g-width-50 {
            width: 50px !important;
        }

        @media (min-width: 0) {
            .g-pa-30 {
                padding: 2.14286rem !important;
            }
        }

        .g-bg-secondary {
            background-color: #fafafa !important;
        }

        .u-shadow-v18 {
            box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
        }

        .g-color-gray-dark-v4 {
            color: #777 !important;
        }

        .g-font-size-12 {
            font-size: 0.85714rem !important;
        }

        .media-comment {
            margin-top: 20px
        }

        @media (max-width: 1500px) {
            .tamaño {
                max-width: 90%;
            }
        }

        @media (max-width: 760px) {

            .tamaño {
                max-width: 95%;
            }
        }

        @media (max-width: 450px) {

            .tamaño {
                max-width: 95%;
            }
        }
        /* ---------------------/-------------------------------------------- */



    </style>

@stop

@section('js')

    <script>
        console.log('Hola');
    </script>
@stop
