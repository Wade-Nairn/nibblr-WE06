angular
.module('app.controllers')
.controller('homeCtrl', function($scope, $http, $resource, $recipes, Recipe, $user, User){
	$scope.title = 'Home!';
	$scope.user = $user
	$scope.recipes = $recipes.items

})