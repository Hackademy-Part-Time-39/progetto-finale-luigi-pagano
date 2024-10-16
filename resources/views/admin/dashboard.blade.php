<x-layout>


<div class="container-fluid p-5 bg-secondary-subtle text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="display-1">Bentornato, Amministratore {{ Auth::user()->name }}</h1>
            </div>
        </div>
    </div>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif
        </div>
       
        <h2>Richieste amministratore</h2>
        <x-requeststable :roleRequests="$adminRequests" role="Amministratore" />

        <h2>Richieste revisore</h2>
        <x-requeststable :roleRequests="$revisorRequests" role="Revisore" />

        <h2>Richieste scrittore</h2>
        <x-requeststable :roleRequests="$writerRequests" role="Scrittore" />
    </div>



</x-layout>