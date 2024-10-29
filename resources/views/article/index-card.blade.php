<x-layout>
    <div class="container mt-5">
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-4 mb-4">
                    <x-article-card :article="$article" />
                </div>
            @endforeach
        </div>

        <div class="col-12 text-center mt-4">
            <a href="{{ url('/') }}" class="btn btn-primary">Torna alla Home</a>
        </div>
    </div>

    <script>
        AOS.init();
    </script>
</x-layout>
