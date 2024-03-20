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
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id_produit');
            $table->integer('id_categorie');
            $table->integer('id_tva');
            $table->string('name_produit')->unique();
            $table->string('marque')->nullable();
            $table->double('prix_achat');
            $table->tinyinteger('discount')->default(0);
            $table->double('prix_vente');
            $table->double('stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
