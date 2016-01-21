<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});
Route::get('/login', function() {
	return view('login');
});
Route::get('/register', function (){
	return view('register');
});

Route::post('/auth/login', 'UserController@authenticate');
Route::get('/logout', 'UserController@logout');
Route::post('/user', 'UserController@store');
Route::get('/user/{id}', 'UserController@update');
Route::delete('/user/{id}', 'UserController@destroy');

Route::post('/upload', function(Request $request){
	$file = $request->file('file');
	$filename = date('U').$file->getClientOriginalName();
	if($file->isValid()){
		$file->move(public_path('uploads/'), $filename);
	}
	return $filename;
	
});


Route::resource('/api/user', 'UserController');
Route::resource('/api/recipe', 'RecipeController');
Route::resource('/api/recipeBook', 'RecipeBookController');

Route::resource('/api/comment', 'CommentController');
Route::resource('/api/follow', 'FollowController');
Route::resource('/api/ingredient', 'IngredientController');
Route::resource('/api/tag', 'TagController');

Route::get('/api/book/{book_id}/recipe/{recipe_id}', 'RecipeBookController@addRecipe');