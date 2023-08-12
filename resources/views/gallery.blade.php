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
    <div class="mx-auto p-20 justify-items-center grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
        @foreach($nfts as $index => $nft)
        <div class="nft-item max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
            <h2 class="text-4xl text-white text-left font-semibold pb-4">{{ $nft['titre'] }}</h2>
            <img src="{{url('storage', $nft['image'])}}" alt="{{ $nft['titre'] }}" class="w-full">
            <p class="text-white text-2xl pt-4 font-semibold">Artist: {{ $nft['artiste'] }}</p>
            <p class="text-white text-1xl pb-3 font-semibold">Price: {{ $nft['prix'] }} ETH</p>
            <a href="{{ route('nft.show', $nft['id']) }}" class="">
                <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">View More</button>
            </a>
        </div>
        @endforeach
    </div>
@endsection




