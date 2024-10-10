<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Definire i campi che possono essere assegnati massivamente
    protected $fillable = ['title', 'subtitle', 'body', 'image', 'user_id', 'category_id'];

    // Relazione: un articolo appartiene a un solo utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
