<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    

    <title>Ma che Blo(g)ntà</title>
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
    <footer class="bg-dark text-white pt-5 mt-5">
        <div class="container">
            <div class="row">
           
                

                <!-- Colonna 2 -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase">Link Utili</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="{{ route('articles.card') }}" class="text-white text-decoration-none">Ricette</a></li>
                        <li><a href="{{ route('chi-siamo') }}" class="text-white text-decoration-none">Chi Siamo</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Contatti</a></li>
                    </ul>
                </div>

                <!-- Colonna 3 -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase">Seguici</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none"><i class="fab fa-facebook-f me-2"></i>Facebook</a></li>
                        <li><a href="#" class="text-white text-decoration-none"><i class="fab fa-twitter me-2"></i>Twitter</a></li>
                        <li><a href="#" class="text-white text-decoration-none"><i class="fab fa-instagram me-2"></i>Instagram</a></li>
                        <li><a href="#" class="text-white text-decoration-none"><i class="fab fa-linkedin me-2"></i>LinkedIn</a></li>
                    </ul>
                </div>
            </div>

            <div class="text-center py-3 border-top border-secondary mt-4">
                <small>© 2024 Il Tuo Sito. Tutti i diritti riservati.</small>
            </div>
        </div>
    </footer>


    <script>
        AOS.init();
    </script>

  
   
</body>
</html>



