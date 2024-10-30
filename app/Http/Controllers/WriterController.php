<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Article;

class WriterController extends Controller
{
    public function dashboard()
    {
        $articles = Auth::user()->articles()->orderBy('created_at', 'desc')->get();
        $acceptedArticles = $articles->where('is_accepted', true);
        $rejectedArticles = $articles->whereNotNull('is_accepted')->where('is_accepted', false);
        $unrevisionedArticles = $articles->whereNull('is_accepted');
        return view('writer.dashboard', compact('acceptedArticles', 'rejectedArticles', 'unrevisionedArticles'));



    }
}
