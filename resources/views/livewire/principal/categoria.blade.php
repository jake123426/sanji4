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
                <a onclick="miFuncion(this)" class="op" href="#">Subcategoría <i
                        class="fas fa-angle-down"></i></a>
                <div style="display: none;" class=" contenedor ">
                    <div class="contenedor-title">Seleccionar</div>
                    <div>

                        @foreach ($subcategorias as $subcategoria)
                            <p class="ite">{{ $subcategoria->nombre }}</p>
                        @endforeach

                    </div>
                    <div class="contenedor-footer">
                        <button onclick="cerrar(this)" class="botonf">Cerrar</button>
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

            <div class="custom-select">
                <select id="estado" wire:model="estado" name="estado">
                    <option value="0" wire:click="estados('todos')">Estado del producto</option>
                    <option value="1" wire:click="estados('Nuevo')">Nuevo</option>
                    <option value="2" wire:click="estados('Semi-nuevo')">Semi-nuevo</option>
                    <option value="3" wire:click="estados('En buen estado')">En buen estado</option>
                    <option value="4" wire:click="estados('Usado')">Usado</option>
                    <option value="5" wire:click="estados('Condiciones Aceptables')">Condiciones Aceptables</option>

                </select>
            </div>

        </div>

        <h1> {{ $estado }}</h1>
    </section>



    <section class="menu" id="menu">
        <h3 class="sub-heading">Productos o Servicios</h3>


        <div class="box-container">
            @foreach ($anuncios as $anuncio)
                <div class="box">

                    <div class="image">
                        <img src="{{ Storage::url($anuncio->imagen()->first()->url) }}" alt="" />

                    </div>
                    <div class="content">
                        <div class="stars">
                            @for ($id = 1; $id < $anuncio->puntuacion; $id++)
                                <i class="fas fa-star"></i>
                            @endfor


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
            @endforeach
        </div>

    </section>
</div>
