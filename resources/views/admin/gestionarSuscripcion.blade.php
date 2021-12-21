@extends('adminlte::page')

@section('title', 'SANJI')

@section('content_header')
    <a class="btn crear btn-md float-right border border-secondary " href="{{route('gestionarSuscripcion.create')}}">NUEVA SUSCRIPCION</a>
    <h1 class="titulo">Suscripciones</h1>
@stop

@section('content')

    <div style="border-bottom: 10rem" class="card shadow tamaño">

        <div class="card-body ">
            <!---------------- Card Start ------------------->
            <div class="table-responsive-xl">
                <table style="white-space: nowrap"  class="table  table-borderless table-hover">
                    <thead >
                        <tr class="border-bottom">
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Duración</th>
                            <th>Detalle</th>
                            <th colspan="3"></th>
                        </tr>
                    </thead>
                    <tbody  >

                        <tr  class="border-bottom">
                            <td>
                                <h5>1</h5>
                            </td>
                            <td >
                                <div>Usurio Pro</div>
                            </td>
                            <td>
                                <div>10$</div>
                            </td>
                            <td>
                                <div>1 Mes</div>
                            </td>
                            <td >
                                <div>
                                    - Mejor posicionamiento <br>
                                    - Mas busquedas <br>
                                    - Publicaiones ilimitadas <br>
                                    - Mejor posicionamiento <br>
                                    - Mas busquedas <br>
                                    - Publicaiones ilimitadas
                                </div>
                            </td>
                            <td width="10px">
                                <div><a class="btn ver btn-sm"
                                        href="#">Activar</a></div>
                            </td>
                            <td width="10px">
                                <div><a class="btn ver btn-sm"
                                        href="#">Editar</a></div>
                            </td>
                            <td width="10px">
                                <div>
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('put')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </td>

                        </tr>


                        <tr>
                            <td>
                                <h5>2</h5>
                            </td>
                            <td>
                                <div>Usurio Premiun</div>
                            </td>
                            <td>
                                <div>20$</div>
                            </td>

                            <td>
                                <div> 6 Meses</div>
                            </td>

                            <td>
                                <div>
                                    - Mejor posicionamiento <br>
                                    - Mas busquedas <br>
                                    - Publicaiones ilimitadas <br>
                                    - Mejor posicionamiento <br>
                                    - Mas busquedas <br>
                                    - Publicaiones ilimitadas
                                </div>
                            </td>
                            <td width="10px">
                                <div><a class="btn  ver btn-sm"
                                        href="#">Activar</a></div>
                            </td>
                            <td width="10px">
                                <div><a class="btn  ver btn-sm"
                                        href="#">Editar</a></div>
                            </td>
                            <td width="10px">
                                <div>
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('put')
                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>

        </div>


        <!---------------- Card End ------------------->

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
        table{
            font-family: "Nunito", sans-serif;
            /* font-size: 1.4rem; */
        }
        tbody tr td{
            vertical-align: middle !important;
        }

        .ver {
            color: white;
            background: var(--black);
        }

        .ver:hover {
            border: 1px solid var(--green);
            color: white;
            background: var(--green);
        }

        .crear{
            background: var(--black);
            color: white;
        }
        .crear:hover{
            background: #adc5ea;
            color: white;
        }
    </style>

@stop

@section('js')
    <script>
        cosole.log('Hola');
    </script>
@stop
