<x-layout>
  
    <div class="hero-section text-center text-white"
         style="background-image: url('/welcome/immaginawelcome.jpg'); height: 80vh; background-size: cover; background-position: center;">
        <div class="d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="display-4">Immagina, cucina, assapora</h1>
            <p class="lead"></p>
            <a href="{{ route('article.index') }}" class="btn btn-light btn-lg">Leggi le nostre ricette</a>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="text-center mb-5">Ultimi Articoli</h2>
        
        <div class="row">
            @foreach ($recentArticles as $article)
                <div class="col-md-4 mb-4">
                   
                    <x-article-card :article="$article" />
                </div>
            @endforeach
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</x-layout>
