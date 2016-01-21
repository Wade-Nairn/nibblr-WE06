angular
.module('app.services')
.factory('$recipes', function(Recipe){
	var recipes = {}
	recipes.items = Recipe.query()
	return recipes
})