$(document).ready(function() {
	var copy = $("#wrap-more-button").clone();

	$('#btn_more_profile').addClass('more-mine');


	$( "#my-button" ).click(function() {
		$.post('includes/php/scripts/display-my-tasks.php', function(data){
			$('#display-tasks').empty();
			$('#display-tasks').append(data);
			if((! $("#remove_row").length) && (! $('#stop-loading-my').length)){
				$('#wrap-more-button').append(copy.html());
			}
			$('#btn_more_profile').removeClass('more-claimed').addClass('more-mine');
		});
		setTimeout(function(){
			if($("#stop-loading-my").length){
		    $("#remove_row").remove();
		  }
		}, 20);
	});

	$( "#claimed-button" ).click(function() {
		$.post('includes/php/scripts/display-claimed-tasks.php', function(data){
			$('#display-tasks').empty();
			$('#display-tasks').append(data);
			if((! $("#remove_row").length) && (! $('#stop-loading-claimed').length)){
				$('#wrap-more-button').append(copy.html());
			}
			$('#btn_more_profile').removeClass('more-mine').addClass('more-claimed');
		});
		setTimeout(function(){
			if($("#stop-loading-claimed").length){
		    $("#remove_row").remove();
		  }
		}, 20);
	});
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

	if(!('ontouchstart' in window)) {
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

		})
	};

});
