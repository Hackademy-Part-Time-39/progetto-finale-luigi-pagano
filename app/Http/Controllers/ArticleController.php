<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
        'category_id'=>$request->category_id,
        'user_id'=>Auth::user()->id,
        'slug'=> Str::slug($request->title),
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
    public function edit(Article $article)
    {
        if(Auth::user()->id == $article->user_id){
        return view('article.edit', compact('article'));
    }
    return redirect()->route('welcome')->with('alert', 'Accesso non consentito');
}
    // Metodo per aggiornare un articolo nel database
    public function update(Request $request, Article $article)
{
   
    // Validazione dei dati
    $request->validate([
        'title' => 'required|min:5|unique:articles,title,'.$article->id,
        'subtitle' => 'required|string|min:5',
        'body' => 'required|string|min:10',
        'image' => 'image',
        'category' => 'required',
        'tags'=>'required'
    ]);
    
    $article->update([
        'title'=> $request->title,
        'subtitle'=> $request->subtitle,
        'body'=> $request->body,
        'category_id'=> $request->category,
        'slug'=> Str::slug($request->title),
    ]);


    if ($request->image) {
        Storage::delete($article->image);
        $article->update([
            'image'=> $request->file('image')->store('public/images')
            ]);
    }
    $tags = explode(',', $request->tags);
    foreach ($tags as $i=>$tag) {
        $tags[$i] =trim($tag);

    

    }
    $newTags = [];
    foreach ($tags as $tag) {
        $newTag= Tag::updateOrCreate([
            'name'=>strtolower($tag)

        ]);
        $newTags[]= $newTag->id;
    }
    $article->tags()->sync($newTags);
    return redirect(route('writer.dashboard'))->with('message','Ricetta modificata con successo');
}

    // Metodo per eliminare un articolo dal database
    public function destroy(Article $article)
    {
        
      foreach($article->tag as $tag) {
        $article->tags()->detach($tag);
      }
      $article->delete();
      return redirect()->back()->with('message','Ricetta cancellata con successo');
        
    
       
    }
 
public function byUser($userId)
{
    $user = User::findOrFail($userId);
    $articles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(10)->get();
    

    return view('article.index', compact('articles', 'user'));
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
