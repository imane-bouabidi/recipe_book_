<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function indexAction(){
        return view('recipe_book.create');
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $recipe = new Recipe();
        
        return view('recipe_book.create',compact('recipe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'titre' => 'required|max:255', 
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $recipe = new Recipe([
            'title' => $request->input('titre'),
            'description' => $request->input('description'),
            'userid' => Auth::id(),
        ]);
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
            $recipe->image = $imagePath;
        }
    
        $recipe->save();
    
        return redirect()->route('home')->with('success', 'Recipe added successfully!');

    }
    
    

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $recipes = Recipe::all();
        // dd($recipes);
        return view('welcome', compact('recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
