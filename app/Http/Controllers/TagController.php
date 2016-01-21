<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Tag;

class TagController extends Controller
{

    public function index()
    {
        $tag = Tag::all();
        return $tag;
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return $tag;
    }

    public function store(Request $request)
    {
        $tag = new Tag();
        $tag->fill($request->all());
        $tag->save();
        return $tag;
    }

    
}
