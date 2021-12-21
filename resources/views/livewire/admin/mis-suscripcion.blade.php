<div class="card shadow tamaño">
    <div style="border: none; background: transparent;" class="card-header ">

        <input type="text" style="border-radius: 1rem; margin-top: 1rem" class="form-control"
            placeholder="Ingrese el nombre se usuario" wire:model="search">

    </div>
    @if ($suscripciones->count() > 0)
        <div class="card-body ">

            <!---------------- Card Start ------------------->
            <div style="white-space: nowrap" class="table-responsive-xl">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>

                            <th>Nombre</th>
                            <th>Numero De Tarjeta</th>
                            <th>Fecha de Tarjeta</th>
                            <th>Fecha de Inicio</th>
                            <th>Fecha de Finalizacion</th>
                            <th colspan="2"></th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($suscripciones as $suscripcion)
                            <tr>

                                <td>
                                    <div class="contenido">{{ $suscripcion->nombre }}</div>
                                </td>

                                <td>
                                    <div class="contenido">{{ $suscripcion->numero_tarjeta }}</div>
                                </td>

                                <td>
                                    <div class="contenido">{{ $suscripcion->fecha_tarjeta }}</div>
                                </td>

                                <td>
                                    <div class="contenido">{{ $suscripcion->fecha_inicio }}</div>
                                </td>
                                <td>
                                    <div class="contenido">{{ $suscripcion->fecha_fin }}</div>
                                </td>

                                <td>
                                    <div class="contenido"><a class="btn ver btn-sm"
                                            href="{{ route('suscripcion_factura', $suscripcion->id) }}">Ver
                                            Factura</a></div>


                                </td>
                                <td>
                                    <div class="contenido"><a class="btn ver btn-sm"
                                            href="{{ route('suscripcion_descargar', $suscripcion->id) }}">Descargar
                                            Factura</a></div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>


        <!---------------- Card End ------------------->
    @else
        <div class="card-body ">
            <strong>No hay ningun registro</strong>
        </div>
    @endif
</div>
