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
            $table->string('title'); // Colonna per il titolo dell'articolo
            $table->string('subtitle'); // Colonna per il sottotitolo
            $table->longtext('body'); // Colonna per il contenuto dell'articolo
            $table->string('image'); // Colonna per il percorso dell'immagine (opzionale)
            $table->unsigneBigInteger('user_id')->nullable(); // Foreign Key verso la tabella users
            $table->foreignId('user_id')->references('id')->on('user')->ondelete('SET NULL'); // Foreign Key verso la tabella categories
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categorues')->onDelete('SET NULL');
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

