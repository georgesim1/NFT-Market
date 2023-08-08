<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $usertype = Auth()->user()->usertype;
    
            if ($usertype == 'user') {
                return view('dashboard');
            } else if ($usertype == 'admin') {
                $users = User::all(); // Query all users
                return view('admin.adminHome', compact('users')); // Pass users to the view
            } else {
                return redirect()->back();
            }
        }
    }

    public function post()
    {
        return view("post");
    }

    // public function users()
    // {
    //     $users = User::all();
    //     return view('admin.adminHome', compact('users'));
    // }
}
