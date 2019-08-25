<?$loginspot='Y';?>
<?include "../../contents/common/head.php";?>

   <style>
        body {
            font-size: 12pt;
            background: #f5f5f5;
            font-family: '나눔고딕', sans-serif;
        }

        .history p {
            margin: 0 auto;
            font-weight: bold;
        }

        i {
            color: #fff;
        }

        .d-flex {
            display: flex;
        }

        .text-center {
            margin: 15px auto;
        }

        .header {
            background-color: #07c1f2;
            height: 40px;
        }

        .cw {
            color: #fff;
        }

        .sl {
            position: relative;
            /*border: 1px solid #999; !* 테두리 설정 *!*/
            z-index: 1;
            font-size: 5pt;
            padding: 0 0 0 15px;

        }

        .sl label {
            position: absolute;
            top: 1px; /* 위치정렬 */
            left: 5px; /* 위치정렬 */
            /*padding: .8em .5em; !* select의 여백 크기 만큼 *!*/
            color: #999;
            z-index: -1; /* IE8에서 label이 위치한 곳이 클릭되지 않는 것 해결 */
        }

        .sl select {
            line-height: normal; /* line-height 초기화 */
            font-family: inherit; /* 폰트 상속 */
            padding: .8em .5em; /* 여백과 높이 결정 */
            border: 0;
            opacity: 0; /* 숨기기 */
            filter: alpha(opacity=0); /* IE8 숨기기 */
            -webkit-appearance: none; /* 네이티브 외형 감추기 */
            -moz-appearance: none;
        }

        .container
        .container-fluid:after,
        .container-fluid:before,
        .container:after,
        .container:before {
            display: inline-block;
            content: " ";
        }


        input[type=text],
        input[type=password] {
            border: none;
            color: #000;
        }

        /*2019-04-18*/
        .black_overlay{
            display: none;
            position: absolute;
            top: 0%;
            left: 0%;
            width: 100%;
            height: 100%;
            z-index:1001;
            -moz-opacity: 0.8;
            opacity:.80;
            filter: alpha(opacity=80);
        }

        #lay_pop_join {
            z-index:500;
            width:97%;
            height:135px;
            overflow-y:scroll;
            display:none;
            background-color:#ffffff;
            margin-left: 7px;
        }


        #lay_pop {
            position:absolute;
            z-index:500;
            width:310px;
            height:500px;
            overflow-y:scroll;
            display:none;
            background-color:#ffffff;
            border:2px solid #cccccc
        }

        .bgLayer {
            display:none;
            position:absolute;
            top:0;
            left:0;
            width:100%;
            height:100%;
            background:#000;
            opacity:.5;
            filter:alpha(opacity=50); z-index:10;
        }
        /*2019-04-18*/
    </style>

<?if($_SESSION[p_token_val]){?>
	<script>location.replace('/contents/paykhan/paykhan.php');</script>
<?}else{?>
	<!-- <script>alert('로그인 후 이용해주세요.');location.replace('/contents/member/login.php');</script> -->
<?}?>

<script language="JavaScript">
<!--
	function join_sub() {
		var frm=document.join_frm;
		if(!frm.PU_userid.value){alert('아이디를 입력하세요.');$('#PU_userid').focus();return;}
		if(frm.PU_userid.value.length<4) {alert('4자리 이상의 아이디를 입력하세요.');$('#PU_userid').focus();return;}

		if(frm.id_success.value!='Y' || frm.PU_userid.value!=frm.temp_id.value){alert('아이디 중복확인을 해주세요.');$('#PU_userid').focus();return;}

		if(!frm.PU_passwd.value){alert('비밀번호를 입력하세요.');$('#PU_passwd').focus();return;}
		if(!chkPwd( $.trim(frm.PU_passwd.value))){ $('#PU_passwd').val(''); $('#PU_passwd').focus(); return; }
		if(frm.PU_passwd.value.length<8) {alert('8자리 이상, 20자 이내의 비밀번호를 입력하세요.');$('#PU_passwd').focus();return;}

		if(!frm.PU_passwd_ck.value){alert('비밀번호 확인란을 입력하세요.');$('#PU_passwd_ck').focus();return;}
		if($('#PU_passwd').val()!=$('#PU_passwd_ck').val()){alert('비밀번호가 일치하지 않습니다. 비밀번호 확인란을 다시 입력해주세요.');$('#PU_passwd_ck').focus();return;}

		if(!frm.PU_name.value){alert('이름을 입력하세요.');$('#PU_name').focus();return;}
		if(frm.PU_name.value.length<2) {alert('2자리 이상의 이름을 입력하세요.');$('#PU_name').focus();return;}

		if(!$('#PU_phone').val()){alert('휴대폰 번호를 입력해주세요.');$('#PU_phone').focus();return;}
		if($('#apply_num_ok').val()!='Y'){alert('휴대폰 번호를 인증해주세요.');$('#sms_apply').focus();return;}
		if(!regPhone.test($('#PU_phone').val()) && $('#PU_country').val()=='82'){alert('휴대폰 번호가 유효하지 않습니다');$('#PU_phone').focus();return;}

		if(frm.apply_1.checked!=true){alert('서비스 이용약관에 동의해주세요.');$('#apply_1').focus();return false;}
		if(frm.apply_2.checked!=true){alert('개인정보취급방침에 동의해주세요.');$('#apply_2').focus();return false;}

//		if(!frm.email1.value){alert('이메일 주소를 입력하세요.');$('#email1').focus();return;}
//		if(!frm.email2.value){alert('이메일 주소를 입력하세요.');$('#email2').focus();return;}
//		if(!regEmail.test(frm.email1.value+"@"+frm.email2.value)){alert('이메일 주소가 유효하지 않습니다');$('#email1').focus();return;}
//		$('#email').val(frm.email1.value+"@"+frm.email2.value);

		frm.submit();
	}
	function recom_view(){// 제휴사 인증 슬라이드 다운
		if( $("#recom_1").is(":checked")==true){
			$('input:checkbox[id="recom_1"]').prop("checked", true);
			$('input:checkbox[id="recom_1"]').prev().removeClass("ui-checkbox-off");
			$('input:checkbox[id="recom_1"]').prev().addClass("ui-checkbox-on");
			$('#recom_contents').slideDown();
		}else{
			$('input:checkbox[id="recom_1"]').prop("checked", false);
			$('input:checkbox[id="recom_1"]').prev().removeClass("ui-checkbox-on");
			$('input:checkbox[id="recom_1"]').prev().addClass("ui-checkbox-off");
			$('#recom_contents').hide();
		}
	}
	function recom_apply_q(){// 제휴사 계정 인증요청
		var frm=document.join_frm;
		if(!frm.partner_userid.value){alert("제휴사 아이디를 입력하세요.");frm.partner_userid.focus();return;}
		if(!frm.partner_name.value){alert("제휴사 이름을 입력하세요.");frm.partner_name.focus();return;}
		$.ajax({
			type: 'POST',
			url: '../../app/ajax_check.php?checkName=partner_chk',
			data:{
				'partner_userid': encodeURIComponent($('#partner_userid').val()),
				'partner_name': $('#partner_name').val()
			},
			cache: false,
			async: false,
			error : function(request,status,error){
				alert("code : "+request.status+"\r\nmessage : " + request.responseText);
			},
			success: function(result) {
				result = result.replace(/(^\s*)|(\s*$)/g, "");
				var re=result.split("///");
				//alert(result)
				$('#user_id_error').hide();
				$('#user_id_ok').hide();
				if(re[0]=="10"){
					alert("숫자만 사용할수 있습니다.");
				}else if(re[0]=="20"){// 없음
					$('#partner_id_error').fadeIn();
				}else if(re[0]=="Y"){// 사용가능
					if(re[2]=='' || !re[2]){
						alert('제휴사 회원 휴대폰번호가 없습니다.');
					}else{
						$('#partner_id_error').hide();
						recom_apply_go(re[2],re[1]);
					}
				}else{
					alert("Error");
				}
			}
		 });
	}
	function recom_apply_go(partner_userid,PU_recom){// 제휴사 휴대폰 인증요청

		if(!$('#partner_userid').val()){alert('제휴사 아이디를 입력해주세요.');$('#partner_userid').focus();return;}		
		//if(!regPhone.test($('#partner_userid').val())){alert('휴대폰 번호가 유효하지 않습니다');$('#partner_userid').focus();return;}
		$('#recom_apply_num_ok').val("N");

		$.ajax({
			type: 'POST',
			url: "../../app/ajax_check.php",
			data: {
				'checkName' : 'phone_recom_apply',
				'partner_userid': partner_userid
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
				//alert(result)
				result = result.replace(/(^\s*)|(\s*$)/g, "");
				var re=result.split("///");
				if(re[0]=="ok"){
					//alert($('#apply_num_ck').val());
					alert('인증번호를 확인 후 입력해주세요.');
					$('#search_PU_recom').val(PU_recom);
					$('#recom_apply_num_ck').val(re[1]);
					$('.recom_apply_num').attr("readonly" , false); //설정
					$('.recom_apply_num').attr("disabled" , false); //설정
					$('#recom_apply_num').focus();
				}else if(re[0]=="no0"){
					alert('오류입니다(err:00)');
				}else if(re[0]=="no1"){
					alert('오류입니다(err:01)');
				}else{
					alert('오류입니다(err:02)');
				}
			}
		});
	}
	function recom_apply_k(){// 제휴사 휴대폰 인증확인
		if(!$('#partner_userid').val()){alert('제휴사 아이디를 입력해주세요.');$('#partner_userid').focus();return;}
		if(!$('#recom_apply_num').val()){alert('인증번호를 입력해주세요.');$('#recom_apply_num').focus();return;}
		if ($('#recom_apply_num').val()==$('#recom_apply_num_ck').val()) {// 인증번호 일치
			$('.recom_apply_contents').hide();
			$('#recom_apply_ok').show();
			$('#partner_userid').attr("readonly" , true); //설정
			$('#partner_name').attr("readonly" , true); //설정
			$('#recom_apply_num_ok').val('Y');
			$('#PU_recom').val($('#search_PU_recom').val());// 추천인ID 넣기
			$('#PU_userid').val('k'+$('#partner_userid').val());// 유저id넣기
			$('#PU_recom').attr("readonly" , true);// 추천인id 읽기전용
			$('#PU_userid').attr("readonly" , true);// 유저id 읽기전용
			$('#partne_id_ok').fadeIn();// 인증완료
		}else{// 인증실패
			alert('잘못된 인증번호입니다. 인증번호를 확인해주세요.');
			$('.recom_apply_contents').show();
			$('#recom_apply_ok').hide();
			$('#partner_userid').attr("readonly" , false); //설정
			$('#recom_apply_num_ok').val('N');
			$('#PU_recom').val('');
		}
	}
	function id_ck(){// 아이디 검색
		var frm=document.join_frm;
		if(!frm.PU_userid.value){alert("아이디를 입력하세요.");frm.PU_userid.focus();return;}
		if($('#PU_userid').val().length<4 || $('#PU_userid').val().length>20){alert("4~20자로 등록 가능합니다.");frm.PU_userid.focus();return;}

		if($('#recom_apply_num_ok').val()=='Y'){// 제휴사 인증회원일경우
		}else{// 그냥 회원일경우
			var string_val = frm.PU_userid.value;
			var string_1 = string_val.substring(0,1);
			if(string_1=='k'){
				alert("일반회원은 아이디가 k로 시작할수없습니다.");frm.PU_userid.focus();return;
			}else{}
		}

		$.ajax({
			type: 'POST',
			url: '../../app/ajax_check.php?checkName=id_chk',
			data:{
				'user_id': encodeURIComponent($('#PU_userid').val())
			},
			cache: false,
			async: false,
			error : function(request,status,error){
				alert("code : "+request.status+"\r\nmessage : " + request.responseText);
			},
			success: function(result) {
				result = result.replace(/(^\s*)|(\s*$)/g, "");
				$('#user_id_error').hide();
				$('#user_id_ok').hide();
				if(result=="10"){
					alert("영문,숫자,_ 만 사용할수 있습니다.");
				}else if(result=="20"){
					//alert("이미 존재하는 아이디입니다.");
					$('#user_id_ok').hide();
					$('#user_id_error').fadeIn();
					$('#user_id_error_ck').hide();
				}else if(result=="Y"){
					//alert("사용가능한 아이디입니다.");
					$('#user_id_ok').fadeIn();
					$('#user_id_error').hide();
					$('#user_id_error_ck').hide();
				}else{
					alert("Error");
				}

				$('#id_success').val(result);
				$('#temp_id').val(encodeURIComponent($('#PU_userid').val()));
			}
		 });
	}
	function agree_ok(){// 레이어 인증 팝업 동의 버튼
			$('input:checkbox[id="checkAll"]').prop("checked", true);
			$('input:checkbox[id="apply_1"]').prop("checked", true);
			$('input:checkbox[id="apply_2"]').prop("checked", true);
			$('input:checkbox[id="checkAll"]').prev().removeClass("ui-checkbox-off");
			$('input:checkbox[id="checkAll"]').prev().addClass("ui-checkbox-on");	
			$('input:checkbox[id="apply_1"]').prev().removeClass("ui-checkbox-off");
			$('input:checkbox[id="apply_1"]').prev().addClass("ui-checkbox-on");	
			$('input:checkbox[id="apply_2"]').prev().removeClass("ui-checkbox-off");
			$('input:checkbox[id="apply_2"]').prev().addClass("ui-checkbox-on");	
			layerClose('lay_pop','all_body');
	}
	function apply_all(){// 전체 동의 버튼
		if( $("#apply_1").is(":checked")==true && $("#apply_2").is(":checked")==true){
			$('input:checkbox[id="apply_1"]').prop("checked", false);
			$('input:checkbox[id="apply_2"]').prop("checked", false);
			$('input:checkbox[id="apply_1"]').prev().removeClass("ui-checkbox-on");
			$('input:checkbox[id="apply_1"]').prev().addClass("ui-checkbox-off");	
			$('input:checkbox[id="apply_2"]').prev().removeClass("ui-checkbox-on");
			$('input:checkbox[id="apply_2"]').prev().addClass("ui-checkbox-off");
		}else{
			$('input:checkbox[id="apply_1"]').prop("checked", true);
			$('input:checkbox[id="apply_2"]').prop("checked", true);
			$('input:checkbox[id="apply_1"]').prev().removeClass("ui-checkbox-off");
			$('input:checkbox[id="apply_1"]').prev().addClass("ui-checkbox-on");	
			$('input:checkbox[id="apply_2"]').prev().removeClass("ui-checkbox-off");
			$('input:checkbox[id="apply_2"]').prev().addClass("ui-checkbox-on");	
		}
	}
	function sms_apply_go() {// 휴대폰 인증요청

		if(!$('#PU_phone').val()){alert('휴대폰 번호를 입력해주세요.');$('#PU_phone').focus();return;}		
		if(!regPhone.test($('#PU_phone').val()) && $('#PU_country').val()=='82'){alert('휴대폰 번호가 유효하지 않습니다');$('#PU_phone').focus();return;}
		$('#apply_num_ok').val("N");

		$.ajax({
			type: 'POST',
			url: "../../app/ajax_check.php",
			data: {
				'checkName' : 'phone_apply',
				'PU_phone': $('#PU_phone').val(),
				'PU_country': $('#PU_country').val()
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
				//alert(result)
				result = result.replace(/(^\s*)|(\s*$)/g, "");
				var re=result.split("///");
				if(re[0]=="ok"){
					//alert($('#apply_num_ck').val());
					alert('휴대폰에 전송된 인증번호를 확인 후 입력해주세요.');
					$('#apply_num_ck').val(re[1]);
					$('.apply_num').attr("readonly" , false); //설정
					$('.apply_num').attr("disabled" , false); //설정
					$('#apply_num').focus();
				}else if(re[0]=="no0"){
					alert('오류입니다(err:00)');
				}else if(re[0]=="no1"){
					alert('오류입니다(err:01)');
				}else{
					alert('오류입니다(err:02)');
				}
			}
		});
	}
	function sms_apply_ck(){// 휴대폰 인증확인
		if(!$('#PU_phone').val()){alert('휴대폰 번호를 입력해주세요.');$('#PU_phone').focus();return;}
		if(!$('#apply_num').val()){alert('인증번호를 입력해주세요.');$('#apply_num').focus();return;}
		if ($('#apply_num').val()==$('#apply_num_ck').val()) {// 인증번호 일치
			$('.apply_contents').hide();
			$('#apply_ok').show();
			$('#PU_phone').attr("readonly" , true); //설정
			$('#apply_num_ok').val('Y');
		}else{// 인증실패
			alert('잘못된 인증번호입니다. 인증번호를 확인해주세요.');
			$('.apply_contents').show();
			$('#apply_ok').hide();
			$('#PU_phone').attr("readonly" , false); //설정
			$('#apply_num_ok').val('N');
		}
	}
	function recom_apply_default(){// 추천인 인증 및 확인
		$('#recome_id_error').hide();
		$('#recome_id_ok').hide();
		var frm=document.join_frm;
		if(!frm.PU_recom.value){alert("추천인 아이디를 입력하세요.");frm.PU_recom.focus();return;}
		if($('#recom_apply_num_ok').val()=='Y'){// 제휴사 계정 연동 회원
			$.ajax({
				type: 'POST',
				url: '../../app/ajax_check.php?checkName=partner_default_chk',
				data:{
					'PU_recom': encodeURIComponent($('#PU_recom').val()),
					'PU_recom_ck': 'K2K9'
				},
				cache: false,
				async: false,
				error : function(request,status,error){
					alert("code : "+request.status+"\r\nmessage : " + request.responseText);
				},
				success: function(result) {
					result = result.replace(/(^\s*)|(\s*$)/g, "");
					var re=result.split("///");
					//alert(result)
					$('#user_id_error').hide();
					$('#user_id_ok').hide();
					if(re[0]=="10"){
						alert("영문,숫자만 사용할수 있습니다.");
					}else if(re[0]=="20"){// 없음
						$('#recome_id_error').fadeIn();
						$('#recome_id_ok').hide();
					}else if(re[0]=="Y"){// 사용가능
						$('#recome_id_error').hide();
						$('#recome_id_ok').fadeIn();
						$('#PU_userid').val('k'+$('#partner_userid').val());
					}else{
						alert("Error");
					}
				}
			 });
		}else{// 제휴사 계정 미연동 회원
			$.ajax({
				type: 'POST',
				url: '../../app/ajax_check.php?checkName=partner_default_chk',
				data:{
					'PU_recom': encodeURIComponent($('#PU_recom').val()),
					'PU_recom_ck': 'paykhan'
				},
				cache: false,
				async: false,
				error : function(request,status,error){
					alert("code : "+request.status+"\r\nmessage : " + request.responseText);
				},
				success: function(result) {
					result = result.replace(/(^\s*)|(\s*$)/g, "");
					var re=result.split("///");
					//alert(result)
					$('#user_id_error').hide();
					$('#user_id_ok').hide();
					if(re[0]=="10"){
						alert("영문,숫자만 사용할수 있습니다.");
					}else if(re[0]=="20"){// 없음
						$('#recome_id_error').fadeIn();
						$('#recome_id_ok').hide();
					}else if(re[0]=="Y"){// 사용가능
						$('#recome_id_error').hide();
						$('#recome_id_ok').fadeIn();
						$('#PU_userid').val($('#partner_userid').val());
					}else{
						alert("Error");
					}
				}
			 });
		}
	}
	$(document).ready(function(){
		// 아이디 중복검사 후 번호 바꿀시 재인증
		$('#PU_userid').keyup(function(event){
			if($('#id_success').val()=='Y'){
				if ($('#PU_userid').val()!=$('#temp_id').val()) {
					//alert('번호가 바뀌면 다시 인증받으셔야 됩니다.');
					$('#user_id_ok').hide();
					$('#user_id_error').hide();
					$('#user_id_error_ck').fadeIn();
				} else { 
					$('#user_id_ok').fadeIn();
					$('#user_id_error').hide();
					$('#user_id_error_ck').hide();
				}
			}else{}
		});
	});
//-->
</script>

<script>
    function pushLayer(){
        var $width=parseInt($("#lay_pop").css("width"));
        var $height=parseInt($("#lay_pop").css("height"));
        var left=($(window).width()-$width)/2;
        var sctop=$(window).scrollTop()*2;
        var top=($(window).height()-$height+sctop)/2;
        var height=document.getElementsByTagName("body")[0].scrollHeight;
        $("#lay_pop").css("left",left);
        $("#lay_pop").css("top",top);
        $("#lay_pop").css("display","block");

        if(!$('.bgLayer').length) {
            $('<div class="bgLayer"></div>').appendTo($('body'));
        }
        var object = $(".bgLayer");
        var w = $(document).width()+12;
        var h = $(document).height();

        object.css({'width':w,'height':h});
        object.fadeIn(500);   //생성되는 시간 설정
    }
    function layerClose(lay1){
        $("#"+lay1).css("display","none");
        var object = $('.bgLayer');

        if(object.length) {
            object.fadeOut(500, function() {
                object.remove();
            });
        }
    }

    function pushLayerJoin(){
        var lay_pop_join_display = $( "#lay_pop_join" ).css( "display" );

        if(lay_pop_join_display === 'none'){

            var $width=parseInt($("#lay_pop_join").css("width"));
            var left=($(window).width()-$width)/2;
            $("#lay_pop_join").css("left",left);
            $("#lay_pop_join").css("top",top);
            $("#lay_pop_join").css("display","block");
        }else{
            $("#lay_pop_join").css("display","none");
        }
    }
</script>

<body>

<div data-role="page" style="background: white;">
    <div data-role="header" style="border-style: none;">
        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left" style="margin-top: 8px;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 7px; font-size: 12pt;">회원가입</p>
        </div>
    </div>	

	<!-- form-horizontal -->
	<form name="join_frm" action="member_join_ok" method="post" enctype="multipart/form-data" onSubmit="return join_sub(this);" target="db_frame">
	<input type='hidden' value='insert' name='Query' id='Query'/>
	<input type='hidden' value='' name='id_success' id='id_success'/>
	<input type='hidden' value='' name='temp_id' id='temp_id'/>
	<input type="hidden" name="partner_phone" id="partner_phone" value="">
	<input type="hidden" name="apply_num_ck" id="apply_num_ck" value="111111111">
	<input type="hidden" name="apply_num_ok" id="apply_num_ok" value="N">
	<input type="hidden" name="recom_apply_num_ck" id="recom_apply_num_ck" value="111111111">
	<input type="hidden" name="recom_apply_num_ok" id="recom_apply_num_ok" value="N">
	<input type="hidden" name="search_PU_recom" id="search_PU_recom" value="">

    <div role="main" class="ui-content" style="padding-top: 5px; margin-bottom: 70px;padding-left: 0;padding-right: 0;">

        <div class="container-fluid" style="padding-left: 0;padding-right: 0; height: 90px;">
		
            <div class="row" style="margin: unset;">

							<!-- 약관 팝업 -->
							<div id="lay_pop">
								<div class="col-xs-10" style="border-bottom: solid #dedede; border-width: 1px;height: 33px; padding-top: 5px; padding-left: 125px; font-size:8pt ;font-weight: bold; overflow-y: hidden;-ms-overflow-style: none;">
									이용약관
								</div>
								<div class="col-xs-2" style="border-bottom: solid #dedede; border-width: 1px;height: 33px;">
								<button type="button" class="close" aria-label="Close" style="width:15px;font-size: 15px; "  onclick="layerClose('lay_pop','all_body')">
									<span aria-hidden="true">&times;</span>
								</button>
								</div>

								<div class="col-xs-12" style="font-size:9pt; font-weight:bold; margin-top: 10px;">
									서비스 이용약관
								</div>
								<div class="col-xs-12" style="overflow-y:scroll; font-size:9px; margin-left: 2.5%; height: 150px; width:95%; background-color: #dedede ; margin-top: 10px;">
									<br><? include "member_join_agree1.php";?><br>
								</div>
								<div class="col-xs-12" style="font-size:9pt; font-weight:bold; margin-top: 10px;">
									개인정보취급방침
								</div>
								<div class="col-xs-12" style="overflow-y:scroll; font-size:9px; margin-left: 2.5%; height: 150px; width:95%; background-color: #dedede ; margin-top: 10px;">
									<br><? include "member_join_agree2.php";?><br>
								</div>
								<div class="col-xs-6" style="padding-right: 0; padding-left: 2.5%; padding-top: 10px;">
									<button type="button" class="btn btn-primary btn-block btn-info"
											style="color: white;background: #07c1f2;border:solid #07c1f2;border-width: 1px; height: 30px; padding-top: 3px;"
											onclick="agree_ok();">동의
									</button>
								</div>

								<div class="col-xs-6" style="padding-left: 15px; padding-right: 2.5%; padding-top: 10px;">
									<button type="button" class="btn btn-primary btn-block btn-info"
											style="color: #8E9CB2;background: #ffffff;border:solid #8E9CB2;border-width: 1px; height: 30px; padding-top: 3px;"  onclick="layerClose('lay_pop','all_body')">
										취소
									</button>
								</div>
							</div>
							<!-- 약관 팝업 -->

							<!-- 제휴사 슬라이드박스 -->
							<div class="container" style="padding-left: 0;margin-bottom: -30px;">
								<div class="col-xs-12">
									<label style="background: white;border: none;font-size: 10pt;">
										<input type="checkbox" id="recom_1" style="color: white;" onclick="recom_view()">
										제휴사 회원이면 체크해 주세요.
									</label>
								</div>
							</div>
							<div style="clear:both;"></div>

							<div id="recom_contents" style="border:0px solid gray;display:none;">

								<div class="col-xs-8" style="padding-right: 0;">
									<input id="partner_userid" name="partner_userid" type="number" class="form-control not-kor" style="height: 20px;font-size: 10pt;" placeholder="제휴사 아이디" maxlength="11">
									<input id="partner_name" name="partner_name" type="text" class="form-control" style="height: 20px;font-size: 10pt;"
											 placeholder="이름" maxlength="20">
								</div>

								<div class="col-xs-4" style="padding-top: 5px;">
									<button type="button" id="recom_apply" name="recom_apply" class="btn btn-primary btn-md recom_apply_contents"
											style="color: #07c1f2;background: white;border:solid #07c1f2;border-width: 1px;font-size: 10pt; height: 60px;" onclick="recom_apply_q()">
										인증요청
									</button>
									<button id="recom_apply_ok" name="recom_apply_ok" type="button" class="btn btn-primary btn-md"
											style="color: #07c1f2;background: white;border:solid #07c1f2;border-width: 1px;font-size: 10pt; height: 60px;cursor:default;display:none;">
										인증완료
									</button>
								</div>

								<div class="col-xs-8" style="">
									<span class="help-block red" id='partner_id_error' style='display:none;color:red;font-size:12px;'>없는회원입니다.</span>
								</div>

								<div class="col-xs-8 recom_apply_contents" style="padding-right: 0;">
									<input id="recom_apply_num" name="recom_apply_num" type="text" class="form-control only_number" style="height: 20px;font-size: 10pt; " placeholder="인증번호" maxlength="5">
								</div>

								<div class="col-xs-4 recom_apply_contents" style="padding-top: 5px;">
									<button id="recom_apply_ck" name="recom_apply_ck" type="button" class="btn btn-primary btn-md"
													style="color: #07c1f2;background: white;border:solid #07c1f2;border-width: 1px;font-size: 10pt; height: 30px;" onclick="recom_apply_k()">
											인증확인
									</button>
								</div>

								<div class="col-xs-8" style="">
									<span class="help-block blue" id='partne_id_ok' style='display:none;color:blue;font-size:12px;'>인증완료</span>
								</div>

							</div>
							<!-- 제휴사 슬라이드박스 -->

                <div class="col-xs-8" style=" padding-right: 0; ">
                    <input type="text" class="form-control not-kor"
                           style="font-size: 10pt;height: 20px;" name="PU_userid" id="PU_userid" placeholder="아이디" maxlength="20">
                </div>
                <div class="col-xs-4" style="">
                    <button type="button" class="btn btn-primary btn-md"
                            style="color: #07c1f2;background: white;border: solid #07c1f2;border-width: 1px;height: 30px; margin-top:10px; font-size: 10pt;" onclick="id_ck();">
                        중복확인
                    </button>
                </div>

                <div class="col-xs-8" style="">
									<span class="help-block red" id='user_id_error_ck' style='display:none;color:red;font-size:12px;'>중복확인을 해주세요.</span>
									<span class="help-block red" id='user_id_error' style='display:none;color:red;font-size:12px;'>이미 사용중인 아이디 입니다.</span>
									<span class="help-block blue" id='user_id_ok' style='display:none;color:blue;font-size:12px;'>사용 가능한 아이디 입니다.</span>
                </div>

                <div class="col-xs-12">
                    <input name="PU_passwd" id="PU_passwd" type="password" class="form-control"
                           style="font-size: 10pt;height: 20px;" placeholder="비밀번호" maxlength="20">
                </div>
                <div class="col-xs-12">
                    <input name="PU_passwd_ck" id="PU_passwd_ck" type="password" class="form-control"
                           style="font-size: 10pt;height: 20px;" placeholder="비밀번호확인" maxlength="20">
                </div>
                <div class="col-xs-12">
                    <input name="PU_name" id="PU_name" type="text" class="form-control"
                           style="font-size: 10pt;height: 20px;" placeholder="회원명" maxlength="20">
                </div>

                <div class="col-xs-12" style="padding-right: 0;padding-left: 0;">
                    <div class="col-xs-3 sl" style="padding-top: 3px;">
                        <select name="PU_country" id="PU_country">
                            <!-- <option>국가</option> -->
<?
$result=query("select * from Pka_Country order by PAD_sortnum desc, PAD_idx asc");
for($i=0;$i<$rows=fetch_array($result) ;$i++ ){
?>
                            <option value="<?=$rows['PAD_countrycode']?>"><?=$rows['PAD_country']?>(<?=$rows['PAD_countrycode']?>)</option>
<?}?>
                        </select>
                    </div>

                    <div class="col-xs-5" style=" padding-right: 0; padding-left: 13px;">
                        <input name="PU_phone" id="PU_phone" type="text" class="form-control only_number"
                               style="height: 20px;font-size: 10pt; "
                               placeholder="휴대폰 번호" maxlength="15">
                    </div>

                    <div class="col-xs-4" style="padding-top: 2px;">
                        <button id="sms_apply" name="sms_apply" type="button" class="btn btn-primary btn-md apply_contents" style="color: #07c1f2;background: white;border:solid #07c1f2;border-width: 1px;font-size: 10pt; height: 30px;" onclick="sms_apply_go()">
                            인증요청
                        </button>
											<button id="apply_ok" name="apply_ok" type="button" class="btn btn-primary btn-md"
													style="color: #07c1f2;background: white;border:solid #07c1f2;border-width: 1px;font-size: 10pt; height: 30px;cursor:default;display:none;">
												인증완료
											</button>
                    </div>
                </div>

                <div class="col-xs-8 apply_contents" style="padding-right: 0;">
                    <input id="apply_num" name="apply_num" type="text" class="form-control only_number" style="height: 20px;font-size: 10pt; " placeholder="인증번호" maxlength="5">
                </div>

                <div class="col-xs-4 apply_contents" style="padding-top: 5px;">
                    <button id="apply_ck" name="apply_ck" type="button" class="btn btn-primary btn-md"
                            style="color: #07c1f2;background: white;border:solid #07c1f2;border-width: 1px;font-size: 10pt; height: 30px;" onclick="sms_apply_ck()">
                        인증확인
                    </button>
                </div>
								
							<div class="col-xs-8" style=" padding-right: 0; ">
									<input type="text" class="form-control not-kor" style="font-size: 10pt;height: 20px;" id="PU_recom" name="PU_recom" placeholder="추천인ID" maxlength="20" value="<?=$ref?>">
							</div>

							<div class="col-xs-4" style="">
									<button type="button" class="btn btn-primary btn-md" style="color: #07c1f2;background: white;border: solid #07c1f2;border-width: 1px;height: 30px; margin-top:10px; font-size: 10pt;" onclick="recom_apply_default();">
											확인
									</button>
							</div>

							<div class="col-xs-8" style="">
								<span class="help-block red" id='recome_id_error' style='display:none;color:red;font-size:12px;'>없는회원입니다.</span>
								<span class="help-block blue" id='recome_id_ok' style='display:none;color:blue;font-size:12px;'>확인완료</span>
							</div>
            </div>


            <div class="container" style="padding-left: 0;margin-bottom: 0; ">
                <div class="col-xs-6" style="padding-left: 10px; height: 45px;">
                    <label style="background: white;border: none; font-size: 9pt;">
                        <input type="checkbox" style="color: white;" onclick="apply_all();" class="check" id="checkAll">
                        전체동의
                    </label>
                </div>

                <div class="col-xs-6" style="height: 45px; padding-left: 15px;  padding-right: 0; ">
                    <button type="button" class="btn btn-primary btn-block btn-info"
                            style="color: white;background: #07c1f2;border:solid #07c1f2;border-width: 1px;font-size: 10pt; height: 30px;  padding-top: 3px;" onclick="pushLayer();">
                        약관보기
                    </button>
                </div>

                <div class="col-xs-6" style="padding-left: 10px; height: 45px;">
                    <label style="background: white;border: none; font-size: 9pt;">
                        <input type="checkbox" class="check" name="apply_1" id="apply_1" value="Y">
                        서비스 이용약관
                    </label>
                </div>

                <div class="col-xs-6" style="padding-left: 0; padding-right: 0; height: 45px;">
                    <label style="background: white;border: none; font-size: 9pt;">
                        <input type="checkbox" class="check" name="apply_2" id="apply_2" value="Y">
                        개인정보취급방침
                    </label>
                </div>

                <div class="col-xs-6" style="padding-right: 0;">
                    <button type="button" class="btn btn-primary btn-block btn-info"
                            style="color: white;background: #07c1f2;border:solid #07c1f2;border-width: 1px; height: 30px; padding-top: 3px;"
                            onclick="join_sub();">회원가입
                    </button>
                </div>

                <div class="col-xs-6" style="padding-left: 15px; padding-right: 0;">
                    <button type="button" class="btn btn-primary btn-block btn-info"
                            style="color: #8E9CB2;background: #ffffff;border:solid #8E9CB2;border-width: 1px; height: 30px; padding-top: 3px;" onclick="location.href='/'">
                        취소
                    </button>
                </div>
            </div>
        </div>
    </div>
	</form>

	<?include "../../contents/common/footer.php";?>

</div>
</body>
</html>

