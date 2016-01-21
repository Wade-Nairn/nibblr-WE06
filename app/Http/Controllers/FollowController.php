<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Follow;

class FollowController extends Controller
{
    
    public function follow($id)
    {
        Auth::user()
            ->following()
            ->attach($id);
    }

    public function unfollow($id)
    {
        Auth::user()
            ->following()
            ->attach($id);
    }
}
