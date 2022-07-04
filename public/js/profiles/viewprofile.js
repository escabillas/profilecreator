$(document).ready(function() {
	$('.profile-wrapper').hover(function() {
		$(this).find('.profile-edit-btn').removeClass('hidden-html');
	}, function() {
		$(this).find('.profile-edit-btn').addClass('hidden-html');
	});
});