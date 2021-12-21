<div>
    <div class="card shadow tamaño">
        <div class="card shadow-none border-0">
            <div class="card-body">
                <input class="form-control" placeholder="Ingrese el nombre de un anuncio" wire:model="search">
            </div>

        </div>
        <div style="height: 7rem" class="card-header radios">

            <input type="radio" name="Estado" id="Publicandose" value="Publicandose" wire:model="tipo" checked>
            <label for="Publicandose">Publicandose</label>

            <input type="radio" name="Estado" id="Vendidos" value="Vendido" wire:model="tipo">
            <label for="Vendidos">Vendidos</label>

            <input type="radio" name="Estado" id="Inactivos" value="Inactivo" wire:model="tipo">
            <label for="Inactivos">Inactivos</label>

        </div>

        @if ($anuncios->count())

            <div class="card-body ">
                <div class="container py-3">
                    @foreach ($anuncios as $anuncio)
                        <!---------------- Card Start ------------------->
                        <div class="card">
                            <div class="row ">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 ">
                                    <div class="card-block px-6">
                                        <h4 class="card-title">{{ $anuncio->nombre }}</h4>
                                        <p class="card-text descripcion">
                                            {{ $anuncio->descripcion }}
                                            Tal es así que la novela histórica de Jack el Destripador al día de hoy
                                            sigue
                                            vigente. Hablar de Jack cuando se habla de criminales homicidas famosos es
                                            casi
                                            una obligación, como así también lo es evocarlo a nuestro criollo Petiso
                                            Orejudo.
                                        </p>
                                        <p class="card-text precio">{{ $anuncio->precio }} {{ $anuncio->moneda }}
                                        </p>

                                        <a class="btn btn-primary mt-2"
                                            href="{{ route('anuncios.edit', [$anuncio->id]) }}">Editar</a>


                                        @if ($tipo == 'Publicandose')

                                            <a class="btn btn-primary mt-2"
                                                href="{{ route('anuncios.show', [$anuncio->id]) }}  ">Ir a
                                                publicacion</a>

                                        @endif


                                        <a class="btn btn-primary boton-eli mt-2"
                                            href="{{ route('eliminar.borrar', [$anuncio->id]) }}">Eliminar</a>


                                        @if ($tipo == 'Publicandose')
                                            <div class="btn btn-primary  mt-2"
                                                wire:click="status_anuncio({{ $anuncio->id }}, 'vendido')">
                                                Marcar como vendido</div>
                                        @endif

                                        @if ($tipo == 'Vendido' or $tipo == 'Inactivo')
                                            <div class="btn btn-primary  mt-2"
                                                wire:click="status_anuncio({{ $anuncio->id }}, 'publicandose')">
                                                Publicar</div>
                                        @endif

                                        @if ($tipo !== 'Inactivo')
                                            <div class="btn btn-primary  mt-2"
                                                wire:click="status_anuncio({{ $anuncio->id }}, 'inactivo')">
                                                Marcar como Inactivo</div>
                                        @endif


                                        {{-- <h6> Cambie El Estado De Su
                                        Publicacion Con un Solo Click</h6>

                                    @if ($anuncio->status == 2)
                                        <button style="color: red" wire:click="status_anuncio({{ $anuncio->id }})">
                                            Vendido</button>
                                    @else
                                        <button style="color: greenyellow"
                                            wire:click="status_anuncio({{ $anuncio->id }})"> Vendiendo </button>
                                    @endif --}}


                                    </div>
                                </div>

                                <!-- Carousel start -->
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 imagen-container">
                                    <div id="CarouselTest{{ $loop->iteration }}" class="carousel slide"
                                        data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#CarouselTest{{ $loop->iteration }}" data-slide-to="0"
                                                class="active"></li>
                                            <li data-target="#CarouselTest{{ $loop->iteration }}" data-slide-to="1">
                                            </li>
                                            <li data-target="#CarouselTest{{ $loop->iteration }}" data-slide-to="2">
                                            </li>

                                        </ol>

                                        <div class="carousel-inner ">
                                            @foreach ($anuncio->imagen()->get() as $imagen)

                                                <div class="carousel-item  @if ($loop->first) active  @endif">
                                                    <img class="d-block imagen"
                                                        src="{{ asset(Storage::url($imagen->url)) }}" alt="">
                                                </div>

                                            @endforeach

                                            <a class="carousel-control-prev"
                                                href="#CarouselTest{{ $loop->iteration }}" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next"
                                                href="#CarouselTest{{ $loop->iteration }}" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End of carousel -->
                                </div>
                            </div>
                            <br>
                        </div>
                        <!---------------- Card End ------------------->
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                {{ $anuncios->links() }}
            </div>
        @else
            <div class="card-body">
                <strong>No hay ningun anuncio</strong>
            </div>
        @endif
    </div>
