<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nft;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NFTController extends Controller
{
    public function index(Request $request)
    {
        $query = Nft::query();
    
        // Apply the category filter if it's set
        if ($request->has('category') && !empty($request->category)) {
            $query->where('categorie', $request->category);
        }
    
        $nfts = $query->get();
    
        // Get unique categories
        $categories = Nft::distinct()->pluck('categorie')->all();
    
        return view('gallery', ['nfts' => $nfts, 'categories' => $categories]);
    }

    public function buy($id)
    {
        $nft = Nft::find($id);
    
        if (!$nft) {
            return redirect()->route('nft.show', $id)->withErrors('NFT not found.');
        }

        $user = Auth::user();
       
        if ($user->portfolio < $nft->prix) {
            return redirect()->route('nft.show', $id)->withErrors('You cannot purchase this NFT.');
        }
    
        // Deduct the ETH balance from the user
        $user->portfolio -= $nft->prix;
        $user->save();
    
        // Update ownership details to the NFT
        $nft->owner_id = $user->id;
        $nft->save();
        
        
        return redirect()->route('nft.show', $id)->withSuccess('Successfully purchased the NFT!');
    }

    public function sell($id)
    {
        $nft = Nft::find($id);
    
        if (!$nft) {
            return redirect()->route('collection')->withErrors('NFT not found.');
        }
        
        $user = Auth::user();
       
        if ($user->portfolio < $nft->prix) {
            return redirect()->route('collection')->withErrors('You cannot purchase this NFT.');
        }
    
        // Deduct the ETH balance from the user
        $user->portfolio += $nft->prix;
        $user->save();
    
        // Update ownership details to the NFT
        $nft->owner_id = 1;
        $nft->save();
        
        
        return redirect()->route('collection')->withSuccess('Successfully purchased the NFT!');
    }

    public function show($index)
    {
        try {
            $nft = Nft::find($index)->toArray();
            return view('nft', ['nft' => $nft, 'index' => $index]);
        } catch (\Throwable $th) {
            abort(404);
        }
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
    $request->validate([
        'titre' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'artiste' => 'required|string',
        'description' => 'required|string',
        'prix' => 'required|numeric',
        'categorie' => 'required|string',
        // Other validation rules
    ]);

    // $imagePath = $request->file('image')->store('images', 'public'); 

    $imagePath = Storage::disk('public')->putFile('images', $request->file('image'));
    
    // Creating the NFT
    $nft = new Nft([
        'titre' => $request->titre,
        'artiste' => $request->artiste,
        'image' => $imagePath,
        'description' => $request->description,
        'prix' => $request->prix,
        'categorie' => $request->categorie,
        'owner_id' => 1,
    ]);

    $nft->save();
    
    return redirect()->route('collection')->with('success', 'NFT added to the collection');
}
}
