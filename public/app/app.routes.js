angular
.module('app.routes')

.config(function($routeProvider){
	$routeProvider
	.when('/', {
		controller: 'homeCtrl',
		templateUrl: 'views/home.html'
	})
	.when('/user/:id', {
		controller: 'userCtrl',
		templateUrl: 'views/user.html'
	})
	.when('/myRecipes', {
		controller: 'usersRecipesCtrl',
		templateUrl: 'views/usersrecipes.html'
	})
	.when('/new', {
		controller: 'newRecipeCtrl',
		templateUrl: 'views/newrecipe.html'
	})
	.when('/edit/:id', {
		controller: 'editRecipeCtrl',
		templateUrl: 'views/editrecipe.html'
	})
	.when('/editUser/:id', {
		controller: 'editUserCtrl',
		templateUrl: 'views/edituser.html'
	})
	.when('/books', {
		controller: 'recipeBookCtrl',
		templateUrl: 'views/recipebookcollection.html'
	})
	.when('/profile/:id', {
		controller: 'profileCtrl', 
		templateUrl: 'views/profile.html'
	})
	.when('/book/:id', {
		controller: 'singleBookCtrl',
		templateUrl: 'views/singlebook.html'
	})
	.when('/:id', {
		controller: 'singleRecipeCtrl',
		templateUrl: 'views/singlerecipe.html'
	})
});
