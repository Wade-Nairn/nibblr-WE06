angular
.module('app.services')
.factory('$recipeBooks', function(RecipeBook){
	var recipeBooks = {}
	recipeBooks.items = RecipeBook.query()
	return recipeBooks
})