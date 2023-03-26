    <!-- Primary Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
        <div class="container">
            @if (Auth::check())
                <a class="navbar-brand" href="{{ route('timeline') }}">Reddit</a>
            @else
                <a class="navbar-brand" href="{{ route('home') }}">Reddit</a>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07"
                aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-----------------------------DROPDOWN Crear comunidad,--------------------------------------->
            <div class="collapse navbar-collapse" id="navbarsExample07">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                            aria-expanded="false">Ubicacion actual</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item"
                                    href="{{ route('communities.index') }}">{{ __('Lista comuniades') }}</a></li>
                            <li><a class="dropdown-item"
                                    href="{{ route('community.create') }}">{{ __('Crear comunidad') }}</a></li>
                            <li><a class="dropdown-item" href="{{ route('post.create') }}">{{ __('Crear post') }}</a>
                            </li>
                        </ul>
                    </li>
                    <!----------------------Buscar------------------------------------------------>
                    <form role="search">
                        <input class="form-control me-auto" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </ul>
                @if (Auth::check())
                    <!----------------------------Seccion perfil-------------------------------->                    
                    <div>
                        <ul class="navbar-brand mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">{{ Auth::user()->username }}</a>
                                <ul class="dropdown-menu">
                                    <x-dropdown-link class="dropdown-item" :href="route('profile.edit')">
                                        {{ __('Perfil') }}
                                    </x-dropdown-link>
                                    <x-dropdown-link class="dropdown-item" :href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </ul>
                            </li>
                        </ul>
                    </div>
                @else
                <a class="navbar-brand" href="{{ route('login') }}">Iniciar sesión</a>
                <a class="navbar-brand" href="{{ route('register') }}">Registrarse</a>

                @endif

    </nav>
