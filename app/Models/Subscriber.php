<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    // Permetti l'assegnazione di massa solo per il campo 'email'
    protected $fillable = ['email'];

    // (Opzionale) Aggiungi altre configurazioni se necessario
}
