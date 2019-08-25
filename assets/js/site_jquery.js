$(document).ready(function(){

	// 팝업api
	$('.popup-ajax').magnificPopup({
		type: 'ajax',
		closeOnContentClick: false, 
				closeOnBgClick: false,
		overflowY: 'auto',
		fixedContentPos: true,
		fixedBgPos: true	,
		callbacks: {
			open: function() {
				//$('select').selectpicker('refresh');		  
			}
		}
	});
	$('.popup-view').magnificPopup({
		type: 'ajax',
		closeOnContentClick: false, 
				closeOnBgClick: false,
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1]
		},
		overflowY: 'auto',
		fixedContentPos: true,
		fixedBgPos: true
	});
	$('.click').click();
	// 팝업api

	// 팝업
  //$("#fowshowBtn").on("click", open2PopUp);
  $("#fowcloseBtn").on("click", close2PopUp);
  $(window).on("scroll", center2PopUp);
  // 스크롤시 팝업의 위치가 유지되길 원하면 윗줄 주석 제거

	//애견이미지 세로정렬
	$('.dog_image div.box').css('height',$('.dog_image div.box').css('width'));
	$('.dog_image div.box').css('line-height',$('.dog_image div.box').css('width'));
	//console.log($('.dog_image div.box').css('height'));

	// 시급 계산
	$('#pay_24').keyup(function(event){
		if(!$('#pay_24').val()){
			var pay_24 = '0';
		}else{
			var pay_24 = $('#pay_24').val();
		}
		$('#pay_24_ck').html(comma(pay_24));
		$('#pay_1_ck').html(comma(Math.floor(parseInt(pay_24)/12)));
	});

	// 한글입력 막기
	$(".not-kor").keyup(function(event) { 
		if (!(event.keyCode >=37 && event.keyCode<=40)) {
			var v = $(this).val();
			$(this).val(v.replace(/[^a-z0-9]/gi,''));
		}
	});

	// 숫자만 입력
	$('.only_number').keypress(function(event){
		//alert(event.which);
		if (event.which && (event.which  > 47 && event.which  < 58 || event.which == 8)) {
		//alert('숫자임!');
		} else {
		event.preventDefault();
		}
	});
	$('.only_number').keyup(function(event){
		//alert(event.which);
		event = event || window.event;
		var keyID = (event.which) ? event.which : event.keyCode;
		if ( keyID == 8 || keyID == 46 || keyID == 37 || keyID == 39 ) 
			return;
		else
			event.target.value = event.target.value.replace(/[^0-9]/g, "");
	});
	
	// 한글 입력
	$('.only_hangul').keypress(function(event){
		//alert(event.which);
		if (event.which && (event.which  > 12687 && event.which < 12592)) {
		//alert('숫자임!');
		} else {
		event.preventDefault();
		}
	});

	$(".only_hangul2").keyup(function (event) {
		regexp = /[a-z0-9]|[ \[\]{}()<>?|`~!@#$%^&*-_+=,.;:\"'\\]/g;
		v = $(this).val();
		if (regexp.test(v)) {
			alert("한글만 입력가능 합니다.");
			$(this).val('');
		}
	});

	// 170525 레이어팝업
	$(".close_now").click (function(){ // event_bar
		var event2_detail = document.getElementById( "event2_detail" );
		if($('#event2_view').val()=="N"){
			$('#backBg').css('display','block');
			TweenLite.to( event2_detail, 0.8, { bottom:0, ease:Power3.easeInOut } );
		}else{
			$('#backBg').css('display','none');
			TweenLite.to( event2_detail, 0.8, { bottom:-$('#event2_detail').css('height').replace('px',''), ease:Power3.easeInOut } );
		}
	});
	$(".close_day").click (function(){ // event_bar
		setCookie( 'p_cookie_170525', 'NO', '1' );//쿠기 저장 기간
		var event2_detail = document.getElementById( "event2_detail" );
		if($('#event2_view').val()=="N"){
			$('#backBg').css('display','block');
			TweenLite.to( event2_detail, 0.8, { bottom:0, ease:Power3.easeInOut } );
		}else{
			$('#backBg').css('display','none');
			TweenLite.to( event2_detail, 0.8, { bottom:-$('#event2_detail').css('height').replace('px',''), ease:Power3.easeInOut } );
		}
	});

	//바텀 카피 뷰
	$("#copy_view").click(function(){
		if($(".pop_footer2 >p.copy").css('display')=='none'){
			$('#copy_view img').attr('src','/images/common/footer_biz_on.png');
			$(".pop_footer2 >p.copy").show();
		}else{
			$('#copy_view img').attr('src','/images/common/footer_biz_off.png');
			$(".pop_footer2 >p.copy").hide();
		}
	});

	// 해외여행자보험 탭
	$("#tab_btn tr>td").click(function(){
		//alert($(this).index());
		for(i=0;i<=3;i++){
			$("#tab_btn tr>td:eq("+i+")>img").attr('src','/images/good/manu_img_off0'+(i+1)+'.png');
			$("#tab_0"+(i+1)).hide();
		}
		$("#tab_btn tr>td:eq("+$(this).index()+")>img").attr('src','/images/good/manu_img_on0'+($(this).index()+1)+'.png');
		$("#tab_0"+($(this).index()+1)).show();
	});

	// 해외여행자보험 탭
	$("#tabm_btn1 td").click(function(){
		//alert($(this).index());
		for(i=0;i<=3;i++){
			$("#tabm_btn1 td:eq("+i+")>img").attr('src','/images/good/manu_img_off0'+(i+1)+'m.png');
			$("#tabm_btn2 td:eq("+i+")>img").attr('src','/images/good/manu_img_off0'+(i+3)+'m.png');
			$("#tabm_0"+(i+1)).hide();
		}
		$("#tabm_btn1 td:eq("+$(this).index()+")>img").attr('src','/images/good/manu_img_on0'+($(this).index()+1)+'m.png');
		$("#tabm_0"+($(this).index()+1)).show();
	});
	$("#tabm_btn2 td").click(function(){
		//alert($(this).index());
		for(i=0;i<=3;i++){
			$("#tabm_btn1 td:eq("+i+")>img").attr('src','/images/good/manu_img_off0'+(i+1)+'m.png');
			$("#tabm_btn2 td:eq("+i+")>img").attr('src','/images/good/manu_img_off0'+(i+3)+'m.png');
			$("#tabm_0"+(i+1)).hide();
		}
		$("#tabm_btn2 td:eq("+$(this).index()+")>img").attr('src','/images/good/manu_img_on0'+($(this).index()+3)+'m.png');
		$("#tabm_0"+($(this).index()+3)).show();
	});
	
	// 애견 썸네일 리사이징
	$(window).resize(function(){
		$('.box_dog').css('width','calc(33% - 9px)');
		//console.log($('.box_dog').css('width'))
		$('.box_dog').css('height',$('.box_dog').css('width'));
		$('.box_dog').css('line-height',$('.box_dog').css('width'));
	}).resize();
});

// 좋아요
function like_ck(checkName,PB_idx) {
	$.ajax({
		type: 'POST',
		url: '/app/ajax_check.php',
		data: {
			'checkName' : checkName,
			'PB_idx': PB_idx
		},
		cache: false,
		async: false,
		success: function(result) {
			//alert(result);
			result = result.replace(/(^\s*)|(\s*$)/g, "");
			var re=result.split("///");
			if(re[0]=="ok"){
				if(re[1]=='Y'){
					$("#like_count").html(re[2]);
				}else{
					$("#like_count").html(re[2]);
				}
			}else if(re[0]=="ok1"){
				alert('로그인해주세요.');
			}else if(re[0]=="no"){
				alert('자신의 북마크는 추천이 안됩니다. 다른사람의 북마크를 추천해주세요.');
			}else {alert("오류가 있습니다");}
		}
	});
}

/*
*	엔터키로 form날리기
*/
function ent_q(f) {
	if(event.keyCode==13){
		eval(f);
	}
}

//팝업
function close2PopUp() {
  $("#fowoverLay, .fowwindow").fadeOut(); //멋지게 사라지고 싶으면 fadeOut() 으로 변경
}

//팝업
function center2PopUp() {
  $(".fowwindow").center();
}

//팝업
$.fn.center = function () {
  this.css("position", "absolute");
  this.css("top", Math.max(0, (($(window).height() - $(this).outerHeight()) / 2) +
    $(window).scrollTop()) + "px");
  this.css("left", Math.max(0, (($(window).width() - $(this).outerWidth()) / 2) +
    $(window).scrollLeft()) + "px");
  return this;
}

//달력날짜조정
function time_from_ck(date,hour){
	var leave_time = "";
	var arrival_time = "";
	if($('#fromReservation').val()==$('#toReservation').val()){
		if($('#arrival_time').val().substr(0,1)=='0'){var arrival_ck = $('#arrival_time').val().substr(1,1);
		}else{var arrival_ck = $('#arrival_time').val();}
		for(i=0;i<24;i++){
			if(i<=$('#leave_time').val()){}else{
				if(i<10){var time = '0'+i;}else{var time = i;}
				if(i<13){var time_n='오전';	}else{var time_n='오후';}
				if(i<13){var time_n='오전';var time_12=i;	}else{var time_n='오후';var time_12=i-12;}
				if(arrival_ck>=$('#leave_time').val() && arrival_ck==i){var a_ck = "selected";}else{var a_ck = "";}
				arrival_time = arrival_time + "<option value='"+time+"' "+a_ck+">"+time_n+" "+time_12+"시</option>";
			}
		}
		$('#arrival_time').html(arrival_time);
	}else{
	}
}
function time_to_ck(date,hour){
	var leave_time = "";
	var arrival_time = "";
	if($('#leave_time').val().substr(0,1)=='0'){var leave_ck = $('#leave_time').val().substr(1,1);
	}else{var leave_ck = $('#leave_time').val();}
	if($('#fromReservation').val()==date){
		for(i=0;i<24;i++){
			if(i<=hour){}else{
				if(i<10){var time = '0'+i;}else{var time = i;}
				if(i<13){var time_n='오전';var time_12=i;	}else{var time_n='오후';var time_12=i-12;}
				if(leave_ck>=$('#leave_time').val() && leave_ck==i){var l_ck = "selected";}else{var l_ck = "";}
				leave_time = leave_time + "<option value='"+time+"' "+l_ck+">"+time_n+" "+time_12+"시</option>";
			}
		}
		$('#leave_time').html(leave_time);
	}else if($('#fromReservation').val()==$('#toReservation').val()){
		for(i=0;i<24;i++){
			if(i>=$('#arrival_time').val()){}else{
				if(i<10){var time = '0'+i;}else{var time = i;}
				if(i<13){var time_n='오전';	}else{var time_n='오후';}
				if(i<13){var time_n='오전';var time_12=i;	}else{var time_n='오후';var time_12=i-12;}
				if(leave_ck>=$('#leave_time').val() && leave_ck==i){var l_ck = "selected";}else{var l_ck = "";}
				leave_time = leave_time + "<option value='"+time+"' "+l_ck+">"+time_n+" "+time_12+"시</option>";
			}
		}
		$('#leave_time').html(leave_time);
	}else{
	}
}
function today_from_ck(date,hour){
	var leave_time = "";
	var arrival_time = "";

	if($('#fromReservation').val()==date){
		for(i=0;i<24;i++){
			if(i<=hour){}else{
				if(i<10){var time = '0'+i;}else{var time = i;}
				if(i<13){var time_n='오전';var time_12=i;	}else{var time_n='오후';var time_12=i-12;}
				leave_time = leave_time + "<option value='"+time+"'>"+time_n+" "+time_12+"시</option>";
			}
		}
		$('#leave_time').html(leave_time);
	}else	if($('#fromReservation').val()==$('#toReservation').val()){	
		for(i=0;i<24;i++){
			if(i<=$('#leave_time').val()){}else{
				if(i<10){var time = '0'+i;}else{var time = i;}
				if(i<13){var time_n='오전';	}else{var time_n='오후';}
				if(i<13){var time_n='오전';var time_12=i;	}else{var time_n='오후';var time_12=i-12;}
				if(i==23){var time_select = 'selected';}else{}
				arrival_time = arrival_time + "<option value='"+time+"' "+time_select+">"+time_n+" "+time_12+"시</option>";
			}
		}
		$('#arrival_time').html(arrival_time);
	}else{
		for(i=0;i<24;i++){
			if(i<10){var time = '0'+i;}else{var time = i;}
			if(i<13){var time_n='오전';	}else{var time_n='오후';}
			if(i<13){var time_n='오전';var time_12=i;	}else{var time_n='오후';var time_12=i-12;}
			leave_time = leave_time + "<option value='"+time+"'>"+time_n+" "+time_12+"시</option>";
		}
		$('#leave_time').html(leave_time);
	}

    var element = $("#leave_time")[0], worked = false;
    if (document.createEvent) { // all browsers
        var e = document.createEvent("MouseEvents");
        e.initMouseEvent("mousedown", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
        worked = element.dispatchEvent(e);
    } else if (element.fireEvent) { // ie
        worked = element.fireEvent("onmousedown");
    }
    if (!worked) { // unknown browser / error
        alert("It didn't worked in your browser.");
    }
    
  $("#leave_time").on('click');
}
function today_to_ck(date,hour){
	if(!$('#fromReservation').val()){alert("예약 시작일을 먼저 선택해주세요.");$('#toReservation').val('');return;}
	var leave_time = "";
	var arrival_time = "";
	if($('#toReservation').val()==$('#fromReservation').val()){
		for(i=0;i<24;i++){
			if(i<=$('#leave_time').val()){}else{
				if(i<10){var time = '0'+i;}else{var time = i;}
				if(i<13){var time_n='오전';	}else{var time_n='오후';}
				if(i<13){var time_n='오전';var time_12=i;	}else{var time_n='오후';var time_12=i-12;}
				if(i==23){var time_select = 'selected';}else{}
				arrival_time = arrival_time + "<option value='"+time+"' "+time_select+">"+time_n+" "+time_12+"시</option>";
			}
		}
		$('#arrival_time').html(arrival_time);
	}else	if($('#toReservation').val()==date){
		for(i=0;i<24;i++){
			if(i<=hour){}else{
				if(i<10){var time = '0'+i;}else{var time = i;}
				if(i<13){var time_n='오전';	}else{var time_n='오후';}
				if(i<13){var time_n='오전';var time_12=i;	}else{var time_n='오후';var time_12=i-12;}
				if(i==23){var time_select = 'selected';}else{}
				arrival_time = arrival_time + "<option value='"+time+"' "+time_select+">"+time_n+" "+time_12+"시</option>";
			}
		}
		$('#arrival_time').html(arrival_time);
	}else{
		for(i=0;i<24;i++){
			if(i<10){var time = '0'+i;}else{var time = i;}
			if(i<13){var time_n='오전';	}else{var time_n='오후';}
			if(i<13){var time_n='오전';var time_12=i;	}else{var time_n='오후';var time_12=i-12;}
				if(i==23){var time_select = 'selected';}else{}
			arrival_time = arrival_time + "<option value='"+time+"' "+time_select+">"+time_n+" "+time_12+"시</option>";
		}
		$('#arrival_time').html(arrival_time);
	}
}
//달력날짜조정

function toggle_ck(id,effect){
	if($('#'+id).css('display')=='none'){
		if(effect=='fade'){
			$('#'+id).fadeIn();
		}else{
			$('#'+id).show();
		}
	}else{
		if(effect=='fade'){
			$('#'+id).fadeOut();
		}else{
			$('#'+id).hide();
		}
	}
}

// link 타기
function link(url){
	location.href=url;
}

// 팝업쿠키
function setCookie( name, value, expiredays ){
	var todayDate = new Date();
	todayDate.setDate( todayDate.getDate() + expiredays );
	document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"
}

// history.go 보정 함수, 자기페이지일 경우 마이페이지로
function back(php_self){
	//alert(escape(document.referrer));
	//alert(php_self);
	//document.referrer = '/contents/mypage.php';
	//alert(escape(document.referrer)+'///'+escape(document.referrer).indexOf(php_self))
	//alert(php_self+'///'+php_self.indexOf('/contents/customer/term_of_service.php'));
	//alert(php_self+'///'+php_self.indexOf('/contents/customer/term_o1f_service.php'));

	if(php_self.indexOf('/contents/member/login')=='0' || (php_self.indexOf('/contents/paykhan/paykhan')=='0' && php_self.indexOf('/contents/paykhan/paykhan_history')!='0') || php_self.indexOf('/contents/mypage/mypage')=='0' || php_self.indexOf('/contents/customer/customer')=='0'){ // 각탭 메인은 루트로
		location.replace('/');
	}else if(php_self.indexOf('/contents/han/han_history')=='0'){// han 거래내역
		location.replace('/contents/paykhan/paykhan');
	}else if(php_self.indexOf('/contents/paykhan/paykhan_history')=='0'){// pkn 거래내역
		location.replace('/contents/paykhan/paykhan');
	}else if(php_self.indexOf('/contents/mypage/privacy')=='0'){// 개인정보관리
		location.replace('/contents/mypage/mypage');
	}else if(php_self.indexOf('/contents/mypage/privacy_modify')=='0'){// 개인정보수정
		location.replace('/contents/mypage/privacy');
	}else if(php_self.indexOf('/contents/mypage/recommender')=='0'){// 커뮤니티
		location.replace('/contents/mypage/mypage');
	}else if(php_self.indexOf('/contents/customer/term_of_service')=='0'){// 이용약관
		location.replace('/contents/customer/customer');
	}else if(php_self.indexOf('/contents/customer/term_of_privacy')=='0'){// 개인정보취급방침
		location.replace('/contents/customer/customer');
	}else if(php_self.indexOf('/contents/member/member_join')=='0' || php_self.indexOf('/contents/member/id_find')=='0' || php_self.indexOf('/contents/member/pwd_find')=='0'){// 회원가입
		location.replace('/contents/member/login');
	}else{
		location.replace('/contents/paykhan/paykhan');
	}
}

// 히든값 설정
function setHidden(id,val) {
	$('#'+id).val(val);
}

function generateBarcode(code){
	var value = code;
	var btype = 'code128';
	var renderer = 'css';		
	var quietZone = false;
	var settings = {
		output:renderer,
		bgColor: '#FFFFFF',
		color: '#000000',
		barWidth: '2',
		barHeight: '100',
		moduleSize: '5',
		fontSize: '20',
		posX: '10',
		posY: '20',
		addQuietZone: '1'
	};
	$(".pop_logo3").html("").show().barcode(value, btype, settings);
	jQuery('.pop_logo3 div:first').filter(function(){
		$(this).css('width','0px');
	});
	jQuery('.pop_logo3 div:nth-last-of-type(2)').filter(function(){
		$(this).css('width','0px');
	});
	var width_ck = (Number($('.pop_logo3').css('width').replace("px",""))-40)+"px"
	$('.pop_logo3').css('width',width_ck);
}
// width값 조정 이마트
function generateBarcode3(code){
	var value = code;
	var btype = 'code128';
	var renderer = 'css';		
	var quietZone = false;
	if($(window).width()<410){
		var settings = {
			output:renderer,
			bgColor: '#FFFFFF',
			color: '#000000',
			barWidth: '2',
			barHeight: '60',
			moduleSize: '5',
			fontSize: '14',
			posX: '10',
			posY: '20',
			addQuietZone: '1'
		};
		$(".pop_barcode").html("").show().barcode(value, btype, settings);
		jQuery('.pop_barcode div:first').filter(function(){
			$(this).css('width','0px');
		});
		jQuery('.pop_barcode div:nth-last-of-type(2)').filter(function(){
			$(this).css('width','0px');
		});
		$('.pop_barcode').css('width','205px');
	}else{
		var settings = {
			output:renderer,
			bgColor: '#FFFFFF',
			color: '#000000',
			barWidth: '2',
			barHeight: '60',
			moduleSize: '5',
			fontSize: '20',
			posX: '10',
			posY: '20',
			addQuietZone: '1'
		};
		$(".pop_barcode").html("").show().barcode(value, btype, settings);
		jQuery('.pop_barcode div:first').filter(function(){
			$(this).css('width','0px');
		});
		jQuery('.pop_barcode div:nth-last-of-type(2)').filter(function(){
			$(this).css('width','0px');
		});
		$('.pop_barcode').css('width','205px');
	}
}
//콤마
//function inputNumberFormat(obj) {
//    obj.value = comma(uncomma(obj.value));
//}
////콤마풀기
//function uncomma(str) {
//    str = String(str);
//    return str.replace(/[^\d]+/g, '');
//}
//콤마찍기
function comma(str) {
    str = String(str);
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
}
function onlyNum(obj) {
    var val = obj.value;
    var re = /[^0-9\.\,\-]/gi;
    obj.value = val.replace(re, '');
}
//function computeAge(birthday){ 
//	var bday=parseInt(birthday.substring(6,8)); 
//	var bmo=(parseInt(birthday.substring(4,6))-1); 
//	var byr=parseInt(birthday.substring(0,4)); 
//	//alert(byr + "-" + bmo + "-" + bday); 
//	var byr; 
//	var age; 
//	var now = new Date(); 
//	tday=now.getDate(); 
//	tmo=(now.getMonth()); 
//	tyr=(now.getFullYear()); 
//
//	if((tmo > bmo)||(tmo==bmo & tday>=bday)) { 
//	age=byr 
//	} else{ 
//	age=byr+1; 
//	}
//	return tyr-age; 
//}
function computeAge(birthday){ 
	var bday=birthday.substring(6,8); 
	var bmo=birthday.substring(4,6); 
	var byr=birthday.substring(0,4); 
	//alert(birthday)
	birthday = getDt8(byr + "-" + bmo + "-" + bday);
	birthday = birthday.replace('-','');
	birthday = birthday.replace('-','');
	//alert(birthday)
	var bday=parseInt(birthday.substring(6,8)); 
	var bmo=(parseInt(birthday.substring(4,6))-1); 
	var byr=parseInt(birthday.substring(0,4)); 
	//alert(byr + "-" + bmo + "-" + bday); 

	var byr; 
	var age; 
	var now = new Date(); 

	tday=now.getDate(); 
	tmo=(now.getMonth()); 
	tyr=(now.getFullYear()); 

	if((tmo > bmo)||(tmo==bmo & tday>=bday)) { 
	age=byr 
	} else{ 
	age=byr+1; 
	}
	return tyr-age; 
}

function getDt8(s){
	//alert(s)
	var newDt = new Date(s);
	//alert(newDt)
	newDt.setMonth( newDt.getMonth() - parseInt(6) );
	newDt.setDate( newDt.getDate() );
	return converDateString(newDt);
}

function converDateString(dt){
	//alert(dt)
	return dt.getFullYear() + "-" + addZero(eval(dt.getMonth()+1)) + "-" + addZero(dt.getDate());
}

function addZero(i){
	var rtn = i + 100;
	return rtn.toString().substring(1,3);
}

function in_output(fromReservation,leave_time,toReservation,arrival_time,birth,sex_type,insurance_ck){

	if(!fromReservation){alert("출국일을 선택하세요.");$('#fromReservation').focus();return false;}
	if(!leave_time){alert("출국시간을 선택하세요.");$('#leave_time').focus();return false;}
	if(!toReservation){alert("귀국일을 선택하세요.");$('#toReservation').focus();return false;}
	if(!arrival_time){alert("귀국시간을 선택하세요.");$('#arrive_time').focus();return false;}
	if(!birth){alert("생년월일 선택하세요.");$('#birth').focus();return false;}
	if(!sex_type){alert("성별을 선택하세요.");$('#sex_type').focus();return false;}

	var fromdate = fromReservation.split("-");  
	var todate = toReservation.split("-");  
	var fromdateobj = new Date(fromdate[0], Number(fromdate[1])-1, fromdate[2],Number(leave_time),0,0);
	var todateobj = new Date(todate[0], Number(todate[1])-1, todate[2],Number(arrival_time),0,0);  
	var betweenDay = Math.ceil( (parseInt(todateobj.getTime()) - parseInt(fromdateobj.getTime())) / (1000*60*60*24) );

	if(betweenDay>90){alert("체류기간을 90일 미만으로 조정하세요.");$('#toReservation').focus();return false;}
	if(betweenDay==0){betweenDay=1;}

	var birth1 = birth.split("-");
	var age = computeAge(birth1[0]+birth1[1]+birth1[2]);
	if(age>100){alert("100세 이상은 가입하실 수 없습니다.");$('#birth').focus();return false;}
	if(age<0){age='0';}else{age=age;}
	var age_ck=age;

	$.ajax({
		type: 'POST',
		url: "../inc/ajax_check.php",
		data: {
			'checkName' : 'in_output',
			'betweenDay': betweenDay,
			'age': age,
			'sex_type'  : sex_type,
			'insurance_ck' : insurance_ck
		},
		cache: false,
		async: false,
		error : function(request,status,error){
			alert("code : "+request.status+"\r\nmessage : " + request.responseText);
		},
		beforeSend:function(x){
		//처리중 화면구성
		},
		success: function(result) {
			result = result.replace(/(^\s*)|(\s*$)/g, "");
			var re=result.split("///");
			if(result=="no"){alert("오류가 있습니다");}
			else {
				if(sex_type=='1'){sex_type_n='남성';}else{sex_type_n='여성';}
				$('#plan_name').val(re[0]);
				$('#result_pay').val(numberWithCommas(re[1])+'원');
				$('#result_day').val(betweenDay+'일');
				$('#result_age').val(age_ck+'세');
				$('#result_sex').val(sex_type_n);
				$('.result_view').show();
			}
		}
	});
}

//삼성카드
function in_output_samsung(fromReservation,leave_time,toReservation,arrival_time,birth,sex_type,insurance_ck){

	if(!fromReservation){alert("출국일을 선택하세요.");$('#fromReservation').focus();return false;}
	if(!leave_time){alert("출국시간을 선택하세요.");$('#leave_time').focus();return false;}
	if(!toReservation){alert("귀국일을 선택하세요.");$('#toReservation').focus();return false;}
	if(!arrival_time){alert("귀국시간을 선택하세요.");$('#arrive_time').focus();return false;}
	if(!$('#jumin1_1').val()){alert("생년월일 선택하세요.");$('#jumin1_1').focus();return false;}
	if(!$('#jumin1_2').val()){alert("생년월일 선택하세요.");$('#jumin1_2').focus();return false;}
	if(!$('#jumin1_3').val()){alert("생년월일 선택하세요.");$('#jumin1_3').focus();return false;}
	//if(!sex_type){alert("성별을 선택하세요.");$('#sex_type').focus();return false;}

	var fromdate = fromReservation.split("-");  
	var todate = toReservation.split("-");  
	var fromdateobj = new Date(fromdate[0], Number(fromdate[1])-1, fromdate[2],Number(leave_time),0,0);
	var todateobj = new Date(todate[0], Number(todate[1])-1, todate[2],Number(arrival_time),0,0);  
	var betweenDay = Math.ceil( (parseInt(todateobj.getTime()) - parseInt(fromdateobj.getTime())) / (1000*60*60*24) );

	if(betweenDay>90){alert("체류기간을 90일 미만으로 조정하세요.");$('#toReservation').focus();return false;}
	if(betweenDay==0){betweenDay=1;}

	var birth1 = birth.split("-");
	var age = computeAge(birth1[0]+birth1[1]+birth1[2]);
	if(age>100){alert("100세 이상은 가입하실 수 없습니다.");$('#jumin1_1').focus();return false;}
	if(age<0){age='0';}else{age=age;}
	var age_ck=age;

	$.ajax({
		type: 'POST',
		url: "../inc/ajax_check.php",
		data: {
			'checkName' : 'in_output',
			'betweenDay': betweenDay,
			'age': age,
			'sex_type'  : sex_type,
			'insurance_ck' : insurance_ck
		},
		cache: false,
		async: false,
		error : function(request,status,error){
			alert("code : "+request.status+"\r\nmessage : " + request.responseText);
		},
		beforeSend:function(x){
		//처리중 화면구성
		},
		success: function(result) {
			result = result.replace(/(^\s*)|(\s*$)/g, "");
			var re=result.split("///");
			if(result=="no"){alert("오류가 있습니다");}
			else {
				if(sex_type=='1'){sex_type_n='남성';}else{sex_type_n='여성';}
				$('#plan_name').val(re[0]);
				$('#result_pay').val(numberWithCommas(re[1])+'원');
				$('#result_day').val(betweenDay+'일');
				$('#result_age').val(age_ck+'세');
				$('#result_sex').val(sex_type_n);
				$('.result_view').show();
			}
		}
	});
}

//선물하기
function in_output_coupon(fromReservation,leave_time,toReservation,arrival_time,birth,sex_type,insurance_ck){

	if(!fromReservation){alert("출국일을 선택하세요.");$('#fromReservation_coupon').focus();return false;}
	if(!leave_time){alert("출국시간을 선택하세요.");$('#leave_time_coupon').focus();return false;}
	if(!toReservation){alert("귀국일을 선택하세요.");$('#toReservation_coupon').focus();return false;}
	if(!arrival_time){alert("귀국시간을 선택하세요.");$('#arrive_time_coupon').focus();return false;}
	if(!birth){alert("생년월일 선택하세요.");$('#jumin1_1').focus();return false;}
	if(!sex_type){alert("성별을 선택하세요.");$('#sex_type').focus();return false;}

	var fromdate = fromReservation.split("-");  
	var todate = toReservation.split("-");  
	var fromdateobj = new Date(fromdate[0], Number(fromdate[1])-1, fromdate[2],Number(leave_time),0,0);
	var todateobj = new Date(todate[0], Number(todate[1])-1, todate[2],Number(arrival_time),0,0);  
	var betweenDay = Math.ceil( (parseInt(todateobj.getTime()) - parseInt(fromdateobj.getTime())) / (1000*60*60*24) );

	if(betweenDay>90){alert("체류기간을 90일 미만으로 조정하세요.");$('#toReservation_coupon').focus();return false;}
	if(betweenDay==0){betweenDay=1;}

	var birth1 = birth.split("-");
	var age = computeAge(birth1[0]+birth1[1]+birth1[2]);
	if(age>100){alert("100세 이상은 가입하실 수 없습니다.");$('#jumin1_1').focus();return false;}
	if(age<0){age='0';}else{age=age;}
	var age_ck=age;

	$.ajax({
		type: 'POST',
		url: "../inc/ajax_check.php",
		data: {
			'checkName' : 'in_output',
			'betweenDay': betweenDay,
			'age': age,
			'sex_type'  : sex_type,
			'insurance_ck' : insurance_ck
		},
		cache: false,
		async: false,
		error : function(request,status,error){
			alert("code : "+request.status+"\r\nmessage : " + request.responseText);
		},
		beforeSend:function(x){
		//처리중 화면구성
		},
		success: function(result) {
			result = result.replace(/(^\s*)|(\s*$)/g, "");
			var re=result.split("///");
			if(result=="no"){alert("오류가 있습니다");}
			else {
				if(sex_type=='1'){sex_type_n='남성';}else{sex_type_n='여성';}
				$('#plan_name').val(re[0]);
				$('#result_pay').val(numberWithCommas(re[1])+'원');
				$('#result_day').val(betweenDay+'일');
				$('#result_age').val(age_ck+'세');
				$('#result_sex').val(sex_type_n);
				$('.result_view').show();
			}
		}
	});
}

// 해외여행자보험 팝업 추가인원 (/contents/insurance02.php)
function extra_ck(val){
	var extra_val = '';
	for(i=1;i<=val;i++){
	extra_val = extra_val + "<li><dl><dt><label for='extra_name_"+i+"'>고객명</label></dt><dd><input type='text' name='extra_name_"+i+"' id='extra_name_"+i+"' class='w_medium' /></dd></dl></li><li><dl><dt><label for='extra_jumin_"+i+"'>주민등록번호</label></dt><dd><input type='text' name='extra_jumin1_"+i+"' id='extra_jumin1_"+i+"' title='주민등록번호 앞자리' class='w_small quantity' maxlength='6'/> - <input type='text' name='extra_jumin2_"+i+"' id='extra_jumin2_"+i+"' title='주민등록번호 뒷자리' class='w_small quantity' maxlength='7'/></dd></dl></li><input type='hidden' name='extra_age_"+i+"' id='extra_age_"+i+"' title='추가인원나이' /><input type='hidden' name='extra_agef_"+i+"' id='extra_agef_"+i+"' title='추가인원나이' />";
	}
	$('#extra_info').html(extra_val);
}

function repay_popup(result_day,extra_name,extra_age,result_sort){
	$('#popup_day').html(result_day);
	$('#popup_name').html(extra_name);
	$('#popup_age').html(extra_age);
	$('#most_popup').show();
}

function check_box(val){
	if( $("#apply_1").is(":checked")==true){
		$('input:checkbox[id="'+val+'"]').prop("checked", false);
	}else{
		$('input:checkbox[id="'+val+'"]').prop("checked", true);
	}
}

// 모바일 입장권 구매하기 수량변경
function option_minus(val){
	//alert(val)
	//alert($('#option_num_'+val).val());
	if(Number($('#option_num_'+val).val())<'2'){
		alert('최소수량입니다.');
	}else{
		var num_ck = Number($('#option_num_'+val).val())-1;
		$('#option_num_'+val).val(num_ck);
		option_num_ck();
	}
}
// 옵션 제거(X) 기능
function option_search(num){

	var option_arr1=$('#option_add_name').val().split("///");
	var option_arr2=$('#option_add').val().split("///");
	var option_arr3=$('#option_add_price').val().split("///");
	var option_arr4=$('#option_add_num').val().split("///");

	//var idx = option_arr2.valueIndex(num);
	num = String(num);
	var idx = option_arr2.indexOf(num);

	option_arr1.splice(idx,1);
	option_arr2.splice(idx,1);
	option_arr3.splice(idx,1);
	option_arr4.splice(idx,1);
	$('#option_add_name').val('');
	$('#option_add').val('');
	$('#option_add_price').val('');
	$('#option_add_num').val('');
	for(i=1;i<option_arr1.length;i++){
		$('#option_add_name').val($('#option_add_name').val()+"///"+option_arr1[i]);
	}
	for(i=1;i<option_arr2.length;i++){
		$('#option_add').val($('#option_add').val()+"///"+option_arr2[i]);
	}
	for(i=1;i<option_arr3.length;i++){
		$('#option_add_price').val($('#option_add_price').val()+"///"+option_arr3[i]);
	}
	for(i=1;i<option_arr4.length;i++){
		$('#option_add_num').val($('#option_add_num').val()+"///"+option_arr4[i]);
	}
	$('#optionframe_'+num).remove();
	$('#opt').val('');
	option_num_ck();
}
// 모바일 입장권 구매하기 수량변경
function option_plus(val){
	//alert(val)
	//alert($('#option_num_'+val).val());
	if(Number($('#option_num_'+val).val())>'19'){
		alert('최대수량입니다.');
	}else{
		var num_ck = Number($('#option_num_'+val).val())+1;
		$('#option_num_'+val).val(num_ck);
		option_num_ck();
	}
}

// 국내여행 티켓 옵션 선택
function option_choice(val,idx){
	if(val>0){
		$.ajax({
			type: 'POST',
			url: "/inc/ajax_check.php",
			data: {
				'checkName' : 'ticket_option',
				'option_line': val,
				'idx': idx
			},
			cache: false,
			async: false,
			error : function(request,status,error){
				alert("code : "+request.status+"\r\nmessage : " + request.responseText);
			},
			beforeSend:function(x){
			//처리중 화면구성
			},
			success: function(result) {
				result = result.replace(/(^\s*)|(\s*$)/g, "");
				var re=result.split("///");
				if(result=="no"){alert("오류가 있습니다");}
				else {
					//alert(val)
					//alert( $("#option_add").val().indexOf(val))
					if($("#option_add").val().indexOf(val)>0){
						alert('해당 옵션이 이미 추가되어 있습니다.');
					}else{
						$('#option_add_num').val($('#option_add_num').val()+"///1");
						$('#option_add').val($('#option_add').val()+"///"+val);
						$('#option_add_price').val($('#option_add_price').val()+"///"+$('#option_price_'+val).val());
						$('#option_add_name').val($('#option_add_name').val()+"///"+$('#option_'+val).val());
						$('#option_view').append(result);
					}
					var option_arr=$('#option_add').val().split("///");
					var total_pay = 0;
					for(i=1;i<option_arr.length;i++){
						total_pay = total_pay + ( $('#option_line_'+option_arr[i]).val() * $('#option_num_'+option_arr[i]).val() );
					}
					//alert(total_pay)
					$('#total_pay').val(total_pay);
					$('#total_pay_view').text(numberWithCommas(total_pay)+"원");
				}
			}
		});
	}
}

// 국내여행 티켓 옵션 선택
function option_choice_m(val,idx){
	if(val>0){
		$.ajax({
			type: 'POST',
			url: "/inc/ajax_check.php",
			data: {
				'checkName' : 'ticket_option_m',
				'option_line': val,
				'idx': idx
			},
			cache: false,
			async: false,
			error : function(request,status,error){
				alert("code : "+request.status+"\r\nmessage : " + request.responseText);
			},
			beforeSend:function(x){
			//처리중 화면구성
			},
			success: function(result) {
				result = result.replace(/(^\s*)|(\s*$)/g, "");
				var re=result.split("///");
				if(result=="no"){alert("오류가 있습니다");}
				else {
					//alert(val)
					//alert( $("#option_add").val().indexOf(val))
					if($("#option_add").val().indexOf(val)>0){
						alert('해당 옵션이 이미 추가되어 있습니다.');
						$('#opt').val('');
					}else{
						$('#option_add_num').val($('#option_add_num').val()+"///1");
						$('#option_add').val($('#option_add').val()+"///"+val);
						$('#option_add_price').val($('#option_add_price').val()+"///"+$('#option_price_'+val).val());
						$('#option_add_name').val($('#option_add_name').val()+"///"+$('#option_'+val).val());
						$('#option_view').append(result);
					}
					var option_arr=$('#option_add').val().split("///");
					var total_pay = 0;
					for(i=1;i<option_arr.length;i++){
						total_pay = total_pay + ( $('#option_line_'+option_arr[i]).val() * $('#option_num_'+option_arr[i]).val() );
					}
					//alert(total_pay)
					$('#total_pay').val(total_pay);
					$('#total_pay_view').text(numberWithCommas(total_pay)+"원");
				}
			}
		});
	}
}

//콤마찍기
function comma(str) {
    str = String(str);
    return str.replace(/(\d)(?=(?:\d{3})+(?!\d))/g, '$1,');
}

// 총 구매금액 정리
function option_num_ck(){
	var option_arr=$('#option_add').val().split("///");
	var total_pay = 0;
	$('#option_add_num').val('');
	for(i=1;i<option_arr.length;i++){
		total_pay = total_pay + ( $('#option_line_'+option_arr[i]).val() * $('#option_num_'+option_arr[i]).val() );
		$('#option_add_num').val($('#option_add_num').val()+"///"+$('#option_num_'+option_arr[i]).val());
	}
	//alert(total_pay)
	$('#total_pay').val(total_pay);
	$('#total_pay_view').text(numberWithCommas(total_pay)+"원");
}

function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

//이메일 선택입력
function email_select(email){
	if(email=='direct'){
		$("#email2").val('');
		$("#email2").attr("disabled",false);
		$("#email2").attr("readonly",false);
	}else{
		$("#email2").val(email);
		$("#email2").attr("disabled",true);
		$("#email2").attr("readonly",true);
	}
}
//이메일 선택입력_패스워드
function email_select_p(email){
	if(email=='direct'){
		$("#email2_p").val('');
		$("#email2_p").attr("disabled",false);
		$("#email2_p").attr("readonly",false);
	}else{
		$("#email2_p").val(email);
		$("#email2_p").attr("disabled",true);
		$("#email2_p").attr("readonly",true);
	}
}

//환율변경
function xchange_ext(){
		var xchange_ck = $('#xchange_ck').val();
		var xchange_con1 = $('#xchange_con1').val();
		var xchange_con2 = $('#xchange_con2').val();
		var price_re = $('#xchange_step1').val().replace(/,/g, '');

		$.ajax({
			type: 'POST',
			url: "../inc/ajax_check.php",
			data: {
				'checkName' : 'xchange',
				'xchange_ck': xchange_ck,
				'xchange_con1': xchange_con1,
				'xchange_con2': xchange_con2,
				'price': price_re
			},
			cache: false,
			async: false,
			error : function(request,status,error){
				alert("code : "+request.status+"\r\nmessage : " + request.responseText);
			},
			beforeSend:function(x){
			//처리중 화면구성
			},
			success: function(result) {
				console.log(result)
				//alert(result);
				result = result.replace(/(^\s*)|(\s*$)/g, "");
				var re=result.split("///");
				if(result=="no"){alert("오류가 있습니다");}
				else {
					//result=parseFloat(re[0]/re[1]).toFixed(2) 
					$('#xchange_step2').val(result);
				}
			}
		});
}

function check_jumin(jumin1,jumin2) { 
 //var jumin=document.getElementById('jumin1').value+document.getElementById('jumin2').value;
	var jumin=jumin1+jumin2;
 //주민등록 번호 13자리를 검사한다.
  var fmt = /^\d{6}[123456]\d{6}$/;  //포멧 설정
  if (!fmt.test(jumin)) {
   return false;
  }

  // 생년월일 검사
  var birthYear = (jumin.charAt(6) <= "2") ? "19" : "20";
  birthYear += jumin.substr(0, 2);
  var birthMonth = jumin.substr(2, 2) - 1;
  var birthDate = jumin.substr(4, 2);
  var birth = new Date(birthYear, birthMonth, birthDate);

  if ( birth.getYear() % 100 != jumin.substr(0, 2) ||
       birth.getMonth() != birthMonth ||
       birth.getDate() != birthDate) {
     return false;
  }

  // Check Sum 코드의 유효성 검사
  var buf = new Array(13);
  for (var i = 0; i < 13; i++) buf[i] = parseInt(jumin.charAt(i));
 
  multipliers = [2,3,4,5,6,7,8,9,2,3,4,5];
  for (var sum = 0, i = 0; i < 12; i++) sum += (buf[i] *= multipliers[i]);

  if ((11 - (sum % 11)) % 10 != buf[12]) {
     return false;
  }

	for(var i=1;i<=9;i++){
		var fake_num = i+""+i+""+i+""+i+""+i+""+i+""+i;
		if(jumin2 == fake_num){
			return false;
		}else{}
	}
  
  return true;
}

//앞의 텍스트박스에 6자리 글씨가 써지면 자동으로 다음 칸으로 커서가 넘어간다.
function nextgo(e,limit,next){  
  if (e.value.length>=limit) {
   $('#'+next).focus();
  }
}

// 정규식 - 이메일 유효성 검사
var regEmail = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
// 정규식 -전화번호 유효성 검사
var regPhone = /^((01[1|6|7|8|9])[1-9]+[0-9]{6,7})|(010[1-9][0-9]{7})$/;

//이메일 선택입력
function email_ck(val){
	if(val=="direct"){
		//$("#email2_2").detach();
		//$(".email_ck").before("<input type='text' name='email2_1' id='email2_1' size='30' class='span4' placeholder='직접입력하세요.'>");		
		$("#email2").attr("disabled",false);
		$("#email2").val("");
		$("#email2").focus();
	}else{
		$("#email2").val(val);
		$("#email2").attr("disabled",true);
	}
}

//이메일 선택입력 선물하기
function email_ck_sender(val){
	if(val=="direct"){
		$("#email2_sender").attr("disabled",false);
		$("#email2_sender").val("");
		$("#email2_sender").focus();
	}else{
		$("#email2_sender").val(val);
		$("#email2_sender").attr("disabled",true);
	}
}

// 비밀번호 정규식
function chkPwd(str){
 var pw = str;
 var num = pw.search(/[0-9]/g);
 var eng = pw.search(/[a-z]/ig);
 var spe = pw.search(/[_`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
 if(pw.length < 8 || pw.length > 20){
  alert("8자리 ~ 20자리 이내로 입력해주세요.");
  return false;
 }
 if(pw.search(/₩s/) != -1){
  alert("비밀번호는 공백없이 입력해주세요.");
  return false;
 }
 if( num < 0 || eng < 0 || spe < 0 ){
  alert("영문, 숫자, 특수문자를 포함하여 비밀번호를 입력해주세요.");
  return false;
 }
 return true;
}

//클립복사
function CopyToClipboard (coupon_num) {
		var input = document.getElementById ("coupon_num");
		var textToClipboard = input.value;
		//var textToClipboard = coupon_num;
		
		var success = true;
		if (window.clipboardData) { // Internet Explorer
				window.clipboardData.setData ("Text", textToClipboard);
		}
		else {
						// create a temporary element for the execCommand method
				var forExecElement = CreateElementForExecCommand (textToClipboard);

								/* Select the contents of the element 
										(the execCommand for 'copy' method works on the selection) */
				SelectContent (forExecElement);

				var supported = true;

						// UniversalXPConnect privilege is required for clipboard access in Firefox
				try {
						if (window.netscape && netscape.security) {
								netscape.security.PrivilegeManager.enablePrivilege ("UniversalXPConnect");
						}

								// Copy the selected content to the clipboard
								// Works in Firefox and in Safari before version 5
						success = document.execCommand ("copy", false, null);
				}
				catch (e) {
						success = false;
				}
				
						// remove the temporary element
				document.body.removeChild (forExecElement);
		}

		if (success) {
				alert ("추천인 링크주소가 복사되었습니다.");
		}
		else {
				//alert ("Your browser doesn't allow clipboard access!");
		}
}

//클립복사
function CreateElementForExecCommand (textToClipboard) {
		var forExecElement = document.createElement ("div");
				// place outside the visible area
		forExecElement.style.position = "absolute";
		forExecElement.style.left = "-10000px";
		forExecElement.style.top = "-10000px";
				// write the necessary text into the element and append to the document
		forExecElement.textContent = textToClipboard;
		document.body.appendChild (forExecElement);
				// the contentEditable mode is necessary for the  execCommand method in Firefox
		forExecElement.contentEditable = true;

		return forExecElement;
}

//클립복사
function SelectContent (element) {
				// first create a range
		var rangeToSelect = document.createRange ();
		rangeToSelect.selectNodeContents (element);

				// select the contents
		var selection = window.getSelection ();
		selection.removeAllRanges ();
		selection.addRange (rangeToSelect);
}