$(document).ready(function() {

	// Back to Top Navigation
	// ---------------------------------------------------------------------------
	$(window).scroll(function() {

		if ($(this).scrollTop() > 200) {
			$('#go-top').fadeIn(300);
		} else {
			$('#go-top').fadeOut(300);
		}

	});

	// Animate the scroll to top
	$('#go-top').click(function(event) {

		event.preventDefault();
		$('html, body').animate({scrollTop: 0}, 500);

	})

});
