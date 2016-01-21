<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Comment;
use App\Models\User;

use Auth;


class CommentController extends Controller
{
    public function index()
    {
        $allComments = Comment::with('author')->get();
        return $allComments;
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->fill($request->all());
        $comment->user_id = Auth::user()->id;
        $comment->recipe_id = $request->get('recipe_id');
        $comment->save();
        return Comment::with('author')->where('id', $comment->id)->first();
        
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);
        $comment->fill($request->all());
        $comment->user_id = Auth::user();
        $comment->save();
        return $comment;
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return $comment;
    }
}
