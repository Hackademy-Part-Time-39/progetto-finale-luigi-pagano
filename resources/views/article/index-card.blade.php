<x-layout>
    <div class="container mt-5">
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Immagine dell'articolo -->
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="Immagine Articolo"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" class="card-img-top" alt="Immagine Predefinita"
                                 style="height: 200px; object-fit: cover;">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <!-- Categoria -->
                            @if ($article->category)
                                <span class="badge bg-secondary mb-2">{{ $article->category->name }}</span>
                            @endif

                            <!-- Titolo dell'articolo -->
                            <h5 class="card-title">{{ $article->title }}</h5>

                            <!-- Nome dell'autore -->
                            <p class="text-muted">Scritto da: 
                                <a href="{{ route('article.byUser', $article->user->id) }}" class="text-decoration-none">
                                    {{ $article->user->name }}
                                </a>
                            </p>

                            <!-- Estratto del contenuto -->
                            <p class="card-text flex-grow-1">
                                {{ Str::limit($article->content, 100) }}
                            </p>

                            <!-- Tag dell'articolo -->
                            <p class="small text-muted mb-2">
                                @foreach ($article->tags as $tag)
                                    <span class="badge bg-light text-dark">#{{ $tag->name }}</span>
                                @endforeach
                            </p>

                            <!-- Link per leggere l'articolo completo -->
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary mt-auto">
                                Leggi di più
                            </a>
                        </div>

                        <div class="card-footer text-muted">
                            <!-- Data di pubblicazione dell'articolo -->
                            <small>Pubblicato il {{ $article->created_at->format('d/m/Y') }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center text-muted">Non ci sono ricette disponibili al momento.</p>
                </div>
            @endforelse
        </div>

        <!-- Pulsante per tornare alla Home -->
        <div class="text-center mt-4">
            <a href="{{ url('/') }}" class="btn btn-primary">Torna alla Home</a>
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</x-layout>
