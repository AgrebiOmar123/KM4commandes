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
        Schema::create('vente', function (Blueprint $table) {
            $table->increments('id_vente');
            $table->integer('id_client');
            $table->integer('total_items');
            $table->integer('prix_total');
            $table->tinyInteger('discount')->default(0);
            $table->integer('etat_paiement')->default(0);
            $table->integer('etat-valid')->default(0);
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vente');
    }
};
