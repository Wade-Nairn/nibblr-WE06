<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;
    use SoftDeletes;

    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'info', 'avatar'];
    protected $hidden = ['password', 'remember_token'];

    public function recipes(){
        return $this->hasMany('App\Models\Recipe', 'user_id', 'id' );
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment', 'user_id', 'id');
    }

    public function following(){
        return $this->belongsToMany('App\Models\Follow', 'follows', 'user_id', 'follow_id');
    }

     public function followers(){
        return $this->belongsToMany('App\Models\User', 'follows', 'follow_id','user_id');
    }
}
