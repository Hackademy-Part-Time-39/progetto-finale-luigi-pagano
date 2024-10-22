<?php

namespace App\Models;

use App\Models\Tag;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory , Searchable;

    // Definire i campi che possono essere assegnati massivamente
    protected $fillable = ['title', 'subtitle', 'body', 'image', 'user_id', 'category_id' , 'is_accepted'];

    // Relazione: un articolo appartiene a un solo utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function toSearchableArray () {
        return [
            'id' => $this->id,
            'title' =>$this->title,
            'subtitle' =>$this->subtitle,
            'body'=>$this->subtitle,
            'categoty' =>$this->category,
        ];
    }
    public function tags () {
        return $this->belongsToMany(Tag::class);
    }
}
