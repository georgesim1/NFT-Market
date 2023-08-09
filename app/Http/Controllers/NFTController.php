<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NFTController extends Controller
{
    public function index(Request $request)
    {
        $json = file_get_contents(public_path('nft.json'));
        $nfts = json_decode($json, true);

        // Get unique categories
        $categories = collect($nfts)->pluck('catégorie')->unique()->values();

        // Apply the category filter if it's set
        if ($request->has('category') && !empty($request->category)) {
            $category = $request->category;
            $nfts = array_filter($nfts, function ($nft) use ($category) {
                return $nft['catégorie'] === $category;
            });
        }

        return view('/gallery', ['nfts' => $nfts, 'categories' => $categories]);
    }
    public function show($id)
    {
        $json = file_get_contents(public_path('nft.json'));
        $nfts = json_decode($json, true);
        $nft = collect($nfts)->firstWhere('id', $id); // Assuming 'id' is a unique identifier
        if (!$nft) {
            abort(404);
        }
        return view('nft.show', ['nft' => $nft]);
    }
}
