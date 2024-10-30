<x-layout>
  
<div id="welcomeCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" style="height: 80vh;">
    <div class="carousel-inner">
      
        <div class="carousel-item active">
            <img src="/chisiamo/bellawelcome.jpeg" class="d-block w-100" alt="Immagina, cucina, assapora" style="height: 80vh; object-fit: cover;">
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 text-center text-white">
                <h1 class="display-4">Immagina, cucina, assapora</h1>
                <p class="lead"></p>
                <a href="{{ route('articles.card') }}" class="btn btn-light btn-lg">Leggi le nostre ricette</a>
            </div>
        </div>

        
        <div class="carousel-item">
            <img src="/chisiamo/scriviricetta.jpg" class="d-block w-100" alt="Second Slide" style="height: 80vh; object-fit: cover;">
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 text-center text-white">
                <h1 class="display-4">Inizia a pubblicar nuove sfiziose ricette</h1>
                <p class="lead"></p>
                <a href="{{ route('articles.create') }}" class="btn btn-light btn-lg">Scrivi qui la tua ricetta</a>
            </div>
        </div>

       
        <div class="carousel-item">
            <img src="/chisiamo/chisiamowelcome.jpg" class="d-block w-100" alt="Third Slide" style="height: 80vh; object-fit: cover;">
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100 text-center text-white">
                <h1 class="display-4">Conoscici meglio</h1>
                <p class="lead"></p>
                <a href="{{ route('chi-siamo') }}" class="btn btn-light btn-lg">Scopri chi siamo</a>
            </div>
        </div>
    </div>

    
    <button class="carousel-control-prev" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
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
