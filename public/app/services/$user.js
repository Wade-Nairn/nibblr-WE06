angular
.module('app.services')
.factory('$user', function(User){
	var user = {}
	user = User.getOne()
	return user
})