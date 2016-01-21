<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recipe extends Model
{
	use SoftDeletes;

    protected $table = 'recipes';
    protected $fillable = ['title', 'method', 'image', 'servings', 'time'];

    public function author () {
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function ingredients () {
    	return $this->belongsToMany('App\Models\Ingredient', 'recipe_ingredients',  'recipe_id', 'ingredient_id')->withPivot('quantity');
    }

    public function tags (){
    	return $this->hasMany('App\Models\Tag', 'recipe_id', 'id');
    }
    
    public function recipeBooks(){
    	return $this->belongsToMany('App\Models\RecipeBook', 'recipe_book_recipes', 'recipe_id', 'recipe_book_id');
    }

    public function comments(){
    	return $this->hasMany('App\Models\Comment', 'recipe_id', 'id');
    }
}
