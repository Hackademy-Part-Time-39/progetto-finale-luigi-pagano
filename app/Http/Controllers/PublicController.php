<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\PublicController;

class PublicController extends Controller
{
    public function welcome()
    {
        // Recupera gli ultimi 4 articoli in ordine decrescente di creazione
        $recentArticles = Article::orderBy('created_at', 'desc')->take(4)->get();

        // Passa gli articoli alla vista
        return view('welcome', compact('recentArticles'));
    }
}
