<x-layout>


<div class="container mt-5">
    <h1>{{ $article->title }}</h1>
    <p><strong>Sottotitolo: </strong> {{ $article->subtitle }}</p>
    <p><strong>Autore: </strong> {{ $article->user->name }}</p>
    <p><strong>Categoria: </strong> {{ $article->category ? $article->category->name : 'N/A' }}</p>
    <p><strong>Data di Creazione: </strong> {{ $article->created_at->format('d/m/Y') }}</p>
    <hr>
    <div class="content">
       {{$article->body}}
    </div>
</div>
</x-layout>
