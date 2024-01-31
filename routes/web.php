<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('/welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('/home','welcome')->name('home');
Route::view('/details','recipe_book.details')->name('details');

Route::get('/create',[RecipeController::class,'indexAction'])->name('createRecipe');
Route::get('/welcome',[RecipeController::class,'index'])->name('Recipe');

Route::get('/recipe_book/{id}', [RecipeController::class, 'showRecipeDetails'])->name('recipe_book.details');
Route::resource('recipe_book',RecipeController::class);

Route::get('/', [RecipeController::class, 'show'])->name('home');

require __DIR__.'/auth.php';
