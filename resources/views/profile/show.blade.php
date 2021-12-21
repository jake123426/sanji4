<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

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
    
                    <a href="{{route('profile.show')}}" class="fas fa-user"></a>
                @else
                    <a class="fas fa-sign-in-alt" href="{{ route('login') }}" class="fas fa-user"></a>
    
                    @if (Route::has('register'))
                        <a  class="fas fa-user-plus " href="{{ route('register') }}"></a>
                    @endif
                @endauth
            </div>
        </header>

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Perfil') }}
                        </h2>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                <div class="mt-4"></div>
                
                <div>
                    
                    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                        
                        <a href="{{route('perfil.edit')}}">EDITAR PERFIL</a>

                        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                            @livewire('profile.update-profile-information-form')
                        @endif
            
                        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                            <div class="mt-10 sm:mt-0">
                                @livewire('profile.update-password-form')
                            </div>
                        @endif
            
                        <div class="mt-10 sm:mt-0">
                            @livewire('profile.logout-other-browser-sessions-form')
                        </div>
            
                        
                    </div>
                </div>
            </main>
        </div>



        @livewireScripts


    {{--     <!-- loader part  -->
    <div class="loader-container">
        <img src="images/vanilla.gif" alt="" />
    </div> --}}
    <!-- custom js file link  -->
    <script src="{{ asset('js/script.js') }}"></script>
    </body>
</html>
