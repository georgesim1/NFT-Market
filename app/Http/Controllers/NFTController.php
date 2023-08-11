<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nft;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class NFTController extends Controller
{
    public function index(Request $request)
    {
        $json = file_get_contents(public_path('nft.json'));
        $nfts = json_decode($json, true);

        // Get unique categories
        $categories = collect($nfts)->pluck('categorie')->unique()->values();

        // Apply the category filter if it's set
        if ($request->has('category') && !empty($request->category)) {
            $category = $request->category;
            $nfts = array_filter($nfts, function ($nft) use ($category) {
                return $nft['categorie'] === $category;
            });
        }

        return view('/gallery', ['nfts' => $nfts, 'categories' => $categories]);
    }

    public function buy($id)
    {
        $nft = Nft::find($id);
    
        if (!$nft) {
            return redirect()->route('nft.show', $id)->withErrors('NFT not found.');
        }
    
        $user = Auth::user();
    
        if ($user->ethBalance < $nft->prix) {
            return redirect()->route('nft.show', $id)->withErrors('You cannot purchase this NFT.');
        }
    
        // Deduct the ETH balance from the user
        $user->ethBalance -= $nft->prix;
        $user->save();
    
        // Update ownership details to the NFT
        $nft->owner_id = $user->id;
        $nft->save();
    
        return redirect()->route('nft.show', $id)->withSuccess('Successfully purchased the NFT!');
    }
    public function myNfts()
    {
        $user = auth()->user();
        $nfts = Nft::where('owner_id', $user->id)->get();

        return view('collection', ['nfts' => $nfts]);
    }

    public function create()
{
    return view('create');
}

public function store(Request $request)
{
    $nft = new Nft([
        'titre' => $request->get('titre'),
        'artiste' => $request->get('artiste'),
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => $request->get('description'),
        'prix' => $request->get('prix'),
        'categorie' => $request->get('categorie'),
        //... other fields
    ]);
    
    $imagePath = $request->file('image')->store('images/nft', 'public'); // You can customize the path

    $nft = new NFT();
    $nft->image = $imagePath;
    $nft->save();
    
    return redirect()->route('collection')->with('success', 'NFT added to the collection');
}
}
