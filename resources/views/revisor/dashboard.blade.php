<x-layout>
    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Dashboard Revisore{{Auth::user()->name}}</h1>
            </div>
        </div>
    </div>
    @if (session('msg'))
    <div class="alert alert-success">
        {{session('msg')}}

    </div>
    @endif

    <!-- Articoli da revisionare -->
    <div class="container">
        <h2>Articoli da revisionare</h2>
        <x-articles-table :articles="$unrevionedArticles"/>
    </div>

    <!-- Articoli accettati -->
    <div class="container mt-5">
        <h2>Articoli accettati</h2>
        <x-articles-table :articles="$acceptedArticles"/>
    </div>

    <!-- Articoli rifiutati -->
    <div class="container mt-5">
        <h2>Articoli rifiutati</h2>
        <x-articles-table :articles="$rejectedArticles"/>
    </div>
</x-layout>
