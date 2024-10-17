<x-layout>


<div class="container mt-5">
    <div class="row">
        @forelse ($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <!-- Immagine dell'articolo -->
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="Immagine Articolo">

                <div class="card-body">
                    <!-- Titolo dell'articolo -->
                    <h5 class="card-title">{{ $article->title }}</h5>

                    <!-- Estratto del contenuto -->
                    <p class="card-text">
                        {{ Str::limit($article->content, 100) }} <!-- Limita il testo a 100 caratteri -->
                    </p>

                    <!-- Link per leggere l'articolo completo -->
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Leggi di più</a>
                </div>

                <div class="card-footer text-muted">
                    <!-- Data di pubblicazione dell'articolo -->
                    Pubblicato il {{ $article->created_at->format('d/m/Y') }}
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-center">Non ci sono articoli disponibili al momento.</p>
        </div>
        @endforelse
    </div>
    <div class="col-12">
            <a href="{{ route('articles.card') }}" class="btn btn-primary">Torna agli articoli</a>
        </div>
</div>


    
<script>
    AOS.init();
</script>

</x-layout>
