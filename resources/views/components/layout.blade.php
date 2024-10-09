<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>The Aulab Post</title>
</head>
<body>
    <!-- Includi il componente navbar -->
    <x-navbar />

    <!-- Contenuto dinamico della pagina -->
    <div class="container my-4">
        {{ $slot }}
    </div>
</body>
</html>

