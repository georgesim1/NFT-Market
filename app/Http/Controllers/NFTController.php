<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NFTController extends Controller
{
    public function index()
    {
        $json = file_get_contents(public_path('nft.json'));
        $nfts = json_decode($json, true);
        return view('/gallery', ['nfts' => $nfts]);
    }
}
