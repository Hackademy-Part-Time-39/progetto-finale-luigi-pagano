<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller
{
    // Metodo per mostrare tutti gli articoli
    
    
        public function index()
        {
            // Prende tutti gli articoli ordinati dal più recente al più vecchio
            $articles =         $recentArticles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();
            // Utilizza la paginazione, 6 articoli per pagina
    
            // Ritorna la vista 'article.index' passando gli articoli
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
        'image' => 'required|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required|exists:categories,id',
        'tags'=>'required|max:255'
    ]);
    $article = Article::create([
        'title'=>$request->title,
        'subtitle'=>$request->subtitle,
        'body'=>$request->body,
        'image'=>$request->file('image')->store('public/images'),
        'category_id'=>$request->category,
        'user_id'=>Auth::user()->id,
    ]);
    $tags =explode(',' , $request->tags);
    foreach($tags as $i=>$tag){
        $tags[$i]= trim($tag);
    }
    foreach($tags as $tag){
        $newTag = Tag::updateOrCreate([
            'name'=> strtolower($tag)
        ]);
        $article->tags()->attach($newTag);
    }
    return redirect(route('welcome'))->with('message', 'Ricetta inviata con successo');


    // Creazione e salvataggio dell'articolo
    $article = new Article($request->all());
    if ($request->hasFile('image')) {
        $article->image = $request->file('image')->store('images','public');
    }
    $article->user_id = auth()->id(); // Associa l'articolo all'utente autenticato
    $article->save();

    // Reindirizzamento con un messaggio di successo
    return redirect()->route('articles.index')->with('success', 'Ricetta correttamente salvata!');
}


   

    // Metodo per mostrare un articolo specifico
    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }
    public function indexAll()
    {
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();

        return view('article.index-card', compact('articles'));
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
    return redirect()->route('article.index')->with('success', 'Ricetta modificata con successo!');

    }

    // Metodo per eliminare un articolo dal database
    public function destroy($id)
    {
        
        $article = Article::findOrFail($id);
        $article->delete();
        
    
        // Reindirizza all'elenco degli articoli con un messaggio di successo
        return redirect()->route('article.index')->with('success', 'Ricetta eliminata con successo!');
    }
 
public function byUser($userId)
{
    $user = User::findOrFail($userId);
    $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(10)->get();
    

    return view('article.index', compact('articles', 'user'));
}
public function category()
{
    return $this->belongsTo(Category::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}
public function byCategory($categoryId)
{
    $category = Category::findOrFail($categoryId);
    $articles =Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(6)->get();
    ;

    return view('article.index', compact('articles', 'category'));
}
// funzione per cercare articoli(ricette)
public function articleSearch(Request $request) {
    $query=$request->input('query');
    $articles=Article::search($query)->where('is_accepted', true)->orderBy('created_at', 'desc')->get();
    return view('article.search-index' , compact('articles', 'query'));
}
public static function middleware () {
    return [
        new Middleware('auth' , except:['index', 'show' , 'byCategory' , 'byUser', 'articleSearch']),

    ];
}






}
