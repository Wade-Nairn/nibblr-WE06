angular
.module('app.controllers')
.controller('editUserCtrl', function($scope, FileUploader, $location, $resource, $user, User, $routeParams){

	$scope.user = $user
	$scope.uploader = new FileUploader()
	
	$scope.uploader.onAfterAddingFile = function(item){
		item.url = '/upload';
		item.upload();

		item.onComplete = function(res) {
			$scope.user.avatar = res;
		}
	}

	$scope.editUser = function(){
		
		User.update($scope.user)
		$location.path('/user/{{ $scope.user.id }}');
	}
	console.log($scope.user)


})