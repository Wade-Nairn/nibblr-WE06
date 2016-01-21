angular
.module('app.resources')
.factory('RecipeBook', function ($resource) {

	var url = '/api/recipeBook/:id';

	var defaults = {id: '@id'}

	var methods = {
		update: {
			method: 'PUT'
		},
		post: {
			method: 'POST'
		},
		destroy: {
			method:'DELETE'
		},
		get: { 
			method: 'GET'
		},
		addRecipe: {
			method: 'GET',
			url: '/api/book/:bookId/recipe/:recipeId'
		}
	}

  return  $resource(url, defaults, methods)
})