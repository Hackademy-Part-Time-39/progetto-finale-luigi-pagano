<x-layout>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">Modifica Articolo</h1>

            <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Campo per il title -->
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $article->title) }}" required>
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo per il subtitle -->
                <div class="mb-3">
                    <label for="subtitle" class="form-label">sottotitle</label>
                    <input type="text" name="subtitle" id="subtitle" class="form-control" value="{{ old('subtitle', $article->subtitle) }}" required>
                    @error('subtitle')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo per l'image -->
                <div class="mb-3">
                    <label for="image" class="form-label">immagine di Copertina</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Selezione della Categoria -->
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select name="category_id" id="category_id" class="form-select" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Campo per il body dell'Articolo -->
                <div class="mb-3">
                    <label for="body" class="form-label">corpo dell'articolo</label>
                    <textarea name="body" id="body" class="form-control" rows="5" required>{{ old('body', $article->body) }}</textarea>
                    @error('body')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Pulsante di Invio -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-warning">Aggiorna Articolo</button>
                </div>
            </form>
        </div>
    </div>
</div>
</x-layout>

