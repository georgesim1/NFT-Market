@extends('layouts.app')

@section('content')
    <h1>My NFTs</h1>
<div class="mx-auto p-20 justify-items-center grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
    @foreach ($nfts as $nft)
        <div class="nft-item max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
            <h2 class="text-white text-3xl pb-5">{{ $nft->titre }}</h2>
            <img src="{{ $nft->image }}" alt="{{ $nft->titre }}">
            <p class="text-white text-2xl pt-4">Artist: {{ $nft->artiste }}</p>
            <p class="text-white text-1xl pb-2">{{ $nft->description }}</p>
            <form action="{{ route('nft.sell', $nft->id) }}" method="POST">
                @csrf
                <button type="submit" class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 mr-2 mb-2">
                    <svg class="w-4 h-4 mr-2 -ml-1 text-[#626890]" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="ethereum" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M311.9 260.8L160 353.6 8 260.8 160 0l151.9 260.8zM160 383.4L8 290.6 160 512l152-221.4-152 92.8z"></path></svg>
                    Sell with Ethereum
                  </button>
                </form>
            <!-- Add other details as required -->
        </div>
    @endforeach
</div>
@endsection
