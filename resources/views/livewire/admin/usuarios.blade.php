<div style="border-bottom: 10rem" class="card shadow tamaño">
    <div style="border: none; background: transparent;" class="card-header ">

        <input type="text" style="border-radius: 1rem; margin-top: 1rem" class="form-control"
            placeholder="Ingrese el nombre se usuario" wire:model="search">

    </div>
    @if ($usuarios->count())
        <div class="card-body ">

            <!---------------- Card Start ------------------->
            <div class="table-responsive-xl">
                <table style="white-space: nowrap"   class="table  table-borderless table-hover ">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Fecha de Registro</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>
                                    @isset($usuario->url)
                                        <img class="imagen" src="{{ Storage::url($usuario->url) }}" alt="">
                                    @else
                                        <img class="imagen"
                                            src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" alt="">
                                    @endisset
                                </td>
                                <td>
                                    <div class="contenido">{{ $usuario->name }}</div>
                                </td>
                                <td>
                                    <div class="contenido">{{ $usuario->email }}</div>
                                </td>
                                <td>
                                    <div class="contenido">{{ $usuario->created_at }}</div>
                                </td>
                                <td width="10px">
                                    <div class="contenido"><a class="btn ver btn-sm"
                                            href="{{ route('userss.show', $usuario->id) }}">Ver</a></div>
                                </td>

                                <td width="10px">
                                    <div class="contenido">
                                        <form action="{{ route('userss.update', $usuario->id) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                        </form>
                                    </div>
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
