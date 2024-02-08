<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function indexAction(){
        $categories = ['breakfast','lunch','dinner'];
        return view('recipe_book.create', compact('categories'));
    }
    public function index()
    {
        $recipes = Recipe::all();
        return view('welcome', compact('recipes'));
    }

    public function showRecipeDetails($id)
{
    $recipe = Recipe::find($id);
    return view('recipe_book.details', compact('recipe'));
}

    public function search()
{
    $search = $_GET['query'];
    $recipes = Recipe::where('title','LIKE','%'.$search.'%')->orwhere('description','LIKE','%'.$search.'%')->get();
    return view('recipe_book.search', compact('recipes'));
}



public function ShowUserDashboard()
{
    $user = User::find(Auth::id());
    $recipes = $user->recipes;
    return view('recipe_book.userDashboard', compact('recipes'));
}

    public function create()
    {
        $recipe = new Recipe();
        
        return view('recipe_book.create',compact('recipe'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:255', 
            'description' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $recipe = new Recipe([
            'title' => $request->input('titre'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'userid' => Auth::id(),
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $recipe->image = $imagePath;
        }
    
        $recipe->save();
    
        // return redirect()->route('userRecipes')->with('success', 'Recipe deleted successfully');

    }

    public function showUpdate($id)
    {
        $recipe = Recipe::find($id);
        return view('recipe_book.update', compact('recipe'));
    }

    public function edit(Recipe $recipe)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);
    
        $request->validate([
            'titre' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
    
        $recipe->title = $request->input('titre');
        $recipe->description = $request->input('description');
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $recipe->image = $imagePath;
        }
    
        $recipe->save();
    
        return redirect()->route('userRecipes')->with('success', 'Recipe updated successfully');
    }
    
    

    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
    return redirect()->route('userRecipes')->with('success', 'Recipe deleted successfully');
    }
}
