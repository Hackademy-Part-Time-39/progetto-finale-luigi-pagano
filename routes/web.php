<?php
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\NewsletterController;
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
Route::get('/article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/article/user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');
Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('subscribe');
Route::get('/chi-siamo', function () {
    return view('chi-siamo');
})->name('chi-siamo');

    Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
    Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');
    Route::middleware(['admin'])->group(function (){
    Route::patch('/admin/{user}/set-admin' ,[AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/{user}/set-revisor' ,[AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/{user}/set-writer' ,[AdminController::class, 'setWriter'])->name('admin.setWriter');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    });
    Route::middleware(['revisor'])->group(function (){
    Route::patch('/revisor/{article}accept' ,[RevisorController::class, 'acceptedArticle'])->name('revisor.acceptedArticle');
    Route::patch('/revisor/{article}reject' ,[RevisorController::class, 'rejectArticle'])->name('revisor.rejectdArticle');
    Route::patch('/revisor/{article}undo' ,[RevisorController::class, 'undodArticle'])->name('revisor.undoArticle');


});



// Rotte per creare, modificare ed eliminare articoli (solo per utenti autenticati)
Route::middleware(['auth'])->group(function () {
    Route::get('/article/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
   Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
    Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');
    Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
});

