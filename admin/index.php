<?$main='Y';?>
<?include "./common/head.php";?>

<?if($_SESSION[p_admin_token_val]){?>
	<script>location.replace('/admin/setting/paykhan_management.php');</script>
<?}else{?>
<?}?>

<script>
	function login_sub() {
		var frm=document.login_frm;

		if(!$('#PAD_id').val()){alert('아이디를 입력해주세요.');$('#PAD_id').focus();return;}
		if(!$('#PAD_passwd').val()){alert('비밀번호를 입력해주세요.');$('#PAD_passwd').focus();return;}

		frm.submit();
	}
</script>

<body class="login">
	<div>
		<a class="hiddenanchor" id="signup"></a>
		<a class="hiddenanchor" id="signin"></a>

		<div class="login_wrapper">
			<div class="animate form login_form">
				<section class="login_content">
  				<form method="POST" action="./member/login_ok.php" name="login_frm" onsubmit="return admin_login(this);" target="db_frame">
					<input type="hidden" name="rt_page" value="<?=$_SERVER['HTTP_REFERER']?>">

						<h1>
							<img src="/assets/admin/images/admin_logo.png" style="width:100px;" alt="" /></h1>
						<div>
							<input type="text" name="PAD_id" id="PAD_id" class="form-control" placeholder="Userid" required="" />
						</div>
						<div>
							<input type="password" name="PAD_passwd" id="PAD_passwd" class="form-control" placeholder="Password" required="" onkeypress="JavaScript:ent_q('login_sub()')"/>
						</div>
						<div>
							<a class="btn btn-default submit" onclick="login_sub()">Log in</a>
							<!-- <a class="btn btn-default to_register" href="#signup">Create Account</a> -->
						</div>

					</form>
				</section>
				
				<!-- footer content -->
				<div style="width:100%;border:0px solid red;text-align:center;">
								©2019 Insite 
						<div class="clearfix"></div>
				</div>
				<!-- /footer content -->

			</div>

			<div id="register" class="animate form registration_form">
				<section class="login_content">
					<form>
						<h1>관리자등록</h1>
						<div>
							<input type="text" class="form-control" placeholder="성명" required="" />
						</div>
						<div>
							<input type="text" class="form-control" placeholder="핸드폰번호" required="" />
						</div>
						<div>
							<input type="text" class="form-control" placeholder="관리자ID" required="" />
						</div>
						<div>
							<input type="text" class="form-control" placeholder="비밀번호" required="" />
						</div>
						<div>
							<input type="text" class="form-control" placeholder="비밀번호확인" required="" />
						</div>
						<div>
							<a class="btn btn-default submit" href="index.html">저장하기</a>
							<a class="btn btn-default" onclick="history.back();">취소</a>
						</div>


						<div class="clearfix"></div>

						<div class="separator">
							<p class="change_link">Already a member ?
								<a href="#signin" class="to_register"> Log in </a>
							</p>

							<br />

						</div>
					</form>
				</section>
			</div>
		</div>
	</div>
</body>
</html>
<iframe id="db_frame" name="db_frame" style="display:none;border:2px solid red;height:200px;width:200px;"></iframe>
