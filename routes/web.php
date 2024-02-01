<?php
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return redirect()->route('Recipe');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//Route::view('/home','welcome')->name('home');
Route::get('/home', [RecipeController::class, 'index'])->name('home');

Route::view('/details','recipe_book.details')->name('details');

Route::get('/create',[RecipeController::class,'indexAction'])->name('createRecipe');
Route::get('/userDashboard',[RecipeController::class,'ShowUserDashboard'])->name('userRecipes');

Route::get('/recipe_book/{id}', [RecipeController::class, 'showRecipeDetails'])->name('recipe_book.details');
Route::delete('/recipe_book/{id}',[RecipeController::class, 'destroy'])->name('recipes.destroy');
Route::resource('recipe_book',RecipeController::class);
Route::get('/search',[RecipeController::class, 'search']);


require __DIR__.'/auth.php';
Route::get('/welcome',[RecipeController::class,'index'])->name('Recipe');
