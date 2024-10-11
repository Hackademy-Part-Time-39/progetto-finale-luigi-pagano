
<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">The Aulab Post</h1>
            </div>
        </div>
    </div>
    <div class="container mt-5">
    <h1 class="text-center">Ultimi Articoli</h1>
    <div class="row">
        @foreach ($recentArticles as $article)
            <div class="col-md-3">
                <div class="card mb-4">
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->subtitle, 50) }}</p>
                        <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Leggi</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</x-layout>