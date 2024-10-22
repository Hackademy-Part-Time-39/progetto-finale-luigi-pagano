<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Esegui la migrazione per creare la tabella delle categorie.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Chiave primaria auto-incrementante
            $table->string('name'); // Colonna per il nome della categoria
            $table->string('description')->nullable(); // Descrizione della categoria
            $table->timestamps(); // Aggiunge created_at e updated_at
        });

        // Popolare la tabella categories con alcune categorie predefinite
        $defaultCategories = [
            ['name' => 'Primi Piatti', 'description' => 'Ricette di primi piatti'],
            ['name' => 'Secondi Piatti', 'description' => 'Ricette di secondi piatti'],
            ['name' => 'Contorni', 'description' => 'Ricette di contorni'],
            ['name' => 'Dessert', 'description' => 'Ricette di dessert'],
            ['name' => 'Cucina Vegana', 'description' => 'Ricette di cucina vegana']
        ];

        // Inserisci le categorie predefinite nel database
        DB::table('categories')->insert($defaultCategories);
    }

    /**
     * Inverti la migrazione.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
