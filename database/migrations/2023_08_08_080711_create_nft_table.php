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
            $table->string('titre');
            $table->string('artiste');
            // $table->string('proprietaire')->nullable(); // This line was changed
            $table->text('description');
            $table->string('adresse_du_contrat')->nullable();
            $table->enum('token_standard', ['ERC-721', 'ERC-1155', 'ERC-998']);
            $table->decimal('prix', 10, 5)->default(1); // Adjust scale and precision as needed for ETH
            $table->string('image')->nullable();
            $table->enum('categorie', ['collectible', 'metaverse', 'utilitaire', 'jeux vidéo online']);
            $table->timestamps();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('set null');
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
