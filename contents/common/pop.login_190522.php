<?include "../../app/inc_head.php";?>

<script src="/assets/js/site_jquery.js?<?=time()?>"></script>

<script>
function join_sub() {
	var frm=document.join_frm;

	if(!$('#PU_email').val()){alert('이메일을 입력해주세요.');$('#PU_email').focus();return false;}
	if(!$('#PU_passwd').val()){alert('비밀번호를 입력해주세요.');$('#PU_passwd').focus();return false;}

	frm.submit();
}
</script>

<!-- layerPoup -->
<div class="layerPoup pop_login">

    <section class="popcon_wrapper tcenter" >
		<span class="logo mt20"></span>
		<form name="join_frm" id="join_frm" action="/contents/member/login_ok.php" method="post" enctype="multipart/form-data" onSubmit="return join_sub(this);" target="db_frame">
		<div id="loginWrap" class="mt30">
			<p><input type="text" name="PU_email" id="PU_email" required class="span large " placeholder="이메일" maxLength="30"></p>
			<p class="mt10"><input type="password" name="PU_passwd" id="PU_passwd" required class="span large" placeholder="비밀번호" maxLength="20"></p>
			<p class="mt10"><input type="submit" value="로그인" class="btn span large"></p>
		</div>
		<div class="mt30">
			<!-- <a href="#" target="_blank" class="btn mini transparent">아이디/비밀번호 찾기</a> -->
			<a href="/contents/common/pop.join.php" class="btn mini transparent popup-ajax">회원 가입</a>
		</div>
		</form>
    </section>

</div>
<!-- //layerPoup -->