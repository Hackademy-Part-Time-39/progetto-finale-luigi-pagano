<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-4">Crea un Nuovo Articolo</h1>

                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Token di sicurezza CSRF -->

                    <!-- Campo per il titolo -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}"
                            required autofocus placeholder="Inserisci il titolo dell'articolo">
                        @error('title')
                            <div class="text-danger mt-1">⚠️ {{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo per il sottotitolo -->
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control"
                            value="{{ old('subtitle') }}" required placeholder="Inserisci il sottotitolo dell'articolo">
                        @error('subtitle')
                            <div class="text-danger mt-1">⚠️ {{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Campo per l'immagine -->
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine di Copertina</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        @error('image')
                            <div class="text-danger mt-1">⚠️ {{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Selezione della Categoria -->
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Categoria</label>
                        <select name="category_id" id="category_id" class="form-select" required>
                            <option value="" disabled selected>Seleziona una categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>


                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="text-danger mt-1">⚠️ {{ $message }}</div>
                        @enderror
                    </div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" name="tags" class="form-control" id="tags" value="{{old('tags')}}">
                    <span class="small text-muted fst-italic">Dividi ogni tag con una virgola</span>
                    @error('tags')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div>

                    </div>

                    <!-- Campo per il corpo dell'Articolo -->
                    <div class="mb-3">
                        <label for="body" class="form-label">Corpo dell'Articolo</label>
                        <textarea name="body" id="body" class="form-control" rows="5" required
                            placeholder="Scrivi il corpo dell'articolo...">{{ old('body') }}</textarea>
                        @error('body')
                            <div class="text-danger mt-1">⚠️ {{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Pulsante di Invio -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Invia Articolo per la Revisione</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>