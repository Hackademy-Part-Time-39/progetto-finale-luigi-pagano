<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PublicController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PublicController extends Controller implements HasMiddleware
{
    public function welcome()
    {
        // Recupera gli ultimi 4 articoli in ordine decrescente di creazione
        $recentArticles = Article::orderBy('created_at', 'desc')->take(4)->get();

        // Passa gli articoli alla vista
        return view('welcome', compact('recentArticles'));
    }
    public function careers (){
        return view ('careers');
    }
    public static function middleware()
    {
        return [
            new Middleware ('auth',except: ['welcome']),
        ];
    }
    public function careersSubmit(Request $request){
        $request->validate([
            'role'=>'required',
            'email'=> 'required|email',
            'message' => 'required'
        ]);
    }
    public function requestRole(Request $request)
{
    // Validare la richiesta
    $request->validate([
        'role' => 'required|in:admin,revisor,writer',
        'message' => 'required|string|max:500',
    ]);

    // Ottenere l'utente autenticato
    $user = Auth::user();

    // Impostare il ruolo richiesto a NULL per segnare la richiesta
    switch ($request->role) {
        case 'admin':
            $user->admin = NULL;
            break;
        case 'revisor':
            $user->revisor = NULL;
            break;
        case 'writer':
            $user->writer = NULL;
            break;
    }

    // Salvare le modifiche
    $user->save();

    // Inviare l'email
    Mail::to('admin@example.com')->send(new CareerRequestMail($request->role, $user->email, $request->message));

    // Reindirizzare con un messaggio di successo
    return redirect()->route('careers')->with('success', 'La tua richiesta è stata inviata con successo. Attendi l\'approvazione.');
}
    
}


