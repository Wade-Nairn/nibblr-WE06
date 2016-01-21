angular
.module('app.resources')
.factory('Recipe', function ($resource) {
  
  var url = '/api/recipe/:id'

  var defaults = {id: '@id'}

  var methods = {
		update: {
			method: 'PUT'
		},
		post: {
			method: 'POST'
		},
		get: { 
			method: 'GET'
		},
		destroy: {
			method:'DELETE'
		}
	}
  return  $resource(url, defaults, methods)
})
