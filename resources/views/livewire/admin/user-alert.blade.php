<div class="card shadow tamaño">
    <div style="border: none; background: transparent;" class="card-header ">

        <input type="text" style="border-radius: 1rem; margin-top: 1rem" class="form-control"
            placeholder="Ingrese el nombre se usuario" wire:model="search">

    </div>
    @if ($usuarios->count())
        <div class="card-body ">

            <!---------------- Card Start ------------------->
            <div style="white-space: nowrap" class="table-responsive">
                <table class="table table-borderless table-hover tabla">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Denunciante</th>
                            <th></th>
                            <th>Denunciado</th>

                            <th>Anuncio</th>
                            <th>Mensage</th>
                            <th>Fecha</th>
                            {{-- <th ></th> --}}
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>
                                    @isset($usuario->url_nombre)
                                        <img class="imagen" src="{{ asset(Storage::url($usuario->url)) }}" alt="">
                                    @else
                                        <img class="imagen"
                                            src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" alt="">
                                    @endisset
                                </td>

                                <td>
                                    <div class="contenido">{{ $usuario->nombre }}</div>
                                </td>

                                <td>
                                    @isset($usuario->url_nombre)
                                        <img class="imagen"
                                            src="{{ asset(Storage::url($usuario->url_reportado)) }}" alt="">
                                    @else
                                        <img class="imagen"
                                            src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" alt="">
                                    @endisset
                                </td>

                                <td>
                                    <div class="contenido">{{ $usuario->nombre_reportado }}</div>
                                </td>

                                <td>
                                    <div class="contenido">{{ $usuario->anuncio }}</div>
                                </td>

                                <td>
                                    <textarea class="area" readonly cols="50" rows="3">{{ $usuario->reporte }}</textarea>
                                </td>

                                <td>
                                    <div class="contenido">{{ $usuario->fecha }}</div>
                                </td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
        <div style="border: none; background: transparent; margin-left: 1rem" class="card-footer ">
            {{ $usuarios->links() }}
        </div>

        <!---------------- Card End ------------------->
    @else
        <div class="card-body ">
            <strong>No hay ningun registro</strong>
        </div>
    @endif
</div>
