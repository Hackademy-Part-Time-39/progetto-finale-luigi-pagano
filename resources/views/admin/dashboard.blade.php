<x-layout>


    <div class="container">
        <h1>Dashboard Admin</h1>
        <div>
            @if(session('msg'))
            <div class="alert alert-succes">
                {{session('msg')}}

            </div>
            @endif
        </div>

        <h2>Richieste amministratore</h2>
        <x-requeststable :roleRequests="$adminRequest" role="Amministratore" />

        <h2>Richieste moderatore</h2>
        <x-requeststable :roleRequests="$revisorRequest" role="Moderatore" />

        <h2>Richieste gestore</h2>
        <x-requeststable :roleRequests="$writerRequest" role="Gestore" />
    </div>



</x-layout>