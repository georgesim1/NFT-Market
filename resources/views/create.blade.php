@extends('layouts.app')

@section('content')
<div class="container ">
    <form action="{{ route('nft.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="">
            <label class="text-white" for="titre">Title:</label>
            <input type="text" name="titre" required>
        </div>
        <div class="">
            <label class="text-white" for="image">Image:</label>
            <input class="text-white" type="file" name="image" accept="image/*" required>
        </div>
        <div class="">
            <label class="text-white" for="artiste">Artist:</label>
            <input type="text" name="artiste" required>
        </div>
        <div class="">
            <label class="text-white" for="description">Description:</label>
            <input type="text" name="description" required>
        </div>
        <div class="">
            <label class="text-white" for="prix">Prix:</label>
            <input type="number" name="prix" step="0.01" required>
        </div>
        <div class="">
            <label class="text-white" for="categorie">Categorie:</label>
            <select name="categorie" required>
                <option value="collectible">Collectible</option>
                <option value="metaverse">Metaverse</option>
                <option value="utilitaire">Utilitaire</option>
                <option value="jeux vidéo online">Jeux Vidéo Online</option>
            </select>
        </div>
        <!-- Add other input fields as needed -->
        <button type="post" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Create NFT</button>
    </form>
</div>
@endsection