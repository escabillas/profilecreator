$(document).ready(function() {
	$(document).on('mouseenter', '.content-form-wrapper', function() {
		$(this).find('.edit-btn').removeClass('hidden-html');
		$(this).find('.delete-btn').removeClass('hidden-html');
	});
	$(document).on('mouseleave', '.content-form-wrapper', function() {
		$(this).find('.edit-btn').addClass('hidden-html');
		$(this).find('.delete-btn').addClass('hidden-html');
	});

	toggleSearchBtn('.search-form-input');

	$('.search-form-input').on('ready change keypress keyup click', function() {
		toggleSearchBtn(this);
	});

	function toggleSearchBtn(thisElem) {
		if( $(thisElem).val().trim().length > 0 )
		{
			$('.search-form').find('button').prop('disabled', false);
		}
		else
		{
			$('.search-form').find('button').prop('disabled', true);
		}
	}
});