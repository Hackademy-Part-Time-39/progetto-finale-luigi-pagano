
<x-layout>
    <!-- da sistemare -->
    <div class="hero-section text-center text-white" style="background-image: url('path/to/your/image.jpg'); height: 80vh; background-size: cover; background-position: center;">
    <div class="d-flex flex-column justify-content-center align-items-center h-100">
        <h1 class="display-4">Come un Blog ti cambia la vita</h1>
        <p class="lead"></p>
        <a href="{{ route('article.index') }}" class="btn btn-light btn-lg">Leggi i nostri articoli</a>
    </div>
</div>

</div>

   
    </div>
    <div class="container my-5">
    <h2 class="text-center mb-5">Ultimi Articoli</h2>
    <div class="row" class="card-container">
        @foreach ($recentArticles as $article)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-0" style="border-radius: 15px overflow: hidden;" data-aos="fade-up" data-aos-duration="1000">
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                    @endif
                    <div class="card-footer" style="background-color: #f9f9f9;">
                        <h5 class="card-title" style="color: #2c3e50;">{{ $article->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($article->subtitle, 100) }}</p>
                        <a href="{{ route('article.byCategory', $article->category) }}" class="badge bg-secondary">
    {{ $article->category->name }}
</a>
 <!--<p>
    Pubblicato da:
    <a href="{{ route('article.byUser', $article->user) }}" class="text-decoration-none">
        {{ $article->user->name }}
    </a>
</p>-->
<!-- Categoria -->
<span class="badge badge-pill badge-primary mb-2">{{ $article->category->name }}</span>

<p class="card-text"><small class="text-muted">Scritto da <a href="{{ route('article.byUser', $article->user) }}" class="text-info">{{ $article->user->name }}</a> il {{ $article->created_at->format('d M Y') }}</small></p>


                        <a href="{{ route('article.show', $article) }}" class="btn btn-outline-info btn-sm" style="border-radius: 20px;">Leggi</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="newsletter-section text-center my-5 py-5" style="background-color: #f5f5f5;">
    <h3>Resta sempre aggiornato sulle novità</h3>
    <p>Sottoscrivi la newsletter per ricevere tutte le novità e le offerte a te riservate</p>
    <form action="/subscribe" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Mail" required class="form-control my-3" style="max-width: 400px; margin: 0 auto;">
        <button type="submit" class="btn btn-primary">Sottoscrivi</button>
    </form>
</div>

<script>
    AOS.init();
</script>

</x-layout>
