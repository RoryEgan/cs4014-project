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

	$(window).load(function() {

		// executes when complete page is fully loaded, including all frames, objects and images

		// Sticky Nav
		// -------------------------------------------------------------------------
		var $sticky_navigation = $('#sticky-nav-wrap');

		if( $sticky_navigation.length ) {

			// grab the initial top offset of the navigation
			var sticky_navigation_offset_top = $sticky_navigation.offset().top;

			// our function that decides whether the navigation bar should have "fixed" css position or not.
			var sticky_navigation = function(){

				var scroll_top = $(window).scrollTop(); // our current vertical position from the top

				if (scroll_top > sticky_navigation_offset_top + 50 ) {

					$('#sticky-nav-wrap .navbar').removeClass('navbar-static-top').addClass('fixed-top');
					$( ".wrap" ).css( "margin-top", "50px" );

				} else {

					$('#sticky-nav-wrap .navbar').removeClass('fixed-top').addClass('navbar-static-top');
					$( ".wrap" ).css( "margin-top", "0" );

				}

			};

			// Run the function on load
			sticky_navigation();

			// ...and run it again every time the user scrolls
			$(window).scroll(function() {

				sticky_navigation();

			});

		}

	});

});
