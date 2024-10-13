<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <title>The Aulab Post</title>
</head>
<body>
    <!-- Navbar -->
    <x-navbar />

    <!-- Visualizzazione dei messaggi di successo generali -->
    @if (session('success'))
        <div class="alert alert-success text-center my-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Contenuto principale -->
    <div class="container my-4">
        {{ $slot }}
    </div>
    <!-- Footer -->
<footer class="bg-dark text-white pt-4 mt-5">
    <div class="container">
        <div class="row">
            <!-- Colonna 1 -->
            <div class="col-md-4">
                <h5 >Chi Siamo</h5>
                <p>
                    Siamo un portale di articoli che ti tiene aggiornato sulle ultime notizie dal mondo, trattando una vasta gamma di argomenti.
                </p>
            </div>

            <!-- Colonna 2 -->
            <div class="col-md-4">
                <h5>Link Utili</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ url('/') }}" class="text-white">Home</a></li>
                    <li><a href="{{ route('article.index') }}" class="text-white">Articoli</a></li>
                    <li><a href="{{ route('chi-siamo') }} "class="text-white">Chi Siamo</a></li>
                    <li><a href="#" class="text-white">Contatti</a></li>
                </ul>
            </div>

            <!-- Colonna 3 -->
            <div class="col-md-4">
                <h5>Seguici</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Facebook</a></li>
                    <li><a href="#" class="text-white">Twitter</a></li>
                    <li><a href="#" class="text-white">Instagram</a></li>
                    <li><a href="#" class="text-white">LinkedIn</a></li>
                </ul>
            </div>
        </div>

        <div class="text-center py-3">
            <small>© 2024 Il Tuo Sito. Tutti i diritti riservati.</small>
        </div>
    </div>
</footer>

</body>
</html>


