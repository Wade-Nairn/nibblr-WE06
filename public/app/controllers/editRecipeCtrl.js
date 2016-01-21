 angular
.module('app.controllers')
.controller('editRecipeCtrl', function($scope, $routeParams, FileUploader, $user, User, $http, $resource, Recipe, $recipes, Ingredient, $ingredients, $location){

	$scope.user = $user
	$scope.recipe = Recipe.get({id: $routeParams.id})
	$scope.recipes = Recipe.query()
	$scope.uploader = new FileUploader()

	$scope.ingredients = []

	$scope.uploader.onAfterAddingFile = function(item){
		item.url = '/upload';
		item.upload();

		item.onComplete = function(res) {
			$scope.currentImage = res;
		}
	}

	$scope.addInput = function(){
		$scope.recipe.ingredients.push(new Ingredient())
	}

	$scope.editRecipe = function(){
		_.each($scope.recipe.ingredients, function(ingredient){
			if(ingredient.id){
				Ingredient.update(ingredient)
			} else {
				ingredient.recipe_id = $scope.recipe.id
				ingredient.$save()
			}
		})	
		Recipe.update($scope.recipe)
		$location.path('/myRecipes');
	}

	

})