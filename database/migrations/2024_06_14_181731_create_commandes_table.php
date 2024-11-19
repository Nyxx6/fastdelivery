<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produit')->constrained('produits')->cascadeOnDelete();
            $table->foreignId('id_livreur')->constrained('livreurs')->cascadeOnDelete();
            $table->foreignId('id_restaurant')->constrained('restaurants')->cascadeOnDelete();
            $table->foreignId('id_utilisateur')->constrained('users')->cascadeOnDelete();
            $table->integer('prix');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::table('commandes', function (Blueprint $table) {
            $table->dropForeign(['id_produit']);
            $table->dropForeign(['id_livreur']);
            $table->dropForeign(['id_restaurant']);
            $table->dropForeign(['id_utilisateur']);
        });
        Schema::dropIfExists('commandes');
    }
};
