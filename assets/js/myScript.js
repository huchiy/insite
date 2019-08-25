$(document).ready(function(){
	
	// 스크롤시 #header 고정 ------------------------------------
	$(window).scroll(function() {
		if( $(this).scrollTop() >= 1) {
			if( $("#header.useScrollFixed").hasClass("nofixed") ) {
				$("#header.useScrollFixed").removeClass("nofixed");
				$("#header.useScrollFixed").addClass("fixed");
			}
		} else {
			$("#header.useScrollFixed").removeClass("fixed");
			$("#header.useScrollFixed").addClass("nofixed");
		}
	});

	
	//wrapper 최소높이
	var header = $('#header');
	var footer = $('#footer');
	var header_height = $('#header').outerHeight();
	var footer_height = $('#footer').outerHeight();
	var winHeight = $(window).height();
	var wrapperMinHeight = $(window).height() - $('#header').outerHeight() - $('#footer').outerHeight();
	var wrapperMaxHeight = $(window).height() - $('#header').outerHeight();
	$('#wrapper').css({'min-height':wrapperMinHeight});
	$('.autoHeight').css({'height':wrapperMinHeight});
	

	//알림 아이콘
	$(".alarm.new").click(function(){
		$('#header').find('.alarm_list').toggleClass('on');
	});
	$("#wrapper").click(function(){
		$('.alarm_list').removeClass('on');
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
		thisSection.stop().animate({'top': - wrapperMinHeight}, 1000, 'easeInOutExpo', function() {
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

	




	//위로 버튼
	/*$(window).scroll(function() {
		if( $(this).scrollTop() >= 2000 ) {
			if( $(".btnTop").hasClass("none") ) {
				$(".btnTop").removeClass("none");
				$(".btnTop").addClass("block");
			}
		} else if( $(this).scrollTop() <= 1000 ) {
			$(".btnTop").removeClass("block");
			$(".btnTop").addClass("none");
		}
		if( $(this).scrollTop() >= $(document).height() - $(window).height() - footer_height ){
			$(".btnTop").stop().animate({"position":"fixed", "bottom":footer_height + 15}, 180);
		} else {
			$(".btnTop").stop().animate({"position":"fixed", "bottom":15}, 350);
		}
	});
	$(document).on('click', '.scrolly', function() {
		$("html, body").animate({scrollTop:0}, 550);
	});*/


});






//팝업창
$(function(){
	$('.popWin').click(function(event){
		var href = $(this).attr('href');
		var winWidth = $(this).attr('data-width');
		var winHeight = $(this).attr('data-height');
		var board = $(this).attr('title');
		if ($(this).attr('data-top').length) {
			var top = $(this).attr('data-top');
		} else {
			var top = Math.ceil((window.screen.height - winHeight)/2);
		}
		if ($(this).attr('data-left').length) {
			var left = $(this).attr('data-left');
		} else {
			var left = Math.ceil((window.screen.width - winWidth)/2);
		}
		window.open(href,board,'width='+winWidth+',height='+winHeight+',top='+top+',left='+left+',scrollbars=yes, toolbar=no, menubar=no, location=no, statusbar=no, status=no, resizable=yes');
		event.preventDefault();
	});
});













//document ready - start
$(document).ready(function(){



	// FORM --------------------------------------------------------------------------------------------------
	
	// writePage 업로드 이미지 미리보기
	/*$('input[type="file"]').each(function(index) {
		var upload = $(this)[0],
			holder = document.getElementById('holder_' + index);
		upload.onchange = function (e) {
			e.preventDefault();
		var file = upload.files[0],
			reader = new FileReader();
		reader.onload = function (event) {
			var img = new Image();
			img.src = event.target.result;
			holder.innerHTML = '';
			holder.appendChild(img);
		};
		reader.readAsDataURL(file);
		return false;
		};
	});*/


	// 업로드 이미지 미리보기
	$('input[type="file"]').each(function(index) {
		//$(this).parent().siblings(".thumb").css({"border":"1px solid red"});

		/*
		var upload = $(this)[0],
			holder = $(this).parent().parent().find(".thumb");
		
		upload.onchange = function (e) {
			e.preventDefault();
		var file = upload.files[0],
			reader = new FileReader();
		reader.onload = function (event) {
			var img = new Image();
			img.src = event.target.result;
			holder.innerHTML = '';
			holder.appendChild(img);
		};
		reader.readAsDataURL(file);
		return false;
		};
		*/
	});


	//자동 하이픈 달기
	function addCommas(x) {
		return x.toString().replace( /(^02.{0}|^01.{1}|[0-9]{3})([0-9]+)([0-9]{4})/, "$1-$2-$3" );
	}
	//휴대폰 번호 입력
	$("input.phone").bind("keyup", function(event) {
		$(this).val(addCommas($(this).val().replace(/[^0-9]/g,"")));
	});


});
//document ready - end


