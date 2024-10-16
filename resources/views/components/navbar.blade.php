<!-- resources/views/components/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">The Aulab Post</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                
                
                <li class="nav-item">
    <a class="nav-link" href="{{ route('articles.index') }}">Articoli</a>
</li>
<li class="nav-item">
                <a class="nav-link" href="{{ route('careers') }}">Lavora con noi</a>
            </li>
                @auth
    <li class="nav-item">
    <li class="nav-item">
    <a class="nav-link" href="{{ route('articles.index') }}">Articoli</a>
</li>
        <a class="nav-link" href="{{ route('articles.create') }}">Crea Articolo</a>
    </li>
    </li>
        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
    </li>
    <li class="nav-item">
                   

@endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ciao, {{ Auth::user()->name }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    
                @endauth
                
            </ul>
        </div>
    </div>
</nav>
