@extends('layouts.app')

@section('content')
<div class="container mx-auto p-10 flex flex-wrap">
    <div class="w-1/2">
        <img src="{{ asset($nft['fichier']) }}" alt="{{ $nft['titre'] }}" class="">
    </div>
    <div class="w-1/2 text-white space-y-2">
        <h1 class="text-3xl font-bold mb-4">{{ $nft['titre'] }}</h1>
        <p>Artist: {{ $nft['artiste'] }}</p>
        <p>Category: {{ $nft['catégorie'] }}</p>
        <p>Description: {{ $nft['description'] }}</p>
        <p>Price: {{ $nft['prix'] }} ETH</p>
        <a href="{{ $nft['adresse'] }}" class="text-blue-700">
            <button type="button" class="focus:outline-none bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Buy</button>
        </a>
    </div>
</div>
@endsection