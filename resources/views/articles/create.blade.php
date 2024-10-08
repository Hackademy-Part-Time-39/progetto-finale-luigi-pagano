<form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="titolo">Titolo:</label>
    <input type="text" name="titolo" id="titolo" required>
    
    <label for="sottotitolo">Sottotitolo:</label>
    <input type="text" name="sottotitolo" id="sottotitolo" required>

    <label for="corpo">Corpo dell'articolo:</label>
    <textarea name="corpo" id="corpo" required></textarea>

    <label for="immagine">Immagine:</label>
    <input type="file" name="immagine" id="immagine">

    <label for="category_id">Categoria:</label>
    <select name="category_id" id="category_id" required>
        <!-- Inserisci le opzioni per ogni categoria -->
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <button type="submit">Crea Articolo</button>
</form>
