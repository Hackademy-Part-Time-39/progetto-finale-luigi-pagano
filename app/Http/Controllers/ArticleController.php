<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Category;

class ArticleController extends Controller
{
    // Metodo per mostrare tutti gli articoli
    public function index()
    {
       
            // Recupera tutti gli articoli dal database
            $articles = Article::with('user', 'category')->get();
    
            // Ritorna la vista 'article.index' e passa la variabile $articles
            return view('article.index', compact('articles'));
        
    }

    public function create()
    {
        // Recupera tutte le categorie per mostrarle nel form
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    // Metodo per salvare un nuovo articolo nel database
    public function store(Request $request)
{
    // Validazione dei dati
    $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);

    // Creazione e salvataggio dell'articolo
    $article = new Article($request->all());
    if ($request->hasFile('image')) {
        $article->image = $request->file('image')->store('images');
    }
    $article->user_id = auth()->id(); // Associa l'articolo all'utente autenticato
    $article->save();

    // Reindirizzamento con un messaggio di successo
    return redirect()->route('articles.index')->with('success', 'Articolo correttamente salvato!');
}


   

    // Metodo per mostrare un articolo specifico
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }


    // Metodo per mostrare il form di modifica di un articolo
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all(); 
        return view('article.edit', compact('article', 'categories'));
    }

    // Metodo per aggiornare un articolo nel database
    public function update(Request $request, $id)
{
    // Validazione dei dati
    $request->validate([
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string|max:255',
        'body' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|exists:categories,id',
    ]);
    
    // Recupera l'articolo esistente
    $article = Article::findOrFail($id);

    // Aggiorna i campi
    $article->update($request->all());

    // Se l'utente ha caricato una nuova image
    if ($request->hasFile('image')) {
        $article->image = $request->file('image')->store('images');
        $article->save();
    }

    // Reindirizza all'elenco degli articoli con un messaggio di successo
    return redirect()->route('articles.index')->with('success', 'Articolo modificato con successo!');

    }

    // Metodo per eliminare un articolo dal database
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
    
        // Reindirizza all'elenco degli articoli con un messaggio di successo
        return redirect()->route('articles.index')->with('success', 'Articolo eliminato con successo!');
    }


}
