<x-layout>
<div class="container mt-5">
    <!-- Messaggi di successo -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-center">Elenco degli Articoli</h1>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Titolo</th>
                        <th>Sottotitolo</th>
                        <th>Autore</th>
                        <th>Categoria</th>
                        <th>Data di Creazione</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->subtitle }}</td>
                            <td>{{ $article->user->name }}</td>
                            <td>{{ $article->category ? $article->category->name : 'N/A' }}</td>
                            <td>{{ $article->created_at->format('d/m/Y') }}</td>
                            <td>
                                <!-- Visualizzare sempre il pulsante "Visualizza" -->
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info btn-sm">Visualizza</a>
                                
                                <!-- Mostrare i pulsanti Modifica/Elimina solo agli utenti autenticati -->
                                @auth
                                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Modifica</a>

                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Sei sicuro di voler eliminare questo articolo?')">Elimina</button>
                                    </form>
                                @endauth
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Nessun articolo disponibile</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>





</x-layout>
