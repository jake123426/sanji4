<div>
    <div  class="card shadow tamaño">
        <div class="card-body ">
            <div class="row">
                @foreach ($anuncios as $anuncio )
                <div class="col-xs-4 col-md-6 col-sm-12 col-lg-4  ">
                    <div  class="card">

                        <div class="card-body">



                            <a  href="{{ route('anuncios.show', [ $anuncio->id]) }}">
                                <i class="fas fa-heart fa-2x corazon"></i>
                                <img class="imagen" src="{{ asset(Storage::url($anuncio->imagen()->first()->url)) }}" alt=""  />
                            </a>
                        </div>
                        <div  class="card-footer descripcion">
                            <div class="name">{{$anuncio->nombre}}</div>
                            <div class="price">{{$anuncio->precio}} Bs</div>

                            <a  class="delete" href="{{ route('borrar.nogusta',[ $anuncio->id]) }}" >Eliminar</a>
                        </div>
                    </div>
                </div>

                @endforeach

            </div>

        </div>
    </div>
</div>
