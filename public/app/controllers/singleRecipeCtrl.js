angular
.module('app.controllers')
.controller('singleRecipeCtrl', function($scope, $comments, Comment, $user, User, $location, $resource, $http, $recipes, Recipe, $recipeBooks, RecipeBook, $ingredients, Ingredient, $routeParams ){
	
	$scope.user = $user
	$scope.recipe = Recipe.get({id: $routeParams.id})
	$scope.books = $recipeBooks.items
	$scope.comments = $comments

	console.log($scope.comments)
	$scope.formatDate = function(date){
                var date = date.split("-").join("/");
                var dateOut = new Date(date);
                return dateOut;
                console.log(dateOut)
        };

	$scope.loadBooks = function(){
		$scope.books = $scope.books
	}

	$scope.addToBook = function(){
		RecipeBook.addRecipe({bookId: $scope.bookName, recipeId: $routeParams.id})
	}

	$scope.deleteRecipe = function(){
		Recipe.delete({id: $routeParams.id}, function(res){
			$recipes.items = _.reject($recipes.items, function(recipe){
				return recipe.id === parseInt($routeParams.id)
			})

			$location.path('/') 
		})
		
	}
	
})