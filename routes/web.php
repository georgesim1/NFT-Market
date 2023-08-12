<?php

use App\Http\Controllers\ProfileController;
use App\Models\Nft;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NFTController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', '/login');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// route::get('/home' , [HomeController::class, 'index'])->middleware('auth')->name('home');

// Route::get('/', function () {
//     return view('gallery');
// });

Route::get('/admin', [HomeController::class, 'index'])->middleware(['auth', 'admin'])->name('home'); //controller that handles the user route to log in to the dashboard

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');

Route::get('/admin/home', [HomeController::class, 'users'])->middleware(['auth', 'admin'])->name('admin.home'); //controller that handles the admin route to log in to the dashboard

Route::get('/', [NFTController::class, 'index']);

Route::post('nft/{index}/purchase', [NFTController::class, 'buy'])->name('nft.purchase');

Route::post('nft/{index}/sell', [NFTController::class, 'sell'])->name('nft.sell');

Route::get('nft/{index}', [NFTController::class, 'show'])->name('nft.show');

Route::get('/collection', [NFTController::class, 'myNfts'])->name('collection')->middleware('auth');

Route::get('/create', [NFTController::class, 'create'])->name('nft.create');
Route::post('/nft/store', [NFTController::class, 'store'])->name('nft.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
