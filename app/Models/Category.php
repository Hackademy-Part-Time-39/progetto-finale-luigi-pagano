<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Definiamo quali campi possono essere riempiti tramite mass assignment
    protected $fillable = [
        'name',  // Nome della categoria
    ];
}
