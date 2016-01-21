angular
.module('app.controllers')
.controller('userCtrl', function($scope, $resource, $user, User, $routeParams){
	
	$scope.user = $user
	
	
})