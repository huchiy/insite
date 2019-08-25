<?$menu="3";?>
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

</style>

<script language="JavaScript">
<!--
	function modify_sub() {
		var frm=document.join_frm;

		if(frm.PU_passwd_old.value && frm.PU_passwd.value && frm.PU_passwd_ck.value){
			if(frm.PU_passwd_old.value.length<8) {alert('입력하신 현재 비밀번호가 틀립니다. 다시 확인해주세요.');$('#PU_passwd_old').focus();return;}

			if(!frm.PU_passwd.value){alert('변경하실 비밀번호를 입력하세요.');$('#PU_passwd').focus();return;}
			if(!chkPwd( $.trim(frm.PU_passwd.value))){ $('#PU_passwd').val(''); $('#PU_passwd').focus(); return; }
			if(frm.PU_passwd.value.length<8) {alert('8자리 이상, 20자 이내의 비밀번호를 입력하세요.');$('#PU_passwd').focus();return;}

			if(!frm.PU_passwd_ck.value){alert('비밀번호 확인란을 입력하세요.');$('#PU_passwd_ck').focus();return;}
			if($('#PU_passwd').val()!=$('#PU_passwd_ck').val()){alert('비밀번호가 일치하지 않습니다. 비밀번호 확인란을 다시 입력해주세요.');$('#PU_passwd_ck').focus();return;}
		}
		
		if($('#apply_num_ok').val()=='Y'){// 인증완료한 경우
			if(!$('#PU_phone').val()){alert('휴대폰 번호를 입력해주세요.');$('#PU_phone').focus();return;}
			if($('#apply_num_ok').val()!='Y'){alert('휴대폰 번호를 인증해주세요.');$('#sms_apply').focus();return;}
			if(!regPhone.test($('#PU_phone').val()) && $('#PU_country').val()=='82'){alert('휴대폰 번호가 유효하지 않습니다');$('#PU_phone').focus();return;}
		}

		if(!frm.PU_name.value){alert('이름을 입력하세요.');$('#PU_name').focus();return;}
		if(frm.PU_name.value.length<2) {alert('2자리 이상의 이름을 입력하세요.');$('#PU_name').focus();return;}

		frm.submit();
	}
	function sms_apply_go() {// 휴대폰 인증요청

		if(!$('#PU_phone').val()){alert('휴대폰 번호를 입력해주세요.');$('#PU_phone').focus();return;}		
		if(!regPhone.test($('#PU_phone').val()) && $('#PU_country').val()=='82'){alert('휴대폰 번호가 유효하지 않습니다');$('#PU_phone').focus();return;}
		$('#apply_num_ok').val("N");

		$.ajax({
			type: 'POST',
			url: "../inc/ajax_check.php",
			data: {
				'checkName' : 'phone_apply_mypage',
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
-->
</script>

<?
if($_SESSION[p_token_val]){
	$rows = f_array("select * from Pka_User where token_val = '$_SESSION[p_token_val]' order by PU_joindate desc");
}else{
}?>

<body>

<div data-role="page" style="background: white;">
    <div data-role="header" style="border-style: none;">

        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left" style="margin-top: 9px;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 7px; font-size: 12pt;">개인정보수정</p>
        </div>

    </div>
	
	<!-- form-horizontal -->
	<form name="join_frm" action="privacy_modify_ok.php" method="post" enctype="multipart/form-data" onSubmit="return modify_sub(this);" target="db_frame">
	<input type='hidden' value='update' name='Query' id='Query'/>
	<input type='hidden' value='' name='id_success' id='id_success'/>
	<input type='hidden' value='' name='temp_id' id='temp_id'/>
	<input type="hidden" name="apply_num_ck" id="apply_num_ck" value="111111111">
	<input type="hidden" name="apply_num_ok" id="apply_num_ok" value="N">
	<input type="hidden" name="PU_phone_old" id="PU_phone_old" value="<?=$rows[PU_phone]?>">

    <div role="main" class="ui-content" style="padding-top: 0;">

        <div class="container-fluid" style="padding-bottom: 80px; padding-right: 0; padding-left: 0;">

            <div class="col-xs-12 mt15" style="font-size: 10pt; height: 20px; font-weight: bold;">
                아이디
            </div>
            <div class="col-xs-12 h30" style="font-size: 10pt; height: 20px; font-weight: bold;">
                <?=$rows[PU_userid]?>
            </div>

            <div class="col-xs-12 mt5"
                 style="font-size: 10pt; height: 20px; border-top: solid #dedede; border-width: 1px; padding-top: 5px; font-weight: bold;">
                비밀번호 변경 <span style="font-weight:normal;font-size:9px;">(변경하실 경우만 입력해주세요.)</span>
            </div>
            <div class="col-xs-12 h30">
                <input name="PU_passwd_old" id="PU_passwd_old" type="password" class="form-control" name="password" placeholder="현재 비밀번호"
                       style="font-size: 10pt;" maxlength="20">
            </div>
            <div class="col-xs-12 h30 mt10">
                <input name="PU_passwd" id="PU_passwd" type="password" class="form-control" name="password" placeholder="새 비밀번호"
                       style="font-size: 10pt;" maxlength="20">
            </div>
            <div class="col-xs-12 h30 mt10">
                <input name="PU_passwd_ck" id="PU_passwd_ck" type="password" class="form-control" name="password" placeholder="새 비밀번호 확인"
                       style="font-size: 10pt;" maxlength="20">
            </div>

            <div class="col-xs-12 h30"
                 style="margin-top: 20px; font-size: 10pt; border-top: solid #dedede; border-width: 1px; padding-top: 5px; font-weight: bold;">
                핸드폰번호 변경 <span style="font-weight:normal;font-size:9px;">(변경하실 경우만 변경 후 인증해주세요.)</span>
            </div>
            <div class="col-xs-4 sl" style="padding-right: 14px;">
				<select name="PU_country" id="PU_country" style="font-size: 10pt;">
					<!-- <option>국가</option> -->
	<?
	$result_country=query("select * from Pka_Country order by PAD_sortnum desc, PAD_idx asc");
	for($i=0;$i<$rows_country=fetch_array($result_country) ;$i++ ){
	?>
					<option value="<?=$rows_country['PAD_countrycode']?>"><?=$rows_country['PAD_country']?>(<?=$rows_country['PAD_countrycode']?>)</option>
	<?}?>
				</select>
            </div>
            <div class="col-xs-4" style="padding-left: 0; padding-right: 0;">
                <input id="PU_phone" name="PU_phone" type="tel" class="form-control" placeholder="" value="<?=$rows[PU_phone]?>"
                       style="font-size: 10pt; padding-top: 0; padding-bottom: 0; height: 30px;" maxlength="15">
            </div>

            <div class="col-xs-4" style="padding-left: 14px;">
                <button id="sms_apply" name="sms_apply" type="button" class="btn btn-md apply_contents"
                        style="color: #07c1f2;background: #FFFFFF;  height: 30px; padding-top: 3px; margin-top: 9px; font-size: 8pt; font-weight: normal; border: solid #07c1f2; border-width: 1px;" onclick="sms_apply_go()">인증요청
                </button>
				<button id="apply_ok" name="apply_ok" type="button" class="btn btn-md"
                        style="color: #07c1f2;background: #FFFFFF;  height: 30px; padding-top: 3px; margin-top: 9px; font-size: 8pt; font-weight: normal; border: solid #07c1f2; border-width: 1px;display:none;">
					인증완료
				</button>
            </div>


            <div class="col-xs-8 apply_contents" style="padding-right: 0;">
                <input id="apply_num" name="apply_num" type="text" class="form-control" placeholder="인증번호"
                       style="height: 30px; font-size: 10pt;" maxlength="5">
            </div>

            <div class="col-xs-4 apply_contents">
                <button id="apply_ck" name="apply_ck" type="button" class="btn btn-md" style="font-size: 8pt; font-weight: normal; border: solid #07c1f2; border-width: 1px; color: #07c1f2; margin-top: 8px; background: #FFFFFF;" onclick="sms_apply_ck()">인증확인
                </button>
            </div>


            <div class="col-xs-12" style="font-size: 10pt; border-top: solid #dedede; border-width: 1px; padding-top: 5px; font-weight: bold;">
                회원명
            </div>
            <div class="col-xs-12 h30 h40">
                <input id="PU_name" name="PU_name" type="text" class="form-control" placeholder="홍길동"
                       style="font-size: 10pt;" value="<?=$rows[PU_name]?>">
            </div>

            <div class="col-xs-12" style="font-size: 10pt; border-top: solid #dedede; border-width: 1px; padding-top: 5px; margin-top: 10px; font-weight: bold;">
                추천링크
            </div>
            <div class="col-xs-12 h40">
                http://paykhan.org/contents/member/member_join?ref=<?=$rows[PU_userid]?>
            </div>

            <div class="col-xs-12" style="font-size: 10pt; border-top: solid #dedede; border-width: 1px; padding-top: 5px; margin-top: 10px; font-weight: bold;">
                ETH지갑주소
            </div>
            <div class="col-xs-12 h40">
                <input id="PU_ethwallet" name="PU_ethwallet" value="<?=$rows[PU_ethwallet]?>" type="text" class="form-control" placeholder="" style="font-size: 10pt;" maxlength="50">
            </div>

            <div class="col-xs-6 h30" style="font-size: 10pt; border-top: solid #dedede; border-width: 1px;  margin-top: 15px; padding-right: 7px;">
                <button type="button" class="btn btn-md" style="color: white;background: #07c1f2; font-size: 10pt;"  onclick="modify_sub()">저장
                </button>
            </div>

            <div class="col-xs-6 h30" style="font-size: 10pt; border-top: solid #dedede; border-width: 1px;  margin-top: 15px; padding-left: 7px;">
                <button type="button" class="btn btn-md" style="color: black;background: #fff; font-size: 10pt;"  onclick="location.href='/contents/mypage/privacy'">취소
                </button>
            </div>

        </div>

    </div>
	</form>

	<?include "../../contents/common/footer.php";?>

</div>
</body>


</html>

