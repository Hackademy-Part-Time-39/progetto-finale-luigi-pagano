<?php
use App\Http\Controllers\PageController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

//Route::get('/', [PageController::class, 'welcome']);
//Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index'); // Mostra tutti gli articoli
//Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create'); // Form per creare un nuovo articolo
//Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store'); // Salva un nuovo articolo nel database
//Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show'); // Mostra un articolo specifico
//Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit'); // Form per modificare un articolo
//Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update'); // Aggiorna l'articolo
//Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy'); // Elimina un articolo
//Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
//Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');






// Rotte per visualizzare articoli (accessibili a tutti)
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/categories/{category}', [ArticleController::class, 'byCategory'])->name('articles.byCategory');
Route::get('/users/{user}', [ArticleController::class, 'byUser'])->name('articles.byUser');
Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article', [ArticleController::class, 'index'])->name('article.index');




// Rotte per creare, modificare ed eliminare articoli (solo per utenti autenticati)
Route::middleware(['auth'])->group(function () {
    Route::get('/article/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
   Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

