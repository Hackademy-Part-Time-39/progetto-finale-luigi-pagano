<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Utente</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 login-container">
                <h2 class="text-center mb-4 login-header">Accedi a Ma che Blo(g)ntà</h2>

                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            required autofocus>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label for="remember" class="form-check-label">Ricordami</label>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Accedi</button>
                    </div>
                </form>

                <div class="mt-3 text-center">
                    <p>Non hai un account? <a href="{{ route('register') }}">Registrati qui</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>