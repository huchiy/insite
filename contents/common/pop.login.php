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
		
		<p class="mt10"><input type="submit" value="google 계정으로 로그인" class="btn span large"></p>

		<p class="mt20"><label class="icon_google btn span large green"><input type="button" id="googlelogin" value="google 계정으로 회원가입" accesskey="s" class="none">google 계정으로 회원가입</label></p>

    </section>

</div>
<!-- //layerPoup -->