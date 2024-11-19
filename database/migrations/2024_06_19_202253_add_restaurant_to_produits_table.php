<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            // Add the id_restaurant column
            $table->foreignId('id_restaurant')->constrained('restaurants')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produits', function (Blueprint $table) {
            // Drop the foreign key constraint first
            $table->dropForeign(['id_restaurant']);

            // Drop the id_restaurant column
            $table->dropColumn('id_restaurant');
        });
    }
};
