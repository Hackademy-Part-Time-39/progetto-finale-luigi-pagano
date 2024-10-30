<x-layout>
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-center mb-4">Elenco delle Ricette</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-responsive">
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
                                        <a href="{{ route('article.show', $article) }}" class="btn btn-primary btn-sm">Leggi</a>
                                        @if ($article->category)
                                            <a href="{{ route('article.byCategory', $article->category) }}"
                                                class="badge bg-secondary text-capitalize text-muted">
                                                {{ $article->category->name }}
                                            </a>
                                        @else
                                            <span class="small text-muted">Nessuna categoria</span>
                                        @endif
                                        <p class="mb-1">
                                            Pubblicato da:
                                            <a href="{{ route('article.byUser', $article->user) }}"
                                                class="text-decoration-none">
                                                {{ $article->user->name }}
                                            </a>
                                        </p>

                                        @auth
                                            @if($article->user->id == Auth::user()->id)
                                                <a href="{{ route('articles.edit', $article) }}"
                                                    class="btn btn-warning btn-sm">Modifica</a>

                                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Sei sicuro di voler eliminare questo articolo?')">Elimina</button>
                                                </form>
                                            @endif
                                        @endauth
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Nessuna ricetta disponibile</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <a href="{{ url('/') }}" class="btn btn-primary">Torna alla Home</a>
        </div>
    </div>

    <style>
       
    </style>
</x-layout>
