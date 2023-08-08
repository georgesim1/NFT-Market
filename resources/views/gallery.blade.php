<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
    <title>NFT Gallery</title>
</head>
<body class="">
    <h1 class="text-3xl font-bold mb-4">NFT Gallery</h1>
    <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mx-auto p-4">
        @foreach($nfts as $nft)
        <div class="nft-item max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-4">
            <h2 class="text-lg font-semibold">{{ $nft['titre'] }}</h2>
            <img src="{{ asset($nft['fichier']) }}" alt="{{ $nft['titre'] }}" class="w-full">
            <p class="text-gray-700">Artist: {{ $nft['artiste'] }}</p>
            <p class="text-gray-700">Description: {{ $nft['description'] }}</p>
            <p class="text-gray-700">Price: {{ $nft['prix'] }} ETH</p>
            <a href="{{ $nft['adresse'] }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View more</a>
        </div>
        @endforeach
    </div>
</body>
</html>
