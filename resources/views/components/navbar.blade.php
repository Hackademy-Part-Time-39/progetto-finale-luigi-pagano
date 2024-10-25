<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
    <div class="container-fluid">
        <!-- Brand -->
        <header>
            <div class="container">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('/logo/logo.png') }}" alt="Logo del sito" style="width: 65px;">
                </a>
            </div>
        </header>

        <img src="{{ asset('images/logo/logo.png') }}" alt="" class="logo-image">
<a class="navbar-brand blog-brand" href="/" aria-label="Ma che Blontà Home">
    Ma che Blo(g)ntà
</a>


        <!--  Menu for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/" style="font-weight: 500;">Home</a>
                </li>

                <!-- Tutti gli articoli -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.card') }}" style="font-weight: 500;">Scopri tutte le
                        ricette</a>
                </li>


             

                @auth
                   <!-- Lavora con noi -->
                   <li class="nav-item">
                    <a class="nav-link" href="{{ route('careers') }}" style="font-weight: 500;">Lavora con noi</a>
                </li>

                    <!-- I miei articoli -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.index') }}" style="font-weight: 500;">Le Mie
                            Ricette</a>
                    </li>

                    <!-- Crea articolo -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.create') }}" style="font-weight: 500;">Pubblica
                            Ricetta</a>
                    </li>

                    <!-- Admin/Revisor Dashboard -->
                    @if(Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.dashboard') }}" style="font-weight: 500;">Dashboard
                                Admin</a>
                        </li>
                    @elseif(Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('revisor.dashboard') }}" style="font-weight: 500;">Dashboard
                                Revisore</a>
                        </li>
                    @endif

                    <!-- User Greeting and Logout -->
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-weight: 500;">Ciao, {{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" style="font-weight: 500;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth

                @guest
                    <!-- Login -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}" style="font-weight: 500;">Login</a>
                    </li>

                    <!-- registrati -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}" style="font-weight: 500;">Registrati</a>
                    </li>
                @endguest
                <form action="{{route('article.search')}}" method="GET" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="query" placeholder="Cerca tra gli articoli..."
                        aria-label="Search">
                    <button class="btn btn-outline-secondary" type="submit">Cerca</button>
                </form>

            </ul>
        </div>
    </div>
</nav>