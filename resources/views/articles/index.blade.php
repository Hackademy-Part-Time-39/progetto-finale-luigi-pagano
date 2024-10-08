<h1>Elenco Articoli</h1>
@foreach($articles as $article)
    <h2>{{ $article->titolo }}</h2>
    <p>{{ $article->sottotitolo }}</p>
    <a href="{{ route('articles.show', $article) }}">Leggi di più</a>
@endforeach
