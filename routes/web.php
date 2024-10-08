<?php
use App\Http\Controllers\ArticleController;

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index'); // Mostra tutti gli articoli
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create'); // Form per creare un nuovo articolo
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store'); // Salva un nuovo articolo nel database
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show'); // Mostra un articolo specifico
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit'); // Form per modificare un articolo
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update'); // Aggiorna l'articolo
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy'); // Elimina un articolo
