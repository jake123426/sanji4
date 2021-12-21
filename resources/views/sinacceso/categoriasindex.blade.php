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
    {{-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> --}}

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    <!-- Animation -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap -->
    <!-- <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    /> -->

    @livewireStyles
</head>

<body>
    <header>
        <a href="{{ route('home') }}" class="logo"><i class="fas fa-dragon"></i> SANJI</a>

        @auth

                <nav class="nav1">
                    <a href="{{ route('anuncios.create') }}">CREAR ANUNCIO</a>
                    <a href="{{ route('misanuncio.misanuncios') }}">MIS ANUNCIOS</a>
                    <a href="#">SUBSCRÍBETE</a>
                </nav>

        @endauth

        <div class="icons">
            <i  class="fas fa-bars" id="menu-bars"></i>
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
                    <a  class="fas fa-user-plus " href="{{ route('register') }}"></a>
                @endif
            @endauth
        </div>
    </header>

    @livewire('sinacceso.categoria',['categoria'=>$categoria])

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
        <img src="{{asset('images/vanilla.gif')}}" alt="" />
    </div>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    @livewireScripts
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
