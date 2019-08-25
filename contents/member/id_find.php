<?$loginspot='Y';?>
<?include "../../contents/common/head.php";?>

<style>

	body {
		font-size: 12pt;
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
	<script>location.replace('/contents/paykhan/paykhan');</script>
<?}else{?>
	<!-- <script>alert('로그인 후 이용해주세요.');location.replace('/contents/member/login.php');</script> -->
<?}?>

<script>
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
<input type='hidden' value='insert' name='Query' id='Query'/>
<input type="hidden" name="apply_num_ck" id="apply_num_ck" value="111111111">
<input type="hidden" name="apply_num_ok" id="apply_num_ok" value="N">
<input type="hidden" name="apply_userid_ok" id="apply_userid_ok" value="">


<div data-role="page" style="background: #FFFFFF;">
    <div data-role="header bg_white h60 bd_none">
        <div class="container-fluid d-flex header">
            <i class="fas fa-chevron-left" style="margin-top: 10px;cursor:pointer;" onclick="back('<?=$_SERVER['PHP_SELF']?>');"></i>
            <p class="text-center cw" style="font-weight: normal; margin-top: 8px; font-size: 12pt;">아이디 찾기</p>
        </div>
    </div>

    <div role="main" class="ui-content" style="padding-left:0; padding-right: 0;">
        <div class="container-fluid" style="padding: 0 0 0 0;">
            <div class="t_center" style="padding-top: 15px;padding-bottom: 5px;">
                <img src="../../assets/images/logo.png" class="img" style="width: 80px;">
            </div>

            <div class="col-xs-12 mt20" style="font-size: 10pt;font-weight: bolder; ">
                휴대폰 번호로 아이디 찾기
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

            <div class="col-xs-12 mt20 apply_contents_ok" style="font-size: 10pt;font-weight: bolder;display:none;">
                아이디 찾기 결과
            </div>
            <div class="col-xs-12 mt20 apply_contents_ok" style="font-size: 10pt;display:none;">
                <span id="PU_userid_ok"></span>
            </div>

            <div class="col-xs-12 mt20">
                <button type="button" class="btn btn-primary btn-md" style="color: white;background: #07c1f2; height: 30px;padding-top: 3px;" onclick="location.href='login'">로그인
                </button>
            </div>
        </div>

    </div>

    <?include "../../contents/common/footer.php";?>

</div>
</form>

</body>


</html>

