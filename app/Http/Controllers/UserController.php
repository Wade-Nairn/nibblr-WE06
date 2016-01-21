<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Hash;
use App\Models\User;
use App\Models\Follow;
use App\Models\Comment;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeBook;
use App\Models\Tag;

class UserController extends Controller
{
    public function index(){
        // $user = Auth::user();
        $user = User::all();
        return $user;
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->password = Hash::make($request->get('password'));
        if($request->get('name') == "" || $request->get('email') == "" || $request->get('password') == ""){
            $request->session()->flash('error', 'Something was left blank');
            return redirect('/register');
        } else{
            Auth::login($user);
            return redirect('/#/editUser/'.$user->id);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->password = Hash::make($request->get('password'));
        $user->save();
        Auth::login($user);
    }

    public function authenticate(Request $request)
    {
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }
    public function logout() {
        Auth::logout();
        return redirect ('/');
    } 
}
