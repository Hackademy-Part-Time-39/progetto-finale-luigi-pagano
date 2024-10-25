<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Mail\CareerRequestMail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class PublicController extends Controller 
{
    public function welcome()
    {
        // Recupera gli ultimi 4 articoli in ordine decrescente di creazione
        $recentArticles = Article::where('is_accepted', true)->orderBy('created_at', 'desc')->take(4)->get();

        // Passa gli articoli alla vista
        return view('welcome', compact('recentArticles'));
    }
    public function careers (){
        return view ('careers');
    }
    
    public function careersSubmit(Request $request)
{
    // Validazione dei dati
    $request->validate([
        'role' => 'required|in:admin,revisor,writer',
        
    ]);

    // Ottenere l'utente loggato
    $user = Auth::user();
    $role = $request->role;
    $email = $user->email;
    
   

    // Inviare l'email con le informazioni raccolte
    Mail::to('noreply-hr@theaulabpost.it')->send(new CareerRequestMail($role,$email));
    switch($role){
        case 'admin' :
            $user->is_admin= NULL;
            break;
        case 'revisor':
            $user->is_revisor = NULL;
            break;
        case 'writer':
            $user->is_writer = NULL;
            break;       
    }
    $user->update();

    // Messaggio di successo e reindirizzamento
    return redirect(route('welcome'))->with('message', 'Richiesta inviata con successo!');
}


    






}