<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sanji</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/stylehome.css') }}" />

    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />



    @livewireStyles
</head>

<body>
    <!-- header section starts -->

    <header>
        <a href="{{ route('home') }}" class="logo"><i class="fas fa-dragon"></i> SANJI</a>
        {{-- ACTUALIZADO: Cambios realizados.. --}}
        @auth
            <nav class="nav1">

                @can('anuncios.create')
                    <a href="{{ route('anuncios.create') }}">CREAR ANUNCIO</a>
                @endcan

                @can('misanuncio.misanuncios')
                    <a href="{{ route('misanuncio.misanuncios') }}">MIS ANUNCIOS</a>
                @endcan

                @can('user.suscripcion')
                    <a href="{{ route('suscripcion.index') }}">SUBSCRÍBETE</a>
                @endcan

                <a href="{{ route('anuncios.index') }}">PUBLICACIONES</a>
            </nav>
        @else
            <nav class="nav1">
                <a href="{{ route('anuncios.index') }}">PUBLICACIONES</a>
            </nav>
        @endauth
            {{-- ACTUALIZADO: Cambios realizados.. --}}

        <div class="icons">
            <i class="fas fa-bars" id="menu-bars"></i>
            {{-- ACTUALIZADO: Cambios realizados.. --}}
            @auth
                <i class="far fa-bell"></i>
            @endauth
            {{-- ACTUALIZADO: Cambios realizados.. --}}


            {{-- ACTUALIZADO: Cambios realizados.. --}}
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                  this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i>

                    </a>
                </form>

                @can('user.comentarios')
                    <a href="#" class="fas fa-comment"></a>
                @endcan

                @can('megustas.megusta')
                    <a class="far fa-heart fa-2x her" href="{{ route('megustas.megusta', [auth()->user()->id]) }}"></a>
                @endcan

                <!------------------ Usuario Navbar  ----------------------->
                <div class="contenedorUser" {{-- x-data="{ open : false }" --}}>
                    <div>
                        <button class="btnUser" {{-- x-on:click="open=true" --}} type="button">
                            @isset(auth()->user()->url)
                                <img class="imgUser" src="{{ Storage::url(auth()->user()->url) }}" alt="">
                            @else
                                <img class="imgUser"
                                    src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" alt="">
                            @endisset

                        </button>
                    </div>
                    <div {{-- x-show="open" x-on:click.away="open=false" --}} class=" showUser">
                        <a href="{{ route('userss.cuenta', auth()->user()->id) }}" class="perfilUser">Cuenta</a>
                        <a href="{{ route('userss.perfil', auth()->user()->id) }}" class="perfilUser">Perfil</a>
                        <a href="{{ route('megustas.megusta', auth()->user()->id) }}"
                            class="perfilUser">Favoritos</a>
                        <a href="{{ route('opiniones.index', auth()->user()->id) }}" class="perfilUser">Opiniones</a>
                    </div>
                </div>
                <!----------------- Usuario Navbar End --------------------->

            @else
                <a class="fas fa-sign-in-alt" href="{{ route('login') }}" class="fas fa-user"></a>

                @if (Route::has('register'))
                    <a class="fas fa-user-plus " href="{{ route('register') }}"></a>
                @endif
            @endauth
            {{-- ACTUALIZADO: Cambios realizados.. --}}
        </div>

    </header>

    <!-- header section ends-->

    <!-- Slide  section starts  -->

    <section class="home" id="home">
        <div class="swiper-container home-slider">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide slide">
                    <div class="content">
                        <span>Cientos de anuncios</span>
                        <h3>Publica con nosotros</h3>
                        <p>
                            Buscas un lugar donde promocionar tus servicios o productos?
                        </p>
                        <a href="{{ route('anuncios.create') }}" class="botonsimple">Anuncia</a>
                    </div>
                    <div class="image">
                        <img src="{{ asset('images/publicidad.png') }}" alt="" />
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>El mejor lugar</span>
                        <h3>Rapido y facil</h3>
                        <p>No esperes demasiado tiempo por obtener resultados</p>
                        <a href="{{ route('anuncios.create') }}" class="botonsimple">Empieza ya</a>
                    </div>
                    <div class="image">
                        <img src="{{ asset('images/publicidad2.png') }}" alt="" />
                    </div>
                </div>

                <div class="swiper-slide slide">
                    <div class="content">
                        <span>En todas partes</span>
                        <h3>Desde donde estes</h3>
                        <p>
                            Con nuestro servicio podras eliminar las barreras de la
                            distancia
                        </p>
                        <a href="{{ route('anuncios.create') }}" class="botonsimple">Hazlo ahora</a>
                    </div>
                    <div class="image">
                        <img src="{{ asset('images/publicidad3.png') }}" alt="" />
                    </div>
                </div>
            </div>

            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </section>

    <!-- Slide section ends -->

    <!-- Category section starts  -->

    <section class="dishes" id="dishes">
        <h3 class="sub-heading">Observa</h3>
        <h1 class="heading">Nuestras Categorias</h1>

        <div class="box-container">


            <div class="box">
                <img src="{{ asset('images/coches.jpg') }}" alt="" />
                <div class="dato-container">
                    <h3>Coches</h3>
                    <a class="botonsimple" href="{{ route('ver.categoria', [1]) }}"> Explorar</a>
                </div>

            </div>

            <div class="box">
                <img src="{{ asset('images/motos.jpg') }}" alt="" />
                <div class="dato-container">
                    <h3>Motos</h3>
                    <a class="botonsimple" href="{{ route('ver.categoria', [2]) }}"> Explorar</a>
                </div>

            </div>

            <div class="box">
                <img src="{{ asset('images/motores.jpg') }}" alt="" />
                <div class="dato-container">
                    <h3>Motores</h3>
                    <a class="botonsimple" href="{{ route('ver.categoria', [3]) }}"> Explorar</a>
                </div>

            </div>

            <div class="box">
                <img src="{{ asset('images/deportes.jpg') }}" alt="" />
                <div class="dato-container">
                    <h3>Accesorios Deportivos</h3>
                    <a class="botonsimple" href="{{ route('ver.categoria', [4]) }}"> Explorar</a>
                </div>

            </div>

            <div class="box">
                <img src="{{ asset('images/casas.jpg') }}" alt="" />
                <div class="dato-container">
                    <h3>Inmuebles</h3>
                    <a class="botonsimple" href="{{ route('ver.categoria', [5]) }}"> Explorar</a>
                </div>

            </div>

            <div class="box">
                <img src="{{ asset('images/electronicos.jpg') }}" alt="" />
                <div class="dato-container">
                    <h3>Dispositivos Electronicos</h3>
                    <a class="botonsimple" href="{{ route('ver.categoria', [6]) }}"> Explorar</a>
                </div>

            </div>

            <div class="box">
                <img src="{{ asset('images/servicios.png') }}" alt="" />
                <div class="dato-container">
                    <h3>Servicios</h3>
                    <a class="botonsimple" href="{{ route('ver.categoria', [7]) }}"> Explorar</a>
                </div>

            </div>

            <div class="box">
                <img src="{{ asset('images/otros.png') }}" alt="" />
                <div class="dato-container">
                    <h3>Otros</h3>
                    <a class="botonsimple" href="{{ route('ver.categoria', [8]) }}"> Explorar</a>
                </div>

            </div>

        </div>
    </section>

    <!-- Category section ends -->

    <!-- Suscription section starts  -->

    <section class="pricing py-5">
        <h3 class="sub-heading">Precios</h3>
        <h1 class="heading">Suscripciones</h1>
        <div class="container">
            <div class="row">
                <!-- Usuario Free  -->
                <div class="col">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">
                                Gratis
                            </h5>
                            <h6 class="card-price text-center">
                                $0<span class="period">/mes</span>
                            </h6>
                            <hr />
                            <ul class="fa-ul">
                                <li>
                                    <span class="fa-li"><i
                                            class="fas fa-check"></i></span><strong>Publicaciones limitadas</strong>
                                </li>
                                <li class="text-muted">
                                    <span class="fa-li"><i class="fas fa-times"></i></span>Potencia tu marca
                                </li>
                                <li class="text-muted">
                                    <span class="fa-li"><i class="fas fa-times"></i></span>Conecta con más
                                    clientes
                                </li>
                                <li class="text-muted">
                                    <span class="fa-li"><i class="fas fa-times"></i></span>Gana
                                    visibilidad en búsquedas
                                </li>
                                <li class="text-muted">
                                    <span class="fa-li"><i class="fas fa-times"></i></span>Ahorra tiempo de
                                    gestión
                                </li>
                            </ul>
                            <div class="d-grid link-gratis">
                                <a style="font-size: 1.5rem" href="#"
                                    class="btn btn-secondary text-uppercase ">Obtenido</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Usuario Pro -->
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-muted text-uppercase text-center">
                                Pro
                            </h5>
                            <h6 class="card-price text-center">
                                $10<span class="period">/mes</span>
                            </h6>
                            <hr />
                            <ul class="fa-ul">
                                <li>
                                    <span class="fa-li"><i class="fas fa-check"></i></span><strong>Publica
                                        sin limites</strong>
                                </li>
                                <li>
                                    <span class="fa-li"><i class="fas fa-check"></i></span>Potencia tu
                                    marca
                                </li>
                                <li>
                                    <span class="fa-li"><i class="fas fa-check"></i></span>Conecta con más
                                    clientes
                                </li>
                                <li>
                                    <span class="fa-li"><i class="fas fa-check"></i></span>Gana
                                    visibilidad en búsquedas
                                </li>
                                <li>
                                    <span class="fa-li"><i class="fas fa-check"></i></span>Ahorra tiempo de
                                    gestión
                                </li>
                            </ul>
                            <div class="d-grid">
                                <a style="font-size: 1.5rem" href="#"
                                    class="btn btn-primary text-uppercase">Adquirir</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Suscription section ends -->

    <!-- Produtos o servicios section starts  -->

    <section class="menu" id="menu">
        <h3 class="sub-heading">Preferidos</h3>
        <h1 class="heading">Productos o Servicios Destacados</h1>

        <div class="box-container">
            @foreach ($anuncios as $anuncio)

                @if ($anuncio->opinion()->count() > 0)
                    @if ($anuncio->puntuacion / $anuncio->opinion()->count() > 3)

                        <div class="box">
                            <div class="image">
                                <img src="{{ Storage::url($anuncio->imagen()->first()->url) }}" alt="" />

                            </div>
                            <div class="content">
                                <div class="stars">
                                    @for ($id = 1; $id <= 5; $id++)

                                        @if ($id <= $anuncio->puntuacion / $anuncio->opinion()->count())
                                            <i class="fa fa-star g-pos-rel g-top-1 g-mr-3 estrella"></i>
                                        @else
                                            <i class="far fa-star g-pos-rel g-top-1 g-mr-3 estrella"></i>
                                        @endif
                                    @endfor
                                </div>
                                <h3>{{ $anuncio->nombre }}</h3>
                                <p>
                                    {{ $anuncio->descripcion }}

                                </p>
                                <div class="price-container">
                                    <a href="{{ route('ver.anuncio', [$anuncio->id]) }}" class="botonsimple">Ver
                                        Detalles</a>

                                    <span class="price">{{ $anuncio->precio }}
                                        {{ $anuncio->moneda }}</span>
                                </div>


                            </div>
                        </div>

                    @endif
                @else

                @endif
            @endforeach
        </div>
    </section>

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
        <img src="{{ asset('images/vanilla.gif') }}" alt="" />
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="{{ asset('js/scripthome.js') }}"></script>
</body>

</html>
