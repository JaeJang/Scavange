$(function() {
	$(".recipePicture").flip({
		trigger: 'manual',
		axis: 'x'
	});
});

function flipper(number) {
	$("#recipeList" + number).flip('toggle');
}


