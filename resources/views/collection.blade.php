@extends('layouts.app')

@section('content')
    <h1>My NFTs</h1>
<div class="mx-auto p-20 justify-items-center grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
    @foreach ($nfts as $nft)
        <div class="nft-item max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
            <h2 class="text-white text-3xl">{{ $nft->titre }}</h2>
            <img src="{{ $nft->image }}" alt="{{ $nft->titre }}">
            <p class="text-white text-2xl pt-4">Artist: {{ $nft->artiste }}</p>
            <p class="text-white text-1xl pt-4">{{ $nft->description }}</p>
            
            <!-- Add other details as required -->
        </div>
    @endforeach
</div>
@endsection
