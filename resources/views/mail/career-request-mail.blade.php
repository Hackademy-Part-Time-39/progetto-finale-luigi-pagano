<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Richiesta di Candidatura</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
            line-height: 1.5;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Richiesta di Candidatura</h1>
        <p>Hai ricevuto una nuova richiesta di candidatura dal tuo sito web.</p>
        <p><strong>Ruolo Richiesto:</strong> {{ $role }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Messaggio di Presentazione:</strong></p>
        <p>{{ $message }}</p>

        <div class="footer">
            <p>Questo messaggio è stato inviato automaticamente. Non rispondere a questa email.</p>
        </div>
    </div>
</body>
</html>
