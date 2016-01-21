angular
.module('app.controllers')
.controller('singleBookCtrl', function($scope, $location, $http, $user, User, $resource, RecipeBook, $recipeBooks, $recipes, Recipe, $routeParams){
	
	$scope.user = $user
	$scope.book = RecipeBook.get({id: $routeParams.id})
	// $scope.recipe = $recipes.items
	
	$scope.deleteBook = function(){
		RecipeBook.delete({id: $routeParams.id}, function(res){
			$recipeBooks.items = _.reject($recipeBooks.items, function(book){
				return book.id === parseInt($routeParams.id)
			})
			$location.path('/books') 
		})
		
	}
})