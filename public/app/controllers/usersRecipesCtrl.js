angular
.module('app.controllers')
.controller('usersRecipesCtrl', function($scope, $http, $resource, $recipes, Recipe, $user, User, $recipeBooks, RecipeBook){
	$scope.title = 'Home!';
	$scope.user = $user
	$scope.recipes = $recipes.items
	console.log($user)

	$scope.recipeBook = RecipeBook.query()

})