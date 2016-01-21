<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\RecipeBook;
use App\Models\Recipe;

use Auth;


class RecipeBookController extends Controller
{
    
    public function index()
    {
        $book = RecipeBook::with('recipes')->get();
        return $book;
    }
    
    public function store(Request $request)
    {
        $book = new RecipeBook();
        $book->fill($request->all());
        $book->user_id = Auth::user()->id;
        $book->save();

        $book->recipes()->attach($request->get('recipe_id'));
        return $book;
    }

    public function show($id)
    {
        $book = RecipeBook::with('recipes')->where('id', $id)->first();
        return $book;
         
    }

    public function update(Request $request, $id)
    {
        $book = RecipeBook::find($id);
        $book->fill($request->all());
        $book->save();
        return $book;
    }

    public function destroy($id)
    {
        $book = RecipeBook::find($id);
        $book->delete();
        return $book;
    }

    public function addRecipe($book_id, $recipe_id){
         $book = RecipeBook::find($book_id);
         $recipe = Recipe::find($recipe_id);
         $recipe->recipeBooks()->attach($book->id);
         return $recipe;
    }
}
