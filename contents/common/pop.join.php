<?include "../../app/inc_head.php";?>

<!--google api-->
<script src="https://apis.google.com/js/api:client.js"></script>
<script>
	// google logout
	function signOut() {
		var auth2 = gapi.auth2.getAuthInstance();
		auth2.signOut().then(function () {
			console.log('User signed out.');
		});
		auth2.disconnect();
	}
	// google login
	function attachSignin(element) {
		console.log(element.id);
		auth2.attachClickHandler(element, {},
				function(googleUser) {
					//document.getElementById('name').innerText = "Signed in: " + googleUser.getBasicProfile().getName();
				}, function(error) {
					//alert(JSON.stringify(error, undefined, 2));
		});
	}
	// google login
	var googleUser = {};
	var startApp = function() {
		gapi.load('auth2', function(){
			// Retrieve the singleton for the GoogleAuth library and set up the client.
			auth2 = gapi.auth2.init({
				client_id: '165033922618-a6lqjg5ahjda6ac2mm2paqriirre85t1.apps.googleusercontent.com',
				cookiepolicy: 'single_host_origin',
				// Request scopes in addition to 'profile' and 'email'
				//scope: 'additional_scope'
			});
			attachSignin(document.getElementById('googlelogin'));
		});
	};
	startApp();
</script>
<!--google api-->
<script src="/assets/js/site_jquery.js?<?=time()?>"></script>

<script>
function join_sub() {

	var frm=document.join_frm;
	if(!frm.PU_name.value){alert('이름을 입력하세요.');$('#PU_name').focus();return false;}
	if(frm.PU_name.value.length<2) {alert('2자리 이상의 이름을 입력하세요.');$('#PU_name').focus();return false;}

	if(!frm.PU_email.value){alert('이메일 주소를 입력하세요.');$('#PU_email').focus();return false;}
	if(!regEmail.test(frm.PU_email.value)){alert('이메일 주소가 유효하지 않습니다');$('#PU_email').focus();return false;}

	if(!frm.PU_passwd.value){alert('비밀번호를 입력하세요.');$('#PU_passwd').focus();return false;}
	if(!chkPwd( $.trim(frm.PU_passwd.value))){ $('#PU_passwd').val(''); $('#PU_passwd').focus(); return false; }

	if(!frm.PU_passwd_ck.value){alert('비밀번호 확인란을 입력하세요.');$('#PU_passwd_ck').focus();return false;}
	if($('#PU_passwd').val()!=$('#PU_passwd_ck').val()){alert('비밀번호가 다릅니다. 비밀번호 확인란을 다시 입력해주세요.');$('#PU_passwd_ck').focus();return false;}

	if(frm.apply_1.checked!=true){alert('약관에 동의해주세요.');$('#apply_1').focus();return false;}

	frm.submit();
}
</script>

<!-- layerPoup -->
<div class="layerPoup pop_join">
	
    <section class="popcon_wrapper">
		
		<div class="tcenter"><span class="logo small"></span></div>

		<div class="pop-title tcenter">인사이트 회원가입</div>
		
		<form name="join_frm" id="join_frm" action="/contents/member/join_ok.php" method="post" enctype="multipart/form-data" onSubmit="return join_sub(this);" target="db_frame">
		<input type='hidden' value='insert' name='Query' id='Query'/>
		<div id="joinWrap" class="mt30">
			<p><input type="text" name="PU_name" id="PU_name" required class="span large " placeholder="사용자 이름" maxLength="20"></p>
			<p class="mt10"><input type="email" name="PU_email" id="PU_email" required class="span large " placeholder="이메일" maxLength="30"></p>
			<p class="mt10"><input type="password" name="PU_passwd" id="PU_passwd" required class="span large" placeholder="비밀번호" maxLength="20"></p>
			<p class="mt10"><input type="password" name="PU_passwd_ck" id="PU_passwd_ck" required class="span large" placeholder="비밀번호 확인" maxLength="20"></p>
			<p class="mt15"><label class="bold"><input type="checkbox" name="apply_1" id="apply_1"><span></span>개인정보 보호 이용 약관 동의</label></p>
			<p class="mt20"><input type="submit" value="가입하기" accesskey="s" class="btn span large"></p>
		</div>
		</form>

		<div class="mt30">
			이미 계정이 있으신가요? <a href="/contents/common/pop.login.php" class="btn mini transparent underline popup-ajax">로그인하기</a>
		</div>

		<p class="mt20"><label class="icon_google btn span large green"><input type="button" id="googlelogin" value="google 계정으로 회원가입" accesskey="s" class="none">google 계정으로 회원가입</label></p>

		
    </section>

</div>
<!-- //layerPoup -->