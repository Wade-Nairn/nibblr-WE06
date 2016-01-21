angular
.module('app.controllers')
.controller('recipeBookCtrl', function($scope, $user, User, $location, $resource, $recipeBooks, RecipeBook ){
	
	$scope.user = $user
	$scope.books = $recipeBooks.items
	console.log($recipeBooks)

	$scope.heading = 'My Recipe books'

	$scope.recipeBook = RecipeBook.query()

	$scope.newBook = function(){
		var book = new RecipeBook()

		book.name = $scope.name

		book.$save(function(){
			$scope.recipeBook.push(book)
		 })
		$recipeBooks.items.push(book)
	}

})