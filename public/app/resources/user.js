angular
.module('app.resources')
.factory('User', function ($resource) {
	var url = '/api/user/:id';

	var defaults = {id: '@id'}

	var methods = {
		update: {
			method: 'PUT'
		},
		post: {
			method: 'POST'
		},
		getOne: { 
			method: 'GET',
			isArray: false
		},
		destroy: {
			method:'DELETE'
		}
	}

  return  $resource(url, defaults, methods)
})