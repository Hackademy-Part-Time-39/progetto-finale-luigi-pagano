<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Esegui la migrazione per creare la tabella degli articoli.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id(); // Chiave primaria auto-incrementante
            $table->string('titolo'); // Colonna per il titolo dell'articolo
            $table->string('sottotitolo'); // Colonna per il sottotitolo
            $table->text('corpo'); // Colonna per il contenuto dell'articolo
            $table->string('immagine')->nullable(); // Colonna per il percorso dell'immagine (opzionale)
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign Key verso la tabella users
            $table->foreignId('category_id')->constrained()->onDelete('set null'); // Foreign Key verso la tabella categories
            $table->timestamps(); // Aggiunge le colonne created_at e updated_at
        });
    }

    /**
     * Inverti la migrazione.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}

