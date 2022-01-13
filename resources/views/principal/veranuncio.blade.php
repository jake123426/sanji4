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


    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}


    @livewireStyles
</head>

<body>
    <!-- header section starts -->


    <header >
        <a  href="/" class="logo"><i class="fas fa-dragon"></i> SANJI</a>

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

        <div class="icons">

            <i class="fas fa-bars" id="menu-bars"></i>
            @auth
                <i class="far fa-bell"></i>
            @endauth

            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                      this.closest('form').submit();">
                        <i class="fas fa-sign-out-alt"></i>

                    </a>
                </form>

                <!------------------ Usuario Navbar  ----------------------->
                <div class="contenedorUser" {{-- x-data="{ open : false }" --}}>
                    <div>
                        <button class="btnUser" {{-- x-on:click="open=true" --}} type="button">
                            @isset(auth()->user()->url)
                                <img class="imgUser" src="{{ asset(Storage::url(auth()->user()->url)) }}" alt="">
                            @else
                                <img class="imgUser"
                                    src="https://www.weact.org/wp-content/uploads/2016/10/Blank-profile.png" alt="">
                            @endisset

                        </button>
                    </div>
                    <div {{-- x-show="open" x-on:click.away="open=false" --}} class=" showUser">
                        <a href="{{ route('userss.cuenta', auth()->user()->id) }}" class="perfilUser fas fa-user">
                            Cuenta</a>
                        <a href="{{ route('userss.perfil', auth()->user()->id) }}"
                            class="perfilUser fas fa-address-card"> Perfil</a>
                        @can('user.comentarios')
                            <a href="{{ route('opiniones.index', auth()->user()->id) }}" class="perfilUser fas fa-comment">
                                Opiniones</a>
                        @endcan
                        @can('megustas.megusta')
                            <a href="{{ route('megustas.megusta', auth()->user()->id) }}" class="perfilUser fas fa-heart">
                                Favoritos</a>
                        @endcan
                    </div>
                </div>
                <!----------------- Usuario Navbar End --------------------->

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

    @livewire('principal.mirar', [ 'anuncio' => $anuncio, 'verif'=>$verif,'tags'=>$tags])


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
