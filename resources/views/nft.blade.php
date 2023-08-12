@extends('layouts.app')

@section('content')
<div class="container mx-auto p-10 flex flex-wrap">
    <div class="w-1/2">
        <img src="{{url('storage', $nft['image'])}}" alt="{{ $nft['titre'] }}" class="">
    </div>
    <div class="w-1/2 text-white space-y-2 pl-5">
        <h1 class="text-3xl font-bold mb-4">{{ $nft['titre'] }}</h1>
        <p>Artist: {{ $nft['artiste'] }}</p>
        <p>Category: {{ $nft['categorie'] }}</p>
        <p>Description: {{ $nft['description'] }}</p>
        <p>Price: {{ $nft['prix'] }} ETH</p>
        
        <!-- Checking ownership and user's funds to display the Buy button -->
        @if((!is_null($nft['owner_id']) && auth()->user()->portfolio >= $nft['prix']))
        <form action="{{ route('nft.purchase', $nft['id']) }}" method="POST">
            @csrf
            <button type="submit" class="text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 mr-2 mb-2">
                <svg class="w-4 h-4 mr-2 -ml-1 text-[#626890]" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="ethereum" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M311.9 260.8L160 353.6 8 260.8 160 0l151.9 260.8zM160 383.4L8 290.6 160 512l152-221.4-152 92.8z"></path></svg>
                Pay with Ethereum
              </button>
            </form>
        @else 
        <p>Not enough ETH</p>
        @endif
    </div>
</div>
@endsection



