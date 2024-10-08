<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Metodo per mostrare tutti gli articoli
    public function index()
    {
        $articles = Article::all(); // Recupera tutti gli articoli dal database
        return view('articles.index', compact('articles')); // Passa i dati alla vista
    }

    // Metodo per mostrare il form di creazione di un nuovo articolo
    public function create()
    {
        return view('articles.create');
    }

    // Metodo per salvare un nuovo articolo nel database
    public function store(Request $request)
    {
        $request->validate([
            'titolo' => 'required',
            'sottotitolo' => 'required',
            'corpo' => 'required',
            'immagine' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Crea un nuovo articolo
        $article = new Article($request->all());

        if ($request->hasFile('immagine')) {
            $article->immagine = $request->file('immagine')->store('images');
        }

        $article->user_id = auth()->id(); // Associa l'utente autenticato
        $article->save();

        return redirect()->route('articles.index')->with('success', 'Articolo creato con successo!');
    }

    // Metodo per mostrare un articolo specifico
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    // Metodo per mostrare il form di modifica di un articolo
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    // Metodo per aggiornare un articolo nel database
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'titolo' => 'required',
            'sottotitolo' => 'required',
            'corpo' => 'required',
            'immagine' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
        ]);

        $article->update($request->all());

        if ($request->hasFile('immagine')) {
            $article->immagine = $request->file('immagine')->store('images');
            $article->save();
        }

        return redirect()->route('articles.show', $article)->with('success', 'Articolo aggiornato con successo!');
    }

    // Metodo per eliminare un articolo dal database
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Articolo eliminato con successo!');
    }
}
