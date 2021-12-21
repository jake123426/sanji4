<div style="border-radius: 1rem" class="card shadow tamaño">
    <div style="text-align: end" class="card-header">

        <a  href="{{ route('bitacora.index') }}" class="btn ver  ">Volver</a>

    </div>
    <div style="border: none; background: transparent;" class="card-header ">

        <input type="text" style="border-radius: 1rem; margin-top: 1rem" class="form-control"
            placeholder="Ingrese La Accion Del Usuario" wire:model="search">

    </div>
    @if ($bitacoras->count())
        <div class="card-body ">

            <!---------------- Card Start ------------------->
            <div style="white-space: nowrap; overflow-x: auto" class="table-responsive-xl">
                <table class="table table-striped table-borderless table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Accion</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Hora</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($bitacoras as $bitacora)
                            <tr>
                                <td>
                                    @isset($usuario->url)
                                        <img class="imagen" src="{{ asset(Storage::url($usuario->url)) }}" alt="">
                                    @else
                                        <img class="imagen"
                                            src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" alt="">
                                    @endisset
                                <td>
                                    <div class="contenido">{{ $bitacora->nombre }}</div>
                                </td>
                                <td>
                                    <div class="contenido">{{ $bitacora->accion }}</div>
                                </td>
                                <td>
                                    <div class="contenido">{{ $bitacora->descripcion }}</div>
                                </td>
                                <td>
                                    <div class="contenido">{{ $bitacora->fecha }}</div>
                                </td>
                                <td>
                                    <div class="contenido">{{ $bitacora->hora }}</div>
                                </td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        <div style="border: none; background: transparent; margin-left: 1rem" class="card-footer ">



            <!---------------- Card End ------------------->
        @else
            <div class="card-body ">
                <strong>No hay ningun registro</strong>
            </div>
    @endif


</div>
