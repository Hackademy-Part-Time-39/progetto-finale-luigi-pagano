<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrazione Utente</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 register-container">
                <h2 class="text-center mb-4 register-header">Registrati su  Ma che Blo(g)ntà</h2>

                <form action="{{ route('register') }}" method="POST">
                    @csrf 

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required
                            autofocus>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                            required>
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

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Conferma Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Registrati</button>
                    </div>
                </form>

                <div class="mt-3 text-center">
                    <p>Sei già registrato? <a href="{{ route('login') }}">Accedi qui</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>