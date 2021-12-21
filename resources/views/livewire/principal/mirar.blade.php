<div>

    <!-- Produtos o servicios section starts  -->


    <section style="margin-top: 7.5rem" class="menu" id="menu">
        <h3 class="sub-heading">Producto o Servicio</h3>

        <div class="contenedor">

            <div class="card-header" wire:render>
                <div class="autor">
                    <img class="imagen" src="{{ $anuncio->user->profile_photo_url }}" alt="" />
                    <div class="name">{{ $anuncio->user->name }}</div>
                </div>
                <div class="stars">
                    <div class="ico">
                        @for ($id = 1; $id <= 5; $id++)

                            @if ($star != 0)


                                @if ($id <= $star / $cant_opiniones)
                                    <i class="fa fa-star g-pos-rel g-top-1 g-mr-3 estrella"></i>
                                @else
                                    <i class="far fa-star g-pos-rel g-top-1 g-mr-3 estrella"></i>
                                @endif

                            @else
                                <i class="far fa-star g-pos-rel g-top-1 g-mr-3 estrella"></i>
                            @endif
                        @endfor
                    </div>
                    <p>{{ $anuncio->puntuacion }} Valoraciones</p>
                </div>
                <div class="heart">
                    @if ($verif == 0)
                        <button style="color: #adc5ea" class="fas fa-heart fa-3x her"
                            wire:click="favoritos({{ $anuncio->id }})"></button>
                    @else
                        <button style="color: #ff0808" class="fas fa-heart fa-3x her"
                            wire:click="nofavoritos({{ $anuncio->id }})"></button>
                    @endif
                    <a class="botn" href="#">Chat</a>
                </div>
            </div>

            <div class="swiper mySwiper" wire:ignore>
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($imagenes as $imagen)
                        <div class="swiper-slide">
                            <img src="{{ Storage::url($imagen->url) }}" alt="No Image" />
                        </div>
                    @endforeach

                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>

            <div class="card-body">
                <div class="pre-name">
                    <div style="font-weight: bold; font-size: 4rem;">Precio: {{ $anuncio->precio }} Bs</div>
                    <div>{{ $anuncio->nombre }}</div>
                </div>
                <div class="estado">
                    <div style="width: 50%;">Estado: <span>{{ $anuncio->estado }}</span></div>
                    <div>Tipo: <span>{{ $anuncio->categoria->nombre }}</span></div>
                </div>

                <div class="descripcion">
                    {{ $anuncio->descripcion }}
                </div>

                <div class="lik">
                    <div style="width: 50%;">{{ \Carbon\Carbon::parse($anuncio->create_at)->format('d-m-Y') }}</div>
                    <div>
                        <i class="far fa-eye"></i> {{ $anuncio->vista }}
                        <i class="far fa-heart"></i> {{ $anuncio->users()->count() }}
                    </div>
                </div>
                <div class="card-footer">
                    <div>Comparte esta publicación con tus amigos</div>
                    <div class="redes">
                        <i style="margin-right: 1rem; color: blue;" class="fab fa-facebook fa-2x"></i>
                        <i style="margin-right: 1rem; color: rgb(0, 200, 250);" class="fab fa-twitter-square fa-2x"></i>
                        <i style="color: red;" class="fas fa-envelope fa-2x"></i>
                    </div>
                </div>
            </div>


        </div>
    </section>


    <section>
        <div class="contenedor">
            @foreach ($opiniones as $opinion)

                <div class="card-header comentario-container">
                    <div class="autor aling">
                        <img class="imagen" @isset($opinion->foto)
                            src="{{ Storage::url($opinion->foto) }}"
                        @else
                            src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png"
                        @endisset alt="" />

                        <div class="name">{{ $opinion->nombre }}</div>

                    </div>
                        {{-- @php
                            echo $opinion->nombre
                        @endphp --}}
                    <div class="stars ">
                        <p style="padding: 0.5rem 3rem;">{{ $opinion->descripcion }}</p>
                        <p style="padding: 0.2rem 3rem; font-size: 1.2rem;">
                            {{ \Carbon\Carbon::parse($opinion->create_at)->format('d-m-Y') }}</p>
                    </div>
                    <div class="heart aling borde">
                        <div class="ico ">
                            @for ($id = 1; $id <= 5; $id++)
                                @if ($id <= $opinion->puntuacion)
                                    <i class="fa fa-star g-pos-rel g-top-1 g-mr-3 estrella"></i>
                                @else
                                    <i class="far fa-star g-pos-rel g-top-1 g-mr-3 estrella"></i>
                                @endif

                            @endfor

                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <br> --}}
            {{-- <br> --}}
        </div>
    </section>

    <section>
        <div class="contenedor">
            <div class="comentario-container cc">
                <div style="flex: 10%" class="autor aling">
                    <img class="imagen" @isset(auth()->user()->url)
                        src="{{ Storage::url(auth()->user()->url) }}"
                    @else
                        src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png"
                    @endisset alt="" />
                    <div class="name">{{ auth()->user()->name }}</div>
                </div>

                <div style="flex: 80%" class="escribir aling">
                    <label style="margin-bottom: 0.2rem" for="coment">Deja tu comentario:</label>
                    <textarea id="coment" name="descripcion" cols="30" rows="3" placeholder="Escriba aqui..."
                        wire:model="descripcion"></textarea>
                </div>

                <div style="flex: 5%" class="puntaje aling">
                    <label for="num">Puntuación:</label>
                    <input id="num" name="puntaje" min="1" max="5" type="number" placeholder="1 - 5"
                        wire:model="puntuacion">
                </div>

                <div style="flex: 5%" class="enviar aling">
                    <input class="botonInput" type="submit" wire:click="guardaropinion({{ $anuncio->id }})">
                </div>

            </div>
        </div>
    </section>

    <section>
        {{-- <div class="contenedor"> --}}
        <div class="etiqueta-header">
            <p>Tambien te puede interasar:</p>
        </div>
        <div class="etiquetas-container">

            <div class="etiqueta-body">
                @foreach ($tags as $tag)
                    <div class="etiqueta">

                        <a href="#">{{ $tag->nombre }}</a>

                    </div>
                @endforeach
            </div>

        </div>
        {{-- </div> --}}
    </section>
</div>
