<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Recipe;
use App\Models\User;
use App\Models\Ingredient;
use Auth;

class RecipeController extends Controller
{

    public function index()
    {
        $recipe = Recipe::with('ingredients')->get();
        return $recipe;
    }

    public function store(Request $request)
    {
        $recipe = new Recipe();
        $recipe->fill($request->all());
        $recipe->user_id = Auth::user()->id;
        $recipe->save();

        $recipe->recipeBooks()->attach($request->get('recipe_id'));
        return $recipe;
    }

    public function show($id)
    {
        $recipe = Recipe::with('ingredients', 'author')->where('id', $id) 
                        ->first();
        return $recipe;
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::find($id);
        $recipe->fill($request->all());
        $recipe->save();
        return $recipe;
    }

    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        $recipe->delete();
        return $recipe;
    }
}
