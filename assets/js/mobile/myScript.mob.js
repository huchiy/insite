

//------------------------------- Start Ready Function
$(document).ready(function(){

	var header = $('#header');
	var footer = $('#footer');
	var header_height = $('#header').outerHeight();
	var footer_height = $('#footer').outerHeight();
	var winHeight = $(window).height();
	var wrapperMinHeight = winHeight - header_height - footer_height;
	var wrapperMaxHeight = winHeight - header_height;
	$('#wrapper').css({'min-height':wrapperMinHeight});
	$('.autoHeight').css({'height':wrapperMinHeight});
	$('.scroll-section.fit').css({'height':wrapperMinHeight});
	$('#header .alarm_list ul').css({'max-height':wrapperMaxHeight - 80});
	
	function funcThisSize() {
		var winHeight = $(window).height();
		var wrapperMinHeight = winHeight - header_height - footer_height;
		var wrapperMaxHeight = winHeight - header_height;
		//wrapper 최소높이
		$('#wrapper').css({'min-height':wrapperMinHeight});
		$('.autoHeight').css({'height':wrapperMinHeight});
		$('.scroll-section.fit').css({'height':wrapperMinHeight});
		$('#header .alarm_list ul').css({'max-height':wrapperMaxHeight - 80});
	}
	$(function(){
		$(window).resize( funcThisSize );
	});
	
	//알림 아이콘
	$(".hds_openner").click(function(){
		$(this).toggleClass('on');
		$(this).next('#headerSearchWrap').toggleClass('on');
	});

	//알림 아이콘
	$(".alarm.new").click(function(){
		$('#header').find('.alarm_list').toggleClass('on');
		$('#wrapper, #footer').toggleClass('filterBlur');
	});
	$("#wrapper").click(function(){
		$('.alarm_list').removeClass('on');
		$('#wrapper, #footer').removeClass('filterBlur');
	});

	
	/* index scroll-section */
	$('.nextPage').click(function() {
		var thisSection = $(this).parent('.scroll-section');
		var nextSection = thisSection.next('.scroll-section');
		nextSection.css({'top':winHeight});
		nextSection.show();
		nextSection.removeClass("none");
		nextSection.css({"position":"fixed"});
		footer.stop().animate({opacity:0}, 300);
		thisSection.stop().animate({'top': - wrapperMaxHeight}, 1000, 'easeInOutExpo', function() {
			$(this).hide();
		});
		nextSection.stop().animate({'top':header_height}, 1000, 'easeInOutExpo', function() {
			$("html, body").animate({scrollTop:0});
			$(this).css({'position':'relative', "top":0});
			footer.stop().animate({opacity:1}, 200);	
			$("html").getNiceScroll().resize();
		});
	});
	$('.prevPage').click(function() {
		funcThisSize();
		var thisSection = $(this).parent('.scroll-section');
		var prevSection = thisSection.prev('.scroll-section');
		var prevHeight = prevSection.height();
		thisSection.css({'position':'absolute'});
		footer.css({opacity:0});	
		if(prevSection.hasClass('fit')) {
			prevSection.css({"top": - wrapperMaxHeight});
		} else {
			prevSection.css({"position":"absolute", "top":-prevHeight-60});
		}
		thisSection.stop().animate({'top': wrapperMaxHeight}, 1000, 'easeInOutExpo', function() {
			$(this).hide();
		});
		prevSection.show();
		prevSection.removeClass("none");
		prevSection.stop().animate({'top':0}, 1000, 'easeInOutExpo', function() {
			$("html, body").animate({scrollTop:0});
			if(!$(this).hasClass('fit')) {
				$(this).css({'position':'relative', "top":0});
			}
			footer.stop().animate({opacity:1}, 200);	
			$("html").getNiceScroll().resize();
		});
	});
	
	

	
	//뒤로가기
	function goBack() {
		window.history.back();
	}
	

	//목록보기 스타일 변경
	$(".listStyleChange [class*='btn']").click(function(){
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
	});
	$(".listStyleChange .btnGall").click(function(){
		$(this).parent().parent().parent().find(".list_collection").addClass('none');
		$(this).parent().parent().parent().find(".gall_collection").removeClass('none');
		$("html").getNiceScroll().resize();
	});
	$(".listStyleChange .btnList").click(function(){
		$(this).parent().parent().parent().find(".gall_collection").addClass('none');
		$(this).parent().parent().parent().find(".list_collection").removeClass('none');
		$("html").getNiceScroll().resize();
	});
	

	$('.collection-group').each(function() {
		var group = $(this);
		var openner = $(this).children('.collection');
		var bookMarkList = $(this).children('.bookMark_list');
		bookMarkList.hide();

		if(bookMarkList.length) {
			openner.addClass('openner');
			openner.click(function(){
				group.toggleClass('open');
				bookMarkList.slideToggle(200, 'easeInOutExpo', function() {
					$("html").getNiceScroll().resize();
				});
			});
		}
	});
	

	
	
	//댓글버튼
	$(".replyOpenner").click(function(){
		$(this).siblings('.replyGroup').toggleClass('on');
	});





	//화면 중앙
	$('select').each(function() {
		var selectClass = $(this).attr('class');
		$(this).removeClass();
		$(this).wrap('<div class="select-wrapper ' + selectClass + '"></div>');
	});


	


});
//------------------------------- End Ready Function




//위로 버튼
$(window).scroll(function() {
	if( $(this).scrollTop() >= 2000 ) {
		if( $(".btnTop").hasClass("none") ) {
			$(".btnTop").removeClass("none");
			//$(".btnTop").addClass("block");
		}
	} else {
		//$(".btnTop").removeClass("block");
		$(".btnTop").addClass("none");
	}
});

$(document).on('click', '.scrolly', function() {
	$("html, body").animate({scrollTop:0}, 250);
});