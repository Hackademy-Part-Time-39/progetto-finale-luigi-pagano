<x-layout>

<div class="container">
    <h1>Lavora con noi</h1>
    <p>Scegli il ruolo per il quale vuoi candidarti.</p>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form per richiedere un ruolo -->
    <form action="{{ route('careers.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role">Ruolo:</label>
            <select name="role" id="role" class="form-control" required>
                <option value="admin">Amministratore</option>
                <option value="revisor">Revisore</option>
                <option value="writer">Scrittore</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Invia Richiesta</button>
    </form>
</div>



</x-layout>