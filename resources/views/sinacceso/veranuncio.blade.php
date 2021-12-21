<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanji</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}" />

    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    @livewireStyles
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    /> -->
</head>

<body>
    <!-- header section starts -->


    <header>
        <a href="{{ route('home') }}" class="logo"><i class="fas fa-dragon"></i> SANJI</a>

        <!-- <nav class="navbar">
          <a class="active" href="#home">home</a>
          <a href="#dishes">dishes</a>
          <a href="#about">about</a>
          <a href="#menu">menu</a>
          <a href="#review">review</a>
          <a href="#order">order</a>
        </nav> -->

        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                          this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i>

                    </a>
                </form>
                <a href="#" class="fas fa-comment"></a>
                <a class="far fa-heart fa-2x her" href="{{ route('megustas.megusta', [auth()->user()->id]) }}"></a>

                <a href="#" class="fas fa-user"></a>
            @else
                <a class="fas fa-sign-in-alt" href="{{ route('login') }}" class="fas fa-user"></a>

                @if (Route::has('register'))
                    <a class="fas fa-user-plus " href="{{ route('register') }}"></a>
                @endif
            @endauth
        </div>
    </header>

    <!-- header section ends-->

    <!-- Search   section starts  -->

    <div>




        <!-- header section ends-->

        <!-- Search   section starts  -->


        <!-- Search  section ends -->

        <!-- Produtos o servicios section starts  -->


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

                            @if ($anuncio->puntuacion != 0)


                                @if ($id <= $anuncio->puntuacion)
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

                        <button style="color: #adc5ea" class="fas fa-heart fa-3x her"
                            wire:click="favoritos({{ $anuncio->id }})"></button>


                    <a class="botn" href="#">Chat</a>
                </div>
            </div>

            <div class="swiper mySwiper">
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
                    <div style="flex: 10%" class="autor aling">

                        <img  class="imagen" src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" alt="No Image" />


                        <div class="name">{{ $opinion->nombre }}</div>

                    </div>

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
                    <img class="imagen"

                        src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png"
                   alt="" />
                    <div class="name">usuario invitado</div>
                </div>

                <div style="flex: 80%" class="escribir aling">
                    <label style="margin-bottom: 0.2rem" for="coment">Deja tu comentario:</label>
                    <textarea id="coment" name="descripcion" cols="30" rows="3" placeholder="Escriba aqui..."
                        ></textarea>
                </div>

                <div style="flex: 5%" class="puntaje aling">
                    <label for="num">Puntuación:</label>
                    <input id="num" name="puntaje" min="1" max="5" type="number" placeholder="1 - 5"
                        >
                </div>

                <div style="flex: 5%" class="enviar aling">
                    @auth
                    <input class="botonInput" type="submit" wire:click="guardaropinion({{ $anuncio->id }})">
                    @endauth

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



    <!-- Produtos o servicios  section ends -->

    <!-- footer section starts  -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Ubicaciones</h3>
                <a href="#">Bolivia</a>
                <a href="#">Peru</a>
                <a href="#">Argentina</a>
                <a href="#">Chile</a>
                <a href="#">Mexico</a>
            </div>

            <div class="box">
                <h3>Enlace</h3>
                <a href="#">Coches</a>
                <a href="#">Casas</a>
                <a href="#">Motos</a>
                <a href="#">Videojuegos</a>
                <a href="#">Ropa</a>
                <a href="#">Televisores</a>
            </div>

            <div class="box">
                <h3>Contactos</h3>
                <a href="#">+510 69102452</a>
                <a href="#">+510-2223333</a>
                <a href="#">xxjacques1234@gmail.com</a>
                <a href="#">fulano@gmail.com</a>
                <a href="#">Av. Santos Dumont, 5to anillo</a>
            </div>

            <div class="box">
                <h3>Siguenos</h3>
                <a href="#">facebook</a>
                <a href="#">twitter</a>
                <a href="#">instagram</a>
                <a href="#">linkedin</a>
            </div>
        </div>

        <div class="credit">
            copyright @ 2021 por <span>Jaime(ElMaster)</span>
        </div>
    </section>

    <!-- footer section ends -->

    <!-- loader part  -->
    <div class="loader-container">
        <img src="{{ asset('images/Vanilla.gif') }}" alt="" />
    </div>
    <!-- Swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    @livewireScripts
    <!-- custom js file link  -->
    <script src="{{ asset('js/script1.js') }}"></script>
</body>

</html>
