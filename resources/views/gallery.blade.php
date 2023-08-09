@extends('layouts.app')

@section('content')
<div class="container mx-auto p-10">
    <form method="GET" action="{{ url('/') }}">
        <div class="flex">
            <select name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-1xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="" @if(!request('category')) selected @endif>Tous</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" @if(request('category') == $category) selected @endif>{{ $category }}</option>
                @endforeach
            </select>
            <button type="submit" class="ml-2 text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">Filter</button>
        </div>
    </form>
</div>
    <div class="mx-auto p-20 justify-items-center px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        @foreach($nfts as $index => $nft)
        <div class="nft-item max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
            <h2 class="text-2xl text-white text-center text-lg font-semibold pb-4">{{ $nft['titre'] }}</h2>
            <img src="{{ asset($nft['fichier']) }}" alt="{{ $nft['titre'] }}" class="w-full">
            <p class="text-white text-1xl">Artist: {{ $nft['artiste'] }}</p>
            <p class="text-white">Description: {{ $nft['description'] }}</p>
            <p class="text-white">Description: {{ $nft['catégorie'] }}</p>
            <p class="text-white">Price: {{ $nft['prix'] }} ETH</p>
            <a href="{{ route('nft.show', $index) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View more</a>
        </div>
        @endforeach
    </div>
@endsection




