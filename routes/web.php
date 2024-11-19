<?php

use App\Models\Produits;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\CommandesController;
use App\Http\Controllers\RestaurantsController;



Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/download-pdf', [ProfileController::class, 'downloadPDF'])->name('profile.download-pdf');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/restaurants', [RestaurantsController::class, 'index'])->name('restaurants.index');
    Route::get('/restaurant/{restaurant}', [RestaurantsController::class, 'showProducts'])->name('restaurant.showProducts');
    Route::post('/restaurant/{restaurant}/commandes', [CommandesController::class, 'store'])->name('commandes.store');
    Route::get('/commandes', [CommandesController::class, 'index'])->name('commandes.index');
    Route::delete('/commandes/{commande}', [CommandesController::class, 'destroy'])->name('commandes.destroy');

    Route::get('/dashboard', [StatsController::class, 'index'])->name('dashboard');
});

Route::post('/language-switch', [LangController::class, 'languageSwitch'])->name('language.switch');

require __DIR__ . '/auth.php';
