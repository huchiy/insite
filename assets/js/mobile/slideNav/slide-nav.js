/*
	Landed by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
*/

(function($) {

	skel.breakpoints({
		xlarge: '(max-width: 1680px)',
		large: '(max-width: 1280px)',
		medium: '(max-width: 980px)',
		small: '(max-width: 736px)',
		xsmall: '(max-width: 480px)'
	});

	$(function() {

		var	$window = $(window),
		$body = $('body');

		// Disable animations/transitions until the page has loaded.
		$body.addClass('is-loading');

		$window.on('load', function() {
			window.setTimeout(function() {
				$body.removeClass('is-loading');
			}, 0);
		});

		// Touch mode.
		if (skel.vars.mobile)
			$body.addClass('is-touch');

		// Fix: Placeholder polyfill.
			//$('form').placeholder();

		// Prioritize "important" elements on medium.
		skel.on('+medium -medium', function() {
			$.prioritize(
				'.important\\28 medium\\29',
				skel.breakpoint('medium').active
			);
		});

		// Scrolly links.
		/*
			$('.scrolly').scrolly({
				speed: 2000
			});
		*/
		// Dropdowns.
		/*
			$('#nav > ul').dropotron({
				alignment: 'left',
				hideDelay: 350
			});
		*/
		// Off-Canvas Navigation.
		
		if ($('#header').length) {

			// Title Bar.
			var headerClass = $('#header').attr('class');
			$(
				'<div id="titleBar" class="' + headerClass + '">' +
					'<a href="#navPanel" class="toggle"></a>' +
					//'<span class="title">' + $('#logo').html() + '</span>' +
				'</div>'
			)
			.appendTo($body);

			// Navigation Panel.
			$(
				'<div id="navPanel" class="' + headerClass + '">' +
					'<nav>' +
						$('#nav').html() +
						//$('#nav').navList() +
					'</nav>' +
				'</div>'
			)
			.appendTo($body)
			.panel({
				delay: 0,
				hideOnClick: true,
				hideOnSwipe: true,
				resetScroll: true,
				resetForms: true,
				side: 'left',
				target: $body,
				visibleClass: 'navPanel-visible'
			});

		}

			// Fix: Remove navPanel transitions on WP<10 (poor/buggy performance).
				if (skel.vars.os == 'wp' && skel.vars.osVersion < 10)
					$('#titleBar, #navPanel, #page-wrapper')
						.css('transition', 'none');

	});

})(jQuery);