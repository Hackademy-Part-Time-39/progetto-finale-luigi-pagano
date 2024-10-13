<x-layout>
    <div class="container my-5">
        <h1>Articoli nella categoria: {{ $category->name }}</h1>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            <p class="card-text"><small class="text-muted">Pubblicato da {{ $article->user->name }} il {{ $article->created_at->format('d/m/Y') }}</small></p>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </x-layout>