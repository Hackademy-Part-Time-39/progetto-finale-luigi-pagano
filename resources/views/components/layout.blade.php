<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Laravel's Vite for CSS and JavaScript resources -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Ma che Blo(g)ntà</title>
    <!-- Add a favicon for branding -->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body class="bg-light text-dark">
    <!-- Navbar Component -->
    <x-navbar />

    <!-- Success Alert -->
    @if (session('success'))
        <div class="alert alert-success text-center my-3">
            {{ session('success') }}
        </div>
    @endif

    <!-- Main Container -->
    <main class="container my-4">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 mt-5">
        <div class="container">
            <div class="row">

                <!-- Useful Links Section -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase">Link Utili</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ url('/') }}" class="text-white text-decoration-none">Home</a></li>
                        <li><a href="{{ route('articles.card') }}" class="text-white text-decoration-none">Ricette</a></li>
                        <li><a href="{{ route('chi-siamo') }}" class="text-white text-decoration-none">Chi Siamo</a></li>
                    </ul>
                </div>

                <!-- Contact Section -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase">Contattaci</h5>
                    <ul class="list-unstyled">
                        <li>Email: <a href="mailto:info@iltuosito.it" class="text-white">info@macheblognta.it</a></li>
                        <li>Telefono: <a href="tel:+39 232345632" class="text-white">+39 232345632</a></li>
                    </ul>
                </div>

                
                
            </div>

         
            <div class="text-center py-3 border-top border-secondary mt-4">
                <small>© 2024 Il Tuo Sito. Tutti i diritti riservati.</small>
            </div>
        </div>
    </footer>

   
</body>

</html>
