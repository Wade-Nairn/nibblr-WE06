<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	use SoftDeletes;
    
    protected $table = 'comments';
    protected $fillable = ['content', 'rating'];

    public function recipe () {
    	return $this->belongsTo('App\Models\Recipe', 'recipe_id');
    }
    public function author () {
    	return $this->belongsTo('App\Models\User', 'user_id');
    }
}
