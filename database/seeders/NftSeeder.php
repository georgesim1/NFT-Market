<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\NFT;
use Illuminate\Support\Facades\DB;

class NftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $json = File::get(public_path('nft.json'));
    $data = json_decode($json);
    
    // Looping through each item and inserting it into the database
    foreach ($data as $item) {
        DB::table('nft')->insert([
            'titre' => $item->titre,
            'artiste' => $item->artiste,
            'description' => $item->description,
            'adresse_du_contrat' => $item->adresse, // Matching the 'adresse' in the JSON to 'adresse_du_contrat' in the migration
            'token_standard' => $item->standard, // Matching the 'standard' in the JSON to 'token_standard' in the migration
            'prix' => $item->prix,
            'image' => $item->image,
            'categorie' => $item->categorie, // Make sure the accent in 'catégorie' is correct
            'owner_id' => rand(2,5),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
}
