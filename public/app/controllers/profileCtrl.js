angular
.module('app.controllers')
.controller('profileCtrl', function($scope, $routeParams, $http, $mdDialog, $resource, RecipeBook, $recipeBooks, $recipes, Recipe, Comment, $comments, $user, User){

	$scope.profile = User.get({id: $routeParams.id})
	$scope.user = $user
	$scope.recipes = $recipes.items
	$scope.books = $recipeBooks.items

	// console.log($scope.profile)
	console.log($scope.recipes)
	// console.log($scope.profile)
})
