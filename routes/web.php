<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home'); //controller that handles the user route to log in to the dashboard

Route::get('/admin/home', [HomeController::class, 'users'])->middleware(['auth', 'admin'])->name('admin.home'); //controller that handles the admin route to log in to the dashboard

Route::get('/', [NFTController::class, 'index']);

Route::get('nft/{index}', function ($index) {
    $nftJsonPath = base_path('/public/nft.json'); // Adjust the path to your nft.json file
    $nftJsonContent = File::get($nftJsonPath);
    $nfts = json_decode($nftJsonContent, true);
    $nft = $nfts[$index] ?? null;
    if (!$nft) {
        abort(404);
    }
    return view('nft', ['nft' => $nft]);
})->name('nft.show');

route::get('post', [HomeController::class, 'post'])->middleware(['auth','admin']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
