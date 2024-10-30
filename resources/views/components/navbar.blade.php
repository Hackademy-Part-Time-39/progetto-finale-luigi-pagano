<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-3">
    <div class="container-fluid">
        
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}" aria-label="Ma che Blontà Home">
            <img src="{{ asset('/logo/logo.png') }}" alt="Logo del sito" style="width: 55px;" class="me-2">
            <span class="fs-4 fw-bold text-primary">Ma che Blo(g)ntà</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
             
                <li class="nav-item">
                    <a class="nav-link active fw-semibold" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('articles.card') }}">Scopri tutte le ricette</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('careers') }}">Lavora con noi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('articles.index') }}">Le Mie Ricette</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('articles.create') }}">Pubblica Ricetta</a>
                    </li>
                    @if(Auth::user()->is_admin)
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                        </li>
                    @elseif(Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ route('revisor.dashboard') }}">Dashboard Revisore</a>
                        </li>
                    @elseif(Auth::user()->is_writer)
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="{{ route('writer.dashboard') }}">Dashboard Writer</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-primary">Ciao, {{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endauth

          
                @guest
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('register') }}">Registrati</a>
                    </li>
                @endguest

                
                <li class="nav-item ms-3">
                    <form action="{{ route('article.search') }}" method="GET" class="d-flex">
                        <input class="form-control me-2" type="search" name="query" placeholder="Cerca tra gli articoli..."
                            aria-label="Search" style="width: 200px;">
                        <button class="btn btn-outline-secondary" type="submit">Cerca</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
