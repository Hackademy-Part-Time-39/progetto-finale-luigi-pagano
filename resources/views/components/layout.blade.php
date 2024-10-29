<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <title>Ma che Blo(g)ntà</title>
</head>


<body>
    <x-navbar />

    @if (session('success'))
        <div class="alert alert-success text-center my-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="container my-4">
        {{ $slot }}
    </div>

    <footer class="bg-dark text-white pt-5 mt-5">
        <div class="container">
            <div class="row">



                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase">Link Utili</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="{{ route('articles.card') }}" class="text-white text-decoration-none">Ricette</a>
                        </li>
                        <li><a href="{{ route('chi-siamo') }}" class="text-white text-decoration-none">Chi Siamo</a>
                        </li>
                       
                </div>

                
            </div>

            <div class="text-center py-3 border-top border-secondary mt-4">
                <small>© 2024 Il Tuo Sito. Tutti i diritti riservati.</small>
            </div>
        </div>
    </footer>


   



</body>

</html>