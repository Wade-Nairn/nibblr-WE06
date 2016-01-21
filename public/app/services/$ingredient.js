angular
.module('app.services')
.factory('$ingredients', function(Ingredient){
	var ingredients = {}
	ingredients = Ingredient.query()
	return ingredients
})