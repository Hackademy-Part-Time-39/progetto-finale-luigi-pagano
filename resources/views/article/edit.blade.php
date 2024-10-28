<x-layout>

<style>
    .container-fluid {
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        color: #495057;
    }
    
    .card-edit {
        border: 1px solid #dee2e6;
        border-radius: 15px;
    }

    .form-label {
        font-weight: 600;
        color: #6c757d;
    }

    .form-control {
        border: 1px solid #ced4da;
        border-radius: 10px;
        padding: 12px;
        transition: border-color 0.3s;
    }

    .form-control:focus {
        border-color: #6c757d;
        box-shadow: 0 0 8px rgba(108, 117, 125, 0.2);
    }

    .btn {
        font-weight: 600;
        border-radius: 8px;
        transition: background-color 0.3s, color 0.3s;
    }

    .btn-outline-secondary:hover {
        background-color: #6c757d;
        color: white;
    }

    .text-secondary:hover {
        text-decoration: underline;
        color: #495057;
    }

    .current-image {
        border-radius: 10px;
        margin-top: 10px;
        max-width: 100%;
        height: auto;
    }
</style>

<div class="container-fluid p-5 text-center">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1 class="display-1">Modifica l'articolo</h1>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <form action="{{ route('article.update', $article) }}" method="POST" class="card-edit p-5 shadow" enctype="multipart/form-data">
                @csrf  
                @method('PUT')  
                
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{ $article->title }}">
                    @error('title')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="subtitle" class="form-label">Sottotitolo</label>
                    <input type="text" name="subtitle" class="form-control" id="subtitle" value="{{ $article->subtitle }}">
                    @error('subtitle')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Immagine Attuale</label>
                    <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="current-image">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Nuova Immagine</label>
                    <input type="file" name="image" class="form-control" id="image">
                    @error('image')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Categoria</label>
                    <select name="category" id="category" class="form-control">
                        <option selected disabled>Seleziona categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                                @if($article->category_id == $category->id) selected @endif>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" name="tags" class="form-control" id="tags" 
                           value="{{ $article->tags->implode('name', ', ') }}">
                    <span class="small text-muted fst-italic">Dividi ogni tag con una virgola</span>
                    @error('tags')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Corpo del testo</label>
                    <textarea name="body" class="form-control" id="body" cols="30" rows="7">{{ $article->body }}</textarea>
                    @error('body')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-3 d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-outline-secondary">Modifica articolo</button>
                    
                    <form action="{{ route('article.destroy', $article) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>

                <div class="mt-3 text-center">
                    <a href="{{ route('welcome') }}" class="text-secondary mt-2">Torna alla home</a>
                </div>
            </form>
        </div>
    </div>
</div>

</x-layout>

