<x-layout>
    <div class="container mt-5">
        <div class="row">
            @forelse ($articles as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Immagine dell'articolo -->
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="Immagine Articolo"
                            style="height: 200px; object-fit: cover;">

                        <div class="card-body d-flex flex-column">
                            <!-- Titolo dell'articolo -->
                            <h5 class="card-title">{{ $article->title }}</h5>

                            <!-- Estratto del contenuto -->
                            <p class="card-text flex-grow-1">
                                {{ Str::limit($article->content, 100) }} <!-- Limita il testo a 100 caratteri -->
                            </p>

                            <!-- Link per leggere l'articolo completo -->
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary mt-auto">Leggi di
                                più</a>
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

        <!-- Pulsante per tornare agli articoli -->
        <div class="col-12 text-center mt-4">
            <a href="{{ route('articles.card') }}" class="btn btn-outline-primary">Torna alle ricette</a>
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</x-layout>