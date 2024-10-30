<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if ($articles->isEmpty())
                <div class="col-12 text-center my-5">
                    <p class="text-muted fs-4 fw-light">Non ci sono ricette pubblicate al momento.</p>
                    
                </div>
            @else
                @foreach ($articles as $article)
                    <div class="col-md-4 mb-4 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <x-article-card :article="$article" />
                    </div>
                @endforeach
            @endif
        </div>

        <div class="col-12 text-center mt-4">
            <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-4 py-2 shadow-sm" role="button">Torna alla Home</a>
        </div>
    </div>

    
</x-layout>
