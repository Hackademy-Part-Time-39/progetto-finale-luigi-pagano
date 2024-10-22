<x-layout>

    <div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-4 text-primary">Bentornato, Amministratore {{ Auth::user()->name }}</h1>
                <p class="lead text-muted">Gestisci le richieste e controlla le attività della piattaforma.</p>
            </div>
        </div>
    </div>
    

    @if (session('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif

    <div class="container mt-5">
        <h2 class="text-primary mb-4">Richieste Amministratore</h2>
        <x-requeststable :roleRequests="$adminRequests" role="Amministratore" />

        <h2 class="text-warning mb-4">Richieste Revisore</h2>
        <x-requeststable :roleRequests="$revisorRequests" role="Revisore" />

        <h2 class="text-info mb-4">Richieste Scrittore</h2>
        <x-requeststable :roleRequests="$writerRequests" role="Scrittore" />
        <hr>
        <div class="container my-5">
          
    <div class="row justify-content-center ">
        <div class="col-12">
            <h2>Tutti i tags</h2>
            <x-metainfo-table :metaInfos="$tags" metaType="tags"/>

        </div>
        <div class="row justify-content-center ">
        <div class="col-12">
            <h2>Tutte le categorie</h2>
            <x-metainfo-table :metaInfos="$categories" metaType="categorie"/>

        </div>
    </div>
    </div>

</x-layout>
