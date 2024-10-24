<x-layout>

    <div class="container my-5">
        <!-- Intestazione della sezione -->
        <div class="text-center mb-4">
            <h1 class="display-4" style="font-weight: bold; color: #4a4a4a;">Lavora con Noi</h1>
            <p class="lead" style="color: #6c757d;">Scegli il ruolo che ti appassiona e unisciti al nostro team!</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form per richiedere un ruolo -->
        <div class="card shadow-sm p-4" style="border-radius: 15px; background-color: #f7f7f7;">
            <h3 class="text-center mb-4" style="color: #4a4a4a;">Scegli il Ruolo</h3>

            <form action="{{ route('careers.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="role" style="color: #4a4a4a;">Ruolo desiderato:</label>
                    <select name="role" id="role" class="form-control"
                        style="border-radius: 10px; background-color: #e9ecef;" required>
                        <option value="admin">👨‍💼 Amministratore</option>
                        <option value="revisor">🔍 Revisore</option>
                        <option value="writer">✍️ Scrittore</option>
                    </select>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-lg"
                        style="background-color: #4a4a4a; color: white; border-radius: 30px;">Invia la tua
                        candidatura</button>
                </div>
            </form>
        </div>
    </div>

</x-layout>