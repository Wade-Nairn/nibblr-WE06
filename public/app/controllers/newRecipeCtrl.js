angular
.module('app.controllers')
.controller('newRecipeCtrl', function($scope, FileUploader, $user, User, $http, $resource, Recipe, $recipes, Ingredient, $ingredients, $location){

	$scope.user = $user
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
		$scope.ingredients.push(new Ingredient())
	}

	$scope.newRecipe = function(){
		var recipe = new Recipe()
		
		recipe.title = $scope.title 
		recipe.method = $scope.method 
		recipe.time = $scope.time 
		recipe.servings = $scope.servings
		recipe.image = $scope.currentImage
		
		recipe.$save(function(){
			$scope.recipes.push(recipe)
			$scope.title = ''
			for (var i = $scope.ingredients.length - 1; i >= 0; i--) {
				$scope.ingredients[i].recipe_id = recipe.id
				$scope.ingredients[i].$save()
			}
			$recipes.items.push(recipe);
			$location.path('/myRecipes');
		})
	}	
})