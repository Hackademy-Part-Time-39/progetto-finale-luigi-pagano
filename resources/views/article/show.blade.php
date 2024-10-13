<x-layout>


<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h1>{{ $article->title }}</h1>
            <p><strong>Categoria:</strong> {{ $article->category->name }}</p>
            <p><strong>Autore:</strong> {{ $article->user->name }}</p>
            <p><strong>Data di pubblicazione:</strong> {{ $article->created_at->format('d/m/Y') }}</p>
            <p>
    Categoria: 
    <a href="{{ route('article.byCategory', $article->category) }}" class="badge bg-secondary">
        {{ $article->category->name }}
    </a>
</p>
<p>
    Scritto da: 
    <a href="{{ route('article.byUser', $article->user) }}" class="text-decoration-none">
        {{ $article->user->name }}
    </a>
</p>


        </div>
        <div class="col-12 my-4">
            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="img-fluid">
        </div>
        <div class="col-12">
            <h3>{{ $article->subtitle }}</h3>
            <p>{{ $article->body }}</p>
        </div>
        <div class="col-12">
            <a href="{{ route('article.index') }}" class="btn btn-primary">Torna agli articoli</a>
        </div>
    </div>
</div>


</x-layout>
