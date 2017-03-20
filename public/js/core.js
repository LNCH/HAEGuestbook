$(function() {

	// Handles SVG images if SVG is not supported
	if(Modernizr.svg) {
		$('img.svg-enhancement').each(function(index, element) {
			$(element).attr("src", $(element).data("enhanced"));
		});
	}

	// Back to top link =========================================

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

	// Handle form submission ===================================

	var $postButton = $("#post-message:not(.posted-message)");

	$(document).on("submit", "form.ajax", function(e) {
		e.preventDefault();

		var $form = $(this);

		var url = $form.attr("action");
		var data = $form.serialize();

		// Make AJAX POST request
		$.ajax({
			type: "POST",
			url: url,
			data: data,
			success: function(data, textStatus, jqXHR) {
				if(data.result == "success") {
					alert("Thanks for your message!");

					// Change the button text and class
					$postButton.html("Thanks!");

					clearModal();
					hideModal();

					messageSubmitted = true;
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				
				console.log(jqXHR, textStatus, errorThrown);

			},
			dataType: "json"
		});
	});

	// Modal functions ==========================================

	var $siteWrapper = $(".page-wrap"); 
	var $modalOverlay = $("#modal-overlay");
	var $modal = $("#modal");
	var $modalContent = $modal.find(".modal-content");
	var $modalCloseButton = $("#modal .modal-close");

	var messageSubmitted = false;

	function hideModal() {
		$modalOverlay.css("top", "-100%");

		$('body').removeClass("modal-open");
		$siteWrapper.removeClass("modal-open");
		$modalOverlay.removeClass("open");

		$modalContent.html("");
	}		

	function showModal(url) {
		// Show the modal if the form hasn't been submitted yet
		if(!messageSubmitted) {
			// Load content into the modal 
			$modalContent.load(url, function() {
				$modalOverlay.css("top", $(window).scrollTop());


				$('body').addClass("modal-open");
				$siteWrapper.addClass("modal-open");
				$modalOverlay.addClass("open");
			});
		}
	}

	function clearModal() {
		$modalContent.find("form").get(0).reset();
	}

	$postButton.on("click", function(e) {
		e.preventDefault();

		var url = $(this).attr("href");

		// Check if modal is open
		if($modalOverlay.hasClass("open")) {
			hideModal();
		} else {
			showModal(url);
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