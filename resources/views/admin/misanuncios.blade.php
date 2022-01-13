@extends('adminlte::page')

@section('title', 'SANJI')

@section('content_header')
    <h1 class="titulo">Tus Publicaciones</h1>

@stop

@section('content')

    @livewire('admin.misanuncios')

@stop


@section('css')

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"> --}}



    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&display=swap");
        @import url('https://fonts.googleapis.com/css2?family=Caveat&family=Cookie&display=swap');

        * {
            text-decoration: none !important;
        }


        :root {
            --green: #adc5ea;
            --black: #192a56;
            --light-color: #666;
            --box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.1);
        }

        .tamaño {
            max-width: 90%;
            margin: auto;
        }

        /* --------------------------------------------------------------------------------------------- */

        .descripcion {
           /*  font-family: 'Cookie', cursive; */
            /* font-size: 140%; */
            display: -webkit-box;
            -webkit-line-clamp: 4;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .card-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--black);
        }

        .precio {
            font-size: 1.2rem;
            font-weight: 400;
            color: var(--black);
            border: 1px solid rgb(209, 209, 209);
            border-radius: 1rem;
            text-align: center;
            font-weight: 700;
            box-shadow: 0px 0px 5px 2px rgb(209, 209, 209)

        }

        .card-block {
            font-size: 1rem;
            height: 100%;
            position: relative;
            margin: 0;
            padding: 1em;
            border: none;
            border-top: 1px solid rgba(34, 36, 38, .1);
            box-shadow: none;
            max-width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* align-items: center; */
        }
        .opciones{
            display: grid;
            grid-template-columns: auto auto auto;
            justify-content: space-evenly;
            align-content: center;
            grid-gap: 10px;
        }


        .imagen-container {
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            /* align-items: center; */

        }


        .imagen {
            border-radius: 0.5rem;
            object-fit: cover;
            max-width: 100%;
            min-width: 100%;
            max-height: 100%;
            min-height: 100%;
            width: 500px;
            height: 300px;
        }
        .boton-eli{
            background: red !important;
            grid-row: 1 / 2;

            /* line-height: 6rem; */
        }
        .boton-eli.btn:hover{
            background: rgb(255, 170, 170) !important;
        }

        .boton {
            background: #485477;
            border: none;
            font-weight: 500;
        }

        .boton:hover {
            background: var(--green);
            color: black;

        }


        .carousel-indicators li {
            border-radius: 50%;
            width: 12px;
            height: 12px;
            background-color: #000000;
        }



        .carousel-indicators .active {
            background-color: white;
            max-width: 12px;
            margin: 0 3px;
            height: 12px;
        }

        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E") !important;
        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23fff' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E") !important;
        }

        .container {
            max-width: 95%;
        }

        /* Radio Buttom */
        .radios {
            display: flex;
            justify-content: space-around;
            align-items: center;

        }

        input[type="radio"] {
            display: none;
        }

        .card-header label {
            display: inline-block;
            background-color: #8f9bbb;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 1rem;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.5s;
        }

        input[type="radio"]:checked+label {
            background-color: #344674;
            /* outline: 0.2rem solid #8f9bbb;
            outline-offset: 0.2rem; */
            font-size: 1.1rem;
            padding: 1rem 1rem;
        }



        /* Radio Buttom End */
        /* -------------------------------------------------------------------------------------------- */
        @media (max-width: 1500px) {
            .tamaño {
                max-width: 100%;
            }

            .container {
                max-width: 100%;
            }

        }

        @media (max-width: 760px) {

            .tamaño {
                max-width: 100%;
            }


            .card{
                max-width: 100%;
                margin: 0;
                padding: 0;
            }
            .content , .container-fluid{
                padding: 0 !important;
            }
            .container {
                max-width: 100%;
                padding: 0;

            }

            .radios{
                padding: 0 !important;
            }
            .card-body{
                padding: 0 !important;
            }
        }

        @media (max-width: 450px) {

            .tamaño {
                max-width: 100%;
            }

            .container {
                max-width: 100%;

            }


        }

    </style>

@stop

@section('js')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script>
        console.log('Hola');
    </script>
@stop
