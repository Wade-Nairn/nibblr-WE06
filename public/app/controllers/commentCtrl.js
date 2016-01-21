angular
.module('app.controllers')
.controller('commentCtrl', function($scope, $routeParams, $http, $mdDialog, $resource, $recipes, Recipe, Comment, $comments, $user, User){

	$scope.comments = $comments.items
	

	$scope.status = '  ';

	var commentScope = $scope

	$scope.commentDialog = function(ev) {
	    $mdDialog.show({
	      controller: DialogController,
	      templateUrl: 'views/partials/newComment.tmpl.html',
	      parent: angular.element(document.body),
	      targetEvent: ev,
	      clickOutsideToClose:true
	    })
	    
	  };
	$scope.deleteComment = function(comment){
		comment.$delete(function(){
			$comments.items = _.reject($comments.items, function(c){
				return c.id === comment.id
			})
		})
		
	}  
// })

	function DialogController($scope, $mdDialog) {
		$scope.hide = function() {
		    $mdDialog.hide();
		};

		$scope.cancel = function() {
		    $mdDialog.cancel();
		}; 

		$scope.addComment = function() {

		  	var comment = new Comment()
		  	
		  	comment.content = $scope.content
		  	comment.recipe_id = $routeParams.id

		  	comment.$save(function(){
		  		commentScope.comments.push(comment)
		  	})
		  	$comments.push(comment)
		    $mdDialog.hide();
	}

	}
})
