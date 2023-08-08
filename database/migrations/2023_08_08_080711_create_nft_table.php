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
        Schema::create('nft', function (Blueprint $table) {
            $table->id();
            $table->string('titre', 100);
            $table->string('artiste');
            $table->string('proprietaire');
            $table->string('description', 255)->nullable();
            $table->string('adresse_du_contrat');
            $table->enum('token_standard', ['ERC-721', 'ERC-1155', 'ERC-998']);
            $table->decimal('prix', 10, 5); // Adjust scale and precision as needed for ETH
            $table->string('image')->nullable();
            $table->enum('categorie', ['collectible', 'metaverse', 'utilitaire', 'jeux vidéo online']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nft');
    }
};
