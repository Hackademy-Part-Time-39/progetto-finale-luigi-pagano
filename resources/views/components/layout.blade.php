<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
</body>
</html>


