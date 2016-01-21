angular
.module('app.services')
.factory('$comments', function(Comment){
	var comments = {}
	comments.items = Comment.query()
	return comments
})