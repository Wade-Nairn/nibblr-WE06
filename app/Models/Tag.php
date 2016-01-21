<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	use softDeletes;

    protected $table = 'tags';
    protected $fillable = ['name'];			
    
    public function recipes(){
    	return $this->belongsToMany('App\Models\Recipe', 'recipe_tags', 'user_id', 'recipe_id' );
    }

    public function users() {
    	return $this->belongsToMany('App\Models\User', 'recipe_tags', 'recipe_id', 'user_id' );
    }
}
