<x-layout>
    <div class="container-fluid p-5 bg-light text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1" style="color: #007bff;">Dashboard , {{ Auth::user()->name }} sei Revisore</h1>
                <p class="lead" style="color: #6c757d;">Bentornato nella tua dashboard. Gestisci tutte le ricette in
                    attesa di revisione.</p>
            </div>
        </div>
    </div>

    <!-- Controlla se ci sono messaggi di sessione -->
    @if (session('message'))
        <div class="alert alert-success mt-3">
            {{ session('msg') }}
        </div>
    @endif
    <div class="container ">
        <!-- Sezione Articoli da revisionare -->
        <div class="tablerevisor ">
            <h2 class="titletablerevisor">Ricette da revisionare</h2>
            <!-- Verifica se ci sono articoli non revisionati -->
            @if($unrevionedArticles->isEmpty())
                <p class="text-muted">Non ci sono ricette da revisionare al momento.</p>
            @else
                <x-articles-table :articles="$unrevionedArticles" />
            @endif
        </div>

        <!-- Sezione Articoli accettati -->
        <div class="tablerevisor ">
            <h2 class="titletablerevisor">Ricette accettate</h2>
            <!-- Verifica se ci sono articoli accettati -->
            @if($acceptedArticles->isEmpty())
                <p class="text-muted">Non ci sono ricette accettate.</p>
            @else
                <x-articles-table :articles="$acceptedArticles" />
            @endif
        </div>

        <!-- Sezione Articoli rifiutati -->
        <div class="tablerevisor ">
            <h2 class="titletablerevisor">Ricette rifiutate</h2>
            <!-- Verifica se ci sono articoli rifiutati -->
            @if($rejectedArticles->isEmpty())
                <p class="text-muted">Non ci sono ricette rifiutate.</p>
            @else
                <x-articles-table :articles="$rejectedArticles" />
            @endif
        </div>
        <div>
</x-layout>