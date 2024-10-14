<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Definire i campi assegnabili massivamente
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_revisor',
        'is_writer'
    ];

    // Relazione: un utente ha molti articoli
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
