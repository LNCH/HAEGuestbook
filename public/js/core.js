$(function() {

	// Handles SVG images if SVG is not supported
	if(Modernizr.svg) {
		$('img.svg-enhancement').each(function(index, element) {
			$(element).attr("src", $(element).data("enhanced"));
		});
	}

	// Offest in pixels that is required before the "back to top" button is shown
	var offset = 300,

		// Number of pixels before the button's opacity is reduced further
		offset_opacity = 1200,

		// Duration in ms for the page to scroll back to the top
		scroll_top_duration = 500,

		// The "back to top" button
		$back_to_top = $('.cd-top');

	// Decide whether to show or hide the "back to top" link
	$(window).scroll(function() {
		($(this).scrollTop() > offset) ? 
			$back_to_top.addClass('cd-is-visible') : 
			$back_to_top.removeClass('cd-is-visible cd-fade-out');

		if($(this).scrollTop() > offset_opacity) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	// Smoothly scroll back to the top of the page
	$back_to_top.on('click', function(event) {

		event.preventDefault();
		
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);

	});


	// Modal functions ==========================================

	var $siteWrapper = $(".page-wrap"); 
	var $postButton = $("#post-message");
	var $modalOverlay = $("#modal-overlay");
	var $modal = $("#modal");
	var $modalCloseButton = $("#modal .modal-close");

	function hideModal() {
		$modalOverlay.css("top", "-100%");

		$('body').removeClass("modal-open");
		$siteWrapper.removeClass("modal-open");
		$modalOverlay.removeClass("open");
	}		

	$postButton.on("click", function(e) {
		e.preventDefault();

		// Check if modal is open
		if($modalOverlay.hasClass("open")) {
			hideModal();
		} else {
			$modalOverlay.css("top", $(window).scrollTop());

			$('body').addClass("modal-open");
			$siteWrapper.addClass("modal-open");
			$modalOverlay.addClass("open");
		}
	});

	// Watch for ESC key, remove modal classes if they exist
	$(document).keyup(function(e) {
	    if(e.keyCode == 27) { 
			hideModal();
	    }
	});

	$modalCloseButton.on("click", function(e) {
		e.preventDefault();
		hideModal();
	});

	$modal.on("click", function(e) {
		e.stopImmediatePropagation();
	});

	// Hide modal if overlay is clicked
	$modalOverlay.on("click", function() {
		hideModal();
	});

});