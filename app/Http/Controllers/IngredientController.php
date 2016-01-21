<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Ingredient;
use App\Models\Recipe;



class IngredientController extends Controller
{
   
    public function index()
    {
        $ingredient = Ingredient::all();
        return $ingredient;
    }

    public function show($id)
    {
        $ingredient = Ingredient::find($id);
        return $ingredient;
    }

    public function store(Request $request)
    {
        $ingredient = Ingredient::where('name', $request->get('name'))->first();
        
        if(!$ingredient){
            $ingredient = new Ingredient();
            $ingredient->fill($request->all());
            $ingredient->save();
        }
        $ingredient->recipes()->attach($request->get('recipe_id'), ['quantity' => $request->get('quantity')]);
        return $ingredient;
    }
    public function update(Request $request, $id)
    {
        $ingredient = Ingredient::find($id);
        $ingredient->fill($request->all());
        $ingredient->save();
        return $ingredient;
    }


}
