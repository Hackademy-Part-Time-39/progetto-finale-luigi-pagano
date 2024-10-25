<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Subscriber; // Se hai un modello per gestire i sottoscrittori
use App\Mail\SubscriptionConfirmation; // Se vuoi inviare una mail di conferma

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validare l'email
        $request->validate([
            'email' => 'required|email|unique:subscribers,email'
        ]);

        // Aggiungi l'email al database
        Subscriber::create([
            'email' => $request->email,
        ]);

        // Invia una mail di conferma (opzionale)
        Mail::to($request->email)->send(new SubscriptionConfirmation());

        // Messaggio di successo e redirect
        return redirect()->back()->with('success', 'Iscrizione alla newsletter avvenuta con successo!');
    }
}
