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


    {{-- Origen de Jetstream --}}

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    {{-- fin Jetstream --}}

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

<body class="font-sans antialiased">

    <header>
        <a href="/" class="logo"><i class="fas fa-dragon"></i> SANJI</a>

        @auth

            <nav class="nav1">
                <a href="{{ route('anuncios.create') }}">CREAR ANUNCIO</a>
                <a href="{{ route('misanuncio.misanuncios') }}">MIS ANUNCIOS</a>
                <a href="#">SUBSCRÍBETE</a>
            </nav>

        @endauth

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

                <a href="{{ route('profile.show') }}" class="fas fa-user"></a>
            @else
                <a class="fas fa-sign-in-alt" href="{{ route('login') }}" class="fas fa-user"></a>

                @if (Route::has('register'))
                    <a class="fas fa-user-plus " href="{{ route('register') }}"></a>
                @endif
            @endauth
        </div>
    </header>

    <section class="navbar">
    </section>
    <h1>Vista de Perfil</h1>

    <div class="container mx-auto">
        <form action="{{route('perfil.update')}}" method="POST">

          @csrf  
          @method('put')

            <div class="form-group col-md-2">
                <label class="text-blue-700 text-lg" for="inpuNombre">Nombre:</label>
                <br>
                <input name="Nombre" type="text" class="form-control text-lg" id="inpuNombre" value="{{ $user->name }}">
                <br>
            </div>

            <div class="form-group col-12">
                <label class="text-primary text-lg" for="inpuDescripcion">Descripcion:</label>
                <br>
                <input name="Descripcion" type="text" class="form-control text-lg" id="inpuDescripcion"
                    value="{{ $user->Descripcion }}">
                <br>
            </div>

            <div class="form-group col-12">
                <label class="text-primary text-lg" for="inpuNumero">Numero:</label>
                <br>
                <input name="Numero" type="text" class="form-control text-lg" id="inpuNumero" value="{{ $user->Numero }}">
                <br>
            </div>

            <div class="form-group col-12">
                <label class="text-primary text-lg" for="inpuFechaNacimiento">Fecha Nacimiento:</label>
                <br>
                <input name="FechaNacimiento" type="date" class="form-control text-lg" id="inpuFechaNacimiento"
                    value="{{ $user->FechaNacimiento }}">
                <br>
            </div>

            <div class="form-group col-12">
                <label class="text-primary text-lg" for="inpuDireccion">Direccion:</label>
                <br>
                <input name="Direccion" type="text" class="form-control text-lg" id="inpuDireccion"
                    value="{{ $user->Direccion }}">
                <br>
            </div>

          <button type="submit" class="">Guardar</button>
        </form>
    </div>

    <!-- custom js file link  -->
    @livewireScripts
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
