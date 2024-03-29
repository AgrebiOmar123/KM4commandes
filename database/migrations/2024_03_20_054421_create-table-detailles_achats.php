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
    {        Schema::create('detail_achat', function (Blueprint $table) {
        $table->increments('id_detail_achat');
        $table->integer('id_achat');
        $table->integer('id_produit');
        $table->integer('prix_achat');
        $table->integer('total');
        $table->integer('subtotal');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_achat');
    }
};
