<x-layout>

   

        <div class="container mt-5">
            <div class="row">
                <div class="col-12 text-center mb-4">
                    <h1 class="display-4 text-primary">{{ $article->title }}</h1>
                    <p class="lead">
                        <strong>Categoria:</strong>
                        <a href="{{ route('article.byCategory', $article->category) }}" class="badge bg-secondary">
                            {{ $article->category->name }}
                        </a>
                    </p>
                    <p class="text-muted">
                        <strong>Autore:</strong>
                        <a href="{{ route('article.byUser', $article->user) }}" class="text-decoration-none">
                            {{ $article->user->name }}
                        </a>
                        |
                        <strong>Data di pubblicazione:</strong> {{ $article->created_at->format('d/m/Y') }}
                    </p>
                </div>

                <div class="col-12 mb-4">
                    <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}"
                        class="img-fluid rounded shadow">
                </div>

                <div class="col-12">
                    <h3 class="text-secondary">{{ $article->subtitle }}</h3>
                    <p class="text-justify">{{ $article->body }}</p>
                </div>

                <div class="col-12 text-center my-4">
                    <a href="{{ route('article.index') }}" class="btn btn-primary">Torna alle ricette</a>
                </div>
            </div>
            @if(Auth::user() && Auth::user()->is_revisor)
            <div class="row justify-content-center my-4">
                <div class="col-auto">
                    <form action="{{ route('revisor.acceptedArticle', $article) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">Accetta la ricetta</button>
                    </form>
                </div>
                <div class="col-auto">
                    <form action="{{ route('revisor.rejectdArticle', $article) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-danger">Rifiuta la ricetta</button>
                    </form>
                </div>
            </div>
    @endif

    </div>



</x-layout>