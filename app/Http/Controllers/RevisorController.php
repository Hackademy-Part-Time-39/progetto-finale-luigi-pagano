<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function dashboard() {
        $unrevionedArticles = Article::where('is_accepted', NULL)->get();
        $acceptedArticles = Article::where('is_accepted', true)->get();
        $rejectedArticles = Article::where('is_accepted', false)->get();
      
        return view('revisor.dashboard', compact('unrevionedArticle', 'acceptedArticles', 'rejectedArticles'));
    }

public function acceptArticle(Article $article){
$article->is_accept = true; 
$article-save();
return redirect(route('revisor.dashboard'))-with( 'message', 'Articolo pubblicato'); 
}
public function rejectArticle(Article $article){
    $article->is_accept = false; 
    $article-save();
    return redirect(route('revisor.dashboard'))-with( 'message', 'Articolo rifiutato'); 
    }
    public function undoArticle(Article $article){
        $article->is_accept = NULL; 
        $article-save();
        return redirect(route('revisor.dashboard'))-with( 'message', 'Articolo rimandato in revisione'); 
        }

}