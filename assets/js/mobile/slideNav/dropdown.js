/*
	sidebar-menu.js
*/

$.sidebarMenu = function(menu) {
	var animationSpeed = 250,
	subMenuSelector = '.sidebar-submenu';
	
	$('.sidebar-submenu').css({"display": "none"})
	$('.sidebar-submenu').parent("li").removeClass("active");
	$('.sidebar-submenu').parent("li").addClass("opener");
	$('.sidebar-submenu').parent("li").find("a.dep1_link").attr("href", "#"); //서브메뉴가 있는 대메뉴 링크값 지우기
	$('.sidebar-submenu li.active').parent().parent("li").addClass("open");
	$('.sidebar-submenu li.active').parent("ul").slideDown(animationSpeed); 
	$('.sidebar-submenu li.active').parent("ul").addClass("menu-open");

	$(menu).on('click', 'li a', function(e) {
		var $this = $(this);
		var checkElement = $this.next();
		if (checkElement.is(subMenuSelector) && checkElement.is(':visible')) {
			checkElement.slideUp(animationSpeed, function() {
				checkElement.removeClass('menu-open');
			});
			checkElement.parent("li").removeClass("open");
		}

		//If the menu is not visible
		else if ((checkElement.is(subMenuSelector)) && (!checkElement.is(':visible'))) {
			var parent = $this.parents('ul').first(); //Get the parent menu
			var ul = parent.find('ul:visible').slideUp(animationSpeed); //Close all open menus within the parent
			ul.removeClass('menu-open'); //Remove the menu-open class from the parent
			var parent_li = $this.parent("li"); //Get the parent li

			//Open the target menu and add the menu-open class
			checkElement.slideDown(animationSpeed, function() {
				checkElement.addClass('menu-open');
				parent.find('li.open').removeClass('open');
				parent_li.addClass('open');
			});
		}
		//if this isn't a link, prevent the page from being redirected
		if (checkElement.is(subMenuSelector)) {
			e.preventDefault();
		}
	});


}

$(document).ready(function () {
	$.sidebarMenu($('.sidebar-menu'));
});
