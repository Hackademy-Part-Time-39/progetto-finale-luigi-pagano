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
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm border-0" style="border-radius: 15px; overflow: hidden;" data-aos="fade-up"
                         data-aos-duration="1000">
                        @if ($article->image)
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title" style="color: #2c3e50;">{{ $article->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($article->subtitle, 100) }}</p>

                            <!-- Categoria -->
                            @if ($article->category)
                                <a href="{{ route('article.byCategory', $article->category) }}"
                                   class="text-capitalize text-muted badge bg-secondary">{{ $article->category->name }}</a>
                            @else
                                <p class="small text-muted">Nessuna categoria</p>
                            @endif

                            <p class="card-text"><small class="text-muted">
                                Scritto da <a href="{{ route('article.byUser', $article->user) }}"
                                              class="text-info">{{ $article->user->name }}</a> il
                                {{ $article->created_at->format('d M Y') }}
                            </small></p>

                            <!-- Tags -->
                            <p class="small text-muted my-0">
                                @foreach ($article->tags as $tag)
                                    #{{ $tag->name }}
                                @endforeach
                            </p>

                            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-info btn-sm"
                               style="border-radius: 20px;">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

   

    <script>
        AOS.init();
    </script>
</x-layout>
