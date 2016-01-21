<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecipeBook extends Model
{
	use SoftDeletes;

    protected $table = 'recipe_books';
    protected $fillable = ['name'];

    public function user(){
    	return $this->hasMany('App\Models\User', 'user_id', 'id');
    }

    public function recipes(){
    	return $this->belongsToMany('App\Models\Recipe', 'recipe_book_recipes', 'recipe_book_id', 'recipe_id');
    }
}
