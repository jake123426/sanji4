<div>



    <section class="navbar">
        <div style="display: flex">
            <div class="search-container">
                <input type="text" placeholder="Buscar..." class="search-input" aria-autocomplete="none"
                    wire:model="search" class="search-btn" />
                <i class="fas fa-search fa-lg"></i>
                </a>
            </div>
        </div>
        <div class="options-container">
            <a style="display: none;" href="#" class="modal__bg"></a>

            <div class="option-item">
                <a onclick="miFuncion(this)" class="op" href="#">Categoria <i
                        class="fas fa-angle-down"></i></a>
                <div style="display: none;" class="contenedor">
                    <div class="contenedor-title">Categorias</div>

                    <div class="contenedor-body">
                        <a href="{{ route('categorias.show', [1]) }}"><i class="fas fa-car fa-lg"></i> Coches</a>
                        <a href="{{ route('categorias.show', [2]) }}"><i class="fas fa-motorcycle fa-lg"></i>
                            Motos</a>
                        <a href="{{ route('categorias.show', [3]) }}"><i class="fas fa-wrench fa-lg"></i> Motor y
                            Accesorios</a>
                        <a href="{{ route('categorias.show', [4]) }}"><i class="fas fa-basketball-ball fa-lg"></i>
                            Deporte y Ocio</a>
                        <a href="{{ route('categorias.show', [5]) }}"><i class="fas fa-home fa-lg"></i>
                            Inmoviliaria</a>
                        <a href="{{ route('categorias.show', [6]) }}"><i class="fas fa-mobile-alt fa-lg"></i> Móviles
                            y Telefonía </a>
                        <a href="{{ route('categorias.show', [7]) }}"><i class="fas fa-people-carry fa-lg"></i>
                            Servicios</a>
                        <a href="{{ route('categorias.show', [8]) }}"><i class="fas fa-ellipsis-h fa-lg"></i>
                            Otros</a>
                    </div>


                    <div class="contenedor-footer">
                        <button onclick="cerrar(this)" class="botonf">Cancelar</button>
                    </div>
                </div>

            </div>


            <div class="option-item" wire:ignore>
                <a onclick="miFuncion(this)" class="op" href="#">Precio <i
                        class="fas fa-angle-down"></i></a>
                <div style="display: none;" class="contenedor">
                    <div class="contenedor-title">¿Cuanto deseas pagar?</div>
                    <div class="contenedor-body">
                        <div>
                            <p class="cont-p">Desde</p>
                            <input class="cont-input" type="number" aria-colspan="0" placeholder="Desde 100"
                                wire:model="inicio">
                        </div>
                        <div style="margin-left: 1rem;">
                            <p class="cont-p">Hasta</p>
                            <input class="cont-input" type="number" placeholder="Sin limite" wire:model="final">
                        </div>
                    </div>
                    <div class="contenedor-footer">
                        <button onclick="cerrar(this)" class="botonf">Cerrar</button>
                        <button class="botonf" wire:click="restablecer">restablecer</button>
                    </div>
                </div>
            </div>

            <div class="custom-select" wire:ignore>
                <select class="form-select shadow-sm" id="estado" name="estado" wire:model="est">
                    <option value="0">Estado del producto</option>
                    <option value="1">Nuevo</option>
                    <option value="2">Semi-nuevo</option>
                    <option value="3">En buen estado</option>
                    <option value="4">Usado</option>
                    <option value="5">Condiciones Aceptables</option>

                </select>
            </div>

        </div>

    </section>



    <section class="menu" id="menu">
        <h3 class="sub-heading">Productos o Servicios</h3>


        <div class="box-container">
            @foreach ($anuncios as $anuncio)
            @if ($anuncio->status==1)


                <div class="box">

                    <div class="image">
                        @isset($anuncio->imagen()->first()->url)
                            <img src="{{  asset(Storage::url($anuncio->imagen()->first()->url)) }}" alt="" />
                        @else
                        <img src="https://www.digitalresponse.es/wp-content/uploads/2020/05/campa%C3%B1as_reposicion_de_producto-1024x512.jpg" alt="" />
                        @endisset


                    </div>
                    <div class="content">
                        <div class="stars">
                            <div class="ico">
                                @for ($id = 1; $id <= 5; $id++)

                                    @if ($anuncio->puntuacion > 0)


                                        @if ($id <= $anuncio->puntuacion)
                                            <i class="fa fa-star g-pos-rel g-top-1 g-mr-3" style="color: goldenrod"></i>
                                        @else
                                            <i class="far fa-star g-pos-rel g-top-1 g-mr-3" style="color: goldenrod"></i>
                                        @endif

                                    @else
                                        <i class="far fa-star g-pos-rel g-top-1 g-mr-3" style="color: goldenrod"></i>
                                    @endif
                                @endfor
                            </div>


                        </div>
                        <h3>{{ $anuncio->nombre }}</h3>
                        <p>{{ $anuncio->descripcion }}</p>

                        @auth
                            <a href="{{ route('anuncios.show', [$anuncio->id]) }}" class="botonsimple">Ver
                                Detalles</a>
                        @endauth
                        <div class="price">Bs {{ $anuncio->precio }}</div>
                    </div>

                </div>
                @endif
            @endforeach
        </div>

    </section>
</div>
