<?$loginspot='Y';?>
<?include "../../contents/common/head.php";?>

<style>
	body {
		font-size: 12pt;
		background: #f5f5f5;
		font-family: '나눔고딕', sans-serif;
	}

	.mt20 {
		margin-top: 20px;
	}

	.mt15 {
		margin-top: 15px;
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

<?if($_SESSION[p_token_val]){?>
	<script>location.replace('/contents/paykhan/paykhan.php');</script>
<?}else{?>
	<!-- <script>alert('로그인 후 이용해주세요.');location.replace('/contents/member/login.php');</script> -->
<?}?>

<script language="JavaScript">
	function pwd_change() {
		var frm=document.join_frm;

		if(!frm.PU_passwd.value){alert('비밀번호를 입력하세요.');$('#PU_passwd').focus();return;}
		if(!chkPwd( $.trim(frm.PU_passwd.value))){ $('#PU_passwd').val(''); $('#PU_passwd').focus(); return; }
		if(frm.PU_passwd.value.length<8) {alert('8자리 이상, 20자 이내의 비밀번호를 입력하세요.');$('#PU_passwd').focus();return;}

		if(!frm.PU_passwd_ck.value){alert('비밀번호 확인란을 입력하세요.');$('#PU_passwd_ck').focus();return;}
		if($('#PU_passwd').val()!=$('#PU_passwd_ck').val()){alert('비밀번호가 일치하지 않습니다. 비밀번호 확인란을 다시 입력해주세요.');$('#PU_passwd_ck').focus();return;}

		$.ajax({
			type: 'POST',
			url: "../../app/ajax_check.php",
			data: {
				'checkName' : 'phone_apply_pwd_change',
				'PU_passwd': $('#PU_passwd').val(),
				'PU_phone': $('#PU_phone').val()
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
					alert('HanChain(HAN) & PayKhan(PKN) \n비밀번호 변경이 완료되었습니다.');
					location.href = '/contents/member/login.php';
				}else if(re[0]=="10"){
					alert('휴대폰 번호를 다시 입력해주세요.');
				}else if(re[0]=="20"){
					alert('없는 회원입니다.');
				}else{
					alert('오류입니다(err:02)');
				}
			}
		});
	}
function sms_apply_go() {// 휴대폰 인증요청

	if(!$('#PU_phone').val()){alert('휴대폰 번호를 입력해주세요.');$('#PU_phone').focus();return;}		
	if(!regPhone.test($('#PU_phone').val()) && $('#PU_country').val()=='82'){alert('휴대폰 번호가 유효하지 않습니다');$('#PU_phone').focus();return;}
	$('#apply_num_ok').val("N");

	$.ajax({
		type: 'POST',
		url: "../../app/ajax_check.php",
		data: {
			'checkName' : 'phone_apply_id_find',
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
				$('#apply_userid_ok').val(re[2]);
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
			
		$('#PU_userid_ok').text($('#apply_userid_ok').val());
		$('.apply_contents').hide();
		$('.apply_contents_ok').fadeIn();
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
</script>

<body>

<!-- form-horizontal -->
<form name="join_frm" action="member_join_ok.php" method="post" enctype="multipart/form-data" onSubmit="return join_sub(this);" target="db_frame">
<input type='hidden' value='update' name='Query' id='Query'/>
<input type="hidden" name="apply_num_ck" id="apply_num_ck" value="111111111">
<input type="hidden" name="apply_num_ok" id="apply_num_ok" value="N">
<input type="hidden" name="apply_userid_ok" id="apply_userid_ok" value="">

<div data-role="page" style="background: white;">
    <div data-role="header" style="border-style: none;">
        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left" style="margin-top: 10px;cursor:pointer;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 7px; font-size: 12pt;">비밀번호 찾기</p>
        </div>
    </div>
    <div role="main" class="ui-content" style="margin-bottom: 100px;padding-right: 0;padding-left: 0;">

        <div class="container-fluid" style="padding-left: 0;padding-right: 0;">
            <div style="text-align: center;padding-top: 15px">
                <img src="../../assets/images/logo.png" class="img" style="width: 80px;">
            </div>
        </div>

        <!-- <div class="col-xs-12 mt20" style="font-size: 10pt;font-weight: bolder;">
            아이디로 비밀번호 찾기
        </div>
        <div class="col-xs-9">
            <input type="text" class="form-control" style="height: 20px;" placeholder="아이디">
        </div>
        <div class="col-xs-3" style="padding-top: 2px; padding-left: 0;">
            <button type="button" class="btn btn-primary btn-md"
                    style="height: 30px; color: #07c1f2;background: white;border:solid #07c1f2;border-width: 1px; padding-top: 3px; font-size: 10pt;">
                확인
            </button>
        </div> -->

				<div class="col-xs-12 mt20" style="font-size: 10pt;font-weight: bolder; ">
						휴대폰 번호로 비밀번호 찾기
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

				<!-- <div class="col-xs-12 mt20 apply_contents_ok" style="font-size: 10pt;font-weight: bolder;display:none;">
						아이디 찾기 결과
				</div>
				<div class="col-xs-12 mt20 apply_contents_ok" style="font-size: 10pt;display:none;">
						<span id="PU_userid_ok"></span>
				</div> -->

        <div class="col-xs-12 mt5 apply_contents_ok" style="font-size: 10pt;font-weight: bolder;display:none;">
            새로운 비밀번호 입력
        </div>
        <div class="col-xs-12 apply_contents_ok" style="display:none;">
            <input name="PU_passwd" id="PU_passwd" type="password" class="form-control" style="font-size: 10pt;height: 20px;" placeholder="비밀번호" maxlength="20">
        </div>
        <div class="col-xs-12 apply_contents_ok" style="margin-top: -10px;display:none;">
            <input name="PU_passwd_ck" id="PU_passwd_ck" type="password" class="form-control" style="font-size: 10pt;height: 20px;" placeholder="비밀번호확인" maxlength="20">
        </div>

        <div class="col-xs-6 mt20" style="padding-right: 7px;">
            <button type="button" class="btn btn-primary btn-block btn-info"
                    style="color: white;background: #07c1f2;border:solid #07c1f2;border-width: 1px; height: 30px; padding-top: 3px;" onclick="pwd_change();">
                저장
            </button>
        </div>
        <div class="col-xs-6 mt20" style="padding-left: 7px;">
            <button type="button" class="btn btn-primary btn-block btn-info"
                    style="color: black;background: white;border:solid #8E9CB2;border-width: 1px; height: 30px; padding-top: 3px;" onclick="location.href='login'">
                취소
            </button>
        </div>


    </div>
	
	<?include "../../contents/common/footer.php";?>

</div>
</form>

</body>

</html>