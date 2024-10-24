<x-layout>
    <div class="container my-5">
        <h1 >Articoli nella categoria: <>{{ route('article.byCategory', $article->category) }}" class="text-capitalize text-muted text-primary text-center mb-4">{{ $article->category->name }}</>
        </h1>
        <div class="row">
            @foreach($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="{{ $article->title }}"
                            style="object-fit: cover; height: 200px;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            <p class="card-text"><small class="text-muted">Pubblicato da {{ $article->user->name }} il
                                    {{ $article->created_at->format('d/m/Y') }}</small></p>
                            <div class="mt-auto">
                                <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Leggi</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style>

    </style>
</x-layout>