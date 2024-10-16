<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>Autore</th>
            <th>Data</th>
            <th>Stato</th>
            <th>Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->user->name }}</td>
                <td>{{ $article->created_at->format('d/m/Y') }}</td>
                <td>
                    @if(is_null($article->'unrevisioned'))
                        <span class="badge bg-warning text-dark">In revisione</span>
                    @elseif(is_null($article->'is_accepted'))
                        <span class="badge bg-success">Accettato</span>
                    @elseif(is_null($article->'rejected'))
                        <span class="badge bg-danger">Rifiutato</span>
                    @endif
                </td>
                <td>
                    @if($article->'is_accepted')
                        <!-- Link per vedere i dettagli dell'articolo -->
                        <a href="{{ route('article.show', $article) }}" class="btn btn-secondary">Leggi l'articolo</a>
                    @else
                        <!-- Link per riportare l'articolo in revisione -->
                        <form action="{{ route('revisor.undoArticle', $article) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-warning">RIporta in revisione</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

